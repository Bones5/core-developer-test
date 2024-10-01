<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Event extends Composer
{
    /**
     * This tells the Composer that it should bind data to the 'example'
     * partial.
     */
    protected static $views = [
        'partials.event-teaser',
    ];

    /**
     * This will make the variable `$roots` available in the 'example' partial
     * with the value described here.
     */
    public function with()
    {
        return [
            'date' => $this->date()
        ];
    }

    public function date()
    {

        $start_date = get_field('start_date_and_time');
        $end_date = get_field('end_date_and_time');

        if(!$start_date || !$end_date) {
            return;
        };

        $single_day_event = date("Y-m-d", strToTime($start_date)) === date("Y-m-d", strToTime($end_date));

        if ($single_day_event) {
            return $start_date . ' - ' . date("g:i a", strToTime($end_date));
        }



        return $start_date . ' - ' . $end_date;
    }
}
