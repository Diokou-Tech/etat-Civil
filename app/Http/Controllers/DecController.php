<?php

namespace App\Http\Controllers;

use App\Http\Requests\DecRequest;
use App\Models\Enfant;
use App\Models\Jugement;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Utiles\Lettre;
class DecController extends Controller
{
    private $mois = [
        '01' => 'janvier',
        '02' => 'fevrier',
        '03' => 'Mars',
        '04' => 'Avril',
        '05' => 'Mai',
        '06' => 'Juin',
        '07' => 'Juillet',
        '08' => 'Aout',
        '09' => 'Septembre',
        '10' => 'Octobre',
        '11' => 'Novembre',
        '12' => 'Decembre',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.declaration.declaration');
    }

    public function print($id){
        //tab mois
        //
        $f = new \NumberFormatter("fr", \NumberFormatter::SPELLOUT);
        $enfant = Enfant::find($id);
        //convertir id en lettre
        $enfant->idLettre = $f->format($enfant->id);
        //convertir annee en lettre
        $enfant->anneeLettre = $f->format(Str::before($enfant->dateNaiss,'-'));
        //convertir le jour de naissance en lettre
        $enfant->jourLettre = Lettre::toLetter($f->format(Str::afterLast($enfant->dateNaiss,'-')));
        $enfant->moisLettre = $this->mois[Str::before(Str::after($enfant->dateNaiss,'-'), '-')];
        try {
            $jugement = Jugement::where('idJugement',$enfant->jugement)->get()->first();
            $jugement->idLettre = $f->format($jugement->idJugement);
            $jugement->anneeLettreJugement = $f->format(Str::before($jugement->dateJugement,'-'));
        } catch (\Throwable $th) {
            //throw $th;
        }
        $user = $userID = Auth::user();
        $pdf = PDF::loadView('pages.declaration.print',['enfant' => $enfant, 'user' => $user , 'jugement' => $jugement] );
        return $pdf->stream();
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
        try {
            $enfant->save();
        } catch (\Throwable $th) {
            return back()->with('error','Votre declaration a une erreur veuillez d\'abord remplir la table jugement');
        }


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
        //convertir des chiffres en lettres
        $f = new \NumberFormatter("fr", \NumberFormatter::SPELLOUT);
        $enfant = Enfant::find($id);
        $enfant->idLettre = $f->format($enfant->id);
        $enfant->anneeLettre = $f->format(Str::before($enfant->dateNaiss,'-'));
        //convertir le jour de naissance en lettre
        $enfant->jourLettre = Lettre::toLetter($f->format(Str::afterLast($enfant->dateNaiss,'-')));
        $enfant->moisLettre = $this->mois[Str::before(Str::after($enfant->dateNaiss,'-'), '-')];
        $jugement = Jugement::where('idJugement',$enfant->jugement)->get()->first();
        //recuperer l'utilisateur connecte
        $user = $userID = Auth::user();
        return view('pages.declaration.copie',['enfant' => $enfant,'user'=>$user,'jugement' => $jugement]);
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
        try {
            $enfant->save();
        } catch (\Throwable $th) {
            return back()->with('error','Votre declaration a une erreur veuillez d\'abord remplir la table jugement');
        }
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
