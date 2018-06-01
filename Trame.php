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

    public function getTypeCapteur() {
        return substr($this->trame,6,1);
    }
    public function getNumeroCapteur() {
        return substr($this->trame,7,2);
    }
    public function getValeur() {
        return substr($this->trame,9,4);
    }
    public function getNumeroTrame() {
        return substr($this->trame,13,4);
    }
    public function getChecksum() {
        return substr($this->trame,17,2);
    }
    public function getAnnee() {
        return substr($this->trame,19,4);
    }
    public function getMois() {
        return substr($this->trame,23,2);
    }
    public function getJour() {
        return substr($this->trame,25,2);
    }
    public function getHeure() {
        return substr($this->trame,27,2);
    }
    public function getMinute() {
        return substr($this->trame,29,2);
    }
    public function getSeconde() {
        return substr($this->trame,31,2);
    }

}