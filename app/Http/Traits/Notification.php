<?php

namespace App\Http\Traits;

use App\Models\User;
use App\Models\NotificationUser;
use Log;

trait Notification
{
    public function send($to, $title, $message)
    {
        NotificationUser::create([
            'user_id' => User::where('device_token', $to)->pluck('id')->first(),
            'title' => $title,
            'body' => $message,
            'type' => 'firebase-notification',
        ]);

        $fields = array(
            'to' => $to,
            'notification' => array(
                'body'   => $message,
                'title'     => $title,
                'subtitle'  => '',
                'tickerText'    => '',
                'vibrate'   => 1,
                'sound'     => 1,
                'largeIcon' => 'large_icon',
                'smallIcon' => 'small_icon',
            ),
            'data' => array(
                'title'  => $title,
                'body' => $message
            )
        );

        return $this->sendPushNotification($fields);
    }

    public function sendNotificationToAllUser($users, $title, $message)
    {   
        foreach ($users as  $user) {
            $this->send($user->device_token, $title, $message);
        }
    }
    private function sendPushNotification($fields)
    {
        $data = json_encode($fields);

        $headers = array('Authorization: key=AAAA1rzU6Yw:APA91bEPGqL4Mn3sMSQqaQgtVLaPYJ2XTdjOGy6B5efW9RpcAf-UkjqytaaQlqVm-3My7wH__b2eDKPtyJGNfGn8AScFLisJ-mlKPVDNLBKV9kPQazKt6ofeO6wQIM7_YhnuxxmgGgcT', 'Content-Type: application/json');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        curl_close($ch);
    }
}
