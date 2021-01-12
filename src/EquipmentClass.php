<?php


class EquipmentClass
{
    private $id;
    private $idequipment;
    private $equipmentname;
    private $serialnumber;
    private $equipmentdate;
    private $idinvoiceequipment;
    private $warrantydate;
    private $netamountequipment;
    private $equipmentowner;
    private $equipmentnotes;

    public function serialize(){
        return [
            'id' => $this->getId(),
            '$idequipment' => $this->getIdequipment(),
            '$equipmentname' => $this->getEquipmentname(),
            'serialnumber' => $this->getSerialnumber(),
            'equipmentdate' => $this->getEquipmentdate(),
            'idinvoiceequipment' => $this->getIdinvoiceequipment(),
            'warrantydate' => $this->getWarrantydate(),
            'netamountequipment' => $this->getNetamountequipment(),
            'equipmentowner' => $this->getEquipmentowner(),
            'equipmentnotes' => $this->getEquipmentnotes(),
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
    public function getIdequipment()
    {
        return $this->idequipment;
    }

    /**
     * @param mixed $idequipment
     */
    public function setIdequipment($idequipment)
    {
        $this->idequipment = $idequipment;
    }

    /**
     * @return mixed
     */
    public function getEquipmentname()
    {
        return $this->equipmentname;
    }

    /**
     * @param mixed $equipmentname
     */
    public function setEquipmentname($equipmentname)
    {
        $this->equipmentname = $equipmentname;
    }

    /**
     * @return mixed
     */
    public function getSerialnumber()
    {
        return $this->serialnumber;
    }

    /**
     * @param mixed $serialnumber
     */
    public function setSerialnumber($serialnumber)
    {
        $this->serialnumber = $serialnumber;
    }

    /**
     * @return mixed
     */
    public function getEquipmentdate()
    {
        return $this->equipmentdate;
    }

    /**
     * @param mixed $equipmentdate
     */
    public function setEquipmentdate($equipmentdate)
    {
        $this->equipmentdate = $equipmentdate;
    }

    /**
     * @return mixed
     */
    public function getIdinvoiceequipment()
    {
        return $this->idinvoiceequipment;
    }

    /**
     * @param mixed $idinvoiceequipment
     */
    public function setIdinvoiceequipment($idinvoiceequipment)
    {
        $this->idinvoiceequipment = $idinvoiceequipment;
    }

    /**
     * @return mixed
     */
    public function getWarrantydate()
    {
        return $this->warrantydate;
    }

    /**
     * @param mixed $warrantydate
     */
    public function setWarrantydate($warrantydate)
    {
        $this->warrantydate = $warrantydate;
    }

    /**
     * @return mixed
     */
    public function getNetamountequipment()
    {
        return $this->netamountequipment;
    }

    /**
     * @param mixed $netamountequipment
     */
    public function setNetamountequipment($netamountequipment)
    {
        $this->netamountequipment = $netamountequipment;
    }

    /**
     * @return mixed
     */
    public function getEquipmentowner()
    {
        return $this->equipmentowner;
    }

    /**
     * @param mixed $equipmentowner
     */
    public function setEquipmentowner($equipmentowner)
    {
        $this->equipmentowner = $equipmentowner;
    }

    /**
     * @return mixed
     */
    public function getEquipmentnotes()
    {
        return $this->equipmentnotes;
    }

    /**
     * @param mixed $equipmentnotes
     */
    public function setEquipmentnotes($equipmentnotes)
    {
        $this->equipmentnotes = $equipmentnotes;
    }
}