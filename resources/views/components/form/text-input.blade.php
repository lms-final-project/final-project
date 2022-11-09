@props(['value' , 'placeholder'])

<input type="text" name="{{$name}}" placeholder="{{ $placeholder ?? '' }}"  @class(['form-control' , 'is-invalid' => $errors->has( $name )]) id="{{$name}}" value="{{ old($name , $value ?? '') }}"  required>
@error($name)
    <span class="invalid-feedback">
        {{ $message }}
    </span>
@enderror
