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
                    <form method="POST" action="{{ route('food.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="emaCatNameil">Name</label>
                                <input id="CatName" type="text" class="form-control  @error('name') is-invalid @enderror" name="name" value=""  autofocus>
                                  @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>
                        <div class="form-group">
                            <label for="emaCatNameil">Price</label>
                                <input id="CatName" type="number" class="form-control  @error('price') is-invalid @enderror" name="price" value="" min="0" step="0.1"  autofocus>
                                  @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>
                        <div class="form-group">
                            <label for="emaCatNameil">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description"></textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>
                        <div class="form-group">
                            <label for="emaCatNameil">Image</label>
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
                                <option value="">Select Category</option>
                                  @foreach($cats as $cat)
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

