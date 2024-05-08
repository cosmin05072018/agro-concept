<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Terenuri') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="mx-auto">
            <div class="bg-white p-3">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('addLand') }}" class="mb-5">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="nume" class="form-label">Nume teren:</label>
                                        <input id="nume" type="text" class="form-control" name="nameLand"
                                            autofocus value="{{ old('nameLand') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="suprafata" class="form-label">Suprafață teren:</label>
                                        <div class="d-flex align-items-center">
                                            <input id="suprafata" type="text" class="form-control" name="suprafata"
                                                value="{{ old('suprafata') }}"> <span class="mx-1 fw-bold">/ha</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="mentiuni" class="form-label">Mențiuni (opțional):</label>
                                    <textarea id="mentiuni" class="form-control" name="mentiuni" rows="3"></textarea>
                                </div>

                                <button type="submit" class="btn btn-send-data">Adaugă teren</button>
                            </form>
                            @if ($terenuri->count())
                                <table class="table mt-3" id="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">#</th>
                                            <th scope="col" class="text-center">Nume teren</th>
                                            <th scope="col" class="text-center">Suprafața terenului</th>
                                            <th scope="col" class="text-center">Mențiuni (dacă sunt)</th>
                                            <th scope="col" class="text-center">Acțiuni</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($terenuri as $teren)
                                            <tr>
                                                <td class="text-center">{{ $teren->id }}</td>
                                                <td class="text-center">{{ $teren->nume_teren }}</td>
                                                <td class="text-center">{{ $teren->suprafata }}</td>
                                                <td class="text-center">{{ $teren->mentiuni }}</td>
                                                <td>
                                                    urmeaza editat
                                                    {{-- <div class="d-flex justify-content-around align-items-center">
                                                <button class="btn btn-primary w-25">
                                                    <a href="{{ route('detailsProduct', $teren->id) }}" class="text-white d-flex align-items-center justify-content-between">
                                                        Details
                                                        <i class="bi bi-info-circle"></i>
                                                    </a>
                                                </button>
                                                <button class="btn btn-warning w-25">
                                                    <a href="{{ route('updateProductView', $teren->id) }}" class="text-white d-flex align-items-center justify-content-between">
                                                        Update
                                                        <i class="bi bi-pass-fill"></i>
                                                    </a>
                                                </button>
                                                <form action="{{ route('deleteProduct', $teren->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger w-100 d-flex align-items-center justify-content-between"> Delete <i class="bi bi-trash"></i></button>
                                                </form>
                                            </div> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h3>aici jos vreau sa facem un tabel cu terenurile existente. Va fi rezultatul apasarii unui buton</h3>


</x-app-layout>
<script>
    $(document).ready(function() {
        $('#table').DataTable({
            "dom": 'frti',
            "columnDefs": [{
                "targets": [3, 4],
                "orderable": false
            }],
            "info": false
        });
        s
        $(".dt-search-0").addClass("form-label");
        $(".dt-input").addClass("form-control");
    });
</script>
