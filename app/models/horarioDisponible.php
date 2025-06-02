<?php
require_once(__DIR__ . '/../config/conexion.php');
require_once(__DIR__ . '/../dao/HorarioDisponibleDAO.php');

class HorarioDisponible
{
    private $idHorarioDisponible;
    private $idPersona;
    private $fechaHorario;

    public function getIdHorarioDisponible()
    {
        return $this->idHorarioDisponible;
    }
    public function setIdHorarioDisponible($idHorarioDisponible)
    {
        $this->idHorarioDisponible = $idHorarioDisponible;
    }

    public function getIdPersona()
    {
        return $this->idPersona;
    }
    public function setIdPersona($idPersona)
    {
        $this->idPersona = $idPersona;
    }

    public function getFechaHorario()
    {
        return $this->fechaHorario;
    }
    public function setFechaHorario($fechaHorario)
    {
        $this->fechaHorario = $fechaHorario;
    }

    public function __construct($idHorarioDisponible = 0, $idPersona = 0, $fechaHorario = "")
    {
        $this->idHorarioDisponible = $idHorarioDisponible;
        $this->idPersona = $idPersona;
        $this->fechaHorario = $fechaHorario;
    }

    public function consultarPorId()
    {
        $conexion = new Conexion();
        $conexion->abrirConexion();
        $dao = new HorarioDisponibleDAO($this->idHorarioDisponible);
        $conexion->ejecutarConsulta($dao->consultarPorId());

        if ($conexion->numeroFilas() == 0) {
            $conexion->cerrarConexion();
            return false;
        }

        $registro = $conexion->siguienteRegistro();
        $this->idPersona = $registro[0];
        $this->fechaHorario = $registro[1];
        $conexion->cerrarConexion();
        return true;
    }

    public function consultarTodos()
    {
        $conexion = new Conexion();
        $conexion->abrirConexion();
        $dao = new HorarioDisponibleDAO();
        $conexion->ejecutarConsulta($dao->consultarTodos());

        $lista = array();
        while ($registro = $conexion->siguienteRegistro()) {
            $obj = new HorarioDisponible($registro[0], $registro[1], $registro[2]);
            array_push($lista, $obj);
        }
        $conexion->cerrarConexion();
        return $lista;
    }
}
?>
