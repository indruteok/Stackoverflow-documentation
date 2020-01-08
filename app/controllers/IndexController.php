<?php

namespace App\Controllers;

use App\Core\Config;
use App\Topic;

class indexController extends Controller
{

    public function __construct()
    {
        // Home Controller
    }

    public function index()
    {
        $topics = Topic::select('topics.*, doctags.tag as tag')->join('doctags', 'doctags.Id', '=', 'topics.DocTagId')->groupBy('topics.Id')->limit(10)->getAll();
        $this->view('index', ["topics" => $topics, "title" => Config::get('config', 'name')]);
    }
}
