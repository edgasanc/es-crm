<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%clientes}}".
 *
 * @property integer $idCliente
 * @property string $razonSocial
 * @property string $direccion
 * @property string $barrio
 * @property string $telefono
 * @property string $nit
 * @property string $fechaCreacion
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
            [['razonSocial', 'direccion', 'barrio', 'telefono', 'nit'], 'required'],
            [['fechaCreacion'], 'safe'],
            [['razonSocial', 'direccion'], 'string', 'max' => 200],
            [['barrio'], 'string', 'max' => 100],
            [['telefono', 'nit'], 'string', 'max' => 12]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idCliente' => 'ID',
            'razonSocial' => 'Razón Social',
            'direccion' => 'Dirección',
            'barrio' => 'Barrio',
            'telefono' => 'Teléfono',
            'nit' => 'NIT',
            'fechaCreacion' => 'Fecha Creacion',
        ];
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
