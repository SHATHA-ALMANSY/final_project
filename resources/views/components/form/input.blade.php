
@props([
    'id' , 'name' , 'type'=>'text' , 'value'=>'' , 'label'=>''
    ])

    @if($label)
<label for="{{ $id }}" class="from-label">{{ $label }}</label>
     @endif
    <input type="{{ $type }}" 
    name="{{ $name }}" 
    id="{{ $id }}" value="{{ old( $name , $value ) }}"
       {{ $attributes->class(['form-control' , 'is-invalid' => $errors->has($name)]) }} >
    <!-- @error($name)
     <p class="invalid-feedback">{{ $message }}</p>
    @enderror  -->

    <x-form.error :name="$name" />