<?php 


/*
Implementar una clase Disquera con los atributos: hora_desde y hora_hasta (que indican el horario de atención de la tienda) , 
estado (abierta o cerrada), direccion y dueño. El atributo dueño debe referenciar a un objeto de la clase Persona implementada en el punto 1.
Defina en la clase los siguientes metodos.
a) Método constructor __construct() que recibe como parámetros los valosres iniciales para los atributos de la clase
b) Los métodos de acceso de cada uno de los atributos de la clase
c) dentroHorarioAtencion($hora , $minutos): que dada una hora y minutos retorna true si la tienda debe encontrarse abierta en ese horario y false
en caso contrario
d) abrirDisquera($hora, $minutos): que dada una hora y minutos corrobora que se encuentra dentro del horario de atención y cambia el estado de la 
disquera solo si es un horario valido para su apertura
e) cerrarDisquera($hora,$minutos): que dada una hora y minutos corrobora que se encuentra fuera del horario de atención y cambia el estado de la 
disquera solo si es un horario valido para su cierre.
f) Refedinir el método __toString() para que retorne la informacion de los atributos de la clase.
g) Crear un script Test_disquera que cree un objeto Disquera e invoque cada uno de los metodos implementados.

*/

class Disquera {
    // Atributos
    private $hora_desde;  // 17:30 -> convertir todo a horas -> 18
    private $hora_hasta;  // 20:30  -> convertir todo a horas -> 21
    private $estado;
    private $direccion;
    private $dueño;
    // método constructor
    public function __construct($persona , $horaInicio , $horaHasta , $estado , $direccion) {
        $this->hora_desde = $horaInicio;
        $this->hora_hasta = $horaHasta;
        $this->estado = $estado;
        $this->direccion = $direccion;
        $this->dueño = $persona;
    }
    // getters y setters
    public function getHoraDesde() {
        return $this->hora_desde;
    }
    public function getHoraHasta() {
        return $this->hora_hasta;
    }
    public function getEstado() {
        return $this->estado;
    }
    public function getDireccion() {
        return $this->direccion;
    }
    public function getDueño() {
        return $this->dueño;
    }
    public function setHoraDesde($hora) {
        $this->hora_desde = $hora;
    }
    public function setHoraHasta($hora) {
        $this->hora_hasta = $hora;
    }
    public function setEstado($estado) { 
        $this->estado = $estado;
    }
    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }
    public function setDueño($persona) {
        $this->dueño = $persona;
    }
    // métodos
    public function dentroHorarioAtencion($hora, $minutos) {
        $dentroHorario = false;
        $horaInicioActual = $this->getHoraDesde(); // 17.5
        $horaHastaActual = $this->getHoraHasta();  // 21.5
        $minutosHoras = $minutos / 60; // convierte los minutos en horas
        
        // Calcula la hora completa teniendo en cuenta los minutos
        $horaCompleta = $hora + $minutosHoras; // 22
         
        // Verifica si la hora completa está dentro del horario de atención
        if ($horaCompleta >= $horaInicioActual && $horaCompleta <= $horaHastaActual) {
            $dentroHorario = true;
        }
        
        return $dentroHorario;
    }
    
    public function abrirDisquera($hora, $minutos) {
        $horaInicioActual = $this->getHoraDesde(); // 18
        $horaHastaActual = $this->getHoraHasta();  // 21
        $minutosHoras = $minutos / 60;
        $horaCompleta = $hora + $minutosHoras;
        if ($horaCompleta > $horaInicioActual && $horaCompleta < $horaHastaActual) {
            $this->setEstado('Abierto');
        } else {
            $this->setEstado('Cerrado');
        }
    }
    public function cerrarDisquera($hora, $minutos) {
        $horaInicioActual = $this->getHoraDesde(); // 18
        $horaHastaActual = $this->getHoraHasta(); // 21
        $minutosHoras = $minutos/60;
        $horaCompleta = $hora + $minutosHoras;
        if ($horaCompleta < $horaInicioActual || $horaCompleta  > $horaHastaActual) {
            $this->setEstado('Cerrado');
        } else  {
            $this->setEstado('Abierto');
        }
    }
    public function __toString() {
        $horaInicio = (int)$this->getHoraDesde();
        $minutosInicio = ($this->getHoraDesde() - $horaInicio) * 60;
        $horaCierre = (int)$this->getHoraHasta();
        $minutosCierre = ($this->getHoraHasta() - $horaCierre) * 60;
      $string= 
        "Hora Apertura: " . $horaInicio . ":" . $minutosInicio . "\n" .
        "Hora de cierre: " . $horaCierre . ":" . $minutosCierre . "\n" .
        "Estado: " . $this->getEstado() ."\n" .
        "Direccion: " . $this->getDireccion() . "\n" .
        "Dueño ->" . "\n" . $this->getDueño();
       return $string;
    }
}