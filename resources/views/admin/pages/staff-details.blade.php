@extends('admin.layouts.default')


@section('custom-admin-head')
<link href="{{ URL::asset('css/admin/admin-theme.css') }}" rel="stylesheet" />
@stop

@section('content')
    <div class="page-path">
    <a class="btn btn-primary me-2" href="{{route('admins.index')}}">
        <svg class="mb-2 me-2" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/></svg>
    
         Staff Details </a>
    </div>
    <div class="d-flex">
        <div class="col-6 col-xl-6">
            <div class="card card-plain h-100 shadow-sm">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                        </div>
                        <div class="col-md-4 text-end">
                            <button type="button" class="btn" id="edit-profile-btn" data-bs-toggle="modal"
                                data-bs-target="#edit-profile-modal">
                                <svg data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"
                                    xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="d-flex">
                        <img alt="profile-image" src="{{ URL::asset('res/man2.jpg') }}" class="m-2 person-icon shadow-xl">
                        <div class="py-3 mx-3">
                            <p class="h4 text-dark">{{$admin->name}}</p>
                            <p class="my-1 h6 text-secondary">{{$admin->position}}</p>
                        </div>
                    </div>
                    <hr class="horizontal gray-light my-4">
                    <ul class="list-group">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm d-flex">
                            <span class="col-2"><strong class="text-dark">Name</strong></span>
                            <span class="col-10">: {{$admin->name}}</span>
                        </li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm d-flex">
                            <span class="col-2"><strong class="text-dark">Userame</strong></span>
                            <span class="col-10">: {{$admin->username}}</span>
                        </li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm d-flex">
                            <span class="col-2"><strong class="text-dark">Mobile</strong></span>
                            <span class="col-10">: {{$admin->phone}}</span>
                        </li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm d-flex">
                            <span class="col-2"><strong class="text-dark">Email</strong></span>
                            <span class="col-10">: {{$admin->email}}</span>
                        </li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm d-flex">
                            <span class="col-2"><strong class="text-dark">Gender</strong></span>
                            <span class="col-10">: {{$admin->gender}}</span>
                        </li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm d-flex">
                            <span class="col-2"><strong class="text-dark">Birthdate</strong></span>
                            <span class="col-10">: {{$admin->birthdate}}</span>
                        </li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm d-flex">
                            <span class="col-2"><strong class="text-dark">Status</strong></span>
                            @switch($admin->status)
                                @case(1)
                                    <span class="badge bg-success">Active</span>
                                    @break

                                @case(2)
                                <span class="badge bg-warning">Blocked</span>
                                    @break
                                @endswitch
                        </li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm d-flex">
                            <span class="col-2"><strong class="text-dark">Role</strong></span>
                            <span class="col-10">: {{$admin->position}}</span>
                        </li>
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm d-flex">
                            <span class="col-2"><strong class="text-dark">Joined on</strong></span>
                            <span class="col-10">: {{$admin->created_on}}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-3 mx-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="header-title mb-3">Activity</h5>
                    @foreach($logactivitys as $logactivity)
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item mt-3 d-flex">
                            <strong class="">{{$logactivity->created_on}}</strong>
                        </li>
                        <li class="list-group-item d-flex">
                            <small class="me-3 text-muted">09:35 AM</small>
                            <span class="col">{{$admin->description}}</span>
                        </li>
                    </ul>
                    @endforeach
                </div> <!-- end card-body-->
            </div>
        </div>
    </div>
@stop

@section('modal')
    <div class="modal fade" id="edit-profile-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('admins.edit_details', $admin->id )}}" method="post">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="mb-3 form-floating">
                   <input type="text" class="form-control fs-09" id="txtName" name="name" placeholder="John">
                    <label for="txtName" class="col-form-label">Name:</label>
                </div>
                <div class="mb-3 form-floating">
                    <input type="text" class="form-control fs-09" id="txtUsername" name="username" placeholder="John">
                    <label for="txtUsername" class="col-form-label">Username:</label>
                </div>
                <div class="mb-3 form-floating">
                    <input type="email" class="form-control fs-09" TextMode="Email" id="txtEmail" name="email" placeholder="John">
                    <label for="txtEmail" class="col-form-label">Email:</label>
                </div>
                <div class="mb-3 form-floating">
                     <input type="tel" class="form-control fs-09" TextMode="Phone" id="txtMobile" name="mobile" placeholder="John">
                    <label for="txtMobile" class="col-form-label">Mobile:</label>
                </div>
                <div class="mb-3 row">
                    <div class="col">
                        <div class="form-floating">
                            <input type="date" class="form-control fs-09" id="txtBirthdate" name="birthdate" placeholder="John">
                            <label for="txtBirthdate" class="col-form-label">Birthdate:</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                                <select id="ddlStatus" name="status" class="form-select fs-09">
                                    <option Selected="True" Value="1">Active</option>
                                    <option Value="2">Blocked</option>
                                </select>
                                <label for="ddlStatus">Status</label>
                        </div>
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col">
                        <div class=" form-floating">
                                <select id="ddlGender" name="gender" class="form-select fs-09">
                                    <option Selected="True" Value="m">Male</option>
                                    <option Value="f">Female</option>
                                </select>
                                <label for="ddlGender">Gender</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <select id="ddlPosition" name="position" class="form-select fs-09">
                                <option Selected="True" Value="1">CEO</option>
                                <option Value="2">Clerk</option>
                                <option Value="3">Warehouse admin</option>
                                <option Value="4">Sales admin</option>
                                <option Value="5">Sales executive</option>
                                <option Value="6">Logistics Manager</option>
                            </select>
                            <label for="ddlPosition">Position</label>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-danger fs-09" data-bs-dismiss="modal">Discard
                    changes</button>
                <button type="submit" Text="Save" class="btn btn-primary fs-09">Save</button>
            </div>

        </form>
        </div>
    </div>
</div>

<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

</script>
@stop