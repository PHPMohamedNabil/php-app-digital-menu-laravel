@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
         <div class="col-md-4">
             <div class="card">
                <div class="card-header">Image</div>
                  <img src="{{asset('images').'/'.$food->img}}" class="img-responsible">
                <div class="card-body">
                   
                </div>
            </div>
          </div>
        <div class="col-md-8">
       
            <div class="card">
                <div class="card-header">Details</div>

                <div class="card-body">
                    <h3>{{$food->name}}</h3>
                    <p>{{$food->description}}</p>
                    <small>$ {{$food->price}}</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
