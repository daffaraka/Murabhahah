@extends('dashboard.layout')
@section('page-title', 'Tambahkan Pembayaran')
@section('content')

    <div class="container p-5">
        <h4 class="fw-bold my-3">Pembayaran</h4>
        <form action="{{ route('pembayaran.update',$pembayaran->id_pembayaran) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="total_pinjaman" class="fw-bold">Nama Nasabah </label>
                <input class="form-control mb-3" type="text" id="nama_nasabah" readonly value="{{$pembayaran->Pembiayaan->Nasabah->nama}}">

                {{-- <select name="id_pembiayaan" id="nama_nasabah" class="form-control">
                    <option selected>Pilih Nasabah</option>
                    @foreach ($pembiayaan as $data)
                        <option value="{{$data->id_pembiayaan}}">{{$data->Nasabah->nama}}</option>
                    @endforeach

                </select> --}}
                {{-- <input class="form-control mb-3" type="number" name="nama_penyetor" id="nama_penyetor"> --}}
            </div>
            <div class="mb-3">
                <label for="total_pinjaman" class="fw-bold">Kode Pembiayaan </label>
                <input class="form-control mb-3" type="number" id="kode_pembiayaan" readonly value="{{$pembayaran->id_pembiayaan}}">
            </div>
            <div class="mb-3">
                <label for="total_pinjaman" class="fw-bold">Pembiayaan </label>
                <input class="form-control mb-3" type="number" id="pembiayaan" readonly value="{{$pembayaran->Pembiayaan->total_pinjaman}}">
            </div>
            <div class="mb-3">
                <label for="total_pinjaman" class="fw-bold">Nama Bank </label>
                <input class="form-control mb-3" type="text" id="nama_bank" readonly value="{{$pembayaran->Pembiayaan->nama_bank}}">
            </div>
            <div class="mb-3">
                <label for="total_pinjaman" class="fw-bold">No. Rek </label>
                <input class="form-control mb-3" type="number" id="nomor_rekening" readonly value="{{$pembayaran->Pembiayaan->nomor_rekening}}">
            </div>
            <div class="mb-3">
                <label for="total_pinjaman" class="fw-bold">Nama Penyetor </label>
                <input class="form-control mb-3" type="text" name="nama_penyetor" id="nama_penyetor" value="{{$pembayaran->nama_penyetor}}">
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
                <input class="form-control mb-3" type="number" name="angsuran_ke" id="angsuran_ke"   value="{{$pembayaran->angsuran_ke}}"> 
            </div>
            <div class="mb-3">
                <label for="total_pinjaman" class="fw-bold">Jumlah Bayar </label>
                <input class="form-control mb-3" type="number" name="jumlah_bayar" id="jumlah_bayar"  value="{{$pembayaran->jumlah_bayar}}">
            </div>




            <button type="submit" class="btn btn-primary">Tambah</button>


        </form>
    </div>



@endsection
