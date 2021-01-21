<div class="mx-auto m-4">
    <hr class="w-3/4 mx-auto m-2 bg-orange-700">
    @if ($enfants)
    <table class="table table-auto mx-auto p-2 w-3/4 justify-center  text-center border block" id="bord">
        <thead>
            <th>#</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>sexe</th>
            <th>date naissance</th>
            <th>lieu de naissance</th>
            <th>heure</th>
            <th>pere CNI</th>
            <th>Mere CNI</th>
            <th>Action</th>
        </thead>
        <tbody>

            @foreach ( $enfants as $item)
            <tr>
                <td>{{ $item->id  }}</td>
                <td>{{ $item->nom  }}</td>
                <td>{{ $item->prenom  }}</td>
                <td>{{ $item->sexe  }}</td>
                <td>{{ $item->dateNaiss  }}</td>
                <td>{{ $item->lieuNaiss  }}</td>
                <td>{{ $item->heure  }}</td>
                <td>{{ $item->CNIpere  }}</td>
                <td>{{ $item->CNImere  }}</td>
                <td>
                    <a href="edit/{{ $item->id }}" title="modifier"><i class="fa fa-edit  p-3 text-orange-500 "></i></a>
                    <a href="show/{{ $item->id }}" title="voir"><i class="fa fa-eye p-3 text-orange-500 "></i></a>
                    <a href="delete/{{ $item->id }}" title="supprimer" onclick="return confirm('voulez vous supprimer ')"><i class="fa fa-trash p-3 text-orange-500 "></i></a>
                    <a href="print/{{ $item->id }}" onclick="return confirm('voulez vous imprimer ')" title="imprimer"><i class="fa fa-print p-3 text-orange-500"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <h4 class="text-center ">Rien a afficher !</h4>
    @endif
    <script>
        $(document).ready( function () {
    $('#bord').DataTable();
} );
    </script>
</div>
