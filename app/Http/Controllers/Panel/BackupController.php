<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class BackupController extends Controller
{
    //
    public function backup_users(){
        $fileName = 'users.csv';
        $users = User::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Name', 'Username', 'Email');

        $callback = function() use($users, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($users as $user) {
                $row['Name']  = $user->name;
                $row['Username']    = $user->username;
                $row['Email']    = $user->email;
                fputcsv($file, array($row['Name'], $row['Username'], $row['Email']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
