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

        $heroMedia = Media::where('section', 'hero')
        ->where('is_active', 1)
        ->orderBy('order')
        ->first();

    $storyMedia = Media::where('section', 'story')
        ->where('is_active', 1)
        ->orderBy('order')
        ->first();

    $whyLearnMedia = Media::where('section', 'why_learn')
        ->where('is_active', 1)
        ->orderBy('order')
        ->first();

    $featuresMedia = Media::where('section', 'features')
        ->where('is_active', 1)
        ->orderBy('order')
        ->take(4)
        ->get();

    $aktivitasMedia = Media::where('section', 'aktivitas')
        ->where('is_active', 1)
        ->orderBy('order')
        ->take(6)
        ->get();

    $testimonials = Contact::where('status', 'approved')
        ->latest()
        ->get();

    $stats = [
        'satisfaction' => 85,
        'schools' => 50,
        'students' => 80,
        'understanding' => 87
    ];

        // Return view with all data
        return view('landing', compact(
            'heroMedia',
        'storyMedia',
        'whyLearnMedia',
        'featuresMedia',
        'aktivitasMedia',
        'testimonials',
        'stats'
        ));
    }
}
