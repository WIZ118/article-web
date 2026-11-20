<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Requests\PageRequest;
use App\Laravel\Models\Admin;
use App\Laravel\Models\Article;
use App\Laravel\Models\User;

class MainController extends Controller
{
    public function __construct() {}
    public function index(PageRequest $request)
    {
        $this->data['page_title'] = "Dashboard";
        $this->data['stats'] = [
            'admin_accounts' => Admin::count(),
            'user_accounts' => User::count(),
            'published_articles' => Article::count(),
            'site_status' => 'Live',
        ];
        return view('backoffice.dashboard', $this->data);
    }
}
