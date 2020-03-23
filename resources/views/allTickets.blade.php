@extends('layouts.app_inside')

@section('body')
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Topic</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($tickets as $ticket)
      <tr>
        <th scope="row">{{ $ticket -> id }}</th>
        <td>{{ $ticket -> title }}</td>
        <td>{{ \Illuminate\Support\Str::limit($ticket -> body, $limit = 30, $end = '...') }}</td>
        <td>{{ $ticket -> topic -> name }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection
