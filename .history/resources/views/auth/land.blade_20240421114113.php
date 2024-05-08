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
                                    <div class="col-md-4">
                                        <label for="nume" class="form-label">Nume teren <span
                                                class="text-danger fw-bold">*</span>:</label>
                                        <input id="nume" type="text" class="form-control" name="nameLand"
                                            autofocus value="{{ old('nameLand') }}"
                                            placeholder="Introduceti numele terenului">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="judet" class="form-label">Judet <span
                                                class="text-danger fw-bold">*</span>:</label>
                                        <input id="judet" type="text" class="form-control" name="judet"
                                            value="{{ old('judet') }}" placeholder="Introduceti numele judetului">
                                    </div>
                                    <div class="col-md-4">
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
                                    <table class="custom-table table table-striped table-hover" id="table">
                                        <thead class="table-dark">
                                            <tr>
                                                <th scope="col" class="text-center">#</th>
                                                <th scope="col" class="text-center">Nume teren</th>
                                                <th scope="col" class="text-center">Judet</th>
                                                <th scope="col" class="text-center">Localitate</th>
                                                <th scope="col" class="text-center">Mențiuni (dacă sunt)</th>
                                                <th scope="col" class="text-center">Acțiuni</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($terenuri as $teren)
                                                <tr>
                                                    <td class="text-center">{{ $teren->id }}</td>
                                                    <td class="text-center">{{ $teren->nume_teren }}</td>
                                                    <td class="text-center">{{ $teren->judet }}</td>
                                                    <td class="text-center">{{ $teren->localitate }}</td>
                                                    <td class="text-center overflow-auto">{{ $teren->mentiuni }}</td>
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
                                                                        <h4>Sunteți sigur că doriți să ștergeți acest
                                                                            teren?</h4>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Înapoi
                                                                        </button>
                                                                        <form
                                                                            action="{{ route('delete-land', $teren->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <button type="submit"
                                                                                class="btn btn-danger">
                                                                                Da, doresc să șterg.
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#update-{{ $teren->id }}">
                                                            <ion-icon class="updateIcon text-success"
                                                                name="create-sharp"></ion-icon>
                                                        </button>
                                                        <div class="modal fade" id="update-{{ $teren->id }}"
                                                            tabindex="-1"
                                                            aria-labelledby="updateLabel-{{ $teren->id }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title text-success"
                                                                            id="updateLabel-{{ $teren->id }}">
                                                                            Actualizare</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <form
                                                                        action="{{ route('update-teren', $teren->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <div class="mb-3">
                                                                                <label for="numeTeren"
                                                                                    class="form-label">Nume
                                                                                    teren</label>
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    id="numeTeren"
                                                                                    name="numeTerenActualizare"
                                                                                    value="{{ $teren->nume_teren }}">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="judet"
                                                                                    class="form-label">Județ</label>
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    id="judet"
                                                                                    name="judetActualizare"
                                                                                    value="{{ $teren->judet }}">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="localitate"
                                                                                    class="form-label">Localitate</label>
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    id="localitate"
                                                                                    name="localitateActualizare"
                                                                                    value="{{ $teren->localitate }}">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="mentiuni"
                                                                                    class="form-label">Mențiuni</label>
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    id="mentiuni"
                                                                                    name="mentiuniActualizare"
                                                                                    value="{{ $teren->mentiuni }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
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
                            pageSize: 'LEGAL',
                            orientation: 'landscape',
                            title: 'Tabel centralizator terenuri',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4]
                            },
                            customize: function(doc) {
                                //Remove the title created by datatTables
                                doc.content.splice(0, 1);
                                //Create a date string that we use in the footer. Format is dd-mm-yyyy
                                doc.pageMargins = [20, 60, 20, 30];
                                // Set the font size fot the entire document
                                doc.defaultStyle.fontSize = 10;
                                // Set the fontsize for the table header
                                doc.styles.tableHeader.fontSize = 7;
                                doc.content[0].table.widths = ['5%', '30%', '25%', '15%',
                                    '50%'
                                ];
                                // Create a header object with 3 columns
                                // Left side: Logo
                                // Middle: brandname
                                // Right side: A document title
                                doc['header'] = (function() {
                                    return {
                                        columns: [{
                                                alignment: 'left',
                                                italics: true,
                                                text: moment().format(
                                                    "HH:mm, DD.MM.YYYY"),
                                                fontSize: 8,
                                                margin: [10, 0]
                                            },
                                            {
                                                alignment: 'center',
                                                fontSize: 14,
                                                text: 'Centralizator Terenuri'
                                            }
                                        ],
                                        margin: 20
                                    }
                                });
                            }
                        },
                        {
                            extend: 'print',
                            title: 'Tabel centralizator terenuri',
                            fontSize: 14,
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4]
                            },
                            customize: function(win) {
                                $(win.document.body).find('h1').css('display', 'none');
                                $(win.document.body)
                                    .css('font-size', '10px')
                                    .prepend(
                                        '<img src="{{ asset('storage/logo.png') }}" style="position:left;  height:10%; top:0; left:0;" />'
                                    );
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

        $(".dt-layout-row").addClass("d-flex justify-content-between");
    });
</script>
