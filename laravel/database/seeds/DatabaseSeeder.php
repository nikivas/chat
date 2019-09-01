<?php

use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Chat;
use \App\Models\Message;
use \App\Models\ChatUsers;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create(['username' => 'user1']);
        $user2 = User::create(['username' => 'user2']);

        $chat1 = Chat::create(['name'=> 'chat1']);
        $chat2 = Chat::create(['name'=> 'chat2']);

        ChatUsers::create(['user_id'=>$user1->id, 'chat_id' => $chat1->id]);
        ChatUsers::create(['user_id'=>$user2->id, 'chat_id' => $chat1->id]);

        ChatUsers::create(['user_id'=>$user1->id, 'chat_id' => $chat2->id]);

        Message::create([
            'user_id' => $user1->id, 
            'chat_id' => $chat1->id, 
            'text' => 'text'
        ]);
        Message::create([
            'user_id' => $user2->id, 
            'chat_id' => $chat1->id,
            'text' => 'text'
        ]);
        Message::create([
            'user_id' => $user1->id, 
            'chat_id' => $chat2->id, 
            'text' => 'text'
        ]);
        Message::create([
            'user_id' => $user1->id, 
            'chat_id' => $chat1->id, 
            'text' => 'text'
        ]);

        
        
    }
}
