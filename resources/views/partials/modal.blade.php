<div id="{{$modal->getID()}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{$modal->getTitle()}}</h4>
            </div>
            <div class="modal-body">
                @include($modal->getInclude())
            </div>
        </div>

    </div>
</div>