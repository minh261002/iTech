<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostCatalogue;
use Illuminate\Http\Request;

class PostCatalogueController extends Controller
{
    public function index()
    {
        $post_catalogues = PostCatalogue::orderBy('_lft')->get();
        return view('admin.post_catalogue.index', compact('post_catalogues'));
    }

    public function create()
    {
        $post_catalogues = PostCatalogue::all();
        return view('admin.post_catalogue.create');
    }
}