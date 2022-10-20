<input type="number" step=".01" name="{{$name}}" @class(['form-control' , 'is-invalid' => $errors->has( $name )]) id="{{$name}}" value="{{ old($name) }}"  required>
@error($name)
    <span class="invalid-feedback">
        {{ $message }}
    </span>
@enderror
