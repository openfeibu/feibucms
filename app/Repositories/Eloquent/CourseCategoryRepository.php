<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\CourseCategoryRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class CourseCategoryRepository extends BaseRepository implements CourseCategoryRepositoryInterface
{

    public function boot()
    {
        $this->fieldSearchable = config('model.course.course_category.search');
    }
    public function model()
    {
        return config('model.course.course_category.model');
    }

}