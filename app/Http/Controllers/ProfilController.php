<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use App\Http\Requests\ProfilRequest;
use Illuminate\Support\Facades\File;
class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Profil::all();
        return view('profil', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Profil;
        return view('form', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfilRequest $request)
    {
        $model = new Profil;
        $model->nama = $request->nama;
        $model->tempat_lahir = $request->tempat_lahir;
        $model->tgl_lahir = date_format(date_create($request->tgl_lahir),"Y-m-d");
        $model->jenis_kelamin = $request->jenis_kelamin;
        
        if($request->file('foto_profil')){
            $file = $request->file('foto_profil');
            $nama_file = time().str_replace(" ", "", $file->getClientOriginalName());
            $file->move('foto', $nama_file);
            $model->foto_profil = $nama_file;
        }
        $model->save();

        return redirect('profil')->with('success', "Data berhasil disimpan");
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
        $model = Profil::find($id);
        return view('form', compact(
            'model'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfilRequest $request, $id)
    {
        $model = Profil::find($id);
        $model->nama = $request->nama;
        $model->tempat_lahir = $request->tempat_lahir;
        $model->tgl_lahir = date_format(date_create($request->tgl_lahir),"Y-m-d");;
        $model->jenis_kelamin = $request->jenis_kelamin;
        
        if($request->file('foto_profil')){
            $file = $request->file('foto_profil');
            $nama_file = time().str_replace(" ", "", $file->getClientOriginalName());
            $file->move('foto', $nama_file);

            File::delete('foto/'.$model->foto_profil);
            $model->foto_profil = $nama_file;
        }
        $model->save();

        return redirect('profil')->with('success', "Data berhasil diperbaharui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Profil::find($id);
        $model->delete();
        return redirect('profil');
    }
}
