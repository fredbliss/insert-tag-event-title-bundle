<?php

namespace IntelligentSpark\Hooks;

use Contao\CalendarEventsModel;

class EventTitle extends \Frontend {

    public function insertEventTitle($strTag)
    {

        $arrSplit = explode('::', $strTag);

        if ($arrSplit[0] != 'event_title_by_alias')
        {
             return false;
        }

        if (!is_numeric((int)$arrSplit[1])) {

            return false;
        }

        $objEvent = \CalendarEventsModel::findPublishedByParentAndIdOrAlias(\Input::get('events'),array((int)$arrSplit[1]));

        return $objEvent->title;
    }

}