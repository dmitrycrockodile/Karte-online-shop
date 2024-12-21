@props([
   'name',
   'placeholder' => "Enter the $name",
   'type' => 'text',
   'isRequired' => false,
   'defaultValue' => '',
])

<input 
   type="{{ $type }}" 
   class="form-control" 
   name="{{ $name }}" 
   placeholder="{{$placeholder}} {{$isRequired ? '*' : ''}}"
   value="{{ $errors->any() ? old($name) : $defaultValue }}"
>
@error($name)
   <p class="text-danger">{{ $message }}</p>
@enderror