

<?php 

    class userQueries{

        public $user = "davidpw";
        public $pass = "";
        public $dbc;
      
        public function __construct(){  // Constructor de la clase empQueries()
            $this->dbc = $this->dbconnect();
        }
        
        public function dbconnect(){  // Conexión a la base de datos
            $dbc = null;
            try {
                $dbc = new PDO('mysql:host=localhost; dbname=empleados', $this->user,
                $this->pass, array(PDO::ATTR_PERSISTENT => true));
            } catch (PDOException $e) {
                    return null;
            }
            return $dbc;
        }

        public function getUserInfo($user){   // Comprueba que el usuario existe en la BD

            $sentence = $this->dbc->prepare("SELECT * FROM usuarios WHERE usuario = '$user'");
            if($sentence->execute()){
              $dbUser = $sentence->fetch();
                if(empty($dbUser)){
                    return false;
                }else{
                    return $dbUser;
                }
            }            
        }
    
        public function checkUserExist($user){   // Comprueba que el usuario existe en la BD

            $sentence = $this->dbc->prepare("SELECT * FROM usuarios WHERE usuario = '$user'");
            if($sentence->execute()){
              $dbUser = $sentence->fetch();
                if(empty($dbUser)){
                    return false;
                }else{
                    return true;
                }
            }            
        }

        public function checkPass($pass){
            
            echo "$pass";

            if(strlen($pass) < 7){
                echo "La clave debe tener al menos 8 caracteres";
                return false;
            }
            if(strlen($pass) > 16){
                echo "La clave no puede tener más de 16 caracteres";
                return false;
            }
            
            if (!preg_match('`[0-9]`',$pass)){
                echo "La clave debe tener al menos un caracter numérico";
                return false;
            }

            if (stristr($pass, " ")){
                echo "La clave no puede tener espacios";
                return false;
            }
            
            return true;
        
        }

        public function registerUser($user,$pass,$dni){
            
            $token = hash('ripemd128', $pass);
            
            $sentence = $this->dbc->prepare("INSERT INTO Usuarios (dni,
            usuario,pass,rol)VALUES ('$dni', '$user', '$token', 'User');");

            if($sentence->execute()){
              echo "<br>Registro completado: $user";
              return true;
            }else{
              echo "<br>Error en el registro: $user";
              return false;
            }

        }

        public function checkPassBD($usuario,$pass){
            
            $sentence = $this->dbc->prepare("SELECT * FROM usuarios WHERE usuario = '$usuario'");
            
            if($sentence->execute()){
                $usuario = $sentence->fetch(); 
            }else{
                echo "Error al obtener el empleado";
                return false;
            }

            $token = hash('ripemd128',$pass);

            if(strcmp($token,$usuario['pass'])==0){
                echo "Coincide la contraseña";

                return true;
            }else{
                echo "No coincide la contraseña";
                
                return false;
            }

        }

        public function checkDNI($dni){
            if(ctype_digit($dni)!=true && strlen($dni) == 8){
                return false;
            }else{
                return true;
            }
        }



        
    }







?>