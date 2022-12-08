<div class="notification_template">
    <div class="{{ $notificationType }} notification_type">
        <img src="{{ asset($image_path) }}" alt="notification type icon" style="width: 35px; height: 35px;" />
        <div class="message_container">
            <p class="header_message">{{ $notificationHeader }}</p>
            <p class="message">{{ $notificationMessage }}</p>
        </div>
    </div>
</div>