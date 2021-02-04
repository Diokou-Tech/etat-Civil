@extends('../template')
@section('content')
@livewire('header')

@if(Session::has('success'))
<div class="bg-green-700 text-white text-center mt-2 w-96 mx-auto p-2 text-bold text-sm alert">
    <i class="fa fa-check"></i>  {{ Session()->get('success') }}
</div>
@endif
@if(Session::has('error'))
<div class="bg-red-700 text-white w-96 mx-auto mt-2  text-sm p-2 text-bold alert">
    <i class="fa fa-check"></i>  {{ Session()->get('error') }}
</div>
@endif
<div class="block flex flex-row pt-10">
<form action="/jugement" method="POST" class="shadow-lg p-4 block-inline border-r border-gray-700">
    @csrf
            <p class="m-2 p-1">
                <label for="nom" class="block">Numero Jugement </label>
                <input type="number" name="idJugement" min="0"  autofocus class="w-full  border rounded p-1 appearance-none" required>
            </p>
            <p class="m-2 p-1">
                <label for="prenom" class="block">Tribunal</label>
                <select name="tribunal" id="tribunal" class="border w-full rounded p-1 appearance-none" required>
                    <option value="Tribunal d'Instance de Ziguinchor">Tribunal d'Instance de Ziguinchor</option>
                    <option value="Tribunal d'Instance de Dakar">Tribunal d'Instance de Dakar</option>
                    <option value="Tribunal d'Instance de Matam">Tribunal d'Instance de Matam</option>
                    <option value="Tribunal d'Instance de Pikine-Guediawaye">Tribunal d'Instance de Pikine-Guediawaye</option>
                </select>
            </p>
            <p class="m-2 p-1 block">
                <label for="motif" class="block">motif</label>
                <input type="text" name="motif"   class="border w-full rounded p-1 appearance-none" required>
            </p>
            <p class="m-2 p-1 block">
                <label for="motif" class="block">Date Jugement </label>
                <input type="date" name="dateJugement"  class="border w-full rounded p-1 appearance-none" required>
                <small class="block text-red-600 p-1">
                    @error('motif')
                        {{ $message }}
                    @enderror
                </small>
            </p>
            <h1 class="p-1"><button type="submit" class="bg-orange-500 hover:bg-gray-700 text-white mt-5 p-2 rounded"><i class="fa fa-save"></i> Enregistrer</button></h1>
</form>
<div class="w-full shadow-lg">
    <h1 class="text-center text-lg">Liste des jugements </h1>
    <table class="table table-auto mx-auto w-full text-sm justify-center  text-center border block" border="1">
        <thead>
            <tr>
                <th>#</th>
                <th>tribunal</th>
                <th>motif</th>
                <th>date de jugement</th>
                <th>date inscrite</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jugements as $j)
            <tr>
                <td> {{ $j->idJugement }} </td>
                <td> {{ $j->tribunal }} </td>
                <td> {{ $j->motif }} </td>
                <td> {{ $j->dateJugement }} </td>
                <td> {{ $j->created_at }} </td>
                <td>
                    <a href="/editJugement/{{ $j->idJugement }}" title="modifier"><i class="fa fa-edit  p-3 text-orange-500 "></i></a>
                    <a href="/delJugement/{{ $j->idJugement }}" title="supprimer" onclick="return confirm('voulez vous supprimer ')"><i class="fa fa-trash p-3 text-orange-500 "></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@livewire('footer')
@endsection
