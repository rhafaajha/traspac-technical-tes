<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Artikel::all();

        // Memproses artikel untuk memisahkan paragraf
        foreach ($data as $artikel) {
            // Memisahkan teks artikel berdasarkan baris kosong
            $artikel->paragraphs = explode("\n", $artikel->artikel);
        }

        return view('soal2.index', compact('data'));
    }

    public function searchWord(Request $request)
    {
        $keyword = $request->input('keyword');
        $data = Artikel::all();
        $results = [];

        foreach ($data as $artikel) {
            $count = substr_count(strtolower($artikel->artikel), strtolower($keyword));
            if ($count > 0) {
                $results[] = [
                    'artikel' => $artikel,
                    'count' => $count
                ];
            }
        }

        return view('soal2.search_results', compact('results', 'keyword'));
    }

    // public function replaceWord(Request $request)
    // {
    //     $find = $request->input('find');
    //     $replace = $request->input('replace');
    //     $data = Artikel::all();

    //     foreach ($data as $artikel) {
    //         $artikel->artikel = str_replace($find, $replace, $artikel->artikel);
    //     }

    //     return view('soal2.replace_results', compact('data', 'find', 'replace'));
    // }

    public function replaceWord(Request $request)
    {
        $find = $request->input('find');
        $replace = $request->input('replace');
        $data = Artikel::all();

        foreach ($data as $artikel) {
            // Gunakan preg_replace_callback untuk penggantian kata dan highlight
            $artikel->artikel = preg_replace_callback(
                '/' . preg_quote($find, '/') . '/i',
                function ($matches) use ($replace) {
                    // Highlight kata yang diganti
                    return "<span class='highlight'>" . $replace . "</span>";
                },
                $artikel->artikel
            );
        }

        return view('soal2.replace_results', compact('data', 'find', 'replace'));
    }

    // public function sortWords()
    // {
    //     $data = Artikel::all();
    //     $sortedWords = [];

    //     foreach ($data as $artikel) {
    //         // Mengambil semua kata dalam artikel, mengurutkannya, dan menyimpan dalam array
    //         $words = preg_split('/\s+/', $artikel->artikel);
    //         $words = array_map('strtolower', $words);  // Mengubah kata menjadi huruf kecil
    //         sort($words, SORT_STRING);
    //         $sortedWords[] = [
    //             'artikel' => $artikel,
    //             'sorted' => $words
    //         ];
    //     }

    //     return view('soal2.sorted_words', compact('sortedWords'));
    // }

    public function sortWords()
    {
        $data = Artikel::all();
        $wordCounts = [];

        foreach ($data as $artikel) {
            // Mengambil semua kata dalam artikel
            $words = preg_split('/\s+/', $artikel->artikel);
            $words = array_map('strtolower', $words);  // Mengubah kata menjadi huruf kecil

            // Menghitung frekuensi setiap kata
            foreach ($words as $word) {
                if (isset($wordCounts[$word])) {
                    $wordCounts[$word]++;
                } else {
                    $wordCounts[$word] = 1;
                }
            }
        }

        // Mengurutkan kata-kata berdasarkan abjad
        ksort($wordCounts);

        return view('soal2.sorted_words', ['wordCounts' => $wordCounts]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artikel $artikel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artikel $artikel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artikel $artikel)
    {
        //
    }
}
