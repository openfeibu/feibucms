<?php namespace App\Widgets;

use App\Models\Permission;
use App\Repositories\Eloquent\NavRepository;
use Tree,Route;
use Teepluss\Theme\Theme;
use Teepluss\Theme\Widget;
use App\Models\NavCategory;

class NavTab extends Widget {

    /**
     * Widget template.
     *
     * @var string
     */
    public $template = 'nav_tab';

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
            if(isset($this->attributes['type']) && $this->attributes['type'] == 'show')
            {
                $nav = app(NavRepository::class)->where('id',$nav->parent_id)->first();
            }
        }

        if(!$nav)
        {
            $nav_tabs = [];
        }
        else{
            $nav_tabs = app(NavRepository::class)->navTab($nav->parent_id);
        }
        $count = count($nav_tabs);

        $this->setAttribute('nav',$nav);
        $this->setAttribute('nav_tabs',$nav_tabs);
        $this->setAttribute('count',$count);

        $attrs = $this->getAttributes();

        return $attrs;
    }

}