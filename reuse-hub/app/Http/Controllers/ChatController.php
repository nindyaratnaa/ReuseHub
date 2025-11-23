<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Item;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string'
        ]);
        
        $message = Message::create([
            'item_id' => $request->item_id,
            'sender_id' => auth()->id(),
            'receiver_id' => $request->receiver_id,
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
                'created_at' => $message->created_at->diffForHumans(),
                'timestamp' => $message->created_at->toIso8601String()
            ]
        ]);
    }

    public function getMessages(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'other_user_id' => 'required|exists:users,id',
            'last_id' => 'nullable|integer'
        ]);

        $query = Message::where('item_id', $request->item_id)
            ->where(function($q) use ($request) {
                $q->where(function($query) use ($request) {
                    $query->where('sender_id', auth()->id())
                          ->where('receiver_id', $request->other_user_id);
                })->orWhere(function($query) use ($request) {
                    $query->where('sender_id', $request->other_user_id)
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
                    'created_at' => $msg->created_at->diffForHumans(),
                    'timestamp' => $msg->created_at->toIso8601String()
                ];
            })
        ]);
    }

    public function getChatList()
    {
        $userId = auth()->id();
        
        $chats = Message::select('item_id', DB::raw('MAX(id) as last_message_id'))
            ->where(function($q) use ($userId) {
                $q->where('sender_id', $userId)
                  ->orWhere('receiver_id', $userId);
            })
            ->groupBy('item_id')
            ->get()
            ->map(function($chat) use ($userId) {
                $lastMessage = Message::with(['sender', 'receiver', 'item.user'])
                    ->find($chat->last_message_id);
                
                if (!$lastMessage) return null;
                
                $otherUserId = $lastMessage->sender_id === $userId ? 
                    $lastMessage->receiver_id : $lastMessage->sender_id;
                $otherUser = $lastMessage->sender_id === $userId ? 
                    $lastMessage->receiver : $lastMessage->sender;
                
                return [
                    'item_id' => $lastMessage->item_id,
                    'item_name' => $lastMessage->item->nama_barang,
                    'item_image' => $lastMessage->item->foto ? 
                        (str_starts_with($lastMessage->item->foto, 'http') ? 
                            $lastMessage->item->foto : 
                            asset('storage/'.$lastMessage->item->foto)) : 
                        'https://via.placeholder.com/100',
                    'other_user' => [
                        'id' => $otherUserId,
                        'name' => $otherUser->name,
                        'initials' => strtoupper(substr($otherUser->name, 0, 2))
                    ],
                    'last_message' => $lastMessage->message,
                    'timestamp' => $lastMessage->created_at->toIso8601String(),
                    'created_at' => $lastMessage->created_at->diffForHumans()
                ];
            })
            ->filter()
            ->sortByDesc('timestamp')
            ->values();

        return response()->json([
            'success' => true,
            'chats' => $chats
        ]);
    }
}
