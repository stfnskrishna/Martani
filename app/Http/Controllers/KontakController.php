<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class KontakController extends Controller
{
    public function kirim(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'pesan' => 'required',
        ]);

        try {
            Mail::raw(
                "Pesan baru dari website Martani!\n\n" .
                "Nama: {$request->nama}\n" .
                "Email: {$request->email}\n" .
                "Telepon: {$request->telepon}\n\n" .
                "Pesan:\n{$request->pesan}",
                function($message) use ($request) {
                    $message->to(config('mail.from.address'))
                            ->subject('Pesan Baru dari ' . $request->nama . ' - Martani');
                }
            );
        } catch (\Exception $e) {
            // Silent fail
        }

        return redirect()->route('kontak')->with('success', 'Pesan berhasil dikirim. Kami akan segera menghubungi Anda.');
    }
}