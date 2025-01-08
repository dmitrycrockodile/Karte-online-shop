<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\TagRequest;
use App\Models\Tag;

class StoreController extends Controller
{
    public function __invoke(TagRequest $request)
    {
        $data = $request->validated();
        Tag::firstOrCreate($data);
        
        return redirect()->route('tag.index')
                         ->with('success', trans("notifications.created", ['type' => 'Tag', 'title' => $data['title']]));
    }
}
