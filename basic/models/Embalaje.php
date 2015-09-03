<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%embalaje}}".
 *
 * @property integer $idEmbalaje
 * @property string $nombre
 */
class Embalaje extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%embalaje}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idEmbalaje' => 'Id Embalaje',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @inheritdoc
     * @return EmbalajeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EmbalajeQuery(get_called_class());
    }
}
