@extends('template')
@section('content')
@livewire('header')
<div class="flex">
    <h2 class="w-64 mx-auto text-center text-lg m-2 p-1 text-xl bg-orange-500 text-white rounded-xl hover:bg-orange-600"><a href="/declaration"><i class="fa fa-plus-square"></i> Faire une Declaration</a></h2>
    <h2 class="w-64 mx-auto text-center text-lg m-2 p-1 text-xl text-gray-600 rounded-xl"><a href="/jugement"><i class="fa fa-plus-square"></i> Ajouter un jugement </a></h2>
</div>
@if(Session::has('success'))
<div class="bg-green-700 text-white text-center w-96 mx-auto p-2 text-bold alert text-sm">
    <i class="fa fa-check"></i>  {{ Session()->get('success') }}
</div>
@endif
@livewire('tableau',['enfants' => $enfants])
 <!-- c la page footer composant  -->
 @livewire('footer')
@endsection
