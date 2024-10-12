<?php
namespace Veneridze\NotificationsControl;
class NotificationsControl {

    public function __construct(private array $ways) {}
    /**
     * Summary of getNotifyPreferences
     * @param Notification $notification
     * @return array<string> ways
     */

     public function wayExist(string $way): bool {
        return array_key_exists($way, $this->ways) || in_array($way, $this->ways);
    }
}