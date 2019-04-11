<?php

namespace Map;

use \WhseTbl;
use \WhseTblQuery;
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
 * This class defines the structure of the 'whse_tbl' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class WhseTblTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.WhseTblTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'whse_tbl';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\WhseTbl';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'WhseTbl';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 28;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 28;

    /**
     * the column name for the whseid field
     */
    const COL_WHSEID = 'whse_tbl.whseid';

    /**
     * the column name for the whsename field
     */
    const COL_WHSENAME = 'whse_tbl.whsename';

    /**
     * the column name for the whseadr1 field
     */
    const COL_WHSEADR1 = 'whse_tbl.whseadr1';

    /**
     * the column name for the whseadr2 field
     */
    const COL_WHSEADR2 = 'whse_tbl.whseadr2';

    /**
     * the column name for the whsecity field
     */
    const COL_WHSECITY = 'whse_tbl.whsecity';

    /**
     * the column name for the whsestat field
     */
    const COL_WHSESTAT = 'whse_tbl.whsestat';

    /**
     * the column name for the whsezipcode field
     */
    const COL_WHSEZIPCODE = 'whse_tbl.whsezipcode';

    /**
     * the column name for the whsectry field
     */
    const COL_WHSECTRY = 'whse_tbl.whsectry';

    /**
     * the column name for the whseusehandheld field
     */
    const COL_WHSEUSEHANDHELD = 'whse_tbl.whseusehandheld';

    /**
     * the column name for the whsecashcust field
     */
    const COL_WHSECASHCUST = 'whse_tbl.whsecashcust';

    /**
     * the column name for the whsepickdtl field
     */
    const COL_WHSEPICKDTL = 'whse_tbl.whsepickdtl';

    /**
     * the column name for the whseprodbin field
     */
    const COL_WHSEPRODBIN = 'whse_tbl.whseprodbin';

    /**
     * the column name for the whsephone field
     */
    const COL_WHSEPHONE = 'whse_tbl.whsephone';

    /**
     * the column name for the whsephoneext field
     */
    const COL_WHSEPHONEEXT = 'whse_tbl.whsephoneext';

    /**
     * the column name for the whsefax field
     */
    const COL_WHSEFAX = 'whse_tbl.whsefax';

    /**
     * the column name for the whseemailadr field
     */
    const COL_WHSEEMAILADR = 'whse_tbl.whseemailadr';

    /**
     * the column name for the whseqcrgabin field
     */
    const COL_WHSEQCRGABIN = 'whse_tbl.whseqcrgabin';

    /**
     * the column name for the whserfprinter1 field
     */
    const COL_WHSERFPRINTER1 = 'whse_tbl.whserfprinter1';

    /**
     * the column name for the whserfprinter2 field
     */
    const COL_WHSERFPRINTER2 = 'whse_tbl.whserfprinter2';

    /**
     * the column name for the whserfprinter3 field
     */
    const COL_WHSERFPRINTER3 = 'whse_tbl.whserfprinter3';

    /**
     * the column name for the whserfprinter4 field
     */
    const COL_WHSERFPRINTER4 = 'whse_tbl.whserfprinter4';

    /**
     * the column name for the whserfprinter5 field
     */
    const COL_WHSERFPRINTER5 = 'whse_tbl.whserfprinter5';

    /**
     * the column name for the whseprofwhse field
     */
    const COL_WHSEPROFWHSE = 'whse_tbl.whseprofwhse';

    /**
     * the column name for the whseasetwhse field
     */
    const COL_WHSEASETWHSE = 'whse_tbl.whseasetwhse';

    /**
     * the column name for the whseconsignwhse field
     */
    const COL_WHSECONSIGNWHSE = 'whse_tbl.whseconsignwhse';

    /**
     * the column name for the whsebinrangelist field
     */
    const COL_WHSEBINRANGELIST = 'whse_tbl.whsebinrangelist';

    /**
     * the column name for the whsesupplywhse field
     */
    const COL_WHSESUPPLYWHSE = 'whse_tbl.whsesupplywhse';

    /**
     * the column name for the dummy field
     */
    const COL_DUMMY = 'whse_tbl.dummy';

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
        self::TYPE_PHPNAME       => array('Whseid', 'Whsename', 'Whseadr1', 'Whseadr2', 'Whsecity', 'Whsestat', 'Whsezipcode', 'Whsectry', 'Whseusehandheld', 'Whsecashcust', 'Whsepickdtl', 'Whseprodbin', 'Whsephone', 'Whsephoneext', 'Whsefax', 'Whseemailadr', 'Whseqcrgabin', 'Whserfprinter1', 'Whserfprinter2', 'Whserfprinter3', 'Whserfprinter4', 'Whserfprinter5', 'Whseprofwhse', 'Whseasetwhse', 'Whseconsignwhse', 'Whsebinrangelist', 'Whsesupplywhse', 'Dummy', ),
        self::TYPE_CAMELNAME     => array('whseid', 'whsename', 'whseadr1', 'whseadr2', 'whsecity', 'whsestat', 'whsezipcode', 'whsectry', 'whseusehandheld', 'whsecashcust', 'whsepickdtl', 'whseprodbin', 'whsephone', 'whsephoneext', 'whsefax', 'whseemailadr', 'whseqcrgabin', 'whserfprinter1', 'whserfprinter2', 'whserfprinter3', 'whserfprinter4', 'whserfprinter5', 'whseprofwhse', 'whseasetwhse', 'whseconsignwhse', 'whsebinrangelist', 'whsesupplywhse', 'dummy', ),
        self::TYPE_COLNAME       => array(WhseTblTableMap::COL_WHSEID, WhseTblTableMap::COL_WHSENAME, WhseTblTableMap::COL_WHSEADR1, WhseTblTableMap::COL_WHSEADR2, WhseTblTableMap::COL_WHSECITY, WhseTblTableMap::COL_WHSESTAT, WhseTblTableMap::COL_WHSEZIPCODE, WhseTblTableMap::COL_WHSECTRY, WhseTblTableMap::COL_WHSEUSEHANDHELD, WhseTblTableMap::COL_WHSECASHCUST, WhseTblTableMap::COL_WHSEPICKDTL, WhseTblTableMap::COL_WHSEPRODBIN, WhseTblTableMap::COL_WHSEPHONE, WhseTblTableMap::COL_WHSEPHONEEXT, WhseTblTableMap::COL_WHSEFAX, WhseTblTableMap::COL_WHSEEMAILADR, WhseTblTableMap::COL_WHSEQCRGABIN, WhseTblTableMap::COL_WHSERFPRINTER1, WhseTblTableMap::COL_WHSERFPRINTER2, WhseTblTableMap::COL_WHSERFPRINTER3, WhseTblTableMap::COL_WHSERFPRINTER4, WhseTblTableMap::COL_WHSERFPRINTER5, WhseTblTableMap::COL_WHSEPROFWHSE, WhseTblTableMap::COL_WHSEASETWHSE, WhseTblTableMap::COL_WHSECONSIGNWHSE, WhseTblTableMap::COL_WHSEBINRANGELIST, WhseTblTableMap::COL_WHSESUPPLYWHSE, WhseTblTableMap::COL_DUMMY, ),
        self::TYPE_FIELDNAME     => array('whseid', 'whsename', 'whseadr1', 'whseadr2', 'whsecity', 'whsestat', 'whsezipcode', 'whsectry', 'whseusehandheld', 'whsecashcust', 'whsepickdtl', 'whseprodbin', 'whsephone', 'whsephoneext', 'whsefax', 'whseemailadr', 'whseqcrgabin', 'whserfprinter1', 'whserfprinter2', 'whserfprinter3', 'whserfprinter4', 'whserfprinter5', 'whseprofwhse', 'whseasetwhse', 'whseconsignwhse', 'whsebinrangelist', 'whsesupplywhse', 'dummy', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Whseid' => 0, 'Whsename' => 1, 'Whseadr1' => 2, 'Whseadr2' => 3, 'Whsecity' => 4, 'Whsestat' => 5, 'Whsezipcode' => 6, 'Whsectry' => 7, 'Whseusehandheld' => 8, 'Whsecashcust' => 9, 'Whsepickdtl' => 10, 'Whseprodbin' => 11, 'Whsephone' => 12, 'Whsephoneext' => 13, 'Whsefax' => 14, 'Whseemailadr' => 15, 'Whseqcrgabin' => 16, 'Whserfprinter1' => 17, 'Whserfprinter2' => 18, 'Whserfprinter3' => 19, 'Whserfprinter4' => 20, 'Whserfprinter5' => 21, 'Whseprofwhse' => 22, 'Whseasetwhse' => 23, 'Whseconsignwhse' => 24, 'Whsebinrangelist' => 25, 'Whsesupplywhse' => 26, 'Dummy' => 27, ),
        self::TYPE_CAMELNAME     => array('whseid' => 0, 'whsename' => 1, 'whseadr1' => 2, 'whseadr2' => 3, 'whsecity' => 4, 'whsestat' => 5, 'whsezipcode' => 6, 'whsectry' => 7, 'whseusehandheld' => 8, 'whsecashcust' => 9, 'whsepickdtl' => 10, 'whseprodbin' => 11, 'whsephone' => 12, 'whsephoneext' => 13, 'whsefax' => 14, 'whseemailadr' => 15, 'whseqcrgabin' => 16, 'whserfprinter1' => 17, 'whserfprinter2' => 18, 'whserfprinter3' => 19, 'whserfprinter4' => 20, 'whserfprinter5' => 21, 'whseprofwhse' => 22, 'whseasetwhse' => 23, 'whseconsignwhse' => 24, 'whsebinrangelist' => 25, 'whsesupplywhse' => 26, 'dummy' => 27, ),
        self::TYPE_COLNAME       => array(WhseTblTableMap::COL_WHSEID => 0, WhseTblTableMap::COL_WHSENAME => 1, WhseTblTableMap::COL_WHSEADR1 => 2, WhseTblTableMap::COL_WHSEADR2 => 3, WhseTblTableMap::COL_WHSECITY => 4, WhseTblTableMap::COL_WHSESTAT => 5, WhseTblTableMap::COL_WHSEZIPCODE => 6, WhseTblTableMap::COL_WHSECTRY => 7, WhseTblTableMap::COL_WHSEUSEHANDHELD => 8, WhseTblTableMap::COL_WHSECASHCUST => 9, WhseTblTableMap::COL_WHSEPICKDTL => 10, WhseTblTableMap::COL_WHSEPRODBIN => 11, WhseTblTableMap::COL_WHSEPHONE => 12, WhseTblTableMap::COL_WHSEPHONEEXT => 13, WhseTblTableMap::COL_WHSEFAX => 14, WhseTblTableMap::COL_WHSEEMAILADR => 15, WhseTblTableMap::COL_WHSEQCRGABIN => 16, WhseTblTableMap::COL_WHSERFPRINTER1 => 17, WhseTblTableMap::COL_WHSERFPRINTER2 => 18, WhseTblTableMap::COL_WHSERFPRINTER3 => 19, WhseTblTableMap::COL_WHSERFPRINTER4 => 20, WhseTblTableMap::COL_WHSERFPRINTER5 => 21, WhseTblTableMap::COL_WHSEPROFWHSE => 22, WhseTblTableMap::COL_WHSEASETWHSE => 23, WhseTblTableMap::COL_WHSECONSIGNWHSE => 24, WhseTblTableMap::COL_WHSEBINRANGELIST => 25, WhseTblTableMap::COL_WHSESUPPLYWHSE => 26, WhseTblTableMap::COL_DUMMY => 27, ),
        self::TYPE_FIELDNAME     => array('whseid' => 0, 'whsename' => 1, 'whseadr1' => 2, 'whseadr2' => 3, 'whsecity' => 4, 'whsestat' => 5, 'whsezipcode' => 6, 'whsectry' => 7, 'whseusehandheld' => 8, 'whsecashcust' => 9, 'whsepickdtl' => 10, 'whseprodbin' => 11, 'whsephone' => 12, 'whsephoneext' => 13, 'whsefax' => 14, 'whseemailadr' => 15, 'whseqcrgabin' => 16, 'whserfprinter1' => 17, 'whserfprinter2' => 18, 'whserfprinter3' => 19, 'whserfprinter4' => 20, 'whserfprinter5' => 21, 'whseprofwhse' => 22, 'whseasetwhse' => 23, 'whseconsignwhse' => 24, 'whsebinrangelist' => 25, 'whsesupplywhse' => 26, 'dummy' => 27, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, )
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
        $this->setName('whse_tbl');
        $this->setPhpName('WhseTbl');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\WhseTbl');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('whseid', 'Whseid', 'VARCHAR', true, 2, '');
        $this->addColumn('whsename', 'Whsename', 'VARCHAR', false, 30, null);
        $this->addColumn('whseadr1', 'Whseadr1', 'VARCHAR', false, 30, null);
        $this->addColumn('whseadr2', 'Whseadr2', 'VARCHAR', false, 30, null);
        $this->addColumn('whsecity', 'Whsecity', 'VARCHAR', false, 16, null);
        $this->addColumn('whsestat', 'Whsestat', 'VARCHAR', false, 2, null);
        $this->addColumn('whsezipcode', 'Whsezipcode', 'VARCHAR', false, 10, null);
        $this->addColumn('whsectry', 'Whsectry', 'VARCHAR', false, 2, null);
        $this->addColumn('whseusehandheld', 'Whseusehandheld', 'VARCHAR', false, 1, null);
        $this->addColumn('whsecashcust', 'Whsecashcust', 'VARCHAR', false, 6, null);
        $this->addColumn('whsepickdtl', 'Whsepickdtl', 'VARCHAR', false, 1, null);
        $this->addColumn('whseprodbin', 'Whseprodbin', 'VARCHAR', false, 8, null);
        $this->addColumn('whsephone', 'Whsephone', 'VARCHAR', false, 10, null);
        $this->addColumn('whsephoneext', 'Whsephoneext', 'VARCHAR', false, 7, null);
        $this->addColumn('whsefax', 'Whsefax', 'VARCHAR', false, 10, null);
        $this->addColumn('whseemailadr', 'Whseemailadr', 'VARCHAR', false, 50, null);
        $this->addColumn('whseqcrgabin', 'Whseqcrgabin', 'VARCHAR', false, 8, null);
        $this->addColumn('whserfprinter1', 'Whserfprinter1', 'VARCHAR', false, 12, null);
        $this->addColumn('whserfprinter2', 'Whserfprinter2', 'VARCHAR', false, 12, null);
        $this->addColumn('whserfprinter3', 'Whserfprinter3', 'VARCHAR', false, 12, null);
        $this->addColumn('whserfprinter4', 'Whserfprinter4', 'VARCHAR', false, 12, null);
        $this->addColumn('whserfprinter5', 'Whserfprinter5', 'VARCHAR', false, 12, null);
        $this->addColumn('whseprofwhse', 'Whseprofwhse', 'VARCHAR', false, 2, null);
        $this->addColumn('whseasetwhse', 'Whseasetwhse', 'VARCHAR', false, 2, null);
        $this->addColumn('whseconsignwhse', 'Whseconsignwhse', 'VARCHAR', false, 2, null);
        $this->addColumn('whsebinrangelist', 'Whsebinrangelist', 'VARCHAR', false, 1, null);
        $this->addColumn('whsesupplywhse', 'Whsesupplywhse', 'VARCHAR', false, 2, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Whseid', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Whseid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Whseid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Whseid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Whseid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Whseid', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Whseid', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? WhseTblTableMap::CLASS_DEFAULT : WhseTblTableMap::OM_CLASS;
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
     * @return array           (WhseTbl object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = WhseTblTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = WhseTblTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + WhseTblTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = WhseTblTableMap::OM_CLASS;
            /** @var WhseTbl $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            WhseTblTableMap::addInstanceToPool($obj, $key);
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
            $key = WhseTblTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = WhseTblTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var WhseTbl $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                WhseTblTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(WhseTblTableMap::COL_WHSEID);
            $criteria->addSelectColumn(WhseTblTableMap::COL_WHSENAME);
            $criteria->addSelectColumn(WhseTblTableMap::COL_WHSEADR1);
            $criteria->addSelectColumn(WhseTblTableMap::COL_WHSEADR2);
            $criteria->addSelectColumn(WhseTblTableMap::COL_WHSECITY);
            $criteria->addSelectColumn(WhseTblTableMap::COL_WHSESTAT);
            $criteria->addSelectColumn(WhseTblTableMap::COL_WHSEZIPCODE);
            $criteria->addSelectColumn(WhseTblTableMap::COL_WHSECTRY);
            $criteria->addSelectColumn(WhseTblTableMap::COL_WHSEUSEHANDHELD);
            $criteria->addSelectColumn(WhseTblTableMap::COL_WHSECASHCUST);
            $criteria->addSelectColumn(WhseTblTableMap::COL_WHSEPICKDTL);
            $criteria->addSelectColumn(WhseTblTableMap::COL_WHSEPRODBIN);
            $criteria->addSelectColumn(WhseTblTableMap::COL_WHSEPHONE);
            $criteria->addSelectColumn(WhseTblTableMap::COL_WHSEPHONEEXT);
            $criteria->addSelectColumn(WhseTblTableMap::COL_WHSEFAX);
            $criteria->addSelectColumn(WhseTblTableMap::COL_WHSEEMAILADR);
            $criteria->addSelectColumn(WhseTblTableMap::COL_WHSEQCRGABIN);
            $criteria->addSelectColumn(WhseTblTableMap::COL_WHSERFPRINTER1);
            $criteria->addSelectColumn(WhseTblTableMap::COL_WHSERFPRINTER2);
            $criteria->addSelectColumn(WhseTblTableMap::COL_WHSERFPRINTER3);
            $criteria->addSelectColumn(WhseTblTableMap::COL_WHSERFPRINTER4);
            $criteria->addSelectColumn(WhseTblTableMap::COL_WHSERFPRINTER5);
            $criteria->addSelectColumn(WhseTblTableMap::COL_WHSEPROFWHSE);
            $criteria->addSelectColumn(WhseTblTableMap::COL_WHSEASETWHSE);
            $criteria->addSelectColumn(WhseTblTableMap::COL_WHSECONSIGNWHSE);
            $criteria->addSelectColumn(WhseTblTableMap::COL_WHSEBINRANGELIST);
            $criteria->addSelectColumn(WhseTblTableMap::COL_WHSESUPPLYWHSE);
            $criteria->addSelectColumn(WhseTblTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.whseid');
            $criteria->addSelectColumn($alias . '.whsename');
            $criteria->addSelectColumn($alias . '.whseadr1');
            $criteria->addSelectColumn($alias . '.whseadr2');
            $criteria->addSelectColumn($alias . '.whsecity');
            $criteria->addSelectColumn($alias . '.whsestat');
            $criteria->addSelectColumn($alias . '.whsezipcode');
            $criteria->addSelectColumn($alias . '.whsectry');
            $criteria->addSelectColumn($alias . '.whseusehandheld');
            $criteria->addSelectColumn($alias . '.whsecashcust');
            $criteria->addSelectColumn($alias . '.whsepickdtl');
            $criteria->addSelectColumn($alias . '.whseprodbin');
            $criteria->addSelectColumn($alias . '.whsephone');
            $criteria->addSelectColumn($alias . '.whsephoneext');
            $criteria->addSelectColumn($alias . '.whsefax');
            $criteria->addSelectColumn($alias . '.whseemailadr');
            $criteria->addSelectColumn($alias . '.whseqcrgabin');
            $criteria->addSelectColumn($alias . '.whserfprinter1');
            $criteria->addSelectColumn($alias . '.whserfprinter2');
            $criteria->addSelectColumn($alias . '.whserfprinter3');
            $criteria->addSelectColumn($alias . '.whserfprinter4');
            $criteria->addSelectColumn($alias . '.whserfprinter5');
            $criteria->addSelectColumn($alias . '.whseprofwhse');
            $criteria->addSelectColumn($alias . '.whseasetwhse');
            $criteria->addSelectColumn($alias . '.whseconsignwhse');
            $criteria->addSelectColumn($alias . '.whsebinrangelist');
            $criteria->addSelectColumn($alias . '.whsesupplywhse');
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
        return Propel::getServiceContainer()->getDatabaseMap(WhseTblTableMap::DATABASE_NAME)->getTable(WhseTblTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(WhseTblTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(WhseTblTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new WhseTblTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a WhseTbl or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or WhseTbl object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(WhseTblTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \WhseTbl) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(WhseTblTableMap::DATABASE_NAME);
            $criteria->add(WhseTblTableMap::COL_WHSEID, (array) $values, Criteria::IN);
        }

        $query = WhseTblQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            WhseTblTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                WhseTblTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the whse_tbl table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return WhseTblQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a WhseTbl or Criteria object.
     *
     * @param mixed               $criteria Criteria or WhseTbl object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(WhseTblTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from WhseTbl object
        }


        // Set the correct dbName
        $query = WhseTblQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // WhseTblTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
WhseTblTableMap::buildTableMap();
