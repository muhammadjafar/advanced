<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "barang".
 *
 * @property string $ID
 * @property string $Nama
 * @property string $Satuan
 */
class Barang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'barang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID'], 'required'],
            [['ID'], 'string', 'max' => 5],
            [['Nama', 'Satuan'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Nama' => 'Nama',
            'Satuan' => 'Satuan',
        ];
    }
}
