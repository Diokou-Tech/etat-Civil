<div>
    <header>
        <nav class="rounded-lg bg-gray-700 p-4  text-white flex justify-between">
            <h1 class="font-bold text-xl hover:text-gray-400 ">Gestion Etat Civil</h1>
            <ul class="flex items-center justify-center">
                <li> <a href="/" class=" m-3 p-4 hover:text-gray-400"><i class="fa fa-home"></i> Home </a> </li>
                <li> <a href="#" class=" m-3 p-4 hover:text-gray-400"><i class="fa fa-info "></i> A propos</a> </li>
                <li> <a href="#" class=" m-3 p-4 hover:text-gray-400"><i class="fa fa-question-circle"></i> Guide d'utilisation </a> </li>
                <li>
                    @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-jet-dropdown-link class="bg-transparent p-0" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                            <i class="fa fa-sign-out-alt text-white bg-gray-700 " title="deconnexion"></i>
                        </x-jet-dropdown-link>
                    </form>
                    @endauth
                </li>
            </ul>
        </nav>  
    </header>
</div>
