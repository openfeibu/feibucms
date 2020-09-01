<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use App\Models\BaseModel;
use App\Traits\Database\Slugger;
use App\Traits\Filer\Filer;
use App\Traits\Hashids\Hashids;
use App\Traits\Trans\Translatable;

class Nav extends BaseModel
{
    use Filer, Hashids, Slugger, Translatable, LogsActivity;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    protected $config = 'model.nav.nav';

    public $timestamps = false;

    public $appends = ['category_name'];

    public function category()
    {
        return $this->belongsTo('App\Models\NavCategory', 'category_id');
    }
    public function getCategoryNameAttribute()
    {
        return isset($this->attributes['category_id']) && $this->attributes['category_id'] ? NavCategory::where('id',$this->attributes['category_id'])->value('name') : '';
    }
    public function setParentIdAttribute($value)
    {
        $this->attributes['parent_id']        = $value ?? 0;

    }
}
