<div class='container'>
    <div class='row'>
        <div class='col-sm-4'>#</div>
        <div class='col-sm-4'>Name</div>
        <div class='col-sm-4'>Description</div>
    </div>
    <div class='row'>
        <div class='col-sm-4'>{!! link_to_action('MedicineController@edit', $medicine->name ,$medicine->id) !!}</div>
        <div class='col-sm-4'>{{$medicine->description}}</div>
        <div class='col-sm-4'>{!! link_to_action('MedicineController@destroy', 'Remove Medication', $medicine, ['class' => 'btn']) !!}</div>
    </div>
</div>
