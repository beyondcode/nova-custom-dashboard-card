<?php

namespace Beyondcode\CustomDashboardCard\Tests;

use Laravel\Nova\Nova;
use Beyondcode\CustomDashboardCard\NovaCustomDashboard;
use Beyondcode\CustomDashboardCard\Tests\Fixtures\ExampleValue;

class MetricTest extends TestCase
{
    public function tearDown()
    {
        parent::tearDown();

        NovaCustomDashboard::$cards = [];
    }

    /** @test */
    public function it_can_register_dashboard_cards()
    {
        NovaCustomDashboard::cards([
            new ExampleValue()
        ]);

        $this->assertCount(1, NovaCustomDashboard::$cards);
    }

    /** @test */
    public function it_returns_registered_cards()
    {
        NovaCustomDashboard::cards([
            new ExampleValue()
        ]);

        $registeredCards = json_decode($this->get('/nova-vendor/beyondcode/nova-custom-dashboard-card/cards')->getContent(), true);

        $this->assertCount(1, $registeredCards);
    }

    /** @test */
    public function it_only_returns_dashboard_cards()
    {
        Nova::cards([
            new ExampleValue()
        ]);

        $registeredCards = json_decode($this->get('/nova-vendor/beyondcode/nova-custom-dashboard-card/cards')->getContent(), true);

        $this->assertCount(0, $registeredCards);
    }

}