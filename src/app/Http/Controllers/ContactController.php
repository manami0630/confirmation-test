<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('index', compact('categories'));
    }
    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['category_id','last_name','first_name','gender', 'email', 'address','building', 'detail']);

        $contact['tel'] = $request->tel1.$request->tel2. $request->tel3;


        return view('confirm', compact('contact'));
    }
    public function store(ContactRequest $request)
    {
        $contact = $request->only(['category_id','last_name','first_name','gender', 'email', 'address','building', 'detail']);

        $contact['tel'] = $request->tel1.$request->tel2. $request->tel3;
        Contact::create($contact);
        return view('thanks');
    }
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.admin')->with('success', '連絡先が削除されました。');
    }
    public function admin(Request $request)
    {
        $query = Contact::query();

            if ($request->filled('search')) {
            $searchTerm = $request->input('search');
            $query->where(function($q) use ($searchTerm) {
            $q->where('last_name', 'like', '%' . $searchTerm . '%')
                ->orWhere('email', 'like', '%' . $searchTerm . '%')
                ->orWhere('first_name', 'like', '%' . $searchTerm . '%');
            });
        }

            $contacts = $query->paginate(7);

            return view('admin', compact('contacts'));
    }
}
