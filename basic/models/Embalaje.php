<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%embalaje}}".
 *
 * @property integer $idEmbalaje
 * @property string $nombre
 * @property string $create_time
 * @property string $update_time
 *
 * @property Productos[] $productos
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
            [['create_time', 'update_time'], 'safe'],
            [['nombre'], 'string', 'max' => 45]
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
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Productos::className(), ['embalaje_idEmbalaje' => 'idEmbalaje']);
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
