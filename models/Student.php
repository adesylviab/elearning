<?php

namespace app\models;

use Yii;
use yii\db\Command;

/**
 * This is the model class for table "student".
 *
 * @property int $id_student
 * @property string $tgl_daftar
 * @property string $username
 * @property string $password
 * @property string $nama
 * @property string $email
 * @property string $gender
 * @property string $alamat
 *
 * @property StudentCourse $studentCourse
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tgl_daftar'], 'safe'],
            [['username', 'password', 'nama', 'email', 'gender', 'alamat'], 'required'],
            [['alamat'], 'string'],
            [['username', 'password', 'email'], 'string', 'max' => 50],
            [['nama'], 'string', 'max' => 100],
            [['gender'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_student' => 'Id Student',
            'tgl_daftar' => 'Tgl Daftar',
            'username' => 'Username',
            'password' => 'Password',
            'nama' => 'Nama',
            'email' => 'Email',
            'gender' => 'Gender',
            'alamat' => 'Alamat',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentCourse()
    {
        return $this->hasOne(StudentCourse::className(), ['username' => 'username']);
    }

    public static function findIdentity($username)
    {
        $user = Student::find()->where(['username'=>$username])->one();
        if(count($user)){
            return new static($user);
        }
        return null;
    }

    public function findByStudent($username)
    {
        $getUsername = Yii::$app->db->createCommand("SELECT * FROM student WHERE username = '"+$username+"'");
        if(strlen($getUsername) >= 1){
            return 1;
        }
        return 0;
    }
}
