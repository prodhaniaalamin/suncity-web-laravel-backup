<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    // Create Contact Form
    public function createForm(Request $request)
    {
        return view('website.contact.contact');
    }

    // Store Contact Form data
    public function ContactUsForm(Request $request)
    {

        // Form validation
        $this->validate($request, [
            'name' => 'required',
//            'email' => 'required|email',
            //            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
//            'subject' => 'required',
            'message' => 'required'
        ]);

        //  Store data in database
        Contact::create($request->all());

        //  Send mail to admin
//        Mail::send('website.contact.mail', array(
//            'name' => $request->get('name'),
//            'email' => $request->get('email'),
//            'phone' => $request->get('phone'),
//            'subject' => $request->get('subject'),
//            'user_query' => $request->get('message'),
//        ), function ($message) use ($request) {
//            $message->from($request->email);
//            $message->to('info@nsmadh.com', 'Admin')->subject($request->get('subject'));
//        });

        //        return back()->with('success', 'We have received your message and would like to thank you for writing to us.');

        // Only process POST reqeusts.
        if (true) {
            // Get the form fields and remove whitespace.
            $name = strip_tags(trim($_POST["name"]));
            $type = strip_tags(trim($_POST["type"]));
            $name = str_replace(array("\r","\n"),array(" "," "),$name);
            $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
            $phone = trim($_POST["phone"]);
            $subject = trim($_POST["subject"]);
            $message = trim($_POST["message"]);

            // Check that data was sent to the mailer.
            if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // Set a 400 (bad request) response code and exit.
                http_response_code(400);
                echo "Oops! There was a problem with your submission. Please complete the form and try again.";
                exit;
            }

            // Set the recipient email address.
            // FIXME: Update this to your desired email address.
            $recipient = "info@suncitypolyclinicsa.com";

            // Set the email subject.
//            $subject = "New contact from $name";

            // Build the email content.
            $email_content = "Name: $name\n";
            $email_content .= "Type: $type\n";
            $email_content .= "Email: $email\n";
            $email_content .= "Phone: $phone\n";
            $email_content .= "Subject: $subject\n";
            $email_content .= "Message:\n$message\n";

            // Build the email headers.
            $email_headers = "From: $name <$email>";

            // Send the email.
//            if (true) {
            if (mail($recipient, $subject, $email_content, $email_headers)) {
                // Set a 200 (okay) response code.
                http_response_code(200);
                echo "Thank You! Your message has been sent to Administrator.";
            } else {
                // Set a 500 (internal server error) response code.
                http_response_code(500);
                echo "Oops! Something went wrong and we couldn't send your message.";
            }

        } else {
            // Not a POST request, set a 403 (forbidden) response code.
            http_response_code(403);
            echo "There was a problem with your submission, please try again.";
        }


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.contacts.contact-list', ['contactList' => Contact::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form validation
        $this->validate($request, [
            'image' => 'required'
        ]);

        $inputs = $request->all();
        $inputs['user_id'] = user()->id;
        $inputs['image'] = $this->fileUploadHandle('contact-images', false, 'image');
        Contact::create($inputs);
        return back()->withSuccess('Contact is successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        $statuses = ['Inactivated', 'Activated'];
        $contact->status = $contact->status > 0 ? 0 : 1;
        return $contact->update() ? session()->flash('success', "Partner post is successfully {$statuses[$contact->status]}.") : 0;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        // Form validation
        $this->validate($request, [
            'image' => 'required'
        ]);

        $inputs = $request->all();
        $inputs['image'] = $this->fileUploadHandle('contact-images', $contact->image, 'image');
        $contact->update($inputs);
        return back()->withSuccess('Contact is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        return $contact->delete() ? session()->flash('success', 'Contact is successfully deleted.') : 0;
    }
}
