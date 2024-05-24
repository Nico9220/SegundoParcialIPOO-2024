<?php

class Torneo {
    private $colPartidos;
    private $importePremio;

    public function __construct($importePremio){
        $this->colPartidos = [];
        $this->importePremio = $importePremio;
    }

    //Metodos GET
    public function getColPartidos(){
        return $this->colPartidos;
    }
    public function getImportePremio(){
        return $this->importePremio;
    }
    // Metodos SET
    public function setColPartidos($colPartidos){
        $this->colPartidos = $colPartidos;
    }
    public function setImportePremio($importePremio){
        $this->importePremio = $importePremio;
    }
    

    public function __toString(){
        $cadena = "Partidos: " . $this->getColPartidos() . "\n";
        $cadena .= "Importe para el premio: " . $this->getImportePremio() . "\n";
    }

    //Punto 4.
    public function ingresarPartido($objEquipo1, $objEquipo2, $fecha, $tipoPartido){
        $sinRegistro = false;
        $coleccionPart = $this->getColPartidos();
        if($sinRegistro && $objEquipo1->getCantJugadores() != $objEquipo2->getCantJugadores() || $objEquipo1->ogbCategoria->getIdCategoria() != $objEquipo2->objCategoria->getIdCategoria()){
            $sinRegistro = true;
        }
        if($sinRegistro == true && $tipoPartido == 'Futbol'){
            $partido = new PartidosFutbol($objEquipo1, $objEquipo2, $fecha);
        }else{
            $partido = new PartidosBasquet($objEquipo1, $objEquipo2, $fecha);
        }
        $coleccionPart[] = $partido;
        return $coleccionPart;
    }

    //Punto 6 
    public function darGanadores($deporte){
        $ganadores = [];
        $part = $this->getColPartidos();
        foreach ($part as $partidos){
            if ($partidos instanceof PartidosFutbol && $deporte === "futbol"){
                $ganadores [] = $partidos->darEquipoGanador();
            }elseif($partidos instanceof PartidosBasquet && $deporte === "basquet"){
                $ganadores [] = $partidos->darEquipoGanador();
            }
        }
        return $ganadores;
    }

    public function calcularPremioPartido($objPartido){
        
        $coeficiente = $objPartido->coeficientePartido();
        $premio = $coeficiente * $this->getImportePremio();
        $ganador = $objPartido->darEquipoGanador();
        $premioFinal = [
            'equipoGanador' => $ganador,
            'premioPartido' => $premio
        ];

        return $premioFinal;
    }
}

