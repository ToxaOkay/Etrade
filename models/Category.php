<?php
class Category {
    private $id = null;
    private $name = null;
    private $parrentid = null;
    private $comment = null;
    private $active = false;
    private $child = array();

    public function getId(){return $this->id;}
    public function getName(){return $this->name;}
    public function getParrentId(){return $this->parrentid;}
    public function getComment(){return $this->comment;}
    public function getActive(){return $this->active;}
    public function getChild(){return $this->child;}

    public function setChild($ar) {$this->child = $ar;}

}