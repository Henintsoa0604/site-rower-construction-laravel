<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Devis;
use App\Mail\ClientMail;
use DB;
use Session;
use Mail;

class demandeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function attente(){
        $count_attente = DB::table('devis')
        ->selectRaw('count(id) as count')
        ->where('status','=', 'en attend')
        ->get();
        
    $attente = DB::table('devis')
    
    ->select('*')
    ->where('status','=','en attend')
    ->orderBy('created_at','desc')
    ->paginate(10);  
    return view('backend.demande.attente')->with('attente',$attente)
                                          ->with('count_attente',$count_attente);
    }

    public function accepte(){

        $count_attente = DB::table('devis')
        ->selectRaw('count(id) as count')
        ->where('status','=', 'en attend')
        ->get();

        $attente = DB::table('devis')
    
        ->select('*')
        ->where('status','=','en attend')
        ->orderBy('created_at','desc')
        ->paginate(10); 
        
        $accepte = DB::table('devis')
        
        ->select('*')
        ->where('status','=','Accepté')
        ->orderBy('created_at','desc')
        ->paginate(10);  
        return view('backend.demande.accepte')->with('accepte',$accepte)
                                              ->with('count_attente',$count_attente)
                                              ->with('attente',$attente);
    }

    public function editer($id){
        
        $count_attente = DB::table('devis')
        ->selectRaw('count(id) as count')
        ->where('status','=', 'en attend')
        ->get();

        $attente = DB::table('devis')    
        ->select('*')
        ->where('status','=','en attend')
        ->orderBy('created_at','desc')
        ->paginate(10); 
        $envoyer= DB::table('devis')
        ->select('*')
        ->where('id','=',$id)
        ->first();
        $mail = $envoyer->emailClient;
        $data = [
            'nom' =>'Rower Construction',
            'email' =>'rower@gmail.com',
            'message' => 'votre demande d\'information est bien recu.Reste connecte.Rower vous appelle 
                            Merci pour votre confiance'
        ];
        Mail::to($mail)->send(new ClientMail($data));
        $devis = Devis::find($id);;
        $devis->status = "Accepté";    
     
        $devis->update();
       
        
        Session::flash('modifier','Type de construction a été modifié avec succes');
        return redirect()->back();

    }

}
