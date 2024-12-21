@props([
   'name',
   'isChecked' => false,
   'placeholder' => 'Checked'
])

<label class="form-check-label">
   <input 
      name="{{ $name }}" 
      type="checkbox" 
      class="form-check-input" 
      value="1"
      {{ ($isChecked) ? ' checked' : '' }}    
   >
  {{ $placeholder }}
</label>

@error($name)
  <p class="text-danger">{{ $message }}</p>
@enderror