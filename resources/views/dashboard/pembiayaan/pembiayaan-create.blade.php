@extends('dashboard.layout')
@section('page-title', 'Tambahkan Pembiayaan pada Nasabah')
@section('content')

    <div class="container p-5">
        <h4 class="fw-bold my-3">Pembiayaan Pada Nasabah</h4>
        <form action="{{ route('pembiayaan.tambah') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama_nasabah" class="fw-bold"> Nasabah Penerima </label>
                <select name="id_nasabah" id="id_nasabah" class="form-control">
                    @foreach ($nasabah as $pilihan)
                        <option value="{{ $pilihan->id_nasabah }}">{{ $pilihan->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="nomor_rekening" class="fw-bold">Nomor Pembiayaan </label>
                <input class="form-control mb-3" type="text" name="nomor_pembiayaan" id="nomor_rekening" value="">
            </div>
            <div class="mb-3">
                <label for="total_pinjaman" class="fw-bold">Nilai Pembiayaan </label>
                <input class="form-control mb-3" type="text" name="nilai_pembiayaan" id="nilai_pinjaman" value="">
            </div>
            <div class="mb-3">
                <label for="total_pinjaman" class="fw-bold">Margin keuntungan (%) </label>
                <input class="form-control mb-3" type="text" name="margin_keuntungan" id="margin_keuntungan"
                    value="">
            </div>
            <div class="mb-3">
                <label for="total_pinjaman" class="fw-bold">Total Pinjaman </label>
                <input class="form-control mb-3" type="number" name="total_pembiayaan" id="total_pinjaman" readonly>
            </div>
            <div class="mb-3">
                <label for="jumlah_angsuran" class="fw-bold">Jumlah Angsuran </label>
                <input class="form-control mb-3" type="number" name="jumlah_angsuran" id="jumlah_angsuran">
            </div>
            <div class="mb-3">
                <label for="jatuh_tempo" class="fw-bold">Jatuh Tempo </label>
                <input class="form-control mb-3" type="date" name="jatuh_tempo" id="jatuh_tempo" value="">
            </div>


            <button type="submit" class="btn btn-primary">Tambah</button>


        </form>
    </div>

    @push('script')
        <script>
            var inputNilaiPinjaman = document.getElementById("nilai_pinjaman").value;
            var inputMarginKeuntungan = document.getElementById("margin_keuntungan").value;
            var inputTotalPinjaman = document.getElementById("total_pinjaman").value;


            $(document).ready(function() {
                //this calculates values automatically 
                sum();
                $("#nilai_pinjaman, #margin_keuntungan").on("keydown keyup", function() {
                    sum();
                });
            });

            function sum() {
                var inputNilaiPinjaman = document.getElementById('nilai_pinjaman').value;
                var inputMarginKeuntungan = document.getElementById('margin_keuntungan').value;
                var inputTotalPinjaman = parseInt(inputNilaiPinjaman) + parseInt((inputMarginKeuntungan * inputNilaiPinjaman) / 100 );
                if (!isNaN(inputTotalPinjaman)) {
                    document.getElementById('total_pinjaman').value = inputTotalPinjaman;
                }
            }

            // function totalPinjaman() {
            //     if (inputNilaiPinjaman.value && inputMarginKeuntungan.value) {
            //         inputTotalPinjaman.value = inputNilaiPinjaman.value + (inputNilaiPinjaman.value * inputMarginKeuntungan.value);
            //     } else {
            //         inputTotalPinjaman.value = null;
            //     }
            // }

            // inputNilaiPinjaman.addEventListener("keyup", function() {
            //     totalPinjaman()
            // });

            // inputMarginKeuntungan.addEventListener("keyup", function() {
            //     totalPinjaman()
            // });
        </script>
    @endpush


@endsection
