@extends('admin.layout')

@section('content')

<div class="min-h-screen bg-gray-100 flex flex-col justify-center sm:py-12">
  <div class="p-10 xs:p-0 mx-auto md:w-full md:max-w-md">
    <img src="{{ env('USE_CDN_GIT') ? env('CDN_LINK') . '/img/Logo-EPIS-Horizontal.png' : asset('img/Logo-EPIS-Horizontal.png') }}" alt="Embun Pagi School" class="d-block m-auto py-3 h-20" />
    <div class="bg-white shadow w-full rounded-lg divide-y divide-gray-200">
      <form action="{{ route('submit_login') }}" method="post" class="px-5 py-7">
        @csrf
        <label for="email-input" class="font-semibold text-sm text-gray-600 pb-1 block">E-mail</label>
        <div class="border rounded-lg mt-1 mb-5 w-full overflow-hidden">
          <input id="email-input" type="email" name="email" class="border-0 rounded-lg px-3 py-2 text-sm w-full" />
        </div>

        <label for="password-input" class="font-semibold text-sm text-gray-600 pb-1 block">Password</label>
        <div class="border rounded-lg mt-1 mb-5 w-full overflow-hidden flex items-center">
          <input id="password-input" type="password" name="password" class="border-0 rounded-lg rounded-r-none px-3 py-2 text-sm w-full" />
          <span class="d-block px-3 cursor-pointer" id="password-addon">
            <i class="bi bi-eye"></i>
          </span>
        </div>

        <button type="submit" class="transition duration-200 bg-blue-500 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center inline-block">
          <span class="inline-block mr-2">Login</span>
        </button>

      </form>
    </div>
  </div>
</div>
@stop