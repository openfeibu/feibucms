<?php

namespace App\Http\Controllers\Pc;

use App\Repositories\Eloquent\NavRepository;
use App\Repositories\Eloquent\PageCategoryRepository;
use App\Repositories\Eloquent\PageRepository;
use Route,Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Pc\Controller as BaseController;

class AboutController extends BaseController
{
    public function __construct(
        PageRepository $page_repository,
        PageCategoryRepository $category_repository
    )
    {
        parent::__construct();
        $this->page_repository = $page_repository;
        $this->category_repository = $category_repository;
    }

    public function Profile(Request $request)
    {
        $slug = 'company-intro';
        $page =  $this->page_repository->findBySlug($slug);

        $route_name = request()->route()->getName();
        $nav = app(NavRepository::class)->where('slug',$route_name)->first();

        $navs = app(NavRepository::class)->where('parent_id',$nav->parent_id)->get();

        return $this->response->title($page['title'])
            ->view('about.show')
            ->data(compact('page','slug','nav','navs'))
            ->output();
    }
    public function Culture(Request $request)
    {
        $slug = 'culture';
        $page =  $this->page_repository->findBySlug($slug);

        $route_name = request()->route()->getName();
        $nav = app(NavRepository::class)->where('slug',$route_name)->first();

        $navs = app(NavRepository::class)->where('parent_id',$nav->parent_id)->get();

        return $this->response->title($page['title'])
            ->view('about.show')
            ->data(compact('page','slug','nav','navs'))
            ->output();
    }

}
