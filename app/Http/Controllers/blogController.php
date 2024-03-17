<?php

namespace App\Http\Controllers;
use App\Models\societe;
use App\Models\Blog;
use Illuminate\Http\Request;
use Session;
use DB;

class blogController extends Controller
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

        return view('backend.Blog.blog')->with('blogs', Blog::orderBy('created_at','desc')->paginate(6))
                                        ->with('count_attente',$count_attente)
                                        ->with('attente',$attente);
    }

    public function ajoutBlog(){
        $count_attente = DB::table('devis')
        ->selectRaw('count(id) as count')
        ->where('status','=', 'en attend')
        ->get();

        $attente = DB::table('devis')
    
        ->select('*')
        ->where('status','=','en attend')
        ->orderBy('created_at','desc')
        ->paginate(10);
        return view('backend.Blog.ajoutBlog') ->with('count_attente',$count_attente)
                                              ->with('attente',$attente);;
        
    }

    public function Action(Request $request){
        $this->validate($request,[
            'titre' => 'required',            
            'descriptionBlog' => 'required',
            'categorieBlog' => 'required', 
            'imageBlog' => 'required|mimes:jpeg,png',
        
        ],[
            'titre.required' =>"Entrer le titre du blog",
            'categorieBlog.required' =>'Entrer le categorie du blog', 
            'descriptionBlog.required' =>'Entrer la description du blog',      
            'imageBlog.mimes' =>'image invalide',
            'imageBlog.required' =>"Entrer l'image du blog",         
       
        ]);
        $blog = new Blog();
        $blog->titre = $request->titre; 
        $blog->descriptionBlog = $request->descriptionBlog;
        $blog->categorieBlog = $request->categorieBlog;
      
       if($request->hasFile('imageBlog')){
            $file = $request->imageBlog;
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/blog/',$filename);
            $blog->imageBlog = $filename;
        } else {
           return $request;  
           Session::flash('error','image trop eleve');         
        }
        
        $blog->save();
        Session::flash('success','blog  ajouté avec succés');
        //return view('backend.membre.ajoutMembre');
        return redirect()->route('blog');
    
    }
    public function supprimer($id){
        //recherche par rapport a l'id et supprime
        Blog::find($id)->delete();
        Session::flash('supprimer','blog bien supprimer');
        return redirect()->back();
    }
}
