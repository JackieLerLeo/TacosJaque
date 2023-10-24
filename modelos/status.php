<?php
class status{
    private $db;
    public function __construct() {
        $con = new Conexion();
        $this->db = $con->conectar();
    }

    public function mostrarStatus() {
        //  $query = "SELECT id_lista_cursos,titulo, imagen,precio FROM lista_curso";
        //$query = "";
        $query = "SELECT id_status,status from status";
          $stmt = $this->db->prepare($query);
          $stmt->execute();
      
          $cursos = array(); // Inicializa un array para almacenar los cursos
      
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              $cursos[] = $row;
          }
          return $cursos; // Devuelve el array de cursos
      }
    }