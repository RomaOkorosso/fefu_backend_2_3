<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    public function getList()
    {
        $items = News::query()
            ->where("is_published", true)
            ->whereDate("published_at", "<=", "NOW()")
            ->orderByDesc("published_at")
            ->orderByDesc("id")
            ->paginate(5);
        Log::info($items);
        return view("news.list", compact("items"));
    }

    public function getDetails($slug)
    {

        $item = News::query()
            ->where("slug", $slug)
            ->whereDate("published_at", "<=", "NOW()")
            ->where("is_published", true)
            ->first();
        Log::info($item);
        if ($item === null) {
            abort(404);
        }

        return view("news.detail", compact("item"));
    }
}
