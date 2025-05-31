<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::all();
        return view('dashboard.news.index', compact('news'));
    }

    public function updateStatus(News $news, $status)
    {
        if (in_array($status, ['pending', 'published', 'archived'])) {
            $news->update(['status' => $status]);
            return redirect()->back()->with('success', 'Status berhasil diperbarui.');
        }

        return redirect()->back()->with('error', 'Status tidak valid.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required',
            'thumbnail_path' => 'nullable|image|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('thumbnail_path')) {
            $image      = $request->file('thumbnail_path');
            $extension  = $image->getClientOriginalExtension();
            $filename   = $request->title . '-thumbnail.' . $extension;

            $path = $image->storeAs('news', $filename, 'public');
        }

        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'thumbnail_path' => $path
        ]);

        return redirect()->route('news.index')->with('success', 'Berita Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        // $news = News::findOrFail($);
        return view('dashboard.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('dashboard.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required',
            'thumbnail_path' => 'nullable|image|max:2048',
        ]);

        $path = $news->thumbnail_path;

        if ($request->hasFile('thumbnail_path')) {
            // Hapus file lama jika ada
            if ($path && Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }

            $image     = $request->file('thumbnail_path');
            $extension = $image->getClientOriginalExtension();
            $filename  = $request->title . '-thumbnail.' . $extension;
            $path      = $image->storeAs('news', $filename, 'public');
        }

        $news->update([
            'title' => $request->title,
            'content' => $request->content,
            'thumbnail_path' => $path,
        ]);

        return redirect()->route('news.index')->with('success', 'Berita Berhasil Diedit.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        if ($news->thumbnail_path) {
            Storage::disk('public')->delete($news->thumbnail_path);
        }

        $news->delete();

        return redirect()->route('news.index')->with('success', 'Berita Berhasil Dihapus.');
    }
}
