@extends('master')

@section('content')
<div class='col-sm-12'>
    
    <div class='row'>
        <div class='panel panel-info'>
            <div class='panel-heading'>
                <div class='container'>
                    
                    <div class='row'>                
                        <div class='col-sm-12'>
                            <h3>Journal Records</h3>
                        </div>
                    </div>
                    
                    <div class='row'>
                        <div class='col-sm-3'>
                            <span>#</span>
                        </div>
                        <div class='col-sm-3'>
                            <span>Name</span>
                        </div>
                        <div class='col-sm-3'>
                            <span>Severity</span>
                        </div>
                        <div class='col-sm-3'>
                            <span>Location</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class='panel-body'>
                @foreach($journals as $i => $journal)
                    <div class='row'>
                        <div class='col-xs-3'>
                            {{ $i }}
                        </div>
                        <div class='col-xs-3'>
                            {!! link_to_action('JournalController@show' , $journal->name, $journal->id) !!}
                        </div>
                        <div class='col-xs-3'>
                            {{ $journal->severity }}
                        </div>
                        <div class='col-xs-3'>
                            {{ $journal->loc_long }}, {{$journal->loc_lat}}
                        </div>
                    </div>
                @endforeach 
            </div>
            
        </div>
    </div>
    
</div>
@stop