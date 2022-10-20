<textarea name="{{$name}}" id="{{$name}}" @class(['form-control' , 'is-invalid' => $errors->has( $name )]) required>
    {{ old($name) }}
</textarea>
@error($name)
    <span class="invalid-feedback">
        {{ $message }}
    </span>
@enderror
