<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Media;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Display the landing page
     */
    public function index()
    {
        // Stats data
        $stats = [
            'satisfaction' => 85,
            'schools' => 50,
            'students' => 80,
            'understanding' => 87,
        ];

        // Get approved testimonials for Testimonial & Forum sections
        $testimonials = Contact::where('status', 'approved')
            ->latest()
            ->get();

        // Get media for Features section (max 4 slots)
        $featuresMedia = Media::where('section', 'features')
            ->where('is_active', true)
            ->orderBy('order', 'asc')
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        // Get media for Aktivitas section (max 6 slots)
        $aktivitasMedia = Media::where('section', 'aktivitas')
            ->where('is_active', true)
            ->orderBy('order', 'asc')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        // Get media for Hero section (only 1 - board game image)
        $heroMedia = Media::where('section', 'hero')
            ->where('is_active', true)
            ->orderBy('order', 'asc')
            ->first();

        // Get media for Story section (only 1 - background box image)
        $storyMedia = Media::where('section', 'story')
            ->where('is_active', true)
            ->orderBy('order', 'asc')
            ->first();

        // Return view with all data
        return view('landing', compact(
            'stats',
            'testimonials',
            'featuresMedia',
            'aktivitasMedia',
            'heroMedia',
            'storyMedia'
        ));
    }
}
