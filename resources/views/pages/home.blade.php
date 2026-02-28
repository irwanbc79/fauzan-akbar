@extends('layouts.app')

@section('title', 'Sahabat Ilmu PMI – Majelis Ilmu PMI Hong Kong')

@section('content')

{{-- ═══════════════════ HERO ═══════════════════ --}}
<div class="min-h-screen flex items-center justify-center text-center px-[5%] pt-24 pb-20 relative overflow-hidden"
     style="background: radial-gradient(ellipse 80% 60% at 50% -10%, rgba(13,110,110,0.35) 0%, transparent 70%), linear-gradient(160deg, #084E4E 0%, #0a3d3d 50%, #071e2e 100%);">
    {{-- Grid overlay --}}
    <div class="absolute inset-0" style="background-image: repeating-linear-gradient(0deg, transparent, transparent 80px, rgba(201,168,76,0.04) 80px, rgba(201,168,76,0.04) 81px), repeating-linear-gradient(90deg, transparent, transparent 80px, rgba(201,168,76,0.04) 80px, rgba(201,168,76,0.04) 81px);"></div>

    {{-- Mosque skyline at bottom --}}
    <div class="absolute bottom-0 left-0 right-0 w-full pointer-events-none overflow-hidden" style="height: 250px;">
        <img src="{{ asset('images/mosque-skyline-final.png') }}?v={{ time() }}" alt="" class="absolute left-1/2 -translate-x-1/2" style="bottom: -60px; width: 160%; max-width: 2200px; opacity: 0.7;">
    </div>

    <div class="relative z-10">
        <div class="font-serif text-gold-light text-[clamp(20px,4vw,32px)] tracking-widest mb-5 opacity-90 animate-fade-down">
            بِسْمِ اللّٰهِ الرَّحْمٰنِ الرَّحِيْمِ
        </div>
        <h1 class="font-serif text-white text-[clamp(36px,7vw,72px)] leading-[1.15] mb-4 animate-fade-down delay-100">
            Majelis Ilmu <span class="text-gold">PMI</span><br>Hong Kong
        </h1>
        <p class="text-white/65 text-[clamp(14px,2vw,17px)] max-w-[520px] mx-auto mb-10 leading-relaxed animate-fade-down delay-200">
            Platform kajian Islam untuk Pekerja Migran Indonesia di Hong Kong. Belajar, bertumbuh, dan bersama dalam lingkaran ilmu yang berkah.
        </p>

        {{-- Badges --}}
        <div class="flex gap-3 justify-center flex-wrap mb-11 animate-fade-down delay-300">
            <span class="bg-white/[0.08] border border-gold/30 text-gold-light px-4 py-1.5 rounded-full text-[12.5px] font-medium">📚 Kajian Rutin</span>
            <span class="bg-white/[0.08] border border-gold/30 text-gold-light px-4 py-1.5 rounded-full text-[12.5px] font-medium">🎥 Live Zoom</span>
            <span class="bg-white/[0.08] border border-gold/30 text-gold-light px-4 py-1.5 rounded-full text-[12.5px] font-medium">💬 Grup WhatsApp</span>
            <span class="bg-white/[0.08] border border-gold/30 text-gold-light px-4 py-1.5 rounded-full text-[12.5px] font-medium">▶️ Rekaman YouTube</span>
        </div>

        {{-- CTA Buttons --}}
        <div class="flex gap-3.5 justify-center flex-wrap animate-fade-down delay-400">
            <a href="#daftar" class="bg-gold text-teal-dark px-8 py-3.5 rounded-lg text-sm font-bold no-underline shadow-[0_4px_20px_rgba(201,168,76,0.4)] hover:-translate-y-0.5 hover:shadow-[0_8px_30px_rgba(201,168,76,0.5)] transition-all">
                Daftar Sekarang — Gratis
            </a>
            <a href="#jadwal" class="bg-transparent border-[1.5px] border-white/30 text-white px-8 py-3.5 rounded-lg text-sm font-semibold no-underline hover:border-gold hover:bg-gold/[0.08] transition-all">
                Lihat Jadwal Kajian
            </a>
        </div>
    </div>
</div>

