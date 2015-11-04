@foreach($medicines as $medicine)
    <div>
        <div class="item-header">{{$medicine->name}}: </div>
        <div class="item">{{$medicine->description}}</div>
    </div>
@endforeach