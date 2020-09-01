<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ResourceController as BaseController;
use App\Models\Course;
use App\Repositories\Eloquent\CourseCategoryRepository;
use App\Repositories\Eloquent\CourseRepository;
use Illuminate\Http\Request;

class CourseBaseResourceController extends BaseController
{
    public function __construct(
        CourseRepository $course,
        CourseCategoryRepository $categoryRepository
    )
    {
        parent::__construct();
        $this->repository = $course;
        $this->categoryRepository = $categoryRepository;
        $this->repository
            ->pushCriteria(\App\Repositories\Criteria\RequestCriteria::class);
    }
    public function index(Request $request)
    {
        if ($this->response->typeIs('json')) {
            $data = $this->repository
                ->where(['course_category_id' => $this->course_category_id])
                ->setPresenter(\App\Repositories\Presenter\CourseListPresenter::class)
                ->orderBy('year','desc')
                ->orderBy('month','desc')
                ->orderBy('id','asc')
                ->all();
            return $this->response
                ->success()
                ->data($data['data'])
                ->output();
        }
        return $this->response->title($this->category_data['name'])
            ->view('course.'.$this->category_slug.'.index')
            ->output();
    }
    public function create(Request $request)
    {
        $course = $this->repository->newInstance([]);

        return $this->response->title($this->category_data['name'])
            ->view('course.'.$this->category_slug.'.create')
            ->data(compact('course'))
            ->output();
    }
    public function store(Request $request)
    {
        try {
            $attributes = $request->all();

            if(isset($attributes['date'])) {
                $date_arr = explode('-', $attributes['date']);
                $attributes['year'] = $date_arr['0'];
                $attributes['month'] = $date_arr['1'];
            }
            $attributes['course_category_id'] = isset($attributes['course_category_id']) && !empty($attributes['course_category_id']) ? $attributes['course_category_id'] : $this->course_category_id;
            
            $course = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => $this->category_data['name']]))
                ->code(0)
                ->status('success')
                ->url(guard_url($this->main_url))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url($this->main_url))
                ->redirect();
        }
    }
    public function show(Request $request,Course $course)
    {
        if ($course->exists) {
            $view = $this->category_slug.'.show';
        } else {
            $view = $this->category_slug.'.create';
        }

        return $this->response->title($this->category_data['name'])
            ->data(compact('course'))
            ->view('course.'.$view)
            ->output();
    }
    public function update(Request $request,Course $course)
    {
        try {
            $attributes = $request->all();

            if(isset($attributes['date']))
            {
                $date_arr = explode('-',$attributes['date']);
                $attributes['year'] = $date_arr['0'];
                $attributes['month'] = $date_arr['1'];
            }

            $attributes['course_category_id'] = isset($attributes['course_category_id']) && !empty($attributes['course_category_id']) ? $attributes['course_category_id'] : $this->course_category_id;

            $course->update($attributes);

            return $this->response->message(trans('messages.success.updated', ['Module' => $this->category_data['name']]))
                ->code(0)
                ->status('success')
                ->url(guard_url($this->main_url))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url($this->main_url.'/' . $course->id))
                ->redirect();
        }
    }
    public function destroy(Request $request,Course $course)
    {
        try {
            $this->repository->forceDelete([$course->id]);

            return $this->response->message(trans('messages.success.deleted', ['Module' => $this->category_data['name']]))
                ->status("success")
                ->http_code(202)
                ->url(guard_url($this->main_url))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url($this->main_url))
                ->redirect();
        }
    }
    public function destroyAll(Request $request)
    {
        try {
            $data = $request->all();
            $ids = $data['ids'];
            $this->repository->forceDelete($ids);

            return $this->response->message(trans('messages.success.deleted', ['Module' => $this->category_data['name']]))
                ->status("success")
                ->http_code(202)
                ->url(guard_url($this->main_url))
                ->redirect();

        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url($this->main_url))
                ->redirect();
        }
    }
}
