<?php

namespace Map;

use \Quotdet;
use \QuotdetQuery;
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
 * This class defines the structure of the 'quotdet' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class QuotdetTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.QuotdetTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'quotdet';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Quotdet';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Quotdet';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 47;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 47;

    /**
     * the column name for the sessionid field
     */
    const COL_SESSIONID = 'quotdet.sessionid';

    /**
     * the column name for the recno field
     */
    const COL_RECNO = 'quotdet.recno';

    /**
     * the column name for the date field
     */
    const COL_DATE = 'quotdet.date';

    /**
     * the column name for the time field
     */
    const COL_TIME = 'quotdet.time';

    /**
     * the column name for the quotenbr field
     */
    const COL_QUOTENBR = 'quotdet.quotenbr';

    /**
     * the column name for the custid field
     */
    const COL_CUSTID = 'quotdet.custid';

    /**
     * the column name for the linenbr field
     */
    const COL_LINENBR = 'quotdet.linenbr';

    /**
     * the column name for the sublinenbr field
     */
    const COL_SUBLINENBR = 'quotdet.sublinenbr';

    /**
     * the column name for the itemid field
     */
    const COL_ITEMID = 'quotdet.itemid';

    /**
     * the column name for the desc1 field
     */
    const COL_DESC1 = 'quotdet.desc1';

    /**
     * the column name for the desc2 field
     */
    const COL_DESC2 = 'quotdet.desc2';

    /**
     * the column name for the custitemid field
     */
    const COL_CUSTITEMID = 'quotdet.custitemid';

    /**
     * the column name for the vendorid field
     */
    const COL_VENDORID = 'quotdet.vendorid';

    /**
     * the column name for the vendoritemid field
     */
    const COL_VENDORITEMID = 'quotdet.vendoritemid';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'quotdet.status';

    /**
     * the column name for the lostreason field
     */
    const COL_LOSTREASON = 'quotdet.lostreason';

    /**
     * the column name for the lostdate field
     */
    const COL_LOSTDATE = 'quotdet.lostdate';

    /**
     * the column name for the kititemflag field
     */
    const COL_KITITEMFLAG = 'quotdet.kititemflag';

    /**
     * the column name for the hasnotes field
     */
    const COL_HASNOTES = 'quotdet.hasnotes';

    /**
     * the column name for the venddetail field
     */
    const COL_VENDDETAIL = 'quotdet.venddetail';

    /**
     * the column name for the rshipdate field
     */
    const COL_RSHIPDATE = 'quotdet.rshipdate';

    /**
     * the column name for the leaddays field
     */
    const COL_LEADDAYS = 'quotdet.leaddays';

    /**
     * the column name for the taxcode field
     */
    const COL_TAXCODE = 'quotdet.taxcode';

    /**
     * the column name for the ordrqty field
     */
    const COL_ORDRQTY = 'quotdet.ordrqty';

    /**
     * the column name for the ordrprice field
     */
    const COL_ORDRPRICE = 'quotdet.ordrprice';

    /**
     * the column name for the ordrcost field
     */
    const COL_ORDRCOST = 'quotdet.ordrcost';

    /**
     * the column name for the ordrtotalprice field
     */
    const COL_ORDRTOTALPRICE = 'quotdet.ordrtotalprice';

    /**
     * the column name for the ordrtotalcost field
     */
    const COL_ORDRTOTALCOST = 'quotdet.ordrtotalcost';

    /**
     * the column name for the uom field
     */
    const COL_UOM = 'quotdet.uom';

    /**
     * the column name for the costuom field
     */
    const COL_COSTUOM = 'quotdet.costuom';

    /**
     * the column name for the whse field
     */
    const COL_WHSE = 'quotdet.whse';

    /**
     * the column name for the listprice field
     */
    const COL_LISTPRICE = 'quotdet.listprice';

    /**
     * the column name for the stancost field
     */
    const COL_STANCOST = 'quotdet.stancost';

    /**
     * the column name for the quotind field
     */
    const COL_QUOTIND = 'quotdet.quotind';

    /**
     * the column name for the quotqty field
     */
    const COL_QUOTQTY = 'quotdet.quotqty';

    /**
     * the column name for the quotprice field
     */
    const COL_QUOTPRICE = 'quotdet.quotprice';

    /**
     * the column name for the quotcost field
     */
    const COL_QUOTCOST = 'quotdet.quotcost';

    /**
     * the column name for the quotmkupmarg field
     */
    const COL_QUOTMKUPMARG = 'quotdet.quotmkupmarg';

    /**
     * the column name for the discpct field
     */
    const COL_DISCPCT = 'quotdet.discpct';

    /**
     * the column name for the spcord field
     */
    const COL_SPCORD = 'quotdet.spcord';

    /**
     * the column name for the error field
     */
    const COL_ERROR = 'quotdet.error';

    /**
     * the column name for the errormsg field
     */
    const COL_ERRORMSG = 'quotdet.errormsg';

    /**
     * the column name for the minprice field
     */
    const COL_MINPRICE = 'quotdet.minprice';

    /**
     * the column name for the nsitemgroup field
     */
    const COL_NSITEMGROUP = 'quotdet.nsitemgroup';

    /**
     * the column name for the shipfromid field
     */
    const COL_SHIPFROMID = 'quotdet.shipfromid';

    /**
     * the column name for the itemtype field
     */
    const COL_ITEMTYPE = 'quotdet.itemtype';

    /**
     * the column name for the dummy field
     */
    const COL_DUMMY = 'quotdet.dummy';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Sessionid', 'Recno', 'Date', 'Time', 'Quotenbr', 'Custid', 'Linenbr', 'Sublinenbr', 'Itemid', 'Desc1', 'Desc2', 'Custitemid', 'Vendorid', 'Vendoritemid', 'Status', 'Lostreason', 'Lostdate', 'Kititemflag', 'Hasnotes', 'Venddetail', 'Rshipdate', 'Leaddays', 'Taxcode', 'Ordrqty', 'Ordrprice', 'Ordrcost', 'Ordrtotalprice', 'Ordrtotalcost', 'Uom', 'Costuom', 'Whse', 'Listprice', 'Stancost', 'Quotind', 'Quotqty', 'Quotprice', 'Quotcost', 'Quotmkupmarg', 'Discpct', 'Spcord', 'Error', 'Errormsg', 'Minprice', 'Nsitemgroup', 'Shipfromid', 'Itemtype', 'Dummy', ),
        self::TYPE_CAMELNAME     => array('sessionid', 'recno', 'date', 'time', 'quotenbr', 'custid', 'linenbr', 'sublinenbr', 'itemid', 'desc1', 'desc2', 'custitemid', 'vendorid', 'vendoritemid', 'status', 'lostreason', 'lostdate', 'kititemflag', 'hasnotes', 'venddetail', 'rshipdate', 'leaddays', 'taxcode', 'ordrqty', 'ordrprice', 'ordrcost', 'ordrtotalprice', 'ordrtotalcost', 'uom', 'costuom', 'whse', 'listprice', 'stancost', 'quotind', 'quotqty', 'quotprice', 'quotcost', 'quotmkupmarg', 'discpct', 'spcord', 'error', 'errormsg', 'minprice', 'nsitemgroup', 'shipfromid', 'itemtype', 'dummy', ),
        self::TYPE_COLNAME       => array(QuotdetTableMap::COL_SESSIONID, QuotdetTableMap::COL_RECNO, QuotdetTableMap::COL_DATE, QuotdetTableMap::COL_TIME, QuotdetTableMap::COL_QUOTENBR, QuotdetTableMap::COL_CUSTID, QuotdetTableMap::COL_LINENBR, QuotdetTableMap::COL_SUBLINENBR, QuotdetTableMap::COL_ITEMID, QuotdetTableMap::COL_DESC1, QuotdetTableMap::COL_DESC2, QuotdetTableMap::COL_CUSTITEMID, QuotdetTableMap::COL_VENDORID, QuotdetTableMap::COL_VENDORITEMID, QuotdetTableMap::COL_STATUS, QuotdetTableMap::COL_LOSTREASON, QuotdetTableMap::COL_LOSTDATE, QuotdetTableMap::COL_KITITEMFLAG, QuotdetTableMap::COL_HASNOTES, QuotdetTableMap::COL_VENDDETAIL, QuotdetTableMap::COL_RSHIPDATE, QuotdetTableMap::COL_LEADDAYS, QuotdetTableMap::COL_TAXCODE, QuotdetTableMap::COL_ORDRQTY, QuotdetTableMap::COL_ORDRPRICE, QuotdetTableMap::COL_ORDRCOST, QuotdetTableMap::COL_ORDRTOTALPRICE, QuotdetTableMap::COL_ORDRTOTALCOST, QuotdetTableMap::COL_UOM, QuotdetTableMap::COL_COSTUOM, QuotdetTableMap::COL_WHSE, QuotdetTableMap::COL_LISTPRICE, QuotdetTableMap::COL_STANCOST, QuotdetTableMap::COL_QUOTIND, QuotdetTableMap::COL_QUOTQTY, QuotdetTableMap::COL_QUOTPRICE, QuotdetTableMap::COL_QUOTCOST, QuotdetTableMap::COL_QUOTMKUPMARG, QuotdetTableMap::COL_DISCPCT, QuotdetTableMap::COL_SPCORD, QuotdetTableMap::COL_ERROR, QuotdetTableMap::COL_ERRORMSG, QuotdetTableMap::COL_MINPRICE, QuotdetTableMap::COL_NSITEMGROUP, QuotdetTableMap::COL_SHIPFROMID, QuotdetTableMap::COL_ITEMTYPE, QuotdetTableMap::COL_DUMMY, ),
        self::TYPE_FIELDNAME     => array('sessionid', 'recno', 'date', 'time', 'quotenbr', 'custid', 'linenbr', 'sublinenbr', 'itemid', 'desc1', 'desc2', 'custitemid', 'vendorid', 'vendoritemid', 'status', 'lostreason', 'lostdate', 'kititemflag', 'hasnotes', 'venddetail', 'rshipdate', 'leaddays', 'taxcode', 'ordrqty', 'ordrprice', 'ordrcost', 'ordrtotalprice', 'ordrtotalcost', 'uom', 'costuom', 'whse', 'listprice', 'stancost', 'quotind', 'quotqty', 'quotprice', 'quotcost', 'quotmkupmarg', 'discpct', 'spcord', 'error', 'errormsg', 'minprice', 'nsitemgroup', 'shipfromid', 'itemtype', 'dummy', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sessionid' => 0, 'Recno' => 1, 'Date' => 2, 'Time' => 3, 'Quotenbr' => 4, 'Custid' => 5, 'Linenbr' => 6, 'Sublinenbr' => 7, 'Itemid' => 8, 'Desc1' => 9, 'Desc2' => 10, 'Custitemid' => 11, 'Vendorid' => 12, 'Vendoritemid' => 13, 'Status' => 14, 'Lostreason' => 15, 'Lostdate' => 16, 'Kititemflag' => 17, 'Hasnotes' => 18, 'Venddetail' => 19, 'Rshipdate' => 20, 'Leaddays' => 21, 'Taxcode' => 22, 'Ordrqty' => 23, 'Ordrprice' => 24, 'Ordrcost' => 25, 'Ordrtotalprice' => 26, 'Ordrtotalcost' => 27, 'Uom' => 28, 'Costuom' => 29, 'Whse' => 30, 'Listprice' => 31, 'Stancost' => 32, 'Quotind' => 33, 'Quotqty' => 34, 'Quotprice' => 35, 'Quotcost' => 36, 'Quotmkupmarg' => 37, 'Discpct' => 38, 'Spcord' => 39, 'Error' => 40, 'Errormsg' => 41, 'Minprice' => 42, 'Nsitemgroup' => 43, 'Shipfromid' => 44, 'Itemtype' => 45, 'Dummy' => 46, ),
        self::TYPE_CAMELNAME     => array('sessionid' => 0, 'recno' => 1, 'date' => 2, 'time' => 3, 'quotenbr' => 4, 'custid' => 5, 'linenbr' => 6, 'sublinenbr' => 7, 'itemid' => 8, 'desc1' => 9, 'desc2' => 10, 'custitemid' => 11, 'vendorid' => 12, 'vendoritemid' => 13, 'status' => 14, 'lostreason' => 15, 'lostdate' => 16, 'kititemflag' => 17, 'hasnotes' => 18, 'venddetail' => 19, 'rshipdate' => 20, 'leaddays' => 21, 'taxcode' => 22, 'ordrqty' => 23, 'ordrprice' => 24, 'ordrcost' => 25, 'ordrtotalprice' => 26, 'ordrtotalcost' => 27, 'uom' => 28, 'costuom' => 29, 'whse' => 30, 'listprice' => 31, 'stancost' => 32, 'quotind' => 33, 'quotqty' => 34, 'quotprice' => 35, 'quotcost' => 36, 'quotmkupmarg' => 37, 'discpct' => 38, 'spcord' => 39, 'error' => 40, 'errormsg' => 41, 'minprice' => 42, 'nsitemgroup' => 43, 'shipfromid' => 44, 'itemtype' => 45, 'dummy' => 46, ),
        self::TYPE_COLNAME       => array(QuotdetTableMap::COL_SESSIONID => 0, QuotdetTableMap::COL_RECNO => 1, QuotdetTableMap::COL_DATE => 2, QuotdetTableMap::COL_TIME => 3, QuotdetTableMap::COL_QUOTENBR => 4, QuotdetTableMap::COL_CUSTID => 5, QuotdetTableMap::COL_LINENBR => 6, QuotdetTableMap::COL_SUBLINENBR => 7, QuotdetTableMap::COL_ITEMID => 8, QuotdetTableMap::COL_DESC1 => 9, QuotdetTableMap::COL_DESC2 => 10, QuotdetTableMap::COL_CUSTITEMID => 11, QuotdetTableMap::COL_VENDORID => 12, QuotdetTableMap::COL_VENDORITEMID => 13, QuotdetTableMap::COL_STATUS => 14, QuotdetTableMap::COL_LOSTREASON => 15, QuotdetTableMap::COL_LOSTDATE => 16, QuotdetTableMap::COL_KITITEMFLAG => 17, QuotdetTableMap::COL_HASNOTES => 18, QuotdetTableMap::COL_VENDDETAIL => 19, QuotdetTableMap::COL_RSHIPDATE => 20, QuotdetTableMap::COL_LEADDAYS => 21, QuotdetTableMap::COL_TAXCODE => 22, QuotdetTableMap::COL_ORDRQTY => 23, QuotdetTableMap::COL_ORDRPRICE => 24, QuotdetTableMap::COL_ORDRCOST => 25, QuotdetTableMap::COL_ORDRTOTALPRICE => 26, QuotdetTableMap::COL_ORDRTOTALCOST => 27, QuotdetTableMap::COL_UOM => 28, QuotdetTableMap::COL_COSTUOM => 29, QuotdetTableMap::COL_WHSE => 30, QuotdetTableMap::COL_LISTPRICE => 31, QuotdetTableMap::COL_STANCOST => 32, QuotdetTableMap::COL_QUOTIND => 33, QuotdetTableMap::COL_QUOTQTY => 34, QuotdetTableMap::COL_QUOTPRICE => 35, QuotdetTableMap::COL_QUOTCOST => 36, QuotdetTableMap::COL_QUOTMKUPMARG => 37, QuotdetTableMap::COL_DISCPCT => 38, QuotdetTableMap::COL_SPCORD => 39, QuotdetTableMap::COL_ERROR => 40, QuotdetTableMap::COL_ERRORMSG => 41, QuotdetTableMap::COL_MINPRICE => 42, QuotdetTableMap::COL_NSITEMGROUP => 43, QuotdetTableMap::COL_SHIPFROMID => 44, QuotdetTableMap::COL_ITEMTYPE => 45, QuotdetTableMap::COL_DUMMY => 46, ),
        self::TYPE_FIELDNAME     => array('sessionid' => 0, 'recno' => 1, 'date' => 2, 'time' => 3, 'quotenbr' => 4, 'custid' => 5, 'linenbr' => 6, 'sublinenbr' => 7, 'itemid' => 8, 'desc1' => 9, 'desc2' => 10, 'custitemid' => 11, 'vendorid' => 12, 'vendoritemid' => 13, 'status' => 14, 'lostreason' => 15, 'lostdate' => 16, 'kititemflag' => 17, 'hasnotes' => 18, 'venddetail' => 19, 'rshipdate' => 20, 'leaddays' => 21, 'taxcode' => 22, 'ordrqty' => 23, 'ordrprice' => 24, 'ordrcost' => 25, 'ordrtotalprice' => 26, 'ordrtotalcost' => 27, 'uom' => 28, 'costuom' => 29, 'whse' => 30, 'listprice' => 31, 'stancost' => 32, 'quotind' => 33, 'quotqty' => 34, 'quotprice' => 35, 'quotcost' => 36, 'quotmkupmarg' => 37, 'discpct' => 38, 'spcord' => 39, 'error' => 40, 'errormsg' => 41, 'minprice' => 42, 'nsitemgroup' => 43, 'shipfromid' => 44, 'itemtype' => 45, 'dummy' => 46, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('quotdet');
        $this->setPhpName('Quotdet');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Quotdet');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('sessionid', 'Sessionid', 'VARCHAR', true, 50, null);
        $this->addPrimaryKey('recno', 'Recno', 'INTEGER', true, null, null);
        $this->addColumn('date', 'Date', 'INTEGER', false, 8, null);
        $this->addColumn('time', 'Time', 'INTEGER', false, 8, null);
        $this->addColumn('quotenbr', 'Quotenbr', 'VARCHAR', false, 30, '');
        $this->addColumn('custid', 'Custid', 'VARCHAR', false, 6, '');
        $this->addColumn('linenbr', 'Linenbr', 'VARCHAR', false, 5, '');
        $this->addColumn('sublinenbr', 'Sublinenbr', 'VARCHAR', false, 5, '');
        $this->addColumn('itemid', 'Itemid', 'VARCHAR', false, 30, '');
        $this->addColumn('desc1', 'Desc1', 'VARCHAR', false, 35, '');
        $this->addColumn('desc2', 'Desc2', 'VARCHAR', false, 35, '');
        $this->addColumn('custitemid', 'Custitemid', 'VARCHAR', false, 30, '');
        $this->addColumn('vendorid', 'Vendorid', 'VARCHAR', false, 6, '');
        $this->addColumn('vendoritemid', 'Vendoritemid', 'VARCHAR', false, 30, '');
        $this->addColumn('status', 'Status', 'VARCHAR', false, 1, '');
        $this->addColumn('lostreason', 'Lostreason', 'VARCHAR', false, 4, '');
        $this->addColumn('lostdate', 'Lostdate', 'VARCHAR', false, 10, '');
        $this->addColumn('kititemflag', 'Kititemflag', 'VARCHAR', false, 1, '');
        $this->addColumn('hasnotes', 'Hasnotes', 'VARCHAR', false, 1, '');
        $this->addColumn('venddetail', 'Venddetail', 'VARCHAR', false, 1, '');
        $this->addColumn('rshipdate', 'Rshipdate', 'VARCHAR', false, 10, '');
        $this->addColumn('leaddays', 'Leaddays', 'INTEGER', false, 4, 0);
        $this->addColumn('taxcode', 'Taxcode', 'VARCHAR', false, 6, '');
        $this->addColumn('ordrqty', 'Ordrqty', 'VARCHAR', false, 20, '');
        $this->addColumn('ordrprice', 'Ordrprice', 'VARCHAR', false, 20, '');
        $this->addColumn('ordrcost', 'Ordrcost', 'VARCHAR', false, 20, '');
        $this->addColumn('ordrtotalprice', 'Ordrtotalprice', 'VARCHAR', false, 20, '');
        $this->addColumn('ordrtotalcost', 'Ordrtotalcost', 'VARCHAR', false, 20, '');
        $this->addColumn('uom', 'Uom', 'VARCHAR', false, 4, '');
        $this->addColumn('costuom', 'Costuom', 'VARCHAR', false, 4, '');
        $this->addColumn('whse', 'Whse', 'VARCHAR', false, 2, '');
        $this->addColumn('listprice', 'Listprice', 'VARCHAR', false, 20, '');
        $this->addColumn('stancost', 'Stancost', 'VARCHAR', false, 20, '');
        $this->addColumn('quotind', 'Quotind', 'VARCHAR', false, 1, '');
        $this->addColumn('quotqty', 'Quotqty', 'INTEGER', false, 9, 0);
        $this->addColumn('quotprice', 'Quotprice', 'VARCHAR', false, 20, '');
        $this->addColumn('quotcost', 'Quotcost', 'VARCHAR', false, 20, '');
        $this->addColumn('quotmkupmarg', 'Quotmkupmarg', 'VARCHAR', false, 20, '');
        $this->addColumn('discpct', 'Discpct', 'VARCHAR', false, 20, '');
        $this->addColumn('spcord', 'Spcord', 'VARCHAR', false, 1, '');
        $this->addColumn('error', 'Error', 'VARCHAR', false, 1, '');
        $this->addColumn('errormsg', 'Errormsg', 'VARCHAR', false, 50, '');
        $this->addColumn('minprice', 'Minprice', 'VARCHAR', false, 20, '');
        $this->addColumn('nsitemgroup', 'Nsitemgroup', 'VARCHAR', false, 4, '');
        $this->addColumn('shipfromid', 'Shipfromid', 'VARCHAR', false, 6, '');
        $this->addColumn('itemtype', 'Itemtype', 'VARCHAR', false, 1, '');
        $this->addColumn('dummy', 'Dummy', 'VARCHAR', false, 1, 'x');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database. In some cases you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by find*()
     * and findPk*() calls.
     *
     * @param \Quotdet $obj A \Quotdet object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
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
     * @param mixed $value A \Quotdet object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Quotdet) {
                $key = serialize([(null === $value->getSessionid() || is_scalar($value->getSessionid()) || is_callable([$value->getSessionid(), '__toString']) ? (string) $value->getSessionid() : $value->getSessionid()), (null === $value->getRecno() || is_scalar($value->getRecno()) || is_callable([$value->getRecno(), '__toString']) ? (string) $value->getRecno() : $value->getRecno())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Quotdet object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
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
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
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
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? QuotdetTableMap::CLASS_DEFAULT : QuotdetTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Quotdet object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = QuotdetTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = QuotdetTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + QuotdetTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = QuotdetTableMap::OM_CLASS;
            /** @var Quotdet $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            QuotdetTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = QuotdetTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = QuotdetTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Quotdet $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                QuotdetTableMap::addInstanceToPool($obj, $key);
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
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(QuotdetTableMap::COL_SESSIONID);
            $criteria->addSelectColumn(QuotdetTableMap::COL_RECNO);
            $criteria->addSelectColumn(QuotdetTableMap::COL_DATE);
            $criteria->addSelectColumn(QuotdetTableMap::COL_TIME);
            $criteria->addSelectColumn(QuotdetTableMap::COL_QUOTENBR);
            $criteria->addSelectColumn(QuotdetTableMap::COL_CUSTID);
            $criteria->addSelectColumn(QuotdetTableMap::COL_LINENBR);
            $criteria->addSelectColumn(QuotdetTableMap::COL_SUBLINENBR);
            $criteria->addSelectColumn(QuotdetTableMap::COL_ITEMID);
            $criteria->addSelectColumn(QuotdetTableMap::COL_DESC1);
            $criteria->addSelectColumn(QuotdetTableMap::COL_DESC2);
            $criteria->addSelectColumn(QuotdetTableMap::COL_CUSTITEMID);
            $criteria->addSelectColumn(QuotdetTableMap::COL_VENDORID);
            $criteria->addSelectColumn(QuotdetTableMap::COL_VENDORITEMID);
            $criteria->addSelectColumn(QuotdetTableMap::COL_STATUS);
            $criteria->addSelectColumn(QuotdetTableMap::COL_LOSTREASON);
            $criteria->addSelectColumn(QuotdetTableMap::COL_LOSTDATE);
            $criteria->addSelectColumn(QuotdetTableMap::COL_KITITEMFLAG);
            $criteria->addSelectColumn(QuotdetTableMap::COL_HASNOTES);
            $criteria->addSelectColumn(QuotdetTableMap::COL_VENDDETAIL);
            $criteria->addSelectColumn(QuotdetTableMap::COL_RSHIPDATE);
            $criteria->addSelectColumn(QuotdetTableMap::COL_LEADDAYS);
            $criteria->addSelectColumn(QuotdetTableMap::COL_TAXCODE);
            $criteria->addSelectColumn(QuotdetTableMap::COL_ORDRQTY);
            $criteria->addSelectColumn(QuotdetTableMap::COL_ORDRPRICE);
            $criteria->addSelectColumn(QuotdetTableMap::COL_ORDRCOST);
            $criteria->addSelectColumn(QuotdetTableMap::COL_ORDRTOTALPRICE);
            $criteria->addSelectColumn(QuotdetTableMap::COL_ORDRTOTALCOST);
            $criteria->addSelectColumn(QuotdetTableMap::COL_UOM);
            $criteria->addSelectColumn(QuotdetTableMap::COL_COSTUOM);
            $criteria->addSelectColumn(QuotdetTableMap::COL_WHSE);
            $criteria->addSelectColumn(QuotdetTableMap::COL_LISTPRICE);
            $criteria->addSelectColumn(QuotdetTableMap::COL_STANCOST);
            $criteria->addSelectColumn(QuotdetTableMap::COL_QUOTIND);
            $criteria->addSelectColumn(QuotdetTableMap::COL_QUOTQTY);
            $criteria->addSelectColumn(QuotdetTableMap::COL_QUOTPRICE);
            $criteria->addSelectColumn(QuotdetTableMap::COL_QUOTCOST);
            $criteria->addSelectColumn(QuotdetTableMap::COL_QUOTMKUPMARG);
            $criteria->addSelectColumn(QuotdetTableMap::COL_DISCPCT);
            $criteria->addSelectColumn(QuotdetTableMap::COL_SPCORD);
            $criteria->addSelectColumn(QuotdetTableMap::COL_ERROR);
            $criteria->addSelectColumn(QuotdetTableMap::COL_ERRORMSG);
            $criteria->addSelectColumn(QuotdetTableMap::COL_MINPRICE);
            $criteria->addSelectColumn(QuotdetTableMap::COL_NSITEMGROUP);
            $criteria->addSelectColumn(QuotdetTableMap::COL_SHIPFROMID);
            $criteria->addSelectColumn(QuotdetTableMap::COL_ITEMTYPE);
            $criteria->addSelectColumn(QuotdetTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.sessionid');
            $criteria->addSelectColumn($alias . '.recno');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.time');
            $criteria->addSelectColumn($alias . '.quotenbr');
            $criteria->addSelectColumn($alias . '.custid');
            $criteria->addSelectColumn($alias . '.linenbr');
            $criteria->addSelectColumn($alias . '.sublinenbr');
            $criteria->addSelectColumn($alias . '.itemid');
            $criteria->addSelectColumn($alias . '.desc1');
            $criteria->addSelectColumn($alias . '.desc2');
            $criteria->addSelectColumn($alias . '.custitemid');
            $criteria->addSelectColumn($alias . '.vendorid');
            $criteria->addSelectColumn($alias . '.vendoritemid');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.lostreason');
            $criteria->addSelectColumn($alias . '.lostdate');
            $criteria->addSelectColumn($alias . '.kititemflag');
            $criteria->addSelectColumn($alias . '.hasnotes');
            $criteria->addSelectColumn($alias . '.venddetail');
            $criteria->addSelectColumn($alias . '.rshipdate');
            $criteria->addSelectColumn($alias . '.leaddays');
            $criteria->addSelectColumn($alias . '.taxcode');
            $criteria->addSelectColumn($alias . '.ordrqty');
            $criteria->addSelectColumn($alias . '.ordrprice');
            $criteria->addSelectColumn($alias . '.ordrcost');
            $criteria->addSelectColumn($alias . '.ordrtotalprice');
            $criteria->addSelectColumn($alias . '.ordrtotalcost');
            $criteria->addSelectColumn($alias . '.uom');
            $criteria->addSelectColumn($alias . '.costuom');
            $criteria->addSelectColumn($alias . '.whse');
            $criteria->addSelectColumn($alias . '.listprice');
            $criteria->addSelectColumn($alias . '.stancost');
            $criteria->addSelectColumn($alias . '.quotind');
            $criteria->addSelectColumn($alias . '.quotqty');
            $criteria->addSelectColumn($alias . '.quotprice');
            $criteria->addSelectColumn($alias . '.quotcost');
            $criteria->addSelectColumn($alias . '.quotmkupmarg');
            $criteria->addSelectColumn($alias . '.discpct');
            $criteria->addSelectColumn($alias . '.spcord');
            $criteria->addSelectColumn($alias . '.error');
            $criteria->addSelectColumn($alias . '.errormsg');
            $criteria->addSelectColumn($alias . '.minprice');
            $criteria->addSelectColumn($alias . '.nsitemgroup');
            $criteria->addSelectColumn($alias . '.shipfromid');
            $criteria->addSelectColumn($alias . '.itemtype');
            $criteria->addSelectColumn($alias . '.dummy');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(QuotdetTableMap::DATABASE_NAME)->getTable(QuotdetTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(QuotdetTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(QuotdetTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new QuotdetTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Quotdet or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Quotdet object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(QuotdetTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Quotdet) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(QuotdetTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(QuotdetTableMap::COL_SESSIONID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(QuotdetTableMap::COL_RECNO, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = QuotdetQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            QuotdetTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                QuotdetTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the quotdet table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return QuotdetQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Quotdet or Criteria object.
     *
     * @param mixed               $criteria Criteria or Quotdet object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(QuotdetTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Quotdet object
        }


        // Set the correct dbName
        $query = QuotdetQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // QuotdetTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
QuotdetTableMap::buildTableMap();
