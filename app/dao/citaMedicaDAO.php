<?php
class CitaMedicaDAO
{
    private $codigoCita;
    private $fechaCita;
    private $idConsultorio;
    private $idMedico;
    private $idPaciente;
    private $idEstadoCita;

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
        return "SELECT fecha_cita, id_consultorio, id_medico, id_paciente, id_estado_cita
                FROM cita_medica
                WHERE codigo_cita = $this->codigoCita";
    }

    public function consultarTodos()
    {
        return "SELECT codigo_cita, fecha_cita, id_consultorio, id_medico, id_paciente, id_estado_cita
                FROM cita_medica";
    }
}
