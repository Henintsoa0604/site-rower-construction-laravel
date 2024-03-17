<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\societe;
use App\Models\Activite;
use App\Models\Membre;
use App\Models\Modele;
use App\Models\Type_construction;
use App\Models\Partenaire;
use App\Models\Realisation;
use App\Models\Blog;
use App\Models\Devis;
use App\Models\Distribution;
use DB;
use DateTime;
use Session;

class frontController extends Controller
{
    public function __construct(){

    }
    public function index()
    {    
        $rowers = Societe::orderBy('created_at','desc')->get();
        $activites = Activite::orderBy('created_at','desc')->get();        
        $countModeles = DB::table('modeles')
                    ->selectRaw('count(id) as count')                   
                    ->get();
        $countRealisations = DB::table('realisations')
                    ->selectRaw('count(id) as count')                   
                    ->get();
        $countMembres = DB::table('membres')
                    ->selectRaw('count(id) as count')                   
                    ->get();
        $countBlogs = DB::table('partenaires')
                    ->selectRaw('count(id) as count')                   
                    ->get();

        $modeleUn = DB::table('modeles')
                    ->where('id','=','1')
                    ->get();            
        $modeleDeux = DB::table('modeles')
                    ->where('id','=','2')
                    ->get(); 
        $modele3 = DB::table('modeles')
                    ->where('id','=','3')
                    ->get();  
                    
        $type = Type_construction::orderBy('created_at','desc')->paginate(6); 
        $partenaire = Partenaire::orderBy('id','desc')->paginate(6);  
        
        $activite1 = DB::table('activites')
                    ->where('id','=','1')
                    ->get(); 
        $activite2 = DB::table('activites')
                    ->where('id','=','2')
                    ->get();
        $activite3 = DB::table('activites')
                    ->where('id','=','3')
                    ->get();
        $activite4 = DB::table('activites')
                    ->where('id','=','4')
                    ->get();

        $realisation = Realisation::orderBy('created_at','desc')->paginate(5);
        $modele = Modele::orderBy('created_at','desc')->paginate(4); 
        $membres = Membre::orderBy('created_at','asc')->paginate(4);

        return view('frontend.accueil')->with('rowers',$rowers )
                                       ->with('activites',$activites )
                                       ->with('membres',$membres )
                                       ->with('countModeles',$countModeles )
                                       ->with('countRealisations',$countRealisations )
                                       ->with('countMembres',$countMembres )
                                       ->with('countBlogs',$countBlogs )
                                       ->with('modeleUn',$modeleUn)
                                       ->with('modeleDeux',$modeleDeux)
                                       ->with('modele3',$modele3)
                                       ->with('type',$type)
                                       ->with('partenaire',$partenaire)
                                       ->with('activite1',$activite1)
                                       ->with('activite2',$activite2)
                                       ->with('activite3',$activite3)
                                       ->with('activite4',$activite4)
                                       ->with('realisation',$realisation)
                                       ->with('modele',$modele);

    }

    public function realisationDetail($id){
       $realisation = Realisation::find($id);
       return view('frontend.realisation-detail')->with('realisations',$realisation);
    }

    public function header(){
        $rowers = Societe::orderBy('created_at','desc')->get();
        return view('layouts.frontend.header')->with('rowers',$rowers );
    }

    //page realisation
    public function realisationListe(){
        $rowers = Societe::orderBy('created_at','desc')->get();

        $realisations = DB::table('realisations')
          ->join('type__constructions', 'realisations.type_id', '=', 'type__constructions.id')            
          ->select('realisations.*', 'type__constructions.nom_Type')
          ->orderBy('created_at','desc')
          ->paginate(9);
        $countRealisations = DB::table('realisations')
          ->selectRaw('count(id) as count')                   
          ->get();
     return view('frontend.listeRealisation')->with('rowers',$rowers )
                                             ->with('realisations', $realisations)
                                             ->with('countRealisations', $countRealisations);
    }

    public function sow($id){
        $rowers = Societe::orderBy('created_at','desc')->get();
        $realisation = Realisation::find($id);
        $galleries =  DB::table('galleries')->where('realisation_id', '=', $id)->paginate(6);
        $countGalleries = DB::table('galleries')
                    ->where('realisation_id', '=', $id)
                    ->selectRaw('count(id) as count')                   
                    ->get();
        return view('frontend.sowRealisation')->with('rowers',$rowers )
                                              ->with('realisations',$realisation)
                                              ->with('galleries',$galleries)
                                              ->with('countGalleries',$countGalleries);
     }

