<?php

class LicenseClass{
    private $id;
    private $idlicense;
    private $licensename;
    private $serialnumberlicense;
    private $licensepurchasedate;
    private $idinvoicelicense;
    private $supportdate;
    private $validtodate;
    private $licenseowner;
    private $licensenotes;

    public function serialize(){
        return [
            'id' => $this->getId(),
            'idlicense' => $this->getIdlicense(),
            'licensename' => $this->getLicensename(),
            'serialnumberlicense' => $this->getSerialnumberlicense(),
            'licensepurchasedate' => $this->getLicensepurchasedate(),
            'idinvoicelicense' => $this->getIdinvoicelicense(),
            'supportdate' => $this->getSupportdate(),
            'validtodate' => $this->getValidtodate(),
            'licenseowner' => $this->getLicenseowner(),
            'licensenotes' => $this->getLicensenotes(),
        ];
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIdlicense()
    {
        return $this->idlicense;
    }

    /**
     * @param mixed $idlicense
     */
    public function setIdlicense($idlicense)
    {
        $this->idlicense = $idlicense;
    }

    /**
     * @return mixed
     */
    public function getLicensename()
    {
        return $this->licensename;
    }

    /**
     * @param mixed $licensename
     */
    public function setLicensename($licensename)
    {
        $this->licensename = $licensename;
    }

    /**
     * @return mixed
     */
    public function getSerialnumberlicense()
    {
        return $this->serialnumberlicense;
    }

    /**
     * @param mixed $serialnumberlicense
     */
    public function setSerialnumberlicense($serialnumberlicense)
    {
        $this->serialnumberlicense = $serialnumberlicense;
    }

    /**
     * @return mixed
     */
    public function getLicensepurchasedate()
    {
        return $this->licensepurchasedate;
    }

    /**
     * @param mixed $licensepurchasedate
     */
    public function setLicensepurchasedate($licensepurchasedate)
    {
        $this->licensepurchasedate = $licensepurchasedate;
    }

    /**
     * @return mixed
     */
    public function getIdinvoicelicense()
    {
        return $this->idinvoicelicense;
    }

    /**
     * @param mixed $idinvoicelicense
     */
    public function setIdinvoicelicense($idinvoicelicense)
    {
        $this->idinvoicelicense = $idinvoicelicense;
    }

    /**
     * @return mixed
     */
    public function getSupportdate()
    {
        return $this->supportdate;
    }

    /**
     * @param mixed $supportdate
     */
    public function setSupportdate($supportdate)
    {
        $this->supportdate = $supportdate;
    }

    /**
     * @return mixed
     */
    public function getValidtodate()
    {
        return $this->validtodate;
    }

    /**
     * @param mixed $validtodate
     */
    public function setValidtodate($validtodate)
    {
        $this->validtodate = $validtodate;
    }

    /**
     * @return mixed
     */
    public function getLicenseowner()
    {
        return $this->licenseowner;
    }

    /**
     * @param mixed $licenseowner
     */
    public function setLicenseowner($licenseowner)
    {
        $this->licenseowner = $licenseowner;
    }

    /**
     * @return mixed
     */
    public function getLicensenotes()
    {
        return $this->licensenotes;
    }

    /**
     * @param mixed $licensenotes
     */
    public function setLicensenotes($licensenotes)
    {
        $this->licensenotes = $licensenotes;
    }


}