<?php

namespace Beyondcode\CustomDashboardCard\Http\Controllers;

use Laravel\Nova\Http\Requests\NovaRequest;
use Beyondcode\CustomDashboardCard\NovaCustomDashboard;

class DashboardCardController
{

    public function cards(NovaRequest $request)
    {
        return NovaCustomDashboard::availableDashboardCards($request);
    }

}