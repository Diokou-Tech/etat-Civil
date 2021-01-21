@extends('template')
@section('content')
<!-- c la page header composant  -->
@livewire('header')
<!-- c la page login connexion  -->
@livewire('form-login')
 <!-- c la page footer composant  -->
@livewire('footer')
@endsection
