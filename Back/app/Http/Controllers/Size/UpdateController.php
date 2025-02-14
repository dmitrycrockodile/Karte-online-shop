<?php

namespace App\Http\Controllers\Size;

use App\Http\Controllers\Controller;
use App\Http\Requests\Size\SizeRequest;
use App\Models\Size;
use Illuminate\Http\RedirectResponse;

class UpdateController extends Controller
{
    public function __invoke(SizeRequest $request, Size $size): RedirectResponse
    {
        $data = $request->validated();
        $size->update($data);

        return redirect()->route('size.index')->with('success', trans("notifications.edited", ['type' => 'Size', 'title' => $size['title']]));
    }
}
