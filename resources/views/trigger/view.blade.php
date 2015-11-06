@foreach($user->triggers as $trigger)
    <div class=""><span class=''>{!! link_to_action('TriggerController@edit', $trigger->name ,$trigger->id) !!}:&nbsp;&nbsp;</span><span class='item'>{{$trigger->description}}</span></div>
@endforeach
<hr />