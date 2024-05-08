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
                            <form method="POST" action="{{ route('addLand') }}">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="nume" class="form-label">Nume teren:</label>
                                        <input id="nume" type="text" class="form-control" name="nameLand"
                                            autofocus>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="suprafata" class="form-label">Suprafață teren:</label>
                                        <div class="d-flex align-items-center">
                                            <input id="suprafata" type="text" class="form-control" name="suprafata"
                                                value="0" step="0.01">
                                            <span class="mx-1 fw-bold">/ha</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="mentiuni" class="form-label">Mențiuni (opțional):</label>
                                    <textarea id="mentiuni" class="form-control" name="mentiuni" rows="3"></textarea>
                                </div>

                                <button type="submit" class="btn btn-send-data">Adaugă teren</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h3>aici jos vreau sa facem un tabel cu terenurile existente. Va fi rezultatul apasarii unui buton</h3>
</x-app-layout>
