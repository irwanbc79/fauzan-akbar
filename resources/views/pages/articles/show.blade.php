@extends('layouts.app')

@section('title', $article->title . ' – Sahabat Ilmu PMI')

@section('content')
<article class="pt-24 pb-20 px-[5%]">
    <div class="max-w-3xl mx-auto">
        {{-- Breadcrumb --}}
        <div class="flex items-center gap-2 text-[13px] text-muted mb-8">
            <a href="{{ route('home') }}" class="hover:text-teal transition-colors no-underline text-muted">Beranda</a>
            <span>/</span>
            <a href="{{ route('articles.index') }}" class="hover:text-teal transition-colors no-underline text-muted">Artikel</a>
            <span>/</span>
            <span class="text-body font-medium">{{ Str::limit($article->title, 40) }}</span>
        </div>

        {{-- Category --}}
        <span class="inline-block bg-teal/10 text-teal px-3 py-1 rounded-full text-[11px] font-semibold uppercase tracking-wider mb-4">{{ $article->category }}</span>

        {{-- Title --}}
        <h1 class="font-serif text-[clamp(28px,5vw,48px)] text-body leading-tight mb-4">{{ $article->title }}</h1>

        {{-- Meta --}}
        <div class="flex items-center gap-4 text-[13px] text-muted mb-8 pb-8 border-b border-cream-dark">
            <span>👤 {{ $article->author }}</span>
            <span>•</span>
            <span>📅 {{ $article->published_at?->format('d M Y') }}</span>
            <span>•</span>
            <span>⏱️ {{ $article->reading_time }} menit baca</span>
            <span>•</span>
            <span>👁️ {{ $article->views }} kali baca</span>
        </div>

        {{-- Featured Image --}}
        @if($article->featured_image)
        <div class="rounded-2xl overflow-hidden mb-10">
            <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}" class="w-full">
        </div>
        @endif

        {{-- Content --}}
        <div class="prose prose-lg max-w-none text-body leading-relaxed
            prose-headings:font-serif prose-headings:text-body
            prose-a:text-teal prose-a:no-underline hover:prose-a:underline
            prose-blockquote:border-l-teal prose-blockquote:bg-cream prose-blockquote:py-1 prose-blockquote:px-4 prose-blockquote:rounded-r-lg">
            {!! $article->content !!}
        </div>

        {{-- Share --}}
        <div class="mt-12 pt-8 border-t border-cream-dark">
            <p class="text-[13px] font-semibold text-body mb-3">Bagikan artikel ini:</p>
            <div class="flex gap-2.5">
                <a href="https://wa.me/?text={{ urlencode($article->title . ' ' . url()->current()) }}" target="_blank"
                   class="bg-green-500/10 text-green-700 px-4 py-2 rounded-lg text-sm font-medium hover:bg-green-500/20 transition-colors no-underline">
                    💬 WhatsApp
                </a>
                <a href="https://t.me/share/url?url={{ urlencode(url()->current()) }}&text={{ urlencode($article->title) }}" target="_blank"
                   class="bg-blue-500/10 text-blue-700 px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-500/20 transition-colors no-underline">
                    ✈️ Telegram
                </a>
            </div>
        </div>

        {{-- Related --}}
        @if($related->count())
        <div class="mt-16">
            <h3 class="font-serif text-2xl text-body mb-6">Artikel Terkait</h3>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                @foreach($related as $rel)
                <a href="{{ route('articles.show', $rel) }}" class="bg-cream border border-cream-dark rounded-xl p-5 hover:-translate-y-1 transition-all no-underline group">
                    <span class="text-[11px] font-semibold text-teal uppercase tracking-wider">{{ $rel->category }}</span>
                    <h4 class="font-serif text-body mt-2 group-hover:text-teal transition-colors">{{ $rel->title }}</h4>
                    <p class="text-[12px] text-muted mt-2">{{ $rel->published_at?->format('d M Y') }}</p>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</article>
@endsection
