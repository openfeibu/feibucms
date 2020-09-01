<?php

namespace App\Repositories\Presenter;

use League\Fractal\TransformerAbstract;

class CourseListTransformer extends TransformerAbstract
{
    public function transform(\App\Models\Course $course)
    {
        return [
            'id' => $course->id,
            'year' => $course->year,
            'month' => $course->month,
            'description' => $course->description,
            'date' => $course->year.'-'.$course->month,
            //'image' => $course->image ? url("/image/original".$course->image) : '',
        ];
    }
}
