@extends('admin.layout')

@section('content')

<div class="bg-white px-4 py-6 shadow sm:rounded-lg sm:p-6">
  <h4 class="mb-8 text-xl font-semibold">Apply Career</h4>

  <div class="pb-5 w-full lg:w-6/12">
    <table width="100%" cellspacing="0" cellpadding="0" border="0" class="text-sm">
      <tbody>
        <tr>
          <td class="p-1 font-bold">Position</td>
          <td class="p-1">:</td>
          <td class="p-1">{{ $jobData->translation[0]->title }}</td>
        </tr>
        <tr>
          <td class="p-1 font-bold">First Name</td>
          <td class="p-1">:</td>
          <td class="p-1">{{ $data->first_name }}</td>
        </tr>
        <tr>
          <td class="p-1 font-bold">Last Name</td>
          <td class="p-1">:</td>
          <td class="p-1">{{ $data->last_name }}</td>
        </tr>
        <tr>
          <td class="p-1 font-bold">Phone</td>
          <td class="p-1">:</td>
          <td class="p-1">{{ $data->phone }}</td>
        </tr>
        <tr>
          <td class="p-1 font-bold">Email</td>
          <td class="p-1">:</td>
          <td class="p-1">{{ $data->email }}</td>
        </tr>
        <tr>
          <td class="p-1 font-bold">Address</td>
          <td class="p-1">:</td>
          <td class="p-1">{{ $data->address }}</td>
        </tr>
        <tr>
          <td class="p-1 font-bold">English Proficiency</td>
          <td class="p-1">:</td>
          <td class="p-1">{{ $data->english_proficiency }}</td>
        </tr>
        <tr>
          <td class="p-1 font-bold">Latest Salary</td>
          <td class="p-1">:</td>
          <td class="p-1">{{ $data->latest_salary }}</td>
        </tr>
        <tr>
          <td class="p-1 font-bold">Salary Expectation</td>
          <td class="p-1">:</td>
          <td class="p-1">{{ $data->salary_expectation }}</td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="py-5">
    <h4 class="font-bold">Job Experience (Latest 3)</h4>
    <table width="100%" cellspacing="0" cellpadding="0" class="border-t border-gray-300 my-3 text-sm">
      <thead>
        <th class="p-2 text-left border-b border-gray-300">Company/School Name</th>
        <th class="p-2 text-left border-b border-gray-300">Position</th>
        <th class="p-2 text-left border-b border-gray-300">Start Date</th>
        <th class="p-2 text-left border-b border-gray-300">End Date</th>
      </thead>
      <tbody>
        @foreach($data->experiences as $item)
        <tr>
          <td class="p-2 text-left border-b border-gray-300">{{ $item->company_name }}</td>
          <td class="p-2 text-left border-b border-gray-300">{{ $item->position }}</td>
          <td class="p-2 text-left border-b border-gray-300">{{ $item->start_date != null ? \Carbon\Carbon::parse($item->start_date)->format('d-M-Y') : "" }}</td>
          <td class="p-2 text-left border-b border-gray-300">{{ $item->end_date != null ? \Carbon\Carbon::parse($item->end_date)->format('d-M-Y') : "" }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="py-5">
    <h4 class="font-bold">Latest Education</h4>
    <table width="100%" cellspacing="0" cellpadding="0" class="border-t border-gray-300 my-3 text-sm">
      <thead>
        <th class="p-2 text-left border-b border-gray-300">Level</th>
        <th class="p-2 text-left border-b border-gray-300">Institution</th>
        <th class="p-2 text-left border-b border-gray-300">Major</th>
      </thead>
      <tbody>
        @foreach($data->education as $item)
        <tr>
          <td class="p-2 text-left border-b border-gray-300">{{ $item->level }}</td>
          <td class="p-2 text-left border-b border-gray-300">{{ $item->institution }}</td>
          <td class="p-2 text-left border-b border-gray-300">{{ $item->major }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@stop