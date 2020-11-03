<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;
class LogsController extends Controller
{
    public function downloadLogs(){
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=file.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $logs = Log::all();
        $columns = array('Timestamp', 'UserID', 'UserName', 'UserLevel', 'Action', 'IPAddress', 'Resource');

        $callback = function() use ($logs, $columns)
        {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach($logs as $log) {
                fputcsv($file, array($log->created_at, $log->user_id, $log->user_name, $log->user_level, $log->action, $log->IP_address, $log->resource));
            }
            fclose($file);
        };
        return Response::stream($callback, 200, $headers);
    }
}