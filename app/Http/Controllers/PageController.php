<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    public function show(string $parentSlug, string $childSlug = null): View
    {
        if ($childSlug) {
            // Поиск дочерней страницы
            $page = Page::where('slug', $childSlug)
                ->where('is_published', true)
                ->whereHas('parent', function ($query) use ($parentSlug) {
                    $query->where('slug', $parentSlug)->where('is_published', true);
                })
                ->firstOrFail();
        } else {
            // Поиск родительской страницы
            $page = Page::where('slug', $parentSlug)
                ->where('is_published', true)
                ->firstOrFail();
        }

        // Загружаем дочерние страницы для текущей страницы
        $childPages = $page->children()->where('is_published', true)->get();

        return view('pages.show', compact('page', 'childPages'));
    }
}
