<?php
class EstadoCitaDAO
{
    private $idEstadoCita;
    private $estadoCita;
    private $fechaInicio;
    private $fechaTerminacion;
    private $motivo;

    public function __construct($idEstadoCita = 0, $estadoCita = "", $fechaInicio = "", $fechaTerminacion = null, $motivo = null)
    {
        $this->idEstadoCita = $idEstadoCita;
        $this->estadoCita = $estadoCita;
        $this->fechaInicio = $fechaInicio;
        $this->fechaTerminacion = $fechaTerminacion;
        $this->motivo = $motivo;
    }

    public function consultarPorId()
    {
        return "SELECT estado_cita, fecha_inicio, fecha_terminacion, motivo
                FROM estado_cita
                WHERE id_estado_cita = $this->idEstadoCita";
    }

    public function consultarTodos()
    {
        return "SELECT id_estado_cita, estado_cita, fecha_inicio, fecha_terminacion, motivo
                FROM estado_cita";
    }
}
