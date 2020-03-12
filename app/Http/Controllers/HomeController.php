<?php


namespace App\Http\Controllers;


use App\Models\Message;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function chat()
    {
        $messages = Message::all();
        return response()->json($messages);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function postMessage(Request $request)
    {
        file_put_contents(base_path() . '/storage/logs/newlog.log', print_r($request->all(), true), FILE_APPEND);

        if ($request->filled('sendbox')) {
            (new Message(['text' => $request->sendbox]))->save();
            return response('ok', 200);
        }
        return response('error', 400);
    }
}
