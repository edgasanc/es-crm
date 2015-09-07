<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%clientes}}".
 *
 * @property integer $idClientes
 * @property string $razonSocial
 * @property string $direccion
 * @property string $barrio
 * @property integer $telefono
 * @property integer $nit
 * @property integer $nitVer
 * @property string $create_time
 * @property string $update_time
 *
 * @property Pedidos[] $pedidos
 */
class Clientes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%clientes}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['razonSocial','direccion','barrio','telefono','nit'], 'required'],
            [['telefono', 'nit', 'nitVer'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['razonSocial'], 'string', 'max' => 200],
            [['direccion'], 'string', 'max' => 100],
            [['barrio'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idClientes' => 'Id Clientes',
            'razonSocial' => 'Razon Social - Nombre',
            'direccion' => 'Direccion',
            'barrio' => 'Barrio',
            'telefono' => 'Telefono',
            'nit' => 'NIT - Cédula',
            'nitVer' => 'Código NIT',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedidos::className(), ['clientes_idClientes' => 'idClientes']);
    }

    /**
     * @inheritdoc
     * @return ClientesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ClientesQuery(get_called_class());
    }
}
