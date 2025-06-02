<?php
class MunicipioResidenciaDAO
{
    private $idMunicipioResidencia;
    private $municipio;

    public function __construct($idMunicipioResidencia = 0, $municipio = "")
    {
        $this->idMunicipioResidencia = $idMunicipioResidencia;
        $this->municipio = $municipio;
    }

    public function consultarPorId()
    {
        return "SELECT municipio 
                FROM municipio_residencia 
                WHERE id_municipio_residencia = $this->idMunicipioResidencia";
    }

    public function consultarTodos()
    {
        return "SELECT id_municipio_residencia, municipio 
                FROM municipio_residencia";
    }
}
