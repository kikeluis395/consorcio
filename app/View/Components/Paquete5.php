<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Paquete5 extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
     
    public  $mapa, $video, $titulo, $subtitle, $region, $abiertas, $enprocesos, $cerradas;

    public function __construct( $mapa, $video, $titulo, $subtitle, $region, $abiertas, $enprocesos, $cerradas)
    { 
        $this->mapa = $mapa;
        $this->video = $video;
        $this->titulo = $titulo;
        $this->subtitle = $subtitle;
        $this->region = $region;

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
        return view('components.paquete5');
    }
}
