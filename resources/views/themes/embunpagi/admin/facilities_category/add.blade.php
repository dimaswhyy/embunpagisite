@extends('admin.layout')

@section('content')

<div class="block w-6/12">
  <h4 class="mb-8 text-xl font-semibold">Add Facilities Category</h4>
  <form action="{{ route('facilities_category_store') }}" method="post" class="block">
    @csrf
    <input type="hidden" name="language_code" value="{{ str_replace('_', '-', app()->getLocale()) }}" />
    <div class="block mb-5">
      <label for="title-input" class="font-semibold text-sm text-gray-600 pb-1 block">Title</label>
      <div class="border rounded-lg mt-1 mb-5 w-full overflow-hidden bg-white">
        <input id="title-input" type="text" name="title" class="border-0 rounded-lg px-3 py-2 text-sm w-full bg-none" placeholder="type title" />
      </div>
    </div>
    <div class="block mb-5">
      <label for="num-order-input" class="font-semibold text-sm text-gray-600 pb-1 block">Order Number</label>
      <div class="border rounded-lg mt-1 mb-5 w-2/12 overflow-hidden">
        <input id="num-order-input" type="number" name="num_order" class="border-0 rounded-lg px-3 py-2 text-sm w-full bg-none" min="1" value="1" />
      </div>
    </div>
    <div class="block mb-5">
      <label for="status-input" class="font-semibold text-sm text-gray-600 pb-1 block">Status</label>
      <div class="border rounded-lg mt-1 mb-5 w-fit overflow-hidden bg-white px-3 py-2 ">
        <select id="status-input" name="status" class="border-0 rounded-lg text-sm w-fit pr-5">
          <option value="1">Publish</option>
          <option value="0">Draft</option>
        </select>
      </div>
    </div>
    <div class="block mb-5">
      <button type="submit" class="p-2 px-6 text-white bg-blue rounded">Save</button>
    </div>
  </form>
</div>
@stop
