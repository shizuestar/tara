<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artwork;
use App\Models\Community;
use App\Models\Event;
use App\Models\Proyek;
use App\Models\User;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $total_komunitas = Community::count();
        // $total_proyek_kolaborasi = Proyek::count();
        // $total_karya_galeri = Artwork::count();
        // $total_event = Event::count();
        // $total_user_aktif = User::count();

        // $context = [
        //     'total_komunitas' => $total_komunitas,
        //     'total_proyek_kolaborasi' => $total_proyek_kolaborasi,
        //     'total_karya_galeri' => $total_karya_galeri,
        //     'total_event' => $total_event,
        //     'total_user_aktif' => $total_user_aktif,
        // ];

        return view('Administrator.Admin.Dashboard.index');
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
     * Display the specified resource.
     */
    public function show(string $id)
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