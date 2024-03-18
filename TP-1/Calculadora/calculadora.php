<?php   

/*

1- 
   *OBJETO: Un objeto es una instancia concreta de una clase. Los mismos tienen
   propiedades y metodos (atributos / funciones respectivamente). Se pueden
   considerar como una entidad que tiene un estado y un comportamiento asociado
   a la clase de la que proviene.
   *CLASE: Una clase es una plantilla/Modelo/"molde" que define las caracteristicas
   y comportamientos comunes a un grupo de objetos. Las clases actuan como 
   estructura en la cual se definiran aquellas propiedades y comportamientos que 
   posteriormente el objeto poseera.
   *METODO: Los metodos son funciones asociadas a una clase que definen el 
   comportamiento y las acciones que los objetos de esa clase pueden realizar.
   Cada método define una operación específica que puede ser ejecutada sobre 
   un objeto de esa clase.
   *ATRIBUTO: Los atributos son variables que estan asociadas a un objeto y que representan
   las caracteriticas o propiedades del mismo. Estos atributos se definen en las clases
   (estructura) y son compartidos por todos los objetos que se creen a partir de esa clase.
   También se les conoce como campos, propiedades o variables de instancia
   Los atributos definen el estado de un objeto en un momento dado, y puedenb ser de 
   difrentes tipos de datos (enteros, cadenas, booleanos, etc).

2-
    Para entender la diferencia entre variable instancia e instancia de una clase se necesita
    saber la definicion de ambas. Como se menciono anteriormente, una variable de instancia 
    es otra forma de nombrar a los atributos de una clase, es decir, son las variables que
    representan las caracteristicas o propiedades de un objeto. Por otro lado, una instancia
    de una clase es un objeto que ha sido creado a partir de una clase. Podemos notar que la 
    diferencia radica en que una variable de instancia es una parte de la estructura de la clase
    mientras que una instancia de la clase hace referencia a la creacion de un objeto que proviene
    de esa clase. Podemos pensarlo como que una variable istancia es una "propiedad" y 
    una instancia de una clase es un "objeto" -> creacion del mismo.

3-  Clases (C) , Atributos (A) y Metodos (M)
    C: Mouse, Televisor , Reloj , Persona
    A: fechaNamicimiento , inalambrico , documento
    M: darCanalActual , configurarDespertador , encender , darHoraActual , irCanalTv , PonerHora
    darPosicionActual.

4-   
    1-Auto -> atributos: marca, modelo, año, color, patente, kilometraje, precio
           -> metodos: encender, apagar, acelerar, frenar, girar, cambiarVelocidad
    2-Perro -> atributos: nombre, raza, edad, color, peso, altura, dueño
            -> metodos: ladrar, correr, saltar, dormir, comer, jugar
    3-Lampara -> atributos: marca, modelo, color, tamaño, peso, precio
              -> metodos: encender, apagar, cambiarIntensidad, cambiarColor, cambiarLampara
    4-Celular -> atributos: marca, modelo, color, tamaño, peso, memoria, precio
              -> metodos: llamar, enviarMensaje, recibirLlamada, sacarFoto, grabarVideo, escucharMusica
    5-Computadora -> atributos: marca, modelo, color, tamaño, peso, memoria, precio
                  -> metodos: encender, apagar, abrirPrograma, cerrarPrograma, guardarArchivo, eliminarArchivo

5- Persona
    -Atributos: nombre, apellido, edad, documento, direccion, telefono, email
    -Metodos: caminar, correr, saltar, dormir, comer, estudiar, trabajar, hablar, escuchar, ver, pensar

6- Los metodos que debemos encontrar implementados en una clase son el constructor, los metodos
    get y set para cada atributo, el metodo __toString() y los metodos que se consideren necesarios
    para el funcionamiento de la clase. El constructor es el metodo que se encarga de inicializar
    los atributos de la clase, los metodos get y set son los metodos que permiten obtener y modificar
    los valores de los atributos de la clase, el metodo __toString() es el metodo que permite definir
    como se debe comportar un objeto al ser convertido a string, y los metodos que se consideren necesarios
    para el funcionamiento de la clase son aquellos que permiten realizar acciones o comportamientos
    especificos de la clase.

7- El metodo __toString() permite definir como se debe comportar un objeto al ser convertido a string.
    Es decir, permite manipular como se mostrara el objeto al ser impreso o convertido a string.
    Este metodo es llamado automaticamente cuando se intenta imprimir un objeto o cuando se intenta
    convertir un objeto a string. Por ejemplo, si se tiene un objeto de la clase Persona y se intenta
    imprimirlo, se llamara automaticamente al metodo __toString() de la clase Persona para que este
    defina como se mostrara el objeto al ser impreso.

8- El metodo que se ejecuta cuando se crea una instancia de una clase es el metodo Constructor.
   El metodo constructor es automaticamente invocado al crear un objeto y el mismo permite 
   inicializar los atributos de la clase. Este metodo es el encargado de inicializar los valores
   de los atributos de la clase al momento de crear un objeto. El metodo constructor se define
   con el nombre __construct() y puede recibir parametros para inicializar los atributos de la clase.

9- Cuando se utiliza $this como parametro de un metodo se hace referencia a la instancia actual
   de la clase. Es decir, hace referencia al objeto que se esta utilizando en ese momento.
   El uso de $this permite acceder a los atributos y metodos de la clase desde dentro de la misma
   clase. Podemos pernsarlo como si se estuviese haciendo una referencia a "este" objeto, 
   siendo que el "este" o "$this" permite acceder a los atributos y metodos de "$this" clase.
*/

// 10.a - 

class Calculadora {
    // atributos
    private $valorA;
    private $valorB;
    private $resultado;
    // constructor
    public function __construct($valorA , $valorB) {
        $this->valorA = $valorA;
        $this->valorB = $valorB;
    }
    // getters y setters
    public function getValorA() {
        return $this->valorA;
    }
    public function getValorB() {
        return $this->valorB;
    }
    public function getResultado() {
        return $this->resultado;
    }
    public function setResultado($value) {
        return $this->resultado = $value;
    }
    public function setValorA ($valorA) {
        return $this->valorA = $valorA;
    }
    public function setValorB($valorB) {
        return $this->valorB = $valorB;
    }
    
    // metodos
    /**
     * Retorna la Suma entre dos numeros
     * @return $resultado
     */
    public function suma() {
        return $this->setResultado($this->getValorA() + $this->getValorB());
    }
    /**
     * Retorna la resta entre dos numeros
     * @return $resultado
     */
    public function resta() {
        return $this->setResultado($this->getValorA() - $this->getValorB());
    }
    /**
     * Retorna la multiplicacion entre dos numeros
     * @return $resultado
     */
    public function multiplicacion() {
        return $this->setResultado($this->getValorA() * $this->getValorB());
    }
    /**
     * Retorna la division entre dos numeros
     * @return $resultado
     */
    public function division() {
        return $this->setResultado($this->getValorA() / $this->getValorB());
    }
    /**
     * Retorna los valores de las variables intancia.
     * @return string
     */
    public  function  __toString() {
        return "Valor A: " . $this->getValorA() . "\n" . "Valor B: " .  $this->getValorB() . "\n" . "Resultado: " . $this->getResultado();
    }
}


