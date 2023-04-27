<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\Auth\CodeValidation;
use App\Http\Requests\Auth\LoginUserValidation;
use App\Http\Requests\Auth\RegisterValidation;
use App\Http\Requests\Auth\VerifyEmail;
use App\Http\Requests\Auth\VerifyPassword;
use App\Mail\SendOptCode;
use App\Models\User;
use App\Services\UserServices;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends BaseController
{
    public $userServices;

    public function __construct(UserServices $userServices)
    {
        $this->userServices = $userServices;
    }

    public function register(RegisterValidation $request)
    {
        $user = User::where('email', $request->email)->first();

        $otpCode = rand(1000, 9999);
        $data = $request->except(['password_confirmation']);
        $data['otpCode'] = $otpCode;

        if ($user && $user->is_checked == 1) {
            return $this->sendResponse(__('email already exist'), "failed", 400);
        }

        if ($user && $user->is_checked == 0) {
            $user->update(['otpCode' => $otpCode]);

            $message['user'] = $user;
            $message['token'] = $user->createToken('MyApp')->plainTextToken;

            Mail::to($request->email)->send(new SendOptCode($otpCode));

            return $this->sendResponse($message, __('Please enter the code to complete the registration process'));
        }

        $user = $this->userServices->createUser($data);

        $message['user'] = $user;
        $message['token'] = $user->createToken('MyApp')->plainTextToken;

        Mail::to($request->email)->send(new SendOptCode($otpCode, "Your OtpCode used to complete the register oreration"));

        return $this->sendResponse($message, __('Please enter the code'));
    }

    public function checkCode(CodeValidation $request)
    {
        $user = User::where('email', $request->email)->first();
        $user_code = $user->otpCode;

        if ($user_code == $request->otpCode) {
            $user->update(['is_checked' => '1']);
            return $this->sendResponse($user, "verified code");
        }

        return $this->sendResponse($user, "unverified code");
    }

    public function resendCode(VerifyEmail $request)
    {
        $user = User::where('email', $request->email)->first();

        $otpCode = rand(1000, 9999);

        if ($user && $user->is_checked == 1) {
            return $this->sendResponse(__('email already exist'), "failed", 400);
        }

        if ($user && $user->is_checked == 0) {
            $user->update(['otpCode' => $otpCode]);

            $message['otpCode'] = $otpCode;

            Mail::to($request->email)->send(new SendOptCode($otpCode));

            return $this->sendResponse($message, __('Please enter the code to complete the registration process'));
        }

        return $this->sendResponse(__('This email not exits'),'faild',404);
    }

    // public function completeReqister(CompleteUserValidation $completeUserValidation, Request $request)
    // {
    //     if (!empty($completeUserValidation->getErrors())) {
    //         return response()->json($completeUserValidation->getErrors(), 406);
    //     }
    //     $user = Auth::user();
    //     $data = $request->all();
    //     $data['is_completed'] = "1";
    //     // dd($data);
    //     $user->update($data);

    //     return $this->sendResponse($user, __('Data completed succesfully'));
    // }

    public function login(LoginUserValidation $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->is_checked == '0') {
                return $this->sendResponse(__('Please go back and enter the code'), 'failed', 404);
            }

            if ($user->is_active == '0') {
                return $this->sendResponse(__('This user is not active, please contact support'), '400', 400);
            }

            $success['user'] = $user;
            $success['token'] = $user->createToken('MyApp')->plainTextToken;

            return $this->sendResponse($success, "User login successfully");
        }

        return $this->sendResponse(__('The phone or password is incorrect'), "failed", 401);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return $this->sendResponse("User logout successfully");
    }

    public function forgetPassword(VerifyEmail $request)
    {
        //هنا هيبعت الكود
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return $this->sendResponse("user not found", "failed", 404);
        }

        // send email code

        $new_otpCode = rand(1000, 9999);
        $user->update(['otpCode' => $new_otpCode]);

        return $this->sendResponse($new_otpCode, "success");
        //return response()->json($new_otpCode);
    }

    public function verifyCode(CodeValidation $request)
    {
        $user = User::where('email', $request->email)->first();
        $otpCode = $user->otpCode;

        if ($otpCode == $request->otpCode) {
            return $this->sendResponse("verified code");
        }

        return $this->sendResponse("unverified code", "failed", 404);
    }

    public function setNewPassword(VerifyPassword $request)
    {
        $user = User::where('email', $request->email)->first();
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
