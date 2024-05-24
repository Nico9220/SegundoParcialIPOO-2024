<?php

class PartidosFutbol extends Partido{
    private $coefMenores;
    private $coefJuveniles;
    private $coefMayores;

    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2){
        parent :: __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
        $this->coefMenores = 0.13;
        $this->coefJuveniles = 0.19;
        $this->coefMayores = 0.27;
    }

    //Metodos GET
    public function getCoefMenores(){
        return $this->coefMenores;
    }
    public function getCoefJuveniles(){
        return $this->coefJuveniles;
    }
    public function getCoefMayores(){
        return $this->coefMayores;
    }
    //Metodos SET
    public function setCoefMenores($coefMenores){
        $this->coefMenores = $coefMenores;
    }
    public function setCoefJuveniles($coefJuveniles){
        $this->coefJuveniles = $coefJuveniles;
    }
    public function setCoefMayores($coefMayores){
        $this->coefMayores = $coefMayores;
    }

    public function __toString(){
        $cadena = "Coeficiente Menores: " . $this->getCoefMenores() . "\n";
        $cadena .= "Coeficiente Juveniles: " . $this->getCoefJuveniles() . "\n";
        $cadena .= "Coeficiente Mayores: " . $this->getCoefMayores() . "\n";
        return $cadena;
    }

}