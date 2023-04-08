<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Invoice;
use App\Models\User;
use Carbon\Carbon;

class BlockUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Block:user';

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
        $today = Carbon::now()->subDays(1)->format('j-n-Y'); // 9/4
        $invoices = Invoice::where('status_value',0)->where("due_date",$today)->get();
        if($invoices->count() >0 && isset($invoices)){
        $users =[];
        foreach($invoices as $invoice){
            $users[] = $invoice->user;
        }
       foreach($users as $user){
        $user->is_active = '0';
        $user->save();
       }
    }
}
}
