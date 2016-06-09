<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Role;
use App\User;
use Exception;
use HttpResponse;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthenticationController extends Controller
{

    public function register(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'email' => 'required|email', 'password' => 'required']);


//        try {
//            // verify the credentials and create a token for the user
//            $credentials = array(
//                'email' => $request['email'],
//                'password' =>$request['password']
//            );
//            if (! $token = JWTAuth::attempt($credentials)) {
//                return response()->json(['error' => 'invalid_credentials'], 401);
//            }
//        } catch (JWTException $e) {
//            // something went wrong
//            return response()->json(['error' => 'could_not_create_token'], 500);
//        }

        try {
            $user = new User();
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->password = bcrypt($request['password']);
            $user->save();

            $user->roles()->attach(Role::where('role', $request['role'])->first());
            $user->grades()->attach(Grade::find($request['grade_id']));
        } catch (Exception $e) {
            return Response::json(['error' => 'User already exists.'], HttpResponse::HTTP_CONFLICT);
        }
        $credentials = array(
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password,
            'roles' => [$user->roles]
        );
        $token = JWTAuth::fromUser($user, $credentials);


        return response()->json(['_token' => $token]);
    }

//    public function login(Request $request)
//    {
//        try {
//            // verify the credentials and create a token for the user
//            $credentials = array(
//                'email' => $request['email'],
//                'password' => $request['password']
//            );
//            if (! $token = JWTAuth::attempt($credentials)) {
//                return response()->json(['error' => 'invalid_credentials'], 401);
//            }
//        } catch (JWTException $e) {
//            // something went wrong
//            return response()->json(['error' => 'could_not_create_token'], 500);
//        }
//
//        // if no errors are encountered we can return a JWT
//        return response()->json(['_token' => $token]);
//
//    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        // if no errors are encountered we can return a JWT
        
        $user = User::where('email', $request['email'])->first();
        $userdata = array(
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password,
            'roles' => [$user->roles]
        );
        $foxToken = JWTAuth::fromUser($user, $userdata);
        return response()->json(['token' => $foxToken]);
    }
    /**
     * Return the authenticated user
     *
     * @return Response
     */
    public function getAuthenticatedUser()
    {
        $token = JWTAuth::getToken();
        $user = JWTAuth::toUser($token);

        return Response::json([
            'data' => [
                'email' => $user->email,
                'registered_at' => $user->created_at->toDateTimeString()
            ]
        ]);
    }

}
