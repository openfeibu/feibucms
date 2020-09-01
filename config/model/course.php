<?php

return [

/*
 * Modules .
 */
    'modules'  => ['course'],


/*
 * Views for the page  .
 */
    'views'    => ['default' => 'Default', 'left' => 'Left menu', 'right' => 'Right menu'],

// Modale variables for page module.
    'course'     => [
        'model'        => 'App\Models\Course',
        'table'        => 'courses',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        //'slugs'        => ['slug' => 'name'],
        'fillable'     => ['course_category_id','description','image','year','month'],
        'translate'    => ['course_category_id','description','image','year','month'],
        'upload_folder' => '/course',
        'encrypt'      => ['id'],
        'revision'     => ['title'],
        'perPage'      => '20',
        'search'        => [
            'description' => 'like',
        ],
    ],
    'course_category'     => [
        'model'        => 'App\Models\CourseCategory',
        'table'        => 'course_categories',
        'primaryKey'   => 'id',
        'hidden'       => [],
        'visible'      => [],
        'guarded'      => ['*'],
        //'slugs'        => ['slug' => 'name'],
        'fillable'     => ['name','order','slug'],
        'translate'    => ['name','order','slug'],
        'upload_folder' => '/course',
        'encrypt'      => ['id'],
        'revision'     => ['title'],
        'perPage'      => '20',
        'search'        => [
            'name' => 'like',
        ],
    ],
];
