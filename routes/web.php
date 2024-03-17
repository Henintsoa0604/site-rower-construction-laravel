<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

//route Accueil
Route::get('/admin/home', 'HomeController@index')->name('home');

//route societe rower
Route::get('/rower/ajout','societeController@ajout')->name('rower.ajout');
Route::post('/rower/store','societeController@ajoutAction')->name('rower.ajoutAction');
Route::get('admin/rower/profil','societeController@index')->name('rower.profil');
Route::post('/rower/update','societeController@update')->name('rower.update');

//route type Construction
Route::get('/admin/type-construction/liste','constructionController@index')->name('type_construction');
Route::post('/Construction/TypeAction','constructionController@ajoutConstructionAction')->name('type_constructionAjoutAction');
Route::get('/Construction/supprimer/{id}','constructionController@supprimer')->name('construction.supprimer');
Route::get('/Construction/editer/{id}','constructionController@editer')->name('construction.editer');
Route::post('/Construction/update/{id}','constructionController@update')->name('construction.update');

//route membre
Route::get('/admin/membre/liste','membreController@index')->name('membre');
Route::get('/admin/membre/ajout','membreController@ajout')->name('membre.ajout');
Route::post('/Membre/action','membreController@Action')->name('membre.Action');
Route::get('/Membre/supprimer/{id}','membreController@supprimer')->name('membre.supprimer');
Route::get('/Membre/editer/{id}','membreController@editer')->name('membre.editer');
Route::post('/Membre/update/{id}','membreController@update')->name('membre.update');

//Route Activite
Route::get('Activite','activiteController@index')->name('activite');
Route::post('/Activite/ajout','activiteController@Action')->name('activite.Ajout');
Route::get('/Activite/supprimer/{id}','activiteController@supprimer')->name('activite.supprimer');
Route::get('/Activite/editer/{id}','activiteController@editer')->name('activite.editer');
Route::post('/Activite/update/{id}','activiteController@update')->name('activite.update');

//Route Modele
Route::get('/admin/Modele','modeleController@index')->name('modele');
Route::get('/admin/Modele/ajout','modeleController@ajout')->name('modele.ajout');
Route::post('/admin/Modele/action','modeleController@Action')->name('modele.Action');
Route::get('/admin//Modele/supprimer/{id}','modeleController@supprimer')->name('modele.supprimer');
Route::get('/admin//Modele/editer/{id}','modeleController@editer')->name('modele.editer');
Route::post('/admin/Modele/update/{id}','modeleController@update')->name('modele.update');
Route::get('/admin/Modele/show/{id}','modeleController@detail')->name('modele.show');
//Distribution
Route::post('/Modele/distrubition','modeleController@AjoutDistrubition')->name('modele.distrubition');

//Route Realisation
Route::get('/admin/realisation/liste','realisationController@index')->name('realisation');
Route::get('/admin/realisation/ajout','realisationController@ajout')->name('realisation.ajout');
Route::post('/Realisation/action','realisationController@Action')->name('realisation.Action');
Route::get('/admin/realisation/supprimer/{id}','realisationController@supprimer')->name('realisation.supprimer');
Route::get('/admin/realisation/editer/{id}','realisationController@editer')->name('realisation.editer');
Route::post('/admin/realisation/update/{id}','realisationController@update')->name('realisation.update');
Route::get('/admin/realisation/detail/{id}','realisationController@detail')->name('realisation.detail');
//gallery
Route::post('/Realisation/gallery','realisationController@AjoutGallery')->name('realisation.gallery');
Route::post('/gallery','realisationController@Gallery')->name('gallery');
Route::get('/galery/supprimer/{id}','realisationController@supprimerGallery')->name('gallery.supprimer');

//Partenaire
Route::get('Partenaire','partenaireController@index')->name('partenaire');
Route::post('/Partenaire/ajout','partenaireController@Action')->name('partenaire.Ajout');
Route::get('/Partenaire/supprimer/{id}','partenaireController@supprimer')->name('partenaire.supprimer');

//blog
Route::get('/admin/blog/liste','blogController@index')->name('blog');
Route::get('/admin/blog/ajout','blogController@AjoutBlog')->name('blog.ajout');
Route::post('/admin/blog/ajout','blogController@Action')->name('blog.action');
Route::get('/admin/blog/supprimer/{id}','blogController@supprimer')->name('blog.supprimer');

//demande devis
Route::get('/admin/demande/liste/En_attente','demandeController@attente')->name('attente');
Route::get('/admin/demande/liste/Accepte','demandeController@accepte')->name('accepte');
Route::get('/admin/demande/editer/{id}','demandeController@editer')->name('demande.editer');


/*
|--------------------------------------------------------------------------
| Routes frontend
|--------------------------------------------------------------------------

*/

//route Accueil
Route::get('/accueil', 'frontController@index')->name('accueil');
Route::get('accueil/realisation-detail/{id}', 'frontController@realisationDetail')->name('detail');

//route a propos ou presentation
Route::get('/presentation', 'frontController@presentation')->name('presentation');

//route realisation
Route::get('/realisation/liste', 'frontController@realisationListe')->name('realisation.liste');
Route::get('/realisation/detail/{id}', 'frontController@sow')->name('realisation.sow');

//route modele
Route::get('/modele/liste', 'frontController@modeleListe')->name('modele.liste');
Route::get('/modele/prix/croissants', 'frontController@prixCroissante')->name('modele.prix.croissants');
Route::get('/modele/prix/decroissants', 'frontController@prixDecroissante')->name('modele.prix.decroissants');
Route::get('/modele/detail/{id}', 'frontController@modeledetail')->name('modele.detail');
Route::get('/modele/garage/oui', 'frontController@avecGarage')->name('modele.garage.oui');
Route::get('/modele/garage/non', 'frontController@sansGarage')->name('modele.garage.non');

//distrubution
Route::post('/modele/distrubition','frontController@Ajoutdistrubition')->name('distrubition.ajout');

//route valeur
Route::get('/nos-valeur', 'frontController@valeur')->name('valeur');

//route blog
Route::get('/blog', 'frontController@blog')->name('blog.liste');
