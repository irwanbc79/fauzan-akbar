<?php

namespace Database\Seeders;

use App\Models\KajianSchedule;
use App\Models\RoadmapPhase;
use App\Models\TeamMember;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user for Filament
        User::updateOrCreate(
            ['email' => 'kajianfauzanakbar@gmail.com'],
            [
                'name' => 'Admin Sahabat Ilmu PMI',
                'password' => Hash::make('sahabatilmu2026'),
            ]
        );

        // Default Kajian Schedules
        $schedules = [
            ['day' => 'Ahad', 'title' => 'Fiqih di Tempat Kerja', 'ustaz' => 'Ust. Abdullah Al-Fatih', 'time' => '08:00', 'platform' => 'both', 'sort_order' => 1],
            ['day' => 'Selasa', 'title' => 'Manajemen Keluarga Jarak Jauh', 'ustaz' => 'Ust. Muhammad Ridwan', 'time' => '20:00', 'platform' => 'zoom', 'sort_order' => 2],
            ['day' => 'Kamis', 'title' => 'Tafsir Al-Quran Tematik', 'ustaz' => 'Ust. Ahmad Hakim', 'time' => '19:30', 'platform' => 'whatsapp', 'sort_order' => 3],
            ['day' => 'Sabtu', 'title' => 'Tanya Jawab Hukum Islam', 'ustaz' => 'Tim Pembina', 'time' => '21:00', 'platform' => 'both', 'sort_order' => 4],
        ];

        foreach ($schedules as $schedule) {
            KajianSchedule::updateOrCreate(
                ['title' => $schedule['title']],
                array_merge($schedule, ['is_active' => true, 'status' => 'upcoming'])
            );
        }

        // Default Team Members
        $team = [
            ['name' => 'Ustaz Pembina', 'role' => 'Pembina', 'icon' => '👳', 'description' => 'Pengarah konten dan keilmuan. Memastikan materi sesuai syariat.', 'sort_order' => 1],
            ['name' => 'Tim Arsip', 'role' => 'Admin Dokumentasi', 'icon' => '📂', 'description' => 'Pengelola arsip dan seluruh konten digital yang diunggah.', 'sort_order' => 2],
            ['name' => 'Tim Kreatif', 'role' => 'Admin Media', 'icon' => '🎨', 'description' => 'Pembuat aset visual, poster dakwah, dan konten media sosial.', 'sort_order' => 3],
            ['name' => 'Tim Koordinasi', 'role' => 'Koordinator', 'icon' => '📡', 'description' => 'Penghubung jamaah, jadwal kajian, dan operasional harian.', 'sort_order' => 4],
        ];

        foreach ($team as $member) {
            TeamMember::updateOrCreate(
                ['name' => $member['name']],
                array_merge($member, ['is_active' => true])
            );
        }

        // Default Roadmap Phases
        $phases = [
            ['phase' => 'Tahap 1 • 0–3 Bulan', 'title' => 'Penataan & Branding', 'icon' => '🏗️', 'description' => 'Membangun identitas resmi "Sahabat Ilmu PMI" dan sistem pengarsipan digital.', 'status' => 'active', 'sort_order' => 1],
            ['phase' => 'Tahap 2 • 3–9 Bulan', 'title' => 'Ekosistem Digital', 'icon' => '🚀', 'description' => 'Peluncuran website, kanal YouTube, dan podcast untuk memperluas jangkauan.', 'status' => 'upcoming', 'sort_order' => 2],
            ['phase' => 'Tahap 3 • 1–3 Tahun', 'title' => 'Pengembangan Profesional', 'icon' => '🌍', 'description' => 'Ekspansi jamaah lintas negara dan kurikulum pembinaan tahunan.', 'status' => 'upcoming', 'sort_order' => 3],
        ];

        foreach ($phases as $phase) {
            RoadmapPhase::updateOrCreate(
                ['title' => $phase['title']],
                $phase
            );
        }
    }
}
