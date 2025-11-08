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

    public function export(Request $request)
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

        $contacts = $query->with('category')->get();

        $filename = 'contacts_' . date('YmdHis') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($contacts) {
            $file = fopen('php://output', 'w');
            fputs($file, "\xEF\xBB\xBF");

            fputcsv($file, ['お名前', '性別', 'メールアドレス', '電話番号', '住所', '建物名', 'お問い合わせの種類', 'お問い合わせ内容']);

            foreach ($contacts as $contact) {
                $genderLabel = $contact->gender == 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他');

                fputcsv($file, [
                    $contact->last_name . ' ' . $contact->first_name,
                    $genderLabel,
                    $contact->email,
                    $contact->tel,
                    $contact->address,
                    $contact->building ?? '',
                    $contact->category->content ?? '',
                    $contact->detail,
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
