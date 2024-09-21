@extends('admin.layouts.default')

@section('content')
<!-- Author: Teh Chong Shin -->
<div class="page-path">
    <a class="me-2" href="{{route('products.index')}}">
        <svg class="mb-2 me-2" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
            <path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z" />
        </svg>

        Product Details
    </a>
</div>
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-5">
                    <!-- Product image -->
                    <a href="javascript: void(0);" class="text-center d-block mb-4 btn">
                        <img id="main-img" src="{{Storage::disk('products')->url($product->img_src1)}}"
                            class="img-fluid" style="max-width: 280px;" alt="Product-img">
                    </a>

                    <div class="d-lg-flex d-none justify-content-center">
                        <span onclick="changeImg(1)" class="pe-auto">
                            <img src="{{Storage::disk('products')->url($product->img_src1)}}"
                                id="img1" class="img-fluid img-thumbnail p-2" style="max-width: 75px;" alt="Product-img">
                        </span>
                        @if($product->img_src2)
                        <span onclick="changeImg(2)" class="ms-2 pe-auto">
                            <img src="{{Storage::disk('products')->url($product->img_src2)}}"
                                id="img2" class="img-fluid img-thumbnail p-2" style="max-width: 75px;" alt="Product-img">
                        </span>
                        @endif
                        @if($product->img_src3)
                        <span onclick="changeImg(3)" class="ms-2 pe-auto">
                            <img src="{{Storage::disk('products')->url($product->img_src3)}}"
                                id="img3" class="img-fluid img-thumbnail p-2" style="max-width: 75px;" alt="Product-img">
                        </span>
                        @endif
                    </div>

                    <script>
                        function changeImg(id) {
                            var mainimg = document.getElementById("main-img")
                            var imgsrc = document.getElementById("img" + id)

                            mainimg.src = imgsrc.src;
                        }
                    </script>
                </div> <!-- end col -->
                <div class="col-lg-7">
                        <!-- Product title -->
                        <h3 class="mt-0">
                            {{$product->title}}
                            <a class="ms-3" href="javascript: void(0);" data-bs-toggle="modal"
                                data-bs-target="#edit-product-modal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 -960 960 960">
                                    <path
                                        d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z">
                                    </path>
                                </svg>
                            </a>
                        </h3>
                        <p class="font-16">
                            <span class="svg-yellow">
                                @foreach ($product->total_rating['formatted'] as $star)
                                        @switch($star)
                                            @case('f')
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                                    <path
                                                        d="m263.002-161.542 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542Z" />
                                                </svg>
                                                @break

                                            @case('h')
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                                    <path
                                                        d="M480-644v236l96 74-36-122 90-64H518l-38-124ZM270.31-173.081l78.769-258.612-206.767-148.306h256.304L480-850.764l81.384 270.765h256.304L610.921-431.693l78.769 258.612L480-332.617 270.31-173.081Z" />
                                                </svg>
                                                @break
                                            
                                            @case('e')
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                                    <path
                                                        d="m354-287 126-76 126 77-33-144 111-96-146-13-58-136-58 135-146 13 111 97-33 143Zm-90.998 125.458 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542ZM480-470Z" />
                                                </svg>
                                                @break
                                        @endswitch
                                    @endforeach
                            </span>
                        </p>

                        <!-- Product stock -->
                        <div class="my-3">
                            <h6>
                                @switch($product->status)
                                    @case(1)
                                        <span class="badge bg-success">Active</span>
                                        @break

                                    @case(2)
                                    <span class="badge bg-warning">Hidden</span>
                                        @break
                                @endswitch
                            </h6>
                        </div>

                        <!-- Product price -->
                        <div class="mt-4">
                            <h3>RM {{number_format($product->price, 2, '.', ',')}}</h3>
                        </div>

                        <!-- Product description -->
                        <div class="mt-4">
                            <h6 class="font-14">Category:</h6>
                            <p class="fs-09 mb-3 text-muted">{{ucfirst($product->category)}}</p>

                            <h6 class="font-14">Description:</h6>
                            <p class="fs-09 mb-3 text-muted">{{$product->description}}</p>
                        </div>
                </div> <!-- end col -->
            </div> <!-- end row-->


            <!-- Specification -->
            <div class="table-responsive table-bordered mt-4 col-11 m-auto">
                <table class="table table-centered mb-0 table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>Specification</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach ($attrs as $id => $name)
                            <tr class="">
                                <form method="POST" action="{{ route('products.edit_attrs', $product->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <td class="py-4 d-flex justify-content-between fs-6">
                                        {{$name}}
                                        <button class="btn btn-light">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 -960 960 960">
                                                <path
                                                    d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z">
                                                </path>
                                            </svg>
                                        </button>
                                    </td>
                                    <td class="py-3 border-1"><input id="txtDesc" class="form-control" name="attribute_value" value="{{$product_attrs[$id]??''}}" ></td>
                                    <input type="hidden" value="{{$id}}" name="attr_id" />
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div> <!-- end card-body-->
    </div> <!-- end card-->
</div>
@stop


@section('modal')
<div class="modal modal-lg fade" id="edit-product-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('products.edit_details', $product->id) }}" enctype= "multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3 form-floating">
                        <input class="form-control fs-09" id="txtName" name="title" placeholder="John" value="{{$product->title}}" required>
                        <label for="txtName" class="col-form-label">Title</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input class="form-control fs-09" id="txtDesc" placeholder="John" name="description" value="{{$product->description}}" required>
                        <label for="txtDesc">Description</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="number" class="form-control fs-09" id="txtPrice" placeholder="John" name="price" value="{{$product->price}}" required>
                        <label for="txtPrice" class="col-form-label">Price</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <select id="ddlCategory" class="form-select fs-09" name="category" value="{{$product->category}}" required>
                            <option value="laptop">Laptop</option>
                            <option value="prebuilt">Prebuilt</option>
                            <option value="accessories">Accessories</option>
                        </select>
                        <label for="ddlCategory">Category</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <select id="ddlStatus" class="form-select fs-09" name="status" value="{{$product->status}}" required>
                            <option {{$product->status == 1? 'selected':''}} value="1">Active</option>
                            <option {{$product->status == 2? 'selected':''}} value="2">Hidden</option>
                        </select>
                        <label for="ddlStatus">Status</label>
                    </div>
                    <div class="mb-3">
                        <label for="img1" class="form-label fs-09">Default Image</label>
                        <input type="file" name="img_src1" id="img1Upload" class="form-control fs-09" accept="image" />
                   </div>
                   <div class="mb-3">
                        <label for="img2" class="form-label fs-09">Image 2</label>
                        <input type="file" name="img_src2" id="img2Upload" class="form-control fs-09" accept="image" />
                    </div>
                    <div class="mb-3">
                        <label for="img3" class="form-label fs-09">Image 3</label>
                        <input type="file" name="img_src3" id="img3Upload" class="form-control fs-09" accept="image" />
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger fs-09" data-bs-dismiss="modal">Discard
                        changes</button>
                    <button class="btn btn-primary fs-09">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop