<?php

namespace App\Charts;

use App\Models\visit;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class MonthlyUsersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\AreaChart
    {

        $month = array();
        $with_car = array();
        $without_car = array();

        for ($i = 1; $i <= 12; $i++) {
            $month[] = visit::whereMonth('visit_date', '0'.$i)->count();
            $with_car[]= visit::whereMonth('visit_date', '0'.$i)->where('has_car', 1)->count();
            $without_car[] = visit::whereMonth('visit_date', '0'.$i)->where('has_car', 0)->count();
        }


        return $this->chart->areaChart()
            ->setTitle('Monthly checkin and checkout.')
            ->setSubtitle('Total number of visitors during this month')
            ->addData('visitors with car', $with_car)
            ->addData('visitor without car', $without_car)
            ->addData('total number of visitors', $month)

            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'Augest', 'September', 'October', 'November', 'December']);
    }
}
