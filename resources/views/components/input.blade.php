@props(['label' => null, 'name' => null, 'value' => null, 'type' => 'text', 'id' => null, 'options' => []])

@if (array_search(strtolower($type), ['text', 'number', 'date', 'file']) !== false)
    <div class="mb-3">
        <label for="{{ $id ? $id : $name }}"
            class="form-label text-capitalize">{{ $label ? $label : str_replace('_', ' ', $name) }}</label>
        <input type="{{ $type }}" value="{{ old($name, $value) }}" name="{{ $name }}"
            id="{{ $id ? $id : $name }}" class="form-control @error($name) is-invalid @else is-valid @enderror"
            {{ $attributes }}>
        @error($name)
            <div id="{{ $name }}" class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
@elseif(strtolower($type) == 'select')
    <div class="mb-3">
        <label for="{{ $id ? $id : $name }}"
            class="form-label">{{ $label ? $label : str_replace('_', ' ', $name) }}</label>
        <select class="form-select @error($name) is-invalid @else is-valid @enderror" name="{{ $name }}"
            id="{{ $id ? $id : $name }}" {{ $attributes }}>
            <option value="">select {{ strtolower(str_replace('_', ' ', $name)) }}</option>
            @forelse ($options as $option)
                <option value="{{ $option['value'] }}" @selected(old($name, $value) == $option['value'])>{{ $option['key'] }}</option>
            @empty
            @endforelse
        </select>
        @error($name)
            <div id="{{ $name }}" class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
@else
    <div class="mb-3">
        <label for="{{ $name }}"
            class="form-label text-capitalize">{{ $label ? $label : str_replace('_', ' ', $name) }}</label>
        <textarea name="{{ $name }}" id="{{ $id ? $id : $name }}"
            class="form-control @error($name) is-invalid @else is-valid @enderror" {{ $attributes }}>{{ old($name, $value) }}</textarea>
        @error($name)
            <div id="{{ $name }}" class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
@endif
