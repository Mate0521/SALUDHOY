<?php
class HorarioDisponibleDAO
{
    private $idHorarioDisponible;
    private $idPersona;
    private $fechaHorario;

    public function __construct($idHorarioDisponible = 0, $idPersona = 0, $fechaHorario = "")
    {
        $this->idHorarioDisponible = $idHorarioDisponible;
        $this->idPersona = $idPersona;
        $this->fechaHorario = $fechaHorario;
    }

    public function consultarPorId()
    {
        return "SELECT id_persona, fecha_horario
                FROM horario_disponible
                WHERE id_horario_disponible = $this->idHorarioDisponible";
    }

    public function consultarTodos()
    {
        return "SELECT id_horario_disponible, id_persona, fecha_horario
                FROM horario_disponible";
    }
}
