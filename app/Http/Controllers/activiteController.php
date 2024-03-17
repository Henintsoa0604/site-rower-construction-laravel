<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activite;
use Session;
use DB;

class activiteController extends Controller
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

        return view('backend.Activite.activite')->with('activites', Activite::orderBy('created_at','desc')->paginate(6))
                                                ->with('count_attente',$count_attente)
                                                ->with('attente',$attente);
    }

    public function Action(Request $request){
        $this->validate($request,[                        
            'nom' => 'required',
            'description' => 'required',
         
        ],[            
            'nom.required' =>'Entrer le nom de l\'activite',            
            'descriptionMembre.required' =>'Entrer la description de l\'activite',   
        
        ]);
        $activite = new Activite();
        $activite->nom = $request->nom; 
        $activite->description = $request->description;
        $activite->save();
        Session::flash('success','ajout activite avec success');
        return redirect()->back();
    }

    public function supprimer($id){
        //recherche par rapport a l'id et supprime.
        Activite::find($id)->delete();
        Session::flash('supprimer','activite bien supprimer');
        return redirect()->back();
    }
    public function editer($id){
        
        $activites = Activite::find($id);

        $count_attente = DB::table('devis')
        ->selectRaw('count(id) as count')
        ->where('status','=', 'en attend')
        ->get();

        $attente = DB::table('devis')
    
        ->select('*')
        ->where('status','=','en attend')
        ->orderBy('created_at','desc')
        ->paginate(10);

        return view('backend.Activite.editActivite')->with('activites',$activites)
                                                    ->with('count_attente',$count_attente)
                                                    ->with('attente',$attente);
    }
    public function update(Request $request, $id){
        $this->validate($request,[                        
            'nom' => 'required',
            'description' => 'required',
         
        ],[            
            'nom.required' =>'Entrer le nom de l\'activite',            
            'descriptionMembre.required' =>'Entrer la description de l\'activite',   
        
        ]);
      
        $activite = Activite::find($id);
        $activite->nom = $request->nom;        
        $activite->description = $request->description;   
              
        $activite->update();
        Session::flash('modifier','activite a été modifié avec succes');
        return redirect()->route('activite');
    }
}
