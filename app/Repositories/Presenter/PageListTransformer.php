<?php

namespace App\Repositories\Presenter;

use League\Fractal\TransformerAbstract;

class PageListTransformer extends TransformerAbstract
{
    public function transform(\App\Models\Page $page)
    {
        return [
            'id'      => $page->id,
            'slug'    => $page->slug,
            'url'     => $page->slug . '.html',
            'name'    => $page->name,
            'image'   => $page->image ? url("/image/original".$page->image) : '',
            'image_url'   => $page->image_url ? $page->image_url  : '',
            'file'    => $page->file,
            'heading' => $page->heading,
            'title'   => $page->title,
            'description' => $page->description,
            'keyword' => $page->keyword,
            'status'  => $page->status,
            'order'   => $page->order,
            'home_recommend' => $page->home_recommend,
            'hot_recommend' => $page->hot_recommend,
            'category_id' => $page->category_id,
            'views_count' => $page->views_count,
            'created_at' => format_date($page->created_at,'Y-m-d H:i:s'),
            'updated_at' => format_date($page->updated_at,'Y-m-d H:i:s'),
            'category_name' => $page->category->name,
        ];
    }
}
