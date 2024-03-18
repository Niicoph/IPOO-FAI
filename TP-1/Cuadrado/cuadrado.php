<?php


/*
Crear una clase Cuadrado que modele cuadrados por medio de cuatro puntos (los vértices). Puede utilizar
arreglos asociativos para implementar cada uno de los vértices. La clase dispondrá de los siguientes métodos:
11.a. Método constructor __construct () que recibe como parámetros las coordenadas de los puntos.
11.b. Los métodos de acceso de cada uno de los atributos de la clase.
11.c. area(): método que calcula el área del cuadrado.
11.d. desplazar($d): método que recibe por parámetro un punto y desplaza el cuadrado en el plano desde su punto mas inferior izquierdo.
11.e. aumentarTamaño($t): método que recibe por parámetro el tamaño que debe aumentar el cuadrado.
11.f. Redefinir el método _ _toString() para que retorne la información de los atributos de la clase.
11.g. Crear un script Test_Cuadrado que cree un objeto Cuadrado e invoque a cada uno de los
métodos implementados

*/


class Cuadrado {
    // Atributos
    private $puntoA;
    private $puntoB;
    private $puntoC; 
    private $puntoD;
    //constructor
    public function __construct($a,$b,$c,$d){
        $this->puntoA = $a;     //  ["x" => x  ,  "y" => y]
        $this->puntoB = $b;    //  ["x" => x  ,  "y" => y]
        $this->puntoC = $c;   //  ["x" => x  ,  "y" => y]
        $this->puntoD = $d;  //  ["x" => x  ,  "y" => y]
    }
    // getters y setters
    public function getPuntoAx() {
        return $this->puntoA["x"];    // recordemos un punto se encuentra construido  por una condenada x y una coordenada y
    }                                 // de modo que un cuadrado se encuentra construido por 4 puntos  A,B,C,D
                                      // A contiene un punto (x,y) , B contiene un punto (x,y) , C contiene un punto (x,y) , D contiene un punto (x,y)     
    public function getPuntoAy() {
        return $this->puntoA["y"];
    }
    public function getPuntoBx() {
        return $this->puntoB["x"];
    }
    public function getPuntoBy() {
        return $this->puntoB["y"];
    }
    public function getPuntoCx() {
        return $this->puntoC["x"];
    }
    public function getPuntoCy() {
        return $this->puntoC["y"];
    }
    public function getPuntoDx() {
        return $this->puntoD["x"];
    }
    public function getPuntoDy() {
        return $this->puntoD["y"];
    }
    public function setPuntoA($puntoA) {
        $this->puntoA = $puntoA;
    }
    public function setPuntoB($puntoB) {
        $this->puntoB = $puntoB;
    }
    public function setPuntoC($puntoC) {
        $this->puntoC = $puntoC;
    }
    public function setPuntoD($puntoD) {
        $this->puntoD = $puntoD;
    }
    // métodos
    /**
     * Calcula el área del cuadrado
     * @return int
     */
    public function area() {
        $lado = $this->getPuntoBx() - $this->getPuntoAx();
        return $lado * $lado;
    }
    /**
     * Desplaza el cuadrado en el plano desde su punto mas inferior izquierdo
     * @param array $d
     */
    public function desplazar($d) {
        // Punto A
        $aX = $this->getPuntoAx() + $d["x"];
        $aY = $this->getPuntoAy() + $d["y"];
        $this->setPuntoA(["x" => $aX, "y" => $aY]);
        
        // Punto B
        $bX = $this->getPuntoBx() + $d["x"];
        $bY = $this->getPuntoBy() + $d["y"];
        $this->setPuntoB(["x" => $bX, "y" => $bY]);
        
        // Punto C
        $cX = $this->getPuntoCx() + $d["x"];
        $cY = $this->getPuntoCy() + $d["y"];
        $this->setPuntoC(["x" => $cX, "y" => $cY]);
        
        // Punto D
        $dX = $this->getPuntoDx() + $d["x"];
        $dY = $this->getPuntoDy() + $d["y"];
        $this->setPuntoD(["x" => $dX, "y" => $dY]);
    }
    /**
     * Aumenta el tamaño del cuadrado dado un valor
     * @param int $m
     */
    public function aumentarTamanio($m) {
        // Punto A
        $this->setPuntoA(array(
            "x" => $this->getPuntoCx(),
            "y" => $this->getPuntoAy() + $m
        ));
        
        // Punto D
        $this->setPuntoD(array(
            "x" => $this->getPuntoDx() + $m,
            "y" => $this->getPuntoCy()
        ));
        
        // Punto B
        $this->setPuntoB(array(
            "x" => $this->getPuntoDx(),
            "y" => $this->getPuntoAy()
        ));
    }
    public function __toString() {
        return 'ValorA["x"] => ' . $this->getPuntoAx() . ' , ValorA["y"] => ' . $this->getPuntoAy() . ' , ValorB["x"] => ' . $this->getPuntoBx() . ' , ValorB["y"] => ' . $this->getPuntoBy() . ' , ValorC["x"] => ' . $this->getPuntoCx() . ' , ValorC["y"] => ' . $this->getPuntoCy() . ' , ValorD["x"] => ' . $this->getPuntoDx() . ' , ValorD["y"] => ' . $this->getPuntoDy();
    }
}


