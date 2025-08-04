<?php

namespace Map;

use \Quothed;
use \QuothedQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'quothed' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class QuothedTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = '.Map.QuothedTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'quothed';

    /**
     * The PHP name of this class (PascalCase)
     */
    public const TABLE_PHP_NAME = 'Quothed';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\Quothed';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'Quothed';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 66;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 66;

    /**
     * the column name for the sessionid field
     */
    public const COL_SESSIONID = 'quothed.sessionid';

    /**
     * the column name for the recno field
     */
    public const COL_RECNO = 'quothed.recno';

    /**
     * the column name for the date field
     */
    public const COL_DATE = 'quothed.date';

    /**
     * the column name for the time field
     */
    public const COL_TIME = 'quothed.time';

    /**
     * the column name for the quotnbr field
     */
    public const COL_QUOTNBR = 'quothed.quotnbr';

    /**
     * the column name for the status field
     */
    public const COL_STATUS = 'quothed.status';

    /**
     * the column name for the custid field
     */
    public const COL_CUSTID = 'quothed.custid';

    /**
     * the column name for the billname field
     */
    public const COL_BILLNAME = 'quothed.billname';

    /**
     * the column name for the billaddress field
     */
    public const COL_BILLADDRESS = 'quothed.billaddress';

    /**
     * the column name for the billaddress2 field
     */
    public const COL_BILLADDRESS2 = 'quothed.billaddress2';

    /**
     * the column name for the billaddress3 field
     */
    public const COL_BILLADDRESS3 = 'quothed.billaddress3';

    /**
     * the column name for the billcountry field
     */
    public const COL_BILLCOUNTRY = 'quothed.billcountry';

    /**
     * the column name for the billcity field
     */
    public const COL_BILLCITY = 'quothed.billcity';

    /**
     * the column name for the billstate field
     */
    public const COL_BILLSTATE = 'quothed.billstate';

    /**
     * the column name for the billzip field
     */
    public const COL_BILLZIP = 'quothed.billzip';

    /**
     * the column name for the shiptoid field
     */
    public const COL_SHIPTOID = 'quothed.shiptoid';

    /**
     * the column name for the shipname field
     */
    public const COL_SHIPNAME = 'quothed.shipname';

    /**
     * the column name for the shipaddress field
     */
    public const COL_SHIPADDRESS = 'quothed.shipaddress';

    /**
     * the column name for the shipaddress2 field
     */
    public const COL_SHIPADDRESS2 = 'quothed.shipaddress2';

    /**
     * the column name for the shipaddress3 field
     */
    public const COL_SHIPADDRESS3 = 'quothed.shipaddress3';

    /**
     * the column name for the shipcountry field
     */
    public const COL_SHIPCOUNTRY = 'quothed.shipcountry';

    /**
     * the column name for the shipcity field
     */
    public const COL_SHIPCITY = 'quothed.shipcity';

    /**
     * the column name for the shipstate field
     */
    public const COL_SHIPSTATE = 'quothed.shipstate';

    /**
     * the column name for the shipzip field
     */
    public const COL_SHIPZIP = 'quothed.shipzip';

    /**
     * the column name for the contact field
     */
    public const COL_CONTACT = 'quothed.contact';

    /**
     * the column name for the phone field
     */
    public const COL_PHONE = 'quothed.phone';

    /**
     * the column name for the faxnbr field
     */
    public const COL_FAXNBR = 'quothed.faxnbr';

    /**
     * the column name for the email field
     */
    public const COL_EMAIL = 'quothed.email';

    /**
     * the column name for the careof field
     */
    public const COL_CAREOF = 'quothed.careof';

    /**
     * the column name for the quotdate field
     */
    public const COL_QUOTDATE = 'quothed.quotdate';

    /**
     * the column name for the revdate field
     */
    public const COL_REVDATE = 'quothed.revdate';

    /**
     * the column name for the expdate field
     */
    public const COL_EXPDATE = 'quothed.expdate';

    /**
     * the column name for the pricecode field
     */
    public const COL_PRICECODE = 'quothed.pricecode';

    /**
     * the column name for the pricecodedesc field
     */
    public const COL_PRICECODEDESC = 'quothed.pricecodedesc';

    /**
     * the column name for the taxcode field
     */
    public const COL_TAXCODE = 'quothed.taxcode';

    /**
     * the column name for the taxcodedesc field
     */
    public const COL_TAXCODEDESC = 'quothed.taxcodedesc';

    /**
     * the column name for the termcode field
     */
    public const COL_TERMCODE = 'quothed.termcode';

    /**
     * the column name for the termcodedesc field
     */
    public const COL_TERMCODEDESC = 'quothed.termcodedesc';

    /**
     * the column name for the shipviacd field
     */
    public const COL_SHIPVIACD = 'quothed.shipviacd';

    /**
     * the column name for the shipviadesc field
     */
    public const COL_SHIPVIADESC = 'quothed.shipviadesc';

    /**
     * the column name for the sp1 field
     */
    public const COL_SP1 = 'quothed.sp1';

    /**
     * the column name for the sp1pct field
     */
    public const COL_SP1PCT = 'quothed.sp1pct';

    /**
     * the column name for the sp1name field
     */
    public const COL_SP1NAME = 'quothed.sp1name';

    /**
     * the column name for the sp2 field
     */
    public const COL_SP2 = 'quothed.sp2';

    /**
     * the column name for the sp2pct field
     */
    public const COL_SP2PCT = 'quothed.sp2pct';

    /**
     * the column name for the sp2name field
     */
    public const COL_SP2NAME = 'quothed.sp2name';

    /**
     * the column name for the sp3 field
     */
    public const COL_SP3 = 'quothed.sp3';

    /**
     * the column name for the sp3pct field
     */
    public const COL_SP3PCT = 'quothed.sp3pct';

    /**
     * the column name for the sp3name field
     */
    public const COL_SP3NAME = 'quothed.sp3name';

    /**
     * the column name for the fob field
     */
    public const COL_FOB = 'quothed.fob';

    /**
     * the column name for the deliverydesc field
     */
    public const COL_DELIVERYDESC = 'quothed.deliverydesc';

    /**
     * the column name for the whse field
     */
    public const COL_WHSE = 'quothed.whse';

    /**
     * the column name for the custpo field
     */
    public const COL_CUSTPO = 'quothed.custpo';

    /**
     * the column name for the custref field
     */
    public const COL_CUSTREF = 'quothed.custref';

    /**
     * the column name for the hasnotes field
     */
    public const COL_HASNOTES = 'quothed.hasnotes';

    /**
     * the column name for the error field
     */
    public const COL_ERROR = 'quothed.error';

    /**
     * the column name for the errormsg field
     */
    public const COL_ERRORMSG = 'quothed.errormsg';

    /**
     * the column name for the subtotal field
     */
    public const COL_SUBTOTAL = 'quothed.subtotal';

    /**
     * the column name for the salestax field
     */
    public const COL_SALESTAX = 'quothed.salestax';

    /**
     * the column name for the freight field
     */
    public const COL_FREIGHT = 'quothed.freight';

    /**
     * the column name for the misccost field
     */
    public const COL_MISCCOST = 'quothed.misccost';

    /**
     * the column name for the ordertotal field
     */
    public const COL_ORDERTOTAL = 'quothed.ordertotal';

    /**
     * the column name for the cost_total field
     */
    public const COL_COST_TOTAL = 'quothed.cost_total';

    /**
     * the column name for the margin_amt field
     */
    public const COL_MARGIN_AMT = 'quothed.margin_amt';

    /**
     * the column name for the margin_pct field
     */
    public const COL_MARGIN_PCT = 'quothed.margin_pct';

    /**
     * the column name for the dummy field
     */
    public const COL_DUMMY = 'quothed.dummy';

    /**
     * The default string format for model objects of the related table
     */
    public const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     *
     * @var array<string, mixed>
     */
    protected static $fieldNames = [
        self::TYPE_PHPNAME       => ['Sessionid', 'Recno', 'Date', 'Time', 'Quotnbr', 'Status', 'Custid', 'Billname', 'Billaddress', 'Billaddress2', 'Billaddress3', 'Billcountry', 'Billcity', 'Billstate', 'Billzip', 'Shiptoid', 'Shipname', 'Shipaddress', 'Shipaddress2', 'Shipaddress3', 'Shipcountry', 'Shipcity', 'Shipstate', 'Shipzip', 'Contact', 'Phone', 'Faxnbr', 'Email', 'Careof', 'Quotdate', 'Revdate', 'Expdate', 'Pricecode', 'Pricecodedesc', 'Taxcode', 'Taxcodedesc', 'Termcode', 'Termcodedesc', 'Shipviacd', 'Shipviadesc', 'Sp1', 'Sp1pct', 'Sp1name', 'Sp2', 'Sp2pct', 'Sp2name', 'Sp3', 'Sp3pct', 'Sp3name', 'Fob', 'Deliverydesc', 'Whse', 'Custpo', 'Custref', 'Hasnotes', 'Error', 'Errormsg', 'Subtotal', 'Salestax', 'Freight', 'Misccost', 'Ordertotal', 'CostTotal', 'MarginAmt', 'MarginPct', 'Dummy', ],
        self::TYPE_CAMELNAME     => ['sessionid', 'recno', 'date', 'time', 'quotnbr', 'status', 'custid', 'billname', 'billaddress', 'billaddress2', 'billaddress3', 'billcountry', 'billcity', 'billstate', 'billzip', 'shiptoid', 'shipname', 'shipaddress', 'shipaddress2', 'shipaddress3', 'shipcountry', 'shipcity', 'shipstate', 'shipzip', 'contact', 'phone', 'faxnbr', 'email', 'careof', 'quotdate', 'revdate', 'expdate', 'pricecode', 'pricecodedesc', 'taxcode', 'taxcodedesc', 'termcode', 'termcodedesc', 'shipviacd', 'shipviadesc', 'sp1', 'sp1pct', 'sp1name', 'sp2', 'sp2pct', 'sp2name', 'sp3', 'sp3pct', 'sp3name', 'fob', 'deliverydesc', 'whse', 'custpo', 'custref', 'hasnotes', 'error', 'errormsg', 'subtotal', 'salestax', 'freight', 'misccost', 'ordertotal', 'costTotal', 'marginAmt', 'marginPct', 'dummy', ],
        self::TYPE_COLNAME       => [QuothedTableMap::COL_SESSIONID, QuothedTableMap::COL_RECNO, QuothedTableMap::COL_DATE, QuothedTableMap::COL_TIME, QuothedTableMap::COL_QUOTNBR, QuothedTableMap::COL_STATUS, QuothedTableMap::COL_CUSTID, QuothedTableMap::COL_BILLNAME, QuothedTableMap::COL_BILLADDRESS, QuothedTableMap::COL_BILLADDRESS2, QuothedTableMap::COL_BILLADDRESS3, QuothedTableMap::COL_BILLCOUNTRY, QuothedTableMap::COL_BILLCITY, QuothedTableMap::COL_BILLSTATE, QuothedTableMap::COL_BILLZIP, QuothedTableMap::COL_SHIPTOID, QuothedTableMap::COL_SHIPNAME, QuothedTableMap::COL_SHIPADDRESS, QuothedTableMap::COL_SHIPADDRESS2, QuothedTableMap::COL_SHIPADDRESS3, QuothedTableMap::COL_SHIPCOUNTRY, QuothedTableMap::COL_SHIPCITY, QuothedTableMap::COL_SHIPSTATE, QuothedTableMap::COL_SHIPZIP, QuothedTableMap::COL_CONTACT, QuothedTableMap::COL_PHONE, QuothedTableMap::COL_FAXNBR, QuothedTableMap::COL_EMAIL, QuothedTableMap::COL_CAREOF, QuothedTableMap::COL_QUOTDATE, QuothedTableMap::COL_REVDATE, QuothedTableMap::COL_EXPDATE, QuothedTableMap::COL_PRICECODE, QuothedTableMap::COL_PRICECODEDESC, QuothedTableMap::COL_TAXCODE, QuothedTableMap::COL_TAXCODEDESC, QuothedTableMap::COL_TERMCODE, QuothedTableMap::COL_TERMCODEDESC, QuothedTableMap::COL_SHIPVIACD, QuothedTableMap::COL_SHIPVIADESC, QuothedTableMap::COL_SP1, QuothedTableMap::COL_SP1PCT, QuothedTableMap::COL_SP1NAME, QuothedTableMap::COL_SP2, QuothedTableMap::COL_SP2PCT, QuothedTableMap::COL_SP2NAME, QuothedTableMap::COL_SP3, QuothedTableMap::COL_SP3PCT, QuothedTableMap::COL_SP3NAME, QuothedTableMap::COL_FOB, QuothedTableMap::COL_DELIVERYDESC, QuothedTableMap::COL_WHSE, QuothedTableMap::COL_CUSTPO, QuothedTableMap::COL_CUSTREF, QuothedTableMap::COL_HASNOTES, QuothedTableMap::COL_ERROR, QuothedTableMap::COL_ERRORMSG, QuothedTableMap::COL_SUBTOTAL, QuothedTableMap::COL_SALESTAX, QuothedTableMap::COL_FREIGHT, QuothedTableMap::COL_MISCCOST, QuothedTableMap::COL_ORDERTOTAL, QuothedTableMap::COL_COST_TOTAL, QuothedTableMap::COL_MARGIN_AMT, QuothedTableMap::COL_MARGIN_PCT, QuothedTableMap::COL_DUMMY, ],
        self::TYPE_FIELDNAME     => ['sessionid', 'recno', 'date', 'time', 'quotnbr', 'status', 'custid', 'billname', 'billaddress', 'billaddress2', 'billaddress3', 'billcountry', 'billcity', 'billstate', 'billzip', 'shiptoid', 'shipname', 'shipaddress', 'shipaddress2', 'shipaddress3', 'shipcountry', 'shipcity', 'shipstate', 'shipzip', 'contact', 'phone', 'faxnbr', 'email', 'careof', 'quotdate', 'revdate', 'expdate', 'pricecode', 'pricecodedesc', 'taxcode', 'taxcodedesc', 'termcode', 'termcodedesc', 'shipviacd', 'shipviadesc', 'sp1', 'sp1pct', 'sp1name', 'sp2', 'sp2pct', 'sp2name', 'sp3', 'sp3pct', 'sp3name', 'fob', 'deliverydesc', 'whse', 'custpo', 'custref', 'hasnotes', 'error', 'errormsg', 'subtotal', 'salestax', 'freight', 'misccost', 'ordertotal', 'cost_total', 'margin_amt', 'margin_pct', 'dummy', ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, ]
    ];

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     *
     * @var array<string, mixed>
     */
    protected static $fieldKeys = [
        self::TYPE_PHPNAME       => ['Sessionid' => 0, 'Recno' => 1, 'Date' => 2, 'Time' => 3, 'Quotnbr' => 4, 'Status' => 5, 'Custid' => 6, 'Billname' => 7, 'Billaddress' => 8, 'Billaddress2' => 9, 'Billaddress3' => 10, 'Billcountry' => 11, 'Billcity' => 12, 'Billstate' => 13, 'Billzip' => 14, 'Shiptoid' => 15, 'Shipname' => 16, 'Shipaddress' => 17, 'Shipaddress2' => 18, 'Shipaddress3' => 19, 'Shipcountry' => 20, 'Shipcity' => 21, 'Shipstate' => 22, 'Shipzip' => 23, 'Contact' => 24, 'Phone' => 25, 'Faxnbr' => 26, 'Email' => 27, 'Careof' => 28, 'Quotdate' => 29, 'Revdate' => 30, 'Expdate' => 31, 'Pricecode' => 32, 'Pricecodedesc' => 33, 'Taxcode' => 34, 'Taxcodedesc' => 35, 'Termcode' => 36, 'Termcodedesc' => 37, 'Shipviacd' => 38, 'Shipviadesc' => 39, 'Sp1' => 40, 'Sp1pct' => 41, 'Sp1name' => 42, 'Sp2' => 43, 'Sp2pct' => 44, 'Sp2name' => 45, 'Sp3' => 46, 'Sp3pct' => 47, 'Sp3name' => 48, 'Fob' => 49, 'Deliverydesc' => 50, 'Whse' => 51, 'Custpo' => 52, 'Custref' => 53, 'Hasnotes' => 54, 'Error' => 55, 'Errormsg' => 56, 'Subtotal' => 57, 'Salestax' => 58, 'Freight' => 59, 'Misccost' => 60, 'Ordertotal' => 61, 'CostTotal' => 62, 'MarginAmt' => 63, 'MarginPct' => 64, 'Dummy' => 65, ],
        self::TYPE_CAMELNAME     => ['sessionid' => 0, 'recno' => 1, 'date' => 2, 'time' => 3, 'quotnbr' => 4, 'status' => 5, 'custid' => 6, 'billname' => 7, 'billaddress' => 8, 'billaddress2' => 9, 'billaddress3' => 10, 'billcountry' => 11, 'billcity' => 12, 'billstate' => 13, 'billzip' => 14, 'shiptoid' => 15, 'shipname' => 16, 'shipaddress' => 17, 'shipaddress2' => 18, 'shipaddress3' => 19, 'shipcountry' => 20, 'shipcity' => 21, 'shipstate' => 22, 'shipzip' => 23, 'contact' => 24, 'phone' => 25, 'faxnbr' => 26, 'email' => 27, 'careof' => 28, 'quotdate' => 29, 'revdate' => 30, 'expdate' => 31, 'pricecode' => 32, 'pricecodedesc' => 33, 'taxcode' => 34, 'taxcodedesc' => 35, 'termcode' => 36, 'termcodedesc' => 37, 'shipviacd' => 38, 'shipviadesc' => 39, 'sp1' => 40, 'sp1pct' => 41, 'sp1name' => 42, 'sp2' => 43, 'sp2pct' => 44, 'sp2name' => 45, 'sp3' => 46, 'sp3pct' => 47, 'sp3name' => 48, 'fob' => 49, 'deliverydesc' => 50, 'whse' => 51, 'custpo' => 52, 'custref' => 53, 'hasnotes' => 54, 'error' => 55, 'errormsg' => 56, 'subtotal' => 57, 'salestax' => 58, 'freight' => 59, 'misccost' => 60, 'ordertotal' => 61, 'costTotal' => 62, 'marginAmt' => 63, 'marginPct' => 64, 'dummy' => 65, ],
        self::TYPE_COLNAME       => [QuothedTableMap::COL_SESSIONID => 0, QuothedTableMap::COL_RECNO => 1, QuothedTableMap::COL_DATE => 2, QuothedTableMap::COL_TIME => 3, QuothedTableMap::COL_QUOTNBR => 4, QuothedTableMap::COL_STATUS => 5, QuothedTableMap::COL_CUSTID => 6, QuothedTableMap::COL_BILLNAME => 7, QuothedTableMap::COL_BILLADDRESS => 8, QuothedTableMap::COL_BILLADDRESS2 => 9, QuothedTableMap::COL_BILLADDRESS3 => 10, QuothedTableMap::COL_BILLCOUNTRY => 11, QuothedTableMap::COL_BILLCITY => 12, QuothedTableMap::COL_BILLSTATE => 13, QuothedTableMap::COL_BILLZIP => 14, QuothedTableMap::COL_SHIPTOID => 15, QuothedTableMap::COL_SHIPNAME => 16, QuothedTableMap::COL_SHIPADDRESS => 17, QuothedTableMap::COL_SHIPADDRESS2 => 18, QuothedTableMap::COL_SHIPADDRESS3 => 19, QuothedTableMap::COL_SHIPCOUNTRY => 20, QuothedTableMap::COL_SHIPCITY => 21, QuothedTableMap::COL_SHIPSTATE => 22, QuothedTableMap::COL_SHIPZIP => 23, QuothedTableMap::COL_CONTACT => 24, QuothedTableMap::COL_PHONE => 25, QuothedTableMap::COL_FAXNBR => 26, QuothedTableMap::COL_EMAIL => 27, QuothedTableMap::COL_CAREOF => 28, QuothedTableMap::COL_QUOTDATE => 29, QuothedTableMap::COL_REVDATE => 30, QuothedTableMap::COL_EXPDATE => 31, QuothedTableMap::COL_PRICECODE => 32, QuothedTableMap::COL_PRICECODEDESC => 33, QuothedTableMap::COL_TAXCODE => 34, QuothedTableMap::COL_TAXCODEDESC => 35, QuothedTableMap::COL_TERMCODE => 36, QuothedTableMap::COL_TERMCODEDESC => 37, QuothedTableMap::COL_SHIPVIACD => 38, QuothedTableMap::COL_SHIPVIADESC => 39, QuothedTableMap::COL_SP1 => 40, QuothedTableMap::COL_SP1PCT => 41, QuothedTableMap::COL_SP1NAME => 42, QuothedTableMap::COL_SP2 => 43, QuothedTableMap::COL_SP2PCT => 44, QuothedTableMap::COL_SP2NAME => 45, QuothedTableMap::COL_SP3 => 46, QuothedTableMap::COL_SP3PCT => 47, QuothedTableMap::COL_SP3NAME => 48, QuothedTableMap::COL_FOB => 49, QuothedTableMap::COL_DELIVERYDESC => 50, QuothedTableMap::COL_WHSE => 51, QuothedTableMap::COL_CUSTPO => 52, QuothedTableMap::COL_CUSTREF => 53, QuothedTableMap::COL_HASNOTES => 54, QuothedTableMap::COL_ERROR => 55, QuothedTableMap::COL_ERRORMSG => 56, QuothedTableMap::COL_SUBTOTAL => 57, QuothedTableMap::COL_SALESTAX => 58, QuothedTableMap::COL_FREIGHT => 59, QuothedTableMap::COL_MISCCOST => 60, QuothedTableMap::COL_ORDERTOTAL => 61, QuothedTableMap::COL_COST_TOTAL => 62, QuothedTableMap::COL_MARGIN_AMT => 63, QuothedTableMap::COL_MARGIN_PCT => 64, QuothedTableMap::COL_DUMMY => 65, ],
        self::TYPE_FIELDNAME     => ['sessionid' => 0, 'recno' => 1, 'date' => 2, 'time' => 3, 'quotnbr' => 4, 'status' => 5, 'custid' => 6, 'billname' => 7, 'billaddress' => 8, 'billaddress2' => 9, 'billaddress3' => 10, 'billcountry' => 11, 'billcity' => 12, 'billstate' => 13, 'billzip' => 14, 'shiptoid' => 15, 'shipname' => 16, 'shipaddress' => 17, 'shipaddress2' => 18, 'shipaddress3' => 19, 'shipcountry' => 20, 'shipcity' => 21, 'shipstate' => 22, 'shipzip' => 23, 'contact' => 24, 'phone' => 25, 'faxnbr' => 26, 'email' => 27, 'careof' => 28, 'quotdate' => 29, 'revdate' => 30, 'expdate' => 31, 'pricecode' => 32, 'pricecodedesc' => 33, 'taxcode' => 34, 'taxcodedesc' => 35, 'termcode' => 36, 'termcodedesc' => 37, 'shipviacd' => 38, 'shipviadesc' => 39, 'sp1' => 40, 'sp1pct' => 41, 'sp1name' => 42, 'sp2' => 43, 'sp2pct' => 44, 'sp2name' => 45, 'sp3' => 46, 'sp3pct' => 47, 'sp3name' => 48, 'fob' => 49, 'deliverydesc' => 50, 'whse' => 51, 'custpo' => 52, 'custref' => 53, 'hasnotes' => 54, 'error' => 55, 'errormsg' => 56, 'subtotal' => 57, 'salestax' => 58, 'freight' => 59, 'misccost' => 60, 'ordertotal' => 61, 'cost_total' => 62, 'margin_amt' => 63, 'margin_pct' => 64, 'dummy' => 65, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Sessionid' => 'SESSIONID',
        'Quothed.Sessionid' => 'SESSIONID',
        'sessionid' => 'SESSIONID',
        'quothed.sessionid' => 'SESSIONID',
        'QuothedTableMap::COL_SESSIONID' => 'SESSIONID',
        'COL_SESSIONID' => 'SESSIONID',
        'Recno' => 'RECNO',
        'Quothed.Recno' => 'RECNO',
        'recno' => 'RECNO',
        'quothed.recno' => 'RECNO',
        'QuothedTableMap::COL_RECNO' => 'RECNO',
        'COL_RECNO' => 'RECNO',
        'Date' => 'DATE',
        'Quothed.Date' => 'DATE',
        'date' => 'DATE',
        'quothed.date' => 'DATE',
        'QuothedTableMap::COL_DATE' => 'DATE',
        'COL_DATE' => 'DATE',
        'Time' => 'TIME',
        'Quothed.Time' => 'TIME',
        'time' => 'TIME',
        'quothed.time' => 'TIME',
        'QuothedTableMap::COL_TIME' => 'TIME',
        'COL_TIME' => 'TIME',
        'Quotnbr' => 'QUOTNBR',
        'Quothed.Quotnbr' => 'QUOTNBR',
        'quotnbr' => 'QUOTNBR',
        'quothed.quotnbr' => 'QUOTNBR',
        'QuothedTableMap::COL_QUOTNBR' => 'QUOTNBR',
        'COL_QUOTNBR' => 'QUOTNBR',
        'Status' => 'STATUS',
        'Quothed.Status' => 'STATUS',
        'status' => 'STATUS',
        'quothed.status' => 'STATUS',
        'QuothedTableMap::COL_STATUS' => 'STATUS',
        'COL_STATUS' => 'STATUS',
        'Custid' => 'CUSTID',
        'Quothed.Custid' => 'CUSTID',
        'custid' => 'CUSTID',
        'quothed.custid' => 'CUSTID',
        'QuothedTableMap::COL_CUSTID' => 'CUSTID',
        'COL_CUSTID' => 'CUSTID',
        'Billname' => 'BILLNAME',
        'Quothed.Billname' => 'BILLNAME',
        'billname' => 'BILLNAME',
        'quothed.billname' => 'BILLNAME',
        'QuothedTableMap::COL_BILLNAME' => 'BILLNAME',
        'COL_BILLNAME' => 'BILLNAME',
        'Billaddress' => 'BILLADDRESS',
        'Quothed.Billaddress' => 'BILLADDRESS',
        'billaddress' => 'BILLADDRESS',
        'quothed.billaddress' => 'BILLADDRESS',
        'QuothedTableMap::COL_BILLADDRESS' => 'BILLADDRESS',
        'COL_BILLADDRESS' => 'BILLADDRESS',
        'Billaddress2' => 'BILLADDRESS2',
        'Quothed.Billaddress2' => 'BILLADDRESS2',
        'billaddress2' => 'BILLADDRESS2',
        'quothed.billaddress2' => 'BILLADDRESS2',
        'QuothedTableMap::COL_BILLADDRESS2' => 'BILLADDRESS2',
        'COL_BILLADDRESS2' => 'BILLADDRESS2',
        'Billaddress3' => 'BILLADDRESS3',
        'Quothed.Billaddress3' => 'BILLADDRESS3',
        'billaddress3' => 'BILLADDRESS3',
        'quothed.billaddress3' => 'BILLADDRESS3',
        'QuothedTableMap::COL_BILLADDRESS3' => 'BILLADDRESS3',
        'COL_BILLADDRESS3' => 'BILLADDRESS3',
        'Billcountry' => 'BILLCOUNTRY',
        'Quothed.Billcountry' => 'BILLCOUNTRY',
        'billcountry' => 'BILLCOUNTRY',
        'quothed.billcountry' => 'BILLCOUNTRY',
        'QuothedTableMap::COL_BILLCOUNTRY' => 'BILLCOUNTRY',
        'COL_BILLCOUNTRY' => 'BILLCOUNTRY',
        'Billcity' => 'BILLCITY',
        'Quothed.Billcity' => 'BILLCITY',
        'billcity' => 'BILLCITY',
        'quothed.billcity' => 'BILLCITY',
        'QuothedTableMap::COL_BILLCITY' => 'BILLCITY',
        'COL_BILLCITY' => 'BILLCITY',
        'Billstate' => 'BILLSTATE',
        'Quothed.Billstate' => 'BILLSTATE',
        'billstate' => 'BILLSTATE',
        'quothed.billstate' => 'BILLSTATE',
        'QuothedTableMap::COL_BILLSTATE' => 'BILLSTATE',
        'COL_BILLSTATE' => 'BILLSTATE',
        'Billzip' => 'BILLZIP',
        'Quothed.Billzip' => 'BILLZIP',
        'billzip' => 'BILLZIP',
        'quothed.billzip' => 'BILLZIP',
        'QuothedTableMap::COL_BILLZIP' => 'BILLZIP',
        'COL_BILLZIP' => 'BILLZIP',
        'Shiptoid' => 'SHIPTOID',
        'Quothed.Shiptoid' => 'SHIPTOID',
        'shiptoid' => 'SHIPTOID',
        'quothed.shiptoid' => 'SHIPTOID',
        'QuothedTableMap::COL_SHIPTOID' => 'SHIPTOID',
        'COL_SHIPTOID' => 'SHIPTOID',
        'Shipname' => 'SHIPNAME',
        'Quothed.Shipname' => 'SHIPNAME',
        'shipname' => 'SHIPNAME',
        'quothed.shipname' => 'SHIPNAME',
        'QuothedTableMap::COL_SHIPNAME' => 'SHIPNAME',
        'COL_SHIPNAME' => 'SHIPNAME',
        'Shipaddress' => 'SHIPADDRESS',
        'Quothed.Shipaddress' => 'SHIPADDRESS',
        'shipaddress' => 'SHIPADDRESS',
        'quothed.shipaddress' => 'SHIPADDRESS',
        'QuothedTableMap::COL_SHIPADDRESS' => 'SHIPADDRESS',
        'COL_SHIPADDRESS' => 'SHIPADDRESS',
        'Shipaddress2' => 'SHIPADDRESS2',
        'Quothed.Shipaddress2' => 'SHIPADDRESS2',
        'shipaddress2' => 'SHIPADDRESS2',
        'quothed.shipaddress2' => 'SHIPADDRESS2',
        'QuothedTableMap::COL_SHIPADDRESS2' => 'SHIPADDRESS2',
        'COL_SHIPADDRESS2' => 'SHIPADDRESS2',
        'Shipaddress3' => 'SHIPADDRESS3',
        'Quothed.Shipaddress3' => 'SHIPADDRESS3',
        'shipaddress3' => 'SHIPADDRESS3',
        'quothed.shipaddress3' => 'SHIPADDRESS3',
        'QuothedTableMap::COL_SHIPADDRESS3' => 'SHIPADDRESS3',
        'COL_SHIPADDRESS3' => 'SHIPADDRESS3',
        'Shipcountry' => 'SHIPCOUNTRY',
        'Quothed.Shipcountry' => 'SHIPCOUNTRY',
        'shipcountry' => 'SHIPCOUNTRY',
        'quothed.shipcountry' => 'SHIPCOUNTRY',
        'QuothedTableMap::COL_SHIPCOUNTRY' => 'SHIPCOUNTRY',
        'COL_SHIPCOUNTRY' => 'SHIPCOUNTRY',
        'Shipcity' => 'SHIPCITY',
        'Quothed.Shipcity' => 'SHIPCITY',
        'shipcity' => 'SHIPCITY',
        'quothed.shipcity' => 'SHIPCITY',
        'QuothedTableMap::COL_SHIPCITY' => 'SHIPCITY',
        'COL_SHIPCITY' => 'SHIPCITY',
        'Shipstate' => 'SHIPSTATE',
        'Quothed.Shipstate' => 'SHIPSTATE',
        'shipstate' => 'SHIPSTATE',
        'quothed.shipstate' => 'SHIPSTATE',
        'QuothedTableMap::COL_SHIPSTATE' => 'SHIPSTATE',
        'COL_SHIPSTATE' => 'SHIPSTATE',
        'Shipzip' => 'SHIPZIP',
        'Quothed.Shipzip' => 'SHIPZIP',
        'shipzip' => 'SHIPZIP',
        'quothed.shipzip' => 'SHIPZIP',
        'QuothedTableMap::COL_SHIPZIP' => 'SHIPZIP',
        'COL_SHIPZIP' => 'SHIPZIP',
        'Contact' => 'CONTACT',
        'Quothed.Contact' => 'CONTACT',
        'contact' => 'CONTACT',
        'quothed.contact' => 'CONTACT',
        'QuothedTableMap::COL_CONTACT' => 'CONTACT',
        'COL_CONTACT' => 'CONTACT',
        'Phone' => 'PHONE',
        'Quothed.Phone' => 'PHONE',
        'phone' => 'PHONE',
        'quothed.phone' => 'PHONE',
        'QuothedTableMap::COL_PHONE' => 'PHONE',
        'COL_PHONE' => 'PHONE',
        'Faxnbr' => 'FAXNBR',
        'Quothed.Faxnbr' => 'FAXNBR',
        'faxnbr' => 'FAXNBR',
        'quothed.faxnbr' => 'FAXNBR',
        'QuothedTableMap::COL_FAXNBR' => 'FAXNBR',
        'COL_FAXNBR' => 'FAXNBR',
        'Email' => 'EMAIL',
        'Quothed.Email' => 'EMAIL',
        'email' => 'EMAIL',
        'quothed.email' => 'EMAIL',
        'QuothedTableMap::COL_EMAIL' => 'EMAIL',
        'COL_EMAIL' => 'EMAIL',
        'Careof' => 'CAREOF',
        'Quothed.Careof' => 'CAREOF',
        'careof' => 'CAREOF',
        'quothed.careof' => 'CAREOF',
        'QuothedTableMap::COL_CAREOF' => 'CAREOF',
        'COL_CAREOF' => 'CAREOF',
        'Quotdate' => 'QUOTDATE',
        'Quothed.Quotdate' => 'QUOTDATE',
        'quotdate' => 'QUOTDATE',
        'quothed.quotdate' => 'QUOTDATE',
        'QuothedTableMap::COL_QUOTDATE' => 'QUOTDATE',
        'COL_QUOTDATE' => 'QUOTDATE',
        'Revdate' => 'REVDATE',
        'Quothed.Revdate' => 'REVDATE',
        'revdate' => 'REVDATE',
        'quothed.revdate' => 'REVDATE',
        'QuothedTableMap::COL_REVDATE' => 'REVDATE',
        'COL_REVDATE' => 'REVDATE',
        'Expdate' => 'EXPDATE',
        'Quothed.Expdate' => 'EXPDATE',
        'expdate' => 'EXPDATE',
        'quothed.expdate' => 'EXPDATE',
        'QuothedTableMap::COL_EXPDATE' => 'EXPDATE',
        'COL_EXPDATE' => 'EXPDATE',
        'Pricecode' => 'PRICECODE',
        'Quothed.Pricecode' => 'PRICECODE',
        'pricecode' => 'PRICECODE',
        'quothed.pricecode' => 'PRICECODE',
        'QuothedTableMap::COL_PRICECODE' => 'PRICECODE',
        'COL_PRICECODE' => 'PRICECODE',
        'Pricecodedesc' => 'PRICECODEDESC',
        'Quothed.Pricecodedesc' => 'PRICECODEDESC',
        'pricecodedesc' => 'PRICECODEDESC',
        'quothed.pricecodedesc' => 'PRICECODEDESC',
        'QuothedTableMap::COL_PRICECODEDESC' => 'PRICECODEDESC',
        'COL_PRICECODEDESC' => 'PRICECODEDESC',
        'Taxcode' => 'TAXCODE',
        'Quothed.Taxcode' => 'TAXCODE',
        'taxcode' => 'TAXCODE',
        'quothed.taxcode' => 'TAXCODE',
        'QuothedTableMap::COL_TAXCODE' => 'TAXCODE',
        'COL_TAXCODE' => 'TAXCODE',
        'Taxcodedesc' => 'TAXCODEDESC',
        'Quothed.Taxcodedesc' => 'TAXCODEDESC',
        'taxcodedesc' => 'TAXCODEDESC',
        'quothed.taxcodedesc' => 'TAXCODEDESC',
        'QuothedTableMap::COL_TAXCODEDESC' => 'TAXCODEDESC',
        'COL_TAXCODEDESC' => 'TAXCODEDESC',
        'Termcode' => 'TERMCODE',
        'Quothed.Termcode' => 'TERMCODE',
        'termcode' => 'TERMCODE',
        'quothed.termcode' => 'TERMCODE',
        'QuothedTableMap::COL_TERMCODE' => 'TERMCODE',
        'COL_TERMCODE' => 'TERMCODE',
        'Termcodedesc' => 'TERMCODEDESC',
        'Quothed.Termcodedesc' => 'TERMCODEDESC',
        'termcodedesc' => 'TERMCODEDESC',
        'quothed.termcodedesc' => 'TERMCODEDESC',
        'QuothedTableMap::COL_TERMCODEDESC' => 'TERMCODEDESC',
        'COL_TERMCODEDESC' => 'TERMCODEDESC',
        'Shipviacd' => 'SHIPVIACD',
        'Quothed.Shipviacd' => 'SHIPVIACD',
        'shipviacd' => 'SHIPVIACD',
        'quothed.shipviacd' => 'SHIPVIACD',
        'QuothedTableMap::COL_SHIPVIACD' => 'SHIPVIACD',
        'COL_SHIPVIACD' => 'SHIPVIACD',
        'Shipviadesc' => 'SHIPVIADESC',
        'Quothed.Shipviadesc' => 'SHIPVIADESC',
        'shipviadesc' => 'SHIPVIADESC',
        'quothed.shipviadesc' => 'SHIPVIADESC',
        'QuothedTableMap::COL_SHIPVIADESC' => 'SHIPVIADESC',
        'COL_SHIPVIADESC' => 'SHIPVIADESC',
        'Sp1' => 'SP1',
        'Quothed.Sp1' => 'SP1',
        'sp1' => 'SP1',
        'quothed.sp1' => 'SP1',
        'QuothedTableMap::COL_SP1' => 'SP1',
        'COL_SP1' => 'SP1',
        'Sp1pct' => 'SP1PCT',
        'Quothed.Sp1pct' => 'SP1PCT',
        'sp1pct' => 'SP1PCT',
        'quothed.sp1pct' => 'SP1PCT',
        'QuothedTableMap::COL_SP1PCT' => 'SP1PCT',
        'COL_SP1PCT' => 'SP1PCT',
        'Sp1name' => 'SP1NAME',
        'Quothed.Sp1name' => 'SP1NAME',
        'sp1name' => 'SP1NAME',
        'quothed.sp1name' => 'SP1NAME',
        'QuothedTableMap::COL_SP1NAME' => 'SP1NAME',
        'COL_SP1NAME' => 'SP1NAME',
        'Sp2' => 'SP2',
        'Quothed.Sp2' => 'SP2',
        'sp2' => 'SP2',
        'quothed.sp2' => 'SP2',
        'QuothedTableMap::COL_SP2' => 'SP2',
        'COL_SP2' => 'SP2',
        'Sp2pct' => 'SP2PCT',
        'Quothed.Sp2pct' => 'SP2PCT',
        'sp2pct' => 'SP2PCT',
        'quothed.sp2pct' => 'SP2PCT',
        'QuothedTableMap::COL_SP2PCT' => 'SP2PCT',
        'COL_SP2PCT' => 'SP2PCT',
        'Sp2name' => 'SP2NAME',
        'Quothed.Sp2name' => 'SP2NAME',
        'sp2name' => 'SP2NAME',
        'quothed.sp2name' => 'SP2NAME',
        'QuothedTableMap::COL_SP2NAME' => 'SP2NAME',
        'COL_SP2NAME' => 'SP2NAME',
        'Sp3' => 'SP3',
        'Quothed.Sp3' => 'SP3',
        'sp3' => 'SP3',
        'quothed.sp3' => 'SP3',
        'QuothedTableMap::COL_SP3' => 'SP3',
        'COL_SP3' => 'SP3',
        'Sp3pct' => 'SP3PCT',
        'Quothed.Sp3pct' => 'SP3PCT',
        'sp3pct' => 'SP3PCT',
        'quothed.sp3pct' => 'SP3PCT',
        'QuothedTableMap::COL_SP3PCT' => 'SP3PCT',
        'COL_SP3PCT' => 'SP3PCT',
        'Sp3name' => 'SP3NAME',
        'Quothed.Sp3name' => 'SP3NAME',
        'sp3name' => 'SP3NAME',
        'quothed.sp3name' => 'SP3NAME',
        'QuothedTableMap::COL_SP3NAME' => 'SP3NAME',
        'COL_SP3NAME' => 'SP3NAME',
        'Fob' => 'FOB',
        'Quothed.Fob' => 'FOB',
        'fob' => 'FOB',
        'quothed.fob' => 'FOB',
        'QuothedTableMap::COL_FOB' => 'FOB',
        'COL_FOB' => 'FOB',
        'Deliverydesc' => 'DELIVERYDESC',
        'Quothed.Deliverydesc' => 'DELIVERYDESC',
        'deliverydesc' => 'DELIVERYDESC',
        'quothed.deliverydesc' => 'DELIVERYDESC',
        'QuothedTableMap::COL_DELIVERYDESC' => 'DELIVERYDESC',
        'COL_DELIVERYDESC' => 'DELIVERYDESC',
        'Whse' => 'WHSE',
        'Quothed.Whse' => 'WHSE',
        'whse' => 'WHSE',
        'quothed.whse' => 'WHSE',
        'QuothedTableMap::COL_WHSE' => 'WHSE',
        'COL_WHSE' => 'WHSE',
        'Custpo' => 'CUSTPO',
        'Quothed.Custpo' => 'CUSTPO',
        'custpo' => 'CUSTPO',
        'quothed.custpo' => 'CUSTPO',
        'QuothedTableMap::COL_CUSTPO' => 'CUSTPO',
        'COL_CUSTPO' => 'CUSTPO',
        'Custref' => 'CUSTREF',
        'Quothed.Custref' => 'CUSTREF',
        'custref' => 'CUSTREF',
        'quothed.custref' => 'CUSTREF',
        'QuothedTableMap::COL_CUSTREF' => 'CUSTREF',
        'COL_CUSTREF' => 'CUSTREF',
        'Hasnotes' => 'HASNOTES',
        'Quothed.Hasnotes' => 'HASNOTES',
        'hasnotes' => 'HASNOTES',
        'quothed.hasnotes' => 'HASNOTES',
        'QuothedTableMap::COL_HASNOTES' => 'HASNOTES',
        'COL_HASNOTES' => 'HASNOTES',
        'Error' => 'ERROR',
        'Quothed.Error' => 'ERROR',
        'error' => 'ERROR',
        'quothed.error' => 'ERROR',
        'QuothedTableMap::COL_ERROR' => 'ERROR',
        'COL_ERROR' => 'ERROR',
        'Errormsg' => 'ERRORMSG',
        'Quothed.Errormsg' => 'ERRORMSG',
        'errormsg' => 'ERRORMSG',
        'quothed.errormsg' => 'ERRORMSG',
        'QuothedTableMap::COL_ERRORMSG' => 'ERRORMSG',
        'COL_ERRORMSG' => 'ERRORMSG',
        'Subtotal' => 'SUBTOTAL',
        'Quothed.Subtotal' => 'SUBTOTAL',
        'subtotal' => 'SUBTOTAL',
        'quothed.subtotal' => 'SUBTOTAL',
        'QuothedTableMap::COL_SUBTOTAL' => 'SUBTOTAL',
        'COL_SUBTOTAL' => 'SUBTOTAL',
        'Salestax' => 'SALESTAX',
        'Quothed.Salestax' => 'SALESTAX',
        'salestax' => 'SALESTAX',
        'quothed.salestax' => 'SALESTAX',
        'QuothedTableMap::COL_SALESTAX' => 'SALESTAX',
        'COL_SALESTAX' => 'SALESTAX',
        'Freight' => 'FREIGHT',
        'Quothed.Freight' => 'FREIGHT',
        'freight' => 'FREIGHT',
        'quothed.freight' => 'FREIGHT',
        'QuothedTableMap::COL_FREIGHT' => 'FREIGHT',
        'COL_FREIGHT' => 'FREIGHT',
        'Misccost' => 'MISCCOST',
        'Quothed.Misccost' => 'MISCCOST',
        'misccost' => 'MISCCOST',
        'quothed.misccost' => 'MISCCOST',
        'QuothedTableMap::COL_MISCCOST' => 'MISCCOST',
        'COL_MISCCOST' => 'MISCCOST',
        'Ordertotal' => 'ORDERTOTAL',
        'Quothed.Ordertotal' => 'ORDERTOTAL',
        'ordertotal' => 'ORDERTOTAL',
        'quothed.ordertotal' => 'ORDERTOTAL',
        'QuothedTableMap::COL_ORDERTOTAL' => 'ORDERTOTAL',
        'COL_ORDERTOTAL' => 'ORDERTOTAL',
        'CostTotal' => 'COST_TOTAL',
        'Quothed.CostTotal' => 'COST_TOTAL',
        'costTotal' => 'COST_TOTAL',
        'quothed.costTotal' => 'COST_TOTAL',
        'QuothedTableMap::COL_COST_TOTAL' => 'COST_TOTAL',
        'COL_COST_TOTAL' => 'COST_TOTAL',
        'cost_total' => 'COST_TOTAL',
        'quothed.cost_total' => 'COST_TOTAL',
        'MarginAmt' => 'MARGIN_AMT',
        'Quothed.MarginAmt' => 'MARGIN_AMT',
        'marginAmt' => 'MARGIN_AMT',
        'quothed.marginAmt' => 'MARGIN_AMT',
        'QuothedTableMap::COL_MARGIN_AMT' => 'MARGIN_AMT',
        'COL_MARGIN_AMT' => 'MARGIN_AMT',
        'margin_amt' => 'MARGIN_AMT',
        'quothed.margin_amt' => 'MARGIN_AMT',
        'MarginPct' => 'MARGIN_PCT',
        'Quothed.MarginPct' => 'MARGIN_PCT',
        'marginPct' => 'MARGIN_PCT',
        'quothed.marginPct' => 'MARGIN_PCT',
        'QuothedTableMap::COL_MARGIN_PCT' => 'MARGIN_PCT',
        'COL_MARGIN_PCT' => 'MARGIN_PCT',
        'margin_pct' => 'MARGIN_PCT',
        'quothed.margin_pct' => 'MARGIN_PCT',
        'Dummy' => 'DUMMY',
        'Quothed.Dummy' => 'DUMMY',
        'dummy' => 'DUMMY',
        'quothed.dummy' => 'DUMMY',
        'QuothedTableMap::COL_DUMMY' => 'DUMMY',
        'COL_DUMMY' => 'DUMMY',
    ];

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function initialize(): void
    {
        // attributes
        $this->setName('quothed');
        $this->setPhpName('Quothed');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Quothed');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('sessionid', 'Sessionid', 'VARCHAR', true, 50, null);
        $this->addPrimaryKey('recno', 'Recno', 'INTEGER', true, null, null);
        $this->addColumn('date', 'Date', 'INTEGER', false, 8, null);
        $this->addColumn('time', 'Time', 'INTEGER', false, 8, null);
        $this->addColumn('quotnbr', 'Quotnbr', 'VARCHAR', false, 20, '');
        $this->addColumn('status', 'Status', 'VARCHAR', false, 1, '');
        $this->addColumn('custid', 'Custid', 'VARCHAR', false, 6, '');
        $this->addColumn('billname', 'Billname', 'VARCHAR', false, 30, '');
        $this->addColumn('billaddress', 'Billaddress', 'VARCHAR', false, 30, '');
        $this->addColumn('billaddress2', 'Billaddress2', 'VARCHAR', false, 30, '');
        $this->addColumn('billaddress3', 'Billaddress3', 'VARCHAR', false, 30, '');
        $this->addColumn('billcountry', 'Billcountry', 'VARCHAR', false, 4, '');
        $this->addColumn('billcity', 'Billcity', 'VARCHAR', false, 16, '');
        $this->addColumn('billstate', 'Billstate', 'VARCHAR', false, 2, '');
        $this->addColumn('billzip', 'Billzip', 'VARCHAR', false, 10, '');
        $this->addColumn('shiptoid', 'Shiptoid', 'VARCHAR', false, 6, '');
        $this->addColumn('shipname', 'Shipname', 'VARCHAR', false, 30, '');
        $this->addColumn('shipaddress', 'Shipaddress', 'VARCHAR', false, 30, '');
        $this->addColumn('shipaddress2', 'Shipaddress2', 'VARCHAR', false, 30, '');
        $this->addColumn('shipaddress3', 'Shipaddress3', 'VARCHAR', false, 30, '');
        $this->addColumn('shipcountry', 'Shipcountry', 'VARCHAR', false, 4, '');
        $this->addColumn('shipcity', 'Shipcity', 'VARCHAR', false, 16, '');
        $this->addColumn('shipstate', 'Shipstate', 'VARCHAR', false, 2, '');
        $this->addColumn('shipzip', 'Shipzip', 'VARCHAR', false, 10, '');
        $this->addColumn('contact', 'Contact', 'VARCHAR', false, 20, '');
        $this->addColumn('phone', 'Phone', 'VARCHAR', false, 12, '');
        $this->addColumn('faxnbr', 'Faxnbr', 'VARCHAR', false, 12, '');
        $this->addColumn('email', 'Email', 'VARCHAR', false, 50, '');
        $this->addColumn('careof', 'Careof', 'VARCHAR', false, 20, '');
        $this->addColumn('quotdate', 'Quotdate', 'VARCHAR', false, 10, '');
        $this->addColumn('revdate', 'Revdate', 'VARCHAR', false, 10, '');
        $this->addColumn('expdate', 'Expdate', 'VARCHAR', false, 10, '');
        $this->addColumn('pricecode', 'Pricecode', 'VARCHAR', false, 4, '');
        $this->addColumn('pricecodedesc', 'Pricecodedesc', 'VARCHAR', false, 20, '');
        $this->addColumn('taxcode', 'Taxcode', 'VARCHAR', false, 6, '');
        $this->addColumn('taxcodedesc', 'Taxcodedesc', 'VARCHAR', false, 20, '');
        $this->addColumn('termcode', 'Termcode', 'VARCHAR', false, 4, '');
        $this->addColumn('termcodedesc', 'Termcodedesc', 'VARCHAR', false, 20, '');
        $this->addColumn('shipviacd', 'Shipviacd', 'VARCHAR', false, 4, '');
        $this->addColumn('shipviadesc', 'Shipviadesc', 'VARCHAR', false, 20, '');
        $this->addColumn('sp1', 'Sp1', 'VARCHAR', false, 6, '');
        $this->addColumn('sp1pct', 'Sp1pct', 'VARCHAR', false, 10, '');
        $this->addColumn('sp1name', 'Sp1name', 'VARCHAR', false, 20, '');
        $this->addColumn('sp2', 'Sp2', 'VARCHAR', false, 6, '');
        $this->addColumn('sp2pct', 'Sp2pct', 'VARCHAR', false, 10, '');
        $this->addColumn('sp2name', 'Sp2name', 'VARCHAR', false, 20, '');
        $this->addColumn('sp3', 'Sp3', 'VARCHAR', false, 6, '');
        $this->addColumn('sp3pct', 'Sp3pct', 'VARCHAR', false, 10, '');
        $this->addColumn('sp3name', 'Sp3name', 'VARCHAR', false, 20, '');
        $this->addColumn('fob', 'Fob', 'VARCHAR', false, 4, '');
        $this->addColumn('deliverydesc', 'Deliverydesc', 'VARCHAR', false, 20, '');
        $this->addColumn('whse', 'Whse', 'VARCHAR', false, 2, '');
        $this->addColumn('custpo', 'Custpo', 'VARCHAR', false, 20, '');
        $this->addColumn('custref', 'Custref', 'VARCHAR', false, 20, '');
        $this->addColumn('hasnotes', 'Hasnotes', 'VARCHAR', false, 1, '');
        $this->addColumn('error', 'Error', 'VARCHAR', false, 1, '');
        $this->addColumn('errormsg', 'Errormsg', 'VARCHAR', false, 50, '');
        $this->addColumn('subtotal', 'Subtotal', 'DECIMAL', false, 10, 0.00);
        $this->addColumn('salestax', 'Salestax', 'DECIMAL', false, 10, 0.00);
        $this->addColumn('freight', 'Freight', 'DECIMAL', false, 10, 0.00);
        $this->addColumn('misccost', 'Misccost', 'DECIMAL', false, 10, 0.00);
        $this->addColumn('ordertotal', 'Ordertotal', 'DECIMAL', false, 10, 0.00);
        $this->addColumn('cost_total', 'CostTotal', 'DECIMAL', false, 10, 0.00);
        $this->addColumn('margin_amt', 'MarginAmt', 'VARCHAR', false, 20, '0.00');
        $this->addColumn('margin_pct', 'MarginPct', 'VARCHAR', false, 20, '0.00');
        $this->addColumn('dummy', 'Dummy', 'VARCHAR', false, 1, 'x');
    }

    /**
     * Build the RelationMap objects for this table relationships
     *
     * @return void
     */
    public function buildRelations(): void
    {
    }

    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database. In some cases you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by find*()
     * and findPk*() calls.
     *
     * @param \Quothed $obj A \Quothed object.
     * @param string|null $key Key (optional) to use for instance map (for performance boost if key was already calculated externally).
     *
     * @return void
     */
    public static function addInstanceToPool(Quothed $obj, ?string $key = null): void
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getSessionid() || is_scalar($obj->getSessionid()) || is_callable([$obj->getSessionid(), '__toString']) ? (string) $obj->getSessionid() : $obj->getSessionid()), (null === $obj->getRecno() || is_scalar($obj->getRecno()) || is_callable([$obj->getRecno(), '__toString']) ? (string) $obj->getRecno() : $obj->getRecno())]);
            } // if key === null
            self::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param mixed $value A \Quothed object or a primary key value.
     *
     * @return void
     */
    public static function removeInstanceFromPool($value): void
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Quothed) {
                $key = serialize([(null === $value->getSessionid() || is_scalar($value->getSessionid()) || is_callable([$value->getSessionid(), '__toString']) ? (string) $value->getSessionid() : $value->getSessionid()), (null === $value->getRecno() || is_scalar($value->getRecno()) || is_callable([$value->getRecno(), '__toString']) ? (string) $value->getRecno() : $value->getRecno())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Quothed object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
                throw $e;
            }

            unset(self::$instances[$key]);
        }
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array $row Resultset row.
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string|null The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): ?string
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)])]);
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array $row Resultset row.
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM)
    {
            $pks = [];

        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 1 + $offset
                : self::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)
        ];

        return $pks;
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param bool $withPrefix Whether to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass(bool $withPrefix = true): string
    {
        return $withPrefix ? QuothedTableMap::CLASS_DEFAULT : QuothedTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array $row Row returned by DataFetcher->fetch().
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array (Quothed object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = QuothedTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = QuothedTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + QuothedTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = QuothedTableMap::OM_CLASS;
            /** @var Quothed $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            QuothedTableMap::addInstanceToPool($obj, $key);
        }

        return [$obj, $col];
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array<object>
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher): array
    {
        $results = [];

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = QuothedTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = QuothedTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Quothed $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                QuothedTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria Object containing the columns to add.
     * @param string|null $alias Optional table alias
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return void
     */
    public static function addSelectColumns(Criteria $criteria, ?string $alias = null): void
    {
        if (null === $alias) {
            $criteria->addSelectColumn(QuothedTableMap::COL_SESSIONID);
            $criteria->addSelectColumn(QuothedTableMap::COL_RECNO);
            $criteria->addSelectColumn(QuothedTableMap::COL_DATE);
            $criteria->addSelectColumn(QuothedTableMap::COL_TIME);
            $criteria->addSelectColumn(QuothedTableMap::COL_QUOTNBR);
            $criteria->addSelectColumn(QuothedTableMap::COL_STATUS);
            $criteria->addSelectColumn(QuothedTableMap::COL_CUSTID);
            $criteria->addSelectColumn(QuothedTableMap::COL_BILLNAME);
            $criteria->addSelectColumn(QuothedTableMap::COL_BILLADDRESS);
            $criteria->addSelectColumn(QuothedTableMap::COL_BILLADDRESS2);
            $criteria->addSelectColumn(QuothedTableMap::COL_BILLADDRESS3);
            $criteria->addSelectColumn(QuothedTableMap::COL_BILLCOUNTRY);
            $criteria->addSelectColumn(QuothedTableMap::COL_BILLCITY);
            $criteria->addSelectColumn(QuothedTableMap::COL_BILLSTATE);
            $criteria->addSelectColumn(QuothedTableMap::COL_BILLZIP);
            $criteria->addSelectColumn(QuothedTableMap::COL_SHIPTOID);
            $criteria->addSelectColumn(QuothedTableMap::COL_SHIPNAME);
            $criteria->addSelectColumn(QuothedTableMap::COL_SHIPADDRESS);
            $criteria->addSelectColumn(QuothedTableMap::COL_SHIPADDRESS2);
            $criteria->addSelectColumn(QuothedTableMap::COL_SHIPADDRESS3);
            $criteria->addSelectColumn(QuothedTableMap::COL_SHIPCOUNTRY);
            $criteria->addSelectColumn(QuothedTableMap::COL_SHIPCITY);
            $criteria->addSelectColumn(QuothedTableMap::COL_SHIPSTATE);
            $criteria->addSelectColumn(QuothedTableMap::COL_SHIPZIP);
            $criteria->addSelectColumn(QuothedTableMap::COL_CONTACT);
            $criteria->addSelectColumn(QuothedTableMap::COL_PHONE);
            $criteria->addSelectColumn(QuothedTableMap::COL_FAXNBR);
            $criteria->addSelectColumn(QuothedTableMap::COL_EMAIL);
            $criteria->addSelectColumn(QuothedTableMap::COL_CAREOF);
            $criteria->addSelectColumn(QuothedTableMap::COL_QUOTDATE);
            $criteria->addSelectColumn(QuothedTableMap::COL_REVDATE);
            $criteria->addSelectColumn(QuothedTableMap::COL_EXPDATE);
            $criteria->addSelectColumn(QuothedTableMap::COL_PRICECODE);
            $criteria->addSelectColumn(QuothedTableMap::COL_PRICECODEDESC);
            $criteria->addSelectColumn(QuothedTableMap::COL_TAXCODE);
            $criteria->addSelectColumn(QuothedTableMap::COL_TAXCODEDESC);
            $criteria->addSelectColumn(QuothedTableMap::COL_TERMCODE);
            $criteria->addSelectColumn(QuothedTableMap::COL_TERMCODEDESC);
            $criteria->addSelectColumn(QuothedTableMap::COL_SHIPVIACD);
            $criteria->addSelectColumn(QuothedTableMap::COL_SHIPVIADESC);
            $criteria->addSelectColumn(QuothedTableMap::COL_SP1);
            $criteria->addSelectColumn(QuothedTableMap::COL_SP1PCT);
            $criteria->addSelectColumn(QuothedTableMap::COL_SP1NAME);
            $criteria->addSelectColumn(QuothedTableMap::COL_SP2);
            $criteria->addSelectColumn(QuothedTableMap::COL_SP2PCT);
            $criteria->addSelectColumn(QuothedTableMap::COL_SP2NAME);
            $criteria->addSelectColumn(QuothedTableMap::COL_SP3);
            $criteria->addSelectColumn(QuothedTableMap::COL_SP3PCT);
            $criteria->addSelectColumn(QuothedTableMap::COL_SP3NAME);
            $criteria->addSelectColumn(QuothedTableMap::COL_FOB);
            $criteria->addSelectColumn(QuothedTableMap::COL_DELIVERYDESC);
            $criteria->addSelectColumn(QuothedTableMap::COL_WHSE);
            $criteria->addSelectColumn(QuothedTableMap::COL_CUSTPO);
            $criteria->addSelectColumn(QuothedTableMap::COL_CUSTREF);
            $criteria->addSelectColumn(QuothedTableMap::COL_HASNOTES);
            $criteria->addSelectColumn(QuothedTableMap::COL_ERROR);
            $criteria->addSelectColumn(QuothedTableMap::COL_ERRORMSG);
            $criteria->addSelectColumn(QuothedTableMap::COL_SUBTOTAL);
            $criteria->addSelectColumn(QuothedTableMap::COL_SALESTAX);
            $criteria->addSelectColumn(QuothedTableMap::COL_FREIGHT);
            $criteria->addSelectColumn(QuothedTableMap::COL_MISCCOST);
            $criteria->addSelectColumn(QuothedTableMap::COL_ORDERTOTAL);
            $criteria->addSelectColumn(QuothedTableMap::COL_COST_TOTAL);
            $criteria->addSelectColumn(QuothedTableMap::COL_MARGIN_AMT);
            $criteria->addSelectColumn(QuothedTableMap::COL_MARGIN_PCT);
            $criteria->addSelectColumn(QuothedTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.sessionid');
            $criteria->addSelectColumn($alias . '.recno');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.time');
            $criteria->addSelectColumn($alias . '.quotnbr');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.custid');
            $criteria->addSelectColumn($alias . '.billname');
            $criteria->addSelectColumn($alias . '.billaddress');
            $criteria->addSelectColumn($alias . '.billaddress2');
            $criteria->addSelectColumn($alias . '.billaddress3');
            $criteria->addSelectColumn($alias . '.billcountry');
            $criteria->addSelectColumn($alias . '.billcity');
            $criteria->addSelectColumn($alias . '.billstate');
            $criteria->addSelectColumn($alias . '.billzip');
            $criteria->addSelectColumn($alias . '.shiptoid');
            $criteria->addSelectColumn($alias . '.shipname');
            $criteria->addSelectColumn($alias . '.shipaddress');
            $criteria->addSelectColumn($alias . '.shipaddress2');
            $criteria->addSelectColumn($alias . '.shipaddress3');
            $criteria->addSelectColumn($alias . '.shipcountry');
            $criteria->addSelectColumn($alias . '.shipcity');
            $criteria->addSelectColumn($alias . '.shipstate');
            $criteria->addSelectColumn($alias . '.shipzip');
            $criteria->addSelectColumn($alias . '.contact');
            $criteria->addSelectColumn($alias . '.phone');
            $criteria->addSelectColumn($alias . '.faxnbr');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.careof');
            $criteria->addSelectColumn($alias . '.quotdate');
            $criteria->addSelectColumn($alias . '.revdate');
            $criteria->addSelectColumn($alias . '.expdate');
            $criteria->addSelectColumn($alias . '.pricecode');
            $criteria->addSelectColumn($alias . '.pricecodedesc');
            $criteria->addSelectColumn($alias . '.taxcode');
            $criteria->addSelectColumn($alias . '.taxcodedesc');
            $criteria->addSelectColumn($alias . '.termcode');
            $criteria->addSelectColumn($alias . '.termcodedesc');
            $criteria->addSelectColumn($alias . '.shipviacd');
            $criteria->addSelectColumn($alias . '.shipviadesc');
            $criteria->addSelectColumn($alias . '.sp1');
            $criteria->addSelectColumn($alias . '.sp1pct');
            $criteria->addSelectColumn($alias . '.sp1name');
            $criteria->addSelectColumn($alias . '.sp2');
            $criteria->addSelectColumn($alias . '.sp2pct');
            $criteria->addSelectColumn($alias . '.sp2name');
            $criteria->addSelectColumn($alias . '.sp3');
            $criteria->addSelectColumn($alias . '.sp3pct');
            $criteria->addSelectColumn($alias . '.sp3name');
            $criteria->addSelectColumn($alias . '.fob');
            $criteria->addSelectColumn($alias . '.deliverydesc');
            $criteria->addSelectColumn($alias . '.whse');
            $criteria->addSelectColumn($alias . '.custpo');
            $criteria->addSelectColumn($alias . '.custref');
            $criteria->addSelectColumn($alias . '.hasnotes');
            $criteria->addSelectColumn($alias . '.error');
            $criteria->addSelectColumn($alias . '.errormsg');
            $criteria->addSelectColumn($alias . '.subtotal');
            $criteria->addSelectColumn($alias . '.salestax');
            $criteria->addSelectColumn($alias . '.freight');
            $criteria->addSelectColumn($alias . '.misccost');
            $criteria->addSelectColumn($alias . '.ordertotal');
            $criteria->addSelectColumn($alias . '.cost_total');
            $criteria->addSelectColumn($alias . '.margin_amt');
            $criteria->addSelectColumn($alias . '.margin_pct');
            $criteria->addSelectColumn($alias . '.dummy');
        }
    }

    /**
     * Remove all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be removed as they are only loaded on demand.
     *
     * @param Criteria $criteria Object containing the columns to remove.
     * @param string|null $alias Optional table alias
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return void
     */
    public static function removeSelectColumns(Criteria $criteria, ?string $alias = null): void
    {
        if (null === $alias) {
            $criteria->removeSelectColumn(QuothedTableMap::COL_SESSIONID);
            $criteria->removeSelectColumn(QuothedTableMap::COL_RECNO);
            $criteria->removeSelectColumn(QuothedTableMap::COL_DATE);
            $criteria->removeSelectColumn(QuothedTableMap::COL_TIME);
            $criteria->removeSelectColumn(QuothedTableMap::COL_QUOTNBR);
            $criteria->removeSelectColumn(QuothedTableMap::COL_STATUS);
            $criteria->removeSelectColumn(QuothedTableMap::COL_CUSTID);
            $criteria->removeSelectColumn(QuothedTableMap::COL_BILLNAME);
            $criteria->removeSelectColumn(QuothedTableMap::COL_BILLADDRESS);
            $criteria->removeSelectColumn(QuothedTableMap::COL_BILLADDRESS2);
            $criteria->removeSelectColumn(QuothedTableMap::COL_BILLADDRESS3);
            $criteria->removeSelectColumn(QuothedTableMap::COL_BILLCOUNTRY);
            $criteria->removeSelectColumn(QuothedTableMap::COL_BILLCITY);
            $criteria->removeSelectColumn(QuothedTableMap::COL_BILLSTATE);
            $criteria->removeSelectColumn(QuothedTableMap::COL_BILLZIP);
            $criteria->removeSelectColumn(QuothedTableMap::COL_SHIPTOID);
            $criteria->removeSelectColumn(QuothedTableMap::COL_SHIPNAME);
            $criteria->removeSelectColumn(QuothedTableMap::COL_SHIPADDRESS);
            $criteria->removeSelectColumn(QuothedTableMap::COL_SHIPADDRESS2);
            $criteria->removeSelectColumn(QuothedTableMap::COL_SHIPADDRESS3);
            $criteria->removeSelectColumn(QuothedTableMap::COL_SHIPCOUNTRY);
            $criteria->removeSelectColumn(QuothedTableMap::COL_SHIPCITY);
            $criteria->removeSelectColumn(QuothedTableMap::COL_SHIPSTATE);
            $criteria->removeSelectColumn(QuothedTableMap::COL_SHIPZIP);
            $criteria->removeSelectColumn(QuothedTableMap::COL_CONTACT);
            $criteria->removeSelectColumn(QuothedTableMap::COL_PHONE);
            $criteria->removeSelectColumn(QuothedTableMap::COL_FAXNBR);
            $criteria->removeSelectColumn(QuothedTableMap::COL_EMAIL);
            $criteria->removeSelectColumn(QuothedTableMap::COL_CAREOF);
            $criteria->removeSelectColumn(QuothedTableMap::COL_QUOTDATE);
            $criteria->removeSelectColumn(QuothedTableMap::COL_REVDATE);
            $criteria->removeSelectColumn(QuothedTableMap::COL_EXPDATE);
            $criteria->removeSelectColumn(QuothedTableMap::COL_PRICECODE);
            $criteria->removeSelectColumn(QuothedTableMap::COL_PRICECODEDESC);
            $criteria->removeSelectColumn(QuothedTableMap::COL_TAXCODE);
            $criteria->removeSelectColumn(QuothedTableMap::COL_TAXCODEDESC);
            $criteria->removeSelectColumn(QuothedTableMap::COL_TERMCODE);
            $criteria->removeSelectColumn(QuothedTableMap::COL_TERMCODEDESC);
            $criteria->removeSelectColumn(QuothedTableMap::COL_SHIPVIACD);
            $criteria->removeSelectColumn(QuothedTableMap::COL_SHIPVIADESC);
            $criteria->removeSelectColumn(QuothedTableMap::COL_SP1);
            $criteria->removeSelectColumn(QuothedTableMap::COL_SP1PCT);
            $criteria->removeSelectColumn(QuothedTableMap::COL_SP1NAME);
            $criteria->removeSelectColumn(QuothedTableMap::COL_SP2);
            $criteria->removeSelectColumn(QuothedTableMap::COL_SP2PCT);
            $criteria->removeSelectColumn(QuothedTableMap::COL_SP2NAME);
            $criteria->removeSelectColumn(QuothedTableMap::COL_SP3);
            $criteria->removeSelectColumn(QuothedTableMap::COL_SP3PCT);
            $criteria->removeSelectColumn(QuothedTableMap::COL_SP3NAME);
            $criteria->removeSelectColumn(QuothedTableMap::COL_FOB);
            $criteria->removeSelectColumn(QuothedTableMap::COL_DELIVERYDESC);
            $criteria->removeSelectColumn(QuothedTableMap::COL_WHSE);
            $criteria->removeSelectColumn(QuothedTableMap::COL_CUSTPO);
            $criteria->removeSelectColumn(QuothedTableMap::COL_CUSTREF);
            $criteria->removeSelectColumn(QuothedTableMap::COL_HASNOTES);
            $criteria->removeSelectColumn(QuothedTableMap::COL_ERROR);
            $criteria->removeSelectColumn(QuothedTableMap::COL_ERRORMSG);
            $criteria->removeSelectColumn(QuothedTableMap::COL_SUBTOTAL);
            $criteria->removeSelectColumn(QuothedTableMap::COL_SALESTAX);
            $criteria->removeSelectColumn(QuothedTableMap::COL_FREIGHT);
            $criteria->removeSelectColumn(QuothedTableMap::COL_MISCCOST);
            $criteria->removeSelectColumn(QuothedTableMap::COL_ORDERTOTAL);
            $criteria->removeSelectColumn(QuothedTableMap::COL_COST_TOTAL);
            $criteria->removeSelectColumn(QuothedTableMap::COL_MARGIN_AMT);
            $criteria->removeSelectColumn(QuothedTableMap::COL_MARGIN_PCT);
            $criteria->removeSelectColumn(QuothedTableMap::COL_DUMMY);
        } else {
            $criteria->removeSelectColumn($alias . '.sessionid');
            $criteria->removeSelectColumn($alias . '.recno');
            $criteria->removeSelectColumn($alias . '.date');
            $criteria->removeSelectColumn($alias . '.time');
            $criteria->removeSelectColumn($alias . '.quotnbr');
            $criteria->removeSelectColumn($alias . '.status');
            $criteria->removeSelectColumn($alias . '.custid');
            $criteria->removeSelectColumn($alias . '.billname');
            $criteria->removeSelectColumn($alias . '.billaddress');
            $criteria->removeSelectColumn($alias . '.billaddress2');
            $criteria->removeSelectColumn($alias . '.billaddress3');
            $criteria->removeSelectColumn($alias . '.billcountry');
            $criteria->removeSelectColumn($alias . '.billcity');
            $criteria->removeSelectColumn($alias . '.billstate');
            $criteria->removeSelectColumn($alias . '.billzip');
            $criteria->removeSelectColumn($alias . '.shiptoid');
            $criteria->removeSelectColumn($alias . '.shipname');
            $criteria->removeSelectColumn($alias . '.shipaddress');
            $criteria->removeSelectColumn($alias . '.shipaddress2');
            $criteria->removeSelectColumn($alias . '.shipaddress3');
            $criteria->removeSelectColumn($alias . '.shipcountry');
            $criteria->removeSelectColumn($alias . '.shipcity');
            $criteria->removeSelectColumn($alias . '.shipstate');
            $criteria->removeSelectColumn($alias . '.shipzip');
            $criteria->removeSelectColumn($alias . '.contact');
            $criteria->removeSelectColumn($alias . '.phone');
            $criteria->removeSelectColumn($alias . '.faxnbr');
            $criteria->removeSelectColumn($alias . '.email');
            $criteria->removeSelectColumn($alias . '.careof');
            $criteria->removeSelectColumn($alias . '.quotdate');
            $criteria->removeSelectColumn($alias . '.revdate');
            $criteria->removeSelectColumn($alias . '.expdate');
            $criteria->removeSelectColumn($alias . '.pricecode');
            $criteria->removeSelectColumn($alias . '.pricecodedesc');
            $criteria->removeSelectColumn($alias . '.taxcode');
            $criteria->removeSelectColumn($alias . '.taxcodedesc');
            $criteria->removeSelectColumn($alias . '.termcode');
            $criteria->removeSelectColumn($alias . '.termcodedesc');
            $criteria->removeSelectColumn($alias . '.shipviacd');
            $criteria->removeSelectColumn($alias . '.shipviadesc');
            $criteria->removeSelectColumn($alias . '.sp1');
            $criteria->removeSelectColumn($alias . '.sp1pct');
            $criteria->removeSelectColumn($alias . '.sp1name');
            $criteria->removeSelectColumn($alias . '.sp2');
            $criteria->removeSelectColumn($alias . '.sp2pct');
            $criteria->removeSelectColumn($alias . '.sp2name');
            $criteria->removeSelectColumn($alias . '.sp3');
            $criteria->removeSelectColumn($alias . '.sp3pct');
            $criteria->removeSelectColumn($alias . '.sp3name');
            $criteria->removeSelectColumn($alias . '.fob');
            $criteria->removeSelectColumn($alias . '.deliverydesc');
            $criteria->removeSelectColumn($alias . '.whse');
            $criteria->removeSelectColumn($alias . '.custpo');
            $criteria->removeSelectColumn($alias . '.custref');
            $criteria->removeSelectColumn($alias . '.hasnotes');
            $criteria->removeSelectColumn($alias . '.error');
            $criteria->removeSelectColumn($alias . '.errormsg');
            $criteria->removeSelectColumn($alias . '.subtotal');
            $criteria->removeSelectColumn($alias . '.salestax');
            $criteria->removeSelectColumn($alias . '.freight');
            $criteria->removeSelectColumn($alias . '.misccost');
            $criteria->removeSelectColumn($alias . '.ordertotal');
            $criteria->removeSelectColumn($alias . '.cost_total');
            $criteria->removeSelectColumn($alias . '.margin_amt');
            $criteria->removeSelectColumn($alias . '.margin_pct');
            $criteria->removeSelectColumn($alias . '.dummy');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap(): TableMap
    {
        return Propel::getServiceContainer()->getDatabaseMap(QuothedTableMap::DATABASE_NAME)->getTable(QuothedTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Quothed or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or Quothed object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ?ConnectionInterface $con = null): int
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(QuothedTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Quothed) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(QuothedTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = [$values];
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(QuothedTableMap::COL_SESSIONID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(QuothedTableMap::COL_RECNO, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = QuothedQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            QuothedTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                QuothedTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the quothed table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return QuothedQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Quothed or Criteria object.
     *
     * @param mixed $criteria Criteria or Quothed object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(QuothedTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Quothed object
        }


        // Set the correct dbName
        $query = QuothedQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
