<?php

namespace App\View\Components;

use Illuminate\View\Component;

class articleTemplate extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $imagePath,
        public string $imageAlternative,
        public string $authorID,
        public int $id,
        public string $title,
        public string $excerpt,
        public string $articleCreatedAt
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.article-template');
    }
}
