@php
  $viewOption = session('view_option', 'grid-view');
@endphp

<div class="sticky top-0 left-0 bg-white z-10">
  <div class="flex justify-between items-center gap-3 p-3 pb-1">
    <div class="w-full lg:w-6/12">
      <div class="flex gap-3">
        <div class="pr-0">
          <form id="uploadForm" enctype="multipart/form-data">
            @csrf
            <label for="fileInput" class="bg-white p-1 px-2 cursor-pointer flex gap-2">
              <i class="bi bi-upload"></i>
              <div class="d-block whitespace-nowrap">Upload file</div>
            </label>

            <input type="file" id="fileInput" name="file" style="display: none;" data-url="{{ route('filemanager.upload') }}">
            <input type="hidden" id="uploadPath" name="path" value="{{ $path ? $path : '' }}">
          </form>
        </div>
        <div class="pr-0">
          <button
            id="open-create-new-folder"
            class="bg-white p-1 px-2 cursor-pointer flex gap-2 show-modal"
            data-url="{{ route('filemanager.upload') }}"
            data-modal="modalCreateNewFolder"
          >
            <i class="bi bi-folder"></i>
            <div class="d-block whitespace-nowrap">New Folder</div>
          </button>
        </div>
      </div>
    </div>
    <div class="w-full lg:w-6/12">
      <div class="flex gap-2 justify-end">
        <div class="flex-grow-0 p-0">
          <button type="button" class="cursor-pointer p-1 px-2 rounded {{ $viewOption == 'grid-view' ? 'bg-gray-400 text-white' : 'bg-white text-black' }} d-flex gap-2 select-view-opt" data-option="grid-view" data-url="{{ route('filemanager.saveViewOption') }}">
            <i class="bi bi-grid"></i>
          </button>
        </div>
        <div class="flex-grow-0">
          <button type="button" class="cursor-pointer p-1 px-2 rounded {{ $viewOption == 'list-view' ? 'bg-gray-400 text-white' : 'bg-white text-black' }} d-flex gap-2 select-view-opt" data-option="list-view" data-url="{{ route('filemanager.saveViewOption') }}">
            <i class="bi bi-list-task"></i>
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="flex items-center gap-3 p-3 w-full">
    <div class="flex-0">
      <a
        href="javascript:void(0);" 
        @if(!empty($path) && $path !== '/' && $path !== '.')
        class="p-3 rounded bg-gray-100 back-link" 
        data-url="{{ route('filemanager.loadModal') }}?path="
        data-path="{{ dirname($path) }}"
        data-parent=""
        @else
        class="p-3 rounded bg-gray-100"
        @endif
        title="Back to parent folder"
      >
        <i class="bi bi-arrow-up"></i>
      </a>
    </div>
    <div class="flex-1">
      <input type="text" class="w-full p-2 px-3 rounded border border-gray-300 bg-white" value="/{{ $path }}" readonly>
    </div>
  </div>
</div>

