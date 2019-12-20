<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "materi".
 *
 * @property int $id
 * @property string $judul_materi
 * @property string $isi_materi
 * @property string $author
 * @property string $kategori
 */
class Materi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'materi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['judul_materi', 'isi_materi', 'author', 'kategori'], 'required'],
            [['isi_materi'], 'string'],
            [['judul_materi', 'author'], 'string', 'max' => 255],
            [['kategori'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'judul_materi' => 'Judul Materi',
            'isi_materi' => 'Isi Materi',
            'author' => 'Author',
            'kategori' => 'Kategori',
        ];
    }
}
