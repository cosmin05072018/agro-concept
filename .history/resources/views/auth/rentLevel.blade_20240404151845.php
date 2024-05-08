
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="numberInput" class="form-label">Number Input</label>
                                        <input type="number" class="form-control" id="numberInput" name="numberInput">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="yearSelect" class="form-label">Select Year</label>
                                        <select class="form-select" id="yearSelect" name="yearSelect">
                                            @php
                                                $currentYear = date('Y');
                                                $endYear = $currentYear + 10;
                                            @endphp
                                            @for ($year = $currentYear; $year <= $endYear; $year++)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endfor
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
