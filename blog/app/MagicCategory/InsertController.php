<?php

namespace App\MagicCategory;

use App\Http\Controllers\Controller;
use App\Models\Books;
use App\Models\Reader;
use Illuminate\Http\Request;

class InsertController extends Controller{

    public function insertReader(Request $req){
        $contact = new Reader();
        $contact->setConnection('mysql2');
        $contact->last_name = $req->input('last_name');
        $contact->first_name = $req->input('first_name');

        $contact->save();

        return redirect()->route('books')->with('success', 'Читатель добавлен');
    }

    public function insertBook(Request $req){
        $contact = new Books();
        $contact->setConnection('mysql2');
        $contact->reader_id = 1;
        $contact->book_id = 5;
        $contact->taken_at = "2020-08-23 18:48:24";
        $contact->returned_at = "2020-09-23 18:48:24";

        $contact->save();

        return redirect()->route('readers')->with('success', 'Запись добавлена');
    }
}
