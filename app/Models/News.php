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

    public function save(array $options = []): bool
    {
        if ($this->exists && $this->isDirty('slug')) {
            $oldSlug = $this->getOriginal('slug');
            $newSlug = $this->slug;

            $fromOld = route('news_item', ['slug' => $oldSlug], false);
            $toNew = route('news_item', ['slug' => $newSlug], false);

            $redirect = new Redirect();
            $redirect->old_slug = $fromOld;
            $redirect->new_slug = $toNew;
            $redirect->save();
        }
        return parent::save($options);
    }
}
