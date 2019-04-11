<?php

namespace Map;

use \Saleshist;
use \SaleshistQuery;
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
 * This class defines the structure of the 'saleshist' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SaleshistTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.SaleshistTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'saleshist';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Saleshist';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Saleshist';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 20;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 20;

    /**
     * the column name for the ordernumber field
     */
    const COL_ORDERNUMBER = 'saleshist.ordernumber';

    /**
     * the column name for the custid field
     */
    const COL_CUSTID = 'saleshist.custid';

    /**
     * the column name for the shiptoid field
     */
    const COL_SHIPTOID = 'saleshist.shiptoid';

    /**
     * the column name for the custname field
     */
    const COL_CUSTNAME = 'saleshist.custname';

    /**
     * the column name for the custpo field
     */
    const COL_CUSTPO = 'saleshist.custpo';

    /**
     * the column name for the order_date field
     */
    const COL_ORDER_DATE = 'saleshist.order_date';

    /**
     * the column name for the invoice_date field
     */
    const COL_INVOICE_DATE = 'saleshist.invoice_date';

    /**
     * the column name for the salesperson_1 field
     */
    const COL_SALESPERSON_1 = 'saleshist.salesperson_1';

    /**
     * the column name for the sp1login field
     */
    const COL_SP1LOGIN = 'saleshist.sp1login';

    /**
     * the column name for the has_tracking field
     */
    const COL_HAS_TRACKING = 'saleshist.has_tracking';

    /**
     * the column name for the subtotal_nontax field
     */
    const COL_SUBTOTAL_NONTAX = 'saleshist.subtotal_nontax';

    /**
     * the column name for the total_tax field
     */
    const COL_TOTAL_TAX = 'saleshist.total_tax';

    /**
     * the column name for the total_freight field
     */
    const COL_TOTAL_FREIGHT = 'saleshist.total_freight';

    /**
     * the column name for the total_misc field
     */
    const COL_TOTAL_MISC = 'saleshist.total_misc';

    /**
     * the column name for the total_order field
     */
    const COL_TOTAL_ORDER = 'saleshist.total_order';

    /**
     * the column name for the has_documents field
     */
    const COL_HAS_DOCUMENTS = 'saleshist.has_documents';

    /**
     * the column name for the has_notes field
     */
    const COL_HAS_NOTES = 'saleshist.has_notes';

    /**
     * the column name for the date field
     */
    const COL_DATE = 'saleshist.date';

    /**
     * the column name for the time field
     */
    const COL_TIME = 'saleshist.time';

    /**
     * the column name for the dummy field
     */
    const COL_DUMMY = 'saleshist.dummy';

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
        self::TYPE_PHPNAME       => array('Ordernumber', 'Custid', 'Shiptoid', 'Custname', 'Custpo', 'OrderDate', 'InvoiceDate', 'Salesperson1', 'Sp1login', 'HasTracking', 'SubtotalNontax', 'TotalTax', 'TotalFreight', 'TotalMisc', 'TotalOrder', 'HasDocuments', 'HasNotes', 'Date', 'Time', 'Dummy', ),
        self::TYPE_CAMELNAME     => array('ordernumber', 'custid', 'shiptoid', 'custname', 'custpo', 'orderDate', 'invoiceDate', 'salesperson1', 'sp1login', 'hasTracking', 'subtotalNontax', 'totalTax', 'totalFreight', 'totalMisc', 'totalOrder', 'hasDocuments', 'hasNotes', 'date', 'time', 'dummy', ),
        self::TYPE_COLNAME       => array(SaleshistTableMap::COL_ORDERNUMBER, SaleshistTableMap::COL_CUSTID, SaleshistTableMap::COL_SHIPTOID, SaleshistTableMap::COL_CUSTNAME, SaleshistTableMap::COL_CUSTPO, SaleshistTableMap::COL_ORDER_DATE, SaleshistTableMap::COL_INVOICE_DATE, SaleshistTableMap::COL_SALESPERSON_1, SaleshistTableMap::COL_SP1LOGIN, SaleshistTableMap::COL_HAS_TRACKING, SaleshistTableMap::COL_SUBTOTAL_NONTAX, SaleshistTableMap::COL_TOTAL_TAX, SaleshistTableMap::COL_TOTAL_FREIGHT, SaleshistTableMap::COL_TOTAL_MISC, SaleshistTableMap::COL_TOTAL_ORDER, SaleshistTableMap::COL_HAS_DOCUMENTS, SaleshistTableMap::COL_HAS_NOTES, SaleshistTableMap::COL_DATE, SaleshistTableMap::COL_TIME, SaleshistTableMap::COL_DUMMY, ),
        self::TYPE_FIELDNAME     => array('ordernumber', 'custid', 'shiptoid', 'custname', 'custpo', 'order_date', 'invoice_date', 'salesperson_1', 'sp1login', 'has_tracking', 'subtotal_nontax', 'total_tax', 'total_freight', 'total_misc', 'total_order', 'has_documents', 'has_notes', 'date', 'time', 'dummy', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Ordernumber' => 0, 'Custid' => 1, 'Shiptoid' => 2, 'Custname' => 3, 'Custpo' => 4, 'OrderDate' => 5, 'InvoiceDate' => 6, 'Salesperson1' => 7, 'Sp1login' => 8, 'HasTracking' => 9, 'SubtotalNontax' => 10, 'TotalTax' => 11, 'TotalFreight' => 12, 'TotalMisc' => 13, 'TotalOrder' => 14, 'HasDocuments' => 15, 'HasNotes' => 16, 'Date' => 17, 'Time' => 18, 'Dummy' => 19, ),
        self::TYPE_CAMELNAME     => array('ordernumber' => 0, 'custid' => 1, 'shiptoid' => 2, 'custname' => 3, 'custpo' => 4, 'orderDate' => 5, 'invoiceDate' => 6, 'salesperson1' => 7, 'sp1login' => 8, 'hasTracking' => 9, 'subtotalNontax' => 10, 'totalTax' => 11, 'totalFreight' => 12, 'totalMisc' => 13, 'totalOrder' => 14, 'hasDocuments' => 15, 'hasNotes' => 16, 'date' => 17, 'time' => 18, 'dummy' => 19, ),
        self::TYPE_COLNAME       => array(SaleshistTableMap::COL_ORDERNUMBER => 0, SaleshistTableMap::COL_CUSTID => 1, SaleshistTableMap::COL_SHIPTOID => 2, SaleshistTableMap::COL_CUSTNAME => 3, SaleshistTableMap::COL_CUSTPO => 4, SaleshistTableMap::COL_ORDER_DATE => 5, SaleshistTableMap::COL_INVOICE_DATE => 6, SaleshistTableMap::COL_SALESPERSON_1 => 7, SaleshistTableMap::COL_SP1LOGIN => 8, SaleshistTableMap::COL_HAS_TRACKING => 9, SaleshistTableMap::COL_SUBTOTAL_NONTAX => 10, SaleshistTableMap::COL_TOTAL_TAX => 11, SaleshistTableMap::COL_TOTAL_FREIGHT => 12, SaleshistTableMap::COL_TOTAL_MISC => 13, SaleshistTableMap::COL_TOTAL_ORDER => 14, SaleshistTableMap::COL_HAS_DOCUMENTS => 15, SaleshistTableMap::COL_HAS_NOTES => 16, SaleshistTableMap::COL_DATE => 17, SaleshistTableMap::COL_TIME => 18, SaleshistTableMap::COL_DUMMY => 19, ),
        self::TYPE_FIELDNAME     => array('ordernumber' => 0, 'custid' => 1, 'shiptoid' => 2, 'custname' => 3, 'custpo' => 4, 'order_date' => 5, 'invoice_date' => 6, 'salesperson_1' => 7, 'sp1login' => 8, 'has_tracking' => 9, 'subtotal_nontax' => 10, 'total_tax' => 11, 'total_freight' => 12, 'total_misc' => 13, 'total_order' => 14, 'has_documents' => 15, 'has_notes' => 16, 'date' => 17, 'time' => 18, 'dummy' => 19, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
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
        $this->setName('saleshist');
        $this->setPhpName('Saleshist');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Saleshist');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('ordernumber', 'Ordernumber', 'VARCHAR', true, 30, null);
        $this->addColumn('custid', 'Custid', 'VARCHAR', false, 10, null);
        $this->addColumn('shiptoid', 'Shiptoid', 'VARCHAR', false, 10, null);
        $this->addColumn('custname', 'Custname', 'VARCHAR', false, 45, null);
        $this->addColumn('custpo', 'Custpo', 'VARCHAR', false, 45, null);
        $this->addColumn('order_date', 'OrderDate', 'INTEGER', false, 8, null);
        $this->addColumn('invoice_date', 'InvoiceDate', 'INTEGER', false, 8, null);
        $this->addColumn('salesperson_1', 'Salesperson1', 'VARCHAR', false, 45, null);
        $this->addColumn('sp1login', 'Sp1login', 'VARCHAR', false, 45, null);
        $this->addColumn('has_tracking', 'HasTracking', 'VARCHAR', false, 45, null);
        $this->addColumn('subtotal_nontax', 'SubtotalNontax', 'DECIMAL', false, 10, null);
        $this->addColumn('total_tax', 'TotalTax', 'DECIMAL', false, 10, null);
        $this->addColumn('total_freight', 'TotalFreight', 'DECIMAL', false, 10, null);
        $this->addColumn('total_misc', 'TotalMisc', 'DECIMAL', false, 10, null);
        $this->addColumn('total_order', 'TotalOrder', 'DECIMAL', false, 10, null);
        $this->addColumn('has_documents', 'HasDocuments', 'VARCHAR', false, 1, null);
        $this->addColumn('has_notes', 'HasNotes', 'VARCHAR', false, 1, null);
        $this->addColumn('date', 'Date', 'INTEGER', false, 8, null);
        $this->addColumn('time', 'Time', 'INTEGER', false, 8, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Ordernumber', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Ordernumber', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Ordernumber', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Ordernumber', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Ordernumber', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Ordernumber', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Ordernumber', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SaleshistTableMap::CLASS_DEFAULT : SaleshistTableMap::OM_CLASS;
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
     * @return array           (Saleshist object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SaleshistTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SaleshistTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SaleshistTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SaleshistTableMap::OM_CLASS;
            /** @var Saleshist $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SaleshistTableMap::addInstanceToPool($obj, $key);
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
            $key = SaleshistTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SaleshistTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Saleshist $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SaleshistTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SaleshistTableMap::COL_ORDERNUMBER);
            $criteria->addSelectColumn(SaleshistTableMap::COL_CUSTID);
            $criteria->addSelectColumn(SaleshistTableMap::COL_SHIPTOID);
            $criteria->addSelectColumn(SaleshistTableMap::COL_CUSTNAME);
            $criteria->addSelectColumn(SaleshistTableMap::COL_CUSTPO);
            $criteria->addSelectColumn(SaleshistTableMap::COL_ORDER_DATE);
            $criteria->addSelectColumn(SaleshistTableMap::COL_INVOICE_DATE);
            $criteria->addSelectColumn(SaleshistTableMap::COL_SALESPERSON_1);
            $criteria->addSelectColumn(SaleshistTableMap::COL_SP1LOGIN);
            $criteria->addSelectColumn(SaleshistTableMap::COL_HAS_TRACKING);
            $criteria->addSelectColumn(SaleshistTableMap::COL_SUBTOTAL_NONTAX);
            $criteria->addSelectColumn(SaleshistTableMap::COL_TOTAL_TAX);
            $criteria->addSelectColumn(SaleshistTableMap::COL_TOTAL_FREIGHT);
            $criteria->addSelectColumn(SaleshistTableMap::COL_TOTAL_MISC);
            $criteria->addSelectColumn(SaleshistTableMap::COL_TOTAL_ORDER);
            $criteria->addSelectColumn(SaleshistTableMap::COL_HAS_DOCUMENTS);
            $criteria->addSelectColumn(SaleshistTableMap::COL_HAS_NOTES);
            $criteria->addSelectColumn(SaleshistTableMap::COL_DATE);
            $criteria->addSelectColumn(SaleshistTableMap::COL_TIME);
            $criteria->addSelectColumn(SaleshistTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.ordernumber');
            $criteria->addSelectColumn($alias . '.custid');
            $criteria->addSelectColumn($alias . '.shiptoid');
            $criteria->addSelectColumn($alias . '.custname');
            $criteria->addSelectColumn($alias . '.custpo');
            $criteria->addSelectColumn($alias . '.order_date');
            $criteria->addSelectColumn($alias . '.invoice_date');
            $criteria->addSelectColumn($alias . '.salesperson_1');
            $criteria->addSelectColumn($alias . '.sp1login');
            $criteria->addSelectColumn($alias . '.has_tracking');
            $criteria->addSelectColumn($alias . '.subtotal_nontax');
            $criteria->addSelectColumn($alias . '.total_tax');
            $criteria->addSelectColumn($alias . '.total_freight');
            $criteria->addSelectColumn($alias . '.total_misc');
            $criteria->addSelectColumn($alias . '.total_order');
            $criteria->addSelectColumn($alias . '.has_documents');
            $criteria->addSelectColumn($alias . '.has_notes');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.time');
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
        return Propel::getServiceContainer()->getDatabaseMap(SaleshistTableMap::DATABASE_NAME)->getTable(SaleshistTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SaleshistTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SaleshistTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SaleshistTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Saleshist or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Saleshist object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SaleshistTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Saleshist) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SaleshistTableMap::DATABASE_NAME);
            $criteria->add(SaleshistTableMap::COL_ORDERNUMBER, (array) $values, Criteria::IN);
        }

        $query = SaleshistQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SaleshistTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SaleshistTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the saleshist table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SaleshistQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Saleshist or Criteria object.
     *
     * @param mixed               $criteria Criteria or Saleshist object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SaleshistTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Saleshist object
        }


        // Set the correct dbName
        $query = SaleshistQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SaleshistTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SaleshistTableMap::buildTableMap();
