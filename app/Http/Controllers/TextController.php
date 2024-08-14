<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TextController extends Controller
{
    public  function extractText(Request $request)
    {
        $text = 'https://youtu.be/waVZOKg7ghc?si=MKHyKvGe4QKPYoZL';
        $startWord = 'e/';
        $endWord = '?s';

        $result = $this->getTextBetweenWords($text, $startWord, $endWord);


        return redirect()->route('show')->with('data', $result);
        /* return view('videos', compact('result')); */
    }

    private function getTextBetweenWords($text, $startWord, $endWord)
    {
        $startPos = strpos($text, $startWord);
        if ($startPos === false) {
            return ''; // الكلمة البداية غير موجودة
        }
        $startPos += strlen($startWord); // تجاوز الكلمة البداية

        $endPos = strpos($text, $endWord, $startPos);
        if ($endPos === false) {
            return ''; // الكلمة النهاية غير موجودة
        }

        $length = $endPos - $startPos;
        return substr($text, $startPos, $length);
    }
}
