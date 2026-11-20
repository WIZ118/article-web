<?php

namespace App\Laravel\Controllers\Web;

use App\Laravel\Requests\PageRequest;

class MainController extends Controller
{
    public function __construct()
    {
        $this->data['articles'] = [
            [
                'id' => 1,
                'title' => 'Article 1',
                'summary' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi congue enim sed tempor commodo.',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi congue enim sed tempor commodo. Vestibulum eros magna, semper id vehicula eget, feugiat in lorem.',
                'image' => 'assets/images/article1.jpg',
                'author' => 'John Doe',
                'published_at' => '2026-06-10',
            ],
            [
                'id' => 2,
                'title' => 'Article 2',
                'summary' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi congue enim sed tempor commodo.',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi congue enim sed tempor commodo. Vestibulum eros magna, semper id vehicula eget, feugiat in lorem.',
                'image' => 'assets/images/article2.jpg',
                'author' => 'John Doe',
                'published_at' => '2026-06-11',
            ],
            [
                'id' => 3,
                'title' => 'Article 3',
                'summary' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi congue enim sed tempor commodo.',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi congue enim sed tempor commodo. Vestibulum eros magna, semper id vehicula eget, feugiat in lorem.',
                'image' => 'assets/images/article3.jpg',
                'author' => 'John Doe',
                'published_at' => '2026-06-12',
            ],
            [
                'id' => 4,
                'title' => 'Article 4',
                'summary' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi congue enim sed tempor commodo.',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi congue enim sed tempor commodo. Vestibulum eros magna, semper id vehicula eget, feugiat in lorem.',
                'image' => 'assets/images/article4.jpg',
                'author' => 'John Doe',
                'published_at' => '2026-06-13',
            ],
            [
                'id' => 5,
                'title' => 'Article 5',
                'summary' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi congue enim sed tempor commodo.',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi congue enim sed tempor commodo. Vestibulum eros magna, semper id vehicula eget, feugiat in lorem.',
                'image' => 'assets/images/article5.jpg',
                'author' => 'John Doe',
                'published_at' => '2026-06-14',
            ],
            [
                'id' => 6,
                'title' => 'Article 6',
                'summary' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi congue enim sed tempor commodo.',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi congue enim sed tempor commodo. Vestibulum eros magna, semper id vehicula eget, feugiat in lorem.',
                'image' => 'assets/images/article6.jpg',
                'author' => 'John Doe',
                'published_at' => '2026-06-15',
            ],
        ];
    }

    public function index(PageRequest $request)
    {
        $this->data['page_title'] = "Home Page";
        return view('web.home', $this->data);
    }

    public function about(PageRequest $request)
    {
        $this->data['page_title'] = "About Page";
        return view('web.about', $this->data);
    }

    public function article(PageRequest $request, $id = null)
    {
        $this->data['page_title'] = "Article Page";
        $this->data['article'] = collect($this->data['articles'])->firstWhere('id', (int) $id);

        if (!$this->data['article']) {
            abort(404);
        }

        return view('web.article', $this->data);
    }

    public function articles(PageRequest $request)
    {
        $this->data['page_title'] = "Articles Page";
        $search = strtolower(trim((string) $request->query('search')));
        $articles = collect($this->data['articles']);

        if ($search !== '') {
            $articles = $articles->filter(function (array $article) use ($search) {
                return str_contains(strtolower($article['title']), $search)
                    || str_contains(strtolower($article['summary']), $search);
            });
        }

        $this->data['articles'] = $articles->values()->all();
        $this->data['search'] = $search;
        return view('web.articles', $this->data);
    }

    public function contact(PageRequest $request)
    {
        $this->data['page_title'] = "Contact Page";
        return view('web.contact', $this->data);
    }

}
