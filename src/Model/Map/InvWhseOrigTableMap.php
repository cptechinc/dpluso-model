<?php

namespace Map;

use \InvWhseOrig;
use \InvWhseOrigQuery;
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
 * This class defines the structure of the 'inv_whse_orig' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class InvWhseOrigTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.InvWhseOrigTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'inv_whse_orig';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\InvWhseOrig';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'InvWhseOrig';

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
     * the column name for the IntbWhseOrig field
     */
    const COL_INTBWHSEORIG = 'inv_whse_orig.IntbWhseOrig';

    /**
     * the column name for the IntbWhseName field
     */
    const COL_INTBWHSENAME = 'inv_whse_orig.IntbWhseName';

    /**
     * the column name for the IntbWhseAdr1 field
     */
    const COL_INTBWHSEADR1 = 'inv_whse_orig.IntbWhseAdr1';

    /**
     * the column name for the IntbWhseAdr2 field
     */
    const COL_INTBWHSEADR2 = 'inv_whse_orig.IntbWhseAdr2';

    /**
     * the column name for the IntbWhseCity field
     */
    const COL_INTBWHSECITY = 'inv_whse_orig.IntbWhseCity';

    /**
     * the column name for the IntbWhseStat field
     */
    const COL_INTBWHSESTAT = 'inv_whse_orig.IntbWhseStat';

    /**
     * the column name for the IntbWhseZipCode field
     */
    const COL_INTBWHSEZIPCODE = 'inv_whse_orig.IntbWhseZipCode';

    /**
     * the column name for the IntbWhseCtry field
     */
    const COL_INTBWHSECTRY = 'inv_whse_orig.IntbWhseCtry';

    /**
     * the column name for the IntbWhseUseHandheld field
     */
    const COL_INTBWHSEUSEHANDHELD = 'inv_whse_orig.IntbWhseUseHandheld';

    /**
     * the column name for the IntbWhseCashCust field
     */
    const COL_INTBWHSECASHCUST = 'inv_whse_orig.IntbWhseCashCust';

    /**
     * the column name for the IntbWhsePickDtl field
     */
    const COL_INTBWHSEPICKDTL = 'inv_whse_orig.IntbWhsePickDtl';

    /**
     * the column name for the IntbWhseProdBin field
     */
    const COL_INTBWHSEPRODBIN = 'inv_whse_orig.IntbWhseProdBin';

    /**
     * the column name for the IntbWhsePhArea field
     */
    const COL_INTBWHSEPHAREA = 'inv_whse_orig.IntbWhsePhArea';

    /**
     * the column name for the IntbWhsePhFrst3 field
     */
    const COL_INTBWHSEPHFRST3 = 'inv_whse_orig.IntbWhsePhFrst3';

    /**
     * the column name for the IntbWhsePhLast4 field
     */
    const COL_INTBWHSEPHLAST4 = 'inv_whse_orig.IntbWhsePhLast4';

    /**
     * the column name for the IntbWhsePhExt field
     */
    const COL_INTBWHSEPHEXT = 'inv_whse_orig.IntbWhsePhExt';

    /**
     * the column name for the IntbWhseFaxArea field
     */
    const COL_INTBWHSEFAXAREA = 'inv_whse_orig.IntbWhseFaxArea';

    /**
     * the column name for the IntbWhseFaxFrst3 field
     */
    const COL_INTBWHSEFAXFRST3 = 'inv_whse_orig.IntbWhseFaxFrst3';

    /**
     * the column name for the IntbWhseFaxLast4 field
     */
    const COL_INTBWHSEFAXLAST4 = 'inv_whse_orig.IntbWhseFaxLast4';

    /**
     * the column name for the IntbWhseEmailAdr field
     */
    const COL_INTBWHSEEMAILADR = 'inv_whse_orig.IntbWhseEmailAdr';

    /**
     * the column name for the IntbWhseQcRgaBin field
     */
    const COL_INTBWHSEQCRGABIN = 'inv_whse_orig.IntbWhseQcRgaBin';

    /**
     * the column name for the IntbWhseRfPrinter1 field
     */
    const COL_INTBWHSERFPRINTER1 = 'inv_whse_orig.IntbWhseRfPrinter1';

    /**
     * the column name for the IntbWhseRfPrinter2 field
     */
    const COL_INTBWHSERFPRINTER2 = 'inv_whse_orig.IntbWhseRfPrinter2';

    /**
     * the column name for the IntbWhseRfPrinter3 field
     */
    const COL_INTBWHSERFPRINTER3 = 'inv_whse_orig.IntbWhseRfPrinter3';

    /**
     * the column name for the IntbWhseRfPrinter4 field
     */
    const COL_INTBWHSERFPRINTER4 = 'inv_whse_orig.IntbWhseRfPrinter4';

    /**
     * the column name for the IntbWhseRfPrinter5 field
     */
    const COL_INTBWHSERFPRINTER5 = 'inv_whse_orig.IntbWhseRfPrinter5';

    /**
     * the column name for the IntbWhseProfWhse field
     */
    const COL_INTBWHSEPROFWHSE = 'inv_whse_orig.IntbWhseProfWhse';

    /**
     * the column name for the IntbWhseAsetWhse field
     */
    const COL_INTBWHSEASETWHSE = 'inv_whse_orig.IntbWhseAsetWhse';

    /**
     * the column name for the IntbWhseConsignWhse field
     */
    const COL_INTBWHSECONSIGNWHSE = 'inv_whse_orig.IntbWhseConsignWhse';

    /**
     * the column name for the IntbWhseBinRangeList field
     */
    const COL_INTBWHSEBINRANGELIST = 'inv_whse_orig.IntbWhseBinRangeList';

    /**
     * the column name for the IntbWhseSupplyWhse field
     */
    const COL_INTBWHSESUPPLYWHSE = 'inv_whse_orig.IntbWhseSupplyWhse';

    /**
     * the column name for the DateUpdtd field
     */
    const COL_DATEUPDTD = 'inv_whse_orig.DateUpdtd';

    /**
     * the column name for the TimeUpdtd field
     */
    const COL_TIMEUPDTD = 'inv_whse_orig.TimeUpdtd';

    /**
     * the column name for the dummy field
     */
    const COL_DUMMY = 'inv_whse_orig.dummy';

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
        self::TYPE_PHPNAME       => array('Intbwhseorig', 'Intbwhsename', 'Intbwhseadr1', 'Intbwhseadr2', 'Intbwhsecity', 'Intbwhsestat', 'Intbwhsezipcode', 'Intbwhsectry', 'Intbwhseusehandheld', 'Intbwhsecashcust', 'Intbwhsepickdtl', 'Intbwhseprodbin', 'Intbwhsepharea', 'Intbwhsephfrst3', 'Intbwhsephlast4', 'Intbwhsephext', 'Intbwhsefaxarea', 'Intbwhsefaxfrst3', 'Intbwhsefaxlast4', 'Intbwhseemailadr', 'Intbwhseqcrgabin', 'Intbwhserfprinter1', 'Intbwhserfprinter2', 'Intbwhserfprinter3', 'Intbwhserfprinter4', 'Intbwhserfprinter5', 'Intbwhseprofwhse', 'Intbwhseasetwhse', 'Intbwhseconsignwhse', 'Intbwhsebinrangelist', 'Intbwhsesupplywhse', 'Dateupdtd', 'Timeupdtd', 'Dummy', ),
        self::TYPE_CAMELNAME     => array('intbwhseorig', 'intbwhsename', 'intbwhseadr1', 'intbwhseadr2', 'intbwhsecity', 'intbwhsestat', 'intbwhsezipcode', 'intbwhsectry', 'intbwhseusehandheld', 'intbwhsecashcust', 'intbwhsepickdtl', 'intbwhseprodbin', 'intbwhsepharea', 'intbwhsephfrst3', 'intbwhsephlast4', 'intbwhsephext', 'intbwhsefaxarea', 'intbwhsefaxfrst3', 'intbwhsefaxlast4', 'intbwhseemailadr', 'intbwhseqcrgabin', 'intbwhserfprinter1', 'intbwhserfprinter2', 'intbwhserfprinter3', 'intbwhserfprinter4', 'intbwhserfprinter5', 'intbwhseprofwhse', 'intbwhseasetwhse', 'intbwhseconsignwhse', 'intbwhsebinrangelist', 'intbwhsesupplywhse', 'dateupdtd', 'timeupdtd', 'dummy', ),
        self::TYPE_COLNAME       => array(InvWhseOrigTableMap::COL_INTBWHSEORIG, InvWhseOrigTableMap::COL_INTBWHSENAME, InvWhseOrigTableMap::COL_INTBWHSEADR1, InvWhseOrigTableMap::COL_INTBWHSEADR2, InvWhseOrigTableMap::COL_INTBWHSECITY, InvWhseOrigTableMap::COL_INTBWHSESTAT, InvWhseOrigTableMap::COL_INTBWHSEZIPCODE, InvWhseOrigTableMap::COL_INTBWHSECTRY, InvWhseOrigTableMap::COL_INTBWHSEUSEHANDHELD, InvWhseOrigTableMap::COL_INTBWHSECASHCUST, InvWhseOrigTableMap::COL_INTBWHSEPICKDTL, InvWhseOrigTableMap::COL_INTBWHSEPRODBIN, InvWhseOrigTableMap::COL_INTBWHSEPHAREA, InvWhseOrigTableMap::COL_INTBWHSEPHFRST3, InvWhseOrigTableMap::COL_INTBWHSEPHLAST4, InvWhseOrigTableMap::COL_INTBWHSEPHEXT, InvWhseOrigTableMap::COL_INTBWHSEFAXAREA, InvWhseOrigTableMap::COL_INTBWHSEFAXFRST3, InvWhseOrigTableMap::COL_INTBWHSEFAXLAST4, InvWhseOrigTableMap::COL_INTBWHSEEMAILADR, InvWhseOrigTableMap::COL_INTBWHSEQCRGABIN, InvWhseOrigTableMap::COL_INTBWHSERFPRINTER1, InvWhseOrigTableMap::COL_INTBWHSERFPRINTER2, InvWhseOrigTableMap::COL_INTBWHSERFPRINTER3, InvWhseOrigTableMap::COL_INTBWHSERFPRINTER4, InvWhseOrigTableMap::COL_INTBWHSERFPRINTER5, InvWhseOrigTableMap::COL_INTBWHSEPROFWHSE, InvWhseOrigTableMap::COL_INTBWHSEASETWHSE, InvWhseOrigTableMap::COL_INTBWHSECONSIGNWHSE, InvWhseOrigTableMap::COL_INTBWHSEBINRANGELIST, InvWhseOrigTableMap::COL_INTBWHSESUPPLYWHSE, InvWhseOrigTableMap::COL_DATEUPDTD, InvWhseOrigTableMap::COL_TIMEUPDTD, InvWhseOrigTableMap::COL_DUMMY, ),
        self::TYPE_FIELDNAME     => array('IntbWhseOrig', 'IntbWhseName', 'IntbWhseAdr1', 'IntbWhseAdr2', 'IntbWhseCity', 'IntbWhseStat', 'IntbWhseZipCode', 'IntbWhseCtry', 'IntbWhseUseHandheld', 'IntbWhseCashCust', 'IntbWhsePickDtl', 'IntbWhseProdBin', 'IntbWhsePhArea', 'IntbWhsePhFrst3', 'IntbWhsePhLast4', 'IntbWhsePhExt', 'IntbWhseFaxArea', 'IntbWhseFaxFrst3', 'IntbWhseFaxLast4', 'IntbWhseEmailAdr', 'IntbWhseQcRgaBin', 'IntbWhseRfPrinter1', 'IntbWhseRfPrinter2', 'IntbWhseRfPrinter3', 'IntbWhseRfPrinter4', 'IntbWhseRfPrinter5', 'IntbWhseProfWhse', 'IntbWhseAsetWhse', 'IntbWhseConsignWhse', 'IntbWhseBinRangeList', 'IntbWhseSupplyWhse', 'DateUpdtd', 'TimeUpdtd', 'dummy', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Intbwhseorig' => 0, 'Intbwhsename' => 1, 'Intbwhseadr1' => 2, 'Intbwhseadr2' => 3, 'Intbwhsecity' => 4, 'Intbwhsestat' => 5, 'Intbwhsezipcode' => 6, 'Intbwhsectry' => 7, 'Intbwhseusehandheld' => 8, 'Intbwhsecashcust' => 9, 'Intbwhsepickdtl' => 10, 'Intbwhseprodbin' => 11, 'Intbwhsepharea' => 12, 'Intbwhsephfrst3' => 13, 'Intbwhsephlast4' => 14, 'Intbwhsephext' => 15, 'Intbwhsefaxarea' => 16, 'Intbwhsefaxfrst3' => 17, 'Intbwhsefaxlast4' => 18, 'Intbwhseemailadr' => 19, 'Intbwhseqcrgabin' => 20, 'Intbwhserfprinter1' => 21, 'Intbwhserfprinter2' => 22, 'Intbwhserfprinter3' => 23, 'Intbwhserfprinter4' => 24, 'Intbwhserfprinter5' => 25, 'Intbwhseprofwhse' => 26, 'Intbwhseasetwhse' => 27, 'Intbwhseconsignwhse' => 28, 'Intbwhsebinrangelist' => 29, 'Intbwhsesupplywhse' => 30, 'Dateupdtd' => 31, 'Timeupdtd' => 32, 'Dummy' => 33, ),
        self::TYPE_CAMELNAME     => array('intbwhseorig' => 0, 'intbwhsename' => 1, 'intbwhseadr1' => 2, 'intbwhseadr2' => 3, 'intbwhsecity' => 4, 'intbwhsestat' => 5, 'intbwhsezipcode' => 6, 'intbwhsectry' => 7, 'intbwhseusehandheld' => 8, 'intbwhsecashcust' => 9, 'intbwhsepickdtl' => 10, 'intbwhseprodbin' => 11, 'intbwhsepharea' => 12, 'intbwhsephfrst3' => 13, 'intbwhsephlast4' => 14, 'intbwhsephext' => 15, 'intbwhsefaxarea' => 16, 'intbwhsefaxfrst3' => 17, 'intbwhsefaxlast4' => 18, 'intbwhseemailadr' => 19, 'intbwhseqcrgabin' => 20, 'intbwhserfprinter1' => 21, 'intbwhserfprinter2' => 22, 'intbwhserfprinter3' => 23, 'intbwhserfprinter4' => 24, 'intbwhserfprinter5' => 25, 'intbwhseprofwhse' => 26, 'intbwhseasetwhse' => 27, 'intbwhseconsignwhse' => 28, 'intbwhsebinrangelist' => 29, 'intbwhsesupplywhse' => 30, 'dateupdtd' => 31, 'timeupdtd' => 32, 'dummy' => 33, ),
        self::TYPE_COLNAME       => array(InvWhseOrigTableMap::COL_INTBWHSEORIG => 0, InvWhseOrigTableMap::COL_INTBWHSENAME => 1, InvWhseOrigTableMap::COL_INTBWHSEADR1 => 2, InvWhseOrigTableMap::COL_INTBWHSEADR2 => 3, InvWhseOrigTableMap::COL_INTBWHSECITY => 4, InvWhseOrigTableMap::COL_INTBWHSESTAT => 5, InvWhseOrigTableMap::COL_INTBWHSEZIPCODE => 6, InvWhseOrigTableMap::COL_INTBWHSECTRY => 7, InvWhseOrigTableMap::COL_INTBWHSEUSEHANDHELD => 8, InvWhseOrigTableMap::COL_INTBWHSECASHCUST => 9, InvWhseOrigTableMap::COL_INTBWHSEPICKDTL => 10, InvWhseOrigTableMap::COL_INTBWHSEPRODBIN => 11, InvWhseOrigTableMap::COL_INTBWHSEPHAREA => 12, InvWhseOrigTableMap::COL_INTBWHSEPHFRST3 => 13, InvWhseOrigTableMap::COL_INTBWHSEPHLAST4 => 14, InvWhseOrigTableMap::COL_INTBWHSEPHEXT => 15, InvWhseOrigTableMap::COL_INTBWHSEFAXAREA => 16, InvWhseOrigTableMap::COL_INTBWHSEFAXFRST3 => 17, InvWhseOrigTableMap::COL_INTBWHSEFAXLAST4 => 18, InvWhseOrigTableMap::COL_INTBWHSEEMAILADR => 19, InvWhseOrigTableMap::COL_INTBWHSEQCRGABIN => 20, InvWhseOrigTableMap::COL_INTBWHSERFPRINTER1 => 21, InvWhseOrigTableMap::COL_INTBWHSERFPRINTER2 => 22, InvWhseOrigTableMap::COL_INTBWHSERFPRINTER3 => 23, InvWhseOrigTableMap::COL_INTBWHSERFPRINTER4 => 24, InvWhseOrigTableMap::COL_INTBWHSERFPRINTER5 => 25, InvWhseOrigTableMap::COL_INTBWHSEPROFWHSE => 26, InvWhseOrigTableMap::COL_INTBWHSEASETWHSE => 27, InvWhseOrigTableMap::COL_INTBWHSECONSIGNWHSE => 28, InvWhseOrigTableMap::COL_INTBWHSEBINRANGELIST => 29, InvWhseOrigTableMap::COL_INTBWHSESUPPLYWHSE => 30, InvWhseOrigTableMap::COL_DATEUPDTD => 31, InvWhseOrigTableMap::COL_TIMEUPDTD => 32, InvWhseOrigTableMap::COL_DUMMY => 33, ),
        self::TYPE_FIELDNAME     => array('IntbWhseOrig' => 0, 'IntbWhseName' => 1, 'IntbWhseAdr1' => 2, 'IntbWhseAdr2' => 3, 'IntbWhseCity' => 4, 'IntbWhseStat' => 5, 'IntbWhseZipCode' => 6, 'IntbWhseCtry' => 7, 'IntbWhseUseHandheld' => 8, 'IntbWhseCashCust' => 9, 'IntbWhsePickDtl' => 10, 'IntbWhseProdBin' => 11, 'IntbWhsePhArea' => 12, 'IntbWhsePhFrst3' => 13, 'IntbWhsePhLast4' => 14, 'IntbWhsePhExt' => 15, 'IntbWhseFaxArea' => 16, 'IntbWhseFaxFrst3' => 17, 'IntbWhseFaxLast4' => 18, 'IntbWhseEmailAdr' => 19, 'IntbWhseQcRgaBin' => 20, 'IntbWhseRfPrinter1' => 21, 'IntbWhseRfPrinter2' => 22, 'IntbWhseRfPrinter3' => 23, 'IntbWhseRfPrinter4' => 24, 'IntbWhseRfPrinter5' => 25, 'IntbWhseProfWhse' => 26, 'IntbWhseAsetWhse' => 27, 'IntbWhseConsignWhse' => 28, 'IntbWhseBinRangeList' => 29, 'IntbWhseSupplyWhse' => 30, 'DateUpdtd' => 31, 'TimeUpdtd' => 32, 'dummy' => 33, ),
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
        $this->setName('inv_whse_orig');
        $this->setPhpName('InvWhseOrig');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\InvWhseOrig');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('IntbWhseOrig', 'Intbwhseorig', 'VARCHAR', true, 8, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Intbwhseorig', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Intbwhseorig', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Intbwhseorig', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Intbwhseorig', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Intbwhseorig', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Intbwhseorig', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('Intbwhseorig', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? InvWhseOrigTableMap::CLASS_DEFAULT : InvWhseOrigTableMap::OM_CLASS;
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
     * @return array           (InvWhseOrig object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = InvWhseOrigTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = InvWhseOrigTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + InvWhseOrigTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = InvWhseOrigTableMap::OM_CLASS;
            /** @var InvWhseOrig $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            InvWhseOrigTableMap::addInstanceToPool($obj, $key);
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
            $key = InvWhseOrigTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = InvWhseOrigTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var InvWhseOrig $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                InvWhseOrigTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(InvWhseOrigTableMap::COL_INTBWHSEORIG);
            $criteria->addSelectColumn(InvWhseOrigTableMap::COL_INTBWHSENAME);
            $criteria->addSelectColumn(InvWhseOrigTableMap::COL_INTBWHSEADR1);
            $criteria->addSelectColumn(InvWhseOrigTableMap::COL_INTBWHSEADR2);
            $criteria->addSelectColumn(InvWhseOrigTableMap::COL_INTBWHSECITY);
            $criteria->addSelectColumn(InvWhseOrigTableMap::COL_INTBWHSESTAT);
            $criteria->addSelectColumn(InvWhseOrigTableMap::COL_INTBWHSEZIPCODE);
            $criteria->addSelectColumn(InvWhseOrigTableMap::COL_INTBWHSECTRY);
            $criteria->addSelectColumn(InvWhseOrigTableMap::COL_INTBWHSEUSEHANDHELD);
            $criteria->addSelectColumn(InvWhseOrigTableMap::COL_INTBWHSECASHCUST);
            $criteria->addSelectColumn(InvWhseOrigTableMap::COL_INTBWHSEPICKDTL);
            $criteria->addSelectColumn(InvWhseOrigTableMap::COL_INTBWHSEPRODBIN);
            $criteria->addSelectColumn(InvWhseOrigTableMap::COL_INTBWHSEPHAREA);
            $criteria->addSelectColumn(InvWhseOrigTableMap::COL_INTBWHSEPHFRST3);
            $criteria->addSelectColumn(InvWhseOrigTableMap::COL_INTBWHSEPHLAST4);
            $criteria->addSelectColumn(InvWhseOrigTableMap::COL_INTBWHSEPHEXT);
            $criteria->addSelectColumn(InvWhseOrigTableMap::COL_INTBWHSEFAXAREA);
            $criteria->addSelectColumn(InvWhseOrigTableMap::COL_INTBWHSEFAXFRST3);
            $criteria->addSelectColumn(InvWhseOrigTableMap::COL_INTBWHSEFAXLAST4);
            $criteria->addSelectColumn(InvWhseOrigTableMap::COL_INTBWHSEEMAILADR);
            $criteria->addSelectColumn(InvWhseOrigTableMap::COL_INTBWHSEQCRGABIN);
            $criteria->addSelectColumn(InvWhseOrigTableMap::COL_INTBWHSERFPRINTER1);
            $criteria->addSelectColumn(InvWhseOrigTableMap::COL_INTBWHSERFPRINTER2);
            $criteria->addSelectColumn(InvWhseOrigTableMap::COL_INTBWHSERFPRINTER3);
            $criteria->addSelectColumn(InvWhseOrigTableMap::COL_INTBWHSERFPRINTER4);
            $criteria->addSelectColumn(InvWhseOrigTableMap::COL_INTBWHSERFPRINTER5);
            $criteria->addSelectColumn(InvWhseOrigTableMap::COL_INTBWHSEPROFWHSE);
            $criteria->addSelectColumn(InvWhseOrigTableMap::COL_INTBWHSEASETWHSE);
            $criteria->addSelectColumn(InvWhseOrigTableMap::COL_INTBWHSECONSIGNWHSE);
            $criteria->addSelectColumn(InvWhseOrigTableMap::COL_INTBWHSEBINRANGELIST);
            $criteria->addSelectColumn(InvWhseOrigTableMap::COL_INTBWHSESUPPLYWHSE);
            $criteria->addSelectColumn(InvWhseOrigTableMap::COL_DATEUPDTD);
            $criteria->addSelectColumn(InvWhseOrigTableMap::COL_TIMEUPDTD);
            $criteria->addSelectColumn(InvWhseOrigTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.IntbWhseOrig');
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
        return Propel::getServiceContainer()->getDatabaseMap(InvWhseOrigTableMap::DATABASE_NAME)->getTable(InvWhseOrigTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(InvWhseOrigTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(InvWhseOrigTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new InvWhseOrigTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a InvWhseOrig or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or InvWhseOrig object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(InvWhseOrigTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \InvWhseOrig) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(InvWhseOrigTableMap::DATABASE_NAME);
            $criteria->add(InvWhseOrigTableMap::COL_INTBWHSEORIG, (array) $values, Criteria::IN);
        }

        $query = InvWhseOrigQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            InvWhseOrigTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                InvWhseOrigTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the inv_whse_orig table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return InvWhseOrigQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a InvWhseOrig or Criteria object.
     *
     * @param mixed               $criteria Criteria or InvWhseOrig object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InvWhseOrigTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from InvWhseOrig object
        }


        // Set the correct dbName
        $query = InvWhseOrigQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // InvWhseOrigTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
InvWhseOrigTableMap::buildTableMap();
