<?php

class Financa{

    private $id_financa;
    private $nome;
    private $descricao;
    private $data;
    private $status;
    private $id_categoria;
    private $tipo;
    private $create_date;
    private $update_date;

    /**
     * Get the value of id_financa
     */
    public function getId_financa()
    {
        return $this->id_financa;
    }

    /**
     * Set the value of id_financa
     *
     * @return  self
     */
    public function setId_financa($id_financa)
    {
        $this->id_financa = $id_financa;

        return $this;
    }

    /**
     * Get the value of nome
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of descricao
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     *
     * @return  self
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get the value of data
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of data
     *
     * @return  self
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of id_categoria
     */
    public function getId_categoria()
    {
        return $this->id_categoria;
    }

    /**
     * Set the value of id_categoria
     *
     * @return  self
     */
    public function setId_categoria($id_categoria)
    {
        $this->id_categoria = $id_categoria;

        return $this;
    }

    /**
     * Get the value of tipo
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *
     * @return  self
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get the value of create_date
     */
    public function getCreate_date()
    {
        return $this->create_date;
    }

    /**
     * Set the value of create_date
     *
     * @return  self
     */
    public function setCreate_date($create_date)
    {
        $this->create_date = $create_date;

        return $this;
    }

    /**
     * Get the value of update_date
     */
    public function getUpdate_date()
    {
        return $this->update_date;
    }

    /**
     * Set the value of update_date
     *
     * @return  self
     */
    public function setUpdate_date($update_date)
    {
        $this->update_date = $update_date;

        return $this;
    }
}
