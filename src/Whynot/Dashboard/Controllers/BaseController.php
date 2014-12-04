<?php
namespace Whynot\Dashboard\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Routing\Controller;
use Config;

class BaseController extends Controller{

    protected function getDataWidgets($start=NULL, $end=NULL){

        //Начальная дата либо день установки GA, либо минус месяц назад от сегодняшней
        //Конечная - вчерашний день
        $startDate = strtotime('-1 month') > strtotime('2014/10/01') ? strtotime('-1 month') : strtotime('2014/10/01');
        $start = $start ? $start : date('Y-m-d', $startDate);
        $end = $end ? $end : date('Y-m-d', strtotime("-1 day"));
        $GA = new \GA();

        //Траффик
        $Traffic = $GA->query($start, $end, 'ga:sessions', array(
            'samplingLevel' => 'FASTER',
            'dimensions' => 'ga:source,ga:medium',
            'sort' => '-ga:sessions'
        ))->getRows();

        //От полноты массива зависит точность данных
        $socialNets = array(
            'twitter.com',
            'instagram.com',
            'facebook.com',
            'vk.com',
            'm.vk.com',
        );
        $countSocial = $countSearch = $countReferal = $countDirect = 0;
        $topReferal = array();

        foreach ($Traffic as $element){
            $countSocial += array_search($element[0], $socialNets) ? $element[2] : 0;
            $countSearch += $element[1] == 'organic' ? $element[2] : 0;
            $countReferal += $element[1] == 'referral' ? $element[2] : 0;
            $countDirect += $element[0] == '(direct)' ? $element[2] : 0;
            if('(direct)' != $element[0] && count($topReferal) < 5){
                $topReferal[$element[0]] = $element[2];
            }
        }
        $countTypeTraffic = array(
            'social' => $countSocial,
            'search' => $countSearch,
            'referral' => $countReferal,
            'direct' => $countDirect,
        );
        //Посетители за 24
        $Visitors24 = $GA->query('today', 'today', 'ga:sessions', array(
            'samplingLevel' => 'FASTER'
        ))->getRows()[0][0];

        //Уники, длительность сессий и глубина просмотра
        $PageDepth = round($GA->query($start, $end, 'ga:pageviewsPerSession', array(
            'samplingLevel' => 'DEFAULT',
        ))->getRows()[0][0], 2);

        //Сессии по дате
        $UsersByDate = $GA->query($start, $end, 'ga:sessions', array(
            'samplingLevel' => 'DEFAULT',
            'dimensions' => 'ga:date',
            'max-results' => '10000',
            'sort' => 'ga:date'
        ))->getRows();
        $allUsers = 0;
        foreach($UsersByDate as $date){
            $allUsers += $date[1];
        }

        //Средняя длительность сессий по дате
        $SessDurationByDate = $GA->query($start, $end, 'ga:avgSessionDuration', array(
            'samplingLevel' => 'DEFAULT',
            'dimensions' => 'ga:date',
            'max-results' => '10000',
            'sort' => 'ga:date'
        ))->getRows();

        //Средняя длительность сессий
        $avgSessionDuration = $GA->query($start, $end, 'ga:avgSessionDuration', array(
            'samplingLevel' => 'DEFAULT'
        ))->getRows()[0][0];
        $avgSessionDuration = gmdate("i:s", $avgSessionDuration);

        //Количество просмотров страниц
        $countPageViews = $GA->query($start, $end, 'ga:pageviews', array(
            'samplingLevel' => 'DEFAULT',
        ))->getRows()[0][0];

        //Топ10 страниц по просмотрам и их доля от общего числа
        $TopPageByDate = $GA->query($start, $end, 'ga:pageviews', array(
            'samplingLevel' => 'DEFAULT',
            'dimensions' => 'ga:pagePath',
            'max-results' => '10',
            'sort' => '-ga:pageviews'
        ))->getRows();

        foreach($TopPageByDate as $key => $page){
            $TopPageByDate[$key][2] = round(100*$page[1]/$countPageViews, 2);
        }

        //$ex = $stats->getColumnHeaders();

        return array(
            //Analytics
            'Visitors24' => $Visitors24,
            'sessDur' => $avgSessionDuration,
            'pageDepth' => $PageDepth,
            'typeTraffic' => $countTypeTraffic,
            'topReferral' => $topReferal,
            'dates' => array($start, $end),
            'allUsers' => $allUsers,
            'UsersByDate' => $UsersByDate,
            'SessDurationByDate' => $SessDurationByDate,
            'TopPageByDate' => $TopPageByDate,
        );
    }
}