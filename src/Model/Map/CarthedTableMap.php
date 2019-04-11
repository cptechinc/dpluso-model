<?php

namespace Map;

use \Carthed;
use \CarthedQuery;
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
 * This class defines the structure of the 'carthed' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class CarthedTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.CarthedTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'carthed';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Carthed';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Carthed';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 58;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 58;

    /**
     * the column name for the sessionid field
     */
    const COL_SESSIONID = 'carthed.sessionid';

    /**
     * the column name for the recno field
     */
    const COL_RECNO = 'carthed.recno';

    /**
     * the column name for the date field
     */
    const COL_DATE = 'carthed.date';

    /**
     * the column name for the time field
     */
    const COL_TIME = 'carthed.time';

    /**
     * the column name for the custid field
     */
    const COL_CUSTID = 'carthed.custid';

    /**
     * the column name for the shiptoid field
     */
    const COL_SHIPTOID = 'carthed.shiptoid';

    /**
     * the column name for the custname field
     */
    const COL_CUSTNAME = 'carthed.custname';

    /**
     * the column name for the orderno field
     */
    const COL_ORDERNO = 'carthed.orderno';

    /**
     * the column name for the custpo field
     */
    const COL_CUSTPO = 'carthed.custpo';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'carthed.status';

    /**
     * the column name for the orderdate field
     */
    const COL_ORDERDATE = 'carthed.orderdate';

    /**
     * the column name for the invdate field
     */
    const COL_INVDATE = 'carthed.invdate';

    /**
     * the column name for the shipdate field
     */
    const COL_SHIPDATE = 'carthed.shipdate';

    /**
     * the column name for the hasdocuments field
     */
    const COL_HASDOCUMENTS = 'carthed.hasdocuments';

    /**
     * the column name for the hastracking field
     */
    const COL_HASTRACKING = 'carthed.hastracking';

    /**
     * the column name for the subtotal field
     */
    const COL_SUBTOTAL = 'carthed.subtotal';

    /**
     * the column name for the salestax field
     */
    const COL_SALESTAX = 'carthed.salestax';

    /**
     * the column name for the freight field
     */
    const COL_FREIGHT = 'carthed.freight';

    /**
     * the column name for the misccost field
     */
    const COL_MISCCOST = 'carthed.misccost';

    /**
     * the column name for the ordertotal field
     */
    const COL_ORDERTOTAL = 'carthed.ordertotal';

    /**
     * the column name for the hasnotes field
     */
    const COL_HASNOTES = 'carthed.hasnotes';

    /**
     * the column name for the editord field
     */
    const COL_EDITORD = 'carthed.editord';

    /**
     * the column name for the error field
     */
    const COL_ERROR = 'carthed.error';

    /**
     * the column name for the errormsg field
     */
    const COL_ERRORMSG = 'carthed.errormsg';

    /**
     * the column name for the sconame field
     */
    const COL_SCONAME = 'carthed.sconame';

    /**
     * the column name for the shipname field
     */
    const COL_SHIPNAME = 'carthed.shipname';

    /**
     * the column name for the shipaddress field
     */
    const COL_SHIPADDRESS = 'carthed.shipaddress';

    /**
     * the column name for the shipaddress2 field
     */
    const COL_SHIPADDRESS2 = 'carthed.shipaddress2';

    /**
     * the column name for the shipcity field
     */
    const COL_SHIPCITY = 'carthed.shipcity';

    /**
     * the column name for the shipstate field
     */
    const COL_SHIPSTATE = 'carthed.shipstate';

    /**
     * the column name for the shipzip field
     */
    const COL_SHIPZIP = 'carthed.shipzip';

    /**
     * the column name for the shipcountry field
     */
    const COL_SHIPCOUNTRY = 'carthed.shipcountry';

    /**
     * the column name for the contact field
     */
    const COL_CONTACT = 'carthed.contact';

    /**
     * the column name for the phintl field
     */
    const COL_PHINTL = 'carthed.phintl';

    /**
     * the column name for the phone field
     */
    const COL_PHONE = 'carthed.phone';

    /**
     * the column name for the extension field
     */
    const COL_EXTENSION = 'carthed.extension';

    /**
     * the column name for the faxnbr field
     */
    const COL_FAXNBR = 'carthed.faxnbr';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'carthed.email';

    /**
     * the column name for the releasenbr field
     */
    const COL_RELEASENBR = 'carthed.releasenbr';

    /**
     * the column name for the shipviacd field
     */
    const COL_SHIPVIACD = 'carthed.shipviacd';

    /**
     * the column name for the shipviadesc field
     */
    const COL_SHIPVIADESC = 'carthed.shipviadesc';

    /**
     * the column name for the termcode field
     */
    const COL_TERMCODE = 'carthed.termcode';

    /**
     * the column name for the termtype field
     */
    const COL_TERMTYPE = 'carthed.termtype';

    /**
     * the column name for the termdesc field
     */
    const COL_TERMDESC = 'carthed.termdesc';

    /**
     * the column name for the rqstdate field
     */
    const COL_RQSTDATE = 'carthed.rqstdate';

    /**
     * the column name for the shipcom field
     */
    const COL_SHIPCOM = 'carthed.shipcom';

    /**
     * the column name for the sp1 field
     */
    const COL_SP1 = 'carthed.sp1';

    /**
     * the column name for the sp1name field
     */
    const COL_SP1NAME = 'carthed.sp1name';

    /**
     * the column name for the cardnumber field
     */
    const COL_CARDNUMBER = 'carthed.cardnumber';

    /**
     * the column name for the cardexpire field
     */
    const COL_CARDEXPIRE = 'carthed.cardexpire';

    /**
     * the column name for the cardcode field
     */
    const COL_CARDCODE = 'carthed.cardcode';

    /**
     * the column name for the cardapproval field
     */
    const COL_CARDAPPROVAL = 'carthed.cardapproval';

    /**
     * the column name for the totalcost field
     */
    const COL_TOTALCOST = 'carthed.totalcost';

    /**
     * the column name for the totaldiscount field
     */
    const COL_TOTALDISCOUNT = 'carthed.totaldiscount';

    /**
     * the column name for the paymenttype field
     */
    const COL_PAYMENTTYPE = 'carthed.paymenttype';

    /**
     * the column name for the srcdatefrom field
     */
    const COL_SRCDATEFROM = 'carthed.srcdatefrom';

    /**
     * the column name for the srcdatethru field
     */
    const COL_SRCDATETHRU = 'carthed.srcdatethru';

    /**
     * the column name for the dummy field
     */
    const COL_DUMMY = 'carthed.dummy';

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
        self::TYPE_PHPNAME       => array('Sessionid', 'Recno', 'Date', 'Time', 'Custid', 'Shiptoid', 'Custname', 'Orderno', 'Custpo', 'Status', 'Orderdate', 'Invdate', 'Shipdate', 'Hasdocuments', 'Hastracking', 'Subtotal', 'Salestax', 'Freight', 'Misccost', 'Ordertotal', 'Hasnotes', 'Editord', 'Error', 'Errormsg', 'Sconame', 'Shipname', 'Shipaddress', 'Shipaddress2', 'Shipcity', 'Shipstate', 'Shipzip', 'Shipcountry', 'Contact', 'Phintl', 'Phone', 'Extension', 'Faxnbr', 'Email', 'Releasenbr', 'Shipviacd', 'Shipviadesc', 'Termcode', 'Termtype', 'Termdesc', 'Rqstdate', 'Shipcom', 'Sp1', 'Sp1name', 'Cardnumber', 'Cardexpire', 'Cardcode', 'Cardapproval', 'Totalcost', 'Totaldiscount', 'Paymenttype', 'Srcdatefrom', 'Srcdatethru', 'Dummy', ),
        self::TYPE_CAMELNAME     => array('sessionid', 'recno', 'date', 'time', 'custid', 'shiptoid', 'custname', 'orderno', 'custpo', 'status', 'orderdate', 'invdate', 'shipdate', 'hasdocuments', 'hastracking', 'subtotal', 'salestax', 'freight', 'misccost', 'ordertotal', 'hasnotes', 'editord', 'error', 'errormsg', 'sconame', 'shipname', 'shipaddress', 'shipaddress2', 'shipcity', 'shipstate', 'shipzip', 'shipcountry', 'contact', 'phintl', 'phone', 'extension', 'faxnbr', 'email', 'releasenbr', 'shipviacd', 'shipviadesc', 'termcode', 'termtype', 'termdesc', 'rqstdate', 'shipcom', 'sp1', 'sp1name', 'cardnumber', 'cardexpire', 'cardcode', 'cardapproval', 'totalcost', 'totaldiscount', 'paymenttype', 'srcdatefrom', 'srcdatethru', 'dummy', ),
        self::TYPE_COLNAME       => array(CarthedTableMap::COL_SESSIONID, CarthedTableMap::COL_RECNO, CarthedTableMap::COL_DATE, CarthedTableMap::COL_TIME, CarthedTableMap::COL_CUSTID, CarthedTableMap::COL_SHIPTOID, CarthedTableMap::COL_CUSTNAME, CarthedTableMap::COL_ORDERNO, CarthedTableMap::COL_CUSTPO, CarthedTableMap::COL_STATUS, CarthedTableMap::COL_ORDERDATE, CarthedTableMap::COL_INVDATE, CarthedTableMap::COL_SHIPDATE, CarthedTableMap::COL_HASDOCUMENTS, CarthedTableMap::COL_HASTRACKING, CarthedTableMap::COL_SUBTOTAL, CarthedTableMap::COL_SALESTAX, CarthedTableMap::COL_FREIGHT, CarthedTableMap::COL_MISCCOST, CarthedTableMap::COL_ORDERTOTAL, CarthedTableMap::COL_HASNOTES, CarthedTableMap::COL_EDITORD, CarthedTableMap::COL_ERROR, CarthedTableMap::COL_ERRORMSG, CarthedTableMap::COL_SCONAME, CarthedTableMap::COL_SHIPNAME, CarthedTableMap::COL_SHIPADDRESS, CarthedTableMap::COL_SHIPADDRESS2, CarthedTableMap::COL_SHIPCITY, CarthedTableMap::COL_SHIPSTATE, CarthedTableMap::COL_SHIPZIP, CarthedTableMap::COL_SHIPCOUNTRY, CarthedTableMap::COL_CONTACT, CarthedTableMap::COL_PHINTL, CarthedTableMap::COL_PHONE, CarthedTableMap::COL_EXTENSION, CarthedTableMap::COL_FAXNBR, CarthedTableMap::COL_EMAIL, CarthedTableMap::COL_RELEASENBR, CarthedTableMap::COL_SHIPVIACD, CarthedTableMap::COL_SHIPVIADESC, CarthedTableMap::COL_TERMCODE, CarthedTableMap::COL_TERMTYPE, CarthedTableMap::COL_TERMDESC, CarthedTableMap::COL_RQSTDATE, CarthedTableMap::COL_SHIPCOM, CarthedTableMap::COL_SP1, CarthedTableMap::COL_SP1NAME, CarthedTableMap::COL_CARDNUMBER, CarthedTableMap::COL_CARDEXPIRE, CarthedTableMap::COL_CARDCODE, CarthedTableMap::COL_CARDAPPROVAL, CarthedTableMap::COL_TOTALCOST, CarthedTableMap::COL_TOTALDISCOUNT, CarthedTableMap::COL_PAYMENTTYPE, CarthedTableMap::COL_SRCDATEFROM, CarthedTableMap::COL_SRCDATETHRU, CarthedTableMap::COL_DUMMY, ),
        self::TYPE_FIELDNAME     => array('sessionid', 'recno', 'date', 'time', 'custid', 'shiptoid', 'custname', 'orderno', 'custpo', 'status', 'orderdate', 'invdate', 'shipdate', 'hasdocuments', 'hastracking', 'subtotal', 'salestax', 'freight', 'misccost', 'ordertotal', 'hasnotes', 'editord', 'error', 'errormsg', 'sconame', 'shipname', 'shipaddress', 'shipaddress2', 'shipcity', 'shipstate', 'shipzip', 'shipcountry', 'contact', 'phintl', 'phone', 'extension', 'faxnbr', 'email', 'releasenbr', 'shipviacd', 'shipviadesc', 'termcode', 'termtype', 'termdesc', 'rqstdate', 'shipcom', 'sp1', 'sp1name', 'cardnumber', 'cardexpire', 'cardcode', 'cardapproval', 'totalcost', 'totaldiscount', 'paymenttype', 'srcdatefrom', 'srcdatethru', 'dummy', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sessionid' => 0, 'Recno' => 1, 'Date' => 2, 'Time' => 3, 'Custid' => 4, 'Shiptoid' => 5, 'Custname' => 6, 'Orderno' => 7, 'Custpo' => 8, 'Status' => 9, 'Orderdate' => 10, 'Invdate' => 11, 'Shipdate' => 12, 'Hasdocuments' => 13, 'Hastracking' => 14, 'Subtotal' => 15, 'Salestax' => 16, 'Freight' => 17, 'Misccost' => 18, 'Ordertotal' => 19, 'Hasnotes' => 20, 'Editord' => 21, 'Error' => 22, 'Errormsg' => 23, 'Sconame' => 24, 'Shipname' => 25, 'Shipaddress' => 26, 'Shipaddress2' => 27, 'Shipcity' => 28, 'Shipstate' => 29, 'Shipzip' => 30, 'Shipcountry' => 31, 'Contact' => 32, 'Phintl' => 33, 'Phone' => 34, 'Extension' => 35, 'Faxnbr' => 36, 'Email' => 37, 'Releasenbr' => 38, 'Shipviacd' => 39, 'Shipviadesc' => 40, 'Termcode' => 41, 'Termtype' => 42, 'Termdesc' => 43, 'Rqstdate' => 44, 'Shipcom' => 45, 'Sp1' => 46, 'Sp1name' => 47, 'Cardnumber' => 48, 'Cardexpire' => 49, 'Cardcode' => 50, 'Cardapproval' => 51, 'Totalcost' => 52, 'Totaldiscount' => 53, 'Paymenttype' => 54, 'Srcdatefrom' => 55, 'Srcdatethru' => 56, 'Dummy' => 57, ),
        self::TYPE_CAMELNAME     => array('sessionid' => 0, 'recno' => 1, 'date' => 2, 'time' => 3, 'custid' => 4, 'shiptoid' => 5, 'custname' => 6, 'orderno' => 7, 'custpo' => 8, 'status' => 9, 'orderdate' => 10, 'invdate' => 11, 'shipdate' => 12, 'hasdocuments' => 13, 'hastracking' => 14, 'subtotal' => 15, 'salestax' => 16, 'freight' => 17, 'misccost' => 18, 'ordertotal' => 19, 'hasnotes' => 20, 'editord' => 21, 'error' => 22, 'errormsg' => 23, 'sconame' => 24, 'shipname' => 25, 'shipaddress' => 26, 'shipaddress2' => 27, 'shipcity' => 28, 'shipstate' => 29, 'shipzip' => 30, 'shipcountry' => 31, 'contact' => 32, 'phintl' => 33, 'phone' => 34, 'extension' => 35, 'faxnbr' => 36, 'email' => 37, 'releasenbr' => 38, 'shipviacd' => 39, 'shipviadesc' => 40, 'termcode' => 41, 'termtype' => 42, 'termdesc' => 43, 'rqstdate' => 44, 'shipcom' => 45, 'sp1' => 46, 'sp1name' => 47, 'cardnumber' => 48, 'cardexpire' => 49, 'cardcode' => 50, 'cardapproval' => 51, 'totalcost' => 52, 'totaldiscount' => 53, 'paymenttype' => 54, 'srcdatefrom' => 55, 'srcdatethru' => 56, 'dummy' => 57, ),
        self::TYPE_COLNAME       => array(CarthedTableMap::COL_SESSIONID => 0, CarthedTableMap::COL_RECNO => 1, CarthedTableMap::COL_DATE => 2, CarthedTableMap::COL_TIME => 3, CarthedTableMap::COL_CUSTID => 4, CarthedTableMap::COL_SHIPTOID => 5, CarthedTableMap::COL_CUSTNAME => 6, CarthedTableMap::COL_ORDERNO => 7, CarthedTableMap::COL_CUSTPO => 8, CarthedTableMap::COL_STATUS => 9, CarthedTableMap::COL_ORDERDATE => 10, CarthedTableMap::COL_INVDATE => 11, CarthedTableMap::COL_SHIPDATE => 12, CarthedTableMap::COL_HASDOCUMENTS => 13, CarthedTableMap::COL_HASTRACKING => 14, CarthedTableMap::COL_SUBTOTAL => 15, CarthedTableMap::COL_SALESTAX => 16, CarthedTableMap::COL_FREIGHT => 17, CarthedTableMap::COL_MISCCOST => 18, CarthedTableMap::COL_ORDERTOTAL => 19, CarthedTableMap::COL_HASNOTES => 20, CarthedTableMap::COL_EDITORD => 21, CarthedTableMap::COL_ERROR => 22, CarthedTableMap::COL_ERRORMSG => 23, CarthedTableMap::COL_SCONAME => 24, CarthedTableMap::COL_SHIPNAME => 25, CarthedTableMap::COL_SHIPADDRESS => 26, CarthedTableMap::COL_SHIPADDRESS2 => 27, CarthedTableMap::COL_SHIPCITY => 28, CarthedTableMap::COL_SHIPSTATE => 29, CarthedTableMap::COL_SHIPZIP => 30, CarthedTableMap::COL_SHIPCOUNTRY => 31, CarthedTableMap::COL_CONTACT => 32, CarthedTableMap::COL_PHINTL => 33, CarthedTableMap::COL_PHONE => 34, CarthedTableMap::COL_EXTENSION => 35, CarthedTableMap::COL_FAXNBR => 36, CarthedTableMap::COL_EMAIL => 37, CarthedTableMap::COL_RELEASENBR => 38, CarthedTableMap::COL_SHIPVIACD => 39, CarthedTableMap::COL_SHIPVIADESC => 40, CarthedTableMap::COL_TERMCODE => 41, CarthedTableMap::COL_TERMTYPE => 42, CarthedTableMap::COL_TERMDESC => 43, CarthedTableMap::COL_RQSTDATE => 44, CarthedTableMap::COL_SHIPCOM => 45, CarthedTableMap::COL_SP1 => 46, CarthedTableMap::COL_SP1NAME => 47, CarthedTableMap::COL_CARDNUMBER => 48, CarthedTableMap::COL_CARDEXPIRE => 49, CarthedTableMap::COL_CARDCODE => 50, CarthedTableMap::COL_CARDAPPROVAL => 51, CarthedTableMap::COL_TOTALCOST => 52, CarthedTableMap::COL_TOTALDISCOUNT => 53, CarthedTableMap::COL_PAYMENTTYPE => 54, CarthedTableMap::COL_SRCDATEFROM => 55, CarthedTableMap::COL_SRCDATETHRU => 56, CarthedTableMap::COL_DUMMY => 57, ),
        self::TYPE_FIELDNAME     => array('sessionid' => 0, 'recno' => 1, 'date' => 2, 'time' => 3, 'custid' => 4, 'shiptoid' => 5, 'custname' => 6, 'orderno' => 7, 'custpo' => 8, 'status' => 9, 'orderdate' => 10, 'invdate' => 11, 'shipdate' => 12, 'hasdocuments' => 13, 'hastracking' => 14, 'subtotal' => 15, 'salestax' => 16, 'freight' => 17, 'misccost' => 18, 'ordertotal' => 19, 'hasnotes' => 20, 'editord' => 21, 'error' => 22, 'errormsg' => 23, 'sconame' => 24, 'shipname' => 25, 'shipaddress' => 26, 'shipaddress2' => 27, 'shipcity' => 28, 'shipstate' => 29, 'shipzip' => 30, 'shipcountry' => 31, 'contact' => 32, 'phintl' => 33, 'phone' => 34, 'extension' => 35, 'faxnbr' => 36, 'email' => 37, 'releasenbr' => 38, 'shipviacd' => 39, 'shipviadesc' => 40, 'termcode' => 41, 'termtype' => 42, 'termdesc' => 43, 'rqstdate' => 44, 'shipcom' => 45, 'sp1' => 46, 'sp1name' => 47, 'cardnumber' => 48, 'cardexpire' => 49, 'cardcode' => 50, 'cardapproval' => 51, 'totalcost' => 52, 'totaldiscount' => 53, 'paymenttype' => 54, 'srcdatefrom' => 55, 'srcdatethru' => 56, 'dummy' => 57, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, )
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
        $this->setName('carthed');
        $this->setPhpName('Carthed');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Carthed');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('sessionid', 'Sessionid', 'VARCHAR', true, 50, null);
        $this->addPrimaryKey('recno', 'Recno', 'INTEGER', true, null, null);
        $this->addColumn('date', 'Date', 'INTEGER', false, 8, null);
        $this->addColumn('time', 'Time', 'INTEGER', false, 8, null);
        $this->addColumn('custid', 'Custid', 'VARCHAR', false, 6, '');
        $this->addColumn('shiptoid', 'Shiptoid', 'VARCHAR', false, 6, '');
        $this->addColumn('custname', 'Custname', 'VARCHAR', false, 30, '');
        $this->addColumn('orderno', 'Orderno', 'VARCHAR', false, 50, '');
        $this->addColumn('custpo', 'Custpo', 'VARCHAR', false, 20, '');
        $this->addColumn('status', 'Status', 'VARCHAR', false, 10, '');
        $this->addColumn('orderdate', 'Orderdate', 'VARCHAR', false, 10, '');
        $this->addColumn('invdate', 'Invdate', 'VARCHAR', false, 10, '');
        $this->addColumn('shipdate', 'Shipdate', 'VARCHAR', false, 10, '');
        $this->addColumn('hasdocuments', 'Hasdocuments', 'VARCHAR', false, 1, '');
        $this->addColumn('hastracking', 'Hastracking', 'VARCHAR', false, 1, '');
        $this->addColumn('subtotal', 'Subtotal', 'VARCHAR', false, 20, '');
        $this->addColumn('salestax', 'Salestax', 'VARCHAR', false, 20, '');
        $this->addColumn('freight', 'Freight', 'VARCHAR', false, 20, '');
        $this->addColumn('misccost', 'Misccost', 'VARCHAR', false, 20, '');
        $this->addColumn('ordertotal', 'Ordertotal', 'VARCHAR', false, 20, '');
        $this->addColumn('hasnotes', 'Hasnotes', 'VARCHAR', false, 1, '');
        $this->addColumn('editord', 'Editord', 'VARCHAR', false, 1, '');
        $this->addColumn('error', 'Error', 'VARCHAR', false, 30, '');
        $this->addColumn('errormsg', 'Errormsg', 'VARCHAR', false, 100, '');
        $this->addColumn('sconame', 'Sconame', 'VARCHAR', false, 30, '');
        $this->addColumn('shipname', 'Shipname', 'VARCHAR', false, 30, '');
        $this->addColumn('shipaddress', 'Shipaddress', 'VARCHAR', false, 30, '');
        $this->addColumn('shipaddress2', 'Shipaddress2', 'VARCHAR', false, 30, '');
        $this->addColumn('shipcity', 'Shipcity', 'VARCHAR', false, 30, '');
        $this->addColumn('shipstate', 'Shipstate', 'VARCHAR', false, 30, '');
        $this->addColumn('shipzip', 'Shipzip', 'VARCHAR', false, 30, '');
        $this->addColumn('shipcountry', 'Shipcountry', 'VARCHAR', false, 30, '');
        $this->addColumn('contact', 'Contact', 'VARCHAR', false, 20, '');
        $this->addColumn('phintl', 'Phintl', 'VARCHAR', false, 1, '');
        $this->addColumn('phone', 'Phone', 'VARCHAR', false, 25, '');
        $this->addColumn('extension', 'Extension', 'VARCHAR', false, 7, '');
        $this->addColumn('faxnbr', 'Faxnbr', 'VARCHAR', false, 25, '');
        $this->addColumn('email', 'Email', 'VARCHAR', false, 50, '');
        $this->addColumn('releasenbr', 'Releasenbr', 'VARCHAR', false, 20, '');
        $this->addColumn('shipviacd', 'Shipviacd', 'VARCHAR', false, 4, '');
        $this->addColumn('shipviadesc', 'Shipviadesc', 'VARCHAR', false, 20, '');
        $this->addColumn('termcode', 'Termcode', 'VARCHAR', false, 4, '');
        $this->addColumn('termtype', 'Termtype', 'VARCHAR', false, 4, '');
        $this->addColumn('termdesc', 'Termdesc', 'VARCHAR', false, 20, '');
        $this->addColumn('rqstdate', 'Rqstdate', 'VARCHAR', false, 10, '');
        $this->addColumn('shipcom', 'Shipcom', 'CHAR', false, null, '');
        $this->addColumn('sp1', 'Sp1', 'CHAR', false, 6, '');
        $this->addColumn('sp1name', 'Sp1name', 'CHAR', false, 20, '');
        $this->addColumn('cardnumber', 'Cardnumber', 'VARCHAR', false, 20, '');
        $this->addColumn('cardexpire', 'Cardexpire', 'VARCHAR', false, 10, '');
        $this->addColumn('cardcode', 'Cardcode', 'VARCHAR', false, 4, '');
        $this->addColumn('cardapproval', 'Cardapproval', 'VARCHAR', false, 4, '');
        $this->addColumn('totalcost', 'Totalcost', 'VARCHAR', false, 20, '');
        $this->addColumn('totaldiscount', 'Totaldiscount', 'VARCHAR', false, 20, '');
        $this->addColumn('paymenttype', 'Paymenttype', 'VARCHAR', false, 4, '');
        $this->addColumn('srcdatefrom', 'Srcdatefrom', 'VARCHAR', false, 10, '');
        $this->addColumn('srcdatethru', 'Srcdatethru', 'VARCHAR', false, 10, '');
        $this->addColumn('dummy', 'Dummy', 'VARCHAR', false, 1, '');
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
     * @param \Carthed $obj A \Carthed object.
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
     * @param mixed $value A \Carthed object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Carthed) {
                $key = serialize([(null === $value->getSessionid() || is_scalar($value->getSessionid()) || is_callable([$value->getSessionid(), '__toString']) ? (string) $value->getSessionid() : $value->getSessionid()), (null === $value->getRecno() || is_scalar($value->getRecno()) || is_callable([$value->getRecno(), '__toString']) ? (string) $value->getRecno() : $value->getRecno())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Carthed object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        return $withPrefix ? CarthedTableMap::CLASS_DEFAULT : CarthedTableMap::OM_CLASS;
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
     * @return array           (Carthed object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = CarthedTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CarthedTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CarthedTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CarthedTableMap::OM_CLASS;
            /** @var Carthed $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CarthedTableMap::addInstanceToPool($obj, $key);
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
            $key = CarthedTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CarthedTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Carthed $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CarthedTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(CarthedTableMap::COL_SESSIONID);
            $criteria->addSelectColumn(CarthedTableMap::COL_RECNO);
            $criteria->addSelectColumn(CarthedTableMap::COL_DATE);
            $criteria->addSelectColumn(CarthedTableMap::COL_TIME);
            $criteria->addSelectColumn(CarthedTableMap::COL_CUSTID);
            $criteria->addSelectColumn(CarthedTableMap::COL_SHIPTOID);
            $criteria->addSelectColumn(CarthedTableMap::COL_CUSTNAME);
            $criteria->addSelectColumn(CarthedTableMap::COL_ORDERNO);
            $criteria->addSelectColumn(CarthedTableMap::COL_CUSTPO);
            $criteria->addSelectColumn(CarthedTableMap::COL_STATUS);
            $criteria->addSelectColumn(CarthedTableMap::COL_ORDERDATE);
            $criteria->addSelectColumn(CarthedTableMap::COL_INVDATE);
            $criteria->addSelectColumn(CarthedTableMap::COL_SHIPDATE);
            $criteria->addSelectColumn(CarthedTableMap::COL_HASDOCUMENTS);
            $criteria->addSelectColumn(CarthedTableMap::COL_HASTRACKING);
            $criteria->addSelectColumn(CarthedTableMap::COL_SUBTOTAL);
            $criteria->addSelectColumn(CarthedTableMap::COL_SALESTAX);
            $criteria->addSelectColumn(CarthedTableMap::COL_FREIGHT);
            $criteria->addSelectColumn(CarthedTableMap::COL_MISCCOST);
            $criteria->addSelectColumn(CarthedTableMap::COL_ORDERTOTAL);
            $criteria->addSelectColumn(CarthedTableMap::COL_HASNOTES);
            $criteria->addSelectColumn(CarthedTableMap::COL_EDITORD);
            $criteria->addSelectColumn(CarthedTableMap::COL_ERROR);
            $criteria->addSelectColumn(CarthedTableMap::COL_ERRORMSG);
            $criteria->addSelectColumn(CarthedTableMap::COL_SCONAME);
            $criteria->addSelectColumn(CarthedTableMap::COL_SHIPNAME);
            $criteria->addSelectColumn(CarthedTableMap::COL_SHIPADDRESS);
            $criteria->addSelectColumn(CarthedTableMap::COL_SHIPADDRESS2);
            $criteria->addSelectColumn(CarthedTableMap::COL_SHIPCITY);
            $criteria->addSelectColumn(CarthedTableMap::COL_SHIPSTATE);
            $criteria->addSelectColumn(CarthedTableMap::COL_SHIPZIP);
            $criteria->addSelectColumn(CarthedTableMap::COL_SHIPCOUNTRY);
            $criteria->addSelectColumn(CarthedTableMap::COL_CONTACT);
            $criteria->addSelectColumn(CarthedTableMap::COL_PHINTL);
            $criteria->addSelectColumn(CarthedTableMap::COL_PHONE);
            $criteria->addSelectColumn(CarthedTableMap::COL_EXTENSION);
            $criteria->addSelectColumn(CarthedTableMap::COL_FAXNBR);
            $criteria->addSelectColumn(CarthedTableMap::COL_EMAIL);
            $criteria->addSelectColumn(CarthedTableMap::COL_RELEASENBR);
            $criteria->addSelectColumn(CarthedTableMap::COL_SHIPVIACD);
            $criteria->addSelectColumn(CarthedTableMap::COL_SHIPVIADESC);
            $criteria->addSelectColumn(CarthedTableMap::COL_TERMCODE);
            $criteria->addSelectColumn(CarthedTableMap::COL_TERMTYPE);
            $criteria->addSelectColumn(CarthedTableMap::COL_TERMDESC);
            $criteria->addSelectColumn(CarthedTableMap::COL_RQSTDATE);
            $criteria->addSelectColumn(CarthedTableMap::COL_SHIPCOM);
            $criteria->addSelectColumn(CarthedTableMap::COL_SP1);
            $criteria->addSelectColumn(CarthedTableMap::COL_SP1NAME);
            $criteria->addSelectColumn(CarthedTableMap::COL_CARDNUMBER);
            $criteria->addSelectColumn(CarthedTableMap::COL_CARDEXPIRE);
            $criteria->addSelectColumn(CarthedTableMap::COL_CARDCODE);
            $criteria->addSelectColumn(CarthedTableMap::COL_CARDAPPROVAL);
            $criteria->addSelectColumn(CarthedTableMap::COL_TOTALCOST);
            $criteria->addSelectColumn(CarthedTableMap::COL_TOTALDISCOUNT);
            $criteria->addSelectColumn(CarthedTableMap::COL_PAYMENTTYPE);
            $criteria->addSelectColumn(CarthedTableMap::COL_SRCDATEFROM);
            $criteria->addSelectColumn(CarthedTableMap::COL_SRCDATETHRU);
            $criteria->addSelectColumn(CarthedTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.sessionid');
            $criteria->addSelectColumn($alias . '.recno');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.time');
            $criteria->addSelectColumn($alias . '.custid');
            $criteria->addSelectColumn($alias . '.shiptoid');
            $criteria->addSelectColumn($alias . '.custname');
            $criteria->addSelectColumn($alias . '.orderno');
            $criteria->addSelectColumn($alias . '.custpo');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.orderdate');
            $criteria->addSelectColumn($alias . '.invdate');
            $criteria->addSelectColumn($alias . '.shipdate');
            $criteria->addSelectColumn($alias . '.hasdocuments');
            $criteria->addSelectColumn($alias . '.hastracking');
            $criteria->addSelectColumn($alias . '.subtotal');
            $criteria->addSelectColumn($alias . '.salestax');
            $criteria->addSelectColumn($alias . '.freight');
            $criteria->addSelectColumn($alias . '.misccost');
            $criteria->addSelectColumn($alias . '.ordertotal');
            $criteria->addSelectColumn($alias . '.hasnotes');
            $criteria->addSelectColumn($alias . '.editord');
            $criteria->addSelectColumn($alias . '.error');
            $criteria->addSelectColumn($alias . '.errormsg');
            $criteria->addSelectColumn($alias . '.sconame');
            $criteria->addSelectColumn($alias . '.shipname');
            $criteria->addSelectColumn($alias . '.shipaddress');
            $criteria->addSelectColumn($alias . '.shipaddress2');
            $criteria->addSelectColumn($alias . '.shipcity');
            $criteria->addSelectColumn($alias . '.shipstate');
            $criteria->addSelectColumn($alias . '.shipzip');
            $criteria->addSelectColumn($alias . '.shipcountry');
            $criteria->addSelectColumn($alias . '.contact');
            $criteria->addSelectColumn($alias . '.phintl');
            $criteria->addSelectColumn($alias . '.phone');
            $criteria->addSelectColumn($alias . '.extension');
            $criteria->addSelectColumn($alias . '.faxnbr');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.releasenbr');
            $criteria->addSelectColumn($alias . '.shipviacd');
            $criteria->addSelectColumn($alias . '.shipviadesc');
            $criteria->addSelectColumn($alias . '.termcode');
            $criteria->addSelectColumn($alias . '.termtype');
            $criteria->addSelectColumn($alias . '.termdesc');
            $criteria->addSelectColumn($alias . '.rqstdate');
            $criteria->addSelectColumn($alias . '.shipcom');
            $criteria->addSelectColumn($alias . '.sp1');
            $criteria->addSelectColumn($alias . '.sp1name');
            $criteria->addSelectColumn($alias . '.cardnumber');
            $criteria->addSelectColumn($alias . '.cardexpire');
            $criteria->addSelectColumn($alias . '.cardcode');
            $criteria->addSelectColumn($alias . '.cardapproval');
            $criteria->addSelectColumn($alias . '.totalcost');
            $criteria->addSelectColumn($alias . '.totaldiscount');
            $criteria->addSelectColumn($alias . '.paymenttype');
            $criteria->addSelectColumn($alias . '.srcdatefrom');
            $criteria->addSelectColumn($alias . '.srcdatethru');
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
        return Propel::getServiceContainer()->getDatabaseMap(CarthedTableMap::DATABASE_NAME)->getTable(CarthedTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(CarthedTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(CarthedTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new CarthedTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Carthed or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Carthed object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(CarthedTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Carthed) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CarthedTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(CarthedTableMap::COL_SESSIONID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(CarthedTableMap::COL_RECNO, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = CarthedQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CarthedTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CarthedTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the carthed table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return CarthedQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Carthed or Criteria object.
     *
     * @param mixed               $criteria Criteria or Carthed object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CarthedTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Carthed object
        }


        // Set the correct dbName
        $query = CarthedQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // CarthedTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
CarthedTableMap::buildTableMap();
