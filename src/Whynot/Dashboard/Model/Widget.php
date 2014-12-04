<?php
namespace Whynot\Dashboard\Model;

use Illuminate\Support\Facades\View;
use Config;
class Widget {

    protected $GA;
    protected $start_date, $end_date;

    public function __construct($name, $config, $start_date=NULL, $end_date=NULL){
        $this->GA = $config['use_ga'] ? new GA() : NULL;
        $this->start_date = $start_date ? $start_date : date('Y-m-01');
        $this->end_date = $end_date ? $end_date : date('Y-m-d', strtotime("-1 day"));
    }

    public function showWidget($widget, $type='short'){
        switch ($widget) {
            case 'visitors24': {
                $Visitors24 = $this->GA->query('today', 'today', 'ga:sessions', array(
                    'samplingLevel' => 'FASTER'
                ))->getRows()[0][0];
                return View::make('dashboard::widgets.visitors24')
                    ->with('Visitors24', $Visitors24)
                    ->with('widgetType', $type)
                    ->render();
                break;
            }
            case 'allUsers':{
                return '';
                break;
            }
            case 'sessDur':{
                return '';
                break;
            }
            case 'pageViews':{
                return '';
                break;
            }
            case 'typeTraffic':{
                return '';
                break;
            }
            case 'topReferral':{
                return '';
                break;
            }
            default:{
                return '';
                break;
            }
        }
    }
}