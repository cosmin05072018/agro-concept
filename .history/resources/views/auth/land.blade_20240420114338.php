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
                                    <table class="table table-striped table-hover" id="table">
                                        <thead class="table-dark">
                                            <tr>
                                                <th scope="col" class="text-center">#</th>
                                                <th scope="col" class="text-center">Nume teren</th>
                                                <th scope="col" class="text-center">Judet</th>
                                                <th scope="col" class="text-center">Localitate</th>
                                                <th scope="col" class="text-center">Mențiuni (dacă sunt)</th>
                                                <th scope="col" class="text-center ">Acțiuni</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($terenuri as $teren)
                                                <tr>
                                                    <td class="text-center">{{ $teren->id }}</td>
                                                    <td class="text-center">{{ $teren->nume_teren }}</td>
                                                    <td class="text-center">{{ $teren->judet }}</td>
                                                    <td class="text-center">{{ $teren->localitate }}</td>
                                                    <td class="text-center">{{ $teren->mentiuni }}</td>
                                                    <td>
                                                        urmeaza editat (actualizare, stergere, vezi contract)
                                                        {{-- <div class="d-flex justify-content-around align-items-center">
                                    <button class="btn btn-primary w-25">
                                        <a href="{{ route('detailsProduct', $teren->id) }}" class="text-white d-flex align-items-center justify-content-between">
                                            Details
                                            <i class="bi bi-info-circle"></i>
                                        </a>
                                    </button>
                                    <button class="btn btn-warning w-25">
                                        <a href="{{ route('updateProductView', $teren->id) }}" class="text-white d-flex align-items-center justify-content-between">
                                            Update
                                            <i class="bi bi-pass-fill"></i>
                                        </a>
                                    </button>
                                    <form action="{{ route('deleteProduct', $teren->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger w-100 d-flex align-items-center justify-content-between"> Delete <i class="bi bi-trash"></i></button>
                                    </form>
                                </div> --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
