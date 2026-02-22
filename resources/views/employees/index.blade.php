@extends('layouts.app')

@section('content')
    <h1 class="title">View Employees</h1>
        <div class="card-container">
            @foreach ($employees as $employee)
                <div class="card" style="width: 18rem;">
                    @if ($employee->image)
                        <img src="{{ asset('storage/'. $employee->image) }}" class="card-img-top" alt="{{$employee->name}}">
                    @endif
                    <div class="card-body">
                        <h2 class="card-title">{{$employee->name}}, {{$employee->age}}</h5>
                        <p class="card-text"><span style="font-weight: bold">Address : </span>{{$employee->address}}</p>
                        <p class="card-text"><span style="font-weight: bold">Phone no : </span>{{$employee->number}}</p>
                        <hr>
                        <div style="display: flex">
                            <a href="{{ route('employees.edit', $employee) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('employees.destroy', $employee) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button style="margin-left: 1em" onclick="return confirm("Confirm delete?")" class="btn btn-primary">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
@endsection