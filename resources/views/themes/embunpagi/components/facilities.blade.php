<section class="py-10 pb-20 relative">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative">
    <h2 class="text-center mb-10 lg:m-0 font-semibold text-blue text-3xl leading-relaxed manrope pb-5">Facilities</h2>
    <div class="flex flex-wrap -mx-5 pb-10">
      @if (count($dataFacilities) > 0)
      @foreach ($dataFacilities as $item)
      <a href="{{ asset('storage') }}/{{ $item->translation[0]->image }}" data-fancybox="gallery" data-caption="Block Center" class="w-full lg:w-4/12 p-5 item group-{{ $item->facilities_category_id }}">
        <img class="w-full h-56 object-cover rounded-2xl mb-3" src="{{ asset('storage') }}/{{ $item->translation[0]->image }}" alt="{{ $item->translation[0]->image }}" />
        <p class="text-center m-0">{{ $item->translation[0]->title }}</p>
      </a>
      @endforeach
      @endif
    </div>
    <a href="{{ route('page_front', 'facilities') }}" class="bg-orange text-white font-semibold p-1 pl-8 flex justify-between gap-5 items-center rounded-full w-fit min-w-52 m-auto">
      <span>View More</span>
      <div class="w-10 h-10 bg-white p-1 flex items-center justify-center rounded-full">
        <i class="bi bi-arrow-right text-orange text-xl"></i>
      </div>
    </a>
  </div>
</section>