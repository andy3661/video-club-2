
@extends('layouts.app')
@section('content')
    
    <table class="table">
  <thead class="table-light">
    <th>nombre</th>
    <th>correo</th>
    <th>telefono</th>
  </thead>
  <tbody>
    @foreach($clients as $client)

    <tr>
        <td>{{$client->name}}</td>
        <td>{{$client->email}}</td>
        <td>{{$client->phone_number}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="col-md-12">
    <div class="row">
        <div class="col-md-6 offset-md-3">
        {{ $clients->links() }}
        </div>
    </div>
</div>

   
    
    @endsection

