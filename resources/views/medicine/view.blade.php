@foreach($user->medicines as $medicine)
    <div class=""><span class=''>{!! link_to_action('MedicineController@edit', $medicine->name , $medicine->id ) !!}:&nbsp;&nbsp;</span><span class='item'>{{$medicine->description}}</span></div>
@endforeach
<hr />