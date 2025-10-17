<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Media;
use App\Http\Requests\StoreContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Tampilkan halaman landing dengan stats, testimonial, dan media (hero, background, features, aktivitas)
     *
     * Route: GET /
     * View: resources/views/landing.blade.php
     */
    public function index()
    {
        // --- Statistik umum ---
        $totalInstitutions = Contact::whereNotNull('institution')
                                   ->where('institution', '!=', '')
                                   ->distinct('institution')
                                   ->count('institution');

        $approvedContacts = Contact::approved()->count();

        $stats = [
            'satisfaction' => 85,
            'schools' => max($totalInstitutions, 50),
            'students' => max($approvedContacts, 80),
            'understanding' => 87,
        ];

        // --- Testimonial (dengan replies) ---
        $testimonials = Contact::approved()
                              ->with('replies')
                              ->whereNotNull('message')
                              ->where('message', '!=', '')
                              ->latest('approved_at')
                              ->limit(6)
                              ->get();

        // --- Media Section: Hero ---
        $heroMedia = Media::active()
                         ->forSection('hero')
                         ->ordered()
                         ->first();

        // --- Media Section: Background ---
        $backgroundMedia = Media::active()
                               ->forSection('background')
                               ->ordered()
                               ->first();

        // --- Media Section: Features (maks 4 item) ---
        $featuresMedia = Media::active()
                             ->forSection('features')
                             ->ordered()
                             ->take(4)
                             ->get();

        // --- Media Section: Aktivitas (maks 6 item) ---
        $aktivitasMedia = Media::active()
                              ->forSection('aktivitas')
                              ->ordered()
                              ->take(6)
                              ->get();

        // --- Kirim semua data ke view landing.blade.php ---
        return view('landing', compact(
            'stats',
            'testimonials',
            'heroMedia',
            'backgroundMedia',
            'featuresMedia',
            'aktivitasMedia'
        ));
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
            $contact = Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'institution' => $request->institution,
                'message' => $request->message,
                'status' => 'pending', // Default status pending
            ]);

            Log::info('New contact message received', [
                'contact_id' => $contact->id,
                'name' => $contact->name,
                'email' => $contact->email,
            ]);

            return redirect()
                ->back()
                ->with('success', 'Terima kasih! Pesan Anda telah terkirim dan akan ditinjau oleh admin.');

        } catch (\Exception $e) {
            Log::error('Failed to save contact message', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Maaf, terjadi kesalahan. Silakan coba lagi.');
        }
    }

    /**
     * Tampilkan daftar contact yang approved
     *
     * Route: GET /contact/approved
     * View: resources/views/contact/approved.blade.php
     */
    public function approved()
    {
        $contacts = Contact::approved()
                          ->with('approver')
                          ->latest('approved_at')
                          ->paginate(15);

        return view('contact.approved', compact('contacts'));
    }
}
