@extends('layouts.app')

@section('title', 'Pusat Unduhan – Sahabat Ilmu PMI')

@section('content')
<div class="pt-24 pb-20 px-[5%]">
    {{-- Header --}}
    <div class="mb-12">
        <span class="inline-block bg-teal/10 text-teal px-3.5 py-1 rounded-full text-xs font-semibold tracking-wider uppercase mb-3.5">📥 Pusat Unduhan</span>
        <h1 class="font-serif text-[clamp(28px,4vw,44px)] text-body leading-tight mb-3.5">E-Book & <span class="text-teal">Modul</span></h1>
        <p class="text-[15px] text-muted leading-relaxed max-w-[560px]">Koleksi materi kajian, modul fiqih, dan e-book islami dalam format PDF.</p>
    </div>

    @if($downloads->count())
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($downloads as $download)
        <div class="bg-white border border-cream-dark rounded-2xl p-6 hover:-translate-y-1 hover:shadow-lg transition-all">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 bg-red-500/10 rounded-xl flex items-center justify-center text-2xl shrink-0">📄</div>
                <div class="flex-1 min-w-0">
                    <span class="inline-block bg-teal/10 text-teal px-2 py-0.5 rounded text-[10px] font-semibold uppercase tracking-wider mb-2">{{ $download->category }}</span>
                    <h3 class="font-serif text-body text-lg mb-1">{{ $download->title }}</h3>
                    @if($download->description)
                    <p class="text-[13px] text-muted leading-relaxed line-clamp-2 mb-3">{{ $download->description }}</p>
                    @endif
                    <div class="flex items-center gap-3 text-[11px] text-muted mb-4">
                        <span>{{ strtoupper($download->file_type) }}</span>
                        @if($download->file_size)
                        <span>•</span>
                        <span>{{ $download->file_size }}</span>
                        @endif
                        <span>•</span>
                        <span>{{ $download->download_count }}× unduh</span>
                    </div>
                    <a href="{{ route('downloads.download', $download) }}" class="inline-flex items-center gap-2 bg-teal text-white px-4 py-2 rounded-lg text-sm font-semibold no-underline hover:bg-teal-light transition-colors">
                        📥 Unduh
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-10">
        {{ $downloads->links() }}
    </div>
    @else
    <div class="text-center py-20">
        <div class="text-6xl mb-4">📥</div>
        <h3 class="font-serif text-2xl text-body mb-2">Belum Ada Unduhan</h3>
        <p class="text-muted">Materi unduhan akan segera tersedia. Nantikan ya!</p>
    </div>
    @endif
</div>
@endsection
