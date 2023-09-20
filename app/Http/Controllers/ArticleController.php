<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'posted_date' => 'required|date',
            'title' => 'required|string|max:255',
            'article_contents' => 'required|string',
        ]);

        $article->update([
            'posted_date' => $request->input('posted_date'),
            'title' => $request->input('title'),
            'article_contents' => $request->input('article_contents'),
        ]);

        return redirect()->route('admin.articles.edit', $article)->with('success', 'お知らせが更新されました。');
    }
}
