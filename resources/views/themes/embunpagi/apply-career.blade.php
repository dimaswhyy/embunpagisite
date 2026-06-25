@extends('layout')

@section('content')

<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-20 relative">
  <h2 class="text-center mb-10 lg:m-0 font-semibold text-blue text-3xl leading-relaxed manrope pb-5">
    Apply Job Form
  </h2>

  <div class="py-10">
    <div class="pb-5">
      <h3 class="mb-2 font-semibold text-blue text-2xl leading-relaxed manrope">{{ $dataJob->translation[0]->title }}</h3>
      <div class="m-0 leading-relaxed text-sm">
        {!! $dataJob->translation[0]->description !!}
      </div>
    </div>
    <div class="py-7 border-t border-gray-300">
      @if(session('success'))
        <div class="p-3 px-4 bg-green-100 text-green-700 border border-green-700 mb-5 rounded">{{ session('success') }}</div>
      @endif

      <form id="careerForm" action="{{ route('apply.submit') }}" method="POST" class="flex gap-7 flex-col">
        @csrf
        <input type="hidden" name="job_id" value="{{ $dataJob->id }}">
        <div class="flex gap-5 flex-col md:flex-row">
          <div class="w-full md:w-6/12 lg:w-4/12">
            <div class="flex flex-col gap-3">
              <label for="first-name" class="font-bold">
                First Name
                <span class="font-bold text-red-700">*</span>
              </label>
              <div class="bg-white border border-gray-30 rounded-lg overflow-hidden">
                <input id="first-name" type="text" name="first_name" class="border-0 bg-white p-3 w-full rounded-lg" placeholder="Type your first name" tabindex="1" value="{{ old('first_name') }}" />
              </div>
              @error('first_name')
              <div class="text-sm text-red-600">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="w-full md:w-6/12 lg:w-4/12">
            <div class="flex flex-col gap-3">
              <label for="last-name" class="font-bold">
                Last Name
                <span class="font-bold text-red-700">*</span>
              </label>
              <div class="bg-white border border-gray-30 rounded-lg overflow-hidden">
                <input id="last-name" type="text" name="last_name" class="border-0 bg-white p-3 w-full rounded-lg" placeholder="Type your last name" tabindex="2" value="{{ old('last_name') }}" />
              </div>
              @error('last_name')
              <div class="text-sm text-red-600">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>

        <div class="flex gap-5 flex-col md:flex-row">
          <div class="w-full md:w-6/12 lg:w-4/12">
            <div class="flex flex-col gap-3">
              <label for="phone-number" class="font-bold">
                Phone Number
                <span class="font-bold text-red-700">*</span>
              </label>
              <div class="bg-white border border-gray-30 rounded-lg overflow-hidden">
                <input id="phone-number" type="number" name="phone" class="border-0 bg-white p-3 w-full rounded-lg" placeholder="Type your phone number" value="{{ old('phone') }}" tabindex="3" />
              </div>
              @error('phone')
              <div class="text-sm text-red-600">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="w-full md:w-6/12 lg:w-4/12">
            <div class="flex flex-col gap-3">
              <label for="email-address" class="font-bold">
                Email
                <span class="font-bold text-red-700">*</span>
              </label>
              <div class="bg-white border border-gray-30 rounded-lg overflow-hidden">
                <input id="email-address" type="email" name="email" class="border-0 bg-white p-3 w-full rounded-lg" placeholder="Type your email address" value="{{ old('email') }}" tabindex="4" />
              </div>
              @error('email')
              <div class="text-sm text-red-600">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>

        <div class="flex flex-col md:flex-row w-full">
          <div class="w-full md:w-9/12">
            <div class="flex flex-col gap-3">
              <label for="address" class="font-bold">
                Address
                <span class="font-bold text-red-700">*</span>
              </label>
              <div class="bg-white border border-gray-30 rounded-lg overflow-hidden">
                <textarea id="address" name="address" class="border-0 bg-white p-3 w-full rounded-lg" placeholder="Type your address" tabindex="5" rows="5">{{ old('address') }}</textarea>
              </div>
              @error('address')
              <div class="text-sm text-red-600">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>

        <div class="flex flex-col gap-5">
          <label for="job-experience" class="font-bold">
            Job Experience (Latest 3)
          </label>
          <div id="job-experience" class="p-5 rounded-md border border-gray-300">
            <div class="flex flex-col md:flex-row flex-wrap border-b border-gray-300 pb-2">
              <div class="w-full md:w-6/12 lg:w-3/12 p-2">
                <div class="flex flex-col gap-3">
                  <label for="company-1" class="font-bold">
                    Company/School Name
                    <span class="text-xs text-blue">(1)</span>
                    <span class="font-bold text-red-700">*</span>
                  </label>
                  <div class="bg-white border border-gray-300 rounded-lg overflow-hidden">
                    <input id="company-1" type="text" name="job[0][company]" class="border-0 bg-white p-3 w-full rounded-lg" placeholder="Type company/school name" value="{{ old('job.0.company') }}" tabindex="6" />
                  </div>
                  @error('job.0.company')
                  <div class="text-sm text-red-600">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="w-full md:w-6/12 lg:w-3/12 p-2">
                <div class="flex flex-col gap-3">
                  <label for="position-1" class="font-bold">
                    Position
                    <span class="text-xs text-blue">(1)</span>
                    <span class="font-bold text-red-700">*</span>
                  </label>
                  <div class="bg-white border border-gray-300 rounded-lg overflow-hidden">
                    <input id="position-1" type="text" name="job[0][position]" class="border-0 bg-white p-3 w-full rounded-lg" placeholder="Type your position" value="{{ old('job.0.position') }}" tabindex="7" />
                  </div>
                  @error('job.0.position')
                  <div class="text-sm text-red-600">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="w-full md:w-6/12 lg:w-3/12 p-2">
                <div class="flex flex-col gap-3">
                  <label for="start-date-1" class="font-bold">
                    Start Date
                    <span class="text-xs text-blue">(1)</span>
                    <span class="font-bold text-red-700">*</span>
                  </label>
                  <div class="bg-white border border-gray-300 rounded-lg overflow-hidden">
                    <input id="start-date-1" type="date" name="job[0][start_date]" class="border-0 bg-white p-3 w-full rounded-lg" placeholder="Select Start Date" value="{{ old('job.0.start_date') }}" max="{{ \Carbon\Carbon::now()->toDateString() }}" tabindex="8" />
                  </div>
                  @error('job.0.start_date')
                  <div class="text-sm text-red-600">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="w-full md:w-6/12 lg:w-3/12 p-2">
                <div class="flex flex-col gap-3">
                  <label for="end-date-1" class="font-bold">
                    End Date
                    <span class="text-xs text-blue">(1)</span>
                    <span class="font-bold text-red-700">*</span>
                  </label>
                  <div class="bg-white border border-gray-300 rounded-lg overflow-hidden">
                    <input id="end-date-1" type="date" name="job[0][end_date]" class="border-0 bg-white p-3 w-full rounded-lg" placeholder="Select End Date" value="{{ old('job.0.end_date') }}" max="{{ \Carbon\Carbon::now()->toDateString() }}" tabindex="8" />
                  </div>
                  @error('job.0.end_date')
                  <div class="text-sm text-red-600">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>

            <div class="flex flex-col md:flex-row flex-wrap border-b border-gray-300 py-2">
              <div class="w-full md:w-6/12 lg:w-3/12 p-2">
                <div class="flex flex-col gap-3">
                  <label for="company-2" class="font-bold">
                    Company/School Name 
                    <span class="text-xs text-blue">(2)</span>
                  </label>
                  <div class="bg-white border border-gray-300 rounded-lg overflow-hidden">
                    <input id="company-2" type="text" name="job[1][company]" class="border-0 bg-white p-3 w-full rounded-lg" placeholder="Type company/school name" value="{{ old('job.1.company') }}" tabindex="6" />
                  </div>
                </div>
              </div>
              <div class="w-full md:w-6/12 lg:w-3/12 p-2">
                <div class="flex flex-col gap-3">
                  <label for="position-2" class="font-bold">
                    Position
                    <span class="text-xs text-blue">(2)</span>
                  </label>
                  <div class="bg-white border border-gray-300 rounded-lg overflow-hidden">
                    <input id="position-2" type="text" name="job[1][position]" class="border-0 bg-white p-3 w-full rounded-lg" placeholder="Type your position" value="{{ old('job.1.position') }}" tabindex="7" />
                  </div>
                </div>
              </div>
              <div class="w-full md:w-6/12 lg:w-3/12 p-2">
                <div class="flex flex-col gap-3">
                  <label for="start-date-2" class="font-bold">
                    Start Date
                    <span class="text-xs text-blue">(2)</span>
                  </label>
                  <div class="bg-white border border-gray-300 rounded-lg overflow-hidden">
                    <input id="start-date-2" type="date" name="job[1][start_date]" class="border-0 bg-white p-3 w-full rounded-lg" placeholder="Select Start Date" value="{{ old('job.1.start_date') }}" max="{{ \Carbon\Carbon::now()->toDateString() }}" tabindex="8" />
                  </div>
                  @error('job.1.start_date')
                  <div class="text-sm text-red-600">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="w-full md:w-6/12 lg:w-3/12 p-2">
                <div class="flex flex-col gap-3">
                  <label for="end-date-2" class="font-bold">
                    End Date
                    <span class="text-xs text-blue">(2)</span>
                  </label>
                  <div class="bg-white border border-gray-300 rounded-lg overflow-hidden">
                    <input id="end-date-2" type="date" name="job[1][end_date]" class="border-0 bg-white p-3 w-full rounded-lg" placeholder="Select End Date" value="{{ old('job.1.end_date') }}" max="{{ \Carbon\Carbon::now()->toDateString() }}" tabindex="8" />
                  </div>
                  @error('job.1.end_date')
                  <div class="text-sm text-red-600">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>

            <div class="flex flex-col md:flex-row flex-wrap py-2">
              <div class="w-full md:w-6/12 lg:w-3/12 p-2">
                <div class="flex flex-col gap-3">
                  <label for="company-3" class="font-bold">
                    Company/School Name 
                    <span class="text-xs text-blue">(3)</span>
                  </label>
                  <div class="bg-white border border-gray-300 rounded-lg overflow-hidden">
                    <input id="company-3" type="text" name="job[2][company]" class="border-0 bg-white p-3 w-full rounded-lg" placeholder="Type company/school name" value="{{ old('job.2.company') }}" tabindex="6" />
                  </div>
                </div>
              </div>
              <div class="w-full md:w-6/12 lg:w-3/12 p-2">
                <div class="flex flex-col gap-3">
                  <label for="position-3" class="font-bold">
                    Position
                    <span class="text-xs text-blue">(3)</span>
                  </label>
                  <div class="bg-white border border-gray-300 rounded-lg overflow-hidden">
                    <input id="position-3" type="text" name="job[2][position]" class="border-0 bg-white p-3 w-full rounded-lg" placeholder="Type your position" value="{{ old('job.2.position') }}" tabindex="7" />
                  </div>
                </div>
              </div>
              <div class="w-full md:w-6/12 lg:w-3/12 p-2">
                <div class="flex flex-col gap-3">
                  <label for="start-date-3" class="font-bold">
                    Start Date
                    <span class="text-xs text-blue">(3)</span>
                  </label>
                  <div class="bg-white border border-gray-300 rounded-lg overflow-hidden">
                    <input id="start-date-3" type="date" max="{{ \Carbon\Carbon::now()->toDateString() }}" name="job[2][start_date]" class="border-0 bg-white p-3 w-full rounded-lg" value="{{ old('job.2.start_date') }}" placeholder="Select Start Date" tabindex="8" />
                  </div>
                  @error('job.2.start_date')
                  <div class="text-sm text-red-600">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="w-full md:w-6/12 lg:w-3/12 p-2">
                <div class="flex flex-col gap-3">
                  <label for="end-date-3" class="font-bold">
                    End Date
                    <span class="text-xs text-blue">(3)</span>
                  </label>
                  <div class="bg-white border border-gray-300 rounded-lg overflow-hidden">
                    <input id="end-date-3" type="date" max="{{ \Carbon\Carbon::now()->toDateString() }}" name="job[2][end_date]" class="border-0 bg-white p-3 w-full rounded-lg" value="{{ old('job.2.end_date') }}" placeholder="Select End Date" tabindex="8" />
                  </div>
                  @error('job.2.end_date')
                  <div class="text-sm text-red-600">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="flex flex-col gap-5">
          <label for="latest-education" class="font-bold">
            Latest Education
          </label>
          <div id="latest-education" class="p-5 rounded-md border border-gray-300">
            <div class="flex flex-col md:flex-row flex-wrap border-b border-gray-300 pb-2">
              <div class="w-full md:w-4/12 p-2">
                <div class="flex flex-col gap-3">
                  <label for="level-1" class="font-bold">
                    Level
                    <span class="text-xs text-blue">(1)</span>
                    <span class="font-bold text-red-700">*</span>
                  </label>
                  <div class="bg-white border border-gray-300 rounded-lg overflow-hidden">
                    <input id="level-1" type="text" name="education[0][level]" class="border-0 bg-white p-3 w-full rounded-lg" placeholder="Type level education" value="{{ old('education.0.level') }}" tabindex="6" />
                  </div>
                  @error('education.0.level')
                  <div class="text-sm text-red-600">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="w-full md:w-4/12 p-2">
                <div class="flex flex-col gap-3">
                  <label for="institution-1" class="font-bold">
                    Institution
                    <span class="text-xs text-blue">(1)</span>
                    <span class="font-bold text-red-700">*</span>
                  </label>
                  <div class="bg-white border border-gray-300 rounded-lg overflow-hidden">
                    <input id="institution-1" type="text" name="education[0][institution]" class="border-0 bg-white p-3 w-full rounded-lg" placeholder="Type institution" value="{{ old('education.0.institution') }}" tabindex="7" />
                  </div>
                  @error('education.0.institution')
                  <div class="text-sm text-red-600">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="w-full md:w-4/12 p-2">
                <div class="flex flex-col gap-3">
                  <label for="major-1" class="font-bold">
                    Major
                    <span class="text-xs text-blue">(1)</span>
                    <span class="font-bold text-red-700">*</span>
                  </label>
                  <div class="bg-white border border-gray-300 rounded-lg overflow-hidden">
                    <input id="major-1" type="text" name="education[0][major]" class="border-0 bg-white p-3 w-full rounded-lg" placeholder="Type major" value="{{ old('education.0.major') }}" tabindex="7" />
                  </div>
                  @error('education.0.major')
                  <div class="text-sm text-red-600">{{ $message }}</div>
                  @enderror
                </div>
              </div>              
            </div>
            <div class="flex flex-col md:flex-row flex-wrap border-b border-gray-300 pb-2">
              <div class="w-full md:w-4/12 p-2">
                <div class="flex flex-col gap-3">
                  <label for="level-2" class="font-bold">
                    Level
                    <span class="text-xs text-blue">(2)</span>
                  </label>
                  <div class="bg-white border border-gray-300 rounded-lg overflow-hidden">
                    <input id="level-2" type="text" name="education[1][level]" class="border-0 bg-white p-3 w-full rounded-lg" placeholder="Type level education"value="{{ old('education.1.level') }}" tabindex="6" />
                  </div>
                </div>
              </div>
              <div class="w-full md:w-4/12 p-2">
                <div class="flex flex-col gap-3">
                  <label for="institution-2" class="font-bold">
                    Institution
                    <span class="text-xs text-blue">(2)</span>
                  </label>
                  <div class="bg-white border border-gray-300 rounded-lg overflow-hidden">
                    <input id="institution-2" type="text" name="education[1][institution]" class="border-0 bg-white p-3 w-full rounded-lg" placeholder="Type institution"value="{{ old('education.1.institution') }}" tabindex="7" />
                  </div>
                </div>
              </div>
              <div class="w-full md:w-4/12 p-2">
                <div class="flex flex-col gap-3">
                  <label for="major-2" class="font-bold">
                    Major
                    <span class="text-xs text-blue">(2)</span>
                  </label>
                  <div class="bg-white border border-gray-300 rounded-lg overflow-hidden">
                    <input id="major-2" type="text" name="education[1][major]" class="border-0 bg-white p-3 w-full rounded-lg" placeholder="Type major"value="{{ old('education.1.major') }}" tabindex="7" />
                  </div>
                </div>
              </div>              
            </div>
            <div class="flex flex-col md:flex-row flex-wrap">
              <div class="w-full md:w-4/12 p-2">
                <div class="flex flex-col gap-3">
                  <label for="level-2" class="font-bold">
                    Level
                    <span class="text-xs text-blue">(3)</span>
                  </label>
                  <div class="bg-white border border-gray-300 rounded-lg overflow-hidden">
                    <input id="level-3" type="text" name="education[2][level]" class="border-0 bg-white p-3 w-full rounded-lg" placeholder="Type level education" value="{{ old('education.2.level') }}" tabindex="6" />
                  </div>
                </div>
              </div>
              <div class="w-full md:w-4/12 p-2">
                <div class="flex flex-col gap-3">
                  <label for="institution-3" class="font-bold">
                    Institution
                    <span class="text-xs text-blue">(3)</span>
                  </label>
                  <div class="bg-white border border-gray-300 rounded-lg overflow-hidden">
                    <input id="institution-3" type="text" name="education[2][institution]" class="border-0 bg-white p-3 w-full rounded-lg" placeholder="Type institution" value="{{ old('education.2.institution') }}" tabindex="7" />
                  </div>
                </div>
              </div>
              <div class="w-full md:w-4/12 p-2">
                <div class="flex flex-col gap-3">
                  <label for="major-3" class="font-bold">
                    Major
                    <span class="text-xs text-blue">(3)</span>
                  </label>
                  <div class="bg-white border border-gray-300 rounded-lg overflow-hidden">
                    <input id="major-3" type="text" name="education[2][major]" class="border-0 bg-white p-3 w-full rounded-lg" placeholder="Type major" value="{{ old('education.2.major') }}" tabindex="7" />
                  </div>
                </div>
              </div>              
            </div>
          </div>
        </div>

        <div class="flex flex-col gap-5">
          <label for="latest-education" class="font-bold">
            English Proficiency
            <span class="font-bold text-red-700">*</span>
          </label>
          <div class="flex items-center space-x-4 py-2">
            <label class="block cursor-pointer">
              <input type="radio" name="english_proficiency" class="hidden peer" value="Very Basic" selected="selected" />
              <span class="p-2 px-5 border border-gray-300 rounded-full peer-checked:border-blue peer-checked:bg-blue peer-checked:text-white">Very Basic (Introduction)</span>
            </label>
            <label class="block cursor-pointer">
              <input type="radio" name="english_proficiency" class="hidden peer" value="Basic" />
              <span class="p-2 px-5 border border-gray-300 rounded-full peer-checked:border-blue peer-checked:bg-blue peer-checked:text-white">Basic (Daily Conversation)</span>
            </label>
            <label class="block cursor-pointer">
              <input type="radio" name="english_proficiency" class="hidden peer" value="Intermediate" />
              <span class="p-2 px-5 border border-gray-300 rounded-full peer-checked:border-blue peer-checked:bg-blue peer-checked:text-white">Intermediate (teaching using full english)</span>
            </label>
            <label class="block cursor-pointer">
              <input type="radio" name="english_proficiency" class="hidden peer" value="Advanced" />
              <span class="p-2 px-5 border border-gray-300 rounded-full peer-checked:border-blue peer-checked:bg-blue peer-checked:text-white">Advanced (Professional)</span>
            </label>
          </div>
          @error('english_proficiency')
          <div class="text-sm text-red-600">{{ $message }}</div>
          @enderror
        </div>

        <div class="flex gap-5 flex-col md:flex-row">
          <div class="w-full md:w-6/12 lg:w-4/12">
            <div class="flex flex-col gap-3">
              <label for="latest-salary" class="font-bold">
                Latest Salary
                <span class="font-bold text-red-700">*</span>
              </label>
              <div class="bg-white border border-gray-30 rounded-lg overflow-hidden">
                <input id="latest-salary" type="number" name="latest_salary" class="border-0 bg-white p-3 w-full rounded-lg" placeholder="Type latest salary" value="{{ old('latest_salary') }}" tabindex="31" />
              </div>
              @error('latest_salary')
              <div class="text-sm text-red-600">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="w-full md:w-6/12 lg:w-4/12">
            <div class="flex flex-col gap-3">
              <label for="salary-expectation" class="font-bold">
                Salary Expectation
                <span class="font-bold text-red-700">*</span>
              </label>
              <div class="bg-white border border-gray-30 rounded-lg overflow-hidden">
                <input id="salary-expectation" type="number" name="salary_expectation" class="border-0 bg-white p-3 w-full rounded-lg" placeholder="Type salary expectation" value="{{ old('salary_expectation') }}" tabindex="32" />
              </div>
              @error('salary_expectation')
              <div class="text-sm text-red-600">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>

        <div class="border-2 border-dashed border-gray-300 rounded-xl p-5 flex flex-col gap-5">
          <p class="m-0">I certify that answers given herein are true and complete to the best of my knowledge.</p>

          <p class="m-0">I authorize Embun Pagi School to make such investigations and inquiries of my personal and employment history and other related matters as may be necessary in arriving at an employment decision. I hereby release employers, schools or persons from all liability in responding to inquiries in connection with my application.</p>

          <p class="m-0">In the event of employment, I understand that false or misleading information given in my application or interview (s) may result in discharge. I understand, also, I am required to abide by all rules and regulations of the Company.</p>
        </div>

        <div class="flex gap-3 items-center">
          <label class="flex items-center space-x-2 cursor-pointer">
            <input type="checkbox" name="agree" value="1" class="hidden peer" />
            <div class="w-5 h-5 rounded-md border-2 border-gray-400 flex items-center justify-center peer-checked:bg-blue peer-checked:border-blue">
              <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
            </div>
            <span class="font-bold">I Agree</span>
          </label>
          @error('agree')
          <div class="text-sm text-red-600">{{ $message }}</div>
          @enderror
        </div>

        <input type="text" name="purpose_to_empty" style="display: none;" />
        <button id="submitButton" type="submit" class="bg-orange text-white font-semibold p-1 pl-8 flex justify-between gap-5 items-center rounded-full w-fit min-w-52 my-5">
          <span id="submitText">Submit Form</span>
          <div class="w-10 h-10 bg-white p-1 flex items-center justify-center rounded-full">
            <i class="bi bi-arrow-right text-orange text-xl"></i>
          </div>
        </button>
      </form>
    </div>
  </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('careerForm');
        const submitButton = document.getElementById('submitButton');
        const submitText = document.getElementById('submitText');

        form.addEventListener('submit', function () {
            // Disable the button after form submission
            submitButton.disabled = true;
            submitText.innerText = 'Submitting...'; // Optional: Change button text
        });
    });
</script>

@stop