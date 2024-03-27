@props([
    'id',
    'name' => null,
    'model' => null,
    'options' => [],
    'placeholder' => null,
    'showKey' => false,
    'width' => 'max-content',
])

@php
    if (! $options instanceof \Illuminate\Support\Collection) {
        $options = collect($options);
    }

    $livewire = !is_null($model);

    $isList = $options->isList();
    
    $options = $options
        ->when($isList, fn ($c) => $c->mapWithKeys(fn ($v, $k) => [$v => $v]))
        ->when($showKey, fn ($c) => $c->mapWithKeys(fn ($v, $k) => [$k => "{$k} - {$v}"]));

    $styles = [
        'max-content' => ['style' => 'width: max-content'],
        'full-width' => ['style' => 'width: 100%'],
    ];
@endphp

@push('css')
    @once
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
        <style>
            .select2-container .select2-selection--single {
                height: 35px;
            }

            .select2-container--default .select2-selection--single .select2-selection__rendered {
                line-height: 35px;
            }

            .select2-container--default .select2-selection--single .select2-selection__arrow {
                height: 35px;
            }
        </style>
    @endonce
@endpush
@push('js')
    @once
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    @endonce
    <script>
        window.select2 = () => {
            $('select#{{ $id }}').select2({
                dropdownCssClass: 'text-sm px-0',
            }).on('change', () => {
                let data = $('select#{{ $id }}').select2("val")

                @if ($livewire)
                    @this.set('{{ $model }}', data, true)
                @endif
            })
        }

        @if ($livewire)
            $(document).on('livewire:load', () => {
                select2()

                Livewire.on('select2.hydrate', () => {
                    select2()
                })
            })
        @endif
    </script>
@endpush

<div wire:ignore {{ $attributes
    ->only('class')
    ->merge($styles[$width])
}}>
    <select @if($livewire) wire:model.live="{{ $model }}" @endif id="{{ $id }}" name="{{ $name }}" class="form-control form-control-sm simple-select2-sm input-sm" autocomplete="off">
        @if ($placeholder)
            <option disabled {{ $options->has($this->$model) ? null : 'selected' }}>{{ $placeholder }}</option>
        @endif
        @foreach ($options->all() as $key => $value)
            <option value="{{ $key }}" {{ $this->$model === $key ? 'selected' : null }}>{{ $value }}</option>
        @endforeach
    </select>
</div>
