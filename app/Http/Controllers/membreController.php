<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membre;
use Session;
use DB;

class membreController extends Controller
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

        return view('backend.Membre.membre')->with('membres', Membre::orderBy('created_at','desc')->paginate(6))
                                            ->with('count_attente',$count_attente)
                                            ->with('attente',$attente);
    }
    public function ajout(){
        $count_attente = DB::table('devis')
        ->selectRaw('count(id) as count')
        ->where('status','=', 'en attend')
        ->get();

        $attente = DB::table('devis')    
        ->select('*')
        ->where('status','=','en attend')
        ->orderBy('created_at','desc')
        ->paginate(10); 
        return view('backend.Membre.ajoutMembre')->with('count_attente',$count_attente)
                                                ->with('attente',$attente);
        
    }

    public function Action(Request $request){
        $this->validate($request,[
            'identifiant' => 'required|unique:membres',            
            'nomMembre' => 'required',
            'poste' => 'required',            
            'descriptionMembre' => 'required',
            'imageMembre' => 'required|mimes:jpeg,png',        
        ],[
            'identifiant.required' =>"Entrer l'identifiant du membre", 
            'identifiant.unique' => "ce matricule est deja existe",
            'nomMembre.required' =>'Entrer le nom du membre', 
            'poste.required' =>'Entrer le propre poste du membre',  
            'descriptionMembre.required' =>'Entrer la description du membre',      
            'imageMembre.mimes' =>'image invalide',
            'imageMembre.required' =>"Entrer l'image de la societe",    
        
        ]);
        $membre = new Membre();
        $membre->identifiant = $request->identifiant; 
        $membre->nomMembre = $request->nomMembre; 
        $membre->prenom = $request->prenom;
        $membre->poste = $request->poste;
        $membre->descriptionMembre = $request->descriptionMembre;   
       if($request->hasFile('imageMembre')){
            $file = $request->imageMembre;
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/membre/',$filename);
            $membre->imageMembre = $filename;
        } else {
           return $request;  
           Session::flash('error','image trop eleve');         
        }
        
        $membre->save();
        Session::flash('success','le membre a été bien ajouté avec succès');
        //return view('backend.membre.ajoutMembre');
        return redirect()->route('membre');
    
    }

    public function supprimer($id){
        //recherche par rapport a l'id et supprime
        Membre::find($id)->delete();
        Session::flash('supprimer','etudiant bien supprimer');
        return redirect()->back();
    }

    public function editer($id){
        $membres = Membre::find($id);
        $count_attente = DB::table('devis')
        ->selectRaw('count(id) as count')
        ->where('status','=', 'en attend')
        ->get();

        $attente = DB::table('devis')    
        ->select('*')
        ->where('status','=','en attend')
        ->orderBy('created_at','desc')
        ->paginate(10);
        return view('backend.membre.editMembre')->with('membres',$membres)
                                                ->with('count_attente',$count_attente)
                                                ->with('attente',$attente);
    }

    public function update(Request $request, $id){
      
        $membre = Membre::find($id);
        $membre->identifiant = $request->identifiant; 
        $membre->nomMembre = $request->nomMembre; 
        $membre->prenom = $request->prenom;
        $membre->poste = $request->poste;
        $membre->descriptionMembre = $request->descriptionMembre;   
       if($request->hasFile('imageMembre')){
            $file = $request->file('imageMembre');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/membre/',$filename);
            $membre->imageMembre = $filename;
        }        
        $membre->update();
        Session::flash('modifier',' Le membre  a ete modifie avec succes');
        return redirect()->route('membre');
    }
}
