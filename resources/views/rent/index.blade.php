@extends('layouts.app')
@section('content')
    @if(isset($success))
      <div class="alert alert-success" role="alert">
  {{isset($success)}}
</div>
@endif
    @if(isset($error))
      <div class="alert alert-danger" role="alert">
  {{$error}}
</div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <table class="table">
  <thead class="table-light">
    <th>Valor total</th>
    
    <th>Fecha de inicio</th>
    <th>fecha de finalizacion</th>
    <th>Cliente</th>
    <th>Peliculas</th>
    <th colspan="2" center>Acciones</th>
  </thead>
  <tbody>
    @foreach($rents as $rent)

    <tr>
        <td>{{$rent->total_value}}</td>
        <td>{{$rent->start_date}}</td>
        <td>{{$rent->end_date}}</td>
        
        @php
        $clente = DB::table('clients')->where('id',$rent->id_client)->first();
        $ids_films = DB::table('films_rents')->select('id_film')->where('id_rent',$rent->id);
        $films = DB::table('films')->whereIn('id',$ids_films)->get();

        @endphp
        <td>@foreach($films as $film)
           {{ $film->name.", "}}
            @endforeach
        </td>

        <td>

        </td>
        <td>
            <form  method="post" action="{{route('rent.edit',['id'=>$rent->id])}}">
                @method('PUT')
                @csrf()
        <button type="submit" class="btn btn-warning">Editar Alquiler</button>
        </form>
    </td>
        <td>
        <form  method="post" action="{{route('rent.destroy',['id'=>$rent->id])}}">
                @method('DELETE')
                @csrf()
        <button type="submit" class="btn btn-danger">Eliminar Alquiler</button>
        </form>
    </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="col-md-12">
    <div class="row">
        <div class="col-md-6 offset-md-3">
        {{ $rents->links() }}
        </div>
        <div class="col-md-3">
       <a class="btn btn-primary" href="{{route('rent.create')}}">Alquilar pelicula</a>
        </div>
    </div>
</div>

   
    
    @endsection