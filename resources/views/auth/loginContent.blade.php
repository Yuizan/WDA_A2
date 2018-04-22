{!! Form::open(['url'=>'login_action']) !!}
<div class="formPersonalDetails">
    <div class="formHeader">
        <div class="formControlButton">
            <a id="formControlButton" >-</a>
        </div>
        <div class="formTitle">
            <span>Login</span>
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
                {!! Form::text('Email','',['class' => 'emailInput'])!!}
            </div>
        </div>
        <div class="formInputLayoutRight">
            <div class="formBasicLayout">
                {!! Form::label('login_Password','Password:') !!}
                @if($errors->has('login_Password')) <span class="hintSpan">{{$errors->first('login_Password')}}</span>  @endif
                {!! Form::text('login_Password','',['class' => 'emailInput'])!!}
            </div>
        </div>
    </div>
</div>
<div id="formSubmit" class="formSubmit">
    <div class="submitLabel">
        <p>Login</p>
    </div>
    <div class="submitBtn">{!!Form::submit('submit')!!}</div>
</div>
{!! Form::close() !!}
<script>
    $('#navList li').attr("class","navUnselected");
    $('.login').css("color","#FF9900");
</script>