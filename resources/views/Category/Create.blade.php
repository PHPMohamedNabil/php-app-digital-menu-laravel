@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Category</div>

                <div class="card-body">
                	@if(Session('message'))
                      
                      <div class="alert alert-success alert-dismissible fade show">
                      	<button type="button" class="close" data-dismiss="alert">&times;</button>
                      	{{Session::get('message')}}
                      </div>
                 
                	@endif
                    <form method="POST" action="{{ route('category.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="emaCatNameil">Category Name</label>
                                <input id="CatName" type="text" class="form-control  @error('name') is-invalid @enderror" name="name" value=""  autofocus>
                                  @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>
                        <div class="form-group">
                        	<button type="submit" class="btn btn-outline-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

