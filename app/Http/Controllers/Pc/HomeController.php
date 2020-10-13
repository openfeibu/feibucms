<?php

namespace App\Http\Controllers\Pc;

use App\Models\PageCategory;
use Illuminate\Http\Request;
use Route,Auth;
use App\Models\Banner;
use App\Http\Controllers\Pc\Controller as BaseController;


class HomeController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Show dashboard for each user.
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function home(Request $request)
    {
        $case_category_ids = PageCategory::where('parent_id',3)->pluck('id')->toArray();
        $banners = Banner::orderBy('order','asc')->orderBy('id','asc')->get();
        return $this->response->title('首页')
            ->layout('home')
            ->view('home')
            ->data(compact('banners','case_category_ids'))
            ->output();
    }

}
