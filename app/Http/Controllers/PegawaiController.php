<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Gaji;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {

        $data = Pegawai::paginate(5);
        return view('datapegawai', compact('data'));
    }

    public function tambahpegawai()
    {
        return view('tambahdata');
    }

    public function insertdata(Request $request)
    {
        Pegawai::create($request->all()); //buat request semua yang ada di form
        return redirect()->route('pegawai')->with('success', 'Data telah ditambahkan');
    }

    public function tampilkandata($id)
    {
        $data = Pegawai::find($id);

        return view('tampildata', compact('data'));
    }

    public function ubahdata(Request $request, $id)
    {
        $data = Pegawai::find($id);
        $data->update($request->all());
        return redirect()->route('pegawai')->with('success', 'Data telah diubah');
    }

    public function hapusdata($id)
    {
        $data = Pegawai::find($id);
        $data->delete();

        return redirect()->route('pegawai')->with('success', 'Data telah dihapus');
    }

    public function hitunggaji($id)
    {
        $data = Pegawai::find($id);

        return view('slipgaji', compact('data'));
    }

    public function insertgaji(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gaji_pokok' => 'required|numeric',
            'bonus' => 'required|numeric',
            'gaji_kotor' => 'required|numeric',
            'potongan' => 'required|numeric',
            'gaji_total' => 'required|numeric',
            'tgl_gajian' => 'required|date_format:Y-m-d', // validasi format tanggal
        ]);

        // Memformat tanggal
        $tgl_gajian = Carbon::parse($request->tgl_gajian)->format('j F Y');

        Gaji::create([
            'name' => $request->name,
            'gaji_pokok' => $request->gaji_pokok,
            'bonus' => $request->bonus,
            'gaji_kotor' => $request->gaji_kotor,
            'potongan' => $request->potongan,
            'gaji_total' => $request->gaji_total,
            'tgl_gajian' => $tgl_gajian,
        ]);
        return redirect()->route('datagaji')->with('success', 'Data Gaji telah ditambahkan');
    }

    public function datagaji()
    {
        $gaji = Gaji::all();
        return view('datagaji', compact('gaji'));
    }

    public function hapusdatagaji($id)
    {
        $gaji = Gaji::find($id);
        $gaji->delete();

        return redirect()->route('datagaji')->with('success', 'Data gaji telah dihapus');
    }

    public function tampilslipgaji($id)
    {
        $gaji = Gaji::find($id);
        return view('tampilslipgaji', compact('gaji'));
    }
    public function cetakslipgaji($id)
    {
        $gaji = Gaji::find($id);
        $pdf = Pdf::loadView('cetakslipgaji', compact('gaji'));
        return $pdf->download('slipgaji.pdf');

    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            // Check if the query is a date format (e.g., "January" or "2023")
            try {
                $date = Carbon::createFromFormat('F Y', $query);
                $month = $date->format('m');
                $year = $date->format('Y');

                $gaji = Gaji::whereMonth('tgl_gajian', $month)
                    ->whereYear('tgl_gajian', $year)
                    ->orWhere('name', 'LIKE', "%{$query}%")
                    ->orWhere('gaji_pokok', 'LIKE', "%{$query}%")
                    ->orWhere('gaji_kotor', 'LIKE', "%{$query}%")
                    ->orWhere('bonus', 'LIKE', "%{$query}%")
                    ->orWhere('potongan', 'LIKE', "%{$query}%")
                    ->orWhere('gaji_total', 'LIKE', "%{$query}%")
                    ->get();
            } catch (\Exception $e) {
                // If it's not a valid date, search as a normal string
                $gaji = Gaji::where('name', 'LIKE', "%{$query}%")
                    ->orWhere('gaji_pokok', 'LIKE', "%{$query}%")
                    ->orWhere('gaji_kotor', 'LIKE', "%{$query}%")
                    ->orWhere('bonus', 'LIKE', "%{$query}%")
                    ->orWhere('potongan', 'LIKE', "%{$query}%")
                    ->orWhere('gaji_total', 'LIKE', "%{$query}%")
                    ->orWhere('tgl_gajian', 'LIKE', "%{$query}%")
                    ->get();
            }
        } else {
            $gaji = Gaji::all();
        }


        return view('datagaji', compact('gaji'));

    }

    public function searchdate(Request $request)
    {
        $date1 = $request->input('date1');
        $date2 = $request->input('date2');

        // Validasi input tanggal (opsional)
        $request->validate([
            'date1' => 'required|date',
            'date2' => 'required|date|after_or_equal:date1',
        ]);

        // Query ke database untuk mendapatkan data berdasarkan rentang tanggal
        $gaji = Gaji::whereBetween('tgl_gajian', [$date1, $date2])->get();
        return view('datagaji', compact('gaji'));
    }
    public function cetaklaporangaji(Request $request)
    {
        $date1 = $request->input('date1');
        $date2 = $request->input('date2');

        // Validasi input tanggal (opsional)
        $request->validate([
            'date1' => 'nullable|date',
            'date2' => 'nullable|date|after_or_equal:date1',
        ]);
        if ($date1 && $date2) {
            // Query ke database untuk mendapatkan data berdasarkan rentang tanggal
            $gaji = Gaji::whereBetween('tgl_gajian', [$date1, $date2])->get();

        } else {
            // Query ke database untuk mendapatkan semua data
            $gaji = Gaji::all();

        }
        $pdf = Pdf::loadView('laporangaji', compact('gaji', 'date1', 'date2'));
        return $pdf->download('laporangaji.pdf');


        // Query ke database untuk mendapatkan data berdasarkan rentang tanggal

    }





}
