<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inventory.produk');
    }

    public function table_produk()
    {
        $data = DB::table('tbl_produks')->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '<a href="javascript:void(0)"  onClick="edit(' . $row->id_produk . ')"   class="edit btn btn-primary btn-sm ">Edit</a>';
                $btn = $btn . ' <a href="javascript:void(0)"   onClick="deleteRow(' . $row->id_produk . ')"  class="btn btn-danger btn-sm ">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $kategoris = DB::table('tbl_kategoris')->get();
        // $kategori = DB::table('tbl_kategoris')->

        $data = ([
            ['id_kategori' => $request->id_kategori],
            ['kode_produk' => $request->kode_produk],
            ['nama_produk' => $request->nama_produk]
        ]);
        if ($request->produk == 'add') {
            DB::table('tbl_produks')->insert(
                $data
            );
        } else if ($request->produk == 'edit') {
            DB::table('tbl_produks')->where('id_produk', $request->id)->update(
                $data
            );
        }
        return response()->json(['success' => 'berhasil']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('tbl_produks')->where('id_produk', $id)->first();
        return response()->json($data);
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tbl_produks')->where('id_produk', $id)->delete();
        return response()->json(['success' => 'berhasil']);
    }
}