     //page modele
    public function modeleListe(){
      $rowers = Societe::orderBy('created_at','desc')->get();
      $modeles = DB::table('modeles')
            ->join('type__constructions', 'modeles.construction_id', '=', 'type__constructions.id')            
            ->select('modeles.*', 'type__constructions.nom_Type')
            ->orderBy('created_at','desc')
            ->paginate(9);
      $partenaire = Partenaire::orderBy('id','desc')->paginate(6); 
      $countModeles = DB::table('modeles')
      ->selectRaw('count(id) as count')                   
      ->get();
        return view('frontend.listeModele')->with('rowers',$rowers )
                                           ->with('modeles', $modeles)
                                           ->with('partenaire',$partenaire)
                                           -> with('countModeles',$countModeles);
    }

    public function prixCroissante(){
      $rowers = Societe::orderBy('created_at','desc')->get();
      $partenaire = Partenaire::orderBy('id','desc')->paginate(6); 
      $countModeles = DB::table('modeles')
      ->selectRaw('count(id) as count')                   
      ->get();
      $prixcroisante = Modele::orderBy('montantDeOperation','asc')->paginate(9);
      return view('frontend.modelePrixCroissants')->with('rowers',$rowers )   
                                                  ->with('partenaire',$partenaire)                                     
                                                  -> with('prixcroisante',$prixcroisante)
                                                  -> with('countModeles',$countModeles);
    }

    public function prixDecroissante(){
      $rowers = Societe::orderBy('created_at','desc')->get();
      $partenaire = Partenaire::orderBy('id','desc')->paginate(6); 
      $countModeles = DB::table('modeles')
      ->selectRaw('count(id) as count')                   
      ->get();
      $prixdecroisante = Modele::orderBy('montantDeOperation','desc')->paginate(9);
      return view('frontend.modelePrixDecroissants')->with('rowers',$rowers )   
                                                  ->with('partenaire',$partenaire)                                     
                                                  -> with('prixdecroisante',$prixdecroisante)
                                                  -> with('countModeles',$countModeles);
    }

    public function avecGarage(){
      $rowers = Societe::orderBy('created_at','desc')->get();
      $avecGarage = DB::table('distributions')
            ->join('modeles', 'distributions.modele_id', '=', 'modeles.id')           
            ->select('distributions.garage','modeles.id','modeles.nomModele','modeles.imageIllustration','modeles.montantDeOperation','modeles.created_at')
            ->where('distributions.garage','=','Oui')
            ->orderBy('modeles.created_at','desc')
            ->paginate(9);
      $partenaire = Partenaire::orderBy('id','desc')->paginate(6); 
      $countModeles = DB::table('modeles')
      ->selectRaw('count(id) as count')                   
      ->get();
      return view('frontend.modeleAvecGarage')->with('rowers',$rowers )   
                                      ->with('partenaire',$partenaire)                                     
                                      -> with('avecGarage',$avecGarage)
                                      -> with('countModeles',$countModeles);
    }

    public function sansGarage(){
      $rowers = Societe::orderBy('created_at','desc')->get();
      $avecGarage = DB::table('distributions')
            ->join('modeles', 'distributions.modele_id', '=', 'modeles.id')           
            ->select('distributions.garage','modeles.id','modeles.nomModele','modeles.imageIllustration','modeles.montantDeOperation','modeles.created_at')
            ->where('distributions.garage','=','Non')
            ->orderBy('modeles.created_at','desc')
            ->paginate(9);
      $partenaire = Partenaire::orderBy('id','desc')->paginate(6); 
      $countModeles = DB::table('modeles')
      ->selectRaw('count(id) as count')                   
      ->get();
      return view('frontend.modeleSansGarage')->with('rowers',$rowers )   
                                      ->with('partenaire',$partenaire)                                     
                                      -> with('avecGarage',$avecGarage)
                                      -> with('countModeles',$countModeles);
    }
    
