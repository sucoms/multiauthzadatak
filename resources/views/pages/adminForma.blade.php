{!! Form::open(['action' => 'PagesController@adminForma', 'method' => 'POST' ]) !!}
<div class="container">
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name']) }}
            @if ($errors->has('name'))
                <span class="class-block">
                    {{$errors->first('name')}}
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
            {{ Form::label('surname', 'Surname:') }}
            {{ Form::text('surname', '', ['class' => 'form-control', 'placeholder' => 'Surname']) }}
            @if ($errors->has('surname'))
                <span class="class-block">
                    {{$errors->first('surname')}}
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email']) }}
            @if ($errors->has('email'))
                <span class="class-block">
                    {{$errors->first('email')}}
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            {{ Form::label('phone', 'Phone:') }}
            {{ Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Phone *optional']) }}
            @if ($errors->has('phone'))
                <span class="class-block">
                    {{$errors->first('phone')}}
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            {{ Form::label('password', 'Password:') }}
            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
            @if ($errors->has('password'))
                <span class="class-block">
                    {{$errors->first('password')}}
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            {{ Form::label('password_confirmation', 'Confirm Your Password:') }}
            {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm Your Password']) }}
            @if ($errors->has('password_confirmation'))
                <span class="class-block">
                    {{$errors->first('password_confirmation')}}
                </span>
            @endif
        </div>
        <hr>
        <div class="form-group">
            {{ Form::submit('Submit', ['class' => 'btn btn-secondary']) }}
        </div>
        {{ csrf_field() }}
</div>

{{ Form::close() }}