<?php

namespace App\Http\Controllers\Pc;

use App\Repositories\Eloquent\NavRepository;
use App\Repositories\Eloquent\PageCategoryRepository;
use App\Repositories\Eloquent\PageRepository;
use Route,Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Pc\Controller as BaseController;

class ContactController extends BaseController
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

    public function contact_us()
    {
        $nav = get_nav();
        return $this->response->title($nav['name'])
            ->view('contact_us')
            ->output();
    }

}
