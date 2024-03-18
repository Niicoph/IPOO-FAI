<?php 

/*;

Implementar una clase Login que almacene el nombreUsuario, contraseña, frase que permite
recordar la contraseña ingresada y las ultimas 4 contraseñas utilizadas. Implementar un método que
permita validar una contraseña con la almacenada y un método para cambiar la contraseña actual por otra
nueva, el sistema deja cambiar la contraseña siempre y cuando esta no haya sido usada recientemente (es
decir no se encuentra dentro de las cuatro almacenadas). Implementar el método recordar que dado el
usuario, muestra la frase que permite recordar su contraseña.


*/


class Login {
    // Atributos
    private $nombreUsuario;
    private $contraseniaUsuario;
    private $fraseRecordar;
    private $storedPasswords = [];
    //Constructor
    public function __construct($usuario , $contrasenia, $frase) {
        $this->nombreUsuario = $usuario;
        $this->contraseniaUsuario = $contrasenia;
        $this->fraseRecordar = $frase;
        $this->storedPasswords[] = $contrasenia;
    }
    // getters y setters
    public function getUsuario() {
        return $this->nombreUsuario;
    }
    public function getPassword() {
        return $this->contraseniaUsuario;
    }
    public function getFraseRecordar() {
        return $this->fraseRecordar;
    }
    public function getStoredPassword() {
        return $this->storedPasswords;
    }
    public function setUsuario($usuario) {
        return $this->nombreUsuario = $usuario;
    }
    public function setPassword($password) {
        return $this->contraseniaUsuario = $password;
    }
    public function setFraseRecordar($frase) {
        return $this->fraseRecordar = $frase;
    }
    // métodos
    public function changePassword($password) {
        $countStoredPasswords = count($this->storedPasswords); // cantidad de elementos en el array
        $indexLimite = 4;                                     // index del limite = 4
        $lastIndex = count($this->storedPasswords) - 1;      // ultimo index del array 
        $lastFourIndex = count($this->storedPasswords) - 3; // obtiene el cuarto index desde el final del array hacia atras
        $foundPassword = false;


        if ($countStoredPasswords < 4)  {
            for ($i = 0 ; $i < $countStoredPasswords  &&   $i < $indexLimite    ; $i++) {
                if ($password  == $this->storedPasswords[$i]) {
                    $foundPassword = true;
                }
            }
        } else {
            for ($i = $lastIndex ; $i > $lastFourIndex ; $i--) {
                if ($password == $this->storedPasswords[$i]) {
                    $foundPassword = true;
                }
            }
        }

        if ($foundPassword) {
            echo "password in use";
        } else {
            echo "password changed sucessfully";
            $this->contraseniaUsuario = $password;
            array_push($this->storedPasswords , $password);
        }
    }
    public function login($password) {
        if ($this->getPassword() == $password ) {
            echo "Password correcta.";
        } else {
            echo "Password incorrecta.";
        }
    }

    public function recordar($usuario) {
        if ($this->getUsuario() == $usuario) {
            echo "Frase de ayuda: " . $this->getFraseRecordar();
        } else {
            echo "Usuario incorrecto";
        }
    }
    public function __toString() {
        return "Usuario: " .  $this->getUsuario() . "/" . " Password: " . $this->getPassword() . "/" . " Frase: " . $this->getFraseRecordar()  ;
    }
    
}
