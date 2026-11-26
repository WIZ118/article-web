<?php

namespace App\Laravel\Controllers\Portal;

use App\Laravel\Models\Article;
use App\Laravel\Requests\PageRequest;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function __construct() {}

    public function index(PageRequest $request)
    {
        $userId = Auth::guard('user')->id();
        $this->data['page_title'] = 'Dashboard';
        $this->data['stats'] = [
            'editable_pages' => 3,
            'published_articles' => Article::where('user_id', $userId)->count(),
            'site_status' => 'Live',
        ];
        $this->data['cms_pages'] = [
            ['title' => 'Home Page', 'subtitle' => 'Main landing page', 'route_path' => '/', 'sections' => 'Hero, highlights, articles', 'preview_route' => 'web.home', 'edit_route' => 'portal.cms.home'],
            ['title' => 'About Page', 'subtitle' => 'Organization information', 'route_path' => '/about', 'sections' => 'Heading, mission, team', 'preview_route' => 'web.about', 'edit_route' => 'portal.cms.about'],
            ['title' => 'Contact Page', 'subtitle' => 'Contact details', 'route_path' => '/contact', 'sections' => 'Form, address, social links', 'preview_route' => 'web.contact', 'edit_route' => 'portal.cms.contact'],
        ];
        $this->data['recent_articles'] = Article::where('user_id', $userId)
            ->orderByDesc('updated_at')
            ->limit(5)
            ->get()
            ->map(function (Article $article) {
                $image = 'assets/images/home1.svg';

                if ($article->filename && $article->getRawOriginal('directory')) {
                    $image = rtrim((string) $article->directory, '/').'/thumbnails/'.$article->filename;
                }

                return [
                    'title' => $article->name ?: 'Untitled article',
                    'image' => $image,
                    'uploaded_at' => $article->updated_at?->format('M j, Y') ?? '',
                    'url' => route('web.article', 'user-'.$article->id),
                ];
            });

        return view('portal.dashboard', $this->data);
    }

    public function cmsAbout(PageRequest $request)
    {
        $this->data['page_title'] = 'About Page';

        return view('portal.cms.about', $this->data);
    }

    public function cmsContact(PageRequest $request)
    {
        $this->data['page_title'] = 'Contact Page';

        return view('portal.cms.contact', $this->data);
    }
}
