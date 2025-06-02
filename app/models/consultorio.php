<?php
require_once(__DIR__ . '/../config/conexion.php');
require_once(__DIR__ . '/../dao/ConsultorioDAO.php');

class Consultorio
{
    private $idConsultorio;
    private $lugarCita;

    public function getIdConsultorio()
    {
        return $this->idConsultorio;
    }
    public function setIdConsultorio($idConsultorio)
    {
        $this->idConsultorio = $idConsultorio;
    }

    public function getLugarCita()
    {
        return $this->lugarCita;
    }
    public function setLugarCita($lugarCita)
    {
        $this->lugarCita = $lugarCita;
    }

    public function __construct($idConsultorio = 0, $lugarCita = "")
    {
        $this->idConsultorio = $idConsultorio;
        $this->lugarCita = $lugarCita;
    }

    public function consultarPorId()
    {
        $conexion = new Conexion();
        $conexion->abrirConexion();
        $dao = new ConsultorioDAO($this->idConsultorio);
        $conexion->ejecutarConsulta($dao->consultarPorId());

        if ($conexion->numeroFilas() == 0) {
            $conexion->cerrarConexion();
            return false;
        }

        $registro = $conexion->siguienteRegistro();
        $this->lugarCita = $registro[0];
        $conexion->cerrarConexion();
        return true;
    }

    public function consultarTodos()
    {
        $conexion = new Conexion();
        $conexion->abrirConexion();
        $dao = new ConsultorioDAO();
        $conexion->ejecutarConsulta($dao->consultarTodos());

        $lista = array();
        while ($registro = $conexion->siguienteRegistro()) {
            $obj = new Consultorio($registro[0], $registro[1]);
            array_push($lista, $obj);
        }
        $conexion->cerrarConexion();
        return $lista;
    }
}
?>