<?php 

/*

Desarrollar una clase Cafetera con los atributos capacidadMaxima (la cantidad máxima de café que puede
contener la cafetera) y cantidadActual (la cantidad actual de café que hay en la cafetera). Implementar los
siguientes métodos:
13.a. Método constructor _ _construct() que recibe como parámetros los valores iniciales para los
atributos de la clase.
13.b. Los método de acceso de cada uno de los atributos de la clase.
13.c. llenarCafetera(): la cantidad actual debe ser igual a la capacidad de la cafetera.
13.d. servirTaza($cantidad): simula la acción de servir una taza con la capacidad indicada. Si la
cantidad actual de café “no alcanza” para llenar la taza, se sirve lo que quede y se envía un mensaje
al consumidor para que sepa porque no se le sirvió un taza completa.
13.e. vaciarCafetera(): pone la cantidad de café actual en cero.
13.f. agregarCafe($cantidad): añade a la cafetera la cantidad de café indicada.
13.g. Redefinir el método _ _toString() para que retorne la información de los atributos de la clase.
13.h. Crear un script Test_Cafetera que cree un objeto Cafetera e invoque a cada uno de los
métodos implementados.

*/

class Cafetera {
    // Atributos
    private $cantidadMaxima;
    private $cantidadActual;
    // constructor 
    public function __construct($max , $actual) {
        $this->cantidadMaxima = $max;
        $this->cantidadActual = $actual;
    }
    // getters y setters
    public function getCantidadMaxima() {
        return $this->cantidadMaxima;
    }
    public function getCantidadActual() {
        return $this->cantidadActual;
    }
    public function setCantidadMaxima($value) {
        return $this->cantidadMaxima = $value;
    }
    public function setCantidadActual($value) {
        return $this->cantidadActual = $value;
    }
    // métodos
    /**
     * Permite llenar la cafetera
     * @return void 
     */
    public function llenarCafetera() {  // la cafetera estaria completamente llena
        $this->cantidadActual = $this->cantidadMaxima;  // independientemente del valor previo de cantidadActual, si la llenas, va a ser el maximo
    }
    /**
     * Permite servir cafe en una taza, evaluando las condiciones de cantidad
     * @param float $cantidad
     * @return void 
     */
    public function servirTaza($cantidad) {  // $cantidad representa la cantidad de cafe que desea el consumidor en su taza
        $cantidadDisponible = $this->getCantidadActual() - $cantidad; // removemos la cantidad deseada de la cantidadActual
        if ($cantidadDisponible >= 0) {  // -5
            $this->setCantidadActual($cantidadDisponible);
        } else {
            $this->setCantidadActual(0);
            echo "Cantidad de café insuficiente. Sirviendo lo disponible" . "\n";
        }
    }
    /**
     * Permite vaciar la cafetera
     * @return void 
     */
    public function vaciarCafetera() {
        $this->setCantidadActual(0);
    }
    /**
     * Permite agregar cafe a la cafetera, evaluando las condiciones de cantidad
     * @param $cantidad
     * @return void
     */
    public function agregarCafe($cantidad) {
       if ($cantidad > $this->getCantidadMaxima()) {  // cantidad = 200  a  70   
           $cantidadPrevia = $this->getCantidadActual();  // 50
           $cantidad = $this->getCantidadMaxima();  // cantidad = 70  como maximo podemos agregar
           $cantidadAgregar = $cantidad - $this->getCantidadActual(); // 70 - 50 = 20;
           $this->setCantidadActual($cantidadPrevia + $cantidadAgregar);  // 70
           echo "El valor a agregar sobrepasa la cantidad maxima. Sirviendo lo maximo posible: (" . $cantidadAgregar . ") " . "\n"; 
       } elseif ($cantidad +  $this->getCantidadActual() > $this->getCantidadMaxima()) { // 50 + 69 = 119 > 70
            $cantidadNecesaria = $this->getCantidadMaxima() - $this->getCantidadActual();   // 20                                                          
            $this->setCantidadActual($this->getCantidadActual() + $cantidadNecesaria); // 50 + 20 = 70
            echo "El valor a agregar sobrepasa la cantidad maxima. Sirviendo lo maximo posible: (" . $cantidadNecesaria . ") " . "\n"; 
       } else {
            $this->setCantidadActual($cantidad + $this->getCantidadActual());
            echo "Sirviendo cantidad: (" . $cantidad . ")" . "\n";
       }
    }
    /**
     * Devuelve los valores de las variables intancia.
     * @return string
     */ 
    public function __toString() {
        return "Cantidad maxima: " . $this->getCantidadMaxima() . "\n" . "Cantidad Actual: " . $this->getCantidadActual() . "\n";
    }

}


