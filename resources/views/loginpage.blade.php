@if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif
@if(session('successfulregistration'))
    <div class="alert alert-danger">
        {{session('successfulregistration')}}
    </div>
@endif
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="post" action="/login/submit">
    @csrf
    <input type="email" name="email" id="email" placeholder="input email" class="form-control"><br>
    <input type="password" name="password" id="password" placeholder="input password" class="form-control"><br>
    <button type="submit" class="btn btn-success">Login</button>
</form>
<a class="btn btn-primary" href="/">Register</a>

