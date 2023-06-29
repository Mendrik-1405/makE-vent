<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormComponent extends Component
{

    public $fields;
    public $table;
    public $instance;
    public $select;

    public function __construct($table,$instance)
    {
        $this->fields=$instance->getFillable();
        $this->table=$table;
        $this->instance=$instance;
        $this->select=$instance->select;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-component');
    }

}
