<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private $projects = [];

    public function __construct()
    {
        for ($i = 1; $i <= 45; $i++) {
            $this->projects[$i] = [
                "id" => $i,
                "title" => "Proyek " . $i,
                "category" => ["UI/UX", "Desain Grafis", "Pengembangan Web", "Ilustrasi"][$i % 4],
                "description" => "Deskripsi detail untuk proyek " . $i . ". Ini representasi unik dari kreativitas.",
                "image" => "https://picsum.photos/seed/" . $i . "/800/600",
                "uploader" => "Pengunggah " . (($i % 5) + 1),
                "uploadTime" => now()->toDateTimeString(),
            ];
        }
    }

    public function index()
    {
        return view('public.galeri.index', ['projects' => $this->projects]);
    }

    public function show($id)
    {
        if (!isset($this->projects[$id])) {
            abort(404, "Project tidak ditemukan");
        }

        $project = $this->projects[$id];
        return view('public.galeri.show', compact('project'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
