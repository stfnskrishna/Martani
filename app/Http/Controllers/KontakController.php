<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

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
            Http::withToken(config('services.resend.key'))
                ->post('https://api.resend.com/emails', [
                    'from' => config('mail.from.name') . ' <' . config('mail.from.address') . '>',
                    'to' => [config('services.resend.notify')],
                    'subject' => 'Pesan Baru dari ' . $request->nama . ' - Martani',
                    'text' => "Pesan baru dari website Martani!\n\n" .
                        "Nama: {$request->nama}\n" .
                        "Email: {$request->email}\n" .
                        "Telepon: {$request->telepon}\n\n" .
                        "Pesan:\n{$request->pesan}",
                ])->throw();
        } catch (\Throwable $e) {
            // Don't block the contact form on a mail failure, but log it.
            // \Throwable (not \Exception) so a missing class or config
            // issue logs instead of crashing the page.
            Log::error('Gagal mengirim email kontak: ' . $e->getMessage());
        }

        return redirect()->route('kontak')->with('success', 'Pesan berhasil dikirim. Kami akan segera menghubungi Anda.');
    }
}