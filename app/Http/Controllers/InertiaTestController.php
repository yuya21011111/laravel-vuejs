<?php

namespace App\Http\Controllers;

use App\Models\InertiaTest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InertiaTestController extends Controller
{
    public function index() {
        return Inertia::render('Inertia/Index',
              ['blogs' => InertiaTest::all()]);
    }

    public function show($id) {
        // dd(InertiaTest::findOrfail($id));
        return Inertia::render('Inertia/Show',[
            'id' => $id,
            'blog' => InertiaTest::findOrfail($id)
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'title' => ['required','max:20'],
            'content' => ['required'],
        ]);
        $inertiaTest = new InertiaTest;
        // dd($inertiaTest);
        $inertiaTest->title = $request->title;
        // dd($request->title,$inertiaTest->title);
        $inertiaTest->content = $request->content;
        $inertiaTest->save();

        return to_route('inertia.index')
        ->with([
            'message' => '登録しました。'
        ]);
    }

    public function create() {
        return Inertia::render('Inertia/Create');
    }

    public function delete($id) {
        $blog = InertiaTest::findOrfail($id);
        $blog->delete();

        return to_route('inertia.index')
        ->with(['message' => '削除しました。']);
    }
}
