<?php
/**
 * Created by PhpStorm.
 * Date: 6/28/17
 * Time: 1:23 AM
 */

namespace App\Models;


use BaoPham\DynamoDb\DynamoDbModel;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class DynamoDbUser extends DynamoDbModel implements Authenticatable
{
    use SoftDeletes;

    protected $table = 'Datachase';
    protected $guarded = [];



    public function getAuthIdentifierName()
    {
        return $this->username;
    }

    public function getAuthIdentifier()
    {
        return $this->email;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->rememberToken;
    }

    public function setRememberToken($value)
    {
        $this->rememberToken = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
        // TODO: Implement getRememberTokenName() method.
    }


}
