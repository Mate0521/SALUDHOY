<?php
class ConsultorioDAO
{
    private $idConsultorio;
    private $lugarCita;
    
    public function __construct($idConsultorio = 0, $lugarCita = "")
    {
        $this->idConsultorio = $idConsultorio;
        $this->lugarCita = $lugarCita;
    }

    public function consultarPorId()
    {
        return "SELECT lugar_cita
                FROM consultorio
                WHERE id_consultorio = $this->idConsultorio";
    }

    public function consultarTodos()
    {
        return "SELECT id_consultorio, lugar_cita
                FROM consultorio";
    }
}
?>