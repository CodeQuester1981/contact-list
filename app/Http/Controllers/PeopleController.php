<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;
use App\Rules\CustomValidation;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\QueryException;

class PeopleController extends Controller
{
    public function index() {
        if (!auth()->check()) {
            return redirect('/register');
        }

        $user = Auth::user();

        $people = People::where('user_id', $user->id)
        ->orderBy('name')
        ->filter(request(['search']))
        ->paginate(9);


        return view('people.index', compact('people'));
    }

    public function show(People $person) {
        return view('people.show', [
            'person' => $person
        ]);
    }

    public function create() {
        return view('people.create');
    }

    public function store(Request $request) {
        try {
            $userId = auth()->user()->id;
            info('User ID: ' . $userId);
            $formFields = $request->validate([
                'name' => 'required',
                'surname' => 'required',
                'id_number' => ['required', Rule::unique('people', 'id_number')],
                'mobile_number' => ['required', Rule::unique('people', 'mobile_number')],
                'email' => ['required', 'email'],
                'language' => 'required|array',
                'interests' => 'required|array',
            ]);
            $formFields['user_id'] = $userId;
            $formFields['language'] = implode(',', $request->input('language'));
            $formFields['interests'] = implode(',', $request->input('interests'));
    
            $createdContact = People::create($formFields);
            Log::info('Contact created: ' . json_encode($createdContact));
    
            $newContactEmail = $createdContact->email;
            $newContactName = $createdContact->name;
    
            Mail::send('emails.contact-added', $createdContact->toArray(), function($message) use ($newContactEmail, $newContactName) {
                $message
                    ->to($newContactEmail, $newContactName)
                    ->from('mail.trap@gmail.com', 'MailTrap')
                    ->subject("You've been added to our Contact List");
            });
    
            return redirect('/')->with('message', 'Contact Created');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->withInput()->withErrors(['error' => 'An error occurred while creating the contact.']);
        }
    }

    public function edit(People $person) {
        return view('people.edit', ['person' => $person]);
    }

    public function update(Request $request, People $person) {
        
        $formFields = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'id_number' => ['required', new CustomValidation],
            'mobile_number' => ['required', new CustomValidation],
            'email' => ['required', 'email'],
        ]);

        $person->update($formFields);

        return redirect('/')->with('message', 'Contact Updated');
    }

    public function delete (People $person) {
        if ($person->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
    
        $person->delete(); // Perform a soft delete
        return redirect('/')->with('message', 'Contact Deleted');
    }
}
