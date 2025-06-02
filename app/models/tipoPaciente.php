<?php
require_once(__DIR__ . '/../config/conexion.php');
require_once(__DIR__ . '/../dao/TipoPacienteDAO.php');

class TipoPaciente
{
    private $idTipoPaciente;
    private $nombreTipo;

    public function getIdTipoPaciente()
    {
        return $this->idTipoPaciente;
    }
    public function setIdTipoPaciente($idTipoPaciente)
    {
        $this->idTipoPaciente = $idTipoPaciente;
    }

    public function getNombreTipo()
    {
        return $this->nombreTipo;
    }
    public function setNombreTipo($nombreTipo)
    {
        $this->nombreTipo = $nombreTipo;
    }

    public function __construct($idTipoPaciente = 0, $nombreTipo = "")
    {
        $this->idTipoPaciente = $idTipoPaciente;
        $this->nombreTipo = $nombreTipo;
    }

    public function consultarPorId()
    {
        $conexion = new Conexion();
        $conexion->abrirConexion();
        $dao = new TipoPacienteDAO($this->idTipoPaciente);
        $conexion->ejecutarConsulta($dao->consultarPorId());

        if ($conexion->numeroFilas() == 0) {
            $conexion->cerrarConexion();
            return false;
        }

        $registro = $conexion->siguienteRegistro();
        $this->nombreTipo = $registro[0];
        $conexion->cerrarConexion();
        return true;
    }

    public function consultarTodos()
    {
        $conexion = new Conexion();
        $conexion->abrirConexion();
        $dao = new TipoPacienteDAO();
        $conexion->ejecutarConsulta($dao->consultarTodos());

        $lista = array();
        while ($registro = $conexion->siguienteRegistro()) {
            $obj = new TipoPaciente($registro[0], $registro[1]);
            array_push($lista, $obj);
        }
        $conexion->cerrarConexion();
        return $lista;
    }
}
?>
