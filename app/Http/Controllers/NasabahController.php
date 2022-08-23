<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class NasabahController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','permission:index nasabah|input nasabah|edit nasabah|hapus nasabah']);

    }

    public function index()
    {
    
        $nasabah = Nasabah::all();
      
        if (request()->ajax()) {

            return DataTables::of($nasabah)->addColumn('action', function ($data) {
            $button =' <a href="data-nasabah/'.$data->id_nasabah.' " data-toggle="tooltip"  data-id="' . $data->id_nasabah . '" data-original-title="Show" class="show btn btn-sm btn-success px-3 show-post"><i class="far fa-edit"></i> Detail</a>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<a href="edit-nasabah/'.$data->id_nasabah.' " data-toggle="tooltip"  data-id="' . $data->id_nasabah . '" data-original-title="Edit" class="edit btn btn-sm btn btn-warning px-2 edit-post"><i class="far fa-edit"></i> Edit</a>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<a href="delete-nasabah/'.$data->id_nasabah.'" name="delete" id="' . $data->id_nasabah . '" class="delete btn btn-sm px-2 btn-danger "><i class="far fa-trash-alt"></i> Delete</a>';
                return $button;
            })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        };
        // $nasabah = Nasabah::all();
        return view('dashboard.nasabah.nasabah-index');
    }

    public function create()
    {

        return view('dashboard.nasabah.nasabah-create');
    }


    public function store(Request $request)
    {
       
          
        //    dd($request->all());
            Nasabah::updateOrCreate(
                ['id_nasabah' => $request->id_nasabah],
                [
                    'nama' => $request->nama,
                    'noIdentitas' => $request->noIdentitas,
                    'TTL' => $request->TTL,
                    'jenisKelamin' => $request->jenisKelamin,
                    'agama' => $request->agama,
                    'pekerjaan' => $request->pekerjaan,
                    'pendidikan' => $request->pendidikan,
                    'noHp' => $request->noHp,
                    'alamat' => $request->alamat,
                    'kelurahan' => $request->kelurahan,
                    'kecamatan' => $request->kecamatan,
                    'provinsi' => $request->provinsi,
                    'id_user' => 1
                ]
            );

           return redirect()->route('nasabah');
       
    }


    public function show($id)
    {
        $nasabah = Nasabah::find($id);

        return view('dashboard.nasabah.nasabah-show',compact('nasabah'));
    }


    public function edit($id)
    {
        $nasabah = Nasabah::find($id);

        return view('dashboard.nasabah.nasabah-edit',compact('nasabah'));
    }


    public function update($id,Request $request)
    {
        $nasabah = Nasabah::find($id);
        // dd($request->all());

        $nasabahAttribute = [];

        $nasabahAttribute['nama'] = $request->nama;
        // $pembiayaanAttribute['id_nasabah'] = $request->id_nasabah;
        $nasabahAttribute['noIdentitas'] = $request->noIdentitas;
        $nasabahAttribute['TTL'] = $request->TTL;
        $nasabahAttribute['jenisKelamin'] = $request->jenisKelamin;
        $nasabahAttribute['agama'] = $request->agama;
        $nasabahAttribute['pekerjaan'] = $request->pekerjaan;
        $nasabahAttribute['pendidikan'] = $request->pendidikan;
        $nasabahAttribute['noHp'] = $request->noHp;
        $nasabahAttribute['alamat'] = $request->alamat;
        $nasabahAttribute['kelurahan'] = $request->kelurahan;
        $nasabahAttribute['kecamatan'] = $request->kecamatan;
        $nasabahAttribute['provinsi'] = $request->provinsi;
        $nasabahAttribute['id_user'] = $request->id_user;

        $nasabah->update($nasabahAttribute);

        return redirect()->route('nasabah');
    }


    public function destroy($id)
    {
        
        $nasabah = Nasabah::find($id);
        $nasabah->delete();

        return redirect()->route('nasabah');
    }
}
