@extends('layouts.app')
@section('content')



<form  action="{{route('rent.store')}}" method="post" class="row g-3">
    @csrf()
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
            <div class="col-md-12">
    <label for="films" class="form-label">Peliculas</label>
    <select onChange="calculateTotal()" id="films" name="films[]" class="form-select" multiple aria-label="multiple select">
 
  @foreach($films as $film)
  <option value="{{$film->id.'|'.$film->unitary_price.'|'.$film->type}}">{{$film->name}}</option>
  @endforeach
</select>
  </div>
  
  
  <div class="col-md-12">
  <label for="start_date">Fecha de inicio:</label>

<input class="form-control" name="start_date" type="datetime-local" id="start_date">
  </div>
  
            </div>
            <div class="col-md-6">
            <div class="col-md-12">
    <label for="clients" class="form-label">Cliente</label>
    <select id="clients" name="clients" class="form-select" aria-label="multiple select">
  <option >Seleccione</option>
  @foreach($clients as $clients)
  <option value="{{$clients->id}}">{{$clients->name}}</option>
  @endforeach
</select>
  </div>
  <div class="col-md-12">
    <label for="total_value" class="form-label">Precio total</label>
    <input name="total_value" readonly type="text" class="form-control" id="total_value" placeholder="$">
  </div>
  <div class="col-md-12">
  <label for="end_date">Fecha de finalizacion:</label>

<input class="form-control" name="end_date" type="datetime-local" id="end_date"
      >
  </div>
        </div>
       
        <div class="col-12 offset-5">
           <br>
        <br>
        <br>
    <button type="submit" class="btn btn-primary">Guardar</button>
  
  </div>
    </div>
  
  
  
  
  
  
 
</form>
<script>
  function calculateTotal() {
          let select = 0;
          let type =[];
          let fecha_inicio = new Date(document.getElementById('start_date').value);
          let fecha_fin = new Date(document.getElementById('end_date').value);
          console.log(fecha_fin,fecha_inicio);
          for (var option of document.getElementById('films').options)
    {
        if (option.selected) {
         $data = option.value.split('|');
        //  type.push(parseInt($data[2]));
        //   select.push(parseInt(parseInt($data[1])));
          if( $data[2] == 1){
             select+=parseInt($data[1]);
          }else if($data[2] == 2){
            let diferencia = fecha_inicio.getTime() - fecha_fin.getTime();
            let diasDeDiferencia = diferencia / 1000 / 60 / 60 / 24;
             if(diasDeDiferencia>3){
              select+=(parseInt($data[1])*3)+(parseInt($data[1])*0.15*(diasDeDiferencia-3));
             }
             select+=(parseInt($data[1])*3);
           
          }else if($data[2] == 3){
            let diferencia = fecha_inicio.getTime() - fecha_fin.getTime();
            let diasDeDiferencia = diferencia / 1000 / 60 / 60 / 24;
             if(diasDeDiferencia>5){
              select+=(parseInt($data[1])*5)+(parseInt($data[1])*0.15*(diasDeDiferencia-5));
             }
             select+=(parseInt($data[1])*5);
          }
        }
    }
    document.getElementById('total_value').value = select;
          
  }
</script>

@endsection