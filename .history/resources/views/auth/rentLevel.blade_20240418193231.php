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
                                    setat pentru acest an, nu mai puteți adăuga altă valoare decât anul următor. În schimb, puteți edita sau șterge nivelul arendei curent.</p>
                            @else
                                <p class="fw-bold bd-highlight text-danger">Nivelul arendei nu a fost setat. Vă rugăm să
                                    setați
                                    nivelul arendei.</p>
                            @endif
                            <form method="POST" action="{{ route('insertRentLevel') }}">
                                @csrf
                                @if ($rentLevel)
                                    <fieldset disabled>
                                @endif
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
                                @if ($rentLevel)
                                    </fieldset>
                                @endif
                            </form>
                            @if ($rentLevel)
                                <table class="table mt-5 text-center">
                                    <thead>
                                        <tr>
                                            <th>Nivel Arenda</th>
                                            <th>An</th>
                                            <th>Creat la data</th>
                                            <th>Acțiuni</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rentLevel as $item)
                                            <tr>
                                                <td>{{ $item->nivel_arenda }}</td>
                                                <td>{{ $item->an }}</td>
                                                <td>{{ $item->creat_la_data }}</td>
                                                <td class="d-flex justify-content-around">
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
                                                                    <h5 class="modal-title text-danger fw-bold"
                                                                        id="exampleModalLabel">Alertă</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <h4>Sunteți sigur că doriți să ștergeți acest nivel
                                                                        de arendă?</h4>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Înapoi
                                                                    </button>
                                                                    <form
                                                                        action="{{ route('delete-rent-level', $item->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <button type="submit" class="btn btn-danger">
                                                                            Da, doresc să șterg.
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Button trigger modal -->
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#update">
                                                        <ion-icon class="updateIcon text-success"
                                                            name="create-sharp"></ion-icon>
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="update" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-success"
                                                                        id="exampleModalLabel">Actualizare</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <form
                                                                    action="{{ route('update-rent-level', $item->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <div class="mb-3">
                                                                            <label for="nouaValoare" class="form-label">Actualizează nivel arendă</label>
                                                                            <input type="number" class="form-control" id="nouaValoare" name="valoareNoua">
                                                                          </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Înapoi</button>
                                                                        <button type="submit"
                                                                            class="btn btn-success">Actualizează</button>
                                                                    </div>
                                                                </form>
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
