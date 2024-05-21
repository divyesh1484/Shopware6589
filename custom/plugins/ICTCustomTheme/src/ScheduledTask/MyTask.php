<?php declare(strict_types=1);

namespace ICTCustomTheme\ScheduledTask;

use Shopware\Core\Framework\MessageQueue\ScheduledTask\ScheduledTask;

class MyTask extends ScheduledTask
{
    public static function getTaskName(): string
    {
        return 'ict.my_task';
    }

    public static function getDefaultInterval(): int
    {
        return 120; // 2 minute
    }
}