<?php namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Entity\Article;
use Illuminate\Http\Request;
use App\Http\Requests;
use Mail;

class PagesController extends Controller {

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function AboutUs()
	{
	$article = Article::where('category_id', '=', 'page')->where('title', '=', 'about us')->first();
	$article1 = Article::where('category_id', '=', 'page')->where('title', '=', 'about us 2')->first();
	$article2 = Article::where('category_id', '=', 'page')->where('title', '=', 'about us 3')->first();
	//dd($article1);
        return view('pages.about-us', compact('article', 'article1', 'article2'));
	}

    public function Faqs()
    {
        
        $articles = Article::where('category_id', '=', 'faq')->get();
        //dd($articles);
        return view('pages.faqs', compact('articles'));
    }

    public function ContactUs()
    {
        return view('pages.contact-us');
    }
    
    public function ContactUsMail(Request $request)
    {
        $mail_details = array('name'=>$request->name, 'email'=> 'momentote@gmail.com', 'c_message' => $request->message, 'client_email' => $request->email);

        Mail::send('emails.clientEmail', $mail_details, function($message) use ($mail_details)
        {
            $message->to($mail_details['email'], $mail_details['name'])->subject('Message From Client');
        });
        return redirect()->back();
    }

    public function Policy()
    {
        $articles = Article::where('category_id', '=', 'policy')->get();
        //dd($articles);
        return view('pages.policy', compact('articles'));
    }
}