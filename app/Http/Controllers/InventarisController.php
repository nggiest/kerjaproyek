<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventaris;
use App\User;
class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventaris = Inventaris::all();
        $inventaris = DB::table('inventaris')
                      ->join('users','users.id', '=', 'inventaris.upload_by' )
                      ->select('users.*','users.name as pengguna')
                      ->get();
        return view('inventaries.index', compact('inventaris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventaries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inventaris = Inventaris::all();
        $this->validate($request, [
            'jenis_barang' => 'required|string|min:2|max:128',
            'jumlah_barang' => 'required|integer',
        ]);

        Inventaris::create([
            'jenis_barang' => $request->jenis_barang,
            'jumlah_barang' => $request->jumlah_barang,
            'upload_by' => $request->upload_by,
        ]);

        return redirect()->route('inventaris.index');

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
        $inventaris = Inventaris::findOrFail($id);
        return view('inventaris.edit', compact('inventaris'));
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
        $inventaris = Inventaris::findOrFail($id);
        $this->validate($request, [
            'jenis_barang' => 'required|string|min:2|max:128',
            'jumlah_barang' => 'required|integer',
        ]);

        Inventaris::update([
            'jenis_barang' => $request->jenis_barang,
            'jumlah_barang' => $request->jumlah_barang,
            'upload_by' => $request->upload_by,
        ]);

        return redirect()->route('inventaris.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventaris = Inventaris::findOrFail($id);
        $inventaris->delete();
    }
}
