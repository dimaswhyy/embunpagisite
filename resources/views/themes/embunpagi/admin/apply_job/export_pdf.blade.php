<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 12px;
    }
    table th,
    table td {
      border: 1px solid #ccc;
      padding: 5px;
    }
  </style>
</head>
<body>
  <table cellpadding="0" cellspacing="0">
    <thead>
      <th>No.</th>
      <th>First Name</th>
      <th>Last Name</th> 
      <th>Position</th>
      <th>Phone</th>
      <th>Email</th>
      <th>English Proficiency</th>
      <th>Latest Salary</th>
      <th>Salary Expectation</th>
      <th>Created At</th>
    </thead>
    <tbody>
      @foreach ($data as $item)
      <tr id="data-id-{{ $item['id'] }}">
        <td>{{ $item['no'] }}</td>
        <td>{{ $item['first_name'] }}</td>
        <td>{{ $item['last_name'] }}</td>
        <td>{{ $item['job']['title'] }}</td>
        <td>{{ $item['phone'] }}</td>
        <td>
          <a href="mailto:{{ $item['email'] }}">
          {{ $item['email'] }}
          </a>
        </td>
        <td>{{ $item['english_proficiency'] }}</td>
        <td>{{ $item['latest_salary'] }}</td>
        <td>{{ $item['salary_expectation'] }}</td>
        <td>
          {{ \Carbon\Carbon::parse($item['created_at'])->format('d-M-Y H:m') }}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>