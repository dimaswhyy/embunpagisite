@extends('admin.layout')

@section('content')
<div class="content-page">
  <h4>@lang('language.change') @lang('language.password')</h4>

  <div class="row my-4">
    <div class="col-md-4">
      @if ($message = Session::get('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      @if ($message = Session::get('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      <form action="{{ route('updatePassword') }}" method="post" class="form-horizontal">
        @csrf
        <div class="form-group">
          <label for="password-current" class="form-label">@lang('language.password') @lang('language.now')</label>
          <div class="input-group">
            <input id="password-current" type="password" name="current_password" class="form-control password-input" aria-label="@lang('language.password') @lang('language.now')" aria-describedby="password-current-addon" />
            <span class="input-group-text show-hide-password" id="password-current-addon">
              <i class="bi bi-eye"></i>
            </span>
          </div>
        </div>
        <div class="form-group">
          <label for="password-new" class="form-label">@lang('language.password') @lang('language.new')</label>
          <div class="input-group">
            <input id="password-new" type="password" name="new_password" class="form-control password-input" aria-label="@lang('language.password') @lang('language.new')" aria-describedby="password-new-addon" />
            <span class="input-group-text show-hide-password" id="password-new-addon">
              <i class="bi bi-eye"></i>
            </span>
          </div>
        </div>
        <div class="form-group">
          <label for="password-confirm" class="form-label">@lang('language.confirm')  @lang('language.password') @lang('language.new')</label>
          <div class="input-group">
            <input id="password-confirm" type="password" name="confirm_password" class="form-control password-input" aria-label="@lang('language.confirm')  @lang('language.password') @lang('language.new')" aria-describedby="password-confirm-addon" />
            <span class="input-group-text show-hide-password" id="password-confirm-addon">
              <i class="bi bi-eye"></i>
            </span>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">@lang('language.save')</button>
        </div>
      </form>
    </div>
  </div>
</div>
@stop

@push('script')
<script type="text/javascript">
  $('.show-hide-password').on('click', function() {
    const thisId = $(this).attr('id');
    const getIdInput = thisId.replace('-addon', '');
    const thisIdInput = $('#' + getIdInput);
    const getTypeInput = thisIdInput.attr('type');
    if (getTypeInput === 'password') {
      thisIdInput.attr('type', 'text');
      $(this).find('.bi').removeClass('bi-eye');
      $(this).find('.bi').addClass('bi-eye-slash');
    } else {
      thisIdInput.attr('type', 'password');
      $(this).find('.bi').removeClass('bi-eye-slash');
      $(this).find('.bi').addClass('bi-eye');
    }
  });
</script>
@endpush