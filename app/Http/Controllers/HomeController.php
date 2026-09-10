<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Document;
use App\Models\Kid;
use App\Models\Report;
use App\Models\Requisite;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function home(): View
    {
        // Активные дети с активными сборами
        $activeKids = Kid::whereHas('fundraisings', function($query) {
            $query->where('is_active', true);
        })->get();

        // Дети с закрытыми сборами
        $closedKids = Kid::whereHas('fundraisings', function($query) {
            $query->where('is_active', false);
        })->get();

        return \view('home', compact('activeKids','closedKids'));
    }

    public function person(Kid $kid): View
    {
        return \view('person', compact('kid'));
    }

    public function docs(): View
    {
        $docs = Document::all();
        return \view('docs', compact('docs'));
    }

    public function reports(): View
    {
        $reports = Report::all();
        return \view('reports', compact('reports'));
    }
}
