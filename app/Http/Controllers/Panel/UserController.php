<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\User;
use Validator;
use DB;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    //
    public function user_details(){
        if (Auth::check())
        {
            $name = Auth::user()->name;
        }
        return $name;
    }
    public function edit_user($user_id)
    {
        //dd($user_id);
        $roles = Role::whereNotIn('name', ['member', 'member_agent', 'member_manager', 'member_admin'])->get();
        $page_name= "Modify User";
        $user = User::find($user_id);
        return view('panel.admin.user-edit', compact('user', 'roles', 'page_name'));
    } 
    public function update_user(Request $request)
    {
        
        $user = User::find($request->user_id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        if($user->save()){
            $request->session('success')->flash('success', ucfirst($user->name).' updated successfully');
        }else{
            $request->session('error')->flash('error','Error updating user data');
        }
        $user->roles()->sync($request->roles);
        $name = $this->user_details();
        Log::notice($name.' updated user '.$request->name);
        return redirect('/panel/admin/settings/users/'.$user->id);
    }

    public function add_user(Request $req){
        //dd($req->item_pic);
        $validator = Validator::make($req->all(), [
            'username' => 'required:|unique:users',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'name' => 'required' 
        ]);
        if ($validator->fails()) {    
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400); // 400 being the HTTP code for an invalid request.
            //return response()->json(['errors' => $validator->messages(), 'status' => 422], 200);
        }
        else {
            $user = User::create([
                'name' => strtoupper($req->name),
                'email' => $req->email,
                'username' => $req->username,
                'password' => Hash::make($req->password),
                'status' => 'active',
            ]);
            //$roles = DB::table('role_user')->get();
                foreach($req->roles as $role){
                    DB::table('role_user')->insert(
                        ['role_id' => $role, 'user_id' => $user->id]
                    );
                }
            
            $name = $this->user_details();
            Log::notice($name.' added new user '.$req->name);
            return response()->json($user);
        }

    }
    public function modify_user(Request $req){
        $data = User::find($req->user_id);
        $data->status = $req->user_status;
        $data->save();
        $name = $this->user_details();
        Log::notice($name.' modified '.$data->last_name.', '.$data->first_name.' into '.$req->member_status);
        return response()->json($data);
    }
}
