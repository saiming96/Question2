<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Currency;
use Illuminate\Support\Facades\Http;

use Livewire\Component;

class Test extends Component
{
    public $domain = 'https://free.currconv.com/api/v7/convert';
    public $api_key = '31240f3444f0f53f3964';
    public $amount = 1;
    public $converted_amount;
    public $spot_rate = '';
    public $reverse_spot_rate = '';
    public $from_usd = true;
    public $currency_from = 'USD';
    public $currency_to = 'MYR';
    public $currency_conversion_types = [
        'USD_MYR',
        'MYR_USD',
        'USD_EUR',
        'EUR_USD',
    ];

    public function mount()
    {
        foreach ($this->currency_conversion_types as $currency_conversion) {
            if (Currency::where('currency_conversion', $currency_conversion)->whereDate('updated_at', Carbon::today())->count() == 0) {
                $query = $this->getQuery($currency_conversion);
                $response = Http::get($this->domain . $query); 

                $currency = Currency::updateOrCreate([
                    'currency_conversion' => $currency_conversion
                ], [
                    'spot_rate' => $response->json()[$currency_conversion],
                    'updated_at' => Carbon::now(),
                ]);
            }
        }

        $this->getRate();
    }

    protected function getQuery($currency_conversion)
    {
        $query = '?q=' . $currency_conversion . '&compact=ultra&apiKey=' . $this->api_key;
        return $query;
    }

    public function convert()
    {
        if ($this->from_usd) {
            $this->currency_from = $this->currency_to;
            $this->currency_to = 'USD';

            //get rate
            $this->getRate();
            $this->from_usd = false;
        } else {
            $this->currency_to = $this->currency_from;
            $this->currency_from = 'USD';

            //get rate
            $this->getRate();
            $this->from_usd = true;
        }
    }

    public function getRate()
    {
        $temp_conversion_rate = $this->currency_from . '_' . $this->currency_to;
        $temp_reversion_conversion_rate = $this->currency_to . '_' . $this->currency_from;
        $this->spot_rate = Currency::where('currency_conversion', $temp_conversion_rate)->first()->spot_rate;
        $this->reverse_spot_rate = Currency::where('currency_conversion', $temp_reversion_conversion_rate)->first()->spot_rate;
        $this->getConvertedAmount();
    }

    public function updatedAmount()
    {
        $this->getConvertedAmount();
    }

    public function getConvertedAmount()
    {
        $this->converted_amount = $this->amount * $this->spot_rate;
    }
    
    public function render()
    {
        return view('livewire.test');
    }
}
