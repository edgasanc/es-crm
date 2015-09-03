<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%clientes}}".
 *
 * @property integer $idClientes
 * @property string $razonSocial
 * @property string $barrio
 * @property integer $telefono
 * @property integer $nit
 * @property integer $nitVer
 * @property string $create_time
 * @property string $update_time
 *
 * @property Carropedidos[] $carropedidos
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
            [['telefono', 'nit', 'nitVer'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['razonSocial'], 'string', 'max' => 200],
            [['barrio'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idClientes' => 'ID',
            'razonSocial' => 'Razon Social',
            'barrio' => 'Barrio',
            'telefono' => 'Telefono',
            'nit' => 'NIT',
            'nitVer' => 'Cod-NIT',
            'create_time' => 'Fecha Creación',
            'update_time' => 'Fecha Actualización',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarropedidos()
    {
        return $this->hasMany(Carropedidos::className(), ['clientes_idClientes' => 'idClientes']);
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
