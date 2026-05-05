<div class="star-rating">
    @for ($i = 5; $i >= 1; $i--)
        <input type="radio" id="star{{ $i }}" name="{{ $name }}" value="{{ $i }}" @if ($i == (int)$rating) checked @endif />
        <label for="star{{ $i }}" title="{{ $i }} estrellas">★</label>
    @endfor
</div>
