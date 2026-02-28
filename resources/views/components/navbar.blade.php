{{-- Navbar --}}
<nav class="fixed top-0 left-0 right-0 z-[999] bg-teal-dark/[0.96] backdrop-blur-xl flex items-center justify-between px-[5%] h-16 border-b border-gold/30">
    {{-- Brand --}}
    <a href="{{ route('home') }}" class="flex items-center gap-2.5 no-underline">
        <div class="w-9 h-9 bg-gradient-to-br from-gold to-gold-light rounded-lg flex items-center justify-center font-serif text-lg text-teal-dark font-bold">
            س
        </div>
        <span class="text-[15px] font-semibold text-white tracking-wide">
            Sahabat Ilmu <span class="text-gold-light">PMI</span>
        </span>
    </a>

    {{-- Desktop Links --}}
    <ul class="hidden md:flex gap-7 list-none">
        <li><a href="{{ route('home') }}#jadwal" class="text-white/80 text-[13.5px] font-medium tracking-wide hover:text-gold-light transition-colors no-underline">Jadwal Kajian</a></li>
        <li><a href="{{ route('home') }}#konten" class="text-white/80 text-[13.5px] font-medium tracking-wide hover:text-gold-light transition-colors no-underline">Konten</a></li>
        <li><a href="{{ route('articles.index') }}" class="text-white/80 text-[13.5px] font-medium tracking-wide hover:text-gold-light transition-colors no-underline">Artikel</a></li>
        <li><a href="{{ route('videos.index') }}" class="text-white/80 text-[13.5px] font-medium tracking-wide hover:text-gold-light transition-colors no-underline">Video</a></li>
        <li><a href="{{ route('home') }}#tim" class="text-white/80 text-[13.5px] font-medium tracking-wide hover:text-gold-light transition-colors no-underline">Tim</a></li>
        <li><a href="{{ route('home') }}#roadmap" class="text-white/80 text-[13.5px] font-medium tracking-wide hover:text-gold-light transition-colors no-underline">Program</a></li>
    </ul>

    {{-- CTA --}}
    <a href="{{ route('home') }}#daftar" class="hidden md:block bg-gold text-teal-dark px-5 py-2 rounded-md text-[13px] font-bold hover:bg-gold-light transition-colors no-underline">
        Bergabung
    </a>

    {{-- Mobile Toggle --}}
    <button id="mobile-menu-btn" class="md:hidden text-white text-2xl" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
        ☰
    </button>
</nav>

{{-- Mobile Menu --}}
<div id="mobile-menu" class="hidden fixed top-16 left-0 right-0 z-[998] bg-teal-dark/[0.98] backdrop-blur-xl border-b border-gold/30 md:hidden">
    <div class="flex flex-col p-6 gap-4">
        <a href="{{ route('home') }}#jadwal" class="text-white/80 text-sm font-medium hover:text-gold-light transition-colors no-underline" onclick="document.getElementById('mobile-menu').classList.add('hidden')">📅 Jadwal Kajian</a>
        <a href="{{ route('home') }}#konten" class="text-white/80 text-sm font-medium hover:text-gold-light transition-colors no-underline" onclick="document.getElementById('mobile-menu').classList.add('hidden')">📖 Konten</a>
        <a href="{{ route('articles.index') }}" class="text-white/80 text-sm font-medium hover:text-gold-light transition-colors no-underline">📝 Artikel</a>
        <a href="{{ route('videos.index') }}" class="text-white/80 text-sm font-medium hover:text-gold-light transition-colors no-underline">🎥 Video</a>
        <a href="{{ route('home') }}#tim" class="text-white/80 text-sm font-medium hover:text-gold-light transition-colors no-underline" onclick="document.getElementById('mobile-menu').classList.add('hidden')">👥 Tim</a>
        <a href="{{ route('home') }}#roadmap" class="text-white/80 text-sm font-medium hover:text-gold-light transition-colors no-underline" onclick="document.getElementById('mobile-menu').classList.add('hidden')">🗺️ Program</a>
        <a href="{{ route('home') }}#daftar" class="bg-gold text-teal-dark px-5 py-3 rounded-lg text-sm font-bold text-center hover:bg-gold-light transition-colors no-underline mt-2" onclick="document.getElementById('mobile-menu').classList.add('hidden')">
            🕌 Bergabung Sekarang
        </a>
    </div>
</div>
