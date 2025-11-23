<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Item;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'message' => 'required|string'
        ]);

        $item = Item::findOrFail($request->item_id);
        
        $message = Message::create([
            'item_id' => $request->item_id,
            'sender_id' => auth()->id(),
            'receiver_id' => $item->user_id,
            'message' => $request->message
        ]);

        return response()->json([
            'success' => true,
            'message' => [
                'id' => $message->id,
                'message' => $message->message,
                'sender_id' => $message->sender_id,
                'sender_name' => auth()->user()->name,
                'sender_initials' => strtoupper(substr(auth()->user()->name, 0, 2)),
                'created_at' => $message->created_at->diffForHumans()
            ]
        ]);
    }

    public function getMessages(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'last_id' => 'nullable|integer'
        ]);

        $item = Item::findOrFail($request->item_id);
        $query = Message::where('item_id', $request->item_id)
            ->where(function($q) use ($item) {
                $q->where(function($query) use ($item) {
                    $query->where('sender_id', auth()->id())
                          ->where('receiver_id', $item->user_id);
                })->orWhere(function($query) use ($item) {
                    $query->where('sender_id', $item->user_id)
                          ->where('receiver_id', auth()->id());
                });
            })
            ->with('sender');

        if ($request->last_id) {
            $query->where('id', '>', $request->last_id);
        }

        $messages = $query->orderBy('created_at', 'asc')->get();

        return response()->json([
            'success' => true,
            'messages' => $messages->map(function($msg) {
                return [
                    'id' => $msg->id,
                    'message' => $msg->message,
                    'sender_id' => $msg->sender_id,
                    'sender_name' => $msg->sender->name,
                    'sender_initials' => strtoupper(substr($msg->sender->name, 0, 2)),
                    'created_at' => $msg->created_at->diffForHumans()
                ];
            })
        ]);
    }
}
