<?php

namespace App\Http\Controllers;

use App\Models\Download;

class DownloadController extends Controller
{
    public function index()
    {
        $downloads = Download::active()->latest()->paginate(12);

        return view('pages.downloads.index', compact('downloads'));
    }

    public function download(Download $download)
    {
        $download->incrementDownload();

        return response()->download(storage_path('app/public/' . $download->file_path));
    }
}
