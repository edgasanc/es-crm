<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%pedidos}}".
 *
 * @property integer $idPedidos
 * @property integer $clientes_idClientes
 * @property integer $estadoPedido
 * @property string $create_time
 * @property string $update_time
 *
 * @property Carropedidos[] $carropedidos
 * @property Clientes $clientesIdClientes
 * @property Salidas[] $salidas
 */
class Pedidos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%pedidos}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['clientes_idClientes'], 'required'],
            [['clientes_idClientes', 'estadoPedido'], 'integer'],
            [['create_time', 'update_time'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPedidos' => 'Número Pedido',
            'clientes_idClientes' => 'Clientes',
            'estadoPedido' => 'Estado Pedido',
            'create_time' => 'Fecha Creación',
            'update_time' => 'Fecha Actualización',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarropedidos()
    {
        return $this->hasMany(Carropedidos::className(), ['pedidos_idPedidos' => 'idPedidos']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientesIdClientes()
    {
        return $this->hasOne(Clientes::className(), ['idClientes' => 'clientes_idClientes']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalidas()
    {
        return $this->hasMany(Salidas::className(), ['pedidos_idPedidos' => 'idPedidos']);
    }

    /**
     * @inheritdoc
     * @return PedidosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PedidosQuery(get_called_class());
    }
}
