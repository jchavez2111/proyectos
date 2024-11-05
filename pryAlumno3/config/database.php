<?php
class Database
{
    private $host = "localhost";
    private $db_name = "eti";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}

// Crear una instancia de la clase Database
$database = new Database();

// Obtener la conexión
$conn = $database->getConnection();

// Verificar si la conexión es correcta
if ($conn) {
   // echo "Conexión exitosa a la base de datos.";
} else {
    echo "Error al conectar a la base de datos.";
}
?>