    public function modeledetail($id){
      $rowers = Societe::orderBy('created_at','desc')->get();
      $modeledetail = Modele::find($id);
      $partenaire = Partenaire::orderBy('id','desc')->paginate(6);
      $modeles = DB::table('modeles')
            ->join('type__constructions', 'modeles.construction_id', '=', 'type__constructions.id')            
            ->select('modeles.*', 'type__constructions.nom_Type')
            ->orderBy('created_at','desc')
            ->paginate(6);
      $distrubition =  DB::table('distributions')->where('modele_id', '=', $id)->get();
      return view('frontend.modeledetail')->with('rowers',$rowers )
                                          ->with('partenaire',$partenaire)
                                          ->with('modeles', $modeles)
                                          ->with('modeledetails',$modeledetail)
                                          ->with('distrubitions',$distrubition );
                                                                         
                                          
                                          
    }

    //page presentation
    public function presentation(){
      $rowers = Societe::orderBy('created_at','desc')->get();
      $type = Type_construction::orderBy('created_at','desc')->paginate(6);
      $membres = Membre::orderBy('created_at','desc')->get();
      $activite1 = DB::table('activites')
                    ->where('id','=','1')
                    ->get(); 
        $activite2 = DB::table('activites')
                    ->where('id','=','2')
                    ->get();
        $activite3 = DB::table('activites')
                    ->where('id','=','3')
                    ->get();
        $activite4 = DB::table('activites')
                    ->where('id','=','4')
                    ->get();
      $partenaire = Partenaire::orderBy('id','desc')->paginate(6); 
      $modeleUn = DB::table('modeles')
                    ->where('id','=','1')
                    ->get();            
        $modeleDeux = DB::table('modeles')
                    ->where('id','=','2')
                    ->get(); 
        $modele3 = DB::table('modeles')
                    ->where('id','=','3')
                    ->get();
      $countModeles = DB::table('modeles')
                    ->selectRaw('count(id) as count')                   
                    ->get();
      $countMembres = DB::table('membres')
                    ->selectRaw('count(id) as count')                   
                    ->get();
      $countRealisations = DB::table('realisations')
                    ->selectRaw('count(id) as count')                   
                    ->get();
      return view('frontend.presentation')->with('rowers',$rowers )
                                          ->with('type',$type)
                                          ->with('membres',$membres)
                                          ->with('activite1',$activite1)
                                          ->with('activite2',$activite2)
                                          ->with('activite3',$activite3)
                                          ->with('activite4',$activite4)
                                          ->with('partenaire',$partenaire)
                                          ->with('modeleUn',$modeleUn)
                                          ->with('modeleDeux',$modeleDeux)
                                          ->with('modele3',$modele3)
                                          -> with('countModeles',$countModeles)
                                          -> with('countMembres',$countMembres)
                                          -> with('countRealisations',$countRealisations);
    }

    //page valeur et engagement
    public function valeur(){
      $rowers = Societe::orderBy('created_at','desc')->get();
      $annee = DB::table('societes')                     
            ->select('*')
            ->first();
            $an= $annee->date;
            $date1 = new DateTime($an);
            $aff = $date1->format('Y');
      return view('frontend.valeur')->with('rowers',$rowers)
                                    ->with('aff',$aff);
    }

    //page blog

    public function blog(){
      $rowers = Societe::orderBy('created_at','desc')->get();
      $blogs = Blog::orderBy('created_at','desc')->paginate(3);
      $blogs1 = Blog::orderBy('created_at','asc')->get();
      return view('frontend.blog')->with('rowers',$rowers)
                                  ->with('blogs',$blogs)
                                  ->with('blogs1',$blogs1);
    }

    //demande information
    public function Ajoutdistrubition(Request $request){
      $this->validate($request,[
          'nomClient' => 'required',          
          'emailClient' => 'required',
          'telephoneClient' => 'required|numeric',                  
        
      ],[
          'nomClient.required' =>'Entrer votre nom',          
          'emailClient.required' =>'Entrer votre email', 
          'telephoneClient.required' =>'Entrer votre numero telephone',      
          
          'telephoneClient.numeric' => 'numero invalide',
         
          
      ]);
      $devis = new devis();
      $devis->nomClient = $request->nomClient; 
      $devis->prenomClient = $request->prenomClient; 
      $devis->emailClient = $request->emailClient; 
      $devis->telephoneClient = $request->telephoneClient; 
      $devis->message = $request->message;  
      $devis->status ="en attend";     
   
      $devis->save();
     Session::flash('success3','votre demande d inforamtion est envoyee avec succes.. 
     vouz acceptez de recevoir des informations commerciales de la part du groupe auquel appartient la marque Rower Construction par e-mail ou par téléphone');
      return redirect()->back();
  }

}
