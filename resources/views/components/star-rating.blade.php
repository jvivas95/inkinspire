<div class="star-rating">
    <!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->
    @for ($i = 5; $i >= 1; $i--)
        <input type="radio" id="star{{ $i }}" name="{{ $name }}" value="{{ $i }}" @if ($i == (int)$rating) checked @endif />
        <label for="star{{ $i }}" title="{{ $i }} estrellas">★</label>
    @endfor
</div>
