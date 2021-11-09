<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function getList()
    {
        $items = DB::table('news')
            ->where("is_published", true)
            ->whereDate("published_at", "<=", "NOW()")
            ->orderBy("published_at", "desc")
            ->orderBy("id")
            ->paginate(5);
        return view("news.list", compact("items"));
    }

    public function getDetails($slug)
    {
        $item = DB::table('news')
            ->where("slug", $slug)
            ->whereDate("published_at", "<=", "NOW()")
            ->where("is_published", true)
            ->first();

        if ($item === null) {
            abort(404);
        }

        $item = get_object_vars($item);

        return view("news.detail", compact("item"));
    }
}
