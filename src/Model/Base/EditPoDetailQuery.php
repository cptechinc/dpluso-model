<?php

namespace Base;

use \EditPoDetail as ChildEditPoDetail;
use \EditPoDetailQuery as ChildEditPoDetailQuery;
use \Exception;
use \PDO;
use Map\EditPoDetailTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'edit_po_detail' table.
 *
 *
 *
 * @method     ChildEditPoDetailQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildEditPoDetailQuery orderByPohdnbr($order = Criteria::ASC) Order by the PohdNbr column
 * @method     ChildEditPoDetailQuery orderByPodtline($order = Criteria::ASC) Order by the PodtLine column
 * @method     ChildEditPoDetailQuery orderByInititemnbr($order = Criteria::ASC) Order by the InitItemNbr column
 * @method     ChildEditPoDetailQuery orderByPodtdesc1($order = Criteria::ASC) Order by the PodtDesc1 column
 * @method     ChildEditPoDetailQuery orderByPodtdesc2($order = Criteria::ASC) Order by the PodtDesc2 column
 * @method     ChildEditPoDetailQuery orderByPodtvenditemnbr($order = Criteria::ASC) Order by the PodtVendItemNbr column
 * @method     ChildEditPoDetailQuery orderByIntbwhse($order = Criteria::ASC) Order by the IntbWhse column
 * @method     ChildEditPoDetailQuery orderByPodtshipdate($order = Criteria::ASC) Order by the PodtShipDate column
 * @method     ChildEditPoDetailQuery orderByPodtexptdate($order = Criteria::ASC) Order by the PodtExptDate column
 * @method     ChildEditPoDetailQuery orderByPodtcancdate($order = Criteria::ASC) Order by the PodtCancDate column
 * @method     ChildEditPoDetailQuery orderByIntbuompur($order = Criteria::ASC) Order by the IntbUomPur column
 * @method     ChildEditPoDetailQuery orderByPodtqtyord($order = Criteria::ASC) Order by the PodtQtyOrd column
 * @method     ChildEditPoDetailQuery orderByPodtcost($order = Criteria::ASC) Order by the PodtCost column
 * @method     ChildEditPoDetailQuery orderByPodtcosttot($order = Criteria::ASC) Order by the PodtCostTot column
 * @method     ChildEditPoDetailQuery orderByPodtrel($order = Criteria::ASC) Order by the PodtRel column
 * @method     ChildEditPoDetailQuery orderByPodtspecordr($order = Criteria::ASC) Order by the PodtSpecOrdr column
 * @method     ChildEditPoDetailQuery orderByPodtglacct($order = Criteria::ASC) Order by the PodtGlAcct column
 * @method     ChildEditPoDetailQuery orderByPodtsonbr($order = Criteria::ASC) Order by the PodtSoNbr column
 * @method     ChildEditPoDetailQuery orderByPodtstat($order = Criteria::ASC) Order by the PodtStat column
 * @method     ChildEditPoDetailQuery orderByPodtorigsoline($order = Criteria::ASC) Order by the PodtOrigSoLine column
 * @method     ChildEditPoDetailQuery orderByPodtqtyduein($order = Criteria::ASC) Order by the PodtQtyDueIn column
 * @method     ChildEditPoDetailQuery orderByPodttype($order = Criteria::ASC) Order by the PodtType column
 * @method     ChildEditPoDetailQuery orderByPodtwghttot($order = Criteria::ASC) Order by the PodtWghtTot column
 * @method     ChildEditPoDetailQuery orderByPodtforeigncost($order = Criteria::ASC) Order by the PodtForeignCost column
 * @method     ChildEditPoDetailQuery orderByPodtforeigncosttot($order = Criteria::ASC) Order by the PodtForeignCostTot column
 * @method     ChildEditPoDetailQuery orderByPodtstanunitcost($order = Criteria::ASC) Order by the PodtStanUnitCost column
 * @method     ChildEditPoDetailQuery orderByPodtackdate($order = Criteria::ASC) Order by the PodtAckDate column
 * @method     ChildEditPoDetailQuery orderByPodtinvcclearflag($order = Criteria::ASC) Order by the PodtInvcClearFlag column
 * @method     ChildEditPoDetailQuery orderByPodtprtkitdet($order = Criteria::ASC) Order by the PodtPrtKitDet column
 * @method     ChildEditPoDetailQuery orderByPodtdestwhse($order = Criteria::ASC) Order by the PodtDestWhse column
 * @method     ChildEditPoDetailQuery orderByPodtrevision($order = Criteria::ASC) Order by the PodtRevision column
 * @method     ChildEditPoDetailQuery orderByPodtprtpoeoru($order = Criteria::ASC) Order by the PodtPrtPoEOrU column
 * @method     ChildEditPoDetailQuery orderByPotbcnfmcode($order = Criteria::ASC) Order by the PotbCnfmCode column
 * @method     ChildEditPoDetailQuery orderByPodtrcptnbr($order = Criteria::ASC) Order by the PodtRcptNbr column
 * @method     ChildEditPoDetailQuery orderByPodtwipnbr($order = Criteria::ASC) Order by the PodtWipNbr column
 * @method     ChildEditPoDetailQuery orderByPodtordras($order = Criteria::ASC) Order by the PodtOrdrAs column
 * @method     ChildEditPoDetailQuery orderByPodtboldate($order = Criteria::ASC) Order by the PodtBolDate column
 * @method     ChildEditPoDetailQuery orderByPodtlistpric($order = Criteria::ASC) Order by the PodtListPric column
 * @method     ChildEditPoDetailQuery orderByPodtdelivereddate($order = Criteria::ASC) Order by the PodtDeliveredDate column
 * @method     ChildEditPoDetailQuery orderByPodtlandcost($order = Criteria::ASC) Order by the PodtLandCost column
 * @method     ChildEditPoDetailQuery orderByDateupdtd($order = Criteria::ASC) Order by the DateUpdtd column
 * @method     ChildEditPoDetailQuery orderByTimeupdtd($order = Criteria::ASC) Order by the TimeUpdtd column
 * @method     ChildEditPoDetailQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildEditPoDetailQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildEditPoDetailQuery groupBySessionid() Group by the sessionid column
 * @method     ChildEditPoDetailQuery groupByPohdnbr() Group by the PohdNbr column
 * @method     ChildEditPoDetailQuery groupByPodtline() Group by the PodtLine column
 * @method     ChildEditPoDetailQuery groupByInititemnbr() Group by the InitItemNbr column
 * @method     ChildEditPoDetailQuery groupByPodtdesc1() Group by the PodtDesc1 column
 * @method     ChildEditPoDetailQuery groupByPodtdesc2() Group by the PodtDesc2 column
 * @method     ChildEditPoDetailQuery groupByPodtvenditemnbr() Group by the PodtVendItemNbr column
 * @method     ChildEditPoDetailQuery groupByIntbwhse() Group by the IntbWhse column
 * @method     ChildEditPoDetailQuery groupByPodtshipdate() Group by the PodtShipDate column
 * @method     ChildEditPoDetailQuery groupByPodtexptdate() Group by the PodtExptDate column
 * @method     ChildEditPoDetailQuery groupByPodtcancdate() Group by the PodtCancDate column
 * @method     ChildEditPoDetailQuery groupByIntbuompur() Group by the IntbUomPur column
 * @method     ChildEditPoDetailQuery groupByPodtqtyord() Group by the PodtQtyOrd column
 * @method     ChildEditPoDetailQuery groupByPodtcost() Group by the PodtCost column
 * @method     ChildEditPoDetailQuery groupByPodtcosttot() Group by the PodtCostTot column
 * @method     ChildEditPoDetailQuery groupByPodtrel() Group by the PodtRel column
 * @method     ChildEditPoDetailQuery groupByPodtspecordr() Group by the PodtSpecOrdr column
 * @method     ChildEditPoDetailQuery groupByPodtglacct() Group by the PodtGlAcct column
 * @method     ChildEditPoDetailQuery groupByPodtsonbr() Group by the PodtSoNbr column
 * @method     ChildEditPoDetailQuery groupByPodtstat() Group by the PodtStat column
 * @method     ChildEditPoDetailQuery groupByPodtorigsoline() Group by the PodtOrigSoLine column
 * @method     ChildEditPoDetailQuery groupByPodtqtyduein() Group by the PodtQtyDueIn column
 * @method     ChildEditPoDetailQuery groupByPodttype() Group by the PodtType column
 * @method     ChildEditPoDetailQuery groupByPodtwghttot() Group by the PodtWghtTot column
 * @method     ChildEditPoDetailQuery groupByPodtforeigncost() Group by the PodtForeignCost column
 * @method     ChildEditPoDetailQuery groupByPodtforeigncosttot() Group by the PodtForeignCostTot column
 * @method     ChildEditPoDetailQuery groupByPodtstanunitcost() Group by the PodtStanUnitCost column
 * @method     ChildEditPoDetailQuery groupByPodtackdate() Group by the PodtAckDate column
 * @method     ChildEditPoDetailQuery groupByPodtinvcclearflag() Group by the PodtInvcClearFlag column
 * @method     ChildEditPoDetailQuery groupByPodtprtkitdet() Group by the PodtPrtKitDet column
 * @method     ChildEditPoDetailQuery groupByPodtdestwhse() Group by the PodtDestWhse column
 * @method     ChildEditPoDetailQuery groupByPodtrevision() Group by the PodtRevision column
 * @method     ChildEditPoDetailQuery groupByPodtprtpoeoru() Group by the PodtPrtPoEOrU column
 * @method     ChildEditPoDetailQuery groupByPotbcnfmcode() Group by the PotbCnfmCode column
 * @method     ChildEditPoDetailQuery groupByPodtrcptnbr() Group by the PodtRcptNbr column
 * @method     ChildEditPoDetailQuery groupByPodtwipnbr() Group by the PodtWipNbr column
 * @method     ChildEditPoDetailQuery groupByPodtordras() Group by the PodtOrdrAs column
 * @method     ChildEditPoDetailQuery groupByPodtboldate() Group by the PodtBolDate column
 * @method     ChildEditPoDetailQuery groupByPodtlistpric() Group by the PodtListPric column
 * @method     ChildEditPoDetailQuery groupByPodtdelivereddate() Group by the PodtDeliveredDate column
 * @method     ChildEditPoDetailQuery groupByPodtlandcost() Group by the PodtLandCost column
 * @method     ChildEditPoDetailQuery groupByDateupdtd() Group by the DateUpdtd column
 * @method     ChildEditPoDetailQuery groupByTimeupdtd() Group by the TimeUpdtd column
 * @method     ChildEditPoDetailQuery groupByStatus() Group by the status column
 * @method     ChildEditPoDetailQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildEditPoDetailQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEditPoDetailQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEditPoDetailQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEditPoDetailQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEditPoDetailQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEditPoDetailQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEditPoDetail findOne(ConnectionInterface $con = null) Return the first ChildEditPoDetail matching the query
 * @method     ChildEditPoDetail findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEditPoDetail matching the query, or a new ChildEditPoDetail object populated from the query conditions when no match is found
 *
 * @method     ChildEditPoDetail findOneBySessionid(string $sessionid) Return the first ChildEditPoDetail filtered by the sessionid column
 * @method     ChildEditPoDetail findOneByPohdnbr(string $PohdNbr) Return the first ChildEditPoDetail filtered by the PohdNbr column
 * @method     ChildEditPoDetail findOneByPodtline(int $PodtLine) Return the first ChildEditPoDetail filtered by the PodtLine column
 * @method     ChildEditPoDetail findOneByInititemnbr(string $InitItemNbr) Return the first ChildEditPoDetail filtered by the InitItemNbr column
 * @method     ChildEditPoDetail findOneByPodtdesc1(string $PodtDesc1) Return the first ChildEditPoDetail filtered by the PodtDesc1 column
 * @method     ChildEditPoDetail findOneByPodtdesc2(string $PodtDesc2) Return the first ChildEditPoDetail filtered by the PodtDesc2 column
 * @method     ChildEditPoDetail findOneByPodtvenditemnbr(string $PodtVendItemNbr) Return the first ChildEditPoDetail filtered by the PodtVendItemNbr column
 * @method     ChildEditPoDetail findOneByIntbwhse(string $IntbWhse) Return the first ChildEditPoDetail filtered by the IntbWhse column
 * @method     ChildEditPoDetail findOneByPodtshipdate(string $PodtShipDate) Return the first ChildEditPoDetail filtered by the PodtShipDate column
 * @method     ChildEditPoDetail findOneByPodtexptdate(string $PodtExptDate) Return the first ChildEditPoDetail filtered by the PodtExptDate column
 * @method     ChildEditPoDetail findOneByPodtcancdate(string $PodtCancDate) Return the first ChildEditPoDetail filtered by the PodtCancDate column
 * @method     ChildEditPoDetail findOneByIntbuompur(string $IntbUomPur) Return the first ChildEditPoDetail filtered by the IntbUomPur column
 * @method     ChildEditPoDetail findOneByPodtqtyord(string $PodtQtyOrd) Return the first ChildEditPoDetail filtered by the PodtQtyOrd column
 * @method     ChildEditPoDetail findOneByPodtcost(string $PodtCost) Return the first ChildEditPoDetail filtered by the PodtCost column
 * @method     ChildEditPoDetail findOneByPodtcosttot(string $PodtCostTot) Return the first ChildEditPoDetail filtered by the PodtCostTot column
 * @method     ChildEditPoDetail findOneByPodtrel(string $PodtRel) Return the first ChildEditPoDetail filtered by the PodtRel column
 * @method     ChildEditPoDetail findOneByPodtspecordr(string $PodtSpecOrdr) Return the first ChildEditPoDetail filtered by the PodtSpecOrdr column
 * @method     ChildEditPoDetail findOneByPodtglacct(string $PodtGlAcct) Return the first ChildEditPoDetail filtered by the PodtGlAcct column
 * @method     ChildEditPoDetail findOneByPodtsonbr(string $PodtSoNbr) Return the first ChildEditPoDetail filtered by the PodtSoNbr column
 * @method     ChildEditPoDetail findOneByPodtstat(string $PodtStat) Return the first ChildEditPoDetail filtered by the PodtStat column
 * @method     ChildEditPoDetail findOneByPodtorigsoline(int $PodtOrigSoLine) Return the first ChildEditPoDetail filtered by the PodtOrigSoLine column
 * @method     ChildEditPoDetail findOneByPodtqtyduein(string $PodtQtyDueIn) Return the first ChildEditPoDetail filtered by the PodtQtyDueIn column
 * @method     ChildEditPoDetail findOneByPodttype(string $PodtType) Return the first ChildEditPoDetail filtered by the PodtType column
 * @method     ChildEditPoDetail findOneByPodtwghttot(string $PodtWghtTot) Return the first ChildEditPoDetail filtered by the PodtWghtTot column
 * @method     ChildEditPoDetail findOneByPodtforeigncost(string $PodtForeignCost) Return the first ChildEditPoDetail filtered by the PodtForeignCost column
 * @method     ChildEditPoDetail findOneByPodtforeigncosttot(string $PodtForeignCostTot) Return the first ChildEditPoDetail filtered by the PodtForeignCostTot column
 * @method     ChildEditPoDetail findOneByPodtstanunitcost(string $PodtStanUnitCost) Return the first ChildEditPoDetail filtered by the PodtStanUnitCost column
 * @method     ChildEditPoDetail findOneByPodtackdate(string $PodtAckDate) Return the first ChildEditPoDetail filtered by the PodtAckDate column
 * @method     ChildEditPoDetail findOneByPodtinvcclearflag(string $PodtInvcClearFlag) Return the first ChildEditPoDetail filtered by the PodtInvcClearFlag column
 * @method     ChildEditPoDetail findOneByPodtprtkitdet(string $PodtPrtKitDet) Return the first ChildEditPoDetail filtered by the PodtPrtKitDet column
 * @method     ChildEditPoDetail findOneByPodtdestwhse(string $PodtDestWhse) Return the first ChildEditPoDetail filtered by the PodtDestWhse column
 * @method     ChildEditPoDetail findOneByPodtrevision(string $PodtRevision) Return the first ChildEditPoDetail filtered by the PodtRevision column
 * @method     ChildEditPoDetail findOneByPodtprtpoeoru(string $PodtPrtPoEOrU) Return the first ChildEditPoDetail filtered by the PodtPrtPoEOrU column
 * @method     ChildEditPoDetail findOneByPotbcnfmcode(string $PotbCnfmCode) Return the first ChildEditPoDetail filtered by the PotbCnfmCode column
 * @method     ChildEditPoDetail findOneByPodtrcptnbr(string $PodtRcptNbr) Return the first ChildEditPoDetail filtered by the PodtRcptNbr column
 * @method     ChildEditPoDetail findOneByPodtwipnbr(string $PodtWipNbr) Return the first ChildEditPoDetail filtered by the PodtWipNbr column
 * @method     ChildEditPoDetail findOneByPodtordras(string $PodtOrdrAs) Return the first ChildEditPoDetail filtered by the PodtOrdrAs column
 * @method     ChildEditPoDetail findOneByPodtboldate(string $PodtBolDate) Return the first ChildEditPoDetail filtered by the PodtBolDate column
 * @method     ChildEditPoDetail findOneByPodtlistpric(string $PodtListPric) Return the first ChildEditPoDetail filtered by the PodtListPric column
 * @method     ChildEditPoDetail findOneByPodtdelivereddate(string $PodtDeliveredDate) Return the first ChildEditPoDetail filtered by the PodtDeliveredDate column
 * @method     ChildEditPoDetail findOneByPodtlandcost(string $PodtLandCost) Return the first ChildEditPoDetail filtered by the PodtLandCost column
 * @method     ChildEditPoDetail findOneByDateupdtd(string $DateUpdtd) Return the first ChildEditPoDetail filtered by the DateUpdtd column
 * @method     ChildEditPoDetail findOneByTimeupdtd(string $TimeUpdtd) Return the first ChildEditPoDetail filtered by the TimeUpdtd column
 * @method     ChildEditPoDetail findOneByStatus(string $status) Return the first ChildEditPoDetail filtered by the status column
 * @method     ChildEditPoDetail findOneByDummy(string $dummy) Return the first ChildEditPoDetail filtered by the dummy column *

 * @method     ChildEditPoDetail requirePk($key, ConnectionInterface $con = null) Return the ChildEditPoDetail by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOne(ConnectionInterface $con = null) Return the first ChildEditPoDetail matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEditPoDetail requireOneBySessionid(string $sessionid) Return the first ChildEditPoDetail filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByPohdnbr(string $PohdNbr) Return the first ChildEditPoDetail filtered by the PohdNbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByPodtline(int $PodtLine) Return the first ChildEditPoDetail filtered by the PodtLine column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByInititemnbr(string $InitItemNbr) Return the first ChildEditPoDetail filtered by the InitItemNbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByPodtdesc1(string $PodtDesc1) Return the first ChildEditPoDetail filtered by the PodtDesc1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByPodtdesc2(string $PodtDesc2) Return the first ChildEditPoDetail filtered by the PodtDesc2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByPodtvenditemnbr(string $PodtVendItemNbr) Return the first ChildEditPoDetail filtered by the PodtVendItemNbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByIntbwhse(string $IntbWhse) Return the first ChildEditPoDetail filtered by the IntbWhse column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByPodtshipdate(string $PodtShipDate) Return the first ChildEditPoDetail filtered by the PodtShipDate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByPodtexptdate(string $PodtExptDate) Return the first ChildEditPoDetail filtered by the PodtExptDate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByPodtcancdate(string $PodtCancDate) Return the first ChildEditPoDetail filtered by the PodtCancDate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByIntbuompur(string $IntbUomPur) Return the first ChildEditPoDetail filtered by the IntbUomPur column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByPodtqtyord(string $PodtQtyOrd) Return the first ChildEditPoDetail filtered by the PodtQtyOrd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByPodtcost(string $PodtCost) Return the first ChildEditPoDetail filtered by the PodtCost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByPodtcosttot(string $PodtCostTot) Return the first ChildEditPoDetail filtered by the PodtCostTot column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByPodtrel(string $PodtRel) Return the first ChildEditPoDetail filtered by the PodtRel column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByPodtspecordr(string $PodtSpecOrdr) Return the first ChildEditPoDetail filtered by the PodtSpecOrdr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByPodtglacct(string $PodtGlAcct) Return the first ChildEditPoDetail filtered by the PodtGlAcct column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByPodtsonbr(string $PodtSoNbr) Return the first ChildEditPoDetail filtered by the PodtSoNbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByPodtstat(string $PodtStat) Return the first ChildEditPoDetail filtered by the PodtStat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByPodtorigsoline(int $PodtOrigSoLine) Return the first ChildEditPoDetail filtered by the PodtOrigSoLine column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByPodtqtyduein(string $PodtQtyDueIn) Return the first ChildEditPoDetail filtered by the PodtQtyDueIn column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByPodttype(string $PodtType) Return the first ChildEditPoDetail filtered by the PodtType column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByPodtwghttot(string $PodtWghtTot) Return the first ChildEditPoDetail filtered by the PodtWghtTot column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByPodtforeigncost(string $PodtForeignCost) Return the first ChildEditPoDetail filtered by the PodtForeignCost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByPodtforeigncosttot(string $PodtForeignCostTot) Return the first ChildEditPoDetail filtered by the PodtForeignCostTot column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByPodtstanunitcost(string $PodtStanUnitCost) Return the first ChildEditPoDetail filtered by the PodtStanUnitCost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByPodtackdate(string $PodtAckDate) Return the first ChildEditPoDetail filtered by the PodtAckDate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByPodtinvcclearflag(string $PodtInvcClearFlag) Return the first ChildEditPoDetail filtered by the PodtInvcClearFlag column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByPodtprtkitdet(string $PodtPrtKitDet) Return the first ChildEditPoDetail filtered by the PodtPrtKitDet column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByPodtdestwhse(string $PodtDestWhse) Return the first ChildEditPoDetail filtered by the PodtDestWhse column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByPodtrevision(string $PodtRevision) Return the first ChildEditPoDetail filtered by the PodtRevision column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByPodtprtpoeoru(string $PodtPrtPoEOrU) Return the first ChildEditPoDetail filtered by the PodtPrtPoEOrU column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByPotbcnfmcode(string $PotbCnfmCode) Return the first ChildEditPoDetail filtered by the PotbCnfmCode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByPodtrcptnbr(string $PodtRcptNbr) Return the first ChildEditPoDetail filtered by the PodtRcptNbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByPodtwipnbr(string $PodtWipNbr) Return the first ChildEditPoDetail filtered by the PodtWipNbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByPodtordras(string $PodtOrdrAs) Return the first ChildEditPoDetail filtered by the PodtOrdrAs column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByPodtboldate(string $PodtBolDate) Return the first ChildEditPoDetail filtered by the PodtBolDate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByPodtlistpric(string $PodtListPric) Return the first ChildEditPoDetail filtered by the PodtListPric column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByPodtdelivereddate(string $PodtDeliveredDate) Return the first ChildEditPoDetail filtered by the PodtDeliveredDate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByPodtlandcost(string $PodtLandCost) Return the first ChildEditPoDetail filtered by the PodtLandCost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByDateupdtd(string $DateUpdtd) Return the first ChildEditPoDetail filtered by the DateUpdtd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByTimeupdtd(string $TimeUpdtd) Return the first ChildEditPoDetail filtered by the TimeUpdtd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByStatus(string $status) Return the first ChildEditPoDetail filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEditPoDetail requireOneByDummy(string $dummy) Return the first ChildEditPoDetail filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEditPoDetail[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEditPoDetail objects based on current ModelCriteria
 * @method     ChildEditPoDetail[]|ObjectCollection findBySessionid(string $sessionid) Return ChildEditPoDetail objects filtered by the sessionid column
 * @method     ChildEditPoDetail[]|ObjectCollection findByPohdnbr(string $PohdNbr) Return ChildEditPoDetail objects filtered by the PohdNbr column
 * @method     ChildEditPoDetail[]|ObjectCollection findByPodtline(int $PodtLine) Return ChildEditPoDetail objects filtered by the PodtLine column
 * @method     ChildEditPoDetail[]|ObjectCollection findByInititemnbr(string $InitItemNbr) Return ChildEditPoDetail objects filtered by the InitItemNbr column
 * @method     ChildEditPoDetail[]|ObjectCollection findByPodtdesc1(string $PodtDesc1) Return ChildEditPoDetail objects filtered by the PodtDesc1 column
 * @method     ChildEditPoDetail[]|ObjectCollection findByPodtdesc2(string $PodtDesc2) Return ChildEditPoDetail objects filtered by the PodtDesc2 column
 * @method     ChildEditPoDetail[]|ObjectCollection findByPodtvenditemnbr(string $PodtVendItemNbr) Return ChildEditPoDetail objects filtered by the PodtVendItemNbr column
 * @method     ChildEditPoDetail[]|ObjectCollection findByIntbwhse(string $IntbWhse) Return ChildEditPoDetail objects filtered by the IntbWhse column
 * @method     ChildEditPoDetail[]|ObjectCollection findByPodtshipdate(string $PodtShipDate) Return ChildEditPoDetail objects filtered by the PodtShipDate column
 * @method     ChildEditPoDetail[]|ObjectCollection findByPodtexptdate(string $PodtExptDate) Return ChildEditPoDetail objects filtered by the PodtExptDate column
 * @method     ChildEditPoDetail[]|ObjectCollection findByPodtcancdate(string $PodtCancDate) Return ChildEditPoDetail objects filtered by the PodtCancDate column
 * @method     ChildEditPoDetail[]|ObjectCollection findByIntbuompur(string $IntbUomPur) Return ChildEditPoDetail objects filtered by the IntbUomPur column
 * @method     ChildEditPoDetail[]|ObjectCollection findByPodtqtyord(string $PodtQtyOrd) Return ChildEditPoDetail objects filtered by the PodtQtyOrd column
 * @method     ChildEditPoDetail[]|ObjectCollection findByPodtcost(string $PodtCost) Return ChildEditPoDetail objects filtered by the PodtCost column
 * @method     ChildEditPoDetail[]|ObjectCollection findByPodtcosttot(string $PodtCostTot) Return ChildEditPoDetail objects filtered by the PodtCostTot column
 * @method     ChildEditPoDetail[]|ObjectCollection findByPodtrel(string $PodtRel) Return ChildEditPoDetail objects filtered by the PodtRel column
 * @method     ChildEditPoDetail[]|ObjectCollection findByPodtspecordr(string $PodtSpecOrdr) Return ChildEditPoDetail objects filtered by the PodtSpecOrdr column
 * @method     ChildEditPoDetail[]|ObjectCollection findByPodtglacct(string $PodtGlAcct) Return ChildEditPoDetail objects filtered by the PodtGlAcct column
 * @method     ChildEditPoDetail[]|ObjectCollection findByPodtsonbr(string $PodtSoNbr) Return ChildEditPoDetail objects filtered by the PodtSoNbr column
 * @method     ChildEditPoDetail[]|ObjectCollection findByPodtstat(string $PodtStat) Return ChildEditPoDetail objects filtered by the PodtStat column
 * @method     ChildEditPoDetail[]|ObjectCollection findByPodtorigsoline(int $PodtOrigSoLine) Return ChildEditPoDetail objects filtered by the PodtOrigSoLine column
 * @method     ChildEditPoDetail[]|ObjectCollection findByPodtqtyduein(string $PodtQtyDueIn) Return ChildEditPoDetail objects filtered by the PodtQtyDueIn column
 * @method     ChildEditPoDetail[]|ObjectCollection findByPodttype(string $PodtType) Return ChildEditPoDetail objects filtered by the PodtType column
 * @method     ChildEditPoDetail[]|ObjectCollection findByPodtwghttot(string $PodtWghtTot) Return ChildEditPoDetail objects filtered by the PodtWghtTot column
 * @method     ChildEditPoDetail[]|ObjectCollection findByPodtforeigncost(string $PodtForeignCost) Return ChildEditPoDetail objects filtered by the PodtForeignCost column
 * @method     ChildEditPoDetail[]|ObjectCollection findByPodtforeigncosttot(string $PodtForeignCostTot) Return ChildEditPoDetail objects filtered by the PodtForeignCostTot column
 * @method     ChildEditPoDetail[]|ObjectCollection findByPodtstanunitcost(string $PodtStanUnitCost) Return ChildEditPoDetail objects filtered by the PodtStanUnitCost column
 * @method     ChildEditPoDetail[]|ObjectCollection findByPodtackdate(string $PodtAckDate) Return ChildEditPoDetail objects filtered by the PodtAckDate column
 * @method     ChildEditPoDetail[]|ObjectCollection findByPodtinvcclearflag(string $PodtInvcClearFlag) Return ChildEditPoDetail objects filtered by the PodtInvcClearFlag column
 * @method     ChildEditPoDetail[]|ObjectCollection findByPodtprtkitdet(string $PodtPrtKitDet) Return ChildEditPoDetail objects filtered by the PodtPrtKitDet column
 * @method     ChildEditPoDetail[]|ObjectCollection findByPodtdestwhse(string $PodtDestWhse) Return ChildEditPoDetail objects filtered by the PodtDestWhse column
 * @method     ChildEditPoDetail[]|ObjectCollection findByPodtrevision(string $PodtRevision) Return ChildEditPoDetail objects filtered by the PodtRevision column
 * @method     ChildEditPoDetail[]|ObjectCollection findByPodtprtpoeoru(string $PodtPrtPoEOrU) Return ChildEditPoDetail objects filtered by the PodtPrtPoEOrU column
 * @method     ChildEditPoDetail[]|ObjectCollection findByPotbcnfmcode(string $PotbCnfmCode) Return ChildEditPoDetail objects filtered by the PotbCnfmCode column
 * @method     ChildEditPoDetail[]|ObjectCollection findByPodtrcptnbr(string $PodtRcptNbr) Return ChildEditPoDetail objects filtered by the PodtRcptNbr column
 * @method     ChildEditPoDetail[]|ObjectCollection findByPodtwipnbr(string $PodtWipNbr) Return ChildEditPoDetail objects filtered by the PodtWipNbr column
 * @method     ChildEditPoDetail[]|ObjectCollection findByPodtordras(string $PodtOrdrAs) Return ChildEditPoDetail objects filtered by the PodtOrdrAs column
 * @method     ChildEditPoDetail[]|ObjectCollection findByPodtboldate(string $PodtBolDate) Return ChildEditPoDetail objects filtered by the PodtBolDate column
 * @method     ChildEditPoDetail[]|ObjectCollection findByPodtlistpric(string $PodtListPric) Return ChildEditPoDetail objects filtered by the PodtListPric column
 * @method     ChildEditPoDetail[]|ObjectCollection findByPodtdelivereddate(string $PodtDeliveredDate) Return ChildEditPoDetail objects filtered by the PodtDeliveredDate column
 * @method     ChildEditPoDetail[]|ObjectCollection findByPodtlandcost(string $PodtLandCost) Return ChildEditPoDetail objects filtered by the PodtLandCost column
 * @method     ChildEditPoDetail[]|ObjectCollection findByDateupdtd(string $DateUpdtd) Return ChildEditPoDetail objects filtered by the DateUpdtd column
 * @method     ChildEditPoDetail[]|ObjectCollection findByTimeupdtd(string $TimeUpdtd) Return ChildEditPoDetail objects filtered by the TimeUpdtd column
 * @method     ChildEditPoDetail[]|ObjectCollection findByStatus(string $status) Return ChildEditPoDetail objects filtered by the status column
 * @method     ChildEditPoDetail[]|ObjectCollection findByDummy(string $dummy) Return ChildEditPoDetail objects filtered by the dummy column
 * @method     ChildEditPoDetail[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EditPoDetailQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\EditPoDetailQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\EditPoDetail', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEditPoDetailQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEditPoDetailQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEditPoDetailQuery) {
            return $criteria;
        }
        $query = new ChildEditPoDetailQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj = $c->findPk(array(12, 34, 56), $con);
     * </code>
     *
     * @param array[$sessionid, $PohdNbr, $PodtLine] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildEditPoDetail|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EditPoDetailTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = EditPoDetailTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2])]))))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEditPoDetail A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, PohdNbr, PodtLine, InitItemNbr, PodtDesc1, PodtDesc2, PodtVendItemNbr, IntbWhse, PodtShipDate, PodtExptDate, PodtCancDate, IntbUomPur, PodtQtyOrd, PodtCost, PodtCostTot, PodtRel, PodtSpecOrdr, PodtGlAcct, PodtSoNbr, PodtStat, PodtOrigSoLine, PodtQtyDueIn, PodtType, PodtWghtTot, PodtForeignCost, PodtForeignCostTot, PodtStanUnitCost, PodtAckDate, PodtInvcClearFlag, PodtPrtKitDet, PodtDestWhse, PodtRevision, PodtPrtPoEOrU, PotbCnfmCode, PodtRcptNbr, PodtWipNbr, PodtOrdrAs, PodtBolDate, PodtListPric, PodtDeliveredDate, PodtLandCost, DateUpdtd, TimeUpdtd, status, dummy FROM edit_po_detail WHERE sessionid = :p0 AND PohdNbr = :p1 AND PodtLine = :p2';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->bindValue(':p2', $key[2], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildEditPoDetail $obj */
            $obj = new ChildEditPoDetail();
            $obj->hydrate($row);
            EditPoDetailTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2])]));
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildEditPoDetail|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(EditPoDetailTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(EditPoDetailTableMap::COL_POHDNBR, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(EditPoDetailTableMap::COL_PODTLINE, $key[2], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(EditPoDetailTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(EditPoDetailTableMap::COL_POHDNBR, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(EditPoDetailTableMap::COL_PODTLINE, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the sessionid column
     *
     * Example usage:
     * <code>
     * $query->filterBySessionid('fooValue');   // WHERE sessionid = 'fooValue'
     * $query->filterBySessionid('%fooValue%', Criteria::LIKE); // WHERE sessionid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sessionid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_SESSIONID, $sessionid, $comparison);
    }

    /**
     * Filter the query on the PohdNbr column
     *
     * Example usage:
     * <code>
     * $query->filterByPohdnbr('fooValue');   // WHERE PohdNbr = 'fooValue'
     * $query->filterByPohdnbr('%fooValue%', Criteria::LIKE); // WHERE PohdNbr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pohdnbr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPohdnbr($pohdnbr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pohdnbr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_POHDNBR, $pohdnbr, $comparison);
    }

    /**
     * Filter the query on the PodtLine column
     *
     * Example usage:
     * <code>
     * $query->filterByPodtline(1234); // WHERE PodtLine = 1234
     * $query->filterByPodtline(array(12, 34)); // WHERE PodtLine IN (12, 34)
     * $query->filterByPodtline(array('min' => 12)); // WHERE PodtLine > 12
     * </code>
     *
     * @param     mixed $podtline The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPodtline($podtline = null, $comparison = null)
    {
        if (is_array($podtline)) {
            $useMinMax = false;
            if (isset($podtline['min'])) {
                $this->addUsingAlias(EditPoDetailTableMap::COL_PODTLINE, $podtline['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($podtline['max'])) {
                $this->addUsingAlias(EditPoDetailTableMap::COL_PODTLINE, $podtline['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_PODTLINE, $podtline, $comparison);
    }

    /**
     * Filter the query on the InitItemNbr column
     *
     * Example usage:
     * <code>
     * $query->filterByInititemnbr('fooValue');   // WHERE InitItemNbr = 'fooValue'
     * $query->filterByInititemnbr('%fooValue%', Criteria::LIKE); // WHERE InitItemNbr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $inititemnbr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByInititemnbr($inititemnbr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($inititemnbr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_INITITEMNBR, $inititemnbr, $comparison);
    }

    /**
     * Filter the query on the PodtDesc1 column
     *
     * Example usage:
     * <code>
     * $query->filterByPodtdesc1('fooValue');   // WHERE PodtDesc1 = 'fooValue'
     * $query->filterByPodtdesc1('%fooValue%', Criteria::LIKE); // WHERE PodtDesc1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $podtdesc1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPodtdesc1($podtdesc1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($podtdesc1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_PODTDESC1, $podtdesc1, $comparison);
    }

    /**
     * Filter the query on the PodtDesc2 column
     *
     * Example usage:
     * <code>
     * $query->filterByPodtdesc2('fooValue');   // WHERE PodtDesc2 = 'fooValue'
     * $query->filterByPodtdesc2('%fooValue%', Criteria::LIKE); // WHERE PodtDesc2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $podtdesc2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPodtdesc2($podtdesc2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($podtdesc2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_PODTDESC2, $podtdesc2, $comparison);
    }

    /**
     * Filter the query on the PodtVendItemNbr column
     *
     * Example usage:
     * <code>
     * $query->filterByPodtvenditemnbr('fooValue');   // WHERE PodtVendItemNbr = 'fooValue'
     * $query->filterByPodtvenditemnbr('%fooValue%', Criteria::LIKE); // WHERE PodtVendItemNbr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $podtvenditemnbr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPodtvenditemnbr($podtvenditemnbr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($podtvenditemnbr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_PODTVENDITEMNBR, $podtvenditemnbr, $comparison);
    }

    /**
     * Filter the query on the IntbWhse column
     *
     * Example usage:
     * <code>
     * $query->filterByIntbwhse('fooValue');   // WHERE IntbWhse = 'fooValue'
     * $query->filterByIntbwhse('%fooValue%', Criteria::LIKE); // WHERE IntbWhse LIKE '%fooValue%'
     * </code>
     *
     * @param     string $intbwhse The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByIntbwhse($intbwhse = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhse)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_INTBWHSE, $intbwhse, $comparison);
    }

    /**
     * Filter the query on the PodtShipDate column
     *
     * Example usage:
     * <code>
     * $query->filterByPodtshipdate('fooValue');   // WHERE PodtShipDate = 'fooValue'
     * $query->filterByPodtshipdate('%fooValue%', Criteria::LIKE); // WHERE PodtShipDate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $podtshipdate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPodtshipdate($podtshipdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($podtshipdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_PODTSHIPDATE, $podtshipdate, $comparison);
    }

    /**
     * Filter the query on the PodtExptDate column
     *
     * Example usage:
     * <code>
     * $query->filterByPodtexptdate('fooValue');   // WHERE PodtExptDate = 'fooValue'
     * $query->filterByPodtexptdate('%fooValue%', Criteria::LIKE); // WHERE PodtExptDate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $podtexptdate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPodtexptdate($podtexptdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($podtexptdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_PODTEXPTDATE, $podtexptdate, $comparison);
    }

    /**
     * Filter the query on the PodtCancDate column
     *
     * Example usage:
     * <code>
     * $query->filterByPodtcancdate('fooValue');   // WHERE PodtCancDate = 'fooValue'
     * $query->filterByPodtcancdate('%fooValue%', Criteria::LIKE); // WHERE PodtCancDate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $podtcancdate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPodtcancdate($podtcancdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($podtcancdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_PODTCANCDATE, $podtcancdate, $comparison);
    }

    /**
     * Filter the query on the IntbUomPur column
     *
     * Example usage:
     * <code>
     * $query->filterByIntbuompur('fooValue');   // WHERE IntbUomPur = 'fooValue'
     * $query->filterByIntbuompur('%fooValue%', Criteria::LIKE); // WHERE IntbUomPur LIKE '%fooValue%'
     * </code>
     *
     * @param     string $intbuompur The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByIntbuompur($intbuompur = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbuompur)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_INTBUOMPUR, $intbuompur, $comparison);
    }

    /**
     * Filter the query on the PodtQtyOrd column
     *
     * Example usage:
     * <code>
     * $query->filterByPodtqtyord(1234); // WHERE PodtQtyOrd = 1234
     * $query->filterByPodtqtyord(array(12, 34)); // WHERE PodtQtyOrd IN (12, 34)
     * $query->filterByPodtqtyord(array('min' => 12)); // WHERE PodtQtyOrd > 12
     * </code>
     *
     * @param     mixed $podtqtyord The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPodtqtyord($podtqtyord = null, $comparison = null)
    {
        if (is_array($podtqtyord)) {
            $useMinMax = false;
            if (isset($podtqtyord['min'])) {
                $this->addUsingAlias(EditPoDetailTableMap::COL_PODTQTYORD, $podtqtyord['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($podtqtyord['max'])) {
                $this->addUsingAlias(EditPoDetailTableMap::COL_PODTQTYORD, $podtqtyord['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_PODTQTYORD, $podtqtyord, $comparison);
    }

    /**
     * Filter the query on the PodtCost column
     *
     * Example usage:
     * <code>
     * $query->filterByPodtcost(1234); // WHERE PodtCost = 1234
     * $query->filterByPodtcost(array(12, 34)); // WHERE PodtCost IN (12, 34)
     * $query->filterByPodtcost(array('min' => 12)); // WHERE PodtCost > 12
     * </code>
     *
     * @param     mixed $podtcost The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPodtcost($podtcost = null, $comparison = null)
    {
        if (is_array($podtcost)) {
            $useMinMax = false;
            if (isset($podtcost['min'])) {
                $this->addUsingAlias(EditPoDetailTableMap::COL_PODTCOST, $podtcost['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($podtcost['max'])) {
                $this->addUsingAlias(EditPoDetailTableMap::COL_PODTCOST, $podtcost['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_PODTCOST, $podtcost, $comparison);
    }

    /**
     * Filter the query on the PodtCostTot column
     *
     * Example usage:
     * <code>
     * $query->filterByPodtcosttot(1234); // WHERE PodtCostTot = 1234
     * $query->filterByPodtcosttot(array(12, 34)); // WHERE PodtCostTot IN (12, 34)
     * $query->filterByPodtcosttot(array('min' => 12)); // WHERE PodtCostTot > 12
     * </code>
     *
     * @param     mixed $podtcosttot The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPodtcosttot($podtcosttot = null, $comparison = null)
    {
        if (is_array($podtcosttot)) {
            $useMinMax = false;
            if (isset($podtcosttot['min'])) {
                $this->addUsingAlias(EditPoDetailTableMap::COL_PODTCOSTTOT, $podtcosttot['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($podtcosttot['max'])) {
                $this->addUsingAlias(EditPoDetailTableMap::COL_PODTCOSTTOT, $podtcosttot['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_PODTCOSTTOT, $podtcosttot, $comparison);
    }

    /**
     * Filter the query on the PodtRel column
     *
     * Example usage:
     * <code>
     * $query->filterByPodtrel('fooValue');   // WHERE PodtRel = 'fooValue'
     * $query->filterByPodtrel('%fooValue%', Criteria::LIKE); // WHERE PodtRel LIKE '%fooValue%'
     * </code>
     *
     * @param     string $podtrel The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPodtrel($podtrel = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($podtrel)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_PODTREL, $podtrel, $comparison);
    }

    /**
     * Filter the query on the PodtSpecOrdr column
     *
     * Example usage:
     * <code>
     * $query->filterByPodtspecordr('fooValue');   // WHERE PodtSpecOrdr = 'fooValue'
     * $query->filterByPodtspecordr('%fooValue%', Criteria::LIKE); // WHERE PodtSpecOrdr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $podtspecordr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPodtspecordr($podtspecordr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($podtspecordr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_PODTSPECORDR, $podtspecordr, $comparison);
    }

    /**
     * Filter the query on the PodtGlAcct column
     *
     * Example usage:
     * <code>
     * $query->filterByPodtglacct('fooValue');   // WHERE PodtGlAcct = 'fooValue'
     * $query->filterByPodtglacct('%fooValue%', Criteria::LIKE); // WHERE PodtGlAcct LIKE '%fooValue%'
     * </code>
     *
     * @param     string $podtglacct The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPodtglacct($podtglacct = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($podtglacct)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_PODTGLACCT, $podtglacct, $comparison);
    }

    /**
     * Filter the query on the PodtSoNbr column
     *
     * Example usage:
     * <code>
     * $query->filterByPodtsonbr('fooValue');   // WHERE PodtSoNbr = 'fooValue'
     * $query->filterByPodtsonbr('%fooValue%', Criteria::LIKE); // WHERE PodtSoNbr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $podtsonbr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPodtsonbr($podtsonbr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($podtsonbr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_PODTSONBR, $podtsonbr, $comparison);
    }

    /**
     * Filter the query on the PodtStat column
     *
     * Example usage:
     * <code>
     * $query->filterByPodtstat('fooValue');   // WHERE PodtStat = 'fooValue'
     * $query->filterByPodtstat('%fooValue%', Criteria::LIKE); // WHERE PodtStat LIKE '%fooValue%'
     * </code>
     *
     * @param     string $podtstat The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPodtstat($podtstat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($podtstat)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_PODTSTAT, $podtstat, $comparison);
    }

    /**
     * Filter the query on the PodtOrigSoLine column
     *
     * Example usage:
     * <code>
     * $query->filterByPodtorigsoline(1234); // WHERE PodtOrigSoLine = 1234
     * $query->filterByPodtorigsoline(array(12, 34)); // WHERE PodtOrigSoLine IN (12, 34)
     * $query->filterByPodtorigsoline(array('min' => 12)); // WHERE PodtOrigSoLine > 12
     * </code>
     *
     * @param     mixed $podtorigsoline The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPodtorigsoline($podtorigsoline = null, $comparison = null)
    {
        if (is_array($podtorigsoline)) {
            $useMinMax = false;
            if (isset($podtorigsoline['min'])) {
                $this->addUsingAlias(EditPoDetailTableMap::COL_PODTORIGSOLINE, $podtorigsoline['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($podtorigsoline['max'])) {
                $this->addUsingAlias(EditPoDetailTableMap::COL_PODTORIGSOLINE, $podtorigsoline['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_PODTORIGSOLINE, $podtorigsoline, $comparison);
    }

    /**
     * Filter the query on the PodtQtyDueIn column
     *
     * Example usage:
     * <code>
     * $query->filterByPodtqtyduein(1234); // WHERE PodtQtyDueIn = 1234
     * $query->filterByPodtqtyduein(array(12, 34)); // WHERE PodtQtyDueIn IN (12, 34)
     * $query->filterByPodtqtyduein(array('min' => 12)); // WHERE PodtQtyDueIn > 12
     * </code>
     *
     * @param     mixed $podtqtyduein The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPodtqtyduein($podtqtyduein = null, $comparison = null)
    {
        if (is_array($podtqtyduein)) {
            $useMinMax = false;
            if (isset($podtqtyduein['min'])) {
                $this->addUsingAlias(EditPoDetailTableMap::COL_PODTQTYDUEIN, $podtqtyduein['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($podtqtyduein['max'])) {
                $this->addUsingAlias(EditPoDetailTableMap::COL_PODTQTYDUEIN, $podtqtyduein['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_PODTQTYDUEIN, $podtqtyduein, $comparison);
    }

    /**
     * Filter the query on the PodtType column
     *
     * Example usage:
     * <code>
     * $query->filterByPodttype('fooValue');   // WHERE PodtType = 'fooValue'
     * $query->filterByPodttype('%fooValue%', Criteria::LIKE); // WHERE PodtType LIKE '%fooValue%'
     * </code>
     *
     * @param     string $podttype The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPodttype($podttype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($podttype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_PODTTYPE, $podttype, $comparison);
    }

    /**
     * Filter the query on the PodtWghtTot column
     *
     * Example usage:
     * <code>
     * $query->filterByPodtwghttot(1234); // WHERE PodtWghtTot = 1234
     * $query->filterByPodtwghttot(array(12, 34)); // WHERE PodtWghtTot IN (12, 34)
     * $query->filterByPodtwghttot(array('min' => 12)); // WHERE PodtWghtTot > 12
     * </code>
     *
     * @param     mixed $podtwghttot The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPodtwghttot($podtwghttot = null, $comparison = null)
    {
        if (is_array($podtwghttot)) {
            $useMinMax = false;
            if (isset($podtwghttot['min'])) {
                $this->addUsingAlias(EditPoDetailTableMap::COL_PODTWGHTTOT, $podtwghttot['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($podtwghttot['max'])) {
                $this->addUsingAlias(EditPoDetailTableMap::COL_PODTWGHTTOT, $podtwghttot['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_PODTWGHTTOT, $podtwghttot, $comparison);
    }

    /**
     * Filter the query on the PodtForeignCost column
     *
     * Example usage:
     * <code>
     * $query->filterByPodtforeigncost(1234); // WHERE PodtForeignCost = 1234
     * $query->filterByPodtforeigncost(array(12, 34)); // WHERE PodtForeignCost IN (12, 34)
     * $query->filterByPodtforeigncost(array('min' => 12)); // WHERE PodtForeignCost > 12
     * </code>
     *
     * @param     mixed $podtforeigncost The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPodtforeigncost($podtforeigncost = null, $comparison = null)
    {
        if (is_array($podtforeigncost)) {
            $useMinMax = false;
            if (isset($podtforeigncost['min'])) {
                $this->addUsingAlias(EditPoDetailTableMap::COL_PODTFOREIGNCOST, $podtforeigncost['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($podtforeigncost['max'])) {
                $this->addUsingAlias(EditPoDetailTableMap::COL_PODTFOREIGNCOST, $podtforeigncost['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_PODTFOREIGNCOST, $podtforeigncost, $comparison);
    }

    /**
     * Filter the query on the PodtForeignCostTot column
     *
     * Example usage:
     * <code>
     * $query->filterByPodtforeigncosttot(1234); // WHERE PodtForeignCostTot = 1234
     * $query->filterByPodtforeigncosttot(array(12, 34)); // WHERE PodtForeignCostTot IN (12, 34)
     * $query->filterByPodtforeigncosttot(array('min' => 12)); // WHERE PodtForeignCostTot > 12
     * </code>
     *
     * @param     mixed $podtforeigncosttot The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPodtforeigncosttot($podtforeigncosttot = null, $comparison = null)
    {
        if (is_array($podtforeigncosttot)) {
            $useMinMax = false;
            if (isset($podtforeigncosttot['min'])) {
                $this->addUsingAlias(EditPoDetailTableMap::COL_PODTFOREIGNCOSTTOT, $podtforeigncosttot['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($podtforeigncosttot['max'])) {
                $this->addUsingAlias(EditPoDetailTableMap::COL_PODTFOREIGNCOSTTOT, $podtforeigncosttot['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_PODTFOREIGNCOSTTOT, $podtforeigncosttot, $comparison);
    }

    /**
     * Filter the query on the PodtStanUnitCost column
     *
     * Example usage:
     * <code>
     * $query->filterByPodtstanunitcost(1234); // WHERE PodtStanUnitCost = 1234
     * $query->filterByPodtstanunitcost(array(12, 34)); // WHERE PodtStanUnitCost IN (12, 34)
     * $query->filterByPodtstanunitcost(array('min' => 12)); // WHERE PodtStanUnitCost > 12
     * </code>
     *
     * @param     mixed $podtstanunitcost The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPodtstanunitcost($podtstanunitcost = null, $comparison = null)
    {
        if (is_array($podtstanunitcost)) {
            $useMinMax = false;
            if (isset($podtstanunitcost['min'])) {
                $this->addUsingAlias(EditPoDetailTableMap::COL_PODTSTANUNITCOST, $podtstanunitcost['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($podtstanunitcost['max'])) {
                $this->addUsingAlias(EditPoDetailTableMap::COL_PODTSTANUNITCOST, $podtstanunitcost['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_PODTSTANUNITCOST, $podtstanunitcost, $comparison);
    }

    /**
     * Filter the query on the PodtAckDate column
     *
     * Example usage:
     * <code>
     * $query->filterByPodtackdate('fooValue');   // WHERE PodtAckDate = 'fooValue'
     * $query->filterByPodtackdate('%fooValue%', Criteria::LIKE); // WHERE PodtAckDate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $podtackdate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPodtackdate($podtackdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($podtackdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_PODTACKDATE, $podtackdate, $comparison);
    }

    /**
     * Filter the query on the PodtInvcClearFlag column
     *
     * Example usage:
     * <code>
     * $query->filterByPodtinvcclearflag('fooValue');   // WHERE PodtInvcClearFlag = 'fooValue'
     * $query->filterByPodtinvcclearflag('%fooValue%', Criteria::LIKE); // WHERE PodtInvcClearFlag LIKE '%fooValue%'
     * </code>
     *
     * @param     string $podtinvcclearflag The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPodtinvcclearflag($podtinvcclearflag = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($podtinvcclearflag)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_PODTINVCCLEARFLAG, $podtinvcclearflag, $comparison);
    }

    /**
     * Filter the query on the PodtPrtKitDet column
     *
     * Example usage:
     * <code>
     * $query->filterByPodtprtkitdet('fooValue');   // WHERE PodtPrtKitDet = 'fooValue'
     * $query->filterByPodtprtkitdet('%fooValue%', Criteria::LIKE); // WHERE PodtPrtKitDet LIKE '%fooValue%'
     * </code>
     *
     * @param     string $podtprtkitdet The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPodtprtkitdet($podtprtkitdet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($podtprtkitdet)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_PODTPRTKITDET, $podtprtkitdet, $comparison);
    }

    /**
     * Filter the query on the PodtDestWhse column
     *
     * Example usage:
     * <code>
     * $query->filterByPodtdestwhse('fooValue');   // WHERE PodtDestWhse = 'fooValue'
     * $query->filterByPodtdestwhse('%fooValue%', Criteria::LIKE); // WHERE PodtDestWhse LIKE '%fooValue%'
     * </code>
     *
     * @param     string $podtdestwhse The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPodtdestwhse($podtdestwhse = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($podtdestwhse)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_PODTDESTWHSE, $podtdestwhse, $comparison);
    }

    /**
     * Filter the query on the PodtRevision column
     *
     * Example usage:
     * <code>
     * $query->filterByPodtrevision('fooValue');   // WHERE PodtRevision = 'fooValue'
     * $query->filterByPodtrevision('%fooValue%', Criteria::LIKE); // WHERE PodtRevision LIKE '%fooValue%'
     * </code>
     *
     * @param     string $podtrevision The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPodtrevision($podtrevision = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($podtrevision)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_PODTREVISION, $podtrevision, $comparison);
    }

    /**
     * Filter the query on the PodtPrtPoEOrU column
     *
     * Example usage:
     * <code>
     * $query->filterByPodtprtpoeoru('fooValue');   // WHERE PodtPrtPoEOrU = 'fooValue'
     * $query->filterByPodtprtpoeoru('%fooValue%', Criteria::LIKE); // WHERE PodtPrtPoEOrU LIKE '%fooValue%'
     * </code>
     *
     * @param     string $podtprtpoeoru The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPodtprtpoeoru($podtprtpoeoru = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($podtprtpoeoru)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_PODTPRTPOEORU, $podtprtpoeoru, $comparison);
    }

    /**
     * Filter the query on the PotbCnfmCode column
     *
     * Example usage:
     * <code>
     * $query->filterByPotbcnfmcode('fooValue');   // WHERE PotbCnfmCode = 'fooValue'
     * $query->filterByPotbcnfmcode('%fooValue%', Criteria::LIKE); // WHERE PotbCnfmCode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $potbcnfmcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPotbcnfmcode($potbcnfmcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($potbcnfmcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_POTBCNFMCODE, $potbcnfmcode, $comparison);
    }

    /**
     * Filter the query on the PodtRcptNbr column
     *
     * Example usage:
     * <code>
     * $query->filterByPodtrcptnbr('fooValue');   // WHERE PodtRcptNbr = 'fooValue'
     * $query->filterByPodtrcptnbr('%fooValue%', Criteria::LIKE); // WHERE PodtRcptNbr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $podtrcptnbr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPodtrcptnbr($podtrcptnbr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($podtrcptnbr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_PODTRCPTNBR, $podtrcptnbr, $comparison);
    }

    /**
     * Filter the query on the PodtWipNbr column
     *
     * Example usage:
     * <code>
     * $query->filterByPodtwipnbr('fooValue');   // WHERE PodtWipNbr = 'fooValue'
     * $query->filterByPodtwipnbr('%fooValue%', Criteria::LIKE); // WHERE PodtWipNbr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $podtwipnbr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPodtwipnbr($podtwipnbr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($podtwipnbr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_PODTWIPNBR, $podtwipnbr, $comparison);
    }

    /**
     * Filter the query on the PodtOrdrAs column
     *
     * Example usage:
     * <code>
     * $query->filterByPodtordras('fooValue');   // WHERE PodtOrdrAs = 'fooValue'
     * $query->filterByPodtordras('%fooValue%', Criteria::LIKE); // WHERE PodtOrdrAs LIKE '%fooValue%'
     * </code>
     *
     * @param     string $podtordras The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPodtordras($podtordras = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($podtordras)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_PODTORDRAS, $podtordras, $comparison);
    }

    /**
     * Filter the query on the PodtBolDate column
     *
     * Example usage:
     * <code>
     * $query->filterByPodtboldate('fooValue');   // WHERE PodtBolDate = 'fooValue'
     * $query->filterByPodtboldate('%fooValue%', Criteria::LIKE); // WHERE PodtBolDate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $podtboldate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPodtboldate($podtboldate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($podtboldate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_PODTBOLDATE, $podtboldate, $comparison);
    }

    /**
     * Filter the query on the PodtListPric column
     *
     * Example usage:
     * <code>
     * $query->filterByPodtlistpric(1234); // WHERE PodtListPric = 1234
     * $query->filterByPodtlistpric(array(12, 34)); // WHERE PodtListPric IN (12, 34)
     * $query->filterByPodtlistpric(array('min' => 12)); // WHERE PodtListPric > 12
     * </code>
     *
     * @param     mixed $podtlistpric The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPodtlistpric($podtlistpric = null, $comparison = null)
    {
        if (is_array($podtlistpric)) {
            $useMinMax = false;
            if (isset($podtlistpric['min'])) {
                $this->addUsingAlias(EditPoDetailTableMap::COL_PODTLISTPRIC, $podtlistpric['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($podtlistpric['max'])) {
                $this->addUsingAlias(EditPoDetailTableMap::COL_PODTLISTPRIC, $podtlistpric['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_PODTLISTPRIC, $podtlistpric, $comparison);
    }

    /**
     * Filter the query on the PodtDeliveredDate column
     *
     * Example usage:
     * <code>
     * $query->filterByPodtdelivereddate('fooValue');   // WHERE PodtDeliveredDate = 'fooValue'
     * $query->filterByPodtdelivereddate('%fooValue%', Criteria::LIKE); // WHERE PodtDeliveredDate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $podtdelivereddate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPodtdelivereddate($podtdelivereddate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($podtdelivereddate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_PODTDELIVEREDDATE, $podtdelivereddate, $comparison);
    }

    /**
     * Filter the query on the PodtLandCost column
     *
     * Example usage:
     * <code>
     * $query->filterByPodtlandcost(1234); // WHERE PodtLandCost = 1234
     * $query->filterByPodtlandcost(array(12, 34)); // WHERE PodtLandCost IN (12, 34)
     * $query->filterByPodtlandcost(array('min' => 12)); // WHERE PodtLandCost > 12
     * </code>
     *
     * @param     mixed $podtlandcost The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByPodtlandcost($podtlandcost = null, $comparison = null)
    {
        if (is_array($podtlandcost)) {
            $useMinMax = false;
            if (isset($podtlandcost['min'])) {
                $this->addUsingAlias(EditPoDetailTableMap::COL_PODTLANDCOST, $podtlandcost['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($podtlandcost['max'])) {
                $this->addUsingAlias(EditPoDetailTableMap::COL_PODTLANDCOST, $podtlandcost['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_PODTLANDCOST, $podtlandcost, $comparison);
    }

    /**
     * Filter the query on the DateUpdtd column
     *
     * Example usage:
     * <code>
     * $query->filterByDateupdtd('fooValue');   // WHERE DateUpdtd = 'fooValue'
     * $query->filterByDateupdtd('%fooValue%', Criteria::LIKE); // WHERE DateUpdtd LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dateupdtd The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByDateupdtd($dateupdtd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dateupdtd)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_DATEUPDTD, $dateupdtd, $comparison);
    }

    /**
     * Filter the query on the TimeUpdtd column
     *
     * Example usage:
     * <code>
     * $query->filterByTimeupdtd('fooValue');   // WHERE TimeUpdtd = 'fooValue'
     * $query->filterByTimeupdtd('%fooValue%', Criteria::LIKE); // WHERE TimeUpdtd LIKE '%fooValue%'
     * </code>
     *
     * @param     string $timeupdtd The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByTimeupdtd($timeupdtd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($timeupdtd)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_TIMEUPDTD, $timeupdtd, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus('fooValue');   // WHERE status = 'fooValue'
     * $query->filterByStatus('%fooValue%', Criteria::LIKE); // WHERE status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $status The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the dummy column
     *
     * Example usage:
     * <code>
     * $query->filterByDummy('fooValue');   // WHERE dummy = 'fooValue'
     * $query->filterByDummy('%fooValue%', Criteria::LIKE); // WHERE dummy LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dummy The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EditPoDetailTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildEditPoDetail $editPoDetail Object to remove from the list of results
     *
     * @return $this|ChildEditPoDetailQuery The current query, for fluid interface
     */
    public function prune($editPoDetail = null)
    {
        if ($editPoDetail) {
            $this->addCond('pruneCond0', $this->getAliasedColName(EditPoDetailTableMap::COL_SESSIONID), $editPoDetail->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(EditPoDetailTableMap::COL_POHDNBR), $editPoDetail->getPohdnbr(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(EditPoDetailTableMap::COL_PODTLINE), $editPoDetail->getPodtline(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the edit_po_detail table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EditPoDetailTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EditPoDetailTableMap::clearInstancePool();
            EditPoDetailTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EditPoDetailTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EditPoDetailTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EditPoDetailTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EditPoDetailTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EditPoDetailQuery
