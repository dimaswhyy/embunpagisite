<div 
  id="modalCreateNewFolder" 
  class="hidden fixed top-0 left-0 w-screen h-screen z-10"
  role="dialog"
>
  <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
  <div class="flex items-start justify-center p-4">
    <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all w-full lg:w-5/12">
      <form id="createFolderForm" method="POST" action="{{ route('filemanager.create-folder') }}">
        @csrf
        <div class="p-3 px-5 border-b border-gray-300 flex justify-between items-center">
          <h3 class="text-lg font-semibold m-0 text-gray-600" id="modalCreateNewFolderLabel">Add New Folder</h3>
          <button 
            type="button" 
            class="text-2xl font-bold bg-gray-100 p-0 px-1 rounded close-modal"
            data-modal="modalCreateNewFolder"
          >
            <i class="bi bi-x"></i>
          </button>
        </div>
        <div class="p-5 px-5">
          <div class="block form-add-modulecontent">
            <div class="flex flex-col gap-2">
              <label for="folderName" class="font-semibold text-gray-600">Folder Name</label>
              <input id="folderName" type="text" name="folder_name" class="p-2 px-3 rounded border border-gray-300 bg-white" placeholder="Type folder name" />
              <input type="hidden" id="folderPath" name="path" value="{{ $path ? $path : '' }}">
            </div>
          </div>
        </div>
        <div class="p-3 px-5 bg-gray-100 flex justify-end gap-5">
          <button type="button" class="bg-none p-2 text-gray-700 font-semibold close-modal" data-modal="modalCreateNewFolder">@lang('language.close')</button>
          <button id="submit-new-folder" type="submit" class="p-2 px-6 text-white bg-blue rounded font-semibold">@lang('language.save')</button>
        </div>
      </form>
    </div>
  </div>
</div>