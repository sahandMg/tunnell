<?php

namespace App\Console\Commands;

use App\Notifications\ChargeRemindeMailNotification;
use App\Notifications\ServiceTurnOffMailNotification;
use App\Wallet;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckWalletCharge extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:charge';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reduce Users wallet charge based on their active tokens';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     * Runs an hour
     * Check how many active tokens does the user have
     * Then calculate daily cost based on active tokens
     * Subtract daily cost from his wallet charge
     * If Wallet charge gets 0 or less values the disable all of his tokens
     * Send An Email to user for recharge Wallet
     * Disabling User Service (tokens_disabled in users table)
     */
    public function handle()
    {

        $wallets = Wallet::with('user')->get();

        foreach ($wallets as $wallet){

            $userTokens = $wallet->user->tokens;

            if(!is_null($userTokens)){

                $dailyCostForUser = $wallet->user->tokens->where('status',1)->count() * env('DAILY_COST');

                $wallet->update(['charge'=> $wallet->charge - $dailyCostForUser]);

                if($wallet->charge < env('DAILY_COST')*3 && $wallet->charge > 0){

                    $wallet->user->notify(new ChargeRemindeMailNotification($wallet));
                }
                if($wallet->charge <= 0){

                    $userTokens = $wallet->user->tokens;

                    $wallet->user->update(['tokens_disabled'=>1]);

                    foreach ($userTokens as $token){

                        $token->update(['status' => 0]);
                    }

                    $wallet->user->notify(new ServiceTurnOffMailNotification($wallet));
                }
            }
        }
    }
}
