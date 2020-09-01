<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ResourceController as BaseController;
use App\Http\Requests\PageRequest;
use App\Repositories\Eloquent\PageRepository;
use Illuminate\Http\Request;
use App\Models\Page;

/**
 * Resource controller class for page.
 */
class SinglePageResourceController extends BaseController
{
    public function __construct(PageRepository $page)
    {
        parent::__construct();
        $this->repository = $page;

        $this->repository = $this->repository
            ->pushCriteria(\App\Repositories\Criteria\RequestCriteria::class)
            ->pushCriteria(\App\Repositories\Criteria\PageResourceCriteria::class);
    }
    public function store(Request $request)
    {
        try {
            $attributes = $request->all();
            $attributes['slug'] = $this->slug;
            $attributes['category_id'] = $this->category_id;
            $page = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => $this->title]))
                ->http_code(204)
                ->status('success')
                ->url($this->url)
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url($this->url)
                ->redirect();
        }
    }
    public function show(Request $request)
    {
        $page = $this->repository->getPage($this->slug);

        if(!empty($page))
        {
            $view = $this->view_folder.'.show';
        }else{
            $page = $this->repository->newInstance([]);
            $view = $this->view_folder.'.create';
        }

        return $this->response->title($page->title)
            ->data([
                'page' => $page,
                'url' => $this->url
            ])
            ->view($view)
            ->output();
    }
    public function update(Request $request,Page $page)
    {
        try {
            $attributes = $request->all();

            $page->update($attributes);
            return $this->response->message(trans('messages.success.updated', ['Module' => $this->title]))
                ->http_code(204)
                ->status('success')
                ->url($this->url)
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url($this->url)
                ->redirect();
        }
    }

}