@extends('dashboard.layout')
@section('page-title', 'Tambahkan Pembayaran')
@section('content')

    <div class="container p-5">
        <h4 class="fw-bold my-3">Pembayaran</h4>
        <form action="{{ route('pembayaran.tambah') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="total_pinjaman" class="fw-bold">Nama Nasabah </label>
                <select name="id_pembiayaan" id="nama_nasabah" class="form-control">
                    <option selected>Pilih Nasabah</option>
                    @foreach ($pembiayaan as $data)
                        <option value="{{$data->id_pembiayaan}}">{{$data->Nasabah->nama}}</option>
                    @endforeach

                </select>
                {{-- <input class="form-control mb-3" type="number" name="nama_penyetor" id="nama_penyetor"> --}}
            </div>
            <div class="mb-3">
                <label for="total_pinjaman" class="fw-bold">Kode Pembiayaan </label>
                <input class="form-control mb-3" type="number" id="kode_pembiayaan" readonly placeholder="Tentukan nasabah terlebih dahulu">
            </div>
            <div class="mb-3">
                <label for="total_pinjaman" class="fw-bold">Pembiayaan </label>
                <input class="form-control mb-3" type="number" id="pembiayaan" readonly placeholder="Tentukan nasabah terlebih dahulu">
            </div>
          
            <div class="mb-3">
                <label for="total_pinjaman" class="fw-bold">Nama Penyetor </label>
                <input class="form-control mb-3" type="text" name="nama_penyetor" id="nama_penyetor"  placeholder="Nama pelaku penyetoran">
            </div>
            <div class="mb-3">
                <label for="total_pinjaman" class="fw-bold">Angsuran Bulan </label>
                <select id="" class="form-control" name="angsuran_bulan">
                    <option value="Januari">Januari</option>
                    <option value="Februari">Februari</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option value="September">September</option>
                    <option value="Oktober">Oktober</option>
                    <option value="November">November</option>
                    <option value="Desember">Desember</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="total_pinjaman" class="fw-bold">Angsuran Ke </label>
                <input class="form-control mb-3" type="number" name="angsuran_ke" id="angsuran_ke"  placeholder="Tentukan jumlah angsuran">
            </div>
            <div class="mb-3">
                <label for="total_pinjaman" class="fw-bold">Jumlah Bayar </label>
                <input class="form-control mb-3" type="number" name="jumlah_bayar" id="jumlah_bayar"  placeholder="Masukkan jumlah pembayaran" value="">
            </div>




            <button type="submit" class="btn btn-primary">Tambah</button>


        </form>
    </div>



@endsection
@push('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('#nama_nasabah').on('change', function(e) {
                var id_nasabah = e.target.value;
                $.ajax({
                    url: "{{ route('pembayaran.get-id-nasabah') }}",
                    type: "GET",
                    dataType: 'json',
                    contentType: 'application/json',
                    data: {
                        id_nasabah: id_nasabah
                    },
                    success: function(data) {
                        $('#kode_pembiayaan').val(data.id_pembiayaan)
                        $('#pembiayaan').val(data.total_pembiayaan)
                        $('#nama_bank').val(data.nama_bank)
                        $('#nomor_rekening').val(data.nomor_rekening)
                    }
                })
            });
        });
    </script>
@endpush
