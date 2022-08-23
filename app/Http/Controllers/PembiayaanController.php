<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Pembiayaan;
use Closure;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class PembiayaanController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','permission:index pembiayaan|input pembiayaan|edit pembiayaan|hapus pembiayaan']);
       
    }
    public function index()
    {

        $pembiayaan = Pembiayaan::with('Nasabah')->get();

        if (request()->ajax()) {

            return DataTables::of($pembiayaan)->addColumn('action', function ($data) {
                $button = ' <a href="data-pembiayaan/' . $data->id_pembiayaan . ' " data-toggle="tooltip"  data-id="' . $data->id_pembiayaan . '" data-original-title="Show" class="show btn btn-sm btn-success px-3 show-post"><i class="far fa-edit"></i> Detail</a>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<a href="edit-pembiayaan/' . $data->id_pembiayaan . ' " data-toggle="tooltip"  data-id="' . $data->id_pembiayaan . '" data-original-title="Edit" class="edit btn btn-sm btn btn-warning px-2 edit-post"><i class="far fa-edit"></i> Edit</a>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<a href="delete-pembiayaan/' . $data->id_pembiayaan . '" name="delete" id="' . $data->id_pembiayaan . '" class="delete btn btn-sm px-2 btn-danger "><i class="far fa-trash-alt"></i> Delete</a>';
                return $button;
            })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        };
        // $nasabah = Nasabah::all();
        return view('dashboard.pembiayaan.pembiayaan-index');
    }

    public function create()
    {

        $nasabah = Nasabah::all();
        return view('dashboard.pembiayaan.pembiayaan-create', compact('nasabah'));
    }


    public function store(Request $request)
    {


        //    dd($request->all());
        Pembiayaan::updateOrCreate(
            ['id_pembiayaan' => $request->id_pembiayaan],
            [
                'id_nasabah' => $request->id_nasabah,
                'nomor_pembiayaan' => $request->nomor_pembiayaan,
                'nilai_pembiayaan' => $request->nilai_pembiayaan,
                'margin_keuntungan' => $request->margin_keuntungan,
                'total_pembiayaan' => $request->total_pembiayaan,
                'jumlah_angsuran' => $request->jumlah_angsuran,
                'jatuh_tempo' => $request->jatuh_tempo,
            ]
        );

        return redirect()->route('pembiayaan');
    }


    public function show($id)
    {
        $pembiayaan = Pembiayaan::find($id);

        return view('dashboard.pembiayaan.pembiayaan-show', compact('pembiayaan'));
    }


    public function edit($id)
    {
        $pembiayaan = Pembiayaan::find($id);

        return view('dashboard.pembiayaan.pembiayaan-edit', compact('pembiayaan'));
    }


    public function update(Request $request, $id)
    {

        $pembiayaan = Pembiayaan::find($id);
        // dd($request->all());


        $pembiayaanAttribute = [];

        $pembiayaanAttribute['nama_bank'] = $request->nama_bank;
        // $pembiayaanAttribute['id_nasabah'] = $request->id_nasabah;
        $pembiayaanAttribute['nomor_rekening'] = $request->nomor_rekening;
        $pembiayaanAttribute['total_pinjaman'] = $request->total_pinjaman;
        $pembiayaanAttribute['jumlah_angsuran'] = $request->jumlah_angsuran;
        $pembiayaanAttribute['jatuh_tempo'] = $request->jatuh_tempo;

        $pembiayaan->update($pembiayaanAttribute);

        return redirect()->route('pembiayaan');
    }


    public function destroy($id)
    {
        $pembiayaan = Pembiayaan::find($id);

        $pembiayaan->delete();
        if (!$pembiayaan) {
            return redirect()->route('pembiayaan');
        } else {
            return redirect()->route('pembiayaan');
        }
    }
}
