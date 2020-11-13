<?php

namespace App\Http\Controllers\DaskBoard;
use Spatie\Analytics\Period;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Analytics;

class DashBoardController extends Controller
{       
   public function index(){
        $visitors  = Analytics::fetchVisitorsAndPageViews(Period::days(1));
        $pageViews = $visitors[0]['pageViews'];
        
        $live_users = Analytics::getAnalyticsService()->data_realtime->get('ga:232972287', 'rt:activeVisitors')->totalsForAllResults['rt:activeVisitors'];
        return view('client.dashboard.index',compact('live_users','pageViews'));
   }
}
