<?php
// app/Http/Controllers/ForumReplyController.php

namespace App\Http\Controllers;

use App\Models\ForumReply;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ForumReplyController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'contact_id' => 'required|exists:contacts,id',
            'parent_id' => 'nullable|exists:forum_replies,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:10'
        ]);

        try {
            DB::beginTransaction();

            $reply = ForumReply::create($validated);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Komentar berhasil dikirim dan menunggu persetujuan admin',
                'data' => $reply
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getReplies($contactId)
    {
        $replies = ForumReply::with(['replies' => function($query) {
            $query->where('status', 'approved');
        }])
        ->where('contact_id', $contactId)
        ->whereNull('parent_id')
        ->where('status', 'approved')
        ->orderBy('created_at', 'desc')
        ->get();

        return response()->json([
            'success' => true,
            'data' => $replies
        ]);
    }
}
