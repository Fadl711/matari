<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\Section;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades;
use Illuminate\Support\ServiceProvider;

class RiakServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        Facades\View::composer('*', function (View $view) {
            $section=Section::all();
            $posts=Post::all();
            $users=User::all();
            $sums=Comment::all();
            $view->with('section',$section);
            $view->with('users',$users);
            $view->with('postsAll',$posts);
            $view->with('comm',$sums);

        });
    }
}
