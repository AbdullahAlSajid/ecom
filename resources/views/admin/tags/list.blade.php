@if(auth()->user()->isAdmin())
    @extends('admin.master')

    @section('main-content')
        <br>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New Tag</h4>
                <form class="forms-sample" action="{{route('adminTags.store')}}" method="post" id="product_create_form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                    </div>
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                </form>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Available Tags</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th><b>Id</th>
                            <th><b>Name</th>
                            <th><b>Action</b></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if( !empty($tags) && count($tags))
                            @foreach($tags as $tag)
                                <tr>
                                    <td>
                                        {{$tag->id}}
                                    </td>
                                    <td>
                                        {{$tag->name}}
                                    </td>
                                    <td>
                                        <form action="{{route('adminTags.destroy',$tag->id)}}" method="post">
                                        @csrf
                                        {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else   
                            <tr>
                                <td colspan="8" class="text-center text-danger">
                                    No Tag found.
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
@endif
