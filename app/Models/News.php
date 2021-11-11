<?php

namespace App\Models;

use \Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory, Sluggable;

    public $title;

    public function sluggable(): array
    {
        return [
            "slug" => [
                'source' => "title"
            ]
        ];
    }
}
