<?php

namespace App\Http\Controllers;

use App\Mail\RegistrationConfirmation;
use App\Mail\RegistrationNotification;
use App\Models\Registration;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email:rfc', 'max:150'],
            'phone' => ['required', 'string', 'max:25'],
            'institution' => ['required', 'string', 'max:150'],
            'category' => ['required', 'in:web_design,ui_ux,programming'],
            'motivation' => ['required', 'string', 'min:20', 'max:1000'],
        ], [
            'required' => 'Kolom :attribute wajib diisi.',
            'email.email' => 'Masukkan alamat email yang valid.',
            'category.in' => 'Pilih kategori yang tersedia.',
            'motivation.min' => 'Motivasi minimal 20 karakter.',
        ]);

        $registration = Registration::create($validated);

        Mail::to($registration->email)->send(new RegistrationConfirmation($registration));
        Mail::to(config('mail.from.address'))->send(new RegistrationNotification($registration));

        return to_route('registration.create')
            ->with('success', 'Pendaftaran berhasil! Detail pendaftaran sudah dikirim ke email kamu.');
    }
}
