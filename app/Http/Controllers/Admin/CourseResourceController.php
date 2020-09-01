<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ResourceController as BaseController;
use App\Models\course;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\CourseRepositoryInterface;

class CourseResourceController extends BaseController
{
    public function __construct(CourseRepositoryInterface $course)
    {
        parent::__construct();
        $this->repository = $course;
        $this->repository
            ->pushCriteria(\App\Repositories\Criteria\RequestCriteria::class);
    }
    public function index(Request $request)
    {
        if ($this->response->typeIs('json')) {
            $data = $this->repository
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
        return $this->response->title(setting('station_name'))
            ->view('course.index')
            ->output();
    }
    public function create(Request $request)
    {
        $course = $this->repository->newInstance([]);

        return $this->response->title(setting('station_name'))
            ->view('course.create')
            ->data(compact('course'))
            ->output();
    }
    public function store(Request $request)
    {
        try {
            $attributes = $request->all();

            $date_arr = explode('-',$attributes['date']);
            $attributes['year'] = $date_arr['0'];
            $attributes['month'] = $date_arr['1'];

            $course = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('course.name')]))
                ->code(0)
                ->status('success')
                ->url(guard_url('course/'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('course'))
                ->redirect();
        }
    }
    public function show(Request $request,Course $course)
    {
        if ($course->exists) {
            $view = 'course.show';
        } else {
            $view = 'course.create';
        }

        return $this->response->title(trans('app.view') . ' ' . trans('course.name'))
            ->data(compact('course'))
            ->view($view)
            ->output();
    }
    public function update(Request $request,Course $course)
    {
        try {
            $attributes = $request->all();

            $date_arr = explode('-',$attributes['date']);
            $attributes['year'] = $date_arr['0'];
            $attributes['month'] = $date_arr['1'];

            $course->update($attributes);

            return $this->response->message(trans('messages.success.updated', ['Module' => trans('course.name')]))
                ->code(0)
                ->status('success')
                ->url(guard_url('course/'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('course/'))
                ->redirect();
        }
    }
    public function destroy(Request $request,Course $course)
    {
        try {
            $this->repository->forceDelete([$course->id]);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('course.name')]))
                ->status("success")
                ->http_code(202)
                ->url(guard_url('course'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('course'))
                ->redirect();
        }
    }
    public function destroyAll(Request $request)
    {
        try {
            $data = $request->all();
            $ids = $data['ids'];
            $this->repository->forceDelete($ids);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('course.name')]))
                ->status("success")
                ->http_code(202)
                ->url(guard_url('course'))
                ->redirect();

        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('course'))
                ->redirect();
        }
    }
}
