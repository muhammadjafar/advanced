<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "companies".
 *
 * @property integer $company_id
 * @property string $company_name
 * @property string $company_email
 * @property string $company_address
 * @property string $company_start_date
 * @property string $company_created_date
 * @property string $company_status
 */
class Companies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $file;

    public static function tableName()
    {
        return 'companies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_name','logo','company_email', 'company_address', 'company_start_date', 'company_created_date', 'company_status'], 'required'],
            [['company_start_date', 'company_created_date'], 'safe'],
            [['company_name'], 'string', 'max' => 100],
            [['company_email', 'company_address'], 'string', 'max' => 250],
            [['company_status'], 'string', 'max' => 50],
            [['file'],'file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'company_id' => 'Company ID',
            'company_name' => 'Company Name',
            'company_email' => 'Company Email',
            'company_address' => 'Company Address',
            'company_start_date' => 'Company Start Date',
            'company_created_date' => 'Company Created Date',
            'company_status' => 'Company Status',
            'file' => 'logo',
        ];
    }
}
