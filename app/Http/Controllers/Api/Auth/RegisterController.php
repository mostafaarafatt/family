<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\OtpCode;
use App\Models\User;
use App\Requests\Users\CodeValidation;
use App\Requests\Users\CompleteUserValidation;
use App\Requests\Users\CreateUserValidation;
use App\Requests\Users\LoginUserValidation;
use App\Requests\Users\VerifyPassword;
use App\Requests\Users\VerifyPhone;
use App\Services\UserServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends BaseController
{
    public $userServices;

    public function __construct(UserServices $userServices)
    {
        $this->userServices = $userServices;
    }

    public function register(CreateUserValidation $createUserValidation, Request $request)
    {
        $user = User::where('phone', $request->phone)->first();

        $otpCode = rand(1000, 9999);
        $data = $request->all();
        $data['otpCode'] = $otpCode;

        if ($user && $user->is_checked == 1) {
            return $this->sendResponse(__('Phone already exist'), "failed", 400);
        }

        if ($user && $user->is_checked == 0) {
            $user->update(['otpCode' => $otpCode]);

            $message['user'] = $user;
            $message['token'] = $user->createToken('MyApp')->plainTextToken;

            return $this->sendResponse($message, __('Please enter the code and complete the data'));
        }

        if (!empty($createUserValidation->getErrors())) {
            return response()->json($createUserValidation->getErrors(), 406);
        }

        $user = $this->userServices->createUser($data);

        $message['user'] = $user;
        $message['token'] = $user->createToken('MyApp')->plainTextToken;



        return $this->sendResponse($message, __('Please enter the code and complete the data'));
    }

    public function checkCode(CodeValidation $codeValidation)
    {
        if (!empty($codeValidation->getErrors())) {
            return response()->json($codeValidation->getErrors(), 406);
        }

        $user = User::where('phone', request()->phone)->first();
        $user_code = $user->otpCode;

        if ($user_code == request()->otpCode) {
            $user->update(['is_checked' => '1']);
            // return "verified code";
            return $this->sendResponse($user, "verified code");
        }

        //return "unverified code";
        return $this->sendResponse($user, "unverified code");
    }


    public function completeReqister(CompleteUserValidation $completeUserValidation, Request $request)
    {
        if (!empty($completeUserValidation->getErrors())) {
            return response()->json($completeUserValidation->getErrors(), 406);
        }
        $user = Auth::user();
        $data = $request->all();
        $data['is_completed'] = "1";
        // dd($data);
        $user->update($data);

        return $this->sendResponse($user, __('Data completed succesfully'));
    }

    public function login(LoginUserValidation $loginUserValidation)
    {
        if (!empty($loginUserValidation->getErrors())) {
            return response()->json($loginUserValidation->getErrors(), 406);
        }


        $credentials = $loginUserValidation->request()->only('phone', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->is_checked == '0') {
                return $this->sendResponse(__('Please go back and enter the code'), 'failed', 404);
            }

            if ($user->is_active == '0') {
                return $this->sendResponse(__('This user is not active, please contact support'), '400', 400);
            }


            if ($user->getFirstMedia('userimage')) {
                $image = $user->getFirstMedia('userimage');
            } else {
                $image = null;
            }
            $user_image = $user->avatar;
            $user->user_image = $user_image;

            $success['user'] = $user;
            $success['token'] = $user->createToken('MyApp')->plainTextToken;

            //return new UserResource($user);
            return $this->sendResponse($success, "User login successfully");
        }


        return $this->sendResponse(__('The phone or password is incorrect'), "failed", 401);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return $this->sendResponse("User logout successfully");
    }

    public function forgetPassword(VerifyPhone $verifyPhone, Request $request)
    {
        //هنا هيبعت الكود
        if (!empty($verifyPhone->getErrors())) {
            return response()->json($verifyPhone->getErrors(), 406);
        }

        $user = User::where('phone', $request->phone)->first();
        if (!$user) {
            // return "user not found";
            return $this->sendResponse("user not found", "failed", 404);
        }

        // send sms

        $new_otpCode = rand(1000, 9999);
        $user->update(['otpCode' => $new_otpCode]);

        return $this->sendResponse($new_otpCode, "success");
        //return response()->json($new_otpCode);
    }

    public function verifyCode(CodeValidation $codeValidation, Request $request)
    {
        if (!empty($codeValidation->getErrors())) {
            return response()->json($codeValidation->getErrors(), 406);
        }

        $user = User::where('phone', $request->phone)->first();
        $otpCode = $user->otpCode;

        if ($otpCode == $request->otpCode) {
            //return "true";
            return $this->sendResponse("verified code");
        }

        return $this->sendResponse("unverified code", "failed", 404);
    }

    public function setNewPassword(VerifyPassword $verifyPassword, Request $request)
    {
        if (!empty($verifyPassword->getErrors())) {
            return response()->json($verifyPassword->getErrors(), 406);
        }

        $user = User::where('phone', $request->phone)->first();
        if (!$user) {
            return $this->sendResponse("user not found", "failed", 404);
        }

        $hashedPass = Hash::make($request->password);
        $user->update(['password' => $hashedPass]);

        return $this->sendResponse("changed password success");
    }

    public function deleteAccount()
    {
        $user = Auth::user();
        $deleted = $user->delete();
        if ($deleted) {
            return $this->sendResponse("user account deleted");
        }
    }

    public function getAllNationalities()
    {
        if (app()->getLocale() == 'ar') {
            return response()->json([
                'data' => array_values(config('nationalities'))
            ]);
        } else {
            return response()->json([
                'data' => array_keys(config('nationalities'))
            ]);
        }
    }
}
