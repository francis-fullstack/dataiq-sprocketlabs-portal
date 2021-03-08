<?php

namespace App\Http\Controllers\sprocket_labs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
class SprocketLabsUser extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
    }

    public function getAllSprocketLabsUsers()
    {
        // Get all Sprocket Labs User
        $users = User::all();
        return $users;
    }

    public function create(Request $request)
    {
        //
        $data = $request->all();
        $username['email'] = User::select('email')
        ->where('email', "=", $data['email'])
        ->get();

        if(count($username['email']) != 0){
            return response()->json(['message' => 'email is already exist.']);
        }
        else{
            $data["password"] = bcrypt($data['password']);
            $new_user = User::create($data);
            if($new_user){
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

    public function getInfoByEmail($email)
    {
        // Retrieve a User Information using Email
        $user = User::where('email', $email)->first();
        return $user;
    }

    
    public function edit(Request $request)
    {
        //
        $data = $request->all();
        $update_user = User::where('email', '=', $data['email'])->update($data);
        return $update_user;
    }

    
    public function update(Request $request, $id)
    {

        
    }

    public function destroy($id)
    {
        //
    }
}
