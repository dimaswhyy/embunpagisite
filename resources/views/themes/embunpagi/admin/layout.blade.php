<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <base href="{{ URL::to('/'); }}">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Embun Pagi Administrator Page</title>
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

  @if (env('APP_ENV') === 'production')
    @php
      // in production
      $cwd = getcwd();
      $cssName = basename(glob($cwd . '/build/assets/*.css')[0], '.css');
      $jsName = basename(glob($cwd . '/build/assets/*.js')[0], '.js');
      $css = env('USE_CDN_GIT') ? env('CDN_LINK') . '/build/assets/' . $cssName . '.css' : asset('build/assets/' . $cssName . '.css');
      $js = env('USE_CDN_GIT') ? env('CDN_LINK') . '/build/assets/' . $jsName . '.js' : asset('build/assets/' . $jsName . '.js');
    @endphp
    <link rel="stylesheet" href="{{ $css }}?v=1.0.0" id="css">
  @else
    @vite('resources/css/app.css')
  @endif

  <script type="text/javascript">
    let csrfToken = "{{ csrf_token() }}";
    let baseHref = "{{ config('app.url') }}";
    let adminUrl = "{{ env('ADMIN_PATH') }}";
    const storagePath = "{{ asset('storage') }}";
  </script>
</head>

<body class="h-full bg-gray-100 m-0">

  <div class="min-h-full">
    @auth
    <header class="bg-white shadow-sm lg:static lg:overflow-y-visible py-3">
      <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative flex justify-between lg:gap-8">
          <div class="flex md:inset-y-0 md:left-0 lg:static xl:col-span-2">
            <div class="flex flex-shrink-0 items-center">
              <a href="{{ route('dashboard') }}">
                <img class="block h-8 w-auto" src="{{ env('USE_CDN_GIT') ? env('CDN_LINK') . '/img/Logo-EPIS-Horizontal.png' : asset('img/Logo-EPIS-Horizontal.png') }}" alt="Embun Pagi School">
              </a>
            </div>
          </div>

          <div class="flex items-center md:inset-y-0 md:right-0 lg:hidden">
            <!-- Mobile menu button -->
            <button type="button" class="-mx-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-rose-500">
              <span class="sr-only">Open menu</span>
              <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
              </svg>
              <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
              </svg>
            </button>
          </div>
          <div class="hidden lg:flex lg:items-center lg:justify-end xl:col-span-4">
            <div class="relative ml-5 flex-shrink-0 dropdown-wrap">
              <button type="button" class="flex rounded-full bg-white focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2 dropdown-trigger" id="user-menu-button">
                <span class="sr-only">Open user menu</span>
                <span>{{ Auth::user()->name }}</span>
              </button>

              <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden dropdown-menu-wrap">
                <a href="{{ route('myprofile') }}" class="block py-2 px-4 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">@lang('language.edit') @lang('language.profile')</a>
                <a href="{{ route('changePassword') }}" class="block py-2 px-4 text-sm text-gray-700">@lang('language.change') @lang('language.password')</a>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="border-0 bg-transparent block py-2 px-4 text-sm text-gray-700" onclick="event.preventDefault(); this.closest('form').submit();">Sign out</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="py-10">
      <div class="mx-auto sm:px-6 lg:grid lg:grid-cols-12 lg:gap-20 lg:px-8">
        <div class="hidden lg:col-span-2 lg:block xl:col-span-2">
          <nav aria-label="Sidebar" class="sticky top-4 divide-y divide-gray-300">
            <div class="space-y-1 pb-8">
              <a href="{{ route('dashboard') }}" class="@if($page == 'dashboard') bg-gray-200 @endif text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                <i class="bi bi-house-door text-lg"></i>
                <span class="truncate ml-3">Dashboard</span>
              </a>
              <a href="{{ route('pages') }}" class="@if($page == 'pages') bg-gray-200 @endif text-gray-700 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                <i class="bi bi-files text-lg"></i>
                <span class="truncate ml-3">Pages</span>
              </a>
              <a href="{{ route('slideshow') }}" class="@if($page == 'slideshow') bg-gray-200 @endif text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                <i class="bi bi-grid text-lg"></i>
                <span class="truncate ml-3">Slideshow</span>
              </a>
              <a href="{{ route('why_section') }}" class="@if($page == 'why_section') bg-gray-200 @endif text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                <i class="bi bi-grid text-lg"></i>
                <span class="truncate ml-3">Why Section</span>
              </a>
              <a href="{{ route('enrollnow_section') }}" class="@if($page == 'enrollnow_section') bg-gray-200 @endif text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                <i class="bi bi-grid text-lg"></i>
                <span class="truncate ml-3">Enroll Now Section</span>
              </a>
              <a href="{{ route('publication_category') }}" class="@if($page == 'news_category') bg-gray-200 @endif text-gray-700 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                <i class="bi bi-files text-lg"></i>
                <span class="truncate ml-3">Publication Category</span>
              </a>
              <a href="{{ route('publication') }}" class="@if($page == 'news') bg-gray-200 @endif text-gray-700 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                <i class="bi bi-files text-lg"></i>
                <span class="truncate ml-3">Publications</span>
              </a>
              <a href="{{ route('facilities_category') }}" class="@if($page == 'facilities_category') bg-gray-200 @endif text-gray-700 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                <i class="bi bi-files text-lg"></i>
                <span class="truncate ml-3">Facilities Category</span>
              </a>
              <a href="{{ route('facilities') }}" class="@if($page == 'facilities') bg-gray-200 @endif text-gray-700 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                <i class="bi bi-files text-lg"></i>
                <span class="truncate ml-3">Facilities</span>
              </a>
              <a href="{{ route('testimonials') }}" class="@if($page == 'testimonials') bg-gray-200 @endif text-gray-700 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                <i class="bi bi-files text-lg"></i>
                <span class="truncate ml-3">Testimonials</span>
              </a>
              <a href="{{ route('gallery') }}" class="@if($page == 'gallery') bg-gray-200 @endif text-gray-700 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                <i class="bi bi-files text-lg"></i>
                <span class="truncate ml-3">Gallery</span>
              </a>
              <a href="{{ route('booking_school_tour') }}" class="@if($page == 'booking_school_tour') bg-gray-200 @endif text-gray-700 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                <i class="bi bi-files text-lg"></i>
                <span class="truncate ml-3">Booking School Tour</span>
              </a>
              <a href="{{ route('job_lists') }}" class="@if($page == 'job_lists') bg-gray-200 @endif text-gray-700 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                <i class="bi bi-files text-lg"></i>
                <span class="truncate ml-3">Job Lists</span>
              </a>
              <a href="{{ route('apply_career_admin') }}" class="@if($page == 'apply_career') bg-gray-200 @endif text-gray-700 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                <i class="bi bi-files text-lg"></i>
                <span class="truncate ml-3">Apply Career</span>
              </a>
              <a href="{{ route('filemanager') }}" class="@if($page == 'filemanager') bg-gray-200 @endif text-gray-700 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                <i class="bi bi-image text-lg"></i>
                <span class="truncate ml-3">File Manager</span>
              </a>
            </div>
          </nav>
        </div>
        <main class="col-span-10">
          @yield('content')
        </main>
      </div>
    </div>
    @else
    @yield('content')
    @endif
  </div>

  @include('components.filemanager.modal')
  @include('components.filemanager.modal-add-new-folder')

  @if (env('APP_ENV') === 'production')
    <script type="module" src="{{ $js }}?ver=1.0.0" id="js"></script>
  @else 
    @vite('resources/js/app.js')
  @endif

  @stack('script')

</body>

</html>