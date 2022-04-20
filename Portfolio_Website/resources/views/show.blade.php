@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-body">
                    @isset($portfolio->photo)
                        <p>photo: <img class="img-fluid" src="{{ asset('storage/' . $portfolio->photo)  }}" alt=""> </p>
                    @endisset

                    <p>name:{{$portfolio->name}}</p>
                    <p>email:{{$portfolio->email}}</p>
                    <p>telephone:{{$portfolio->telephone}}</p>
                    <p>self description:{{$portfolio->self_description}}</p>
                </div>
            </div>
        </div>
    </div>

@endsection
