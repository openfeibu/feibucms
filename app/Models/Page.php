<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Models\BaseModel;
use App\Traits\Database\Slugger;
use App\Traits\Filer\Filer;
use App\Traits\Hashids\Hashids;
use App\Traits\Trans\Translatable;

class Page extends BaseModel
{
    use Filer, SoftDeletes, Hashids, Slugger, Translatable, LogsActivity;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    protected $config = 'model.page.page';

    protected $appends = ['image_url','Desc'];

    /**
     * Set the pages title and heading.
     *
     * @param  string  $value
     * @return void
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title']       = $value;
        $this->attributes['meta_title']  = $value;
    }
    public function setDescriptionAttribute($value)
    {
        $this->attributes['description']  = $value;
        $this->attributes['meta_description']  = $value;
    }
    public function category()
    {
        return $this->belongsTo('App\Models\PageCategory', 'category_id');
    }
    public function getImageUrlAttribute()
    {
        if(isset($this->attributes['image']) && !empty($this->attributes['image']))
        {
            if (strpos( $this->attributes['image'], 'http') === false) {
                return url("image/original"). $this->attributes['image'];
            }
            return  $this->attributes['image'];
        }
        return url("image/original").setting('default_image');
    }
    public function getDescriptionAttribute()
    {
        return isset($this->attributes['description']) && !empty($this->attributes['description']) ? $this->attributes['description'] : isset($this->attributes['content']) && !empty($this->attributes['content']) ? truncate($this->attributes['content'],50) : '';
    }
}
