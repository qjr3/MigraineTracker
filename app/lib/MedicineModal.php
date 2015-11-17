<?php
namespace App\lib;
class MedicineModal extends Modal{
    public function __construct()
    {
        $this->setTitle('Add Medicine');
        $this->setInclude('medicine.p_create');
        $this->setID('addMedicine');
        $this->setButtonText('Add');
    }
}