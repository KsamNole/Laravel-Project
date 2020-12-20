<?php

namespace App\MagicCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\InsertRequest;
use App\Models\Books;
use App\Models\Reader;
use Illuminate\Http\Request;

class InsertController extends Controller{

    public function insertReader(InsertRequest $req){
        $contact = new Reader();
        $contact->setConnection('mysql2');
        $contact->last_name = $req->input('last_name');
        $contact->first_name = $req->input('first_name');

        $contact->save();

        return redirect()->route('readers')->with('success', 'Читатель добавлен');
    }

    public function insertBook(InsertRequest $req){
        $contact = new Books();
        $contact->setConnection('mysql2');
        $contact->reader_id = $req->input('name');
        $contact->book_id = $req->input('book');
        if ($req->input('take') == 1){
            $contact->taken_at = date("Y-m-d H:i:s");
            $contact->returned_at = Null;
        }
        else{
            $contact->taken_at = Books::on('mysql2')->get()->where('reader_id', $req->input('name'))
            ->where('book_id', $req->input('book'))->last()->taken_at;
            $contact->returned_at = date("Y-m-d H:i:s");
        }


        $contact->save();

        return redirect()->route('books')->with('success', 'Запись добавлена');
    }
}
