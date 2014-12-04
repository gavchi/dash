<?php
namespace Whynot\Dashboard\Controllers;

use Whynot\Dashboard\Controllers\BaseController;
use Whynot\Dashboard\Model\Widget;

class IndexController extends BaseController{

    public function getIndex()
    {
        //$data = $this->getDataWidgets();

        $listWidgets = \Config::get('dashboard::config.widgets');
        $widgetOutput = '';
        foreach($listWidgets as $widget => $config){
            $Widget = new Widget($widget, $config);
            $widgetOutput .= $Widget->showWidget($widget, $config['type']);
        }

        $clock['year'] = date('Y');
        $clock['date'] = date('m.d');
        $clock['time'] = date('G.i');

        return \View::make('dashboard::index')
            //->with('data', $data)
            ->with('widgets', $widgetOutput)
            ->with('clock', $clock);
    }

    public function getRefresh(){
        $start = date('Y-m-d', strtotime(Input::get('start').'.'.date('Y')));
        $end = date('Y-m-d', strtotime(Input::get('end').'.'.date('Y')));
        $data = $this->getDataWidgets($start, $end);
        $html = View::make('dashboard::widgets')
            ->with('data', $data)
            ->render();
        return Response::json(array('complete' => 'true', 'html' => $html));
    }
}