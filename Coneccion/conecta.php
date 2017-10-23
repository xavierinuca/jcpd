<?php
//clase para la conexion de la base de datos
class MySQL
{
    private $database = "BDD_JCPD";
    private $usuario = "root";
    private $password = "";
    private $host = "localhost";
    private $conexion;
    private $total_consultas;

    public function MySQL()
    {
        if (!isset($this->conexion)) {
            $this->conexion = (mysqli_connect($this->host, $this->usuario, $this->password, $this->database))
            or die(mysqli_error());
        }
    }

    public function verificarU($CI, $pass)
    {

            $busq = mysqli_query($this->conexion, "SELECT 
  t_usuarios.USU_ID,
  t_usuarios.USU_NOMBRE,
  t_usuarios.USU_APELLIDO,
  t_usuarios.USU_CEDULA,
  t_usuarios.USU_PASWORD,
  t_usuarios.USU_ESTADO,
  t_roles.ROL_TIPO
FROM
  t_roles
  INNER JOIN t_usuarios ON (t_roles.ROL_ID = t_usuarios.rol_id) WHERE t_usuarios.USU_CEDULA='$CI' AND t_usuarios.USU_PASWORD='$pass' AND t_usuarios.USU_ESTADO=1;");
            $rows = $this->fetch_array($busq);

            return $rows;
    }

    public function consulta($query)
    {
        $this->total_consultas++;
        $resultado = mysqli_query($this->conexion, $query);
        if (!$resultado) {
            echo 'MySQL Error: ' . mysqli_error();
            exit;
        }
        return $resultado;
    }


    public function fetch_array($query)
    {
        return mysqli_fetch_array($query);
    }

    public function num_rows($query)
    {
        return mysqli_num_rows($query);
    }

    public function getTotalConsultas()
    {
        return $this->total_consultas;
    }
    public function next_result()
    {
       $this->conexion->next_result();
    }
    public function close()
    {
        $this->conexion->close();
    }
}