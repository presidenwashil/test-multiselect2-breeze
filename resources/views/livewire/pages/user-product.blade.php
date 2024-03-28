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
                    <form wire:submit.prevent="create">
                        <div wire:ignore>
                            <select wire:model="product" name="product" id="product" class="form-control select2" autocomplete="off" multiple>
                                @foreach($this->products as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @push('scripts')
                            <script>
                                $(document).ready(function() {
                                    $('#product').select2();
                                });

                                Livewire.on('select2.hydrate', () => {
                                    $('#product').select2();
                                });

                                Livewire.on('select2.destroy', () => {
                                    $('#product').select2('destroy');
                                });

                                Livewire.on('select2.clear', () => {
                                    $('#product').val(null).trigger('change');
                                });

                                Livewire.on('select2.set', (name, value) => {
                                    $('#product').val(value).trigger('change');
                                });

                                $('#product').on('change', function (e) {
                                    let data = $(this).val();
                                    @this.set('product', data);
                                });
                            </script>
                        @endpush

                        <x-primary-button>
                            {{ __('Submit') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
