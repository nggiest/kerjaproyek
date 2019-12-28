<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwallab;
use App\Hari;
use DB;
use Validator;

class JadwallabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwallab = Jadwallab::all();
        return view('jadwallabs.index', compact('jadwallab'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jadwallab = Jadwallab::all();
        $this->validate($request, [
            'jenis_barang' => 'required|string|min:2|max:128',
            'jumlah' => 'required',
        ]);

       $inventaris =  Inventaris::create([
            'jenis_barang' => $request['jenis_barang'],
            'jumlah' => $request['jumlah'],
            'update_by' => $request['update_by'],
            ]);
            
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
