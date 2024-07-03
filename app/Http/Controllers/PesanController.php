<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function messageUser()
    {
        $user = Auth::user();
        $pesan = Pesan::where('user_id', $user->id)->get();

        return view('dashboard.user.index', compact('pesan'));
    }

    public function messageKepsek()
    {
        $user = Auth::user();
        $pesan = Pesan::where('user_id', $user->id)->get();

        return view('dashboard.kepsek.index', compact('pesan'));
    }

    public function destroy($id)
    {
        $pesan = Pesan::find($id);

        if ($pesan) {
            $pesan->delete();
            return redirect()->back()->with('success', 'Pesan berhasil dihapus');
        }

        return redirect()->back()->with('error', 'Pesan tidak ditemukan');
    }
}
