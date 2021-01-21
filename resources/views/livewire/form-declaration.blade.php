<div>
    <form action="/declaration" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-3 gap-4">
           <div class="">
               <fieldset>
                   <legend class="text-orange-700">Infos Enfant</legend>
                <p class="m-2 p-1">
                    <label for="nom" class="block">Nom  de l'enfant </label>
                    <input type="text" name="nom" value="{{ old('nom') }}" id="nom" autofocus class="w-3/4 border @error('nom')  border-red-700  border-2 @enderror rounded p-1 appearance-none">
                    <small class="block text-red-600 p-1">
                        @error('nom')
                            {{ $message }}
                        @enderror
                    </small>
                </p>
                <p class="m-2 p-1">
                    <label for="prenom" class="block">Prenom  de l'enfant </label>
                    <input type="text" name="prenom" value="{{ old('prenom') }}" id="prenom" class="border w-3/4 @error('prenom')  border-red-700  border-2 @enderror rounded p-1 appearance-none">
                    <small class="block text-red-600 p-1">
                        @error('prenom')
                            {{ $message }}
                        @enderror
                    </small>
                </p>
                <p class="m-2 p-1">
                    <label for="sexe" class="block">sexe de l'enfant </label>
                    <select name="sexe" id="sexe" class="appearance-none w-3/4 border p-1 @error('sexe')  border-red-700  border-2 @enderror">
                        <option value="M">Masculin</option>
                        <option value="F">Feminin</option>
                    </select>
                    <small class="block text-red-600 p-1">
                        @error('sexe')
                            {{ $message }}
                        @enderror
                    </small>
                </p>
                <p class="m-2 p-1">
                    <label for="lieuNaiss" class="block">Lieu de naissance </label>
                    <input type="text" name="lieuNaiss" value="{{ old('lieuNaiss') }}" id="lieuNaiss" class="border w-3/4 focus:outline-none rounded p-1 appearance-none @error('lieuNaiss')  border-red-700  border-2 @enderror">
                    <small class="block text-red-600 p-1">
                        @error('lieuNaiss')
                            {{ $message }}
                        @enderror
                    </small>
                </p>
                <p class="m-2 p-1">
                    <label for="dateNaiss" class="block">Date de naissance </label>
                    <input type="date" name="dateNaiss" value="{{ old('dateNaiss') }}" id="dateNaiss" class="border w-3/4 rounded p-1 appearance-none @error('dateNaiss')  border-red-700  border-2 @enderror">
                    <small class="block text-red-600 p-1">
                        @error('dateNaiss')
                            {{ $message }}
                        @enderror
                    </small>
                </p>
                <p class="m-2 p-1">
                    <label for="heure" class="block">Heure naissance</label>
                    <input type="time" name="heure" value="{{ old('heure') }}" id="heure" class="border  w-3/4 rounded p-1 appearance-none @error('dateNaiss')  border-red-700  border-2 @enderror">
                    <small class="block text-red-600 p-1">
                        @error('heure')
                            {{ $message }}
                        @enderror
                    </small>
                </p>
               </fieldset>
           </div>
           <div>
               <fieldset>
            <legend  class="text-orange-700">infos parents</legend>
            <p class="m-2 p-1">
                <label for="CNIpere" class="block">CNI père </label>
                <input type="number" name="CNIpere" value="{{ old('CNIpere') }}" id="CNIpere" class="border w-3/4  rounded p-1 appearance-none @error('CNIpere')  border-red-700  border-2 @enderror">
                <small class="block text-red-600 p-1">
                    @error('CNIpere')
                        {{ $message }}
                    @enderror
                </small>
            </p>
            <p class="m-2 p-1">
                <label for="prenomPere" class="block">prenom Pere</label>
                <input type="text" name="prenomPere" value="{{ old('prenomPere') }}" id="prenomPere" class="border w-3/4 @error('prenomPere')  border-red-700  border-2 @enderror  rounded p-1 appearance-none">
                <small class="block text-red-600 p-1">
                    @error('prenomPere')
                        {{ $message }}
                    @enderror
                </small>
            </p>
            <p class="m-2 p-1">
                <label for="CNImere" class="block"> CNI Mere </label>
                <input type="number" name="CNImere" id="CNImere" value="{{ old('CNImere') }}" class="border w-3/4  rounded p-1 appearance-none @error('CNIpere')  border-red-700  border-2 @enderror">
                <small class="block text-red-600 p-1">
                    @error('CNImere')
                        {{ $message }}
                    @enderror
                </small>
            </p>
            <p class="m-2 p-1">
                <label for="nomMere" class="block">nom Mere </label>
                <input type="text" name="nomMere" id="nomMere" value="{{ old('nomMere') }}" class="border w-3/4 @error('nomMere')  border-red-700  border-2 @enderror  rounded p-1 appearance-none">
                <small class="block text-red-600 p-1">
                    @error('nomMere')
                        {{ $message }}
                    @enderror
                </small>
            </p>
            <p class="m-2 p-1">
                <label for="prenomMere" class="block">prenom Mère</label>
                <input type="text" name="prenomMere" id="prenomMere" value="{{ old('prenomMere') }}" class="border w-3/4 @error('prenomMere')  border-red-700  border-2 @enderror  rounded p-1 appearance-none">
                <small class="block text-red-600 p-1">
                    @error('prenomMere')
                        {{ $message }}
                    @enderror
                </small>
            </p>
           </div>
        </fieldset>
            <div>
                <fieldset>
                    <legend  class="text-orange-700">infos complementaires</legend>
                <p class="m-2 p-1">
                    <label for="jugement" class="block">Numero jugement</label>
                    <input type="number" name="jugement" id="jugement" value="{{ old('jugement') }}" class="w-3/4 @error('jugement')  border-red-700  border-2 @enderror border  rounded p-1 appearance-none"">
                    <small class="block text-red-600 p-1">
                        @error('jugement')
                            {{ $message }}
                        @enderror
                    </small>
                </p>
                <p class="m-2 p-1">
                    <label for="bulletin" class="block">Bullentin Naissance</label>
                    <input type="file" name="bulletin" id="bulletin" class="border w-3/4  rounded p-1 appearance-none @error('bulletin')  border-red-700  border-2 @enderror">
                    <small class="block text-red-600 p-1 p-1">
                        @error('bulletin')
                            {{ $message }}
                        @enderror
                    </small>
                </p>
                <p class="m-2 p-1">
                    <label for="jugement" class="block">CNI declarant</label>
                    <input type="number" name="CNIdeclarant" id="CNIdeclarant" value="{{ old('CNIdeclarant') }}" class="w-3/4 @error('CNIdeclarant')  border-red-700  border-2 @enderror border  rounded p-1 appearance-none"">
                    <small class="block text-red-600 p-1 p-1">
                        @error('CNIdeclarant')
                            {{ $message }}
                        @enderror
                    </small>
                </p>
                <p class="m-2 p-1">
                    <label for="jugement" class="block">Nom declarant</label>
                    <input type="text" name="nomDeclarant" value="{{ old('nomDeclarant') }}" id="nomDeclarant" class="w-3/4 @error('nomDeclarant')  border-red-700  border-2 @enderror border  rounded p-1 appearance-none"">
                    <small class="block text-red-600 p-1 p-1">
                        @error('nomDeclarant')
                            {{ $message }}
                        @enderror
                    </small>
                </p>
                <p class="m-2 p-1">
                    <label for="prenomDeclarant" class="block">Prenom declarant</label>
                    <input type="text" name="prenomDeclarant" value="{{ old('prenomDeclarant') }}" id="prenomDeclarant" class="w-3/4 @error('prenomDeclarant')  border-red-700  border-2 @enderror border  rounded p-1 appearance-none"">
                    <small class="block text-red-600 p-1 p-1">
                        @error('prenomDeclarant')
                            {{ $message }}
                        @enderror
                    </small>
                </p>
            </fieldset>
               </div>
        </div>
                <h1 class="text-center"><button type="submit" class="bg-orange-500 hover:bg-gray-700 text-white mt-5 p-2 rounded"><i class="fa fa-save"></i> Enregistrer</button></h1>
    </form>
</div>
