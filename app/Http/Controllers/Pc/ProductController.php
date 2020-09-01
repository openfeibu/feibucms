<?php

namespace App\Http\Controllers\Pc;

use App\Repositories\Eloquent\PageCategoryRepository;
use App\Repositories\Eloquent\PageRepository;
use Route,Auth;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Http\Controllers\Pc\Controller as BaseController;

class ProductController extends BaseController
{
    public function __construct(
        PageRepository $pageRepository,
        PageCategoryRepository $pageCategoryRepository
    )
    {
        parent::__construct();
        $this->repository = $pageRepository;
        $this->pageCategoryRepository = $pageCategoryRepository;

    }
    public function index(Request $request)
    {
        $page_category = $this->pageCategoryRepository->findBySlug('product');
        $first = $this->repository->where('category_id',$page_category->id)->orderBy('order','desc')->orderBy('id','asc')->first();
        if(!$first)
        {
            return redirect('/');
        }
        return  redirect()->route('pc.product.show',['id' => $first->id]);
    }

    public function show(Request $request ,Page $product)
    {
        $page = $product;
        return $this->response->title($page['title'])
            ->setNotBanner(true)
            ->view('product.show')
            ->data(compact('page'))
            ->output();
    }

}
