<?php 

class Reloj {
    //Atributos 
    private $segundos;
    private $minutos;
    private $horas;

    //constructor
    public function __construct($horas , $minutos , $segundos) {
        $this->horas = $horas;
        $this->minutos = $minutos;
        $this->segundos = $segundos;
    }
    // getters y setters
    public function getHoras() {
        return $this->horas;
    }
    public function getMinutos() {
        return $this->minutos;
    }
    public function getSegundos() {
        return $this->segundos;
    }
    public function setHoras($horas) {
        return $this->horas = $horas;
    }
    public function setMinutos($minutos) {
        return $this->minutos = $minutos;
    } 
    public function setSegundos($segundos) {
        return $this->segundos = $segundos;
    }
    //metodos

    /**
     * Inicia las variables de instancia en 0
     */
    public function puestaCero() {
        $this->horas = 0;
        $this->minutos = 0;
        $this->segundos = 0;
    }
    /**
     * Evalua si H,M,S se encuentran en el limite, en caso de, reinicia a 0
     */
    public function incremento() {
        if ($this->segundos == 59) { // si los segundos son 59 entonces
            $this->setSegundos(0);      // set segundos a 0 
            if ($this->minutos == 59) {  // si los minutos son 59 entonces
                $this->setMinutos(0);    // set minutos a 0
                if ($this->horas == 23) {  // si las horas son 23 entonces
                    $this->setHoras(0);     // set horas a 0
                } else {                
                    $this->horas++;  // caso contrario aumenta las horas
                }
            } else {
                $this->minutos++; // caso contrario aumenta los minutos
            }
        } else {
            $this->segundos++; // caso contrario aumenta los segundos
        }
    }
    /**
     * Evalua si los valores son decenas, en caso contrario, agrega un cero por delante.
     * @return string 
     */
    public function __toString() {
        if ($this->getHoras() <= 9 ) {
            $cronometroHoras = "0" . $this->getHoras() . ":";
        } else {
            $cronometroHoras = $this->getHoras() . ":";
        }
        if ($this->getMinutos() <= 9) {
            $cronometroMinutos = "0" . $this->getMinutos() . ":";
        } else {
            $cronometroMinutos = $this->getMinutos() . ":";
        }
        if ($this->getSegundos() <= 9) {
            $cronometroSegundos = "0" . $this->getSegundos();
        } else {
            $cronometroSegundos = $this->getSegundos();
        }
        return $cronometroHoras . $cronometroMinutos . $cronometroSegundos;
    }


}
