<?php

namespace App\Http\Controllers;

use App\Models\Crud_pegawai;
use Illuminate\Http\Request;
use DataTables;

class Crud_pegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(Request $request)
    {
        $this->view    = 'crud';
        $this->request = $request;
    }

    public function index()
    {
        return view($this->view . '.index', [
            'title' => 'Data Pegawai'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view($this->view . '.form_add', ['title' => 'Tambah data']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
        // dd($this->request->all());
        try {
            $d = new Crud_pegawai;
            $d->nip = $this->request->nip;
            $d->nama = $this->request->nama;
            $d->divisi = $this->request->divisi;
            $d->save();

            return response()->json([
                'status' => 1, 'msg' => 'data berhasil di tambahkan'
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status' => 1, 'msg' => 'data berhasil' . $th
            ]);
        }
    }


    public function Api()
    {

        $data = Crud_pegawai::get();
        return DataTables::of($data)
            ->editColumn('id', function ($p) {
                return "<input type='checkbox' name='cbox[]' value='" . $p->nip . "' />";
            })
            ->editColumn('action', function ($p) {
                return  '<a href="" class="btn btn-warning btn-xs" id="edit" data-id="' . $p->nip . '"><i class="fa fa-edit"></i>Edit </a> ';
            }, true)
            ->editColumn('gambar', function ($p) {
                return '<img src="' . asset('file/gambar/' . $p->img) . '" alt="..."
                                                    onerror="this.onerror=null;this.src=\'' . asset('assets/img/profile.jpg') . '\';"
                                                    id="img" style="width:100px;height:100px">';
            }, true)
            ->addIndexColumn()
            ->rawColumns(['usercreate', 'gambar', 'action', 'id'])
            ->toJson();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $d = Crud_pegawai::where('nip', $id)->firstOrFail();

        return view($this->view . '.form_edit', [
            'title' => 'Edit data',
            'id' => $d->nip,
            'nip' => $d->nip,
            'divisi' => $d->divisi,
            'nama' => $d->nama,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
        try {
            $d = Crud_pegawai::where('nip', $id)->update([
                'nip' => $this->request->nip,
                'divisi' => $this->request->divisi,
                'nama' => $this->request->nama

            ]);

            return response()->json([
                'status' => 1, 'msg' => 'data berhasil di tambahkan'
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status' => 1, 'msg' => 'data berhasil' . $th
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            if (is_array($this->request->id)) {
                Crud_pegawai::whereIn('nip', $this->request->id)->delete();
            } else {
                Crud_pegawai::where('nip', $this->request->id)->delete();
                return response()->json([
                    'status' => 1, 'msg' => 'data berhasil di hapus'
                ]);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status' => 1, 'msg' => 'gagal' . $th
            ], 500);
        }
    }
}
