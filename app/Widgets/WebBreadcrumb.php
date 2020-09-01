<?php namespace App\Widgets;

use App\Models\Permission;
use App\Repositories\Eloquent\NavRepository;
use Tree,Route;
use Teepluss\Theme\Theme;
use Teepluss\Theme\Widget;
use App\Models\NavCategory;

class WebBreadcrumb extends Widget {

    /**
     * Widget template.
     *
     * @var string
     */
    public $template = 'breadcrumb';

    /**
     * Watching widget tpl on everywhere.
     *
     * @var boolean
     */
    public $watch = false;

    /**
     * Arrtibutes pass from a widget.
     *
     * @var array
     */
    public $attributes = array();

    /**
     * Turn on/off widget.
     *
     * @var boolean
     */
    public $enable = true;

    /**
     * Code to start this widget.
     *
     * @return void
     */
    public function init(Theme $theme)
    {

    }

    /**
     * Logic given to a widget and pass to widget's view.
     *
     * @return array
     */
    public function run()
    {

        if(isset($this->attributes['nav_id']) && $this->attributes['nav_id'])
        {
            $nav = app(NavRepository::class)->where('id',$this->attributes['nav_id'])->first();
        }else{
            $route_name = request()->route()->getName();
            $nav = app(NavRepository::class)->where('slug',$route_name)->first();
        }

        if(!$nav)
        {
            $breadcrumbs = [];
        }
        else{
            $breadcrumbs = app(NavRepository::class)->navList($nav->id);
        }
        $count = count($breadcrumbs);

        $this->setAttribute('breadcrumbs',$breadcrumbs);
        $this->setAttribute('count',$count);

        $attrs = $this->getAttributes();

        return $attrs;
    }

}