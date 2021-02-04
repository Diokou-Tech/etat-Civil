@extends('../template')
@section('content')
<h1 class="flex justify-between m-0">
    <a href="/tableauBord" class="fixed  p-2 m-10 top-4 bg-gray-700 text-white text-sm rounded" title="Retout">&lAarr;</a>
    <a href="/print/{{ $enfant->id }}" class="fixed top-16 p-2 m-10 bg-gray-700 text-white rounded text-sm" title="Imprimer"><i class="fa fa-print"></i></a>
    <a href="../pieces/{{ $enfant->bulletin }}" class="fixed top-28 p-2 m-10 bg-gray-700 text-white rounded text-sm" title="piece"><i class="fa fa-eye"></i></a>
</h1>
<div class="block container border mx-auto border-gray-700">
    <div class="flex flex-row justify-between border p-2">
        <div>
            <h1 class="text-lg"> Region de Ziguinchor </h1>
            <h1 class="text-lg">Ville de Ziguinchor </h1>
            <h1 class="mt-4">Centre Principal de Ziguinchor </h1>
            <h2>Registre N° <b>{{ $enfant->id}}/{{ Str::before($enfant->dateNaiss,'-')}}</b>     </h2>
        </div>
        <div>
            <h1 class="text-xl">REPUBLIQUE DU SENEGAL </h1>
            <h2 class="">UN PEUPLE - UN BUT - UNE FOI</h2>
            <hr class="w-1/4 border-3 border">
            <h1 class="text-2xl mt-5">ETAT-CIVIL </h1>
        </div>
    </div>
    <div class="flex flex-row justify-between border p-2">
        <div>
            <h1 class="text-3xl">EXTRAIT DU REGISTRE DES ACTES DE NAISSANCE </h1>
            <h2>Pour l'année <b>{{ $enfant->anneeLettre }}</b> </h2>
            <h2>N° dans le registre <b>{{ $enfant->idLettre }}</b> </h2><small>(En lettres)</small>
        </div>
        <div class="border-l-2 pl-2 flex flex-col justify-center">
            <h1>An  {{ Str::before($enfant->dateNaiss,'-')}}</h1>
            <h1> {{$enfant->id}}</h1>
            <h1><small>(N° dans le registre )</small></h1>
        </div>
    </div>
    <div class="border p-2">
        <h1>Le <b>{{ Str::afterLast($enfant->dateNaiss,'-') }}  {{ $enfant->moisLettre }} {{ $enfant->anneeLettre }}</b> </h1>
        à  <b> {{ Str::before($enfant->heure,':')}}</b>heure(s) {{ Str::before($enfant->heure,':')}} minutes  est né(e) à  <b>{{$enfant->lieuNaiss}}</b> </h1>
        <h1>Un enfant de sexe <b>{{$enfant->sexe}}</b> </h1>
        <div class="flex justify-around ">
            <h1 class="m-4"> <b>{{ strtoupper($enfant->prenom) }}</b> <br> <small>Prenoms</small></h1>
            <h1 class="m-4"> <b>{{ strtoupper($enfant->nom) }} </b> <br> <small>Nom de Famille</small> </h1>
        </div>
        <h1>De <b>{{ $enfant->prenomPere }}</b>  <br> <small>Prenoms Pere</small></h1>
        <div class="flex justify-around ">
            <h1 class="m-4"> <b>{{ strtoupper($enfant->prenomMere) }}</b> <br> <small>Prenoms de la Mère</small></h1>
            <h1 class="m-4"> <b>{{ strtoupper($enfant->nomMere) }} </b> <br> <small>Nom de Famille de la Mère</small> </h1>
        </div>
    </div>
    <div class="p-20">
    </div>
    <div class="border p-2 flex">
        <div>
            <h1>Extrait délivré par </h1>
            <H1 class="mb-4">CENTRE PRINCIPAL DE ZIGUINCHOR</H1>
            <small >(1)(2)(3) Notes et mentions marginales au verso </small>
        </div>
        <div class="ml-72">
        <h1>POUR EXTRAIT CERTIFIE CONFORME </h1>
        <h1>A ZIGUINCHOR   LE {{ date('d-m-Y') }} </h1>
        <h1 class="ml-4">L'officier d'état civil soussigné </h1>
        <h1 class="ml-4">{{ $user->name }}</h1>
        </div>
    </div>
    <div class="border p-2 flex justify-between">
        <h1>RESERVE</h1>
        <div>
            <span class="mr-5" >|___|___|</span>
            <span class="mr-5">|___|___|___|</span>
            <span class="mr-5">|___|___|</span>
            <span class="mr-5">|___|___|</span>
            <span class="mr-5">|___|___|___|___|___|___|</span>
            <span class="mr-5">|___|___|___|</span>
            <span class="mr-5">|___|___|</span>
            <span class="mr-5">|___|___|___|</span>
        </div>
    </div>
</div>
@endsection
