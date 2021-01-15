<?php

namespace App\Http\Controllers\Pc;

use App\Repositories\Eloquent\PageCategoryRepository;
use App\Repositories\Eloquent\PageRepository;
use Route,Auth;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Http\Controllers\Pc\Controller as BaseController;

class CaseController extends BaseController
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
        $search_key = $request->get('search_key',"");

        $top_category = $this->pageCategoryRepository->findBySlug('case');
        $category_id = $request->get('category_id','0');

        $categories = $this->pageCategoryRepository->where('parent_id',$top_category->id)->orderBy('order','desc')->orderBy('id','asc')->get()->toArray();
        if(!$category_id)
        {
            $category_id = $categories['0']['id'];
        }
        $pages = Page::where('category_id',$category_id)
            ->orderBy('order','desc')
            ->orderBy('id','desc')
            ->paginate(12);
        if ($this->response->typeIs('json')) {
            $data['content'] = $this->response->layout('render')
                ->view('case.list')
                ->data(compact('pages'))->render()->getContent();

            $data['category_html'] = $this->response->layout('render')
                ->view('case.category_html')
                ->data(compact('categories','category_id'))->render()->getContent();

            return $this->response
                ->success()
                ->data($data)
                ->output();
        }
        return $this->response->title($top_category->name)
            ->view('case.index')
            ->data(compact('categories','category_id','pages','search_key'))
            ->output();
    }

    public function show(Request $request ,Page $case)
    {
        $page = $case;
        return $this->response->title($page['title'])
            ->setNotBanner(true)
            ->view('product.show')
            ->data(compact('page'))
            ->output();
    }

}
