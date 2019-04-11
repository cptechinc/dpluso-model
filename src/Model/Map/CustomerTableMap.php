<?php

namespace Map;

use \Customer;
use \CustomerQuery;
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
 * This class defines the structure of the 'customer' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class CustomerTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.CustomerTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'customer';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Customer';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Customer';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 22;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 22;

    /**
     * the column name for the sessionid field
     */
    const COL_SESSIONID = 'customer.sessionid';

    /**
     * the column name for the recno field
     */
    const COL_RECNO = 'customer.recno';

    /**
     * the column name for the date field
     */
    const COL_DATE = 'customer.date';

    /**
     * the column name for the time field
     */
    const COL_TIME = 'customer.time';

    /**
     * the column name for the custid field
     */
    const COL_CUSTID = 'customer.custid';

    /**
     * the column name for the custname field
     */
    const COL_CUSTNAME = 'customer.custname';

    /**
     * the column name for the caddress field
     */
    const COL_CADDRESS = 'customer.caddress';

    /**
     * the column name for the caddress2 field
     */
    const COL_CADDRESS2 = 'customer.caddress2';

    /**
     * the column name for the caddress3 field
     */
    const COL_CADDRESS3 = 'customer.caddress3';

    /**
     * the column name for the ccity field
     */
    const COL_CCITY = 'customer.ccity';

    /**
     * the column name for the cst field
     */
    const COL_CST = 'customer.cst';

    /**
     * the column name for the czip field
     */
    const COL_CZIP = 'customer.czip';

    /**
     * the column name for the ccountry field
     */
    const COL_CCOUNTRY = 'customer.ccountry';

    /**
     * the column name for the cphone field
     */
    const COL_CPHONE = 'customer.cphone';

    /**
     * the column name for the csalesrep field
     */
    const COL_CSALESREP = 'customer.csalesrep';

    /**
     * the column name for the csalesrepname field
     */
    const COL_CSALESREPNAME = 'customer.csalesrepname';

    /**
     * the column name for the ctype field
     */
    const COL_CTYPE = 'customer.ctype';

    /**
     * the column name for the nbrshipto field
     */
    const COL_NBRSHIPTO = 'customer.nbrshipto';

    /**
     * the column name for the dateentered field
     */
    const COL_DATEENTERED = 'customer.dateentered';

    /**
     * the column name for the lastsaledate field
     */
    const COL_LASTSALEDATE = 'customer.lastsaledate';

    /**
     * the column name for the errormsg field
     */
    const COL_ERRORMSG = 'customer.errormsg';

    /**
     * the column name for the dummy field
     */
    const COL_DUMMY = 'customer.dummy';

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
        self::TYPE_PHPNAME       => array('Sessionid', 'Recno', 'Date', 'Time', 'Custid', 'Custname', 'Caddress', 'Caddress2', 'Caddress3', 'Ccity', 'Cst', 'Czip', 'Ccountry', 'Cphone', 'Csalesrep', 'Csalesrepname', 'Ctype', 'Nbrshipto', 'Dateentered', 'Lastsaledate', 'Errormsg', 'Dummy', ),
        self::TYPE_CAMELNAME     => array('sessionid', 'recno', 'date', 'time', 'custid', 'custname', 'caddress', 'caddress2', 'caddress3', 'ccity', 'cst', 'czip', 'ccountry', 'cphone', 'csalesrep', 'csalesrepname', 'ctype', 'nbrshipto', 'dateentered', 'lastsaledate', 'errormsg', 'dummy', ),
        self::TYPE_COLNAME       => array(CustomerTableMap::COL_SESSIONID, CustomerTableMap::COL_RECNO, CustomerTableMap::COL_DATE, CustomerTableMap::COL_TIME, CustomerTableMap::COL_CUSTID, CustomerTableMap::COL_CUSTNAME, CustomerTableMap::COL_CADDRESS, CustomerTableMap::COL_CADDRESS2, CustomerTableMap::COL_CADDRESS3, CustomerTableMap::COL_CCITY, CustomerTableMap::COL_CST, CustomerTableMap::COL_CZIP, CustomerTableMap::COL_CCOUNTRY, CustomerTableMap::COL_CPHONE, CustomerTableMap::COL_CSALESREP, CustomerTableMap::COL_CSALESREPNAME, CustomerTableMap::COL_CTYPE, CustomerTableMap::COL_NBRSHIPTO, CustomerTableMap::COL_DATEENTERED, CustomerTableMap::COL_LASTSALEDATE, CustomerTableMap::COL_ERRORMSG, CustomerTableMap::COL_DUMMY, ),
        self::TYPE_FIELDNAME     => array('sessionid', 'recno', 'date', 'time', 'custid', 'custname', 'caddress', 'caddress2', 'caddress3', 'ccity', 'cst', 'czip', 'ccountry', 'cphone', 'csalesrep', 'csalesrepname', 'ctype', 'nbrshipto', 'dateentered', 'lastsaledate', 'errormsg', 'dummy', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sessionid' => 0, 'Recno' => 1, 'Date' => 2, 'Time' => 3, 'Custid' => 4, 'Custname' => 5, 'Caddress' => 6, 'Caddress2' => 7, 'Caddress3' => 8, 'Ccity' => 9, 'Cst' => 10, 'Czip' => 11, 'Ccountry' => 12, 'Cphone' => 13, 'Csalesrep' => 14, 'Csalesrepname' => 15, 'Ctype' => 16, 'Nbrshipto' => 17, 'Dateentered' => 18, 'Lastsaledate' => 19, 'Errormsg' => 20, 'Dummy' => 21, ),
        self::TYPE_CAMELNAME     => array('sessionid' => 0, 'recno' => 1, 'date' => 2, 'time' => 3, 'custid' => 4, 'custname' => 5, 'caddress' => 6, 'caddress2' => 7, 'caddress3' => 8, 'ccity' => 9, 'cst' => 10, 'czip' => 11, 'ccountry' => 12, 'cphone' => 13, 'csalesrep' => 14, 'csalesrepname' => 15, 'ctype' => 16, 'nbrshipto' => 17, 'dateentered' => 18, 'lastsaledate' => 19, 'errormsg' => 20, 'dummy' => 21, ),
        self::TYPE_COLNAME       => array(CustomerTableMap::COL_SESSIONID => 0, CustomerTableMap::COL_RECNO => 1, CustomerTableMap::COL_DATE => 2, CustomerTableMap::COL_TIME => 3, CustomerTableMap::COL_CUSTID => 4, CustomerTableMap::COL_CUSTNAME => 5, CustomerTableMap::COL_CADDRESS => 6, CustomerTableMap::COL_CADDRESS2 => 7, CustomerTableMap::COL_CADDRESS3 => 8, CustomerTableMap::COL_CCITY => 9, CustomerTableMap::COL_CST => 10, CustomerTableMap::COL_CZIP => 11, CustomerTableMap::COL_CCOUNTRY => 12, CustomerTableMap::COL_CPHONE => 13, CustomerTableMap::COL_CSALESREP => 14, CustomerTableMap::COL_CSALESREPNAME => 15, CustomerTableMap::COL_CTYPE => 16, CustomerTableMap::COL_NBRSHIPTO => 17, CustomerTableMap::COL_DATEENTERED => 18, CustomerTableMap::COL_LASTSALEDATE => 19, CustomerTableMap::COL_ERRORMSG => 20, CustomerTableMap::COL_DUMMY => 21, ),
        self::TYPE_FIELDNAME     => array('sessionid' => 0, 'recno' => 1, 'date' => 2, 'time' => 3, 'custid' => 4, 'custname' => 5, 'caddress' => 6, 'caddress2' => 7, 'caddress3' => 8, 'ccity' => 9, 'cst' => 10, 'czip' => 11, 'ccountry' => 12, 'cphone' => 13, 'csalesrep' => 14, 'csalesrepname' => 15, 'ctype' => 16, 'nbrshipto' => 17, 'dateentered' => 18, 'lastsaledate' => 19, 'errormsg' => 20, 'dummy' => 21, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
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
        $this->setName('customer');
        $this->setPhpName('Customer');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Customer');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('sessionid', 'Sessionid', 'VARCHAR', true, 50, null);
        $this->addPrimaryKey('recno', 'Recno', 'INTEGER', true, 10, null);
        $this->addColumn('date', 'Date', 'INTEGER', false, 8, null);
        $this->addColumn('time', 'Time', 'INTEGER', false, 8, null);
        $this->addColumn('custid', 'Custid', 'VARCHAR', false, 6, null);
        $this->addColumn('custname', 'Custname', 'VARCHAR', false, 30, null);
        $this->addColumn('caddress', 'Caddress', 'VARCHAR', false, 30, null);
        $this->addColumn('caddress2', 'Caddress2', 'VARCHAR', false, 30, null);
        $this->addColumn('caddress3', 'Caddress3', 'VARCHAR', false, 30, null);
        $this->addColumn('ccity', 'Ccity', 'VARCHAR', false, 30, null);
        $this->addColumn('cst', 'Cst', 'VARCHAR', false, 2, null);
        $this->addColumn('czip', 'Czip', 'VARCHAR', false, 10, null);
        $this->addColumn('ccountry', 'Ccountry', 'VARCHAR', false, 30, null);
        $this->addColumn('cphone', 'Cphone', 'VARCHAR', false, 20, null);
        $this->addColumn('csalesrep', 'Csalesrep', 'VARCHAR', false, 6, null);
        $this->addColumn('csalesrepname', 'Csalesrepname', 'VARCHAR', false, 30, null);
        $this->addColumn('ctype', 'Ctype', 'VARCHAR', false, 20, null);
        $this->addColumn('nbrshipto', 'Nbrshipto', 'INTEGER', false, 8, null);
        $this->addColumn('dateentered', 'Dateentered', 'VARCHAR', false, 10, null);
        $this->addColumn('lastsaledate', 'Lastsaledate', 'VARCHAR', false, 10, null);
        $this->addColumn('errormsg', 'Errormsg', 'VARCHAR', false, 30, null);
        $this->addColumn('dummy', 'Dummy', 'VARCHAR', false, 1, null);
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
     * @param \Customer $obj A \Customer object.
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
     * @param mixed $value A \Customer object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Customer) {
                $key = serialize([(null === $value->getSessionid() || is_scalar($value->getSessionid()) || is_callable([$value->getSessionid(), '__toString']) ? (string) $value->getSessionid() : $value->getSessionid()), (null === $value->getRecno() || is_scalar($value->getRecno()) || is_callable([$value->getRecno(), '__toString']) ? (string) $value->getRecno() : $value->getRecno())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Customer object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        return $withPrefix ? CustomerTableMap::CLASS_DEFAULT : CustomerTableMap::OM_CLASS;
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
     * @return array           (Customer object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = CustomerTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CustomerTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CustomerTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CustomerTableMap::OM_CLASS;
            /** @var Customer $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CustomerTableMap::addInstanceToPool($obj, $key);
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
            $key = CustomerTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CustomerTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Customer $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CustomerTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(CustomerTableMap::COL_SESSIONID);
            $criteria->addSelectColumn(CustomerTableMap::COL_RECNO);
            $criteria->addSelectColumn(CustomerTableMap::COL_DATE);
            $criteria->addSelectColumn(CustomerTableMap::COL_TIME);
            $criteria->addSelectColumn(CustomerTableMap::COL_CUSTID);
            $criteria->addSelectColumn(CustomerTableMap::COL_CUSTNAME);
            $criteria->addSelectColumn(CustomerTableMap::COL_CADDRESS);
            $criteria->addSelectColumn(CustomerTableMap::COL_CADDRESS2);
            $criteria->addSelectColumn(CustomerTableMap::COL_CADDRESS3);
            $criteria->addSelectColumn(CustomerTableMap::COL_CCITY);
            $criteria->addSelectColumn(CustomerTableMap::COL_CST);
            $criteria->addSelectColumn(CustomerTableMap::COL_CZIP);
            $criteria->addSelectColumn(CustomerTableMap::COL_CCOUNTRY);
            $criteria->addSelectColumn(CustomerTableMap::COL_CPHONE);
            $criteria->addSelectColumn(CustomerTableMap::COL_CSALESREP);
            $criteria->addSelectColumn(CustomerTableMap::COL_CSALESREPNAME);
            $criteria->addSelectColumn(CustomerTableMap::COL_CTYPE);
            $criteria->addSelectColumn(CustomerTableMap::COL_NBRSHIPTO);
            $criteria->addSelectColumn(CustomerTableMap::COL_DATEENTERED);
            $criteria->addSelectColumn(CustomerTableMap::COL_LASTSALEDATE);
            $criteria->addSelectColumn(CustomerTableMap::COL_ERRORMSG);
            $criteria->addSelectColumn(CustomerTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.sessionid');
            $criteria->addSelectColumn($alias . '.recno');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.time');
            $criteria->addSelectColumn($alias . '.custid');
            $criteria->addSelectColumn($alias . '.custname');
            $criteria->addSelectColumn($alias . '.caddress');
            $criteria->addSelectColumn($alias . '.caddress2');
            $criteria->addSelectColumn($alias . '.caddress3');
            $criteria->addSelectColumn($alias . '.ccity');
            $criteria->addSelectColumn($alias . '.cst');
            $criteria->addSelectColumn($alias . '.czip');
            $criteria->addSelectColumn($alias . '.ccountry');
            $criteria->addSelectColumn($alias . '.cphone');
            $criteria->addSelectColumn($alias . '.csalesrep');
            $criteria->addSelectColumn($alias . '.csalesrepname');
            $criteria->addSelectColumn($alias . '.ctype');
            $criteria->addSelectColumn($alias . '.nbrshipto');
            $criteria->addSelectColumn($alias . '.dateentered');
            $criteria->addSelectColumn($alias . '.lastsaledate');
            $criteria->addSelectColumn($alias . '.errormsg');
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
        return Propel::getServiceContainer()->getDatabaseMap(CustomerTableMap::DATABASE_NAME)->getTable(CustomerTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(CustomerTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(CustomerTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new CustomerTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Customer or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Customer object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(CustomerTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Customer) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CustomerTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(CustomerTableMap::COL_SESSIONID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(CustomerTableMap::COL_RECNO, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = CustomerQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CustomerTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CustomerTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the customer table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return CustomerQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Customer or Criteria object.
     *
     * @param mixed               $criteria Criteria or Customer object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CustomerTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Customer object
        }


        // Set the correct dbName
        $query = CustomerQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // CustomerTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
CustomerTableMap::buildTableMap();
