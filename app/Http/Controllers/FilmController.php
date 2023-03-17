<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Rent;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index (){
        $films = Film::paginate(11);
        return view('film.index',compact('films'));
    }

    public function create(){
        return view('film.create');
    }

    public function store(Request $request){
      
      $create = Film::create([
        'name' => $request->name,
        'type' => $request->type,
        'synopsis' => $request->synopsis,
        'unitary_price' => $request->unitary_price,
        'premiere_date' => $request->premiere_date
    ]);
      
    
      if($create){
        $success = "Pelicula registrada satisfactoriamente";
        $films = Film::paginate(11);
        return view('film.index',compact('success','films'));
      }else{
        $error = "error al ingresar datos revise";

        $films = Film::paginate(11);
        return view('film.index',compact('error','films'));
      }
    }

    public function edit($id){

        $film= Film::find($id);
        return view('film.edit',compact('film'));

    }
    public function update(Request $request) {
 
        $update = Film::where('id', $request->id)->update([
            'name' => $request->name,
            'type' => $request->type,
            'synopsis' => $request->synopsis,
            'unitary_price' => $request->unitary_price,
            'premiere_date' => $request->premiere_date
        ]); 

        if($update){
            $success = "Pelicula editada satisfactoriamente";
            $films = Film::paginate(11);
            return view('film.index',compact('success','films'));
          }else{
            $error = "error al editar datos revise";

            $films = Film::paginate(11);
            return view('film.index',compact('error','films'));
          }
    }
    public function destroy($id){
        
        $film= Film::destroy($id);

        if($film){
            $success = "Pelicula eliminada satisfactoriamente";
            $films = Film::paginate(11);
            return view('film.index',compact('success','films'));
          }else{
            $error = "error al eliminar datos revise";

            $films = Film::paginate(11);
            return view('film.index',compact('error','films'));
          }

      

    }
}
