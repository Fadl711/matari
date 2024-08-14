<?php

namespace App\Providers;

use App\Models\Comment;
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
            $posts=Section::all();
            $ww=Post::all();
            $users=User::all();
            $sums=Comment::all();
            $view->with('posts',$posts);
            $view->with('users',$users);
            $view->with('ww',$ww);
            $view->with('comm',$sums);
        });
    }
}
