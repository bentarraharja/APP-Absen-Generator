<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;

class DataKelasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['dataKelas'] = Kelas::orderBy('created_at', 'DESC')->get();
        return view('backend.dataKelas.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.dataKelas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = Kelas::create($request->all());
        if (!$store) {
            return redirect()->route('createDataKelas')->with('error', 'Data Added Failed.');
        }
        return redirect()->route('indexDataKelas')->with('success', 'Data Added Success.');
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
        $data['edit'] = Kelas::find($id);
        if (!$data['edit']) {
            return redirect()->route('indexDataKelas')->with('error', 'Data Kelas Not Found.');
        }

        return view('backend.dataKelas.edit', $data);
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
        $update = Kelas::updateOrCreate(['id' => $id], $request->all());
        if (!$update) {
            return redirect()->back()->with('error', 'Data Not Found!.');
        }
        return redirect()->route('indexDataKelas')->with('success', 'Data Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Kelas::find($id);
        if (!$destroy) {
            return redirect()->route('indexDataKelas')->with('error', 'Data Not Found.');
        }

        $destroy->delete();
        if (!$destroy) {
            return redirect()->route('indexDataKelas')->with('error', 'Data Cannot Be Deleted.');
        }

        return redirect()->route('indexDataKelas')->with('success', 'Data Has Been Deleted.');
    }
}
