<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property integer $idProducto
 * @property integer $codigo
 * @property string $producto
 * @property string $precio
 * @property integer $embalaje_idEmbalaje
 * @property integer $impuestos_idImpuesto
 *
 * @property Carropedido[] $carropedidos
 * @property Entrada[] $entradas
 * @property Embalaje $embalajeIdEmbalaje
 * @property Impuesto $impuestosIdImpuesto
 * @property Salida[] $salidas
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'producto', 'precio', 'embalaje_idEmbalaje', 'impuestos_idImpuesto'], 'required'],
            [['embalaje_idEmbalaje', 'impuestos_idImpuesto'], 'integer'],
            [['precio'], 'number'],
            [['codigo','producto'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idProducto' => Yii::t('app', 'ID'),
            'codigo' => Yii::t('app', 'Código'),
            'producto' => Yii::t('app', 'Producto'),
            'precio' => Yii::t('app', 'Precio'),
            'embalaje_idEmbalaje' => Yii::t('app', 'Embalaje'),
            'impuestos_idImpuesto' => Yii::t('app', 'Impuesto'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarropedidos()
    {
        return $this->hasMany(Carropedido::className(), ['producto_idProducto' => 'idProducto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntradas()
    {
        return $this->hasMany(Entrada::className(), ['producto_idProducto' => 'idProducto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmbalajeIdEmbalaje()
    {
        return $this->hasOne(Embalaje::className(), ['idEmbalaje' => 'embalaje_idEmbalaje']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImpuestosIdImpuesto()
    {
        return $this->hasOne(Impuesto::className(), ['idImpuesto' => 'impuestos_idImpuesto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalidas()
    {
        return $this->hasMany(Salida::className(), ['producto_idProducto' => 'idProducto']);
    }

    /**
     * @inheritdoc
     * @return ProductoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductoQuery(get_called_class());
    }
}
