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
        return substr($this->trame,7,1);
    }
    public function getNumeroCapteur() {
        return substr($this->trame,8,2);
    }
    public function getValeur() {
        return substr($this->trame,10,4);
    }
    public function getNumeroTrame() {
        return substr($this->trame,14,4);
    }
    public function getChecksum() {
        return substr($this->trame,18,2);
    }
    public function getAnnee() {
        return substr($this->trame,20,4);
    }
    public function getMois() {
        return substr($this->trame,24,2);
    }
    public function getJour() {
        return substr($this->trame,26,2);
    }
    public function getHeure() {
        return substr($this->trame,28,2);
    }
    public function getMinute() {
        return substr($this->trame,30,2);
    }
    public function getSeconde() {
        return substr($this->trame,32,2);
    }
    public function getDate() {
        return $this->getAnnee().'-'.$this->getMois().'-'.$this->getJour().'-'.$this->getHeure().'-'.$this->getMinute().'-'.$this->getSeconde();
    }

}