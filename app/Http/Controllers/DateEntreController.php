<?php

namespace App\Http\Controllers;
use App\Models\DateEntre;
use App\Models\Pere;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DateEntreController extends Controller
{
    public function index()
    {
        $resultat=DB::select('select parent_id,p.name,p.prenom,d."date_E" from peres P,date_entres d where p.id=d.parent_id');
        return $resultat;
    }
    public function show($id)
    {
        $id_p=Pere::findOrFail($id);
        $resultat=DB::select('select parent_id,p.name,p.prenom,d."date_E" from peres P,date_entres d where p.id=d.parent_id and parent_id=?',$id_p);
        return $resultat;
    }
    public function store(Request $request,$id)
    {
        try {
            $date=new DateEntre();
            $date->parent_id=$id;
            $date->date_E=$request->date_E;
            if($date->save()){
                 return response()->json(['status'=>'success','message'=>'successfully']);
            }
        }
        catch(exception $e){
          return response()->json(['status'=>'error','message'=>$e->getMessage()]);
        }
    }
    public function update(Request $request,$id)
    {
        try {
            $date=DateEntre::findOrFail($id);
            $date->parent_id=$request->id;
            $date->date_E=$request->date_E;
            if($date->save()){
                 return response()->json(['status'=>'success','message'=>'successfully']);
            }
        }
        catch(exception $e){
          return response()->json(['status'=>'error','message'=>$e->getMessage()]);
        }
    }
    public function delete($id)
    {
        try {
            $date=DateEntre::findOrFail($id);
            if($date->delete()){
                 return response()->json(['status'=>'success','message'=>'eleve deleted successfully']);
            }
        }
        catch(exception $e){
          return response()->json(['status'=>'error','message'=>$e->getMessage()]);
        }
    }
}
