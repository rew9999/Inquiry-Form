<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class AdminController extends Controller
{
    public function admin()
    {
        $contacts = Contact::paginate(8);
        return view('admin', ['contacts' => $contacts]);
    }

    public function search(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where(function($q) use ($keyword) {
                $q->where('first_name', 'like', "%{$keyword}%")
                  ->orWhere('last_name', 'like', "%{$keyword}%")
                  ->orWhere('email', 'like', "%{$keyword}%");
            });
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->paginate(7)->withQueryString();

        return view('admin', ['contacts' => $contacts]);
    }

    public function reset()
    {
        return redirect('/admin');
    }

    public function delete(Request $request)
    {
        $contact = Contact::find($request->id);

        if ($contact) {
            $contact->delete();
        }

        return redirect('/admin')->with('success', 'お問い合わせを削除しました。');
    }
}
