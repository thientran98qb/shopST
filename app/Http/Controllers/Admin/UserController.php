<?php

namespace App\Http\Controllers\Admin;

use App\Model\Role;
use App\Model\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
        protected $user;
        protected $role;

        public function __construct(User $user,Role $role)
        {
            $this->user = $user;
            $this->role = $role;
        }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index(Request $request)
        {
            $data = [];
            $pageTitle = 'User List';
            $data['pageTitle'] = $pageTitle;

            $sidebar = [
                'parent' => ' user',
                'child' => 'index'
            ];

            $data['sidebar'] = $sidebar;

            $users = $this ->user;
            // search with user name
            $search_user_name = null;
            if ($request->search_user_name) {
                $search_user_name = $request->search_user_name;
                $users = $users->where('name', 'like', '%' . $search_user_name . '%');
            }
           $data['search_user_name'] = $search_user_name;

            $users = $users
                ->orderBy('id', 'desc')
                ->paginate(5);
            $data['users'] = $users;

            return view('backend.users.index', $data);

        }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $sidebar = [
            'parent' => 'user',
            'child' => 'add'
        ];
        $data['sidebar'] = $sidebar;

        $roles = $this->role->pluck('name', 'id')->toArray();
        $data['roles'] = $roles;

        $genders =$this->user->pluck('gender','id')->toArray();
        $data['genders'] = $genders;

        return view('backend.users.add', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->all();
        // save data for table users
        $this->user->name = $params['name'];
        $this->user->email = $params['email'];
        $this->user->password = $params['password'];
        $this->user->gender = $params['gender'];
        $this->user->phone =  $params['phone'];
        $this->user->address = $params['address'];
        $this->user->note = $params['note'];
        $checkUser = $this->user->save();

        // save data for table role_users
        $checkRoleUser = $this->user->roles()->attach($request->input('role_id'));

        if ($checkUser && $checkRoleUser) {
            return redirect(route('admin-user-index'))->with('success', 'Insert User successful.');
        }

        // insert fail
        return redirect(route('admin-user-index'))->with('fail', 'Insert User fail.');
    }

    public function show($id)
    {
        $data = [];
        $sidebar = [
            'parent' => 'user',
            'child' => 'index'
        ];
        $data['sidebar'] = $sidebar;

        $roles = $this->role->pluck('name', 'id')->toArray();
        $data['roles'] = $roles;

        $genders = config('common.genders');
        $data['genders'] = $genders;

        $user = $this->user->find($id);
        $data['user'] = $user;
        return view('backend.users.detail', $data);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public  function edit($id)
        {
            $data = [];
            $sidebar = [
                'parent' => 'user',
                'child' => 'index'
            ];
            $data['sidebar'] = $sidebar;

            $roles = $this->role->pluck('name', 'id ')->toArray();
            $data['roles'] = $roles;

            $genders = config('common.genders');
            $data['genders'] = $genders;

            $user = $this->user->find($id);
            $data['user'] = $user;
            return view('backend.users.edit', $data);
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $params = $request->all();
        // save data for table users
        $this->user = $this->user->find($id);
        $this->user->name = $params['name'];
        $this->user->email = $params['email'];
        if (!empty($params['password_new'])) {
            $this->user->password = $params['password_new'];
        }
        $this->user->gender = $params['gender'];
        $this->user->phone = $params['phone'];
        $this->user->address = $params['address'];
        $checkUser = $this->user->save();




        // save data for table roles
        //$checkRoleUser = $this->user->roles()->attach($params['role_id']);

        if ($checkUser  ) {
            return redirect(route('admin-user-index'))->with('success', 'Update User successful.');
        }

        // insert fail
        return redirect(route('admin-user-index'))->with('fail', 'Update User fail.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->roles()->detach();
        $check = $user->delete();
        if ($check) {
            return redirect(route('admin-user-index'))->withSuccess('Delete Successful.');
        }

        return redirect(route('admin-user-index'))->withError('Delete Fail.');
    }
}
