@extends('layouts.app')
@section('content')

<form  action="{{route('film.update')}}" method="post" class="row g-3">
    @method('PUT')
    @csrf()
    <input type="hidden" name="id" value="{{$film->id}}">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
            <div class="col-md-12">
    <label for="name" class="form-label">Nombre</label>
    <input name="name" type="text" class="form-control" id="name" value="{{$film->name ? $film->name: ''}}">
  </div>
  <div class="col-md-12">
    <label for="type" class="form-label">Peliculas</label>
    <select id="type" name="type" class="form-select"  aria-label="multiple select">
 
  <option value="1">"nuevo lanzamiento"</option>
  <option value="2">"peliculas normales"</option>
  <option value="3">"peliculas viejas"</option>
  
</select>
  </div>
  <div class="col-md-12">
    <label for="unitary_price" class="form-label">Precio unitario</label>
    <input name="unitary_price" type="text" class="form-control" id="unitary_price" placeholder="$" value="{{$film->unitary_price ? $film->unitary_price: ''}}">
  </div>
  <div class="col-md-12">
  <label for="premiere_date">Fecha de lanzamiento:</label>

<input class="form-control" name="premiere_date" type="datetime-local" id="premiere_date"
value="{{$film->premiere_date ? $film->premiere_date: ''}}">
  </div>
            </div>
            <div class="col-md-6">
            <div class="col-md-12">
    <label for="synopsis" class="form-label">Sinopsis</label>
    <textarea name="synopsis" cols="30" rows="10" class="form-control" id="synopsis">
  {{$film->synopsis ? $film->synopsis: ''}}
    </textarea>
            </div>
        </div>
        <div class="col-12 offset-5">
    <button type="submit" class="btn btn-primary">Confirmar</button>
  
  </div>
    </div>
  
  
  
  
  
  
 
</form>

@endsection