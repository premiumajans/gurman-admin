<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Content;
use App\Models\Partner;
use App\Models\Slider;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Spatie\Sitemap\SitemapGenerator;

class HomeController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        $sliders = Slider::where('status', 1)->orderBy('order', 'asc')->get();
        $carouselCategories = Category::where('parent_id', '<>', null)
            ->where('is_home', 1)
            ->with('content')
            ->has('content', '>=', 3)
            ->get();
        return view('frontend.index', get_defined_vars());

    }

    public function search(Request $request)
    {
        $categoryID = $request->category;
        $keyword = $request->keyword;
        $category = Category::where('id', $categoryID)->with('content')->first();
        $contents = Content::when($keyword, function ($query) use ($keyword) {
            return $query->orWhere('slug', 'LIKE', '%' . $keyword . '%')
                ->orWhereTranslation('name', 'LIKE', '%' . $keyword . '%')
                ->orWhereTranslation('content', 'LIKE', '%' . $keyword . '%')
                ->orWhereTranslation('meta_description', 'LIKE', '%' . $keyword . '%')
                ->orWhereTranslation('meta_title', 'LIKE', '%' . $keyword . '%')
                ->orWhereTranslation('alt', 'LIKE', '%' . $keyword . '%');
        })
            ->where('category_id', $categoryID)
            ->paginate(9);
        return view('frontend.content.index', get_defined_vars());
    }

    public function searchByKeyword(Request $request)
    {
        $keyword = $request->keyword;
        $contents = Content::where('slug', 'LIKE', '%' . $keyword . '%')
            ->orWhereTranslation('name', 'LIKE', '%' . $keyword . '%')
            ->orWhereTranslation('content', 'LIKE', '%' . $keyword . '%')
            ->orWhereTranslation('meta_description', 'LIKE', '%' . $keyword . '%')
            ->orWhereTranslation('meta_title', 'LIKE', '%' . $keyword . '%')
            ->orWhereTranslation('alt', 'LIKE', '%' . $keyword . '%')
            ->paginate(9);
        return view('frontend.content.search',get_defined_vars());
    }

    public function sendMessage(Request $request)
    {
        try {
            $receiver = settings('mail_receiver');
            $contact = new Contact();
            $contact->name = $request->name;
            $contact->phone = $request->phone;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->read_status = 0;
            $contact->message = $request->message;
            $contact->save();
            $data = [
                'name' => $contact->name,
                'phone' => $contact->phone,
                'email' => $contact->email,
                'subject' => $contact->subject,
                'msg' => $contact->message
            ];
            Mail::send('backend.mail.send', $data, function ($message) use ($receiver) {
                $message->to($receiver);
                $message->subject(__('backend.you-have-new-message'));
            });
            alert()->success(__('messages.success'));
            return redirect(route('frontend.contact-us-page'));
        } catch (Exception $e) {
            alert()->error(__('backend.error'));
            return redirect(route('frontend.contact-us-page'));
        }
    }
}
