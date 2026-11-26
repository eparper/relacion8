<?php

class RegistroTexto {


    //propiedades
    private string $_cadena;
    private DateTime $_fechaHora;

    /**
     * Constructor de RegistroTexto al que se le pasa
     * una cadena y registra la fecha - hora de cuando se ha escrito el texto
     *
     * @param string $cad Se le pasa una cadena del texto a registrar
     */
    public function __construct(string $cad) 
    {
        $this->_cadena = $cad;
        $this->_fechaHora = new DateTime();
    }

    //getters
    public function getCadena():string {
        return $this->_cadena;
    }

    public function getFechaHora():DateTime {
        return $this->_fechaHora;
    }

    
    //PARA QUE NO TENGA SOBRECARGA:
    //métodos mágicos para control de la sobrecarga
    public function __set(string $name, mixed $value):void {
        throw new \Exception("La propiedad $name no existe");
        
    }

    public function __get(string $name):mixed {
        throw new \Exception("La propiedad $name no existe");
    }

    public function __isset(string $name):bool
    {
        //throw new \Exception('Not implemented');
        return false;
    }

    public function __unset(string $name):void
    {
        //throw new \Exception('Not implemented');
        ;
    }


}