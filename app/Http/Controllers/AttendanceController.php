<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance; // Attendance クラスのインポート
use Illuminate\Support\Facades\Auth; // Auth クラスのインポート
use Carbon\Carbon; // Carbon クラスのインポート

class AttendanceController extends Controller
{
    // public function arrive()
    // {
    //     auth()->user()->attendances()->create(['status' => 'arrived']);
    //     return redirect()->back()->with('success', 'Arrival recorded.');
    // }

    // public function leave()
    // {
    //     auth()->user()->attendances()->create(['status' => 'left']);
    //     return redirect()->back()->with('success', 'Departure recorded.');
    // }
    public function start(Request $request)
    {
        $attendance = new Attendance();
        $attendance->started_at = Carbon::now();
        // $attendance->save();
        
        return redirect()->back()->with('status', '出勤時間を記録しました！');
    }

}

// class AttendanceController extends Controller
// {
//     public function start(Request $request)
//     {
//         // 認証を確認する
//         if (Auth::check()) {
//             $user_id = Auth::id(); // 認証されたユーザーの ID を取得
//             $attendance = new Attendance();
//             $attendance->user_id = $user_id; // ユーザー ID をセット
//             $attendance->started_at = Carbon::now();
//             $attendance->save();

//             return redirect()->back()->with('status', '出勤時間を記録しました！');
//         } else {
//             return redirect()->back()->withErrors(['message' => 'ログインしていません。']);
//         }
//     }
// }

