@extends('admin.layout')

@section('content')

<div class="block w-full lg:w-8/12">
  <h4 class="mb-8 text-xl font-semibold">Add Gallery</h4>
  <form action="{{ route('gallery_store') }}" method="post" class="block">
    @csrf
    <input type="hidden" name="language_code" value="{{ str_replace('_', '-', app()->getLocale()) }}" />
    <div class="block mb-5 w-full lg:w-6/12">
      <label for="title-input" class="font-semibold text-sm text-gray-600 pb-1 block">Title</label>
      <div class="border rounded-lg mt-1 mb-5 w-full overflow-hidden bg-white">
        <input id="title-input" type="text" name="title" class="border-0 rounded-lg px-3 py-2 text-sm w-full bg-none" placeholder="type title" />
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
      <table class="w-full bg-white">
        <thead>
          <th class="border-t border-b text-sm font-semibold text-left">Title Image</th>
          <th class="border-t border-b text-sm font-semibold text-left">Image</th>
          <th class="border-t border-b text-sm font-semibold text-left">Order Number</th>
          <th class="border-t border-b text-sm font-semibold text-left">Action</th>
        </thead>
        <tbody id="gallery-image-list-add"></tbody>
        <tfoot>
          <tr>
            <td colspan="4" class="border-t border-b text-sm font-semibold">
              <button 
                id="add-image-gallery" 
                type="button" 
                class="p-2 px-6 text-white bg-blue rounded block mx-auto"
                data-url="{{ route('filemanager.loadModal') }}?path="
              >Add Image</button>
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
    <div class="block mb-5">
      <button type="submit" class="p-2 px-6 text-white bg-blue rounded">Save</button>
    </div>
  </form>
</div>
@stop
