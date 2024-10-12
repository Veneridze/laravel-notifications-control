<?php
namespace Veneridze\NotificationsControl;
use Illuminate\Support\Facades\Notification;
class NotificationsControl {

    public function __construct(readonly array $ways) {}
    /**
     * Summary of getNotifyPreferences
     * @param Notification $notification
     * @return array<string> ways
     */

     public function wayExist(string $way): bool {
        return array_key_exists($way, $this->ways) || in_array($way, $this->ways);
    }
}