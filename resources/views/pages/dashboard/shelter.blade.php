@extends('layouts.app')

@section('content')

<h3>Dashboard Shelter</h3>

<table class="table">
<tr>
    <th>User</th>
    <th>Hewan</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>

@foreach($requests as $req)
<tr>
    <td>{{ $req->user->name }}</td>
    <td>{{ $req->animal->name }}</td>
    <td>{{ $req->status }}</td>

    <td>
        <a href="/approve/{{ $req->id }}" class="btn btn-success btn-sm">Approve</a>
        <a href="/reject/{{ $req->id }}" class="btn btn-danger btn-sm">Reject</a>
    </td>
</tr>
@endforeach

</table>

@endsection