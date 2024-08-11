<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Eselon;
use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\UnitKerja;
use App\Models\DataPegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class DataPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DataPegawai::latest()->paginate(10);
        return view('soal1.data.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $golongans = Golongan::all();
        $eselons = Eselon::all();
        $jabatans = Jabatan::all();
        $agamas = Agama::all();
        $unitKerjas = UnitKerja::all();

        $tempatTugas = UnitKerja::selectRaw('MIN(id) as id, tempat_tugas')
            ->groupBy('tempat_tugas')
            ->get();

        return view('soal1.data.create', compact('golongans', 'eselons', 'jabatans', 'agamas', 'unitKerjas', 'tempatTugas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validasi input
            $validatedData = $request->validate([
                'inputNIP' => 'required|integer|unique:data_pegawais,nip',
                'inputNama' => 'required|string|max:255',
                'inputTempatLahir' => 'required|string|max:255',
                'inputTanggalLahir' => 'required|date',
                'inputAlamat' => 'required|string',
                'inputGender' => 'required|in:L,P',
                'inputGolongan' => 'required|exists:golongans,id',
                'inputEselon' => 'nullable|exists:eselons,id',
                'inputJabatan' => 'nullable|exists:jabatans,id',
                'inputTempatTugas' => 'nullable|exists:unit_kerjas,id',
                'inputAgama' => 'required|exists:agamas,id',
                'inputUnitKerja' => 'nullable|exists:unit_kerjas,id',
                'inputNoHP' => 'nullable|string|max:15',
                'inputNPWP' => 'nullable|integer',
                'inputFoto' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            ]);

            if ($request->hasFile('inputFoto')) {
                $fileName = time() . '_' . $request->file('inputFoto')->getClientOriginalName();
                $filePath = $request->file('inputFoto')->storeAs('uploads', $fileName, 'public');
                $validatedData['foto'] = '/storage/' . $filePath;
            }

            // Simpan data
            DataPegawai::create([
                'nip' => $validatedData['inputNIP'],
                'foto' => $validatedData['foto'] ?? null,
                'nama' => $validatedData['inputNama'],
                'tempat_lahir' => $validatedData['inputTempatLahir'],
                'tanggal_lahir' => $validatedData['inputTanggalLahir'],
                'alamat' => $validatedData['inputAlamat'],
                'jk' => $validatedData['inputGender'],
                'golongan_id' => $validatedData['inputGolongan'],
                'eselon_id' => $validatedData['inputEselon'],
                'jabatan_id' => $validatedData['inputJabatan'],
                'tempat_tugas_id' => $validatedData['inputTempatTugas'],
                'agama_id' => $validatedData['inputAgama'],
                'unit_kerja_id' => $validatedData['inputUnitKerja'],
                'no_hp' => $validatedData['inputNoHP'],
                'npwp' => $validatedData['inputNPWP'],
            ]);

            Session::put('success', true);
            $request->session();
            return redirect()->route('dashboard')->with('pesan', 'Data pegawai berhasil disimpan.');
        } catch (\Exception $e) {
            // Tangkap exception jika ada kesalahan
            Session::put('success', false);
            $request->session();
            return redirect()->back()->with('pesan', 'Penambahan data pegawai gagal: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DataPegawai $dataPegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($data_id)
    {
        $dataPegawai = DataPegawai::findOrFail($data_id);
        $golongans = Golongan::all();
        $eselons = Eselon::all();
        $jabatans = Jabatan::all();
        $agamas = Agama::all();
        $unitKerjas = UnitKerja::all();

        $tempatTugas = UnitKerja::selectRaw('MIN(id) as id, tempat_tugas')
            ->groupBy('tempat_tugas')
            ->get();

        return view('soal1.data.edit', compact('golongans', 'eselons', 'jabatans', 'agamas', 'unitKerjas', 'tempatTugas', 'dataPegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $data_id)
    {
        try {
            // Validasi input
            $validatedData = $request->validate([
                'inputNIP' => 'required|integer|unique:data_pegawais,nip,' . $data_id,
                'inputNama' => 'required|string|max:255',
                'inputTempatLahir' => 'required|string|max:255',
                'inputTanggalLahir' => 'required|date',
                'inputAlamat' => 'required|string',
                'inputGender' => 'required|in:L,P',
                'inputGolongan' => 'required|exists:golongans,id',
                'inputEselon' => 'nullable|exists:eselons,id',
                'inputJabatan' => 'nullable|exists:jabatans,id',
                'inputTempatTugas' => 'nullable|exists:unit_kerjas,id',
                'inputAgama' => 'required|exists:agamas,id',
                'inputUnitKerja' => 'nullable|exists:unit_kerjas,id',
                'inputNoHP' => 'nullable|string|max:15',
                'inputNPWP' => 'nullable|integer',
                'inputFoto' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            ]);

            $pegawai = DataPegawai::findOrFail($data_id);

            if ($request->hasFile('inputFoto')) {
                // Hapus foto lama jika ada
                if ($pegawai->foto) {
                    Storage::disk('public')->delete(str_replace('/storage/', '', $pegawai->foto));
                }

                // Simpan foto baru
                $fileName = time() . '_' . $request->file('inputFoto')->getClientOriginalName();
                $filePath = $request->file('inputFoto')->storeAs('uploads', $fileName, 'public');
                $validatedData['foto'] = '/storage/' . $filePath;
            }

            // Update data pegawai
            $pegawai->update([
                'nip' => $validatedData['inputNIP'],
                'foto' => $validatedData['foto'] ?? $pegawai->foto,
                'nama' => $validatedData['inputNama'],
                'tempat_lahir' => $validatedData['inputTempatLahir'],
                'tanggal_lahir' => $validatedData['inputTanggalLahir'],
                'alamat' => $validatedData['inputAlamat'],
                'jk' => $validatedData['inputGender'],
                'golongan_id' => $validatedData['inputGolongan'],
                'eselon_id' => $validatedData['inputEselon'],
                'jabatan_id' => $validatedData['inputJabatan'],
                'tempat_tugas_id' => $validatedData['inputTempatTugas'],
                'agama_id' => $validatedData['inputAgama'],
                'unit_kerja_id' => $validatedData['inputUnitKerja'],
                'no_hp' => $validatedData['inputNoHP'],
                'npwp' => $validatedData['inputNPWP'],
            ]);

            Session::put('success', true);
            return redirect()->route('dashboard')->with('pesan', 'Data pegawai berhasil diupdate.');
        } catch (\Exception $e) {
            // Tangkap exception jika ada kesalahan
            Session::put('success', false);
            return redirect()->back()->with('pesan', 'Update data pegawai gagal: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($data_id)
    {
        try {
            $pegawai = DataPegawai::findOrFail($data_id);

            // Hapus foto jika ada
            if ($pegawai->foto) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $pegawai->foto));
            }

            // Hapus data pegawai
            $pegawai->delete();

            Session::put('success', true);
            return redirect()->route('dashboard')->with('pesan', 'Data pegawai berhasil dihapus.');
        } catch (\Exception $e) {
            Session::put('success', false);
            return redirect()->back()->with('pesan', 'Penghapusan data pegawai gagal: ' . $e->getMessage());
        }
    }
}
