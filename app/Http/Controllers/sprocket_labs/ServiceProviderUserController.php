<?php

namespace App\Http\Controllers\sprocket_labs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ServiceProvider\SPUser;
use App\Models\ServiceProvider\ServiceProviderOrganization;
class ServiceProviderUserController extends Controller
{

    public function index()
    {
        //
    }

    public function getallspuser()
    {
        // Get all Service Provider User
        $users = SPUser::all();
        return $users;
    }

    public function create(Request $request)
    {
        //
        $data = $request->all();
        $username['email'] = SPUser::select('email')
        ->where('email', "=", $data['email'])
        ->get();

        if(count($username['email']) != 0){
            return response()->json(['message' => 'email is already exist.']);
        }
        else{
            $data["password"] = bcrypt($data['password']);
            $user_organization_data = ServiceProviderOrganization::create($request->except('name', 'phone','email','user_type','is_active', 'password'));

            $data["organization_id"] = $user_organization_data->organization_id;
            $new_user = SPUser::create($data);
            
            if($new_user && $user_organization_data){
                $msg =  ["msg"=> "success"];
                return $msg;
            }
            else{
                $msg =  ["msg"=> "failed"];
                return $msg;
            }
        }
    
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    public function getinfobyemail($email)
    {
        // Retrieve a User Information using Email
        $user = SPUser::where('email', $email)->first();
        return $user;
    }

    public function edit(Request $request)
    {
        // Update Information for Service Provider
        $data = $request->all();
        $update_user = SPUser::where('email', '=', $data['email'])->update($data);
        if($update_user > 0){
            $msg =  ["msg"=> "updated"];
            return $msg;
        }
        else{
            $msg =  ["msg"=> "failed, email not found"];
            return $msg;
        }
        return $msg;
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
