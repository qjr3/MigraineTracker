<?php
namespace App\lib;
class TriggerModal extends Modal{
    public function __construct()
    {
        $this->setTitle('Add Trigger');
        $this->setInclude('trigger.p_create');
        $this->setID('addTrigger');
        $this->setButtonText('Add');
    }
}