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
                            <form method="POST" action="{{ route('addLand') }}"
                                class="mb-5 bg-white p-3 rounded-3 table-box-shadow">
                                <p class="text-center fw-bolder">Adauga Teren</p>
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="nume" class="form-label">Nume teren <span
                                                class="text-danger fw-bold">*</span>:</label>
                                        <input id="nume" type="text"
                                            class="form-control @error('nameLand') is-invalid @enderror" name="nameLand"
                                            autofocus value="{{ old('nameLand') }}"
                                            placeholder="Introduceti numele terenului">
                                        @error('nameLand')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="judet" class="form-label">Judet <span
                                                class="text-danger fw-bold">*</span>:</label>
                                        <input id="judet" type="text"
                                            class="form-control @error('judet') is-invalid @enderror" name="judet"
                                            value="{{ old('judet') }}" placeholder="Introduceti numele judetului">
                                        @error('judet')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="localitate" class="form-label">Localitate <span
                                                class="text-danger fw-bold">*</span>:</label>
                                        <input id="localitate" type="text"
                                            class="form-control @error('localitate') is-invalid @enderror"
                                            name="localitate" autofocus value="{{ old('localitate') }}"
                                            placeholder="Introduceti numele Localitatii">
                                        @error('localitate')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="mentiuni" class="form-label">Mențiuni (opțional):</label>
                                    <textarea id="mentiuni" class="form-control" name="mentiuni" rows="3"></textarea>
                                </div>

                                <button type="submit" class="btn btn-send-data">Adaugă teren</button>
                            </form>
                            @if ($terenuri->count())
                                <div class="bg-white p-3 rounded-3 table-box-shadow">
                                    <p class="text-center fw-bolder">Tabel Terenuri</p>
                                    <table class="custom-table table table-striped table-hover" id="table">
                                        <thead class="table-dark">
                                            <tr>
                                                <th scope="col" class="text-center">#</th>
                                                <th scope="col" class="text-center">Nume teren</th>
                                                <th scope="col" class="text-center">Judet</th>
                                                <th scope="col" class="text-center">Localitate</th>
                                                <th scope="col" class="text-center">Mențiuni (dacă sunt)</th>
                                                <th scope="col" class="text-center">Suprafata totala</th>
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
                                                    <td class="text-center">vedem suprafata</td>
                                                    <td class="text-center">
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
                                                                        <button type="button"
                                                                            class="btn btn-secondary"
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
        function getBase64FromImageUrl(url) {
            var img = new Image();
            img.crossOrigin = "anonymous";
            img.onload = function() {
                var canvas = document.createElement("canvas");
                canvas.width = this.width;
                canvas.height = this.height;
                var ctx = canvas.getContext("2d");
                ctx.drawImage(this, 0, 0);
                var dataURL = canvas.toDataURL("image/png");
                return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
            };
            img.src = url;
        }
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
                                columns: [0, 1, 2, 3, 4, 5]
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            pageSize: 'LEGAL',
                            title: 'Tabel centralizator terenuri',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5]
                            },
                            customize: function(doc) {
                                var logo =
                                    'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAB9AAAAG3CAMAAADbxz6TAAADAFBMVEVMaXH7sWj4sGj7smb6smf7sWj6sGf7sGf6sWn6sWj6sWg8LS36sWn3tGn7sWf/tVL7sGn6r1s7KzL6sWf4rVj/s1v4rFn4rVn4rFj5rlr4rFk8LDP5rVk8LDE8KzL/q1k8KzL5rVn5q1j5rVg8KzE7LDD6rFr5rVj4rFg8LDH3rVgtLS34rVg7LDH5rlg+JzM8LTM8LTL/sVP4rVn4rFn4rVn/r1P5rFn/omD4rFg8KzH6rFn/qlX4rFn4rFn5rVg8KjH4rVr/qlr4rVj0q1b4rFj/q2D6r2D4rVj1r1z4rFj5rVj4rVj3rFj5rFj6sGf5rVj4rFn4rVj5rVj5rVj/rFr4rVj4r1z4rFn4rVj/sFr4rVn5rVj4rFj3q1v5rVg7KzH6rVn4rVj4rVj4rVj4rVj4rVj5rFj5rFn5rVj5rVv4rVn5rFn5rFj5rFn6sWc9KjL4rVn4rVf6rVj5rVn5rVj4rVj6rVj5rFg7KzH4rVn5rVj5rVj5sV/4rVj3rVj4rVj4rFv4rVj5rVg8JTM7KzH5rFc7KzE7LDL5rFf4rVg7KzE7KzE7KzH4rVj4rVg7KzE7LDE7KzH5rFf4q1r5rVg7KzE8KzE7KzE8MjI7KzH4rFj/q1r6sGg7KzE8KzL5rlj4rFg6KTH7sWc7KzH4rVg7KzH7smg7KzE7KzE8KzI7KzH5rFn5sF35rVg7KzH5rVk7KzH5rVn6rVn5rFk7KzH6sGj4rVn5rFg7KzH6sWf7sGc8KzE7KzI7KzI7KzL3rlf6sWf7sWc7KzH6sGj5rFn5rFn5rVg7KzH6sWf4rFn5sWj7sWj5rFj4rVn7sWg8KzL5rFn5rFn7sWc6KzH7sGf7sWj7sGj5rVg8KzI7KzH7sWf6sWf6sGf5rFj6sWf6sWg7KzL6sGf6sWj7sWf7sWj4rFn7sWj7sWf7sWf7sWf6sWj8sWg6KzT7sGf6sWg8KzD6sWf8sWg6KzH7sWj5sGf6sWf6sGf7sWf6sGb6sWf6sGf6rVr5rVk8LDL7sWiTHbzIAAAA/XRSTlMAySdDdJh+iHfjrhFmIswBRDN0qv0QTXrMVShQ6I+IBDu9LtivRGa4mPJrAkFnLxQiZgbI/vYJsQhzjDoDfPvbSHcL+hjuDTf4FvK7pUS07r8mTq+tEpkf0vAUooZ2Id79PcTKnPRIXF+KKc9iqpH8DVF0aOTgnzVXvB2DlBlxbagb69UGwiuBWlnCtqvlU0r6eSYxJIjfHuoKz34PuSzLZMcZntRux1KglDHZty2N74Be4mqOpvXt5pz431Nrbz8j69r3/tbZsvWzci9g6ak/TOWr1jXSSEzXmGLOvjvjp/E4o+fChXWQxouBfFsXlKxOcVZXy2Rqbptn5a+H2U+CbQAAAAlwSFlzAAALEwAACxMBAJqcGAAAIABJREFUeJzsnXl8FEXa+Mtr1ZfXHfGdQGSBiIIgCYgxBDSXBBMSSJBAgHCYECDcBBDlTBACgpwRkBsRFJD7UERFBQ9E8L4VFe/7WtR1dff36fTvM0emq3u6qqu7q3tmup/vH/tZMj01Nd1jf7uqnnoehAAAAAAA0CTh3PPe/+2V3y7tFqd9LAAAAAAAUci5//n0uSNiPc9+9fV5nSPdJQAAAAAAdHHJ354Twzj86Xvp+poBAAAAACBynLnvuKjOxb9mw4UBAAAAgFig21cEmwfm3s9PiHQHAQAAAADQIu7bCTSfi6L43KWajQAAAAAAEFFe/6+GzkVRPP5tMlwlAAAAAIhePH/TGp4HOKd/pHsKAAAAAACJ5E+ZdC6K4pcvExsBAAAAACCiZN/H6nNR/Ox1uFgAAAAAEI0k6PC5KB4+E+n+AgAAAAAQjkdlvv3Iu//vr18u+PS7Z1WMfssYlUYAAAAAAIgsXyuN/faPZ0Jbzi/5476wcLkn+0a2wwAAAAAAhPGeXNjHTymn1Ku//0xh9FOe8GYAAAAAAIgg1fJZ9Y+6qRwz8EFFRtg/I9BRAAAAAADIfIGLesIPhCIsl34pD4ybQWkRAAAAAAC7eR0fe3/2HvG46n/JjP5PWzsJAAAAAAAVz0d4+HpDypG5H8uMDrvRAQAAACB6eJ99g3nqd7jQ77OtiwAAAAAAaHEO5uiHNI6tlq2jqwXPAQAAAAAQCbphhv5F8+jz8PX2L2zpIAAAAAAA2vwiCfrLjdqHP4hP0OcytA8AAAAAgPUkY3vQf2I4fiCeYeYVGzoIAAAAAIA2r0t6fo6wAV3OhbBzDQAAAACijh8kP/9b8ZLn/Qe/e/e+8wfK/1qNpYl9FvK/AgAAAEBU8FXIzkcU9Vb6B/eoffaH/O94odWXbe0rAAAAAADqeA6TtpVfIu1Qu0j2wh+Y0BWuBwAAAAAgIswQCdr2YHleJ8jSzVyCCf17u/sLAAAAAIAKl5IyuT6EaVv8WPYSllzmlFqbAAAAAADYzCuSnKtlL3yKC31Cvvqyu/iR3f0FAAAAAECFP6WYOPkL7+JCl4/esWqrz6m1CQAAAACAzfwYcvOz8heekwn9fUJuOcWbAAAAAACICF+H3Pyk/AVsXl25PQ1LLXPY5u4CAAAAAKBL6FjCGVF8VpZDDoQOAAAAALEi9DnSBnVR/EH2EggdAAAAAGzl9S/efvYWKkdIQkfnSz5/O5sk9OP01m+5+ONf5e8FAAAAAEAvF4o6eJL47rcvMdGs+HZ/uHAAAAAAYIKfRFNCR+/93ff3W75WVj3XJ3TxHKjgAgAAAAAmeNek0BG65P3fziSE/VWn0MVL4SoCAAAAgGEGiqaFro5eoX8NFxEAAAAADDPGKqFLkfFs/AUXEQAAAAAM87I+7Z7D3DAW/87Eg3ARAQAAAMAuoX/L3PAZEDoAAAAARKnQjyj2ptH4Tp/RYYQOAAAAADYJ/chPOlq+5EkQOgAAAABEn9Cf/T9Z9RVN+n793AQYoQMAAACAzULvZv8Zfwim3AEAAACABy+D0AEAAAAg9nkZhA4AAAAAsc/LIHQAAAAAiH1eBqEDAAAAgO2kvn/+RVz5NlqE/i++3+uiP3RsmQcAAAAAe/npWdE6ukVU6Nw5/ulG+78QAAAAADDw23ELBSg6TOii+FV4UVcAAAAAiDydv7TUf92cJnTxFfu/EQAAAABocqm1+uvmOKGfsv8bAQAAAIAm/7ZWf90cJ/Tn7P9GAAAAAMC9xLjodqFfbP83AgAAAABNQOg6AaEDAAAA0QgIXScgdAAAACAaAaHrBIQOAC6gqO2UnvFlw3pO2bY30l0BnM3KGwa1Lsna8mK/q0tNtwVC1wkIHQCcjmfa9YLEC22zI90hwKkkX/0C9lMbNiqBm9DvI6Y8vVg66HuGDKnPxVLq17+kw98lHnQOCB0Aoor0uLhUq9oeM0yQ88nlVn0U4G7SPlD81D5I4iX0vxEPwnx2LkOb90WL0B9kOPw86fD/IR50AQgdACKMp3/5wtsqZ/cYllXTUboB5jQtGzusx2ttBt8wrnbvQC4fVNtdcZMVBGFKZy5NAwDOyLywX5q3i8fEOQKhiyB0AIhuqntnzB5bIWiTV9aizUu1RabmLSd71VpelMvv6wCAnwOqP+LiZOOnB4QumhD6seaR4Gn4rwFwDQndGnd6U9BJ16ye+yanGVv5rlX1uSAMhYV0gC+3En6+L6YbbhKELpoQ+mV1keB+w1cbAGKKe2f1VJn+ZsU7d9Cduq0+hviBBRZ9ScClJBEeHQVhtOE2QegiCB0Aog/P1MFzjctcsnrJlMljdHzqFnJTC638uoDbSC0j/2jLjTYKQhdB6AAQbZRuyBL40XR82/lsoUbLKK28CYFxAD9uoPzU4o0GxoHQRRA6AEQVySMXpQi8qSlue6/2Ry+iNTHZji8PuAPPw7Sf2giDrYLQRRA6AEQR1TObChaRVVlL37zen/ogcb1t5wBwPEnUX6rRgA0QughCB4CooWhKV8FKOu5pS/n0cdT3pvDZ5w4ACA2m/tQe80Sl0B+6xHb+bWNiGYhyBwCeNBlEjPzlxljK51fR39oIrjbAiT30n1qTqBR6ZAGhA0AMUT3cep0LQiWlB2/R3zrLxpMBOJuxljw7gtDFEDBCB4DIkd3FxJ5zHSwzGhMnCINtPB2As3mc/lMbZaxVELoIQgeAyNObGvXLj5R848OmfTaeD8DZaGQyNrijAoQugtABINLkDxJs4gNaN1rQ3zvTvhMCOJw76D+1kcZaBaGLIHQAiDCjcgS76EfrRwH9vY/Yd0YAh6Ms0augMHqEfkqMEi5g6CwIHQAizEYNj3KFOvQZTX+vuVrVACDRh/5TmxE9Qv9LjBLI30gChA4AkSWNnNTaAqh3ysupb82DgmsALxpTf2oPo+gR+m9ilNCNobMgdACIKFdbm0lGQRm1L3F5tPf2tO2cAI5njOG9lXYLPf0jMSo4xXICQOgAEEGShwu2MoXenWLae3vbdVIAFxBP+aWltI8ioaP+74pRwFd9WfoKQgeAyJFPKVdqCePo/elGSeY+1mgJLAAIZxrlV9oJRZPQUcJPn37194jy1RcPsf3XB0IHgIjxDM8iqUxoVVwjx+d5WZbwAIARDzmLUUVpdAk9hgChA0CkWKm7rlrTXlMGzxpZWNiw4ZUNGzZsWF64bOTkLoOH91n0gUaijiBvanWpL/ERo7E95wRwC89057wJHYSOQOgAECmSdOV6zSpoOzWX0lrc3trJla3L6JXUZ2t2aswA9Xf2gwl3gC+1XbnnL4IRuhgCcrkDgI2Usw2qfVR0msy6MTd75bQDs0u6Gs+oWV6j9sYq8DnAm95q/wV4zUwFgdBFC4S+oJWVvGPiegNAtJDG6nNv64Wpehvv3K3tlBKV2m3zGd77zNzwBwqDqbUBgMbK8AIGNQZzxAUAoYsWCP0f8CsGADrdGOfbcwbPMXoqs9O2jZcPt2uYxtm5lZnyPvQsgqsJWEF+gXyJyDuo2lR7IHQRhA4AtlOkOrEdxuM30JbNGfDs3dZHShRfzPiu0kopXC9nylRzXQAAMlcOl4I2Hq80++QIQhdB6ABgN/lM6V47zjSp8wCelbe1CCyqz2J+T/rKqzdUza7acPXUBB5dAAASyWltD7QpqMwYtdd8nAYIXQShA4DN5GrUmgrwlsEKFWpsnDaoRhBW8msQAKIPELoIQgcAe/G8xTLbPonzp6anzUzn3CQARBUgdBGEDgD28g2Dzwvi4KoAgD5A6CIIHQBsJUkRRK5Cx21wTQBALyB0EYQOAHZSrR3g/sIYuCQAoBsQughCBwAb8ezR9PkemG4HAAOA0EUQOgDYyCxNn4+GNKsAYAQQughCBwD7mN9RQ+cp38DlAABDgNBFEDoA2EZ6vIbPM0fB1QAAY4DQRRA6ANjGSxo+9xqvBQ0AbgeELoLQAcAuZmiUWAOfA4BxQOgiCB0A7KKTxgD9argUAGAYELoIQgcAm6jV8PlMuBIAYBwQughCBwB7SJhL93kB7FcDAGcJPeGSbpc+dOmZMZ2t/yiEEAgdAOxiMt3nY1PhUgCAc4R+yR9fPHck+FHHLz51UTfLn9hB6ABgE7lNqT6vKYUrAQBOEfrGP78TlVz87V4LPxGEDgD2kUH1ecoIuBYA4BChV3//WZjO/QP1+86z7DNB6ABgG7mPUYVeCZcCAJwh9OSLDotETlk4LwBT7gAQDQP0D2ABHQCcIfSX3ybrXBTFIxelW/O5IHQAsIlcatVU71S4EADgCKH/Wh8IR+SrfEs+GIQOAFGR9LUKrgMAOEHo6b9o6dwXHdfQgk8GoQOATaSX0XzeFCqgA4AThJ58isHnovhZN/4fDUJHCP2862y75TeeXuLniWbL253dtA5Fjmt/X/BEy+nTp7fcsbP5ZQdbbbrW0k+bt+Kmp5s383/5HTsXHL37igcSzTf6wLG7L7vx9KO+Nk83W/D02Xd4NMrMujW7Wt399PLlzZs3O316h/+inm6+YPnTZz9/AEWSZdQB+kIUtXS+N2lk46pJVn5E3JWN2h5YVTV8/PjxU/qtmtm20UqrZiSNkFDeuGp2jx499ozvt2/D5N5T5yRY/YlxUxdmrOpXMH78a/36jT7QtnfajGQUCZJLy0fOOlA5ZbyPgjaDXxqVNMPKndTZYwpHbRjeLaaFnvA/TD63yuhuDoqbeOyyHduvUfsCSxcvODsxAj2ad/f2Icq+nNzastnRTfw/K3FTux27wz6t7uT20wfXGG50ze/Ntu8PP5/X3NXs4ApkJYlrjh1csGP61qXPE36T/m7cv+Po5/NQZBhK8/n10ZciLrm0fOGtlZ3ig3vnG1vzKX0Lbyso6a5yRvI+GJ/RuzQKTsvKKWH1dLwP9xqecbk1H5ec9s2Lr4afjq4lBV1G2DmL88y0VS9medUuzNjhbdvzvS6di5JGZbTpWRLcBXJ5TAv9L0afi+KXM7h/uHuF3uAfO7eG2wxnyP0Ldlnz2dcSBqyJ7ZaSOtNOR/MTGSYY1v1jh4p3Q6xu9rn+QfW8Vs12007o7huPWTFS/7nV0dPTd99Tx8rJxZd1QPYzlebzlDQUNSSnTXupsnjY4ynyLlog9CZtix+mnRVBELq32JCUjawnO5fwQvtepK4N09F8Ql+24/qO6tmRcjYyFzVeaccjzvxtneg7LIWa4lEcni5yy0d2qeo0Vvn8EtNC/49S24dPnf/euTOqL3n9P188q3jp7xZsbHGl0NccnU6XechBC4wPVsOZt6JVuxuXrL+mTn0a/Z37yR1hGaEnrjn24YJHt6/VtH/iG0tOan/1yxro+W6JV5ymPSEEWX0Zz3mPdZ9f12z62joDbH/a9vmXfrT7Yx8UPTRR7yJnoVePGvSmwEbXLaOTLJvkvjlt5IZBQ5sKk1Vf3VilNkYNcIil+dz2k26rap3V9XqGY7PH9eiqfTauupP07MGHhMKqT5guS17PSWavSiP1lmNZ6C8r4tvffQV7Hk1/7z75q99y/nRXCn3idXfpuPUPaXmF+Y9ssOup5aenrw6NItVG/okLKIPM/dSh7cRN/7hs5+LdocnmndTOrGhOnAeQc80CZutNfJo6Nscbbc5FpT/ftPxRlfUCdq5pZu+KerbatHI9Ke2Rq4Q+44ahZFGqkjO7N99V5OSiEW339SkJzaYPVjuo/A5Kl5ZR268uHzWzYEto7FmhObAeU5nDeC66V1kXYLCykrq3UsHjBxhnHlwj9IS/y4T97CvK6/76u/jrE87w/XgXCn3XE9qDUwV3HTPxeQebP3p/2CDyjfDj1myndWExqfm7/UNyZYfJ3Um8abGOb772Kabv+MCNqoEIBJaeRaaYeGz5YsZHEion2Z9XODCKdmMsRi4SevK01jptHqCmaj6fDkztMrzFHcouDAo/Ln0mtZ8kq+bfeejFuXnKo+lp+pMXLtJzKnLaWpKXpPO4sYJOuq8yo3TnCf18mc//pbJInvqFbADP/UK6S+g36RmcS7Q0HtClqp7wOfFW9Jnj5aTmt6odvZZ09LzrVI+n8Ki29H5udpJ/owQaHDy93sy4XM7ap+2Lvicuxfpo7x6h52+gF6ih0msSjxXkwWpNtwg7rG8Pal+ySM03VD28EaVDz6zSMyz2M5Z/iY+4A7p74SPnJeNTJ44TetwtuK0fVD8zf07AjnmF6+e7TOg3UUfBNO5pbnQn23q15hYoj7pMw1LEOQL18bb6bPK6owYGtus1gggmLtA941FXt97odPeKOr7cxTNEgkapIsRMQyZOFXp1VdjQVR8l08wrfZtawyeUR7Wnpg0QhCmk5ktVD+9C7E63TkYmLCp6I67EzRwgGOSqcqMf6jihf437/J+kn+qv2EFP8h6iu0fom6abufXvNriUrvqhT8iPSXxC48PvIT5OqL/zJpUj111mKHysbiktJDzxOmOT36sNbsNLNPYdyOy/G9nCbbQ7Yi1yh9D77qOFcDNSYrom3UK1ZisUB9WG7VVTsJnUfK7q4QWEowupUzcUvI05xrsntDU0Og+S0sZgnJ7ThJ6KD9DPIYewf4sd9hDPDrhI6BN3mpyqHbLA0Pzso9pL4hM1l7XvJza/QPX4y8KOS/zQ8LLzavIo9ia9M/gh1hocGres480OW/alD6PcD6+Kgs3WNgg9YZvGVihWWo8x15Ek1Vblu7A2Z2r1ogmpeY9qqPpY1UOX0X4XWqjG8RmifK5gjhPG8pg6Teh/YKI+PId8XPpH0nEf8+yAe4R+lkMY1V0/G/jgZmotbcWPaKC9ENCM2PyHqsfv4Gde3wQ5YX5gk574OiVbja2jk35xJrhL1/Y8Y/SnzbiTZ2OdJPTyFwRe5M3sbKYn81UblS1K36rZhxryU5hqkEBe+BavhHEfmDsPbREXNrah/TrZyFPf9ucyoX+HCf0i2oFnjoeOm1DNswcuEfrEHVxu/asNJJpZrtbQfuyAa1VX2eWQg81bsYzo15gc1z6qek5vZM/losZiQxMeV9TxZ7212XV93EC5F3opj/KOEXpulXlpYJwwkzUzX3Pd44B2DyiZA9SHu8ppBc9CjUV6bbxc0vGWayX3YaOfgdg4hwm9Got2e5J+Oj6VjvyDYw9cIvR3WDdJa3Gyle7PVh9CS2PeBixjZ3IM2Sb1fuKyTDyqZ1OZKuELzYl3m57yOKr7XPri9GmZXY2y3vL9a7RNSa2R84VO3dBthMwNxpOaeLwaa+IzGTpwm96LrbBUkpnJ9nq690dmSaDvzdNBj1y3C/1/WQfoCJ2Rjvwnxx64Q+gf8pPA87/r/fCbVNsJbYNbxxJ4v5rc/LXq78C22X3OMAOgxVrlYsMmY9v/ZFxjaBmdwweHM93idfRcWgawacjpQk8YzEsaGEONT1WqzokfCL08i+XjKVMEfQR6+74sMj0FLvQwG34xsIXAjWF9XS70L6Rmj2s9aj0XOvS/HHvgBqHP28nz1j9Er9HfUW2mfqQ/j2kZOmxJXCLxHvocfQOzsYBqPVhncrY9SEtkgOZ1VkDPrWeaSZTbYI4F+ZyjS+g360qawkzTJKMdKlFrbnj9q+NYFgc6UmZUh2slD6rux+0B52pkCq29efoYG+duoT8nNfuV1rE/SMfyXXJzutC1Q8j1cY/O77ZGtZWDgRcTlzB9Ji03u/rMd/1G938s5fQcg0cPtOK1gqF/AQOhs3WWwJYSzyhVlLtgP+RwoafdLlhDplGb9aCtfCxjkm0vSvOjVd9xVf3LqQe0dsTpoLup3KuFtHzEBhiW62ahp0qRbuIPOrz7Or8uOF/o11IKnhjjeX0b0udRMr9p7j8PQtu0rT6hvsT/2kTG9hmQNto14BNg6GO6kQtaZwlrLQ2Mo42DCpGzhb7MZCoZGpXGZpwL1NqaG3itkK27MynNd1F9hzc4E5N0lbnvrKMj9l+aXskuFvq5enaXD7QqWZyzhf7zVgvu/frywO4nT/GqbyLXV5lFfQJit++lz3mNpPGHit95pnZ5x8AlteCKquT64coMyi2wgm/NkagTeheu0e1KBhnKs3VIranu/pemMo6eabmANqu/ZaXvtfxBAl8GGK9iutmCyIbQwoULhf4eJnTtXRiHQ8f+yK8LThe6FT6vq9uqKw3sauLy8d2Mn0eszEJMXFM3ZB29epvRVfSf+SZ2CUwk6IPfrIOMIZ8jy5hGuQP2RE4WukfVnRwpMGJ09V1pvuniasblAe9G/RETIxHyjOOUWwdjAzLIOAt8rnNvvLOE/hMm9Es0j37SohqqThY605YwXvuySewmbRT/nDX4nliZxQch5G/XCsN569V53jcn/Q/OmVeHGEjVc7DOGtZbV6ilktcNMNaE7qF9cz7MNmB09bQxYxBKZd1Lppr3jZ6JTliFioymeaVRY3D/3khLfC7kdXOt0P/EhK5d4PZfoWO/4NcFZwt9HtsWp9WLb3z6qSs2dejQocOuVgcXtFQdUqvGtDGhuoi/FKE1zPFqxwxEfbdkKZlycvuO5U8d27Wiw4pdxz68cTH9LU+zpee5Z/2OBQdb7VrRocOKXa3a7byLPk3wNOf6LEOWrl+8o/nRu59q1eqdXb5LumnXsTfaNV9yP8NshXU/2njKDfBe5GChs/ncW9aiX5eFheUNi0pL5zcsrPUVEmcvyValv1ttVRsqRJ4CLh+qnolO6LGBbck6c+5bM0cWTm1SWtq+W+2dVT20FgGMVQIopO2kDJE3bFDGqNqpRaWlpUVTe7etGqq9IlGW61ah/4gJXXvryn2hY+/j1wVHC50lhHz1zrPhg8QVR7fr3ZdNQfWpYkjiOubt4eTKLMRMdAw8P335FYrd1+ueou0IuL+V5pPOkO0LlG2iBnfTTialcjsR1VmC57e2vPG6Y2uIo+x1rRZohUduRxaRnWmgCKcThL5B2xgde80coWqA6mmVY9nGkBmcatOPI0SzqbGQ1ny1YJiUsfsaKU9HcmElNRidVPaFSnvt+Pauvb6ZGjb671xYpVXGpdKtQr9QanWCR8em9X/x64Kjha4ZcrZ/JzEoa9MT9/Ba/FWX5Bri08bqG8/u+rlBgzXv3HR05/TVmqJ5us4AQ6Z/qJ7A/AoTmwK2P014zHmDHJw3xEAdVcWZe379o8vfIJscY9fpk9x30bFQznd8GTNC19zQnVe8jJqUPW5zLwanp4zU27HLVdvZ0Ij0YR2LR5X3j4ur3ps0alXxXN84ewat+WzBIGO7ENKRxDWm+LfCQKmzgZqZ++LbkjbEJS+kl3LxprlU6BdIrX6mfbRUce1Jfl1wstDf0MiosnY5NeFnh8Wc9i2rm5u0GrD9mFxN63b9rlYLVYI1sg5j9XLyBMM8gzFn+5utMJQLwMCcu/Sju2f9zoOb9CR5e0A9hJAl+NAEj8RQmjiOQi/UKFg292qGAO3qWdqpTzr648d1UKvazFiCNGtmyY2ZXjqCXonEYyiwf8AhWhG50l4GpwtUSVfdiY/Rg5q0xzPyVdqbP0h2p9A/lVr9Us8EPYP9deBUoa9R3S4mueBGzfzdv9NSoC9lLtGlZ9v20qd0R2Y9VaeTxW8kck/FtrsdPfA/8VGOce6B3Hv7Wy4/pmu3QYBWlMiFIQZLumrRhnLzK0VOFXopfWq25HLGPeQJIzVre96hHYLEErWminef/n1hBhLHnGirMc72VHHaKsaQrP4qzZLzfcdzqevqLKHfJ7X6nPbR/5aO5rpz1aFCT6QHxG1lqZu2YrehiqYKdGSeXXyt1ZnT7tlBS1LjJ1F34pitv2s+hsybTnjvUv3feN7Jk9OXv2M0Jv0BSuxCeBl5Lgwl3/peRU4VeupY2i3/4WU6UsJ4JmXR2vLt/dOXYGaqwExTI3l/tFaZlaS0rmX4AqOJYWh6+1dOXchI2ccgGM+tlDbySl0p9K+kVj/SPvo36WiuBVQdKnR6rNhptrEdrbLp82vMFERXY8hyI5JSL/6izslmLJ2eyBDmj7H7bpZuryFNd+jL0uNnl6lSKutIzxZ1deuRFXgGxNIudF5Cp01LpPTTueybOlgjJvtOXc1dKbCy6GZkAH2l5SqqaHPtEp5OpBaoK/rhbKT273HGR5hRFKNPcaXQ39WRyl0m3r38+uBUoW+ixbTtP8vaDM3opzkL/Xlj6cTVC6KrfsDOB/gP+vcfZXwKOUpo4EMURdkJNKcveOeJM5wVJNqF3pvype8wMOrdu4XSoCDkzbdE6AXGJkNf0KPzfczrBXEkEY/S1z314jFB9uRz2MjuLXKj0C8W9exEe9miZO6OFHoibavUah23bYrR7+nAVej7qbvNyVzB1nxd3Q72FWL2gqs7mPfvzVtr7rmIIx3W2jrnTlux1VysjFGhV1NmnbfoXPEOkEDPOTcs3QKhrzJYnFRz0d+IzhFCC7nU90mixey10XEeF5KNPtuNQv9MV43zGToSvyO3C522l2u9rp1SDyw1UtRUv9DXsizqmxD69ncsSMa2+pj5XYRGdqKb5UNb49wJqb19pJiqlRXFQifODgvCbOpONQojqXlZXuIvdMP15VhH6BWH9D3beAgZirboaSSZUhwmpYuu/rxEbMjb3n1C90yQWn1Q+/BU6ej/5dYHhwr9WkqE+12a0e1y3jlpMiiaSehrDU/2Mgl9KdM6d4h1LGnm6uqemMghw9taFEURk9QyOEYZTL6BfoKcKfRJ/Ee9vli2N8nNChWlvIV+m+GOfsDUfsdDuhfoR6q31F3POaVkz/Hq3dE/xeQQ3VFCz5UaFX9hOF6qznIRtz44VOiUwPL7dfqcttG7OTehG/c5k9BPM++xC8JSgmXpGzobJSxdW1q3lLrzTQWj8yQ0XiPfQVsgRwp945vWJNIpohm9D2ehf2O8nywFUlNeIySRoZFNiK/U8TCTT05Rk6K7vnwyMbIhL991Qp+BCf1CXUvu33PrgzOFvoIcEbfVgD6IqVaW5axEAAAgAElEQVSWzuMk9JMmKn1pC323vgLujOnn9G+xu1G9If2948Bd/PLcaDIspvLE8RA6ebl7tvHxuY+ix8nnUqDmQtEt9FXIUqHHlxtqmTAkbsRl98Gt+vszg/h40MV1Qt+LCZ2lIupHeiboXS10cg73pUZShzQgLqM/xUfo95jJOaol9OcXGNjktUuzy5fpn5wmpMC5DkWAp2ysik6pMzILOVHoRcQ9Zj3MptBoQjmZJekchT7cY6XQm47zcC3Ey770/Qw5fd8+rlkQyzxuE/oZTOi/6spDc4pbHxwp9E3EnK9DjEWS/4PU3nQ+QjelNA2hbzc0mT9PYxF9tZEphTXqbS1AESBxrW0FWtK9vAtlRbvQiRFxbw403bmplMi4cfyE3stgTVImoeetMpB9PUC++o+pDYdV76GGvrJnkZkNHI4S+nuY0P/QlSn2u6gX+t0NrMHkAJ1aWNzIkvIKHkLfiSwT+vOsu8T1bVxrqXdNPsB+2wbF2hDS4V3DPyruZsqt/RnkQKETt+l52SfFyUwmn82yBF5CLzP35EEX+h4zVz3LXH4i8gC9Rmd2mnqakFosdpvQf8OE/hPD8b/oSRQbYaFbBcvtdgVxgD7d6N16l5knBC2hG+6VttC3Go61W8J5ut3P/baWRDE268KYXEAH7cm39jw9m6djRuiLrFiWZhljCvSaKexCr7gSWSb0x3RmgWGa/ShhfXs/UrdSdCzDyxlEaDEv12VC/w8m9PcZjv8hdPQt3PrgRKETQ9xPGr9Zk4bo280LfbXJKG+K0JsZT5FKqdCy1mAGHIQetTHfqhbrCIGT9NJ2RhhBvrnrTsIdC0InDtDHmprGDpFaQjyfDyfwEbr+8mXMQi82lEtWaw/kY4zvHtiR1K9BhntURFpSWuYyoV+ECf08huP/DB09geeDvdOE3uAk7wl3yhCdpZw3XejP60n4okvoa/VuK2MLc19vvCRZs6jZiE5eVGjH/YNGke/uQ5EDhU6s88ljwt1HGjnT2UguQj+ErBJ6UwbJGVpxyGZ7dwapYzmGsvcFKDD+jOAooX+NCb0bw/E/SYebjy1xrtCJVVl2mynpMd14PBtd6KZjvElCb2lq5E/cfH/axFkkXBpTpVYM84SZ3AJ62EY2B8syY6wJvZv1dWjIuciH8RD6ogSrhD7IfGLAZeots+VOT3jc7GKFGisJbdYkuEvov2BCH6MviI5j/lmnCT2RWPL0JisEt9ik0A2UA2cTOnN1V1013J43VUqlnXqjzOnguUKYg3iU+wcRR0V6gpNjR+ik8VomW0kxFvJziGc0zbzQHzMYHaYp9BweexrKzXxvYsWcElPpAcYanpJxlNC/wITOkjSooXT4GW6dcJzQj5Heam5D0jpCMtmT60wJfbWxcHEGoZucOv5cvdWWyIKnIgMFVDnQyq7U8sQy1oJwADlO6HO6cikgYnDzs1BgXuiTkEVCv958w8Su15rbT2huJaCt4Y3tjhL6KUzoLFMx/fXF0LlU6ITtSKajnUihdq3MCP0eDlnSrBH6LiuETsjmYjaKwBiE1PK7uX8QJTWXmYnOKBX6TMJXTeE3QEco4RPSGa3INSt0HrMmFgq9yEQYX3WmJQN0FEfIDTDWDULP//HTb1/2/7+PMaEn68v9/orv3wm/fXHOR6d+ZQyHcInQ511TZ03GENLIf4EZofNYsLVG6CusEPob6o2ayZNnnHXqndnP/YMKLB0MRpnQPaSS3T24dvEGc2FxFKGXmb2fWiz0/iYeDYnRHGZD9XqqN+vNdbzQO1/oK7Fy/FPfFPvfpUaPML35SOj4833BJ+8G/v+Xe031yGFCJyZ1O2hRarHFJoRuKkzPWqF3sELoraIqraD6IsoQ7pllXiTbg1fcd/QInbDEqyvbOAO5xFX01uaEnlKIolvoN5vI/TqU8KXfNBsFOI7QcKHThZ5en7718J8e9Jyoc2P5f0PHX4iSvw4VX73YcB5BBwpdfatzXd1+7bVuY1HR2qnFiEIfwqUsiTVCf8AKoV9hzbOWQVbbVPytNdEejKFMsSR00vpCGecUOqtIpzQzzpTQh6MoF3qc8Zw9c0jb/Waa7VTfTIMxIrEu9F+ldu7Lf5YgSSLBIbkoin+9LFVqEcWvzXTJWUInzribS69KG/vvMix0832yTugNrBD6O/ZVODO+EZ17iF4Loj2ElchhQk+osSn8b47XzPQxUeiPszwORFTonY2X7SPNuHt1FF/VN/bv4XChJ0hjbFH8MjTEFsW3md4uLbr/V5p9Z34ccIXQCZO6dXUm6pMGubbOoI5IQl+tuzK7jUJfZ4XQN6k3ehShKKqgarwyvd5MqIIwHzlM6Gmkb9retsek4WaEzimowUKhe1IM7yHYQ/jSi8z3Sj1/ndA93dlCPyMS+BfT2/9JerupOA5HCZ2UsXQth5XRrXXGaouQhM4pyag1Qp9nhdAJkXaXoYiw2KaY+y0xVpvFjNBJMe5Z3Dt5NemcvukxLvTxKOqFjtS3BU7RfmPnCsFs7VUitYSmmzhb6H+SjPwx09sxq8oxtQzgKKGTioTtQOY5bTB8vpl1XbJO6Ik2Ct1ESl4zEOrPcAlswBlGuNkJgjAHOUzo8YQvOpp7J/sSa643MSz0GhP5T20Tep7R/feFpBNmshKNj41eYzMeMS70B0lGPqU7V6yM90z0yVFCJ02L192NzNPO4D4ngtCNp0S3Q+jICqF3iKKC6MQoR8OlZ/Tm0RIEwXwm0OgSOqFatyXRf3tMVEUnCH0DigGhq4+zXzMeR3i7uU3otKqumr+ZGBf6OSQjf6o3pE7Of0z0yVFCP1tnYVFMUtL0n40J3XyOOEuFPsQCoa+JKqE3s2lXfLx7hE5KLaq5lspxqxTLcjJB6DfEgtC7G60KsMjKggKdjNVniXGh30Iy8l9Mb3+F9PYLTfTJUUK3cgmdFPitOaSLTaHfY5/Q+ddDYWKBTfVTryfcSAVB4DXFGy1CX2Vmc7hOSkkntcSNQn9R830JpCV05jr3BqLi4h0t9IEkIYvfMr3/fXMDfBcInRC4XDcd8WCtsTD32BT68xYInbC5/UYUEZbbJPSh7llDJ1VO5TaXjUNK/+rNdrTQ1VPq7DFeBW+EhTWCKzxOFvoZotD/j2kZoxvp7d8Z75OjhJ5IKoXOZwy43lhds9gU+kkLhP6zK4VOrA8uCOY3AEeV0NNJg0Au6deYU+o2dLTQawzOgZAqqAhcanEnGXtkjW2hv0IUuvh/qdpvz/1/pHd/abxPjhI6IYq6ru4pxIOWxgpugtCjU+iX2ST0HqQ7KWsV65gROqFwCENOb64b10Y6WuivGhQ6KYffHVx6Rbr0U50s9B/IQhf/rjn7thdLFavguJlcvA4S+lNWxsQRC67d5UihX2PBCP3aqBL6UZuETsnlrnG7izWhTzK+qs2vm4Iw2NFCb2pQ6FusjIlDqSmGUvjHttD/klo5Ej7K7kZ/80++qi44R7BMc9XRJvR2HazBUJhT3clEK+dotQpugtCjU+hP2yT0AtcUZ2lsqTOUeEgT/H003+pCoXu6W5XIPQAh5+9mJwv9lNTKPx8Ki3g//BvlrQm/KA9/u+GT0j8C9VijSOiRKaBFqszCqcb13cY2ooPQo1Po7WwSehvXlE8dZHjIzHU/oPaEgAuFPoNwsrSUazLbQoaThf4vqZVvUT6m9wDHfyC+M1t58PELstF30j/PM94pJwn9fkuD3ImJ4jUKuYHQo1PoH9ok9NGkW6kgjEKOEvowe78m6fkhR/OdLhR6kqVB7sSaglVOFvrFUisXIeT5X+UkuvggYS28Giud7ufL9+Wp3X8y3iknCV29wnVd3RI+zb9jbIUehO5uoW8g3UoF4RvkKKGTSq1prCYahTTDL2juW3Oh0Il5eDhdnNmGVltiWugebOH8Fd8f9kr1UIOcUv0pnvuk8jB/hqlvpT/8abhTThI6KfMLr7TpHYwVUAWhR6fQD9okdFLVSkEQ9iEnCb1zir0J8SYZ3jzgQqEPtrjiXxtDBVRjWugDw7KvZ3+qNPpHKuFtZ7DC6T4mXBTYtX4Rn4rozhH6rrrIoFGaFYQeNUJf98CKXa3+cfDp5c137mi51SahLyTdSplKasSQ0J8hfMvuFvWTtFVKe9u7C4VOWp+wmEUOFvoYMTyK7VcsVN3Pk5co3/a6Ymb+y9fDt7VfYLhTThL6TXWRQSP3Kwg9kkJf1+GKs+0W7Hx08fbda9Wz31ktdGKVK0FogZwk9CTbaqcGSCWd1mla73Sh0CnZEKxkmIOFfh5m5f71f3xdMfwW/zuG7vOPq1UywZJN7CahE+ZQLUdDASD0CAh94q6nlu9cctfua3hfTf3sJd/uypCThD6N8C2HWtVR0k6sq7Xe6EKhlwgRocTBQv8N07K0qjRDWYLtWVmUwnkKn38v1S16HbO84U45Seh2Z7mp5yy9WyB0W4U+8Yqnn7iLkHY/IkLPJ9/uMs1khIo6obc1vC+cb81OoYvWG10odFLAosVkOVjof2Bexv5DTsZk6efwpcTx+YR/Y+29LP39HMOdcpLQb6yLDL/TuwVCt0voiZ9ftmS3et3XCAo9vSv5fvcMcpDQGxuvZ8q37I3mvnf3Cd1DqlRvMQ87WOh/Ys6Wv6BYSD/i25SmNj6/pX753E9/6YV3DXfKSUJ/oi4ygNCjQOjzji2fTqrNE1mhozLy/c6SqiWREvoqe/PKIFQsGNr87Eah5wqR4XYHC/1HYjWV9z5TN/peeTq55+SfnSu98qThTjlJ6KREcRYz5Gd6t2CEbrnQr31qh/7FctuETim3Ngs5SOj9CF/yJas6WkX4wClab3Sf0OcIkWGKg4V+IaZmxUvdvpQb/bA/9dsMLBONKIpfKerceaSB/bOGO+UkoS+uiwhaeehA6NYKvcPy7Wan2a0V+hTy/W44cpDQCblFhLZWdXSm0d2A7hP6GCEyjHCw0L+VGvlI+dolilJqh88gNFD+ty/CAmhuIUzhu1Xod9VFhOs0ugVCt1DoEw/yvur8hb7B8K6e2BJ6sbXZwsPJIHzgeK03uk/o3YSIUJPgYKH/IjXy97AXqxVZ4w6fScVytfu2mgeyyeBIO95A6LRU7tZyz7Ua1x2EbpnQP9/BZdncYqGPJN/wKqRNK7Ev9J52Z6y/zWhYvfuETkzlbi1a8ZAxLfQLaEJHfRXb1z77SvbP78N9jqR5+iOGO+WkEfr6ukiwWKtbIHRrhJ541pIpGf5Cn0q547VHzhF6a6N5Xngn1e2p9Ub3CZ2S3chKkpws9L+oQkfZH4tkVAuxSUvsEwx3yklCJ+TytJiDWt0CoVsh9HXtdltzPfkLPZuyZWgyco7Qe9ldJPZqwgeC0MMYIUSCpulOFvqDUiP/Uns9lWj04+erNojVbFEZv7tP6Bbd4ek8P1GrWyB0/kJPfGq1VReUv9Bp+9YGIecIfRHhO9Za1dFRhA+EKXdWc1qM5v7BmBb6FxpCR9nyWXb1dDLqQjeRcQqEboqWmicYhM5d6DdZOBljgdD3kG95VuU5j6YRumVCJ+WahaC4MHoLkaAcuWSEfo76EbnfqY7P/0NoUIqCPw4j9EhNud+ted1B6JyFvmK6lRfUAqGTMq74KEWOETqp/scyu4UO29bCqBUiwCceRwv9Ak2ho40fqQj9V1KDb4cOgaC4SAn9pOaMOwidr9ATr+Mf2W6x0JdRbnqW7emyX+ikiYiFVnWUtH0AEstExxr6PuRoof9CD4rzU41No2v2ShL6Z4Y75aQp90hEuS/R7haM0HkKvYPV2QYsEHop5ab3GnKM0F8kfMVxVnV0s9Hk8e6Lco/ItrWpzhb69+RMcRLnKsupfktuUIpyh0xxkdqH/pT2dQehcxR6O2uH59YInVbqKifB8YllLIvkJ5V3G631RhC6HZR5nC30C0UWAXeT12M5RQn8lzLF/ddwp5w0QieN3bY3sI5E7W6B0LkJPXGnGVXvX71++pInblxw2XW/33RsV4d29gmdEhUXhfVZjAq9gPANt1nV0RsIH5ih9Ub3CZ2YKW5knGXkImcL/QeRac0bC4YXxXNSKUceCR0GxVloudzXo4gCQucl9AYGouH2r1+8c/ndrd5Zca3y2etu+4ROylHKtLUnZoReZbQ8uVEaG00e7z6hzxfsDnBgIqaF/ism6s7Eo87gtVSfzKe0l0DJDe/KEfoSQme2oogCQuck9A56Eg2c3NryxnY3bVpHbs5GoZeTbqeCIDxuYodKdAl9sOHYKM7FWUZqvdF9Qp8h2B3g4Hyhv4KZmijqZCnSTRQPN6S1Fycd+LHhTrmhHvpqFFFA6HyE3oE1l8zuJcvPdtBuz0ahJ3eMpTl3o0L/xuguMqO0Mbrx3X1CjyOcKuERFEliWugPYaq+hGGhXRRfobY3Qzrwn4Y75SShE8xZtzYSndHsVgNOzV+h3nw7k81eYzCNjmVCX8Pi8+enL3hDq1hOBISOWggxlCzOqNBJmVhbWNVRUhTeSq03uk/oCYRTJdyGIklMC/0MpmrS0LshPuH+Pb29c6UjHzTcKScJfQGhM0MYItcsBITOQ+gPaM+37252E2WGPaJCpy2iVzAED8WE0Enb7eda1dGhhA+kLVS6VOiou9EdAZYS00Lfi7n6UvVDEvAiqt9pbGhpyKx+lwidELZcV/cziiQgdA5Cn6iVNWh18106r4udQqcVXIu63DJGhU6KpK6xqqNZ6p+XpxmV4EKhZ9m9HuJ8oVdrT6bjcXOfEaflg7wvHfuj4U45Sej/IN3s9d7q+QJC5yD0HVSbD5l+Vv8sjJ1C96jfhgOMRc4QOinwKiXZoo5WqH9emeYbXSj0oXavhzhf6AnYdPpFqkdUf4YJ/Set9v7QfD5wmdAJq8kW3aOZAaGbF/rTNJ3fs3ONketip9DRcIFCGnKE0BNIZWLHWNPPXMLHLdJ8pwuFXmz3eojzhY6kzG7iL6oHfIr5/AvN5v6mOYPvMqF3IN3xn0aRBIRuWuifP0/x+aMMEe0RFzotnXuEpz25CZ3gGsuqszQkfNxwzXe6UOikHQEdI7prMraF/p3Uyv9Te/3149IBX/bVbO4CLp1ykNDnDSH0ZieKJCB0s0KfSAlwX2pYwLYKPZe2cS2z1BlCv57w/TbYW5tF28suFHqXqCz3F9tC/1Rq5V2Vl9PxiLjftJu7Tzo623inHCR0RLrvT0eRBIRuVuiUhK+LtavdRYXQiVOeUZgtzrDQp9hbgGaw4frrLhQ6qdSsddXqnS/0C6VWjnjoiWdOMTQnlUO/xXifHCV0UjL3pSiSgNBNCn0Xaealrq6ZiR2J9gqdeEP10VFzo1VMCL2Lveu0fQgf94zmO10o9KlRuRE9toX+b8zY/cNeTcYqpx6eod1a+hHqeN+NQt8RlfvWQOgmhU7K0a+3knpEhZ5NCMkOcAg5Qei9Cd8uz5ow9xPqn1ZBqWflXqEPjMq8RrEt9Pcwob8X9up/sFd/YGjtEo0VeRcKfXldVHUnCAjdnNCJmxfqnkiMHaETa5H5yWN4go9+oReRvl65Fd3M9RoNcnej0IklfLNQBIltoffHlP2r8sV0aQZd/G+2vseDr433yVFCP0u68zdHEQSEbk7opJo7dVvnoRgSeqFAQzsyOwaE7uluZ1TcCOO5z9wo9EWE0yXcjCJHbAvdcwtlV9pvos5t5Rfp2LLuEqGvId3670IRBIRuSuhrSCvoJ1egWBK6h5Sry493Kop9oaNehG/Xy86YOIZNcm4UOqm4rTAJRY7YFjr6SiQve38svfa2R2fM/Msm+uQkoSeqVxSpq3ve3FjOHCB0U0JfbtW0i81Cp+ZzF4RFHgcIfTThy+WlWtBNUu4zhtULNwp9shCF2dxjXOgXSM1MUPzEzz2uN++bVGd1gqmYEwcJnRjmXvcGihwgdFNCX0+4pGsbxJjQ52QKNBai2Bc6MX1OEv9epuYZXxN2o9BJmfaFD7h0y5VC/7fUjHiGuKXtSY2iLAFSpUSyb5vokrOEfiNJ6E+gyAFCNyP0NZbFRdgtdPSaQKOpdiqpqBf6HNKXq7QvJoFlT78bhZ5MeAAShCIUMWJc6GdEYjZ3LCTu30xtvc6nGrqzhE4sz7I2ghVUQehmhH6QdElXxJzQqSXXoqguunGho7mE7/Yq0yCFS3b83gzvdaPQiUsUQhcUMWJc6NlHSKljXpZeuIVtvelHSsS8a4X+M+nuX3cFihggdDNCf8KyOEfbhU6+pQZohGJe6IdI320E704mP6b+QV1Zqsu7UuikAAdhC4oYMS50hGVz/0yW/uAHrbottMSv3cx0yVFCR7ujcM4dhG5G6KQl9AUxKPRJApVXI7mBiI/Qa22bfiB9Ug+WN7tS6KS0P0KKRdXwXCD076V2xIb4Cx8R/k4kXaq0etjcdJajhE7M+n3y2gj1CIRuSuiJJy2bcrFf6J4S0j01KCNPrAs9m1SDpruZchNqDCJ80DiWN7tS6Ll50VdKINaF/j4m9B/VU868q3s5/mMzPXKY0N8gCb3usgj1CIRuSujEmDjjRVkiJ3R6EVVBEDJQjAudXIPmTr59jCNk0s2LY3m3K4VOzBIgVGxEESLWhd5XCk0Xz8H+/qfuBfEL9eWJdYvQJxILZ6+OWFgcTLmbEPoV1tXbiYDQPWMFKt5GsS504iPLw3zD4hoTPqYT07vdKXTSOROEWShCxLrQEVYh9fgc1awyl+huKDwtvHuFTink8WGkugRCNyH0p6zL/RcBoZPXMYN0j9xyJh+hk2vQMM2Fs5L8uKm0Z+4U+hjSpRFu570g4hqhfys1JP4R+muc7sJp2Bz9YZMXw1lCJ+5yqltrfpLWGCB0E0L/kHA1W8am0MkZtYOU3RzbQieubQtX8QwQGGduHsCdQkclUbfWE/NCfx0T+n2hvz6ku87K+fpKp7tH6BNJQVQ84qKNAUI3IfR2hIv5aIwKfSWhRFiIsSzbrqJY6GnEbzaKXw8TPhDM9NGtQicnH66I0HNkzAs9/VmppQmhpMO/6N6C9pHeRLFuETpqSRT6NQ9EpkcgdBNCP2rdNsSICJ2YDyVECyvyntsndBRP+mI1/FLhbSN8RF4+2/tdKvRnUkjXRuiHIkLMCx09qJYsTloQf5ZtXmoM9lhQba5DThM6Oc69bnFk4uJA6PXACB2hm0klRkP0SI1poY+zvkTszQMIn9CGsQGXCp0c5y54Lci27wqhv48J/e3w2PewqqqaMe5fmeuP44SeuJps9HYR6REI3YTQDzpsDZ1S9SpqjG5O6KlNiQlMyjl1kLROn8dQaM3VQp9GujSC8DDTfj/exL7QO38WXqAFW0L/D1MjyV9K7zjfXH8cJ3RyuU3zFbSNAUI3IfTfCZdyu+nLMm9HZITu0YqLE4ShfWNY6Og24vfK4iONpBSTA3TXCj25hnhthAIUAWJf6AgrY14vUCx/HNuulVekNxxn3ObmHqH/TNyKXld3/7oIdAiEbkLoZ63ah75pa11khI6KiBm7QsxlHWpGo9BzydbYI8t3bZDqpmYH6K4VOppJvDRcgxbdJPT3MKFPuESxC/0Wj96QOJNp4hwodGI5Dx8tI7CMDkI3IfRWpCtprhp64mXExz7LhY5uFTR53Fx9hogKnRJMLawy37uEReYbd63Q8ykPk3mFyHYcIHQPVig1WIjlS51b0DAFi7+Z7I4Dhb5iCMXoO+3vDwjdhNA3WeLdB6aTfyHWC93TgnxXDd1dueZhsVfouaSsL4KQstB071aR2q5hT2DqWqGjfsRLIwjd2yO7cYDQEfaB4mFfiHqcen53pkJrzyab7Y7zhI6WUIRet9z27oDQTQi9Aek6Uku00Ulst78ukkJH1ZSlzBDDs2NV6LS4vzy2VG5kHiFuvZrM3oh7hX5vJvnaCLf3RzbjBKEPxIqiixfI66w8pDc5zYVme+NEoW+iDdHrmtk96w5CN1M+9RruuflXUIbn9ggd9SZvCJb4YCWKUaEnvED+Vl2XmerbZuKZi9eRLN69QqfnQfhkPrIXJwgdfYEJecK5CP2hr3EPVlT9uPneOFDoiBC/HOQJm40OQjcj9N2cxTtvASVo0i6hk+eNcTJXmZ9/i4jQUSHlW3lHmujaKGKiPS9b2WnkdqHPoIZk5ti8Hd0RQj+DCV38J0J/C/3jCMtD5m+q2WON40Chd6Dfsxfbm9UdhG5G6MRqO8bKszxFfECwVejpewQWXkiKTaGj1yhfytvYcFb328iJcw/pacfFQkeHKJdGEPKmITtxhNAR1pp4/GVs11p9phkaqU9i7z7PfGecKHTUnH7PXn2FnZ0BoZsROvlSPqX/Urxzl5bObRI6issSmCgu5fqx8xtvucEOoVdT8+H1MZavPrWA3GSWribdLPS4V2mXRkipsjN2wxlCfx8fov8f+kvXHjRs07r4nfm+OFPo6yjp4nzcs8DGaXcQuhmhk+qn1tUt/VnnhVhBjZas5yyyhSYsgXG+IVOl2dzO9SQkHfI9Rbyo3TXzQtfIh3fVXgP9nzGM3GCmvm1+bhY6JTev/bEbzhC65++40d/7JyZ3TV6W0sSK4vvm++JMoVM0EGT7Jtv6AkI3I/Q1lGs4T89lWPGExuK5zT/dNGLlcAV5leZH6clpXXrmBJrL8dghdA99TaHrKr3jQE9b2qD/gL7GXC10z1DqpRGEvIzOyCacIXQkG6I/+Z1iWzqNBPxZwHQad+cKHT2qdd8e8oSJ4mvXtpvOnkUWhG5G6Ggt+RouZk/8t2sJdeuDuZl8YzSi7SCS4S1OMlFMfGPtzEV4JNReO4SuuTWvrJGu5q7cQmusl44Id39rbhY6KupIvzSC8PBI4783T7dDbdwmdCTlhpPxta5N7MeDqeBN4kyhX0vxQJCTC4wFx625bvo9dXUHmY8HoZsSOm3Lwv1rmK5AYitiaF04vyO7IIdsh1N24Bn9H5Cwd+GqnmXKptraInTtrXm9RtGuuRoAACAASURBVDC3VTS8K62lTxirpoZwt9DRLI0r49sEaCwcM6F83x2CUONxm9Ab4hPnEj9ove/cw9jR/+TRE6cKnVZGNcT+5npH6RPP7gyGSZ9mfg8I3ZTQqasn+w9qB0M8cJlmZDvO3SgqjS4IJTOnMqdCry4fN3h2iboFZ9sjdDRY2xqXM32h+QX085Q3VWfP3C50Tw/NSyMIW5bpTbw/ZlvP4DJSkduEjjBB6kgTk4wlcRcPc0rr41Cha0W6Bxiy+G7WYXripg+fWC/N225l7ggI3ZTQJ9KXvu86Rn33mnbTWefag7BPvZhnpC6jC8KAF29LolYsi5tfO3lV8Vjq8vybNgk9nSHDbdPKNI3RXPW2LRpDfQPpZF0udJT/pvalEYTH9zGHx8UVZrz4qoE6L44Rei6++SzE9xrv+hY/2HTdVIcLPZFhi5KP5xcffYc+zEtc0+ro6bsUKcuGMM/Xg9BNCZ28Ez3I9g8Jl+KBp5qRSqpR+BDZyDTtymth3NGiX5dRjbo1LPXRpGHDtMJlI6++dfTwTkM/YIuze8YeoaO+lIRxEg9XLiPF8Sd0e6mF9iPPN3r7BUJH5dQlDOzitCFenCCpK6fNHP+B4pmrjeuEjvCiayH+or/n/ePYse/qjANxndDRtewzrSfvOv30TZuUIVYTVxw7eFmzJferZx9txdoPEHroihgSOqmCqsTz05e3whdP5q1o9eGNizW2LpJ4GtlJUjD23E5G2SR0VEoqdKqkbNCtlzfEi8AnlCaNW9WL6fmkUne3QOgIbWb/uZQVz1yYNkcx/+6pntpo8oHhrctUH7hK3Cd09KCK0OmJ3/o/ix06gU9EnJOFjlZoB8bJObl29db7p0+fftf9W1ev3n+SfvAC1m6A0M0JPZHNzCd3b5/uu3brV5PSv7PBfF35MOYOwW6G2yV01HCAnn51L3shvlePHkPjy25nHEAKglBlJB7b7VPurMmHMVJybs+KX9SjR49h8SfKXs2hT5x4c90n9LiLw4X+HO0NG98VFVVd+OBcoaMrzN3a6Sxm7QUI3ZzQiT8ya2iG7KVaa1swd7JsEzrqpsvoBqg0tL8KhI48g6y8LIXuEzqSbUYPDrspDzbpp/AjnzSWPNFlQkfHNEbZZtjPmmwOhG5S6BP1zrSYYgeymYRKwWZutk3oKI2aA9Y0M43tlwahI5Q+28LrkuFCoaNfwo3+HmNcPL8Jd2cLHbWy0OisueZA6CaFjj604OoNeYKQe6glsp1prEnjOHG5fUJH7ZkCqo2RudnY+Qah+0igVdAxyR43Cj0ZL9KiFeb+tb4N6zpwtNDRO9aN7ljDoUHoZoWeuJ37xZu+i/SYYKyKmzmKqHnQuFNpo9BR/7lWfY0c9sw0CmCE7sNTZdWVYcgv7EChoxl4lFtAlulMPv8Xrwh35wsdbTIY7KzNE4w9AKGbFTraxZaGnZn1vi0KuwivoQiQkMEeBmaesXYKHW180aJvYSB3XhAQeoANWtn8DDPGjUJH74UljFMvt+LBS6yJ4i2XcOyD04WOrmXcj64b1tQyIPTQpTAqdPQ0zwu39EN/+MM69Ywzq1FEWBkv2IY3zk6hI88GnflzmJhioswnCD3IMqsWe8a5Uujob0qhv6029u78heyYCZSVdgM4Xeho3s46a2jA9vkgdPNCp2Z018fao/VF2tSzzlyDIkN6W/u2pNfaKnSECm/n/Q1yphnvDQhdor2vom4EtkY6VOieT5VGV+nDDFm1VVH8k2cPXCB0hM5as5B+E9ung9A5CH0ep3mW/cultHKEqDhjJXs4kD/IipGsGqtsFjrqW8z3C/SYYaIzIHSMXGu2r811p9BR8n0KoU94SHnIT7fIj3iQawdcIXT0QMs6C2BMQQJC5yB0tE5HwTQi1yzAZ1WWm9u9YAHt6VXEuTHUbqEjNI01axwDNcy5wgnAlDt+ZbAk7Hat6jhW6Cj7XwqjH3lF9nr//1G8/nEy3w64QugI/W7BIH0620eD0HkIHc1bYvZ6rZXpnFiQj3HixRqSrhdsIC/VdqGjvsM5zT94++mtlhoGCF12ZawYpI9wqdDRwOcUxhZP7Q29OOPbI4oXvzMRCuJmoaOJCzhHStfVXcOWWgaEzkXoKPGoqSu4doFyLn2N+oHtUEQpZKltaYoXVpV77Bc6Qu178eh9r/Zm+wFCV1I+TODNAbcKHfUPM7r42ad/vH7JuWf+91RYFPzfN/L+eLcIHaEOO+6p4wvb5CwInY/QEfrc+BbE3R/Wh8JhqM/aNEcRZupbmYJV5PXYVqr1+VYJHaFa0+JYlGS+FyD0MDwLTwh86eFaoaN8RdAbhXfxikSccI3QEVrxBMdR+vrmx1QcoQIInZfQ0cRmxp7Jpp9VnUyZHh25X8OpzigT+JNSUrWMJWW0dUJHqNbMKN3bk4vOQegqpC8sEbgxoHiy5mOjc4WOspWRcSS+G8j/w90kdIR+Xr60jgNLd9z9M/NngtC5CR2hTeoSpnHNzhW6rkwkUsWF4RlRwDULetctoxuxjgasFDpC7acY3Pv8WGURnx6A0FXxFBbzmBnKHDaznDnxmTOFjjr/k8nnn/KOh3Of0BFKvOlRU/ndh6zfebCDrk8EoXMUOkLH9IW7rz9K3ob2YTRllgmj8yROTv+k54YkPaE31gododxxvXTHx+X1nMbx7gdBcerMuWGsqV9azp6MJF1lwxwqdOQ5P2y1PJyvjVUWslTom65TZw2KYtb947Shxdghu5csb6V/l/Ln6qeIbb5em5/VmyeNSln5ULVVX8pU48xT7+rnOpvZdHo/4xVb3WwXraF3lMffs3R7y52XoaghOWnwMDOx4d4XCm4t1D2tF3e1Kis5frH8zS/qeFh5dfZCvrFDfdW/4ZW82p+m2vwkLm2PVG2bnipIB0Wz9nQ08lPrPrRq83zdhuqvfiHY5uujWOgInfmvhs6fVc8KG2Ghxywrnl7MagUfa+863e7ziGUcARTM+8cSzVL3Q7Y3f0djG0J98te1WxfvWNDu7DsPsFbEtZOBk1b10j9JnVfy1uBRU7lvieFIwtRb9zB8r5w+2/R7AjBD58J9JToeIzOzOh1Y9kzUXKMoETrKp0+731dt0ee6VOi+yfcOTzVfrLU9/fmtS5of/JwxyStgH4mfL59OfCS7ZnrzsyzXrFmzo3df0YHXXIl1pO8dObj4A6b6Ld3n7qlqW1gaNfdXKglTN1cNJQ7Vc3odGrU3Nr6I48hOazs8Pk/jt/bqouHf9C7iWSnMQUJH6P0nycPzf1v3u3at0AP8/PlTR2989K7dS/fXR8Cf3L909da7ljRbfrDVpmsj3T2AxgM3Xbaz5fbVoaCItbu3L2l2tFVUL/gYJ6G0fGSXyvE94rMewwdQ3pxPsuJ7dRq+6qVRtfPZEnRFFZ5nGk0ePKjXiZqg2Ssey1o0aObkWjPzrgAPEpoUjspo07OkrCYnWJbNm/NYWVZ86ymD71yWVto5Ks9y9AgdZf+gyPIa5Mj3Vv5n6nKh46xrcG2D6B+uAeHMa3BtgwauWhJJjosbGBcXFxdl4yNzZMf11RVTBdiGJ65vXExcmygSOkIbfwwrkS5+dkF/Kz8ShA4AAAA4gqgSOkLJD536DNf53/9j9WMRjNABAAAAJxBlQvdxySsPfnSLePjJj79/yHQZAm1A6AAAAIATiEKh2wsIHQAAAHACIHQRguIAAACA2AeELoLQAQAAgNgHhC6C0AEAAIDYB4QugtABAACA2AeELoLQAQAAgNgHhC6C0AEAAIDYB4QugtABAACA2AeELoLQAQAAgNgHhC6C0AEAAIDYB4QugtABAACA2AeELoLQAQAAgNgHhC6C0AEAAIDYB4QugtABAACA2AeELoLQAQAAgNgHhC6C0AEAAIDYB4QugtABAACA2AeELoLQAQAAgNgHhC6C0AEAAIDYB4QugtABAACA2AeELoLQAQAAgNgHhC6C0AEAAIDYB4QugtABAACA2AeELoLQAQAAgNgHhC6C0AEAAIDYB4QugtABAACA2AeELoLQAQAAgNgHhC6C0AEAAIDYB4QugtABAACA2AeELoLQAQAAgNgHhC6C0AEAAIDYB4QugtABAACA2AeELoLQAQAAgNgHhC6C0AEAAIDYh6PQ437624VRyY8/5ZN7DUIHAAAAnAA3oXt+/UyMWo58nU7qNwgdAAAAcALchP6DGNV8S+o3CB0AAABwAryE/vIEMaqZQOo4CB0AAABwAryE/q0Y5fxI6DgIHQAAAHACvIR+nxjlPEjoOAgdAAAAcAKuEfpfhI6D0AEAAAAn4Jop9/MJHQehAwAAAE6Al9DPiNHNkf6EjoPQAQAAACfAbdvaX2JMxsSB0AEAAABHwE3o6T8cFqOWW/4kfjcYoQMAYDczah/JGD18/PA2G0alZcPpB6Iv9evG9/99UVTyn/dSyb0GoQMAYCvlbe4QMDKHbWgCVwDgARRnEUP8D/EsXSAddDH87gAAME5tiRBGSq9COKX8Sb/88ssvn+OmMwtCF0HoAADYxMbZgjp9KCWkAGN09p3YPW46eyB0EYQOAIA93KwyPA9SMwYughVCFya56LyC0EUQOgBYSvrmLR0zswb3jZXT7GlRVlY214ru5o6VBN51y2v9Xjwh/bskIW7micyOW65OsOCD3Sz0MkoMldMAoYsgdACwkrhFAWM17RYj53mUv7uVFrQ8SPJ3QWCKvVv9kD2lvOGbgf83dKAFn+xioQsblH8fFR9iH3IUIHQRhA4AFuJpUe+wx0pj4kR3fjgwgi7i3nKh5PNKT/BvucHTM6X61frXFqVz/2RXC72j8nd3Kxa6YF9v8n0hensD/3+v7/+rzgHd3AVns87PAKGLIHQAsJDLsVFpTJzo+tt9J+4tDwudibLOoT/G+few5eQPl87TKO6f7Gqhh1k7MkIv8n3ea4H/38n3/1XTl5bKAiuG6vwMELoIQgcAC3lRuj11jIUcKn1z6rubxLnlculMTMb+vMz3h0eSu0uv9uD8wW4XujAiGoSe7vth5fl30d2b6YuCrJ+kkZEqE/pbOj8DhC6C0AFnMqMhiXv7qt5LrKEMuz/NR9HPvlBv4zmfpX6hlr3V2J89WYIQn34vdpoe5/u5riUk9KuSo0DogQiKsQMRKs3y/b826kcNwIWuN5ADhC6C0AFn0kagcHunxmke24V+JYp6SvOsmvr2hBbJhbGyF0YL3qmBCdkgTbl+rnsJCV24NRqE3t7r+8QBL7b2/8QyCTEaH+D/mTbW+REgdBGEDrhQ6P5xy612xFPvkT4wLxdFPb5hVFkgLE64nesSwXzpRMyWvVDrG6x1rpBe7sXzY12MJPSKOVEgdFSF/9e3inBQL/ygcTo/AYQugtABlwpdEB4b57FpE5ifYhT1rPSNoiZvEwgbnsywWToRM2UvPFPTV76lDV9hB3gIXR6PGSmhJ4c2fAhCJ9JWhgL8P1DF4r8mIHQRhA64VuiC0MvyjKPpodjuihjIhdbDt4TdObsm2GN8rZvf4rzC2OkLff9bGoqKGwupZbgLPWVgFAgdJVf5Z90FIW9mOsPPRBDa6/wAELoIQgdcIPQ9gX2tGYcKgtPJ9ZTNsLofc4K5U7rrHW5EAP9O8RsQ2hA8O8M5tu3fqhRgmtrrScHw+rmWXxEXCl24ORqEjtDe0cPevGNRhuqOtQC34f916n3cBqGLIHTABULvIv29fXEK/spVli9sZzfOEoSc4bGQVmZ4fHz80FyE+l4fSCQ2jGOtLmxxVL222ox+jwlCWUYs7O2LDaJQ6NqMxDrdVe+KGAhdBKED7hI6QiOxSG570r3kQi0xhOVxLyedp/wYCBuMHWJS6Fg6QeETvW8GoYsgdMBtQscD1SxIoAJo7d+Llaz2MU5MCn0M1ulhet8MQhdB6IDrhI6v56rtksqf1Ljf+OJB+xayBIUlt788o2rKW8WDKu8cYVtFtaJxlYP6jJ+SMYk+9E9fOW7woPF9phzKeKSQ7yTBwN6DhxePL1g1jjnSLxho56OhkU/sPy2j3/g+BVUzZ026V2MqNjup7aGC8X0GVd02gn4Fx4waPGV88fADI/TMDKRP/aZqdnG/wSPVF1HS25s6531rX6qcXVw8pbJtUhyKOaE3aVtZUDx89NXz1a6QZ/64VYPGFw/PKKQsq8RhndadfRiELoLQAfcJPU02RJenuIjbNja0yJ7SAqsmnd0rPj5+m7yhuM19sA3UQsrcQ8p8Nb17hBgte+FQsOCVrMX+UiEsaXjSJj4+Hg9Py932gvSJi0aRgsLTe8/G+yZktSlkKHsyW+pvKMZ4Wnx8/BZcTrU9vVJY4QENbfUMfB/pHcIL0rcM5QKbKX3u5eFtrNwnC2asKR5HVHDu5Ba+zKL1jJ1JqjIzZt/joaMqhmNZ/Lr5Ohb68uPi4+MXSSVIc2+4PfSux9soc/+lNyrActgKQla/EXpKzczpIv32BMHb6yWVU+v/GfqQPRYtlE7pIaLQGwUOkL6AkCO9Lb7+uzQM/nuo7IdVKR0Yuj7lvn9JpzdhpFTuPme2cuJrb6WUWaiiDXZRkuStYOthhGRyZEDoIggdcJ/QkT/5ZD2zsBeyD8hyTwpCi9CtZqbvnzIpxykP9lE2S+aatlhTYTu+fdTif8USpmWG/ujfvivFyPdWBOpnqYbPJzyC56gLcntjzaEodrcP3ZLv9P2rX+iQe32b2zAqMqgbzfzVV0jsUZk0uU3ZQpIs20iAjsNVRd13tEyoPrxvqe1+uvc17AnDd7oP1Q8b0+N9/06rPzDD96+X6v+VJj+r3ikbsTYTJst+VwEez2Ad/t9b0FX55oqqsLDExvUvSQVuEEKzVMa1YUIfR7kQ0kJI/cluLfvYntKBbev/1tv3r0H1/yodKm+vBz6DMaaPLBRV6Dq4vvsJ/qdT6RJhJ/gA0gkIXQShAy4U+hRCWFx5uAUHBGOy781TCn0SNouMkzMrQVvo9VLsmMom9BeCbaYfCv/AQ+GjwPK5BnPpEIXurb/n1oYpU7i+2kKh5xerv9VbFW7KzY+pHZk5U57MHCHPDR3DjooPunOyEC70V4O2X4gP/v1cJX31NGmAKiNnM0u0dvJgWaxmPQMU2dLy689+T2SN0GvVnnMpQvc2CfxjaqiqTz01U0OnOyP8u9VP+XwjyIW+xUSGIRC6CEIHXCh0bBkRj71pm6mmg0bYHQ0T+m3YmKNrTg5+y3rhSi2hhyb95eMgstCFwNR8+niVHgqzFUb3bJAPP3F6ZhsTen2swSi1psvmWCb0QmmmVskdihnvXIL6BSFePned/ZbaQWV+Nw98TEXowR/Q5SrfvT6PradxJvlbag/SS7FdAHLGy55G/PNEPu60SOihREhBUWsJPXgCVoY/5gkv1F8X7M0SJ/zJbuZ0Vwgdu4a9kU5A6CIIHXCh0LE8pIKQpar5uS8WtG7q/38VK0M3L0zoobtjybb2Pkd65t9wVejNeSM1hN5JfRxEEXqO//5X6f//Y6fsk2fICa2b+knA8qgKvcaN2Zg/f7I0a70l15jQhWW+/1/onxZuWrBvuFTe3HcSyI8Jg/v5wXRX3C/EnVpCH4lNQ5dlTL05995Jg0J/eiw0BvSR758rrz/Zk/fm584p/yb4txN4LpPO+JpB3tDxsxcFnsbiU6WicAqh1/hOWhNfTIK3ReUUfPojOIGTjhV0FxZtVpzzYfjMvBorm2JX/rWRRXG5/UfMDE4X9cAuWG5oHFykX+hpgXN+PXZGpSvRLzBDnhR6CTEK3et7rNroX2wY1qYNPu/+TbDP+N/yFr02fmjgdA9NllK9tlfL+C67uiyA0EUQOuBCoePpK4Q7VP5Y4L9fepL81ipJQKllCqEXBedsM7dJ86npm0O3W+9IqtDHhEb381mFLlT5pnx9/+cD/z5uzzLMASn4SrwH83nT0Au1oQWC8QaFXtYZoTm+b1jxiH/QOGaRoCOACQvQU1vTJgh9mjQm9mbUD1WLQtOyn2ApTeOwGe8PQj5G5YE/z5WeODyzpQMrbvXHkudO9p+dVQhN9aoKXchAyOP7MZT4Lphn2gBFyW4P5vOmjcLPeTF91n0MtnrTI6Rqz8hA2F4n6c0vKX+0eoTOEuXeuv4lKWZCQ+j+U+Bbw3rV/2xTHoojmBtYJfJgbx2wzf9wktvWPw2SgVBSivInETzfPnSnNQKhiyB0wIVCfwR/MVjNc760rJoZGmB7/AOGWeiAoBB6T9WqUc/Uj906LqQKPbQQXpHOLHTvXnSz777fq15N/bEQrCxsXvYA9mdsYNoktL4c+nb6hO6rZun72jX1d98EzIzeqVYIPU1ayOiKTcCm9lL41HelsNIfrfFJiOTA880gNfl9UiQb3ndt4pe2mtBzNvoX108Eh9pXBk9mxQx5qJrvuQcLBiuqYSocFoctS1Tiv4j8wKNLKCbPcyL8i3MVemnoAWozs9BT2qO0FEHoHjyX+XPlv58MtVPjT4ic1z+hJOwnIa0LeHUn9QehiyB0wIVCx24y9eFF6derR+P45gQfLspTCL2ofoitSEudH7jj3h7Sm6rQO4fcuggxC11o4f9OJyRZrVQtXp4kDWpzZPOyl4fuqwnGhF5RPcLXMWn027mEfdOwEaHjopMZsbp+KiTFtxyivKTD5PP/nsC0bv24+RmpJxXYOnGcbw6mTWgtRil04UBqU0Hwhj6uNgWvNF4uLSgMkO3Mn1T/5zuUcXk42LrxIPlQPtu/tJ5XL8Ik0i+al9BXhV4KfVNNoQt90CL8F1jUHY81nS/9SHOwR5183+TDvlnhP4lQUJ7wKtILCF0EoQMuFPpr+IsblBPuskC1XN+dJ7RgPVpxU/Qqp1L99y8s6ltV6NMIi990oQtt8xQj4TYqkX3JoUGcIFwtbz2kX/9quH6hC4OGKoqf+gRffyZm8Bd6IGLAz4vyw0OxYVOCf3hG8kaFckNbqv+UxHvC7BlSU70sK2qIQh+wQb4hwj/ufyGg6YS5xNDsUKybyu56pRh9z1rKAIdS/3mrT0MwiJQPn5PQPW/Wv5KXzC70FN+nl0j/Jdzg+2P34H8De6Q3ymaGGvnOaffwn8RK5cyZDkDoIggdcKHQZbvT/OLyZJEymWFKloQeskLYhq0MQRiEbRFWFbrklPqZeSahpyhTz+/FevaMcpVVdo+V3/WHGxS6rwOvypSTFRYCxVHoTaRxr/de+eH31r/QNFzT8nLroVFfTmDo3F7anKCYqcDUoyJ0/5fHktbO6Cqdorbkc75N+eQRTjp2EsMftfyV77ICmxuTQzEaKXGWCL2cmHaVJnT/qcEeZJIflqI9sRxOc+WnRrZtXfpJVIfvgGAGhC6C0AH3CX0q/lqWRzHW3CI/OLdCReglRHtszAlOw5KFniut1hfpEbqPqaQHk+CMZ3JojBX2tCB97RMGhe5jsOxw8hiag9CHh28OC9FUfgaLpHWGCpUEvHOFoaNSw34XXYgDZTWhKyPRCkK9SsBWBpTxCQ3D9lKEMY3oPB998zL71HqU09HK1jgJvZIY5EgVuu+JCz/rt/oDSf1gAZp3UnaaSD+JdK/2IxAJELoIQgfcJ3RZXpnAUAKL71Kkd8VfCgn9k9CNLCzCTD71rCZ06UaYmaBT6FfJj8f2+ATvwP44+AA1yaQ82d1NCH0MqThWU8RZ6H3zKBV0FslfOUQvn5cU6nUytl9akYw9obuW0AfJv3r9rHJooVwQcpTnfGP9KxXEM4NtFpBvYgy2Xq1yuXtaI3RpriAUh8codNn8eH5mSnnYs6tXkcc2H9/U317lUU3+6MgCCF0EoQOuE3oafisJxIfj93l5Rg15Po4woQvCbGVCb02hS/dlxWZfbaFnyI8fGXZH7UnZSeYJfe9kw0KPlx+ei71UylnoV0t/uj1s5PqibJI6/XHWdCTYTEzYmLmTltBlgXnpj9dLD5vuD1vM8ISWDWSpWjH6pzBv1JJ869vDyF/opdIrWBEDP1pCDyXl99Oj/tFnEvGXI+WYVfwkxhJG9AyA0EUQOuA2od+L2VjwJikWD4UKpTzaqwgdz2EixGesTNcj9BfUs8GyCF3hwm7SKzn+P3TOI9+TUXb9K3nIsNADEYQSTVnr0OoXOuaQ8NnXFrLoMGwNJZOew2WfdORrytcOaAldPjuxOTi9klxBWQMPWbUraSd6INWsLLUaAcy3L1ki9M3ka6Ql9Gmyo0NVALH/CvtRLgX+cT0ZQjcJgNBFEDrgMqE3wpwVsscsykgi2xsudNmkvW8Su3XjtARGoW9MIQ7otITeUfEZA6WXAvH22IOJgCVdUQjhYeNCDyVNCZ8vDnuAMCd0D5YcPHwXd4msMezyzaX2Au/vAcpitqrQU2R591Vr94WVR5tR/8qbpB4Fc6WFTemHM418rvkIHQtayNUpdEIagnjyM4hsEb29Siek7ZGsgNBFEDrgIqHnjnlEXrlrcPitLHwN9o5wofs23SgZ0KltKYvQpc3EvlQtuoSuiNdDHmy6tq/CvW+ShVBsXOi4GXz0kV4ax1fopTRdxNXPRHRPVjxfKTKuKHmMHDMom4pREzohSuAR2hHLNPfpl5A3YxA3iYedQj5Cl/Rbg3QKXb2GrgebMJKVFVQ+fLZX2ZFIX8JRA4QugtABFwi9Y44fZc2nzNCoAcvuLc/9pthgUy/0UEYxBWNnjtEU+jayA7WEHrZEixUNm6GIOr8+7HsUM6hXQ+g1lPGlMpjQpNALaboYJX82wcbdytVl8pp/MG5LIl9D6MqtXOFTx+FHzCZkXgvhqVDLDqRKa/JzFRehJ+SR5zk0hJ6nvqCAn1GpYBEKf2Jrr/JfjPp8CA0QughCB1wgdHVOpKkNkzJoN9JQ6tf5KtWl/KS0mJROF3olaeVRW+hhDxs5ihE6FpGvDISWYgGbZhsWuiLKXjY25jxCx+L1w5KA5pbJrXyCtgudQSKKGAOC0JURD+HPoYODEgAAEq1JREFUNPLaeb7F/fpzLt++j38Vgbm8GLZfPdsKofcnTwVpCT3sQS88UUIpzfbYtZgkCwrRBQhdBKEDLhX67XjZ8izaQBOLYpaqrSWF1X8O8UISVeidyNOQWkKXbXGXazIlQXHfVS7ISqnfFQnk9Ah9C8VmnNfQsSVW5b09Ybxi8/snlKVaGfOxy3QveReAutAJO+07kZdr5oTO+SOkHt0ssIYVYvPXYQkKuQi9nPJkoiF0QlTGVNosS6qg+pNIY4sQtFboqf/5f+f8PSr57v9+ImduBqED7hR6zuxJCYQMLbJ8oGShoyK82Jgcb4aHIvRh5Fnf+RpCf4S8ht5dme1MsWut0SfEJC06hN6CYjNFNlKzQseivz+RH1sUOiMPBwP/sF1r9M1O1CGjtMVMXeiEMnU9iUsitaGUwW8Rq63NwXpEDwPDRrQDlK99w0Po0yiRCK3pQiekzcF2YQRmkHDw/rUPn0TphSIn9HOfE6OYf4Wlp6wHhA64Qui9VmFs2HZ5E+U2s7m0yKReqkJHnklkpWdQhP4CWW3lOoWOzdcGtrS/Jf3h1dldGvUPbH5OvnKWVHqmZypPofegLJKaEzq2xz6z56qF8wNz1p7SaeND9dAfbhI+waKMMySkjBUEYS9t9luH0LFljprZjRuVBs/53m2hKq9CT/IiRyjbjyAII1iXC26nxMsZF/pmyj7BeENCx8MMw3L9S0leZT+JVEqCIJuEnhzVPhfFr0iPhyB0wJW53MPA1ByeoGqsutB9lSTaYPuwceozZakJ/Q5S1njZLZJJ6NXKJfN+yo7kNf2g7FVsKtk7ml6UUq/QJWl5SZlTDAo9bCOB97Gyqz7B4xpbhPKwDKPFNBL2+YWPh2cYE3pV+Dm/qqwpfs73Uc55eujxhFrART59ExZN34+H0LdRNtDdYUjo/Ymb+BXLH/hPIriWtQ9FTOiviFHOpYSOg9ABp6JP6AWUBBj4hmiF0BHydFs1Fts7FhbvrCL0LPKU+yydQm+vFFkXgU4vrLwIF6FnkePlTAp9jMZXKRvnURskVzF3oxFtH5UOofuLi1FYRJ9Jx34OpEj4AE2kA7tTJkqMCx37rSo3NnbuakjoCV7KpgIpM738JxGcwboBRUzon4pRzoWEjoPQAaeiT+j+mlaEtTs8MjpM6D7yRw7HwqzlZVfoa+i15OcKJqE3Um55wu6xKcPwDLc+ug/XztWhU+hYoBZlc7shoSdjg/ESvECOD2/rafioVztyTWW2Jaw83DZjQsfFFH7Op2id806sEfrYGro3nfzMaVzoC8nXGV8M1yF0/GklLBQTz8GH/yRaENIE2Cf0j8Uo5wtCx0HogFPRJ/RaynTmMi2h+6heOAXLWSJt4lIReg9yAN4JnUKfrLwl9sVmC0rzlw3uOde/vS7vzZLxGeXkDO6GhZ5P2+5nMvUrXrSkc1KX2fFNfV/OW3Oi9ehJiuqhWK4eSiU5RQahsE39g4wJfSMm8SYDfed8gP+cP17yVkaS9jm/gZKMVkYyOaAP2x1hQui1ZEG3NSh07An1ECXWVPaTKGAJ+bdU6KfEKOcXQsdB6IBT0Sf0uEzy/ppKFqH75hdr8SC5DKLQC0glLdCcFJ1CHxx65VVP2PA/WAcuPS5OR4oOnUIPVQfVzNSpX+gbwk23MU59O3eqlBUgJSzjrYyRlMw7WcaEjiceGqf/nGNLyZSUvD66E3cUbOYidDwjvmLVf7xBoWNPnD0UL6Xj4Sf4T6JJoR/Sxn0bhP6jGOW8Qug4CB1wKvqEjkeyK7K94JW85EIPjzUdUaPMFK4i9NuINznsFTahS88G9THBL2n7h6fQpWpaAxJ4Cx0bdg7QGugOYo0s6ys9uWUqlCFbtNcj9LbkeqQslISt02j/RhV1VltwETpe2UcewoZVQdUndOwRtUJxDfFMgKo/icgJfc5hMar5krRpAoQOOBWdQh9HnPiU3XhwocftCd95fWWFYj+0itCx2Ku8XNICL5vQx4ZlDc2Xbr0VKmOc3PHTOvMUegazyvQLHReYWtKaVS/drFYgRS2Ze1Xbviq7xhcSt37pE3pf6bvlqdR6y35tGnW4/gh1z13n1xamhndQnvhlDr5ybyKXOza9c4N6pl29QsevoSIPnqy+kewnMXXVa4PupE+0WLwP/acJYhRz+DxSv0HogFPRKfTcAdJNOZ842yhLLHOVUBaWLEOan59EFHp2V4KosPlrNqFLybe91SqbqMLyyvnnAHLapPETurTvfTLiLnSsdvmi8Hc08QqZPafVD/uk1Y688LQb3QQhr8+kZGUcoTz8MbfGqNDRIaqStwnCgH6Uc54qzT2XhU9zTPYF1iV5lLnTZQ9rjQU+Qq8knfBFhoU+jZSLuK8sdzL2k9gYWFvvTs8kbHGmuDP3HRGjlMP/DNsAGAKEDjgVnULHi2HLdsBOTVEXeq0vsHhoNmmNNiWfXA99D8ERvsHjMD1Cn68i2pulG2WNInQMoRndVbO8Gxd6KIovbyB/oePhg2E5Vzz+sd9jccqk6WGBCQglxGMZ7D1jCTup8GroOoWeLwWZPxb2jFftf3EP5dRsppRnya+R9JpLqOMS9xj+wzEhdGwyKrNU8feaMkNCT/8gdEzKSlI1dPwnkbyFJUOx9bncO8+4JCqZQ1t9AqEDTkWv0DdKS+V5WL6XVCyHHC70bwIC2ZJPmD+l7EPHRy1eLL2a788V+b10CH2a2v0d069yJ1mqP3zLG5YizbDQpVLxxOqgZoTeRFo/eFN5og8otp5J19urLLZaKcvRj1lrLvY81j7PuNDx2K8XFZEVnf0X1EtbJPZIUXU1iq+Z3AJ/8sBmqU9g93Xfn1uEHuRMCD39YdU9ANlX+f4TmmRI6FiUhRCP9TkNi0KV/SSk2YaKUN4gVqA4ixjif4hn6QLpoIv1nmEAiBGh47vT7nim/o/JWL1vTOidQ0FYZWkq40ZsfVZN6OlYOHVJaO50pW8kNxO197ILfZXacrkHWyUeLbNLbk/t1Cv6hJ7GWJnFoNBxUW7pqxI/OFdanM6WYsvelG3q8gTO0tyQTTAtdgr9sRRLhaZf6PgWrEOyc579olpifQX9pRH+MNlcenYnWVTHfGytXLqKvp+YNy2UU8iE0PGd+CmhJe8E37rKm7mh36E+oeOnpiC0ojBGkWEx9JPwYHV2NiCdgNBFEDrgTHQLHV99bhqMdH9Gma09KPQ0ab3Vuy8uTB6CMDaBInR81CIMDY5DamuC1mnDLvQtqqm347Cw6dnYiK9h4O+LkvkJPeSGmmRLhI5fkxewGduBgQeqHLxgWqnkiDexPcxzAkbtLgWQ52KTLlvmB/7WSJnCV6fQc7GJ/Lewc94+8PehGqcnSZoeGItFurcPZFC/KiR5PLNvZaDNhA2+NaFKhJKzzAs9WZogF/KC/w0M9D8GNkJofqYhocdhj6+9gl/uclm8Av6TwLM4KTe6aQJCF0HogDPRL/QEbGgrfLBq87RZnQLhaxXhU+7V2PJuzcxg3YkZm31zkz46huJWVIWOb0UXuh8qHHPltJ6+23JFQ2lBlkHooei6FHldlGqs/EtORqAr6WkFgeFdSVgZSxNC78k+mDImdA+2H807JSnwmFQ6M5DDp7s898iVkpS9xeWBQ5vsC8xE5+F5XkuxUaC3RZeRIzMC2s3MMyx0lI89RQ3YEDjnnrRBgXM+l37OfW6UPrpjVWBJxNNtUMCgTaUgqDisKqBw4pu0e7u19T+dlGRLj4lmhI66yXLlj1pZlDS4JjTDUGVI6GgMZu/M1reOHLUhcK7yMlV+Eng5vLBEAVqA0EUQOuBM9As9bH49SI82KmvontvwW1/J7NnFQ6VF+AppP5u60LOlmiYY3t7YVnIGoYdWg5VRbn2xzUKCcMei4td61Qfx79HI16FL6KGMoxXh4f58hI48M/GgxJwtL87eU7/Q+7CynVI83qH7oj4Frd8M/mOAXP1FuBcltt1uXOgoDt8LLjy8qHh2r/qz00NlL5uScnzM2rTXeOndWfgCwpVYjleJTwKzPC3MCx2NUytMIPT0Px71zTEkdLQXe4DCGId9l9CljPOyJs5TAYQugtABZ2JA6MizQR6q46dXbpXqtrWV2K5dOR9gUVnqQkdxMuUGqAiuQyefYBT6TGLdi/QN8hCv0Ed00Uj/ok/oodowDJWxDAodoRF4Yh9BfTUhSHYbVR0JW+rLrNbTFyvvHSIDmRE6Ss9QP+cdM7TOuZ/q1oSvKd8+MFXlbFwVDPnY6zUvdDQO21RZT3E2vsSuW+jo5v/f3v2EWFEHABwfApFCWJd2RWJhqQ5GhIfyH5gtZru9FRUtLctKdNv+qCkWdbDt3waBHtqDeYqgiOgSIRIadOlQBPZHKpIguokQBUGX6LBMvHX3zbw/s/vbv2/m7edzXHTcmXnOd2bezO+3s36Za16dmFat+iNxqm6ow3CCHgs6rWkmQY+i0wdrjztDG9Jf5FbNh36k4YXe8Kb0MCIZQY+6z9SeO3xdOQ1YERj0gazpZMoXoevr23bPDzVDgM826BPPYQ3Wv/o9d0GP+h6rnZql/MR047nD728wRX3Xa/VD+rU9UxvGrSej2QU9it7ZXTs1y+hox0+VByyn8nb9DD+jb9aMxhJFb6Reerxmd+X2yNAcBD06kB4Bt6x0dmL7db85s6BHbS98X7PQC8cr86RWfyTuqHxu9wadCKUJeizotKaZBT2KRnakjsprdpYP7BlBj6Luk6tqstxx6v3qe9pZQY+it35KH/67Nqeem1oVFPQnxg99HVXv91YcGqo+iPacGf+qf+6CvjJsXpZZBj2KOjfvra7BtuxxWjbuqxqxpOPgkcYPpK17Lb3MtbeVz0lmGfQoummo+uG6njNTn0Il2o7vqLrIL+0YqT8ViaLj6QEFRw+nZux7tHcOgh6tu5heiY71qdsbT80w6FF078XUgx2jg0fL9x0aBj26Ov6x/nHycXAbEfRY0GlNJ9pT0sezKfWfvG3n/t4tvT3rn99Vu6i6V2MfPX7mm8Of95a2ntt78Ll3V9R9W9qf/N26A9Qrt+/uKd/g7Lj1pcqIZ2P2tLe3J5XelSyiv9HI75mvod298fEfBrp6S8P7dw69EHh4vCX5x/qmWoeJJ5L3Tz6a7DWnk4U0Gon6y4yVnLDr/SdPvdi7pffFlfs2H6iZPLTGhu1nH9w7vHVtV8+qZ5+ebLybtz7aNvD5I6Xhlfue6cxc+VeSn4XE+e6NV1+f7jZP6Xzg2R1fXxgc/PHX3S+vyBqxOzp99uaxGwylDz6tPrN5or29vXJHoC31HyB9sXtf8uOMuwfdI0cHxh66uPDJpuqVXp3eP53JgsZfFpjU6ldfX9m1tTQ88NLJvsrCxqVvao2Uz7RK+wLu+tQS9FjQoYm6O08EPDLV0F3Xcjo89QNp82TiUq/utjDzb92eE5nBnxN9/feFzLc7H94ZOVA3yGEIQY8FHQpp15oZPjo0Zw5nz4YCC0/QY0GHQhqqG6JzgY2/NXeuaXcIoIqgx4IORTQ+Z2d6OPIFdm1snS2Tzd0GC0jQY0GHInp3LKe92VMpzrfVa4KmTYWFIuixoEMRnS5fIA828fJ4z9FS4BtrsCAEPRZ0KKbth0uNR1dZKCce6visqb8ApAl6LOhQUG3Tf895jjX9F4CEoMeCDkDxCXos6AAUn6DHgg5A8Ql6LOgAFJ+gx4IOQPEJeizoABSfoMeCDkDxCXos6AAUn6DHgg5A8Ql6LOgAFJ+gx4IOQPEJeizoABSfoMeCDkDxCXos6AAsvqC/d2OLuSLoACzCoLeyGzI3wJLkD10/TzsCAGZD0BOCDkBhCXpC0AEoLEFPCDoAhSXoCUEHoLWD/l68KHyYuQE8FAdAKwT9j3hR+DdzAwg6AK0Q9EPH4kXgfH/mBhB0AFoh6NGfcev76rvs9Rd0AFoi6NFfX8Qt7pfLk6y+oAPQGkGPousuLW9hlx6edOUFHYBWCfqitiTZSoZ+BSCPBD2EoAOQc4IeQtAByDlBDyHoAOScoIcQdAByTtBDCDoAOSfoIQQdgJwT9BCCDkDOCXoIQQcg5wQ9hKADkHOCHkLQAcg5QQ8h6ADknKCHEHQAck7QQwg6ADkn6CEEHYCcE/QQgg5Azgl6CEEHIOcEPYSgA5Bzgh5C0AHIOUEPIegA5JyghxB0AHJO0EMIOgA5J+ghBB2AnBP0EIIOQHGCfmUpGX5LttL1zd5jADB50Akh6ADkkaBPk6ADkEeCPk2CDkAeCfo0CToAeSTo0yToAOTRf9MN2mL3c7P3GAA08HuzA1k0f/sYAZBD3V80u5AF83Gz9xgANLL8WLMTWSh/t/kYAZBLl35udiSL4/zSO5u9uwAgQ9u3/yxj2dS+u9w3tsX+B9Y20n3bOys0AAAAAElFTkSuQmCC'
                                doc.content.splice(0, 1);
                                //Create a date string that we use in the footer. Format is dd-mm-yyyy
                                doc.pageMargins = [20, 60, 20, 30];
                                // Set the font size fot the entire document
                                doc.defaultStyle.fontSize = 10;
                                // Set the fontsize for the table header
                                doc.styles.tableHeader.fontSize = 7;
                                doc.content[0].table.widths = ['5%', '15%', '15%', '15%',
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
                                                image: logo,
                                                alignment: 'center',
                                                width: 150
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
                                $(win.document.body).find('h1').css('display', 'none'),
                                    $(win.document.body)
                                    .css('font-size', '10px')
                                    .prepend(
                                        '<img src="{{ asset('storage/logo.png') }}" style="position:left;  height:10%; top:0; left:0;" />'
                                    );
                            }
                        },
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
        $(".dt-search-0").addClass(
            "form-label");
        $(".dt-input").addClass("form-control form-control-sm mb-3");
        $(".buttons-excel")
            .addClass("btn btn-primary");
        $(".buttons-pdf").addClass("btn btn-danger");
        $(".buttons-print")
            .addClass("btn btn-info");

        $(".dt-layout-row").addClass("d-flex justify-content-between align-items-center");
    });
</script>
