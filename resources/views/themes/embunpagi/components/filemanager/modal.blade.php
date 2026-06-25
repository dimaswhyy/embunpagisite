<div 
  id="fileManagerModal" 
  class="hidden fixed top-0 left-0 w-screen h-screen z-10" 
  role="dialog"
>
  <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
  <div class="flex h-screen items-start justify-center p-4">
    <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all w-full lg:w-10/12 xl:w-9/12 h-full">
      <div class="p-3 px-5 border-b border-gray-300 flex justify-between items-center">
        <h3 class="text-lg font-semibold m-0 text-gray-600" id="fileManagerModalLabel">File Manager</h3>
        <button 
          type="button" 
          class="text-2xl font-bold bg-gray-100 p-0 px-1 rounded close-modal"
          data-modal="fileManagerModal"
        >
          <i class="bi bi-x"></i>
        </button>
      </div>
      <div id="fileManagerContent" class="block h-full overflow-auto"></div>
    </div>
  </div>
</div>