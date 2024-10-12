<?php
namespace Veneridze\NotificationsControl\Validation;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\App;
use Veneridze\NotificationsControl\NotificationsControl;
class WayExist implements ValidationRule {

    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!App::make(NotificationsControl::class)->wayExist($value) ($this->$value)) {
            $fail("Канал уведомлений {$value} не существует");
        }
    }

    
}