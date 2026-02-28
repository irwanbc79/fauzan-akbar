@extends('layouts.app')

@section('title', $video->title . ' – Sahabat Ilmu PMI')

@section('content')
<div class="pt-24 pb-20 px-[5%]">
    <div class="max-w-4xl mx-auto">
        {{-- Breadcrumb --}}
        <div class="flex items-center gap-2 text-[13px] text-muted mb-8">
            <a href="{{ route('home') }}" class="hover:text-teal transition-colors no-underline text-muted">Beranda</a>
            <span>/</span>
            <a href="{{ route('videos.index') }}" class="hover:text-teal transition-colors no-underline text-muted">Video</a>
            <span>/</span>
            <span class="text-body font-medium">{{ Str::limit($video->title, 40) }}</span>
        </div>

        {{-- Video Player --}}
        <div class="rounded-2xl overflow-hidden bg-black shadow-2xl mb-8">
            <div class="relative" style="padding-bottom: 56.25%;">
                <iframe src="{{ $video->embed_url }}" class="absolute inset-0 w-full h-full" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        {{-- Title & Meta --}}
        <span class="inline-block bg-teal/10 text-teal px-3 py-1 rounded-full text-[11px] font-semibold uppercase tracking-wider mb-4">{{ $video->category }}</span>
        <h1 class="font-serif text-[clamp(24px,4vw,40px)] text-body leading-tight mb-4">{{ $video->title }}</h1>

        <div class="flex items-center gap-4 text-[13px] text-muted mb-8">
            <span>📅 {{ $video->published_at?->format('d M Y') }}</span>
            @if($video->duration_minutes)
            <span>•</span>
            <span>⏱️ {{ $video->duration_minutes }} menit</span>
            @endif
            <span>•</span>
            <span>👁️ {{ $video->views }} views</span>
        </div>

        @if($video->description)
        <div class="bg-cream border border-cream-dark rounded-xl p-6 text-[14px] text-body leading-relaxed">
            {!! nl2br(e($video->description)) !!}
        </div>
        @endif

        {{-- Share --}}
        <div class="mt-8 flex gap-2.5">
            <a href="https://wa.me/?text={{ urlencode($video->title . ' ' . url()->current()) }}" target="_blank"
               class="bg-green-500/10 text-green-700 px-4 py-2 rounded-lg text-sm font-medium hover:bg-green-500/20 transition-colors no-underline">
                💬 Bagikan ke WhatsApp
            </a>
            <a href="{{ $video->youtube_url }}" target="_blank"
               class="bg-red-500/10 text-red-700 px-4 py-2 rounded-lg text-sm font-medium hover:bg-red-500/20 transition-colors no-underline">
                ▶️ Buka di YouTube
            </a>
        </div>
    </div>
</div>
@endsection
