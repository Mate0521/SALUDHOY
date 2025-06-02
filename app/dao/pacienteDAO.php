<?php
class PacienteDAO
{
    private $numeroIdentificacion;
    private $idTipoIdentificacion;
    private $nombre;
    private $apellido;
    private $direccion;
    private $idMunicipioResidencia;
    private $fechaNacimiento;
    private $clave;
    private $idTipoPaciente;

    public function __construct($numeroIdentificacion = 0, $idTipoIdentificacion = 0, $nombre = "", $apellido = "", $direccion = "", $idMunicipioResidencia = 0, $fechaNacimiento = "", $clave = "", $idTipoPaciente = 0)
    {
        $this->numeroIdentificacion = $numeroIdentificacion;
        $this->idTipoIdentificacion = $idTipoIdentificacion;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->direccion = $direccion;
        $this->idMunicipioResidencia = $idMunicipioResidencia;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->clave = $clave;
        $this->idTipoPaciente = $idTipoPaciente;
    }
    public function autenticar()
    {
        return "SELECT p.numero_identificacion, p.nombre, p.clave
                FROM persona p
                JOIN paciente e ON p.numero_identificacion = e.id_numero_identificacion
                WHERE p.nombre = '$this->nombre' AND p.clave = '$this->clave'";
    }
    public function consultarPorId()
    {
            return "SELECT id_tipo_identificacion, nombre, apellido, direccion, id_municipio_residencia, fecha_nacimiento, clave
                    FROM persona
                    WHERE numero_identificacion = $this->numeroIdentificacion";
    }

    public function consultarTodos()
    {
        return "SELECT numero_identificacion, id_tipo_identificacion, nombre, apellido, direccion, id_municipio_residencia, fecha_nacimiento, id_tipo_paciente, clave
                FROM persona";
    }
}
