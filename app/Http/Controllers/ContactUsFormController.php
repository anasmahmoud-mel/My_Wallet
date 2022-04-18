<?php




use Illuminate\Support\Facades\Mail;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use app\Http\Mail;

use Illuminate\Support\Facades\DB;

class ContactUsFormController extends Controller
{
    // Create Contact Form
    public function index ()
    {

    }
    // Store Contact Form data
    public function create()
    {
        // Form validation



       return view('home.contact');



    }
    public function store(Request $request)
    {
       Contact::create($request->all());

        return redirect('/index');
    }
    public function show(Contact $contact)
    {
        $contact = Contact::get()->all();
        return view('dashboard_view.contact.index', compact('contact'));
    }
    public function delete_user(Request $request)
    {
        $booking = DB::table('contacts')->where('id', $request->id)->delete();
        return response()->json(
            [
                'success' => true,
                'message' => 'Data Deleted'
            ]
        );
        return redirect('/Dashboard/User/Create');
    }

    public function views($id)
    {
        $contact = Contact::find($id);

        return view('dashboard_view.contact.view', compact('contact'));
    }
}
