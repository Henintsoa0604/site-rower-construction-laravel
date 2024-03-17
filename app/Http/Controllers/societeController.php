<?php

namespace App\Http\Controllers;
use App\Models\societe;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Session;
use DB;

class societeController extends Controller
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

        $count_modele = DB::table('modeles')
        ->selectRaw('count(id) as count')        
        ->get();

        $count_realisation = DB::table('realisations')
        ->selectRaw('count(id) as count')        
        ->get();

        $count_membre = DB::table('membres')
        ->selectRaw('count(id) as count')        
        ->get();

        $rowers = Societe::orderBy('created_at','desc')->get();

        return view('backend.Rower.profil')->with('rowers',$rowers )
                                           ->with('count_attente',$count_attente)
                                           ->with('attente',$attente)
                                           ->with('count_modele',$count_modele)
                                           ->with('count_realisation',$count_realisation)
                                           ->with('count_membre',$count_membre);
       // return view('backend.construction.typeConstructionAjoutIndex');
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
        return view('societe.societe_ajout')->with('count_attente',$count_attente)
                                            ->with('attente',$attente);;
    }

    public function ajoutAction(Request $request){
        $this->validate($request,[
            'nom' => 'required',
            'logo' => 'required|mimes:jpeg,png',
            'siege' => 'required',
            'date' => 'required',            
            'description' => 'required',
            'mail' => 'required',
            'telephone' => 'required|numeric',           
          
        ],[
            'nom.required' =>'Entrer le nom de la societe',          
            'logo.mimes' =>'image invalide',
            'logo.required' =>'Entrer logo de la societe',
            'siege.required' =>'Entrer le siege',
            'date.required' =>'Entrer la date de creation',
            'description.required' =>'Entrer la description',
            'mail.required' =>'Champ obligatoire',
            'telephone.numeric' => 'numero invalide',
            'telephone.required' => 'Entrer le numero telephone',
            
        ]);
        $societe = new societe();
        $societe->nom = $request->nom;      
       if($request->hasFile('logo')){
            $file = $request->logo;
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/societe/',$filename);
            $societe->logo = $filename;
        } else {
           return $request;
           $societe->logo='';
        }
        $societe->siege = $request->siege;
        $societe->date = $request->date;
        $societe->description = $request->description;
        $societe->mail = $request->mail;
        $societe->telephone = $request->telephone;
        $societe->save();
        Session::flash('success','societe  ajouté avec succés');
        return view('societe.societe_ajout');
    }
    public function update(Request $request){
      
        $societe = Societe::find();        
        $societe->nom = $request->nom;     
      
        $societe->siege = $request->siege;
        $societe->date = $request->date;
        $societe->description = $request->description;
        $societe->mail = $request->mail;
        $societe->telephone = $request->telephone;
        $societe->update();       
        Session::flash('modifier',' La societe  a ete modifie avec succes');
        return redirect()->back();
    }
}
