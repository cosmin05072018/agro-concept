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
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="nume" class="form-label">Nume:</label>
                                        <input value="{{ old('nume') }}" id="nume" type="text"
                                            class="form-control @error('nume') is-invalid @enderror"
                                            name="nume" autofocus>
                                        @error('nume')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="prenume" class="form-label">Prenume:</label>
                                        <input value="{{ old('prenume') }}" id="prenume" type="text"
                                            class="form-control @error('prenume') is-invalid @enderror"
                                            name="prenume">
                                        @error('prenume')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="data_incepere" class="form-label">Data începerii
                                            contractului:</label>
                                        <input value="{{ old('data_incepere') }}" id="data_incepere" type="text"
                                            class="form-control @error('data_incepere') is-invalid @enderror datepicker"
                                            name="data_incepere">
                                        @error('data_incepere')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="data_incheiere" class="form-label">Data încheierii
                                            contractului:</label>
                                        <input value="{{ old('data_incheiere') }}" id="data_incheiere" type="text"
                                            class="form-control @error('data_incheiere') is-invalid @enderror datepicker"
                                            name="data_incheiere">
                                        @error('data_incheiere')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="locul_terenului" class="form-label">Locul terenului:</label>
                                    <select class="form-control @error('locul_terenului') is-invalid @enderror"
                                        id="teren" name="locul_terenului">
                                        <option selected></option>
                                        @foreach ($terenuri as $teren)
                                            <option value="{{ $teren->id }}"
                                                @if (old('locul_terenului') == $teren->id) selected @endif>
                                                {{ $teren->nume_teren }}</option>
                                        @endforeach
                                    </select>
                                    @error('locul_terenului')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
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
        $(".datepicker").datepicker({
            dateFormat: "dd-mm-yy"
        }).val()
    });
</script>
