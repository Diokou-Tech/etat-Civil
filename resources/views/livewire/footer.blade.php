<div>
   <footer class="rounded text-gray-700 p-2  bottom-0 flex justify-between">
    <h1 class="font-bold">&copy; {{ date('Y')}} Casa-Tech</h1>
    @auth
    <h1 class="font-bold text-right"> <i class="fa fa-user"></i> {{ Auth::user()->name  }}</h1>
    @endauth
   </footer>
</div>
