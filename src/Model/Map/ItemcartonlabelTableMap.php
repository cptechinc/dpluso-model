<?php

namespace Map;

use \Itemcartonlabel;
use \ItemcartonlabelQuery;
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
 * This class defines the structure of the 'itemcartonlabel' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ItemcartonlabelTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ItemcartonlabelTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'itemcartonlabel';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Itemcartonlabel';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Itemcartonlabel';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 15;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 15;

    /**
     * the column name for the sessionid field
     */
    const COL_SESSIONID = 'itemcartonlabel.sessionid';

    /**
     * the column name for the date field
     */
    const COL_DATE = 'itemcartonlabel.date';

    /**
     * the column name for the time field
     */
    const COL_TIME = 'itemcartonlabel.time';

    /**
     * the column name for the itemid field
     */
    const COL_ITEMID = 'itemcartonlabel.itemid';

    /**
     * the column name for the whse field
     */
    const COL_WHSE = 'itemcartonlabel.whse';

    /**
     * the column name for the lotserial field
     */
    const COL_LOTSERIAL = 'itemcartonlabel.lotserial';

    /**
     * the column name for the bin field
     */
    const COL_BIN = 'itemcartonlabel.bin';

    /**
     * the column name for the label_box field
     */
    const COL_LABEL_BOX = 'itemcartonlabel.label_box';

    /**
     * the column name for the printer_box field
     */
    const COL_PRINTER_BOX = 'itemcartonlabel.printer_box';

    /**
     * the column name for the qty_box field
     */
    const COL_QTY_BOX = 'itemcartonlabel.qty_box';

    /**
     * the column name for the nbr_box_labels field
     */
    const COL_NBR_BOX_LABELS = 'itemcartonlabel.nbr_box_labels';

    /**
     * the column name for the label_master field
     */
    const COL_LABEL_MASTER = 'itemcartonlabel.label_master';

    /**
     * the column name for the printer_master field
     */
    const COL_PRINTER_MASTER = 'itemcartonlabel.printer_master';

    /**
     * the column name for the qty_master field
     */
    const COL_QTY_MASTER = 'itemcartonlabel.qty_master';

    /**
     * the column name for the nbr_master_labels field
     */
    const COL_NBR_MASTER_LABELS = 'itemcartonlabel.nbr_master_labels';

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
        self::TYPE_PHPNAME       => array('Sessionid', 'Date', 'Time', 'Itemid', 'Whse', 'Lotserial', 'Bin', 'LabelBox', 'PrinterBox', 'QtyBox', 'NbrBoxLabels', 'LabelMaster', 'PrinterMaster', 'QtyMaster', 'NbrMasterLabels', ),
        self::TYPE_CAMELNAME     => array('sessionid', 'date', 'time', 'itemid', 'whse', 'lotserial', 'bin', 'labelBox', 'printerBox', 'qtyBox', 'nbrBoxLabels', 'labelMaster', 'printerMaster', 'qtyMaster', 'nbrMasterLabels', ),
        self::TYPE_COLNAME       => array(ItemcartonlabelTableMap::COL_SESSIONID, ItemcartonlabelTableMap::COL_DATE, ItemcartonlabelTableMap::COL_TIME, ItemcartonlabelTableMap::COL_ITEMID, ItemcartonlabelTableMap::COL_WHSE, ItemcartonlabelTableMap::COL_LOTSERIAL, ItemcartonlabelTableMap::COL_BIN, ItemcartonlabelTableMap::COL_LABEL_BOX, ItemcartonlabelTableMap::COL_PRINTER_BOX, ItemcartonlabelTableMap::COL_QTY_BOX, ItemcartonlabelTableMap::COL_NBR_BOX_LABELS, ItemcartonlabelTableMap::COL_LABEL_MASTER, ItemcartonlabelTableMap::COL_PRINTER_MASTER, ItemcartonlabelTableMap::COL_QTY_MASTER, ItemcartonlabelTableMap::COL_NBR_MASTER_LABELS, ),
        self::TYPE_FIELDNAME     => array('sessionid', 'date', 'time', 'itemid', 'whse', 'lotserial', 'bin', 'label_box', 'printer_box', 'qty_box', 'nbr_box_labels', 'label_master', 'printer_master', 'qty_master', 'nbr_master_labels', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sessionid' => 0, 'Date' => 1, 'Time' => 2, 'Itemid' => 3, 'Whse' => 4, 'Lotserial' => 5, 'Bin' => 6, 'LabelBox' => 7, 'PrinterBox' => 8, 'QtyBox' => 9, 'NbrBoxLabels' => 10, 'LabelMaster' => 11, 'PrinterMaster' => 12, 'QtyMaster' => 13, 'NbrMasterLabels' => 14, ),
        self::TYPE_CAMELNAME     => array('sessionid' => 0, 'date' => 1, 'time' => 2, 'itemid' => 3, 'whse' => 4, 'lotserial' => 5, 'bin' => 6, 'labelBox' => 7, 'printerBox' => 8, 'qtyBox' => 9, 'nbrBoxLabels' => 10, 'labelMaster' => 11, 'printerMaster' => 12, 'qtyMaster' => 13, 'nbrMasterLabels' => 14, ),
        self::TYPE_COLNAME       => array(ItemcartonlabelTableMap::COL_SESSIONID => 0, ItemcartonlabelTableMap::COL_DATE => 1, ItemcartonlabelTableMap::COL_TIME => 2, ItemcartonlabelTableMap::COL_ITEMID => 3, ItemcartonlabelTableMap::COL_WHSE => 4, ItemcartonlabelTableMap::COL_LOTSERIAL => 5, ItemcartonlabelTableMap::COL_BIN => 6, ItemcartonlabelTableMap::COL_LABEL_BOX => 7, ItemcartonlabelTableMap::COL_PRINTER_BOX => 8, ItemcartonlabelTableMap::COL_QTY_BOX => 9, ItemcartonlabelTableMap::COL_NBR_BOX_LABELS => 10, ItemcartonlabelTableMap::COL_LABEL_MASTER => 11, ItemcartonlabelTableMap::COL_PRINTER_MASTER => 12, ItemcartonlabelTableMap::COL_QTY_MASTER => 13, ItemcartonlabelTableMap::COL_NBR_MASTER_LABELS => 14, ),
        self::TYPE_FIELDNAME     => array('sessionid' => 0, 'date' => 1, 'time' => 2, 'itemid' => 3, 'whse' => 4, 'lotserial' => 5, 'bin' => 6, 'label_box' => 7, 'printer_box' => 8, 'qty_box' => 9, 'nbr_box_labels' => 10, 'label_master' => 11, 'printer_master' => 12, 'qty_master' => 13, 'nbr_master_labels' => 14, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
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
        $this->setName('itemcartonlabel');
        $this->setPhpName('Itemcartonlabel');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Itemcartonlabel');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('sessionid', 'Sessionid', 'VARCHAR', true, 45, null);
        $this->addColumn('date', 'Date', 'INTEGER', false, 8, null);
        $this->addColumn('time', 'Time', 'INTEGER', false, 8, null);
        $this->addColumn('itemid', 'Itemid', 'VARCHAR', false, 45, null);
        $this->addColumn('whse', 'Whse', 'VARCHAR', false, 45, null);
        $this->addColumn('lotserial', 'Lotserial', 'VARCHAR', false, 45, null);
        $this->addColumn('bin', 'Bin', 'VARCHAR', false, 45, null);
        $this->addColumn('label_box', 'LabelBox', 'VARCHAR', false, 45, null);
        $this->addColumn('printer_box', 'PrinterBox', 'VARCHAR', false, 45, null);
        $this->addColumn('qty_box', 'QtyBox', 'INTEGER', false, 4, null);
        $this->addColumn('nbr_box_labels', 'NbrBoxLabels', 'INTEGER', false, 4, null);
        $this->addColumn('label_master', 'LabelMaster', 'VARCHAR', false, 45, null);
        $this->addColumn('printer_master', 'PrinterMaster', 'VARCHAR', false, 45, null);
        $this->addColumn('qty_master', 'QtyMaster', 'INTEGER', false, 4, null);
        $this->addColumn('nbr_master_labels', 'NbrMasterLabels', 'INTEGER', false, 4, null);
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
        return $withPrefix ? ItemcartonlabelTableMap::CLASS_DEFAULT : ItemcartonlabelTableMap::OM_CLASS;
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
     * @return array           (Itemcartonlabel object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ItemcartonlabelTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ItemcartonlabelTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ItemcartonlabelTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ItemcartonlabelTableMap::OM_CLASS;
            /** @var Itemcartonlabel $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ItemcartonlabelTableMap::addInstanceToPool($obj, $key);
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
            $key = ItemcartonlabelTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ItemcartonlabelTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Itemcartonlabel $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ItemcartonlabelTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ItemcartonlabelTableMap::COL_SESSIONID);
            $criteria->addSelectColumn(ItemcartonlabelTableMap::COL_DATE);
            $criteria->addSelectColumn(ItemcartonlabelTableMap::COL_TIME);
            $criteria->addSelectColumn(ItemcartonlabelTableMap::COL_ITEMID);
            $criteria->addSelectColumn(ItemcartonlabelTableMap::COL_WHSE);
            $criteria->addSelectColumn(ItemcartonlabelTableMap::COL_LOTSERIAL);
            $criteria->addSelectColumn(ItemcartonlabelTableMap::COL_BIN);
            $criteria->addSelectColumn(ItemcartonlabelTableMap::COL_LABEL_BOX);
            $criteria->addSelectColumn(ItemcartonlabelTableMap::COL_PRINTER_BOX);
            $criteria->addSelectColumn(ItemcartonlabelTableMap::COL_QTY_BOX);
            $criteria->addSelectColumn(ItemcartonlabelTableMap::COL_NBR_BOX_LABELS);
            $criteria->addSelectColumn(ItemcartonlabelTableMap::COL_LABEL_MASTER);
            $criteria->addSelectColumn(ItemcartonlabelTableMap::COL_PRINTER_MASTER);
            $criteria->addSelectColumn(ItemcartonlabelTableMap::COL_QTY_MASTER);
            $criteria->addSelectColumn(ItemcartonlabelTableMap::COL_NBR_MASTER_LABELS);
        } else {
            $criteria->addSelectColumn($alias . '.sessionid');
            $criteria->addSelectColumn($alias . '.date');
            $criteria->addSelectColumn($alias . '.time');
            $criteria->addSelectColumn($alias . '.itemid');
            $criteria->addSelectColumn($alias . '.whse');
            $criteria->addSelectColumn($alias . '.lotserial');
            $criteria->addSelectColumn($alias . '.bin');
            $criteria->addSelectColumn($alias . '.label_box');
            $criteria->addSelectColumn($alias . '.printer_box');
            $criteria->addSelectColumn($alias . '.qty_box');
            $criteria->addSelectColumn($alias . '.nbr_box_labels');
            $criteria->addSelectColumn($alias . '.label_master');
            $criteria->addSelectColumn($alias . '.printer_master');
            $criteria->addSelectColumn($alias . '.qty_master');
            $criteria->addSelectColumn($alias . '.nbr_master_labels');
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
        return Propel::getServiceContainer()->getDatabaseMap(ItemcartonlabelTableMap::DATABASE_NAME)->getTable(ItemcartonlabelTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ItemcartonlabelTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ItemcartonlabelTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ItemcartonlabelTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Itemcartonlabel or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Itemcartonlabel object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ItemcartonlabelTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Itemcartonlabel) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ItemcartonlabelTableMap::DATABASE_NAME);
            $criteria->add(ItemcartonlabelTableMap::COL_SESSIONID, (array) $values, Criteria::IN);
        }

        $query = ItemcartonlabelQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ItemcartonlabelTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ItemcartonlabelTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the itemcartonlabel table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ItemcartonlabelQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Itemcartonlabel or Criteria object.
     *
     * @param mixed               $criteria Criteria or Itemcartonlabel object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ItemcartonlabelTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Itemcartonlabel object
        }


        // Set the correct dbName
        $query = ItemcartonlabelQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ItemcartonlabelTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ItemcartonlabelTableMap::buildTableMap();
