@inject('modal', 'App\lib\MedicineModal')
<div class="btn btn-success form-control" data-toggle="modal" data-target="#{{$modal->getID()}}">Add Medicine</div>