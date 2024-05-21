<?php declare(strict_types=1);

namespace ICTCustomTheme\ScheduledTask;

use Shopware\Core\Framework\MessageQueue\ScheduledTask\ScheduledTaskHandler;

class MyTaskHandler extends ScheduledTaskHandler
{
    public static function getHandledMessages(): iterable
    {
        return [ MyTask::class ];
    }

    public function run(): void
    {
        echo 'Hello iCreative!!';
    }
}