@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       @foreach($cats as $cat)
        <div class="col-md-12">
            <h2 style="color: #2d2d2d;">{{$cat->name}}</h2>
            
              <div class="jumbotron">
                 <div class="row">
              @foreach($foods as $food)
               @if($food->cat_id == $cat->id)
                <div class="col-md-3">
                 <div class="card mb-4">
                     <img src="{{asset('images').'/'.$food->img}}" width="200" height="200" class="card-img-top" alt="avatar">
                   <div class="card-body text-center">
                   
                    <p class="text-center">
                        {{$food->name}}
                        <span>${{$food->price}}</span>
                        


                    </p>
                       <p class="text-center">
                        <a href="{{route('food.show',[$food->id])}}">
                        <button class="btn btn-outline-danger">
                          View
                        </button>

                       </a>
                     </p>
                 </div>
                  </div>
                </div>

                @endif
             @endforeach
       
            </div>
          
            </div>

        </div>

       @endforeach
    </div>
</div>
@endsection


       
    