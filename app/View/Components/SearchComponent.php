<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\View\Component\selectComponent;
class SearchComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $fields=[];
    public $select;
    public $between=[];
    public $table;
    public $instance;

    public function __construct($instance,$table)
    {
        $this->fields=$instance->searchable;
        $this->select=$instance->select;
        $this->between=$instance->between;
        $this->table=$table;
        $this->instance=$instance;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.search-component');
    }
}
