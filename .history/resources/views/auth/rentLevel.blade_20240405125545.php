<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Setează nivelul arendei pentru anul curent.') }}
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
                            @if ($rentLevel)
                                <p class="fw-bold bd-highlight text-wrap bg-light text-success">Nivelul arendei a fost
                                    setat pentru acest an, nu mai puteți adăuga altă valoare.</p>
                            @else
                                <p class="fw-bold bd-highlight">Nivelul arendei nu a fost setat. Vă rugăm să setați
                                    nivelul arendei.</p>
                            @endif
                            <form method="POST" action="{{ route('insertRentLevel') }}">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="Adaugă nivel arendă" class="form-label">Nivel arendă</label>
                                        <div class="d-flex align-items-center">
                                            <input type="number" class="form-control" id="numberInput" name="rentLevel"
                                                @if ($rentLevel) readonly @endif>
                                            <span class="fw-bold mx-1"> /kg</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="an" class="form-label">Pentru anul</label>
                                        <input type="number" class="form-control" id="an" name="an"
                                            value="{{ $date }}" readonly>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-send-data"
                                    @if ($rentLevel) disabled @endif>Adaugă nivel arendă</button>
                            </form>
                            @if ($rentLevel)
                                <table class="table mt-5 text-center">
                                    <thead>
                                        <tr>
                                            <th>Nivel Arenda</th>
                                            <th>An</th>
                                            <th>Acțiuni</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rentLevel as $item)
                                            <tr>
                                                <td>{{ $item->nivel_arenda }}</td>
                                                <td>{{ $item->an }}</td>
                                                <td class="d-flex justify-content-around">
                                                    {{-- <form action="{{ route('delete-rent-level', $item->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit">
                                                            <ion-icon class="deleteIcon text-danger"
                                                                name="trash-sharp"></ion-icon>
                                                        </button>
                                                    </form>
                                                    <ion-icon class="updateIcon text-success"
                                                        name="create-sharp"></ion-icon> --}}
                                                    <!-- Button trigger modal -->
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal">
                                                        <ion-icon class="deleteIcon text-danger"
                                                            name="trash-sharp"></ion-icon>
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Modal
                                                                        title</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    ...
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary">
                                                                        <form
                                                                            action="{{ route('delete-rent-level', $item->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <button type="submit"
                                                                                class="btn btn-danger">
                                                                                Da, doresc să șterg.
                                                                            </button>
                                                                        </form>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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

</x-app-layout>
