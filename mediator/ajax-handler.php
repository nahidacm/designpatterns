<?php
include_once 'mediator.php';

$mediator = new CalendarMediator();

switch ($_POST['action']){
    case 'snooze':
        echo $mediator->snoozed($_POST['snooze_count']);
        break;
    case 'close':
        echo $mediator->closeAlarm();
        break;
}