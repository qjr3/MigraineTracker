@inject('modal', 'App\lib\MedicineModal')
<span class="btn btn-success" data-toggle="modal" data-target="#{{$modal->getID()}}">Add Medicine</span>