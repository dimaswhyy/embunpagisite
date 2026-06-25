@extends('admin.layout')

@section('content')
<div class="bg-white px-4 py-6 shadow sm:rounded-lg sm:p-6">
  <div class="flex justify-between items-center">
    <h4 class="font-bold text-xl text-blue">Booking School Tour</h4>
  </div>

  <div class="py-5">
    <table class="w-full my-5">
      <thead>
        <th class="text-sm font-semibold border-b border-t p-3 text-left">Child Name</th>
        <th class="text-sm font-semibold border-b border-t p-3 text-left">Parent Name</th> 
        <th class="text-sm font-semibold border-b border-t p-3 text-left">Phone</th>
        <th class="text-sm font-semibold border-b border-t p-3 text-left">Email</th>
        <th class="text-sm font-semibold border-b border-t p-3 text-left">Name of School</th>
        <th class="text-sm font-semibold border-b border-t p-3 text-left">Program</th>
        <th class="text-sm font-semibold border-b border-t p-3 text-left">Visit Date</th>
        <th class="text-sm font-semibold border-b border-t p-3 text-left">Visit Time</th>
        <th class="text-sm font-semibold border-b border-t p-3 text-left">Action</th>
      </thead>
      <tbody>
        @foreach ($data as $item)
        <tr id="data-id-{{ $item->id }}">
          <td class="text-sm border-b p-3">{{ $item->child_name }}</td>
          <td class="text-sm border-b p-3">{{ $item->parent_name }}</td>
          <td class="text-sm border-b p-3">{{ $item->phone }}</td>
          <td class="text-sm border-b p-3">{{ $item->email }}</td>
          <td class="text-sm border-b p-3">{{ $item->school_from }}</td>
          <td class="text-sm border-b p-3">{{ $item->program }}</td>
          <td class="text-sm border-b p-3">
            {{ \Carbon\Carbon::parse($item->visit_date)->format('d-m-Y') }}
          </td>
          <td class="text-sm border-b p-3">
            {{ \Carbon\Carbon::parse($item->visit_time)->format('H:m') }}
          </td>
          <td class="text-sm border-b p-3">
            <a href="javascript:void(0)" class="text-red-700 btn-delete" data-id="{{ $item->id }}" path-delete="{{ route('booking_school_tour_delete', $item->id) }}">Delete</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <!-- Pagination Links -->
    {{ $data->links('pagination::bootstrap-5') }}
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