<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "carropedido".
 *
 * @property integer $idCarroPedido
 * @property integer $pedido_idPedido
 * @property integer $producto_idProducto
 * @property integer $cantidad
 *
 * @property Pedido $pedidoIdPedido
 * @property Producto $productoIdProducto
 */
class Carropedido extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'carropedido';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pedido_idPedido', 'producto_idProducto', 'cantidad'], 'required'],
            [['pedido_idPedido', 'producto_idProducto', 'cantidad'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idCarroPedido' => Yii::t('app', 'Id Carro Pedido'),
            'pedido_idPedido' => Yii::t('app', 'Pedido Id Pedido'),
            'producto_idProducto' => Yii::t('app', 'Producto Id Producto'),
            'cantidad' => Yii::t('app', 'Cantidad'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidoIdPedido()
    {
        return $this->hasOne(Pedido::className(), ['idPedido' => 'pedido_idPedido']);
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
     * @return CarropedidoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CarropedidoQuery(get_called_class());
    }
}
