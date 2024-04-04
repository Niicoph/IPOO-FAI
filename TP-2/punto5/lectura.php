<?php 

/*

Realizar las modificaciones que crea necesaria en la clase implementada en el punto 4 para poder almacenar informacion de los libros que va leyendo una persona.
Implementar los siguiente métodos:
a) libroLeido($titulo) : retorna true si el libro cuyo titulo recibido por parametro se encuentra dentro del conjunto de libros leidos y false en caso contrario
b) darSinopsis($titulo) : retorna la sinopsis del libro cuyo titulo se recibe por parametro
c) leidosAnioEdicion($x) : que retorne todos aquellos libros que fueron leidos y su año de edicion es un año X recibido por parametro
d) darLibrosPorAutor($nombreAutor) : retorna todos aquellos libros que fueron leidos y el nombre de su autor coincide con el recibido por parametro

*/

class Lectura {
    // Atributos
    private $paginaActual;
    private $libro;
    private $coleccionLibrosLeidos;
    // método constructor 
    public function __construct($libro , $paginaActual, $librosLeidos) {
        $this->libro = $libro;
        $this->paginaActual = $paginaActual;
        $this->coleccionLibrosLeidos = $librosLeidos;
    }
    //getters y setters
    public function getLibrosLeidos() {
        return $this->coleccionLibrosLeidos;
    }
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
    public function setLibrosLeidos($coleccion) {
        $this->coleccionLibrosLeidos = $coleccion;
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

    // métodos adicionales punto 5
    public function libroLeido($titulo) {
        $libroLeido = false;
        $librosLeidos = $this->getLibrosLeidos();
        $cantidadLibrosLeidos = count($this->getLibrosLeidos()); 
        $i = 0;
        while ($i < $cantidadLibrosLeidos && $libroLeido == false) {
            if ($titulo == $librosLeidos[$i]->getTitulo()) {
                $libroLeido = true;
            }
            $i++;
        }
        return $libroLeido;
    }
    public function darSinopsis($titulo) {
        $libroEnColeccion = $this->libroLeido($titulo);
        if ($libroEnColeccion) {
            $librosLeidos = $this->getLibrosLeidos();
            $cantidadLibrosLeidos = count($this->getLibrosLeidos());
            $i = 0;
            while ($i < $cantidadLibrosLeidos) {
                if ($titulo == $librosLeidos[$i]->getTitulo()) {
                    $string = $librosLeidos[$i]->getSinopsis();
                }
                $i++;
            }    
        } else {
            $string = "El libro que solicitó no se encuentra en la coleccion.";
        }   
        return $string;  
    }
    public function leidosAnioEdicion($x) {
        $librosLeidosAnioEdicion = [];
        $librosLeidos = $this->getLibrosLeidos();
        foreach ($librosLeidos as $libro) {
            if ($libro->getAnioEdicion() == $x) { 
                $librosLeidosAnioEdicion[] = $libro;
            }
        }
        return $librosLeidosAnioEdicion;
    }
    public function darLibrosPorAutor($nombreAutor) {
        $librosLeidosAutor = [];
        $librosLeidos = $this->getLibrosLeidos();
        foreach ($librosLeidos as $libro) { 
            $autor = $libro->getPersona();
            $nombreAutorLibro = $autor->getNombre(); 
            if ($nombreAutorLibro == $nombreAutor) { 
                $librosLeidosAutor[] = $libro; 
            }
        }
        return $librosLeidosAutor;
    }
    
    


    public function __toString() {
       $string =  "Pagina Actual: " . $this->getPaginaActual() . "\n" . 
        "Libro -> " . "\n" . 
        $this->getLibro();
       return $string;
    }
    
}