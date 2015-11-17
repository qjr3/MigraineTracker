@inject('modal', 'App\lib\TriggerModal')
<span class="btn btn-success" data-toggle="modal" data-target="#{{$modal->getID()}}">Add Trigger</span>