
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adaugă un nou contract de arendare') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-3">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">Completează datele contractului</div>

                                <div class="card-body">
                                    <form method="POST" action="#">
                                        @csrf

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="nume" class="form-label">Nume:</label>
                                                <input id="nume" type="text" class="form-control" name="nume" required autofocus>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="prenume" class="form-label">Prenume:</label>
                                                <input id="prenume" type="text" class="form-control" name="prenume" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="data_incepere" class="form-label">Data începerii contractului:</label>
                                                <input id="data_incepere" type="date" class="form-control" name="data_incepere" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="data_incheiere" class="form-label">Data încheierii contractului:</label>
                                                <input id="data_incheiere" type="date" class="form-control" name="data_incheiere" required>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="locul_terenului" class="form-label">Locul situării terenului:</label>
                                            <input id="locul_terenului" type="text" class="form-control" name="locul_terenului" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="mentiuni" class="form-label">Mentiuni:</label>
                                            <textarea id="mentiuni" class="form-control" name="mentiuni" rows="3"></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Trimite</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
