@extends('../template')
@section('content')
@livewire('header')
<div class="container m-4 p-4 mx-auto text-justify">
    <h1 class="text-4xl w-full p-2"><i class="fa fa-edit "></i> Modification Enfant</h1>
    @if(Session::has('success'))
    <div class="bg-green-700 text-white text-center w-96 p-1 text-bold">
        <i class="fa fa-check"></i>  {{ Session()->get('success') }}
    </div>
    @endif
    @livewire('form-edit',['enfant' => $enfant])
</div>
@livewire('footer')
@endsection
