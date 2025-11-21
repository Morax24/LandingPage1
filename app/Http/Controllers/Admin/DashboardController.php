<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Media;
use App\Models\ForumReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik Kontak
        $totalContacts = Contact::count();
        $pendingContacts = Contact::where('status', 'pending')->count();
        $approvedContacts = Contact::where('status', 'approved')->count();
        $rejectedContacts = Contact::where('status', 'rejected')->count();

        // Statistik Media - PERBAIKAN: gunakan file_size bukan size
        $totalMedia = Media::count();
        $totalMediaSize = Media::sum('file_size');
        $inactiveMedia = Media::where('is_active', 0)->count(); // PERBAIKAN: 0 bukan false

        // Statistik Balasan Forum
        $pendingReplies = ForumReply::where('status', 'pending')->count();

        // Aktivitas Terbaru
        $recentActivities = $this->getRecentActivities();

        // Kontak Terbaru
        $recentContacts = Contact::latest()->take(5)->get();

        // Media Terbaru
        $recentMedia = Media::latest()->take(5)->get();

        $stats = [
            'total_contacts' => $totalContacts,
            'pending_contacts' => $pendingContacts,
            'approved_contacts' => $approvedContacts,
            'rejected_contacts' => $rejectedContacts,
            'total_media' => $totalMedia,
            'total_media_size' => $totalMediaSize,
            'inactive_media' => $inactiveMedia, // PASTIKAN INI ADA
            'pending_replies' => $pendingReplies,
        ];

        return view('admin.dashboard', compact('stats', 'recentActivities', 'recentContacts', 'recentMedia'));
    }

    private function getRecentActivities()
    {
        $activities = [];

        // Ambil kontak terbaru
        $recentContacts = Contact::latest()->take(3)->get();
        foreach ($recentContacts as $contact) {
            $activities[] = [
                'type' => 'contact',
                'title' => 'Pesan baru dari ' . $contact->name,
                'time' => $contact->created_at->diffForHumans()
            ];
        }

        // Ambil media terbaru
        $recentMedia = Media::latest()->take(2)->get();
        foreach ($recentMedia as $media) {
            $activities[] = [
                'type' => 'media',
                'title' => 'Media diupload: ' . Str::limit($media->title, 20),
                'time' => $media->created_at->diffForHumans()
            ];
        }

        // Ambil balasan forum terbaru
        $recentReplies = ForumReply::latest()->take(2)->get();
        foreach ($recentReplies as $reply) {
            $activities[] = [
                'type' => 'reply',
                'title' => 'Balasan forum baru',
                'time' => $reply->created_at->diffForHumans()
            ];
        }

        // Urutkan berdasarkan waktu (yang terbaru pertama)
        usort($activities, function($a, $b) {
            return strtotime($b['time']) - strtotime($a['time']);
        });

        // Ambil hanya 5 aktivitas terbaru
        return array_slice($activities, 0, 5);
    }

    // Untuk debugging - tambahkan method ini
    public function debug()
    {
        $totalMedia = Media::count();
        $inactiveMedia = Media::where('is_active', 0)->count();
        $activeMedia = Media::where('is_active', 1)->count();

        $allMedia = Media::select('id', 'title', 'is_active')->get();

        return response()->json([
            'total_media' => $totalMedia,
            'inactive_media' => $inactiveMedia,
            'active_media' => $activeMedia,
            'all_media' => $allMedia
        ]);
    }
}
