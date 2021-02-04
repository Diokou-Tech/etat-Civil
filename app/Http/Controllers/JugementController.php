<?php

namespace App\Http\Controllers;

use App\Models\Jugement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class JugementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jugements = Jugement::all();
        return view('pages.jugement.jugement', compact('jugements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $juge = new Jugement();
        $juge->idJugement = $req->idJugement;
        $juge->tribunal = $req->tribunal;
        $juge->motif = $req->motif;
        $juge->dateJugement = $req->dateJugement;
        //dd($juge);
        $juge->save();
        return back()->with('success','Votre jugementa ete ajouté avec succès ! Merci ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jugement =  Jugement::where('idJugement', $id)->get()->first();
        return view('pages.jugement.edit', compact('jugement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req,$id)
    {
        Jugement::where('idJugement', $id)->delete();

        $juge = new Jugement();
        $juge->idJugement = $req->idJugement;
        $juge->tribunal = $req->tribunal;
        $juge->motif = $req->motif;
        $juge->dateJugement = $req->dateJugement;
        //dd($juge);
        $juge->save();
        return redirect()->route('jugement')->with('success','votre modification a ete fait avec success !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jugement::where('idJugement', $id)->delete();
        return back()->with('error','Votre jugement ete supprime  avec succès ! Merci ');
    }
}
