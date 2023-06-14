<?php

namespace App\Http\Controllers;

use App\Models\TiketModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class TiketController extends Controller
{
    public function generateTicketID()
    {
        return Str::random(10); // Menghasilkan string acak sepanjang 10 karakter
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('halo');
        $tiket = TiketModel::all();
        return view('v_admin', compact('tiket'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
        ]);

        $tiket = TiketModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'ticket_id' => $this->generateTicketID(),
        ]);

        // return redirect()->route('project')->with('pesan', 'Data added successfully');

        return redirect()->route('tiket', $tiket->id)->with('success', 'Tiket berhasil dipesan.');
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
        $tiket = TiketModel::findOrFail($id);
        $tiket = TiketModel::where('is_checked_in', 0)->update(['is_checked_in' => 1]);
        return redirect()->route('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tiket = TiketModel::findOrFail($id);
        $tiket->delete();

        return redirect()->route('admin')->with('success', 'Data tiket berhasil dihapus.');
    }

}
