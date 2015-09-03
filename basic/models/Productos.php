<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%productos}}".
 *
 * @property integer $idProductos
 * @property integer $codigo
 * @property string $producto
 * @property integer $embalaje
 * @property integer $impuesto
 * @property integer $precio
 * @property string $fechaCreacion
 */
class Productos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%productos}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'producto', 'embalaje', 'impuesto', 'precio'], 'required'],
            [['codigo', 'embalaje', 'impuesto', 'precio'], 'integer'],
            [['fechaCreacion'], 'safe'],
            [['producto'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idProductos' => 'Id Productos',
            'codigo' => 'Codigo',
            'producto' => 'Producto',
            'embalaje' => 'Embalaje',
            'impuesto' => 'Impuesto',
            'precio' => 'Precio',
            'fechaCreacion' => 'Fecha Creacion',
        ];
    }
}
