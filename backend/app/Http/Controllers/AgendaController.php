<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        return view('Agenda.index');
    }

    public function ShowAgendaNotFound() {
        return view('Agenda.showNotFound');
    }

    public function ShowAgendaFound() {
        return view('Agenda.showFound');
    }
}
