<div>
    <div class="pt-8">
        <div class="inline-block px-4">
            <label for="amount" class="block text-sm font-medium text-gray-700">
                Amount
            </label>
            <div class="mt-1">
                <input type="number" wire:model="amount" name="amount" id="amount" autocomplete="amount" class="custom-number shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
            </div>
        </div>

        <div class="inline-block px-4">
            <label for="currency_from" class="block text-sm font-medium text-gray-700">
                From
            </label>
            <div class="mt-1">
                <select wire:model="currency_from" id="currency_from" name="currency_from" autocomplete="currency_from" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                    @if($from_usd)
                    <option>USD</option>
                    @else
                    <option>MYR</option>
                    <option>EUR</option>
                    @endif
                </select>
            </div>
        </div>

        <div class="inline-block px-4">
            <button wire:click="convert">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M8 5a1 1 0 100 2h5.586l-1.293 1.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L13.586 5H8zM12 15a1 1 0 100-2H6.414l1.293-1.293a1 1 0 10-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L6.414 15H12z" />
                </svg>
            </button>
        </div>

        <div class="inline-block px-4">
            <label for="to" class="block text-sm font-medium text-gray-700">
                To
            </label>
            <div class="mt-1">
                <select wire:model="currency_to" id="to" name="to" autocomplete="to" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                    @if($from_usd)
                    <option>MYR</option>
                    <option>EUR</option>
                    @else
                    <option>USD</option>
                    @endif
                </select>
            </div>
        </div>
    </div>
    <div class="pt-8 text-center">
        <p>{{ $amount }} {{ $currency_from }} = </p>
        <p class="text-5xl font-semibold">{{ $converted_amount }} {{ $currency_to }}</p>
        <p>1 {{ $currency_from }} = {{ $this->spot_rate }} {{ $currency_to }}</p>
        <p>1 {{ $currency_to }} = {{ $reverse_spot_rate }} {{ $currency_from }}</p>
    </div>
</div>
