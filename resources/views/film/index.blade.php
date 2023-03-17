@extends('layouts.app')
@section('content')
@if(isset($success))
      <div class="alert alert-success" role="alert">
  {{$success}}
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
    <th>nombre</th>
    <th>tipo</th>
    <th>synopsis</th>
    <th>precio unitario</th>
    <th>fecha de estreno</th>
    <th colspan="2" center>Acciones</th>
  </thead>
  <tbody>
    @foreach($films as $film)

    <tr>
        <td>{{$film->name}}</td>
        @if($film->type == 1)
         <td>Nuevo Lanzamiento</td>
         @elseIf($film->type == 2)
         <td>pelicula Normal</td>
         @else
         <td>pelicula vieja</td>
         @endif
        <td>{{$film->synopsis}}</td>
        <td>{{$film->unitary_price}}</td>
        <td>{{$film->premiere_date}}</td>
        <td>
            <form  method="post" action="{{route('film.edit',['id'=>$film->id])}}">
                @method('PUT')
                @csrf()
        <button type="submit" class="btn btn-warning">Editar pelicula</button>
        </form>
    </td>
        <td>
        <form  method="post" action="{{route('film.destroy',['id'=>$film->id])}}">
                @method('DELETE')
                @csrf()
        <button type="submit" class="btn btn-danger">Eliminar pelicula</button>
        </form>
    </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="col-md-12">
    <div class="row">
        <div class="col-md-6 offset-md-3">
        {{ $films->links() }}
        </div>
        <div class="col-md-3">
       <a class="btn btn-primary" href="{{route('film.create')}}">Registrar pelicula</a>
        </div>
    </div>
</div>

   
    
    @endsection