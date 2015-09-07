<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pedido".
 *
 * @property integer $idPedido
 * @property integer $cliente_idCliente
 * @property string $fechaEntrega
 * @property string $fechaOrden
 * @property integer $estado_idEstado
 *
 * @property Carropedido[] $carropedidos
 * @property Cliente $clienteIdCliente
 * @property Estado $estadoIdEstado
 * @property Salida[] $salidas
 */
class Pedido extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pedido';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cliente_idCliente', 'fechaEntrega', 'fechaOrden', 'estado_idEstado'], 'required'],
            [['cliente_idCliente', 'estado_idEstado'], 'integer'],
            [['fechaEntrega', 'fechaOrden'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPedido' => Yii::t('app', 'Id Pedido'),
            'cliente_idCliente' => Yii::t('app', 'Cliente Id Cliente'),
            'fechaEntrega' => Yii::t('app', 'Fecha Entrega'),
            'fechaOrden' => Yii::t('app', 'Fecha Orden'),
            'estado_idEstado' => Yii::t('app', 'Estado Id Estado'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarropedidos()
    {
        return $this->hasMany(Carropedido::className(), ['pedido_idPedido' => 'idPedido']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClienteIdCliente()
    {
        return $this->hasOne(Cliente::className(), ['idCliente' => 'cliente_idCliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstadoIdEstado()
    {
        return $this->hasOne(Estado::className(), ['idEstado' => 'estado_idEstado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalidas()
    {
        return $this->hasMany(Salida::className(), ['pedido_idPedido' => 'idPedido']);
    }

    /**
     * @inheritdoc
     * @return PedidoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PedidoQuery(get_called_class());
    }
}
