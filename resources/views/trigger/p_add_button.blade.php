@inject('modal', 'App\lib\TriggerModal')
<div class="btn btn-success form-control" data-toggle="modal" data-target="#{{$modal->getID()}}">Add Trigger</div>