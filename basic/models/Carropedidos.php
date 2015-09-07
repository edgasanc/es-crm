<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%carropedidos}}".
 *
 * @property integer $idCarroPedidos
 * @property integer $pedidos_idPedidos
 * @property integer $productos_idProducos
 * @property integer $cantidad
 * @property string $create_time
 * @property string $update_time
 *
 * @property Pedidos $pedidosIdPedidos
 * @property Productos $productosIdProducos
 */
class Carropedidos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%carropedidos}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pedidos_idPedidos', 'productos_idProducos','cantidad'], 'required'],
            [['pedidos_idPedidos', 'productos_idProducos', 'cantidad'], 'integer'],
            [['create_time', 'update_time'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idCarroPedidos' => 'ID Carro Pedidos',
            'pedidos_idPedidos' => 'ID Pedido',
            'productos_idProducos' => 'Productos',
            'cantidad' => 'Cantidad',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidosIdPedidos()
    {
        return $this->hasOne(Pedidos::className(), ['idPedidos' => 'pedidos_idPedidos']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductosIdProducos()
    {
        return $this->hasOne(Productos::className(), ['idProducos' => 'productos_idProducos']);
    }

    /**
     * @inheritdoc
     * @return CarropedidosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CarropedidosQuery(get_called_class());
    }
}
