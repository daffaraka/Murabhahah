@extends('dashboard.layout')
@section('page-title', 'Detail Pembiayaan')
@section('content')
    <div class="container p-4 bg-white">
        <h4 class="fw-bold my-3">Data Pembiayaan</h4>

        <div class="mb-3">
            <label for="nama_nasabah" class="fw-bold"> Nasabah Penerima </label>
            <input type="text" class="form-control" value="{{$pembiayaan->Nasabah->nama}}" disabled>
        </div>
        <div class="mb-3">
            <label for="nama_bank" class="fw-bold"> Nasabah Penerima </label>
            <input type="text" class="form-control" value="{{$pembiayaan->nama_bank}}" disabled>
        </div>
       
        <div class="mb-3">
            <label for="nomor_rekening" class="fw-bold">Nomor Rekening </label>
            <input class="form-control mb-3" type="text" name="nomor_rekening" id="nomor_rekening" value="{{$pembiayaan->nomor_rekening}}" disabled>
        </div>
        <div class="mb-3">
            <label for="total_pinjaman" class="fw-bold">Total Pinjaman </label>
            <input class="form-control mb-3" type="number" name="total_pinjaman" id="total_pinjaman" value="{{$pembiayaan->total_pinjaman}}" disabled>
        </div>
        <div class="mb-3">
            <label for="jumlah_angsuran" class="fw-bold">Jumlah Angsuran  </label>
            <input class="form-control mb-3" type="number" name="jumlah_angsuran" id="jumlah_angsuran"  value="{{$pembiayaan->jumlah_angsuran}}" disabled>
        </div>
        <div class="mb-3">
            <label for="jatuh_tempo" class="fw-bold">Jatuh Tempo  </label>
            <input class="form-control mb-3" type="date" name="jatuh_tempo" id="jatuh_tempo"  value="{{$pembiayaan->jatuh_tempo}}" disabled>
        </div>
      
        <a href="{{route('pembiayaan')}}" class="btn btn-warning">Kembali</a>
    </div>

@endsection
