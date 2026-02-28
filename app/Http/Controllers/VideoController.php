<?php

namespace App\Http\Controllers;

use App\Models\Video;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::published()
            ->latest('published_at')
            ->paginate(12);

        return view('pages.videos.index', compact('videos'));
    }

    public function show(Video $video)
    {
        abort_unless($video->is_published, 404);

        $video->increment('views');

        return view('pages.videos.show', compact('video'));
    }
}
