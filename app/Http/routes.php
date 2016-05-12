<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::get('member', 'MemberController@showInfo');
Route::get('member/{id}', 'MemberController@showInfo');
Route::get('/clan/history/trophins', function () {
    $points = \App\ClanRecord::where('created_at', ">", strtotime('-1day'))->get(['clanPoints', 'created_at'])->every(10);
    foreach ($points as $point) {
        $labels[] = date('Y-m-d H:i', $point->created_at->getTimestamp());
        $datasets[] = $point->clanPoints;
    }
    $data = [
        'labels' => $labels,
        'datasets' => [
            [
                'label' => '部落總獎杯',
                'data' => $datasets,
            ],
        ]
    ];
    return response()->json($data);
});
