<?php

namespace Map;

use \Useractions;
use \UseractionsQuery;
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
 * This class defines the structure of the 'useractions' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class UseractionsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.UseractionsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'useractions';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Useractions';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Useractions';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 24;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 24;

    /**
     * the column name for the id field
     */
    const COL_ID = 'useractions.id';

    /**
     * the column name for the datecreated field
     */
    const COL_DATECREATED = 'useractions.datecreated';

    /**
     * the column name for the actiontype field
     */
    const COL_ACTIONTYPE = 'useractions.actiontype';

    /**
     * the column name for the actionsubtype field
     */
    const COL_ACTIONSUBTYPE = 'useractions.actionsubtype';

    /**
     * the column name for the duedate field
     */
    const COL_DUEDATE = 'useractions.duedate';

    /**
     * the column name for the createdby field
     */
    const COL_CREATEDBY = 'useractions.createdby';

    /**
     * the column name for the assignedto field
     */
    const COL_ASSIGNEDTO = 'useractions.assignedto';

    /**
     * the column name for the assignedby field
     */
    const COL_ASSIGNEDBY = 'useractions.assignedby';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'useractions.title';

    /**
     * the column name for the textbody field
     */
    const COL_TEXTBODY = 'useractions.textbody';

    /**
     * the column name for the reflectnote field
     */
    const COL_REFLECTNOTE = 'useractions.reflectnote';

    /**
     * the column name for the completed field
     */
    const COL_COMPLETED = 'useractions.completed';

    /**
     * the column name for the datecompleted field
     */
    const COL_DATECOMPLETED = 'useractions.datecompleted';

    /**
     * the column name for the dateupdated field
     */
    const COL_DATEUPDATED = 'useractions.dateupdated';

    /**
     * the column name for the customerlink field
     */
    const COL_CUSTOMERLINK = 'useractions.customerlink';

    /**
     * the column name for the shiptolink field
     */
    const COL_SHIPTOLINK = 'useractions.shiptolink';

    /**
     * the column name for the contactlink field
     */
    const COL_CONTACTLINK = 'useractions.contactlink';

    /**
     * the column name for the salesorderlink field
     */
    const COL_SALESORDERLINK = 'useractions.salesorderlink';

    /**
     * the column name for the quotelink field
     */
    const COL_QUOTELINK = 'useractions.quotelink';

    /**
     * the column name for the vendorlink field
     */
    const COL_VENDORLINK = 'useractions.vendorlink';

    /**
     * the column name for the vendorshipfromlink field
     */
    const COL_VENDORSHIPFROMLINK = 'useractions.vendorshipfromlink';

    /**
     * the column name for the purchaseorderlink field
     */
    const COL_PURCHASEORDERLINK = 'useractions.purchaseorderlink';

    /**
     * the column name for the actionlink field
     */
    const COL_ACTIONLINK = 'useractions.actionlink';

    /**
     * the column name for the rescheduledlink field
     */
    const COL_RESCHEDULEDLINK = 'useractions.rescheduledlink';

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
        self::TYPE_PHPNAME       => array('Id', 'Datecreated', 'Actiontype', 'Actionsubtype', 'Duedate', 'Createdby', 'Assignedto', 'Assignedby', 'Title', 'Textbody', 'Reflectnote', 'Completed', 'Datecompleted', 'Dateupdated', 'Customerlink', 'Shiptolink', 'Contactlink', 'Salesorderlink', 'Quotelink', 'Vendorlink', 'Vendorshipfromlink', 'Purchaseorderlink', 'Actionlink', 'Rescheduledlink', ),
        self::TYPE_CAMELNAME     => array('id', 'datecreated', 'actiontype', 'actionsubtype', 'duedate', 'createdby', 'assignedto', 'assignedby', 'title', 'textbody', 'reflectnote', 'completed', 'datecompleted', 'dateupdated', 'customerlink', 'shiptolink', 'contactlink', 'salesorderlink', 'quotelink', 'vendorlink', 'vendorshipfromlink', 'purchaseorderlink', 'actionlink', 'rescheduledlink', ),
        self::TYPE_COLNAME       => array(UseractionsTableMap::COL_ID, UseractionsTableMap::COL_DATECREATED, UseractionsTableMap::COL_ACTIONTYPE, UseractionsTableMap::COL_ACTIONSUBTYPE, UseractionsTableMap::COL_DUEDATE, UseractionsTableMap::COL_CREATEDBY, UseractionsTableMap::COL_ASSIGNEDTO, UseractionsTableMap::COL_ASSIGNEDBY, UseractionsTableMap::COL_TITLE, UseractionsTableMap::COL_TEXTBODY, UseractionsTableMap::COL_REFLECTNOTE, UseractionsTableMap::COL_COMPLETED, UseractionsTableMap::COL_DATECOMPLETED, UseractionsTableMap::COL_DATEUPDATED, UseractionsTableMap::COL_CUSTOMERLINK, UseractionsTableMap::COL_SHIPTOLINK, UseractionsTableMap::COL_CONTACTLINK, UseractionsTableMap::COL_SALESORDERLINK, UseractionsTableMap::COL_QUOTELINK, UseractionsTableMap::COL_VENDORLINK, UseractionsTableMap::COL_VENDORSHIPFROMLINK, UseractionsTableMap::COL_PURCHASEORDERLINK, UseractionsTableMap::COL_ACTIONLINK, UseractionsTableMap::COL_RESCHEDULEDLINK, ),
        self::TYPE_FIELDNAME     => array('id', 'datecreated', 'actiontype', 'actionsubtype', 'duedate', 'createdby', 'assignedto', 'assignedby', 'title', 'textbody', 'reflectnote', 'completed', 'datecompleted', 'dateupdated', 'customerlink', 'shiptolink', 'contactlink', 'salesorderlink', 'quotelink', 'vendorlink', 'vendorshipfromlink', 'purchaseorderlink', 'actionlink', 'rescheduledlink', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Datecreated' => 1, 'Actiontype' => 2, 'Actionsubtype' => 3, 'Duedate' => 4, 'Createdby' => 5, 'Assignedto' => 6, 'Assignedby' => 7, 'Title' => 8, 'Textbody' => 9, 'Reflectnote' => 10, 'Completed' => 11, 'Datecompleted' => 12, 'Dateupdated' => 13, 'Customerlink' => 14, 'Shiptolink' => 15, 'Contactlink' => 16, 'Salesorderlink' => 17, 'Quotelink' => 18, 'Vendorlink' => 19, 'Vendorshipfromlink' => 20, 'Purchaseorderlink' => 21, 'Actionlink' => 22, 'Rescheduledlink' => 23, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'datecreated' => 1, 'actiontype' => 2, 'actionsubtype' => 3, 'duedate' => 4, 'createdby' => 5, 'assignedto' => 6, 'assignedby' => 7, 'title' => 8, 'textbody' => 9, 'reflectnote' => 10, 'completed' => 11, 'datecompleted' => 12, 'dateupdated' => 13, 'customerlink' => 14, 'shiptolink' => 15, 'contactlink' => 16, 'salesorderlink' => 17, 'quotelink' => 18, 'vendorlink' => 19, 'vendorshipfromlink' => 20, 'purchaseorderlink' => 21, 'actionlink' => 22, 'rescheduledlink' => 23, ),
        self::TYPE_COLNAME       => array(UseractionsTableMap::COL_ID => 0, UseractionsTableMap::COL_DATECREATED => 1, UseractionsTableMap::COL_ACTIONTYPE => 2, UseractionsTableMap::COL_ACTIONSUBTYPE => 3, UseractionsTableMap::COL_DUEDATE => 4, UseractionsTableMap::COL_CREATEDBY => 5, UseractionsTableMap::COL_ASSIGNEDTO => 6, UseractionsTableMap::COL_ASSIGNEDBY => 7, UseractionsTableMap::COL_TITLE => 8, UseractionsTableMap::COL_TEXTBODY => 9, UseractionsTableMap::COL_REFLECTNOTE => 10, UseractionsTableMap::COL_COMPLETED => 11, UseractionsTableMap::COL_DATECOMPLETED => 12, UseractionsTableMap::COL_DATEUPDATED => 13, UseractionsTableMap::COL_CUSTOMERLINK => 14, UseractionsTableMap::COL_SHIPTOLINK => 15, UseractionsTableMap::COL_CONTACTLINK => 16, UseractionsTableMap::COL_SALESORDERLINK => 17, UseractionsTableMap::COL_QUOTELINK => 18, UseractionsTableMap::COL_VENDORLINK => 19, UseractionsTableMap::COL_VENDORSHIPFROMLINK => 20, UseractionsTableMap::COL_PURCHASEORDERLINK => 21, UseractionsTableMap::COL_ACTIONLINK => 22, UseractionsTableMap::COL_RESCHEDULEDLINK => 23, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'datecreated' => 1, 'actiontype' => 2, 'actionsubtype' => 3, 'duedate' => 4, 'createdby' => 5, 'assignedto' => 6, 'assignedby' => 7, 'title' => 8, 'textbody' => 9, 'reflectnote' => 10, 'completed' => 11, 'datecompleted' => 12, 'dateupdated' => 13, 'customerlink' => 14, 'shiptolink' => 15, 'contactlink' => 16, 'salesorderlink' => 17, 'quotelink' => 18, 'vendorlink' => 19, 'vendorshipfromlink' => 20, 'purchaseorderlink' => 21, 'actionlink' => 22, 'rescheduledlink' => 23, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
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
        $this->setName('useractions');
        $this->setPhpName('Useractions');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Useractions');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('datecreated', 'Datecreated', 'TIMESTAMP', true, null, null);
        $this->addColumn('actiontype', 'Actiontype', 'VARCHAR', true, 20, null);
        $this->addColumn('actionsubtype', 'Actionsubtype', 'VARCHAR', true, 20, null);
        $this->addColumn('duedate', 'Duedate', 'TIMESTAMP', false, null, null);
        $this->addColumn('createdby', 'Createdby', 'VARCHAR', true, 45, null);
        $this->addColumn('assignedto', 'Assignedto', 'VARCHAR', true, 45, null);
        $this->addColumn('assignedby', 'Assignedby', 'VARCHAR', true, 45, null);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 45, null);
        $this->addColumn('textbody', 'Textbody', 'LONGVARCHAR', true, null, null);
        $this->addColumn('reflectnote', 'Reflectnote', 'LONGVARCHAR', true, null, null);
        $this->addColumn('completed', 'Completed', 'VARCHAR', true, 1, null);
        $this->addColumn('datecompleted', 'Datecompleted', 'TIMESTAMP', false, null, null);
        $this->addColumn('dateupdated', 'Dateupdated', 'TIMESTAMP', false, null, null);
        $this->addColumn('customerlink', 'Customerlink', 'VARCHAR', true, 30, null);
        $this->addColumn('shiptolink', 'Shiptolink', 'VARCHAR', true, 30, null);
        $this->addColumn('contactlink', 'Contactlink', 'VARCHAR', true, 30, null);
        $this->addColumn('salesorderlink', 'Salesorderlink', 'VARCHAR', true, 30, null);
        $this->addColumn('quotelink', 'Quotelink', 'VARCHAR', true, 30, null);
        $this->addColumn('vendorlink', 'Vendorlink', 'VARCHAR', false, 30, null);
        $this->addColumn('vendorshipfromlink', 'Vendorshipfromlink', 'VARCHAR', false, 30, null);
        $this->addColumn('purchaseorderlink', 'Purchaseorderlink', 'VARCHAR', false, 30, null);
        $this->addColumn('actionlink', 'Actionlink', 'VARCHAR', true, 30, null);
        $this->addColumn('rescheduledlink', 'Rescheduledlink', 'VARCHAR', true, 30, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
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
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? UseractionsTableMap::CLASS_DEFAULT : UseractionsTableMap::OM_CLASS;
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
     * @return array           (Useractions object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = UseractionsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = UseractionsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + UseractionsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = UseractionsTableMap::OM_CLASS;
            /** @var Useractions $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            UseractionsTableMap::addInstanceToPool($obj, $key);
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
            $key = UseractionsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = UseractionsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Useractions $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                UseractionsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(UseractionsTableMap::COL_ID);
            $criteria->addSelectColumn(UseractionsTableMap::COL_DATECREATED);
            $criteria->addSelectColumn(UseractionsTableMap::COL_ACTIONTYPE);
            $criteria->addSelectColumn(UseractionsTableMap::COL_ACTIONSUBTYPE);
            $criteria->addSelectColumn(UseractionsTableMap::COL_DUEDATE);
            $criteria->addSelectColumn(UseractionsTableMap::COL_CREATEDBY);
            $criteria->addSelectColumn(UseractionsTableMap::COL_ASSIGNEDTO);
            $criteria->addSelectColumn(UseractionsTableMap::COL_ASSIGNEDBY);
            $criteria->addSelectColumn(UseractionsTableMap::COL_TITLE);
            $criteria->addSelectColumn(UseractionsTableMap::COL_TEXTBODY);
            $criteria->addSelectColumn(UseractionsTableMap::COL_REFLECTNOTE);
            $criteria->addSelectColumn(UseractionsTableMap::COL_COMPLETED);
            $criteria->addSelectColumn(UseractionsTableMap::COL_DATECOMPLETED);
            $criteria->addSelectColumn(UseractionsTableMap::COL_DATEUPDATED);
            $criteria->addSelectColumn(UseractionsTableMap::COL_CUSTOMERLINK);
            $criteria->addSelectColumn(UseractionsTableMap::COL_SHIPTOLINK);
            $criteria->addSelectColumn(UseractionsTableMap::COL_CONTACTLINK);
            $criteria->addSelectColumn(UseractionsTableMap::COL_SALESORDERLINK);
            $criteria->addSelectColumn(UseractionsTableMap::COL_QUOTELINK);
            $criteria->addSelectColumn(UseractionsTableMap::COL_VENDORLINK);
            $criteria->addSelectColumn(UseractionsTableMap::COL_VENDORSHIPFROMLINK);
            $criteria->addSelectColumn(UseractionsTableMap::COL_PURCHASEORDERLINK);
            $criteria->addSelectColumn(UseractionsTableMap::COL_ACTIONLINK);
            $criteria->addSelectColumn(UseractionsTableMap::COL_RESCHEDULEDLINK);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.datecreated');
            $criteria->addSelectColumn($alias . '.actiontype');
            $criteria->addSelectColumn($alias . '.actionsubtype');
            $criteria->addSelectColumn($alias . '.duedate');
            $criteria->addSelectColumn($alias . '.createdby');
            $criteria->addSelectColumn($alias . '.assignedto');
            $criteria->addSelectColumn($alias . '.assignedby');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.textbody');
            $criteria->addSelectColumn($alias . '.reflectnote');
            $criteria->addSelectColumn($alias . '.completed');
            $criteria->addSelectColumn($alias . '.datecompleted');
            $criteria->addSelectColumn($alias . '.dateupdated');
            $criteria->addSelectColumn($alias . '.customerlink');
            $criteria->addSelectColumn($alias . '.shiptolink');
            $criteria->addSelectColumn($alias . '.contactlink');
            $criteria->addSelectColumn($alias . '.salesorderlink');
            $criteria->addSelectColumn($alias . '.quotelink');
            $criteria->addSelectColumn($alias . '.vendorlink');
            $criteria->addSelectColumn($alias . '.vendorshipfromlink');
            $criteria->addSelectColumn($alias . '.purchaseorderlink');
            $criteria->addSelectColumn($alias . '.actionlink');
            $criteria->addSelectColumn($alias . '.rescheduledlink');
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
        return Propel::getServiceContainer()->getDatabaseMap(UseractionsTableMap::DATABASE_NAME)->getTable(UseractionsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(UseractionsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(UseractionsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new UseractionsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Useractions or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Useractions object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(UseractionsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Useractions) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(UseractionsTableMap::DATABASE_NAME);
            $criteria->add(UseractionsTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = UseractionsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            UseractionsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                UseractionsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the useractions table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return UseractionsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Useractions or Criteria object.
     *
     * @param mixed               $criteria Criteria or Useractions object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UseractionsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Useractions object
        }

        if ($criteria->containsKey(UseractionsTableMap::COL_ID) && $criteria->keyContainsValue(UseractionsTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.UseractionsTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = UseractionsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // UseractionsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
UseractionsTableMap::buildTableMap();
