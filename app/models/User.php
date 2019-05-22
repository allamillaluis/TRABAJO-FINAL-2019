<?php

namespace app\models;

use Da\User\Model\User as BaseUser;
use yii\db\Query;

class User extends BaseUser
{
    
    public function getTrabajo(){
        return (new Query())->from('m_tarea')->innerJoin('m_estado', 'm_tarea.estadoid=m_estado.id')->where(['usuario_asignadoid'=> $this->id])->groupBy(['m_estado.descripcion'])->select(['m_estado.descripcion as name', 'count(*) as value'])->all();
    }
    
    // métodos de auditoría
    public static function userFilterCallback($userName)
    {
        $usr = User::findOne(['username'=>$userName]);
        if(!$usr)
            return null;
        return $usr->id;
    }

    public static function userIdentifierCallback($userId)
    {
        $usr = User::findOne($userId);
        if(!$usr)
            return null;
        return $usr->username;
        
    }
    
}
