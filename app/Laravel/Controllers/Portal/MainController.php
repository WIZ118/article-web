<?php

namespace App\Laravel\Controllers\Portal;

use App\Laravel\Requests\PageRequest;

class MainController extends Controller
{
    public function __construct() {}
    public function index(PageRequest $request)
    {
        $this->data['page_title'] = "Home Page";
        return view('portal.home', $this->data);
    }

    public function about(PageRequest $request)
    {
        $this->data['page_title'] = "About Page";
        return view('portal.about', $this->data);
    }

    public function article(PageRequest $request)
    {
        $this->data['page_title'] = "Article Page";
        return view('portal.article', $this->data);
    }

    public function articles(PageRequest $request)
    {
        $this->data['page_title'] = "Articles Page";
        return view('portal.articles', $this->data);
    }

    public function contact(PageRequest $request)
    {
        $this->data['page_title'] = "Contact Page";
        return view('portal.contact', $this->data);
    }
}
