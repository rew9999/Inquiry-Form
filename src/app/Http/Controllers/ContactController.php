<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $genders = Contact::GENDERS;

        $inputs = $request->all();

        return view('contact', compact('categories', 'genders', 'inputs'));
    }

    public function confirm(ContactRequest $request)
    {
        $validated = $request->validated();
        
        $category = Category::find($request->category_id);
        $genderLabel = Contact::GENDERS[$request->gender];
        
        $tel = $request->tel_part1 . '-' . $request->tel_part2 . '-' . $request->tel_part3;
        
        return view('confirm', compact('validated', 'category', 'genderLabel', 'tel'));
    }

    public function store(Request $request)
    {
        $data = $request->except(['tel_part1', 'tel_part2', 'tel_part3']);
        $data['tel'] = $request->tel_part1 . '-' . $request->tel_part2 . '-' . $request->tel_part3;
        
        Contact::create($data);
        
        return redirect()->route('thanks');
    }

    public function thanks()
    {
        return view('thanks');
    }
}
