<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form wire:submit.prevent="create" class="select2">
                        <x-select2 id="selectedProduct" name="selectedProduct" model="selectedProduct" :livewire="true" :placeholder="__('Select Product')" />
                        <x-primary-button>
                            {{ __('Submit') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>