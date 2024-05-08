<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adaugă un nou contract de arendare') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="mx-auto">
            <div class="bg-white p-3">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <form method="POST" action="{{ route('add-contract') }}">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="nume" class="form-label">Nume:</label>
                                        <input value="{{ old('nume') }}" id="nume" type="text"
                                            class="form-control" name="nume" autofocus>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="prenume" class="form-label">Prenume:</label>
                                        <input value="{{ old('prenume') }}" id="prenume" type="text"
                                            class="form-control" name="prenume">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="data_incepere" class="form-label">Data începerii
                                            contractului:</label>
                                        <input value="{{ old('data_incepere') }}" id="data_incepere" type="date"
                                            class="form-control" name="data_incepere">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="data_incheiere" class="form-label">Data încheierii
                                            contractului:</label>
                                        <input value="{{ old('data_incheiere') }}" id="data_incheiere" type="date"
                                            class="form-control" name="data_incheiere">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="locul_terenului" class="form-label">Locul situării terenului:</label>
                                    <input value="{{ old('locul_terenului') }}" id="locul_terenului" type="text"
                                        class="form-control" name="locul_terenului">
                                </div>

                                <div class="mb-3">
                                    <label for="mentiuni" class="form-label">Mentiuni:</label>
                                    <textarea id="mentiuni" class="form-control" name="mentiuni" rows="3"></textarea>
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


<script>
    $(document).ready(function() {
        $(function() {
            var bindDatePicker = function() {
                $(".date").datetimepicker({
                    format: 'DD-MM-YYYY',
                    icons: {
                        time: "fa fa-clock-o",
                        date: "fa fa-calendar",
                        up: "fa fa-arrow-up",
                        down: "fa fa-arrow-down"
                    }
                }).find('input:first').on("blur", function() {
                    // check if the date is correct. We can accept dd-mm-yyyy and yyyy-mm-dd.
                    // update the format if it's yyyy-mm-dd
                    var date = parseDate($(this).val());

                    if (!isValidDate(date)) {
                        //create date based on momentjs (we have that)
                        date = moment().format('YYYY-MM-DD');
                    }

                    $(this).val(date);
                });
            }

            var isValidDate = function(value, format) {
                format = format || false;
                // lets parse the date to the best of our knowledge
                if (format) {
                    value = parseDate(value);
                }

                var timestamp = Date.parse(value);

                return isNaN(timestamp) == false;
            }

            var parseDate = function(value) {
                var m = value.match(/^(\d{1,2})(\/|-)?(\d{1,2})(\/|-)?(\d{4})$/);
                if (m)
                    value = m[5] + '-' + ("00" + m[3]).slice(-2) + '-' + ("00" + m[1]).slice(-2);

                return value;
            }

            bindDatePicker();
        });
    });
</script>
