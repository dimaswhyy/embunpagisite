@extends('admin.layout')

@section('content')
<div class="content-page">
  <h4>@lang('language.edit') @lang('language.profile')</h4>

  <div class="row my-4">
    <div class="col-md-4">
      @if ($message = Session::get('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      <form action="{{ route('updateProfile') }}" method="post" class="form-horizontal">
        @csrf
        <div class="form-group">
          <label for="name-input" class="form-label">@lang('language.name')</label>
          <input id="name-input" type="text" name="name" class="form-control" value="{{ $dataUser->name }}" />
        </div>
        <div class="form-group">
          <label for="email-input" class="form-label">@lang('language.email_address')</label>
          <input id="email-input" type="email" name="email" class="form-control" value="{{ $dataUser->email }}" />
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">@lang('language.save')</button>
        </div>
      </form>
    </div>
  </div>
</div>
@stop