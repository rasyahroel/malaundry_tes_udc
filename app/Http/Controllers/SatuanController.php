<?php

namespace App\Http\Controllers;

use App\Http\Requests\SatuanRequest;
use App\Models\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SatuanController extends Controller
{
    public function index()
    {
        $satuan = Satuan::get();
        return view('satuans', ['satuanList' => $satuan]);
    }

    public function create()
    {
        $satuan = Satuan::all();
        return view('satuans', ['satuan' => $satuan]);
    }

    public function store(SatuanRequest $request)
    {
        $satuan = Satuan::create($request->all());

        if ($satuan) {
            Session::flash('status', 'success');
            Session::flash('message', 'Add new satuan success');
        }

        return redirect('satuans');
    }

    public function edit(Request $request, $id)
    {
        $satuan = Satuan::findOrFail($id);
        return view('satuans', ['satuan' => $satuan]);
    }

    public function update(Request $request, $id)
    {
        $satuan = Satuan::findOrFail($id);
        $satuan->unit = $request->input('unit');
        $satuan->desc = $request->input('desc');
        $satuan->save();
        // $satuan->update($request->all());
        return redirect('satuans');
    }

    public function updateStatus($id)
    {
        $satuan = Satuan::findOrFail($id);

        $satuan->status = $satuan->status == 'Aktif' ? 'Nonaktif' : 'Aktif';
        $satuan->save();

        return redirect('satuans')->with('success', 'Status berhasil diubah.');
    }
}
