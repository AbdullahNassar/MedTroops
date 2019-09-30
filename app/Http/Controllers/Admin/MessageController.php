<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;
use App\Order;


class MessageController extends Controller {
	
    public function getIndex() {
        $objects = Message::get();
        return view('admin.pages.message', compact('objects'));
    }

    public function order() {
        $objects = Order::get();
        return view('admin.pages.orders', compact('objects'));
    }

}
