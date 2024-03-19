<?php 

/*

Definir una clase Linea con cuatro atributos: pA , pB, pC y pD donde ( pA , p B ) y ( pC,pD ) son 2 puntos
por los que pasa la línea en un espacio de dos dimensiones. La clase dispondrá de los siguientes métodos:
12.a. Método constructor _ _construct() que recibe como parámetros las coordenadas de los puntos.
12.b. Los métodos de acceso de cada uno de los atributos de la clase.
12.c. mueveDerecha($d): Desplaza la línea a la derecha la distancia(d) que se recibe por parámetro.
12.d. mueveIzquierda($d): Desplaza la línea a la izquierda la distancia(d) que se recibe por parámetro.
12.e. mueveArriba($d): Desplaza la línea hacia arriba la distancia que se recibe por parámetro.
12.f. mueveAbajo($d): Desplaza la línea hacia abajo la distancia que se recibe por parámetro.
12.g. Redefinir el método _ _toString() para que retorne la información de los atributos de la clase.
12.h. Crear un script Test_Linea que cree un objeto Linea e invoque a cada uno de los
métodos implementados.

*/

class Linea {
    // Atributos
    private  $pA;  //  -> x
    private $pB;  //   -> y
    private $pC;  //   -> x
    private $pD;  //   -> y
    // Constructor
    public function __construct($pA , $pB , $pC  , $pD) {
        $this->pA = $pA;
        $this->pB = $pB;
        $this->pC = $pC;
        $this->pD = $pD;
    }
    //getters y setters
    public function getPuntoA() {
        return $this->pA;
    }
    public function getPuntoB() {
        return $this->pB;
    }
    public function getPuntoC() {
        return $this->pC;
    }
    public function getPuntoD() {
        return $this->pD;
    }
    public function setPuntoA($a) {
        return $this->pA = $a;
    }
    public function setPuntoB($b) {
        return $this->pB = $b;
    }
    public function setPuntoC($c) {
        return $this->pC = $c;
    }
    public function setPuntoD($d) {
        return $this->pD = $d;
    }
    // métodos
    /**
     * Desplaza la linea hacia la derecha en el eje x tantos lugares como se especifique en la variable parametro
     * @param int $d
     * @return void
     */
    public function mueveDerecha($d) {  // supongamos $d = 3 , move la linea 3 a la derecha
        $this->pA += $d;
        $this->pC += $d;
    }
    /**
     * Desplaza la linea hacia la izquierda en el eje x tantos lugares como se especifique en la variable parametro
     * @param int $d
     * @return void
     */
    public function mueveIzquierda($d) {
        $this->pA -= $d;
        $this->pC -= $d;
    }
     /**
     * Desplaza la linea hacia arriba en el eje y tantos lugares como se especifique en la variable parametro
     * @param int $d
     * @return void
     */
    public function mueveArriba($d) {
        $this->pB += $d;
        $this->pD += $d;
    }
     /**
     * Desplaza la linea hacia abajo en el eje y tantos lugares como se especifique en la variable parametro
     * @param int $d
     * @return void
     */
    public function mueveAbajo($d) {
        $this->pB -= $d;
        $this->pD -= $d;
    }
    /**
     * Devuelve los valores de los atributos al mostrar el objeto por pantalla
     * @return string
     */
    public function __toString() {
        return "Punto (pA y pB) : " . "(" . $this->getPuntoA() . " y " . $this->getPuntoB() . ")" . "\n" . "Punto (pC y pD) : "  . "(" . $this->getPuntoC() . " y " . $this->getPuntoD() . ")" . "\n"    ;
    }
}
