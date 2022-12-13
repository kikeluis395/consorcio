<?php

namespace App\Mail;

use App\Models\Empresa;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistroExitoso extends Mailable
{
    use Queueable, SerializesModels;
    
    public $empresa;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Empresa $empresa)
    {
        $this->empresa = $empresa;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this->from('no-reply@consorciogczorion.pe' , 'Consorcio GCZ - ORION')
        ->view('mail.registroExitoso')
        ->subject('Registro exitoso!');

        foreach($this->empresa->archivos as $rutaArchivo){
            $mail->attach($rutaArchivo->getRealPath(), [
                'as' => $rutaArchivo->getClientOriginalName()
            ]);
        }
        
        return $mail; 
    }
}
