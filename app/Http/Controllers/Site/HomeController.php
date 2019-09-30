<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slider;
use App\Service;
use App\Special;
use App\Area;
use App\Post;
use App\Cat;
use App\Data;
use App\Contact;
use Config;
use DB;

class HomeController extends Controller
{
    public function getIndex() {
        $departments = Special::where('active', 1)->get();
        $sliders = Slider::where('active', 1)->get();
        $services = Service::where('active', 1)->get();
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.home.home', compact('departments','sliders','services','data','contact'));
    }

    public function about() {
        $departments = Special::where('active', 1)->get();
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.about.index', compact('departments','data','contact'));
    }

    public function services() {
        $departments = Special::where('active', 1)->get();
        $services = Service::where('active', 1)->get();
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.services.index', compact('departments','services','data','contact'));
    }

    public function departments() {
        $departments = Special::where('active', 1)->get();
        $specials = Special::where('active', 1)->get();
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.departments.index', compact('departments','specials','data','contact'));
    }

    
    
    public function blog() {
        $departments = Special::where('active', 1)->get();
        $posts = Post::where('active', 1)->get();
        $cats = Cat::where('active', 1)->get();
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.blog.index', compact('departments','posts','cats','data','contact'));
    }

    public function getPost($id) {
        $departments = Special::where('active', 1)->get();
        $post = Post::find($id);
        $posts = Post::where('active', 1)->get();
        $cats = Cat::where('active', 1)->get();
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.post.index', compact('departments','post','posts','cats','data','contact'));
    }
    
    public function contact() {
        $departments = Special::where('active', 1)->get();
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.contact.index', compact('departments','data','contact'));
    }

    public function error() {
        $departments = Special::where('active', 1)->get();
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.error.index', compact('departments','data','contact'));
    }
}
