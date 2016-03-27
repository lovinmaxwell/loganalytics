<?php

namespace App\Http\Controllers\Modules;


use App\User;
use App\Http\Requests\EditUserRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{

    public $user;

    public $role;

    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    /**
    * Index page of the module, this is the page with all view controls
    **/
    public function home()
    {
        $data['rolesList'] = $this->user->roleList();
        return view('modules.users.users', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Show all rows, except the row of the logged in User
        return $this->user->getAllUsersWithRoles();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateNewUserRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNewUserRequest $request)
    {
        $newUser = $this->user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $newUser->assignRole(strtolower($request->role));
        Session::flash('message', trans('users.addedNewRecord'));
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->user->getUserInfoWithRole($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditUserRequest|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {
        Session::flash('message', trans('users.duplicateEntryForEmail'));

        if(!$this->isDuplicateEmail($id,$request->email)) {

            $this->user->where('id', $id)->update(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password)
                ]
            );

            $this->user = $this->user->find($id);

            $this->detachExistingRole();

            $this->assignNewRole($request->role);

            Session::flash('message', trans('users.updatedRecord'));

        }

        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listIds = explode(",", $id);
        foreach($listIds as $item) {
            $this->user->destroy($item);
        }
    }

    public function isDuplicateEmail($id, $email)
    {
        return $this->user->where('id', '!=' ,$id)->where('email',$email)->count();
    }

    public function detachExistingRole()
    {
        if ($this->user->hasAnyRole($this->role->all())) {
            $this->user->removeRole($this->user->getRole());
        }
    }

    public function assignNewRole($role)
    {
        $this->user->assignRole(strtolower($role));
    }

}
