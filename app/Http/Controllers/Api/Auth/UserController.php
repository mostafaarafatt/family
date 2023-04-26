<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserPasswordRequest;
use App\Http\Requests\UserProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class UserController extends BaseController
{
    public function updateProfile(UserProfileRequest $request)
    {
        $user =  auth('sanctum')->user();

        if (!$user) {
            return $this->sendResponse('User not found', 'failed', 404);
        }
        $requestImage = $request->image;
        if ($requestImage) {
            $user->clearMediaCollection('userimage');
            $user->addMediaFromRequest('image')->toMediaCollection('userimage');
        }

        //call the getAvatarAttribute method from User model
        $user_image = $user->avatar;

        $keys = [
            'fname',
            'email',
            'phone',
            'gender',
            'address',
            'nickName',
            'lname',
            'mname',
            'dateOfBirth',
            'nationality',
            'passport',
            'endPassportDate'
        ];
        foreach ($keys as $key) {
            if ($request->hasAny($key)) {
                $user->update([
                    $key => $request->$key
                ]);
            }
        }

        // add user_image proberty to $user object
        $user->user_image =  $user_image;

        return $this->sendResponse(['message' => 'profile updated successfully', 'user' => $user,]);
    }

    public function changePassword(UserPasswordRequest $request)
    {
        $user =  auth('sanctum')->user();
        // dd($user);
        if (Hash::check($request->old_password, $user->password)) {
            $user->update([
                'password' => bcrypt($request->new_password)
            ]);
        } else {
            return $this->sendResponse('The old password is wrong', 'faild', 404);
        }

        return $this->sendResponse('password updated successfully');
    }
}
