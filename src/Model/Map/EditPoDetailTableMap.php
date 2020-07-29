<?php

namespace Map;

use \EditPoDetail;
use \EditPoDetailQuery;
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
 * This class defines the structure of the 'edit_po_detail' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class EditPoDetailTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.EditPoDetailTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'dplusodb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'edit_po_detail';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\EditPoDetail';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'EditPoDetail';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 45;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 45;

    /**
     * the column name for the sessionid field
     */
    const COL_SESSIONID = 'edit_po_detail.sessionid';

    /**
     * the column name for the PohdNbr field
     */
    const COL_POHDNBR = 'edit_po_detail.PohdNbr';

    /**
     * the column name for the PodtLine field
     */
    const COL_PODTLINE = 'edit_po_detail.PodtLine';

    /**
     * the column name for the InitItemNbr field
     */
    const COL_INITITEMNBR = 'edit_po_detail.InitItemNbr';

    /**
     * the column name for the PodtDesc1 field
     */
    const COL_PODTDESC1 = 'edit_po_detail.PodtDesc1';

    /**
     * the column name for the PodtDesc2 field
     */
    const COL_PODTDESC2 = 'edit_po_detail.PodtDesc2';

    /**
     * the column name for the PodtVendItemNbr field
     */
    const COL_PODTVENDITEMNBR = 'edit_po_detail.PodtVendItemNbr';

    /**
     * the column name for the IntbWhse field
     */
    const COL_INTBWHSE = 'edit_po_detail.IntbWhse';

    /**
     * the column name for the PodtShipDate field
     */
    const COL_PODTSHIPDATE = 'edit_po_detail.PodtShipDate';

    /**
     * the column name for the PodtExptDate field
     */
    const COL_PODTEXPTDATE = 'edit_po_detail.PodtExptDate';

    /**
     * the column name for the PodtCancDate field
     */
    const COL_PODTCANCDATE = 'edit_po_detail.PodtCancDate';

    /**
     * the column name for the IntbUomPur field
     */
    const COL_INTBUOMPUR = 'edit_po_detail.IntbUomPur';

    /**
     * the column name for the PodtQtyOrd field
     */
    const COL_PODTQTYORD = 'edit_po_detail.PodtQtyOrd';

    /**
     * the column name for the PodtCost field
     */
    const COL_PODTCOST = 'edit_po_detail.PodtCost';

    /**
     * the column name for the PodtCostTot field
     */
    const COL_PODTCOSTTOT = 'edit_po_detail.PodtCostTot';

    /**
     * the column name for the PodtRel field
     */
    const COL_PODTREL = 'edit_po_detail.PodtRel';

    /**
     * the column name for the PodtSpecOrdr field
     */
    const COL_PODTSPECORDR = 'edit_po_detail.PodtSpecOrdr';

    /**
     * the column name for the PodtGlAcct field
     */
    const COL_PODTGLACCT = 'edit_po_detail.PodtGlAcct';

    /**
     * the column name for the PodtSoNbr field
     */
    const COL_PODTSONBR = 'edit_po_detail.PodtSoNbr';

    /**
     * the column name for the PodtStat field
     */
    const COL_PODTSTAT = 'edit_po_detail.PodtStat';

    /**
     * the column name for the PodtOrigSoLine field
     */
    const COL_PODTORIGSOLINE = 'edit_po_detail.PodtOrigSoLine';

    /**
     * the column name for the PodtQtyDueIn field
     */
    const COL_PODTQTYDUEIN = 'edit_po_detail.PodtQtyDueIn';

    /**
     * the column name for the PodtType field
     */
    const COL_PODTTYPE = 'edit_po_detail.PodtType';

    /**
     * the column name for the PodtWghtTot field
     */
    const COL_PODTWGHTTOT = 'edit_po_detail.PodtWghtTot';

    /**
     * the column name for the PodtForeignCost field
     */
    const COL_PODTFOREIGNCOST = 'edit_po_detail.PodtForeignCost';

    /**
     * the column name for the PodtForeignCostTot field
     */
    const COL_PODTFOREIGNCOSTTOT = 'edit_po_detail.PodtForeignCostTot';

    /**
     * the column name for the PodtStanUnitCost field
     */
    const COL_PODTSTANUNITCOST = 'edit_po_detail.PodtStanUnitCost';

    /**
     * the column name for the PodtAckDate field
     */
    const COL_PODTACKDATE = 'edit_po_detail.PodtAckDate';

    /**
     * the column name for the PodtInvcClearFlag field
     */
    const COL_PODTINVCCLEARFLAG = 'edit_po_detail.PodtInvcClearFlag';

    /**
     * the column name for the PodtPrtKitDet field
     */
    const COL_PODTPRTKITDET = 'edit_po_detail.PodtPrtKitDet';

    /**
     * the column name for the PodtDestWhse field
     */
    const COL_PODTDESTWHSE = 'edit_po_detail.PodtDestWhse';

    /**
     * the column name for the PodtRevision field
     */
    const COL_PODTREVISION = 'edit_po_detail.PodtRevision';

    /**
     * the column name for the PodtPrtPoEOrU field
     */
    const COL_PODTPRTPOEORU = 'edit_po_detail.PodtPrtPoEOrU';

    /**
     * the column name for the PotbCnfmCode field
     */
    const COL_POTBCNFMCODE = 'edit_po_detail.PotbCnfmCode';

    /**
     * the column name for the PodtRcptNbr field
     */
    const COL_PODTRCPTNBR = 'edit_po_detail.PodtRcptNbr';

    /**
     * the column name for the PodtWipNbr field
     */
    const COL_PODTWIPNBR = 'edit_po_detail.PodtWipNbr';

    /**
     * the column name for the PodtOrdrAs field
     */
    const COL_PODTORDRAS = 'edit_po_detail.PodtOrdrAs';

    /**
     * the column name for the PodtBolDate field
     */
    const COL_PODTBOLDATE = 'edit_po_detail.PodtBolDate';

    /**
     * the column name for the PodtListPric field
     */
    const COL_PODTLISTPRIC = 'edit_po_detail.PodtListPric';

    /**
     * the column name for the PodtDeliveredDate field
     */
    const COL_PODTDELIVEREDDATE = 'edit_po_detail.PodtDeliveredDate';

    /**
     * the column name for the PodtLandCost field
     */
    const COL_PODTLANDCOST = 'edit_po_detail.PodtLandCost';

    /**
     * the column name for the DateUpdtd field
     */
    const COL_DATEUPDTD = 'edit_po_detail.DateUpdtd';

    /**
     * the column name for the TimeUpdtd field
     */
    const COL_TIMEUPDTD = 'edit_po_detail.TimeUpdtd';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'edit_po_detail.status';

    /**
     * the column name for the dummy field
     */
    const COL_DUMMY = 'edit_po_detail.dummy';

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
        self::TYPE_PHPNAME       => array('Sessionid', 'Pohdnbr', 'Podtline', 'Inititemnbr', 'Podtdesc1', 'Podtdesc2', 'Podtvenditemnbr', 'Intbwhse', 'Podtshipdate', 'Podtexptdate', 'Podtcancdate', 'Intbuompur', 'Podtqtyord', 'Podtcost', 'Podtcosttot', 'Podtrel', 'Podtspecordr', 'Podtglacct', 'Podtsonbr', 'Podtstat', 'Podtorigsoline', 'Podtqtyduein', 'Podttype', 'Podtwghttot', 'Podtforeigncost', 'Podtforeigncosttot', 'Podtstanunitcost', 'Podtackdate', 'Podtinvcclearflag', 'Podtprtkitdet', 'Podtdestwhse', 'Podtrevision', 'Podtprtpoeoru', 'Potbcnfmcode', 'Podtrcptnbr', 'Podtwipnbr', 'Podtordras', 'Podtboldate', 'Podtlistpric', 'Podtdelivereddate', 'Podtlandcost', 'Dateupdtd', 'Timeupdtd', 'Status', 'Dummy', ),
        self::TYPE_CAMELNAME     => array('sessionid', 'pohdnbr', 'podtline', 'inititemnbr', 'podtdesc1', 'podtdesc2', 'podtvenditemnbr', 'intbwhse', 'podtshipdate', 'podtexptdate', 'podtcancdate', 'intbuompur', 'podtqtyord', 'podtcost', 'podtcosttot', 'podtrel', 'podtspecordr', 'podtglacct', 'podtsonbr', 'podtstat', 'podtorigsoline', 'podtqtyduein', 'podttype', 'podtwghttot', 'podtforeigncost', 'podtforeigncosttot', 'podtstanunitcost', 'podtackdate', 'podtinvcclearflag', 'podtprtkitdet', 'podtdestwhse', 'podtrevision', 'podtprtpoeoru', 'potbcnfmcode', 'podtrcptnbr', 'podtwipnbr', 'podtordras', 'podtboldate', 'podtlistpric', 'podtdelivereddate', 'podtlandcost', 'dateupdtd', 'timeupdtd', 'status', 'dummy', ),
        self::TYPE_COLNAME       => array(EditPoDetailTableMap::COL_SESSIONID, EditPoDetailTableMap::COL_POHDNBR, EditPoDetailTableMap::COL_PODTLINE, EditPoDetailTableMap::COL_INITITEMNBR, EditPoDetailTableMap::COL_PODTDESC1, EditPoDetailTableMap::COL_PODTDESC2, EditPoDetailTableMap::COL_PODTVENDITEMNBR, EditPoDetailTableMap::COL_INTBWHSE, EditPoDetailTableMap::COL_PODTSHIPDATE, EditPoDetailTableMap::COL_PODTEXPTDATE, EditPoDetailTableMap::COL_PODTCANCDATE, EditPoDetailTableMap::COL_INTBUOMPUR, EditPoDetailTableMap::COL_PODTQTYORD, EditPoDetailTableMap::COL_PODTCOST, EditPoDetailTableMap::COL_PODTCOSTTOT, EditPoDetailTableMap::COL_PODTREL, EditPoDetailTableMap::COL_PODTSPECORDR, EditPoDetailTableMap::COL_PODTGLACCT, EditPoDetailTableMap::COL_PODTSONBR, EditPoDetailTableMap::COL_PODTSTAT, EditPoDetailTableMap::COL_PODTORIGSOLINE, EditPoDetailTableMap::COL_PODTQTYDUEIN, EditPoDetailTableMap::COL_PODTTYPE, EditPoDetailTableMap::COL_PODTWGHTTOT, EditPoDetailTableMap::COL_PODTFOREIGNCOST, EditPoDetailTableMap::COL_PODTFOREIGNCOSTTOT, EditPoDetailTableMap::COL_PODTSTANUNITCOST, EditPoDetailTableMap::COL_PODTACKDATE, EditPoDetailTableMap::COL_PODTINVCCLEARFLAG, EditPoDetailTableMap::COL_PODTPRTKITDET, EditPoDetailTableMap::COL_PODTDESTWHSE, EditPoDetailTableMap::COL_PODTREVISION, EditPoDetailTableMap::COL_PODTPRTPOEORU, EditPoDetailTableMap::COL_POTBCNFMCODE, EditPoDetailTableMap::COL_PODTRCPTNBR, EditPoDetailTableMap::COL_PODTWIPNBR, EditPoDetailTableMap::COL_PODTORDRAS, EditPoDetailTableMap::COL_PODTBOLDATE, EditPoDetailTableMap::COL_PODTLISTPRIC, EditPoDetailTableMap::COL_PODTDELIVEREDDATE, EditPoDetailTableMap::COL_PODTLANDCOST, EditPoDetailTableMap::COL_DATEUPDTD, EditPoDetailTableMap::COL_TIMEUPDTD, EditPoDetailTableMap::COL_STATUS, EditPoDetailTableMap::COL_DUMMY, ),
        self::TYPE_FIELDNAME     => array('sessionid', 'PohdNbr', 'PodtLine', 'InitItemNbr', 'PodtDesc1', 'PodtDesc2', 'PodtVendItemNbr', 'IntbWhse', 'PodtShipDate', 'PodtExptDate', 'PodtCancDate', 'IntbUomPur', 'PodtQtyOrd', 'PodtCost', 'PodtCostTot', 'PodtRel', 'PodtSpecOrdr', 'PodtGlAcct', 'PodtSoNbr', 'PodtStat', 'PodtOrigSoLine', 'PodtQtyDueIn', 'PodtType', 'PodtWghtTot', 'PodtForeignCost', 'PodtForeignCostTot', 'PodtStanUnitCost', 'PodtAckDate', 'PodtInvcClearFlag', 'PodtPrtKitDet', 'PodtDestWhse', 'PodtRevision', 'PodtPrtPoEOrU', 'PotbCnfmCode', 'PodtRcptNbr', 'PodtWipNbr', 'PodtOrdrAs', 'PodtBolDate', 'PodtListPric', 'PodtDeliveredDate', 'PodtLandCost', 'DateUpdtd', 'TimeUpdtd', 'status', 'dummy', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Sessionid' => 0, 'Pohdnbr' => 1, 'Podtline' => 2, 'Inititemnbr' => 3, 'Podtdesc1' => 4, 'Podtdesc2' => 5, 'Podtvenditemnbr' => 6, 'Intbwhse' => 7, 'Podtshipdate' => 8, 'Podtexptdate' => 9, 'Podtcancdate' => 10, 'Intbuompur' => 11, 'Podtqtyord' => 12, 'Podtcost' => 13, 'Podtcosttot' => 14, 'Podtrel' => 15, 'Podtspecordr' => 16, 'Podtglacct' => 17, 'Podtsonbr' => 18, 'Podtstat' => 19, 'Podtorigsoline' => 20, 'Podtqtyduein' => 21, 'Podttype' => 22, 'Podtwghttot' => 23, 'Podtforeigncost' => 24, 'Podtforeigncosttot' => 25, 'Podtstanunitcost' => 26, 'Podtackdate' => 27, 'Podtinvcclearflag' => 28, 'Podtprtkitdet' => 29, 'Podtdestwhse' => 30, 'Podtrevision' => 31, 'Podtprtpoeoru' => 32, 'Potbcnfmcode' => 33, 'Podtrcptnbr' => 34, 'Podtwipnbr' => 35, 'Podtordras' => 36, 'Podtboldate' => 37, 'Podtlistpric' => 38, 'Podtdelivereddate' => 39, 'Podtlandcost' => 40, 'Dateupdtd' => 41, 'Timeupdtd' => 42, 'Status' => 43, 'Dummy' => 44, ),
        self::TYPE_CAMELNAME     => array('sessionid' => 0, 'pohdnbr' => 1, 'podtline' => 2, 'inititemnbr' => 3, 'podtdesc1' => 4, 'podtdesc2' => 5, 'podtvenditemnbr' => 6, 'intbwhse' => 7, 'podtshipdate' => 8, 'podtexptdate' => 9, 'podtcancdate' => 10, 'intbuompur' => 11, 'podtqtyord' => 12, 'podtcost' => 13, 'podtcosttot' => 14, 'podtrel' => 15, 'podtspecordr' => 16, 'podtglacct' => 17, 'podtsonbr' => 18, 'podtstat' => 19, 'podtorigsoline' => 20, 'podtqtyduein' => 21, 'podttype' => 22, 'podtwghttot' => 23, 'podtforeigncost' => 24, 'podtforeigncosttot' => 25, 'podtstanunitcost' => 26, 'podtackdate' => 27, 'podtinvcclearflag' => 28, 'podtprtkitdet' => 29, 'podtdestwhse' => 30, 'podtrevision' => 31, 'podtprtpoeoru' => 32, 'potbcnfmcode' => 33, 'podtrcptnbr' => 34, 'podtwipnbr' => 35, 'podtordras' => 36, 'podtboldate' => 37, 'podtlistpric' => 38, 'podtdelivereddate' => 39, 'podtlandcost' => 40, 'dateupdtd' => 41, 'timeupdtd' => 42, 'status' => 43, 'dummy' => 44, ),
        self::TYPE_COLNAME       => array(EditPoDetailTableMap::COL_SESSIONID => 0, EditPoDetailTableMap::COL_POHDNBR => 1, EditPoDetailTableMap::COL_PODTLINE => 2, EditPoDetailTableMap::COL_INITITEMNBR => 3, EditPoDetailTableMap::COL_PODTDESC1 => 4, EditPoDetailTableMap::COL_PODTDESC2 => 5, EditPoDetailTableMap::COL_PODTVENDITEMNBR => 6, EditPoDetailTableMap::COL_INTBWHSE => 7, EditPoDetailTableMap::COL_PODTSHIPDATE => 8, EditPoDetailTableMap::COL_PODTEXPTDATE => 9, EditPoDetailTableMap::COL_PODTCANCDATE => 10, EditPoDetailTableMap::COL_INTBUOMPUR => 11, EditPoDetailTableMap::COL_PODTQTYORD => 12, EditPoDetailTableMap::COL_PODTCOST => 13, EditPoDetailTableMap::COL_PODTCOSTTOT => 14, EditPoDetailTableMap::COL_PODTREL => 15, EditPoDetailTableMap::COL_PODTSPECORDR => 16, EditPoDetailTableMap::COL_PODTGLACCT => 17, EditPoDetailTableMap::COL_PODTSONBR => 18, EditPoDetailTableMap::COL_PODTSTAT => 19, EditPoDetailTableMap::COL_PODTORIGSOLINE => 20, EditPoDetailTableMap::COL_PODTQTYDUEIN => 21, EditPoDetailTableMap::COL_PODTTYPE => 22, EditPoDetailTableMap::COL_PODTWGHTTOT => 23, EditPoDetailTableMap::COL_PODTFOREIGNCOST => 24, EditPoDetailTableMap::COL_PODTFOREIGNCOSTTOT => 25, EditPoDetailTableMap::COL_PODTSTANUNITCOST => 26, EditPoDetailTableMap::COL_PODTACKDATE => 27, EditPoDetailTableMap::COL_PODTINVCCLEARFLAG => 28, EditPoDetailTableMap::COL_PODTPRTKITDET => 29, EditPoDetailTableMap::COL_PODTDESTWHSE => 30, EditPoDetailTableMap::COL_PODTREVISION => 31, EditPoDetailTableMap::COL_PODTPRTPOEORU => 32, EditPoDetailTableMap::COL_POTBCNFMCODE => 33, EditPoDetailTableMap::COL_PODTRCPTNBR => 34, EditPoDetailTableMap::COL_PODTWIPNBR => 35, EditPoDetailTableMap::COL_PODTORDRAS => 36, EditPoDetailTableMap::COL_PODTBOLDATE => 37, EditPoDetailTableMap::COL_PODTLISTPRIC => 38, EditPoDetailTableMap::COL_PODTDELIVEREDDATE => 39, EditPoDetailTableMap::COL_PODTLANDCOST => 40, EditPoDetailTableMap::COL_DATEUPDTD => 41, EditPoDetailTableMap::COL_TIMEUPDTD => 42, EditPoDetailTableMap::COL_STATUS => 43, EditPoDetailTableMap::COL_DUMMY => 44, ),
        self::TYPE_FIELDNAME     => array('sessionid' => 0, 'PohdNbr' => 1, 'PodtLine' => 2, 'InitItemNbr' => 3, 'PodtDesc1' => 4, 'PodtDesc2' => 5, 'PodtVendItemNbr' => 6, 'IntbWhse' => 7, 'PodtShipDate' => 8, 'PodtExptDate' => 9, 'PodtCancDate' => 10, 'IntbUomPur' => 11, 'PodtQtyOrd' => 12, 'PodtCost' => 13, 'PodtCostTot' => 14, 'PodtRel' => 15, 'PodtSpecOrdr' => 16, 'PodtGlAcct' => 17, 'PodtSoNbr' => 18, 'PodtStat' => 19, 'PodtOrigSoLine' => 20, 'PodtQtyDueIn' => 21, 'PodtType' => 22, 'PodtWghtTot' => 23, 'PodtForeignCost' => 24, 'PodtForeignCostTot' => 25, 'PodtStanUnitCost' => 26, 'PodtAckDate' => 27, 'PodtInvcClearFlag' => 28, 'PodtPrtKitDet' => 29, 'PodtDestWhse' => 30, 'PodtRevision' => 31, 'PodtPrtPoEOrU' => 32, 'PotbCnfmCode' => 33, 'PodtRcptNbr' => 34, 'PodtWipNbr' => 35, 'PodtOrdrAs' => 36, 'PodtBolDate' => 37, 'PodtListPric' => 38, 'PodtDeliveredDate' => 39, 'PodtLandCost' => 40, 'DateUpdtd' => 41, 'TimeUpdtd' => 42, 'status' => 43, 'dummy' => 44, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, )
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
        $this->setName('edit_po_detail');
        $this->setPhpName('EditPoDetail');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\EditPoDetail');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('sessionid', 'Sessionid', 'VARCHAR', true, 50, null);
        $this->addPrimaryKey('PohdNbr', 'Pohdnbr', 'VARCHAR', true, 8, '');
        $this->addPrimaryKey('PodtLine', 'Podtline', 'INTEGER', true, 4, 0);
        $this->addColumn('InitItemNbr', 'Inititemnbr', 'VARCHAR', false, 30, null);
        $this->addColumn('PodtDesc1', 'Podtdesc1', 'VARCHAR', false, 35, null);
        $this->addColumn('PodtDesc2', 'Podtdesc2', 'VARCHAR', false, 35, null);
        $this->addColumn('PodtVendItemNbr', 'Podtvenditemnbr', 'VARCHAR', false, 30, null);
        $this->addColumn('IntbWhse', 'Intbwhse', 'VARCHAR', false, 2, null);
        $this->addColumn('PodtShipDate', 'Podtshipdate', 'VARCHAR', false, 8, null);
        $this->addColumn('PodtExptDate', 'Podtexptdate', 'VARCHAR', false, 8, null);
        $this->addColumn('PodtCancDate', 'Podtcancdate', 'VARCHAR', false, 8, null);
        $this->addColumn('IntbUomPur', 'Intbuompur', 'VARCHAR', false, 4, null);
        $this->addColumn('PodtQtyOrd', 'Podtqtyord', 'DECIMAL', false, 20, null);
        $this->addColumn('PodtCost', 'Podtcost', 'DECIMAL', false, 20, null);
        $this->addColumn('PodtCostTot', 'Podtcosttot', 'DECIMAL', false, 20, null);
        $this->addColumn('PodtRel', 'Podtrel', 'VARCHAR', false, 1, null);
        $this->addColumn('PodtSpecOrdr', 'Podtspecordr', 'VARCHAR', false, 1, null);
        $this->addColumn('PodtGlAcct', 'Podtglacct', 'VARCHAR', false, 9, null);
        $this->addColumn('PodtSoNbr', 'Podtsonbr', 'VARCHAR', false, 8, null);
        $this->addColumn('PodtStat', 'Podtstat', 'VARCHAR', false, 1, null);
        $this->addColumn('PodtOrigSoLine', 'Podtorigsoline', 'INTEGER', false, 4, null);
        $this->addColumn('PodtQtyDueIn', 'Podtqtyduein', 'DECIMAL', false, 20, null);
        $this->addColumn('PodtType', 'Podttype', 'VARCHAR', false, 1, null);
        $this->addColumn('PodtWghtTot', 'Podtwghttot', 'DECIMAL', false, 20, null);
        $this->addColumn('PodtForeignCost', 'Podtforeigncost', 'DECIMAL', false, 20, null);
        $this->addColumn('PodtForeignCostTot', 'Podtforeigncosttot', 'DECIMAL', false, 20, null);
        $this->addColumn('PodtStanUnitCost', 'Podtstanunitcost', 'DECIMAL', false, 20, null);
        $this->addColumn('PodtAckDate', 'Podtackdate', 'VARCHAR', false, 8, null);
        $this->addColumn('PodtInvcClearFlag', 'Podtinvcclearflag', 'VARCHAR', false, 1, null);
        $this->addColumn('PodtPrtKitDet', 'Podtprtkitdet', 'VARCHAR', false, 1, null);
        $this->addColumn('PodtDestWhse', 'Podtdestwhse', 'VARCHAR', false, 2, null);
        $this->addColumn('PodtRevision', 'Podtrevision', 'VARCHAR', false, 10, null);
        $this->addColumn('PodtPrtPoEOrU', 'Podtprtpoeoru', 'VARCHAR', false, 1, null);
        $this->addColumn('PotbCnfmCode', 'Potbcnfmcode', 'VARCHAR', false, 4, null);
        $this->addColumn('PodtRcptNbr', 'Podtrcptnbr', 'VARCHAR', false, 8, null);
        $this->addColumn('PodtWipNbr', 'Podtwipnbr', 'VARCHAR', false, 8, null);
        $this->addColumn('PodtOrdrAs', 'Podtordras', 'VARCHAR', false, 1, null);
        $this->addColumn('PodtBolDate', 'Podtboldate', 'VARCHAR', false, 8, null);
        $this->addColumn('PodtListPric', 'Podtlistpric', 'DECIMAL', false, 20, null);
        $this->addColumn('PodtDeliveredDate', 'Podtdelivereddate', 'VARCHAR', false, 8, null);
        $this->addColumn('PodtLandCost', 'Podtlandcost', 'DECIMAL', false, 20, null);
        $this->addColumn('DateUpdtd', 'Dateupdtd', 'VARCHAR', false, 8, null);
        $this->addColumn('TimeUpdtd', 'Timeupdtd', 'VARCHAR', false, 8, null);
        $this->addColumn('status', 'Status', 'VARCHAR', false, 50, null);
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
     * @param \EditPoDetail $obj A \EditPoDetail object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getSessionid() || is_scalar($obj->getSessionid()) || is_callable([$obj->getSessionid(), '__toString']) ? (string) $obj->getSessionid() : $obj->getSessionid()), (null === $obj->getPohdnbr() || is_scalar($obj->getPohdnbr()) || is_callable([$obj->getPohdnbr(), '__toString']) ? (string) $obj->getPohdnbr() : $obj->getPohdnbr()), (null === $obj->getPodtline() || is_scalar($obj->getPodtline()) || is_callable([$obj->getPodtline(), '__toString']) ? (string) $obj->getPodtline() : $obj->getPodtline())]);
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
     * @param mixed $value A \EditPoDetail object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \EditPoDetail) {
                $key = serialize([(null === $value->getSessionid() || is_scalar($value->getSessionid()) || is_callable([$value->getSessionid(), '__toString']) ? (string) $value->getSessionid() : $value->getSessionid()), (null === $value->getPohdnbr() || is_scalar($value->getPohdnbr()) || is_callable([$value->getPohdnbr(), '__toString']) ? (string) $value->getPohdnbr() : $value->getPohdnbr()), (null === $value->getPodtline() || is_scalar($value->getPodtline()) || is_callable([$value->getPodtline(), '__toString']) ? (string) $value->getPodtline() : $value->getPodtline())]);

            } elseif (is_array($value) && count($value) === 3) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1]), (null === $value[2] || is_scalar($value[2]) || is_callable([$value[2], '__toString']) ? (string) $value[2] : $value[2])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \EditPoDetail object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Pohdnbr', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Podtline', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Pohdnbr', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Pohdnbr', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Pohdnbr', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Pohdnbr', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Pohdnbr', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Podtline', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Podtline', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Podtline', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Podtline', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('Podtline', TableMap::TYPE_PHPNAME, $indexType)])]);
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
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 1 + $offset
                : self::translateFieldName('Pohdnbr', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 2 + $offset
                : self::translateFieldName('Podtline', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? EditPoDetailTableMap::CLASS_DEFAULT : EditPoDetailTableMap::OM_CLASS;
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
     * @return array           (EditPoDetail object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = EditPoDetailTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = EditPoDetailTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + EditPoDetailTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = EditPoDetailTableMap::OM_CLASS;
            /** @var EditPoDetail $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            EditPoDetailTableMap::addInstanceToPool($obj, $key);
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
            $key = EditPoDetailTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = EditPoDetailTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var EditPoDetail $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                EditPoDetailTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_SESSIONID);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_POHDNBR);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_PODTLINE);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_INITITEMNBR);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_PODTDESC1);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_PODTDESC2);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_PODTVENDITEMNBR);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_INTBWHSE);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_PODTSHIPDATE);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_PODTEXPTDATE);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_PODTCANCDATE);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_INTBUOMPUR);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_PODTQTYORD);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_PODTCOST);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_PODTCOSTTOT);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_PODTREL);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_PODTSPECORDR);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_PODTGLACCT);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_PODTSONBR);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_PODTSTAT);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_PODTORIGSOLINE);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_PODTQTYDUEIN);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_PODTTYPE);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_PODTWGHTTOT);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_PODTFOREIGNCOST);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_PODTFOREIGNCOSTTOT);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_PODTSTANUNITCOST);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_PODTACKDATE);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_PODTINVCCLEARFLAG);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_PODTPRTKITDET);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_PODTDESTWHSE);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_PODTREVISION);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_PODTPRTPOEORU);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_POTBCNFMCODE);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_PODTRCPTNBR);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_PODTWIPNBR);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_PODTORDRAS);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_PODTBOLDATE);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_PODTLISTPRIC);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_PODTDELIVEREDDATE);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_PODTLANDCOST);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_DATEUPDTD);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_TIMEUPDTD);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_STATUS);
            $criteria->addSelectColumn(EditPoDetailTableMap::COL_DUMMY);
        } else {
            $criteria->addSelectColumn($alias . '.sessionid');
            $criteria->addSelectColumn($alias . '.PohdNbr');
            $criteria->addSelectColumn($alias . '.PodtLine');
            $criteria->addSelectColumn($alias . '.InitItemNbr');
            $criteria->addSelectColumn($alias . '.PodtDesc1');
            $criteria->addSelectColumn($alias . '.PodtDesc2');
            $criteria->addSelectColumn($alias . '.PodtVendItemNbr');
            $criteria->addSelectColumn($alias . '.IntbWhse');
            $criteria->addSelectColumn($alias . '.PodtShipDate');
            $criteria->addSelectColumn($alias . '.PodtExptDate');
            $criteria->addSelectColumn($alias . '.PodtCancDate');
            $criteria->addSelectColumn($alias . '.IntbUomPur');
            $criteria->addSelectColumn($alias . '.PodtQtyOrd');
            $criteria->addSelectColumn($alias . '.PodtCost');
            $criteria->addSelectColumn($alias . '.PodtCostTot');
            $criteria->addSelectColumn($alias . '.PodtRel');
            $criteria->addSelectColumn($alias . '.PodtSpecOrdr');
            $criteria->addSelectColumn($alias . '.PodtGlAcct');
            $criteria->addSelectColumn($alias . '.PodtSoNbr');
            $criteria->addSelectColumn($alias . '.PodtStat');
            $criteria->addSelectColumn($alias . '.PodtOrigSoLine');
            $criteria->addSelectColumn($alias . '.PodtQtyDueIn');
            $criteria->addSelectColumn($alias . '.PodtType');
            $criteria->addSelectColumn($alias . '.PodtWghtTot');
            $criteria->addSelectColumn($alias . '.PodtForeignCost');
            $criteria->addSelectColumn($alias . '.PodtForeignCostTot');
            $criteria->addSelectColumn($alias . '.PodtStanUnitCost');
            $criteria->addSelectColumn($alias . '.PodtAckDate');
            $criteria->addSelectColumn($alias . '.PodtInvcClearFlag');
            $criteria->addSelectColumn($alias . '.PodtPrtKitDet');
            $criteria->addSelectColumn($alias . '.PodtDestWhse');
            $criteria->addSelectColumn($alias . '.PodtRevision');
            $criteria->addSelectColumn($alias . '.PodtPrtPoEOrU');
            $criteria->addSelectColumn($alias . '.PotbCnfmCode');
            $criteria->addSelectColumn($alias . '.PodtRcptNbr');
            $criteria->addSelectColumn($alias . '.PodtWipNbr');
            $criteria->addSelectColumn($alias . '.PodtOrdrAs');
            $criteria->addSelectColumn($alias . '.PodtBolDate');
            $criteria->addSelectColumn($alias . '.PodtListPric');
            $criteria->addSelectColumn($alias . '.PodtDeliveredDate');
            $criteria->addSelectColumn($alias . '.PodtLandCost');
            $criteria->addSelectColumn($alias . '.DateUpdtd');
            $criteria->addSelectColumn($alias . '.TimeUpdtd');
            $criteria->addSelectColumn($alias . '.status');
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
        return Propel::getServiceContainer()->getDatabaseMap(EditPoDetailTableMap::DATABASE_NAME)->getTable(EditPoDetailTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(EditPoDetailTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(EditPoDetailTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new EditPoDetailTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a EditPoDetail or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or EditPoDetail object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(EditPoDetailTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \EditPoDetail) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(EditPoDetailTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(EditPoDetailTableMap::COL_SESSIONID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(EditPoDetailTableMap::COL_POHDNBR, $value[1]));
                $criterion->addAnd($criteria->getNewCriterion(EditPoDetailTableMap::COL_PODTLINE, $value[2]));
                $criteria->addOr($criterion);
            }
        }

        $query = EditPoDetailQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            EditPoDetailTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                EditPoDetailTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the edit_po_detail table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return EditPoDetailQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a EditPoDetail or Criteria object.
     *
     * @param mixed               $criteria Criteria or EditPoDetail object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EditPoDetailTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from EditPoDetail object
        }


        // Set the correct dbName
        $query = EditPoDetailQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // EditPoDetailTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
EditPoDetailTableMap::buildTableMap();
