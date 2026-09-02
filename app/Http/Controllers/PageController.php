<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    public function about():View
    {
        $page = Page::where('id', 2)->first();

        return \view('page', compact('page'));
    }

    public function sms():View
    {
        $page = Page::where('id', 3)->first();
        return \view('page', compact('page'));
    }

    public function qrSber(): View
    {
        $page = Page::where('id', 4)->first();
        return \view('page', compact('page'));
    }
}
