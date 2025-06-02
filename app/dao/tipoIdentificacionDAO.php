<?php
class TipoIdentificacionDAO
{
    private $idTipoIdentificacion;
    private $tipoIdentificacion;

    public function __construct($idTipoIdentificacion = 0, $tipoIdentificacion = "")
    {
        $this->idTipoIdentificacion = $idTipoIdentificacion;
        $this->tipoIdentificacion = $tipoIdentificacion;
    }

    public function consultarPorId()
    {
        return "SELECT tipo_identificacion
                FROM tipo_identificacion
                WHERE id_tipo_identificacion = $this->idTipoIdentificacion";
    }

    public function consultarTodos()
    {
        return "SELECT id_tipo_identificacion, tipo_identificacion
                FROM tipo_identificacion";
    }
}
