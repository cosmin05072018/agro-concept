<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Terenuri') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="mx-auto">
            <div class="p-3">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('addLand') }}" class="mb-5 bg-white p-3 rounded-3">
                                <p class="text-center fw-bolder">Adauga Teren</p>
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="nume" class="form-label">Nume teren <span
                                                class="text-danger fw-bold">*</span>:</label>
                                        <input id="nume" type="text" class="form-control" name="nameLand"
                                            autofocus value="{{ old('nameLand') }}"
                                            placeholder="Introduceti numele terenului">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="judet" class="form-label">Judet <span
                                                class="text-danger fw-bold">*</span>:</label>
                                        <input id="judet" type="text" class="form-control" name="judet"
                                            value="{{ old('judet') }}" placeholder="Introduceti numele judetului">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="localitate" class="form-label">Localitate <span
                                                class="text-danger fw-bold">*</span>:</label>
                                        <input id="localitate" type="text" class="form-control" name="localitate"
                                            autofocus value="{{ old('localitate') }}"
                                            placeholder="Introduceti numele Localitatii">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="mentiuni" class="form-label">Mențiuni (opțional):</label>
                                    <textarea id="mentiuni" class="form-control" name="mentiuni" rows="3"></textarea>
                                </div>

                                <button type="submit" class="btn btn-send-data">Adaugă teren</button>
                            </form>
                            @if ($terenuri->count())
                                <div class="bg-white p-3 rounded-3">
                                    <p class="text-center fw-bolder">Tabel Terenuri</p>
                                    <div class="modal fade" id="update" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-success" id="exampleModalLabel">
                                                        Actualizare</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="#" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="numeTeren" class="form-label">Nume teren</label>
                                                            <input type="text" class="form-control" id="numeTeren"
                                                                name="numeTeren" value="{{ $teren->nume_teren }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="judet" class="form-label">Județ</label>
                                                            <input type="text" class="form-control" id="judet"
                                                                name="judet" value="{{ $teren->judet }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="localitate"
                                                                class="form-label">Localitate</label>
                                                            <input type="text" class="form-control" id="localitate"
                                                                name="localitate" value="{{ $teren->localitate }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="mentiuni" class="form-label">Mențiuni</label>
                                                            <input type="text" class="form-control" id="mentiuni"
                                                                name="mentiuni" value="{{ $teren->mentiuni }}">
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

                                </div>
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
            "columnDefs": [{
                "targets": [4, 5],
                "orderable": false
            }],
            layout: {
                topStart: {
                    buttons: [{
                            extend: 'excelHtml5',
                            title: 'Tabel centralizator terenuri',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4]
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Tabel centralizator terenuri',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4]
                            }
                        },
                        {
                            extend: 'print',
                            title: 'Tabel centralizator terenuri',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4]
                            }
                        }
                    ],
                }
            },
            "info": false,
            "paging": false,
            "language": {
                search: 'Cauta:'
            }
        });
        $(".dt-search").addClass("d-flex flex-column");
        $(".dt-search-0").addClass("form-label");
        $(".dt-input").addClass("form-control form-control-sm mb-3");
        $(".buttons-excel").addClass("btn btn-primary");
        $(".buttons-pdf").addClass("btn btn-danger");
        $(".buttons-print").addClass("btn btn-info");
    });
</script>
