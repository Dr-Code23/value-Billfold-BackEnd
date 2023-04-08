<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Invoice;
use App\Models\User;
use Carbon\Carbon;


class UserNotify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $today = Carbon::now()->addDays(2)->format('j-n-Y'); // 9/4
        $invoices = Invoice::where('status_value',0)->where("due_date","<=",$today)->get();
        if($invoices->count() >0 && isset($invoices)){
            $users =[];
            foreach($invoices as $invoice){
                $users[] = $invoice->user;
            }
            $devicetoken = [];
            foreach($users as $user){
                if($user->is_active == '1'){
                    $devicetoken[] = $user->device_token;
                }
            }
            $SERVER_API_KEY = 'AAAAkVkFlwY:APA91bFIzO6B-mENxYgu8yVF3FWAuOO8rN70hcxLQgVx1Z0PiBlltlzeN8t13NWhvwFdMMlBBE3dxWlhtAKgdaDL_CKq9gQyK4oi8JGprkqgL2mNhhwwEQdHino_YxleSAE0CEobWefq';
            $data = [
                "registration_ids" => $devicetoken,
                "notification" => [
                    "title" => 'Invoices alert',
                    "body" => 'Please pay the billing price of invoices and subscriptions',
                    ]
                ];

                $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);
    }
}
}
