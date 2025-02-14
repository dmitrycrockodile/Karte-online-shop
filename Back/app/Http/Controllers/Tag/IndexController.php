<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        $tags = Tag::all();

        return view('tag.index', compact('tags'));
    }
}
