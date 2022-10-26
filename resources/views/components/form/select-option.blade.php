@props(['value'])

<select id="{{$name}}" name="{{$name}}" class="form-select form-select-sm" required>
    <option selected disabled>Open to pick one</option>
    @foreach ($options as $option)
        <option value="{{ $option->id }}" @selected(old($name ,$value ?? '' ) == $option->id)>{{ $option->name }}</option>
    @endforeach
</select>
@error($name)
    <span class="text-danger text-sm">
        {{ $message }}
    </span>
@enderror
