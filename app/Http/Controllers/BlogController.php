<?php

namespace App\Http\Controllers;

use App\Jobs\BlogIndexData;
use App\Http\Requests;
use App\Post;
use App\Tag;
use App\Services\RssFeed;
// 在控制器顶部添加如下use语句
use App\Services\SiteMap;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $tag = $request->get('tag');
        $data = $this->dispatch(new BlogIndexData($tag));
        $layout = $tag ? Tag::layout($tag) : 'blog.layouts.index';

        return view($layout, $data);
    }

    public function showPost($slug, Request $request)
    {
        $post = Post::with('tags')->whereSlug($slug)->firstOrFail();
        $tag = $request->get('tag');
        if ($tag) {
            $tag = Tag::whereTag($tag)->firstOrFail();
        }

        return view($post->layout, compact('post', 'tag'));
    }

    // 同时在控制器中添加如下这个方法
    public function rss(RssFeed $feed)
    {
        $rss = $feed->getRSS();

        return response($rss)
        ->header('Content-type', 'application/rss+xml');
    }

    // 同时在控制器中新增这个方法
    public function siteMap(SiteMap $siteMap)
    {
        $map = $siteMap->getSiteMap();

        return response($map)
        ->header('Content-type', 'text/xml');
    }
}
