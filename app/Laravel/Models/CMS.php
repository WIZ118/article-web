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
        'badge_text',
        'primary_button_label',
        'secondary_button_label',
        'featured_label',
        'featured_title',
        'featured_link_label',
        'section_label',
        'mission_title',
        'mission_content',
        'vision_title',
        'vision_content',
        'contact_button_label',
        'email',
        'phone',
        'office',
        'support_badge',
        'support_title',
        'support_content',
    ];

    public static function home(?int $userId = null): ?CMSHome
    {
        if ($userId === null) {
            return null;
        }

        return (new CMSHome)->newQuery()->where('user_id', $userId)->first();
    }

    public static function about(?int $userId = null): ?CMSAbout
    {
        if ($userId === null) {
            return null;
        }

        return (new CMSAbout)->newQuery()->where('user_id', $userId)->first();
    }

    public static function contact(?int $userId = null): ?CMSContact
    {
        if ($userId === null) {
            return null;
        }

        return (new CMSContact)->newQuery()->where('user_id', $userId)->first();
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
