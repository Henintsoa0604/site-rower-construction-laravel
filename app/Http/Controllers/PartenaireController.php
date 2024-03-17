<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partenaire;
use Session;
use DB;

class PartenaireController extends Controller
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

        return view('backend.Partenaire.partenaire')->with('partenaires', Partenaire::orderBy('created_at','desc')->paginate(6))
                                                    ->with('count_attente',$count_attente)
                                                    ->with('attente',$attente);
    }

    public function Action(Request $request){
        $this->validate($request,[                        
            'nomPartenaire' => 'required',
            'logoPartenaire' => 'required|mimes:jpeg,png',
         
        ],[            
            'nomPartenaire.required' =>'Entrer le nom de la partenaire',            
            'logoPartenaire.mimes' =>'image invalide',
            'logoPartenaire.required' =>"Entrer le logo de la partenaire",   
        
        ]);
        $partenaire = new Partenaire();
        $partenaire->nomPartenaire = $request->nomPartenaire;
        if($request->hasFile('logoPartenaire')){
            $file = $request->file('logoPartenaire');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/partenaires/',$filename);
            $partenaire->logoPartenaire= $filename;
        } 
        $partenaire->save();
        Session::flash('success','ajout partenaire avec success');
        return redirect()->back();
    }
    
    public function supprimer($id){
        //recherche par rapport a l'id et supprime
        Partenaire::find($id)->delete();
        Session::flash('supprimer','partenaire bien supprimer');
        return redirect()->back();
    }
}
