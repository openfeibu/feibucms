<?php

namespace App\Http\Controllers\Pc;

use App\Repositories\Eloquent\CourseCategoryRepository;
use App\Repositories\Eloquent\CourseRepository;
use App\Repositories\Eloquent\NavRepository;
use Route,Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Pc\Controller as BaseController;

class CourseController extends BaseController
{
    public function __construct(
        CourseRepository $course_repository,
        CourseCategoryRepository $category_repository
    )
    {
        parent::__construct();
        $this->course_repository = $course_repository;
        $this->category_repository = $category_repository;
    }


    public function development_course(Request $request)
    {
        $category_slug = 'development_course';
        return $this->base($request,$category_slug);
    }

    public function base($request,$category_slug)
    {
        $category = $this->category_repository->where('slug',$category_slug)->first();

        $courses =  $this->course_repository
            ->where('course_category_id',$category->id)
            ->orderBy('year','desc')
            ->orderBy('month','desc')
            ->orderBy('id','asc')
            ->get();

        $nav = get_nav();

        return $this->response->title($nav->name)
            ->view('course.index')
            ->data(compact('courses'))
            ->output();
    }

}
