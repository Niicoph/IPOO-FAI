<?php  


/*
Cree una clase Libro que tenga los atributos ISBN, titulo, año de edición, editorial, nombre y apellido
del autor. Defina en la clase los siguientes métodos
a) Método constructor _ _construct() que recibe como parámetros los valores iniciales para los atributos de la
clase.
b) Los método de acceso de cada uno de los atributos de la clase.
c) Método toString() que retorne la información de los atributos de la clase.
d) perteneceEditorial($peditorial): indica si el libro pertenece a una editorial dada. Recibe como parámetro
una editorial y devuelve un valor verdadero/falso.
e) aniosdesdeEdicion(): método que retorna los años que han pasado desde que el libro fue editado.
f) Cree un script TestLibro que:
    1) defina el método iguales($plibro,$parreglo): dada una colección de libros, indica si el libro pasado por
    parámetro ya se encuentra en dicha colección.
    2) defina el método librodeEditoriales($arreglolibros, $peditorial): método que retorna un arreglo asociativo
    con todos los libros publicados por la editorial dada.
    3) cree al menos tres objetos libros e invoque a cada uno de los métodos implementados en la clase Libro
*/

class Libro {
    // Atributos 
    private $isbn;
    private $titulo;
    private $anioEdicion;
    private $editorial;
    private $nombreAutor;
    private $apellidoAutor;
    // Constructor
    public function __construct($titulo, $anio, $editorial , $isbn , $nombreAutor , $apellidoAutor) {
        $this->isbn = $isbn;
        $this->titulo = $titulo;
        $this->anioEdicion = $anio;
        $this->editorial = $editorial;
        $this->nombreAutor = $nombreAutor;
        $this->apellidoAutor = $apellidoAutor;
    }
    // getters y setters
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
    public function getNombreAutor() {
        return $this->nombreAutor;
    }
    public function getApellidoAutor() {
        return $this->apellidoAutor;
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
    public function setNombreAutor($nombreAutor) {
        $this->nombreAutor = $nombreAutor;
    }
    public function setApellidoAutor($apellidoAutor) {
        $this->apellidoAutor = $apellidoAutor;
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
        foreach ($aColeccion as $libro) {
            if ($libro == $aLibro) {
                echo "Libro ya se encuentra en la coleccion";
            } else {
                echo "Libro no se encuentra en la coleccion";
            }
        }
    }
    public function libroEditoriales($arregloLibros, $pEditorial) {
        $nombreEditorial = $pEditorial;
        $arregloLibrosEditorial = [];
        $lastIndex = count($arregloLibros);
    
        for ($index = 0; $index < $lastIndex; $index++) {
            if ($arregloLibros[$index]->getEditorial() == $nombreEditorial) {
                array_push($arregloLibrosEditorial, $arregloLibros[$index]);
            }
        }
        echo "Libros de la editorial " . $nombreEditorial . ":\n";
        foreach ($arregloLibrosEditorial as $libro) {
            echo $libro . "\n";
        }
    }
    public function __toString() {
        return "ISBN: " . $this->getIsbn() . " Titulo: " . $this->getTitulo() . " Año de Edicion: " . $this->getAnioEdicion() . " Editorial: " . $this->getEditorial() . " Nombre del Autor: " . $this->getNombreAutor() . " Apellido del Autor: " . $this->getApellidoAutor();
    }
    
}

