@extends('layout.contact')

@section('main')

<div class="container-fluid">
    <div class="col-sm-5 mx-auto mt-5">
        <div class="card shadow p-5">
            <form method="POST" action="{{ route('updet', $contacts->id) }}" enctype="multipart/form-data">
                <div class="form-group">
                    @csrf
                    @method('PUT')
                        @if($message = Session::get('success'))
                            <div class="alert alert-success alert block">
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                <h1 class="h3">Update Contact List</h1>
                </div>
                <div class="form-group col">
                    <div class="row-sm mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ old('name', $contacts->name) }}">
                        @if($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="row-sm mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone" value="{{ old('phone', $contacts->phone) }}">
                        @if($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                    <div class="row-sm mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ old('email', $contacts->email) }}">
                        @if($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="row-sm mt-4">
                        <button class="btn btn-primary px-4" type="submit">Update</button>
                    </div>
                </div>
            </form>

            
        </div>
        </div>
</div>

@endsection