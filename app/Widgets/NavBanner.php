<?php namespace App\Widgets;

use Tree;
use Teepluss\Theme\Theme;
use Teepluss\Theme\Widget;
use App\Models\NavCategory;

class NavBanner extends Widget {

    /**
     * Widget template.
     *
     * @var string
     */
    public $template = 'nav_banner';

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
        $current_nav = get_nav();

        $top_nav = app('nav_repository')->topParent($current_nav['id']);

        $this->setAttribute('top_nav',$top_nav);

        $attrs = $this->getAttributes();

        return $attrs;
    }

}