<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

function ajaxResponse($text, $success = true)
{
    if ($success == true) {
        echo json_encode(['message' => $text, 'success' => true]);
    } else {
        echo json_encode(['message' => $text, 'error' => true]);
    }
}

class DashboardController extends Controller
{
    public function index()
    {
        return $this->matrimonio();
    }
    public function archivos()
    {
        addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);

        return view('pages.dashboards.archivos', []);
    }
    public function inicio()
    {
        addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);
        return view('pages.dashboards.inicio', []);
    }
    public function ayuda()
    {
        addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);
        return view('pages.dashboards.ayuda', []);
    }

    public function nacimiento()
    {
        addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);

        return view('pages.dashboards.index', [
            'type' => 'acta_nacimiento',
            'name' => 'nacimiento',
            'data' => $this->getDetail('acta_nacimiento')

        ]);
    }
    public function defuncion()
    {
        addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);

        return view('pages.dashboards.index', [
            'type' => 'acta_defuncion',
            'name' => 'defuncion',
            'data' => $this->getDetail('acta_defuncion')
        ]);
    }
    public function matrimonio()
    {
        addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);

        return view('pages.dashboards.index', [
            'type' => 'acta_matrimonio',
            'name' => 'matrimonio',
            'data' => $this->getDetail('acta_matrimonio')
        ]);
    }
    public function getDetail($type)
    {
        return DB::select("SELECT * FROM $type");
    }
    public function genCrud(Request $request)
    {
        $type  = $request->post('type');
        $method = $request->post('method');
        $id = $request->post('id');
        $data = $request->post();
        unset($data['type']);
        unset($data['method']);

        if ($id == '') {
            unset($data['rect']);
            $c = DB::table($type)->insert($data);
            ajaxResponse("Dato insertado correctamente", true);
        } else {
            $comentario = $request->post('rect');
            unset($data['rect']);

            $this->addRectificacion($type, $id, $comentario);
            $c = DB::selectOne("SELECT * FROM $type WHERE id = ?", [$id]);
            DB::table($type)->where('id', $id)->update($data);
            ajaxResponse("Dato actualizado correctamente", true);
        }
    }
    public function addRectificacion($table, $id_field, $value)
    {
        return DB::insert("INSERT INTO rectificacion (id, nota, form, id_dato, fecha) VALUES(null, ?, ?, ?, ?)", [
            $value, $table, $id_field, date('Y-m-d H:i:s')
        ]);
    }
    public function deleteRow(Request $request)
    {
        $type  = $request->post('type');
        $id = $request->post('id');
        DB::delete("DELETE FROM $type WHERE id = ?", [$id]);
        ajaxResponse("Dato eliminado correctamente", true);
    }
    public function getField(Request $request)
    {
        $id = $request->post('id');
        $type  = $request->post('type');

        return DB::selectOne("SELECT * FROM $type WHERE id = ?", [$id]);
    }
    public function uploadFile(Request $request)
    {
        $c = $request->file('file')->store('public/archivos');
        $c = str_replace('public/', '', $c);
        ajaxResponse($c, true);
    }
    public function updateFile(Request $request)
    {
        $type  = $request->post('type');
        $id = $request->post('id');
        $url = $request->post('url');
        DB::table($type)->where('id', $id)->update([
            'archivo' => $url
        ]);
        ajaxResponse("Archivo subido correctamente", true);
    }
}
