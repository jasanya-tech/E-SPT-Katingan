<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;

class Index extends Component
{

    public $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = "Admin")
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $data = [
            "title" => $this->title
        ];
        return view('components.layouts.admin.index', $data);
    }
}
