<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%estado}}".
 *
 * @property integer $idEstado
 * @property string $nombre
 * @property string $create_time
 * @property string $update_time
 */
class Estado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%estado}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['create_time', 'update_time'], 'safe'],
            [['nombre'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idEstado' => 'Id Estado',
            'nombre' => 'Nombre',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }

    /**
     * @inheritdoc
     * @return EstadoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EstadoQuery(get_called_class());
    }
}
