<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class selectComponent extends Component
{
    public $name;
    public $intitule;
    public $data;
    public $label;
    public function __construct($name,$intitule,$data,$label)
    {
        $this->name=$name;
        $this->intitule=$intitule;
        $this->data=$data;
        $this->label=$label;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select-component');
    }
}
