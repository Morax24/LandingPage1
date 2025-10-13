<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Tampilkan halaman landing dengan stats & testimonial realtime
     *
     * Route: GET /
     * View: resources/views/landing.blade.php
     */
    public function index()
    {
        // Hitung jumlah institusi/sekolah unik dari database
        $totalInstitutions = Contact::whereNotNull('institution')
                                   ->where('institution', '!=', '')
                                   ->distinct('institution')
                                   ->count('institution');

        // Hitung jumlah contact yang sudah approved
        $approvedContacts = Contact::approved()->count();

        // Statistik untuk landing page
        $stats = [
            'satisfaction' => 85, // Static - bisa diubah manual
            'schools' => max($totalInstitutions, 50), // Minimal tampilkan 50
            'students' => max($approvedContacts, 1000), // Minimal tampilkan 1000
            'understanding' => 87, // Static - bisa diubah manual
        ];

        // Ambil testimonial dari contact yang approved
        // Maksimal 6 testimonial terbaru
        $testimonials = Contact::approved()
                              ->whereNotNull('message')
                              ->where('message', '!=', '')
                              ->latest('approved_at')
                              ->limit(6)
                              ->get();

        // Kirim data ke view
        return view('landing', compact('stats', 'testimonials'));
    }

    /**
     * Simpan pesan contact dari form
     *
     * Route: POST /contact
     * Form Request: App\Http\Requests\StoreContactRequest
     */
    public function store(StoreContactRequest $request)
{
    try {
        $contact = Contact::create($request->validated());

        Log::info('New contact message received', [
            'contact_id' => $contact->id,
            'name' => $contact->name,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Terima kasih! Pesan Anda telah terkirim dan akan ditinjau oleh admin.');

    } catch (\Exception $e) {
        Log::error('Failed to save contact message', [
            'error' => $e->getMessage(),
        ]);

        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Maaf, terjadi kesalahan. Silakan coba lagi.');
    }

            // Log untuk debugging
            Log::info('New contact message received', [
                'contact_id' => $contact->id,
                'name' => $contact->name,
                'email' => $contact->email,
            ]);

            // Redirect kembali dengan success message
            return redirect()
                ->back()
                ->with('success', 'Terima kasih! Pesan Anda telah terkirim dan akan ditinjau oleh admin.');

        } catch (\Exception $e) {
            // Log error
            Log::error('Failed to save contact message', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            // Redirect kembali dengan error message
            return redirect()
                ->back()
                ->withInput() // Kembalikan input user
                ->with('error', 'Maaf, terjadi kesalahan. Silakan coba lagi.');
        }
    }

    /**
     * Tampilkan daftar contact yang approved (Optional)
     *
     * Route: GET /contact/approved
     * View: resources/views/contact/approved.blade.php
     */
    public function approved()
    {
        // Ambil semua contact yang approved dengan pagination
        $contacts = Contact::approved()
                          ->with('approver') // Eager load approver relationship
                          ->latest('approved_at')
                          ->paginate(15);

        return view('contact.approved', compact('contacts'));
    }
}
