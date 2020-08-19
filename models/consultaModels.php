<?php
require_once $_SERVER['DOCUMENT_ROOT']."/bienestarYnuevaImagen/config/modeloBase.php";
// require_once $_SERVER['DOCUMENT_ROOT']."/config/modeloBase.php";

class Consulta extends ModeloBase{
    private $id;
    private $cobro;
    private $estatura;

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Get the value of estatura
     */ 
    public function getEstatura()
    {
        return $this->estatura;
    }

    /**
     * Set the value of estatura
     *
     * @return  self
     */ 
    public function setEstatura($estatura)
    {
        $this->estatura = $estatura;

        return $this;
    }

    /**
     * Get the value of cobro
     */ 
    public function getCobro()
    {
        return $this->cobro;
    }

    /**
     * Set the value of cobro
     *
     * @return  self
     */ 
    public function setCobro($cobro)
    {
        $this->cobro = $cobro;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    public function getPaciente(){
        $consulta = "SELECT c.idCliente,c.nombreCliente,c.apPatCliente,c.apMatCliente,c.nombreRecomiendaCliente FROM cliente c WHERE c.idCliente = '{$this->getId()}'";
        $query = $this->db->query($consulta);

        if($query && $query->num_rows == 1){
            $paciente = $query->fetch_object();
            return $paciente;
        }
    }


}