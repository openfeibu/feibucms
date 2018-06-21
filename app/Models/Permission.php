<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Traits\Database\Slugger;
use App\Traits\Filer\Filer;
use App\Traits\Hashids\Hashids;
use App\Traits\Repository\PresentableTrait;
use App\Traits\Trans\Translatable;
use App\Traits\Roles\PermissionHasRelations;

class Permission extends BaseModel
{
    use Filer, Hashids, Slugger, Translatable,  PresentableTrait, PermissionHasRelations;


    /**
     * Configuartion for the model.
     *
     * @var array
     */
     protected $config = 'model.roles.permission.model';

	public function getSlugIdAttribute()
	{
	    return $this->slug . '.' . $this->id;
	}

}
