@foreach($user->triggers as $trigger)
    <div>
        <div class="item-header">{{$trigger->name}}: </div>
        <div class="item">{{$trigger->description}}</div>
    </div>
@endforeach