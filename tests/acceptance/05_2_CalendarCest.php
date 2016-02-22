<?php
use Step\Acceptance;

/**
 * @group 3_mainMenu
 */
class CalendarCest
{

    /**
     * Checking Calendar
     * @param \Page\Calendar $calendarPage
     */

        function checkCalendarPage(\Page\Calendar $calendarPage)
        {
            $calendarPage->calendar();
        }











}
