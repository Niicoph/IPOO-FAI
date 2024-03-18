<?php 

class Fecha {
    //Atributos 
    private $dia;
    private $mes;
    private $anio;
    // constructor
    public function __construct($dia , $mes , $anio) {
        $this->dia = $dia;
        $this->mes = $mes; 
        $this->anio = $anio;
    }
   // setters y getters
    public function getDia() {
        return $this->dia;
    }
    public function getMes() {
        return $this->mes;
    }
    public function getAnio() {
        return $this->anio;
    }
    public function setDia($dia) {
        return $this->dia = $dia;
    }
    public function setMes($mes) {
        return $this->mes = $mes;
    }
    public function setAnio($anio) {
        return $this->anio = $anio;
    }

   // metodos
    /**
     * Obtiene un string que corresponde al mes del calendario.
     * @param int $numero
     * @return string
     */
   public function obtenerMes($numero) {
        switch($numero) {
            case 1: 
                return "Enero";
            case 2: 
                return "Febrero"; 
            case 3: 
                return "Marzo";
            case 4: 
                return "Abril";
            case 5: 
                return "Mayo" ;
            case 6:
                return "Junio";
            case 7:
                return "Julio";
            case 8:
                return "Agosto";
            case 9:
                return "Septiembre";
            case 10:
                return "Octubre";
            case 11:
                return "Noviembre";
            case 12:
                return "Diciembre";
            default:
                return "null";
        }
   }
   /**
    * Retorna la fecha abreviada en formato D - M - Y
    * @return string
    */
   public function fechaAbreviada() {
        return $this->getDia() . "/" . $this->getMes() . "/" . $this->getAnio();
   }
   /**
    * Retorna la fecha extendida en formato D - M - Y
    * @return string
    */
   public function fechaExtendida() {
        return $this->getDia() . " de " . $this->obtenerMes($this->getMes()) . " de " . $this->getAnio();
   }
   /**
    * Evalua si un anio es bisiesto, en caso de, devuelve true
    * @return boolean
    */
   public function anioBisiesto() {
        $anio = $this->getAnio();
        $anioBisiesto = false;
        if ($anio % 4 == 0 && $anio % 100 != 0) {
            $anioBisiesto = true;
        } elseif ($anio % 400 == 0) {
            $anioBisiesto = true;
        }
        return $anioBisiesto;
   }
   /**
    * Obtiene el anio y suma los anios que se obtengan por parametro
    * @param int $anio
    */
   public function incrementarAnio($anio) {
        $anioNuevo = $this->getAnio() + $anio;
        $this->setAnio($anioNuevo);
   }
   /**
    * Evalua si el mes actual mas la suma del mes obtenido por parametro es mayor a 12, en caso de , incrementa el anio
    * @param int $mes
    */
   public function incrementarMes($mes) {
        if ($this->getMes() + $mes > 12) {
            $this->incrementarAnio(1);
            $mesesIncrementados = 1;
            $this->setMes($mesesIncrementados);
        } else {
            $mesesIncrementados = $this->getMes() + $mes;
            $this->setMes($mesesIncrementados);
        }
   }
   /**
    * Obtiene el mes actual y suma en base al mes.
    * @param int $dias
    */
                                            
   public function incrementarDias($dias) {  
        $mesActual = $this->getMes();        
        for ($i = 0 ; $i < $dias ; $i++) {   
            if ($mesActual == 1 || $mesActual == 3 || $mesActual == 5 || $mesActual == 7 || $mesActual == 8 || $mesActual = 10 || $mesActual == 12) {
                $this->sumarDias31(1);
            } elseif ($mesActual == 4 || $mesActual == 6 || $mesActual == 9 || $mesActual == 11) {
                $this->sumarDias30(1);
            } else {
                $this->sumarDiasAFebrero(1);
            }
        }
   }
   /**
    * Incrementa el mes y resetea el dia en los meses de 30 dias, previamente evaluando si los dias son mayores.
    * @param int $dias
    */
   public function sumarDias30($dias) {
        if ($this->getDia() + $dias > 30) { 
            $this->incrementarMes(1);
            $this->setDia(1);
        } else {
            $sumaDias = $this->getDia() + $dias;
            $this->setDia($sumaDias);
        }
   }
   /**
    * Incrementa el mes y resetea el dia en los meses de 31 dias, previamente evaluando si los dias son mayores
    * @param int $dias
    */
   public function sumarDias31($dias) {
        if ($this->getDia() + $dias > 31) { 
            $this->incrementarMes(1);
            $this->setDia(1);
        } else {
            $sumaDias = $this->getDia() + $dias;
            $this->setDia($sumaDias);
        }
    }
    /**
     * Evalua casos donde el anio sea o no bisiesto, en cualquier caso, realiza las operaciones para aumentar mes y resetear el dia
     * @param int $dias
     */
    private function sumarDiasAFebrero($dias) {
        if ($this->anioBisiesto()) {
            if (($this->getDia() + $dias) > 29) {
                $this->incrementarMes(1);
                $this->setDia(1);
            } else {
                $incDia = $this->getDia() + $dias;
                $this->setDia($incDia);
            }
        } else {
            if (($this->getDia() + $dias) > 28) {
                $this->incrementarMes(1);
                $this->setDia(1);
            } else {
                $incDia = $this->getDia() + $dias;
                $this->setDia($incDia);
            }
        }
    }
    /**
     * Devuelve el valor de las variables instancias
     * @return string
     */
    public function __toString() {
        return $this->getDia() . " de " . $this->obtenerMes($this->getMes()) . " de " . $this->getAnio();
    }
}




