@extends('layouts.app')

@section('title', 'Video Rekaman – Sahabat Ilmu PMI')

@section('content')
<div class="pt-24 pb-20 px-[5%]">
    {{-- Header --}}
    <div class="mb-12">
        <span class="inline-block bg-teal/10 text-teal px-3.5 py-1 rounded-full text-xs font-semibold tracking-wider uppercase mb-3.5">🎥 Video Rekaman</span>
        <h1 class="font-serif text-[clamp(28px,4vw,44px)] text-body leading-tight mb-3.5">Galeri <span class="text-teal">Video</span></h1>
        <p class="text-[15px] text-muted leading-relaxed max-w-[560px]">Rekaman kajian dan ceramah yang bisa ditonton ulang kapan saja.</p>
    </div>

    {{-- Video Grid --}}
    @if($videos->count())
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($videos as $video)
        <a href="{{ route('videos.show', $video) }}" class="bg-white border border-cream-dark rounded-2xl overflow-hidden hover:-translate-y-1 hover:shadow-lg transition-all no-underline group">
            <div class="relative h-48 bg-gray-900 overflow-hidden">
                <img src="{{ $video->thumbnail ?? 'https://img.youtube.com/vi/' . $video->youtube_id . '/maxresdefault.jpg' }}" alt="{{ $video->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300 opacity-80">
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-14 h-14 rounded-full bg-white/90 flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                        <span class="text-teal text-2xl ml-1">▶</span>
                    </div>
                </div>
                @if($video->duration_minutes)
                <span class="absolute bottom-2 right-2 bg-black/70 text-white text-[11px] px-2 py-0.5 rounded">{{ $video->duration_minutes }} menit</span>
                @endif
            </div>
            <div class="p-5">
                <span class="inline-block bg-teal/10 text-teal px-2 py-0.5 rounded text-[11px] font-semibold uppercase tracking-wider mb-2">{{ $video->category }}</span>
                <h3 class="font-serif text-body group-hover:text-teal transition-colors">{{ $video->title }}</h3>
                <p class="text-[12px] text-muted mt-2">{{ $video->published_at?->format('d M Y') }} • {{ $video->views }} views</p>
            </div>
        </a>
        @endforeach
    </div>

    <div class="mt-10">
        {{ $videos->links() }}
    </div>
    @else
    <div class="text-center py-20">
        <div class="text-6xl mb-4">🎥</div>
        <h3 class="font-serif text-2xl text-body mb-2">Belum Ada Video</h3>
        <p class="text-muted">Video rekaman kajian akan segera tersedia.</p>
        <a href="https://youtube.com/@kajianfauzanakbar" target="_blank" class="inline-block mt-6 bg-red-600 text-white px-6 py-3 rounded-lg text-sm font-bold no-underline hover:bg-red-700 transition-colors">
            ▶️ Kunjungi YouTube Channel
        </a>
    </div>
    @endif
</div>
@endsection
