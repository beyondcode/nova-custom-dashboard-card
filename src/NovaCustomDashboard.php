<?php

namespace Beyondcode\CustomDashboardCard;


use Laravel\Nova\Http\Requests\NovaRequest;

class NovaCustomDashboard
{

    public static $cards = [];

    public static function cards(array $cards)
    {
        static::$cards = array_merge(
            static::$cards,
            $cards
        );

        return new static;
    }

    /**
     * Get the available dashboard cards for the given request.
     *
     * @param  NovaRequest  $request
     * @return \Illuminate\Support\Collection
     */
    public static function availableDashboardCards(NovaRequest $request)
    {
        return collect(static::$cards)->filter->authorize($request)->values();
    }

}