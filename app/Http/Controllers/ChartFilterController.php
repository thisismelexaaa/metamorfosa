<?php

namespace App\Http\Controllers;

use App\Models\Panel\Customer;
use App\Models\Panel\Konsultasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChartFilterController extends Controller
{
    public function getIncomeData(Request $request)
    {
        $filter = $request->get('filter', 'monthly'); // filter default adalah perbulan
        $currentYear = now()->year; // Mendapatkan tahun sekarang

        $months = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

        $quarters = [
            1 => 'Januari - Maret',
            2 => 'April - Juni',
            3 => 'Juli - September',
            4 => 'Oktober - Desember'
        ];

        $incomeData = [];

        if (Auth::user()->role == 'admin') {
            if ($filter == 'monthly') {
                $rawData = Konsultasi::selectRaw('MONTH(created_at) as month, SUM(total_harga) as total')
                    ->whereYear('created_at', $currentYear)
                    ->groupBy('month')
                    ->get();

                // Inisialisasi data pendapatan setiap bulan dengan 0
                foreach ($months as $monthNumber => $monthName) {
                    $incomeData[] = [
                        'month' => $monthName,
                        'total' => 0
                    ];
                }

                foreach ($rawData as $data) {
                    $incomeData[$data->month - 1]['total'] = $data->total;
                }
            } else if ($filter == 'quarterly') {
                // Ambil data pendapatan per kuartal di tahun sekarang
                $rawData = Konsultasi::selectRaw('QUARTER(created_at) as quarter, SUM(total_harga) as total')
                    ->whereYear('created_at', $currentYear)
                    ->groupBy('quarter')
                    ->get();

                // Inisialisasi data pendapatan setiap kuartal dengan 0
                foreach ($quarters as $quarterNumber => $quarterName) {
                    $incomeData[] = [
                        'quarter' => $quarterName,
                        'total' => 0
                    ];
                }

                // Isi data pendapatan berdasarkan kuartal
                foreach ($rawData as $data) {
                    $incomeData[$data->quarter - 1]['total'] = $data->total;
                }
            } else if ($filter == 'yearly') {
                $incomeData = Konsultasi::selectRaw('YEAR(created_at) as year, SUM(total_harga) as total')
                    ->groupBy('year')
                    ->get();
            }
        } else {
            if ($filter == 'monthly') {

                $rawData = Konsultasi::selectRaw('MONTH(created_at) as month, SUM(total_harga) as total')
                    ->whereYear('created_at', $currentYear)
                    ->where('id_support_teacher', Auth::user()->id)
                    ->groupBy('month')
                    ->get();

                // Inisialisasi data pendapatan setiap bulan dengan 0
                foreach ($months as $monthNumber => $monthName) {
                    $incomeData[] = [
                        'month' => $monthName,
                        'total' => 0
                    ];
                }

                foreach ($rawData as $data) {
                    $incomeData[$data->month - 1]['total'] = $data->total;
                }
            } else if ($filter == 'quarterly') {
                $rawData = Konsultasi::selectRaw('QUARTER(created_at) as quarter, SUM(total_harga) as total')
                    ->whereYear('created_at', $currentYear)
                    ->where('id_support_teacher', Auth::user()->id) // Hanya data yang dibuat oleh user yang sedang login
                    ->groupBy('quarter')
                    ->get();

                // Inisialisasi data pendapatan setiap kuartal dengan 0
                foreach ($quarters as $quarterNumber => $quarterName) {
                    $incomeData[] = [
                        'quarter' => $quarterName,
                        'total' => 0
                    ];
                }

                // Isi data pendapatan berdasarkan kuartal
                foreach ($rawData as $data) {
                    $incomeData[$data->quarter - 1]['total'] = $data->total;
                }
            } else if ($filter == 'yearly') {
                $incomeData = Konsultasi::selectRaw('YEAR(created_at) as year, SUM(total_harga) as total')
                    ->groupBy('year')
                    ->get();
            }
        }

        return response()->json($incomeData);
    }

    public function getCustomerData()
    {

        $currentYear = now()->year; // Mendapatkan tahun sekarang

        $months = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

        $customerData = [];

        if (Auth::user()->role == 'admin') {

            $rawData = Konsultasi::selectRaw('MONTH(created_at) as month, COUNT(id) as total')
                ->whereYear('created_at', $currentYear)
                ->groupBy('month')
                ->get();

            // Inisialisasi data customer setiap bulan dengan 0
            foreach ($months as $monthNumber => $monthName) {
                $customerData[] = [
                    'month' => $monthName,
                    'total' => 0
                ];
            }

            foreach ($rawData as $data) {
                $customerData[$data->month - 1]['total'] = $data->total;
            }
        } else {

            $rawData = Konsultasi::selectRaw('MONTH(created_at) as month, COUNT(id) as total')
                ->whereYear('created_at', $currentYear)
                ->where('id_support_teacher', Auth::user()->id)
                ->groupBy('month')
                ->get();

            // Inisialisasi data customer setiap bulan dengan 0
            foreach ($months as $monthNumber => $monthName) {
                $customerData[] = [
                    'month' => $monthName,
                    'total' => 0
                ];
            }

            foreach ($rawData as $data) {
                $customerData[$data->month - 1]['total'] = $data->total;
            }
        }


        return response()->json($customerData);
    }
}
