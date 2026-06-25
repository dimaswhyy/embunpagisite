@foreach ($dataPages as $itemMenu)
<div class="relative @if($itemMenu->children_menu->isNotEmpty()) group @endif">
  <a 
    @if ($itemMenu->children_menu->isNotEmpty())
    href="javascript:void(0)"
    @else
    href="{{ route('page_front', $itemMenu->translation[0]->slug) }}" 
    @endif
    class="text-sm font-semibold hover:text-blue p-2 px-5 block whitespace-nowrap @if($lastSegment == $itemMenu->translation[0]->slug) text-blue @endif"
  >
    {{ $itemMenu->translation[0]->title }}
    @if ($itemMenu->children_menu->isNotEmpty())
    <i class="bi bi-chevron-down text-xs pl-2 lg:p-0"></i>
    @endif
  </a>
  @if ($itemMenu->children_menu->isNotEmpty())
  <div class="relative pl-5 lg:pl-0 lg:absolute lg:z-30 lg:top-9 lg:left-5 bg-white lg:py-3 lg:rounded-lg lg:shadow-xl lg:hidden group-hover:block">
    @include('menu-list', ['dataPages' => $itemMenu->children_menu])
  </div>
  @endif
  
</div>
@endforeach