<?php

namespace App\Http\Controllers\Size;

use App\Http\Controllers\Controller;
use App\Http\Requests\Size\UpdateRequest;
use App\Models\Size;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Size $size)
    {
        $data = $request->validated();
        $size->update($data);

        return redirect()->route('size.index');
    }
}
