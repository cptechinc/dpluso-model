<?php

namespace Map;

use \Country;
use \CountryQuery;
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
 * This class defines the structure of the 'country' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class CountryTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = '.Map.CountryTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'country';

    /**
     * The PHP name of this class (PascalCase)
     */
    public const TABLE_PHP_NAME = 'Country';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\Country';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'Country';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 6;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 6;

    /**
     * the column name for the iso field
     */
    public const COL_ISO = 'country.iso';

    /**
     * the column name for the iso2 field
     */
    public const COL_ISO2 = 'country.iso2';

    /**
     * the column name for the name field
     */
    public const COL_NAME = 'country.name';

    /**
     * the column name for the nicename field
     */
    public const COL_NICENAME = 'country.nicename';

    /**
     * the column name for the numcode field
     */
    public const COL_NUMCODE = 'country.numcode';

    /**
     * the column name for the phonecode field
     */
    public const COL_PHONECODE = 'country.phonecode';

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
        self::TYPE_PHPNAME       => ['Iso', 'Iso2', 'Name', 'Nicename', 'Numcode', 'Phonecode', ],
        self::TYPE_CAMELNAME     => ['iso', 'iso2', 'name', 'nicename', 'numcode', 'phonecode', ],
        self::TYPE_COLNAME       => [CountryTableMap::COL_ISO, CountryTableMap::COL_ISO2, CountryTableMap::COL_NAME, CountryTableMap::COL_NICENAME, CountryTableMap::COL_NUMCODE, CountryTableMap::COL_PHONECODE, ],
        self::TYPE_FIELDNAME     => ['iso', 'iso2', 'name', 'nicename', 'numcode', 'phonecode', ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, ]
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
        self::TYPE_PHPNAME       => ['Iso' => 0, 'Iso2' => 1, 'Name' => 2, 'Nicename' => 3, 'Numcode' => 4, 'Phonecode' => 5, ],
        self::TYPE_CAMELNAME     => ['iso' => 0, 'iso2' => 1, 'name' => 2, 'nicename' => 3, 'numcode' => 4, 'phonecode' => 5, ],
        self::TYPE_COLNAME       => [CountryTableMap::COL_ISO => 0, CountryTableMap::COL_ISO2 => 1, CountryTableMap::COL_NAME => 2, CountryTableMap::COL_NICENAME => 3, CountryTableMap::COL_NUMCODE => 4, CountryTableMap::COL_PHONECODE => 5, ],
        self::TYPE_FIELDNAME     => ['iso' => 0, 'iso2' => 1, 'name' => 2, 'nicename' => 3, 'numcode' => 4, 'phonecode' => 5, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Iso' => 'ISO',
        'Country.Iso' => 'ISO',
        'iso' => 'ISO',
        'country.iso' => 'ISO',
        'CountryTableMap::COL_ISO' => 'ISO',
        'COL_ISO' => 'ISO',
        'Iso2' => 'ISO2',
        'Country.Iso2' => 'ISO2',
        'iso2' => 'ISO2',
        'country.iso2' => 'ISO2',
        'CountryTableMap::COL_ISO2' => 'ISO2',
        'COL_ISO2' => 'ISO2',
        'Name' => 'NAME',
        'Country.Name' => 'NAME',
        'name' => 'NAME',
        'country.name' => 'NAME',
        'CountryTableMap::COL_NAME' => 'NAME',
        'COL_NAME' => 'NAME',
        'Nicename' => 'NICENAME',
        'Country.Nicename' => 'NICENAME',
        'nicename' => 'NICENAME',
        'country.nicename' => 'NICENAME',
        'CountryTableMap::COL_NICENAME' => 'NICENAME',
        'COL_NICENAME' => 'NICENAME',
        'Numcode' => 'NUMCODE',
        'Country.Numcode' => 'NUMCODE',
        'numcode' => 'NUMCODE',
        'country.numcode' => 'NUMCODE',
        'CountryTableMap::COL_NUMCODE' => 'NUMCODE',
        'COL_NUMCODE' => 'NUMCODE',
        'Phonecode' => 'PHONECODE',
        'Country.Phonecode' => 'PHONECODE',
        'phonecode' => 'PHONECODE',
        'country.phonecode' => 'PHONECODE',
        'CountryTableMap::COL_PHONECODE' => 'PHONECODE',
        'COL_PHONECODE' => 'PHONECODE',
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
        $this->setName('country');
        $this->setPhpName('Country');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Country');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('iso', 'Iso', 'CHAR', true, 3, null);
        $this->addColumn('iso2', 'Iso2', 'CHAR', true, 2, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 80, null);
        $this->addColumn('nicename', 'Nicename', 'VARCHAR', true, 80, null);
        $this->addColumn('numcode', 'Numcode', 'SMALLINT', false, null, null);
        $this->addColumn('phonecode', 'Phonecode', 'INTEGER', true, 5, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Iso', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Iso', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Iso', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Iso', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Iso', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Iso', TableMap::TYPE_PHPNAME, $indexType)];
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
        return (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Iso', TableMap::TYPE_PHPNAME, $indexType)
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
     * @param bool $withPrefix Whether to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass(bool $withPrefix = true): string
    {
        return $withPrefix ? CountryTableMap::CLASS_DEFAULT : CountryTableMap::OM_CLASS;
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
     * @return array (Country object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = CountryTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CountryTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CountryTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CountryTableMap::OM_CLASS;
            /** @var Country $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CountryTableMap::addInstanceToPool($obj, $key);
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
            $key = CountryTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CountryTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Country $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CountryTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(CountryTableMap::COL_ISO);
            $criteria->addSelectColumn(CountryTableMap::COL_ISO2);
            $criteria->addSelectColumn(CountryTableMap::COL_NAME);
            $criteria->addSelectColumn(CountryTableMap::COL_NICENAME);
            $criteria->addSelectColumn(CountryTableMap::COL_NUMCODE);
            $criteria->addSelectColumn(CountryTableMap::COL_PHONECODE);
        } else {
            $criteria->addSelectColumn($alias . '.iso');
            $criteria->addSelectColumn($alias . '.iso2');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.nicename');
            $criteria->addSelectColumn($alias . '.numcode');
            $criteria->addSelectColumn($alias . '.phonecode');
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
            $criteria->removeSelectColumn(CountryTableMap::COL_ISO);
            $criteria->removeSelectColumn(CountryTableMap::COL_ISO2);
            $criteria->removeSelectColumn(CountryTableMap::COL_NAME);
            $criteria->removeSelectColumn(CountryTableMap::COL_NICENAME);
            $criteria->removeSelectColumn(CountryTableMap::COL_NUMCODE);
            $criteria->removeSelectColumn(CountryTableMap::COL_PHONECODE);
        } else {
            $criteria->removeSelectColumn($alias . '.iso');
            $criteria->removeSelectColumn($alias . '.iso2');
            $criteria->removeSelectColumn($alias . '.name');
            $criteria->removeSelectColumn($alias . '.nicename');
            $criteria->removeSelectColumn($alias . '.numcode');
            $criteria->removeSelectColumn($alias . '.phonecode');
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
        return Propel::getServiceContainer()->getDatabaseMap(CountryTableMap::DATABASE_NAME)->getTable(CountryTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Country or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or Country object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(CountryTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Country) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CountryTableMap::DATABASE_NAME);
            $criteria->add(CountryTableMap::COL_ISO, (array) $values, Criteria::IN);
        }

        $query = CountryQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            CountryTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                CountryTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the country table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return CountryQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Country or Criteria object.
     *
     * @param mixed $criteria Criteria or Country object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CountryTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Country object
        }


        // Set the correct dbName
        $query = CountryQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
