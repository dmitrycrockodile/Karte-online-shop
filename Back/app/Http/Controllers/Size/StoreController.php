<?php

namespace App\Http\Controllers\Size;

use App\Http\Controllers\Controller;
use App\Http\Requests\Size\SizeRequest;
use App\Models\Size;
use Illuminate\Http\RedirectResponse;

class StoreController extends Controller
{
    public function __invoke(SizeRequest $request): RedirectResponse
    {
        $data = $request->validated();
        Size::firstOrCreate($data);
        
        return redirect()->route('size.index')->with('success', trans("notifications.created", ['type' => 'Size', 'title' => $data['title']]));
    }
}
