@extends('admin.layout')

@section('content')

<div class="block w-6/12">
  <h4 class="mb-8 text-xl font-semibold">Update Enroll Now Section</h4>
  <form action="{{ route('enrollnow_section_update') }}" method="post" class="block">
    @csrf
    <input type="hidden" name="id" value="{{ $enrollNow->translation[0]->id }}" />
    <input type="hidden" name="type" value="enrollnow-section" />
    <input type="hidden" name="language_code" value="{{ str_replace('_', '-', app()->getLocale()) }}" />
    <div class="block mb-5">
      <label for="title-input" class="font-semibold text-sm text-gray-600 pb-1 block">Title</label>
      <div class="border rounded-lg mt-1 mb-5 w-full overflow-hidden bg-white">
        <input id="title-input" type="text" name="title" class="border-0 rounded-lg px-3 py-2 text-sm w-full bg-none" placeholder="type name" value="{{ $enrollNow->translation[0]->title }}" />
      </div>
    </div>
    <div class="block mb-5">
      <label for="image-input" class="font-semibold text-sm text-gray-600 pb-1 block">@lang('language.image')</label>
      <div id="add-single-image" class="block">
        <img id="img-preview-upload" src="{{ asset('storage') }}/{{ $enrollNow->translation[0]->image }}" filename="{{ $enrollNow->translation[0]->image }}" alt="{{ $enrollNow->translation[0]->image }}" class="img-preview-upload mb-3" />
        <button 
          type="button" 
          class="p-2 px-3 text-sm text-white bg-blue rounded show-modal" 
          data-url="{{ route('filemanager.loadModal') }}?path=" 
          data-modal="fileManagerModal"
          data-parent="add-single-image" 
          data-input-id="image-input"
        >Pilih File</button>
        <input id="image-input" type="hidden" name="image" />
      </div>
    </div>
    <div class="block mb-5">
      <label for="status-input" class="font-semibold text-sm text-gray-600 pb-1 block">Status</label>
      <div class="border rounded-lg mt-1 mb-5 w-fit overflow-hidden bg-white px-3 py-2 ">
        <select id="status-input" name="status" class="border-0 rounded-lg text-sm w-fit pr-5">
          <option value="1" @if($enrollNow->status === 1) selected="selected" @endif>Publish</option>
          <option value="0" @if($enrollNow->status === 0) selected="selected" @endif>Draft</option>
        </select>
      </div>
    </div>
    <div class="block mb-5">
      <button type="submit" class="p-2 px-6 text-white bg-blue rounded">Save</button>
    </div>
  </form>
</div>
@stop
