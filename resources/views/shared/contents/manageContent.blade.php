@if ($message = Session::get('replaySuccess'))
<span class="hintResult">{{ $message }}</span>
@endif
@if($errors->has('Replay')) <span class="hintSpan">{{$errors->first('Replay')}}</span>  @endif
<div class="manageFormTitle">
    <ul class="manageFormTitleUL">
        <li class="manageCreateDate">
            <p>Create Date</p>
        </li>
        <li class="manageTitle"><p>Title</p>
        </li>
        <li class="manageStatus">
            <p>Status</p>
        </li>
        <li class="manageRest"></li>
    </ul>
</div>
<div class="manageFormItemPanel">
    <ul>
        @foreach ($tickets as $ticket)
        <li class="formItem">
            {!! Form::open(['url'=>'manage_action']) !!}
            {{ Form::hidden('formID', $ticket->Tid) }}
            {{ Form::hidden('commentID', $ticket->comment->TicketCID) }}
            <ul class="formInfo">
                <li class="manageCreateDate">
                    <p>{{$ticket->comment->created_at}}</p>
                </li>
                <li class="manageTitle">
                    <p>{{$ticket->Title}}</p>
                </li>
                <li class="manageStatus">
                    <p>{{$ticket->Status}}</p>
                </li>
                <li class="manageRest">
                    <a id="formMore{{$ticket->Tid}}" class="formMoreBtn" data-more="formBtn{{$ticket->Tid}}">MORE</a>
                </li>
            </ul>
            <div id="formUserInfo{{$ticket->Tid}}" class="formUserInfo" style="display: none">
                <ul>
                    <li><p>Email: </p><span>{{$ticket->belongsToUser->email}}</span></li>
                    <li><p>FirstName: </p><span>{{$ticket->belongsToUser->FirstName}}</span></li>
                    <li><p>LastName: </p><span>{{$ticket->belongsToUser->LastName}}</span></li>
                </ul>
                <ul>
                    <li><p>Phone: </p><span>{{$ticket->belongsToUser->Phone}}</span></li>
                    <li><p>Mobile Phone: </p><span>{{$ticket->belongsToUser->MobilePhone}}</span></li>
                    <li><p>OS: </p><span>{{$ticket->belongsToUser->OS}}</span></li>
                </ul>
            </div>
            <div id="formDetail{{$ticket->Tid}}" class="formDetail" style="display: none">
                <div class="formComment">
                    <p>Comments</p>
                    <div class="formCommentDisplay">
                        <span>{{$ticket->comment->Comment}}</span>
                    </div>
                </div>
                <div id="formComment{{$ticket->Tid}}" class="formComment">
                    <p>Replay</p>

                    <textarea class="formCommentTA" name="Replay">{{$ticket->comment->Replay}}</textarea>
                </div>
            </div>
            <div id="formEditSubmit{{$ticket->Tid}}" class="formEditSubmit" style="display: none">
                {!!Form::submit('Replay',['class'=>'formEditBtn'])!!}
                <span class="formStatusSpan">Resolved</span>
                @if($ticket->Status === "Resolved")
                <input type="radio" name="formStatus{{$ticket->Tid}}" value="Resolved" class="formStatusRadio" checked>
                @else
                <input type="radio" name="formStatus{{$ticket->Tid}}" value="Resolved" class="formStatusRadio">
                @endif
                <span class="formStatusSpan">Unresolved</span>
                @if($ticket->Status === "Unresolved")
                <input type="radio" name="formStatus{{$ticket->Tid}}" value="Unresolved" class="formStatusRadio"
                       checked>
                @else
                <input type="radio" name="formStatus{{$ticket->Tid}}" value="Unresolved" class="formStatusRadio">
                @endif
                <span class="formStatusSpan">In Progress</span>
                @if($ticket->Status === "Pending" || $ticket->Status === "In Progress")
                <input type="radio" name="formStatus{{$ticket->Tid}}" value="In Progress" class="formStatusRadio"
                       checked>
                @else
                <input type="radio" name="formStatus{{$ticket->Tid}}" value="In Progress" class="formStatusRadio">
                @endif
            </div>
            {!! Form::close() !!}
        </li>
        @endforeach
    </ul>
</div>
<script>
    $('#navList li').attr("class", "navUnselected");
    $("#navItem3").attr('class', 'navSelected')
</script>