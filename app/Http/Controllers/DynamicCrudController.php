<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DynamicCrudController extends Controller
{
    // Hiển thị danh sách
    public function index($table)
    {
        if (!Schema::hasTable($table)) {
            abort(404, 'Table not found');
        }
        $columns = Schema::getColumnListing($table);
        $data = DB::table($table)->get();
        return view('dynamic_crud.index', compact('table', 'columns', 'data'));
    }

    // Hiển thị form thêm mới
    public function create($table)
    {
        if (!Schema::hasTable($table)) {
            abort(404, 'Table not found');
        }
        $columns = Schema::getColumnListing($table);
        return view('dynamic_crud.create', compact('table', 'columns'));
    }

    // Lưu dữ liệu mới
    public function store(Request $request, $table)
    {
        $data = $request->except('_token');
        DB::table($table)->insert($data);
        return redirect()->route('dynamic_crud.index', $table)->with('success', 'Thêm thành công!');
    }

    // Hiển thị form sửa
    public function edit($table, $id)
    {
        if (!Schema::hasTable($table)) {
            abort(404, 'Table not found');
        }
        $columns = Schema::getColumnListing($table);
        $row = DB::table($table)->where($columns[0], $id)->first();
        return view('dynamic_crud.edit', compact('table', 'columns', 'row'));
    }

    // Cập nhật dữ liệu
    public function update(Request $request, $table, $id)
    {
        $columns = Schema::getColumnListing($table);
        $data = $request->except('_token', '_method');
        DB::table($table)->where($columns[0], $id)->update($data);
        return redirect()->route('dynamic_crud.index', $table)->with('success', 'Cập nhật thành công!');
    }

    // Xóa dữ liệu
    public function destroy($table, $id)
    {
        $columns = Schema::getColumnListing($table);
        DB::table($table)->where($columns[0], $id)->delete();
        return redirect()->route('dynamic_crud.index', $table)->with('success', 'Xóa thành công!');
    }
}
