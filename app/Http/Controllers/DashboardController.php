<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function getTables()
    {
        $table = DB::select('SHOW TABLES');
        $dbName = env('DB_DATABASE');
        $key = 'Tables_in_' . $dbName;
        $tableNames = array_map(function ($item) use ($key) {
            return $item->$key;
        }, $table);

        return response()->json($tableNames);
    }

    public function getData($table)
    {
        try {
            $data = DB::table($table)->get();
            // Lấy tên cột
            $columns = Schema::getColumnListing($table);

            $html = "<table border='1' cellpadding='8'><thead><tr>";
            foreach ($columns as $col) {
                $html .= "<th style='background:#007bff;color:#fff'>" . htmlspecialchars($col) . "</th>";
            }
            $html .= "</tr></thead><tbody>";

            if ($data->isEmpty()) {
                $html .= "<tr>";
                foreach ($columns as $col) {
                    $html .= "<td></td>";
                }
                $html .= "</tr>";
            } else {
                foreach ($data as $row) {
                    $html .= "<tr>";
                    foreach ($columns as $col) {
                        $html .= "<td>" . htmlspecialchars($row->$col) . "</td>";
                    }
                    $html .= "</tr>";
                }
            }
            $html .= "</tbody></table>";
            return $html;
        } catch (\Exception $e) {
            return "<p>Lỗi: " . $e->getMessage() . "</p>";
        }
    }
}
