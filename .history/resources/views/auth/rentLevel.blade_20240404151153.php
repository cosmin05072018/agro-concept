
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
                                        <label for="nume" class="form-label">Nume:</label>
                                        <input id="nume" type="text" class="form-control" name="nume" required autofocus>
                                    </div>
                                    <div class="mb-3">
                                        <label for="locul_terenului" class="form-label">Locul situării terenului:</label>
                                        <input id="locul_terenului" type="text" class="form-control" name="locul_terenului" required>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-send-data">Adaugă contract</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
