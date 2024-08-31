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
                <input type="search" class="form-control dropdown-toggle fs-09" placeholder="Search..." id="top-search">
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
                <tr class="">
                    <td class="ps-3">
                        1
                    </td>
                    <td>
                        <a class="me-3 d-inline-block col-2" href="{{url('admin/product-details')}}">
                            <img src="data:image/jpeg;base64,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"
                                title="product-img" class="rounded" height="64">
                        </a>
                        <p class="m-0 d-inline-block align-middle font-16 col-10">
                            <a href="#">Lenovo Ideapad 5</a>
                            <br>
                            <span class="svg-yellow">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="m263.002-161.542 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="m263.002-161.542 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="m263.002-161.542 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="M480-644v236l96 74-36-122 90-64H518l-38-124ZM270.31-173.081l78.769-258.612-206.767-148.306h256.304L480-850.764l81.384 270.765h256.304L610.921-431.693l78.769 258.612L480-332.617 270.31-173.081Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="m354-287 126-76 126 77-33-144 111-96-146-13-58-136-58 135-146 13 111 97-33 143Zm-90.998 125.458 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542ZM480-470Z" />
                                </svg>
                            </span>
                        </p>
                    </td>
                    <td>
                        Laptop
                    </td>
                    <td>
                        RM 3,399.00
                    </td>
                    <td>
                        <span class="badge bg-success">Active</span>
                    </td>
                    <td>
                        <a href="{{url('admin/product-details')}}" class="me-2">
                            <svg xmlns='http://www.w3.org/2000/svg' height='24' viewBox='0 -960 960 960' width='24'>
                                <path
                                    d='M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Z' />
                            </svg>
                        </a>
                        <button type="button" class="btn p-0" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                <path
                                    d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm80-160h80v-360h-80v360Zm160 0h80v-360h-80v360Z" />
                            </svg>
                        </button>
                    </td>
                </tr>

                <tr class="">
                    <td class="ps-3">
                        2
                    </td>
                    <td>
                        <div class="me-3 d-inline-block col-2">
                            <img src="https://microless.com/cdn/products/0e26f97ec0304e2e71951d4f72a84c21-md.jpg"
                                title="product-img" class="rounded" height="64">
                        </div>
                        <p class="m-0 d-inline-block align-middle font-16 col-10">
                            <a href="#">Asus Tuf F17 FX707ZC4</a>
                            <br>
                            <span class="svg-yellow">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="m263.002-161.542 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="m263.002-161.542 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="m263.002-161.542 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="M480-644v236l96 74-36-122 90-64H518l-38-124ZM270.31-173.081l78.769-258.612-206.767-148.306h256.304L480-850.764l81.384 270.765h256.304L610.921-431.693l78.769 258.612L480-332.617 270.31-173.081Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="m354-287 126-76 126 77-33-144 111-96-146-13-58-136-58 135-146 13 111 97-33 143Zm-90.998 125.458 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542ZM480-470Z" />
                                </svg>
                            </span>
                        </p>
                    </td>
                    <td>
                        Laptop
                    </td>
                    <td>
                        RM 4,298.00
                    </td>
                    <td>
                        <span class="badge bg-success">Active</span>
                    </td>
                    <td>
                        <asp:LinkButton runat="server" id="LinkButton1" PostBackUrl="~/view/admin/product_details.aspx"
                            class="me-2"
                            Text="<svg xmlns='http://www.w3.org/2000/svg' height='24' viewBox='0 -960 960 960' width='24'><path d='M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Z'/></svg>">
                        </asp:LinkButton>
                        <a href="javascript:void(0);">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                <path
                                    d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm80-160h80v-360h-80v360Zm160 0h80v-360h-80v360Z" />
                            </svg>
                        </a>
                    </td>
                </tr>

                <tr class="">
                    <td class="ps-3">
                        3
                    </td>
                    <td>
                        <div class="me-3 d-inline-block col-2">
                            <img src="https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcQhr5o6haKiju_KPvlf-1Fsd5Rn3U2XhoUXe-EY6RAaGEWEWH4_6qq3fQ_G1p3i8E3GJ3F3UekIXIzD-n-yMi50DQ6B1M9TgV3yJnOIRUKRpITBg3cN3kWXdQ&usqp=CAE"
                                title="product-img" class="rounded" height="64">
                        </div>
                        <p class="m-0 d-inline-block align-middle font-16 col-10">
                            <a href="#">HP Pavilion 15</a>
                            <br>
                            <span class="svg-yellow">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="m263.002-161.542 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="m263.002-161.542 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="m263.002-161.542 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="m354-287 126-76 126 77-33-144 111-96-146-13-58-136-58 135-146 13 111 97-33 143Zm-90.998 125.458 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542ZM480-470Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="m354-287 126-76 126 77-33-144 111-96-146-13-58-136-58 135-146 13 111 97-33 143Zm-90.998 125.458 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542ZM480-470Z" />
                                </svg>
                            </span>
                        </p>
                    </td>
                    <td>
                        Laptop
                    </td>
                    <td>
                        RM 3,399.00
                    </td>
                    <td>
                        <span class="badge bg-success">Active</span>
                    </td>
                    <td>
                        <asp:LinkButton runat="server" id="LinkButton2" PostBackUrl="~/view/admin/product_details.aspx"
                            class="me-2"
                            Text="<svg xmlns='http://www.w3.org/2000/svg' height='24' viewBox='0 -960 960 960' width='24'><path d='M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Z'/></svg>">
                        </asp:LinkButton>
                        <a href="javascript:void(0);">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                <path
                                    d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm80-160h80v-360h-80v360Zm160 0h80v-360h-80v360Z" />
                            </svg>
                        </a>
                    </td>
                </tr>

                <tr class="">
                    <td class="ps-3">
                        4
                    </td>
                    <td>
                        <div class="me-3 d-inline-block col-2">
                            <img src="https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcTa9CiGMkAagM5-8a5L-Uq6Oc_HZ8Bv9vnUID92BnfQdHMS31WtUhTmaVum6_k7cMByom1didzH-j0YX3i6xl9IJKbAo0finz6vwG1eBdyvQNLzwkB5ZxPF&usqp=CAE"
                                title="product-img" class="rounded" height="64">
                        </div>
                        <p class="m-0 d-inline-block align-middle font-16 col-10">
                            <a href="#">Razer Viper 8K Hz</a>
                            <br>
                            <span class="svg-yellow">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="m263.002-161.542 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="m263.002-161.542 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="m263.002-161.542 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="m263.002-161.542 57.307-246.766L128.85-574.23l252.613-21.922L480-828.842l98.537 232.69L831.15-574.23 639.691-408.308l57.307 246.766L480-292.463 263.002-161.542Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="M480-644v236l96 74-36-122 90-64H518l-38-124ZM270.31-173.081l78.769-258.612-206.767-148.306h256.304L480-850.764l81.384 270.765h256.304L610.921-431.693l78.769 258.612L480-332.617 270.31-173.081Z" />
                                </svg>
                            </span>
                        </p>
                    </td>
                    <td>
                        Accessories
                    </td>
                    <td>
                        RM 373.00
                    </td>
                    <td>
                        <span class="badge bg-danger">Out of stock</span>
                    </td>
                    <td>
                        <asp:LinkButton runat="server" id="LinkButton3" PostBackUrl="~/view/admin/product_details.aspx"
                            class="me-2"
                            Text="<svg xmlns='http://www.w3.org/2000/svg' height='24' viewBox='0 -960 960 960' width='24'><path d='M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Z'/></svg>">
                        </asp:LinkButton>
                        <a href="javascript:void(0);">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                <path
                                    d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm80-160h80v-360h-80v360Zm160 0h80v-360h-80v360Z" />
                            </svg>
                        </a>
                    </td>
                </tr>
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
            <form>
                <div class="modal-body">
                    <div class="mb-3 form-floating">
                        <input class="form-control fs-09" id="txtName" placeholder="John">
                        <label for="txtName" class="col-form-label">Title</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <textarea class="form-control fs-09" id="txtDesc" placeholder="John"></textarea>
                        <label for="txtDesc">Description</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="number" class="form-control fs-09" id="txtPrice" placeholder="John">
                        <label for="txtPrice" class="col-form-label">Price</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <select id="ddlCategory" class="form-select fs-09">
                            <option selected="true" value="laptop">Laptop</option>
                            <option value="prebuilt">Prebuilt</option>
                            <option value="accessories">Accessories</option>
                        </select>
                        <label for="ddlCategory">Category</label>
                    </div>
                    <div class="mb-3">
                        <label for="img1" class="form-label fs-09">Default Image</label>
                        <input class="form-control fs-09" type="file" id="img1">
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
                <asp:Button runat="server" Text="Delete" class="btn btn-danger mx-4"></asp:Button>
            </div>
        </div>
    </div>
</div>
@stop