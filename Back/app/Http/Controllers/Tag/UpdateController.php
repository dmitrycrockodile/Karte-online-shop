<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\TagRequest;
use App\Models\Tag;

class UpdateController extends Controller
{
    public function __invoke(TagRequest $request, Tag $tag)
    {
        $data = $request->validated();
        $tag->update($data);

        return redirect()->route('tag.index')
                         ->with('success', trans("notifications.edited", ['type' => 'Tag', 'title' => $tag['title']]));
    }
}
