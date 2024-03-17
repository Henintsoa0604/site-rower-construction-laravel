<?php

namespace App\Http\Controllers;
use App\Models\Type_construction;
use Illuminate\Http\Request;
use Session;
use DB;

class constructionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $count_attente = DB::table('devis')
        ->selectRaw('count(id) as count')
        ->where('status','=', 'en attend')
        ->get();

        $attente = DB::table('devis')
    
        ->select('*')
        ->where('status','=','en attend')
        ->orderBy('created_at','desc')
        ->paginate(10);

        return view('backend.construction.construction')->with('constructions', Type_construction::orderBy('created_at','desc')->paginate(6))
                                                        ->with('count_attente',$count_attente)
                                                        ->with('attente',$attente);
       // return view('backend.construction.typeConstructionAjoutIndex');
    }

    public function ajoutConstructionAction(Request $request){
        $this->validate($request,[
            'nom_Type' => 'required',
        ],[
            'nom_Type.required' =>'Entrer le type de la construction',
        ]);
        $type = new Type_Construction;
        $type->nom_Type = $request->nom_Type;
        $type->save();
        Session::flash('success','type de construction  ajouté avec succés');
        return redirect()->back();
    }
  
    public function supprimer($id){
        //recherche par rapport a l'id et supprime
        Type_Construction::find($id)->delete();
        Session::flash('supprimer','activite bien supprimer');
        return redirect()->back();
    }
   
    public function editer($id){        
        $construction = Type_Construction::find($id);
        $count_attente = DB::table('devis')
        ->selectRaw('count(id) as count')
        ->where('status','=', 'en attend')
        ->get();

        $attente = DB::table('devis')
    
        ->select('*')
        ->where('status','=','en attend')
        ->orderBy('created_at','desc')
        ->paginate(10);
        
        return view('backend.construction.editConstruction')->with('constructions',$construction)
                                                            ->with('count_attente',$count_attente)
                                                            ->with('attente',$attente);
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'nom_Type' => 'required',
        ],[
            'nom_Type.required' =>'Entrer le type de la construction',
        ]);
        $construction = Type_Construction::find($id);
        $construction->nom_Type = $request->nom_Type;    
     
        $construction->update();
        Session::flash('modifier','Type de construction a été modifié avec succes');
        return redirect()->route('type_construction');
    }
}
