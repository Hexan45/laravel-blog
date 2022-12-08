<?php

namespace App\View\Components;

use Illuminate\View\Component;

class notificationTemplate extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    const NOTIFICATION_TYPES = [
        'notice' => 'info-svg.svg',
        'warning' => 'error-svg.svg',
        'success' => 'success-svg.svg'
    ];
    
    public string $image_path;
    
    public function __construct(
        public string $notificationType,
        public string $notificationHeader,
        public string $notificationMessage,
    ){
        $this->image_path = asset('images/' . self::NOTIFICATION_TYPES[$this->notificationType]);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.notification-template');
    }
}
