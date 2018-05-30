<?php

Class Trame
{
    private $trame;

    /**
     * Trame constructor.
     * @param $trame
     */
    public function __construct($trame)
    {
        $this->trame = $trame;
    }

    /**
     * @return mixed
     */
    public function getTrame()
    {
        return $this->trame;
    }

    /**
     * @param mixed $trame
     */
    public function setTrame($trame)
    {
        $this->trame = $trame;
    }

    public function type_capteur() {
        return substr($this->trame,6,1);
    }

    public function numero_capteur() {
        return substr($this->trame,7,2);
    }

    public function getValeur() {
        return substr($this->trame,8,3);
    }
}