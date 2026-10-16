<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function __invoke(ContactRequest $request)
    {
        $data = $request->validated();
        // dd('validación OK', $data);

        if ($request->filled('website')) {
            return back()->with('success', 'Tu mensaje ha sido enviado correctamente. ¡Gracias por contactarnos!');
        }

        try {
            Mail::to(config('mail.contact_to'))
                ->send(new ContactMessage($data));
        } catch (\Throwable $e) {
            Log::error('Fallo al enviar el formulario de contacto', ['error' => $e->getMessage()]);
            // dd($e->getMessage(), $e->getFile(), $e->getLine());

            return back()
                ->withInput()
                ->withErrors(['send' => 'No hemos podido enviar tu mensaje. Inténtalo de nuevo más tarde.']);
        }

        return redirect()
        ->route('contact')
        ->with('success', 'Tu mensaje ha sido enviado correctamente. ¡Gracias por contactarnos!');
    }
}

