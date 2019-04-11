<?php

namespace Map;

use \Advsrch;
use \AdvsrchQuery;
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
 * This class defines the structure of the 'advsrch' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AdvsrchTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.AdvsrchTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'advsrch';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Advsrch';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Advsrch';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 13;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 13;

    /**
     * the column name for the recordno field
     */
    const COL_RECORDNO = 'advsrch.recordno';

    /**
     * the column name for the catid field
     */
    const COL_CATID = 'advsrch.catid';

    /**
     * the column name for the cat1 field
     */
    const COL_CAT1 = 'advsrch.cat1';

    /**
     * the column name for the cat2 field
     */
    const COL_CAT2 = 'advsrch.cat2';

    /**
     * the column name for the cat3 field
     */
    const COL_CAT3 = 'advsrch.cat3';

    /**
     * the column name for the cat4 field
     */
    const COL_CAT4 = 'advsrch.cat4';

    /**
     * the column name for the cat5 field
     */
    const COL_CAT5 = 'advsrch.cat5';

    /**
     * the column name for the optcode field
     */
    const COL_OPTCODE = 'advsrch.optcode';

    /**
     * the column name for the adsrchfield field
     */
    const COL_ADSRCHFIELD = 'advsrch.adsrchfield';

    /**
     * the column name for the optcodedesc1 field
     */
    const COL_OPTCODEDESC1 = 'advsrch.optcodedesc1';

    /**
     * the column name for the optcodedesc2 field
     */
    const COL_OPTCODEDESC2 = 'advsrch.optcodedesc2';

    /**
     * the column name for the adsrchtype field
     */
    const COL_ADSRCHTYPE = 'advsrch.adsrchtype';

    /**
     * the column name for the dummy field
     */
    const COL_DUMMY = 'advsrch.dummy';

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
        self::TYPE_PHPNAME       => array('Recordno', 'Catid', 'Cat1', 'Cat2', 'Cat3', 'Cat4', 'Cat5', 'Optcode', 'Adsrchfield', 'Optcodedesc1', 'Optcodedesc2', 'Adsrchtype', 'Dummy', ),
        self::TYPE_CAMELNAME     => array('recordno', 'catid', 'cat1', 'cat2', 'cat3', 'cat4', 'cat5', 'optcode', 'adsrchfield', 'optcodedesc1', 'optcodedesc2', 'adsrchtype', 'dummy', ),
        self::TYPE_COLNAME       => array(AdvsrchTableMap::COL_RECORDNO, AdvsrchTableMap::COL_CATID, AdvsrchTableMap::COL_CAT1, AdvsrchTableMap::COL_CAT2, AdvsrchTableMap::COL_CAT3, AdvsrchTableMap::COL_CAT4, AdvsrchTableMap::COL_CAT5, AdvsrchTableMap::COL_OPTCODE, AdvsrchTableMap::COL_ADSRCHFIELD, AdvsrchTableMap::COL_OPTCODEDESC1, AdvsrchTableMap::COL_OPTCODEDESC2, AdvsrchTableMap::COL_ADSRCHTYPE, AdvsrchTableMap::COL_DUMMY, ),
        self::TYPE_FIELDNAME     => array('recordno', 'catid', 'cat1', 'cat2', 'cat3', 'cat4', 'cat5', 'optcode', 'adsrchfield', 'optcodedesc1', 'optcodedesc2', 'adsrchtype', 'dummy', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Recordno' => 0, 'Catid' => 1, 'Cat1' => 2, 'Cat2' => 3, 'Cat3' => 4, 'Cat4' => 5, 'Cat5' => 6, 'Optcode' => 7, 'Adsrchfield' => 8, 'Optcodedesc1' => 9, 'Optcodedesc2' => 10, 'Adsrchtype' => 11, 'Dummy' => 12, ),
        self::TYPE_CAMELNAME     => array('recordno' => 0, 'catid' => 1, 'cat1' => 2, 'cat2' => 3, 'cat3' => 4, 'cat4' => 5, 'cat5' => 6, 'optcode' => 7, 'adsrchfield' => 8, 'optcodedesc1' => 9, 'optcodedesc2' => 10, 'adsrchtype' => 11, 'dummy' => 12, ),
        self::TYPE_COLNAME       => array(AdvsrchTableMap::COL_RECORDNO => 0, AdvsrchTableMap::COL_CATID => 1, AdvsrchTableMap::COL_CAT1 => 2, AdvsrchTableMap::COL_CAT2 => 3, AdvsrchTableMap::COL_CAT3 => 4, AdvsrchTableMap::COL_CAT4 => 5, AdvsrchTableMap::COL_CAT5 => 6, AdvsrchTableMap::COL_OPTCODE => 7, AdvsrchTableMap::COL_ADSRCHFIELD => 8, AdvsrchTableMap::COL_OPTCODEDESC1 => 9, AdvsrchTableMap::COL_OPTCODEDESC2 => 10, AdvsrchTableMap::COL_ADSRCHTYPE => 11, AdvsrchTableMap::COL_DUMMY => 12, ),
        self::TYPE_FIELDNAME     => array('recordno' => 0, 'catid' => 1, 'cat1' => 2, 'cat2' => 3, 'cat3' => 4, 'cat4' => 5, 'cat5' => 6, 'optcode' => 7, 'adsrchfield' => 8, 'optcodedesc1' => 9, 'optcodedesc2' => 10, 'adsrchtype' => 11, 'dummy' => 12, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
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
        $this->setName('advsrch');
        $this->setPhpName('Advsrch');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Advsrch');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('recordno', 'Recordno', 'INTEGER', true, null, null);
        $this->addPrimaryKey('catid', 'Catid', 'VARCHAR', true, 12, null);
        $this->addPrimaryKey('cat1', 'Cat1', 'VARCHAR', true, 12, null);
        $this->addPrimaryKey('cat2', 'Cat2', 'VARCHAR', true, 12, '');
        $this->addPrimaryKey('cat3', 'Cat3', 'VARCHAR', true, 12, '');
        $this->addPrimaryKey('cat4', 'Cat4', 'VARCHAR', true, 12, '');
        $this->addPrimaryKey('cat5', 'Cat5', 'VARCHAR', true, 12, '');
        $this->addPrimaryKey('optcode', 'Optcode', 'VARCHAR', true, 12, '');
        $this->addPrimaryKey('adsrchfield', 'Adsrchfield', 'VARCHAR', true, 20, '');
        $this->addColumn('optcodedesc1', 'Optcodedesc1', 'VARCHAR', false, 30, null);
        $this->addColumn('optcodedesc2', 'Optcodedesc2', 'VARCHAR', false, 30, null);
        $this->addColumn('adsrchtype', 'Adsrchtype', 'VARCHAR', false, 10, null);
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
     * @param \Advsrch $obj A \Advsrch object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getRecordno() || is_scalar($obj->getRecordno()) || is_callable([$obj->getRecordno(), '__toString']) ? (string) $obj->getRecordno() : $obj->getRecordno()), (null === $obj->getCatid() || is_scalar($obj->getCatid()) || is_callable([$obj->getCatid(), '__toString']) ? (string) $obj->getCatid() : $obj->getCatid()), (null === $obj->getCat1() || is_scalar($obj->getCat1()) || is_callable([$obj->getCat1(), '__toString']) ? (string) $obj->getCat1() : $obj->getCat1()), (null === $obj->getCat2() || is_scalar($obj->getCat2()) || is_callable([$obj->getCat2(), '__toString']) ? (string) $obj->getCat2() : $obj->getCat2()), (null === $obj->getCat3() || is_scalar($obj->getCat3()) || is_callable([$obj->getCat3(), '__toString']) ? (string) $obj->getCat3() : $obj->getCat3()), (null === $obj->getCat4() || is_scalar($obj->getCat4()) || is_callable([$obj->getCat4(), '__toString']) ? (string) $obj->getCat4() : $obj->getCat4()), (null === $obj->getCat5() || is_scalar($obj->getCat5()) || is_callable([$obj->getCat5(), '__toString']) ? (string) $obj->getCat5() : $obj->getCat5()), (null === $obj->getOptcode() || is_scalar($obj->getOptcode()) || is_callable([$obj->getOptcode(), '__toString']) ? (string) $obj->getOptcode() : $obj->getOptcode()), (null === $obj->getAdsrchfield() || is_scalar($obj->getAdsrchfield()) || is_callable([$obj->getAdsrchfield(), '__toString']) ? (string) $obj->getAdsrchfield() : $obj->getAdsrchfield())]);
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
     * @param mixed $value A \Advsrch object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Advsrch) {
                $key = serialize([(null === $value->getRecordno() || is_scalar($value->getRecordno()) || is_callable([$value->getRecordno(), '__toString']) ? (string) $value->getRecordno() : $value->getRecordno()), (null === $value->getCatid() || is_scalar($value->getCatid()) || is_callable([$value->getCatid(), '__toString']) ? (string) $value->getCatid() : $value->getCatid()), (null === $value->getCat1() || is_scalar($value->getCat1()) || is_callable([$value->getCat1(), '__toString']) ? (string) $value->getCat1() : $value->getCat1()), (null === $value->getCat2() || is_scalar($value->getCat2()) || is_callable([$value->getCat2(), '__toString']) ? (string) $value->getCat2() : $value->getCat2()), (null === $value->getCat3() || is_scalar($value->getCat3()) || is_callable([$value->getCat3(), '__toString']) ? (string) $value->getCat3() : $value->getCat3()), (null === $value->getCat4() || is_scalar($value->getCat4()) || is_callable([$value->getCat4(), '__toString']) ? (string) $value->getCat4() : $value->getCat4()), (null === $value->getCat5() || is_scalar($value->getCat5()) || is_callable([$value->getCat5(), '__toString']) ? (string) $value->getCat5() : $value->getCat5()), (null === $value->getOptcode() || is_scalar($value->getOptcode()) || is_callable([$value->getOptcode(), '__toString']) ? (string) $value->getOptcode() : $value->getOptcode()), (null === $value->getAdsrchfield() || is_scalar($value->getAdsrchfield()) || is_callable([$value->getAdsrchfield(), '__toString']) ? (string) $value->getAdsrchfield() : $value->getAdsrchfield())]);

            } elseif (is_array($value) && count($value) === 9) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1]), (null === $value[2] || is_scalar($value[2]) || is_callable([$value[2], '__toString']) ? (string) $value[2] : $value[2]), (null === $value[3] || is_scalar($value[3]) || is_callable([$value[3], '__toString']) ? (string) $value[3] : $value[3]), (null === $value[4] || is_scalar($value[4]) || is_callable([$value[4], '__toString']) ? (string) $value[4] : $value[4]), (null === $value[5] || is_scalar($value[5]) || is_callable([$value[5], '__toString']) ? (string) $value[5] : $value[5]), (null === $value[6] || is_scalar($value[6]) || is_callable([$value[6], '__toString']) ? (string) $value[6] : $value[6]), (null === $value[7] || is_scalar($value[7]) || is_callable([$value[7], '__toString']) ? (string) $value[7] : $value[7]), (null === $value[8] || is_scalar($value[8]) || is_callable([$value[8], '__toString']) ? (string) $value[8] : $value[8])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Advsrch object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Recordno', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Catid', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Cat1', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Cat2', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('Cat3', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('Cat4', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 6 + $offset : static::translateFieldName('Cat5', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 7 + $offset : static::translateFieldName('Optcode', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 8 + $offset : static::translateFieldName('Adsrchfield', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Recordno', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Recordno', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Recordno', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Recordno', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Recordno', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Catid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Catid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Catid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Catid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Catid', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Cat1', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Cat1', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Cat1', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Cat1', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Cat1', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Cat2', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Cat2', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Cat2', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Cat2', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 3 + $offset : static::translateFieldName('Cat2', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('Cat3', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('Cat3', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('Cat3', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('Cat3', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 4 + $offset : static::translateFieldName('Cat3', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('Cat4', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('Cat4', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('Cat4', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('Cat4', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('Cat4', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 6 + $offset : static::translateFieldName('Cat5', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 6 + $offset : static::translateFieldName('Cat5', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 6 + $offset : static::translateFieldName('Cat5', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 6 + $offset : static::translateFieldName('Cat5', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 6 + $offset : static::translateFieldName('Cat5', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 7 + $offset : static::translateFieldName('Optcode', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 7 + $offset : static::translateFieldName('Optcode', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 7 + $offset : static::translateFieldName('Optcode', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 7 + $offset : static::translateFieldName('Optcode', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 7 + $offset : static::translateFieldName('Optcode', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 8 + $offset : static::translateFieldName('Adsrchfield', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 8 + $offset : static::translateFieldName('Adsrchfield', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 8 + $offset : static::translateFieldName('Adsrchfield', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 8 + $offset : static::translateFieldName('Adsrchfield', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 8 + $offset : static::translateFieldName('Adsrchfield', TableMap::TYPE_PHPNAME, $indexType)])]);
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

        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Recordno', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 1 + $offset
                : self::translateFieldName('Catid', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 2 + $offset
                : self::translateFieldName('Cat1', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 3 + $offset
                : self::translateFieldName('Cat2', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 4 + $offset
                : self::translateFieldName('Cat3', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 5 + $offset
                : self::translateFieldName('Cat4', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 6 + $offset
                : self::translateFieldName('Cat5', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 7 + $offset
                : self::translateFieldName('Optcode', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 8 + $offset
                : self::translateFieldName('Adsrchfield', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? AdvsrchTableMap::CLASS_DEFAULT : AdvsrchTableMap::OM_CLASS;
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
     * @return array           (Advsrch object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AdvsrchTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AdvsrchTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AdvsrchTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AdvsrchTableMap::OM_CLASS;
            /** @var Advsrch $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AdvsrchTableMap::addInstanceToPool($obj, $key);
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
            $key = AdvsrchTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AdvsrchTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Advsrch $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AdvsrchTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AdvsrchTableMap::COL_RECORDNO);
            $criteria->addSelectColumn(AdvsrchTableMap::COL_CATID);
            $criteria->addSelectColumn(AdvsrchTableMap::COL_CAT1);
            $criteria->addSelectColumn(AdvsrchTableMap::COL_CAT2);
            $criteria->addSelectColumn(AdvsrchTableMap::COL_CAT3);
            $criteria->addSelectColumn(AdvsrchTableMap::COL_CAT4);
            $criteria->addSelectColumn(AdvsrchTableMap::COL_CAT5);
            $criteria->addSelectColumn(AdvsrchTableMap::COL_OPTCODE);
            $criteria->addSelectColumn(AdvsrchTableMap::COL_ADSRCHFIELD);
            $criteria->addSelectColumn(AdvsrchTableMap::COL_OPTCODEDESC1);
            $criteria->addSelectColumn(AdvsrchTableMap::COL_OPTCODEDESC2);
            $criteria->addSelectColumn(AdvsrchTableMap::COL_ADSRCHTYPE);
            $criteria->addSelectColumn(AdvsrchTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.recordno');
            $criteria->addSelectColumn($alias . '.catid');
            $criteria->addSelectColumn($alias . '.cat1');
            $criteria->addSelectColumn($alias . '.cat2');
            $criteria->addSelectColumn($alias . '.cat3');
            $criteria->addSelectColumn($alias . '.cat4');
            $criteria->addSelectColumn($alias . '.cat5');
            $criteria->addSelectColumn($alias . '.optcode');
            $criteria->addSelectColumn($alias . '.adsrchfield');
            $criteria->addSelectColumn($alias . '.optcodedesc1');
            $criteria->addSelectColumn($alias . '.optcodedesc2');
            $criteria->addSelectColumn($alias . '.adsrchtype');
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
        return Propel::getServiceContainer()->getDatabaseMap(AdvsrchTableMap::DATABASE_NAME)->getTable(AdvsrchTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AdvsrchTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AdvsrchTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AdvsrchTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Advsrch or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Advsrch object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AdvsrchTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Advsrch) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AdvsrchTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(AdvsrchTableMap::COL_RECORDNO, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(AdvsrchTableMap::COL_CATID, $value[1]));
                $criterion->addAnd($criteria->getNewCriterion(AdvsrchTableMap::COL_CAT1, $value[2]));
                $criterion->addAnd($criteria->getNewCriterion(AdvsrchTableMap::COL_CAT2, $value[3]));
                $criterion->addAnd($criteria->getNewCriterion(AdvsrchTableMap::COL_CAT3, $value[4]));
                $criterion->addAnd($criteria->getNewCriterion(AdvsrchTableMap::COL_CAT4, $value[5]));
                $criterion->addAnd($criteria->getNewCriterion(AdvsrchTableMap::COL_CAT5, $value[6]));
                $criterion->addAnd($criteria->getNewCriterion(AdvsrchTableMap::COL_OPTCODE, $value[7]));
                $criterion->addAnd($criteria->getNewCriterion(AdvsrchTableMap::COL_ADSRCHFIELD, $value[8]));
                $criteria->addOr($criterion);
            }
        }

        $query = AdvsrchQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AdvsrchTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AdvsrchTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the advsrch table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AdvsrchQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Advsrch or Criteria object.
     *
     * @param mixed               $criteria Criteria or Advsrch object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AdvsrchTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Advsrch object
        }


        // Set the correct dbName
        $query = AdvsrchQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AdvsrchTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AdvsrchTableMap::buildTableMap();
