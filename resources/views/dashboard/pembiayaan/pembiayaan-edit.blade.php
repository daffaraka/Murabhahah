@extends('dashboard.layout')
@section('page-title', 'Edit Pembiayaan')
@section('content')

    <div class="container p-5">
        <h4 class="fw-bold my-3">Edit Data Pembiayaan Nasabah </h4>
        <form action="{{ route('pembiayaan.update',$pembiayaan->id_pembiayaan) }}" method="POST">
            @csrf
            {{-- <input type="hidden" name="id_pembiayaan" value="{{$pembiayaan->id_pembiayaan}}"> --}}
            <div class="mb-3">
                <label for="nama_nasabah" class="fw-bold"> Nasabah Penerima </label>
                <input type="text" class="form-control" value="{{$pembiayaan->Nasabah->nama}}" disabled>
            </div>
            <div class="mb-3">
                <label for="nama_bank" class="fw-bold">Pilih Bank </label>
                <select name="nama_bank" id="nama_bank" class="form-control">
                    <option value="BNI">BNI</option>
                    <option value="BRI">BRI</option>
                    <option value="Mandiri">Mandiri</option>
                    <option value="BCA">BCA</option>
                    <option value="CIMB Niaga">CIMB Niaga</option>
                </select>
            </div>
           
            <div class="mb-3">
                <label for="nomor_rekening" class="fw-bold">Nomor Pembiayaan </label>
                <input class="form-control mb-3" type="text" name="nomor_rekening" id="nomor_rekening" value="{{$pembiayaan->nomor_pembiayaan}}">
            </div>
            <div class="mb-3">
                <label for="total_pinjaman" class="fw-bold">Jumlah Pinjaman </label>
                <input class="form-control mb-3" type="number" name="nilai_pinjaman" id="total_pinjaman" value="{{$pembiayaan->nilai_pembiayaan}}">
            </div>
            <div class="mb-3">
                <label for="total_pinjaman" class="fw-bold">Margin Keuntungan </label>
                <input class="form-control mb-3" type="number" name="margin_keuntungan" id="total_pinjaman" value="{{$pembiayaan->margin_keuntungan}}">
            </div>
            <div class="mb-3">
                <label for="total_pinjaman" class="fw-bold">Total Pinjaman </label>
                <input class="form-control mb-3" type="number" name="total_pinjaman" id="total_pinjaman" value="{{$pembiayaan->total_pembiayaan}}" readonly>
            </div>
            <div class="mb-3">
                <label for="jumlah_angsuran" class="fw-bold">Jumlah Angsuran  </label>
                <input class="form-control mb-3" type="number" name="jumlah_angsuran" id="jumlah_angsuran"  value="{{$pembiayaan->jumlah_angsuran}}">
            </div>
            <div class="mb-3">
                <label for="jatuh_tempo" class="fw-bold">Jatuh Tempo  </label>
                <input class="form-control mb-3" type="date" name="jatuh_tempo" id="jatuh_tempo"  value="{{$pembiayaan->jatuh_tempo}}">
            </div>
          
            <button type="submit" class="btn btn-primary">Perbarui</button>


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
