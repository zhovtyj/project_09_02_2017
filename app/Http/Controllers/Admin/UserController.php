<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\User;
use App\Role;
use App\UserInfo;

class UserController extends Controller
{

    public function index()
    {
        $role = Role::where('name', 'Admin')->first();

        $users = User::when($role, function ($query) use ($role) {
            return $query->where('role_id', '<>', $role->id);
        })
            //->crossJoin('user_infos')
            ->leftJoin('user_infos', 'users.id', '=', 'user_infos.user_id')
//            ->join('user_infos', function ($join) {
//                $join->on('users.id', '=', 'user_infos.user_id');
//            })
            ->get();



        return view('admin.user.index')->withUsers($users);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
            'email'           => 'required|email|max:255|unique:users',
            'password'        => 'required|min:6',
            'first_name'      => 'required|max:255',
            'last_name'       => 'required|max:255',
            'company'         => 'max:255',
            'phone'           => 'max:255',
            'country'         => 'required|max:255',
            'address1'        => 'required|max:255',
            'address2'        => 'max:255',
            'city'            => 'required|max:255',
            'state'           => 'max:255',
            'postcode'        => 'required|max:255',
        ));

        $user = new User;
        $user->name = '';
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $userInfo = New UserInfo;

        $userInfo->user()->associate($user);
        $userInfo->first_name = $request->first_name;
        $userInfo->last_name = $request->last_name;
        $userInfo->company = $request->company;
        $userInfo->phone = $request->phone;
        $userInfo->country = $request->country;
        $userInfo->address1 = $request->address1;
        $userInfo->address2 = $request->address2;
        $userInfo->city = $request->city;
        $userInfo->state = $request->state;
        $userInfo->postcode = $request->postcode;

        $userInfo->save();

        Session::flash('success', 'Client created successfully.');

        return redirect()->route('client.index');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit')->withUser($user);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if($user->email == $request->email){
            $this->validate($request, array(
                'first_name'      => 'required|max:255',
                'last_name'       => 'required|max:255',
                'company'         => 'max:255',
                'phone'           => 'max:255',
                'country'         => 'required|max:255',
                'address1'        => 'required|max:255',
                'address2'        => 'max:255',
                'city'            => 'required|max:255',
                'state'           => 'max:255',
                'postcode'        => 'required|max:255',
            ));
        }
        else{
            $this->validate($request, array(
                'email'           => 'required|email|max:255|unique:users',
                'first_name'      => 'required|max:255',
                'last_name'       => 'required|max:255',
                'company'         => 'max:255',
                'phone'           => 'max:255',
                'country'         => 'required|max:255',
                'address1'        => 'required|max:255',
                'address2'        => 'max:255',
                'city'            => 'required|max:255',
                'state'           => 'max:255',
                'postcode'        => 'required|max:255',
            ));
        }


        //$user->name = $request->name;
        $user->email = $request->email;
        if($request->password){
            $user->password = bcrypt($request->password);
        }
        $user->save();

        $userInfo = UserInfo::where('user_id', '=', $id)->first();

       //$userInfo->user()->associate($user);
        $userInfo->first_name = $request->first_name;
        $userInfo->last_name = $request->last_name;
        $userInfo->company = $request->company;
        $userInfo->phone = $request->phone;
        $userInfo->country = $request->country;
        $userInfo->address1 = $request->address1;
        $userInfo->address2 = $request->address2;
        $userInfo->city = $request->city;
        $userInfo->state = $request->state;
        $userInfo->postcode = $request->postcode;

        $userInfo->save();

        Session::flash('success', 'Client updated successfully.');

        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
