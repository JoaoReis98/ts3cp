<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Server;
use App\libraries\TeamSpeak3\Ts3admin;

class VirtualServer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'server_id', 'port', 'max_slots', 'created_at', 'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [  ];

    public $instance = NULL;
    public $server = NULL;

    public $serverInfo = NULL;
    public $hostInfo = NULL;

    public function connect()
    {
        $this->server = new Server();
        $this->server = $this->server->find(array('id' => $this->server_id))->first();
        $this->server->connect();

        if($this->server->instance == NULL) throw new \Exception('Server offline!');
        $this->instance = $this->server->instance;
        $this->instance->selectServer($this->port, 'port', false);
        $this->serverInfo = $this->instance->serverInfo()['data'];
        $this->hostInfo = $this->instance->hostInfo()['data'];
    }


    public function getClientList()
    {
        if($this->instance === NULL) $this->connect();
        $clients = array();
        foreach($this->instance->clientList()['data'] as $client)
        {
            if($client['client_type'] != 0) continue;
            #echo
            $tmp = $this->server->instance->clientInfo($client['clid'])['data'];
            $tmp_im = $this->server->instance->clientAvatar($tmp['client_unique_identifier'])['data'];
            if(empty($tmp_im)) $tmp_im = NULL;
            $tmp = array_merge($tmp, array("client_avatar" => $tmp_im ));
            $clients[] = $tmp;
        }
        return $clients;
    }

    public function getSlots()
    {
        if($this->instance === NULL) $this->connect();
        return $this->serverInfo['virtualserver_clientsonline'];
    }

    public function getMaxSlots()
    {
        if($this->instance === NULL) $this->connect();
        return $this->serverInfo['virtualserver_maxclients'];
    }
}
