@extends('admin.layout')

@section('content')
<div class="bg-white px-4 py-6 shadow sm:rounded-lg sm:p-6">
  <div class="flex justify-between items-center">
    <h4 class="font-bold text-xl text-blue">Job Lists</h4>
    <a href="{{ route('job_lists_add') }}" class="transition duration-200 bg-blue hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white px-5 py-2 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center">Add New Job</a>
  </div>

  @if (session('success'))
  <div class="my-5 px-5 py-2 text-white bg-green-500 rounded text-sm flex justify-between alert-custom">
    <div>{{ session('success') }}</div>
    <button type="button" class="bg-none border-0 p-0 text-white alert-close">
      <i class="bi bi-x-lg"></i>
    </button>
  </div>
  @endif

  <div class="py-2">
    <table class="w-full my-5">
      <thead>
        <th class="text-sm font-semibold border-b border-t p-3 text-left">Title</th>   
        <th class="text-sm font-semibold border-b border-t p-3 text-left">Status</th>   
        <th class="text-sm font-semibold border-b border-t p-3 text-left">Created At</th>
        <th class="text-sm font-semibold border-b border-t p-3 text-left">Action</th>
      </thead>
      <tbody>
        @foreach ($jobLists as $item)
        <tr id="data-id-{{ $item->translation[0]->id }}">
          <td class="text-sm border-b p-3">{{ $item->translation[0]->title }}</td>
          <td class="text-sm border-b p-3">{{ $item->status == 1 ? 'Publish' : 'Draft' }}</td>
          <td class="text-sm border-b p-3">
            {{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:m:s') }}
          </td>
          <td class="text-sm border-b p-3">
            <a href="{{ route('job_lists_edit', $item->translation[0]->slug) }}" class="text-blue">Edit</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <!-- Pagination Links -->
    {{ $jobLists->links('pagination::bootstrap-5') }}
  </div>
</div>

@stop