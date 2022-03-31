<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Code;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class KodeGeneratorController extends Controller
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
        //menggunakan ->join() untuk menggabungkan tabel lainnya
        //diakhir get() untuk mengambil data array
        //diakhir first() jika hanya satu data yang diambil
        $data['kodes'] = Code::orderBy('created_at', 'DESC')
            ->join('users', 'code.users_id', 'users.id')
            ->where('code.users_id', Auth::id())
            ->select('code.*', 'users.name')
            ->get();
        return view('backend.generator.index', $data);
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
    public function store($param)
    {
        $kode = Str::random(8);
        $store = Code::create(['code' => $kode, 'users_id' => Auth::id()]);
        if (!$store) {
            return redirect()->route('indexKode')->with('error', 'Kode Generator Failed.');
        }

        if ($param == 'frommodule') {
            return redirect()->route('indexKode')->with('success', 'Kode Generator Successfully = ' . $kode);
        } else {
            return redirect()->route('home')->with('success', 'Kode Generator Successfully = ' . $kode);
        }
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
