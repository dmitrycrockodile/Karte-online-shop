@props([
   'name',
   'rows' => 3,
   'placeholder' => "Enter $name",
   'isRequired' => false,  
   'defaultValue' => ''
])

<textarea 
   class="form-control" 
   rows="{{ $rows }}" 
   name="{{ $name }}" 
   placeholder="{{ $placeholder }} {{ $isRequired ? '*' : '' }}"
>{{ $errors->any() ? old($name) : $defaultValue }}</textarea>
@error($name)
   <p class="text-danger">{{ $message }}</p>
@enderror