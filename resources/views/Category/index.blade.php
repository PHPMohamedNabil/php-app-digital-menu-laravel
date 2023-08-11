@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           <div class="card">

              <div class="card-header">All Categories 
                <span class="float-right">
                    <a href="{{route('category.create')}}" class="btn btn-outline-secondary">Add Category</a>
                </span>
              </div>
                <div class="card-body">
                  @if(Session('message'))
                      
                      <div class="alert alert-success alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{Session::get('message')}}
                      </div>
                 
                  @endif
                   <table class="table">
                     <thead class="thead-dark">
                          <tr>
                            <th scope="col">name</th>
                            <th scope="col">Atcion</th>
                          </tr>
                      </thead>
                        <tbody>
                         @foreach($cates as $cat)
                          <tr>
                            <td>{{$cat->name}}</td>
                            <td>
                                <a href="{{route('category.edit',$cat->id)}}" class="btn btn-outline-success btn-sm">Edit</a>
                                &nbsp;&nbsp;
                                  
                                      <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{$cat->id}}">
                                        Delete
                                      </button>
                                
                                    
                                
                            </td>
                          </tr>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$cat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Category {{$cat->name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('category.destroy',$cat->id)}}" method="post">
        {{method_field('DELETE')}}
            @csrf
      <div class="modal-body">
           
         <p>Are you sure Delete this Category ?</p>
           
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
      </div>
    </form>
    </div>
  </div>
</div>
                         @endforeach
                        </tbody>
                   </table>

                     
                </div>       
           </div>
         </div>
    </div>
</div>


@endsection
