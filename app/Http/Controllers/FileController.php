<?php

namespace App\Http\Controllers;

use App\Models\Logfile;
use Dflydev\DotAccessData\Data;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Mosquitto\Exception;
use Yajra\DataTables\Facades\DataTables;

class FileController extends Controller
{

    public function set()
    {
        return view('file');
    }

    public function file(Request $request)
    {


        $file = new Logfile();
        $file->ip = $request->input('ip');
        $file->user_identity = $request->input('user_identity');
        $file->username_client = $request->input('username_client');
        $file->date_time = $request->input('date_time');
        $file->http_request = $request->input('http_request');
        $file->url_request = $request->input('url_request');
        $file->protocol_version = $request->input('protocol_version');
        $file->status_code = $request->input('status_code');
        $file->byte_size = $request->input('byte_size');
        $file->referrer_req = $request->input('referrer_req');
        $file->user_agent = $request->input('user_agent');
        $file->cookies_value = $request->input('cookies_value');


        $file->save();


        return "data save successfully";
//        return redirect()->back();
    }

//    public function show(Request $request)
//    {
//        $logFiles = Logfile::all();
//
//        $filename = 'log-files.csv';
//        $handle = fopen($filename, 'w+');
//
//        // Add headers to the CSV file
//        fputcsv($handle, array('IP', 'Name', 'HTTP Request', 'Number', 'Number IP', 'Browser Name'));
//
//        // Add data to the CSV file
//        foreach($logFiles as $logFile) {
//            fputcsv($handle, array($logFile->ip, $logFile->name, $logFile->http_request, $logFile->number, $logFile->number_ip, $logFile->browser_name));
//        }
//
//        fclose($handle);
//
//        //
//        Storage::disk('local')->put($filename, file_get_contents($filename));
//
//        return "data exported successfully";
//    }


//    public function upload(Request $request)
//    {
//
//        $request->validate([
//            'file' => 'required|file|mimetypes:text/plain|max:1000000'
//        ]);
//
//        $file = $request->file('file'); //ata blade ar input field ar name
//        $path = $file->getPathname();
//
////        $log_file = fopen($path, 'r');
////        $output="";
////        dd($log_file);
//        if (file_exists($path)) {
//            $log_file = fopen($path, "r");
//
//
//            // Skip the first line
////            fgets($log_file);
////            dd($log_file);
//            while (!feof($log_file)) {  //($row = fgetcsv($file_handle)) !== false
//                $line = fgets($log_file);
//
////            dd($line);
//
//                if (preg_match('/^(\S+) (\S+) (\S+) \[(.+)\] "(\S+) (\S+) (\S+)" (\S+) (\S+) "(.*?)" "(.*?)" "(.*?)"/', $line, $matches)) {
//
//                    $data = new Logfile();
//                    $data->ip = $matches[1];
//                    $data->user_identity = $matches[2];
//                    $data->username_client = $matches[3];
//                    $data->date_time = $matches[4];
//                    $data->http_request = $matches[5];
//                    $data->url_request = $matches[6];
//                    $data->protocol_version = $matches[7];
//                    $data->status_code = $matches[8];
//                    $data->byte_size = $matches[9];
//                    $data->referrer_req = $matches[10];
//                    $data->user_agent = $matches[11];
//                    $data->cookies_value = $matches[12];
//
//                  $data->save();
//
//
////                    return "data save in database table successfully";
////                dd($matches[2]);
////
//
//                }
//            }
//
//
//            fclose($log_file);
//
//            return $line;
//        } else {
//            return "File not found";
//        }
//
//    }


