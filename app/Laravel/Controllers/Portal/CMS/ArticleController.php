<?php

namespace App\Laravel\Controllers\Portal\CMS;

use App\Laravel\Controllers\Portal\Controller;
use App\Laravel\Models\Article;
use App\Laravel\Requests\PageRequest;
use App\Laravel\Requests\Portal\CMS\ArticleRequest;
use App\Laravel\Services\ImageUploader;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index(PageRequest $request)
    {
        $this->data['page_title'] = 'Manage Articles';
        $this->data['articles'] = Article::where('user_id', Auth::guard('user')->id())
            ->orderByDesc('updated_at')
            ->get();

        return view('portal.cms.articles', $this->data);
    }

    public function store(ArticleRequest $request)
    {
        $article = new Article;
        $article->user_id = Auth::guard('user')->id();
        $article->name = $request->input('name');
        $article->description = $request->input('description');

        $this->setArticleImage($article, $request);
        $article->save();

        session()->flash('notification-status', 'success');
        session()->flash('notification-msg', 'Article successfully created.');

        return redirect()->route('portal.cms.articles');
    }

    public function update(ArticleRequest $request, $id)
    {
        $article = Article::where('user_id', Auth::guard('user')->id())
            ->whereKey($id)
            ->firstOrFail();

        $article->name = $request->input('name');
        $article->description = $request->input('description');

        $this->setArticleImage($article, $request);
        $article->save();

        session()->flash('notification-status', 'success');
        session()->flash('notification-msg', 'Article successfully updated.');

        return redirect()->route('portal.cms.articles');
    }

    public function destroy(PageRequest $request, $id)
    {
        $article = Article::where('user_id', Auth::guard('user')->id())
            ->whereKey($id)
            ->firstOrFail();

        $article->delete();

        session()->flash('notification-status', 'success');
        session()->flash('notification-msg', 'Article successfully deleted.');

        return redirect()->route('portal.cms.articles');
    }

    private function setArticleImage(Article $article, ArticleRequest $request): void
    {
        if (! $request->hasFile('image')) {
            return;
        }

        $image = ImageUploader::uploadAutoResize($request->file('image'), 'uploads/articles/images');

        if (! isset($image['path'], $image['directory'], $image['filename'], $image['source'])) {
            throw new \RuntimeException('Article image upload did not return the expected file details.');
        }

        $article->path = $image['path'];
        $article->directory = $image['directory'];
        $article->filename = $image['filename'];
        $article->source = $image['source'];
    }
}
