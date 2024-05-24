<?php

class PartidosBasquet extends Partido{
    private $cantInfracciones;
    private $coefPenalizacion;

    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2, $cantInfracciones){
        parent :: __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
        $this->cantInfracciones = $cantInfracciones;
        $this->coefPenalizacion = 0.75;
    }

    //Metodos GET
    public function getCantInfracciones(){
        return $this->cantInfracciones;
    }
    public function getCoefPenalizacion(){
        return $this->coefPenalizacion;
    }
    //Metodos SET
    public function setCantInfracciones($cantInfracciones){
        $this->cantInfracciones = $cantInfracciones;
    }
    public function setCoefPenalizacion($coefPenalizacion){
        $this->coefPenalizacion = $coefPenalizacion;
    }

    public function __toString(){
        $cadena = "Cantidad de infracciones: " . $this->getCantInfracciones() . "\n";
        $cadena .= "Coeficiente Penalizacion: " . $this->getCoefPenalizacion() . "\n";
        return $cadena;
    }
}