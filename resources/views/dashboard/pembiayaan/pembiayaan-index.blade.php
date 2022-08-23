@extends('dashboard.layout')
@section('page-title', 'Pembiayaan Nasabah')
@section('content')

    <div class="container p-4">
        <a href="{{ route('pembiayaan.buat') }}" class="btn btn-primary my-2"> <i class="fa fa-plus" aria-hidden="true"></i>
            Tambah Data Pembiayaan</a>
        <table class="table table-striped table-bordered" id="table-pembiayaan">
            <thead>
                <tr>
                    <th class="px-2">#</th>
                    <th class="px-2">Nama Nasabah</th>
                    <th class="px-2">Kode Pembiayaan</th>
                    <th class="px-2">Jumlah Pembiayaan</th>
                    <th class="px-2">Margin Keuntungan</th>
                    <th class="px-2">Total Pembiayaan </th>
                    <th class="px-2">Jumlah Angsuran </th>
                    <th class="px-2">Jatuh Tempo</th>
                    <th class="px-2">Action </th>
                </tr>
            </thead>
            <tbody>



            </tbody>
        </table>

        {{-- <div class="modal fade" id="tambah-edit-nasabah" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Nasabah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 class="fw-bold my-3">Data Nasabah</h4>
                    <form name="tambahNasabah" action="javascript:void(0)" method="POST">
                        <input type="hidden" id="token" value="{{ csrf_token() }}">

                        <input type="hidden" name="id_nasabah" id="id_nasabah">
                        <label for="nama_nasabah">Nama </label>
                        <input class="form-control mb-3" type="text" name="nama" id="nama" value="">

                        <label for="nama_nasabah">No Identitas </label>
                        <input class="form-control mb-3" type="number" name="noIdentitas" id="noIdentitas"
                            value="">


                        <label for="nama_nasabah">Tempat Tanggal Lahir </label>
                        <input class="form-control mb-3" type="text" name="TTL" id="TTL" value="">

                        <label for="nama_nasabah">Jenis Kelamin </label>
                        <input class="form-control mb-3" type="text" name="jenisKelamin" id="jenisKelamin"
                            value="">

                        <label for="nama_nasabah">Agama </label>
                        <input class="form-control mb-3" type="text" name="agama" id="agama" value="">

                        <label for="nama_nasabah">Pekerjaan </label>
                        <input class="form-control mb-3" type="text" name="pekerjaan" id="pekerjaan" value="">

                        <label for="nama_nasabah">Pendidikan </label>
                        <input class="form-control mb-3" type="text" name="pendidikan" id="pendidikan"
                            value="">

                        <label for="nama_nasabah">No Hp </label>
                        <input class="form-control mb-3" type="number" name="noHp" id="noHp" value="">

                        <label for="nama_nasabah">Alamat </label>
                        <input class="form-control mb-3" type="text" name="alamat" id="alamat" value="">

                        <label for="nama_nasabah">Kelurahan </label>
                        <input class="form-control mb-3" type="text" name="kelurahan" id="kelurahan" value="">

                        <label for="nama_nasabah">Kecamatan </label>
                        <input class="form-control mb-3" type="text" name="kecamatan" id="kecamatan"
                            value="">

                        <label for="nama_nasabah">Provinsi </label>
                        <input class="form-control mb-3" type="text" name="provinsi" id="provinsi"
                            value="">

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="button" type="submit" class="btn btn-primary" id="btn-save"
                                value="save-nasabah">Tambah</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div> --}}
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Datatables
            $(document).ready(function() {
                $('#table-pembiayaan').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('pembiayaan') }}",
                        type: 'GET'
                    },
                    columns: [{
                            data: 'id_pembiayaan',
                            nama: 'id_pembiayaan'
                        },
                        {
                            data: 'nasabah.nama',
                        },
                        {
                            data: 'nomor_pembiayaan',
                        },
                        {
                            data: 'nilai_pembiayaan',
                        },
                        {
                            data : 'margin_keuntungan',
                            render: function(data, type, row) {
                                return data + '%';
                            },
                        },
                        {
                            data: 'total_pembiayaan',
                        },
                        {
                            data: 'jumlah_angsuran',
                        },
                        {
                            data: 'jatuh_tempo',
                        },
                        {
                            data: 'action'
                        }
                    ],
                    order: [
                        [1, 'asc']
                    ]
                });
                // t.on('order.dt search.dt', function() {
                //     let i = 1;

                //     t.cells(null, 0, {
                //         search: 'applied',
                //         order: 'applied'
                //     }).every(function(cell) {
                //         this.data(i++);
                //     });
                // }).draw();
            });

            // POST Tambah Nasabah
            $('body').on('click', '#btn-save', function(event) {

                var id_nasabah = $("#id_nasabah").val();
                var nama = $("#nama").val();
                var noIdentitas = $("#noIdentitas").val();
                var TTL = $("#TTL").val();
                var jenisKelamin = $("#jenisKelamin").val();
                var agama = $("#agama").val();
                var pekerjaan = $("#pekerjaan").val();
                var pendidikan = $("#pendidikan").val();
                var noHp = $("#noHp").val();
                var alamat = $("#alamat").val();
                var kelurahan = $("#kelurahan").val();
                var kecamatan = $("#kecamatan").val();
                var provinsi = $("#provinsi").val();

                $("#save-nasabah").html('Please Wait...');
                $("#save-nasabah").attr("disabled", true);

                // ajax
                $.ajax({
                    type: "POST",
                    url: "{{ route('nasabah.tambah') }}",
                    data: {
                        token: '_token',
                        nama: nama,
                        id_nasabah: id_nasabah,
                        noIdentitas: noIdentitas,
                        TTL: TTL,
                        jenisKelamin: jenisKelamin,
                        agama: agama,
                        pekerjaan: pekerjaan,
                        pendidikan: pendidikan,
                        noHp: noHp,
                        alamat: alamat,
                        kelurahan: kelurahan,
                        kecamatan: kecamatan,
                        provinsi: provinsi,
                    },
                    dataType: 'JSON',
                    processData: false,
                    contentType: false,
                    // environment : development,
                    success: function(res) {
                        window.location.reload();
                        $("#save-nasabah").html('Submit');
                        $("#save-nasabah").attr("disabled", false);
                    }
                });
            });

        });

        // Pop up modal
        // $('#modalTambahNasabah').on('shown.bs.modal', function() {
        //     $("#id_nasabah").val('');
        //     var title = $('#title').val();

        // })
    </script>
@endpush
