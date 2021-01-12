<?php
class DocumentsClass{
    private $id;
    private $iddocument;
    private $dateinvoice;
    private $sender;
    private $recipient;
    private $notes;
    private $url;

    public function serialize(){
        return [
            'id' => $this->getId(),
            'iddocument' => $this->getIddocument(),
            'dateinvoice' => $this->getDateinvoice(),
            'sender' => $this->getSender(),
            'recipient' => $this->getRecipient(),
            'notes' => $this->getNotes(),
            'url' => $this->getUrl(),
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
    public function getIddocument()
    {
        return $this->iddocument;
    }

    /**
     * @param mixed $iddocument
     */
    public function setIddocument($iddocument)
    {
        $this->iddocument = $iddocument;
    }

    /**
     * @return mixed
     */
    public function getDateinvoice()
    {
        return $this->dateinvoice;
    }

    /**
     * @param mixed $dateinvoice
     */
    public function setDateinvoice($dateinvoice)
    {
        $this->dateinvoice = $dateinvoice;
    }

    /**
     * @return mixed
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * @param mixed $sender
     */
    public function setSender($sender)
    {
        $this->sender = $sender;
    }

    /**
     * @return mixed
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    /**
     * @param mixed $recipient
     */
    public function setRecipient($recipient)
    {
        $this->recipient = $recipient;
    }

    /**
     * @return mixed
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param mixed $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }
}
