<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Seni', 'description' => 'Lukisan, musik, tari, pertunjukan kreatif.'],
            ['name' => 'Sastra', 'description' => 'Puisi, cerpen, esai, dan tulisan ekspresif.'],
            ['name' => 'Teknologi', 'description' => 'Inovasi digital, robotik, aplikasi.'],
            ['name' => 'Coding', 'description' => 'Pemrograman, website, game dev, software.'],
            ['name' => 'Olahraga', 'description' => 'Sepak bola, basket, bela diri, kebugaran.'],
            ['name' => 'Lingkungan', 'description' => 'Ekologi, daur ulang, kepedulian bumi.'],
            ['name' => 'Bisnis', 'description' => 'Kewirausahaan, startup, ide ekonomi muda.'],
            ['name' => 'Komunitas', 'description' => 'Relawan, solidaritas, kegiatan sosial.'],
            ['name' => 'Fotografi', 'description' => 'Seni menangkap momen dengan kamera.'],
            ['name' => 'Video', 'description' => 'Film, vlog, animasi, sinematografi.'],
            ['name' => 'Tari', 'description' => 'Tradisional, modern, kontemporer.'],
            ['name' => 'Musik', 'description' => 'Band, vokal, paduan suara, instrumen.'],
            ['name' => 'Drama', 'description' => 'Teater, akting, monolog, pentas seni.'],
            ['name' => 'Model', 'description' => 'Desain busana, fashion, gaya anak muda.'],
            ['name' => 'Kuliner', 'description' => 'Kreasi makanan, minuman, inovasi rasa.'],
            ['name' => 'Desain', 'description' => 'Grafis, ilustrasi, UI/UX, digital art.'],
            ['name' => 'Gaming', 'description' => 'E-sport, streaming, komunitas game.'],
            ['name' => 'Astronomi', 'description' => 'Bintang, planet, jagat raya.'],
            ['name' => 'Sains', 'description' => 'Eksperimen, penelitian, pengetahuan.'],
            ['name' => 'Kerajinan', 'description' => 'Kriya, tangan kreatif, produk lokal.'],
            ['name' => 'Tradisi', 'description' => 'Budaya, adat, warisan leluhur.'],
            ['name' => 'Fotografi', 'description' => 'Lensa, potret, seni visual.'],
            ['name' => 'Komik', 'description' => 'Manga, webtoon, ilustrasi cerita.'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
