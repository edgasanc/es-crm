<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property integer $idCliente
 * @property string $razonSocial
 * @property string $direccion
 * @property string $barrio
 * @property string $telefono
 * @property string $nit
 * @property string $email
 * @property string $owner

 *
 * @property Pedido[] $pedidos
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['razonSocial', 'direccion', 'nit', 'owner'], 'required'],
            [['nit'], 'unique'],
            [['razonSocial', 'direccion', 'email'], 'string', 'max' => 255],
            [['barrio'], 'string', 'max' => 45],
            [['telefono'], 'string', 'max' => 20],
            [['nit'], 'string', 'max' => 12]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idCliente' => Yii::t('app', 'Id'),
            'razonSocial' => Yii::t('app', 'Razon Social'),
            'direccion' => Yii::t('app', 'Direccion'),
            'barrio' => Yii::t('app', 'Barrio'),
            'telefono' => Yii::t('app', 'Telefono'),
            'nit' => Yii::t('app', 'Nit'),
            'email' => Yii::t('app', 'Email'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['cliente_idCliente' => 'idCliente']);
    }

    /**
     * @inheritdoc
     * @return ClienteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ClienteQuery(get_called_class());
    }
}
