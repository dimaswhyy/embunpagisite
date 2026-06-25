@extends('admin.layout')

@section('content')
<div id="file-manager-wrapper" class="block" data-url="{{ route('filemanager.loadModal') }}?path=">
  <h4 class="mb-5">File Manager</h4>
  <div id="fileManagerContent" class="block">
    @include('components.filemanager.content')
  </div>
</div>
@endsection
