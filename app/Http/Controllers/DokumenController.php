<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Models\Arsip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumenController extends Controller
{
    public function arsip()
    {
        $datas = Arsip::latest()->get();
        return view('admin.arsip.arsip', compact(['datas']));
    }
    public function create()
    {
        return view('admin.arsip.tambaharsip');
    }
    public function store(Request $request)
    {

        $this->validate($request, rules: [
            'nip' => 'required|unique:arsips,nip',
            'nama' => 'required',
            'dokumen' => 'required|mimes:pdf|max:2048',
        ], messages: [
            'nip.unique' => 'NIP sudah digunakan',
        ]);

        //upload file :
        $dokumen = $request->file('dokumen');
        $file_dokumen = $dokumen->getClientOriginalName();
        $path = 'dokumen/' . $file_dokumen;
        Storage::disk('public')->put($path, file_get_contents($dokumen));



        Arsip::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'dokumen' => $file_dokumen,


        ]);
        return redirect('/arsip')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $data = Arsip::find($id)->first();
        return view('admin.arsip.editarsip', compact(['data']));
    }
    public function update(Request $request, $id)
    {

        $data = Arsip::where('id', $id)->first();

        $request->validate([
            'nip' => 'required', Rule::unique('arsips')->ignore('arsips'),
            'nama' => 'required',
            'dokumen' => 'mimes:pdf|max:2048',
        ]);

        if ($request->file('dokumen')) {
            //upload file :
            $dokumen = $request->file('dokumen');
            $file_dokumen = $dokumen->getClientOriginalName();
            $path = 'dokumen/' . $file_dokumen;
            Storage::disk('public')->put($path, file_get_contents($dokumen));

            Storage::disk('public')->delete('dokumen/' . $data->dokumen);
            //update:
            $data->update([
                'dokumen' => $file_dokumen,

            ]);
        } else {
            $data->update([
                'nip' => $request->nip,
                'nama' => $request->nama,

            ]);
        }
        return redirect('/arsip')->with('success', 'Data Berhasil Diubah');
    }
    public function destroy($id)
    {

        $data = Arsip::find($id)->first();
        Storage::disk('public')->delete('dokumen/' . $data->dokumen);
        $data->delete();
        return redirect('/arsip')->with('success', 'Data Berhasil Dihapus');
    }
    public function dokumen($id)
    {

        $data = Arsip::select(['dokumen'])->where('id', $id)->first();
        return view('admin.prev.dokumen', compact(['data']));
    }
}
