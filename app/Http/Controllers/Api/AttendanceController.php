<?php

namespace App\Http\Controllers\Api;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AttendanceController extends BaseController
{
    public function checkIn(Request $request)
    {
        $user = $request->user();

        $now = Carbon::now('Asia/Phnom_Penh');
        $currentDate = $now->toDateString();
        $currentTime = $now->toTimeString();
        $hour = intval($now->format('H'));

        $attendance = Attendance::where('user_id', $user->id)
            ->where('date', $currentDate)
            ->first();

        if ($hour < 13) {
            // Morning check-in
            if (! $attendance) {
                Attendance::create([
                    'user_id' => $user->id,
                    'date' => $currentDate,
                    'check_in_time_morning' => $currentTime,
                ]);

                return $this->successResponse([], 'ចុះវត្តមានចូលព្រឹកជោគជ័យ');
            }
            if ($attendance->check_in_time_morning) {
                return $this->errorResponse('ចុះវត្តមានចូលព្រឹករួចហើយសម្រាប់ថ្ងៃនេះ');
            }
        } else {
            // Afternoon check-in
            if (! $attendance) {
                Attendance::create([
                    'user_id' => $user->id,
                    'date' => $currentDate,
                    'check_in_time_afternoon' => $currentTime,
                ]);

                return $this->successResponse([], 'ចុះវត្តមានចូលរសៀលជោគជ័យ');
            }
            if ($attendance->check_in_time_afternoon) {
                return $this->errorResponse('ចុះវត្តមានចូលរសៀលរួចហើយសម្រាប់ថ្ងៃនេះ');
            }

            $attendance->update(['check_in_time_afternoon' => $currentTime]);

            return $this->successResponse([], 'ចុះវត្តមានចូលរសៀលជោគជ័យ');
        }
    }

    public function checkOut(Request $request)
    {
        $user = $request->user();

        $now = Carbon::now('Asia/Phnom_Penh');
        $currentDate = $now->toDateString();
        $currentTime = $now->toTimeString();
        $hour = intval($now->format('H'));

        $attendance = Attendance::where('user_id', $user->id)
            ->where('date', $currentDate)
            ->first();

        if (! $attendance) {
            return $this->errorResponse('គ្មានទិន្នន័យវត្តមានសម្រាប់ថ្ងៃនេះ');
        }

        if ($hour < 13) {
            // Morning check-out
            if ($attendance->check_in_time_morning && $attendance->check_out_time_morning) {
                return $this->errorResponse('ចុះវត្តមានចេញព្រឹករួចហើយសម្រាប់ថ្ងៃនេះ');
            }
            if ($attendance->check_in_time_morning && ! $attendance->check_out_time_morning) {
                $attendance->update(['check_out_time_morning' => $currentTime]);

                return $this->successResponse([], 'ចុះវត្តមានចេញព្រឹកជោគជ័យ');
            }
        } else {
            // Afternoon check-out
            if ($attendance->check_in_time_afternoon && $attendance->check_out_time_afternoon) {
                return $this->errorResponse('ចុះវត្តមានចេញរសៀលរួចហើយសម្រាប់ថ្ងៃនេះ');
            }
            if ($attendance->check_in_time_afternoon && ! $attendance->check_out_time_afternoon) {
                $attendance->update(['check_out_time_afternoon' => $currentTime]);

                return $this->successResponse([], 'ចុះវត្តមានចេញរសៀលជោគជ័យ');
            }
            if ($attendance->check_in_time_morning && ! $attendance->check_out_time_morning && ! $attendance->check_in_time_afternoon && ! $attendance->check_out_time_afternoon) {
                $attendance->update(['check_out_time_afternoon' => $currentTime]);

                return $this->successResponse([], 'ចុះវត្តមានចេញរសៀលជោគជ័យ');
            }
        }
    }
}
