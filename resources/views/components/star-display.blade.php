<div class="star-rating">
    @for ($i = 5; $i >= 1; $i--)
    <span class="{{ $i <= $rating ? 'text-yellow-400' : 'text-gray-300' }} text-2xl">★</span>
    @endfor
</div>
