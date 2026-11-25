<?php

class RegistroTexto {


    //propiedades
    private string $_cadena;
    private DateTime $_fechaHora;

    public function __construct(string $cad) 
    {
        $this->_cadena = $cad;
        $this->_fechaHora = new DateTime();
    }

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