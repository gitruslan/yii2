<?php
/**
 * Created by PhpStorm.
 * User: russo
 * Date: 7/6/14
 * Time: 10:31 PM
 */

namespace app\models;

use yii\db\ActiveRecord;

class Cabinet extends ActiveRecord {
    const TABLE = "cabinet";

    public static function tablename(){
       return self::TABLE;
    }

    public static function getUserCabinet($user_id){
         return  self::find()->where(['user_id'=>$user_id])->all();
    }

}