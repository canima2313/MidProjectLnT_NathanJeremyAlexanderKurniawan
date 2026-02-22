@extends('layouts.app')

@section('content')
    <h1 class="title">Edit Employee</h1>
    <div class="main-container">
        <div class="form">
            <form action="{{ route('employees.update', $employee) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h3>Name</h3>
                <input placeholder="Insert name here" id="name" name="name"/>
                <h3>Age</h3>
                <input placeholder="Insert age here" id="age" name="age"/>
                <h3>Address</h3>
                <input placeholder="Insert address here" id="address" name="address"/>
                <h3>Phone Number</h3>
                <input placeholder="Insert phone number here" id="number" name="number"/>
                <input placeholder="Upload photo here" id="image" type="file" name="image"/>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection