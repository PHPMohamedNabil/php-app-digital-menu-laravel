@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Food</div>

                <div class="card-body">
                  @if(Session('message'))
                      
                      <div class="alert alert-success alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{Session::get('message')}}
                      </div>
                 
                  @endif
                    <form method="POST" action="{{ route('food.update',$food->id) }}" enctype="multipart/form-data">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="form-group">
                            <label for="emaCatNameil">Name</label>
                                <input id="CatName" type="text" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{$food->name}}"  autofocus>
                                  @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>
                        <div class="form-group">
                            <label for="emaCatNameil">Price</label>
                                <input id="CatName" type="number" class="form-control  @error('price') is-invalid @enderror" name="price" value="{{$food->price}}" min="0" step="0.1"  autofocus>
                                  @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>
                        <div class="form-group">
                            <label for="emaCatNameil">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description">{{$food->description}}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>
                        <div class="form-group">
                             <div class="col-6 mb-5"><img src="{{asset('images').'/'.$food->img}}"></div>
                            <label for="emaCatNameil">Image</label>
                             <input type="hidden" name="img_update" value="{{$food->img}}">
                               <input type="file" name="img" class="form-control @error('img') is-invalid @enderror">
                                @error('img')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="emaCatNameil">Category</label>
                              <select name="cat_id" class="form-control @error('cat_id') is-invalid @enderror">
                                  @foreach($cats as $cat)
                                    @if($cat->id == $food->id)
                                     <option value="{{$cat->id}}" selected="">{{$cat->name}}</option>
                                    @endif
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                  @endforeach
                              </select>
                              @error('cat_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group mt-5">
                          <button type="submit" class="btn btn-outline-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

