@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{action('PortfolioController@update',$portfolio->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label for="" class="form-label">name</label>
                                <input type="text" class="form-control" name="name" placeholder="name" value="{{$portfolio->name}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">email</label>
                                <input type="email" class="form-control" name="email" placeholder="email" value="{{$portfolio->email}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">telephone</label>
                                <input type="number" class="form-control" name="telephone" placeholder="telephone" value="{{$portfolio->telephone}}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">
                                    self description
                                </label>
                                <textarea name="self_description" rows="5" class="form-control" placeholder="self description" required>{{$portfolio->self_description}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Photo</label>
                                <input type="file" class="form-control-file" name="photo" accept="image/*" required>
                            </div>
                            <button class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
