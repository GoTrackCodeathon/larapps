<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function cari($query, Request $request)
    {
        $news = News::where('keyword', 'LIKE', "%$query%")->get();

        return response()->json($news);
    }
}
