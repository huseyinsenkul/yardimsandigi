<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Debt;
use App\Models\Revenue;
use Illuminate\Http\Request;

class ExcelController extends Controller
{
    //
    public function aidat()
    {
        function exportExcel($filename = 'ExportExcel', $columns = array(), $data = array(), $replaceDotCol = array())
        {

            header('Content-Encoding: UTF-8');
            header('Content-Type: text/plain; charset=utf-8');
            header("Content-disposition: attachment; filename=" . $filename . ".xls");

            echo "\xEF\xBB\xBF"; // UTF-8 BOM

            $say = count($columns);

            echo '<table border="1">';

            echo '<tr>';
            foreach ($columns as $v) {
                echo '<th style="background-color:#FFA500">' . trim($v) . '</th>';
            }
            echo '</tr>';

            foreach ($data as $val) {

                echo '<tr>';

                for ($i = 0; $i < $say; $i++) {
                    if (in_array($i, $replaceDotCol)) {
                        echo '<td>' . str_replace('.', ',', $val[$i]) . '</td>';
                    } else {
                        echo '<td>' . $val[$i] . '</td>';
                    }
                }

                echo '</tr>';
            }

            echo '</table>';
        }

        $columns = array();
        $data = array();


        $replaceDotCol = array(3);


        $columns = array(
            'Adı Soyadı',
            'Ay',
            'Yıl',
            'Miktar'
        );

        $revenues = Revenue::all();

        foreach ($revenues as $revenue) {
            $data[] = array(
                $revenue->getUser->name,
                $revenue->month,
                $revenue->year,
                $revenue->price
            );
        }

        exportExcel('AidatOdemeleri', $columns, $data, $replaceDotCol);
    }

    public function borc()
    {
        function exportExcel($filename = 'ExportExcel', $columns = array(), $data = array(), $replaceDotCol = array())
        {

            header('Content-Encoding: UTF-8');
            header('Content-Type: text/plain; charset=utf-8');
            header("Content-disposition: attachment; filename=" . $filename . ".xls");

            echo "\xEF\xBB\xBF"; // UTF-8 BOM

            $say = count($columns);

            echo '<table border="1">';

            echo '<tr>';
            foreach ($columns as $v) {
                echo '<th style="background-color:#FFA500">' . trim($v) . '</th>';
            }
            echo '</tr>';

            foreach ($data as $val) {

                echo '<tr>';

                for ($i = 0; $i < $say; $i++) {
                    if (in_array($i, $replaceDotCol)) {
                        echo '<td>' . str_replace('.', ',', $val[$i]) . '</td>';
                    } else {
                        echo '<td>' . $val[$i] . '</td>';
                    }
                }

                echo '</tr>';
            }

            echo '</table>';
        }

        $columns = array();
        $data = array();

        $replaceDotCol = array(2, 3, 4);


        $columns = array(
            'Adı Soyadı',
            'Alış Tarihi',
            'Borç Miktarı',
            'Ödenen',
            'Kalan'
        );

        $debts = Debt::all();

        foreach ($debts as $debt) {
            $payments = 0;
            foreach ($debt->getPayments as $payment) {
                $payments += $payment->payment;
            }
            $data[] = array(
                $debt->getUser->name,
                $debt->date,
                $debt->debt,
                $payments,
                $debt->debt - $payments
            );
        }

        exportExcel('Borclar', $columns, $data, $replaceDotCol);
    }
}
