@extends('admin.layout')

@section('content')

<div class="block w-full lg:w-8/12">
  <h4 class="mb-8 text-xl font-semibold">Edit Gallery</h4>
  <form action="{{ route('update_gallery') }}" method="post" class="block">
    @csrf
    <input type="hidden" name="id" value="{{ $gallery->id }}" />
    <input type="hidden" name="language_code" value="{{ str_replace('_', '-', app()->getLocale()) }}" />
    <div class="block mb-5 w-full lg:w-6/12">
      <label for="title-input" class="font-semibold text-sm text-gray-600 pb-1 block">Title</label>
      <div class="border rounded-lg mt-1 mb-5 w-full overflow-hidden bg-white">
        <input id="title-input" type="text" name="title" class="border-0 rounded-lg px-3 py-2 text-sm w-full bg-none" placeholder="type title" value="{{ $gallery->title }}" />
      </div>
    </div>
    <div class="block mb-5">
      <label for="status-input" class="font-semibold text-sm text-gray-600 pb-1 block">Status</label>
      <div class="border rounded-lg mt-1 mb-5 w-fit overflow-hidden bg-white px-3 py-2 ">
        <select id="status-input" name="status" class="border-0 rounded-lg text-sm w-fit pr-5">
          <option value="1" @if($gallery->status === 1)selected="selected"@endif>Publish</option>
          <option value="0" @if($gallery->status === 0)selected="selected"@endif>Draft</option>
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
        <tbody id="gallery-image-list-add">
          @foreach ($gallery->images as $key => $image)
          <tr id="data-image-{{ $key }}">
            <td class="align-top">
              <div class="border rounded-lg w-full overflow-hidden bg-white">
                <input type="text" name="image[{{ $key }}][title]" class="border-0 rounded-lg px-3 py-2 text-sm w-full bg-none" placeholder="type title" value="{{ $image->title }}" />
              </div>
            </td>
            <td>
              <div id="add-single-image-{{ $key }}" class="block">
                <img id="img-preview-upload-{{ $key }}" src="{{ asset('storage') }}/{{ $image->image }}" filename="" alt="" class="w-24 h-24 object-cover mb-2 img-preview-upload" />
                <button type="button" class="p-1 px-2 text-xs text-white bg-blue rounded show-modal" data-url="${dataUrl}" data-modal="fileManagerModal" data-parent="add-single-image-{{ $key }}" data-input-id="image-input-{{ $key }}">Pilih File</button>
                <input id="image-input-{{ $key }}" type="hidden" name="image[{{ $key }}][image]" value="{{ $image->image }}" />
              </div>
            </td>
            <td class="align-top">
              <div class="border rounded-lg w-full overflow-hidden bg-white">
                <input type="number" name="image[{{ $key }}][num_order]" class="border-0 rounded-lg px-3 py-2 text-sm w-full bg-none" placeholder="type number order" value="{{ $image->num_order }}" />
              </div>
            </td>
            <td class="align-top">
              <button class="text-red-700 text-sm btn-delete-image" data-id="data-image-{{ $key }}">Remove</button>
            </td>
          </tr>
          @endforeach
        </tbody>
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