{{-- ═══════════════════ STATS STRIP ═══════════════════ --}}
<div class="bg-white flex justify-center border-b border-cream-dark flex-wrap">
    @php
        $statItems = [
            ['num' => $stats['jamaah'], 'label' => 'Jamaah Aktif'],
            ['num' => $stats['kajian'], 'label' => 'Kajian Rutin'],
            ['num' => $stats['artikel'], 'label' => 'Artikel'],
            ['num' => $stats['video'], 'label' => 'Video Rekaman'],
            ['num' => $stats['unduhan'], 'label' => 'Unduhan'],
        ];
    @endphp
    @foreach($statItems as $stat)
    <div class="flex-1 max-w-[200px] py-7 px-5 text-center {{ !$loop->last ? 'border-r border-cream-dark' : '' }}">
        <div class="font-serif text-4xl text-teal font-bold leading-none">{{ $stat['num'] }}</div>
        <div class="text-xs text-muted mt-1 font-medium">{{ $stat['label'] }}</div>
    </div>
    @endforeach
</div>

{{-- ═══════════════════ JADWAL KAJIAN ═══════════════════ --}}
<section class="bg-white py-20 px-[5%]" id="jadwal">
    <div class="mb-12">
        <span class="inline-block bg-teal/10 text-teal px-3.5 py-1 rounded-full text-xs font-semibold tracking-wider uppercase mb-3.5">📅 Jadwal Kajian</span>
        <h2 class="font-serif text-[clamp(28px,4vw,44px)] text-body leading-tight mb-3.5">Kajian <span class="text-teal">Pekan Ini</span></h2>
        <p class="text-[15px] text-muted leading-relaxed max-w-[560px]">Bergabunglah dengan kajian rutin kami melalui Zoom atau WhatsApp Group. Semua kajian gratis untuk jamaah PMI.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        @forelse($schedules as $schedule)
        <div class="bg-cream border border-cream-dark rounded-2xl p-6 relative overflow-hidden hover:-translate-y-1 hover:shadow-[0_12px_40px_rgba(0,0,0,0.08)] transition-all group">
            {{-- Top accent bar --}}
            <div class="absolute top-0 left-0 right-0 h-[3px] bg-gradient-to-r from-teal to-gold"></div>

            <div class="text-[11px] font-bold uppercase tracking-wider text-teal mb-2">
                {{ $schedule->day }} {{ $schedule->time ? '• ' . \Carbon\Carbon::parse($schedule->time)->format('H:i') . ' HKT' : '' }}
            </div>
            <div class="font-serif text-xl text-body mb-1.5">{{ $schedule->title }}</div>
            <div class="text-[13px] text-muted mb-4 flex items-center gap-1.5">
                <span class="text-[11px]">👤</span> {{ $schedule->ustaz }}
            </div>
            <div class="flex gap-2.5 flex-wrap">
                @if($schedule->platform === 'zoom' || $schedule->platform === 'both')
                <span class="bg-blue-500/10 text-blue-700 px-2.5 py-1 rounded-md text-[11.5px] font-medium">🎥 Zoom</span>
                @endif
                @if($schedule->platform === 'whatsapp' || $schedule->platform === 'both')
                <span class="bg-green-500/10 text-green-700 px-2.5 py-1 rounded-md text-[11.5px] font-medium">💬 WA Group</span>
                @endif
            </div>
        </div>
        @empty
        {{-- Default cards when no data --}}
        @php
            $defaultSchedules = [
                ['day' => 'Ahad • 08:00 HKT', 'title' => 'Fiqih di Tempat Kerja', 'ustaz' => 'Ust. Abdullah Al-Fatih', 'platforms' => ['zoom', 'wa']],
                ['day' => 'Selasa • 20:00 HKT', 'title' => 'Manajemen Keluarga Jarak Jauh', 'ustaz' => 'Ust. Muhammad Ridwan', 'platforms' => ['zoom']],
                ['day' => 'Kamis • 19:30 HKT', 'title' => 'Tafsir Al-Quran Tematik', 'ustaz' => 'Ust. Ahmad Hakim', 'platforms' => ['wa']],
                ['day' => 'Sabtu • 21:00 HKT', 'title' => 'Tanya Jawab Hukum Islam', 'ustaz' => 'Tim Pembina', 'platforms' => ['zoom', 'wa']],
            ];
        @endphp
        @foreach($defaultSchedules as $ds)
        <div class="bg-cream border border-cream-dark rounded-2xl p-6 relative overflow-hidden hover:-translate-y-1 hover:shadow-[0_12px_40px_rgba(0,0,0,0.08)] transition-all">
            <div class="absolute top-0 left-0 right-0 h-[3px] bg-gradient-to-r from-teal to-gold"></div>
            <div class="text-[11px] font-bold uppercase tracking-wider text-teal mb-2">{{ $ds['day'] }}</div>
            <div class="font-serif text-xl text-body mb-1.5">{{ $ds['title'] }}</div>
            <div class="text-[13px] text-muted mb-4 flex items-center gap-1.5"><span class="text-[11px]">👤</span> {{ $ds['ustaz'] }}</div>
            <div class="flex gap-2.5 flex-wrap">
                @if(in_array('zoom', $ds['platforms']))
                <span class="bg-blue-500/10 text-blue-700 px-2.5 py-1 rounded-md text-[11.5px] font-medium">🎥 Zoom</span>
                @endif
                @if(in_array('wa', $ds['platforms']))
                <span class="bg-green-500/10 text-green-700 px-2.5 py-1 rounded-md text-[11.5px] font-medium">💬 WA Group</span>
                @endif
            </div>
        </div>
        @endforeach
        @endforelse
    </div>
