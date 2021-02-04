@extends('../template')
@section('content')
@livewire('header')
@if(Session::has('success'))
<div class="bg-green-700 text-white w-96 mx-auto p-2 text-bold text-sm alert">
    <i class="fa fa-check"></i>  {{ Session()->get('success') }}
</div>
@endif
<form action="/updateJuge/{{$jugement->idJugement}}" method="POST" class="shadow-lg container mx-auto p-4 block-inline ">
    @csrf
            <p class="m-2 p-1">
                <label for="nom" class="block">Numero Jugement </label>
                <input type="number" name="idJugement" value="{{ $jugement->idJugement }}" min="0"  autofocus class="w-full  border rounded p-1 appearance-none" required>
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
                <input type="text" name="motif" value="{{ $jugement->motif }}" class="border w-full rounded p-1 appearance-none" required>
            </p>
            <p class="m-2 p-1 block">
                <label for="motif" class="block">Date Jugement </label>
                <input type="date" name="dateJugement" value="{{ $jugement->dateJugement }}"  class="border w-full rounded p-1 appearance-none" required>
            </p>
            <h1 class="p-1 text-center"><button type="submit" class="bg-orange-500  hover:bg-gray-700 text-white mt-5 p-2 rounded"><i class="fa fa-save"></i> Enregistrer</button></h1>
</form>
@livewire('footer')
@endsection
