<?php
namespace Veneridze\NotificationsControl\Traits;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\App;
use Veneridze\ModelTypes\Exceptions\WrongWay;
use Veneridze\NotificationsControl\NotificationsControl;
trait HasNotificationPreferences {
    /**
     * Summary of canNotify
     * @param Notification $notification
     * @param string $way
     * @return bool
     */

    private function getUserNotifications(): array {
        if(is_null($this->notificationPreferences) || is_string($this->notificationPreferences)) {
            return [];
        } else {
            return $this->notificationPreferences;
        }
    }

    public function canNotify(Notification $notification, string $way = null): bool {
        if(!App::make(NotificationsControl::class)->wayExist($way)) {
            throw new WrongWay("Канал уведомлений {$way} не существует");
        }
        $notifications = $this->getUserNotifications();
        return array_key_exists($notification::class, $notifications) 
        && ($way ? in_array($way, $notifications[$notification::class]) : count($notifications[$notification::class]) > 0);
    }
    /**
     * Summary of setNotifyPreferences
     * @param Notification $notification
     * @param array<string> $ways
     * @return void
     */
    public function setNotifyPreferences(Notification $notification, array $ways): void {
        foreach ($ways as $way) {
            if(!App::make(NotificationsControl::class)->wayExist($way)) {
                throw new WrongWay("Канал уведомлений {$way} не существует");
            }
        }

        $this->update([
            'notificationPreferences' => [
                ...$this->getUserNotifications(),
                ...[
                    $notification::class => $ways
                ]
            ]
        ]);
    }

    public function getNotifyPreferences(Notification $notification): array {
        $notifications = $this->getUserNotifications();
        return array_key_exists($notification::class, $notifications) ?  $notifications[$notification::class] : [];
        //&& count($notifications[$notification::class]) //in_array($way, $this->getUserNotifications()[$notification::class]);
    }
}