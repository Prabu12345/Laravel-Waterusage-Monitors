<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    /**
     * Show the homepage.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('homepage.home');
    }
    /**
     * Show the about page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function about()
    {
        return view('homepage.about');
    }
    /**
     * Show the contact page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact()
    {
        return view('homepage.contact');
    }

    /**
     * Handle contact form submission.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string|max:2000',
        ]);

        return redirect()->back()->with('status', 'Pesan Anda telah dikirim melalui email. Terima kasih telah menghubungi kami!');
    }

    /**
     * Show the detail1 page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function detail1()
    {
        return view('homepage.detail1');
    }
    /**
     * Show the detail2 page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function detail2()
    {
        return view('homepage.detail2');
    }
    /**
     * Show the detail3 page.
     *  * @return \Illuminate\Contracts\Support\Renderable
     */
    public function detail3()
    {
        return view('homepage.detail3');
    }
    /**
     * Show the detail4 page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function detail4()
    {
        return view('homepage.detail4');
    }
}
