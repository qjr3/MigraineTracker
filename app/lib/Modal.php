<?php
namespace App\lib;
abstract class Modal{
    protected $title, $include, $id, $buttonText;
    protected function setTitle($title)
    {
        $this->title = $title;
    }
    protected function setInclude($include)
    {
        $this->include = $include;
    }
    protected function setID($id)
    {
        $this->id = $id;
    }
    protected function setButtonText($buttonText)
    {
        $this->buttonText = $buttonText;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getInclude()
    {
        return $this->include;
    }
    public function getID()
    {
        return $this->id;
    }
    public function getButtonText()
    {
        return $this->buttonText;
    }
}