<?php

namespace App\Http\Controllers;

use App\Http\Requests\LaundryRequest;
use App\Models\Laundry;
use App\Models\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LaundryController extends Controller
{
    public function index()
    {
        $laundry = Laundry::with('satuan')->get();
        $satuan = Satuan::all();
        $filteredList = $laundry;
        return view('laundrys', ['filteredList' => $filteredList, 'satuan' => $satuan]);
    }

    public function create()
    {
        $laundry = Laundry::with('satuan')->all();
        $satuan = Satuan::select('id', 'unit')->get();
        return view('laundry-add', ['laundry' => $laundry, 'satuan' => $satuan]);
    }

    public function store(LaundryRequest $request)
    {
        $laundry = Laundry::create($request->all());

        if ($laundry) {
            Session::flash('status', 'success');
            Session::flash('message', 'Add new laundry success');
        }

        return redirect('/laundrys');
    }
    public function edit(Request $request, $id)
    {
        $laundry = Laundry::with('satuan')->findOrFail($id);
        $satuan = Satuan::where('id', '!=', $laundry->satuans_id)->get(['id', 'unit']);
        return view('laundry-edit', ['laundry' => $laundry, 'satuan' => $satuan]);
    }

    public function update(Request $request, $id)
    {
        $laundry = Laundry::with('satuan')->findOrFail($id);
        $laundry->update($request->all());
        return redirect('/laundrys');
    }

    public function updateStatus($id)
    {
        $laundry = Laundry::findOrFail($id);

        $laundry->status = $laundry->status == 'Aktif' ? 'Nonaktif' : 'Aktif';
        $laundry->save();

        return redirect('laundrys')->with('success', 'Status berhasil diubah.');
    }

    public function filter(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        if (!empty($start_date) && !empty($end_date)) {
            $filteredList = Laundry::whereDate('created_at', '>=', $start_date)
                ->whereDate('created_at', '<=', $end_date)
                ->get();
        } else {
            $filteredList = Laundry::all();
        }

        $satuan = Satuan::all();

        return view('laundrys', compact('filteredList', 'satuan'));
    }
}
