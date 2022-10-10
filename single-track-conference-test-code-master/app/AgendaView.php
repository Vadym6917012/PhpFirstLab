<?php

declare(strict_types=1);

namespace ConferenceApp;

use DateInterval;
use DateTime;

class AgendaView
{
    /**
     * @var Agenda
     */
    private Agenda $agenda;

    /**
     * @param Agenda $agenda
     */
    public function __construct(Agenda $agenda)
    {
        $this->agenda = $agenda;
    }

    /**
     * @return int
     */
    public function getNumberOfSlots(): int
    {
        /**
         * @todo: Implement it
         */
        return $this->agenda->count();
    }

    /**
     * return int
     */
    public static function getMinutesDifference(\DateTime $a, \DateTime $b): int
{
    return abs($a->getTimestamp() - $b->getTimestamp()) / 60;
}

    public function getTotalMinutes(DateInterval $int){
        return ($int->d * 24 * 60) + ($int->h * 60) + $int->i;
    }

    public function getDurationInMinutes(): int
    {
        /**
         * @todo: Implement it. Remember to include all breaks between slots to overall agenda duration.
         */
        $allSlots = $this->agenda->getSlots();
        $wholeDuration = 0;
        foreach ($allSlots as $slot) {
            $tempView = new SlotView($slot);
            $wholeDuration += $tempView->getDurationInMinutes();
        }
        return $wholeDuration;

    }
}
