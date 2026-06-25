@php
  $viewOption = session('view_option', 'grid-view');
@endphp

@include('components.filemanager.toolbar', ['path' => $path])

<div class="d-block bg-white p-5">
  @if ($viewOption == 'grid-view')
    @include('components.filemanager.grid-view')
  @endif

  @if ($viewOption == 'list-view')
    @include('components.filemanager.list-view')
  @endif
</div>
