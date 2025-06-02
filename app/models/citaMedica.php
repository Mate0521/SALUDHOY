<?php
require_once(__DIR__ . '/../config/conexion.php');
require_once(__DIR__ . '/../dao/CitaMedicaDAO.php');

class CitaMedica
{
    private $codigoCita;
    private $fechaCita;
    private $idConsultorio;
    private $idMedico;
    private $idPaciente;
    private $idEstadoCita;

    public function getCodigoCita()
    {
        return $this->codigoCita;
    }
    public function setCodigoCita($codigoCita)
    {
        $this->codigoCita = $codigoCita;
    }

    public function getFechaCita()
    {
        return $this->fechaCita;
    }
    public function setFechaCita($fechaCita)
    {
        $this->fechaCita = $fechaCita;
    }

    public function getIdConsultorio()
    {
        return $this->idConsultorio;
    }
    public function setIdConsultorio($idConsultorio)
    {
        $this->idConsultorio = $idConsultorio;
    }

    public function getIdMedico()
    {
        return $this->idMedico;
    }
    public function setIdMedico($idMedico)
    {
        $this->idMedico = $idMedico;
    }

    public function getIdPaciente()
    {
        return $this->idPaciente;
    }
    public function setIdPaciente($idPaciente)
    {
        $this->idPaciente = $idPaciente;
    }

    public function getIdEstadoCita()
    {
        return $this->idEstadoCita;
    }
    public function setIdEstadoCita($idEstadoCita)
    {
        $this->idEstadoCita = $idEstadoCita;
    }

    public function __construct($codigoCita = 0, $fechaCita = "", $idConsultorio = 0, $idMedico = 0, $idPaciente = 0, $idEstadoCita = 0)
    {
        $this->codigoCita = $codigoCita;
        $this->fechaCita = $fechaCita;
        $this->idConsultorio = $idConsultorio;
        $this->idMedico = $idMedico;
        $this->idPaciente = $idPaciente;
        $this->idEstadoCita = $idEstadoCita;
    }

    public function consultarPorId()
    {
        $conexion = new Conexion();
        $conexion->abrirConexion();
        $dao = new CitaMedicaDAO($this->codigoCita);
        $conexion->ejecutarConsulta($dao->consultarPorId());

        if ($conexion->numeroFilas() == 0) {
            $conexion->cerrarConexion();
            return false;
        }

        $registro = $conexion->siguienteRegistro();
        $this->fechaCita = $registro[0];
        $this->idConsultorio = $registro[1];
        $this->idMedico = $registro[2];
        $this->idPaciente = $registro[3];
        $this->idEstadoCita = $registro[4];
        $conexion->cerrarConexion();
        return true;
    }

    public function consultarTodos()
    {
        $conexion = new Conexion();
        $conexion->abrirConexion();
        $dao = new CitaMedicaDAO();
        $conexion->ejecutarConsulta($dao->consultarTodos());

        $lista = array();
        while ($registro = $conexion->siguienteRegistro()) {
            $obj = new CitaMedica($registro[0], $registro[1], $registro[2], $registro[3], $registro[4], $registro[5]);
            array_push($lista, $obj);
        }
        $conexion->cerrarConexion();
        return $lista;
    }
}
?>