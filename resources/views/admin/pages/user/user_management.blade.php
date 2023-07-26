@extends('admin.layouts.app')
    @section('content')

    <form action="" method="GET">
    <div class="d-flex mb-3">
            <div class="p-2">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                        <input type="text" name="search" value="{{request('search')}}" class="form-control" placeholder="@lang('global.header.search')" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
            <div class="p-2">
                <select class="form-select" name="searchrole" aria-label="Default select example">
                    <option selected>Role &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </option>
                    @foreach ($role as $i => $item)
                    <option value="{!! $item->{'role'} !!}">  {!! isset($item->{'role'}) ? $item->{'role'} : '--' !!}</option>
                    @endforeach
                </select>
            </div>
            <div class="p-2">
                <select class="form-select" name="status" aria-label="Default select example">
                    <option selected>Status &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </option>

                    <option value="active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>
            <div class="p-2">
                <button type="submit" class="btn bg-gradient-dark"><i class="fa-solid fa-magnifying-glass"></i>&nbsp; @lang('global.header.search')</button>
            </div>
        </form>
        @can('user-create')
            <div class="ms-auto p-2">
                <a href="{{route('admin-user-create')}}" type="button" class="btn bg-gradient-dark"><i class="fa-solid fa-user-plus"></i>&nbsp;  Create User</a>
            </div>
        @endcan
    </div>

        <div class="col-12">
            <div class="card" hidden>
                <div class="table-responsive">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Function</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Technology</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th>
                        <th class="text-secondary opacity-7"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-xs">John Michael</h6>
                              <p class="text-xs text-secondary mb-0">john@creative-tim.com</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">Manager</p>
                          <p class="text-xs text-secondary mb-0">Organization</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm badge-success">Online</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                        </td>
                        <td>
                            <div class="dropdown pt-3" style="padding-top: -100px !important">
                                <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
                                <i class="fa-solid fa-user-pen"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                                    @can('user-update')
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="fa-solid fa-file-pen"></i>   Edit
                                            </a>
                                        </li>
                                    @endcan
                                    @can('user-delete')
                                        <li >
                                            <a class="dropdown-item text-danger" href="#">
                                                <i class="fa-solid fa-trash"></i>  Delete
                                            </a>
                                        </li>
                                    @endcan
                                    @can('user-set-permission')
                                        {{-- @if ($item->is_active == 1) --}}
                                            <li>
                                                <a class="dropdown-item" href="{{route('admin-user-permission',$item->id)}}">
                                                <i class="fa-solid fa-wrench"></i>  Set Permission
                                                </a>
                                            </li>
                                        {{-- @endif --}}
                                    @endcan
                                </ul>
                            </div>
                        </td>
                      </tr>

                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-3.jpg" class="avatar avatar-sm me-3">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-xs">Alexa Liras</h6>
                              <p class="text-xs text-secondary mb-0">alexa@creative-tim.com</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">Programator</p>
                          <p class="text-xs text-secondary mb-0">Developer</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm badge-secondary">Offline</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">11/01/19</span>
                        </td>
                        <td class="align-middle">
                          <a href="#!" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                            Edit
                          </a>
                        </td>
                      </tr>

                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-4.jpg" class="avatar avatar-sm me-3">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-xs">Laurent Perrier</h6>
                              <p class="text-xs text-secondary mb-0">laurent@creative-tim.com</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">Executive</p>
                          <p class="text-xs text-secondary mb-0">Projects</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm badge-success">Online</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">19/09/17</span>
                        </td>
                        <td class="align-middle">
                          <a href="#!" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                            Edit
                          </a>
                        </td>
                      </tr>

                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-3.jpg" class="avatar avatar-sm me-3">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-xs">Michael Levi</h6>
                              <p class="text-xs text-secondary mb-0">michael@creative-tim.com</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">Programator</p>
                          <p class="text-xs text-secondary mb-0">Developer</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm badge-success">Online</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">24/12/08</span>
                        </td>
                        <td class="align-middle">
                          <a href="#!" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                            Edit
                          </a>
                        </td>
                      </tr>

                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-xs">Richard Gran</h6>
                              <p class="text-xs text-secondary mb-0">richard@creative-tim.com</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">Manager</p>
                          <p class="text-xs text-secondary mb-0">Executive</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm badge-secondary">Offline</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">04/10/21</span>
                        </td>
                        <td class="align-middle">
                          <a href="#!" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                            Edit
                          </a>
                        </td>
                      </tr>

                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-4.jpg" class="avatar avatar-sm me-3">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-xs">Miriam Eric</h6>
                              <p class="text-xs text-secondary mb-0">miriam@creative-tim.com</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">Programtor</p>
                          <p class="text-xs text-secondary mb-0">Developer</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm badge-secondary">Offline</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">14/09/20</span>
                        </td>
                        <td class="align-middle">
                          <a href="#!" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                            Edit
                          </a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

                <div class="card-body  pb-0">


                    <div class="table-responsive">
                        <table class="table align-items-center mb-0 table-borderless">
                            <thead>
                                <tr>
                                    <td class="ps-4 p-3">
                                        @lang('global.lists.No')
                                    </td>

                                    <td class="ps-4">
                                        @lang('global.lists.username')
                                    </td>

                                    <td class="ps-4">
                                        RoleID
                                    </td>

                                    <td class="ps-4">
                                        {{-- @lang('global.lists.username') --}}បុគ្គលិកឈ្មោះ
                                    </td>
                                    {{-- <td class="ps-4">
                                        @lang('global.lists.email')
                                    </td> --}}

                                    <td class="ps-4">
                                        @lang('global.lists.status')
                                    </td>

                                    <td class="ps-4">
                                        @lang('global.lists.role')
                                    </td>
                                    <td class="ps-4">
                                        Description
                                     </td>
                                    <td class="ps-4">
                                        {{-- @lang('global.lists.action') --}}កាលបរិច្ឆទធ្វើបច្ចុប្បន្ន
                                    </td>
                                    <td class="ps-4">
                                        @lang('global.lists.action')
                                    </td>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($data as $i => $item)
                                        <tr>
                                            <td class="ps-4 p-0">
                                                {{$i+1}}

                                            </td>

                                            <td class="ps-4">
                                                {!! isset($item->username) ? $item->username : '--' !!}
                                            </td>

                                            <td class="ps-4">
                                                {!! isset($item->roleid) ? $item->roleid : '--' !!}
                                            </td>

                                            <td class="ps-4">
                                                {!! isset($item->staff->Name) ? $item->staff->Name : '--' !!}
                                            </td>


                                            <td class="ps-4">
                                                @if($item->status == 1)

                                                <span class="basic-badge green">Active</span>
                                                @else
                                                <span class="basic-badge red">Inactive</span>
                                                @endif

                                            </td>

                                            <td class="ps-4">
                                                {!! isset($item->role->role) ? $item->role->role : '--' !!}
                                            </td>
                                            <td class="ps-4">
                                                {!! isset($item->description) ? $item->description : '--'!!}
                                            </td>
                                            <td class="ps-4">
                                                {{Carbon::parse($item->{'created_at'})->format('F j, Y : H:i:s')}}
                                                {{-- {!! isset($item->{'Modifying Date'}) ? $item->{'Modifying Date'} : '--' !!} --}}
                                            </td>
                                            <td class="" >
                                                <h1></h1>
                                                @canany(['user-update', 'user-delete','user-set-permission'])
                                                    <div class="dropdowns dropstart">
                                                        <button type="button" class="btn bg-gradient-dark btn-sm sdropdown-toggle btn-action" data-bs-toggle="dropdown" aria-expanded="false" data-id="{{$item->id}}">
                                                            <i class="fa-solid fa-pen-to-square" style="font-size: 14px"></i>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            @can('user-update')
                                                                <li>
                                                                    <a class="dropdown-item" href="{{route('admin-user-edit',$item->id)}}">
                                                                        <i class="fa-solid fa-file-pen"></i> Edit
                                                                    </a>
                                                                </li>
                                                            @endcan
                                                            @can('user-delete')
                                                                <li class="delete-user" data-id="{{$item->username}}"   onclick="deleteRecord({{ $item->id }})">
                                                                    <a class="dropdown-item text-danger" href="#">
                                                                        <i class="fa-solid fa-trash"></i>  Delete
                                                                    </a>
                                                                </li>
                                                            @endcan
                                                            @can('user-set-permission')

                                                                    <li>
                                                                        <a class="dropdown-item" href="{{route('admin-user-permission',$item->id)}}">
                                                                        <i class="fa-solid fa-wrench"></i>  Set Permission
                                                                        </a>
                                                                    </li>

                                                            @endcan
                                                        </ul>
                                                    </div>
                                                @endcan
                                            </td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    {{$data->links()}}
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
        </div>

    <script>
        $(document).ready(function() {
            $('.btn-action').on('click', function() {
                var id = $(this).data('id');

                // Get the first td
                var periodStart = $(this).closest('tr').children('td:eq(0)').text();

                // Get the second td
                var getusername = $(this).closest('tr').children('td:eq(1)').text();
                console.log(getusername)
                $('.delete-user').click(function(){
                    var csrfToken = $('meta[name="csrf-token"]').attr('content');

                    const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn bg-gradient-info',
                        cancelButton: 'btn bg-gradient-danger'
                    },
                    buttonsStyling: false
                    })

                    swalWithBootstrapButtons.fire({
                    title: 'Delete User',
                    // text: 'Are you sure you want to delete user <strong>'+getusername+'</strong> ?',
                    html:'Are you sure you want to delete user <b>'+getusername+'</b> ?',
                    icon: 'warning',
                    timer: 6000,
                    showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonText: '<i class="fa-solid fa-trash"></i>&ensp;Yes, delete it!',
                    cancelButtonText: '<i class="fa-solid fa-rotate-left"></i>&ensp;No, cancel!',
                    reverseButtons: true,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }

                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url:`{{route('admin-user-destroy')}}/${id}`,
                                type: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': csrfToken
                                },
                                success: function () {
                                    Swal.fire('Deleted!', 'The record has been deleted.', 'success');
                                    setTimeout(function() {
                                    location.reload();
                                        }, 1500);
                                    },
                                error: function (error) {
                                    // Show error message
                                    Swal.fire('Error!', 'An error occurred while deleting the record.', 'error');
                                    console.error(error);
                                }
                            });
                        }
                    })

                })
            });
        });


        // function deleteRecord(recordId) {

        // }

    </script>


    @stop
