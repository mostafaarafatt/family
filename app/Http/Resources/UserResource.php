<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            "id" => $this->id,
            "fname" => $this->fname,
            "mname" => $this->mname,
            "lname" => $this->lname,
            "gender" => $this->gender,
            "phone" => $this->phone,
            "otpCode" => $this->otpCode,
            "email" => $this->email,
            "email_verified_at" => $this->email_verified_at,
            "address" => $this->address,
            "nickName" => $this->nickName,
            "dateOfBirth" => $this->dateOfBirth,
            "nationality" => $this->nationality,
            "passport" => $this->passport,
            "endPassportDate" => $this->endPassportDate,
            "is_checked" => $this->is_checked,
            "is_completed" => $this->is_completed,
            "is_active" => $this->is_active,
            "user_image" => $this->when($request->user()->getFirstMedia('userimage'), function () {
                return $this->avatar;
            }),
            "meta" => [
                "token" => $this->createToken('MyApp')->plainTextToken,
                "status" => 'user login successfully'
            ]
        ];
    }
}
