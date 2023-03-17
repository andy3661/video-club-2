<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Film;
use App\Models\Rent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RentController extends Controller
{
    

    public function index (){
        $rents = Rent::paginate(11);
        $clients = Client::get();
        $films = Film::get();
        return view('rent.index',compact('rents'));
    }

    public function create(){

        $clients = Client::get();
        $films = Film::get();
        return view('rent.create',compact('clients','films'));
    }

    public function store(Request $request){
        
      $create = Rent::insertGetId([
        'total_value' => $request->total_value,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'id_client' => $request->clients
    ]);

       if($create){
        for ($i=0; $i < count($request->films); $i++) { 
            $film= explode("|",$request->films[$i]);
          $relation = DB::table('films_rents')->insert([
            'id_film' => $film[0],
            'id_rent' => $create
           ]);
        }
        
       }
      
      if($create){
        $success = "Pelicula registrada satisfactoriamente";
        $rents = Rent::paginate(11);
        return view('rent.index',compact('success','rents'));
      }else{
        $error = "error al ingresar datos revise";
        $rents = Rent::paginate(11);
        return view('rent.index',compact('error','rents'));
      }
    }

    public function edit($id){
      $rent= Rent::find($id);
      $clients = Client::get();
      $client = Client::where('id',$rent->id_client)->first();
      $films = Film::get();
      $ids_films = DB::table('films_rents')->select('id_film')->where('id_rent',$id);

      if($ids_films){

        $selected_films = Film::whereIn('id',$ids_films)->get();

        if($selected_films){
     
return view('rent.edit',compact('rent','clients','films','client','selected_films'));
        }
      }
      
      
    
      
     
        return view('rent.edit',compact('rent','clients','films','client'));

    }
    public function update(Request $request) {
  
        $update = Rent::where('id', $request->id)->update([
          'total_value' => $request->total_value,
          'start_date' => $request->start_date,
          'end_date' => $request->end_date,
          'id_client' => $request->clients
        ]); 

           $delete = DB::table('films_rents')->where('id_rent',$request->id)->destroy();

        if($update){
          for ($i=0; $i < count($request->films); $i++) { 
              $film= explode("|",$request->films[$i]);
            $relation = DB::table('films_rents')->insert([
              'id_film' => $film[0],
              'id_rent' => $update
             ]);
          }
          
         }

        if($update){
            $success = "Alquiler editada satisfactoriamente";
            $rents = Rent::paginate(11);
            return view('rent.index',compact('success','rents'));
          }else{
            $error = "error al editar datos revise";

            $rents = Rent::paginate(11);
            return view('rent.index',compact('error','rents'));
          }
    }
    public function destroy($id){

      $delete = DB::table('films_rents')->where('id_rent',$id)->delete();
        $rent= Rent::destroy($id);

        if($rent){
            $success = "Alquiler eliminado satisfactoriamente";
            $rents = Rent::paginate(11);
            return view('rent.index',compact('success','rents'));
          }else{
            $error = "error al eliminar datos revise";

            $rents = Rent::paginate(11);
            return view('rent.index',compact('error','rents'));
          }

      

    }
}
