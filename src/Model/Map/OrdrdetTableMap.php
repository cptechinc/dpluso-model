<?php

namespace Map;

use \Ordrdet;
use \OrdrdetQuery;
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
 * This class defines the structure of the 'ordrdet' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class OrdrdetTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = '.Map.OrdrdetTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'ordrdet';

    /**
     * The PHP name of this class (PascalCase)
     */
    public const TABLE_PHP_NAME = 'Ordrdet';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\Ordrdet';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'Ordrdet';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 60;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 60;

    /**
     * the column name for the sessionid field
     */
    public const COL_SESSIONID = 'ordrdet.sessionid';

    /**
     * the column name for the recno field
     */
    public const COL_RECNO = 'ordrdet.recno';

    /**
     * the column name for the date field
     */
    public const COL_DATE = 'ordrdet.date';

    /**
     * the column name for the time field
     */
    public const COL_TIME = 'ordrdet.time';

    /**
     * the column name for the type field
     */
    public const COL_TYPE = 'ordrdet.type';

    /**
     * the column name for the orderno field
     */
    public const COL_ORDERNO = 'ordrdet.orderno';

    /**
     * the column name for the linenbr field
     */
    public const COL_LINENBR = 'ordrdet.linenbr';

    /**
     * the column name for the sublinenbr field
     */
    public const COL_SUBLINENBR = 'ordrdet.sublinenbr';

    /**
     * the column name for the itemid field
     */
    public const COL_ITEMID = 'ordrdet.itemid';

    /**
     * the column name for the custid field
     */
    public const COL_CUSTID = 'ordrdet.custid';

    /**
     * the column name for the custitemid field
     */
    public const COL_CUSTITEMID = 'ordrdet.custitemid';

    /**
     * the column name for the desc1 field
     */
    public const COL_DESC1 = 'ordrdet.desc1';

    /**
     * the column name for the desc2 field
     */
    public const COL_DESC2 = 'ordrdet.desc2';

    /**
     * the column name for the price field
     */
    public const COL_PRICE = 'ordrdet.price';

    /**
     * the column name for the totalprice field
     */
    public const COL_TOTALPRICE = 'ordrdet.totalprice';

    /**
     * the column name for the qty field
     */
    public const COL_QTY = 'ordrdet.qty';

    /**
     * the column name for the qtyshipped field
     */
    public const COL_QTYSHIPPED = 'ordrdet.qtyshipped';

    /**
     * the column name for the qtybackord field
     */
    public const COL_QTYBACKORD = 'ordrdet.qtybackord';

    /**
     * the column name for the rshipdate field
     */
    public const COL_RSHIPDATE = 'ordrdet.rshipdate';

    /**
     * the column name for the hasdocuments field
     */
    public const COL_HASDOCUMENTS = 'ordrdet.hasdocuments';

    /**
     * the column name for the qtyavail field
     */
    public const COL_QTYAVAIL = 'ordrdet.qtyavail';

    /**
     * the column name for the hasnotes field
     */
    public const COL_HASNOTES = 'ordrdet.hasnotes';

    /**
     * the column name for the cost field
     */
    public const COL_COST = 'ordrdet.cost';

    /**
     * the column name for the whse field
     */
    public const COL_WHSE = 'ordrdet.whse';

    /**
     * the column name for the uom field
     */
    public const COL_UOM = 'ordrdet.uom';

    /**
     * the column name for the spcord field
     */
    public const COL_SPCORD = 'ordrdet.spcord';

    /**
     * the column name for the kititemflag field
     */
    public const COL_KITITEMFLAG = 'ordrdet.kititemflag';

    /**
     * the column name for the promocode field
     */
    public const COL_PROMOCODE = 'ordrdet.promocode';

    /**
     * the column name for the taxcode field
     */
    public const COL_TAXCODE = 'ordrdet.taxcode';

    /**
     * the column name for the taxcodeperc field
     */
    public const COL_TAXCODEPERC = 'ordrdet.taxcodeperc';

    /**
     * the column name for the discpct field
     */
    public const COL_DISCPCT = 'ordrdet.discpct';

    /**
     * the column name for the listprice field
     */
    public const COL_LISTPRICE = 'ordrdet.listprice';

    /**
     * the column name for the uomconv field
     */
    public const COL_UOMCONV = 'ordrdet.uomconv';

    /**
     * the column name for the vendorid field
     */
    public const COL_VENDORID = 'ordrdet.vendorid';

    /**
     * the column name for the vendoritemid field
     */
    public const COL_VENDORITEMID = 'ordrdet.vendoritemid';

    /**
     * the column name for the mfgid field
     */
    public const COL_MFGID = 'ordrdet.mfgid';

    /**
     * the column name for the mfgitemid field
     */
    public const COL_MFGITEMID = 'ordrdet.mfgitemid';

    /**
     * the column name for the status field
     */
    public const COL_STATUS = 'ordrdet.status';

    /**
     * the column name for the lostreason field
     */
    public const COL_LOSTREASON = 'ordrdet.lostreason';

    /**
     * the column name for the lostdate field
     */
    public const COL_LOSTDATE = 'ordrdet.lostdate';

    /**
     * the column name for the notes field
     */
    public const COL_NOTES = 'ordrdet.notes';

    /**
     * the column name for the leaddays field
     */
    public const COL_LEADDAYS = 'ordrdet.leaddays';

    /**
     * the column name for the ordrtotalcost field
     */
    public const COL_ORDRTOTALCOST = 'ordrdet.ordrtotalcost';

    /**
     * the column name for the costuom field
     */
    public const COL_COSTUOM = 'ordrdet.costuom';

    /**
     * the column name for the stancost field
     */
    public const COL_STANCOST = 'ordrdet.stancost';

    /**
     * the column name for the quotind field
     */
    public const COL_QUOTIND = 'ordrdet.quotind';

    /**
     * the column name for the quotqty field
     */
    public const COL_QUOTQTY = 'ordrdet.quotqty';

    /**
     * the column name for the quotprice field
     */
    public const COL_QUOTPRICE = 'ordrdet.quotprice';

    /**
     * the column name for the quotcost field
     */
    public const COL_QUOTCOST = 'ordrdet.quotcost';

    /**
     * the column name for the quotmkupmarg field
     */
    public const COL_QUOTMKUPMARG = 'ordrdet.quotmkupmarg';

    /**
     * the column name for the quotdiscpct field
     */
    public const COL_QUOTDISCPCT = 'ordrdet.quotdiscpct';

    /**
     * the column name for the errormsg field
     */
    public const COL_ERRORMSG = 'ordrdet.errormsg';

    /**
     * the column name for the minprice field
     */
    public const COL_MINPRICE = 'ordrdet.minprice';

    /**
     * the column name for the ponbr field
     */
    public const COL_PONBR = 'ordrdet.ponbr';

    /**
     * the column name for the poref field
     */
    public const COL_POREF = 'ordrdet.poref';

    /**
     * the column name for the nsitemgroup field
     */
    public const COL_NSITEMGROUP = 'ordrdet.nsitemgroup';

    /**
     * the column name for the shipfromid field
     */
    public const COL_SHIPFROMID = 'ordrdet.shipfromid';

    /**
     * the column name for the itemtype field
     */
    public const COL_ITEMTYPE = 'ordrdet.itemtype';

    /**
     * the column name for the canbackorder field
     */
    public const COL_CANBACKORDER = 'ordrdet.canbackorder';

    /**
     * the column name for the dummy field
     */
    public const COL_DUMMY = 'ordrdet.dummy';

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
        self::TYPE_PHPNAME       => ['Sessionid', 'Recno', 'Date', 'Time', 'Type', 'Orderno', 'Linenbr', 'Sublinenbr', 'Itemid', 'Custid', 'Custitemid', 'Desc1', 'Desc2', 'Price', 'Totalprice', 'Qty', 'Qtyshipped', 'Qtybackord', 'Rshipdate', 'Hasdocuments', 'Qtyavail', 'Hasnotes', 'Cost', 'Whse', 'Uom', 'Spcord', 'Kititemflag', 'Promocode', 'Taxcode', 'Taxcodeperc', 'Discpct', 'Listprice', 'Uomconv', 'Vendorid', 'Vendoritemid', 'Mfgid', 'Mfgitemid', 'Status', 'Lostreason', 'Lostdate', 'Notes', 'Leaddays', 'Ordrtotalcost', 'Costuom', 'Stancost', 'Quotind', 'Quotqty', 'Quotprice', 'Quotcost', 'Quotmkupmarg', 'Quotdiscpct', 'Errormsg', 'Minprice', 'Ponbr', 'Poref', 'Nsitemgroup', 'Shipfromid', 'Itemtype', 'Canbackorder', 'Dummy', ],
        self::TYPE_CAMELNAME     => ['sessionid', 'recno', 'date', 'time', 'type', 'orderno', 'linenbr', 'sublinenbr', 'itemid', 'custid', 'custitemid', 'desc1', 'desc2', 'price', 'totalprice', 'qty', 'qtyshipped', 'qtybackord', 'rshipdate', 'hasdocuments', 'qtyavail', 'hasnotes', 'cost', 'whse', 'uom', 'spcord', 'kititemflag', 'promocode', 'taxcode', 'taxcodeperc', 'discpct', 'listprice', 'uomconv', 'vendorid', 'vendoritemid', 'mfgid', 'mfgitemid', 'status', 'lostreason', 'lostdate', 'notes', 'leaddays', 'ordrtotalcost', 'costuom', 'stancost', 'quotind', 'quotqty', 'quotprice', 'quotcost', 'quotmkupmarg', 'quotdiscpct', 'errormsg', 'minprice', 'ponbr', 'poref', 'nsitemgroup', 'shipfromid', 'itemtype', 'canbackorder', 'dummy', ],
        self::TYPE_COLNAME       => [OrdrdetTableMap::COL_SESSIONID, OrdrdetTableMap::COL_RECNO, OrdrdetTableMap::COL_DATE, OrdrdetTableMap::COL_TIME, OrdrdetTableMap::COL_TYPE, OrdrdetTableMap::COL_ORDERNO, OrdrdetTableMap::COL_LINENBR, OrdrdetTableMap::COL_SUBLINENBR, OrdrdetTableMap::COL_ITEMID, OrdrdetTableMap::COL_CUSTID, OrdrdetTableMap::COL_CUSTITEMID, OrdrdetTableMap::COL_DESC1, OrdrdetTableMap::COL_DESC2, OrdrdetTableMap::COL_PRICE, OrdrdetTableMap::COL_TOTALPRICE, OrdrdetTableMap::COL_QTY, OrdrdetTableMap::COL_QTYSHIPPED, OrdrdetTableMap::COL_QTYBACKORD, OrdrdetTableMap::COL_RSHIPDATE, OrdrdetTableMap::COL_HASDOCUMENTS, OrdrdetTableMap::COL_QTYAVAIL, OrdrdetTableMap::COL_HASNOTES, OrdrdetTableMap::COL_COST, OrdrdetTableMap::COL_WHSE, OrdrdetTableMap::COL_UOM, OrdrdetTableMap::COL_SPCORD, OrdrdetTableMap::COL_KITITEMFLAG, OrdrdetTableMap::COL_PROMOCODE, OrdrdetTableMap::COL_TAXCODE, OrdrdetTableMap::COL_TAXCODEPERC, OrdrdetTableMap::COL_DISCPCT, OrdrdetTableMap::COL_LISTPRICE, OrdrdetTableMap::COL_UOMCONV, OrdrdetTableMap::COL_VENDORID, OrdrdetTableMap::COL_VENDORITEMID, OrdrdetTableMap::COL_MFGID, OrdrdetTableMap::COL_MFGITEMID, OrdrdetTableMap::COL_STATUS, OrdrdetTableMap::COL_LOSTREASON, OrdrdetTableMap::COL_LOSTDATE, OrdrdetTableMap::COL_NOTES, OrdrdetTableMap::COL_LEADDAYS, OrdrdetTableMap::COL_ORDRTOTALCOST, OrdrdetTableMap::COL_COSTUOM, OrdrdetTableMap::COL_STANCOST, OrdrdetTableMap::COL_QUOTIND, OrdrdetTableMap::COL_QUOTQTY, OrdrdetTableMap::COL_QUOTPRICE, OrdrdetTableMap::COL_QUOTCOST, OrdrdetTableMap::COL_QUOTMKUPMARG, OrdrdetTableMap::COL_QUOTDISCPCT, OrdrdetTableMap::COL_ERRORMSG, OrdrdetTableMap::COL_MINPRICE, OrdrdetTableMap::COL_PONBR, OrdrdetTableMap::COL_POREF, OrdrdetTableMap::COL_NSITEMGROUP, OrdrdetTableMap::COL_SHIPFROMID, OrdrdetTableMap::COL_ITEMTYPE, OrdrdetTableMap::COL_CANBACKORDER, OrdrdetTableMap::COL_DUMMY, ],
        self::TYPE_FIELDNAME     => ['sessionid', 'recno', 'date', 'time', 'type', 'orderno', 'linenbr', 'sublinenbr', 'itemid', 'custid', 'custitemid', 'desc1', 'desc2', 'price', 'totalprice', 'qty', 'qtyshipped', 'qtybackord', 'rshipdate', 'hasdocuments', 'qtyavail', 'hasnotes', 'cost', 'whse', 'uom', 'spcord', 'kititemflag', 'promocode', 'taxcode', 'taxcodeperc', 'discpct', 'listprice', 'uomconv', 'vendorid', 'vendoritemid', 'mfgid', 'mfgitemid', 'status', 'lostreason', 'lostdate', 'notes', 'leaddays', 'ordrtotalcost', 'costuom', 'stancost', 'quotind', 'quotqty', 'quotprice', 'quotcost', 'quotmkupmarg', 'quotdiscpct', 'errormsg', 'minprice', 'ponbr', 'poref', 'nsitemgroup', 'shipfromid', 'itemtype', 'canbackorder', 'dummy', ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, ]
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
        self::TYPE_PHPNAME       => ['Sessionid' => 0, 'Recno' => 1, 'Date' => 2, 'Time' => 3, 'Type' => 4, 'Orderno' => 5, 'Linenbr' => 6, 'Sublinenbr' => 7, 'Itemid' => 8, 'Custid' => 9, 'Custitemid' => 10, 'Desc1' => 11, 'Desc2' => 12, 'Price' => 13, 'Totalprice' => 14, 'Qty' => 15, 'Qtyshipped' => 16, 'Qtybackord' => 17, 'Rshipdate' => 18, 'Hasdocuments' => 19, 'Qtyavail' => 20, 'Hasnotes' => 21, 'Cost' => 22, 'Whse' => 23, 'Uom' => 24, 'Spcord' => 25, 'Kititemflag' => 26, 'Promocode' => 27, 'Taxcode' => 28, 'Taxcodeperc' => 29, 'Discpct' => 30, 'Listprice' => 31, 'Uomconv' => 32, 'Vendorid' => 33, 'Vendoritemid' => 34, 'Mfgid' => 35, 'Mfgitemid' => 36, 'Status' => 37, 'Lostreason' => 38, 'Lostdate' => 39, 'Notes' => 40, 'Leaddays' => 41, 'Ordrtotalcost' => 42, 'Costuom' => 43, 'Stancost' => 44, 'Quotind' => 45, 'Quotqty' => 46, 'Quotprice' => 47, 'Quotcost' => 48, 'Quotmkupmarg' => 49, 'Quotdiscpct' => 50, 'Errormsg' => 51, 'Minprice' => 52, 'Ponbr' => 53, 'Poref' => 54, 'Nsitemgroup' => 55, 'Shipfromid' => 56, 'Itemtype' => 57, 'Canbackorder' => 58, 'Dummy' => 59, ],
        self::TYPE_CAMELNAME     => ['sessionid' => 0, 'recno' => 1, 'date' => 2, 'time' => 3, 'type' => 4, 'orderno' => 5, 'linenbr' => 6, 'sublinenbr' => 7, 'itemid' => 8, 'custid' => 9, 'custitemid' => 10, 'desc1' => 11, 'desc2' => 12, 'price' => 13, 'totalprice' => 14, 'qty' => 15, 'qtyshipped' => 16, 'qtybackord' => 17, 'rshipdate' => 18, 'hasdocuments' => 19, 'qtyavail' => 20, 'hasnotes' => 21, 'cost' => 22, 'whse' => 23, 'uom' => 24, 'spcord' => 25, 'kititemflag' => 26, 'promocode' => 27, 'taxcode' => 28, 'taxcodeperc' => 29, 'discpct' => 30, 'listprice' => 31, 'uomconv' => 32, 'vendorid' => 33, 'vendoritemid' => 34, 'mfgid' => 35, 'mfgitemid' => 36, 'status' => 37, 'lostreason' => 38, 'lostdate' => 39, 'notes' => 40, 'leaddays' => 41, 'ordrtotalcost' => 42, 'costuom' => 43, 'stancost' => 44, 'quotind' => 45, 'quotqty' => 46, 'quotprice' => 47, 'quotcost' => 48, 'quotmkupmarg' => 49, 'quotdiscpct' => 50, 'errormsg' => 51, 'minprice' => 52, 'ponbr' => 53, 'poref' => 54, 'nsitemgroup' => 55, 'shipfromid' => 56, 'itemtype' => 57, 'canbackorder' => 58, 'dummy' => 59, ],
        self::TYPE_COLNAME       => [OrdrdetTableMap::COL_SESSIONID => 0, OrdrdetTableMap::COL_RECNO => 1, OrdrdetTableMap::COL_DATE => 2, OrdrdetTableMap::COL_TIME => 3, OrdrdetTableMap::COL_TYPE => 4, OrdrdetTableMap::COL_ORDERNO => 5, OrdrdetTableMap::COL_LINENBR => 6, OrdrdetTableMap::COL_SUBLINENBR => 7, OrdrdetTableMap::COL_ITEMID => 8, OrdrdetTableMap::COL_CUSTID => 9, OrdrdetTableMap::COL_CUSTITEMID => 10, OrdrdetTableMap::COL_DESC1 => 11, OrdrdetTableMap::COL_DESC2 => 12, OrdrdetTableMap::COL_PRICE => 13, OrdrdetTableMap::COL_TOTALPRICE => 14, OrdrdetTableMap::COL_QTY => 15, OrdrdetTableMap::COL_QTYSHIPPED => 16, OrdrdetTableMap::COL_QTYBACKORD => 17, OrdrdetTableMap::COL_RSHIPDATE => 18, OrdrdetTableMap::COL_HASDOCUMENTS => 19, OrdrdetTableMap::COL_QTYAVAIL => 20, OrdrdetTableMap::COL_HASNOTES => 21, OrdrdetTableMap::COL_COST => 22, OrdrdetTableMap::COL_WHSE => 23, OrdrdetTableMap::COL_UOM => 24, OrdrdetTableMap::COL_SPCORD => 25, OrdrdetTableMap::COL_KITITEMFLAG => 26, OrdrdetTableMap::COL_PROMOCODE => 27, OrdrdetTableMap::COL_TAXCODE => 28, OrdrdetTableMap::COL_TAXCODEPERC => 29, OrdrdetTableMap::COL_DISCPCT => 30, OrdrdetTableMap::COL_LISTPRICE => 31, OrdrdetTableMap::COL_UOMCONV => 32, OrdrdetTableMap::COL_VENDORID => 33, OrdrdetTableMap::COL_VENDORITEMID => 34, OrdrdetTableMap::COL_MFGID => 35, OrdrdetTableMap::COL_MFGITEMID => 36, OrdrdetTableMap::COL_STATUS => 37, OrdrdetTableMap::COL_LOSTREASON => 38, OrdrdetTableMap::COL_LOSTDATE => 39, OrdrdetTableMap::COL_NOTES => 40, OrdrdetTableMap::COL_LEADDAYS => 41, OrdrdetTableMap::COL_ORDRTOTALCOST => 42, OrdrdetTableMap::COL_COSTUOM => 43, OrdrdetTableMap::COL_STANCOST => 44, OrdrdetTableMap::COL_QUOTIND => 45, OrdrdetTableMap::COL_QUOTQTY => 46, OrdrdetTableMap::COL_QUOTPRICE => 47, OrdrdetTableMap::COL_QUOTCOST => 48, OrdrdetTableMap::COL_QUOTMKUPMARG => 49, OrdrdetTableMap::COL_QUOTDISCPCT => 50, OrdrdetTableMap::COL_ERRORMSG => 51, OrdrdetTableMap::COL_MINPRICE => 52, OrdrdetTableMap::COL_PONBR => 53, OrdrdetTableMap::COL_POREF => 54, OrdrdetTableMap::COL_NSITEMGROUP => 55, OrdrdetTableMap::COL_SHIPFROMID => 56, OrdrdetTableMap::COL_ITEMTYPE => 57, OrdrdetTableMap::COL_CANBACKORDER => 58, OrdrdetTableMap::COL_DUMMY => 59, ],
        self::TYPE_FIELDNAME     => ['sessionid' => 0, 'recno' => 1, 'date' => 2, 'time' => 3, 'type' => 4, 'orderno' => 5, 'linenbr' => 6, 'sublinenbr' => 7, 'itemid' => 8, 'custid' => 9, 'custitemid' => 10, 'desc1' => 11, 'desc2' => 12, 'price' => 13, 'totalprice' => 14, 'qty' => 15, 'qtyshipped' => 16, 'qtybackord' => 17, 'rshipdate' => 18, 'hasdocuments' => 19, 'qtyavail' => 20, 'hasnotes' => 21, 'cost' => 22, 'whse' => 23, 'uom' => 24, 'spcord' => 25, 'kititemflag' => 26, 'promocode' => 27, 'taxcode' => 28, 'taxcodeperc' => 29, 'discpct' => 30, 'listprice' => 31, 'uomconv' => 32, 'vendorid' => 33, 'vendoritemid' => 34, 'mfgid' => 35, 'mfgitemid' => 36, 'status' => 37, 'lostreason' => 38, 'lostdate' => 39, 'notes' => 40, 'leaddays' => 41, 'ordrtotalcost' => 42, 'costuom' => 43, 'stancost' => 44, 'quotind' => 45, 'quotqty' => 46, 'quotprice' => 47, 'quotcost' => 48, 'quotmkupmarg' => 49, 'quotdiscpct' => 50, 'errormsg' => 51, 'minprice' => 52, 'ponbr' => 53, 'poref' => 54, 'nsitemgroup' => 55, 'shipfromid' => 56, 'itemtype' => 57, 'canbackorder' => 58, 'dummy' => 59, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Sessionid' => 'SESSIONID',
        'Ordrdet.Sessionid' => 'SESSIONID',
        'sessionid' => 'SESSIONID',
        'ordrdet.sessionid' => 'SESSIONID',
        'OrdrdetTableMap::COL_SESSIONID' => 'SESSIONID',
        'COL_SESSIONID' => 'SESSIONID',
        'Recno' => 'RECNO',
        'Ordrdet.Recno' => 'RECNO',
        'recno' => 'RECNO',
        'ordrdet.recno' => 'RECNO',
        'OrdrdetTableMap::COL_RECNO' => 'RECNO',
        'COL_RECNO' => 'RECNO',
        'Date' => 'DATE',
        'Ordrdet.Date' => 'DATE',
        'date' => 'DATE',
        'ordrdet.date' => 'DATE',
        'OrdrdetTableMap::COL_DATE' => 'DATE',
        'COL_DATE' => 'DATE',
        'Time' => 'TIME',
        'Ordrdet.Time' => 'TIME',
        'time' => 'TIME',
        'ordrdet.time' => 'TIME',
        'OrdrdetTableMap::COL_TIME' => 'TIME',
        'COL_TIME' => 'TIME',
        'Type' => 'TYPE',
        'Ordrdet.Type' => 'TYPE',
        'type' => 'TYPE',
        'ordrdet.type' => 'TYPE',
        'OrdrdetTableMap::COL_TYPE' => 'TYPE',
        'COL_TYPE' => 'TYPE',
        'Orderno' => 'ORDERNO',
        'Ordrdet.Orderno' => 'ORDERNO',
        'orderno' => 'ORDERNO',
        'ordrdet.orderno' => 'ORDERNO',
        'OrdrdetTableMap::COL_ORDERNO' => 'ORDERNO',
        'COL_ORDERNO' => 'ORDERNO',
        'Linenbr' => 'LINENBR',
        'Ordrdet.Linenbr' => 'LINENBR',
        'linenbr' => 'LINENBR',
        'ordrdet.linenbr' => 'LINENBR',
        'OrdrdetTableMap::COL_LINENBR' => 'LINENBR',
        'COL_LINENBR' => 'LINENBR',
        'Sublinenbr' => 'SUBLINENBR',
        'Ordrdet.Sublinenbr' => 'SUBLINENBR',
        'sublinenbr' => 'SUBLINENBR',
        'ordrdet.sublinenbr' => 'SUBLINENBR',
        'OrdrdetTableMap::COL_SUBLINENBR' => 'SUBLINENBR',
        'COL_SUBLINENBR' => 'SUBLINENBR',
        'Itemid' => 'ITEMID',
        'Ordrdet.Itemid' => 'ITEMID',
        'itemid' => 'ITEMID',
        'ordrdet.itemid' => 'ITEMID',
        'OrdrdetTableMap::COL_ITEMID' => 'ITEMID',
        'COL_ITEMID' => 'ITEMID',
        'Custid' => 'CUSTID',
        'Ordrdet.Custid' => 'CUSTID',
        'custid' => 'CUSTID',
        'ordrdet.custid' => 'CUSTID',
        'OrdrdetTableMap::COL_CUSTID' => 'CUSTID',
        'COL_CUSTID' => 'CUSTID',
        'Custitemid' => 'CUSTITEMID',
        'Ordrdet.Custitemid' => 'CUSTITEMID',
        'custitemid' => 'CUSTITEMID',
        'ordrdet.custitemid' => 'CUSTITEMID',
        'OrdrdetTableMap::COL_CUSTITEMID' => 'CUSTITEMID',
        'COL_CUSTITEMID' => 'CUSTITEMID',
        'Desc1' => 'DESC1',
        'Ordrdet.Desc1' => 'DESC1',
        'desc1' => 'DESC1',
        'ordrdet.desc1' => 'DESC1',
        'OrdrdetTableMap::COL_DESC1' => 'DESC1',
        'COL_DESC1' => 'DESC1',
        'Desc2' => 'DESC2',
        'Ordrdet.Desc2' => 'DESC2',
        'desc2' => 'DESC2',
        'ordrdet.desc2' => 'DESC2',
        'OrdrdetTableMap::COL_DESC2' => 'DESC2',
        'COL_DESC2' => 'DESC2',
        'Price' => 'PRICE',
        'Ordrdet.Price' => 'PRICE',
        'price' => 'PRICE',
        'ordrdet.price' => 'PRICE',
        'OrdrdetTableMap::COL_PRICE' => 'PRICE',
        'COL_PRICE' => 'PRICE',
        'Totalprice' => 'TOTALPRICE',
        'Ordrdet.Totalprice' => 'TOTALPRICE',
        'totalprice' => 'TOTALPRICE',
        'ordrdet.totalprice' => 'TOTALPRICE',
        'OrdrdetTableMap::COL_TOTALPRICE' => 'TOTALPRICE',
        'COL_TOTALPRICE' => 'TOTALPRICE',
        'Qty' => 'QTY',
        'Ordrdet.Qty' => 'QTY',
        'qty' => 'QTY',
        'ordrdet.qty' => 'QTY',
        'OrdrdetTableMap::COL_QTY' => 'QTY',
        'COL_QTY' => 'QTY',
        'Qtyshipped' => 'QTYSHIPPED',
        'Ordrdet.Qtyshipped' => 'QTYSHIPPED',
        'qtyshipped' => 'QTYSHIPPED',
        'ordrdet.qtyshipped' => 'QTYSHIPPED',
        'OrdrdetTableMap::COL_QTYSHIPPED' => 'QTYSHIPPED',
        'COL_QTYSHIPPED' => 'QTYSHIPPED',
        'Qtybackord' => 'QTYBACKORD',
        'Ordrdet.Qtybackord' => 'QTYBACKORD',
        'qtybackord' => 'QTYBACKORD',
        'ordrdet.qtybackord' => 'QTYBACKORD',
        'OrdrdetTableMap::COL_QTYBACKORD' => 'QTYBACKORD',
        'COL_QTYBACKORD' => 'QTYBACKORD',
        'Rshipdate' => 'RSHIPDATE',
        'Ordrdet.Rshipdate' => 'RSHIPDATE',
        'rshipdate' => 'RSHIPDATE',
        'ordrdet.rshipdate' => 'RSHIPDATE',
        'OrdrdetTableMap::COL_RSHIPDATE' => 'RSHIPDATE',
        'COL_RSHIPDATE' => 'RSHIPDATE',
        'Hasdocuments' => 'HASDOCUMENTS',
        'Ordrdet.Hasdocuments' => 'HASDOCUMENTS',
        'hasdocuments' => 'HASDOCUMENTS',
        'ordrdet.hasdocuments' => 'HASDOCUMENTS',
        'OrdrdetTableMap::COL_HASDOCUMENTS' => 'HASDOCUMENTS',
        'COL_HASDOCUMENTS' => 'HASDOCUMENTS',
        'Qtyavail' => 'QTYAVAIL',
        'Ordrdet.Qtyavail' => 'QTYAVAIL',
        'qtyavail' => 'QTYAVAIL',
        'ordrdet.qtyavail' => 'QTYAVAIL',
        'OrdrdetTableMap::COL_QTYAVAIL' => 'QTYAVAIL',
        'COL_QTYAVAIL' => 'QTYAVAIL',
        'Hasnotes' => 'HASNOTES',
        'Ordrdet.Hasnotes' => 'HASNOTES',
        'hasnotes' => 'HASNOTES',
        'ordrdet.hasnotes' => 'HASNOTES',
        'OrdrdetTableMap::COL_HASNOTES' => 'HASNOTES',
        'COL_HASNOTES' => 'HASNOTES',
        'Cost' => 'COST',
        'Ordrdet.Cost' => 'COST',
        'cost' => 'COST',
        'ordrdet.cost' => 'COST',
        'OrdrdetTableMap::COL_COST' => 'COST',
        'COL_COST' => 'COST',
        'Whse' => 'WHSE',
        'Ordrdet.Whse' => 'WHSE',
        'whse' => 'WHSE',
        'ordrdet.whse' => 'WHSE',
        'OrdrdetTableMap::COL_WHSE' => 'WHSE',
        'COL_WHSE' => 'WHSE',
        'Uom' => 'UOM',
        'Ordrdet.Uom' => 'UOM',
        'uom' => 'UOM',
        'ordrdet.uom' => 'UOM',
        'OrdrdetTableMap::COL_UOM' => 'UOM',
        'COL_UOM' => 'UOM',
        'Spcord' => 'SPCORD',
        'Ordrdet.Spcord' => 'SPCORD',
        'spcord' => 'SPCORD',
        'ordrdet.spcord' => 'SPCORD',
        'OrdrdetTableMap::COL_SPCORD' => 'SPCORD',
        'COL_SPCORD' => 'SPCORD',
        'Kititemflag' => 'KITITEMFLAG',
        'Ordrdet.Kititemflag' => 'KITITEMFLAG',
        'kititemflag' => 'KITITEMFLAG',
        'ordrdet.kititemflag' => 'KITITEMFLAG',
        'OrdrdetTableMap::COL_KITITEMFLAG' => 'KITITEMFLAG',
        'COL_KITITEMFLAG' => 'KITITEMFLAG',
        'Promocode' => 'PROMOCODE',
        'Ordrdet.Promocode' => 'PROMOCODE',
        'promocode' => 'PROMOCODE',
        'ordrdet.promocode' => 'PROMOCODE',
        'OrdrdetTableMap::COL_PROMOCODE' => 'PROMOCODE',
        'COL_PROMOCODE' => 'PROMOCODE',
        'Taxcode' => 'TAXCODE',
        'Ordrdet.Taxcode' => 'TAXCODE',
        'taxcode' => 'TAXCODE',
        'ordrdet.taxcode' => 'TAXCODE',
        'OrdrdetTableMap::COL_TAXCODE' => 'TAXCODE',
        'COL_TAXCODE' => 'TAXCODE',
        'Taxcodeperc' => 'TAXCODEPERC',
        'Ordrdet.Taxcodeperc' => 'TAXCODEPERC',
        'taxcodeperc' => 'TAXCODEPERC',
        'ordrdet.taxcodeperc' => 'TAXCODEPERC',
        'OrdrdetTableMap::COL_TAXCODEPERC' => 'TAXCODEPERC',
        'COL_TAXCODEPERC' => 'TAXCODEPERC',
        'Discpct' => 'DISCPCT',
        'Ordrdet.Discpct' => 'DISCPCT',
        'discpct' => 'DISCPCT',
        'ordrdet.discpct' => 'DISCPCT',
        'OrdrdetTableMap::COL_DISCPCT' => 'DISCPCT',
        'COL_DISCPCT' => 'DISCPCT',
        'Listprice' => 'LISTPRICE',
        'Ordrdet.Listprice' => 'LISTPRICE',
        'listprice' => 'LISTPRICE',
        'ordrdet.listprice' => 'LISTPRICE',
        'OrdrdetTableMap::COL_LISTPRICE' => 'LISTPRICE',
        'COL_LISTPRICE' => 'LISTPRICE',
        'Uomconv' => 'UOMCONV',
        'Ordrdet.Uomconv' => 'UOMCONV',
        'uomconv' => 'UOMCONV',
        'ordrdet.uomconv' => 'UOMCONV',
        'OrdrdetTableMap::COL_UOMCONV' => 'UOMCONV',
        'COL_UOMCONV' => 'UOMCONV',
        'Vendorid' => 'VENDORID',
        'Ordrdet.Vendorid' => 'VENDORID',
        'vendorid' => 'VENDORID',
        'ordrdet.vendorid' => 'VENDORID',
        'OrdrdetTableMap::COL_VENDORID' => 'VENDORID',
        'COL_VENDORID' => 'VENDORID',
        'Vendoritemid' => 'VENDORITEMID',
        'Ordrdet.Vendoritemid' => 'VENDORITEMID',
        'vendoritemid' => 'VENDORITEMID',
        'ordrdet.vendoritemid' => 'VENDORITEMID',
        'OrdrdetTableMap::COL_VENDORITEMID' => 'VENDORITEMID',
        'COL_VENDORITEMID' => 'VENDORITEMID',
        'Mfgid' => 'MFGID',
        'Ordrdet.Mfgid' => 'MFGID',
        'mfgid' => 'MFGID',
        'ordrdet.mfgid' => 'MFGID',
        'OrdrdetTableMap::COL_MFGID' => 'MFGID',
        'COL_MFGID' => 'MFGID',
        'Mfgitemid' => 'MFGITEMID',
        'Ordrdet.Mfgitemid' => 'MFGITEMID',
        'mfgitemid' => 'MFGITEMID',
        'ordrdet.mfgitemid' => 'MFGITEMID',
        'OrdrdetTableMap::COL_MFGITEMID' => 'MFGITEMID',
        'COL_MFGITEMID' => 'MFGITEMID',
        'Status' => 'STATUS',
        'Ordrdet.Status' => 'STATUS',
        'status' => 'STATUS',
        'ordrdet.status' => 'STATUS',
        'OrdrdetTableMap::COL_STATUS' => 'STATUS',
        'COL_STATUS' => 'STATUS',
        'Lostreason' => 'LOSTREASON',
        'Ordrdet.Lostreason' => 'LOSTREASON',
        'lostreason' => 'LOSTREASON',
        'ordrdet.lostreason' => 'LOSTREASON',
        'OrdrdetTableMap::COL_LOSTREASON' => 'LOSTREASON',
        'COL_LOSTREASON' => 'LOSTREASON',
        'Lostdate' => 'LOSTDATE',
        'Ordrdet.Lostdate' => 'LOSTDATE',
        'lostdate' => 'LOSTDATE',
        'ordrdet.lostdate' => 'LOSTDATE',
        'OrdrdetTableMap::COL_LOSTDATE' => 'LOSTDATE',
        'COL_LOSTDATE' => 'LOSTDATE',
        'Notes' => 'NOTES',
        'Ordrdet.Notes' => 'NOTES',
        'notes' => 'NOTES',
        'ordrdet.notes' => 'NOTES',
        'OrdrdetTableMap::COL_NOTES' => 'NOTES',
        'COL_NOTES' => 'NOTES',
        'Leaddays' => 'LEADDAYS',
        'Ordrdet.Leaddays' => 'LEADDAYS',
        'leaddays' => 'LEADDAYS',
        'ordrdet.leaddays' => 'LEADDAYS',
        'OrdrdetTableMap::COL_LEADDAYS' => 'LEADDAYS',
        'COL_LEADDAYS' => 'LEADDAYS',
        'Ordrtotalcost' => 'ORDRTOTALCOST',
        'Ordrdet.Ordrtotalcost' => 'ORDRTOTALCOST',
        'ordrtotalcost' => 'ORDRTOTALCOST',
        'ordrdet.ordrtotalcost' => 'ORDRTOTALCOST',
        'OrdrdetTableMap::COL_ORDRTOTALCOST' => 'ORDRTOTALCOST',
        'COL_ORDRTOTALCOST' => 'ORDRTOTALCOST',
        'Costuom' => 'COSTUOM',
        'Ordrdet.Costuom' => 'COSTUOM',
        'costuom' => 'COSTUOM',
        'ordrdet.costuom' => 'COSTUOM',
        'OrdrdetTableMap::COL_COSTUOM' => 'COSTUOM',
        'COL_COSTUOM' => 'COSTUOM',
        'Stancost' => 'STANCOST',
        'Ordrdet.Stancost' => 'STANCOST',
        'stancost' => 'STANCOST',
        'ordrdet.stancost' => 'STANCOST',
        'OrdrdetTableMap::COL_STANCOST' => 'STANCOST',
        'COL_STANCOST' => 'STANCOST',
        'Quotind' => 'QUOTIND',
        'Ordrdet.Quotind' => 'QUOTIND',
        'quotind' => 'QUOTIND',
        'ordrdet.quotind' => 'QUOTIND',
        'OrdrdetTableMap::COL_QUOTIND' => 'QUOTIND',
        'COL_QUOTIND' => 'QUOTIND',
        'Quotqty' => 'QUOTQTY',
        'Ordrdet.Quotqty' => 'QUOTQTY',
        'quotqty' => 'QUOTQTY',
        'ordrdet.quotqty' => 'QUOTQTY',
        'OrdrdetTableMap::COL_QUOTQTY' => 'QUOTQTY',
        'COL_QUOTQTY' => 'QUOTQTY',
        'Quotprice' => 'QUOTPRICE',
        'Ordrdet.Quotprice' => 'QUOTPRICE',
        'quotprice' => 'QUOTPRICE',
        'ordrdet.quotprice' => 'QUOTPRICE',
        'OrdrdetTableMap::COL_QUOTPRICE' => 'QUOTPRICE',
        'COL_QUOTPRICE' => 'QUOTPRICE',
        'Quotcost' => 'QUOTCOST',
        'Ordrdet.Quotcost' => 'QUOTCOST',
        'quotcost' => 'QUOTCOST',
        'ordrdet.quotcost' => 'QUOTCOST',
        'OrdrdetTableMap::COL_QUOTCOST' => 'QUOTCOST',
        'COL_QUOTCOST' => 'QUOTCOST',
        'Quotmkupmarg' => 'QUOTMKUPMARG',
        'Ordrdet.Quotmkupmarg' => 'QUOTMKUPMARG',
        'quotmkupmarg' => 'QUOTMKUPMARG',
        'ordrdet.quotmkupmarg' => 'QUOTMKUPMARG',
        'OrdrdetTableMap::COL_QUOTMKUPMARG' => 'QUOTMKUPMARG',
        'COL_QUOTMKUPMARG' => 'QUOTMKUPMARG',
        'Quotdiscpct' => 'QUOTDISCPCT',
        'Ordrdet.Quotdiscpct' => 'QUOTDISCPCT',
        'quotdiscpct' => 'QUOTDISCPCT',
        'ordrdet.quotdiscpct' => 'QUOTDISCPCT',
        'OrdrdetTableMap::COL_QUOTDISCPCT' => 'QUOTDISCPCT',
        'COL_QUOTDISCPCT' => 'QUOTDISCPCT',
        'Errormsg' => 'ERRORMSG',
        'Ordrdet.Errormsg' => 'ERRORMSG',
        'errormsg' => 'ERRORMSG',
        'ordrdet.errormsg' => 'ERRORMSG',
        'OrdrdetTableMap::COL_ERRORMSG' => 'ERRORMSG',
        'COL_ERRORMSG' => 'ERRORMSG',
        'Minprice' => 'MINPRICE',
        'Ordrdet.Minprice' => 'MINPRICE',
        'minprice' => 'MINPRICE',
        'ordrdet.minprice' => 'MINPRICE',
        'OrdrdetTableMap::COL_MINPRICE' => 'MINPRICE',
        'COL_MINPRICE' => 'MINPRICE',
        'Ponbr' => 'PONBR',
        'Ordrdet.Ponbr' => 'PONBR',
        'ponbr' => 'PONBR',
        'ordrdet.ponbr' => 'PONBR',
        'OrdrdetTableMap::COL_PONBR' => 'PONBR',
        'COL_PONBR' => 'PONBR',
        'Poref' => 'POREF',
        'Ordrdet.Poref' => 'POREF',
        'poref' => 'POREF',
        'ordrdet.poref' => 'POREF',
        'OrdrdetTableMap::COL_POREF' => 'POREF',
        'COL_POREF' => 'POREF',
        'Nsitemgroup' => 'NSITEMGROUP',
        'Ordrdet.Nsitemgroup' => 'NSITEMGROUP',
        'nsitemgroup' => 'NSITEMGROUP',
        'ordrdet.nsitemgroup' => 'NSITEMGROUP',
        'OrdrdetTableMap::COL_NSITEMGROUP' => 'NSITEMGROUP',
        'COL_NSITEMGROUP' => 'NSITEMGROUP',
        'Shipfromid' => 'SHIPFROMID',
        'Ordrdet.Shipfromid' => 'SHIPFROMID',
        'shipfromid' => 'SHIPFROMID',
        'ordrdet.shipfromid' => 'SHIPFROMID',
        'OrdrdetTableMap::COL_SHIPFROMID' => 'SHIPFROMID',
        'COL_SHIPFROMID' => 'SHIPFROMID',
        'Itemtype' => 'ITEMTYPE',
        'Ordrdet.Itemtype' => 'ITEMTYPE',
        'itemtype' => 'ITEMTYPE',
        'ordrdet.itemtype' => 'ITEMTYPE',
        'OrdrdetTableMap::COL_ITEMTYPE' => 'ITEMTYPE',
        'COL_ITEMTYPE' => 'ITEMTYPE',
        'Canbackorder' => 'CANBACKORDER',
        'Ordrdet.Canbackorder' => 'CANBACKORDER',
        'canbackorder' => 'CANBACKORDER',
        'ordrdet.canbackorder' => 'CANBACKORDER',
        'OrdrdetTableMap::COL_CANBACKORDER' => 'CANBACKORDER',
        'COL_CANBACKORDER' => 'CANBACKORDER',
        'Dummy' => 'DUMMY',
        'Ordrdet.Dummy' => 'DUMMY',
        'dummy' => 'DUMMY',
        'ordrdet.dummy' => 'DUMMY',
        'OrdrdetTableMap::COL_DUMMY' => 'DUMMY',
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
        $this->setName('ordrdet');
        $this->setPhpName('Ordrdet');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Ordrdet');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('sessionid', 'Sessionid', 'VARCHAR', true, 50, '');
        $this->addPrimaryKey('recno', 'Recno', 'INTEGER', true, null, 0);
        $this->addColumn('date', 'Date', 'INTEGER', false, 8, null);
        $this->addColumn('time', 'Time', 'INTEGER', false, 8, null);
        $this->addColumn('type', 'Type', 'VARCHAR', false, 1, 'O');
        $this->addPrimaryKey('orderno', 'Orderno', 'VARCHAR', true, 30, '');
        $this->addColumn('linenbr', 'Linenbr', 'VARCHAR', false, 5, '0');
        $this->addColumn('sublinenbr', 'Sublinenbr', 'VARCHAR', false, 5, '0');
        $this->addColumn('itemid', 'Itemid', 'VARCHAR', false, 30, '');
        $this->addColumn('custid', 'Custid', 'VARCHAR', false, 6, '');
        $this->addColumn('custitemid', 'Custitemid', 'VARCHAR', false, 30, '');
        $this->addColumn('desc1', 'Desc1', 'VARCHAR', false, 35, '');
        $this->addColumn('desc2', 'Desc2', 'VARCHAR', false, 35, '');
        $this->addColumn('price', 'Price', 'VARCHAR', false, 20, '0.00');
        $this->addColumn('totalprice', 'Totalprice', 'VARCHAR', false, 20, '0.00');
        $this->addColumn('qty', 'Qty', 'VARCHAR', false, 20, '0');
        $this->addColumn('qtyshipped', 'Qtyshipped', 'VARCHAR', false, 20, '0');
        $this->addColumn('qtybackord', 'Qtybackord', 'VARCHAR', false, 20, '0');
        $this->addColumn('rshipdate', 'Rshipdate', 'VARCHAR', false, 10, '');
        $this->addColumn('hasdocuments', 'Hasdocuments', 'VARCHAR', false, 1, 'N');
        $this->addColumn('qtyavail', 'Qtyavail', 'VARCHAR', false, 20, '0');
        $this->addColumn('hasnotes', 'Hasnotes', 'VARCHAR', false, 1, 'N');
        $this->addColumn('cost', 'Cost', 'VARCHAR', false, 20, '0.00');
        $this->addColumn('whse', 'Whse', 'VARCHAR', false, 2, '');
        $this->addColumn('uom', 'Uom', 'VARCHAR', false, 4, '');
        $this->addColumn('spcord', 'Spcord', 'VARCHAR', false, 1, '');
        $this->addColumn('kititemflag', 'Kititemflag', 'VARCHAR', false, 1, '');
        $this->addColumn('promocode', 'Promocode', 'VARCHAR', false, 6, '');
        $this->addColumn('taxcode', 'Taxcode', 'VARCHAR', false, 6, '');
        $this->addColumn('taxcodeperc', 'Taxcodeperc', 'VARCHAR', false, 20, '');
        $this->addColumn('discpct', 'Discpct', 'VARCHAR', false, 20, '');
        $this->addColumn('listprice', 'Listprice', 'VARCHAR', false, 20, '0.00');
        $this->addColumn('uomconv', 'Uomconv', 'VARCHAR', false, 20, '');
        $this->addColumn('vendorid', 'Vendorid', 'VARCHAR', false, 6, '');
        $this->addColumn('vendoritemid', 'Vendoritemid', 'VARCHAR', false, 30, '');
        $this->addColumn('mfgid', 'Mfgid', 'VARCHAR', false, 6, '');
        $this->addColumn('mfgitemid', 'Mfgitemid', 'VARCHAR', false, 30, '');
        $this->addColumn('status', 'Status', 'VARCHAR', false, 1, '');
        $this->addColumn('lostreason', 'Lostreason', 'VARCHAR', false, 4, '');
        $this->addColumn('lostdate', 'Lostdate', 'VARCHAR', false, 10, '');
        $this->addColumn('notes', 'Notes', 'VARCHAR', false, 1, '');
        $this->addColumn('leaddays', 'Leaddays', 'INTEGER', false, 4, null);
        $this->addColumn('ordrtotalcost', 'Ordrtotalcost', 'VARCHAR', false, 20, '0.00');
        $this->addColumn('costuom', 'Costuom', 'VARCHAR', false, 4, '');
        $this->addColumn('stancost', 'Stancost', 'VARCHAR', false, 20, '');
        $this->addColumn('quotind', 'Quotind', 'VARCHAR', false, 1, '');
        $this->addColumn('quotqty', 'Quotqty', 'INTEGER', false, 9, 0);
        $this->addColumn('quotprice', 'Quotprice', 'VARCHAR', false, 20, '0.00');
        $this->addColumn('quotcost', 'Quotcost', 'VARCHAR', false, 20, '0.00');
        $this->addColumn('quotmkupmarg', 'Quotmkupmarg', 'VARCHAR', false, 20, '0.00');
        $this->addColumn('quotdiscpct', 'Quotdiscpct', 'VARCHAR', false, 20, '0.00');
        $this->addColumn('errormsg', 'Errormsg', 'VARCHAR', false, 50, '');
        $this->addColumn('minprice', 'Minprice', 'VARCHAR', false, 20, '0.00');
        $this->addColumn('ponbr', 'Ponbr', 'VARCHAR', false, 8, '');
        $this->addColumn('poref', 'Poref', 'VARCHAR', false, 15, '');
        $this->addColumn('nsitemgroup', 'Nsitemgroup', 'VARCHAR', false, 4, '');
        $this->addColumn('shipfromid', 'Shipfromid', 'VARCHAR', false, 6, '');
        $this->addColumn('itemtype', 'Itemtype', 'VARCHAR', false, 1, '');
        $this->addColumn('canbackorder', 'Canbackorder', 'VARCHAR', false, 1, '');
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
     * @param \Ordrdet $obj A \Ordrdet object.
     * @param string|null $key Key (optional) to use for instance map (for performance boost if key was already calculated externally).
     *
     * @return void
     */
    public static function addInstanceToPool(Ordrdet $obj, ?string $key = null): void
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getSessionid() || is_scalar($obj->getSessionid()) || is_callable([$obj->getSessionid(), '__toString']) ? (string) $obj->getSessionid() : $obj->getSessionid()), (null === $obj->getRecno() || is_scalar($obj->getRecno()) || is_callable([$obj->getRecno(), '__toString']) ? (string) $obj->getRecno() : $obj->getRecno()), (null === $obj->getOrderno() || is_scalar($obj->getOrderno()) || is_callable([$obj->getOrderno(), '__toString']) ? (string) $obj->getOrderno() : $obj->getOrderno())]);
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
     * @param mixed $value A \Ordrdet object or a primary key value.
     *
     * @return void
     */
    public static function removeInstanceFromPool($value): void
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Ordrdet) {
                $key = serialize([(null === $value->getSessionid() || is_scalar($value->getSessionid()) || is_callable([$value->getSessionid(), '__toString']) ? (string) $value->getSessionid() : $value->getSessionid()), (null === $value->getRecno() || is_scalar($value->getRecno()) || is_callable([$value->getRecno(), '__toString']) ? (string) $value->getRecno() : $value->getRecno()), (null === $value->getOrderno() || is_scalar($value->getOrderno()) || is_callable([$value->getOrderno(), '__toString']) ? (string) $value->getOrderno() : $value->getOrderno())]);

            } elseif (is_array($value) && count($value) === 3) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1]), (null === $value[2] || is_scalar($value[2]) || is_callable([$value[2], '__toString']) ? (string) $value[2] : $value[2])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Ordrdet object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('Orderno', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('Orderno', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('Orderno', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('Orderno', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('Orderno', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('Orderno', TableMap::TYPE_PHPNAME, $indexType)])]);
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
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 5 + $offset
                : self::translateFieldName('Orderno', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? OrdrdetTableMap::CLASS_DEFAULT : OrdrdetTableMap::OM_CLASS;
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
     * @return array (Ordrdet object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = OrdrdetTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OrdrdetTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OrdrdetTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OrdrdetTableMap::OM_CLASS;
            /** @var Ordrdet $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OrdrdetTableMap::addInstanceToPool($obj, $key);
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
            $key = OrdrdetTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OrdrdetTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Ordrdet $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OrdrdetTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OrdrdetTableMap::COL_SESSIONID);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_RECNO);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_DATE);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_TIME);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_TYPE);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_ORDERNO);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_LINENBR);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_SUBLINENBR);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_ITEMID);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_CUSTID);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_CUSTITEMID);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_DESC1);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_DESC2);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_PRICE);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_TOTALPRICE);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_QTY);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_QTYSHIPPED);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_QTYBACKORD);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_RSHIPDATE);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_HASDOCUMENTS);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_QTYAVAIL);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_HASNOTES);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_COST);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_WHSE);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_UOM);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_SPCORD);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_KITITEMFLAG);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_PROMOCODE);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_TAXCODE);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_TAXCODEPERC);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_DISCPCT);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_LISTPRICE);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_UOMCONV);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_VENDORID);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_VENDORITEMID);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_MFGID);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_MFGITEMID);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_STATUS);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_LOSTREASON);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_LOSTDATE);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_NOTES);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_LEADDAYS);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_ORDRTOTALCOST);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_COSTUOM);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_STANCOST);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_QUOTIND);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_QUOTQTY);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_QUOTPRICE);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_QUOTCOST);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_QUOTMKUPMARG);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_QUOTDISCPCT);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_ERRORMSG);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_MINPRICE);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_PONBR);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_POREF);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_NSITEMGROUP);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_SHIPFROMID);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_ITEMTYPE);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_CANBACKORDER);
            $criteria->addSelectColumn(OrdrdetTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.sessionid');
            $criteria->addSelectColumn($alias . '.recno');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.time');
            $criteria->addSelectColumn($alias . '.type');
            $criteria->addSelectColumn($alias . '.orderno');
            $criteria->addSelectColumn($alias . '.linenbr');
            $criteria->addSelectColumn($alias . '.sublinenbr');
            $criteria->addSelectColumn($alias . '.itemid');
            $criteria->addSelectColumn($alias . '.custid');
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
            $criteria->addSelectColumn($alias . '.vendorid');
            $criteria->addSelectColumn($alias . '.vendoritemid');
            $criteria->addSelectColumn($alias . '.mfgid');
            $criteria->addSelectColumn($alias . '.mfgitemid');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.lostreason');
            $criteria->addSelectColumn($alias . '.lostdate');
            $criteria->addSelectColumn($alias . '.notes');
            $criteria->addSelectColumn($alias . '.leaddays');
            $criteria->addSelectColumn($alias . '.ordrtotalcost');
            $criteria->addSelectColumn($alias . '.costuom');
            $criteria->addSelectColumn($alias . '.stancost');
            $criteria->addSelectColumn($alias . '.quotind');
            $criteria->addSelectColumn($alias . '.quotqty');
            $criteria->addSelectColumn($alias . '.quotprice');
            $criteria->addSelectColumn($alias . '.quotcost');
            $criteria->addSelectColumn($alias . '.quotmkupmarg');
            $criteria->addSelectColumn($alias . '.quotdiscpct');
            $criteria->addSelectColumn($alias . '.errormsg');
            $criteria->addSelectColumn($alias . '.minprice');
            $criteria->addSelectColumn($alias . '.ponbr');
            $criteria->addSelectColumn($alias . '.poref');
            $criteria->addSelectColumn($alias . '.nsitemgroup');
            $criteria->addSelectColumn($alias . '.shipfromid');
            $criteria->addSelectColumn($alias . '.itemtype');
            $criteria->addSelectColumn($alias . '.canbackorder');
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
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_SESSIONID);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_RECNO);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_DATE);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_TIME);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_TYPE);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_ORDERNO);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_LINENBR);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_SUBLINENBR);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_ITEMID);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_CUSTID);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_CUSTITEMID);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_DESC1);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_DESC2);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_PRICE);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_TOTALPRICE);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_QTY);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_QTYSHIPPED);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_QTYBACKORD);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_RSHIPDATE);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_HASDOCUMENTS);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_QTYAVAIL);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_HASNOTES);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_COST);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_WHSE);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_UOM);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_SPCORD);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_KITITEMFLAG);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_PROMOCODE);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_TAXCODE);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_TAXCODEPERC);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_DISCPCT);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_LISTPRICE);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_UOMCONV);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_VENDORID);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_VENDORITEMID);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_MFGID);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_MFGITEMID);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_STATUS);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_LOSTREASON);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_LOSTDATE);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_NOTES);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_LEADDAYS);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_ORDRTOTALCOST);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_COSTUOM);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_STANCOST);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_QUOTIND);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_QUOTQTY);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_QUOTPRICE);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_QUOTCOST);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_QUOTMKUPMARG);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_QUOTDISCPCT);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_ERRORMSG);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_MINPRICE);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_PONBR);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_POREF);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_NSITEMGROUP);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_SHIPFROMID);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_ITEMTYPE);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_CANBACKORDER);
            $criteria->removeSelectColumn(OrdrdetTableMap::COL_DUMMY);
        } else {
            $criteria->removeSelectColumn($alias . '.sessionid');
            $criteria->removeSelectColumn($alias . '.recno');
            $criteria->removeSelectColumn($alias . '.date');
            $criteria->removeSelectColumn($alias . '.time');
            $criteria->removeSelectColumn($alias . '.type');
            $criteria->removeSelectColumn($alias . '.orderno');
            $criteria->removeSelectColumn($alias . '.linenbr');
            $criteria->removeSelectColumn($alias . '.sublinenbr');
            $criteria->removeSelectColumn($alias . '.itemid');
            $criteria->removeSelectColumn($alias . '.custid');
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
            $criteria->removeSelectColumn($alias . '.vendorid');
            $criteria->removeSelectColumn($alias . '.vendoritemid');
            $criteria->removeSelectColumn($alias . '.mfgid');
            $criteria->removeSelectColumn($alias . '.mfgitemid');
            $criteria->removeSelectColumn($alias . '.status');
            $criteria->removeSelectColumn($alias . '.lostreason');
            $criteria->removeSelectColumn($alias . '.lostdate');
            $criteria->removeSelectColumn($alias . '.notes');
            $criteria->removeSelectColumn($alias . '.leaddays');
            $criteria->removeSelectColumn($alias . '.ordrtotalcost');
            $criteria->removeSelectColumn($alias . '.costuom');
            $criteria->removeSelectColumn($alias . '.stancost');
            $criteria->removeSelectColumn($alias . '.quotind');
            $criteria->removeSelectColumn($alias . '.quotqty');
            $criteria->removeSelectColumn($alias . '.quotprice');
            $criteria->removeSelectColumn($alias . '.quotcost');
            $criteria->removeSelectColumn($alias . '.quotmkupmarg');
            $criteria->removeSelectColumn($alias . '.quotdiscpct');
            $criteria->removeSelectColumn($alias . '.errormsg');
            $criteria->removeSelectColumn($alias . '.minprice');
            $criteria->removeSelectColumn($alias . '.ponbr');
            $criteria->removeSelectColumn($alias . '.poref');
            $criteria->removeSelectColumn($alias . '.nsitemgroup');
            $criteria->removeSelectColumn($alias . '.shipfromid');
            $criteria->removeSelectColumn($alias . '.itemtype');
            $criteria->removeSelectColumn($alias . '.canbackorder');
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
        return Propel::getServiceContainer()->getDatabaseMap(OrdrdetTableMap::DATABASE_NAME)->getTable(OrdrdetTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Ordrdet or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or Ordrdet object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OrdrdetTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Ordrdet) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OrdrdetTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = [$values];
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(OrdrdetTableMap::COL_SESSIONID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(OrdrdetTableMap::COL_RECNO, $value[1]));
                $criterion->addAnd($criteria->getNewCriterion(OrdrdetTableMap::COL_ORDERNO, $value[2]));
                $criteria->addOr($criterion);
            }
        }

        $query = OrdrdetQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OrdrdetTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OrdrdetTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ordrdet table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return OrdrdetQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Ordrdet or Criteria object.
     *
     * @param mixed $criteria Criteria or Ordrdet object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OrdrdetTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Ordrdet object
        }


        // Set the correct dbName
        $query = OrdrdetQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
