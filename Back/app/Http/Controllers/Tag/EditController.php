<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\View\View;

class EditController extends Controller
{
    public function __invoke(Tag $tag): View
    {   
        return view('tag.edit', compact('tag'));
    }
}
