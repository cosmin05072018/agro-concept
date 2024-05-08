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
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
        $(".dt-search-0").addClass("form-label");
        $(".dt-input").addClass("form-control");
    });
</script>
