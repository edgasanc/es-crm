<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%impuestos}}".
 *
 * @property integer $idImpuesto
 * @property string $nombre
 * @property string $valor
 * @property string $create_time
 * @property string $update_time
 *
 * @property Productos[] $productos
 */
class Impuestos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%impuestos}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['valor'], 'number'],
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
            'idImpuesto' => 'Id Impuesto',
            'nombre' => 'Nombre',
            'valor' => 'Valor',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Productos::className(), ['impuestos_idImpuesto' => 'idImpuesto']);
    }

    /**
     * @inheritdoc
     * @return ImpuestosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ImpuestosQuery(get_called_class());
    }
}
