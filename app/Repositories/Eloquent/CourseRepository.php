<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\CourseRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class CourseRepository extends BaseRepository implements CourseRepositoryInterface
{

    public function boot()
    {
        $this->fieldSearchable = config('model.course.course.search');
    }
    public function model()
    {
        return config('model.course.course.model');
    }

}