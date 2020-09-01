<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\NavRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use Route;
use App\Models\Nav;

class NavRepository extends BaseRepository implements NavRepositoryInterface
{

    /**
     * Booting the repository.
     *
     * @return null
     */
    public function boot()
    {
        $this->fieldSearchable = config('model.nav.nav.search');
    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('model.nav.nav.model');
    }
    public function top($category_id)
    {
        return $this->where(['parent_id' => 0,'category_id' =>$category_id,'is_menu' => 1])->orderBy('order','desc')->orderBy('id','asc')->get();
    }

    public function topParent($id)
    {
        $nav = $this->where(['id' => $id])->first();
        if($nav->parent_id)
        {
            return $this->topParent($nav->parent_id);
        }
        return $nav;
    }
    public function children($parent_id)
    {
        return $this->where(['parent_id' => $parent_id])->orderBy('order','desc')->orderBy('id','asc')->get();
    }
    public function allNavs()
    {
        return $this->orderBy('category_id','asc')->orderBy('order','desc')->orderBy('id','asc')->get();
    }
    /**
     * Permission Menus
     * @return array
     */
    public function navs($category_id)
    {
        $menus = [];
        $father =$this->top($category_id);

        if($father) {
            foreach ($father as $item) {
                $item->active = ($item->slug == request()->route()->getName()) ? true : false;
                $item = $this->sub($item);
                $menus[] = $item;
            }
        }

        return $menus;
    }
    public function sub($item)
    {
        $sub = $this->children($item->id);
        if(!$sub->isEmpty())
        {
            foreach ($sub as $key => $sub_item)
            {
                $sub_item->active = $sub_item->slug == request()->route()->getName() ? true : false;
                $sub_item->sub = $this->sub($sub_item);
                $item->active ? true : $item->active  = $sub_item->active;
            }
            $item->sub = $sub;
        }
        return $item;
    }
    public function navList($id,$list=[])
    {
        $nav = $this->model->where('id',$id)->first();
        if(!$nav)
        {
            return $list;
        }
        array_unshift($list,$nav);
        if($nav->parent_id)
        {
            return $this->navList($nav->parent_id,$list);
        }
        return $list;
    }
    public function navTab($parent_id)
    {
        return $this->children($parent_id);
    }

    public function getAllNavSelectTree($parent_id=0)
    {

        $data = [];
        $navs = $this->where('parent_id',$parent_id)->orderBy('order','desc')->orderBy('id','asc')->get();
        foreach ($navs as $key => $nav)
        {
            $data[$key] = [
                'title' => $nav->name,
                'label' => $nav->name,
                'id' => $nav->id,
                'parent_id' => $nav->parent_id,
                'order' => $nav->order,
                'spread' => false
            ];
            $data[$key]['children'] = $this->getAllNavSelectTree($nav->id);
        }
        return $data;
    }

}
