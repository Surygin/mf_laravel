<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public $name;
    public $label;
    public $type;
    public $value;
    public $placeholder;
    public $class;

    public function __construct($name, $label = null, $type = 'text', $value = null, $placeholder = null, $class = 'form-control mb-2')
    {
        $this->name = $name;
        $this->label = $label ?? ucfirst(str_replace('_', ' ', $name));
        $this->type = $type;
        $this->value = $value;
        $this->placeholder = $placeholder ?? 'Введите ' . $this->label;
        $this->class = $class;
    }

    public function render()
    {
        return view('admin.components.form.input');
    }
}
