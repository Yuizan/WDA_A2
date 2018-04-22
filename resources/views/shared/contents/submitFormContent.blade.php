{!! Form::open(['url'=>'form_action']) !!}

<div class="formPersonalDetails">
    <div class="formHeader">
        <div class="formControlButton">
            <a id="formControlButton" >-</a>
        </div>
        <div class="formTitle">
            <span>Customer Details</span>
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
                @if(Session::has('email'))
                <input name="Email" type="text" value={{Session::get('email')}} class="emailInput">
                @else
                {!! Form::text('Email','',['class' => 'emailInput'])!!}
                @endif
            </div>
            <div class="formBasicLayout">
                {!! Form::label('FirstName','First Name:') !!}
                @if($errors->has('FirstName')) <span class="hintSpan">{{$errors->first('FirstName')}}</span>  @endif
                @if(Session::has('firstName'))
                <input name="FirstName" type="text" value={{Session::get('firstName')}} class="emailInput">
                @else
                {!! Form::text('FirstName','',['class' => 'emailInput'])!!}
                @endif
            </div>
            <div class="formBasicLayout">
                {!! Form::label('MmobilePhone','Mobile Phone:') !!}
                @if($errors->has('MobilePhone')) <span class="hintSpan">{{$errors->first('MobilePhone')}}</span>  @endif
                @if(Session::has('mobilePhone'))
                <input name="MobilePhone" type="text" value={{Session::get('mobilePhone')}} class="emailInput">
                @else
                {!! Form::text('MobilePhone','',['class' => 'emailInput'])!!}
                @endif
            </div>
        </div>
        <div class="formInputLayoutRight">
            <div class="formBasicLayout">
                {!! Form::label('OS','OS:') !!}
                @if($errors->has('OS')) <span class="hintSpan">{{$errors->first('OS')}}</span>  @endif
                @if(Session::has('os'))
                <input name="OS" type="text" value={{Session::get('os')}} class="emailInput">
                @else
                {!! Form::text('OS','',['class' => 'emailInput'])!!}
                @endif
            </div>
            <div class="formBasicLayout">
                {!! Form::label('LastName','Last Name:') !!}
                @if($errors->has('LastName')) <span class="hintSpan">{{$errors->first('LastName')}}</span>  @endif
                @if(Session::has('lastName'))
                <input name="LastName" type="text" value={{Session::get('lastName')}} class="emailInput">
                @else
                {!! Form::text('LastName','',['class' => 'emailInput'])!!}
                @endif
            </div>
            <div class="formBasicLayout">
                {!! Form::label('Phone','Phone:') !!}
                @if($errors->has('Phone')) <span class="hintSpan">{{$errors->first('Phone')}}</span>  @endif
                @if(Session::has('phone'))
                <input name="Phone" type="text" value={{Session::get('phone')}} class="emailInput">
                @else
                {!! Form::text('Phone','',['class' => 'emailInput'])!!}
                @endif
            </div>
        </div>
    </div>
    <div class="formHeader">
        <div class="formControlButton">
            <a id="commentControlButton" >-</a>
        </div>
        <div class="formTitle">
            <p>Comment Details</p>
        </div>
    </div>
    <div class="formBasicLayout">
        {!! Form::label('Title','Software Issue:') !!}
        @if($errors->has('Title')) <span class="hintSpan">{{$errors->first('Title')}}</span>  @endif
        {!! Form::text('Title','',['class' => 'titleEmailInput'])!!}
    </div>
    <div id="commentTextArea" class="textAreaBasicLayout">
        {!! Form::label('Description','Description:') !!}
        @if($errors->has('Description')) <span class="hintSpan">{{$errors->first('Description')}}</span>  @endif
        {!! Form::textarea('Description') !!}
        <!--<textarea></textarea> -->
    </div>
</div>
<div id="formSubmit" class="formSubmit">
    <div class="submitLabel">
        <p>Submit this item</p>
    </div>
    <div class="submitBtn">{!!Form::submit('submit')!!}</div>
</div>
{!! Form::close() !!}
<script>
    $('#navList li').attr("class","navUnselected");
    $("#navItem2").attr('class','navSelected')
</script>