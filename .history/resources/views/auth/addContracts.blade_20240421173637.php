<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adaugă un nou contract de arendare') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="mx-auto">
            <div class="">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <form class="bg-white p-3 rounded table-box-shadow" method="POST"
                                action="{{ route('add-contract') }}">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="nume" class="form-label">Nume Proprietar: <span
                                            class="text-danger fw-bold">*</span></label>
                                        <input value="{{ old('nume') }}" id="nume" type="text"
                                            class="form-control @error('nume') is-invalid @enderror" name="nume"
                                            autofocus placeholder="Introduceti Numele Proprietarului">
                                        @error('nume')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="prenume" class="form-label">Prenume Proprietar: <span
                                            class="text-danger fw-bold">*</span></label>
                                        <input value="{{ old('prenume') }}" id="prenume" type="text"
                                            class="form-control @error('prenume') is-invalid @enderror" name="prenume" placeholder="Introduceti Prenumele Proprietarului">
                                        @error('prenume')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="data_incepere" class="form-label">Data începerii
                                            contractului: <span
                                            class="text-danger fw-bold">*</span></label>
                                        <input value="{{ old('data_incepere') }}" id="data_incepere" type="text"
                                            class="form-control @error('data_incepere') is-invalid @enderror datepicker"
                                            name="data_incepere" placeholder="Selectati Data Inceperii Contractului">
                                        @error('data_incepere')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="data_incheiere" class="form-label">Data încheierii
                                            contractului: <span
                                            class="text-danger fw-bold">*</span></label>
                                        <input value="{{ old('data_incheiere') }}" id="data_incheiere" type="text"
                                            class="form-control @error('data_incheiere') is-invalid @enderror datepicker"
                                            name="data_incheiere" placeholder="Selectati Data Sfarsitului Contractului">
                                        @error('data_incheiere')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="locul_terenului" class="form-label">Locul terenului: <span
                                            class="text-danger fw-bold">*</span></label>
                                        <select class="form-control @error('locul_terenului') is-invalid @enderror"
                                            id="locul_terenului" name="locul_terenului">
                                            <option selected disabled style="font-size: 12px">Alege o valoare</option>
                                            @foreach ($terenuri as $teren)
                                                <option value="{{ $teren->nume_teren }}"
                                                    @if (old('locul_terenului') == $teren->nume_teren) selected @endif>
                                                    {{ $teren->nume_teren }}</option>
                                            @endforeach
                                        </select>
                                        @error('locul_terenului')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="suprafata_terenului" class="form-label">Suprafata terenului: <span
                                            class="text-danger fw-bold">*</span></label>
                                        <input value="{{ old('suprafata_terenului') }}" id="suprafata_terenului" type="number"
                                            class="form-control @error('suprafata_terenului') is-invalid @enderror"
                                            name="suprafata_terenului" placeholder="0.00">
                                        @error('suprafata_terenului')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
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
