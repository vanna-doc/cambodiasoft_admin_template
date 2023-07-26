<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Lang;
use Auth;
use App\Models\Staff;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
use App\Models\ModulePermission;
use App\Models\ModelHasPermission;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use League\CommonMark\Extension\DescriptionList\Node\Description;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

use Carbon\Carbon;
class UserController extends Controller
{

        public function __construct()
        {
            $this->middleware('permission:user-view', ['only' => ['index']]);
            $this->middleware('permission:user-create', ['only' => ['create', 'save']]);
            $this->middleware('permission:user-update', ['only' => ['create', 'save']]);
            $this->middleware('permission:user-set-permission', ['only' => ['setPermission','savePermission']]);
            $this->middleware('permission:user-delete', ['only' => ['destroy']]);

        }

        private $enterUsernam ;
        private $duplicateUsername;
        private $entePassword;
        private $langPassword;
        private $role;
        private $staff;
        private $message;
        protected $layout = 'admin.pages.user.';
        public function index()  {

            $data['data'] = User::paginate(10);
            $data['role'] = Role::select('id','role')->where('is_active',1)->get();

            return view($this->layout . 'user_management',$data);
        }

        public function role()  {
            return view($this->layout . 'user-role');
        }

        public function create(Request $request)  {
            $data['id']         =   $request->id;
            $data['staff']      =   DB::connection('sqlsrv')->table('tblStaff')->select('StaffID','Name')->get();
            $data['role']       =   Role::select('id','role')->where('is_active',1)->get();
            $data['data']       =   User::with('role')->where('id', $request->id)->first();
            $data['permission'] =   ModelHasPermission::where('model_id', $request->id)->get();
            $data['modules']    =   ModulePermission::with('permission')->where('status', 1)->orderBy('sort_no', 'asc')->get();

            return view($this->layout . 'create',$data);
        }

        public function save(Request $request)  {


                $id = $request->id;

                if (!$id) {
                    $item = $request->validate([
                        "username" => "required|string|unique:tbluser,username",
                        "password" => "required|min:8|max:255|" ,
                        // 'password' => 'required|min:8|max:255|regex:/^[a-zA-Z0-9_\-]+$/',
                        'roleid'                    =>  'required', 'string',
                        'reference_staff_id'        =>   'required', 'string',
                        'status'                    =>  'required',
                        'description'               =>   'nullable',
                    ],
                    [
                        'username.unique'       =>  $this->duplicateUsername = Lang::get('global.form.duplicate_username'),
                        'username'              =>  $this->enterUsernam = Lang::get('global.form.enter_username'),
                        'password.min'          =>  $this->langPassword = Lang::get('global.form.lang_pass'),
                        'password'              =>  $this->entePassword = Lang::get('global.form.enter_password'),
                        "reference_staff_id"    =>  $this->role = Lang::get('global.form.enter_staff'),
                        "roleid"                =>  $this->staff = Lang::get('global.form.enter_role'),
                        "status"                =>  $this->staff = Lang::get('global.form.enter_status'),
                    ]);
                }else{
                    $item = $request->validate([
                        "username" => "nullable|unique:tbluser,username" . ($id ? ",$id" : ''),
                        'roleid'                    =>  'required', 'string',
                        'reference_staff_id'        =>   'required', 'string',
                        'status'                    =>   'required',
                        'description'               =>   'nullable',
                    ],
                    [
                        'username.unique'       =>  $this->duplicateUsername = Lang::get('global.form.duplicate_username'),
                        'username'              =>  $this->enterUsernam = Lang::get('global.form.enter_username'),
                        "reference_staff_id"    =>  $this->role = Lang::get('global.form.enter_staff'),
                        "roleid"                =>  $this->staff = Lang::get('global.form.enter_role'),
                        "status"                =>  $this->staff = Lang::get('global.form.enter_status'),
                    ]);
                }

                if($id){
                    $item["status"] = $request->status;
                    User::where('id',$id)->update($item);
                    $message =  Lang::get('global.auth.login_fail');
                    toast("$message",'error')->timerProgressBar()->width('300px');
                }else{
                    $item["password"] = bcrypt($request->password);
                    $user = User::create($item);

                    // save permission
                    $permission = User::find($user->id);
                    $permission->givePermissionTo($request->permission);
                    // end save permission
                    $message =  Lang::get('global.auth.login_fail');
                    toast("$message",'error')->timerProgressBar()->width('300px');
                }

           return redirect()->route('admin-user-lists');
        }

        public function destroy($id)  {
            $data = User::findOrFail($id);
            $data->delete();

            return response()->json(['message' => 'Record deleted successfully']);
        }
        public function setPermission(Request $request) {

            $id = $request->id;
            $data["user"] =  User::find(request('id'));

            $search = $request->search;
            $data['ModulPermission'] = ModulePermission::select('parent_id')
            ->when(request('search'), function ($q) {
                $q->where('name_en', request('search'));
                $q->Orwhere('name_kh', request('search'));
            })
            ->where('status',1)
            ->groupBy('parent_id')->get();
            $data['permission'] = $data["user"]->ModelHasPermission;

            $data['getuser'] = User::where('id',$id)->pluck('username')->first();

            return view($this->layout . 'permission', $data);

        }

        public function savePermission(Request $req)
        {

            $req->validate([
                "permission" => "required",
            ], [
                "permission.required" => "Permission required",
            ]);
            if (!$req->permission) {
                return redirect()->back();
            }
            DB::beginTransaction();
            try {
                $data = User::find($req->id);
                $permissions = Permission::pluck('name')->toArray();
                $revoke = array_diff($permissions, $req->permission);
                $data->givePermissionTo($req->permission);
                $data->revokePermissionTo($revoke);
                DB::commit();
                $message =  Lang::get('global.auth.permission');
                toast("$message",'warning')->timerProgressBar()->width('450px');;
                return redirect()->route("admin-user-lists", 1);
            } catch (Exception $error) {
                DB::rollback();
                $status = "Permission unsuccess!";
                Session::flash("warning", $status);
                return redirect()->back();
            }
        }
}