</section>

{{-- ═══════════════════ KONTEN DAKWAH ═══════════════════ --}}
<section class="py-20 px-[5%]" id="konten" style="background: linear-gradient(160deg, #084E4E 0%, #0a3d3d 100%);">
    <span class="inline-block bg-gold/15 text-gold-light px-3.5 py-1 rounded-full text-xs font-semibold tracking-wider uppercase mb-3.5">📖 Konten Dakwah</span>
    <h2 class="font-serif text-[clamp(28px,4vw,44px)] text-white leading-tight mb-3.5">Ekosistem Ilmu<br><span class="text-gold">Digital Kami</span></h2>
    <p class="text-[15px] text-white/60 leading-relaxed max-w-[560px]">Konten tersedia dalam berbagai format agar mudah diakses kapan saja, di mana saja — bahkan saat hari libur terbatas.</p>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mt-12">
        @php
            $kontenItems = [
                ['icon' => '🎥', 'title' => 'Rekaman Kajian', 'desc' => 'Semua sesi kajian direkam dan tersedia di YouTube untuk ditonton ulang kapan pun.', 'badge' => $stats['video'] . ' Video', 'link' => route('videos.index')],
                ['icon' => '📝', 'title' => 'Artikel & Ringkasan', 'desc' => 'Ringkasan materi kajian dalam bentuk artikel singkat yang mudah dibagikan.', 'badge' => $stats['artikel'] . ' Artikel', 'link' => route('articles.index')],
                ['icon' => '📥', 'title' => 'Unduhan PDF', 'desc' => 'E-book, modul, dan materi kajian dalam format PDF siap unduh.', 'badge' => $stats['unduhan'] . ' File', 'link' => route('downloads.index')],
                ['icon' => '🖼️', 'title' => 'Poster & Quotes', 'desc' => 'Konten visual siap sebar untuk WhatsApp dan media sosial setiap hari.', 'badge' => 'Segera Hadir', 'link' => '#'],
            ];
        @endphp
        @foreach($kontenItems as $item)
        <a href="{{ $item['link'] }}" class="bg-white/[0.06] border border-white/10 rounded-2xl p-7 hover:bg-white/10 transition-colors no-underline block">
            <div class="w-12 h-12 bg-gold/15 rounded-xl flex items-center justify-center text-[22px] mb-4">{{ $item['icon'] }}</div>
            <h3 class="text-base font-semibold text-white mb-2">{{ $item['title'] }}</h3>
            <p class="text-[13.5px] text-white/55 leading-relaxed">{{ $item['desc'] }}</p>
            <span class="inline-block mt-3.5 bg-gold/20 text-gold-light px-2.5 py-0.5 rounded text-[11px] font-semibold">{{ $item['badge'] }}</span>
        </a>
        @endforeach
    </div>
</section>

