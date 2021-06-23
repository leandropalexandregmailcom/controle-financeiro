<?php

namespace App\Classes;

use Financa;

class Renda extends Financa{

    private $id_renda;

    /**
     * Get the value of id_renda
     */
    public function getId_renda()
    {
        return $this->id_renda;
    }

    /**
     * Set the value of id_renda
     *
     * @return  self
     */
    public function setId_renda($id_renda)
    {
        $this->id_renda = $id_renda;

        return $this;
    }
}
