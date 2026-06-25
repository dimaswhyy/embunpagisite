@extends('admin.layout')

@section('content')
<div class="bg-white px-4 py-6 shadow sm:rounded-lg sm:p-6">
  <h4>@lang('language.welcome') {{ Auth::user()->name }}</h4>
</div>
@stop