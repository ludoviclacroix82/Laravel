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
        'created_at',
        'archive'
    ];

    public function getInboxCount($user_id = null)
    {
        return $this->where('receiver_id', $user_id)->count();
    }
    
    /**
     * getInbox -> load Inbox en focntion des prama
     *
     * @param  mixed $field 
     * @param  mixed $user_id
     * @param  mixed $paginate
     * @param  mixed $fieldOrder OrderBy Field
     * @param  mixed $orderDirection OrderBy direction ASC / DESC 
     * @return void
     */
    public function getInbox(string $field, int $user_id = null, int $paginate = null, string $fieldOrder = 'id', string $orderDirection = 'ASC')
    {
        $action = ($field === 'sender_id')?'receiver_id':'sender_id';
        $datas = $this
            ->where($field, $user_id)
            ->where('archive',0)
            ->orderBy($fieldOrder,$orderDirection)
            ->paginate($paginate);

        foreach($datas as $data){
            $data['user'] = User::find($data[$field]);
            $data['is_read'] = ($data['is_read'] === 0 )?'unread':'read';
        }

        foreach($datas as $data){
            $data['user']= user::find($data[$action])->name;
        }
        return $datas;
    }
    
    public function putIsRead($datas){

        $datas->update([
            'is_read'=> true
        ]);
    }

    public function putIsArchive($datas){

        $datas->update([
            'archive'=> true
        ]);
    }
}
