@extends('../template')
@section('content')
@livewire('header')
<div class="container m-4 p-4 mx-auto text-justify">
    <h1 class="text-4xl w-full p-2"> <i class="fa fa-search "></i>Recheche Avancee</h1>
    <form action="/search" method="POST" class="flex items-center justify-around">
        @csrf
        <p class="m-2 p-1">
            <label for="nom" class="block">Nom  de l'enfant </label>
            <input type="text" name="nom"  id="nom" autofocus class="w-4/4 border rounded p-1 appearance-none" pattern="[a-zA-Z]{2,}" required>
        </p>
        <p class="m-2 p-1">
            <label for="prenom" class="block">Prenom  de l'enfant </label>
            <input type="text" name="prenom"  id="prenom" autofocus class="w-4/4 border rounded p-1 appearance-none" required>
        </p>
        <p class="m-2 p-1">
            <label for="dateNaiss" class="block">Date Naissance </label>
            <input type="date" name="dateNaiss"  id="dateNaiss" autofocus class="w-4/4 border rounded p-1 appearance-none" required>
        </p>
        <h1 class="text-center"><button type="submit" class="bg-orange-500 hover:bg-gray-700 text-white mt-5 p-2 rounded"><i class="fa fa-search"></i> Rechercher</button></h1>
    </form>
</div>
@isset($enfants)
    @livewire('tableau', ['enfants' => $enfants]);
@endisset
@livewire('footer')
@endsection