{{-- ═══════════════════ TIM INTI ═══════════════════ --}}
<section class="bg-cream py-20 px-[5%]" id="tim">
    <span class="inline-block bg-teal/10 text-teal px-3.5 py-1 rounded-full text-xs font-semibold tracking-wider uppercase mb-3.5">👥 Tim Inti</span>
    <h2 class="font-serif text-[clamp(28px,4vw,44px)] text-body leading-tight mb-3.5">Mereka Yang <span class="text-teal">Menggerakkan</span></h2>
    <p class="text-[15px] text-muted leading-relaxed max-w-[560px]">Didukung oleh tim yang berdedikasi agar setiap jamaah mendapat pelayanan terbaik.</p>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mt-12">
        @forelse($team as $member)
        <div class="bg-white rounded-2xl p-7 text-center border border-cream-dark hover:-translate-y-1 transition-transform">
            <div class="w-16 h-16 rounded-full bg-gradient-to-br from-teal to-teal-light flex items-center justify-center text-[26px] mx-auto mb-4">
                {{ $member->icon }}
            </div>
            <div class="text-[11px] font-bold uppercase tracking-wider text-gold mb-1.5">{{ $member->role }}</div>
            <div class="font-serif text-lg text-body mb-2">{{ $member->name }}</div>
            <div class="text-[12.5px] text-muted leading-relaxed">{{ $member->description }}</div>
        </div>
        @empty
        @php
            $defaultTeam = [
                ['icon' => '👳', 'role' => 'Pembina', 'name' => 'Ustaz Pembina', 'desc' => 'Pengarah konten dan keilmuan. Memastikan materi sesuai syariat.'],
                ['icon' => '📂', 'role' => 'Admin Dokumentasi', 'name' => 'Tim Arsip', 'desc' => 'Pengelola arsip dan seluruh konten digital yang diunggah.'],
                ['icon' => '🎨', 'role' => 'Admin Media', 'name' => 'Tim Kreatif', 'desc' => 'Pembuat aset visual, poster dakwah, dan konten media sosial.'],
                ['icon' => '📡', 'role' => 'Koordinator', 'name' => 'Tim Koordinasi', 'desc' => 'Penghubung jamaah, jadwal kajian, dan operasional harian.'],
            ];
        @endphp
        @foreach($defaultTeam as $dt)
        <div class="bg-white rounded-2xl p-7 text-center border border-cream-dark hover:-translate-y-1 transition-transform">
            <div class="w-16 h-16 rounded-full bg-gradient-to-br from-teal to-teal-light flex items-center justify-center text-[26px] mx-auto mb-4">{{ $dt['icon'] }}</div>
            <div class="text-[11px] font-bold uppercase tracking-wider text-gold mb-1.5">{{ $dt['role'] }}</div>
            <div class="font-serif text-lg text-body mb-2">{{ $dt['name'] }}</div>
            <div class="text-[12.5px] text-muted leading-relaxed">{{ $dt['desc'] }}</div>
        </div>
        @endforeach
        @endforelse
    </div>
</section>

{{-- ═══════════════════ ROADMAP ═══════════════════ --}}
<section class="bg-white py-20 px-[5%]" id="roadmap">
    <span class="inline-block bg-teal/10 text-teal px-3.5 py-1 rounded-full text-xs font-semibold tracking-wider uppercase mb-3.5">🗺️ Program</span>
    <h2 class="font-serif text-[clamp(28px,4vw,44px)] text-body leading-tight mb-3.5">Rencana <span class="text-teal">Transformasi Digital</span></h2>
    <p class="text-[15px] text-muted leading-relaxed max-w-[560px]">Tiga tahap perjalanan membangun ekosistem dakwah digital yang profesional dan berkelanjutan.</p>

    <div class="flex flex-col md:flex-row gap-0 mt-12 relative">
        {{-- Connecting line --}}
        <div class="hidden md:block absolute top-7 left-[5%] right-[5%] h-0.5 bg-cream-dark z-0"></div>

        @forelse($roadmap as $phase)
        <div class="flex-1 px-4 text-center relative z-10 mb-8 md:mb-0">
            <div class="w-14 h-14 rounded-full {{ $phase->status === 'active' ? 'bg-teal' : ($phase->status === 'upcoming' ? 'bg-gold' : 'bg-cream-dark') }} border-[3px] border-white flex items-center justify-center mx-auto mb-4 text-xl shadow-[0_0_0_4px_white]">
                {{ $phase->icon }}
            </div>
            <div class="text-[11px] font-bold uppercase tracking-wider text-muted mb-1.5">{{ $phase->phase }}</div>
            <div class="text-[15px] font-bold text-body mb-2">{{ $phase->title }}</div>
            <div class="text-[12.5px] text-muted leading-relaxed">{{ $phase->description }}</div>
        </div>
        @empty
        @php
            $defaultRoadmap = [
                ['icon' => '🏗️', 'phase' => 'Tahap 1 • 0–3 Bulan', 'title' => 'Penataan & Branding', 'desc' => 'Membangun identitas resmi "Sahabat Ilmu PMI" dan sistem pengarsipan digital.', 'status' => 'active'],
                ['icon' => '🚀', 'phase' => 'Tahap 2 • 3–9 Bulan', 'title' => 'Ekosistem Digital', 'desc' => 'Peluncuran website, kanal YouTube, dan podcast untuk memperluas jangkauan.', 'status' => 'upcoming'],
                ['icon' => '🌍', 'phase' => 'Tahap 3 • 1–3 Tahun', 'title' => 'Pengembangan Profesional', 'desc' => 'Ekspansi jamaah lintas negara dan kurikulum pembinaan tahunan.', 'status' => ''],
            ];
        @endphp
        @foreach($defaultRoadmap as $dr)
        <div class="flex-1 px-4 text-center relative z-10 mb-8 md:mb-0">
            <div class="w-14 h-14 rounded-full {{ $dr['status'] === 'active' ? 'bg-teal' : ($dr['status'] === 'upcoming' ? 'bg-gold' : 'bg-cream-dark') }} border-[3px] border-white flex items-center justify-center mx-auto mb-4 text-xl shadow-[0_0_0_4px_white]">
                {{ $dr['icon'] }}
            </div>
            <div class="text-[11px] font-bold uppercase tracking-wider text-muted mb-1.5">{{ $dr['phase'] }}</div>
            <div class="text-[15px] font-bold text-body mb-2">{{ $dr['title'] }}</div>
            <div class="text-[12.5px] text-muted leading-relaxed">{{ $dr['desc'] }}</div>
        </div>
        @endforeach
        @endforelse
    </div>
