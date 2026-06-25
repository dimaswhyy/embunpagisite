@foreach ($dataPages as $key => $item)
<div class="relative accordion-pages" id="accordion-page-{{ $item->id }}">
  <div class="border rounded-md accordion-item mb-3">
    @if(!$item->children->isEmpty())
    <input type="checkbox" id="toggle-accordion-{{ $item->id }}" class="hidden peer">
    @endif
    <label for="toggle-accordion-{{ $item->id }}" class="accordion-header">
      <div class="flex items-center justify-between gap-2">
        <div class="px-5 py-3 pr-0 flex flex-1 justify-between cursor-pointer">
          {{ $item->translation[0]->title }}
          @if(!$item->children->isEmpty())
          <i class="bi bi-chevron-down"></i>
          @endif
        </div>
        <div class="relative">
          <input type="checkbox" id="toggle-sidemenu-{{ $item->id }}" class="hidden peer" />
          <label for="toggle-sidemenu-{{ $item->id }}" class="cursor-pointer p-3">
            <i class="bi bi-list"></i>
          </label>
          <ul class="absolute right-0 z-10 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden peer-checked:block dropdown-menu-wrap">
            <li><a class="block p-2 px-4 text-sm" href="{{ route('page_edit', $item->translation[0]->slug) }}">@lang('language.edit')</a></li>
          </ul>
        </div>
      </div>
    </label>
    @if ($item->children->isNotEmpty())
    <div id="collapse-{{ $item->id }}" class="px-5 hidden peer-checked:block" data-bs-parent="#accordion-page-{{ $item->id }}">
      <div class="accordion-body">
        @include('admin.pages-list', ['dataPages' => $item->children])
      </div>
    </div>
    @endif
  </div>
</div>
@endforeach