<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class DeleteController extends Controller
{
    public function __invoke(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tag.index')
                         ->with('success', trans("notifications.deleted", ['type' => 'Tag', 'title' => $tag['title']]));
    }
}
