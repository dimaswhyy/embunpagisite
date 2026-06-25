@extends('admin.layout')

@section('content')
<div class="bg-white px-4 py-6 shadow sm:rounded-lg sm:p-6">
  <div class="flex justify-between items-center">
    <h4 class="font-bold text-xl text-blue">Facilities Category</h4>
    <a href="{{ route('facilities_category_add') }}" class="transition duration-200 bg-blue hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white px-5 py-2 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center">Add Category</a>
  </div>

  @if (session('success'))
  <div class="my-5 px-5 py-2 text-white bg-green-500 rounded text-sm flex justify-between alert-custom">
    <div>{{ session('success') }}</div>
    <button type="button" class="bg-none border-0 p-0 text-white alert-close">
      <i class="bi bi-x-lg"></i>
    </button>
  </div>
  @endif

  <div class="py-5">
    <table class="w-full my-5">
      <thead>
        <th class="text-sm font-semibold border-b border-t p-3 text-left">Title</th>
        <th class="text-sm font-semibold border-b border-t p-3 text-left">Status</th>
        <th class="text-sm font-semibold border-b border-t p-3 text-left">Created At</th>
        <th class="text-sm font-semibold border-b border-t p-3 text-left">Action</th>
      </thead>
      <tbody>
        @foreach ($data as $item)
        <tr id="data-id-{{ $item->translation[0]->id }}">
          <td class="text-sm border-b p-3">{{ $item->translation[0]->title }}</td>
          <td class="text-sm border-b p-3">{{ $item->status === 1 ? 'Publish' : 'Draft' }}</td>
          <td class="text-sm border-b p-3">
            {{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:m:s') }}
          </td>
          <td class="text-sm border-b p-3">
            <a href="{{ route('facilities_category_edit', $item->translation[0]->slug) }}" class="text-blue">Edit</a>&nbsp;
            <a href="javascript:void(0)" class="text-red-700 btn-delete" data-id="{{ $item->translation[0]->id }}" path-delete="{{ route('delete_facilities_category', $item->translation[0]->id) }}">Delete</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
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