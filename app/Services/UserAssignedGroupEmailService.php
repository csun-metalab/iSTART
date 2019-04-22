<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use App\Mail\GenericEmail;
use App\Contracts\UserAssignedGroupEmailContract;
use App\Http\Controllers\UserGroupController;
use App\Models\UserGroup;
use App\Models\Participant;

class UserAssignedGroupEmailService implements UserAssignedGroupEmailContract
{
    public function sendMail()
    {
        $user = auth()->user();
        $userGroup = UserGroup::find($user['user_id']);
        $participantID = Participant::find($user['user_id']);
        $genericEmail = new \stdClass();
        $genericEmail->user_group = $userGroup['user_group'];
        $genericEmail->participant_id = $participantID['participant_id'];
        Mail::to((env('RECIEVE_EMAIL')))->send(new GenericEmail($genericEmail));

        return true;
    }

}