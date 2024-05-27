<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Content;

class ContentController extends Controller
{
    public function index()
    {
        return Inertia::render('Content', [
            'content' => Content::paginate(10),
        ]);
    }

    public function show(Content $content)
    {
        return Inertia::render('Content/Show', [
            'content' => $content,
        ]);
    }
}
