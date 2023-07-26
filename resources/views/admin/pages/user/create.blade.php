
@extends('admin.layouts.app')
    @section('content')

        <div class="row mb-5 justify-content-center align-items-center">
            <div class="col-10">
                <div class="card card-body mt-4">
                    <h6 class="text-uppercase font-weight-bolder"><i class="fa-solid fa-clipboard-list"></i> User information</h6>
                    {{-- <span class="text-uppercase font-weight-bolder"> User Information</span> --}}
                    {{-- <p class="text-sm mb-0">Create new user</p> --}}
                    <hr class="horizontal dark my-3">

                    <form action="{!! route('admin-user-oncreate', request('id')) !!}" class="form-create-user" id="saveUserForm" method="POST">
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row g-2">

                            <div class="col-md">
                                <div>
                                    <label for="rolesName" class="form-label">@lang('global.form.username') <span style="font-size: 12px;color:#F98080">*</span></label>
                                    <div class="">
                                        <input type="text" class="form-control " id="username" name="username"  value="{!! request('id') ? $data->username : old('name') !!}" placeholder="@lang('global.form.enter_username')">
                                    </div>
                                    @error('username')
                                        <h6 style="font-size: 12px;color:#F98080">* {{$message}}</h6>
                                    @enderror
                                </div>
                            </div>
                            @if (!request('id'))
                                <div class="col-md">
                                    <div>
                                        <label for="rolesName" class="form-label">@lang('global.form.password') <span style="font-size: 12px;color:#F98080">*</span></label>
                                        <div class="">
                                            <input type="password" class="form-control " id="password" name="password" value="" placeholder="@lang('global.form.enter_password')">
                                        </div>
                                        @error('password')
                                            <h6 style="font-size: 12px;color:#F98080">* {{$message}}</h6>
                                        @enderror
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="row g-2">
                            <div class="col-md">
                                <div>
                                    <label for="rolesName" class="form-label">{{__('global.form.staff_name')}} <span style="font-size: 12px;color:#F98080">*</span></label>
                                    <select class="form-select" id="reference_staff_id" name="reference_staff_id" aria-label="Default select example">
                                        <option value="">{{__('global.form.staff_name')}}</option>
                                        @foreach ($staff as $item)
                                            <option value="{!! $item->StaffID !!}"   {!! (request('id') && $data->reference_staff_id == $item->StaffID) || old('reference_staff_id') == $item->StaffID ? 'selected' : '' !!}>{!! $item->Name!!}</option>
                                        @endforeach
                                    </select>
                                    @error('reference_staff_id')
                                    <h6 style="font-size: 12px;color:#F98080">* {{$message}}</h6>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md">
                                <div>
                                    <label for="rolesName" class="form-label">@lang('global.form.role') <span style="font-size: 12px;color:#F98080">*</span> </label>
                                    <select class="form-select" id="roleid" name="roleid" aria-label="Default select example">
                                        <option value="">@lang('global.form.role')</option>
                                        @foreach ($role as $item)
                                                <option value="{!! $item->id !!}" {!! (request('id') && $data->roleid == $item->id) || old('roleid') == $item->id ? 'selected' : '' !!} > {!! $item->role!!}</option>
                                        @endforeach
                                    </select>
                                    @error('roleid')
                                    <h6 style="font-size: 12px;color:#F98080">* {{$message}}</h6>
                                    @enderror
                                </div>
                            </div>

                            <label for="rolesName" class="form-label">@lang('global.form.status') <span style="font-size: 12px;color:#F98080">*</span> </label>
                            <div class="form-check ps-5">
                                <input class="form-check-input check" type="checkbox" value="1" name="status" id="active"  @if (isset($data)) @if ($data->status == '1') checked @endif @endif>
                                <label class="custom-control-label" for="customCheck1">Active</label><br>
                                <input class="form-check-input" type="checkbox" name="status" value="0" id="inactive"    @if (isset($data)) @if ($data->status == '0') checked @endif @endif>
                                <label class="custom-control-label" for="customCheck1">Inactive</label>
                            </div>
                            @error('status')
                            <h6 style="font-size: 12px;color:#F98080">* {{$message}}</h6>
                            @enderror

                        </div>

                            <div>
                                <label class="mt-4">Description</label>
                                <div class="">
                                    <textarea type="text" class="form-control" rows="6" name="description" id="description">{!! request('id') ? $data->description : old('description') !!}</textarea>
                                </div>
                            </div><br>
                            @if (!request('id'))
                                <h6 class="text-uppercase font-weight-bolder"><i class="fa-solid fa-list-check"></i> Set Permission</h6>
                                <div class="container overflow-hidden">
                                    <div class="row gy-15">
                                        @foreach ($modules as $module)
                                            <div class="col-6">
                                                <div class="p-3">
                                                    <h6 class="accordion-header font-weight-bolder" id="headingOne{!! $module->id !!}">
                                                        <i class="fa-solid fa-sliders"></i>
                                                        @if (App::getLocale() == 'en')
                                                            {!!  $module->name_en !!}
                                                        @else
                                                            {!!  $module->name_kh !!}
                                                        @endif
                                                    </h6>
                                                </div>
                                                @foreach ($module->permission as $item)
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        <input class="form-check-input permission" type="checkbox"
                                                            value="{!! $item->name !!}"
                                                            id="{!! $item->name_display !!}" name="permission[]"
                                                            autocomplete="off" @if ($id && in_array($item->id, $permission->pluck('permission_id')->toArray())) checked @endif />
                                                        <label class="form-check-label" for="{!! $item->display_name_kh !!}">
                                                            @if (App::getLocale() == 'en')
                                                                {!! $item->display_name_en !!}  {!!  $module->name_en !!}
                                                            @else
                                                                {!! $item->display_name_kh !!}  {!!  $module->name_kh !!}
                                                            @endif
                                                        </label>
                                                    </div>
                                                </li>
                                            @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{route('admin-user-lists')}}" type="button" name="button" class="btn btn-light m-0"><i class="fa-solid fa-rotate-left"></i> BACK TO LIST</a>
                            <button type="submit" name="save" class="btn bg-gradient-dark m-0 ms-2"><i class="fa-solid fa-floppy-disk"></i> @lang('global.form.save')</button>
                        </div><br>
                    </form>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function(){
                var id = window.location.pathname.split('/')[4];
                if (id) {
                    $(':checkbox').click(function(e){
                        // $('#active').is()
                        if($(this).is(':checked')){
                            $(':checked').prop('checked', false);
                            $(this).prop('checked', true);
                        }
                        else{
                            e.preventDefault();
                        }
                    });
                }else{
                    $('#active').prop('checked', true);
                }
            });
            // Create user
        //     $(document).ready(function() {
        //         $('#saveUserForm').submit(function(e) {
        //             e.preventDefault();

        //             var username = $("#username").val();
        //             var password = $("#password").val();
        //             $.ajax({
        //                 type: 'POST',
        //                 url: '{{ route("admin-user-oncreate") }}',
        //                 data: {
        //                         username: username,
        //                         password: password,
        //                     },
        //                 success: function(response) {
        //                     // Handle the success response
        //                     alert(response.message);
        //                 },
        //                 error: function(xhr) {

        //                     // Handle the error response
        //                     alert('Error: ' + xhr.responseText);
        //                 }
        //             });
        //         });
        //     });
        // </script>
    @stop
