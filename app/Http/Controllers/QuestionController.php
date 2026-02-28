<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email_or_whatsapp' => 'required|string|max:255',
            'question' => 'required|string|max:2000',
        ]);

        Question::create($validated);

        return back()->with('success', 'Pertanyaan Anda berhasil dikirim. Jazakallahu khairan!');
    }
}
