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
        $blogs = Blog::where('title', 'like', '%' . $title . '%')->orderBy('id', 'desc')->paginate(10);

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

        Blog::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        $request->session()->flash('success', 'Blog Berhasil Ditambahkan.');

        return redirect()->route('blog');
    }

    public function show(string $id)
    {
        $blog = Blog::findOrFail($id);

        return view('blog-detail', ['blog' => $blog]);
    }

    public function edit(string $id)
    {
        $blog = Blog::findOrFail($id);

        return view('blog-edit', ['blog' => $blog]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|unique:blogs,title,' . $id . '|max:255',
            'description' => 'required',
        ]);

        Blog::findOrFail($id)->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $request->session()->flash('success', 'Blog Berhasil Edit.');

        return redirect()->route('blog');
    }

    public function destroy(Request $request, string $id)
    {
        Blog::findOrFail($id)->delete();

        $request->session()->flash('success', 'Blog Berhasil Dihapus.');

        return redirect()->route('blog');
    }

    public function restore(string $id)
    {
        Blog::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('blog');
    }
}
