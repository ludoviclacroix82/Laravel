<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    use HasFactory;
    public $table = 'inboxes';

    public $fillable = [
        'sender_id',
        'receiver_id',
        'subject',
        'body',
        'is_read',
        'updated_at',
        'created_at'
    ];

    public function getInboxCount($user_id = null)
    {
        return $this->where('receiver_id', $user_id)->count();
    }

    public function getInbox($field, $user_id = null,$paginate = null)
    {
        $action = ($field === 'sender_id')?'receiver_id':'sender_id';
        $datas = $this->where($field, $user_id)->paginate($paginate);

        foreach($datas as $data){
            $data['user']= user::find($data[$action])->name;
        }
        return $datas;
    }
    
}
