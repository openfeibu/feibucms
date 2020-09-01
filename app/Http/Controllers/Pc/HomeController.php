<?php

namespace App\Http\Controllers\Pc;

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
        $banners = Banner::orderBy('order','asc')->orderBy('id','asc')->get();
        return $this->response->title('首页')
            ->layout('home')
            ->view('home')
            ->data(compact('banners'))
            ->output();
    }

}
