<?php
require_once(__DIR__ . '/../config/conexion.php');
require_once(__DIR__ . '/../dao/pacienteDAO.php');

class Paciente extends Persona
{
    private $idTipoPaciente;

    public function getIdTipoPaciente()
    {
        return $this->idTipoPaciente;
    }
    public function setIdTipoPaciente($idTipoPaciente)
    {
        $this->idTipoPaciente = $idTipoPaciente;
    }

    public function __construct($numeroIdentificacion = 0, $idTipoIdentificacion = 0, $nombre = "", $apellido = "", $direccion = "", $idMunicipioResidencia = 0, $fechaNacimiento = "", $clave = "", $idTipoPaciente = 0)
    {
        parent::__construct($numeroIdentificacion, $idTipoIdentificacion, $nombre, $apellido, $direccion, $idMunicipioResidencia, $fechaNacimiento, $clave);
        $this->idTipoPaciente = $idTipoPaciente;
    }

    public function autenticar()
    {
        $conexion = new Conexion();
        $conexion->abrirConexion();
        $pacienteDAO = new pacienteDAO(null, null,$this->nombre, null, null, null, null,$this->clave,null);
        $conexion->ejecutarConsulta($pacienteDAO->autenticar());
        if ($conexion->numeroFilas() == 0) {
            $conexion->cerrarConexion();
            return false;
        }
        $registro = $conexion->siguienteRegistro();
        $this->numeroIdentificacion = $registro[0];
        $conexion->cerrarConexion();
        return true;
    }
    public function consultarPorId()
    {
        $conexion = new Conexion();
        $conexion->abrirConexion();
        $dao = new PacienteDAO($this->numeroIdentificacion);
        $conexion->ejecutarConsulta($dao->consultarPorId());

        if ($conexion->numeroFilas() == 0) {
            $conexion->cerrarConexion();
            return false;
        }

        $registro = $conexion->siguienteRegistro();
        $this->idTipoIdentificacion = $registro[0];
        $this->nombre = $registro[1];
        $this->apellido = $registro[2];
        $this->direccion = $registro[3];
        $this->idMunicipioResidencia = $registro[4];
        $this->fechaNacimiento = $registro[5];
        $this->clave = $registro[6];
        $conexion->cerrarConexion();
        return true;
    }

    public function consultarTodos()
    {
        $conexion = new Conexion();
        $conexion->abrirConexion();
        $dao = new PacienteDAO();
        $conexion->ejecutarConsulta($dao->consultarTodos());

        $lista = array();
        while ($registro = $conexion->siguienteRegistro()) {
            $obj = new Paciente(
                $registro[0],
                $registro[1],
                $registro[2],
                $registro[3],
                $registro[4],
                $registro[5],
                $registro[6],
                $registro[7],
                $registro[8] ?? ""
            );
            array_push($lista, $obj);
        }
        $conexion->cerrarConexion();
        return $lista;
    }
}
?>