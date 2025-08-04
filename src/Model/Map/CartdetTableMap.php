<?php

namespace Map;

use \Cartdet;
use \CartdetQuery;
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
 * This class defines the structure of the 'cartdet' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class CartdetTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = '.Map.CartdetTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'cartdet';

    /**
     * The PHP name of this class (PascalCase)
     */
    public const TABLE_PHP_NAME = 'Cartdet';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\Cartdet';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'Cartdet';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 41;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 41;

    /**
     * the column name for the sessionid field
     */
    public const COL_SESSIONID = 'cartdet.sessionid';

    /**
     * the column name for the recno field
     */
    public const COL_RECNO = 'cartdet.recno';

    /**
     * the column name for the date field
     */
    public const COL_DATE = 'cartdet.date';

    /**
     * the column name for the time field
     */
    public const COL_TIME = 'cartdet.time';

    /**
     * the column name for the orderno field
     */
    public const COL_ORDERNO = 'cartdet.orderno';

    /**
     * the column name for the linenbr field
     */
    public const COL_LINENBR = 'cartdet.linenbr';

    /**
     * the column name for the itemid field
     */
    public const COL_ITEMID = 'cartdet.itemid';

    /**
     * the column name for the custitemid field
     */
    public const COL_CUSTITEMID = 'cartdet.custitemid';

    /**
     * the column name for the desc1 field
     */
    public const COL_DESC1 = 'cartdet.desc1';

    /**
     * the column name for the desc2 field
     */
    public const COL_DESC2 = 'cartdet.desc2';

    /**
     * the column name for the price field
     */
    public const COL_PRICE = 'cartdet.price';

    /**
     * the column name for the totalprice field
     */
    public const COL_TOTALPRICE = 'cartdet.totalprice';

    /**
     * the column name for the qty field
     */
    public const COL_QTY = 'cartdet.qty';

    /**
     * the column name for the qtyshipped field
     */
    public const COL_QTYSHIPPED = 'cartdet.qtyshipped';

    /**
     * the column name for the qtybackord field
     */
    public const COL_QTYBACKORD = 'cartdet.qtybackord';

    /**
     * the column name for the rshipdate field
     */
    public const COL_RSHIPDATE = 'cartdet.rshipdate';

    /**
     * the column name for the hasdocuments field
     */
    public const COL_HASDOCUMENTS = 'cartdet.hasdocuments';

    /**
     * the column name for the qtyavail field
     */
    public const COL_QTYAVAIL = 'cartdet.qtyavail';

    /**
     * the column name for the hasnotes field
     */
    public const COL_HASNOTES = 'cartdet.hasnotes';

    /**
     * the column name for the cost field
     */
    public const COL_COST = 'cartdet.cost';

    /**
     * the column name for the whse field
     */
    public const COL_WHSE = 'cartdet.whse';

    /**
     * the column name for the uom field
     */
    public const COL_UOM = 'cartdet.uom';

    /**
     * the column name for the spcord field
     */
    public const COL_SPCORD = 'cartdet.spcord';

    /**
     * the column name for the kititemflag field
     */
    public const COL_KITITEMFLAG = 'cartdet.kititemflag';

    /**
     * the column name for the promocode field
     */
    public const COL_PROMOCODE = 'cartdet.promocode';

    /**
     * the column name for the taxcode field
     */
    public const COL_TAXCODE = 'cartdet.taxcode';

    /**
     * the column name for the taxcodeperc field
     */
    public const COL_TAXCODEPERC = 'cartdet.taxcodeperc';

    /**
     * the column name for the discpct field
     */
    public const COL_DISCPCT = 'cartdet.discpct';

    /**
     * the column name for the listprice field
     */
    public const COL_LISTPRICE = 'cartdet.listprice';

    /**
     * the column name for the uomconv field
     */
    public const COL_UOMCONV = 'cartdet.uomconv';

    /**
     * the column name for the catlgid field
     */
    public const COL_CATLGID = 'cartdet.catlgid';

    /**
     * the column name for the errormsg field
     */
    public const COL_ERRORMSG = 'cartdet.errormsg';

    /**
     * the column name for the minprice field
     */
    public const COL_MINPRICE = 'cartdet.minprice';

    /**
     * the column name for the vendorid field
     */
    public const COL_VENDORID = 'cartdet.vendorid';

    /**
     * the column name for the vendoritemid field
     */
    public const COL_VENDORITEMID = 'cartdet.vendoritemid';

    /**
     * the column name for the ponbr field
     */
    public const COL_PONBR = 'cartdet.ponbr';

    /**
     * the column name for the poref field
     */
    public const COL_POREF = 'cartdet.poref';

    /**
     * the column name for the nsitemgroup field
     */
    public const COL_NSITEMGROUP = 'cartdet.nsitemgroup';

    /**
     * the column name for the shipfromid field
     */
    public const COL_SHIPFROMID = 'cartdet.shipfromid';

    /**
     * the column name for the itemtype field
     */
    public const COL_ITEMTYPE = 'cartdet.itemtype';

    /**
     * the column name for the dummy field
     */
    public const COL_DUMMY = 'cartdet.dummy';

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
        self::TYPE_PHPNAME       => ['Sessionid', 'Recno', 'Date', 'Time', 'Orderno', 'Linenbr', 'Itemid', 'Custitemid', 'Desc1', 'Desc2', 'Price', 'Totalprice', 'Qty', 'Qtyshipped', 'Qtybackord', 'Rshipdate', 'Hasdocuments', 'Qtyavail', 'Hasnotes', 'Cost', 'Whse', 'Uom', 'Spcord', 'Kititemflag', 'Promocode', 'Taxcode', 'Taxcodeperc', 'Discpct', 'Listprice', 'Uomconv', 'Catlgid', 'Errormsg', 'Minprice', 'Vendorid', 'Vendoritemid', 'Ponbr', 'Poref', 'Nsitemgroup', 'Shipfromid', 'Itemtype', 'Dummy', ],
        self::TYPE_CAMELNAME     => ['sessionid', 'recno', 'date', 'time', 'orderno', 'linenbr', 'itemid', 'custitemid', 'desc1', 'desc2', 'price', 'totalprice', 'qty', 'qtyshipped', 'qtybackord', 'rshipdate', 'hasdocuments', 'qtyavail', 'hasnotes', 'cost', 'whse', 'uom', 'spcord', 'kititemflag', 'promocode', 'taxcode', 'taxcodeperc', 'discpct', 'listprice', 'uomconv', 'catlgid', 'errormsg', 'minprice', 'vendorid', 'vendoritemid', 'ponbr', 'poref', 'nsitemgroup', 'shipfromid', 'itemtype', 'dummy', ],
        self::TYPE_COLNAME       => [CartdetTableMap::COL_SESSIONID, CartdetTableMap::COL_RECNO, CartdetTableMap::COL_DATE, CartdetTableMap::COL_TIME, CartdetTableMap::COL_ORDERNO, CartdetTableMap::COL_LINENBR, CartdetTableMap::COL_ITEMID, CartdetTableMap::COL_CUSTITEMID, CartdetTableMap::COL_DESC1, CartdetTableMap::COL_DESC2, CartdetTableMap::COL_PRICE, CartdetTableMap::COL_TOTALPRICE, CartdetTableMap::COL_QTY, CartdetTableMap::COL_QTYSHIPPED, CartdetTableMap::COL_QTYBACKORD, CartdetTableMap::COL_RSHIPDATE, CartdetTableMap::COL_HASDOCUMENTS, CartdetTableMap::COL_QTYAVAIL, CartdetTableMap::COL_HASNOTES, CartdetTableMap::COL_COST, CartdetTableMap::COL_WHSE, CartdetTableMap::COL_UOM, CartdetTableMap::COL_SPCORD, CartdetTableMap::COL_KITITEMFLAG, CartdetTableMap::COL_PROMOCODE, CartdetTableMap::COL_TAXCODE, CartdetTableMap::COL_TAXCODEPERC, CartdetTableMap::COL_DISCPCT, CartdetTableMap::COL_LISTPRICE, CartdetTableMap::COL_UOMCONV, CartdetTableMap::COL_CATLGID, CartdetTableMap::COL_ERRORMSG, CartdetTableMap::COL_MINPRICE, CartdetTableMap::COL_VENDORID, CartdetTableMap::COL_VENDORITEMID, CartdetTableMap::COL_PONBR, CartdetTableMap::COL_POREF, CartdetTableMap::COL_NSITEMGROUP, CartdetTableMap::COL_SHIPFROMID, CartdetTableMap::COL_ITEMTYPE, CartdetTableMap::COL_DUMMY, ],
        self::TYPE_FIELDNAME     => ['sessionid', 'recno', 'date', 'time', 'orderno', 'linenbr', 'itemid', 'custitemid', 'desc1', 'desc2', 'price', 'totalprice', 'qty', 'qtyshipped', 'qtybackord', 'rshipdate', 'hasdocuments', 'qtyavail', 'hasnotes', 'cost', 'whse', 'uom', 'spcord', 'kititemflag', 'promocode', 'taxcode', 'taxcodeperc', 'discpct', 'listprice', 'uomconv', 'catlgid', 'errormsg', 'minprice', 'vendorid', 'vendoritemid', 'ponbr', 'poref', 'nsitemgroup', 'shipfromid', 'itemtype', 'dummy', ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, ]
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
        self::TYPE_PHPNAME       => ['Sessionid' => 0, 'Recno' => 1, 'Date' => 2, 'Time' => 3, 'Orderno' => 4, 'Linenbr' => 5, 'Itemid' => 6, 'Custitemid' => 7, 'Desc1' => 8, 'Desc2' => 9, 'Price' => 10, 'Totalprice' => 11, 'Qty' => 12, 'Qtyshipped' => 13, 'Qtybackord' => 14, 'Rshipdate' => 15, 'Hasdocuments' => 16, 'Qtyavail' => 17, 'Hasnotes' => 18, 'Cost' => 19, 'Whse' => 20, 'Uom' => 21, 'Spcord' => 22, 'Kititemflag' => 23, 'Promocode' => 24, 'Taxcode' => 25, 'Taxcodeperc' => 26, 'Discpct' => 27, 'Listprice' => 28, 'Uomconv' => 29, 'Catlgid' => 30, 'Errormsg' => 31, 'Minprice' => 32, 'Vendorid' => 33, 'Vendoritemid' => 34, 'Ponbr' => 35, 'Poref' => 36, 'Nsitemgroup' => 37, 'Shipfromid' => 38, 'Itemtype' => 39, 'Dummy' => 40, ],
        self::TYPE_CAMELNAME     => ['sessionid' => 0, 'recno' => 1, 'date' => 2, 'time' => 3, 'orderno' => 4, 'linenbr' => 5, 'itemid' => 6, 'custitemid' => 7, 'desc1' => 8, 'desc2' => 9, 'price' => 10, 'totalprice' => 11, 'qty' => 12, 'qtyshipped' => 13, 'qtybackord' => 14, 'rshipdate' => 15, 'hasdocuments' => 16, 'qtyavail' => 17, 'hasnotes' => 18, 'cost' => 19, 'whse' => 20, 'uom' => 21, 'spcord' => 22, 'kititemflag' => 23, 'promocode' => 24, 'taxcode' => 25, 'taxcodeperc' => 26, 'discpct' => 27, 'listprice' => 28, 'uomconv' => 29, 'catlgid' => 30, 'errormsg' => 31, 'minprice' => 32, 'vendorid' => 33, 'vendoritemid' => 34, 'ponbr' => 35, 'poref' => 36, 'nsitemgroup' => 37, 'shipfromid' => 38, 'itemtype' => 39, 'dummy' => 40, ],
        self::TYPE_COLNAME       => [CartdetTableMap::COL_SESSIONID => 0, CartdetTableMap::COL_RECNO => 1, CartdetTableMap::COL_DATE => 2, CartdetTableMap::COL_TIME => 3, CartdetTableMap::COL_ORDERNO => 4, CartdetTableMap::COL_LINENBR => 5, CartdetTableMap::COL_ITEMID => 6, CartdetTableMap::COL_CUSTITEMID => 7, CartdetTableMap::COL_DESC1 => 8, CartdetTableMap::COL_DESC2 => 9, CartdetTableMap::COL_PRICE => 10, CartdetTableMap::COL_TOTALPRICE => 11, CartdetTableMap::COL_QTY => 12, CartdetTableMap::COL_QTYSHIPPED => 13, CartdetTableMap::COL_QTYBACKORD => 14, CartdetTableMap::COL_RSHIPDATE => 15, CartdetTableMap::COL_HASDOCUMENTS => 16, CartdetTableMap::COL_QTYAVAIL => 17, CartdetTableMap::COL_HASNOTES => 18, CartdetTableMap::COL_COST => 19, CartdetTableMap::COL_WHSE => 20, CartdetTableMap::COL_UOM => 21, CartdetTableMap::COL_SPCORD => 22, CartdetTableMap::COL_KITITEMFLAG => 23, CartdetTableMap::COL_PROMOCODE => 24, CartdetTableMap::COL_TAXCODE => 25, CartdetTableMap::COL_TAXCODEPERC => 26, CartdetTableMap::COL_DISCPCT => 27, CartdetTableMap::COL_LISTPRICE => 28, CartdetTableMap::COL_UOMCONV => 29, CartdetTableMap::COL_CATLGID => 30, CartdetTableMap::COL_ERRORMSG => 31, CartdetTableMap::COL_MINPRICE => 32, CartdetTableMap::COL_VENDORID => 33, CartdetTableMap::COL_VENDORITEMID => 34, CartdetTableMap::COL_PONBR => 35, CartdetTableMap::COL_POREF => 36, CartdetTableMap::COL_NSITEMGROUP => 37, CartdetTableMap::COL_SHIPFROMID => 38, CartdetTableMap::COL_ITEMTYPE => 39, CartdetTableMap::COL_DUMMY => 40, ],
        self::TYPE_FIELDNAME     => ['sessionid' => 0, 'recno' => 1, 'date' => 2, 'time' => 3, 'orderno' => 4, 'linenbr' => 5, 'itemid' => 6, 'custitemid' => 7, 'desc1' => 8, 'desc2' => 9, 'price' => 10, 'totalprice' => 11, 'qty' => 12, 'qtyshipped' => 13, 'qtybackord' => 14, 'rshipdate' => 15, 'hasdocuments' => 16, 'qtyavail' => 17, 'hasnotes' => 18, 'cost' => 19, 'whse' => 20, 'uom' => 21, 'spcord' => 22, 'kititemflag' => 23, 'promocode' => 24, 'taxcode' => 25, 'taxcodeperc' => 26, 'discpct' => 27, 'listprice' => 28, 'uomconv' => 29, 'catlgid' => 30, 'errormsg' => 31, 'minprice' => 32, 'vendorid' => 33, 'vendoritemid' => 34, 'ponbr' => 35, 'poref' => 36, 'nsitemgroup' => 37, 'shipfromid' => 38, 'itemtype' => 39, 'dummy' => 40, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Sessionid' => 'SESSIONID',
        'Cartdet.Sessionid' => 'SESSIONID',
        'sessionid' => 'SESSIONID',
        'cartdet.sessionid' => 'SESSIONID',
        'CartdetTableMap::COL_SESSIONID' => 'SESSIONID',
        'COL_SESSIONID' => 'SESSIONID',
        'Recno' => 'RECNO',
        'Cartdet.Recno' => 'RECNO',
        'recno' => 'RECNO',
        'cartdet.recno' => 'RECNO',
        'CartdetTableMap::COL_RECNO' => 'RECNO',
        'COL_RECNO' => 'RECNO',
        'Date' => 'DATE',
        'Cartdet.Date' => 'DATE',
        'date' => 'DATE',
        'cartdet.date' => 'DATE',
        'CartdetTableMap::COL_DATE' => 'DATE',
        'COL_DATE' => 'DATE',
        'Time' => 'TIME',
        'Cartdet.Time' => 'TIME',
        'time' => 'TIME',
        'cartdet.time' => 'TIME',
        'CartdetTableMap::COL_TIME' => 'TIME',
        'COL_TIME' => 'TIME',
        'Orderno' => 'ORDERNO',
        'Cartdet.Orderno' => 'ORDERNO',
        'orderno' => 'ORDERNO',
        'cartdet.orderno' => 'ORDERNO',
        'CartdetTableMap::COL_ORDERNO' => 'ORDERNO',
        'COL_ORDERNO' => 'ORDERNO',
        'Linenbr' => 'LINENBR',
        'Cartdet.Linenbr' => 'LINENBR',
        'linenbr' => 'LINENBR',
        'cartdet.linenbr' => 'LINENBR',
        'CartdetTableMap::COL_LINENBR' => 'LINENBR',
        'COL_LINENBR' => 'LINENBR',
        'Itemid' => 'ITEMID',
        'Cartdet.Itemid' => 'ITEMID',
        'itemid' => 'ITEMID',
        'cartdet.itemid' => 'ITEMID',
        'CartdetTableMap::COL_ITEMID' => 'ITEMID',
        'COL_ITEMID' => 'ITEMID',
        'Custitemid' => 'CUSTITEMID',
        'Cartdet.Custitemid' => 'CUSTITEMID',
        'custitemid' => 'CUSTITEMID',
        'cartdet.custitemid' => 'CUSTITEMID',
        'CartdetTableMap::COL_CUSTITEMID' => 'CUSTITEMID',
        'COL_CUSTITEMID' => 'CUSTITEMID',
        'Desc1' => 'DESC1',
        'Cartdet.Desc1' => 'DESC1',
        'desc1' => 'DESC1',
        'cartdet.desc1' => 'DESC1',
        'CartdetTableMap::COL_DESC1' => 'DESC1',
        'COL_DESC1' => 'DESC1',
        'Desc2' => 'DESC2',
        'Cartdet.Desc2' => 'DESC2',
        'desc2' => 'DESC2',
        'cartdet.desc2' => 'DESC2',
        'CartdetTableMap::COL_DESC2' => 'DESC2',
        'COL_DESC2' => 'DESC2',
        'Price' => 'PRICE',
        'Cartdet.Price' => 'PRICE',
        'price' => 'PRICE',
        'cartdet.price' => 'PRICE',
        'CartdetTableMap::COL_PRICE' => 'PRICE',
        'COL_PRICE' => 'PRICE',
        'Totalprice' => 'TOTALPRICE',
        'Cartdet.Totalprice' => 'TOTALPRICE',
        'totalprice' => 'TOTALPRICE',
        'cartdet.totalprice' => 'TOTALPRICE',
        'CartdetTableMap::COL_TOTALPRICE' => 'TOTALPRICE',
        'COL_TOTALPRICE' => 'TOTALPRICE',
        'Qty' => 'QTY',
        'Cartdet.Qty' => 'QTY',
        'qty' => 'QTY',
        'cartdet.qty' => 'QTY',
        'CartdetTableMap::COL_QTY' => 'QTY',
        'COL_QTY' => 'QTY',
        'Qtyshipped' => 'QTYSHIPPED',
        'Cartdet.Qtyshipped' => 'QTYSHIPPED',
        'qtyshipped' => 'QTYSHIPPED',
        'cartdet.qtyshipped' => 'QTYSHIPPED',
        'CartdetTableMap::COL_QTYSHIPPED' => 'QTYSHIPPED',
        'COL_QTYSHIPPED' => 'QTYSHIPPED',
        'Qtybackord' => 'QTYBACKORD',
        'Cartdet.Qtybackord' => 'QTYBACKORD',
        'qtybackord' => 'QTYBACKORD',
        'cartdet.qtybackord' => 'QTYBACKORD',
        'CartdetTableMap::COL_QTYBACKORD' => 'QTYBACKORD',
        'COL_QTYBACKORD' => 'QTYBACKORD',
        'Rshipdate' => 'RSHIPDATE',
        'Cartdet.Rshipdate' => 'RSHIPDATE',
        'rshipdate' => 'RSHIPDATE',
        'cartdet.rshipdate' => 'RSHIPDATE',
        'CartdetTableMap::COL_RSHIPDATE' => 'RSHIPDATE',
        'COL_RSHIPDATE' => 'RSHIPDATE',
        'Hasdocuments' => 'HASDOCUMENTS',
        'Cartdet.Hasdocuments' => 'HASDOCUMENTS',
        'hasdocuments' => 'HASDOCUMENTS',
        'cartdet.hasdocuments' => 'HASDOCUMENTS',
        'CartdetTableMap::COL_HASDOCUMENTS' => 'HASDOCUMENTS',
        'COL_HASDOCUMENTS' => 'HASDOCUMENTS',
        'Qtyavail' => 'QTYAVAIL',
        'Cartdet.Qtyavail' => 'QTYAVAIL',
        'qtyavail' => 'QTYAVAIL',
        'cartdet.qtyavail' => 'QTYAVAIL',
        'CartdetTableMap::COL_QTYAVAIL' => 'QTYAVAIL',
        'COL_QTYAVAIL' => 'QTYAVAIL',
        'Hasnotes' => 'HASNOTES',
        'Cartdet.Hasnotes' => 'HASNOTES',
        'hasnotes' => 'HASNOTES',
        'cartdet.hasnotes' => 'HASNOTES',
        'CartdetTableMap::COL_HASNOTES' => 'HASNOTES',
        'COL_HASNOTES' => 'HASNOTES',
        'Cost' => 'COST',
        'Cartdet.Cost' => 'COST',
        'cost' => 'COST',
        'cartdet.cost' => 'COST',
        'CartdetTableMap::COL_COST' => 'COST',
        'COL_COST' => 'COST',
        'Whse' => 'WHSE',
        'Cartdet.Whse' => 'WHSE',
        'whse' => 'WHSE',
        'cartdet.whse' => 'WHSE',
        'CartdetTableMap::COL_WHSE' => 'WHSE',
        'COL_WHSE' => 'WHSE',
        'Uom' => 'UOM',
        'Cartdet.Uom' => 'UOM',
        'uom' => 'UOM',
        'cartdet.uom' => 'UOM',
        'CartdetTableMap::COL_UOM' => 'UOM',
        'COL_UOM' => 'UOM',
        'Spcord' => 'SPCORD',
        'Cartdet.Spcord' => 'SPCORD',
        'spcord' => 'SPCORD',
        'cartdet.spcord' => 'SPCORD',
        'CartdetTableMap::COL_SPCORD' => 'SPCORD',
        'COL_SPCORD' => 'SPCORD',
        'Kititemflag' => 'KITITEMFLAG',
        'Cartdet.Kititemflag' => 'KITITEMFLAG',
        'kititemflag' => 'KITITEMFLAG',
        'cartdet.kititemflag' => 'KITITEMFLAG',
        'CartdetTableMap::COL_KITITEMFLAG' => 'KITITEMFLAG',
        'COL_KITITEMFLAG' => 'KITITEMFLAG',
        'Promocode' => 'PROMOCODE',
        'Cartdet.Promocode' => 'PROMOCODE',
        'promocode' => 'PROMOCODE',
        'cartdet.promocode' => 'PROMOCODE',
        'CartdetTableMap::COL_PROMOCODE' => 'PROMOCODE',
        'COL_PROMOCODE' => 'PROMOCODE',
        'Taxcode' => 'TAXCODE',
        'Cartdet.Taxcode' => 'TAXCODE',
        'taxcode' => 'TAXCODE',
        'cartdet.taxcode' => 'TAXCODE',
        'CartdetTableMap::COL_TAXCODE' => 'TAXCODE',
        'COL_TAXCODE' => 'TAXCODE',
        'Taxcodeperc' => 'TAXCODEPERC',
        'Cartdet.Taxcodeperc' => 'TAXCODEPERC',
        'taxcodeperc' => 'TAXCODEPERC',
        'cartdet.taxcodeperc' => 'TAXCODEPERC',
        'CartdetTableMap::COL_TAXCODEPERC' => 'TAXCODEPERC',
        'COL_TAXCODEPERC' => 'TAXCODEPERC',
        'Discpct' => 'DISCPCT',
        'Cartdet.Discpct' => 'DISCPCT',
        'discpct' => 'DISCPCT',
        'cartdet.discpct' => 'DISCPCT',
        'CartdetTableMap::COL_DISCPCT' => 'DISCPCT',
        'COL_DISCPCT' => 'DISCPCT',
        'Listprice' => 'LISTPRICE',
        'Cartdet.Listprice' => 'LISTPRICE',
        'listprice' => 'LISTPRICE',
        'cartdet.listprice' => 'LISTPRICE',
        'CartdetTableMap::COL_LISTPRICE' => 'LISTPRICE',
        'COL_LISTPRICE' => 'LISTPRICE',
        'Uomconv' => 'UOMCONV',
        'Cartdet.Uomconv' => 'UOMCONV',
        'uomconv' => 'UOMCONV',
        'cartdet.uomconv' => 'UOMCONV',
        'CartdetTableMap::COL_UOMCONV' => 'UOMCONV',
        'COL_UOMCONV' => 'UOMCONV',
        'Catlgid' => 'CATLGID',
        'Cartdet.Catlgid' => 'CATLGID',
        'catlgid' => 'CATLGID',
        'cartdet.catlgid' => 'CATLGID',
        'CartdetTableMap::COL_CATLGID' => 'CATLGID',
        'COL_CATLGID' => 'CATLGID',
        'Errormsg' => 'ERRORMSG',
        'Cartdet.Errormsg' => 'ERRORMSG',
        'errormsg' => 'ERRORMSG',
        'cartdet.errormsg' => 'ERRORMSG',
        'CartdetTableMap::COL_ERRORMSG' => 'ERRORMSG',
        'COL_ERRORMSG' => 'ERRORMSG',
        'Minprice' => 'MINPRICE',
        'Cartdet.Minprice' => 'MINPRICE',
        'minprice' => 'MINPRICE',
        'cartdet.minprice' => 'MINPRICE',
        'CartdetTableMap::COL_MINPRICE' => 'MINPRICE',
        'COL_MINPRICE' => 'MINPRICE',
        'Vendorid' => 'VENDORID',
        'Cartdet.Vendorid' => 'VENDORID',
        'vendorid' => 'VENDORID',
        'cartdet.vendorid' => 'VENDORID',
        'CartdetTableMap::COL_VENDORID' => 'VENDORID',
        'COL_VENDORID' => 'VENDORID',
        'Vendoritemid' => 'VENDORITEMID',
        'Cartdet.Vendoritemid' => 'VENDORITEMID',
        'vendoritemid' => 'VENDORITEMID',
        'cartdet.vendoritemid' => 'VENDORITEMID',
        'CartdetTableMap::COL_VENDORITEMID' => 'VENDORITEMID',
        'COL_VENDORITEMID' => 'VENDORITEMID',
        'Ponbr' => 'PONBR',
        'Cartdet.Ponbr' => 'PONBR',
        'ponbr' => 'PONBR',
        'cartdet.ponbr' => 'PONBR',
        'CartdetTableMap::COL_PONBR' => 'PONBR',
        'COL_PONBR' => 'PONBR',
        'Poref' => 'POREF',
        'Cartdet.Poref' => 'POREF',
        'poref' => 'POREF',
        'cartdet.poref' => 'POREF',
        'CartdetTableMap::COL_POREF' => 'POREF',
        'COL_POREF' => 'POREF',
        'Nsitemgroup' => 'NSITEMGROUP',
        'Cartdet.Nsitemgroup' => 'NSITEMGROUP',
        'nsitemgroup' => 'NSITEMGROUP',
        'cartdet.nsitemgroup' => 'NSITEMGROUP',
        'CartdetTableMap::COL_NSITEMGROUP' => 'NSITEMGROUP',
        'COL_NSITEMGROUP' => 'NSITEMGROUP',
        'Shipfromid' => 'SHIPFROMID',
        'Cartdet.Shipfromid' => 'SHIPFROMID',
        'shipfromid' => 'SHIPFROMID',
        'cartdet.shipfromid' => 'SHIPFROMID',
        'CartdetTableMap::COL_SHIPFROMID' => 'SHIPFROMID',
        'COL_SHIPFROMID' => 'SHIPFROMID',
        'Itemtype' => 'ITEMTYPE',
        'Cartdet.Itemtype' => 'ITEMTYPE',
        'itemtype' => 'ITEMTYPE',
        'cartdet.itemtype' => 'ITEMTYPE',
        'CartdetTableMap::COL_ITEMTYPE' => 'ITEMTYPE',
        'COL_ITEMTYPE' => 'ITEMTYPE',
        'Dummy' => 'DUMMY',
        'Cartdet.Dummy' => 'DUMMY',
        'dummy' => 'DUMMY',
        'cartdet.dummy' => 'DUMMY',
        'CartdetTableMap::COL_DUMMY' => 'DUMMY',
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
        $this->setName('cartdet');
        $this->setPhpName('Cartdet');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Cartdet');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('sessionid', 'Sessionid', 'VARCHAR', true, 50, null);
        $this->addPrimaryKey('recno', 'Recno', 'INTEGER', true, null, null);
        $this->addColumn('date', 'Date', 'INTEGER', false, 8, null);
        $this->addColumn('time', 'Time', 'INTEGER', false, 8, null);
        $this->addColumn('orderno', 'Orderno', 'VARCHAR', false, 30, '');
        $this->addColumn('linenbr', 'Linenbr', 'VARCHAR', false, 5, '');
        $this->addColumn('itemid', 'Itemid', 'VARCHAR', false, 30, '');
        $this->addColumn('custitemid', 'Custitemid', 'VARCHAR', false, 30, '');
        $this->addColumn('desc1', 'Desc1', 'VARCHAR', false, 35, '');
        $this->addColumn('desc2', 'Desc2', 'VARCHAR', false, 35, '');
        $this->addColumn('price', 'Price', 'VARCHAR', false, 20, '');
        $this->addColumn('totalprice', 'Totalprice', 'VARCHAR', false, 20, '');
        $this->addColumn('qty', 'Qty', 'VARCHAR', false, 20, '');
        $this->addColumn('qtyshipped', 'Qtyshipped', 'VARCHAR', false, 20, '');
        $this->addColumn('qtybackord', 'Qtybackord', 'VARCHAR', false, 20, '');
        $this->addColumn('rshipdate', 'Rshipdate', 'VARCHAR', false, 10, '');
        $this->addColumn('hasdocuments', 'Hasdocuments', 'VARCHAR', false, 1, '');
        $this->addColumn('qtyavail', 'Qtyavail', 'VARCHAR', false, 20, '');
        $this->addColumn('hasnotes', 'Hasnotes', 'VARCHAR', false, 1, '');
        $this->addColumn('cost', 'Cost', 'VARCHAR', false, 20, '');
        $this->addColumn('whse', 'Whse', 'VARCHAR', false, 2, '');
        $this->addColumn('uom', 'Uom', 'VARCHAR', false, 4, '');
        $this->addColumn('spcord', 'Spcord', 'VARCHAR', false, 1, '');
        $this->addColumn('kititemflag', 'Kititemflag', 'VARCHAR', false, 1, '');
        $this->addColumn('promocode', 'Promocode', 'VARCHAR', false, 6, '');
        $this->addColumn('taxcode', 'Taxcode', 'VARCHAR', false, 6, '');
        $this->addColumn('taxcodeperc', 'Taxcodeperc', 'VARCHAR', false, 20, '');
        $this->addColumn('discpct', 'Discpct', 'VARCHAR', false, 20, '');
        $this->addColumn('listprice', 'Listprice', 'VARCHAR', false, 20, '');
        $this->addColumn('uomconv', 'Uomconv', 'VARCHAR', false, 20, '');
        $this->addColumn('catlgid', 'Catlgid', 'VARCHAR', false, 8, '');
        $this->addColumn('errormsg', 'Errormsg', 'VARCHAR', false, 50, '');
        $this->addColumn('minprice', 'Minprice', 'VARCHAR', false, 20, '');
        $this->addColumn('vendorid', 'Vendorid', 'VARCHAR', false, 6, '');
        $this->addColumn('vendoritemid', 'Vendoritemid', 'VARCHAR', false, 30, '');
        $this->addColumn('ponbr', 'Ponbr', 'VARCHAR', false, 8, '');
        $this->addColumn('poref', 'Poref', 'VARCHAR', false, 15, '');
        $this->addColumn('nsitemgroup', 'Nsitemgroup', 'VARCHAR', false, 4, '');
        $this->addColumn('shipfromid', 'Shipfromid', 'VARCHAR', false, 6, '');
        $this->addColumn('itemtype', 'Itemtype', 'VARCHAR', false, 1, '');
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
     * @param \Cartdet $obj A \Cartdet object.
     * @param string|null $key Key (optional) to use for instance map (for performance boost if key was already calculated externally).
     *
     * @return void
     */
    public static function addInstanceToPool(Cartdet $obj, ?string $key = null): void
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
     * @param mixed $value A \Cartdet object or a primary key value.
     *
     * @return void
     */
    public static function removeInstanceFromPool($value): void
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Cartdet) {
                $key = serialize([(null === $value->getSessionid() || is_scalar($value->getSessionid()) || is_callable([$value->getSessionid(), '__toString']) ? (string) $value->getSessionid() : $value->getSessionid()), (null === $value->getRecno() || is_scalar($value->getRecno()) || is_callable([$value->getRecno(), '__toString']) ? (string) $value->getRecno() : $value->getRecno())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Cartdet object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        return $withPrefix ? CartdetTableMap::CLASS_DEFAULT : CartdetTableMap::OM_CLASS;
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
     * @return array (Cartdet object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = CartdetTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CartdetTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CartdetTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CartdetTableMap::OM_CLASS;
            /** @var Cartdet $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CartdetTableMap::addInstanceToPool($obj, $key);
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
            $key = CartdetTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CartdetTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Cartdet $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CartdetTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(CartdetTableMap::COL_SESSIONID);
            $criteria->addSelectColumn(CartdetTableMap::COL_RECNO);
            $criteria->addSelectColumn(CartdetTableMap::COL_DATE);
            $criteria->addSelectColumn(CartdetTableMap::COL_TIME);
            $criteria->addSelectColumn(CartdetTableMap::COL_ORDERNO);
            $criteria->addSelectColumn(CartdetTableMap::COL_LINENBR);
            $criteria->addSelectColumn(CartdetTableMap::COL_ITEMID);
            $criteria->addSelectColumn(CartdetTableMap::COL_CUSTITEMID);
            $criteria->addSelectColumn(CartdetTableMap::COL_DESC1);
            $criteria->addSelectColumn(CartdetTableMap::COL_DESC2);
            $criteria->addSelectColumn(CartdetTableMap::COL_PRICE);
            $criteria->addSelectColumn(CartdetTableMap::COL_TOTALPRICE);
            $criteria->addSelectColumn(CartdetTableMap::COL_QTY);
            $criteria->addSelectColumn(CartdetTableMap::COL_QTYSHIPPED);
            $criteria->addSelectColumn(CartdetTableMap::COL_QTYBACKORD);
            $criteria->addSelectColumn(CartdetTableMap::COL_RSHIPDATE);
            $criteria->addSelectColumn(CartdetTableMap::COL_HASDOCUMENTS);
            $criteria->addSelectColumn(CartdetTableMap::COL_QTYAVAIL);
            $criteria->addSelectColumn(CartdetTableMap::COL_HASNOTES);
            $criteria->addSelectColumn(CartdetTableMap::COL_COST);
            $criteria->addSelectColumn(CartdetTableMap::COL_WHSE);
            $criteria->addSelectColumn(CartdetTableMap::COL_UOM);
            $criteria->addSelectColumn(CartdetTableMap::COL_SPCORD);
            $criteria->addSelectColumn(CartdetTableMap::COL_KITITEMFLAG);
            $criteria->addSelectColumn(CartdetTableMap::COL_PROMOCODE);
            $criteria->addSelectColumn(CartdetTableMap::COL_TAXCODE);
            $criteria->addSelectColumn(CartdetTableMap::COL_TAXCODEPERC);
            $criteria->addSelectColumn(CartdetTableMap::COL_DISCPCT);
            $criteria->addSelectColumn(CartdetTableMap::COL_LISTPRICE);
            $criteria->addSelectColumn(CartdetTableMap::COL_UOMCONV);
            $criteria->addSelectColumn(CartdetTableMap::COL_CATLGID);
            $criteria->addSelectColumn(CartdetTableMap::COL_ERRORMSG);
            $criteria->addSelectColumn(CartdetTableMap::COL_MINPRICE);
            $criteria->addSelectColumn(CartdetTableMap::COL_VENDORID);
            $criteria->addSelectColumn(CartdetTableMap::COL_VENDORITEMID);
            $criteria->addSelectColumn(CartdetTableMap::COL_PONBR);
            $criteria->addSelectColumn(CartdetTableMap::COL_POREF);
            $criteria->addSelectColumn(CartdetTableMap::COL_NSITEMGROUP);
            $criteria->addSelectColumn(CartdetTableMap::COL_SHIPFROMID);
            $criteria->addSelectColumn(CartdetTableMap::COL_ITEMTYPE);
            $criteria->addSelectColumn(CartdetTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.sessionid');
            $criteria->addSelectColumn($alias . '.recno');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.time');
            $criteria->addSelectColumn($alias . '.orderno');
            $criteria->addSelectColumn($alias . '.linenbr');
            $criteria->addSelectColumn($alias . '.itemid');
            $criteria->addSelectColumn($alias . '.custitemid');
            $criteria->addSelectColumn($alias . '.desc1');
            $criteria->addSelectColumn($alias . '.desc2');
            $criteria->addSelectColumn($alias . '.price');
            $criteria->addSelectColumn($alias . '.totalprice');
            $criteria->addSelectColumn($alias . '.qty');
            $criteria->addSelectColumn($alias . '.qtyshipped');
            $criteria->addSelectColumn($alias . '.qtybackord');
            $criteria->addSelectColumn($alias . '.rshipdate');
            $criteria->addSelectColumn($alias . '.hasdocuments');
            $criteria->addSelectColumn($alias . '.qtyavail');
            $criteria->addSelectColumn($alias . '.hasnotes');
            $criteria->addSelectColumn($alias . '.cost');
            $criteria->addSelectColumn($alias . '.whse');
            $criteria->addSelectColumn($alias . '.uom');
            $criteria->addSelectColumn($alias . '.spcord');
            $criteria->addSelectColumn($alias . '.kititemflag');
            $criteria->addSelectColumn($alias . '.promocode');
            $criteria->addSelectColumn($alias . '.taxcode');
            $criteria->addSelectColumn($alias . '.taxcodeperc');
            $criteria->addSelectColumn($alias . '.discpct');
            $criteria->addSelectColumn($alias . '.listprice');
            $criteria->addSelectColumn($alias . '.uomconv');
            $criteria->addSelectColumn($alias . '.catlgid');
            $criteria->addSelectColumn($alias . '.errormsg');
            $criteria->addSelectColumn($alias . '.minprice');
            $criteria->addSelectColumn($alias . '.vendorid');
            $criteria->addSelectColumn($alias . '.vendoritemid');
            $criteria->addSelectColumn($alias . '.ponbr');
            $criteria->addSelectColumn($alias . '.poref');
            $criteria->addSelectColumn($alias . '.nsitemgroup');
            $criteria->addSelectColumn($alias . '.shipfromid');
            $criteria->addSelectColumn($alias . '.itemtype');
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
            $criteria->removeSelectColumn(CartdetTableMap::COL_SESSIONID);
            $criteria->removeSelectColumn(CartdetTableMap::COL_RECNO);
            $criteria->removeSelectColumn(CartdetTableMap::COL_DATE);
            $criteria->removeSelectColumn(CartdetTableMap::COL_TIME);
            $criteria->removeSelectColumn(CartdetTableMap::COL_ORDERNO);
            $criteria->removeSelectColumn(CartdetTableMap::COL_LINENBR);
            $criteria->removeSelectColumn(CartdetTableMap::COL_ITEMID);
            $criteria->removeSelectColumn(CartdetTableMap::COL_CUSTITEMID);
            $criteria->removeSelectColumn(CartdetTableMap::COL_DESC1);
            $criteria->removeSelectColumn(CartdetTableMap::COL_DESC2);
            $criteria->removeSelectColumn(CartdetTableMap::COL_PRICE);
            $criteria->removeSelectColumn(CartdetTableMap::COL_TOTALPRICE);
            $criteria->removeSelectColumn(CartdetTableMap::COL_QTY);
            $criteria->removeSelectColumn(CartdetTableMap::COL_QTYSHIPPED);
            $criteria->removeSelectColumn(CartdetTableMap::COL_QTYBACKORD);
            $criteria->removeSelectColumn(CartdetTableMap::COL_RSHIPDATE);
            $criteria->removeSelectColumn(CartdetTableMap::COL_HASDOCUMENTS);
            $criteria->removeSelectColumn(CartdetTableMap::COL_QTYAVAIL);
            $criteria->removeSelectColumn(CartdetTableMap::COL_HASNOTES);
            $criteria->removeSelectColumn(CartdetTableMap::COL_COST);
            $criteria->removeSelectColumn(CartdetTableMap::COL_WHSE);
            $criteria->removeSelectColumn(CartdetTableMap::COL_UOM);
            $criteria->removeSelectColumn(CartdetTableMap::COL_SPCORD);
            $criteria->removeSelectColumn(CartdetTableMap::COL_KITITEMFLAG);
            $criteria->removeSelectColumn(CartdetTableMap::COL_PROMOCODE);
            $criteria->removeSelectColumn(CartdetTableMap::COL_TAXCODE);
            $criteria->removeSelectColumn(CartdetTableMap::COL_TAXCODEPERC);
            $criteria->removeSelectColumn(CartdetTableMap::COL_DISCPCT);
            $criteria->removeSelectColumn(CartdetTableMap::COL_LISTPRICE);
            $criteria->removeSelectColumn(CartdetTableMap::COL_UOMCONV);
            $criteria->removeSelectColumn(CartdetTableMap::COL_CATLGID);
            $criteria->removeSelectColumn(CartdetTableMap::COL_ERRORMSG);
            $criteria->removeSelectColumn(CartdetTableMap::COL_MINPRICE);
            $criteria->removeSelectColumn(CartdetTableMap::COL_VENDORID);
            $criteria->removeSelectColumn(CartdetTableMap::COL_VENDORITEMID);
            $criteria->removeSelectColumn(CartdetTableMap::COL_PONBR);
            $criteria->removeSelectColumn(CartdetTableMap::COL_POREF);
            $criteria->removeSelectColumn(CartdetTableMap::COL_NSITEMGROUP);
            $criteria->removeSelectColumn(CartdetTableMap::COL_SHIPFROMID);
            $criteria->removeSelectColumn(CartdetTableMap::COL_ITEMTYPE);
            $criteria->removeSelectColumn(CartdetTableMap::COL_DUMMY);
        } else {
            $criteria->removeSelectColumn($alias . '.sessionid');
            $criteria->removeSelectColumn($alias . '.recno');
            $criteria->removeSelectColumn($alias . '.date');
            $criteria->removeSelectColumn($alias . '.time');
            $criteria->removeSelectColumn($alias . '.orderno');
            $criteria->removeSelectColumn($alias . '.linenbr');
            $criteria->removeSelectColumn($alias . '.itemid');
            $criteria->removeSelectColumn($alias . '.custitemid');
            $criteria->removeSelectColumn($alias . '.desc1');
            $criteria->removeSelectColumn($alias . '.desc2');
            $criteria->removeSelectColumn($alias . '.price');
            $criteria->removeSelectColumn($alias . '.totalprice');
            $criteria->removeSelectColumn($alias . '.qty');
            $criteria->removeSelectColumn($alias . '.qtyshipped');
            $criteria->removeSelectColumn($alias . '.qtybackord');
            $criteria->removeSelectColumn($alias . '.rshipdate');
            $criteria->removeSelectColumn($alias . '.hasdocuments');
            $criteria->removeSelectColumn($alias . '.qtyavail');
            $criteria->removeSelectColumn($alias . '.hasnotes');
            $criteria->removeSelectColumn($alias . '.cost');
            $criteria->removeSelectColumn($alias . '.whse');
            $criteria->removeSelectColumn($alias . '.uom');
            $criteria->removeSelectColumn($alias . '.spcord');
            $criteria->removeSelectColumn($alias . '.kititemflag');
            $criteria->removeSelectColumn($alias . '.promocode');
            $criteria->removeSelectColumn($alias . '.taxcode');
            $criteria->removeSelectColumn($alias . '.taxcodeperc');
            $criteria->removeSelectColumn($alias . '.discpct');
            $criteria->removeSelectColumn($alias . '.listprice');
            $criteria->removeSelectColumn($alias . '.uomconv');
            $criteria->removeSelectColumn($alias . '.catlgid');
            $criteria->removeSelectColumn($alias . '.errormsg');
            $criteria->removeSelectColumn($alias . '.minprice');
            $criteria->removeSelectColumn($alias . '.vendorid');
            $criteria->removeSelectColumn($alias . '.vendoritemid');
            $criteria->removeSelectColumn($alias . '.ponbr');
            $criteria->removeSelectColumn($alias . '.poref');
            $criteria->removeSelectColumn($alias . '.nsitemgroup');
            $criteria->removeSelectColumn($alias . '.shipfromid');
            $criteria->removeSelectColumn($alias . '.itemtype');
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
        return Propel::getServiceContainer()->getDatabaseMap(CartdetTableMap::DATABASE_NAME)->getTable(CartdetTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Cartdet or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or Cartdet object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(CartdetTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Cartdet) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CartdetTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = [$values];
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(CartdetTableMap::COL_SESSIONID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(CartdetTableMap::COL_RECNO, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = CartdetQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CartdetTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CartdetTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the cartdet table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return CartdetQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Cartdet or Criteria object.
     *
     * @param mixed $criteria Criteria or Cartdet object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CartdetTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Cartdet object
        }


        // Set the correct dbName
        $query = CartdetQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
