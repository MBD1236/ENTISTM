<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Services\EmailService;

class NewsletterController extends Controller
{
    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function subscribe(Request $request)
    {
        $request->validate(['email' => 'required|email|unique:subscribers']);

        Subscriber::create(['email' => $request->email]);

        $unsubscribeLink = route('unsubscribe', ['email' => $request->email]);

        $this->emailService->sendWelcomeEmail($request->email, $unsubscribeLink);

        return redirect()->back()->with('info', 'Vous vous êtes abonné à la newsletter !');
    }

    public function unsubscribe($email)
    {
        $subscriber = Subscriber::where('email', $email)->first();

        if ($subscriber) {
            $subscriber->delete();
            
            $emailService = new EmailService();
            $emailService->sendUnsubscribeConfirmation($subscriber->email);

            return redirect()->route('front.accueil')->with('info', 'Vous vous êtes désabonné à la newsletter !');
        }

        return redirect()->back()->with('error', 'Email introuvable !');
    }

    public function create(): View
    {
        return view('front-office-back.newsletter.create');
    }

    public function show(Subscriber $subscriber): View
    {
        $subscribers = Subscriber::paginate(10);
        return view('front-office-back.newsletter.show', compact('subscribers'));
    }

    public function sendNewsletter(Request $request)
    {
        $request->validate(['subject' => 'required', 'message' => 'required']);

        $subscribers = Subscriber::all();

        foreach ($subscribers as $subscriber) {
            $unsubscribeLink = route('unsubscribe', ['email' => $subscriber->email]);
            $this->emailService->sendNewsletter($request->subject, $request->message, $subscriber->email, $unsubscribeLink);
        }

        return redirect()->back()->with('info', 'La newsletter a été envoyée avec succès !');
    }
}
