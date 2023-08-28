<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class CategoryTranslation extends Model
{
    use LogsActivity;

    public $timestamps = false;
    protected $fillable = ['name', 'description', 'meta_title', 'meta_description'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }
}
