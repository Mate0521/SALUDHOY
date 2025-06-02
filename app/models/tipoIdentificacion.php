<?php
require_once(__DIR__ . '/../config/conexion.php');
require_once(__DIR__ . '/../dao/TipoIdentificacionDAO.php');

class TipoIdentificacion
{
    private $idTipoIdentificacion;
    private $tipoIdentificacion;

    public function __construct($idTipoIdentificacion = 0, $tipoIdentificacion = "")
    {
        $this->idTipoIdentificacion = $idTipoIdentificacion;
        $this->tipoIdentificacion = $tipoIdentificacion;
    }

    public function getIdTipoIdentificacion()
    {
        return $this->idTipoIdentificacion;
    }

    public function setIdTipoIdentificacion($idTipoIdentificacion)
    {
        $this->idTipoIdentificacion = $idTipoIdentificacion;
    }

    public function getTipoIdentificacion()
    {
        return $this->tipoIdentificacion;
    }

    public function setTipoIdentificacion($tipoIdentificacion)
    {
        $this->tipoIdentificacion = $tipoIdentificacion;
    }

    public function consultarPorId()
    {
        $conexion = new Conexion();
        $conexion->abrirConexion();
        $dao = new TipoIdentificacionDAO($this->idTipoIdentificacion);
        $conexion->ejecutarConsulta($dao->consultarPorId());

        if ($conexion->numeroFilas() == 0) {
            $conexion->cerrarConexion();
            return false;
        }

        $registro = $conexion->siguienteRegistro();
        $this->tipoIdentificacion = $registro[0];
        $conexion->cerrarConexion();
        return true;
    }

    public function consultarTodos()
    {
        $conexion = new Conexion();
        $conexion->abrirConexion();
        $dao = new TipoIdentificacionDAO();
        $conexion->ejecutarConsulta($dao->consultarTodos());

        $tipos = array();
        while ($registro = $conexion->siguienteRegistro()) {
            $tipo = new TipoIdentificacion($registro[0], $registro[1]);
            array_push($tipos, $tipo);
        }
        $conexion->cerrarConexion();
        return $tipos;
    }
}
?>
