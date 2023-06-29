<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SearchComponentFlexible extends Component
{
    /**
     * Create a new component instance.
     */
    public $fields=[];
    public $select;
    public $between=[];
    public $dates=[];
    public $url;
    public function __construct($url,$fields,$select,$dates,$between)
    {
        $this->url=$url;
        $this->fields=$fields;
        $this->select=$select;
        $this->dates=$dates;
        $this->between=$between;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.search-component-flexible');
    }
}
