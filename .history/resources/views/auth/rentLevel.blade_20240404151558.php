
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
                                        <label for="year">Select Year</label>
                                        <select class="form-control" id="year" name="year">
                                            <option value="{{ date('Y') }}">{{ date('Y') }}</option>
                                            <option value="{{ date('Y') + 1 }}">{{ date('Y') + 1 }}</option>
                                            <option value="{{ date('Y') + 2 }}">{{ date('Y') + 2 }}</option>
                                            <option value="{{ date('Y') + 3 }}">{{ date('Y') + 3 }}</option>
                                            <option value="{{ date('Y') + 4 }}">{{ date('Y') + 4 }}</option>
                                            <option value="{{ date('Y') + 5 }}">{{ date('Y') + 5 }}</option>
                                            <option value="{{ date('Y') + 6 }}">{{ date('Y') + 6 }}</option>
                                            <option value="{{ date('Y') + 7 }}">{{ date('Y') + 7 }}</option>
                                            <option value="{{ date('Y') + 8 }}">{{ date('Y') + 8 }}</option>
                                            <option value="{{ date('Y') + 9 }}">{{ date('Y') + 9 }}</option>
                                            <option value="{{ date('Y') + 10 }}">{{ date('Y') + 10 }}</option>
                                          </select>
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
