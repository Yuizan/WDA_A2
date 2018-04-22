{!! Form::open(['url'=>'register_action']) !!}
<div class="formPersonalDetails">
    <div class="formHeader">
        <div class="formControlButton">
            <a id="formControlButton" >-</a>
        </div>
        <div class="formTitle">
            <span>Register</span>
            @if ($message = Session::get('ticketSuccess'))
            <span class="hintResult">{{ $message }}</span>
            @endif
        </div>
    </div>
    <div id='personalFormInput' class="personalFormInput">
        <div class="formInputLayoutLeft">
            <div class="formBasicLayout">
                {!! Form::label('Email','Email:') !!}
                @if($errors->has('Email')) <span class="hintSpan">{{$errors->first('Email')}}</span>  @endif
                @if(Session::has('register')) <span class="hintSpan">{{Session::get('register')}}</span>  @endif
                {!! Form::text('Email','',['class' => 'emailInput'])!!}
            </div>
            <div class="formBasicLayout">
                {!! Form::label('MPassword','Password:') !!}
                @if($errors->has('Password')) <span class="hintSpan">{{$errors->first('Password')}}</span>  @endif
                {!! Form::text('Password','',['class' => 'emailInput'])!!}
            </div>
            <div class="formBasicLayout">
                {!! Form::label('FirstName','First Name:') !!}
                @if($errors->has('FirstName')) <span class="hintSpan">{{$errors->first('FirstName')}}</span>  @endif
                {!! Form::text('FirstName','',['class' => 'emailInput'])!!}
            </div>
            <div class="formBasicLayout">
                {!! Form::label('MMobilephone','Mobile phone::') !!}
                @if($errors->has('MobilePhone')) <span class="hintSpan">{{$errors->first('MobilePhone')}}</span>  @endif
                {!! Form::text('MobilePhone','',['class' => 'emailInput'])!!}
            </div>

        </div>
        <div class="formInputLayoutRight">
            <div class="formBasicLayout">
                {!! Form::label('OS','OS:') !!}
                @if($errors->has('OS')) <span class="hintSpan">{{$errors->first('OS')}}</span>  @endif
                {!! Form::text('OS','',['class' => 'emailInput'])!!}
            </div>
            <div class="formBasicLayout">
                {!! Form::label('MRepeatPassword','Repeat Password:') !!}
                @if($errors->has('RepeatPassword')) <span class="hintSpan">{{$errors->first('RepeatPassword')}}</span>  @endif
                {!! Form::password('RepeatPassword','',['class' => 'emailInput'])!!}
            </div>
            <div class="formBasicLayout">
                {!! Form::label('LastName','Last Name:') !!}
                @if($errors->has('LastName')) <span class="hintSpan">{{$errors->first('LastName')}}</span>  @endif
                {!! Form::text('LastName','',['class' => 'emailInput'])!!}
            </div>
            <div class="formBasicLayout">
                {!! Form::label('Phone','Phone:') !!}
                @if($errors->has('Phone')) <span class="hintSpan">{{$errors->first('Phone')}}</span>  @endif
                {!! Form::text('Phone','',['class' => 'emailInput'])!!}
            </div>
            <span class="formStatusSpan">Client</span>
            <input type="radio" name="registerType" value="Client" class="formStatusRadio" checked>
            <span class="formStatusSpan">Admin</span>
            <input type="radio" name="registerType" value="Admin" class="formStatusRadio">
        </div>
    </div>
</div>
<div id="formSubmit" class="formSubmit">
    <div class="submitLabel">
        <p>Register</p>
    </div>
    <div class="submitBtn">{!!Form::submit('submit')!!}</div>
</div>
{!! Form::close() !!}
<script>
    $('#navList li').attr("class","navUnselected");
    $('.headerFeedback').css("color","#FF9900");
    $('.formPersonalDetails').css("height","400px");
</script>