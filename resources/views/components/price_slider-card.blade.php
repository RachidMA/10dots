@props(['job', 'city'])

<form action="{{route('price-range', ['job'=>$job, 'city'=>$city])}}" method="POST">
    @csrf
    <div class="wrapper-price">
        <div class="price-input">
            <div class="field">
                <span>Min</span>
                <input type="number" class="input-min" name="min_price" value="10" min="10" max="500" step="10">
            </div>
            <div class="separator">-</div>
            <div class="field">
                <span>Max</span>
                <input type="number" class="input-max" name="max_price" value="500" min="10" max="500" step="10">
            </div>
        </div>
        <div class="slider">
            <div class="progress"></div>
        </div>
        <div class="range-input">
            <input type="range" class="range-min" min="10" max="500" step="10" value="0">
            <input type="range" class="range-max" min="10" max="500" step="10" value="500">
        </div>
        <div class="apply-button">
            <button type="submit">Apply</button>
        </div>

    </div>
</form>