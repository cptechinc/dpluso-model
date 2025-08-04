<?php

namespace Base;

use \Cartdet as ChildCartdet;
use \CartdetQuery as ChildCartdetQuery;
use \Exception;
use \PDO;
use Map\CartdetTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the `cartdet` table.
 *
 * @method     ChildCartdetQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildCartdetQuery orderByRecno($order = Criteria::ASC) Order by the recno column
 * @method     ChildCartdetQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildCartdetQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildCartdetQuery orderByOrderno($order = Criteria::ASC) Order by the orderno column
 * @method     ChildCartdetQuery orderByLinenbr($order = Criteria::ASC) Order by the linenbr column
 * @method     ChildCartdetQuery orderByItemid($order = Criteria::ASC) Order by the itemid column
 * @method     ChildCartdetQuery orderByCustitemid($order = Criteria::ASC) Order by the custitemid column
 * @method     ChildCartdetQuery orderByDesc1($order = Criteria::ASC) Order by the desc1 column
 * @method     ChildCartdetQuery orderByDesc2($order = Criteria::ASC) Order by the desc2 column
 * @method     ChildCartdetQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildCartdetQuery orderByTotalprice($order = Criteria::ASC) Order by the totalprice column
 * @method     ChildCartdetQuery orderByQty($order = Criteria::ASC) Order by the qty column
 * @method     ChildCartdetQuery orderByQtyshipped($order = Criteria::ASC) Order by the qtyshipped column
 * @method     ChildCartdetQuery orderByQtybackord($order = Criteria::ASC) Order by the qtybackord column
 * @method     ChildCartdetQuery orderByRshipdate($order = Criteria::ASC) Order by the rshipdate column
 * @method     ChildCartdetQuery orderByHasdocuments($order = Criteria::ASC) Order by the hasdocuments column
 * @method     ChildCartdetQuery orderByQtyavail($order = Criteria::ASC) Order by the qtyavail column
 * @method     ChildCartdetQuery orderByHasnotes($order = Criteria::ASC) Order by the hasnotes column
 * @method     ChildCartdetQuery orderByCost($order = Criteria::ASC) Order by the cost column
 * @method     ChildCartdetQuery orderByWhse($order = Criteria::ASC) Order by the whse column
 * @method     ChildCartdetQuery orderByUom($order = Criteria::ASC) Order by the uom column
 * @method     ChildCartdetQuery orderBySpcord($order = Criteria::ASC) Order by the spcord column
 * @method     ChildCartdetQuery orderByKititemflag($order = Criteria::ASC) Order by the kititemflag column
 * @method     ChildCartdetQuery orderByPromocode($order = Criteria::ASC) Order by the promocode column
 * @method     ChildCartdetQuery orderByTaxcode($order = Criteria::ASC) Order by the taxcode column
 * @method     ChildCartdetQuery orderByTaxcodeperc($order = Criteria::ASC) Order by the taxcodeperc column
 * @method     ChildCartdetQuery orderByDiscpct($order = Criteria::ASC) Order by the discpct column
 * @method     ChildCartdetQuery orderByListprice($order = Criteria::ASC) Order by the listprice column
 * @method     ChildCartdetQuery orderByUomconv($order = Criteria::ASC) Order by the uomconv column
 * @method     ChildCartdetQuery orderByCatlgid($order = Criteria::ASC) Order by the catlgid column
 * @method     ChildCartdetQuery orderByErrormsg($order = Criteria::ASC) Order by the errormsg column
 * @method     ChildCartdetQuery orderByMinprice($order = Criteria::ASC) Order by the minprice column
 * @method     ChildCartdetQuery orderByVendorid($order = Criteria::ASC) Order by the vendorid column
 * @method     ChildCartdetQuery orderByVendoritemid($order = Criteria::ASC) Order by the vendoritemid column
 * @method     ChildCartdetQuery orderByPonbr($order = Criteria::ASC) Order by the ponbr column
 * @method     ChildCartdetQuery orderByPoref($order = Criteria::ASC) Order by the poref column
 * @method     ChildCartdetQuery orderByNsitemgroup($order = Criteria::ASC) Order by the nsitemgroup column
 * @method     ChildCartdetQuery orderByShipfromid($order = Criteria::ASC) Order by the shipfromid column
 * @method     ChildCartdetQuery orderByItemtype($order = Criteria::ASC) Order by the itemtype column
 * @method     ChildCartdetQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildCartdetQuery groupBySessionid() Group by the sessionid column
 * @method     ChildCartdetQuery groupByRecno() Group by the recno column
 * @method     ChildCartdetQuery groupByDate() Group by the date column
 * @method     ChildCartdetQuery groupByTime() Group by the time column
 * @method     ChildCartdetQuery groupByOrderno() Group by the orderno column
 * @method     ChildCartdetQuery groupByLinenbr() Group by the linenbr column
 * @method     ChildCartdetQuery groupByItemid() Group by the itemid column
 * @method     ChildCartdetQuery groupByCustitemid() Group by the custitemid column
 * @method     ChildCartdetQuery groupByDesc1() Group by the desc1 column
 * @method     ChildCartdetQuery groupByDesc2() Group by the desc2 column
 * @method     ChildCartdetQuery groupByPrice() Group by the price column
 * @method     ChildCartdetQuery groupByTotalprice() Group by the totalprice column
 * @method     ChildCartdetQuery groupByQty() Group by the qty column
 * @method     ChildCartdetQuery groupByQtyshipped() Group by the qtyshipped column
 * @method     ChildCartdetQuery groupByQtybackord() Group by the qtybackord column
 * @method     ChildCartdetQuery groupByRshipdate() Group by the rshipdate column
 * @method     ChildCartdetQuery groupByHasdocuments() Group by the hasdocuments column
 * @method     ChildCartdetQuery groupByQtyavail() Group by the qtyavail column
 * @method     ChildCartdetQuery groupByHasnotes() Group by the hasnotes column
 * @method     ChildCartdetQuery groupByCost() Group by the cost column
 * @method     ChildCartdetQuery groupByWhse() Group by the whse column
 * @method     ChildCartdetQuery groupByUom() Group by the uom column
 * @method     ChildCartdetQuery groupBySpcord() Group by the spcord column
 * @method     ChildCartdetQuery groupByKititemflag() Group by the kititemflag column
 * @method     ChildCartdetQuery groupByPromocode() Group by the promocode column
 * @method     ChildCartdetQuery groupByTaxcode() Group by the taxcode column
 * @method     ChildCartdetQuery groupByTaxcodeperc() Group by the taxcodeperc column
 * @method     ChildCartdetQuery groupByDiscpct() Group by the discpct column
 * @method     ChildCartdetQuery groupByListprice() Group by the listprice column
 * @method     ChildCartdetQuery groupByUomconv() Group by the uomconv column
 * @method     ChildCartdetQuery groupByCatlgid() Group by the catlgid column
 * @method     ChildCartdetQuery groupByErrormsg() Group by the errormsg column
 * @method     ChildCartdetQuery groupByMinprice() Group by the minprice column
 * @method     ChildCartdetQuery groupByVendorid() Group by the vendorid column
 * @method     ChildCartdetQuery groupByVendoritemid() Group by the vendoritemid column
 * @method     ChildCartdetQuery groupByPonbr() Group by the ponbr column
 * @method     ChildCartdetQuery groupByPoref() Group by the poref column
 * @method     ChildCartdetQuery groupByNsitemgroup() Group by the nsitemgroup column
 * @method     ChildCartdetQuery groupByShipfromid() Group by the shipfromid column
 * @method     ChildCartdetQuery groupByItemtype() Group by the itemtype column
 * @method     ChildCartdetQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildCartdetQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCartdetQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCartdetQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCartdetQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCartdetQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCartdetQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCartdet|null findOne(?ConnectionInterface $con = null) Return the first ChildCartdet matching the query
 * @method     ChildCartdet findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildCartdet matching the query, or a new ChildCartdet object populated from the query conditions when no match is found
 *
 * @method     ChildCartdet|null findOneBySessionid(string $sessionid) Return the first ChildCartdet filtered by the sessionid column
 * @method     ChildCartdet|null findOneByRecno(int $recno) Return the first ChildCartdet filtered by the recno column
 * @method     ChildCartdet|null findOneByDate(int $date) Return the first ChildCartdet filtered by the date column
 * @method     ChildCartdet|null findOneByTime(int $time) Return the first ChildCartdet filtered by the time column
 * @method     ChildCartdet|null findOneByOrderno(string $orderno) Return the first ChildCartdet filtered by the orderno column
 * @method     ChildCartdet|null findOneByLinenbr(string $linenbr) Return the first ChildCartdet filtered by the linenbr column
 * @method     ChildCartdet|null findOneByItemid(string $itemid) Return the first ChildCartdet filtered by the itemid column
 * @method     ChildCartdet|null findOneByCustitemid(string $custitemid) Return the first ChildCartdet filtered by the custitemid column
 * @method     ChildCartdet|null findOneByDesc1(string $desc1) Return the first ChildCartdet filtered by the desc1 column
 * @method     ChildCartdet|null findOneByDesc2(string $desc2) Return the first ChildCartdet filtered by the desc2 column
 * @method     ChildCartdet|null findOneByPrice(string $price) Return the first ChildCartdet filtered by the price column
 * @method     ChildCartdet|null findOneByTotalprice(string $totalprice) Return the first ChildCartdet filtered by the totalprice column
 * @method     ChildCartdet|null findOneByQty(string $qty) Return the first ChildCartdet filtered by the qty column
 * @method     ChildCartdet|null findOneByQtyshipped(string $qtyshipped) Return the first ChildCartdet filtered by the qtyshipped column
 * @method     ChildCartdet|null findOneByQtybackord(string $qtybackord) Return the first ChildCartdet filtered by the qtybackord column
 * @method     ChildCartdet|null findOneByRshipdate(string $rshipdate) Return the first ChildCartdet filtered by the rshipdate column
 * @method     ChildCartdet|null findOneByHasdocuments(string $hasdocuments) Return the first ChildCartdet filtered by the hasdocuments column
 * @method     ChildCartdet|null findOneByQtyavail(string $qtyavail) Return the first ChildCartdet filtered by the qtyavail column
 * @method     ChildCartdet|null findOneByHasnotes(string $hasnotes) Return the first ChildCartdet filtered by the hasnotes column
 * @method     ChildCartdet|null findOneByCost(string $cost) Return the first ChildCartdet filtered by the cost column
 * @method     ChildCartdet|null findOneByWhse(string $whse) Return the first ChildCartdet filtered by the whse column
 * @method     ChildCartdet|null findOneByUom(string $uom) Return the first ChildCartdet filtered by the uom column
 * @method     ChildCartdet|null findOneBySpcord(string $spcord) Return the first ChildCartdet filtered by the spcord column
 * @method     ChildCartdet|null findOneByKititemflag(string $kititemflag) Return the first ChildCartdet filtered by the kititemflag column
 * @method     ChildCartdet|null findOneByPromocode(string $promocode) Return the first ChildCartdet filtered by the promocode column
 * @method     ChildCartdet|null findOneByTaxcode(string $taxcode) Return the first ChildCartdet filtered by the taxcode column
 * @method     ChildCartdet|null findOneByTaxcodeperc(string $taxcodeperc) Return the first ChildCartdet filtered by the taxcodeperc column
 * @method     ChildCartdet|null findOneByDiscpct(string $discpct) Return the first ChildCartdet filtered by the discpct column
 * @method     ChildCartdet|null findOneByListprice(string $listprice) Return the first ChildCartdet filtered by the listprice column
 * @method     ChildCartdet|null findOneByUomconv(string $uomconv) Return the first ChildCartdet filtered by the uomconv column
 * @method     ChildCartdet|null findOneByCatlgid(string $catlgid) Return the first ChildCartdet filtered by the catlgid column
 * @method     ChildCartdet|null findOneByErrormsg(string $errormsg) Return the first ChildCartdet filtered by the errormsg column
 * @method     ChildCartdet|null findOneByMinprice(string $minprice) Return the first ChildCartdet filtered by the minprice column
 * @method     ChildCartdet|null findOneByVendorid(string $vendorid) Return the first ChildCartdet filtered by the vendorid column
 * @method     ChildCartdet|null findOneByVendoritemid(string $vendoritemid) Return the first ChildCartdet filtered by the vendoritemid column
 * @method     ChildCartdet|null findOneByPonbr(string $ponbr) Return the first ChildCartdet filtered by the ponbr column
 * @method     ChildCartdet|null findOneByPoref(string $poref) Return the first ChildCartdet filtered by the poref column
 * @method     ChildCartdet|null findOneByNsitemgroup(string $nsitemgroup) Return the first ChildCartdet filtered by the nsitemgroup column
 * @method     ChildCartdet|null findOneByShipfromid(string $shipfromid) Return the first ChildCartdet filtered by the shipfromid column
 * @method     ChildCartdet|null findOneByItemtype(string $itemtype) Return the first ChildCartdet filtered by the itemtype column
 * @method     ChildCartdet|null findOneByDummy(string $dummy) Return the first ChildCartdet filtered by the dummy column
 *
 * @method     ChildCartdet requirePk($key, ?ConnectionInterface $con = null) Return the ChildCartdet by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOne(?ConnectionInterface $con = null) Return the first ChildCartdet matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCartdet requireOneBySessionid(string $sessionid) Return the first ChildCartdet filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByRecno(int $recno) Return the first ChildCartdet filtered by the recno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByDate(int $date) Return the first ChildCartdet filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByTime(int $time) Return the first ChildCartdet filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByOrderno(string $orderno) Return the first ChildCartdet filtered by the orderno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByLinenbr(string $linenbr) Return the first ChildCartdet filtered by the linenbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByItemid(string $itemid) Return the first ChildCartdet filtered by the itemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByCustitemid(string $custitemid) Return the first ChildCartdet filtered by the custitemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByDesc1(string $desc1) Return the first ChildCartdet filtered by the desc1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByDesc2(string $desc2) Return the first ChildCartdet filtered by the desc2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByPrice(string $price) Return the first ChildCartdet filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByTotalprice(string $totalprice) Return the first ChildCartdet filtered by the totalprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByQty(string $qty) Return the first ChildCartdet filtered by the qty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByQtyshipped(string $qtyshipped) Return the first ChildCartdet filtered by the qtyshipped column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByQtybackord(string $qtybackord) Return the first ChildCartdet filtered by the qtybackord column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByRshipdate(string $rshipdate) Return the first ChildCartdet filtered by the rshipdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByHasdocuments(string $hasdocuments) Return the first ChildCartdet filtered by the hasdocuments column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByQtyavail(string $qtyavail) Return the first ChildCartdet filtered by the qtyavail column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByHasnotes(string $hasnotes) Return the first ChildCartdet filtered by the hasnotes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByCost(string $cost) Return the first ChildCartdet filtered by the cost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByWhse(string $whse) Return the first ChildCartdet filtered by the whse column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByUom(string $uom) Return the first ChildCartdet filtered by the uom column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneBySpcord(string $spcord) Return the first ChildCartdet filtered by the spcord column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByKititemflag(string $kititemflag) Return the first ChildCartdet filtered by the kititemflag column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByPromocode(string $promocode) Return the first ChildCartdet filtered by the promocode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByTaxcode(string $taxcode) Return the first ChildCartdet filtered by the taxcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByTaxcodeperc(string $taxcodeperc) Return the first ChildCartdet filtered by the taxcodeperc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByDiscpct(string $discpct) Return the first ChildCartdet filtered by the discpct column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByListprice(string $listprice) Return the first ChildCartdet filtered by the listprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByUomconv(string $uomconv) Return the first ChildCartdet filtered by the uomconv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByCatlgid(string $catlgid) Return the first ChildCartdet filtered by the catlgid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByErrormsg(string $errormsg) Return the first ChildCartdet filtered by the errormsg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByMinprice(string $minprice) Return the first ChildCartdet filtered by the minprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByVendorid(string $vendorid) Return the first ChildCartdet filtered by the vendorid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByVendoritemid(string $vendoritemid) Return the first ChildCartdet filtered by the vendoritemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByPonbr(string $ponbr) Return the first ChildCartdet filtered by the ponbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByPoref(string $poref) Return the first ChildCartdet filtered by the poref column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByNsitemgroup(string $nsitemgroup) Return the first ChildCartdet filtered by the nsitemgroup column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByShipfromid(string $shipfromid) Return the first ChildCartdet filtered by the shipfromid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByItemtype(string $itemtype) Return the first ChildCartdet filtered by the itemtype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCartdet requireOneByDummy(string $dummy) Return the first ChildCartdet filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCartdet[]|Collection find(?ConnectionInterface $con = null) Return ChildCartdet objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildCartdet> find(?ConnectionInterface $con = null) Return ChildCartdet objects based on current ModelCriteria
 *
 * @method     ChildCartdet[]|Collection findBySessionid(string|array<string> $sessionid) Return ChildCartdet objects filtered by the sessionid column
 * @psalm-method Collection&\Traversable<ChildCartdet> findBySessionid(string|array<string> $sessionid) Return ChildCartdet objects filtered by the sessionid column
 * @method     ChildCartdet[]|Collection findByRecno(int|array<int> $recno) Return ChildCartdet objects filtered by the recno column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByRecno(int|array<int> $recno) Return ChildCartdet objects filtered by the recno column
 * @method     ChildCartdet[]|Collection findByDate(int|array<int> $date) Return ChildCartdet objects filtered by the date column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByDate(int|array<int> $date) Return ChildCartdet objects filtered by the date column
 * @method     ChildCartdet[]|Collection findByTime(int|array<int> $time) Return ChildCartdet objects filtered by the time column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByTime(int|array<int> $time) Return ChildCartdet objects filtered by the time column
 * @method     ChildCartdet[]|Collection findByOrderno(string|array<string> $orderno) Return ChildCartdet objects filtered by the orderno column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByOrderno(string|array<string> $orderno) Return ChildCartdet objects filtered by the orderno column
 * @method     ChildCartdet[]|Collection findByLinenbr(string|array<string> $linenbr) Return ChildCartdet objects filtered by the linenbr column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByLinenbr(string|array<string> $linenbr) Return ChildCartdet objects filtered by the linenbr column
 * @method     ChildCartdet[]|Collection findByItemid(string|array<string> $itemid) Return ChildCartdet objects filtered by the itemid column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByItemid(string|array<string> $itemid) Return ChildCartdet objects filtered by the itemid column
 * @method     ChildCartdet[]|Collection findByCustitemid(string|array<string> $custitemid) Return ChildCartdet objects filtered by the custitemid column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByCustitemid(string|array<string> $custitemid) Return ChildCartdet objects filtered by the custitemid column
 * @method     ChildCartdet[]|Collection findByDesc1(string|array<string> $desc1) Return ChildCartdet objects filtered by the desc1 column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByDesc1(string|array<string> $desc1) Return ChildCartdet objects filtered by the desc1 column
 * @method     ChildCartdet[]|Collection findByDesc2(string|array<string> $desc2) Return ChildCartdet objects filtered by the desc2 column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByDesc2(string|array<string> $desc2) Return ChildCartdet objects filtered by the desc2 column
 * @method     ChildCartdet[]|Collection findByPrice(string|array<string> $price) Return ChildCartdet objects filtered by the price column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByPrice(string|array<string> $price) Return ChildCartdet objects filtered by the price column
 * @method     ChildCartdet[]|Collection findByTotalprice(string|array<string> $totalprice) Return ChildCartdet objects filtered by the totalprice column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByTotalprice(string|array<string> $totalprice) Return ChildCartdet objects filtered by the totalprice column
 * @method     ChildCartdet[]|Collection findByQty(string|array<string> $qty) Return ChildCartdet objects filtered by the qty column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByQty(string|array<string> $qty) Return ChildCartdet objects filtered by the qty column
 * @method     ChildCartdet[]|Collection findByQtyshipped(string|array<string> $qtyshipped) Return ChildCartdet objects filtered by the qtyshipped column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByQtyshipped(string|array<string> $qtyshipped) Return ChildCartdet objects filtered by the qtyshipped column
 * @method     ChildCartdet[]|Collection findByQtybackord(string|array<string> $qtybackord) Return ChildCartdet objects filtered by the qtybackord column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByQtybackord(string|array<string> $qtybackord) Return ChildCartdet objects filtered by the qtybackord column
 * @method     ChildCartdet[]|Collection findByRshipdate(string|array<string> $rshipdate) Return ChildCartdet objects filtered by the rshipdate column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByRshipdate(string|array<string> $rshipdate) Return ChildCartdet objects filtered by the rshipdate column
 * @method     ChildCartdet[]|Collection findByHasdocuments(string|array<string> $hasdocuments) Return ChildCartdet objects filtered by the hasdocuments column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByHasdocuments(string|array<string> $hasdocuments) Return ChildCartdet objects filtered by the hasdocuments column
 * @method     ChildCartdet[]|Collection findByQtyavail(string|array<string> $qtyavail) Return ChildCartdet objects filtered by the qtyavail column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByQtyavail(string|array<string> $qtyavail) Return ChildCartdet objects filtered by the qtyavail column
 * @method     ChildCartdet[]|Collection findByHasnotes(string|array<string> $hasnotes) Return ChildCartdet objects filtered by the hasnotes column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByHasnotes(string|array<string> $hasnotes) Return ChildCartdet objects filtered by the hasnotes column
 * @method     ChildCartdet[]|Collection findByCost(string|array<string> $cost) Return ChildCartdet objects filtered by the cost column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByCost(string|array<string> $cost) Return ChildCartdet objects filtered by the cost column
 * @method     ChildCartdet[]|Collection findByWhse(string|array<string> $whse) Return ChildCartdet objects filtered by the whse column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByWhse(string|array<string> $whse) Return ChildCartdet objects filtered by the whse column
 * @method     ChildCartdet[]|Collection findByUom(string|array<string> $uom) Return ChildCartdet objects filtered by the uom column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByUom(string|array<string> $uom) Return ChildCartdet objects filtered by the uom column
 * @method     ChildCartdet[]|Collection findBySpcord(string|array<string> $spcord) Return ChildCartdet objects filtered by the spcord column
 * @psalm-method Collection&\Traversable<ChildCartdet> findBySpcord(string|array<string> $spcord) Return ChildCartdet objects filtered by the spcord column
 * @method     ChildCartdet[]|Collection findByKititemflag(string|array<string> $kititemflag) Return ChildCartdet objects filtered by the kititemflag column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByKititemflag(string|array<string> $kititemflag) Return ChildCartdet objects filtered by the kititemflag column
 * @method     ChildCartdet[]|Collection findByPromocode(string|array<string> $promocode) Return ChildCartdet objects filtered by the promocode column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByPromocode(string|array<string> $promocode) Return ChildCartdet objects filtered by the promocode column
 * @method     ChildCartdet[]|Collection findByTaxcode(string|array<string> $taxcode) Return ChildCartdet objects filtered by the taxcode column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByTaxcode(string|array<string> $taxcode) Return ChildCartdet objects filtered by the taxcode column
 * @method     ChildCartdet[]|Collection findByTaxcodeperc(string|array<string> $taxcodeperc) Return ChildCartdet objects filtered by the taxcodeperc column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByTaxcodeperc(string|array<string> $taxcodeperc) Return ChildCartdet objects filtered by the taxcodeperc column
 * @method     ChildCartdet[]|Collection findByDiscpct(string|array<string> $discpct) Return ChildCartdet objects filtered by the discpct column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByDiscpct(string|array<string> $discpct) Return ChildCartdet objects filtered by the discpct column
 * @method     ChildCartdet[]|Collection findByListprice(string|array<string> $listprice) Return ChildCartdet objects filtered by the listprice column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByListprice(string|array<string> $listprice) Return ChildCartdet objects filtered by the listprice column
 * @method     ChildCartdet[]|Collection findByUomconv(string|array<string> $uomconv) Return ChildCartdet objects filtered by the uomconv column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByUomconv(string|array<string> $uomconv) Return ChildCartdet objects filtered by the uomconv column
 * @method     ChildCartdet[]|Collection findByCatlgid(string|array<string> $catlgid) Return ChildCartdet objects filtered by the catlgid column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByCatlgid(string|array<string> $catlgid) Return ChildCartdet objects filtered by the catlgid column
 * @method     ChildCartdet[]|Collection findByErrormsg(string|array<string> $errormsg) Return ChildCartdet objects filtered by the errormsg column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByErrormsg(string|array<string> $errormsg) Return ChildCartdet objects filtered by the errormsg column
 * @method     ChildCartdet[]|Collection findByMinprice(string|array<string> $minprice) Return ChildCartdet objects filtered by the minprice column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByMinprice(string|array<string> $minprice) Return ChildCartdet objects filtered by the minprice column
 * @method     ChildCartdet[]|Collection findByVendorid(string|array<string> $vendorid) Return ChildCartdet objects filtered by the vendorid column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByVendorid(string|array<string> $vendorid) Return ChildCartdet objects filtered by the vendorid column
 * @method     ChildCartdet[]|Collection findByVendoritemid(string|array<string> $vendoritemid) Return ChildCartdet objects filtered by the vendoritemid column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByVendoritemid(string|array<string> $vendoritemid) Return ChildCartdet objects filtered by the vendoritemid column
 * @method     ChildCartdet[]|Collection findByPonbr(string|array<string> $ponbr) Return ChildCartdet objects filtered by the ponbr column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByPonbr(string|array<string> $ponbr) Return ChildCartdet objects filtered by the ponbr column
 * @method     ChildCartdet[]|Collection findByPoref(string|array<string> $poref) Return ChildCartdet objects filtered by the poref column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByPoref(string|array<string> $poref) Return ChildCartdet objects filtered by the poref column
 * @method     ChildCartdet[]|Collection findByNsitemgroup(string|array<string> $nsitemgroup) Return ChildCartdet objects filtered by the nsitemgroup column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByNsitemgroup(string|array<string> $nsitemgroup) Return ChildCartdet objects filtered by the nsitemgroup column
 * @method     ChildCartdet[]|Collection findByShipfromid(string|array<string> $shipfromid) Return ChildCartdet objects filtered by the shipfromid column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByShipfromid(string|array<string> $shipfromid) Return ChildCartdet objects filtered by the shipfromid column
 * @method     ChildCartdet[]|Collection findByItemtype(string|array<string> $itemtype) Return ChildCartdet objects filtered by the itemtype column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByItemtype(string|array<string> $itemtype) Return ChildCartdet objects filtered by the itemtype column
 * @method     ChildCartdet[]|Collection findByDummy(string|array<string> $dummy) Return ChildCartdet objects filtered by the dummy column
 * @psalm-method Collection&\Traversable<ChildCartdet> findByDummy(string|array<string> $dummy) Return ChildCartdet objects filtered by the dummy column
 *
 * @method     ChildCartdet[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildCartdet> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class CartdetQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CartdetQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Cartdet', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCartdetQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCartdetQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildCartdetQuery) {
            return $criteria;
        }
        $query = new ChildCartdetQuery();
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
     * @return ChildCartdet|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CartdetTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CartdetTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildCartdet A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, recno, date, time, orderno, linenbr, itemid, custitemid, desc1, desc2, price, totalprice, qty, qtyshipped, qtybackord, rshipdate, hasdocuments, qtyavail, hasnotes, cost, whse, uom, spcord, kititemflag, promocode, taxcode, taxcodeperc, discpct, listprice, uomconv, catlgid, errormsg, minprice, vendorid, vendoritemid, ponbr, poref, nsitemgroup, shipfromid, itemtype, dummy FROM cartdet WHERE sessionid = :p0 AND recno = :p1';
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
            /** @var ChildCartdet $obj */
            $obj = new ChildCartdet();
            $obj->hydrate($row);
            CartdetTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildCartdet|array|mixed the result, formatted by the current formatter
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
        $this->addUsingAlias(CartdetTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(CartdetTableMap::COL_RECNO, $key[1], Criteria::EQUAL);

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
            $cton0 = $this->getNewCriterion(CartdetTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(CartdetTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
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

        $this->addUsingAlias(CartdetTableMap::COL_SESSIONID, $sessionid, $comparison);

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
                $this->addUsingAlias(CartdetTableMap::COL_RECNO, $recno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recno['max'])) {
                $this->addUsingAlias(CartdetTableMap::COL_RECNO, $recno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CartdetTableMap::COL_RECNO, $recno, $comparison);

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
                $this->addUsingAlias(CartdetTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(CartdetTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CartdetTableMap::COL_DATE, $date, $comparison);

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
                $this->addUsingAlias(CartdetTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(CartdetTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CartdetTableMap::COL_TIME, $time, $comparison);

        return $this;
    }

    /**
     * Filter the query on the orderno column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderno('fooValue');   // WHERE orderno = 'fooValue'
     * $query->filterByOrderno('%fooValue%', Criteria::LIKE); // WHERE orderno LIKE '%fooValue%'
     * $query->filterByOrderno(['foo', 'bar']); // WHERE orderno IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $orderno The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByOrderno($orderno = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($orderno)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CartdetTableMap::COL_ORDERNO, $orderno, $comparison);

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

        $this->addUsingAlias(CartdetTableMap::COL_LINENBR, $linenbr, $comparison);

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

        $this->addUsingAlias(CartdetTableMap::COL_ITEMID, $itemid, $comparison);

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

        $this->addUsingAlias(CartdetTableMap::COL_CUSTITEMID, $custitemid, $comparison);

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

        $this->addUsingAlias(CartdetTableMap::COL_DESC1, $desc1, $comparison);

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

        $this->addUsingAlias(CartdetTableMap::COL_DESC2, $desc2, $comparison);

        return $this;
    }

    /**
     * Filter the query on the price column
     *
     * Example usage:
     * <code>
     * $query->filterByPrice('fooValue');   // WHERE price = 'fooValue'
     * $query->filterByPrice('%fooValue%', Criteria::LIKE); // WHERE price LIKE '%fooValue%'
     * $query->filterByPrice(['foo', 'bar']); // WHERE price IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $price The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrice($price = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($price)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CartdetTableMap::COL_PRICE, $price, $comparison);

        return $this;
    }

    /**
     * Filter the query on the totalprice column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalprice('fooValue');   // WHERE totalprice = 'fooValue'
     * $query->filterByTotalprice('%fooValue%', Criteria::LIKE); // WHERE totalprice LIKE '%fooValue%'
     * $query->filterByTotalprice(['foo', 'bar']); // WHERE totalprice IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $totalprice The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTotalprice($totalprice = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($totalprice)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CartdetTableMap::COL_TOTALPRICE, $totalprice, $comparison);

        return $this;
    }

    /**
     * Filter the query on the qty column
     *
     * Example usage:
     * <code>
     * $query->filterByQty('fooValue');   // WHERE qty = 'fooValue'
     * $query->filterByQty('%fooValue%', Criteria::LIKE); // WHERE qty LIKE '%fooValue%'
     * $query->filterByQty(['foo', 'bar']); // WHERE qty IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $qty The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByQty($qty = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($qty)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CartdetTableMap::COL_QTY, $qty, $comparison);

        return $this;
    }

    /**
     * Filter the query on the qtyshipped column
     *
     * Example usage:
     * <code>
     * $query->filterByQtyshipped('fooValue');   // WHERE qtyshipped = 'fooValue'
     * $query->filterByQtyshipped('%fooValue%', Criteria::LIKE); // WHERE qtyshipped LIKE '%fooValue%'
     * $query->filterByQtyshipped(['foo', 'bar']); // WHERE qtyshipped IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $qtyshipped The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByQtyshipped($qtyshipped = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($qtyshipped)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CartdetTableMap::COL_QTYSHIPPED, $qtyshipped, $comparison);

        return $this;
    }

    /**
     * Filter the query on the qtybackord column
     *
     * Example usage:
     * <code>
     * $query->filterByQtybackord('fooValue');   // WHERE qtybackord = 'fooValue'
     * $query->filterByQtybackord('%fooValue%', Criteria::LIKE); // WHERE qtybackord LIKE '%fooValue%'
     * $query->filterByQtybackord(['foo', 'bar']); // WHERE qtybackord IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $qtybackord The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByQtybackord($qtybackord = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($qtybackord)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CartdetTableMap::COL_QTYBACKORD, $qtybackord, $comparison);

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

        $this->addUsingAlias(CartdetTableMap::COL_RSHIPDATE, $rshipdate, $comparison);

        return $this;
    }

    /**
     * Filter the query on the hasdocuments column
     *
     * Example usage:
     * <code>
     * $query->filterByHasdocuments('fooValue');   // WHERE hasdocuments = 'fooValue'
     * $query->filterByHasdocuments('%fooValue%', Criteria::LIKE); // WHERE hasdocuments LIKE '%fooValue%'
     * $query->filterByHasdocuments(['foo', 'bar']); // WHERE hasdocuments IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $hasdocuments The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByHasdocuments($hasdocuments = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hasdocuments)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CartdetTableMap::COL_HASDOCUMENTS, $hasdocuments, $comparison);

        return $this;
    }

    /**
     * Filter the query on the qtyavail column
     *
     * Example usage:
     * <code>
     * $query->filterByQtyavail('fooValue');   // WHERE qtyavail = 'fooValue'
     * $query->filterByQtyavail('%fooValue%', Criteria::LIKE); // WHERE qtyavail LIKE '%fooValue%'
     * $query->filterByQtyavail(['foo', 'bar']); // WHERE qtyavail IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $qtyavail The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByQtyavail($qtyavail = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($qtyavail)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CartdetTableMap::COL_QTYAVAIL, $qtyavail, $comparison);

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

        $this->addUsingAlias(CartdetTableMap::COL_HASNOTES, $hasnotes, $comparison);

        return $this;
    }

    /**
     * Filter the query on the cost column
     *
     * Example usage:
     * <code>
     * $query->filterByCost('fooValue');   // WHERE cost = 'fooValue'
     * $query->filterByCost('%fooValue%', Criteria::LIKE); // WHERE cost LIKE '%fooValue%'
     * $query->filterByCost(['foo', 'bar']); // WHERE cost IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $cost The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCost($cost = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cost)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CartdetTableMap::COL_COST, $cost, $comparison);

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

        $this->addUsingAlias(CartdetTableMap::COL_WHSE, $whse, $comparison);

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

        $this->addUsingAlias(CartdetTableMap::COL_UOM, $uom, $comparison);

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

        $this->addUsingAlias(CartdetTableMap::COL_SPCORD, $spcord, $comparison);

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

        $this->addUsingAlias(CartdetTableMap::COL_KITITEMFLAG, $kititemflag, $comparison);

        return $this;
    }

    /**
     * Filter the query on the promocode column
     *
     * Example usage:
     * <code>
     * $query->filterByPromocode('fooValue');   // WHERE promocode = 'fooValue'
     * $query->filterByPromocode('%fooValue%', Criteria::LIKE); // WHERE promocode LIKE '%fooValue%'
     * $query->filterByPromocode(['foo', 'bar']); // WHERE promocode IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $promocode The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPromocode($promocode = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($promocode)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CartdetTableMap::COL_PROMOCODE, $promocode, $comparison);

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

        $this->addUsingAlias(CartdetTableMap::COL_TAXCODE, $taxcode, $comparison);

        return $this;
    }

    /**
     * Filter the query on the taxcodeperc column
     *
     * Example usage:
     * <code>
     * $query->filterByTaxcodeperc('fooValue');   // WHERE taxcodeperc = 'fooValue'
     * $query->filterByTaxcodeperc('%fooValue%', Criteria::LIKE); // WHERE taxcodeperc LIKE '%fooValue%'
     * $query->filterByTaxcodeperc(['foo', 'bar']); // WHERE taxcodeperc IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $taxcodeperc The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTaxcodeperc($taxcodeperc = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($taxcodeperc)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CartdetTableMap::COL_TAXCODEPERC, $taxcodeperc, $comparison);

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

        $this->addUsingAlias(CartdetTableMap::COL_DISCPCT, $discpct, $comparison);

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

        $this->addUsingAlias(CartdetTableMap::COL_LISTPRICE, $listprice, $comparison);

        return $this;
    }

    /**
     * Filter the query on the uomconv column
     *
     * Example usage:
     * <code>
     * $query->filterByUomconv('fooValue');   // WHERE uomconv = 'fooValue'
     * $query->filterByUomconv('%fooValue%', Criteria::LIKE); // WHERE uomconv LIKE '%fooValue%'
     * $query->filterByUomconv(['foo', 'bar']); // WHERE uomconv IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $uomconv The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByUomconv($uomconv = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uomconv)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CartdetTableMap::COL_UOMCONV, $uomconv, $comparison);

        return $this;
    }

    /**
     * Filter the query on the catlgid column
     *
     * Example usage:
     * <code>
     * $query->filterByCatlgid('fooValue');   // WHERE catlgid = 'fooValue'
     * $query->filterByCatlgid('%fooValue%', Criteria::LIKE); // WHERE catlgid LIKE '%fooValue%'
     * $query->filterByCatlgid(['foo', 'bar']); // WHERE catlgid IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $catlgid The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCatlgid($catlgid = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($catlgid)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CartdetTableMap::COL_CATLGID, $catlgid, $comparison);

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

        $this->addUsingAlias(CartdetTableMap::COL_ERRORMSG, $errormsg, $comparison);

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

        $this->addUsingAlias(CartdetTableMap::COL_MINPRICE, $minprice, $comparison);

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

        $this->addUsingAlias(CartdetTableMap::COL_VENDORID, $vendorid, $comparison);

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

        $this->addUsingAlias(CartdetTableMap::COL_VENDORITEMID, $vendoritemid, $comparison);

        return $this;
    }

    /**
     * Filter the query on the ponbr column
     *
     * Example usage:
     * <code>
     * $query->filterByPonbr('fooValue');   // WHERE ponbr = 'fooValue'
     * $query->filterByPonbr('%fooValue%', Criteria::LIKE); // WHERE ponbr LIKE '%fooValue%'
     * $query->filterByPonbr(['foo', 'bar']); // WHERE ponbr IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $ponbr The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPonbr($ponbr = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ponbr)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CartdetTableMap::COL_PONBR, $ponbr, $comparison);

        return $this;
    }

    /**
     * Filter the query on the poref column
     *
     * Example usage:
     * <code>
     * $query->filterByPoref('fooValue');   // WHERE poref = 'fooValue'
     * $query->filterByPoref('%fooValue%', Criteria::LIKE); // WHERE poref LIKE '%fooValue%'
     * $query->filterByPoref(['foo', 'bar']); // WHERE poref IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $poref The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPoref($poref = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($poref)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CartdetTableMap::COL_POREF, $poref, $comparison);

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

        $this->addUsingAlias(CartdetTableMap::COL_NSITEMGROUP, $nsitemgroup, $comparison);

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

        $this->addUsingAlias(CartdetTableMap::COL_SHIPFROMID, $shipfromid, $comparison);

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

        $this->addUsingAlias(CartdetTableMap::COL_ITEMTYPE, $itemtype, $comparison);

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

        $this->addUsingAlias(CartdetTableMap::COL_DUMMY, $dummy, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildCartdet $cartdet Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($cartdet = null)
    {
        if ($cartdet) {
            $this->addCond('pruneCond0', $this->getAliasedColName(CartdetTableMap::COL_SESSIONID), $cartdet->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(CartdetTableMap::COL_RECNO), $cartdet->getRecno(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the cartdet table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CartdetTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CartdetTableMap::clearInstancePool();
            CartdetTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CartdetTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CartdetTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CartdetTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CartdetTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
