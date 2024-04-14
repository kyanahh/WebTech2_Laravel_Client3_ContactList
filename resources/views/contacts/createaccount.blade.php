@extends('layout.app')

@section('main')

<div class="container-fluid">
          <form action="{{ route('user') }}" method="POST">
            
          <div class="row">
            <div class="col-auto ms-5 form-group">
              <img class="ms-5" src="https://media.istockphoto.com/id/1198628920/vector/smartphone-in-hand-with-list-of-contacts-search-for-people-resume-recruiting-closing-vacancy.jpg?s=612x612&w=0&k=20&c=Gez9K7jE4mkDzmUMviPduX0BBfcq322gNB7WQwwZFaU=" alt="Image description">
            </div>
            <div class="col-sm-4 mt-5">
                @csrf
                @if($errors->has('email') || $errors->has('password'))
                        <div class="alert alert-danger alert-block">
                            <strong>Invalid credentials</strong>
                        </div>
                @endif
                <h1 class="mt-5 mb-4 fw-bold">Create Account</h1>
                <div class="form-group mt-3">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}" required autofocus/>
                @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group mt-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="{{ old('email') }}" required/>
                @if($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group mt-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                @if($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="form-group my-3">
                <button type="submit" class="btn btn-primary px-4 mt-2 mb-3 fw-bold form-control">Create Account</button>
            </div>
            <hr>
            <div class="form-group mt-3 text-center">
                <a class="text-decoration-none fw-bold" href="{{ route('log') }}">Already in Contacts? Log in</a>
            </div>
            </div>
          </div>
          </form>
</div>

@endsection