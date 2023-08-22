<?php

namespace App\Http\Livewire\V2\HomeTabs;

use Illuminate\Support\Collection;
use Livewire\Component;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redis;

class Comparison extends Component
{
    public $loading = false;
    public $info;
    public $account_info;
    public $treasury_info;
    public $equipment_info;
    public $digital_info;
    public $other_loan_info;
    public $mortage_loan;
    public $currAccount;
    public $currAccount_labels;
    public $currAccountServices;
    public $fixedTermAccount;
    public $savingAccount;
    public $ebanking_data;
    public $credit;
    public $debit;



    public function mount()
    {
        $this->loading = true;
        $this->info = $this->iworkers_data();
        $this->treasury_info = $this->treasury_data();
        $this->equipment_info = $this->equipment_data();
        $this->digital_info = $this->digital_data();
        $this->other_loan_info = $this->other_loans();
        $this->mortage_loan = $this->mortageLoan();
        $this->currAccount_labels = $this->currAccounts_data_labels();
        $this->currAccountServices = $this->currAccounts_data_services();
        $this->currAccount = $this->CurrAccount();
        $this->fixedTermAccount = $this->fixedAccount();
        $this->savingAccount = $this->savingAccount();
        $this->ebanking_data = $this->ebanking();
        $this->credit = $this->creditCard();
        $this->debit = $this->debitCard();
    }

    public function filterSearch($filter)
    {
        $this->filter = $filter;
    }

    public function render()
    {
        return view('livewire.v2.home-tabs.comparison');
    }

    private function iworkers_data()
    {
        $cached = Redis::get('iworkerLoan');
        if ($cached) {
            $this->loading = false;
            return json_decode($cached);
        }
    }

    private function mortageLoan()
    {
        $cached = Redis::get('mortageLoan');
        if ($cached) {
            $this->loading = false;
            return json_decode($cached);
        }
    }

    private function treasury_data()
    {
        $cached = Redis::get('treasuryLoan');
        if ($cached) {
            $this->loading = false;
            return json_decode($cached);
        }
    }

    public function equipment_data()
    {
        $cached = Redis::get('equipmentLoan');
        if ($cached) {
            $this->loading = false;
            return json_decode($cached);
        }
    }

    public function other_loans()
    {
        $cached = Redis::get('otherLoan');
        if ($cached) {
            $this->loading = false;
            return json_decode($cached);
        }
    }

    public function digital_data()
    {
        $cached = Redis::get('digitalLoan');
        if ($cached) {
            $this->loading = false;
            return json_decode($cached);
        }
    }

    private function currAccounts_data_labels()
    {
        $cached_labels = Redis::get('currentAccount_labels');

        if ($cached_labels) {
            $this->loading = false;
            return json_decode($cached_labels);
        }
    }

    public function currAccounts_data_services()
    {
        $cached = Redis::get('currentAccount_services');
        if ($cached) {
            $this->loading = false;
            return json_decode($cached);
        }
    }

    public function CurrAccount()
    {
        $cached = Redis::get('currentAccount');
        if ($cached) {
            $this->loading = false;
            return json_decode($cached);
        }
    }

    public function fixedAccount()
    {
        $cached = Redis::get('fixedTermAccount');
        if ($cached) {
            $this->loading = false;
            return json_decode($cached);
        }
    }

    public function savingAccount()
    {
        $cached = Redis::get('savingsAccount');
        if ($cached) {
            $this->loading = false;
            return json_decode($cached);
        }
    }

    public function ebanking()
    {
        $cached = Redis::get('ebanking');
        if ($cached) {
            $this->loading = false;
            return json_decode($cached);
        }
    }

    public function creditCard()
    {
        $cached = Redis::get('creditCard');
        if ($cached) {
            $this->loading = false;
            return json_decode($cached);
        }
    }

    public function debitCard()
    {
        $cached = Redis::get('debitCard');
        if ($cached) {
            $this->loading = false;
            return json_decode($cached);
        }
    }
}
