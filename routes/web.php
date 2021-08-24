<?php

use Illuminate\Support\Facades\Route;
use App\Models\Link;
use App\Models\LinkList;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $links = Link::all()->sortDesc();
    return view('index', [
        'links' => $links,
        'lists' => LinkList::all()
    ]);
});

Route::get('/{slug}', function ($slug) {
    $list = LinkList::where('slug', $slug)->first();
    if (!$list) {
        abort(404);
    }

    return view('index', [
        'list' => $list,
        'links' => $list->links()->orderBy('created_at', 'desc')->get(),
        'lists' => LinkList::all()
    ]);
})->name('link-list');
