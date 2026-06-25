@extends('layout')

@section('content')

<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-20 relative">
  <h2 class="text-center mb-10 lg:m-0 font-semibold text-blue text-3xl leading-relaxed manrope pb-5">Booking School Tour</h2>

  <div class="w-full lg:w-7/12 m-auto block py-10">
    @if(session('success'))
      <div class="p-3 px-4 bg-green-100 text-green-700 border border-green-700 mb-5 rounded">{{ session('success') }}</div>
    @endif
    
    <form action="{{ route('visit.submit') }}" method="POST" class="flex gap-7 flex-col">
      @csrf
      <div class="flex gap-5 flex-col md:flex-row">
        <div class="w-full md:w-6/12">
          <div class="flex flex-col gap-3">
            <label for="child-name" class="font-bold">
              Child's Name
              <span class="font-bold text-red-700">*</span>
            </label>
            <div class="bg-white border border-gray-30 rounded-lg overflow-hidden">
              <input id="child-name" type="text" name="child_name" class="border-0 bg-white p-3 w-full rounded-lg" placeholder="Type your child name" tabindex="1" value="{{ old('child_name') }}" />
            </div>
            @error('child_name')
            <div class="text-sm text-red-600">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="w-full md:w-6/12">
          <div class="flex flex-col gap-3">
            <label for="parent-name" class="font-bold">
              Parent's Name
              <span class="font-bold text-red-700">*</span>
            </label>
            <div class="bg-white border border-gray-30 rounded-lg overflow-hidden">
              <input id="parent-name" type="text" name="parent_name" class="border-0 bg-white p-3 w-full rounded-lg" placeholder="Type parent name" tabindex="2" value="{{ old('parent_name') }}" />
            </div>
            @error('parent_name')
            <div class="text-sm text-red-600">{{ $message }}</div>
            @enderror
          </div>
        </div>
      </div>
      <div class="flex gap-5 flex-col md:flex-row">
        <div class="w-full md:w-6/12">
          <div class="flex flex-col gap-3">
            <label for="phone-number" class="font-bold">
              Phone
              <span class="font-bold text-red-700">*</span>
            </label>
            <div class="bg-white border border-gray-30 rounded-lg overflow-hidden">
              <input id="phone-number" type="number" name="phone" class="border-0 bg-white p-3 w-full rounded-lg" placeholder="Type parent phone number" tabindex="3" value="{{ old('phone') }}" />
            </div>
            @error('phone')
            <div class="text-sm text-red-600">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="w-full md:w-6/12">
          <div class="flex flex-col gap-3">
            <label for="email-address" class="font-bold">
              Email
              <span class="font-bold text-red-700">*</span>
            </label>
            <div class="bg-white border border-gray-30 rounded-lg overflow-hidden">
              <input id="email-address" type="email" name="email" class="border-0 bg-white p-3 w-full rounded-lg" placeholder="Type parent email" tabindex="4" value="{{ old('email') }}" />
            </div>
            @error('email')
            <div class="text-sm text-red-600">{{ $message }}</div>
            @enderror
          </div>
        </div>
      </div>
      <div class="flex gap-5 flex-col md:flex-row">
        <div class="w-full">
          <div class="flex flex-col gap-3">
            <label for="school-from" class="font-bold">
              Name of School
            </label>
            <div class="bg-white border border-gray-30 rounded-lg overflow-hidden">
              <input id="school-from" type="text" name="school_from" class="border-0 bg-white p-3 w-full rounded-lg" placeholder="Type name of school" tabindex="5" value="{{ old('school_from') }}" />
            </div>
          </div>
        </div>
      </div>
      <div class="flex gap-5 flex-col md:flex-row">
        <div class="w-full md:w-6/12">
          <div class="flex flex-col gap-3">
            <label for="select-program" class="font-bold">
              Select Program
              <span class="font-bold text-red-700">*</span>
            </label>
            <div class="bg-white border border-gray-30 pr-5 rounded-lg overflow-hidden">
              <select id="select-program" name="program" class="border-0 bg-white p-3 w-full rounded-lg focus:outline-none" tabindex="6">
                <option value="">Select Program</option>
                <option value="Nursery and Kindergarten" @if(old('program') === 'Nursery and Kindergarten') selected="selected" @endif>Nursery &amp; Kindergarten</option>
                <option value="Primary School" @if(old('program') === 'Primary School') selected="selected" @endif>Primary School</option>
                <option value="Junior High School" @if(old('program') === 'Junior High School') selected="selected" @endif>Junior High School</option>
                <option value="Senior High School" @if(old('program') === 'Senior High School') selected="selected" @endif>Senior High School</option>
              </select>
            </div>
            @error('program')
            <div class="text-sm text-red-600">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="w-full md:w-6/12">
          <div class="flex flex-col gap-3">
            <label for="available-date" class="font-bold">
              Choose Available Date
              <span class="font-bold text-red-700">*</span>
            </label>
            <div class="bg-white border border-gray-30 rounded-lg overflow-hidden">
              <input id="available-date" type="date" name="visit_date" class="border-0 bg-white p-3 w-full rounded-lg" placeholder="Select Date" tabindex="7" min="{{ \Carbon\Carbon::now()->toDateString() }}" value="{{ old('visit_date') }}" />
            </div>
            @error('visit_date')
            <div class="text-sm text-red-600">{{ $message }}</div>
            @enderror
          </div>
        </div>
      </div>
      <div class="flex gap-5 flex-col md:flex-row">
        <div class="w-full md:w-6/12">
          <div class="flex flex-col gap-3">
            <label for="estimated-visit-time" class="font-bold">
              Estimated Visit Time
              <span class="font-bold text-red-700">*</span>
            </label>
            <div class="bg-white border border-gray-30 rounded-lg overflow-hidden">
              <input id="estimated-visit-time" type="time" name="visit_time" class="border-0 bg-white p-3 w-full rounded-lg" placeholder="Select Date" tabindex="8" min="08:00" max="16:00" step="900" value="{{ old('visit_time') }}" />
            </div>
            @error('visit_time')
            <div class="text-sm text-red-600">{{ $message }}</div>
            @enderror
          </div>
        </div>
      </div>
      <input type="text" name="purpose_to_empty" style="display: none;" />
      <div class="flex gap-5 flex-col md:flex-row">
        <div class="w-full md:w-6/12">
          <button type="submit" class="bg-orange text-white font-semibold p-1 pl-8 flex justify-between gap-5 items-center rounded-full w-fit min-w-52 my-5">
            <span>Submit Form</span>
            <div class="w-10 h-10 bg-white p-1 flex items-center justify-center rounded-full">
              <i class="bi bi-arrow-right text-orange text-xl"></i>
            </div>
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

@stop