    public function upload(Request $request)
    {

        try {


            $request->validate([
                'file' => 'required|file|mimetypes:text/plain|max:1000000'
            ]);

            $file = $request->file('file'); //ata blade ar input field ar name
            $path = $file->getPathname();

//        $log_file = fopen($path, 'r');
//        $output="";
//        dd($log_file);
            if (file_exists($path)) {
                $log_file = fopen($path, "r");

                $chunkSize = 1000;
                $lineNumber = 0;
                $lineChunks = [];

                while (!feof($log_file)) {
                    $line = fgets($log_file);

//            dd($line);

                    if (preg_match('/^(\S+) (\S+) (\S+) \[(.+)\] "(\S+) (\S+) (\S+)" (\S+) (\S+) "(.*?)" "(.*?)" "(.*?)"/', $line, $matches)) {

                        $data = [
                            'ip' => $matches[1],
                            'user_identity' => $matches[2],
                            'username_client' => $matches[3],
                            'date_time' => $matches[4],
                            'http_request' => $matches[5],
                            'url_request' => $matches[6],
                            'protocol_version' => $matches[7],
                            'status_code' => $matches[8],
                            'byte_size' => $matches[9],
                            'referrer_req' => $matches[10],
                            'user_agent' => $matches[11],
                            'cookies_value' => $matches[12],
                        ];
                        $lineChunks[] = $data;
                        $lineNumber++;

                        if ($lineNumber % $chunkSize === 0) {
                        DB::table('logfiles')->insert($lineChunks);
                            $lineChunks = [];
                        }
//                    return "data save in database table successfully";
//                dd($matches[2]);
//

                    }
                }
                if (!empty($lineChunks)) {
                    DB::table('logfiles')->insert($lineChunks);
                }

                fclose($log_file);

                return redirect('/yajra');
//            return $line;
            } else {
                throw new Exception("File not found");
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }

public function upload2(Request $request){
    $file = $request->file('file');
    $path = $file->store('temp');
    $file_content = file_get_contents(storage_path("app/$path"));
    $lines = explode(PHP_EOL, $file_content);
    $matched = false;
    $count = 0;
    DB::beginTransaction();
    try {
        $values = "";
        foreach ($lines as $line) {
            $pattern = '/^(\S+) (\S+) (\S+) \[(.+)\] "(\S+) (\S+) (\S+)" (\S+) (\S+) "(.*?)" "(.*?)" "(.*?)"/';
            preg_match($pattern, $line, $matches);
            if ($matches) {
                $log = [
                    'ip' => $matches[1],
                    'user_identity' => $matches[2],
                    'username_client' => $matches[3],
                    'date_time' => date('Y-m-d H:i:s', strtotime($matches[4])),
                    'http_request' => $matches[5],
                    'url_request' => $matches[6],
                    'protocol_version' => $matches[7],
                    'status_code' => $matches[8],
                    'byte_size' => $matches[9],
                    'referrer_req' => $matches[10],
                    'user_agent' => $matches[11],
                    'cookies_value' => $matches[12],
                ];
                $values .= "('" . implode("', '", $log) . "'),";
                $matched = true;
                $count++;
            } else {
                continue;
            }
        }
        $query = "INSERT INTO logfiles (ip, user_identity, username_client, date_time, http_request, url_request, protocol_version, status_code, byte_size, referrer_req, user_agent, cookies_value) VALUES " . rtrim($values, ", ") . ";";
        //dd($query);
        Log::info(time());
        DB::statement($query);
        Log::info(time());
        DB::commit();
        if (!$matched) {
            return redirect()->back()
                ->with('message', 'no log found in your file!');
        }
        Storage::delete($path);
        return ("$count logs saved successfully!");
    } catch (Exception $e) {
        dd($e);
        DB::rollBack();
        return redirect()->back()
            ->with('message', 'An error occurred while saving the logs.');
    }
}

    public function ajax(Request $request){
        if($request->ajax()){
            $u=Logfile::query();

            return DataTables::of($u)
//                ->addColumn('action', function($admin) {
//                    return'<a href="'.route('users.edit', $admin->id).'" class="btn btn-primary">Edit</a>';
//                })
//                ->rawColumns(["action"])

                ->editColumn('status', function ($row) {
//                    return $row->status ? 'active' : 'inactive';
                    if($row->status==1){
                        return 'active';
                    }else{
                        return 'inactive';
                    }

                })
                ->make(true);

        }
        return view('homepage');
    }


}
