<?php  


/*

Realizar las modificaciones en la clase Libro para que en vez de contener como atributos nombre y apellido del autor del libro, tenga una referencia
a la clase Persona. Ademas agregue como variables instancias de la clase la cantidad de paginas y sinopsis del libro.
a) método constructor __construct() que recibe como parametros los valores iniciales para los atributos de la clase.
b) Los métodos de acceso de cada uno de los atributos de la clase
c) Redefinir el método __toString() para que retorne la información de los atributos de la clase
d) Crear un script test_libro que cree un objeto Libro e invoque a cada uno de los metodos implementados

*/



class Libro {
    // Atributos 
    private $cantidadPaginas;
    private $sinopsis;
    private $isbn;
    private $titulo;
    private $anioEdicion;
    private $editorial;
    private $persona;
    // Constructor
    public function __construct($titulo, $anio, $editorial , $isbn , $cantidadPaginas , $sinopsis , $persona) {
        $this->cantidadPaginas = $cantidadPaginas;
        $this->sinopsis = $sinopsis;
        $this->isbn = $isbn;
        $this->titulo = $titulo;
        $this->anioEdicion = $anio;
        $this->editorial = $editorial;
        $this->persona = $persona;
    }
    // getters y setters
    public function getCantidadPaginas() {
        return $this->cantidadPaginas;
    }
    public function getSinopsis() {
        return $this->sinopsis;
    }
    public function getIsbn() {
        return $this->isbn;
    }
    public function getTitulo() {
        return $this->titulo;
    }
    public function getAnioEdicion() {
        return $this->anioEdicion;
    }
    public function getEditorial() {
        return $this->editorial;
    }
    public function getPersona() {
        return $this->persona;
    }
    public function setCantidadPaginas($paginas) {
        $this->cantidadPaginas = $paginas;
    } 
    public function setSinopsis($sinopsis) {
        $this->sinopsis = $sinopsis;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }
    public function setAnioEdicion($anioEdicion) {
        $this->anioEdicion = $anioEdicion;
    }
    public function setEditorial($editorial) {
        $this->editorial = $editorial;
    }
    public function setPersona($persona) {
        $this->persona = $persona;
    }
    public function setIsbn($isbn) {
        $this->isbn = $isbn;
    }
    // métodos
    public function perteneEditorial($editorial) {
        if ($this->getEditorial() == $editorial) {
            return true;
        } else {
            return false;
        }
    }
    public function aniosEdicion() {
        $anioEdicion = $this->getAnioEdicion();
        $anioActual = 2024;
        $aniosTranscurridos = $anioActual - $anioEdicion;
        return $aniosTranscurridos;
    }
    public function iguales($aLibro , $aColeccion) { // $aLibro = "asd" , $aColeccion = ["asd" , "qwe"]
        $respuesta = "";
        foreach ($aColeccion as $libro) {
            if ($libro == $aLibro) {
                $respuesta =  "Libro ya se encuentra en la coleccion";
            } else {
                $respuesta =  "Libro no se encuentra en la coleccion";
            }
        }
        return $respuesta;
    }
    public function libroEditoriales($arregloLibros, $pEditorial) {
        $respuesta = "";
        $nombreEditorial = $pEditorial;
        $arregloLibrosEditorial = [];
        $lastIndex = count($arregloLibros);
    
        for ($index = 0; $index < $lastIndex; $index++) {
            if ($arregloLibros[$index]->getEditorial() == $nombreEditorial) {
                array_push($arregloLibrosEditorial, $arregloLibros[$index]);
            }
        }
        $respuesta =  "Libros de la editorial " . $nombreEditorial . ":\n";
        foreach ($arregloLibrosEditorial as $libro) {
            echo $libro . "\n";
        }
        return $respuesta;
    }
    public function __toString() {
     $string =   
        "ISBN: " . $this->getIsbn() . "\n" .
        "Titulo: " . $this->getTitulo() . "\n" . 
        "Cantidad Paginas: " . $this->getCantidadPaginas() .  "\n" .
        "Sinopsis: " . $this->getSinopsis() . "\n" .
        "Año Edición: " . $this->getAnioEdicion() . "\n" . 
        "Editorial: " . $this->getEditorial() . "\n" . 
        "Autor -> " . "\n" . 
        $this->getPersona();
    return $string;
    }
    
}

