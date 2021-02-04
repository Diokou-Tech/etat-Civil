<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Extrait {{ $enfant->nom }} {{ $enfant->prenom }}</title>
</head>
<body>
    <table class="table" border="1" cellspacing=0>
        <tr>
            <td colspan="2">
                <h1>Region de Ziguinchor</h1>
                <h1>Ville de Ziguinchor </h1>
                <h2>Centre Principal de Ziguinchor</h2>
                <h2>Registre N°<b>{{ $enfant->id}}/{{ Str::before($enfant->dateNaiss,'-')}}</b> </h2>
            </td>
            <td colspan="2">
                <h1 align="center">REPUBLIQUE DU SENEGAL</h1>
                <h1 align="center">UN PEUPLE - UN BUT - UNE FOI </h1>
                <hr width="30" align="left">
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <h1>EXTRAIT DU REGISTRE DES ACTES DE NAISSANCE</h1>
                <h2>Pour l'année <b>{{ $enfant->anneeLettre }}</b></h2>
                <h2>N° dans le registre <b>{{ $enfant->idLettre }}</h2>
                <h2>(En lettres)</h2>
            </td>
            <td class="td-center">
                <h2>An {{ Str::before($enfant->dateNaiss,'-')}}</h2>
                <h2>{{$enfant->id}}</h2>
                <h2> (N° dans le registre ) </h2>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <h2>Le <b>{{ Str::afterLast($enfant->dateNaiss,'-') }}  {{ $enfant->moisLettre }} {{ $enfant->anneeLettre }}</b></h2>
                <h2>à <b> {{ Str::before($enfant->heure,':')}}</b> heures(s)  <b> {{ Str::before(Str::after($enfant->heure,':'),':')}}</b> minutes  est né(e) à <b>{{ $enfant->lieuNaiss }}</b> </h2>
                <h2>Un enfant de sexe <b>{{$enfant->sexe}}</b>  </h2>
                <div class="t">
                    <p>
                        <b>{{ strtoupper($enfant->prenom) }}</b> <br> <span>Nom de famille </span>
                    </p>
                    <p>
                        <b>{{ strtoupper($enfant->nom) }} </b> <br> <span>Prénoms</span>
                    </p>
                </div>
                    <p>
                        <b>{{ $enfant->prenomPere }}</b> <br><small>Prénoms du père</small>
                    </p>

                <div class="t">
                        <p>
                            <b>{{ strtoupper($enfant->prenomMere) }}</b> <br> <span>Nom de famille de la Mère </span>
                        </p>
                        <p>
                            <b>{{ strtoupper($enfant->nomMere) }} </b> <br> <span>Prénom de la Mère </span>
                        </p>
                </div>
            </td>
        </tr>
        @if($jugement)
        <tr>
            <td>
                <h2>{{ $jugement->motif }}</h2>
            </td>
            <td colspan="2">
               <h2>Délivré par le juge <b>{{ $jugement->tribunal }}</b> </h2>
               <h2>Le dix huit décembre <b>{{$jugement->anneeLettreJugement}}</b></h2>
               <h2>Sous le numero <b>{{ $jugement->idLettre }}</b></h2>
               <h2>Inscrit le <b>{{ Str::before($jugement->created_at,' ') }}</b> </h2>
               <h2>Sur le registre des actes de naissance </h2>
            </td>
            <td class="td-center">
                <h1>An {{ Str::before($jugement->dateJugement,'-')}}</h1>
                <h2>{{ $jugement->idJugement }} (<small>numero jugement</small>)</h2>
                <h2><b>{{ Str::before($jugement->created_at,'-')}}</b></h2>
            </td>
        </tr>
        @else
        <tr>
            <td colspan="4" class="vide"></td>
        </tr>
        @endif
        <tr>
            <td colspan="4">
                <div class="t">
                    <p>
                        POUR EXTRAIT CERTIFIE CONFORME <br>
                        A Ziguinchor le {{ date('d-m-Y') }}<br>
                        L'officier d'état civil soussigné<br>
                        {{ $user->id }} {{ $user->name }}
                    </p>
                    <p>
                        Extrait délivré par le <br>
                        CENTRE PRINCIPAL DE ZIGUINCHOR <br>
                        <small >(1)(2)(3) Notes et mentions marginales au verso </small>
                    </p>
            </div>
            </td>
        </tr>
        <tr>
            <td><small>Reserve</small></td>
            <td colspan="3">
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
            </td>
        </tr>
    </table>
</body>
<style>
    .vide{
        height: 170px;
    }
    .table{
        width: 100%;
        min-width: 100%;
        border: 1px solid gray;
    }
    *{
        padding: 2px;
    }
    .td-center{
        text-align: center;
    }
    .t{
        display: flex;
        justify-content: space-around;
    }
    .t p{
        display: block;
        text-align: center;
        width: 300px;
    }
    .t p:first-child{
        float: right;
    }
    h1,h2{
        font-weight: normal;
    }
    h1{
        font-size: 20px;
    }
    h2{
        font-size: 14px;
    }
    div span{
        font-size: 10px;
    }
    .flex{
        vertical-align: baseline;
        text-align: center;
    }
</style>
</html>
