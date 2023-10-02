<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    public function pegawai()
    {
        $datas = Pegawai::latest()->get();
        return view('admin.pegawai.pegawai', compact(['datas']));
    }
    public function create()
    {
        return view('admin.pegawai.tambahpegawai');
    }
    public function store(Request $request)
    {
        $this->validate($request, rules: [
            'nip' => 'required|unique:pegawais,nip',
            'nama' => 'required',
            'jabatan' => 'required',
            'golongan' => 'required',
            'eselon' => 'required',
            'file' => 'required|mimes:jpeg,jpg,png|max:2048',
        ], messages: [
            'nip.unique' => 'NIP sudah digunakan',
            'file.mimes' => 'Format foto harus jpeg,jpg,png'
        ]);
        //upload image:
        $foto = $request->file('file');
        $foto->storeAs('public/foto_pegawai', $foto->hashName());
        Pegawai::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'golongan' => $request->golongan,
            'eselon' => $request->eselon,
            'file' => $foto->hashName(),
        ]);
        return redirect('/pegawai')->with('success', 'Data Berhasil Ditambahkan');
    }
    public function edit($id)
    {
        $data = Pegawai::find($id)->first();
        return view('admin.pegawai.editpegawai', compact(['data']));
    }
    public function update(Request $request, $id)
    {
        $data = Pegawai::where('id', $id)->first();
        $request->validate([
            'nip' => 'required', Rule::unique('pegawais')->ignore('pegawais'),
            'nama' => 'required',
            'jabatan' => 'required',
            'golongan' => 'required',
            'eselon' => 'required',
            'file' => 'mimes:jpeg,jpg,png|max:2048',
        ]);
        if ($request->file('file')) {
            //upload image:
            $foto = $request->file('file');
            $foto->storeAs('public/foto_pegawai', $foto->hashName());

            //hapus foto lama dari storage:
            Storage::disk('public')->delete('foto_pegawai/' . $data->file);
            //update:
            $data->update([
                'nip' => $request->nip,
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'golongan' => $request->golongan,
                'eselon' => $request->eselon,
                'file' => $foto->hashName(),

            ]);
        } else {
            $data->update([
                'nip' => $request->nip,
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'golongan' => $request->golongan,
                'eselon' => $request->eselon,
            ]);
        }
        return redirect('/pegawai')->with('success', 'Data Berhasil Diubah');
    }
    public function destroy($id)
    {

        $data = Pegawai::find($id)->first();
        Storage::disk('public')->delete('foto_pegawai/' . $data->file);
        $data->delete();
        return redirect('/pegawai')->with('success', 'Data Berhasil Dihapus');
    }
}
