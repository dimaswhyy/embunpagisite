<table id="list-view" class="w-full mt-3 option-view">
  <thead class="bg-gray-50">
    <th class="text-left">Name</th>
    <th class="text-left">Type</th>
    <th class="text-left">Last Modified</th>
    <th class="text-left">Size</th>
    <th>&nbsp;</th>
  </thead>
  <tbody>
    @if ($folders)
    @foreach ($folders as $key => $folder)
    <tr class="border-b border-gray-200">
      <td class="p-3">
        <a href="javascript:void(0)" data-url="{{ route('filemanager.loadModal') }}?path=" data-path="{{ $folder['path'] }}" data-parent="" data-input-id="" class="flex gap-2 folder-link text-secondary">
          <i class="bi bi-folder-fill text-blue"></i>
          <div class="d-block">{{ $folder['name'] }}</div>
        </a>
      </td>
      <td class="p-3">folder</td>
      <td class="p-3">{{ $folder['created_at'] }}</td>
      <td class="p-3">-</td>
      <td class="p-3">
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
      </td>
    </tr>
    @endforeach
    @endif

    @if ($files)
    @foreach ($files as $key => $file)
      @php 
        $thisFile = asset('storage') . "/" . $file['name'];
        $extensionFile = pathinfo($file['name'], PATHINFO_EXTENSION);
      @endphp
    <tr class="border-b border-gray-200">
      <td class="p-3">
        <div class="flex items-center gap-2">
          <i class="bi bi-image-fill text-gray-500"></i>
          <div class="d-block">{{ $file['name'] }}</div>
        </div>
      </td>
      <td class="p-3">
        @if (
          $extensionFile == 'jpg' ||
          $extensionFile == 'jpeg' || 
          $extensionFile == 'png' ||
          $extensionFile == 'gif'
        )
          image/{{ $extensionFile }}
        @else
          {{ $extensionFile }}
        @endif
      </td>
      <td class="p-3">{{ $file['created_at'] }}</td>
      <td class="p-3">{{ $file['size'] }} Kb</td>
      <td class="p-3">
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
      </td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>