@extends('layouts.app')

@section('content')
    <div class="container bg-primary">
        <div class="row justify-content-center">
            <div class="col-md-12 mb-3">
                <div class="row">
                    <div class="col"></div>
                    <div class="col-auto"><a href="{{action('PortfolioController@create')}}" class="btn btn-primary">Create</a></div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Portfolio of {{$data->name}}</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telephone</th>
                                <th scope="col">self description</th>
                                @if($data->id==auth()->id())
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data->portfolio as $portfolio)
                                <tr>
                                    <th scope="row"><a href="{{action('PortfolioController@show',$portfolio->id)}}">{{$portfolio->id}}</a></th>
                                    <td>@isset($portfolio->photo)<img style="max-width:80px;max-height:80px" src="{{ asset('storage/' . $portfolio->photo)  }}" alt="">@endisset</td>
                                    <td>{{$portfolio->name}}</td>
                                    <td>{{$portfolio->email}}</td>
                                    <td>{{$portfolio->telephone}}</td>
                                    <td>{{$portfolio->self_description}}</td>
                                    @if(auth()->id()==$data->id)
                                        <td><a href="{{action('PortfolioController@edit',$portfolio->id)}}">edit</a> </td>
                                        <td>
                                            <form method="post" action="{{ action('PortfolioController@destroy', $portfolio->id)}}">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-link">delete</button>

                                            </form>
                                        </td>
                                        @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
