@props([
   'name',
   'src' => null,
   'label' => 'Choose first image',
   'alt' => 'Images',
   'isSet' => false,
   'errorName' => null,
])

<div class="custom-file">
   <input name="{{ $name }}" type="file" class="custom-file-input" id="{{ $name }}">
   <label class="custom-file-label" for="{{ $name }}">{{ $label }}</label>
</div>

@if ($isSet)
   <div class="w-50 mt-2">
      <img src="{{ $src }}" alt="{{ $alt }}" class="w-50" />
   </div>
@endif

@error($errorName)
   <p class="text-danger">{{ $message }}</p>
@enderror