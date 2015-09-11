<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "impuesto".
 *
 * @property integer $idImpuesto
 * @property string $nombre
 * @property string $valor
 *
 * @property Producto[] $productos
 */
class Impuesto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'impuesto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'valor'], 'required'],
            [['valor'], 'number'],
            [['nombre'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idImpuesto' => Yii::t('app', 'Id Impuesto'),
            'nombre' => Yii::t('app', 'Nombre'),
            'valor' => Yii::t('app', 'Valor'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Producto::className(), ['impuestos_idImpuesto' => 'idImpuesto']);
    }

    /**
     * @inheritdoc
     * @return ImpuestoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ImpuestoQuery(get_called_class());
    }
}
