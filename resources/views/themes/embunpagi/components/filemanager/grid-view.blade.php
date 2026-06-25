@php
  $viewOption = session('view_option', 'grid-view');
@endphp

<div id="grid-view" class="mt-3 option-view">
  @if ($folders)
  <p class="m-0">Folders</p>
  <div class="flex flex-wrap mb-3 -mx-3">
    @foreach ($folders as $key => $folder)
    <div class="w-3/12 p-3">
      <div class="p-2 rounded bg-gray-100 mb-4">
        <div class="flex justify-between gap-2">
          <i class="bi bi-folder-fill text-secondary"></i>
          <a href="javascript:void(0)" data-url="{{ route('filemanager.loadModal') }}?path=" data-path="{{ $folder['path'] }}" data-parent="" data-input-id="" class="d-block whitespace-nowrap text-truncate text-secondary folder-link">
            {{ $folder['name'] }}
          </a>
          <div class="relative">
            <input type="checkbox" id="toggle-folder-{{ $key }}" class="hidden peer" />
            <label for="toggle-folder-{{ $key }}" class="cursor-pointer">
              <i class="bi bi-three-dots-vertical"></i>
            </label>
            <ul class="absolute right-0 z-10 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden peer-checked:block dropdown-menu-wrap">
              <li>
                <button type="button" class="dropdown-item border-0 bg-transparent text-sm p-4 py-2">Properties</button>
              </li>
              <li>
                <button type="button" class="dropdown-item border-0 bg-transparent text-danger delete-button text-sm p-4 py-2" data-path="{{ $folder['path'] }}" data-type="folder" data-url="{{ route('filemanager.delete') }}">Delete</button>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  @endif

  @if ($files)
  <p class="m-0">Files</p>
  <div class="flex flex-wrap mb-3 -mx-3">
    @foreach($files as $key => $file)
      @php
        $extensionFile = pathinfo($file['name'], PATHINFO_EXTENSION);
      @endphp
    <div class="w-3/12 p-3">
      <div class="p-2 px-3 rounded bg-gray-100 mb-4">
        <div class="flex justify-between gap-2">
          <i class="bi bi-image-fill text-secondary"></i>
          <div class="lock whitespace-nowrap text-truncate overflow-hidden">{{ $file['name'] }}</div>
          <div class="relative">
            <input type="checkbox" id="toggle-file-{{ $key }}" class="hidden peer" />
            <label for="toggle-file-{{ $key }}" class="cursor-pointer">
              <i class="bi bi-three-dots-vertical"></i>
            </label>
            <ul class="absolute right-0 z-10 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden peer-checked:block dropdown-menu-wrap">
              <li>
                <button type="button" class="dropdown-item border-0 bg-none text-blue attach-file-toform text-sm p-4 py-2 whitespace-nowrap close-modal" data-modal="fileManagerModal" data-name="{{ $file['name'] }}" data-path="{{ $file['path'] }}" data-extension="{{ $extensionFile }}" data-target="">Select File</button>
              </li>
              <li>
                <button type="button" class="dropdown-item border-0 bg-none copy-to-clipboard text-sm p-4 py-2 whitespace-nowrap" data-name="{{ $file['name'] }}" data-path="{{ $file['path'] }}" data-extension="{{ $extensionFile }}" data-target="">Copy URL File</button>
              </li>
              <li>
                <button type="button" class="dropdown-item border-0 bg-none text-sm p-4 py-2 whitespace-nowrap">View</button>
              </li>
              <li>
                <button type="button" class="dropdown-item border-0 bg-none text-red-500 delete-button text-sm p-4 py-2 whitespace-nowrap" data-path="{{ $file['path'] }}" data-type="file" data-url="{{ route('filemanager.delete') }}">Delete</button>
              </li>
            </ul>
          </div>
        </div>
        <div class="w-100 bg-gray-200 flex justify-center items-center rounded overflow-hidden mb-2" style="height: 150px;">
          @if (
            $extensionFile == 'jpg' ||
            $extensionFile == 'jpeg' || 
            $extensionFile == 'png' ||
            $extensionFile == 'gif' ||
            $extensionFile == 'svg'
          )
          <img src="{{ asset('storage') }}/{{ $file['path'] }}" class="w-100 h-100 object-cover" />
          @else 
          <i class="bi bi-files text-3xl"></i>
          @endif
        </div>
      </div>
    </div>
    @endforeach
  </div>
  @endif
</div>