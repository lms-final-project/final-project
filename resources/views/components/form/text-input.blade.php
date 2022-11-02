@props(['value'])

<input type="text" name="{{$name}}"  @class(['form-control' , 'is-invalid' => $errors->has( $name )]) id="{{$name}}" value="{{ old($name , $value ?? '') }}"  required>
@error($name)
    <span class="invalid-feedback">
        {{ $message }}
    </span>
@enderror
