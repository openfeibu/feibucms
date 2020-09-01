<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Admin\SinglePageResourceController as BaseController;
use App\Http\Requests\PageRequest;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\PageRepositoryInterface;
use App\Models\Page;

/**
 * Resource controller class for page.
 */
class AboutResourceController extends BaseController
{
    public function __construct(PageRepositoryInterface $page)
    {
        parent::__construct($page);
        $this->slug = 'company-intro';
        $this->category_id = 22;
        $this->url = guard_url('page/about/show');
        $this->title = trans('page.about.name');
        $this->view_folder = 'page.about';
    }
}