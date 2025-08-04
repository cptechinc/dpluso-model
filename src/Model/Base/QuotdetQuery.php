<?php

namespace Base;

use \Quotdet as ChildQuotdet;
use \QuotdetQuery as ChildQuotdetQuery;
use \Exception;
use \PDO;
use Map\QuotdetTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the `quotdet` table.
 *
 * @method     ChildQuotdetQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildQuotdetQuery orderByRecno($order = Criteria::ASC) Order by the recno column
 * @method     ChildQuotdetQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildQuotdetQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildQuotdetQuery orderByQuotenbr($order = Criteria::ASC) Order by the quotenbr column
 * @method     ChildQuotdetQuery orderByCustid($order = Criteria::ASC) Order by the custid column
 * @method     ChildQuotdetQuery orderByLinenbr($order = Criteria::ASC) Order by the linenbr column
 * @method     ChildQuotdetQuery orderBySublinenbr($order = Criteria::ASC) Order by the sublinenbr column
 * @method     ChildQuotdetQuery orderByItemid($order = Criteria::ASC) Order by the itemid column
 * @method     ChildQuotdetQuery orderByDesc1($order = Criteria::ASC) Order by the desc1 column
 * @method     ChildQuotdetQuery orderByDesc2($order = Criteria::ASC) Order by the desc2 column
 * @method     ChildQuotdetQuery orderByCustitemid($order = Criteria::ASC) Order by the custitemid column
 * @method     ChildQuotdetQuery orderByVendorid($order = Criteria::ASC) Order by the vendorid column
 * @method     ChildQuotdetQuery orderByVendoritemid($order = Criteria::ASC) Order by the vendoritemid column
 * @method     ChildQuotdetQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildQuotdetQuery orderByLostreason($order = Criteria::ASC) Order by the lostreason column
 * @method     ChildQuotdetQuery orderByLostdate($order = Criteria::ASC) Order by the lostdate column
 * @method     ChildQuotdetQuery orderByKititemflag($order = Criteria::ASC) Order by the kititemflag column
 * @method     ChildQuotdetQuery orderByHasnotes($order = Criteria::ASC) Order by the hasnotes column
 * @method     ChildQuotdetQuery orderByVenddetail($order = Criteria::ASC) Order by the venddetail column
 * @method     ChildQuotdetQuery orderByRshipdate($order = Criteria::ASC) Order by the rshipdate column
 * @method     ChildQuotdetQuery orderByLeaddays($order = Criteria::ASC) Order by the leaddays column
 * @method     ChildQuotdetQuery orderByTaxcode($order = Criteria::ASC) Order by the taxcode column
 * @method     ChildQuotdetQuery orderByOrdrqty($order = Criteria::ASC) Order by the ordrqty column
 * @method     ChildQuotdetQuery orderByOrdrprice($order = Criteria::ASC) Order by the ordrprice column
 * @method     ChildQuotdetQuery orderByOrdrcost($order = Criteria::ASC) Order by the ordrcost column
 * @method     ChildQuotdetQuery orderByOrdrtotalprice($order = Criteria::ASC) Order by the ordrtotalprice column
 * @method     ChildQuotdetQuery orderByOrdrtotalcost($order = Criteria::ASC) Order by the ordrtotalcost column
 * @method     ChildQuotdetQuery orderByUom($order = Criteria::ASC) Order by the uom column
 * @method     ChildQuotdetQuery orderByCostuom($order = Criteria::ASC) Order by the costuom column
 * @method     ChildQuotdetQuery orderByWhse($order = Criteria::ASC) Order by the whse column
 * @method     ChildQuotdetQuery orderByListprice($order = Criteria::ASC) Order by the listprice column
 * @method     ChildQuotdetQuery orderByStancost($order = Criteria::ASC) Order by the stancost column
 * @method     ChildQuotdetQuery orderByQuotind($order = Criteria::ASC) Order by the quotind column
 * @method     ChildQuotdetQuery orderByQuotqty($order = Criteria::ASC) Order by the quotqty column
 * @method     ChildQuotdetQuery orderByQuotprice($order = Criteria::ASC) Order by the quotprice column
 * @method     ChildQuotdetQuery orderByQuotcost($order = Criteria::ASC) Order by the quotcost column
 * @method     ChildQuotdetQuery orderByQuotmkupmarg($order = Criteria::ASC) Order by the quotmkupmarg column
 * @method     ChildQuotdetQuery orderByDiscpct($order = Criteria::ASC) Order by the discpct column
 * @method     ChildQuotdetQuery orderBySpcord($order = Criteria::ASC) Order by the spcord column
 * @method     ChildQuotdetQuery orderByError($order = Criteria::ASC) Order by the error column
 * @method     ChildQuotdetQuery orderByErrormsg($order = Criteria::ASC) Order by the errormsg column
 * @method     ChildQuotdetQuery orderByMinprice($order = Criteria::ASC) Order by the minprice column
 * @method     ChildQuotdetQuery orderByNsitemgroup($order = Criteria::ASC) Order by the nsitemgroup column
 * @method     ChildQuotdetQuery orderByShipfromid($order = Criteria::ASC) Order by the shipfromid column
 * @method     ChildQuotdetQuery orderByItemtype($order = Criteria::ASC) Order by the itemtype column
 * @method     ChildQuotdetQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildQuotdetQuery groupBySessionid() Group by the sessionid column
 * @method     ChildQuotdetQuery groupByRecno() Group by the recno column
 * @method     ChildQuotdetQuery groupByDate() Group by the date column
 * @method     ChildQuotdetQuery groupByTime() Group by the time column
 * @method     ChildQuotdetQuery groupByQuotenbr() Group by the quotenbr column
 * @method     ChildQuotdetQuery groupByCustid() Group by the custid column
 * @method     ChildQuotdetQuery groupByLinenbr() Group by the linenbr column
 * @method     ChildQuotdetQuery groupBySublinenbr() Group by the sublinenbr column
 * @method     ChildQuotdetQuery groupByItemid() Group by the itemid column
 * @method     ChildQuotdetQuery groupByDesc1() Group by the desc1 column
 * @method     ChildQuotdetQuery groupByDesc2() Group by the desc2 column
 * @method     ChildQuotdetQuery groupByCustitemid() Group by the custitemid column
 * @method     ChildQuotdetQuery groupByVendorid() Group by the vendorid column
 * @method     ChildQuotdetQuery groupByVendoritemid() Group by the vendoritemid column
 * @method     ChildQuotdetQuery groupByStatus() Group by the status column
 * @method     ChildQuotdetQuery groupByLostreason() Group by the lostreason column
 * @method     ChildQuotdetQuery groupByLostdate() Group by the lostdate column
 * @method     ChildQuotdetQuery groupByKititemflag() Group by the kititemflag column
 * @method     ChildQuotdetQuery groupByHasnotes() Group by the hasnotes column
 * @method     ChildQuotdetQuery groupByVenddetail() Group by the venddetail column
 * @method     ChildQuotdetQuery groupByRshipdate() Group by the rshipdate column
 * @method     ChildQuotdetQuery groupByLeaddays() Group by the leaddays column
 * @method     ChildQuotdetQuery groupByTaxcode() Group by the taxcode column
 * @method     ChildQuotdetQuery groupByOrdrqty() Group by the ordrqty column
 * @method     ChildQuotdetQuery groupByOrdrprice() Group by the ordrprice column
 * @method     ChildQuotdetQuery groupByOrdrcost() Group by the ordrcost column
 * @method     ChildQuotdetQuery groupByOrdrtotalprice() Group by the ordrtotalprice column
 * @method     ChildQuotdetQuery groupByOrdrtotalcost() Group by the ordrtotalcost column
 * @method     ChildQuotdetQuery groupByUom() Group by the uom column
 * @method     ChildQuotdetQuery groupByCostuom() Group by the costuom column
 * @method     ChildQuotdetQuery groupByWhse() Group by the whse column
 * @method     ChildQuotdetQuery groupByListprice() Group by the listprice column
 * @method     ChildQuotdetQuery groupByStancost() Group by the stancost column
 * @method     ChildQuotdetQuery groupByQuotind() Group by the quotind column
 * @method     ChildQuotdetQuery groupByQuotqty() Group by the quotqty column
 * @method     ChildQuotdetQuery groupByQuotprice() Group by the quotprice column
 * @method     ChildQuotdetQuery groupByQuotcost() Group by the quotcost column
 * @method     ChildQuotdetQuery groupByQuotmkupmarg() Group by the quotmkupmarg column
 * @method     ChildQuotdetQuery groupByDiscpct() Group by the discpct column
 * @method     ChildQuotdetQuery groupBySpcord() Group by the spcord column
 * @method     ChildQuotdetQuery groupByError() Group by the error column
 * @method     ChildQuotdetQuery groupByErrormsg() Group by the errormsg column
 * @method     ChildQuotdetQuery groupByMinprice() Group by the minprice column
 * @method     ChildQuotdetQuery groupByNsitemgroup() Group by the nsitemgroup column
 * @method     ChildQuotdetQuery groupByShipfromid() Group by the shipfromid column
 * @method     ChildQuotdetQuery groupByItemtype() Group by the itemtype column
 * @method     ChildQuotdetQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildQuotdetQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildQuotdetQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildQuotdetQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildQuotdetQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildQuotdetQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildQuotdetQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildQuotdet|null findOne(?ConnectionInterface $con = null) Return the first ChildQuotdet matching the query
 * @method     ChildQuotdet findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildQuotdet matching the query, or a new ChildQuotdet object populated from the query conditions when no match is found
 *
 * @method     ChildQuotdet|null findOneBySessionid(string $sessionid) Return the first ChildQuotdet filtered by the sessionid column
 * @method     ChildQuotdet|null findOneByRecno(int $recno) Return the first ChildQuotdet filtered by the recno column
 * @method     ChildQuotdet|null findOneByDate(int $date) Return the first ChildQuotdet filtered by the date column
 * @method     ChildQuotdet|null findOneByTime(int $time) Return the first ChildQuotdet filtered by the time column
 * @method     ChildQuotdet|null findOneByQuotenbr(string $quotenbr) Return the first ChildQuotdet filtered by the quotenbr column
 * @method     ChildQuotdet|null findOneByCustid(string $custid) Return the first ChildQuotdet filtered by the custid column
 * @method     ChildQuotdet|null findOneByLinenbr(string $linenbr) Return the first ChildQuotdet filtered by the linenbr column
 * @method     ChildQuotdet|null findOneBySublinenbr(string $sublinenbr) Return the first ChildQuotdet filtered by the sublinenbr column
 * @method     ChildQuotdet|null findOneByItemid(string $itemid) Return the first ChildQuotdet filtered by the itemid column
 * @method     ChildQuotdet|null findOneByDesc1(string $desc1) Return the first ChildQuotdet filtered by the desc1 column
 * @method     ChildQuotdet|null findOneByDesc2(string $desc2) Return the first ChildQuotdet filtered by the desc2 column
 * @method     ChildQuotdet|null findOneByCustitemid(string $custitemid) Return the first ChildQuotdet filtered by the custitemid column
 * @method     ChildQuotdet|null findOneByVendorid(string $vendorid) Return the first ChildQuotdet filtered by the vendorid column
 * @method     ChildQuotdet|null findOneByVendoritemid(string $vendoritemid) Return the first ChildQuotdet filtered by the vendoritemid column
 * @method     ChildQuotdet|null findOneByStatus(string $status) Return the first ChildQuotdet filtered by the status column
 * @method     ChildQuotdet|null findOneByLostreason(string $lostreason) Return the first ChildQuotdet filtered by the lostreason column
 * @method     ChildQuotdet|null findOneByLostdate(string $lostdate) Return the first ChildQuotdet filtered by the lostdate column
 * @method     ChildQuotdet|null findOneByKititemflag(string $kititemflag) Return the first ChildQuotdet filtered by the kititemflag column
 * @method     ChildQuotdet|null findOneByHasnotes(string $hasnotes) Return the first ChildQuotdet filtered by the hasnotes column
 * @method     ChildQuotdet|null findOneByVenddetail(string $venddetail) Return the first ChildQuotdet filtered by the venddetail column
 * @method     ChildQuotdet|null findOneByRshipdate(string $rshipdate) Return the first ChildQuotdet filtered by the rshipdate column
 * @method     ChildQuotdet|null findOneByLeaddays(int $leaddays) Return the first ChildQuotdet filtered by the leaddays column
 * @method     ChildQuotdet|null findOneByTaxcode(string $taxcode) Return the first ChildQuotdet filtered by the taxcode column
 * @method     ChildQuotdet|null findOneByOrdrqty(string $ordrqty) Return the first ChildQuotdet filtered by the ordrqty column
 * @method     ChildQuotdet|null findOneByOrdrprice(string $ordrprice) Return the first ChildQuotdet filtered by the ordrprice column
 * @method     ChildQuotdet|null findOneByOrdrcost(string $ordrcost) Return the first ChildQuotdet filtered by the ordrcost column
 * @method     ChildQuotdet|null findOneByOrdrtotalprice(string $ordrtotalprice) Return the first ChildQuotdet filtered by the ordrtotalprice column
 * @method     ChildQuotdet|null findOneByOrdrtotalcost(string $ordrtotalcost) Return the first ChildQuotdet filtered by the ordrtotalcost column
 * @method     ChildQuotdet|null findOneByUom(string $uom) Return the first ChildQuotdet filtered by the uom column
 * @method     ChildQuotdet|null findOneByCostuom(string $costuom) Return the first ChildQuotdet filtered by the costuom column
 * @method     ChildQuotdet|null findOneByWhse(string $whse) Return the first ChildQuotdet filtered by the whse column
 * @method     ChildQuotdet|null findOneByListprice(string $listprice) Return the first ChildQuotdet filtered by the listprice column
 * @method     ChildQuotdet|null findOneByStancost(string $stancost) Return the first ChildQuotdet filtered by the stancost column
 * @method     ChildQuotdet|null findOneByQuotind(string $quotind) Return the first ChildQuotdet filtered by the quotind column
 * @method     ChildQuotdet|null findOneByQuotqty(int $quotqty) Return the first ChildQuotdet filtered by the quotqty column
 * @method     ChildQuotdet|null findOneByQuotprice(string $quotprice) Return the first ChildQuotdet filtered by the quotprice column
 * @method     ChildQuotdet|null findOneByQuotcost(string $quotcost) Return the first ChildQuotdet filtered by the quotcost column
 * @method     ChildQuotdet|null findOneByQuotmkupmarg(string $quotmkupmarg) Return the first ChildQuotdet filtered by the quotmkupmarg column
 * @method     ChildQuotdet|null findOneByDiscpct(string $discpct) Return the first ChildQuotdet filtered by the discpct column
 * @method     ChildQuotdet|null findOneBySpcord(string $spcord) Return the first ChildQuotdet filtered by the spcord column
 * @method     ChildQuotdet|null findOneByError(string $error) Return the first ChildQuotdet filtered by the error column
 * @method     ChildQuotdet|null findOneByErrormsg(string $errormsg) Return the first ChildQuotdet filtered by the errormsg column
 * @method     ChildQuotdet|null findOneByMinprice(string $minprice) Return the first ChildQuotdet filtered by the minprice column
 * @method     ChildQuotdet|null findOneByNsitemgroup(string $nsitemgroup) Return the first ChildQuotdet filtered by the nsitemgroup column
 * @method     ChildQuotdet|null findOneByShipfromid(string $shipfromid) Return the first ChildQuotdet filtered by the shipfromid column
 * @method     ChildQuotdet|null findOneByItemtype(string $itemtype) Return the first ChildQuotdet filtered by the itemtype column
 * @method     ChildQuotdet|null findOneByDummy(string $dummy) Return the first ChildQuotdet filtered by the dummy column
 *
 * @method     ChildQuotdet requirePk($key, ?ConnectionInterface $con = null) Return the ChildQuotdet by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOne(?ConnectionInterface $con = null) Return the first ChildQuotdet matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildQuotdet requireOneBySessionid(string $sessionid) Return the first ChildQuotdet filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByRecno(int $recno) Return the first ChildQuotdet filtered by the recno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByDate(int $date) Return the first ChildQuotdet filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByTime(int $time) Return the first ChildQuotdet filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByQuotenbr(string $quotenbr) Return the first ChildQuotdet filtered by the quotenbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByCustid(string $custid) Return the first ChildQuotdet filtered by the custid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByLinenbr(string $linenbr) Return the first ChildQuotdet filtered by the linenbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneBySublinenbr(string $sublinenbr) Return the first ChildQuotdet filtered by the sublinenbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByItemid(string $itemid) Return the first ChildQuotdet filtered by the itemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByDesc1(string $desc1) Return the first ChildQuotdet filtered by the desc1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByDesc2(string $desc2) Return the first ChildQuotdet filtered by the desc2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByCustitemid(string $custitemid) Return the first ChildQuotdet filtered by the custitemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByVendorid(string $vendorid) Return the first ChildQuotdet filtered by the vendorid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByVendoritemid(string $vendoritemid) Return the first ChildQuotdet filtered by the vendoritemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByStatus(string $status) Return the first ChildQuotdet filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByLostreason(string $lostreason) Return the first ChildQuotdet filtered by the lostreason column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByLostdate(string $lostdate) Return the first ChildQuotdet filtered by the lostdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByKititemflag(string $kititemflag) Return the first ChildQuotdet filtered by the kititemflag column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByHasnotes(string $hasnotes) Return the first ChildQuotdet filtered by the hasnotes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByVenddetail(string $venddetail) Return the first ChildQuotdet filtered by the venddetail column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByRshipdate(string $rshipdate) Return the first ChildQuotdet filtered by the rshipdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByLeaddays(int $leaddays) Return the first ChildQuotdet filtered by the leaddays column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByTaxcode(string $taxcode) Return the first ChildQuotdet filtered by the taxcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByOrdrqty(string $ordrqty) Return the first ChildQuotdet filtered by the ordrqty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByOrdrprice(string $ordrprice) Return the first ChildQuotdet filtered by the ordrprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByOrdrcost(string $ordrcost) Return the first ChildQuotdet filtered by the ordrcost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByOrdrtotalprice(string $ordrtotalprice) Return the first ChildQuotdet filtered by the ordrtotalprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByOrdrtotalcost(string $ordrtotalcost) Return the first ChildQuotdet filtered by the ordrtotalcost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByUom(string $uom) Return the first ChildQuotdet filtered by the uom column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByCostuom(string $costuom) Return the first ChildQuotdet filtered by the costuom column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByWhse(string $whse) Return the first ChildQuotdet filtered by the whse column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByListprice(string $listprice) Return the first ChildQuotdet filtered by the listprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByStancost(string $stancost) Return the first ChildQuotdet filtered by the stancost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByQuotind(string $quotind) Return the first ChildQuotdet filtered by the quotind column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByQuotqty(int $quotqty) Return the first ChildQuotdet filtered by the quotqty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByQuotprice(string $quotprice) Return the first ChildQuotdet filtered by the quotprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByQuotcost(string $quotcost) Return the first ChildQuotdet filtered by the quotcost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByQuotmkupmarg(string $quotmkupmarg) Return the first ChildQuotdet filtered by the quotmkupmarg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByDiscpct(string $discpct) Return the first ChildQuotdet filtered by the discpct column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneBySpcord(string $spcord) Return the first ChildQuotdet filtered by the spcord column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByError(string $error) Return the first ChildQuotdet filtered by the error column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByErrormsg(string $errormsg) Return the first ChildQuotdet filtered by the errormsg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByMinprice(string $minprice) Return the first ChildQuotdet filtered by the minprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByNsitemgroup(string $nsitemgroup) Return the first ChildQuotdet filtered by the nsitemgroup column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByShipfromid(string $shipfromid) Return the first ChildQuotdet filtered by the shipfromid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByItemtype(string $itemtype) Return the first ChildQuotdet filtered by the itemtype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuotdet requireOneByDummy(string $dummy) Return the first ChildQuotdet filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildQuotdet[]|Collection find(?ConnectionInterface $con = null) Return ChildQuotdet objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildQuotdet> find(?ConnectionInterface $con = null) Return ChildQuotdet objects based on current ModelCriteria
 *
 * @method     ChildQuotdet[]|Collection findBySessionid(string|array<string> $sessionid) Return ChildQuotdet objects filtered by the sessionid column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findBySessionid(string|array<string> $sessionid) Return ChildQuotdet objects filtered by the sessionid column
 * @method     ChildQuotdet[]|Collection findByRecno(int|array<int> $recno) Return ChildQuotdet objects filtered by the recno column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByRecno(int|array<int> $recno) Return ChildQuotdet objects filtered by the recno column
 * @method     ChildQuotdet[]|Collection findByDate(int|array<int> $date) Return ChildQuotdet objects filtered by the date column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByDate(int|array<int> $date) Return ChildQuotdet objects filtered by the date column
 * @method     ChildQuotdet[]|Collection findByTime(int|array<int> $time) Return ChildQuotdet objects filtered by the time column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByTime(int|array<int> $time) Return ChildQuotdet objects filtered by the time column
 * @method     ChildQuotdet[]|Collection findByQuotenbr(string|array<string> $quotenbr) Return ChildQuotdet objects filtered by the quotenbr column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByQuotenbr(string|array<string> $quotenbr) Return ChildQuotdet objects filtered by the quotenbr column
 * @method     ChildQuotdet[]|Collection findByCustid(string|array<string> $custid) Return ChildQuotdet objects filtered by the custid column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByCustid(string|array<string> $custid) Return ChildQuotdet objects filtered by the custid column
 * @method     ChildQuotdet[]|Collection findByLinenbr(string|array<string> $linenbr) Return ChildQuotdet objects filtered by the linenbr column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByLinenbr(string|array<string> $linenbr) Return ChildQuotdet objects filtered by the linenbr column
 * @method     ChildQuotdet[]|Collection findBySublinenbr(string|array<string> $sublinenbr) Return ChildQuotdet objects filtered by the sublinenbr column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findBySublinenbr(string|array<string> $sublinenbr) Return ChildQuotdet objects filtered by the sublinenbr column
 * @method     ChildQuotdet[]|Collection findByItemid(string|array<string> $itemid) Return ChildQuotdet objects filtered by the itemid column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByItemid(string|array<string> $itemid) Return ChildQuotdet objects filtered by the itemid column
 * @method     ChildQuotdet[]|Collection findByDesc1(string|array<string> $desc1) Return ChildQuotdet objects filtered by the desc1 column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByDesc1(string|array<string> $desc1) Return ChildQuotdet objects filtered by the desc1 column
 * @method     ChildQuotdet[]|Collection findByDesc2(string|array<string> $desc2) Return ChildQuotdet objects filtered by the desc2 column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByDesc2(string|array<string> $desc2) Return ChildQuotdet objects filtered by the desc2 column
 * @method     ChildQuotdet[]|Collection findByCustitemid(string|array<string> $custitemid) Return ChildQuotdet objects filtered by the custitemid column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByCustitemid(string|array<string> $custitemid) Return ChildQuotdet objects filtered by the custitemid column
 * @method     ChildQuotdet[]|Collection findByVendorid(string|array<string> $vendorid) Return ChildQuotdet objects filtered by the vendorid column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByVendorid(string|array<string> $vendorid) Return ChildQuotdet objects filtered by the vendorid column
 * @method     ChildQuotdet[]|Collection findByVendoritemid(string|array<string> $vendoritemid) Return ChildQuotdet objects filtered by the vendoritemid column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByVendoritemid(string|array<string> $vendoritemid) Return ChildQuotdet objects filtered by the vendoritemid column
 * @method     ChildQuotdet[]|Collection findByStatus(string|array<string> $status) Return ChildQuotdet objects filtered by the status column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByStatus(string|array<string> $status) Return ChildQuotdet objects filtered by the status column
 * @method     ChildQuotdet[]|Collection findByLostreason(string|array<string> $lostreason) Return ChildQuotdet objects filtered by the lostreason column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByLostreason(string|array<string> $lostreason) Return ChildQuotdet objects filtered by the lostreason column
 * @method     ChildQuotdet[]|Collection findByLostdate(string|array<string> $lostdate) Return ChildQuotdet objects filtered by the lostdate column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByLostdate(string|array<string> $lostdate) Return ChildQuotdet objects filtered by the lostdate column
 * @method     ChildQuotdet[]|Collection findByKititemflag(string|array<string> $kititemflag) Return ChildQuotdet objects filtered by the kititemflag column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByKititemflag(string|array<string> $kititemflag) Return ChildQuotdet objects filtered by the kititemflag column
 * @method     ChildQuotdet[]|Collection findByHasnotes(string|array<string> $hasnotes) Return ChildQuotdet objects filtered by the hasnotes column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByHasnotes(string|array<string> $hasnotes) Return ChildQuotdet objects filtered by the hasnotes column
 * @method     ChildQuotdet[]|Collection findByVenddetail(string|array<string> $venddetail) Return ChildQuotdet objects filtered by the venddetail column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByVenddetail(string|array<string> $venddetail) Return ChildQuotdet objects filtered by the venddetail column
 * @method     ChildQuotdet[]|Collection findByRshipdate(string|array<string> $rshipdate) Return ChildQuotdet objects filtered by the rshipdate column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByRshipdate(string|array<string> $rshipdate) Return ChildQuotdet objects filtered by the rshipdate column
 * @method     ChildQuotdet[]|Collection findByLeaddays(int|array<int> $leaddays) Return ChildQuotdet objects filtered by the leaddays column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByLeaddays(int|array<int> $leaddays) Return ChildQuotdet objects filtered by the leaddays column
 * @method     ChildQuotdet[]|Collection findByTaxcode(string|array<string> $taxcode) Return ChildQuotdet objects filtered by the taxcode column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByTaxcode(string|array<string> $taxcode) Return ChildQuotdet objects filtered by the taxcode column
 * @method     ChildQuotdet[]|Collection findByOrdrqty(string|array<string> $ordrqty) Return ChildQuotdet objects filtered by the ordrqty column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByOrdrqty(string|array<string> $ordrqty) Return ChildQuotdet objects filtered by the ordrqty column
 * @method     ChildQuotdet[]|Collection findByOrdrprice(string|array<string> $ordrprice) Return ChildQuotdet objects filtered by the ordrprice column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByOrdrprice(string|array<string> $ordrprice) Return ChildQuotdet objects filtered by the ordrprice column
 * @method     ChildQuotdet[]|Collection findByOrdrcost(string|array<string> $ordrcost) Return ChildQuotdet objects filtered by the ordrcost column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByOrdrcost(string|array<string> $ordrcost) Return ChildQuotdet objects filtered by the ordrcost column
 * @method     ChildQuotdet[]|Collection findByOrdrtotalprice(string|array<string> $ordrtotalprice) Return ChildQuotdet objects filtered by the ordrtotalprice column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByOrdrtotalprice(string|array<string> $ordrtotalprice) Return ChildQuotdet objects filtered by the ordrtotalprice column
 * @method     ChildQuotdet[]|Collection findByOrdrtotalcost(string|array<string> $ordrtotalcost) Return ChildQuotdet objects filtered by the ordrtotalcost column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByOrdrtotalcost(string|array<string> $ordrtotalcost) Return ChildQuotdet objects filtered by the ordrtotalcost column
 * @method     ChildQuotdet[]|Collection findByUom(string|array<string> $uom) Return ChildQuotdet objects filtered by the uom column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByUom(string|array<string> $uom) Return ChildQuotdet objects filtered by the uom column
 * @method     ChildQuotdet[]|Collection findByCostuom(string|array<string> $costuom) Return ChildQuotdet objects filtered by the costuom column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByCostuom(string|array<string> $costuom) Return ChildQuotdet objects filtered by the costuom column
 * @method     ChildQuotdet[]|Collection findByWhse(string|array<string> $whse) Return ChildQuotdet objects filtered by the whse column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByWhse(string|array<string> $whse) Return ChildQuotdet objects filtered by the whse column
 * @method     ChildQuotdet[]|Collection findByListprice(string|array<string> $listprice) Return ChildQuotdet objects filtered by the listprice column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByListprice(string|array<string> $listprice) Return ChildQuotdet objects filtered by the listprice column
 * @method     ChildQuotdet[]|Collection findByStancost(string|array<string> $stancost) Return ChildQuotdet objects filtered by the stancost column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByStancost(string|array<string> $stancost) Return ChildQuotdet objects filtered by the stancost column
 * @method     ChildQuotdet[]|Collection findByQuotind(string|array<string> $quotind) Return ChildQuotdet objects filtered by the quotind column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByQuotind(string|array<string> $quotind) Return ChildQuotdet objects filtered by the quotind column
 * @method     ChildQuotdet[]|Collection findByQuotqty(int|array<int> $quotqty) Return ChildQuotdet objects filtered by the quotqty column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByQuotqty(int|array<int> $quotqty) Return ChildQuotdet objects filtered by the quotqty column
 * @method     ChildQuotdet[]|Collection findByQuotprice(string|array<string> $quotprice) Return ChildQuotdet objects filtered by the quotprice column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByQuotprice(string|array<string> $quotprice) Return ChildQuotdet objects filtered by the quotprice column
 * @method     ChildQuotdet[]|Collection findByQuotcost(string|array<string> $quotcost) Return ChildQuotdet objects filtered by the quotcost column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByQuotcost(string|array<string> $quotcost) Return ChildQuotdet objects filtered by the quotcost column
 * @method     ChildQuotdet[]|Collection findByQuotmkupmarg(string|array<string> $quotmkupmarg) Return ChildQuotdet objects filtered by the quotmkupmarg column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByQuotmkupmarg(string|array<string> $quotmkupmarg) Return ChildQuotdet objects filtered by the quotmkupmarg column
 * @method     ChildQuotdet[]|Collection findByDiscpct(string|array<string> $discpct) Return ChildQuotdet objects filtered by the discpct column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByDiscpct(string|array<string> $discpct) Return ChildQuotdet objects filtered by the discpct column
 * @method     ChildQuotdet[]|Collection findBySpcord(string|array<string> $spcord) Return ChildQuotdet objects filtered by the spcord column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findBySpcord(string|array<string> $spcord) Return ChildQuotdet objects filtered by the spcord column
 * @method     ChildQuotdet[]|Collection findByError(string|array<string> $error) Return ChildQuotdet objects filtered by the error column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByError(string|array<string> $error) Return ChildQuotdet objects filtered by the error column
 * @method     ChildQuotdet[]|Collection findByErrormsg(string|array<string> $errormsg) Return ChildQuotdet objects filtered by the errormsg column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByErrormsg(string|array<string> $errormsg) Return ChildQuotdet objects filtered by the errormsg column
 * @method     ChildQuotdet[]|Collection findByMinprice(string|array<string> $minprice) Return ChildQuotdet objects filtered by the minprice column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByMinprice(string|array<string> $minprice) Return ChildQuotdet objects filtered by the minprice column
 * @method     ChildQuotdet[]|Collection findByNsitemgroup(string|array<string> $nsitemgroup) Return ChildQuotdet objects filtered by the nsitemgroup column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByNsitemgroup(string|array<string> $nsitemgroup) Return ChildQuotdet objects filtered by the nsitemgroup column
 * @method     ChildQuotdet[]|Collection findByShipfromid(string|array<string> $shipfromid) Return ChildQuotdet objects filtered by the shipfromid column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByShipfromid(string|array<string> $shipfromid) Return ChildQuotdet objects filtered by the shipfromid column
 * @method     ChildQuotdet[]|Collection findByItemtype(string|array<string> $itemtype) Return ChildQuotdet objects filtered by the itemtype column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByItemtype(string|array<string> $itemtype) Return ChildQuotdet objects filtered by the itemtype column
 * @method     ChildQuotdet[]|Collection findByDummy(string|array<string> $dummy) Return ChildQuotdet objects filtered by the dummy column
 * @psalm-method Collection&\Traversable<ChildQuotdet> findByDummy(string|array<string> $dummy) Return ChildQuotdet objects filtered by the dummy column
 *
 * @method     ChildQuotdet[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildQuotdet> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class QuotdetQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\QuotdetQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Quotdet', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildQuotdetQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildQuotdetQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildQuotdetQuery) {
            return $criteria;
        }
        $query = new ChildQuotdetQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$sessionid, $recno] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildQuotdet|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(QuotdetTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = QuotdetTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildQuotdet A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, recno, date, time, quotenbr, custid, linenbr, sublinenbr, itemid, desc1, desc2, custitemid, vendorid, vendoritemid, status, lostreason, lostdate, kititemflag, hasnotes, venddetail, rshipdate, leaddays, taxcode, ordrqty, ordrprice, ordrcost, ordrtotalprice, ordrtotalcost, uom, costuom, whse, listprice, stancost, quotind, quotqty, quotprice, quotcost, quotmkupmarg, discpct, spcord, error, errormsg, minprice, nsitemgroup, shipfromid, itemtype, dummy FROM quotdet WHERE sessionid = :p0 AND recno = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildQuotdet $obj */
            $obj = new ChildQuotdet();
            $obj->hydrate($row);
            QuotdetTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
     *
     * @return ChildQuotdet|array|mixed the result, formatted by the current formatter
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
     * @param array $keys Primary keys to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return Collection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ?ConnectionInterface $con = null)
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
     * @param mixed $key Primary key to use for the query
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(QuotdetTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(QuotdetTableMap::COL_RECNO, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param array|int $keys The list of primary key to use for the query
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            $this->add(null, '1<>1', Criteria::CUSTOM);

            return $this;
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(QuotdetTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(QuotdetTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
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
     * $query->filterBySessionid(['foo', 'bar']); // WHERE sessionid IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $sessionid The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_SESSIONID, $sessionid, $comparison);

        return $this;
    }

    /**
     * Filter the query on the recno column
     *
     * Example usage:
     * <code>
     * $query->filterByRecno(1234); // WHERE recno = 1234
     * $query->filterByRecno(array(12, 34)); // WHERE recno IN (12, 34)
     * $query->filterByRecno(array('min' => 12)); // WHERE recno > 12
     * </code>
     *
     * @param mixed $recno The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByRecno($recno = null, ?string $comparison = null)
    {
        if (is_array($recno)) {
            $useMinMax = false;
            if (isset($recno['min'])) {
                $this->addUsingAlias(QuotdetTableMap::COL_RECNO, $recno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recno['max'])) {
                $this->addUsingAlias(QuotdetTableMap::COL_RECNO, $recno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_RECNO, $recno, $comparison);

        return $this;
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate(1234); // WHERE date = 1234
     * $query->filterByDate(array(12, 34)); // WHERE date IN (12, 34)
     * $query->filterByDate(array('min' => 12)); // WHERE date > 12
     * </code>
     *
     * @param mixed $date The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDate($date = null, ?string $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(QuotdetTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(QuotdetTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_DATE, $date, $comparison);

        return $this;
    }

    /**
     * Filter the query on the time column
     *
     * Example usage:
     * <code>
     * $query->filterByTime(1234); // WHERE time = 1234
     * $query->filterByTime(array(12, 34)); // WHERE time IN (12, 34)
     * $query->filterByTime(array('min' => 12)); // WHERE time > 12
     * </code>
     *
     * @param mixed $time The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTime($time = null, ?string $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(QuotdetTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(QuotdetTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_TIME, $time, $comparison);

        return $this;
    }

    /**
     * Filter the query on the quotenbr column
     *
     * Example usage:
     * <code>
     * $query->filterByQuotenbr('fooValue');   // WHERE quotenbr = 'fooValue'
     * $query->filterByQuotenbr('%fooValue%', Criteria::LIKE); // WHERE quotenbr LIKE '%fooValue%'
     * $query->filterByQuotenbr(['foo', 'bar']); // WHERE quotenbr IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $quotenbr The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByQuotenbr($quotenbr = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($quotenbr)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_QUOTENBR, $quotenbr, $comparison);

        return $this;
    }

    /**
     * Filter the query on the custid column
     *
     * Example usage:
     * <code>
     * $query->filterByCustid('fooValue');   // WHERE custid = 'fooValue'
     * $query->filterByCustid('%fooValue%', Criteria::LIKE); // WHERE custid LIKE '%fooValue%'
     * $query->filterByCustid(['foo', 'bar']); // WHERE custid IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $custid The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCustid($custid = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custid)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_CUSTID, $custid, $comparison);

        return $this;
    }

    /**
     * Filter the query on the linenbr column
     *
     * Example usage:
     * <code>
     * $query->filterByLinenbr('fooValue');   // WHERE linenbr = 'fooValue'
     * $query->filterByLinenbr('%fooValue%', Criteria::LIKE); // WHERE linenbr LIKE '%fooValue%'
     * $query->filterByLinenbr(['foo', 'bar']); // WHERE linenbr IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $linenbr The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByLinenbr($linenbr = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($linenbr)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_LINENBR, $linenbr, $comparison);

        return $this;
    }

    /**
     * Filter the query on the sublinenbr column
     *
     * Example usage:
     * <code>
     * $query->filterBySublinenbr('fooValue');   // WHERE sublinenbr = 'fooValue'
     * $query->filterBySublinenbr('%fooValue%', Criteria::LIKE); // WHERE sublinenbr LIKE '%fooValue%'
     * $query->filterBySublinenbr(['foo', 'bar']); // WHERE sublinenbr IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $sublinenbr The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySublinenbr($sublinenbr = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sublinenbr)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_SUBLINENBR, $sublinenbr, $comparison);

        return $this;
    }

    /**
     * Filter the query on the itemid column
     *
     * Example usage:
     * <code>
     * $query->filterByItemid('fooValue');   // WHERE itemid = 'fooValue'
     * $query->filterByItemid('%fooValue%', Criteria::LIKE); // WHERE itemid LIKE '%fooValue%'
     * $query->filterByItemid(['foo', 'bar']); // WHERE itemid IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $itemid The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByItemid($itemid = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemid)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_ITEMID, $itemid, $comparison);

        return $this;
    }

    /**
     * Filter the query on the desc1 column
     *
     * Example usage:
     * <code>
     * $query->filterByDesc1('fooValue');   // WHERE desc1 = 'fooValue'
     * $query->filterByDesc1('%fooValue%', Criteria::LIKE); // WHERE desc1 LIKE '%fooValue%'
     * $query->filterByDesc1(['foo', 'bar']); // WHERE desc1 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $desc1 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDesc1($desc1 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($desc1)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_DESC1, $desc1, $comparison);

        return $this;
    }

    /**
     * Filter the query on the desc2 column
     *
     * Example usage:
     * <code>
     * $query->filterByDesc2('fooValue');   // WHERE desc2 = 'fooValue'
     * $query->filterByDesc2('%fooValue%', Criteria::LIKE); // WHERE desc2 LIKE '%fooValue%'
     * $query->filterByDesc2(['foo', 'bar']); // WHERE desc2 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $desc2 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDesc2($desc2 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($desc2)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_DESC2, $desc2, $comparison);

        return $this;
    }

    /**
     * Filter the query on the custitemid column
     *
     * Example usage:
     * <code>
     * $query->filterByCustitemid('fooValue');   // WHERE custitemid = 'fooValue'
     * $query->filterByCustitemid('%fooValue%', Criteria::LIKE); // WHERE custitemid LIKE '%fooValue%'
     * $query->filterByCustitemid(['foo', 'bar']); // WHERE custitemid IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $custitemid The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCustitemid($custitemid = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custitemid)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_CUSTITEMID, $custitemid, $comparison);

        return $this;
    }

    /**
     * Filter the query on the vendorid column
     *
     * Example usage:
     * <code>
     * $query->filterByVendorid('fooValue');   // WHERE vendorid = 'fooValue'
     * $query->filterByVendorid('%fooValue%', Criteria::LIKE); // WHERE vendorid LIKE '%fooValue%'
     * $query->filterByVendorid(['foo', 'bar']); // WHERE vendorid IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $vendorid The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByVendorid($vendorid = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($vendorid)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_VENDORID, $vendorid, $comparison);

        return $this;
    }

    /**
     * Filter the query on the vendoritemid column
     *
     * Example usage:
     * <code>
     * $query->filterByVendoritemid('fooValue');   // WHERE vendoritemid = 'fooValue'
     * $query->filterByVendoritemid('%fooValue%', Criteria::LIKE); // WHERE vendoritemid LIKE '%fooValue%'
     * $query->filterByVendoritemid(['foo', 'bar']); // WHERE vendoritemid IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $vendoritemid The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByVendoritemid($vendoritemid = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($vendoritemid)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_VENDORITEMID, $vendoritemid, $comparison);

        return $this;
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus('fooValue');   // WHERE status = 'fooValue'
     * $query->filterByStatus('%fooValue%', Criteria::LIKE); // WHERE status LIKE '%fooValue%'
     * $query->filterByStatus(['foo', 'bar']); // WHERE status IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $status The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByStatus($status = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_STATUS, $status, $comparison);

        return $this;
    }

    /**
     * Filter the query on the lostreason column
     *
     * Example usage:
     * <code>
     * $query->filterByLostreason('fooValue');   // WHERE lostreason = 'fooValue'
     * $query->filterByLostreason('%fooValue%', Criteria::LIKE); // WHERE lostreason LIKE '%fooValue%'
     * $query->filterByLostreason(['foo', 'bar']); // WHERE lostreason IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $lostreason The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByLostreason($lostreason = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lostreason)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_LOSTREASON, $lostreason, $comparison);

        return $this;
    }

    /**
     * Filter the query on the lostdate column
     *
     * Example usage:
     * <code>
     * $query->filterByLostdate('fooValue');   // WHERE lostdate = 'fooValue'
     * $query->filterByLostdate('%fooValue%', Criteria::LIKE); // WHERE lostdate LIKE '%fooValue%'
     * $query->filterByLostdate(['foo', 'bar']); // WHERE lostdate IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $lostdate The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByLostdate($lostdate = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lostdate)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_LOSTDATE, $lostdate, $comparison);

        return $this;
    }

    /**
     * Filter the query on the kititemflag column
     *
     * Example usage:
     * <code>
     * $query->filterByKititemflag('fooValue');   // WHERE kititemflag = 'fooValue'
     * $query->filterByKititemflag('%fooValue%', Criteria::LIKE); // WHERE kititemflag LIKE '%fooValue%'
     * $query->filterByKititemflag(['foo', 'bar']); // WHERE kititemflag IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $kititemflag The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByKititemflag($kititemflag = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kititemflag)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_KITITEMFLAG, $kititemflag, $comparison);

        return $this;
    }

    /**
     * Filter the query on the hasnotes column
     *
     * Example usage:
     * <code>
     * $query->filterByHasnotes('fooValue');   // WHERE hasnotes = 'fooValue'
     * $query->filterByHasnotes('%fooValue%', Criteria::LIKE); // WHERE hasnotes LIKE '%fooValue%'
     * $query->filterByHasnotes(['foo', 'bar']); // WHERE hasnotes IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $hasnotes The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByHasnotes($hasnotes = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hasnotes)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_HASNOTES, $hasnotes, $comparison);

        return $this;
    }

    /**
     * Filter the query on the venddetail column
     *
     * Example usage:
     * <code>
     * $query->filterByVenddetail('fooValue');   // WHERE venddetail = 'fooValue'
     * $query->filterByVenddetail('%fooValue%', Criteria::LIKE); // WHERE venddetail LIKE '%fooValue%'
     * $query->filterByVenddetail(['foo', 'bar']); // WHERE venddetail IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $venddetail The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByVenddetail($venddetail = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($venddetail)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_VENDDETAIL, $venddetail, $comparison);

        return $this;
    }

    /**
     * Filter the query on the rshipdate column
     *
     * Example usage:
     * <code>
     * $query->filterByRshipdate('fooValue');   // WHERE rshipdate = 'fooValue'
     * $query->filterByRshipdate('%fooValue%', Criteria::LIKE); // WHERE rshipdate LIKE '%fooValue%'
     * $query->filterByRshipdate(['foo', 'bar']); // WHERE rshipdate IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $rshipdate The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByRshipdate($rshipdate = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rshipdate)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_RSHIPDATE, $rshipdate, $comparison);

        return $this;
    }

    /**
     * Filter the query on the leaddays column
     *
     * Example usage:
     * <code>
     * $query->filterByLeaddays(1234); // WHERE leaddays = 1234
     * $query->filterByLeaddays(array(12, 34)); // WHERE leaddays IN (12, 34)
     * $query->filterByLeaddays(array('min' => 12)); // WHERE leaddays > 12
     * </code>
     *
     * @param mixed $leaddays The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByLeaddays($leaddays = null, ?string $comparison = null)
    {
        if (is_array($leaddays)) {
            $useMinMax = false;
            if (isset($leaddays['min'])) {
                $this->addUsingAlias(QuotdetTableMap::COL_LEADDAYS, $leaddays['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($leaddays['max'])) {
                $this->addUsingAlias(QuotdetTableMap::COL_LEADDAYS, $leaddays['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_LEADDAYS, $leaddays, $comparison);

        return $this;
    }

    /**
     * Filter the query on the taxcode column
     *
     * Example usage:
     * <code>
     * $query->filterByTaxcode('fooValue');   // WHERE taxcode = 'fooValue'
     * $query->filterByTaxcode('%fooValue%', Criteria::LIKE); // WHERE taxcode LIKE '%fooValue%'
     * $query->filterByTaxcode(['foo', 'bar']); // WHERE taxcode IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $taxcode The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTaxcode($taxcode = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($taxcode)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_TAXCODE, $taxcode, $comparison);

        return $this;
    }

    /**
     * Filter the query on the ordrqty column
     *
     * Example usage:
     * <code>
     * $query->filterByOrdrqty('fooValue');   // WHERE ordrqty = 'fooValue'
     * $query->filterByOrdrqty('%fooValue%', Criteria::LIKE); // WHERE ordrqty LIKE '%fooValue%'
     * $query->filterByOrdrqty(['foo', 'bar']); // WHERE ordrqty IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $ordrqty The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByOrdrqty($ordrqty = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ordrqty)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_ORDRQTY, $ordrqty, $comparison);

        return $this;
    }

    /**
     * Filter the query on the ordrprice column
     *
     * Example usage:
     * <code>
     * $query->filterByOrdrprice('fooValue');   // WHERE ordrprice = 'fooValue'
     * $query->filterByOrdrprice('%fooValue%', Criteria::LIKE); // WHERE ordrprice LIKE '%fooValue%'
     * $query->filterByOrdrprice(['foo', 'bar']); // WHERE ordrprice IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $ordrprice The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByOrdrprice($ordrprice = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ordrprice)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_ORDRPRICE, $ordrprice, $comparison);

        return $this;
    }

    /**
     * Filter the query on the ordrcost column
     *
     * Example usage:
     * <code>
     * $query->filterByOrdrcost('fooValue');   // WHERE ordrcost = 'fooValue'
     * $query->filterByOrdrcost('%fooValue%', Criteria::LIKE); // WHERE ordrcost LIKE '%fooValue%'
     * $query->filterByOrdrcost(['foo', 'bar']); // WHERE ordrcost IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $ordrcost The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByOrdrcost($ordrcost = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ordrcost)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_ORDRCOST, $ordrcost, $comparison);

        return $this;
    }

    /**
     * Filter the query on the ordrtotalprice column
     *
     * Example usage:
     * <code>
     * $query->filterByOrdrtotalprice('fooValue');   // WHERE ordrtotalprice = 'fooValue'
     * $query->filterByOrdrtotalprice('%fooValue%', Criteria::LIKE); // WHERE ordrtotalprice LIKE '%fooValue%'
     * $query->filterByOrdrtotalprice(['foo', 'bar']); // WHERE ordrtotalprice IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $ordrtotalprice The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByOrdrtotalprice($ordrtotalprice = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ordrtotalprice)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_ORDRTOTALPRICE, $ordrtotalprice, $comparison);

        return $this;
    }

    /**
     * Filter the query on the ordrtotalcost column
     *
     * Example usage:
     * <code>
     * $query->filterByOrdrtotalcost('fooValue');   // WHERE ordrtotalcost = 'fooValue'
     * $query->filterByOrdrtotalcost('%fooValue%', Criteria::LIKE); // WHERE ordrtotalcost LIKE '%fooValue%'
     * $query->filterByOrdrtotalcost(['foo', 'bar']); // WHERE ordrtotalcost IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $ordrtotalcost The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByOrdrtotalcost($ordrtotalcost = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ordrtotalcost)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_ORDRTOTALCOST, $ordrtotalcost, $comparison);

        return $this;
    }

    /**
     * Filter the query on the uom column
     *
     * Example usage:
     * <code>
     * $query->filterByUom('fooValue');   // WHERE uom = 'fooValue'
     * $query->filterByUom('%fooValue%', Criteria::LIKE); // WHERE uom LIKE '%fooValue%'
     * $query->filterByUom(['foo', 'bar']); // WHERE uom IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $uom The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByUom($uom = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uom)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_UOM, $uom, $comparison);

        return $this;
    }

    /**
     * Filter the query on the costuom column
     *
     * Example usage:
     * <code>
     * $query->filterByCostuom('fooValue');   // WHERE costuom = 'fooValue'
     * $query->filterByCostuom('%fooValue%', Criteria::LIKE); // WHERE costuom LIKE '%fooValue%'
     * $query->filterByCostuom(['foo', 'bar']); // WHERE costuom IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $costuom The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCostuom($costuom = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($costuom)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_COSTUOM, $costuom, $comparison);

        return $this;
    }

    /**
     * Filter the query on the whse column
     *
     * Example usage:
     * <code>
     * $query->filterByWhse('fooValue');   // WHERE whse = 'fooValue'
     * $query->filterByWhse('%fooValue%', Criteria::LIKE); // WHERE whse LIKE '%fooValue%'
     * $query->filterByWhse(['foo', 'bar']); // WHERE whse IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $whse The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByWhse($whse = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whse)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_WHSE, $whse, $comparison);

        return $this;
    }

    /**
     * Filter the query on the listprice column
     *
     * Example usage:
     * <code>
     * $query->filterByListprice('fooValue');   // WHERE listprice = 'fooValue'
     * $query->filterByListprice('%fooValue%', Criteria::LIKE); // WHERE listprice LIKE '%fooValue%'
     * $query->filterByListprice(['foo', 'bar']); // WHERE listprice IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $listprice The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByListprice($listprice = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($listprice)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_LISTPRICE, $listprice, $comparison);

        return $this;
    }

    /**
     * Filter the query on the stancost column
     *
     * Example usage:
     * <code>
     * $query->filterByStancost('fooValue');   // WHERE stancost = 'fooValue'
     * $query->filterByStancost('%fooValue%', Criteria::LIKE); // WHERE stancost LIKE '%fooValue%'
     * $query->filterByStancost(['foo', 'bar']); // WHERE stancost IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $stancost The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByStancost($stancost = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($stancost)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_STANCOST, $stancost, $comparison);

        return $this;
    }

    /**
     * Filter the query on the quotind column
     *
     * Example usage:
     * <code>
     * $query->filterByQuotind('fooValue');   // WHERE quotind = 'fooValue'
     * $query->filterByQuotind('%fooValue%', Criteria::LIKE); // WHERE quotind LIKE '%fooValue%'
     * $query->filterByQuotind(['foo', 'bar']); // WHERE quotind IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $quotind The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByQuotind($quotind = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($quotind)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_QUOTIND, $quotind, $comparison);

        return $this;
    }

    /**
     * Filter the query on the quotqty column
     *
     * Example usage:
     * <code>
     * $query->filterByQuotqty(1234); // WHERE quotqty = 1234
     * $query->filterByQuotqty(array(12, 34)); // WHERE quotqty IN (12, 34)
     * $query->filterByQuotqty(array('min' => 12)); // WHERE quotqty > 12
     * </code>
     *
     * @param mixed $quotqty The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByQuotqty($quotqty = null, ?string $comparison = null)
    {
        if (is_array($quotqty)) {
            $useMinMax = false;
            if (isset($quotqty['min'])) {
                $this->addUsingAlias(QuotdetTableMap::COL_QUOTQTY, $quotqty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quotqty['max'])) {
                $this->addUsingAlias(QuotdetTableMap::COL_QUOTQTY, $quotqty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_QUOTQTY, $quotqty, $comparison);

        return $this;
    }

    /**
     * Filter the query on the quotprice column
     *
     * Example usage:
     * <code>
     * $query->filterByQuotprice('fooValue');   // WHERE quotprice = 'fooValue'
     * $query->filterByQuotprice('%fooValue%', Criteria::LIKE); // WHERE quotprice LIKE '%fooValue%'
     * $query->filterByQuotprice(['foo', 'bar']); // WHERE quotprice IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $quotprice The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByQuotprice($quotprice = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($quotprice)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_QUOTPRICE, $quotprice, $comparison);

        return $this;
    }

    /**
     * Filter the query on the quotcost column
     *
     * Example usage:
     * <code>
     * $query->filterByQuotcost('fooValue');   // WHERE quotcost = 'fooValue'
     * $query->filterByQuotcost('%fooValue%', Criteria::LIKE); // WHERE quotcost LIKE '%fooValue%'
     * $query->filterByQuotcost(['foo', 'bar']); // WHERE quotcost IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $quotcost The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByQuotcost($quotcost = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($quotcost)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_QUOTCOST, $quotcost, $comparison);

        return $this;
    }

    /**
     * Filter the query on the quotmkupmarg column
     *
     * Example usage:
     * <code>
     * $query->filterByQuotmkupmarg('fooValue');   // WHERE quotmkupmarg = 'fooValue'
     * $query->filterByQuotmkupmarg('%fooValue%', Criteria::LIKE); // WHERE quotmkupmarg LIKE '%fooValue%'
     * $query->filterByQuotmkupmarg(['foo', 'bar']); // WHERE quotmkupmarg IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $quotmkupmarg The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByQuotmkupmarg($quotmkupmarg = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($quotmkupmarg)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_QUOTMKUPMARG, $quotmkupmarg, $comparison);

        return $this;
    }

    /**
     * Filter the query on the discpct column
     *
     * Example usage:
     * <code>
     * $query->filterByDiscpct('fooValue');   // WHERE discpct = 'fooValue'
     * $query->filterByDiscpct('%fooValue%', Criteria::LIKE); // WHERE discpct LIKE '%fooValue%'
     * $query->filterByDiscpct(['foo', 'bar']); // WHERE discpct IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $discpct The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDiscpct($discpct = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($discpct)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_DISCPCT, $discpct, $comparison);

        return $this;
    }

    /**
     * Filter the query on the spcord column
     *
     * Example usage:
     * <code>
     * $query->filterBySpcord('fooValue');   // WHERE spcord = 'fooValue'
     * $query->filterBySpcord('%fooValue%', Criteria::LIKE); // WHERE spcord LIKE '%fooValue%'
     * $query->filterBySpcord(['foo', 'bar']); // WHERE spcord IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $spcord The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySpcord($spcord = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spcord)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_SPCORD, $spcord, $comparison);

        return $this;
    }

    /**
     * Filter the query on the error column
     *
     * Example usage:
     * <code>
     * $query->filterByError('fooValue');   // WHERE error = 'fooValue'
     * $query->filterByError('%fooValue%', Criteria::LIKE); // WHERE error LIKE '%fooValue%'
     * $query->filterByError(['foo', 'bar']); // WHERE error IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $error The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByError($error = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($error)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_ERROR, $error, $comparison);

        return $this;
    }

    /**
     * Filter the query on the errormsg column
     *
     * Example usage:
     * <code>
     * $query->filterByErrormsg('fooValue');   // WHERE errormsg = 'fooValue'
     * $query->filterByErrormsg('%fooValue%', Criteria::LIKE); // WHERE errormsg LIKE '%fooValue%'
     * $query->filterByErrormsg(['foo', 'bar']); // WHERE errormsg IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $errormsg The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByErrormsg($errormsg = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($errormsg)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_ERRORMSG, $errormsg, $comparison);

        return $this;
    }

    /**
     * Filter the query on the minprice column
     *
     * Example usage:
     * <code>
     * $query->filterByMinprice('fooValue');   // WHERE minprice = 'fooValue'
     * $query->filterByMinprice('%fooValue%', Criteria::LIKE); // WHERE minprice LIKE '%fooValue%'
     * $query->filterByMinprice(['foo', 'bar']); // WHERE minprice IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $minprice The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByMinprice($minprice = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($minprice)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_MINPRICE, $minprice, $comparison);

        return $this;
    }

    /**
     * Filter the query on the nsitemgroup column
     *
     * Example usage:
     * <code>
     * $query->filterByNsitemgroup('fooValue');   // WHERE nsitemgroup = 'fooValue'
     * $query->filterByNsitemgroup('%fooValue%', Criteria::LIKE); // WHERE nsitemgroup LIKE '%fooValue%'
     * $query->filterByNsitemgroup(['foo', 'bar']); // WHERE nsitemgroup IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $nsitemgroup The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByNsitemgroup($nsitemgroup = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nsitemgroup)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_NSITEMGROUP, $nsitemgroup, $comparison);

        return $this;
    }

    /**
     * Filter the query on the shipfromid column
     *
     * Example usage:
     * <code>
     * $query->filterByShipfromid('fooValue');   // WHERE shipfromid = 'fooValue'
     * $query->filterByShipfromid('%fooValue%', Criteria::LIKE); // WHERE shipfromid LIKE '%fooValue%'
     * $query->filterByShipfromid(['foo', 'bar']); // WHERE shipfromid IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $shipfromid The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByShipfromid($shipfromid = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipfromid)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_SHIPFROMID, $shipfromid, $comparison);

        return $this;
    }

    /**
     * Filter the query on the itemtype column
     *
     * Example usage:
     * <code>
     * $query->filterByItemtype('fooValue');   // WHERE itemtype = 'fooValue'
     * $query->filterByItemtype('%fooValue%', Criteria::LIKE); // WHERE itemtype LIKE '%fooValue%'
     * $query->filterByItemtype(['foo', 'bar']); // WHERE itemtype IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $itemtype The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByItemtype($itemtype = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemtype)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_ITEMTYPE, $itemtype, $comparison);

        return $this;
    }

    /**
     * Filter the query on the dummy column
     *
     * Example usage:
     * <code>
     * $query->filterByDummy('fooValue');   // WHERE dummy = 'fooValue'
     * $query->filterByDummy('%fooValue%', Criteria::LIKE); // WHERE dummy LIKE '%fooValue%'
     * $query->filterByDummy(['foo', 'bar']); // WHERE dummy IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $dummy The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(QuotdetTableMap::COL_DUMMY, $dummy, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildQuotdet $quotdet Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($quotdet = null)
    {
        if ($quotdet) {
            $this->addCond('pruneCond0', $this->getAliasedColName(QuotdetTableMap::COL_SESSIONID), $quotdet->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(QuotdetTableMap::COL_RECNO), $quotdet->getRecno(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the quotdet table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(QuotdetTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            QuotdetTableMap::clearInstancePool();
            QuotdetTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(QuotdetTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(QuotdetTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            QuotdetTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            QuotdetTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
