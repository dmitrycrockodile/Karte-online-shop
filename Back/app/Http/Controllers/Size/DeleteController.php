<?php

namespace App\Http\Controllers\Size;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\RedirectResponse;

class DeleteController extends Controller
{
    public function __invoke(Size $size): RedirectResponse
    {
        $size->delete();

        return redirect()->route('size.index')->with('success', trans("notifications.deleted", ['type' => 'Size', 'title' => $size['title']]));
    }
}
