@extends('layouts.app')

@section('title', 'Artikel Kajian – Sahabat Ilmu PMI')

@section('content')
<div class="pt-24 pb-20 px-[5%]">
    {{-- Header --}}
    <div class="mb-12">
        <span class="inline-block bg-teal/10 text-teal px-3.5 py-1 rounded-full text-xs font-semibold tracking-wider uppercase mb-3.5">📝 Artikel Kajian</span>
        <h1 class="font-serif text-[clamp(28px,4vw,44px)] text-body leading-tight mb-3.5">Kumpulan <span class="text-teal">Artikel</span></h1>
        <p class="text-[15px] text-muted leading-relaxed max-w-[560px]">Ringkasan materi kajian dan tulisan islami yang bisa dibaca kapan saja.</p>
    </div>

    {{-- Article Grid --}}
    @if($articles->count())
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($articles as $article)
        <a href="{{ route('articles.show', $article) }}" class="bg-white border border-cream-dark rounded-2xl overflow-hidden hover:-translate-y-1 hover:shadow-lg transition-all no-underline group">
            @if($article->featured_image)
            <div class="h-48 bg-cream-dark overflow-hidden">
                <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
            </div>
            @else
            <div class="h-48 bg-gradient-to-br from-teal-dark to-teal flex items-center justify-center">
                <span class="text-5xl opacity-30">📝</span>
            </div>
            @endif
            <div class="p-6">
                <span class="inline-block bg-teal/10 text-teal px-2.5 py-0.5 rounded text-[11px] font-semibold uppercase tracking-wider mb-3">{{ $article->category }}</span>
                <h3 class="font-serif text-lg text-body mb-2 group-hover:text-teal transition-colors">{{ $article->title }}</h3>
                <p class="text-[13px] text-muted leading-relaxed line-clamp-2">{{ $article->excerpt }}</p>
                <div class="flex items-center gap-3 mt-4 text-[12px] text-muted">
                    <span>👤 {{ $article->author }}</span>
                    <span>•</span>
                    <span>{{ $article->published_at?->format('d M Y') }}</span>
                    <span>•</span>
                    <span>{{ $article->reading_time }} min</span>
                </div>
            </div>
        </a>
        @endforeach
    </div>

    <div class="mt-10">
        {{ $articles->links() }}
    </div>
    @else
    <div class="text-center py-20">
        <div class="text-6xl mb-4">📝</div>
        <h3 class="font-serif text-2xl text-body mb-2">Belum Ada Artikel</h3>
        <p class="text-muted">Artikel kajian akan segera tersedia. Nantikan ya!</p>
    </div>
    @endif
</div>
@endsection
