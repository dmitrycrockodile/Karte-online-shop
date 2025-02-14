<?php

namespace App\Http\Controllers\Category;

use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Category $category): RedirectResponse
    {
        $data = $request->validated();

        if (!$this->service->update($data, $category)) {
            return redirect()->route('category.index')->with(
                'error', 
                trans("notifications.failed_to_update", ['type' => 'category', 'title' => $category['title']])
            );
        }

        return redirect()->route('category.index')->with(
            'success', 
            trans("notifications.edited", ['type' => 'Category', 'title' => $category['title']])
        );
    }
}
