@props([
   'name',
   'defaultText' => 'Select an attribute',
   'values' => [],
   'selectedValue' => null,
   'class' => '',
   'multiple' => false,
   'isRequired' => false,
])

<select 
   name="{{ $name }}" 
   class="form-control {{ $class }}"  
   data-placeholder="{{ $multiple ? $defaultText . ($isRequired ? ' *' : '') : '' }}" 
   style="width: 100%;" 
   @if ($multiple) multiple @endif
>
   @if (!$multiple) <option selected="selected" disabled>{{ $defaultText }} {{$isRequired ? '*' : ''}}</option> @endif
    @foreach ($values as $value)
        <option 
            value="{{ $value->id }}"
            @if (!$multiple) 
               {{ $value->id == ($errors->any() ? old($name) : $selectedValue) ? ' selected' : '' }}
            @elseif ($multiple && $selectedValue) 
               {{ is_array($selectedValue->pluck('id')->toArray()) && in_array($value->id, $selectedValue->pluck('id')->toArray()) ? ' selected' : '' }}  
            @else
               {{ old($class) && in_array($value->id, old($class)) ? ' selected' : '' }}
            @endif
        >{{ $value->title }}</option>
    @endforeach
</select>

@error($name)
   <p class="text-danger">{{ $message }}</p>
@enderror