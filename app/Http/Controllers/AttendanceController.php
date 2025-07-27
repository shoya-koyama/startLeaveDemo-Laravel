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
        if ($request->isMethod('post')) {
            $attendance = new Attendance();
            $attendance->user_id = Auth::id(); 
            $attendance->started_at = Carbon::now();
            $attendance->save();
            // POST後はGETにリダイレクトし、最新の出勤日時を表示
            return redirect()->route('attendance.start')->with('status', '出勤時間を記録しました！');
        }
        // 最新の出勤日時を取得
        $latestAttendance = null;
        if (Auth::check()) {
            $latestAttendance = Auth::user()->attendances()->latest('started_at')->first();
        }
        return view('start', [
            'latestAttendance' => $latestAttendance
        ]);
    }

    public function leave(Request $request)
    {
        // 本日の最新の出勤レコードを取得
        $attendance = Auth::user()->attendances()->whereDate('started_at', now()->toDateString())->latest('started_at')->first();
        if ($attendance && is_null($attendance->leaved_at)) {
            $attendance->leaved_at = now();
            $attendance->save();
            return redirect()->route('attendance.start')->with('status', '退勤時間を記録しました！');
        }
        return redirect()->route('attendance.start')->with('status', '本日の出勤記録がありません、または既に退勤済みです。');
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

