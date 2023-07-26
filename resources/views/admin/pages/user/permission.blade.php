@extends('admin.layouts.app')
    @section('content')
        <div class="row mb-5 justify-content-center align-items-center">
            <div class="col-10">
                <div class="row">
                    <form action="{{url()->current()}}" method="GET">
                        <div class="d-flex mb-3">
                            <div class="p-2">
                                <h5 class="text-uppercase "><span style="color: #ef4e23">*</span>  @lang('global.header.set_permi') ({{$getuser}})</h5>
                            </div>
                            <div class="ms-auto p-2">
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
                                <button type="submit" class="btn bg-gradient-dark"><i class="fa-solid fa-magnifying-glass"></i>&nbsp;  @lang('global.header.search')</button>
                            </div>
                          </div>

                    </form>
                    <form id="form" class="form-wrapper" action="{!! route('admin-user-save-permission', request('id')) !!}" method="POST">
                        {{ csrf_field() }}
                        <div class="permissionLayoutGp">

                            <div class="table-responsive   px-3">
                                <table class="table align-items-center table-borderless">
                                    <tbody>
                                        <tr class="ps-3 p-10">
                                            <i class="fa-solid fa-list-check"></i>&nbsp; <span class=" text-uppercase font-weight-bolder">Permission Name</span>
                                            <span style="float:right">
                                                <div class="checkbox-wrapper-14">
                                                    <input  type="checkbox" class="switch select-all"  id="select-all" value="">
                                                    <label for="s1-14"> Select ALL</label>
                                                  </div>
                                              </span>
                                        </tr>
                                        @if ($ModulPermission->count() > 0)
                                        @if (isset($ModulPermission))

                                            @foreach ($ModulPermission as $modulParent)
                                                <tr>
                                                    {{-- <td></td> --}}
                                                    @if (isset($modulParent->modulePermission))
                                                        @foreach ($modulParent->modulePermission as $modul)
                                                            <td class="ps-3 p-3">
                                                                @if (App::getLocale() == 'en')
                                                                <i class="fa-solid fa-list-check"></i>&nbsp;  <span class="font-weight-bolder">{{ $modul->name_en }}</span>
                                                                @elseif (App::getLocale() == 'kh')
                                                                <i class="fa-solid fa-list-check"></i>&nbsp;  <span class="font-weight-bolder">{{ $modul->name_kh }}</span>
                                                                @endif
                                                            </td>
                                                            <td  class="ps-3">
                                                                @if (isset($modul->permission))
                                                                    @foreach ($modul->permission as $action)
                                                                        <td class="ps-3">
                                                                            <div class="checkbox-wrapper-14">
                                                                                <input id="s1-14" type="checkbox" class="switch checkbox_permission" name="permission[]" value="{{ $action->name }}"
                                                                                @if (isset($permission)) @if (in_array($action->id, $permission->pluck('permission_id')->toArray())) checked @endif
                                                                                @endif>
                                                                                <label for="s1-14" class="">
                                                                                    @if (App::getLocale() == 'en')
                                                                                        {{ $action->display_name_en }} {{ $modul->name_en }}
                                                                                    @elseif (App::getLocale() == 'kh')
                                                                                        {{ $action->display_name_kh }} {{ $modul->name_kh }}
                                                                                    @endif
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                    @endforeach
                                                                @endif
                                                            </td>
                                                        @endforeach
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @endif
                                        @else
                                        <div class=" justify-content-center align-items-center" align="center">
                                            <img src="{{asset('admin/assets/img/not-found.png')}}" alt="" width="400px"><br>
                                            <a href="{{route('admin-user-permission',request('id'))}}" type="button" class="btn bg-gradient-info">Try again</a>
                                        </div>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div><br>
                        @if ($ModulPermission->count() > 0)
                        <div class="form-footer" style="padding-left: 20px">
                            <button type="submit" class="btn bg-gradient-dark"><i class="fa-solid fa-floppy-disk"></i> &nbsp;@lang('global.auth.save_p')</button>
                            <a href="{{route('admin-user-lists')}}" type="button" class="btn bg-gradient-white" ><i class="fa-sharp fa-solid fa-rotate-left"></i> @lang('global.auth.cancel')</a>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>


        <script>

            $('.select-all').change(function () {
                $('.checkbox_permission').prop('checked',this.checked);
            });

            $('.checkbox_permission').change(function () {
            if ($('.checkbox_permission:checked').length == $('.checkbox_permission').length){
            $('.select-all').prop('checked',true);
            }
            else {
            $('.select-all').prop('checked',false);
            }
            });

        </script>


        @error('permission')
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
                })

                Toast.fire({
                icon: 'error',
                title: '{{ $message }}'
                })
        </script>
        @enderror

