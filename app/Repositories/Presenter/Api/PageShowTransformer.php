<?php

namespace App\Repositories\Presenter\Api;

use League\Fractal\TransformerAbstract;

class PageShowTransformer extends TransformerAbstract
{
    public function transform(\App\Models\Page $page)
    {
        return [
            'id' => $page->id,
            'name' => $page->name,
            'heading' => $page->heading,
            'title' => $page->title,
            'description' => $page->description ? $page->description : get_substr(strip_tags($page->content),200),
            'content' => replace_image_url($page->content,config('app.image_url')),
            'image' => handle_image_url($page->image,config('app.image_url').'/image/original'),
            'date' => $page->updated_at->format('Y-m-d'),
            'views_count' => $page->views_count,
            'meta_title' => $page->meta_title,
            'meta_keyword' => $page->meta_keyword,
            'meta_description' => $page->meta_description,
        ];
    }
}
