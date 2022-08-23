<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Nasabah;
use App\Models\Pembayaran;
use App\Models\Pembiayaan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PembayaranController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','permission:index pembayaran|input pembayaran|edit pembayaran|hapus pembayaran']);

    }

    public function index()
    {
        $pembayaran = Pembayaran::with('Pembiayaan.Nasabah')->get();

        // dd($pembayaran);
        if (request()->ajax()) {

            return DataTables::of($pembayaran)->addColumn('action', function ($data) {
                $button = ' <a href="data-pembayaran/' . $data->id_pembayaran . ' " data-toggle="tooltip"  data-id="' . $data->id_pembayaran . '" data-original-title="Show" class="show btn btn-sm btn-success px-3 show-post"><i class="far fa-edit"></i> Detail</a>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<a href="edit-pembayaran/' . $data->id_pembayaran . ' " data-toggle="tooltip"  data-id="' . $data->id_pembayaran . '" data-original-title="Edit" class="edit btn btn-sm btn btn-warning px-2 edit-post"><i class="far fa-edit"></i> Edit</a>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<a href="delete-pembayaran/' . $data->id_pembayaran . '" name="delete" id="' . $data->id_pembayaran . '" class="delete btn btn-sm px-2 btn-danger "><i class="far fa-trash-alt"></i> Delete</a>';
                return $button;
            })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        };
        return view('dashboard.pembayaran.pembayaran-index');
    }

    public function create()
    {
        $pembiayaan = Pembiayaan::with('Nasabah')->get();

        return view('dashboard.pembayaran.pembayaran-create', compact('pembiayaan'));
    }

    public function pembiayaanNasabah(Request $request)
    {
        $nasabah_id = $request->id_nasabah;

        $pembiayaanNasabah = Pembiayaan::where('id_nasabah', $nasabah_id)->first();

        return response()->json($pembiayaanNasabah);
    }

    public function store(Request $request)
    {
        // dd($request->all());
      
        $pembiayaan = Pembiayaan::find($request->id_pembiayaan);

        $angsuranBulanan = $pembiayaan->value('total_pembiayaan') / 12;
        

        Pembayaran::create(
            [
                'nama_penyetor' => $request->nama_penyetor,
                'id_pembiayaan' =>$request->id_pembiayaan,
                'angsuran_ke' =>$request->angsuran_ke,
                'angsuran_bulan' =>$request->angsuran_bulan,
                'jumlah_bayar' =>$request->jumlah_bayar,
                'tanggal_bayar' => Carbon::today()->locale('id')
            ]
        );

        return redirect()->route('pembayaran');
    }

    public function edit($id)
    {
        $pembayaran = Pembayaran::with('Pembiayaan.nasabah')->find($id);


        return view('dashboard.pembayaran.pembayaran-edit', compact('pembayaran'));
    }

    public function update($id, Request $request)
    {
        
        $pembayaran = Pembayaran::find($id);

        $pembayaranAttr = [];
        $pembayaranAttr['nama_penyetor'] = $request->nama_penyetor;
        $pembayaranAttr['angsuran_ke'] = $request->angsuran_ke;
        $pembayaranAttr['angsuran_bulan'] = $request->angsuran_bulan;
        $pembayaranAttr['jumlah_bayar'] = $request->jumlah_bayar;
        $pembayaranAttr['tanggal_bayar'] = Carbon::today()->locale('id');

        $pembayaran->update($pembayaranAttr);

        return redirect()->route('pembayaran');
    }

    public function destroy($id)
    {
        # code...
    }
}
