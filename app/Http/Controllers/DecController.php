<?php

namespace App\Http\Controllers;

use App\Http\Requests\DecRequest;
use App\Models\Declarant;
use App\Models\Enfant;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DecController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.declaration.declaration');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $req)
    {
        if($req->isMethod('post')){
            $enfants = DB::select('select * from enfants where nom = ? and prenom = ? and dateNaiss = ?   ' , [$req->nom,$req->prenom,$req->dateNaiss]);
            return view('pages.search',['enfants' => $enfants]);
        }
        return view('pages.search');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DecRequest $req)
    {

        //ID OFFICIER
        $userID = Auth::user()->id;
        //dd($req->prenomDeclarant);
        $enfant = new Enfant();
        $enfant->nom = $req->nom;
        $enfant->prenom = $req->prenom;
        $enfant->sexe = $req->sexe;
        $enfant->lieuNaiss = $req->lieuNaiss;
        $enfant->dateNaiss = $req->dateNaiss;
        $enfant->heure = $req->heure;
        $enfant->CNIpere = $req->CNIpere;
        $enfant->prenomPere = $req->prenomPere;
        $enfant->CNImere = $req->CNImere;
        $enfant->nomMere = $req->nomMere;
        $enfant->prenomMere = $req->prenomMere;
        $enfant->jugement = $req->jugement;
        $enfant ->CNIdeclarant = $req->CNIdeclarant;
        $enfant->nomDeclarant = $req->nomDeclarant;
        $enfant->prenomDeclarant = $req->prenomDeclarant;
        $enfant->officier = $userID;
        //upload fichier
        $bulletin = $req->file('bulletin');
        $bulletinName = 'bulletin-'.date("Y_m_d-H_i_s").'.'.$bulletin->extension();
        $bulletin->move(\public_path('pieces'),$bulletinName);
        $enfant->bulletin = $bulletinName;
        //sauvegarde de le declaration
        $enfant->save();

        return back()->with('success','Votre declaration a ete ajouté avec succès ! Merci ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.declaration.copie');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd( Enfant::find($id));
        return view('pages.declaration.modification',['enfant' => Enfant::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $req)
    {
           //Modification Declarant
        $enfant = Enfant::find($id);
        $enfant->nom = $req->nom;
        $enfant->prenom = $req->prenom;
        $enfant->sexe = $req->sexe;
        $enfant->lieuNaiss = $req->lieuNaiss;
        $enfant->dateNaiss = $req->dateNaiss;
        $enfant->heure = $req->heure;
        $enfant->CNIpere = $req->CNIpere;
        $enfant->prenomPere = $req->prenomPere;
        $enfant->CNImere = $req->CNImere;
        $enfant->nomMere = $req->nomMere;
        $enfant->prenomMere = $req->prenomMere;
        $enfant->jugement = $req->jugement;
        $enfant ->CNIdeclarant = $req->CNIdeclarant;
        $enfant->nomDeclarant = $req->nomDeclarant;
        $enfant->prenomDeclarant = $req->prenomDeclarant;
        $enfant->save();
        return back()->with('success','Votre modification est un succès ! Merci ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $e = Enfant::find($id);
        unlink(public_path('pieces'.'/'.$e->bulletin));
        $e->delete();
        return back()->with('success','Votre suppression a ete fait avec succès ! Merci ');
    }
}
