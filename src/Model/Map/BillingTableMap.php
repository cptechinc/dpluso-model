<?php

namespace Map;

use \Billing;
use \BillingQuery;
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
 * This class defines the structure of the 'billing' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class BillingTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.BillingTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'billing';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Billing';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Billing';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 41;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 41;

    /**
     * the column name for the sessionid field
     */
    const COL_SESSIONID = 'billing.sessionid';

    /**
     * the column name for the date field
     */
    const COL_DATE = 'billing.date';

    /**
     * the column name for the time field
     */
    const COL_TIME = 'billing.time';

    /**
     * the column name for the bconame field
     */
    const COL_BCONAME = 'billing.bconame';

    /**
     * the column name for the baddress field
     */
    const COL_BADDRESS = 'billing.baddress';

    /**
     * the column name for the baddress2 field
     */
    const COL_BADDRESS2 = 'billing.baddress2';

    /**
     * the column name for the bname field
     */
    const COL_BNAME = 'billing.bname';

    /**
     * the column name for the bcity field
     */
    const COL_BCITY = 'billing.bcity';

    /**
     * the column name for the bst field
     */
    const COL_BST = 'billing.bst';

    /**
     * the column name for the bzip field
     */
    const COL_BZIP = 'billing.bzip';

    /**
     * the column name for the bcountry field
     */
    const COL_BCOUNTRY = 'billing.bcountry';

    /**
     * the column name for the sconame field
     */
    const COL_SCONAME = 'billing.sconame';

    /**
     * the column name for the sname field
     */
    const COL_SNAME = 'billing.sname';

    /**
     * the column name for the saddress field
     */
    const COL_SADDRESS = 'billing.saddress';

    /**
     * the column name for the saddress2 field
     */
    const COL_SADDRESS2 = 'billing.saddress2';

    /**
     * the column name for the scity field
     */
    const COL_SCITY = 'billing.scity';

    /**
     * the column name for the sst field
     */
    const COL_SST = 'billing.sst';

    /**
     * the column name for the szip field
     */
    const COL_SZIP = 'billing.szip';

    /**
     * the column name for the scountry field
     */
    const COL_SCOUNTRY = 'billing.scountry';

    /**
     * the column name for the ccno field
     */
    const COL_CCNO = 'billing.ccno';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'billing.email';

    /**
     * the column name for the phone field
     */
    const COL_PHONE = 'billing.phone';

    /**
     * the column name for the vc field
     */
    const COL_VC = 'billing.vc';

    /**
     * the column name for the error field
     */
    const COL_ERROR = 'billing.error';

    /**
     * the column name for the ermes field
     */
    const COL_ERMES = 'billing.ermes';

    /**
     * the column name for the orders field
     */
    const COL_ORDERS = 'billing.orders';

    /**
     * the column name for the xpdate field
     */
    const COL_XPDATE = 'billing.xpdate';

    /**
     * the column name for the pono field
     */
    const COL_PONO = 'billing.pono';

    /**
     * the column name for the paymenttype field
     */
    const COL_PAYMENTTYPE = 'billing.paymenttype';

    /**
     * the column name for the shipmeth field
     */
    const COL_SHIPMETH = 'billing.shipmeth';

    /**
     * the column name for the shipcom field
     */
    const COL_SHIPCOM = 'billing.shipcom';

    /**
     * the column name for the note field
     */
    const COL_NOTE = 'billing.note';

    /**
     * the column name for the termtype field
     */
    const COL_TERMTYPE = 'billing.termtype';

    /**
     * the column name for the custid field
     */
    const COL_CUSTID = 'billing.custid';

    /**
     * the column name for the shiptoid field
     */
    const COL_SHIPTOID = 'billing.shiptoid';

    /**
     * the column name for the baddress3 field
     */
    const COL_BADDRESS3 = 'billing.baddress3';

    /**
     * the column name for the saddress3 field
     */
    const COL_SADDRESS3 = 'billing.saddress3';

    /**
     * the column name for the newnbr field
     */
    const COL_NEWNBR = 'billing.newnbr';

    /**
     * the column name for the faxnbr field
     */
    const COL_FAXNBR = 'billing.faxnbr';

    /**
     * the column name for the rqstdate field
     */
    const COL_RQSTDATE = 'billing.rqstdate';

    /**
     * the column name for the dummy field
     */
    const COL_DUMMY = 'billing.dummy';

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
        self::TYPE_PHPNAME       => array('Sessionid', 'Date', 'Time', 'Bconame', 'Baddress', 'Baddress2', 'Bname', 'Bcity', 'Bst', 'Bzip', 'Bcountry', 'Sconame', 'Sname', 'Saddress', 'Saddress2', 'Scity', 'Sst', 'Szip', 'Scountry', 'Ccno', 'Email', 'Phone', 'Vc', 'Error', 'Ermes', 'Orders', 'Xpdate', 'Pono', 'Paymenttype', 'Shipmeth', 'Shipcom', 'Note', 'Termtype', 'Custid', 'Shiptoid', 'Baddress3', 'Saddress3', 'Newnbr', 'Faxnbr', 'Rqstdate', 'Dummy', ),
        self::TYPE_CAMELNAME     => array('sessionid', 'date', 'time', 'bconame', 'baddress', 'baddress2', 'bname', 'bcity', 'bst', 'bzip', 'bcountry', 'sconame', 'sname', 'saddress', 'saddress2', 'scity', 'sst', 'szip', 'scountry', 'ccno', 'email', 'phone', 'vc', 'error', 'ermes', 'orders', 'xpdate', 'pono', 'paymenttype', 'shipmeth', 'shipcom', 'note', 'termtype', 'custid', 'shiptoid', 'baddress3', 'saddress3', 'newnbr', 'faxnbr', 'rqstdate', 'dummy', ),
        self::TYPE_COLNAME       => array(BillingTableMap::COL_SESSIONID, BillingTableMap::COL_DATE, BillingTableMap::COL_TIME, BillingTableMap::COL_BCONAME, BillingTableMap::COL_BADDRESS, BillingTableMap::COL_BADDRESS2, BillingTableMap::COL_BNAME, BillingTableMap::COL_BCITY, BillingTableMap::COL_BST, BillingTableMap::COL_BZIP, BillingTableMap::COL_BCOUNTRY, BillingTableMap::COL_SCONAME, BillingTableMap::COL_SNAME, BillingTableMap::COL_SADDRESS, BillingTableMap::COL_SADDRESS2, BillingTableMap::COL_SCITY, BillingTableMap::COL_SST, BillingTableMap::COL_SZIP, BillingTableMap::COL_SCOUNTRY, BillingTableMap::COL_CCNO, BillingTableMap::COL_EMAIL, BillingTableMap::COL_PHONE, BillingTableMap::COL_VC, BillingTableMap::COL_ERROR, BillingTableMap::COL_ERMES, BillingTableMap::COL_ORDERS, BillingTableMap::COL_XPDATE, BillingTableMap::COL_PONO, BillingTableMap::COL_PAYMENTTYPE, BillingTableMap::COL_SHIPMETH, BillingTableMap::COL_SHIPCOM, BillingTableMap::COL_NOTE, BillingTableMap::COL_TERMTYPE, BillingTableMap::COL_CUSTID, BillingTableMap::COL_SHIPTOID, BillingTableMap::COL_BADDRESS3, BillingTableMap::COL_SADDRESS3, BillingTableMap::COL_NEWNBR, BillingTableMap::COL_FAXNBR, BillingTableMap::COL_RQSTDATE, BillingTableMap::COL_DUMMY, ),
        self::TYPE_FIELDNAME     => array('sessionid', 'date', 'time', 'bconame', 'baddress', 'baddress2', 'bname', 'bcity', 'bst', 'bzip', 'bcountry', 'sconame', 'sname', 'saddress', 'saddress2', 'scity', 'sst', 'szip', 'scountry', 'ccno', 'email', 'phone', 'vc', 'error', 'ermes', 'orders', 'xpdate', 'pono', 'paymenttype', 'shipmeth', 'shipcom', 'note', 'termtype', 'custid', 'shiptoid', 'baddress3', 'saddress3', 'newnbr', 'faxnbr', 'rqstdate', 'dummy', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sessionid' => 0, 'Date' => 1, 'Time' => 2, 'Bconame' => 3, 'Baddress' => 4, 'Baddress2' => 5, 'Bname' => 6, 'Bcity' => 7, 'Bst' => 8, 'Bzip' => 9, 'Bcountry' => 10, 'Sconame' => 11, 'Sname' => 12, 'Saddress' => 13, 'Saddress2' => 14, 'Scity' => 15, 'Sst' => 16, 'Szip' => 17, 'Scountry' => 18, 'Ccno' => 19, 'Email' => 20, 'Phone' => 21, 'Vc' => 22, 'Error' => 23, 'Ermes' => 24, 'Orders' => 25, 'Xpdate' => 26, 'Pono' => 27, 'Paymenttype' => 28, 'Shipmeth' => 29, 'Shipcom' => 30, 'Note' => 31, 'Termtype' => 32, 'Custid' => 33, 'Shiptoid' => 34, 'Baddress3' => 35, 'Saddress3' => 36, 'Newnbr' => 37, 'Faxnbr' => 38, 'Rqstdate' => 39, 'Dummy' => 40, ),
        self::TYPE_CAMELNAME     => array('sessionid' => 0, 'date' => 1, 'time' => 2, 'bconame' => 3, 'baddress' => 4, 'baddress2' => 5, 'bname' => 6, 'bcity' => 7, 'bst' => 8, 'bzip' => 9, 'bcountry' => 10, 'sconame' => 11, 'sname' => 12, 'saddress' => 13, 'saddress2' => 14, 'scity' => 15, 'sst' => 16, 'szip' => 17, 'scountry' => 18, 'ccno' => 19, 'email' => 20, 'phone' => 21, 'vc' => 22, 'error' => 23, 'ermes' => 24, 'orders' => 25, 'xpdate' => 26, 'pono' => 27, 'paymenttype' => 28, 'shipmeth' => 29, 'shipcom' => 30, 'note' => 31, 'termtype' => 32, 'custid' => 33, 'shiptoid' => 34, 'baddress3' => 35, 'saddress3' => 36, 'newnbr' => 37, 'faxnbr' => 38, 'rqstdate' => 39, 'dummy' => 40, ),
        self::TYPE_COLNAME       => array(BillingTableMap::COL_SESSIONID => 0, BillingTableMap::COL_DATE => 1, BillingTableMap::COL_TIME => 2, BillingTableMap::COL_BCONAME => 3, BillingTableMap::COL_BADDRESS => 4, BillingTableMap::COL_BADDRESS2 => 5, BillingTableMap::COL_BNAME => 6, BillingTableMap::COL_BCITY => 7, BillingTableMap::COL_BST => 8, BillingTableMap::COL_BZIP => 9, BillingTableMap::COL_BCOUNTRY => 10, BillingTableMap::COL_SCONAME => 11, BillingTableMap::COL_SNAME => 12, BillingTableMap::COL_SADDRESS => 13, BillingTableMap::COL_SADDRESS2 => 14, BillingTableMap::COL_SCITY => 15, BillingTableMap::COL_SST => 16, BillingTableMap::COL_SZIP => 17, BillingTableMap::COL_SCOUNTRY => 18, BillingTableMap::COL_CCNO => 19, BillingTableMap::COL_EMAIL => 20, BillingTableMap::COL_PHONE => 21, BillingTableMap::COL_VC => 22, BillingTableMap::COL_ERROR => 23, BillingTableMap::COL_ERMES => 24, BillingTableMap::COL_ORDERS => 25, BillingTableMap::COL_XPDATE => 26, BillingTableMap::COL_PONO => 27, BillingTableMap::COL_PAYMENTTYPE => 28, BillingTableMap::COL_SHIPMETH => 29, BillingTableMap::COL_SHIPCOM => 30, BillingTableMap::COL_NOTE => 31, BillingTableMap::COL_TERMTYPE => 32, BillingTableMap::COL_CUSTID => 33, BillingTableMap::COL_SHIPTOID => 34, BillingTableMap::COL_BADDRESS3 => 35, BillingTableMap::COL_SADDRESS3 => 36, BillingTableMap::COL_NEWNBR => 37, BillingTableMap::COL_FAXNBR => 38, BillingTableMap::COL_RQSTDATE => 39, BillingTableMap::COL_DUMMY => 40, ),
        self::TYPE_FIELDNAME     => array('sessionid' => 0, 'date' => 1, 'time' => 2, 'bconame' => 3, 'baddress' => 4, 'baddress2' => 5, 'bname' => 6, 'bcity' => 7, 'bst' => 8, 'bzip' => 9, 'bcountry' => 10, 'sconame' => 11, 'sname' => 12, 'saddress' => 13, 'saddress2' => 14, 'scity' => 15, 'sst' => 16, 'szip' => 17, 'scountry' => 18, 'ccno' => 19, 'email' => 20, 'phone' => 21, 'vc' => 22, 'error' => 23, 'ermes' => 24, 'orders' => 25, 'xpdate' => 26, 'pono' => 27, 'paymenttype' => 28, 'shipmeth' => 29, 'shipcom' => 30, 'note' => 31, 'termtype' => 32, 'custid' => 33, 'shiptoid' => 34, 'baddress3' => 35, 'saddress3' => 36, 'newnbr' => 37, 'faxnbr' => 38, 'rqstdate' => 39, 'dummy' => 40, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, )
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
        $this->setName('billing');
        $this->setPhpName('Billing');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Billing');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('sessionid', 'Sessionid', 'VARCHAR', true, 50, null);
        $this->addColumn('date', 'Date', 'INTEGER', false, 8, null);
        $this->addColumn('time', 'Time', 'INTEGER', false, 8, null);
        $this->addColumn('bconame', 'Bconame', 'VARCHAR', false, 30, null);
        $this->addColumn('baddress', 'Baddress', 'VARCHAR', false, 35, null);
        $this->addColumn('baddress2', 'Baddress2', 'VARCHAR', false, 20, null);
        $this->addColumn('bname', 'Bname', 'VARCHAR', false, 30, null);
        $this->addColumn('bcity', 'Bcity', 'VARCHAR', false, 30, null);
        $this->addColumn('bst', 'Bst', 'VARCHAR', false, 30, null);
        $this->addColumn('bzip', 'Bzip', 'VARCHAR', false, 30, null);
        $this->addColumn('bcountry', 'Bcountry', 'VARCHAR', false, 30, null);
        $this->addColumn('sconame', 'Sconame', 'VARCHAR', false, 30, null);
        $this->addColumn('sname', 'Sname', 'VARCHAR', false, 30, null);
        $this->addColumn('saddress', 'Saddress', 'VARCHAR', false, 30, null);
        $this->addColumn('saddress2', 'Saddress2', 'CLOB', false, null, null);
        $this->addColumn('scity', 'Scity', 'VARCHAR', false, 30, null);
        $this->addColumn('sst', 'Sst', 'VARCHAR', false, 30, null);
        $this->addColumn('szip', 'Szip', 'VARCHAR', false, 30, null);
        $this->addColumn('scountry', 'Scountry', 'VARCHAR', false, 30, null);
        $this->addColumn('ccno', 'Ccno', 'LONGVARCHAR', false, null, null);
        $this->addColumn('email', 'Email', 'VARCHAR', false, 50, null);
        $this->addColumn('phone', 'Phone', 'VARCHAR', false, 30, null);
        $this->addColumn('vc', 'Vc', 'LONGVARCHAR', false, null, null);
        $this->addColumn('error', 'Error', 'VARCHAR', false, 30, null);
        $this->addColumn('ermes', 'Ermes', 'VARCHAR', false, 30, null);
        $this->addColumn('orders', 'Orders', 'VARCHAR', false, 30, null);
        $this->addColumn('xpdate', 'Xpdate', 'LONGVARCHAR', false, null, null);
        $this->addColumn('pono', 'Pono', 'VARCHAR', false, 30, null);
        $this->addColumn('paymenttype', 'Paymenttype', 'VARCHAR', false, 30, null);
        $this->addColumn('shipmeth', 'Shipmeth', 'VARCHAR', false, 35, null);
        $this->addColumn('shipcom', 'Shipcom', 'CHAR', false, null, null);
        $this->addColumn('note', 'Note', 'VARCHAR', false, 200, null);
        $this->addColumn('termtype', 'Termtype', 'VARCHAR', false, 30, null);
        $this->addColumn('custid', 'Custid', 'VARCHAR', false, 30, null);
        $this->addColumn('shiptoid', 'Shiptoid', 'VARCHAR', false, 30, null);
        $this->addColumn('baddress3', 'Baddress3', 'VARCHAR', false, 30, null);
        $this->addColumn('saddress3', 'Saddress3', 'VARCHAR', false, 30, null);
        $this->addColumn('newnbr', 'Newnbr', 'VARCHAR', false, 30, null);
        $this->addColumn('faxnbr', 'Faxnbr', 'VARCHAR', false, 30, null);
        $this->addColumn('rqstdate', 'Rqstdate', 'VARCHAR', false, 10, null);
        $this->addColumn('dummy', 'Dummy', 'VARCHAR', false, 1, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)];
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
        return (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)
        ];
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
        return $withPrefix ? BillingTableMap::CLASS_DEFAULT : BillingTableMap::OM_CLASS;
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
     * @return array           (Billing object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = BillingTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = BillingTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + BillingTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = BillingTableMap::OM_CLASS;
            /** @var Billing $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            BillingTableMap::addInstanceToPool($obj, $key);
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
            $key = BillingTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = BillingTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Billing $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                BillingTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(BillingTableMap::COL_SESSIONID);
            $criteria->addSelectColumn(BillingTableMap::COL_DATE);
            $criteria->addSelectColumn(BillingTableMap::COL_TIME);
            $criteria->addSelectColumn(BillingTableMap::COL_BCONAME);
            $criteria->addSelectColumn(BillingTableMap::COL_BADDRESS);
            $criteria->addSelectColumn(BillingTableMap::COL_BADDRESS2);
            $criteria->addSelectColumn(BillingTableMap::COL_BNAME);
            $criteria->addSelectColumn(BillingTableMap::COL_BCITY);
            $criteria->addSelectColumn(BillingTableMap::COL_BST);
            $criteria->addSelectColumn(BillingTableMap::COL_BZIP);
            $criteria->addSelectColumn(BillingTableMap::COL_BCOUNTRY);
            $criteria->addSelectColumn(BillingTableMap::COL_SCONAME);
            $criteria->addSelectColumn(BillingTableMap::COL_SNAME);
            $criteria->addSelectColumn(BillingTableMap::COL_SADDRESS);
            $criteria->addSelectColumn(BillingTableMap::COL_SADDRESS2);
            $criteria->addSelectColumn(BillingTableMap::COL_SCITY);
            $criteria->addSelectColumn(BillingTableMap::COL_SST);
            $criteria->addSelectColumn(BillingTableMap::COL_SZIP);
            $criteria->addSelectColumn(BillingTableMap::COL_SCOUNTRY);
            $criteria->addSelectColumn(BillingTableMap::COL_CCNO);
            $criteria->addSelectColumn(BillingTableMap::COL_EMAIL);
            $criteria->addSelectColumn(BillingTableMap::COL_PHONE);
            $criteria->addSelectColumn(BillingTableMap::COL_VC);
            $criteria->addSelectColumn(BillingTableMap::COL_ERROR);
            $criteria->addSelectColumn(BillingTableMap::COL_ERMES);
            $criteria->addSelectColumn(BillingTableMap::COL_ORDERS);
            $criteria->addSelectColumn(BillingTableMap::COL_XPDATE);
            $criteria->addSelectColumn(BillingTableMap::COL_PONO);
            $criteria->addSelectColumn(BillingTableMap::COL_PAYMENTTYPE);
            $criteria->addSelectColumn(BillingTableMap::COL_SHIPMETH);
            $criteria->addSelectColumn(BillingTableMap::COL_SHIPCOM);
            $criteria->addSelectColumn(BillingTableMap::COL_NOTE);
            $criteria->addSelectColumn(BillingTableMap::COL_TERMTYPE);
            $criteria->addSelectColumn(BillingTableMap::COL_CUSTID);
            $criteria->addSelectColumn(BillingTableMap::COL_SHIPTOID);
            $criteria->addSelectColumn(BillingTableMap::COL_BADDRESS3);
            $criteria->addSelectColumn(BillingTableMap::COL_SADDRESS3);
            $criteria->addSelectColumn(BillingTableMap::COL_NEWNBR);
            $criteria->addSelectColumn(BillingTableMap::COL_FAXNBR);
            $criteria->addSelectColumn(BillingTableMap::COL_RQSTDATE);
            $criteria->addSelectColumn(BillingTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.sessionid');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.time');
            $criteria->addSelectColumn($alias . '.bconame');
            $criteria->addSelectColumn($alias . '.baddress');
            $criteria->addSelectColumn($alias . '.baddress2');
            $criteria->addSelectColumn($alias . '.bname');
            $criteria->addSelectColumn($alias . '.bcity');
            $criteria->addSelectColumn($alias . '.bst');
            $criteria->addSelectColumn($alias . '.bzip');
            $criteria->addSelectColumn($alias . '.bcountry');
            $criteria->addSelectColumn($alias . '.sconame');
            $criteria->addSelectColumn($alias . '.sname');
            $criteria->addSelectColumn($alias . '.saddress');
            $criteria->addSelectColumn($alias . '.saddress2');
            $criteria->addSelectColumn($alias . '.scity');
            $criteria->addSelectColumn($alias . '.sst');
            $criteria->addSelectColumn($alias . '.szip');
            $criteria->addSelectColumn($alias . '.scountry');
            $criteria->addSelectColumn($alias . '.ccno');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.phone');
            $criteria->addSelectColumn($alias . '.vc');
            $criteria->addSelectColumn($alias . '.error');
            $criteria->addSelectColumn($alias . '.ermes');
            $criteria->addSelectColumn($alias . '.orders');
            $criteria->addSelectColumn($alias . '.xpdate');
            $criteria->addSelectColumn($alias . '.pono');
            $criteria->addSelectColumn($alias . '.paymenttype');
            $criteria->addSelectColumn($alias . '.shipmeth');
            $criteria->addSelectColumn($alias . '.shipcom');
            $criteria->addSelectColumn($alias . '.note');
            $criteria->addSelectColumn($alias . '.termtype');
            $criteria->addSelectColumn($alias . '.custid');
            $criteria->addSelectColumn($alias . '.shiptoid');
            $criteria->addSelectColumn($alias . '.baddress3');
            $criteria->addSelectColumn($alias . '.saddress3');
            $criteria->addSelectColumn($alias . '.newnbr');
            $criteria->addSelectColumn($alias . '.faxnbr');
            $criteria->addSelectColumn($alias . '.rqstdate');
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
        return Propel::getServiceContainer()->getDatabaseMap(BillingTableMap::DATABASE_NAME)->getTable(BillingTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(BillingTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(BillingTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new BillingTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Billing or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Billing object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(BillingTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Billing) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(BillingTableMap::DATABASE_NAME);
            $criteria->add(BillingTableMap::COL_SESSIONID, (array) $values, Criteria::IN);
        }

        $query = BillingQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            BillingTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                BillingTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the billing table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return BillingQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Billing or Criteria object.
     *
     * @param mixed               $criteria Criteria or Billing object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BillingTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Billing object
        }


        // Set the correct dbName
        $query = BillingQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // BillingTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BillingTableMap::buildTableMap();
