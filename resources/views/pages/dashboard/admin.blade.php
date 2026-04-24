@extends('layouts.app')

@section('content')

<h3>Dashboard Admin</h3>

<p>Total User: {{ $users->count() }}</p>
<p>Total Hewan: {{ $animals->count() }}</p>
<p>Total Request: {{ $requests->count() }}</p>

@endsection