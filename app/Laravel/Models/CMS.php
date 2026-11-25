<?php

namespace App\Laravel\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CMS extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'content',
    ];

    public static function home(): ?CMSHome
    {
        return (new CMSHome())->newQuery()->first();
    }

    public static function about(): ?CMSAbout
    {
        return (new CMSAbout())->newQuery()->first();
    }

    public static function contact(): ?CMSContact
    {
        return (new CMSContact())->newQuery()->first();
    }
}

class CMSHome extends CMS
{
    protected $table = 'cms_home';
}

class CMSAbout extends CMS
{
    protected $table = 'cms_about';
}

class CMSContact extends CMS
{
    protected $table = 'cms_contact';
}
