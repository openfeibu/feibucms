<?php

namespace App\Repositories\Presenter;

use App\Repositories\Presenter\FractalPresenter;

class CourseListPresenter extends FractalPresenter
{

    /**
     * Prepare data to present
     *
     * @return \App\Repositories\Eloquent\Presenter\CourseListTransformer
     */
    public function getTransformer()
    {
        return new CourseListTransformer();
    }
}
