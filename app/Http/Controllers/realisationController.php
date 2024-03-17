<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Type_Construction;
use App\Models\Realisation;
use App\Models\Gallery;
use Session;

class realisationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index(){
       $realisations = DB::table('realisations')
           ->join('type__constructions', 'realisations.type_id', '=', 'type__constructions.id')            
           ->select('realisations.*', 'type__constructions.nom_Type')
           ->orderBy('created_at','desc')
           ->paginate(10);
        
           $count_attente = DB::table('devis')
           ->selectRaw('count(id) as count')
           ->where('status','=', 'en attend')
           ->get();
   
           $attente = DB::table('devis')
       
           ->select('*')
           ->where('status','=','en attend')
           ->orderBy('created_at','desc')
           ->paginate(10);
        return view('backend.Realisation.realisation')->with('realisations', $realisations)
                                                    ->with('count_attente',$count_attente)
                                                    ->with('attente',$attente);
    }

    public function ajout(){
        $type = Type_Construction::orderBy('id','asc')->get();
        
        $count_attente = DB::table('devis')
        ->selectRaw('count(id) as count')
        ->where('status','=', 'en attend')
        ->get();

        $attente = DB::table('devis')
    
        ->select('*')
        ->where('status','=','en attend')
        ->orderBy('created_at','desc')
        ->paginate(10);
        return view('backend.Realisation.ajoutRealisation')->with('types',$type)
                                                        ->with('count_attente',$count_attente)
                                                        ->with('attente',$attente);        
    }

    public function Action(Request $request){
        $this->validate($request,[
            'nomRealisation' => 'required',            
            'montantRealisation' => 'required|numeric',                      
            'descriptionRealisation' => 'required',
            'imageRealisation' => 'required|mimes:jpeg,png',
            'province' => 'required',
            'region' => 'required',
            'district' => 'required',
            'ville' => 'required',
        
        ],[
            'nomRealisation.required' =>"Entrer le nom de la realisation",            
            'montantRealisation.required' =>'Entrer le montant de la realisation', 
            'montantRealisation.numeric' =>'Le montant de la realisation doit etre en chiffre',             
            'descriptionRealisation.required' =>'Entrer la description de la realisation',      
            'imageRealisation.mimes' =>'image invalide',
            'imageRealisation.required' =>"Entrer l'image de la realisation", 
            'province.required' =>"Entrer le province dont la construction est construite",
            'region.required' =>"Entrer la region dont la construction est construite",
            'district.required' =>"Entrer le nom du district dont la construction est construite", 
            'ville.required' =>"Entrer le nom du ville dont la construction est construite",      
         
        ]);
        $realisation = new Realisation();
        $realisation->nomRealisation = $request->nomRealisation; 
        $realisation->montantRealisation = $request->montantRealisation;        
        $realisation->descriptionRealisation = $request->descriptionRealisation;
        $realisation->type_id = $request->type_id;  
        $realisation->societeColaborateur = $request->societeColaborateur;
        $realisation->maitreOuvrage = $request->maitreOuvrage;
        $realisation->architecte = $request->architecte; 
        $realisation->province = $request->province;
        $realisation->region = $request->region;
        $realisation->district = $request->district;
        $realisation->ville = $request->ville;
       if($request->hasFile('imageRealisation')){
            $file = $request->imageRealisation;
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/realisations/',$filename);
            $realisation->imageRealisation= $filename;
        } else {
           return $request;  
           Session::flash('error','image trop eleve');         
        }
        
        $realisation->save();
        Session::flash('success','Nouvelle réalisation a été ajoutée avec succés');
        //return view('backend.membre.ajoutMembre');
        return redirect()->route('realisation');
    
    }
    
    public function supprimer($id){
        //recherche par rapport a l'id et supprime
        Realisation::find($id)->delete();
        Session::flash('supprimer','Realisation a été supprimée avec succés');
        return redirect()->back();
    }

    public function editer($id){
        $realisation = Realisation::find($id);
        $count_attente = DB::table('devis')
        ->selectRaw('count(id) as count')
        ->where('status','=', 'en attend')
        ->get();

        $attente = DB::table('devis')
    
        ->select('*')
        ->where('status','=','en attend')
        ->orderBy('created_at','desc')
        ->paginate(10);
        return view('backend.Realisation.editRealisation',['realisations'=> $realisation, 'types' =>Type_Construction::all()])
                                            ->with('count_attente',$count_attente)
                                            ->with('attente',$attente);
    }
    
    public function update(Request $request, $id){
        $this->validate($request,[
            'nomRealisation' => 'required',            
            'montantRealisation' => 'required|numeric',                      
            'descriptionRealisation' => 'required',
            'imageRealisation' => 'required|mimes:jpeg,png',
            'province' => 'required',
            'region' => 'required',
            'district' => 'required',
            'ville' => 'required',
        
        ],[
            'nomRealisation.required' =>"Entrer le nom de la realisation",            
            'montantRealisation.required' =>'Entrer le montant de la realisation', 
            'montantRealisation.numeric' =>'Le montant de la realisation doit etre en chiffre',             
            'descriptionRealisation.required' =>'Entrer la description de la realisation',      
            'imageRealisation.mimes' =>'image invalide',
            'imageRealisation.required' =>"Entrer l'image de la realisation", 
            'province.required' =>"Entrer le province dont la construction est construite",
            'region.required' =>"Entrer la region dont la construction est construite",
            'district.required' =>"Entrer le nom du district dont la construction est construite", 
            'ville.required' =>"Entrer le nom du ville dont la construction est construite",      
         
        ]);
        $realisation = Realisation::find($id);        
        $realisation->nomRealisation = $request->nomRealisation; 
        $realisation->montantRealisation = $request->montantRealisation;        
        $realisation->descriptionRealisation = $request->descriptionRealisation;
        $realisation->type_id = $request->type_id;  
        $realisation->societeColaborateur = $request->societeColaborateur;
        $realisation->maitreOuvrage = $request->maitreOuvrage;
        $realisation->architecte = $request->architecte; 
        $realisation->province = $request->province;
        $realisation->region = $request->region;
        $realisation->district = $request->district;
        $realisation->ville = $request->ville;   
       if($request->hasFile('imageRealisation')){
            $file = $request->file('imageRealisation');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/realisations/',$filename);
            $realisation->imageRealisation= $filename;
        } 
        $realisation->update();       
        Session::flash('modifier',' cette realisation  a été modifiée avec succès');
        return redirect()->route('realisation');
    }

    public function detail($id){
        $type = Realisation::orderBy('id','desc')->get();    

        $realisation = Realisation::find($id);
        $galleries =  DB::table('galleries')->where('realisation_id', '=', $id)->paginate(6);
        $count_attente = DB::table('devis')
        ->selectRaw('count(id) as count')
        ->where('status','=', 'en attend')
        ->get();

        $attente = DB::table('devis')
    
        ->select('*')
        ->where('status','=','en attend')
        ->orderBy('created_at','desc')
        ->paginate(10);
        return view('backend.Realisation.detailRealisation',['realisations'=> $realisation, 'types' =>Realisation::all()])->with('types',$type) ->with('galleries',$galleries)
                                            ->with('count_attente',$count_attente)
                                            ->with('attente',$attente);;
                                                                                                                               
    }
    
    public function AjoutGallery(Request $request){
        $this->validate($request,[            
            'gallery' => 'required|mimes:jpeg,png',           
        
        ],[                 
            'gallery.mimes' =>'image invalide',
            'gallery.required' =>"Entrer l'image de la realisation",                
         
        ]);
        $gallery = new Gallery();        
        $gallery->realisation_id = $request->realisation_id;
       if($request->hasFile('gallery')){
            $file = $request->gallery;
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/Gallery/',$filename);
            $gallery->gallery= $filename;
        } else {
           return $request;  
           Session::flash('error','image trop eleve');         
        }
        
        $gallery->save();
        Session::flash('success','une nouvelle image a été ajoutée dans gallery avec succès');
        //return view('backend.membre.ajoutMembre');
        return redirect()->back();
    
    }
    public function supprimerGallery($id){
        //recherche par rapport a l'id et supprime
        Gallery::find($id)->delete();
        Session::flash('supprimer','cette image a été supprimée avec succès');
        return redirect()->back();
    }
   
}
