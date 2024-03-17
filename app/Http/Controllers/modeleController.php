<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Type_Construction;
use App\Models\Modele;
use App\Models\Distribution;
use Session;


class modeleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index(){
        $modeles = DB::table('modeles')
            ->join('type__constructions', 'modeles.construction_id', '=', 'type__constructions.id')            
            ->select('modeles.*', 'type__constructions.nom_Type')
            ->paginate(6);

            $count_attente = DB::table('devis')
            ->selectRaw('count(id) as count')
            ->where('status','=', 'en attend')
            ->get();
    
            $attente = DB::table('devis')    
            ->select('*')
            ->where('status','=','en attend')
            ->orderBy('created_at','desc')
            ->paginate(10); 

        return view('backend.Modele.modele')->with('modeles', $modeles)
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

        return view('backend.Modele.ajoutModele')->with('types',$type)
                                                ->with('count_attente',$count_attente)
                                                ->with('attente',$attente);        
    }

    public function Action(Request $request){
        $this->validate($request,[
            'nomModele' => 'required',            
            'montantDeOperation' => 'required|numeric',                      
            'descriptionModele' => 'required',
            'imageIllustration' => 'required|mimes:jpeg,png',
        
        ],[
            'nomModele.required' =>"Entrer le nom du modele",            
            'montantDeOperation.required' =>'Entrer le montant de l\'operation', 
            'montantDeOperation.numeric' =>'Le montant de l\'operation doit etre chiffre',             
            'descriptionModele.required' =>'Entrer la description du modele',      
            'imageIllustration.mimes' =>'image invalide',
            'imageIllustration.required' =>"Entrer l'image d\'ilustration du modele",        
         
        ]);
        $modele = new Modele();
        $modele->nomModele = $request->nomModele; 
        $modele->montantDeOperation = $request->montantDeOperation;        
        $modele->descriptionModele = $request->descriptionModele;
        $modele->construction_id = $request->construction_id;   
       if($request->hasFile('imageIllustration')){
            $file = $request->imageIllustration;
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/modeles/',$filename);
            $modele->imageIllustration= $filename;
        } else {
           return $request;  
           Session::flash('error','image trop eleve');         
        }
        
        $modele->save();
        Session::flash('success','ajout du modele avec succés');
        //return view('backend.membre.ajoutMembre');
        return redirect()->route('modele');
    
    }

    public function supprimer($id){
        //recherche par rapport a l'id et supprime
        Modele::find($id)->delete();
        Session::flash('supprimer','modele bien supprimer');
        return redirect()->back();
    }

    public function editer($id){
        $modeles = Modele::find($id);
        $count_attente = DB::table('devis')
        ->selectRaw('count(id) as count')
        ->where('status','=', 'en attend')
        ->get();

        $attente = DB::table('devis')    
        ->select('*')
        ->where('status','=','en attend')
        ->orderBy('created_at','desc')
        ->paginate(10); 
        return view('backend.Modele.editModele',['modeles'=> $modeles, 'types' =>Type_Construction::all()])
                            ->with('count_attente',$count_attente)
                            ->with('attente',$attente);
    }
    
    public function update(Request $request, $id){
        $this->validate($request,[
            'nomModele' => 'required',            
            'montantDeOperation' => 'required|numeric',                      
            'descriptionModele' => 'required',
            'imageIllustration' => 'required|mimes:jpeg,png',
        
        ],[
            'nomModele.required' =>"Entrer le nom du modele",            
            'montantDeOperation.required' =>'Entrer le montant de l\'operation', 
            'montantDeOperation.numeric' =>'Le montant de l\'operation doit etre chiffre',             
            'descriptionModele.required' =>'Entrer la description du modele',      
            'imageIllustration.mimes' =>'image invalide',
            'imageIllustration.required' =>"Entrer l'image d\'ilustration du modele",        
         
        ]);
        $modele = Modele::find($id);        
        $modele->nomModele = $request->nomModele; 
        $modele->montantDeOperation = $request->montantDeOperation;        
        $modele->descriptionModele = $request->descriptionModele;
        $modele->construction_id = $request->construction_id;   
       if($request->hasFile('imageIllustration')){
            $file = $request->file('imageIllustration');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/modeles/',$filename);
            $modele->imageIllustration= $filename;
        } 
        $modele->update();       
        Session::flash('modifier',' Le modele  a ete modifie avec succes');
        return redirect()->route('modele');
    }

    public function detail($id){
        $type = Modele::orderBy('id','desc')->get();    

        $modeles = Modele::find($id);
        $distrubition =  DB::table('distributions')->where('modele_id', '=', $id)->get();
        $count_attente = DB::table('devis')
        ->selectRaw('count(id) as count')
        ->where('status','=', 'en attend')
        ->get();

        $attente = DB::table('devis')    
        ->select('*')
        ->where('status','=','en attend')
        ->orderBy('created_at','desc')
        ->paginate(10); 
        return view('backend.Modele.detailModele',['modeles'=> $modeles])->with('types',$type)
                                                                         ->with('distrubitions',$distrubition )
                                                                         ->with('count_attente',$count_attente)
                                                                         ->with('attente',$attente);
                                                                                        
                                                                                                                               
    }

    public function AjoutDistrubition(Request $request){
        $this->validate($request,[            
            'dimension' => 'required|numeric',            
            'chambre' => 'required|numeric', 
            'toilette' => 'required|numeric',
            'salleDeBain' => 'required|numeric',                     
                     
        
        ],[                 
            
            'dimension.required' =>"Entrer la dimension de ce modele",
            'dimension.numeric' =>'La dimension du modele doit etre chiffre', 
            'chambre.required' =>"Entrer le nombre de chambre de ce modele",
            'chambre.numeric' =>'le nombre de chambre du modele doit etre chiffre',
            'toilette.required' =>"Entrer le nombre de toilette de ce modele",
            'toilette.numeric' =>'le nombre de toilette du modele doit etre chiffre',
            'salleDeBain.required' =>"Entrer le nombre de salle de bain de ce modele",
            'salleDeBain.numeric' =>'le nombre de salle de bain du modele doit etre chiffre',              
         
        ]);
        $distrubition = new Distribution();       
        $distrubition->modele_id = $request->modele_id;
        $distrubition->dimension = $request->dimension;
        $distrubition->chambre = $request->chambre;
        $distrubition->toilette = $request->toilette;
        $distrubition->salleDeBain = $request->salleDeBain;
        $distrubition->cuisineSepare = $request->cuisineSepare;
        $distrubition->garage = $request->garage;
      
        $distrubition->save();
        Session::flash('success','une nouvelle distrubition a ete ajoute avec success');
        //return view('backend.membre.ajoutMembre');
        return redirect()->back();
    
    }
}
