<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "pedido".
 *
 * @property integer $idPedido
 * @property integer $cliente_idCliente
 * @property string $fechaEntrega
 * @property string $fechaOrden
 * @property string $owner
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
            [['cliente_idCliente', 'fechaEntrega', 'fechaOrden', 'estado_idEstado','owner'], 'required'],
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
            'idPedido' => Yii::t('app', 'ID Pedido'),
            'cliente_idCliente' => Yii::t('app', 'Cliente'),
            'fechaEntrega' => Yii::t('app', 'Fecha Entrega'),
            'fechaOrden' => Yii::t('app', 'Fecha Orden'),
            'estado_idEstado' => Yii::t('app', 'Estado'),
            'nitCliente'=>Yii::t('app', 'NIT'),
            'dirCliente'=>Yii::t('app', 'Dirección'),
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


    public function getNitCliente() {
        return $this->clienteIdCliente->nit;
    }


    public function getDirCliente() {
        return $this->clienteIdCliente->direccion;
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

	public static function consultarProductosADespachar($fecha)
    {

        $query = new Query;
        $query->select('c.idProducto, c.codigo, c.producto, SUM(b.cantidad) as cantidad, d.nombre as embalaje')
            ->from('pedido a, carropedido b, producto c, embalaje d')
            ->where(['a.fechaEntrega'=>$fecha])
            ->andWhere('a.idPedido = b.pedido_idPedido')
            ->andWhere('b.producto_idProducto = c.idProducto')
            ->andWhere('c.embalaje_idEmbalaje = d.idEmbalaje')
            ->groupBy("c.idProducto");

        $rows = $query->all();
	    return $rows;
	}

    public static function consultarRegistroVentas($fechai, $fechaf)
    {
        $query = new Query;
        $query->select('b.username as vendedor, c.name as nombre, COUNT(*) as numero_pedidos')
            ->from('pedido a, user b, profile c')
            ->where(['BETWEEN', 'a.fechaOrden', $fechai, $fechaf])
            ->andWhere('a.owner = b.id')
            ->andWhere('b.id = c.user_id')
            ->groupBy("a.owner");
        $rows = $query->all();
        return $rows;
    }

    public static function consultarRegistrosVentasDia($fechai){
        $query = new Query;
        $query->select('b.username as vendedor, c.name as nombre, COUNT(*) as numero_pedidos')
            ->from('pedido a, user b, profile c')
            ->where(['a.fechaOrden' => $fechai])
            ->andWhere('a.owner = b.id')
            ->andWhere('b.id = c.user_id')
            ->groupBy("a.owner");
        $rows = $query->all();
        return $rows;
    }

    public static function consultarRegistrosVentasMes($mes){

        $now = new \DateTime();
        $year = $now->format('Y');
        $day = "1";
        $fechai = new \DateTime($year.'-'.$mes.'-'.$day);
        $fechaf = new \DateTime($year.'-'.(intval($mes)+1).'-'.$day);
        $fechaf = $fechaf->sub(new \DateInterval('P0Y0M1D'));
        return Pedido::consultarRegistroVentas($fechai->format('Y-m-d'), $fechaf->format('Y-m-d'));
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
