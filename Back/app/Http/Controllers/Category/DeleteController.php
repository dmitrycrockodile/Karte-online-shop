<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;

class DeleteController extends Controller
{
    public function __invoke(Category $category): RedirectResponse
    {
        $category->delete();

        return redirect()->route('category.index')->with('success', trans("notifications.deleted", ['type' => 'Category', 'title' => $category['title']]));
    }
}
