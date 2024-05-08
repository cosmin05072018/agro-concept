<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Setează nivelul arendei pentru anul curent.')}}
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
                            <form method="POST" action="{{ route('insertRentLevel') }}">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="Adaugă nivel arendă" class="form-label">Nivel arendă</label>
                                        <div class="d-flex align-items-center bold mx-2">
                                            <input type="number" class="form-control" id="numberInput" name="rentLevel">
                                            <span>/kg</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="an" class="form-label">Pentru anul</label>
                                        <input type="number" class="form-control" id="an" name="an" value="{{ $date }}" readonly>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-send-data">Adaugă nivel arendă</button>
                            </form>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nivel Arenda</th>
                                        <th>An</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rentLevel as $item)
                                    <tr>
                                        <td>{{ $item->nivel_arenda }}</td>
                                        <td>{{ $item->an }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
