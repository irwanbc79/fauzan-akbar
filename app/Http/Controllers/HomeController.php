<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Download;
use App\Models\KajianSchedule;
use App\Models\Question;
use App\Models\RoadmapPhase;
use App\Models\TeamMember;
use App\Models\Video;

class HomeController extends Controller
{
    public function index()
    {
        $schedules = KajianSchedule::active()->orderBy('sort_order')->get();
        $articles = Article::published()->latest('published_at')->take(6)->get();
        $videos = Video::published()->latest('published_at')->take(4)->get();
        $downloads = Download::active()->latest()->take(6)->get();
        $team = TeamMember::active()->get();
        $roadmap = RoadmapPhase::ordered()->get();

        $stats = [
            'jamaah' => '150+',
            'kajian' => KajianSchedule::count() ?: '5',
            'artikel' => Article::published()->count() ?: '20+',
            'video' => Video::published()->count() ?: '30+',
            'unduhan' => Download::active()->count() ?: '10+',
        ];

        return view('pages.home', compact(
            'schedules', 'articles', 'videos', 'downloads', 'team', 'roadmap', 'stats'
        ));
    }
}
