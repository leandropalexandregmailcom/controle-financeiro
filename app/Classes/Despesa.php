<?php

namespace App\Classes;

use Financa;

class Despesa extends Financa{

    private $id_despesa;

    /**
     * Get the value of id_despesa
     */
    public function getId_despesa()
    {
        return $this->id_despesa;
    }

    /**
     * Set the value of id_despesa
     *
     * @return  self
     */
    public function setId_despesa($id_despesa)
    {
        $this->id_despesa = $id_despesa;

        return $this;
    }
}
