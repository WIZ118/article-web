<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Requests\PageRequest;

class MainController extends Controller
{
    public function __construct() {}
    public function index(PageRequest $request)
    {
        $this->data['page_title'] = "Home Page";
        return view('backoffice.home', $this->data);
    }

    public function about(PageRequest $request)
    {
        $this->data['page_title'] = "About Page";
        return view('backoffice.about', $this->data);
    }

    public function article(PageRequest $request)
    {
        $this->data['page_title'] = "Article Page";
        return view('backoffice.article', $this->data);
    }

    public function articles(PageRequest $request)
    {
        $this->data['page_title'] = "Articles Page";
        return view('backoffice.articles', $this->data);
    }

    public function contact(PageRequest $request)
    {
        $this->data['page_title'] = "Contact Page";
        return view('backoffice.contact', $this->data);
    }
}
