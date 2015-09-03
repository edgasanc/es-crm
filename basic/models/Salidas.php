<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%salidas}}".
 *
 * @property integer $idSalidas
 * @property integer $pedidos_idPedidos
 * @property integer $productos_idProducos
 * @property integer $cantidad
 * @property string $precio
 * @property string $create_time
 * @property string $update_time
 *
 * @property Pedidos $pedidosIdPedidos
 * @property Productos $productosIdProducos
 */
class Salidas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%salidas}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pedidos_idPedidos', 'productos_idProducos'], 'required'],
            [['pedidos_idPedidos', 'productos_idProducos', 'cantidad'], 'integer'],
            [['precio'], 'number'],
            [['create_time', 'update_time'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idSalidas' => 'Id Salidas',
            'pedidos_idPedidos' => 'Pedidos Id Pedidos',
            'productos_idProducos' => 'Productos Id Producos',
            'cantidad' => 'Cantidad',
            'precio' => 'Precio',
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
     * @return SalidasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SalidasQuery(get_called_class());
    }
}
