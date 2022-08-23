@extends('dashboard.layout')
@section('page-title', 'Detail Nasabah')
@section('content')
    <div class="container p-4 bg-white">
        <h4 class="fw-bold my-3">Data Nasabah</h4>

        <label for="nama_nasabah">Nama </label>
        <input class="form-control mb-3" type="text" name="nama" id="nama" value="{{$nasabah->nama}}" disabled>

        <label for="nama_nasabah">No Identitas </label>
        <input class="form-control mb-3" type="number" name="noIdentitas" id="noIdentitas" value="{{$nasabah->noIdentitas}}" disabled>


        <label for="nama_nasabah">Tempat Tanggal Lahir </label>
        <input class="form-control mb-3" type="text" name="TTL" id="TTL" value="{{$nasabah->TTL}}" disabled>

        <label for="nama_nasabah">Jenis Kelamin </label>
        <input class="form-control mb-3" type="text" name="jenisKelamin" id="jenisKelamin" value="{{$nasabah->jenisKelamin}}" disabled>

        <label for="nama_nasabah">Agama </label>
        <input class="form-control mb-3" type="text" name="agama" id="agama" value="{{$nasabah->agama}}" disabled>

        <label for="nama_nasabah">Pekerjaan </label>
        <input class="form-control mb-3" type="text" name="pekerjaan" id="pekerjaan" value="{{$nasabah->pekerjaan}}" disabled>

        <label for="nama_nasabah">Pendidikan </label>
        <input class="form-control mb-3" type="text" name="pendidikan" id="pendidikan" value="{{$nasabah->pendidikan}}" disabled>

        <label for="nama_nasabah">No Hp </label>
        <input class="form-control mb-3" type="number" name="noHp" id="noHp" value="{{$nasabah->noHp}}" disabled>

        <label for="nama_nasabah">Alamat </label>
        <input class="form-control mb-3" type="text" name="alamat" id="alamat" value="{{$nasabah->alamat}}" disabled>

        <label for="nama_nasabah">Kelurahan </label>
        <input class="form-control mb-3" type="text" name="kelurahan" id="kelurahan" value="{{$nasabah->kelurahan}}" disabled>

        <label for="nama_nasabah">Kecamatan </label>
        <input class="form-control mb-3" type="text" name="kecamatan" id="kecamatan" value="{{$nasabah->kecamatan}}" disabled>

        <label for="nama_nasabah">Provinsi </label>
        <input class="form-control mb-3" type="text" name="provinsi" id="provinsi" value="{{$nasabah->provinsi}}" disabled>

    </div>

@endsection
