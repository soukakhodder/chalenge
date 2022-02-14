<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pere;
use Illuminate\Support\Facades\DB;
class PereController extends Controller
{
    public function index()
    {
        return Pere::all();
    }
    public function store(Request $request)
    {
        try {
            $Pere=new Pere();
            $Pere->name=$request->name;
            $Pere->prenom=$request->prenom;
            $Pere->adresse=$request->adresse;
            $Pere->email=$request->email;
            $Pere->img=$request->img;
            if($Pere->save()){
                 return response()->json(['status'=>'success','message'=>'eleve created successfully']);
            }
        }
        catch(exception $e){
          return response()->json(['status'=>'error','message'=>$e->getMessage()]);
        }
    }
    public function update(Request $request,$id)
    {
        try {
            $Pere=Pere::findOrFail($id);
            $Pere->name=$request->name;
            $Pere->prenom=$request->prenom;
            $Pere->adresse=$request->adresse;
            $Pere->email=$request->email;
            $Pere->img=$request->img;
            if($Pere->save()){
                 return response()->json(['status'=>'success','message'=>'eleve updated successfully']);
            }
        }
        catch(exception $e){
          return response()->json(['status'=>'error','message'=>$e->getMessage()]);
        }
    }
    public function delete($id)
    {
        try {
            $Pere=Pere::findOrFail($id);
            if($Pere->delete()){
                 return response()->json(['status'=>'success','message'=>'eleve deleted successfully']);
            }
        }
        catch(exception $e){
          return response()->json(['status'=>'error','message'=>$e->getMessage()]);
        }
    }
}
