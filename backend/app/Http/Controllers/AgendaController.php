<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        return view('public.agenda.index');
    }

    public function ShowAgendaNotFound() {
        return view('public.agenda.showNotFound');
    }

    public function ShowAgendaFound() {
        return view('public.agenda.showFound');
    }
}
