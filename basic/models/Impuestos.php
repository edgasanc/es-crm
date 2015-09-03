<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%impuestos}}".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $valor
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
            [['nombre', 'valor'], 'required'],
            [['valor'], 'integer'],
            [['nombre'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'valor' => 'Valor',
        ];
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
