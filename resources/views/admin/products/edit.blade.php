@if(auth()->user()->isAdmin())
    @extends('admin.master')

    @section('main-content')
        
        <br>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Product Edit</h4>
                <form class="forms-sample" action="{{route('adminProducts.update',$product->id)}}" method="post" id="product_edit_form" enctype="multipart/form-data">
                @csrf
                {{method_field('PATCH')}}
                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputCategory">Categories</label>
                    <select name="categories[]" id="categories" class="form-control select" multiple>
                        @if(!empty($categories))
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" 
                                @foreach($product->categories as $pc)
                                    {
                                        @if($pc->id == $category->id)
                                        {
                                            selected="selected"
                                        }
                                        @endif
                                    }
                                @endforeach
                                >
                                    {{$category->name}}
                                    @if($category->parent_id != null)
                                        -{{\App\Models\Category::find($category->parent_id)->name}}
                                    @endif
                                </option>
                            @endforeach
                        @else
                            <div class="alert alert-danger">Sorry! No category found</div>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Price</label>
                    <input type="number" min="1" class="form-control" id="price" name="price" value="{{$product->price}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Quantity</label>
                    <input type="number" min="1" class="form-control" id="quantity" name="quantity" value="{{$product->quantity}}">
                </div>
                
                <div class="form-group">
                    <label for="exampleInputTag">Tags</label>
                    <select name="tags[]" class="form-control select" multiple>
                        @if(!empty($tags))
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}"
                                @foreach($product->tags as $pt)
                                    {
                                        @if($pt->id == $tag->id)
                                        {
                                            selected="selected"
                                        }
                                        @endif
                                    }
                                @endforeach
                                >
                                    {{$tag->name}}</option>
                            @endforeach
                        @else
                            <div class="alert alert-danger">Sorry! No tag found</div>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Description</label>
                    <textarea class="form-control" name="description" id="exampleTextarea1" rows="2" >{{$product->description}}</textarea>
                </div>
                <button type="submit" class="btn btn-success mr-2">Submit</button>
            </form>
            </div>
        </div>
    @endsection
    @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $('.select').select2();
    </script>
    @endpush
@endif
