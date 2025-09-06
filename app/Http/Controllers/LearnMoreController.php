<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LearnMoreController extends Controller
{
    public function index()
    {
        // Data dinamis untuk fitur dan langkah (bisa diambil dari database jika diperlukan)
        $features = [
            [
                'title' => 'Komunitas Kreatif',
                'description' => 'Terhubung dengan kreator lain, berbagi ide, dan kolaborasi dalam proyek impian Tuan.',
                'image' => 'https://picsum.photos/600/400?community',
            ],
            [
                'title' => 'Konten Inspiratif',
                'description' => 'Temukan artikel, tutorial, dan wawancara untuk meningkatkan keterampilan kreatif Tuan.',
                'image' => 'https://picsum.photos/600/400?content',
            ],
            [
                'title' => 'Alat Kolaborasi',
                'description' => 'Gunakan alat kami untuk mengelola proyek, berkomunikasi, dan berkarya bersama tim.',
                'image' => 'https://picsum.photos/600/400?tools',
            ],
        ];

        $steps = [
            [
                'title' => '1. Daftar dan Bergabung',
                'description' => 'Buat akun TARA dan gabung dengan komunitas kreatif yang sesuai dengan minat Tuan.',
                'image' => 'https://picsum.photos/600/400?step1',
            ],
            [
                'title' => '2. Jelajahi dan Belajar',
                'description' => 'Baca artikel, ikuti diskusi, dan pelajari keterampilan baru dari para ahli di TARA.',
                'image' => 'https://picsum.photos/600/400?step2',
            ],
            [
                'title' => '3. Berkarya Bersama',
                'description' => 'Mulai proyek, ajak kolaborator, dan wujudkan ide kreatif Tuan bersama komunitas.',
                'image' => 'https://picsum.photos/600/400?step3',
            ],
        ];

        return view('Sub_Main.learn_more', compact('features', 'steps'));
    }
}