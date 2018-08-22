<?php

namespace Beyondcode\CustomDashboardCard;

use Laravel\Nova\Metrics\Metric;
use Laravel\Nova\Http\Requests\DashboardMetricRequest as BaseRequest;

class DashboardMetricRequest extends BaseRequest
{
    /**
     * Get all of the possible metrics for the request.
     *
     * @return \Illuminate\Support\Collection
     */
    public function availableMetrics()
    {
        return NovaCustomDashboard::availableDashboardCards($this)->whereInstanceOf(Metric::class)
            ->merge(parent::availableMetrics());
    }
}