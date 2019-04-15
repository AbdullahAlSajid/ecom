@if(auth()->user()->isAdmin())
    @extends('admin.master')

    @section('main-content')
        <br>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New Category</h4>
                <form class="forms-sample" action="{{route('adminCategories.store')}}" method="post" id="product_create_form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCategory">Parent Category</label>
                        <select name="parent_category" id="categories" class="form-control select">
                            @if(!empty($categories))
                                <option value=""></option>
                                @foreach($categories as $category)
                                    @if($category->parent_id == null)
                                        <option value="{{$category->id}}">
                                            {{$category->name}}
                                        </option>
                                    @endif
                                @endforeach
                            @else
                                <div class="alert alert-danger">Sorry! No category found</div>
                            @endif
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                </form>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Available Categories</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th><b>Id</th>
                            <th><b>Name</th>
                            <th><b>Parent Category</th>
                            <th><b>Action</b></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if( !empty($categories) && count($categories))
                            @foreach($categories as $category)
                                <tr>
                                    <td>
                                        {{$category->id}}
                                    </td>
                                    <td>
                                        {{$category->name}}
                                    </td>
                                    <td >
                                    @if($category->parent_id != null)
                                        {{\App\Models\Category::find($category->parent_id)->name}}
                                    @else
                                        Null   
                                    @endif 
                                    </td>
                                    <td>
                                        <form action="{{route('adminCategories.destroy',$category->id)}}" method="post">
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
                                    No Category found.
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
