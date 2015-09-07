<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "entrada".
 *
 * @property integer $idEntrada
 * @property integer $producto_idProducto
 * @property integer $cantidad
 * @property string $precio
 *
 * @property Producto $productoIdProducto
 */
class Entrada extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'entrada';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['producto_idProducto', 'cantidad', 'precio'], 'required'],
            [['producto_idProducto', 'cantidad'], 'integer'],
            [['precio'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idEntrada' => Yii::t('app', 'ID'),
            'producto_idProducto' => Yii::t('app', 'Producto'),
            'cantidad' => Yii::t('app', 'Cantidad'),
            'precio' => Yii::t('app', 'Precio'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductoIdProducto()
    {
        return $this->hasOne(Producto::className(), ['idProducto' => 'producto_idProducto']);
    }

    /**
     * @inheritdoc
     * @return EntradaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EntradaQuery(get_called_class());
    }

    public function afterSave()
    {
       $this->updateInventario();
    }


    public function afterDelete()
    {
        $this->updateInventario();
     }


    public function updateInventario(){

        $sum = 0;
        $entradas = Entrada::findAll(['producto_IdProducto'=>$this->producto_idProducto]);
        foreach($entradas as $e){
            $sum+=$e->cantidad;
        }

        $inv = Inventario::findOne(['producto_IdProducto'=>$this->producto_idProducto]);

        if($inv==null) {
            $inv = new Inventario();
            $inv->producto_idProducto = $this->producto_idProducto;
        }
        $inv->stock = $sum;
        $inv->save();

    }
}
