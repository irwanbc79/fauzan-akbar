{{-- Footer --}}
<footer class="bg-teal-dark text-white/70 pt-12 pb-8 px-[5%]">
    {{-- Top Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-10 pb-10 border-b border-white/10">
        {{-- Brand --}}
        <div class="md:col-span-1">
            <div class="flex items-center gap-2.5 mb-2.5">
                <img src="{{ asset('images/logo-mosque.svg') }}" alt="Sahabat Ilmu PMI" class="w-10 h-10">
                <div class="font-serif text-[22px] text-white">
                    Sahabat Ilmu <span class="text-gold">PMI</span>
                </div>
            </div>
            <p class="text-[13px] leading-relaxed">
                Majelis ilmu untuk Pekerja Migran Indonesia di Hong Kong. Bersama menguatkan iman, ilmu, dan ukhuwah di negeri orang.
            </p>
            <p class="text-[12px] mt-3 text-white/40">
                📧 kajianfauzanakbar@gmail.com
            </p>
        </div>

        {{-- Kajian --}}
        <div>
            <h4 class="text-[13px] font-bold text-white mb-4 uppercase tracking-wider">Kajian</h4>
            <a href="{{ route('home') }}#jadwal" class="block text-[13px] text-white/60 hover:text-gold-light transition-colors no-underline mb-2.5">Jadwal Rutin</a>
            <a href="{{ route('videos.index') }}" class="block text-[13px] text-white/60 hover:text-gold-light transition-colors no-underline mb-2.5">Rekaman Video</a>
            <a href="{{ route('articles.index') }}" class="block text-[13px] text-white/60 hover:text-gold-light transition-colors no-underline mb-2.5">Artikel</a>
            <a href="{{ route('downloads.index') }}" class="block text-[13px] text-white/60 hover:text-gold-light transition-colors no-underline mb-2.5">Unduhan</a>
        </div>

        {{-- Tentang --}}
        <div>
            <h4 class="text-[13px] font-bold text-white mb-4 uppercase tracking-wider">Tentang</h4>
            <a href="{{ route('home') }}#tim" class="block text-[13px] text-white/60 hover:text-gold-light transition-colors no-underline mb-2.5">Tim Inti</a>
            <a href="{{ route('home') }}#roadmap" class="block text-[13px] text-white/60 hover:text-gold-light transition-colors no-underline mb-2.5">Roadmap</a>
            <a href="{{ route('home') }}#daftar" class="block text-[13px] text-white/60 hover:text-gold-light transition-colors no-underline mb-2.5">Bergabung</a>
        </div>

        {{-- Ikuti --}}
        <div>
            <h4 class="text-[13px] font-bold text-white mb-4 uppercase tracking-wider">Ikuti Kami</h4>
            <a href="https://youtube.com/@kajianfauzanakbar" target="_blank" class="block text-[13px] text-white/60 hover:text-gold-light transition-colors no-underline mb-2.5">▶️ YouTube</a>
            <a href="#" class="block text-[13px] text-white/60 hover:text-gold-light transition-colors no-underline mb-2.5">💬 WhatsApp Group</a>
            <a href="#" class="block text-[13px] text-white/60 hover:text-gold-light transition-colors no-underline mb-2.5">📷 Instagram</a>
        </div>
    </div>

    {{-- Bottom --}}
    <div class="flex flex-col md:flex-row justify-between items-center gap-3">
        <span class="text-[12.5px]">© {{ date('Y') }} Sahabat Ilmu PMI Hong Kong. Semua hak dilindungi.</span>
        <div class="flex gap-2.5">
            <a href="https://youtube.com/@kajianfauzanakbar" target="_blank" class="w-[34px] h-[34px] rounded-lg bg-white/[0.08] border border-white/[0.12] flex items-center justify-center text-sm hover:bg-gold/20 transition-colors no-underline">▶</a>
            <a href="#" class="w-[34px] h-[34px] rounded-lg bg-white/[0.08] border border-white/[0.12] flex items-center justify-center text-sm hover:bg-gold/20 transition-colors no-underline">💬</a>
            <a href="#" class="w-[34px] h-[34px] rounded-lg bg-white/[0.08] border border-white/[0.12] flex items-center justify-center text-sm hover:bg-gold/20 transition-colors no-underline">📷</a>
        </div>
    </div>
</footer>
