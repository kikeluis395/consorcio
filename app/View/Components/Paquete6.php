<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Paquete6 extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public  $titulo, $abiertas, $enprocesos, $cerradas;

    public function __construct(  $titulo, $abiertas, $enprocesos, $cerradas)
    { 


        $this->titulo = $titulo;
        $this->abiertas = $abiertas;
        $this->enprocesos = $enprocesos;
        $this->cerradas = $cerradas;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.paquete6');
    }
}
