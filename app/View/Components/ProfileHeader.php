<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\User;

class ProfileHeader extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(

        public User $user,
        public bool $isFollowing = false,
        public bool $isOwner = false,
        public int $readCount = 0,
        public int $readingCount = 0,
        public int $wantToReadCount = 0,

    )
    {
        //

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.profile-header');
    }
}
