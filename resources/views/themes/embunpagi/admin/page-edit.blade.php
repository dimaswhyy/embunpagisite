@extends('admin.layout')

@section('content')

<div class="block w-6/12">
  <h4 class="mb-8 text-xl font-semibold">Update Page</h4>
  <form action="{{ route('page_update') }}" method="post" class="block">
    @csrf
    <input type="hidden" name="language_code" value="{{ str_replace('_', '-', app()->getLocale()) }}" />
    <input type="hidden" name="id" value="{{ $dataThisPage->id }}" />
    <div class="block mb-5">
      <label for="name-input" class="font-semibold text-sm text-gray-600 pb-1 block">Title Page</label>
      <div class="border rounded-lg mt-1 mb-5 w-full overflow-hidden bg-white">
        <input id="name-input" type="text" name="title" class="border-0 rounded-lg px-3 py-2 text-sm w-full bg-none" placeholder="type title" value="{{ $dataThisPage->title }}" />
      </div>
    </div>
    <div class="block mb-5">
      <label for="description-input" class="font-semibold text-sm text-gray-600 pb-1 block">Description</label>
      <div class="border rounded-lg mt-1 mb-5 w-full overflow-hidden bg-white">
        <textarea id="description-input" name="description" class="border-0 rounded-lg px-3 py-2 text-sm w-full bg-none" placeholder="type description">{{ $dataThisPage->description }}</textarea>
      </div>
    </div>
    <div class="block mb-5">
      <label for="parent-input" class="font-semibold text-sm text-gray-600 pb-1 block">Parent Page</label>
      <div class="border rounded-lg mt-1 mb-5 w-full overflow-hidden bg-white px-3 py-2 ">
        <select id="parent-input" name="parent" class="border-0 rounded-lg text-sm w-full">
          <option value="">Select Parent Page</option>
          @include('admin.pages-option-list', ['dataPages' => $dataPages, 'selected' => $thisDataPage->parent_id, 'prefix' => ''])
        </select>
      </div>
    </div>
    <div class="block mb-5">
      <label for="image-input" class="font-semibold text-sm text-gray-600 pb-1 block">@lang('language.image')</label>
      <div id="add-single-image" class="block">
        <img id="img-preview-upload" src="{{ asset('storage') }}/{{ $dataThisPage->image }}" filename="" alt="" class="img-preview-upload mb-3 @if($dataThisPage->image) block @endif" />
        <button 
          type="button" 
          class="p-2 px-3 text-sm text-white bg-blue rounded show-modal" 
          data-url="{{ route('filemanager.loadModal') }}?path=" 
          data-modal="fileManagerModal"
          data-parent="add-single-image" 
          data-input-id="image-input"
        >Pilih File</button>
        <input id="image-input" type="hidden" name="image" value="{{ $dataThisPage->image }}" />
      </div>
    </div>
    <div class="block mb-5">
      <label for="num-order-input" class="font-semibold text-sm text-gray-600 pb-1 block">Order Number</label>
      <div class="border rounded-lg mt-1 mb-5 w-2/12 overflow-hidden">
        <input id="num-order-input" type="number" name="order_num" class="border-0 rounded-lg px-3 py-2 text-sm w-full bg-none" min="1" value="{{ $thisDataPage->order_num }}" />
      </div>
    </div>
    <div class="block mb-5">
      <label for="show-menu-input" class="font-semibold text-sm text-gray-600 pb-1 block">Show On Menu?</label>
      <div class="border rounded-lg mt-1 mb-5 w-fit overflow-hidden bg-white px-3 py-2 ">
        <select id="show-menu-input" name="show_menu" class="border-0 rounded-lg text-sm w-fit pr-5">
          <option value="1" @if ($thisDataPage->show_menu === 1) selected="selected" @endif>Yes</option>
          <option value="0" @if ($thisDataPage->show_menu === 0) selected="selected" @endif>No</option>
        </select>
      </div>
    </div>
    <div class="block mb-5">
      <button type="submit" class="p-2 px-6 text-white bg-blue rounded">Save</button>
    </div>
  </form>
</div>
@stop
