@extends('admin.layout')

@section('content')
<div class="bg-white px-4 py-6 shadow sm:rounded-lg sm:p-6">
  <div class="flex justify-between items-center">
    <h4 class="font-bold text-xl text-blue">@lang('language.pages')</h4>
    <a href="{{ route('page_add') }}" class="transition duration-200 bg-blue hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white px-5 py-2 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center">Add Page</a>
  </div>
  
  @if (session('success'))
  <div class="my-5 px-5 py-2 text-white bg-green-500 rounded text-sm flex justify-between alert-custom">
    <div>{{ session('success') }}</div>
    <button type="button" class="bg-none border-0 p-0 text-white alert-close">
      <i class="bi bi-x-lg"></i>
    </button>
  </div>
  @endif

  <div class="data-list-pages mt-5">
    @include('admin.pages-list')
  </div>
</div>
@stop