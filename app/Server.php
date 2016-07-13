<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Mockery\CountValidator\Exception;
use App\libraries\TeamSpeak3\Ts3admin;

class Server extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ip', 'hostname', 'port', 'username', 'password', 'created_at', 'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [  ];

    public $instance = NULL;

    public $hostInfo = array();
    public $instanceInfo = array();
    public $success = false;
    public $serverInfo = array();

    public $version = array();

    public function connect()
    {
        try
        {

            $this->instance = new Ts3admin($this->ip, $this->port);
            $this->instance->connect();
            if( ! $this->instance->login($this->username, $this->password)) throw new \Exception('Bad username/password');

            if(count($this->instance->getDebugLog()) == 0) $this->success = true;

            $this->hostInfo = $this->instance->hostInfo()['data'];
            $this->instanceInfo = $this->instance->instanceInfo()['data'];
            $this->serverInfo = $this->instance->serverInfo()['data'];
            $this->version = $this->instance->version()['data'];
        }
        catch (Exception $e)
        {
            $this->instance = NULL;
        }
    }
}
