<?php 

/*

Realizar las modificaciones necesarias en la clase Banco para poder gestionar colas de tramites ademas de colas de clientes.
De cada tramite se conoce el cliente que le da inicio. Asimismo del tramite tambien se conoce:
fecha de ingreso, fecha de cierre, horario de ingreso y horario de cierre.

Implementar los siguientes metodos: 
    a) ingresarTramite: esta etapa es cuando la persona ya esta en el mostrador explicando el tramite para que sea tratado.
    Ya salio de la cola de tramites y esta siendo atendido en el mostrador correspondiente.
    b) cerrarTramite: es cuando el tramite ha sido resuelto. Ademas, debe validar que el tramite a cerrar está abierto y 
    setearlo en estado cerrado
    c) mostrador->cantTramitesAtendidosMes(): metodo que da el porcentaje de tramites resueltos por dia en este mes
    d) mostrador->porcentajeTramitesResueltos(): metodo que da el porcentaje de tramites resueltos sobre el total de recibidos
    e) tramite->cantTramitesAbiertos(): metodo que retorna la cantidad de tramites abiertos de un cliente
    f) tramite->cantTramitesCerrados(): metodo que retorna la cantidad de tramites cerrados de un cliente
    g) banco->promTramitesIngresadosDia(): metodo que retorna el promedio de tramites ingresados por dia.
    h) banco->promTramitesCerradosDia(): metodo que retorna el promedio de tramites cerrados por dia.
    i) banco->mostradorResuelveMasTramites(): metodo que retorna el mostrador con mayor porcentaje de tramites resueltos
    (sobre el total recibido) en el mes actual (o en un rango de fechas - pueden usar el tda fecha o clases de php , por 
    ejemplo el getdate() de php)
*/



class Tramite {  // Cuando se crea el tramite significa que se esta atendiendo el mismo
    // atributos
    private $tituloTramite;
    private $tipoTramite;
    private $idTramite;
    // -------------- atributos agregados ----------------
    private $fechaIngreso;  // ["dia" => x , "mes" => x "anio" => x]
    private $fechaCierre;   // ["dia" => x , "mes" => x "anio" => x]
    private $horarioIngreso;  // "12:24"
    private $horarioCierre;     // "12:24"
    private $estado;
    // constructor 
    public function __construct($tituloTramite, $tipoTramite , $idTramite) {
        $this->tituloTramite = $tituloTramite;
        $this->tipoTramite = $tipoTramite;
        $this->fechaIngreso = getDate();
        $this->fechaCierre = null;
        $this->horarioIngreso = date("H:i:s");
        $this->horarioCierre = null;
        $this->estado = 'abierto';
        $this->idTramite = $idTramite;
    }
    // getters y setters
    public function getTituloTramite() {
        return $this->tituloTramite;
    }
    public function getTipoTramite() {
        return $this->tipoTramite;
     }
    public function getFechaIngreso() {
        return $this->fechaIngreso;
    }
    public function getFechaCierre() {
        return $this->fechaCierre;
    }
    public function getHorarioIngreso() {
        return $this->horarioIngreso;
    }
    public function getHorarioCierre() {
        return $this->horarioCierre;
    }
    public function getEstado() {
        return $this->estado;
    }
    public function getIdTramite() {
        return $this->idTramite;
     }
     public function setIdTramite($id) {
        $this->idTramite = $id;
     }
    public function setEstado($estado) {
        $this->estado = $estado;
    }
    public function setFechaIngreso($fecha) {
        $this->fechaIngreso = $fecha;
    }
    public function setFechaCierre($fecha) { 
        $this->fechaCierre = $fecha;
    }
    public function setHorarioIngreso($horario) {
        $this->horarioIngreso = $horario;
    }
    public function setHorarioCierre($horario) {
        $this->horarioCierre = $horario;
    }
    public function setTituloTramite($titulo) {
        $this->tituloTramite = $titulo;
    }
    public function setTipoTramite($tipo) {
        $this->tipoTramite = $tipo;
    }
    public function setHorarioResolucion($horarioResolucion) {
        $this->horarioResolucion = $horarioResolucion;
    }
    public function seHorarioCreacion($horarioCreacion) {
        $this->horarioCreacion = $horarioCreacion;
    }
}
