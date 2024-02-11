@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="post" action="/register/submit">
    @csrf
    <input type="text" name="firstname" id="firstname" placeholder="input first name" class="form-control"><br>
    <input type="text" name="lastname" id="lastname" placeholder="input last name" class="form-control"><br>
    <input type="text" name="patronymics" id="patronymics" placeholder="input patronymics" class="form-control"><br>
    <input type="email" name="email" id="email" placeholder="input email" class="form-control"><br>
    <input type="password" name="password" id="password" placeholder="input password" class="form-control"><br>
    <label for="roles">Select role</label>
    <select name="role" id="role">
        <option value="teacher">teacher</option>
        <option value="student">student</option>
    </select><br><br>
    <input type="grade" name="grade" id="grade" placeholder="input grade" class="form-control"><br>
    <input type="subject" name="subject" id="subject" placeholder="input subject" class="form-control"><br>
    <button type="submit" class="btn btn-success">Register</button>
</form>
<a class="btn btn-primary" href="/login">Login</a>
