
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Evidență nivel arendă') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="mx-auto">
            <div class="bg-white p-3">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <form method="POST" action="#">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="nume" class="form-label">Valoare nivel arendă:</label>
                                        <input id="nume" type="number" class="form-control" name="nume" required autofocus>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="data_incheiere" class="form-label">Selectează anul</label>
                                        <input id="data_incheiere" type="date" class="form-control" name="data_incheiere" required>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-send-data">Adaugă nivel arendă</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