<style>
    @supports (-webkit-appearance: none) or (-moz-appearance: none) {
      .checkbox-wrapper-14 input[type=checkbox] {
        --active: #275EFE;
        --active-inner: #fff;
        --focus: 2px rgba(39, 94, 254, .3);
        --border: #BBC1E1;
        --border-hover: #275EFE;
        --background: #fff;
        --disabled: #F6F8FF;
        --disabled-inner: #E1E6F9;
        -webkit-appearance: none;
        -moz-appearance: none;
        height: 22.5px;
        outline: none;
        display: inline-block;
        vertical-align: top;
        position: relative;
        margin: 0;
        cursor: pointer;
        border: 1px solid var(--bc, var(--border));
        background: var(--b, var(--background));
        transition: background 0.3s, border-color 0.3s, box-shadow 0.2s;
      }
      .checkbox-wrapper-14 input[type=checkbox]:after {
        content: "";
        display: block;
        left: 0;
        top: 0;
        position: absolute;
        transition: transform var(--d-t, 0.3s) var(--d-t-e, ease), opacity var(--d-o, 0.2s);
      }
      .checkbox-wrapper-14 input[type=checkbox]:checked {
        --b: var(--active);
        --bc: var(--active);
        --d-o: .3s;
        --d-t: .6s;
        --d-t-e: cubic-bezier(.2, .85, .32, 1.2);
      }
      .checkbox-wrapper-14 input[type=checkbox]:disabled {
        --b: var(--disabled);
        cursor: not-allowed;
        opacity: 0.9;
      }
      .checkbox-wrapper-14 input[type=checkbox]:disabled:checked {
        --b: var(--disabled-inner);
        --bc: var(--border);
      }
      .checkbox-wrapper-14 input[type=checkbox]:disabled + label {
        cursor: not-allowed;
      }
      .checkbox-wrapper-14 input[type=checkbox]:hover:not(:checked):not(:disabled) {
        --bc: var(--border-hover);
      }
      .checkbox-wrapper-14 input[type=checkbox]:focus {
        box-shadow: 0 0 0 var(--focus);
      }
      .checkbox-wrapper-14 input[type=checkbox]:not(.switch) {
        width: 21px;
      }
      .checkbox-wrapper-14 input[type=checkbox]:not(.switch):after {
        opacity: var(--o, 0);
      }
      .checkbox-wrapper-14 input[type=checkbox]:not(.switch):checked {
        --o: 1;
      }
      .checkbox-wrapper-14 input[type=checkbox] + label {
        display: inline-block;
        vertical-align: middle;
        cursor: pointer;
        margin-left: 4px;
      }

      .checkbox-wrapper-14 input[type=checkbox]:not(.switch) {
        border-radius: 7px;
      }
      .checkbox-wrapper-14 input[type=checkbox]:not(.switch):after {
        width: 5px;
        height: 9px;
        border: 2px solid var(--active-inner);
        border-top: 0;
        border-left: 0;
        left: 7px;
        top: 4px;
        transform: rotate(var(--r, 20deg));
      }
      .checkbox-wrapper-14 input[type=checkbox]:not(.switch):checked {
        --r: 43deg;
      }
      .checkbox-wrapper-14 input[type=checkbox].switch {
        width: 38px;
        border-radius: 11px;
      }
      .checkbox-wrapper-14 input[type=checkbox].switch:after {
        left: 2px;
        top: 2px;
        border-radius: 50%;
        width: 16px;
        height: 17px;
        background: var(--ab, var(--border));
        transform: translateX(var(--x, 0));
      }
      .checkbox-wrapper-14 input[type=checkbox].switch:checked {
        --ab: var(--active-inner);
        --x: 17px;
      }
      .checkbox-wrapper-14 input[type=checkbox].switch:disabled:not(:checked):after {
        opacity: 0.6;
      }
    }

    .checkbox-wrapper-14 * {
      box-sizing: inherit;
    }
    .checkbox-wrapper-14 *:before,
    .checkbox-wrapper-14 *:after {
      box-sizing: inherit;
    }
  </style>


    @stop
