<?php

namespace App\Http\Controllers\Pc;

use App\Repositories\Eloquent\PageCategoryRepository;
use App\Repositories\Eloquent\PageRepository;
use Route,Auth;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Http\Controllers\Pc\Controller as BaseController;

class NewsController extends BaseController
{
    public function __construct(PageRepository $page_repository,PageCategoryRepository $category_repository)
    {
        parent::__construct();
        $this->page_repository = $page_repository;
        $this->category_repository = $category_repository;
        $this->category_slug = 'news';
        $this->category_data = $category_repository->where(['slug' => $this->category_slug])->first();
        $this->category_id = $this->category_data['id'];
    }
    /**
     * Show dashboard for each user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search_key = $request->get('search_key',"");
        $news = app(Page::class)->when($search_key,function ($query) use ($search_key){
                return $query->where('title','like','%'.$search_key.'%');
            })
            ->where(['category_id' => $this->category_id])
            ->orderBy('hot_recommend','desc')
            //->orderBy('order','desc')
            //->orderBy('created_at','desc')
            ->orderBy('id','desc')
            ->paginate(6);

        return $this->response->title(trans('news.name'))
            ->view('news.index')
            ->data(compact('news','search_key'))
            ->output();
    }
    public function show(Request $request ,Page $news)
    {

        $news->increment('views_count');
        $previous = $this->page_repository
            ->where(['category_id' => $this->category_id])
            ->where([['id','<',$news->id]])
            ->orderBy('hot_recommend','desc')
            ->orderBy('order','desc')
            ->orderBy('created_at','desc')
            ->orderBy('id','desc')
            ->first();
        $next = $this->page_repository
            ->where(['category_id' => $this->category_id])
            ->where('id','>',$news->id)
            ->orderBy('hot_recommend','desc')
            ->orderBy('order','desc')
            ->orderBy('created_at','desc')
            ->orderBy('id','desc')
            ->first();

        $hot_recommend_news = $this->page_repository
            ->where(['category_id' => $this->category_id])
            ->where('hot_recommend',1)
            ->orderBy('hot_recommend','desc')
            ->orderBy('order','desc')
            ->orderBy('created_at','desc')
            ->orderBy('id','desc')
            ->limit(5)
            ->get();
        return $this->response->title($news['title'])
            ->view('news.show')
            ->data(compact('news','next','previous','hot_recommend_news'))
            ->output();
    }

}
