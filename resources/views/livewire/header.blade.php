<div>
    <header>
        <nav class="rounded-lg bg-gray-700 p-4  text-white flex justify-between items-center">
            <a href="/"><h1 class="font-bold text-xl hover:text-gray-400 items-center"> Gestion Etat Civil <img  class='inline w-7 rounded' src="./images/sn.png" alt=""></h1></a>
            <ul class="flex items-center justify-center">
                @auth
                <li> <a href="/tableauBord" class=" m-3 p-4 hover:text-gray-400"><i class="fa fa-clipboard-list"></i> Tableau de Bord </a> </li>
                <li> <a href="/search" class=" m-3 p-4 hover:text-gray-400"><i class="fa fa-search"></i> Recherche Avancée </a> </li>
                <li> <a href="/gestion" class=" m-3 p-4 hover:text-gray-400"><i class="fa fa-users"></i> Gestion des utilisateurs </a> </li>
                @endauth
                <li> <a href="/apropos" class=" m-3 p-4 hover:text-gray-400"><i class="fa fa-info "></i> A propos</a> </li>
                <li> <a href="/guide" class=" m-3 p-4 hover:text-gray-400"><i class="fa fa-question-circle"></i> Guide d'utilisation </a> </li>
                <li> <a href="/register" class=" m-3 p-4 hover:text-gray-400"><i class="fa fa-question-circle"></i> S'inscrire </a> </li>
                <li>
                    @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-jet-dropdown-link class="bg-transparent p-0" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                            <i class="fa fa-sign-out-alt text-white bg-gray-700 p-0" title="deconnexion"></i>
                        </x-jet-dropdown-link>
                    </form>
                    @endauth
                </li>
            </ul>
        </nav>
    </header>
</div>
