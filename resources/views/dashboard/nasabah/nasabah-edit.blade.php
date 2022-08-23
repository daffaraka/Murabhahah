@extends('dashboard.layout')
@section('page-title', 'Edit Nasabah ')
@section('content')

    <div class="container p-5">
        <h4 class="fw-bold my-3">Edit Nasabah</h4>
        <form action="{{ route('nasabah.update',$nasabah->id_nasabah) }}" method="POST">
            @csrf
            <input type="hidden" name="id_user" value="{{$nasabah->id_nasabah}}">
            <label for="nama_nasabah" class="fw-bold">Nama </label>
            <input class="form-control mb-3" type="text" name="nama" id="nama" value="{{$nasabah->nama}}">

            <label for="nama_nasabah"  class="fw-bold">No Identitas </label>
            <input class="form-control mb-3" type="number" name="noIdentitas" id="noIdentitas" value="{{$nasabah->noIdentitas}}">


            <label for="nama_nasabah"  class="fw-bold">Tempat Tanggal Lahir </label>
            <input class="form-control mb-3" type="text" name="TTL" id="TTL" value="{{$nasabah->TTL}}">

            <label for="nama_nasabah"  class="fw-bold">Jenis Kelamin </label>
            <div class="btn-group btn-group-toggle d-block mb-3" data-toggle="buttons">
                <label class="btn btn-primary">
                    <input type="radio" name="jenisKelamin" value="Laki-laki"> Laki-laki 
                </label> <br>
                <label class="btn btn-primary">
                    <input type="radio" name="jenisKelamin" value="Wanita"> Wanita
                </label>
            </div>
            <label for="nama_nasabah"  class="fw-bold">Agama </label>
            <select id="my-select" class="form-control mb-3" name="agama">
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katholik">Katholik</option>
                <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>

            </select>


            <label for="nama_nasabah"  class="fw-bold">Pekerjaan </label>
            <input class="form-control mb-3" type="text" name="pekerjaan" id="pekerjaan" value="{{$nasabah->pekerjaan}}">

            <label for="nama_nasabah"  class="fw-bold">Pendidikan </label>
            <input class="form-control mb-3" type="text" name="pendidikan" id="pendidikan" value="{{$nasabah->pendidikan}}">

            <label for="nama_nasabah"  class="fw-bold">No Hp </label>
            <input class="form-control mb-3" type="number" name="noHp" id="noHp" value="{{$nasabah->noHp}}">

            <label for="nama_nasabah"  class="fw-bold">Alamat </label>
            <input class="form-control mb-3" type="text" name="alamat" id="alamat" value="{{$nasabah->alamat}}">

            <label for="nama_nasabah"  class="fw-bold">Kelurahan </label>
            <input class="form-control mb-3" type="text" name="kelurahan" id="kelurahan" value="{{$nasabah->kelurahan}}">

            <label for="nama_nasabah"  class="fw-bold">Kecamatan </label>
            <input class="form-control mb-3" type="text" name="kecamatan" id="kecamatan" value="{{$nasabah->kecamatan}}">

            <label for="nama_nasabah"  class="fw-bold">Provinsi </label>
            <input class="form-control mb-3" type="text" name="provinsi" id="provinsi" value="{{$nasabah->provinsi}}">


            <button type="submit" class="btn btn-primary">Tambah</button>


        </form>
    </div>



@endsection
