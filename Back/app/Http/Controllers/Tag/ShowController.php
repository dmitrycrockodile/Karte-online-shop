<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\View\View;

class ShowController extends Controller
{
    public function __invoke(Tag $tag): View
    {
        return view('tag.show', compact('tag'));
    }
}
