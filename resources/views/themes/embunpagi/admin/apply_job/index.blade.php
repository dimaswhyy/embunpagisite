@extends('admin.layout')

@section('content')
<div class="bg-white px-4 py-6 shadow sm:rounded-lg sm:p-6">
  <div class="flex justify-between items-center">
    <h4 class="font-bold text-xl text-blue">Apply Career</h4>
    <a href="{{ route('export_apply_career') }}" target="_blank" class="transition duration-200 bg-blue hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white px-5 py-2 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center">Export Data</a>
  </div>

  <div class="py-5">
    <div class="overflow-auto">
     <table class="w-full my-5">
      <thead>
        <th class="text-sm font-semibold border-b border-t p-3 text-left">First Name</th>
        <th class="text-sm font-semibold border-b border-t p-3 text-left">Last Name</th> 
        <th class="text-sm font-semibold border-b border-t p-3 text-left">Position</th>
        <th class="text-sm font-semibold border-b border-t p-3 text-left">Phone</th>
        <th class="text-sm font-semibold border-b border-t p-3 text-left">Email</th>
        <th class="text-sm font-semibold border-b border-t p-3 text-left">English Proficiency</th>
        <th class="text-sm font-semibold border-b border-t p-3 text-left">Latest Salary</th>
        <th class="text-sm font-semibold border-b border-t p-3 text-left">Salary Expectation</th>
        <th class="text-sm font-semibold border-b border-t p-3 text-left">Created At</th>
        <th class="text-sm font-semibold border-b border-t p-3 text-left">Action</th>
      </thead>
      <tbody>
        @foreach ($data as $item)
        <tr id="data-id-{{ $item->id }}">
          <td class="text-sm border-b p-3 whitespace-nowrap">{{ $item->first_name }}</td>
          <td class="text-sm border-b p-3 whitespace-nowrap">{{ $item->last_name }}</td>
          <td class="text-sm border-b p-3 whitespace-nowrap">{{ $item->job->translation[0]->title }}</td>
          <td class="text-sm border-b p-3 whitespace-nowrap">{{ $item->phone }}</td>
          <td class="text-sm border-b p-3 whitespace-nowrap">{{ $item->email }}</td>
          <td class="text-sm border-b p-3 whitespace-nowrap">{{ $item->english_proficiency }}</td>
          <td class="text-sm border-b p-3 whitespace-nowrap">{{ $item->latest_salary }}</td>
          <td class="text-sm border-b p-3 whitespace-nowrap">{{ $item->salary_expectation }}</td>
          <td class="text-sm border-b p-3 whitespace-nowrap">
            {{ \Carbon\Carbon::parse($item->created_at)->format('d-M-Y H:m') }}
          </td>
          <td class="text-sm border-b p-3 whitespace-nowrap">
            <a href="{{ route('apply_career_show', $item->id) }}" class="text-blue">View Data</a>&nbsp;
            <a href="javascript:void(0)" class="text-red-700 btn-delete" data-id="{{ $item->id }}" path-delete="{{ route('apply_career_delete', $item->id) }}">Delete</a>
          </td>
        </tr>
        @endforeach
      </tbody>
     </table>
    </div>
    <!-- Pagination Links -->
    {{ $data->links('pagination::tailwind') }}
  </div>
</div>

@stop

@push('script')
<script>
  const btnDelete = document.querySelectorAll('.btn-delete');
  btnDelete.forEach(button => {
    button.addEventListener('click', async () => {
      const pathDelete = button.getAttribute('path-delete');
      const dataId = button.getAttribute('data-id');

      if (confirm('Are you sure delete this data?')) {
        await fetch(pathDelete, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
          },
          body: JSON.stringify({
            id: dataId
          })
        })
        .then(async (response) => {
          if (!response.ok) {
            throw new Error('Network response was not ok');
          }
          const result = await response.json();
          if (result.success) {
            document.getElementById('data-id-' + dataId).remove();
          }
        })
        .then(data => {
          console.log(data);
        })
        .catch(error => {
          console.error('There was a problem with the fetch operation:', error);
        });
      }
    })
  })
</script>
@endpush