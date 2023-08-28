<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class BlogTranslation extends Model
{
    use LogsActivity;
    public $timestamps = false;
    protected $fillable = ['name', 'description', 'alt', 'meta_title', 'meta_description'];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }
}