</section>

{{-- ═══════════════════ TANYA JAWAB / DAFTAR ═══════════════════ --}}
<section class="py-20 px-[5%] text-center" id="daftar" style="background: radial-gradient(ellipse 80% 80% at 50% 100%, rgba(13,110,110,0.2) 0%, transparent 70%), #F9F5EE;">
    <span class="inline-block bg-teal/10 text-teal px-3.5 py-1 rounded-full text-xs font-semibold tracking-wider uppercase mb-3.5">✍️ Tanya Jawab</span>
    <h2 class="font-serif text-[clamp(28px,4vw,44px)] text-body leading-tight mb-3.5">Kirim <span class="text-teal">Pertanyaan</span></h2>
    <p class="text-[15px] text-muted leading-relaxed max-w-[560px] mx-auto">Kirimkan pertanyaan Anda langsung ke Ust. Fauzan. Gratis, tanpa syarat.</p>

    <div class="max-w-[520px] mx-auto mt-12 bg-white rounded-2xl p-10 border border-cream-dark shadow-[0_20px_60px_rgba(0,0,0,0.06)]">
        <form action="{{ route('questions.store') }}" method="POST">
            @csrf
            <div class="mb-4 text-left">
                <label class="block text-[13px] font-semibold text-body mb-1.5">Nama</label>
                <input type="text" name="name" required placeholder="Masukkan nama lengkap"
                    class="w-full px-3.5 py-2.5 border-[1.5px] border-cream-dark rounded-lg text-sm font-sans text-body bg-cream outline-none focus:border-teal focus:bg-white transition-colors"
                    value="{{ old('name') }}">
                @error('name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4 text-left">
                <label class="block text-[13px] font-semibold text-body mb-1.5">Email / WhatsApp</label>
                <input type="text" name="email_or_whatsapp" required placeholder="Email atau nomor WhatsApp"
                    class="w-full px-3.5 py-2.5 border-[1.5px] border-cream-dark rounded-lg text-sm font-sans text-body bg-cream outline-none focus:border-teal focus:bg-white transition-colors"
                    value="{{ old('email_or_whatsapp') }}">
                @error('email_or_whatsapp') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4 text-left">
                <label class="block text-[13px] font-semibold text-body mb-1.5">Pertanyaan Anda</label>
                <textarea name="question" required rows="4" placeholder="Tulis pertanyaan Anda di sini..."
                    class="w-full px-3.5 py-2.5 border-[1.5px] border-cream-dark rounded-lg text-sm font-sans text-body bg-cream outline-none focus:border-teal focus:bg-white transition-colors resize-none">{{ old('question') }}</textarea>
                @error('question') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="w-full bg-gradient-to-br from-teal to-teal-light text-white border-none py-3.5 rounded-xl text-[15px] font-bold cursor-pointer font-sans hover:opacity-90 transition-opacity tracking-wide mt-1.5">
                🕌 Kirim Pertanyaan
            </button>
        </form>
    </div>
</section>

@endsection
