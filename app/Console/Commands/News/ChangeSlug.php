<?php

namespace App\Console\Commands\News;

use App\Models\News;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Redirect;

class ChangeSlug extends Command
{
    protected $signature = 'change_news_slug {oldSlug} {newSlug}';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $oldSlug = $this->argument('oldSlug');
        $newSlug = $this->argument('newSlug');

        if ($oldSlug === $newSlug) {
            $this->error('Arguments must be different');
            return 1;
        }

        $from = route('news_item', ['slug' => $oldSlug], false);
        $to = route('news_item', ['slug' => $newSlug], false);
        $redirect = Redirect::query()
            ->where('old_slug', $from)
            ->where('new_slug', $to)
            ->first();
        if ($redirect) {
            $this->error('This slug already exist');
            return 1;
        }

        $news = News::where('slug', $oldSlug)->first();
        if (!$news) {
            $this->error('New not found');
            return 1;
        }

        DB::transaction(function () use ($news, $newSlug, $to) {
            Redirect::where('old_slug', $to)->delete();

            $news->slug = $newSlug;
            $news->save();
        });

        return 0;
    }

}
