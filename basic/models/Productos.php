<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%productos}}".
 *
 * @property integer $idProducos
 * @property integer $codigo
 * @property string $producto
 * @property string $precio
 * @property integer $embalaje_idEmbalaje
 * @property integer $impuestos_idImpuesto
 * @property string $create_time
 * @property string $update_time
 *
 * @property Almacen[] $almacens
 * @property Carropedidos[] $carropedidos
 * @property Entradas[] $entradas
 * @property Embalaje $embalajeIdEmbalaje
 * @property Impuestos $impuestosIdImpuesto
 * @property Salidas[] $salidas
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
            [['codigo', 'embalaje_idEmbalaje', 'impuestos_idImpuesto'], 'integer'],
            [['precio'], 'number'],
            [['embalaje_idEmbalaje', 'impuestos_idImpuesto'], 'required'],
            [['create_time', 'update_time'], 'safe'],
            [['producto'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'idProducos' => 'ID',
            'codigo' => 'Codigo',
            'producto' => 'Producto',
            'precio' => 'Precio',
            'embalaje_idEmbalaje' => 'Embalaje',
            'impuestos_idImpuesto' => 'Impuestos',
            'create_time' => 'Fecha Creación',
            'update_time' => 'Fecha Actualización',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlmacens()
    {
        return $this->hasMany(Almacen::className(), ['productos_idProducos' => 'idProducos']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarropedidos()
    {
        return $this->hasMany(Carropedidos::className(), ['productos_idProducos' => 'idProducos']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntradas()
    {
        return $this->hasMany(Entradas::className(), ['productos_idProducos' => 'idProducos']);
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
        return $this->hasOne(Impuestos::className(), ['idImpuesto' => 'impuestos_idImpuesto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalidas()
    {
        return $this->hasMany(Salidas::className(), ['productos_idProducos' => 'idProducos']);
    }

    /**
     * @inheritdoc
     * @return ProductosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductosQuery(get_called_class());
    }
}
