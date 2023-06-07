<div class="country-city">
        <select name="country" id="country">
            <option value="">Select Country</option>
            @foreach ($countries as $country)
            <option value="{{ $country->name }}" @if(old('country')==$country->id) selected @endif>{{ $country->name }}</option>
            @endforeach
        </select>
    @error('country')
    <div class="error-message" style="color: red;">{{$message}}</div>
    @enderror
        <select name="city" id="city">
            <option value="">select city</option>
        </select>
    @error('city')
    <div class="error-message" style="color: red;">{{$message}}</div>
    @enderror
</div>