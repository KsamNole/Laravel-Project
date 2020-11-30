<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function submit(ContactRequest $req) {
        $contact = new Contact();
        $contact->name = $req->input('name');
        $contact->creator = $req->user()->name;
        $contact->email = $req->input('email');
        $contact->subject = $req->input('subject');
        $contact->message = $req->input('message');

        $contact->save();

        return redirect()->route('home')->with('success', 'Задание было создано');
    }

    public function allData() {
        $contact = new Contact;
        return view('messages', ['data' => $contact->all()]); // Передаем все записи из бд
    }

    public function showOneMessage($id){
        $contact = new Contact;
        return  view('one-message', ['data' => $contact->find($id)]);
    }

    public function updateMessage($id){
        $contact = new Contact;
        return  view('update-message', ['data' => $contact->find($id)]);
    }

    public function updateMessageSubmit($id, ContactRequest $req) {
        $contact = Contact::find($id);
        $contact->name = $req->input('name');
        $contact->creator = $req->user()->name;
        $contact->email = $req->input('email');
        $contact->subject = $req->input('subject');
        $contact->message = $req->input('message');

        $contact->save();

        return redirect()->route('contact-data-one', $id)->with('success', 'Данные обновлены');
    }

    public function deleteMessage($id){
        Contact::find($id)->delete();
        return redirect()->route('contact-data', $id)->with('success', 'Задача удалена');
    }

    public function updateMessageStatus($id, Request $req) {
        $contact = Contact::find($id);
        $contact->status = $req->input('status');

        $contact->save();

        return redirect()->route('contact-data', $id)->with('success', 'Статус обновлен');
    }
}
