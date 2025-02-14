<?php

namespace App\Http\Controllers\Category;

use App\Http\Requests\Category\StoreRequest;
use Illuminate\Http\RedirectResponse;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if (!$this->service->store($data)) {
            return redirect()->route('category.index')->with(
                'error', 
                trans("notifications.failed_to_create", ['type' => 'category'])
            );
        }
        
        return redirect()->route('category.index')->with(
            'success', 
            trans("notifications.created", ['type' => 'Category', 'title' => $data['title']])
        );
    }
}