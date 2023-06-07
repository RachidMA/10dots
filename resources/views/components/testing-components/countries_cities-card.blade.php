<div class="country-city">
    <div>
        <select name="country" id="country">
            <option value="">Select Country</option>
            @foreach ($countries as $country)
            <option value="{{ $country->name }}" @if(old('country')==$country->id) selected @endif>{{ $country->name }}</option>
            @endforeach
        </select>
    </div>
    @error('country')
    <div class="error-message" style="color: red;">{{$message}}</div>
    @enderror
    <div>
        <select name="city" id="city">
            <option value="">select city</option>
        </select>
    </div>
    @error('city')
    <div class="error-message" style="color: red;">{{$message}}</div>
    @enderror
</div>