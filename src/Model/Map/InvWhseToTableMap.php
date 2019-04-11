<?php

namespace Map;

use \InvWhseTo;
use \InvWhseToQuery;
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
 * This class defines the structure of the 'inv_whse_to' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class InvWhseToTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.InvWhseToTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'inv_whse_to';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\InvWhseTo';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'InvWhseTo';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 34;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 34;

    /**
     * the column name for the IntbWhseTo field
     */
    const COL_INTBWHSETO = 'inv_whse_to.IntbWhseTo';

    /**
     * the column name for the IntbWhseName field
     */
    const COL_INTBWHSENAME = 'inv_whse_to.IntbWhseName';

    /**
     * the column name for the IntbWhseAdr1 field
     */
    const COL_INTBWHSEADR1 = 'inv_whse_to.IntbWhseAdr1';

    /**
     * the column name for the IntbWhseAdr2 field
     */
    const COL_INTBWHSEADR2 = 'inv_whse_to.IntbWhseAdr2';

    /**
     * the column name for the IntbWhseCity field
     */
    const COL_INTBWHSECITY = 'inv_whse_to.IntbWhseCity';

    /**
     * the column name for the IntbWhseStat field
     */
    const COL_INTBWHSESTAT = 'inv_whse_to.IntbWhseStat';

    /**
     * the column name for the IntbWhseZipCode field
     */
    const COL_INTBWHSEZIPCODE = 'inv_whse_to.IntbWhseZipCode';

    /**
     * the column name for the IntbWhseCtry field
     */
    const COL_INTBWHSECTRY = 'inv_whse_to.IntbWhseCtry';

    /**
     * the column name for the IntbWhseUseHandheld field
     */
    const COL_INTBWHSEUSEHANDHELD = 'inv_whse_to.IntbWhseUseHandheld';

    /**
     * the column name for the IntbWhseCashCust field
     */
    const COL_INTBWHSECASHCUST = 'inv_whse_to.IntbWhseCashCust';

    /**
     * the column name for the IntbWhsePickDtl field
     */
    const COL_INTBWHSEPICKDTL = 'inv_whse_to.IntbWhsePickDtl';

    /**
     * the column name for the IntbWhseProdBin field
     */
    const COL_INTBWHSEPRODBIN = 'inv_whse_to.IntbWhseProdBin';

    /**
     * the column name for the IntbWhsePhArea field
     */
    const COL_INTBWHSEPHAREA = 'inv_whse_to.IntbWhsePhArea';

    /**
     * the column name for the IntbWhsePhFrst3 field
     */
    const COL_INTBWHSEPHFRST3 = 'inv_whse_to.IntbWhsePhFrst3';

    /**
     * the column name for the IntbWhsePhLast4 field
     */
    const COL_INTBWHSEPHLAST4 = 'inv_whse_to.IntbWhsePhLast4';

    /**
     * the column name for the IntbWhsePhExt field
     */
    const COL_INTBWHSEPHEXT = 'inv_whse_to.IntbWhsePhExt';

    /**
     * the column name for the IntbWhseFaxArea field
     */
    const COL_INTBWHSEFAXAREA = 'inv_whse_to.IntbWhseFaxArea';

    /**
     * the column name for the IntbWhseFaxFrst3 field
     */
    const COL_INTBWHSEFAXFRST3 = 'inv_whse_to.IntbWhseFaxFrst3';

    /**
     * the column name for the IntbWhseFaxLast4 field
     */
    const COL_INTBWHSEFAXLAST4 = 'inv_whse_to.IntbWhseFaxLast4';

    /**
     * the column name for the IntbWhseEmailAdr field
     */
    const COL_INTBWHSEEMAILADR = 'inv_whse_to.IntbWhseEmailAdr';

    /**
     * the column name for the IntbWhseQcRgaBin field
     */
    const COL_INTBWHSEQCRGABIN = 'inv_whse_to.IntbWhseQcRgaBin';

    /**
     * the column name for the IntbWhseRfPrinter1 field
     */
    const COL_INTBWHSERFPRINTER1 = 'inv_whse_to.IntbWhseRfPrinter1';

    /**
     * the column name for the IntbWhseRfPrinter2 field
     */
    const COL_INTBWHSERFPRINTER2 = 'inv_whse_to.IntbWhseRfPrinter2';

    /**
     * the column name for the IntbWhseRfPrinter3 field
     */
    const COL_INTBWHSERFPRINTER3 = 'inv_whse_to.IntbWhseRfPrinter3';

    /**
     * the column name for the IntbWhseRfPrinter4 field
     */
    const COL_INTBWHSERFPRINTER4 = 'inv_whse_to.IntbWhseRfPrinter4';

    /**
     * the column name for the IntbWhseRfPrinter5 field
     */
    const COL_INTBWHSERFPRINTER5 = 'inv_whse_to.IntbWhseRfPrinter5';

    /**
     * the column name for the IntbWhseProfWhse field
     */
    const COL_INTBWHSEPROFWHSE = 'inv_whse_to.IntbWhseProfWhse';

    /**
     * the column name for the IntbWhseAsetWhse field
     */
    const COL_INTBWHSEASETWHSE = 'inv_whse_to.IntbWhseAsetWhse';

    /**
     * the column name for the IntbWhseConsignWhse field
     */
    const COL_INTBWHSECONSIGNWHSE = 'inv_whse_to.IntbWhseConsignWhse';

    /**
     * the column name for the IntbWhseBinRangeList field
     */
    const COL_INTBWHSEBINRANGELIST = 'inv_whse_to.IntbWhseBinRangeList';

    /**
     * the column name for the IntbWhseSupplyWhse field
     */
    const COL_INTBWHSESUPPLYWHSE = 'inv_whse_to.IntbWhseSupplyWhse';

    /**
     * the column name for the DateUpdtd field
     */
    const COL_DATEUPDTD = 'inv_whse_to.DateUpdtd';

    /**
     * the column name for the TimeUpdtd field
     */
    const COL_TIMEUPDTD = 'inv_whse_to.TimeUpdtd';

    /**
     * the column name for the dummy field
     */
    const COL_DUMMY = 'inv_whse_to.dummy';

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
        self::TYPE_PHPNAME       => array('Intbwhseto', 'Intbwhsename', 'Intbwhseadr1', 'Intbwhseadr2', 'Intbwhsecity', 'Intbwhsestat', 'Intbwhsezipcode', 'Intbwhsectry', 'Intbwhseusehandheld', 'Intbwhsecashcust', 'Intbwhsepickdtl', 'Intbwhseprodbin', 'Intbwhsepharea', 'Intbwhsephfrst3', 'Intbwhsephlast4', 'Intbwhsephext', 'Intbwhsefaxarea', 'Intbwhsefaxfrst3', 'Intbwhsefaxlast4', 'Intbwhseemailadr', 'Intbwhseqcrgabin', 'Intbwhserfprinter1', 'Intbwhserfprinter2', 'Intbwhserfprinter3', 'Intbwhserfprinter4', 'Intbwhserfprinter5', 'Intbwhseprofwhse', 'Intbwhseasetwhse', 'Intbwhseconsignwhse', 'Intbwhsebinrangelist', 'Intbwhsesupplywhse', 'Dateupdtd', 'Timeupdtd', 'Dummy', ),
        self::TYPE_CAMELNAME     => array('intbwhseto', 'intbwhsename', 'intbwhseadr1', 'intbwhseadr2', 'intbwhsecity', 'intbwhsestat', 'intbwhsezipcode', 'intbwhsectry', 'intbwhseusehandheld', 'intbwhsecashcust', 'intbwhsepickdtl', 'intbwhseprodbin', 'intbwhsepharea', 'intbwhsephfrst3', 'intbwhsephlast4', 'intbwhsephext', 'intbwhsefaxarea', 'intbwhsefaxfrst3', 'intbwhsefaxlast4', 'intbwhseemailadr', 'intbwhseqcrgabin', 'intbwhserfprinter1', 'intbwhserfprinter2', 'intbwhserfprinter3', 'intbwhserfprinter4', 'intbwhserfprinter5', 'intbwhseprofwhse', 'intbwhseasetwhse', 'intbwhseconsignwhse', 'intbwhsebinrangelist', 'intbwhsesupplywhse', 'dateupdtd', 'timeupdtd', 'dummy', ),
        self::TYPE_COLNAME       => array(InvWhseToTableMap::COL_INTBWHSETO, InvWhseToTableMap::COL_INTBWHSENAME, InvWhseToTableMap::COL_INTBWHSEADR1, InvWhseToTableMap::COL_INTBWHSEADR2, InvWhseToTableMap::COL_INTBWHSECITY, InvWhseToTableMap::COL_INTBWHSESTAT, InvWhseToTableMap::COL_INTBWHSEZIPCODE, InvWhseToTableMap::COL_INTBWHSECTRY, InvWhseToTableMap::COL_INTBWHSEUSEHANDHELD, InvWhseToTableMap::COL_INTBWHSECASHCUST, InvWhseToTableMap::COL_INTBWHSEPICKDTL, InvWhseToTableMap::COL_INTBWHSEPRODBIN, InvWhseToTableMap::COL_INTBWHSEPHAREA, InvWhseToTableMap::COL_INTBWHSEPHFRST3, InvWhseToTableMap::COL_INTBWHSEPHLAST4, InvWhseToTableMap::COL_INTBWHSEPHEXT, InvWhseToTableMap::COL_INTBWHSEFAXAREA, InvWhseToTableMap::COL_INTBWHSEFAXFRST3, InvWhseToTableMap::COL_INTBWHSEFAXLAST4, InvWhseToTableMap::COL_INTBWHSEEMAILADR, InvWhseToTableMap::COL_INTBWHSEQCRGABIN, InvWhseToTableMap::COL_INTBWHSERFPRINTER1, InvWhseToTableMap::COL_INTBWHSERFPRINTER2, InvWhseToTableMap::COL_INTBWHSERFPRINTER3, InvWhseToTableMap::COL_INTBWHSERFPRINTER4, InvWhseToTableMap::COL_INTBWHSERFPRINTER5, InvWhseToTableMap::COL_INTBWHSEPROFWHSE, InvWhseToTableMap::COL_INTBWHSEASETWHSE, InvWhseToTableMap::COL_INTBWHSECONSIGNWHSE, InvWhseToTableMap::COL_INTBWHSEBINRANGELIST, InvWhseToTableMap::COL_INTBWHSESUPPLYWHSE, InvWhseToTableMap::COL_DATEUPDTD, InvWhseToTableMap::COL_TIMEUPDTD, InvWhseToTableMap::COL_DUMMY, ),
        self::TYPE_FIELDNAME     => array('IntbWhseTo', 'IntbWhseName', 'IntbWhseAdr1', 'IntbWhseAdr2', 'IntbWhseCity', 'IntbWhseStat', 'IntbWhseZipCode', 'IntbWhseCtry', 'IntbWhseUseHandheld', 'IntbWhseCashCust', 'IntbWhsePickDtl', 'IntbWhseProdBin', 'IntbWhsePhArea', 'IntbWhsePhFrst3', 'IntbWhsePhLast4', 'IntbWhsePhExt', 'IntbWhseFaxArea', 'IntbWhseFaxFrst3', 'IntbWhseFaxLast4', 'IntbWhseEmailAdr', 'IntbWhseQcRgaBin', 'IntbWhseRfPrinter1', 'IntbWhseRfPrinter2', 'IntbWhseRfPrinter3', 'IntbWhseRfPrinter4', 'IntbWhseRfPrinter5', 'IntbWhseProfWhse', 'IntbWhseAsetWhse', 'IntbWhseConsignWhse', 'IntbWhseBinRangeList', 'IntbWhseSupplyWhse', 'DateUpdtd', 'TimeUpdtd', 'dummy', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Intbwhseto' => 0, 'Intbwhsename' => 1, 'Intbwhseadr1' => 2, 'Intbwhseadr2' => 3, 'Intbwhsecity' => 4, 'Intbwhsestat' => 5, 'Intbwhsezipcode' => 6, 'Intbwhsectry' => 7, 'Intbwhseusehandheld' => 8, 'Intbwhsecashcust' => 9, 'Intbwhsepickdtl' => 10, 'Intbwhseprodbin' => 11, 'Intbwhsepharea' => 12, 'Intbwhsephfrst3' => 13, 'Intbwhsephlast4' => 14, 'Intbwhsephext' => 15, 'Intbwhsefaxarea' => 16, 'Intbwhsefaxfrst3' => 17, 'Intbwhsefaxlast4' => 18, 'Intbwhseemailadr' => 19, 'Intbwhseqcrgabin' => 20, 'Intbwhserfprinter1' => 21, 'Intbwhserfprinter2' => 22, 'Intbwhserfprinter3' => 23, 'Intbwhserfprinter4' => 24, 'Intbwhserfprinter5' => 25, 'Intbwhseprofwhse' => 26, 'Intbwhseasetwhse' => 27, 'Intbwhseconsignwhse' => 28, 'Intbwhsebinrangelist' => 29, 'Intbwhsesupplywhse' => 30, 'Dateupdtd' => 31, 'Timeupdtd' => 32, 'Dummy' => 33, ),
        self::TYPE_CAMELNAME     => array('intbwhseto' => 0, 'intbwhsename' => 1, 'intbwhseadr1' => 2, 'intbwhseadr2' => 3, 'intbwhsecity' => 4, 'intbwhsestat' => 5, 'intbwhsezipcode' => 6, 'intbwhsectry' => 7, 'intbwhseusehandheld' => 8, 'intbwhsecashcust' => 9, 'intbwhsepickdtl' => 10, 'intbwhseprodbin' => 11, 'intbwhsepharea' => 12, 'intbwhsephfrst3' => 13, 'intbwhsephlast4' => 14, 'intbwhsephext' => 15, 'intbwhsefaxarea' => 16, 'intbwhsefaxfrst3' => 17, 'intbwhsefaxlast4' => 18, 'intbwhseemailadr' => 19, 'intbwhseqcrgabin' => 20, 'intbwhserfprinter1' => 21, 'intbwhserfprinter2' => 22, 'intbwhserfprinter3' => 23, 'intbwhserfprinter4' => 24, 'intbwhserfprinter5' => 25, 'intbwhseprofwhse' => 26, 'intbwhseasetwhse' => 27, 'intbwhseconsignwhse' => 28, 'intbwhsebinrangelist' => 29, 'intbwhsesupplywhse' => 30, 'dateupdtd' => 31, 'timeupdtd' => 32, 'dummy' => 33, ),
        self::TYPE_COLNAME       => array(InvWhseToTableMap::COL_INTBWHSETO => 0, InvWhseToTableMap::COL_INTBWHSENAME => 1, InvWhseToTableMap::COL_INTBWHSEADR1 => 2, InvWhseToTableMap::COL_INTBWHSEADR2 => 3, InvWhseToTableMap::COL_INTBWHSECITY => 4, InvWhseToTableMap::COL_INTBWHSESTAT => 5, InvWhseToTableMap::COL_INTBWHSEZIPCODE => 6, InvWhseToTableMap::COL_INTBWHSECTRY => 7, InvWhseToTableMap::COL_INTBWHSEUSEHANDHELD => 8, InvWhseToTableMap::COL_INTBWHSECASHCUST => 9, InvWhseToTableMap::COL_INTBWHSEPICKDTL => 10, InvWhseToTableMap::COL_INTBWHSEPRODBIN => 11, InvWhseToTableMap::COL_INTBWHSEPHAREA => 12, InvWhseToTableMap::COL_INTBWHSEPHFRST3 => 13, InvWhseToTableMap::COL_INTBWHSEPHLAST4 => 14, InvWhseToTableMap::COL_INTBWHSEPHEXT => 15, InvWhseToTableMap::COL_INTBWHSEFAXAREA => 16, InvWhseToTableMap::COL_INTBWHSEFAXFRST3 => 17, InvWhseToTableMap::COL_INTBWHSEFAXLAST4 => 18, InvWhseToTableMap::COL_INTBWHSEEMAILADR => 19, InvWhseToTableMap::COL_INTBWHSEQCRGABIN => 20, InvWhseToTableMap::COL_INTBWHSERFPRINTER1 => 21, InvWhseToTableMap::COL_INTBWHSERFPRINTER2 => 22, InvWhseToTableMap::COL_INTBWHSERFPRINTER3 => 23, InvWhseToTableMap::COL_INTBWHSERFPRINTER4 => 24, InvWhseToTableMap::COL_INTBWHSERFPRINTER5 => 25, InvWhseToTableMap::COL_INTBWHSEPROFWHSE => 26, InvWhseToTableMap::COL_INTBWHSEASETWHSE => 27, InvWhseToTableMap::COL_INTBWHSECONSIGNWHSE => 28, InvWhseToTableMap::COL_INTBWHSEBINRANGELIST => 29, InvWhseToTableMap::COL_INTBWHSESUPPLYWHSE => 30, InvWhseToTableMap::COL_DATEUPDTD => 31, InvWhseToTableMap::COL_TIMEUPDTD => 32, InvWhseToTableMap::COL_DUMMY => 33, ),
        self::TYPE_FIELDNAME     => array('IntbWhseTo' => 0, 'IntbWhseName' => 1, 'IntbWhseAdr1' => 2, 'IntbWhseAdr2' => 3, 'IntbWhseCity' => 4, 'IntbWhseStat' => 5, 'IntbWhseZipCode' => 6, 'IntbWhseCtry' => 7, 'IntbWhseUseHandheld' => 8, 'IntbWhseCashCust' => 9, 'IntbWhsePickDtl' => 10, 'IntbWhseProdBin' => 11, 'IntbWhsePhArea' => 12, 'IntbWhsePhFrst3' => 13, 'IntbWhsePhLast4' => 14, 'IntbWhsePhExt' => 15, 'IntbWhseFaxArea' => 16, 'IntbWhseFaxFrst3' => 17, 'IntbWhseFaxLast4' => 18, 'IntbWhseEmailAdr' => 19, 'IntbWhseQcRgaBin' => 20, 'IntbWhseRfPrinter1' => 21, 'IntbWhseRfPrinter2' => 22, 'IntbWhseRfPrinter3' => 23, 'IntbWhseRfPrinter4' => 24, 'IntbWhseRfPrinter5' => 25, 'IntbWhseProfWhse' => 26, 'IntbWhseAsetWhse' => 27, 'IntbWhseConsignWhse' => 28, 'IntbWhseBinRangeList' => 29, 'IntbWhseSupplyWhse' => 30, 'DateUpdtd' => 31, 'TimeUpdtd' => 32, 'dummy' => 33, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, )
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
        $this->setName('inv_whse_to');
        $this->setPhpName('InvWhseTo');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\InvWhseTo');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('IntbWhseTo', 'Intbwhseto', 'VARCHAR', true, 8, null);
        $this->addColumn('IntbWhseName', 'Intbwhsename', 'VARCHAR', false, 30, null);
        $this->addColumn('IntbWhseAdr1', 'Intbwhseadr1', 'VARCHAR', false, 30, null);
        $this->addColumn('IntbWhseAdr2', 'Intbwhseadr2', 'VARCHAR', false, 30, null);
        $this->addColumn('IntbWhseCity', 'Intbwhsecity', 'VARCHAR', false, 16, null);
        $this->addColumn('IntbWhseStat', 'Intbwhsestat', 'VARCHAR', false, 2, null);
        $this->addColumn('IntbWhseZipCode', 'Intbwhsezipcode', 'VARCHAR', false, 10, null);
        $this->addColumn('IntbWhseCtry', 'Intbwhsectry', 'VARCHAR', false, 4, null);
        $this->addColumn('IntbWhseUseHandheld', 'Intbwhseusehandheld', 'VARCHAR', false, 1, null);
        $this->addColumn('IntbWhseCashCust', 'Intbwhsecashcust', 'VARCHAR', false, 6, null);
        $this->addColumn('IntbWhsePickDtl', 'Intbwhsepickdtl', 'VARCHAR', false, 1, null);
        $this->addColumn('IntbWhseProdBin', 'Intbwhseprodbin', 'VARCHAR', false, 8, null);
        $this->addColumn('IntbWhsePhArea', 'Intbwhsepharea', 'INTEGER', false, 3, null);
        $this->addColumn('IntbWhsePhFrst3', 'Intbwhsephfrst3', 'INTEGER', false, 3, null);
        $this->addColumn('IntbWhsePhLast4', 'Intbwhsephlast4', 'INTEGER', false, 4, null);
        $this->addColumn('IntbWhsePhExt', 'Intbwhsephext', 'VARCHAR', false, 7, null);
        $this->addColumn('IntbWhseFaxArea', 'Intbwhsefaxarea', 'INTEGER', false, 3, null);
        $this->addColumn('IntbWhseFaxFrst3', 'Intbwhsefaxfrst3', 'INTEGER', false, 3, null);
        $this->addColumn('IntbWhseFaxLast4', 'Intbwhsefaxlast4', 'INTEGER', false, 4, null);
        $this->addColumn('IntbWhseEmailAdr', 'Intbwhseemailadr', 'VARCHAR', false, 50, null);
        $this->addColumn('IntbWhseQcRgaBin', 'Intbwhseqcrgabin', 'VARCHAR', false, 8, null);
        $this->addColumn('IntbWhseRfPrinter1', 'Intbwhserfprinter1', 'VARCHAR', false, 12, null);
        $this->addColumn('IntbWhseRfPrinter2', 'Intbwhserfprinter2', 'VARCHAR', false, 12, null);
        $this->addColumn('IntbWhseRfPrinter3', 'Intbwhserfprinter3', 'VARCHAR', false, 12, null);
        $this->addColumn('IntbWhseRfPrinter4', 'Intbwhserfprinter4', 'VARCHAR', false, 12, null);
        $this->addColumn('IntbWhseRfPrinter5', 'Intbwhserfprinter5', 'VARCHAR', false, 12, null);
        $this->addColumn('IntbWhseProfWhse', 'Intbwhseprofwhse', 'VARCHAR', false, 2, null);
        $this->addColumn('IntbWhseAsetWhse', 'Intbwhseasetwhse', 'VARCHAR', false, 2, null);
        $this->addColumn('IntbWhseConsignWhse', 'Intbwhseconsignwhse', 'VARCHAR', false, 1, null);
        $this->addColumn('IntbWhseBinRangeList', 'Intbwhsebinrangelist', 'VARCHAR', false, 1, null);
        $this->addColumn('IntbWhseSupplyWhse', 'Intbwhsesupplywhse', 'VARCHAR', false, 2, null);
        $this->addColumn('DateUpdtd', 'Dateupdtd', 'INTEGER', false, 8, null);
        $this->addColumn('TimeUpdtd', 'Timeupdtd', 'INTEGER', false, 8, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Intbwhseto', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Intbwhseto', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Intbwhseto', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Intbwhseto', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Intbwhseto', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Intbwhseto', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Intbwhseto', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? InvWhseToTableMap::CLASS_DEFAULT : InvWhseToTableMap::OM_CLASS;
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
     * @return array           (InvWhseTo object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = InvWhseToTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = InvWhseToTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + InvWhseToTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = InvWhseToTableMap::OM_CLASS;
            /** @var InvWhseTo $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            InvWhseToTableMap::addInstanceToPool($obj, $key);
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
            $key = InvWhseToTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = InvWhseToTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var InvWhseTo $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                InvWhseToTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(InvWhseToTableMap::COL_INTBWHSETO);
            $criteria->addSelectColumn(InvWhseToTableMap::COL_INTBWHSENAME);
            $criteria->addSelectColumn(InvWhseToTableMap::COL_INTBWHSEADR1);
            $criteria->addSelectColumn(InvWhseToTableMap::COL_INTBWHSEADR2);
            $criteria->addSelectColumn(InvWhseToTableMap::COL_INTBWHSECITY);
            $criteria->addSelectColumn(InvWhseToTableMap::COL_INTBWHSESTAT);
            $criteria->addSelectColumn(InvWhseToTableMap::COL_INTBWHSEZIPCODE);
            $criteria->addSelectColumn(InvWhseToTableMap::COL_INTBWHSECTRY);
            $criteria->addSelectColumn(InvWhseToTableMap::COL_INTBWHSEUSEHANDHELD);
            $criteria->addSelectColumn(InvWhseToTableMap::COL_INTBWHSECASHCUST);
            $criteria->addSelectColumn(InvWhseToTableMap::COL_INTBWHSEPICKDTL);
            $criteria->addSelectColumn(InvWhseToTableMap::COL_INTBWHSEPRODBIN);
            $criteria->addSelectColumn(InvWhseToTableMap::COL_INTBWHSEPHAREA);
            $criteria->addSelectColumn(InvWhseToTableMap::COL_INTBWHSEPHFRST3);
            $criteria->addSelectColumn(InvWhseToTableMap::COL_INTBWHSEPHLAST4);
            $criteria->addSelectColumn(InvWhseToTableMap::COL_INTBWHSEPHEXT);
            $criteria->addSelectColumn(InvWhseToTableMap::COL_INTBWHSEFAXAREA);
            $criteria->addSelectColumn(InvWhseToTableMap::COL_INTBWHSEFAXFRST3);
            $criteria->addSelectColumn(InvWhseToTableMap::COL_INTBWHSEFAXLAST4);
            $criteria->addSelectColumn(InvWhseToTableMap::COL_INTBWHSEEMAILADR);
            $criteria->addSelectColumn(InvWhseToTableMap::COL_INTBWHSEQCRGABIN);
            $criteria->addSelectColumn(InvWhseToTableMap::COL_INTBWHSERFPRINTER1);
            $criteria->addSelectColumn(InvWhseToTableMap::COL_INTBWHSERFPRINTER2);
            $criteria->addSelectColumn(InvWhseToTableMap::COL_INTBWHSERFPRINTER3);
            $criteria->addSelectColumn(InvWhseToTableMap::COL_INTBWHSERFPRINTER4);
            $criteria->addSelectColumn(InvWhseToTableMap::COL_INTBWHSERFPRINTER5);
            $criteria->addSelectColumn(InvWhseToTableMap::COL_INTBWHSEPROFWHSE);
            $criteria->addSelectColumn(InvWhseToTableMap::COL_INTBWHSEASETWHSE);
            $criteria->addSelectColumn(InvWhseToTableMap::COL_INTBWHSECONSIGNWHSE);
            $criteria->addSelectColumn(InvWhseToTableMap::COL_INTBWHSEBINRANGELIST);
            $criteria->addSelectColumn(InvWhseToTableMap::COL_INTBWHSESUPPLYWHSE);
            $criteria->addSelectColumn(InvWhseToTableMap::COL_DATEUPDTD);
            $criteria->addSelectColumn(InvWhseToTableMap::COL_TIMEUPDTD);
            $criteria->addSelectColumn(InvWhseToTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.IntbWhseTo');
            $criteria->addSelectColumn($alias . '.IntbWhseName');
            $criteria->addSelectColumn($alias . '.IntbWhseAdr1');
            $criteria->addSelectColumn($alias . '.IntbWhseAdr2');
            $criteria->addSelectColumn($alias . '.IntbWhseCity');
            $criteria->addSelectColumn($alias . '.IntbWhseStat');
            $criteria->addSelectColumn($alias . '.IntbWhseZipCode');
            $criteria->addSelectColumn($alias . '.IntbWhseCtry');
            $criteria->addSelectColumn($alias . '.IntbWhseUseHandheld');
            $criteria->addSelectColumn($alias . '.IntbWhseCashCust');
            $criteria->addSelectColumn($alias . '.IntbWhsePickDtl');
            $criteria->addSelectColumn($alias . '.IntbWhseProdBin');
            $criteria->addSelectColumn($alias . '.IntbWhsePhArea');
            $criteria->addSelectColumn($alias . '.IntbWhsePhFrst3');
            $criteria->addSelectColumn($alias . '.IntbWhsePhLast4');
            $criteria->addSelectColumn($alias . '.IntbWhsePhExt');
            $criteria->addSelectColumn($alias . '.IntbWhseFaxArea');
            $criteria->addSelectColumn($alias . '.IntbWhseFaxFrst3');
            $criteria->addSelectColumn($alias . '.IntbWhseFaxLast4');
            $criteria->addSelectColumn($alias . '.IntbWhseEmailAdr');
            $criteria->addSelectColumn($alias . '.IntbWhseQcRgaBin');
            $criteria->addSelectColumn($alias . '.IntbWhseRfPrinter1');
            $criteria->addSelectColumn($alias . '.IntbWhseRfPrinter2');
            $criteria->addSelectColumn($alias . '.IntbWhseRfPrinter3');
            $criteria->addSelectColumn($alias . '.IntbWhseRfPrinter4');
            $criteria->addSelectColumn($alias . '.IntbWhseRfPrinter5');
            $criteria->addSelectColumn($alias . '.IntbWhseProfWhse');
            $criteria->addSelectColumn($alias . '.IntbWhseAsetWhse');
            $criteria->addSelectColumn($alias . '.IntbWhseConsignWhse');
            $criteria->addSelectColumn($alias . '.IntbWhseBinRangeList');
            $criteria->addSelectColumn($alias . '.IntbWhseSupplyWhse');
            $criteria->addSelectColumn($alias . '.DateUpdtd');
            $criteria->addSelectColumn($alias . '.TimeUpdtd');
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
        return Propel::getServiceContainer()->getDatabaseMap(InvWhseToTableMap::DATABASE_NAME)->getTable(InvWhseToTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(InvWhseToTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(InvWhseToTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new InvWhseToTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a InvWhseTo or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or InvWhseTo object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(InvWhseToTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \InvWhseTo) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(InvWhseToTableMap::DATABASE_NAME);
            $criteria->add(InvWhseToTableMap::COL_INTBWHSETO, (array) $values, Criteria::IN);
        }

        $query = InvWhseToQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            InvWhseToTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                InvWhseToTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the inv_whse_to table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return InvWhseToQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a InvWhseTo or Criteria object.
     *
     * @param mixed               $criteria Criteria or InvWhseTo object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InvWhseToTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from InvWhseTo object
        }


        // Set the correct dbName
        $query = InvWhseToQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // InvWhseToTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
InvWhseToTableMap::buildTableMap();
