<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    function index(Request $request)
    {
        $title = $request->title;
        $blogs = DB::table('blogs')->where('title', 'like', '%' . $title . '%')->orderBy('id', 'desc')->paginate(10);

        return view('blog', ['blogs' => $blogs, 'title' => $title]);
    }

    public function add()
    {
        return view('blog-add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:blogs|max:255',
            'description' => 'required',
        ]);

        DB::table('blogs')->insert([
            'title' => $request->title,
            'description' => $request->description,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $request->session()->flash('success', 'Blog Berhasil Ditambahkan.');

        return redirect()->route('blog');
    }

    public function show(string $id)
    {
        $blog = DB::table('blogs')->where('id', $id)->first();
        if (!$blog) {
            abort(404);
        }
        return view('blog-detail', ['blog' => $blog]);
    }

    public function edit(string $id)
    {
        $blog = DB::table('blogs')->where('id', $id)->first();
        if (!$blog) {
            abort(404);
        }
        return view('blog-edit', ['blog' => $blog]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|unique:blogs,title,' . $id . '|max:255',
            'description' => 'required',
        ]);

        DB::table('blogs')->where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $request->session()->flash('success', 'Blog Berhasil Edit.');

        return redirect()->route('blog');
    }

    public function destroy(Request $request, string $id)
    {
        DB::table('blogs')->where('id', $id)->delete();
        $request->session()->flash('success', 'Blog Berhasil Dihapus.');
        return redirect()->route('blog');
    }
}
