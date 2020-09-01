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
class CultureResourceController extends BaseController
{
    public function __construct(PageRepositoryInterface $page)
    {
        parent::__construct($page);
        $this->slug = 'culture';
        $this->category_id = 22;
        $this->url = guard_url('page/culture/show');
        $this->title = trans('page.culture.name');
        $this->view_folder = 'page.culture';
    }
}