@extends('admin.master')

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endpush

@section('main-content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">New Product</h4>
            <form class="forms-sample" action="{{route('adminProducts.store')}}" method="post" id="product_create_form" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Name">
                    @if ($errors->has('name'))
                        
                        <span style="color:red">
                            {{ $errors->first('name') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputCategory">Categories</label>
                    <select name="categories[]" id="categories" class="form-control select"  multiple >
                        @if(!empty($categories))
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">
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
                    @if ($errors->has('categories'))
                        <span style="color:red">
                            {{ $errors->first('categories') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Price</label>
                    <input type="number" min="1" class="form-control" id="price" name="price" value="{{old('price')}}" placeholder="Price">
                    @if ($errors->has('price'))
                        <span style="color:red">
                            {{ $errors->first('price') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Quantity</label>
                    <input type="number" min="1" value="{{old('quantity')}}" class="form-control" id="quantity" name="quantity" placeholder="Quantity">
                    @if ($errors->has('quantity'))
                        <span style="color:red">
                           {{ $errors->first('quantity') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Cover Photo</label>
                    <input type="file" name="cover_photo" class="form-control-file">
                    @if ($errors->has('cover_photo'))
                        <span style="color:red">
                            {{ $errors->first('cover_photo') }}
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label>Details Photo 1</label>
                    <input type="file" name="details_photo1" class="form-control-file">
                    @if ($errors->has('details_photo1'))
                        <span style="color:red">
                            {{ $errors->first('details_photo1') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Details Photo 2</label>
                    <input type="file" name="details_photo2" class="form-control-file">
                    @if ($errors->has('details_photo2'))
                        <span style="color:red">
                            {{ $errors->first('details_photo2') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputTag">Tags</label>
                    <select name="tags[]" class="form-control select" multiple>
                        @if(!empty($tags))
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        @else
                            <div class="alert alert-danger">Sorry! No tag found</div>
                        @endif
                    </select>
                    @if ($errors->has('tags'))
                        <span style="color:red">
                            {{ $errors->first('tags') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Description</label>
                    <textarea class="form-control" name="description" id="exampleTextarea1" rows="2" placeholder="Description"></textarea>
                    @if ($errors->has('description'))
                        <span style="color:red">
                            {{ $errors->first('description') }}
                        </span>
                    @endif
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