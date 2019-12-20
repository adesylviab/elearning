<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "video".
 *
 * @property int $id_video
 * @property string $nama_video
 * @property string $link
 * @property string $author
 * @property string $kategori
 *
 * @property Course $course
 */
class Video extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'video';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_video', 'link', 'author', 'kategori'], 'required'],
            [['nama_video', 'link', 'author', 'kategori'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_video' => 'Id Video',
            'nama_video' => 'Nama Video',
            'link' => 'Link',
            'author' => 'Author',
            'kategori' => 'Kategori',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id_video' => 'id_video']);
    }
}
