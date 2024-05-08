<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Terenuri') }}
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
                            <form method="POST" action="{{ route('addLand') }}">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="nume" class="form-label">Nume teren:</label>
                                        <input id="nume" type="text" class="form-control" name="nameLand"
                                            autofocus value="{{ old('nameLand') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="suprafata" class="form-label">Suprafață teren:</label>
                                        <div class="d-flex align-items-center">
                                            <input id="suprafata" type="text" class="form-control" name="suprafata"
                                                value="{{ old('suprafata') }}"> <span class="mx-1 fw-bold">/ha</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="mentiuni" class="form-label">Mențiuni (opțional):</label>
                                    <textarea id="mentiuni" class="form-control" name="mentiuni" rows="3"></textarea>
                                </div>

                                <button type="submit" class="btn btn-send-data">Adaugă teren</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h3>aici jos vreau sa facem un tabel cu terenurile existente. Va fi rezultatul apasarii unui buton</h3>
    <table class="table mt-3" id="table">
        <thead>
        <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">Title</th>
            <th scope="col" class="text-center">Price</th>
            <th scope="col" class="text-center">Category</th>
            <th scope="col" class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td class="text-center">{{ $product->id }}</td>
                <td class="text-center">{{ $product->title }}</td>
                <td class="text-center">{{ $product->price . ' $' }}</td>
                <td class="text-center">{{ $product->category['category'] }}</td>
                <td>
                    <div class="d-flex justify-content-around align-items-center">
                        <button class="btn btn-primary w-25">
                            <a href="{{ route('detailsProduct', $product->id) }}" class="text-white d-flex align-items-center justify-content-between">
                                Details
                                <i class="bi bi-info-circle"></i>
                            </a>
                        </button>
                        <button class="btn btn-warning w-25">
                            <a href="{{ route('updateProductView', $product->id) }}" class="text-white d-flex align-items-center justify-content-between">
                                Update
                                <i class="bi bi-pass-fill"></i>
                            </a>
                        </button>
                        <form action="{{ route('deleteProduct', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger w-100 d-flex align-items-center justify-content-between"> Delete <i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <script>
        // $(document).ready(function () {
        //     $('#table').DataTable({
        //         "dom": 'frti',
        //         "columnDefs": [{
        //             "targets": [3, 4],
        //             "orderable": false
        //         }],
        //         "info": false,
        //         "searching": false
        //     });
        // });
    </script>
</x-app-layout>
