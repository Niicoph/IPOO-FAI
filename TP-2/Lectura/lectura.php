<?php 

/*

Se desea implementar una clase Lectura que almacena informacion sobre la lectura de un determinado libro. 
Esta clase tiene como variable instancia una refencia a un objeto Libro y el numero de la pagina que se esta leyendo.
Por otro lado la clase contiene los siguientes metodos: 

a) Metodo constructor __construct() que recibe como parametros los valores iniciales para los atributos de la clase
b) Los metodos de acceso de cada uno de los atributos de la clase
c) siguientePagina(): metodo que retorna la pagina del libro y actualiza la variable que contiene la pagina actual
d) retrocederPagina(): metodo que retorna la pagina anteroir a la actual del libro y actualiza su valor
e) irPagina(x) : metodo que retorna la pagina actual y setea como pagina actual al valor recibido por parametro
f) Redefinir el metodo __toString() para que retorne la informacion de los atributos de la clase
g) Crear un script Test_lectura que cree un objeto Lectura e invoque a cada uno de los metodos implementados.

*/

class Lectura {
    // Atributos
    private $paginaActual;
    private $libro;
    // método constructor 
    public function __construct($libro , $paginaActual) {
        $this->libro = $libro;
        $this->paginaActual = $paginaActual;
    }
    //getters y setters
    public function getPaginaActual() {
        return $this->paginaActual;
    }
    public function getLibro() {
        return $this->libro;
    }
    public function setPaginaActual($pagina) {
        $this->paginaActual = $pagina;
    }
    public function setLibro($libro) {
        $this->libro = $libro;
    }
    // métodos
    public function siguientePagina() {
        /*
        $libro = $this->getLibro();
        $libro->getCantidadPaginas();
        */

        $totalPaginas = $this->libro->getCantidadPaginas(); // 495
        $paginaActual = $this->getPaginaActual(); // x = 13
        if ($paginaActual < $totalPaginas) {
            $nuevaPagina = $paginaActual + 1; // 14 
            $this->setPaginaActual($nuevaPagina); 
        }
        return $this->getPaginaActual(); 
    }
    public function retrocederPagina() {
        $totalPaginas = $this->libro->getCantidadPaginas(); // 495
        $paginaActual = $this->getPaginaActual(); // x = 0 -> indice || x = 13
        if ($paginaActual < $totalPaginas && $paginaActual > 0) {
            $nuevaPagina = $paginaActual - 1; //  12
            $this->setPaginaActual($nuevaPagina);
        }
        return $this->getPaginaActual();
    }
    public function irPagina($x) {
        $paginaActual = $this->getPaginaActual(); // 13
        $totalPaginas = $this->libro->getCantidadPaginas(); // 495
        if ($x >= 0 && $x <= $totalPaginas) {
            $this->setPaginaActual($x);
        }
        return $this->getPaginaActual();
    }
    public function __toString() {
       $string =  "Pagina Actual: " . $this->getPaginaActual() . "\n" . 
        "Libro -> " . "\n" . 
        $this->getLibro();
       return $string;
    }
    
}