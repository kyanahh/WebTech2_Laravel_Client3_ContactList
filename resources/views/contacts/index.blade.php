@extends('layout.contact')

@section('main')

<div class="container-fluid">

    <table class="table table-hover table-striped mx-auto mt-5" style="height: 450px; width: 1200px; overflow-y: scroll;">
        <thead>
            <tr>
              <th class="col-sm-1">Contact ID</th>
              <th>Name</th>
              <th>Phone</th>
              <th>Email</th>
              <th class="col-sm-2 text-center">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($contacts as $contact)
            <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->phone }}</td>
                <td>{{ $contact->email }}</td>
                <td class="text-center">
                    <a href="{{ route('idet', $contact->id) }}" class="btn btn-primary">Edit</a> 

                    <form method="POST" class="d-inline" action="{{ route('delete', $contact->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
          </tbody>
    </table>

</div>

@endsection
