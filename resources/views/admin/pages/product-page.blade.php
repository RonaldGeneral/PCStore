@extends('admin.layouts.default')

@section('content')
<div class="page-path">Products</div>
<div class="card ">
    <div class="row m-4">
        <div class="col-sm-9">
            <a href="javascript:void(0);" class="btn btn-primary mb-2 text-white fs-09" data-bs-toggle="modal"
                data-bs-target="#add-product-modal">
                <svg class="mb-1 svg-white" xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960"
                    width="24">
                    <path
                        d="M440-280h80v-160h160v-80H520v-160h-80v160H280v80h160v160Zm40 200q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                </svg>
                Add Products
            </a>
        </div>
        <div class="col-sm-3">
            <div class="text-sm-end">
                <form action="{{ route('products.search') }}" method="GET">
                    <input type="search" value="{{$query??''}}" name="query" class="form-control dropdown-toggle fs-09" placeholder="Search..." id="top-search">
                </form>
            </div>
        </div>
    </div>

    <div class="p-3 table-responsive text-nowrap">
        <table class="table table-hover w-100">
            <thead class="table-light">
                <tr>
                    <th class="ps-3 py-3">ID</th>
                    <th class="py-3">Product</th>
                    <th class="py-3">Category</th>
                    <th class="py-3">Price</th>
                    <th class="py-3">Status</th>
                    <th class="py-3">Action</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0 text-primary">
                @foreach ($products as $product)
                    <tr class="">
                        <td class="ps-3">
                            {{$product->id}}
                        </td>
                        <td>
                            <a class="me-3 d-inline-block col-2" href="{{ route('products.view', $product->id) }}">
                                <img src="{{ Storage::disk('products')->url($product->img_src1) }}" loading="lazy"
                                    title="product-img" class="rounded" height="64" width="64">
                            </a>
                            <p class="m-0 d-inline-block align-middle font-16 col-10">
                                <a href="{{ route('products.view', $product->id) }}">{{$product->title}}</a>
                                <br>
                                <span class="svg-yellow">
                                    @foreach (explode(',',$product->total_rating,5) as $star)
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
                        </td>
                        <td>
                            {{ucfirst($product->category)}}
                        </td>
                        <td>
                            RM {{number_format($product->price, 2, '.', ',')}}
                        </td>
                        <td>
                            @switch($product->status)
                                @case(1)
                                    <span class="badge bg-success">Active</span>
                                    @break

                                @case(2)
                                <span class="badge bg-warning">Hidden</span>
                                    @break
                            @endswitch
                            
                        </td>
                        <td>
                            <a href="{{ route('products.view', $product->id) }}" class="me-2">
                                <svg xmlns='http://www.w3.org/2000/svg' height='24' viewBox='0 -960 960 960' width='24'>
                                    <path
                                        d='M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Z' />
                                </svg>
                            </a>

                            <button type="button" class="btn p-0 delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{$product->id}}"
                                onclick="( ()=>{
                                        let id = this.getAttribute('data-id');
                                        document.getElementById('delete_id').value = id;
                                    })()">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm80-160h80v-360h-80v360Zm160 0h80v-360h-80v360Z" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

@stop


@section('modal')

<!-- Add modal -->
<div class="modal modal-lg fade" id="add-product-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('products.create') }}" method="post" enctype= "multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3 form-floating">
                        <input class="form-control fs-09" id="txtName" name="title" placeholder="John" required>
                        <label for="txtName" class="col-form-label">Title</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <textarea class="form-control fs-09" id="txtDesc" name="description" placeholder="John" required></textarea>
                        <label for="txtDesc">Description</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="number" class="form-control fs-09" id="txtPrice" name="price" placeholder="John" required>
                        <label for="txtPrice" class="col-form-label">Price</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <select id="ddlCategory" name="category" class="form-select fs-09" required>
                            <option selected="true" value="laptop">Laptop</option>
                            <option value="prebuilt">Prebuilt</option>
                            <option value="accessories">Accessories</option>
                        </select>
                        <label for="ddlCategory">Category</label>
                    </div>
                    <div class="mb-3">
                        <label for="img1" class="form-label fs-09">Default Image</label>
                        <input type="file" class="form-control fs-09" name="img_src1" accept="image" required>
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

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <svg class="svg-red mb-4" xmlns="http://www.w3.org/2000/svg" height="64" viewBox="0 -960 960 960"
                    width="64">
                    <path
                        d="m330-288 150-150 150 150 42-42-150-150 150-150-42-42-150 150-150-150-42 42 150 150-150 150 42 42ZM480-80q-82 0-155-31.5t-127.5-86Q143-252 111.5-325T80-480q0-83 31.5-156t86-127Q252-817 325-848.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 82-31.5 155T763-197.5q-54 54.5-127 86T480-80Zm0-60q142 0 241-99.5T820-480q0-142-99-241t-241-99q-141 0-240.5 99T140-480q0 141 99.5 240.5T480-140Zm0-340Z" />
                </svg>
                <h2 class="h-3 mb-2">Are you sure?</h2>
                <p>Do you really want to delete the record? The process cannot be undone.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-light mx-4" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('products.destroy') }}" method="post">
                    <input type="hidden" id="delete_id" name="delete_id">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger mx-4">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop