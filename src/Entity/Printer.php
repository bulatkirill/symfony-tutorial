<?php


namespace App\Entity;


class Printer
{
    private $id;
    private $name;
    private $note;

    /**
     * Reservation constructor.
     * @param $id
     * @param $name
     * @param $note
     */
    public function __construct($id, $name, $note)
    {
        $this->id = $id;
        $this->name = $name;
        $this->note = $note;
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
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $note
     */
    public function setNote($note): void
    {
        $this->note = $note;
    }


}