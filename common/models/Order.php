<?php
/**
 * Created by PhpStorm.
 * User: galat
 * Date: 09/03/2019
 * Time: 23:46
 */

namespace common\models;


class Order extends \common\models\db\Order
{
    const STATUS_NEW = "NEW";
    const STATUS_CANCEL = "CANCEL";
    const STATUS_APPROVE = "APPROVE";
    const STATUS_SHIPPING = "SHIPPING";
    const STATUS_AT_CUSTOMER = "AT_CUSTOMER";
}