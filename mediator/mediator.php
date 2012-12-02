<?php

//Mediator (interface)
interface ICalendarMediator {

    public function notifyAlarm();

    public function snoozed($n);

    public function closeAlarm();
}

//ConcreteMediator
class CalendarMediator implements ICalendarMediator {

    protected $alarmer;
    protected $snoozer;

    public function __construct() {
        $this->alarmer = new Alarmer($this);
        $this->snoozer = new Snoozer($this);
    }

    public function getAlarmer() {
        return $this->alarmer;
    }

    public function getSnoozer() {
        return $this->getSnoozer();
    }

    public function notifyAlarm() {

        return $this->alarmer->notifyAlarm();
    }

    public function snoozed($snooze_count) {
        return $this->snoozer->snoozed($snooze_count);
    }

    public function closeAlarm() {
        return $this->alarmer->closeAlarm();
    }

}

class CalendarColleague {

    protected $mediator;

    public function __construct($mediator) {
        $this->mediator = $mediator;
    }

    public function getMediator() {
        return $this->mediator;
    }

}

class Alarmer extends CalendarColleague {

    public function __construct($mediator) {
        parent::__construct($mediator);
    }

    public function notifyAlarm() {
        $alarm_html = '<img src="assets/img/alarm-clock.gif" alt="AlarmClock"/>';

        return $alarm_html;
    }

    public function closeAlarm() {
        return 'close';
    }

}

class Snoozer extends CalendarColleague {

    public function __construct($mediator) {
        parent::__construct($mediator);
    }

    public function snoozed($snooze_count) {
        if ($snooze_count >= 3) {
            $this->failureLog('Alarm Closed due to no responce');
            return 'close';
        } else {
            return 'continue';
        }
    }

    public function failureLog($message) {
        //Log the failure somehow
    }

}

