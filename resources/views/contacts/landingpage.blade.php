@extends('layout.app')

@section('main')

<div class="container-fluid">
          <form>
          <div class="row">
            <div class="col-auto ms-5">
              <img class="ms-5" src="https://media.istockphoto.com/id/1198628920/vector/smartphone-in-hand-with-list-of-contacts-search-for-people-resume-recruiting-closing-vacancy.jpg?s=612x612&w=0&k=20&c=Gez9K7jE4mkDzmUMviPduX0BBfcq322gNB7WQwwZFaU=" alt="Image description">
            </div>
            <div class="col-auto me-auto mt-5">
                <h1 class="mt-5">CONTACT LIST</h1>
                <h2 class="h3 mt-3">CREATE YOUR CONTACTS NOW</h2>
                <pre class="mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
nisi ut aliquip ex ea commodo consequat.</pre>
                <a class="btn btn-primary py-2 mt-3" href="{{ route('log') }}">CREATE CONTACT</a>
            </div>
          </div>
          </form>
</div>

@endsection