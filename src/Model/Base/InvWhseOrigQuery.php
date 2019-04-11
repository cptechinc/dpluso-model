<?php

namespace Base;

use \InvWhseOrig as ChildInvWhseOrig;
use \InvWhseOrigQuery as ChildInvWhseOrigQuery;
use \Exception;
use \PDO;
use Map\InvWhseOrigTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'inv_whse_orig' table.
 *
 *
 *
 * @method     ChildInvWhseOrigQuery orderByIntbwhseorig($order = Criteria::ASC) Order by the IntbWhseOrig column
 * @method     ChildInvWhseOrigQuery orderByIntbwhsename($order = Criteria::ASC) Order by the IntbWhseName column
 * @method     ChildInvWhseOrigQuery orderByIntbwhseadr1($order = Criteria::ASC) Order by the IntbWhseAdr1 column
 * @method     ChildInvWhseOrigQuery orderByIntbwhseadr2($order = Criteria::ASC) Order by the IntbWhseAdr2 column
 * @method     ChildInvWhseOrigQuery orderByIntbwhsecity($order = Criteria::ASC) Order by the IntbWhseCity column
 * @method     ChildInvWhseOrigQuery orderByIntbwhsestat($order = Criteria::ASC) Order by the IntbWhseStat column
 * @method     ChildInvWhseOrigQuery orderByIntbwhsezipcode($order = Criteria::ASC) Order by the IntbWhseZipCode column
 * @method     ChildInvWhseOrigQuery orderByIntbwhsectry($order = Criteria::ASC) Order by the IntbWhseCtry column
 * @method     ChildInvWhseOrigQuery orderByIntbwhseusehandheld($order = Criteria::ASC) Order by the IntbWhseUseHandheld column
 * @method     ChildInvWhseOrigQuery orderByIntbwhsecashcust($order = Criteria::ASC) Order by the IntbWhseCashCust column
 * @method     ChildInvWhseOrigQuery orderByIntbwhsepickdtl($order = Criteria::ASC) Order by the IntbWhsePickDtl column
 * @method     ChildInvWhseOrigQuery orderByIntbwhseprodbin($order = Criteria::ASC) Order by the IntbWhseProdBin column
 * @method     ChildInvWhseOrigQuery orderByIntbwhsepharea($order = Criteria::ASC) Order by the IntbWhsePhArea column
 * @method     ChildInvWhseOrigQuery orderByIntbwhsephfrst3($order = Criteria::ASC) Order by the IntbWhsePhFrst3 column
 * @method     ChildInvWhseOrigQuery orderByIntbwhsephlast4($order = Criteria::ASC) Order by the IntbWhsePhLast4 column
 * @method     ChildInvWhseOrigQuery orderByIntbwhsephext($order = Criteria::ASC) Order by the IntbWhsePhExt column
 * @method     ChildInvWhseOrigQuery orderByIntbwhsefaxarea($order = Criteria::ASC) Order by the IntbWhseFaxArea column
 * @method     ChildInvWhseOrigQuery orderByIntbwhsefaxfrst3($order = Criteria::ASC) Order by the IntbWhseFaxFrst3 column
 * @method     ChildInvWhseOrigQuery orderByIntbwhsefaxlast4($order = Criteria::ASC) Order by the IntbWhseFaxLast4 column
 * @method     ChildInvWhseOrigQuery orderByIntbwhseemailadr($order = Criteria::ASC) Order by the IntbWhseEmailAdr column
 * @method     ChildInvWhseOrigQuery orderByIntbwhseqcrgabin($order = Criteria::ASC) Order by the IntbWhseQcRgaBin column
 * @method     ChildInvWhseOrigQuery orderByIntbwhserfprinter1($order = Criteria::ASC) Order by the IntbWhseRfPrinter1 column
 * @method     ChildInvWhseOrigQuery orderByIntbwhserfprinter2($order = Criteria::ASC) Order by the IntbWhseRfPrinter2 column
 * @method     ChildInvWhseOrigQuery orderByIntbwhserfprinter3($order = Criteria::ASC) Order by the IntbWhseRfPrinter3 column
 * @method     ChildInvWhseOrigQuery orderByIntbwhserfprinter4($order = Criteria::ASC) Order by the IntbWhseRfPrinter4 column
 * @method     ChildInvWhseOrigQuery orderByIntbwhserfprinter5($order = Criteria::ASC) Order by the IntbWhseRfPrinter5 column
 * @method     ChildInvWhseOrigQuery orderByIntbwhseprofwhse($order = Criteria::ASC) Order by the IntbWhseProfWhse column
 * @method     ChildInvWhseOrigQuery orderByIntbwhseasetwhse($order = Criteria::ASC) Order by the IntbWhseAsetWhse column
 * @method     ChildInvWhseOrigQuery orderByIntbwhseconsignwhse($order = Criteria::ASC) Order by the IntbWhseConsignWhse column
 * @method     ChildInvWhseOrigQuery orderByIntbwhsebinrangelist($order = Criteria::ASC) Order by the IntbWhseBinRangeList column
 * @method     ChildInvWhseOrigQuery orderByIntbwhsesupplywhse($order = Criteria::ASC) Order by the IntbWhseSupplyWhse column
 * @method     ChildInvWhseOrigQuery orderByDateupdtd($order = Criteria::ASC) Order by the DateUpdtd column
 * @method     ChildInvWhseOrigQuery orderByTimeupdtd($order = Criteria::ASC) Order by the TimeUpdtd column
 * @method     ChildInvWhseOrigQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildInvWhseOrigQuery groupByIntbwhseorig() Group by the IntbWhseOrig column
 * @method     ChildInvWhseOrigQuery groupByIntbwhsename() Group by the IntbWhseName column
 * @method     ChildInvWhseOrigQuery groupByIntbwhseadr1() Group by the IntbWhseAdr1 column
 * @method     ChildInvWhseOrigQuery groupByIntbwhseadr2() Group by the IntbWhseAdr2 column
 * @method     ChildInvWhseOrigQuery groupByIntbwhsecity() Group by the IntbWhseCity column
 * @method     ChildInvWhseOrigQuery groupByIntbwhsestat() Group by the IntbWhseStat column
 * @method     ChildInvWhseOrigQuery groupByIntbwhsezipcode() Group by the IntbWhseZipCode column
 * @method     ChildInvWhseOrigQuery groupByIntbwhsectry() Group by the IntbWhseCtry column
 * @method     ChildInvWhseOrigQuery groupByIntbwhseusehandheld() Group by the IntbWhseUseHandheld column
 * @method     ChildInvWhseOrigQuery groupByIntbwhsecashcust() Group by the IntbWhseCashCust column
 * @method     ChildInvWhseOrigQuery groupByIntbwhsepickdtl() Group by the IntbWhsePickDtl column
 * @method     ChildInvWhseOrigQuery groupByIntbwhseprodbin() Group by the IntbWhseProdBin column
 * @method     ChildInvWhseOrigQuery groupByIntbwhsepharea() Group by the IntbWhsePhArea column
 * @method     ChildInvWhseOrigQuery groupByIntbwhsephfrst3() Group by the IntbWhsePhFrst3 column
 * @method     ChildInvWhseOrigQuery groupByIntbwhsephlast4() Group by the IntbWhsePhLast4 column
 * @method     ChildInvWhseOrigQuery groupByIntbwhsephext() Group by the IntbWhsePhExt column
 * @method     ChildInvWhseOrigQuery groupByIntbwhsefaxarea() Group by the IntbWhseFaxArea column
 * @method     ChildInvWhseOrigQuery groupByIntbwhsefaxfrst3() Group by the IntbWhseFaxFrst3 column
 * @method     ChildInvWhseOrigQuery groupByIntbwhsefaxlast4() Group by the IntbWhseFaxLast4 column
 * @method     ChildInvWhseOrigQuery groupByIntbwhseemailadr() Group by the IntbWhseEmailAdr column
 * @method     ChildInvWhseOrigQuery groupByIntbwhseqcrgabin() Group by the IntbWhseQcRgaBin column
 * @method     ChildInvWhseOrigQuery groupByIntbwhserfprinter1() Group by the IntbWhseRfPrinter1 column
 * @method     ChildInvWhseOrigQuery groupByIntbwhserfprinter2() Group by the IntbWhseRfPrinter2 column
 * @method     ChildInvWhseOrigQuery groupByIntbwhserfprinter3() Group by the IntbWhseRfPrinter3 column
 * @method     ChildInvWhseOrigQuery groupByIntbwhserfprinter4() Group by the IntbWhseRfPrinter4 column
 * @method     ChildInvWhseOrigQuery groupByIntbwhserfprinter5() Group by the IntbWhseRfPrinter5 column
 * @method     ChildInvWhseOrigQuery groupByIntbwhseprofwhse() Group by the IntbWhseProfWhse column
 * @method     ChildInvWhseOrigQuery groupByIntbwhseasetwhse() Group by the IntbWhseAsetWhse column
 * @method     ChildInvWhseOrigQuery groupByIntbwhseconsignwhse() Group by the IntbWhseConsignWhse column
 * @method     ChildInvWhseOrigQuery groupByIntbwhsebinrangelist() Group by the IntbWhseBinRangeList column
 * @method     ChildInvWhseOrigQuery groupByIntbwhsesupplywhse() Group by the IntbWhseSupplyWhse column
 * @method     ChildInvWhseOrigQuery groupByDateupdtd() Group by the DateUpdtd column
 * @method     ChildInvWhseOrigQuery groupByTimeupdtd() Group by the TimeUpdtd column
 * @method     ChildInvWhseOrigQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildInvWhseOrigQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildInvWhseOrigQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildInvWhseOrigQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildInvWhseOrigQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildInvWhseOrigQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildInvWhseOrigQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildInvWhseOrig findOne(ConnectionInterface $con = null) Return the first ChildInvWhseOrig matching the query
 * @method     ChildInvWhseOrig findOneOrCreate(ConnectionInterface $con = null) Return the first ChildInvWhseOrig matching the query, or a new ChildInvWhseOrig object populated from the query conditions when no match is found
 *
 * @method     ChildInvWhseOrig findOneByIntbwhseorig(string $IntbWhseOrig) Return the first ChildInvWhseOrig filtered by the IntbWhseOrig column
 * @method     ChildInvWhseOrig findOneByIntbwhsename(string $IntbWhseName) Return the first ChildInvWhseOrig filtered by the IntbWhseName column
 * @method     ChildInvWhseOrig findOneByIntbwhseadr1(string $IntbWhseAdr1) Return the first ChildInvWhseOrig filtered by the IntbWhseAdr1 column
 * @method     ChildInvWhseOrig findOneByIntbwhseadr2(string $IntbWhseAdr2) Return the first ChildInvWhseOrig filtered by the IntbWhseAdr2 column
 * @method     ChildInvWhseOrig findOneByIntbwhsecity(string $IntbWhseCity) Return the first ChildInvWhseOrig filtered by the IntbWhseCity column
 * @method     ChildInvWhseOrig findOneByIntbwhsestat(string $IntbWhseStat) Return the first ChildInvWhseOrig filtered by the IntbWhseStat column
 * @method     ChildInvWhseOrig findOneByIntbwhsezipcode(string $IntbWhseZipCode) Return the first ChildInvWhseOrig filtered by the IntbWhseZipCode column
 * @method     ChildInvWhseOrig findOneByIntbwhsectry(string $IntbWhseCtry) Return the first ChildInvWhseOrig filtered by the IntbWhseCtry column
 * @method     ChildInvWhseOrig findOneByIntbwhseusehandheld(string $IntbWhseUseHandheld) Return the first ChildInvWhseOrig filtered by the IntbWhseUseHandheld column
 * @method     ChildInvWhseOrig findOneByIntbwhsecashcust(string $IntbWhseCashCust) Return the first ChildInvWhseOrig filtered by the IntbWhseCashCust column
 * @method     ChildInvWhseOrig findOneByIntbwhsepickdtl(string $IntbWhsePickDtl) Return the first ChildInvWhseOrig filtered by the IntbWhsePickDtl column
 * @method     ChildInvWhseOrig findOneByIntbwhseprodbin(string $IntbWhseProdBin) Return the first ChildInvWhseOrig filtered by the IntbWhseProdBin column
 * @method     ChildInvWhseOrig findOneByIntbwhsepharea(int $IntbWhsePhArea) Return the first ChildInvWhseOrig filtered by the IntbWhsePhArea column
 * @method     ChildInvWhseOrig findOneByIntbwhsephfrst3(int $IntbWhsePhFrst3) Return the first ChildInvWhseOrig filtered by the IntbWhsePhFrst3 column
 * @method     ChildInvWhseOrig findOneByIntbwhsephlast4(int $IntbWhsePhLast4) Return the first ChildInvWhseOrig filtered by the IntbWhsePhLast4 column
 * @method     ChildInvWhseOrig findOneByIntbwhsephext(string $IntbWhsePhExt) Return the first ChildInvWhseOrig filtered by the IntbWhsePhExt column
 * @method     ChildInvWhseOrig findOneByIntbwhsefaxarea(int $IntbWhseFaxArea) Return the first ChildInvWhseOrig filtered by the IntbWhseFaxArea column
 * @method     ChildInvWhseOrig findOneByIntbwhsefaxfrst3(int $IntbWhseFaxFrst3) Return the first ChildInvWhseOrig filtered by the IntbWhseFaxFrst3 column
 * @method     ChildInvWhseOrig findOneByIntbwhsefaxlast4(int $IntbWhseFaxLast4) Return the first ChildInvWhseOrig filtered by the IntbWhseFaxLast4 column
 * @method     ChildInvWhseOrig findOneByIntbwhseemailadr(string $IntbWhseEmailAdr) Return the first ChildInvWhseOrig filtered by the IntbWhseEmailAdr column
 * @method     ChildInvWhseOrig findOneByIntbwhseqcrgabin(string $IntbWhseQcRgaBin) Return the first ChildInvWhseOrig filtered by the IntbWhseQcRgaBin column
 * @method     ChildInvWhseOrig findOneByIntbwhserfprinter1(string $IntbWhseRfPrinter1) Return the first ChildInvWhseOrig filtered by the IntbWhseRfPrinter1 column
 * @method     ChildInvWhseOrig findOneByIntbwhserfprinter2(string $IntbWhseRfPrinter2) Return the first ChildInvWhseOrig filtered by the IntbWhseRfPrinter2 column
 * @method     ChildInvWhseOrig findOneByIntbwhserfprinter3(string $IntbWhseRfPrinter3) Return the first ChildInvWhseOrig filtered by the IntbWhseRfPrinter3 column
 * @method     ChildInvWhseOrig findOneByIntbwhserfprinter4(string $IntbWhseRfPrinter4) Return the first ChildInvWhseOrig filtered by the IntbWhseRfPrinter4 column
 * @method     ChildInvWhseOrig findOneByIntbwhserfprinter5(string $IntbWhseRfPrinter5) Return the first ChildInvWhseOrig filtered by the IntbWhseRfPrinter5 column
 * @method     ChildInvWhseOrig findOneByIntbwhseprofwhse(string $IntbWhseProfWhse) Return the first ChildInvWhseOrig filtered by the IntbWhseProfWhse column
 * @method     ChildInvWhseOrig findOneByIntbwhseasetwhse(string $IntbWhseAsetWhse) Return the first ChildInvWhseOrig filtered by the IntbWhseAsetWhse column
 * @method     ChildInvWhseOrig findOneByIntbwhseconsignwhse(string $IntbWhseConsignWhse) Return the first ChildInvWhseOrig filtered by the IntbWhseConsignWhse column
 * @method     ChildInvWhseOrig findOneByIntbwhsebinrangelist(string $IntbWhseBinRangeList) Return the first ChildInvWhseOrig filtered by the IntbWhseBinRangeList column
 * @method     ChildInvWhseOrig findOneByIntbwhsesupplywhse(string $IntbWhseSupplyWhse) Return the first ChildInvWhseOrig filtered by the IntbWhseSupplyWhse column
 * @method     ChildInvWhseOrig findOneByDateupdtd(int $DateUpdtd) Return the first ChildInvWhseOrig filtered by the DateUpdtd column
 * @method     ChildInvWhseOrig findOneByTimeupdtd(int $TimeUpdtd) Return the first ChildInvWhseOrig filtered by the TimeUpdtd column
 * @method     ChildInvWhseOrig findOneByDummy(string $dummy) Return the first ChildInvWhseOrig filtered by the dummy column *

 * @method     ChildInvWhseOrig requirePk($key, ConnectionInterface $con = null) Return the ChildInvWhseOrig by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseOrig requireOne(ConnectionInterface $con = null) Return the first ChildInvWhseOrig matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInvWhseOrig requireOneByIntbwhseorig(string $IntbWhseOrig) Return the first ChildInvWhseOrig filtered by the IntbWhseOrig column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseOrig requireOneByIntbwhsename(string $IntbWhseName) Return the first ChildInvWhseOrig filtered by the IntbWhseName column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseOrig requireOneByIntbwhseadr1(string $IntbWhseAdr1) Return the first ChildInvWhseOrig filtered by the IntbWhseAdr1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseOrig requireOneByIntbwhseadr2(string $IntbWhseAdr2) Return the first ChildInvWhseOrig filtered by the IntbWhseAdr2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseOrig requireOneByIntbwhsecity(string $IntbWhseCity) Return the first ChildInvWhseOrig filtered by the IntbWhseCity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseOrig requireOneByIntbwhsestat(string $IntbWhseStat) Return the first ChildInvWhseOrig filtered by the IntbWhseStat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseOrig requireOneByIntbwhsezipcode(string $IntbWhseZipCode) Return the first ChildInvWhseOrig filtered by the IntbWhseZipCode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseOrig requireOneByIntbwhsectry(string $IntbWhseCtry) Return the first ChildInvWhseOrig filtered by the IntbWhseCtry column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseOrig requireOneByIntbwhseusehandheld(string $IntbWhseUseHandheld) Return the first ChildInvWhseOrig filtered by the IntbWhseUseHandheld column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseOrig requireOneByIntbwhsecashcust(string $IntbWhseCashCust) Return the first ChildInvWhseOrig filtered by the IntbWhseCashCust column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseOrig requireOneByIntbwhsepickdtl(string $IntbWhsePickDtl) Return the first ChildInvWhseOrig filtered by the IntbWhsePickDtl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseOrig requireOneByIntbwhseprodbin(string $IntbWhseProdBin) Return the first ChildInvWhseOrig filtered by the IntbWhseProdBin column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseOrig requireOneByIntbwhsepharea(int $IntbWhsePhArea) Return the first ChildInvWhseOrig filtered by the IntbWhsePhArea column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseOrig requireOneByIntbwhsephfrst3(int $IntbWhsePhFrst3) Return the first ChildInvWhseOrig filtered by the IntbWhsePhFrst3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseOrig requireOneByIntbwhsephlast4(int $IntbWhsePhLast4) Return the first ChildInvWhseOrig filtered by the IntbWhsePhLast4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseOrig requireOneByIntbwhsephext(string $IntbWhsePhExt) Return the first ChildInvWhseOrig filtered by the IntbWhsePhExt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseOrig requireOneByIntbwhsefaxarea(int $IntbWhseFaxArea) Return the first ChildInvWhseOrig filtered by the IntbWhseFaxArea column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseOrig requireOneByIntbwhsefaxfrst3(int $IntbWhseFaxFrst3) Return the first ChildInvWhseOrig filtered by the IntbWhseFaxFrst3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseOrig requireOneByIntbwhsefaxlast4(int $IntbWhseFaxLast4) Return the first ChildInvWhseOrig filtered by the IntbWhseFaxLast4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseOrig requireOneByIntbwhseemailadr(string $IntbWhseEmailAdr) Return the first ChildInvWhseOrig filtered by the IntbWhseEmailAdr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseOrig requireOneByIntbwhseqcrgabin(string $IntbWhseQcRgaBin) Return the first ChildInvWhseOrig filtered by the IntbWhseQcRgaBin column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseOrig requireOneByIntbwhserfprinter1(string $IntbWhseRfPrinter1) Return the first ChildInvWhseOrig filtered by the IntbWhseRfPrinter1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseOrig requireOneByIntbwhserfprinter2(string $IntbWhseRfPrinter2) Return the first ChildInvWhseOrig filtered by the IntbWhseRfPrinter2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseOrig requireOneByIntbwhserfprinter3(string $IntbWhseRfPrinter3) Return the first ChildInvWhseOrig filtered by the IntbWhseRfPrinter3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseOrig requireOneByIntbwhserfprinter4(string $IntbWhseRfPrinter4) Return the first ChildInvWhseOrig filtered by the IntbWhseRfPrinter4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseOrig requireOneByIntbwhserfprinter5(string $IntbWhseRfPrinter5) Return the first ChildInvWhseOrig filtered by the IntbWhseRfPrinter5 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseOrig requireOneByIntbwhseprofwhse(string $IntbWhseProfWhse) Return the first ChildInvWhseOrig filtered by the IntbWhseProfWhse column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseOrig requireOneByIntbwhseasetwhse(string $IntbWhseAsetWhse) Return the first ChildInvWhseOrig filtered by the IntbWhseAsetWhse column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseOrig requireOneByIntbwhseconsignwhse(string $IntbWhseConsignWhse) Return the first ChildInvWhseOrig filtered by the IntbWhseConsignWhse column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseOrig requireOneByIntbwhsebinrangelist(string $IntbWhseBinRangeList) Return the first ChildInvWhseOrig filtered by the IntbWhseBinRangeList column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseOrig requireOneByIntbwhsesupplywhse(string $IntbWhseSupplyWhse) Return the first ChildInvWhseOrig filtered by the IntbWhseSupplyWhse column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseOrig requireOneByDateupdtd(int $DateUpdtd) Return the first ChildInvWhseOrig filtered by the DateUpdtd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseOrig requireOneByTimeupdtd(int $TimeUpdtd) Return the first ChildInvWhseOrig filtered by the TimeUpdtd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseOrig requireOneByDummy(string $dummy) Return the first ChildInvWhseOrig filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInvWhseOrig[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildInvWhseOrig objects based on current ModelCriteria
 * @method     ChildInvWhseOrig[]|ObjectCollection findByIntbwhseorig(string $IntbWhseOrig) Return ChildInvWhseOrig objects filtered by the IntbWhseOrig column
 * @method     ChildInvWhseOrig[]|ObjectCollection findByIntbwhsename(string $IntbWhseName) Return ChildInvWhseOrig objects filtered by the IntbWhseName column
 * @method     ChildInvWhseOrig[]|ObjectCollection findByIntbwhseadr1(string $IntbWhseAdr1) Return ChildInvWhseOrig objects filtered by the IntbWhseAdr1 column
 * @method     ChildInvWhseOrig[]|ObjectCollection findByIntbwhseadr2(string $IntbWhseAdr2) Return ChildInvWhseOrig objects filtered by the IntbWhseAdr2 column
 * @method     ChildInvWhseOrig[]|ObjectCollection findByIntbwhsecity(string $IntbWhseCity) Return ChildInvWhseOrig objects filtered by the IntbWhseCity column
 * @method     ChildInvWhseOrig[]|ObjectCollection findByIntbwhsestat(string $IntbWhseStat) Return ChildInvWhseOrig objects filtered by the IntbWhseStat column
 * @method     ChildInvWhseOrig[]|ObjectCollection findByIntbwhsezipcode(string $IntbWhseZipCode) Return ChildInvWhseOrig objects filtered by the IntbWhseZipCode column
 * @method     ChildInvWhseOrig[]|ObjectCollection findByIntbwhsectry(string $IntbWhseCtry) Return ChildInvWhseOrig objects filtered by the IntbWhseCtry column
 * @method     ChildInvWhseOrig[]|ObjectCollection findByIntbwhseusehandheld(string $IntbWhseUseHandheld) Return ChildInvWhseOrig objects filtered by the IntbWhseUseHandheld column
 * @method     ChildInvWhseOrig[]|ObjectCollection findByIntbwhsecashcust(string $IntbWhseCashCust) Return ChildInvWhseOrig objects filtered by the IntbWhseCashCust column
 * @method     ChildInvWhseOrig[]|ObjectCollection findByIntbwhsepickdtl(string $IntbWhsePickDtl) Return ChildInvWhseOrig objects filtered by the IntbWhsePickDtl column
 * @method     ChildInvWhseOrig[]|ObjectCollection findByIntbwhseprodbin(string $IntbWhseProdBin) Return ChildInvWhseOrig objects filtered by the IntbWhseProdBin column
 * @method     ChildInvWhseOrig[]|ObjectCollection findByIntbwhsepharea(int $IntbWhsePhArea) Return ChildInvWhseOrig objects filtered by the IntbWhsePhArea column
 * @method     ChildInvWhseOrig[]|ObjectCollection findByIntbwhsephfrst3(int $IntbWhsePhFrst3) Return ChildInvWhseOrig objects filtered by the IntbWhsePhFrst3 column
 * @method     ChildInvWhseOrig[]|ObjectCollection findByIntbwhsephlast4(int $IntbWhsePhLast4) Return ChildInvWhseOrig objects filtered by the IntbWhsePhLast4 column
 * @method     ChildInvWhseOrig[]|ObjectCollection findByIntbwhsephext(string $IntbWhsePhExt) Return ChildInvWhseOrig objects filtered by the IntbWhsePhExt column
 * @method     ChildInvWhseOrig[]|ObjectCollection findByIntbwhsefaxarea(int $IntbWhseFaxArea) Return ChildInvWhseOrig objects filtered by the IntbWhseFaxArea column
 * @method     ChildInvWhseOrig[]|ObjectCollection findByIntbwhsefaxfrst3(int $IntbWhseFaxFrst3) Return ChildInvWhseOrig objects filtered by the IntbWhseFaxFrst3 column
 * @method     ChildInvWhseOrig[]|ObjectCollection findByIntbwhsefaxlast4(int $IntbWhseFaxLast4) Return ChildInvWhseOrig objects filtered by the IntbWhseFaxLast4 column
 * @method     ChildInvWhseOrig[]|ObjectCollection findByIntbwhseemailadr(string $IntbWhseEmailAdr) Return ChildInvWhseOrig objects filtered by the IntbWhseEmailAdr column
 * @method     ChildInvWhseOrig[]|ObjectCollection findByIntbwhseqcrgabin(string $IntbWhseQcRgaBin) Return ChildInvWhseOrig objects filtered by the IntbWhseQcRgaBin column
 * @method     ChildInvWhseOrig[]|ObjectCollection findByIntbwhserfprinter1(string $IntbWhseRfPrinter1) Return ChildInvWhseOrig objects filtered by the IntbWhseRfPrinter1 column
 * @method     ChildInvWhseOrig[]|ObjectCollection findByIntbwhserfprinter2(string $IntbWhseRfPrinter2) Return ChildInvWhseOrig objects filtered by the IntbWhseRfPrinter2 column
 * @method     ChildInvWhseOrig[]|ObjectCollection findByIntbwhserfprinter3(string $IntbWhseRfPrinter3) Return ChildInvWhseOrig objects filtered by the IntbWhseRfPrinter3 column
 * @method     ChildInvWhseOrig[]|ObjectCollection findByIntbwhserfprinter4(string $IntbWhseRfPrinter4) Return ChildInvWhseOrig objects filtered by the IntbWhseRfPrinter4 column
 * @method     ChildInvWhseOrig[]|ObjectCollection findByIntbwhserfprinter5(string $IntbWhseRfPrinter5) Return ChildInvWhseOrig objects filtered by the IntbWhseRfPrinter5 column
 * @method     ChildInvWhseOrig[]|ObjectCollection findByIntbwhseprofwhse(string $IntbWhseProfWhse) Return ChildInvWhseOrig objects filtered by the IntbWhseProfWhse column
 * @method     ChildInvWhseOrig[]|ObjectCollection findByIntbwhseasetwhse(string $IntbWhseAsetWhse) Return ChildInvWhseOrig objects filtered by the IntbWhseAsetWhse column
 * @method     ChildInvWhseOrig[]|ObjectCollection findByIntbwhseconsignwhse(string $IntbWhseConsignWhse) Return ChildInvWhseOrig objects filtered by the IntbWhseConsignWhse column
 * @method     ChildInvWhseOrig[]|ObjectCollection findByIntbwhsebinrangelist(string $IntbWhseBinRangeList) Return ChildInvWhseOrig objects filtered by the IntbWhseBinRangeList column
 * @method     ChildInvWhseOrig[]|ObjectCollection findByIntbwhsesupplywhse(string $IntbWhseSupplyWhse) Return ChildInvWhseOrig objects filtered by the IntbWhseSupplyWhse column
 * @method     ChildInvWhseOrig[]|ObjectCollection findByDateupdtd(int $DateUpdtd) Return ChildInvWhseOrig objects filtered by the DateUpdtd column
 * @method     ChildInvWhseOrig[]|ObjectCollection findByTimeupdtd(int $TimeUpdtd) Return ChildInvWhseOrig objects filtered by the TimeUpdtd column
 * @method     ChildInvWhseOrig[]|ObjectCollection findByDummy(string $dummy) Return ChildInvWhseOrig objects filtered by the dummy column
 * @method     ChildInvWhseOrig[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class InvWhseOrigQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\InvWhseOrigQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\InvWhseOrig', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildInvWhseOrigQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildInvWhseOrigQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildInvWhseOrigQuery) {
            return $criteria;
        }
        $query = new ChildInvWhseOrigQuery();
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
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildInvWhseOrig|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(InvWhseOrigTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = InvWhseOrigTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildInvWhseOrig A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT IntbWhseOrig, IntbWhseName, IntbWhseAdr1, IntbWhseAdr2, IntbWhseCity, IntbWhseStat, IntbWhseZipCode, IntbWhseCtry, IntbWhseUseHandheld, IntbWhseCashCust, IntbWhsePickDtl, IntbWhseProdBin, IntbWhsePhArea, IntbWhsePhFrst3, IntbWhsePhLast4, IntbWhsePhExt, IntbWhseFaxArea, IntbWhseFaxFrst3, IntbWhseFaxLast4, IntbWhseEmailAdr, IntbWhseQcRgaBin, IntbWhseRfPrinter1, IntbWhseRfPrinter2, IntbWhseRfPrinter3, IntbWhseRfPrinter4, IntbWhseRfPrinter5, IntbWhseProfWhse, IntbWhseAsetWhse, IntbWhseConsignWhse, IntbWhseBinRangeList, IntbWhseSupplyWhse, DateUpdtd, TimeUpdtd, dummy FROM inv_whse_orig WHERE IntbWhseOrig = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildInvWhseOrig $obj */
            $obj = new ChildInvWhseOrig();
            $obj->hydrate($row);
            InvWhseOrigTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildInvWhseOrig|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(12, 56, 832), $con);
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
     * @return $this|ChildInvWhseOrigQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSEORIG, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildInvWhseOrigQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSEORIG, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the IntbWhseOrig column
     *
     * Example usage:
     * <code>
     * $query->filterByIntbwhseorig('fooValue');   // WHERE IntbWhseOrig = 'fooValue'
     * $query->filterByIntbwhseorig('%fooValue%', Criteria::LIKE); // WHERE IntbWhseOrig LIKE '%fooValue%'
     * </code>
     *
     * @param     string $intbwhseorig The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvWhseOrigQuery The current query, for fluid interface
     */
    public function filterByIntbwhseorig($intbwhseorig = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhseorig)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSEORIG, $intbwhseorig, $comparison);
    }

    /**
     * Filter the query on the IntbWhseName column
     *
     * Example usage:
     * <code>
     * $query->filterByIntbwhsename('fooValue');   // WHERE IntbWhseName = 'fooValue'
     * $query->filterByIntbwhsename('%fooValue%', Criteria::LIKE); // WHERE IntbWhseName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $intbwhsename The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvWhseOrigQuery The current query, for fluid interface
     */
    public function filterByIntbwhsename($intbwhsename = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhsename)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSENAME, $intbwhsename, $comparison);
    }

    /**
     * Filter the query on the IntbWhseAdr1 column
     *
     * Example usage:
     * <code>
     * $query->filterByIntbwhseadr1('fooValue');   // WHERE IntbWhseAdr1 = 'fooValue'
     * $query->filterByIntbwhseadr1('%fooValue%', Criteria::LIKE); // WHERE IntbWhseAdr1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $intbwhseadr1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvWhseOrigQuery The current query, for fluid interface
     */
    public function filterByIntbwhseadr1($intbwhseadr1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhseadr1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSEADR1, $intbwhseadr1, $comparison);
    }

    /**
     * Filter the query on the IntbWhseAdr2 column
     *
     * Example usage:
     * <code>
     * $query->filterByIntbwhseadr2('fooValue');   // WHERE IntbWhseAdr2 = 'fooValue'
     * $query->filterByIntbwhseadr2('%fooValue%', Criteria::LIKE); // WHERE IntbWhseAdr2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $intbwhseadr2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvWhseOrigQuery The current query, for fluid interface
     */
    public function filterByIntbwhseadr2($intbwhseadr2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhseadr2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSEADR2, $intbwhseadr2, $comparison);
    }

    /**
     * Filter the query on the IntbWhseCity column
     *
     * Example usage:
     * <code>
     * $query->filterByIntbwhsecity('fooValue');   // WHERE IntbWhseCity = 'fooValue'
     * $query->filterByIntbwhsecity('%fooValue%', Criteria::LIKE); // WHERE IntbWhseCity LIKE '%fooValue%'
     * </code>
     *
     * @param     string $intbwhsecity The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvWhseOrigQuery The current query, for fluid interface
     */
    public function filterByIntbwhsecity($intbwhsecity = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhsecity)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSECITY, $intbwhsecity, $comparison);
    }

    /**
     * Filter the query on the IntbWhseStat column
     *
     * Example usage:
     * <code>
     * $query->filterByIntbwhsestat('fooValue');   // WHERE IntbWhseStat = 'fooValue'
     * $query->filterByIntbwhsestat('%fooValue%', Criteria::LIKE); // WHERE IntbWhseStat LIKE '%fooValue%'
     * </code>
     *
     * @param     string $intbwhsestat The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvWhseOrigQuery The current query, for fluid interface
     */
    public function filterByIntbwhsestat($intbwhsestat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhsestat)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSESTAT, $intbwhsestat, $comparison);
    }

    /**
     * Filter the query on the IntbWhseZipCode column
     *
     * Example usage:
     * <code>
     * $query->filterByIntbwhsezipcode('fooValue');   // WHERE IntbWhseZipCode = 'fooValue'
     * $query->filterByIntbwhsezipcode('%fooValue%', Criteria::LIKE); // WHERE IntbWhseZipCode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $intbwhsezipcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvWhseOrigQuery The current query, for fluid interface
     */
    public function filterByIntbwhsezipcode($intbwhsezipcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhsezipcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSEZIPCODE, $intbwhsezipcode, $comparison);
    }

    /**
     * Filter the query on the IntbWhseCtry column
     *
     * Example usage:
     * <code>
     * $query->filterByIntbwhsectry('fooValue');   // WHERE IntbWhseCtry = 'fooValue'
     * $query->filterByIntbwhsectry('%fooValue%', Criteria::LIKE); // WHERE IntbWhseCtry LIKE '%fooValue%'
     * </code>
     *
     * @param     string $intbwhsectry The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvWhseOrigQuery The current query, for fluid interface
     */
    public function filterByIntbwhsectry($intbwhsectry = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhsectry)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSECTRY, $intbwhsectry, $comparison);
    }

    /**
     * Filter the query on the IntbWhseUseHandheld column
     *
     * Example usage:
     * <code>
     * $query->filterByIntbwhseusehandheld('fooValue');   // WHERE IntbWhseUseHandheld = 'fooValue'
     * $query->filterByIntbwhseusehandheld('%fooValue%', Criteria::LIKE); // WHERE IntbWhseUseHandheld LIKE '%fooValue%'
     * </code>
     *
     * @param     string $intbwhseusehandheld The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvWhseOrigQuery The current query, for fluid interface
     */
    public function filterByIntbwhseusehandheld($intbwhseusehandheld = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhseusehandheld)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSEUSEHANDHELD, $intbwhseusehandheld, $comparison);
    }

    /**
     * Filter the query on the IntbWhseCashCust column
     *
     * Example usage:
     * <code>
     * $query->filterByIntbwhsecashcust('fooValue');   // WHERE IntbWhseCashCust = 'fooValue'
     * $query->filterByIntbwhsecashcust('%fooValue%', Criteria::LIKE); // WHERE IntbWhseCashCust LIKE '%fooValue%'
     * </code>
     *
     * @param     string $intbwhsecashcust The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvWhseOrigQuery The current query, for fluid interface
     */
    public function filterByIntbwhsecashcust($intbwhsecashcust = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhsecashcust)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSECASHCUST, $intbwhsecashcust, $comparison);
    }

    /**
     * Filter the query on the IntbWhsePickDtl column
     *
     * Example usage:
     * <code>
     * $query->filterByIntbwhsepickdtl('fooValue');   // WHERE IntbWhsePickDtl = 'fooValue'
     * $query->filterByIntbwhsepickdtl('%fooValue%', Criteria::LIKE); // WHERE IntbWhsePickDtl LIKE '%fooValue%'
     * </code>
     *
     * @param     string $intbwhsepickdtl The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvWhseOrigQuery The current query, for fluid interface
     */
    public function filterByIntbwhsepickdtl($intbwhsepickdtl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhsepickdtl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSEPICKDTL, $intbwhsepickdtl, $comparison);
    }

    /**
     * Filter the query on the IntbWhseProdBin column
     *
     * Example usage:
     * <code>
     * $query->filterByIntbwhseprodbin('fooValue');   // WHERE IntbWhseProdBin = 'fooValue'
     * $query->filterByIntbwhseprodbin('%fooValue%', Criteria::LIKE); // WHERE IntbWhseProdBin LIKE '%fooValue%'
     * </code>
     *
     * @param     string $intbwhseprodbin The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvWhseOrigQuery The current query, for fluid interface
     */
    public function filterByIntbwhseprodbin($intbwhseprodbin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhseprodbin)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSEPRODBIN, $intbwhseprodbin, $comparison);
    }

    /**
     * Filter the query on the IntbWhsePhArea column
     *
     * Example usage:
     * <code>
     * $query->filterByIntbwhsepharea(1234); // WHERE IntbWhsePhArea = 1234
     * $query->filterByIntbwhsepharea(array(12, 34)); // WHERE IntbWhsePhArea IN (12, 34)
     * $query->filterByIntbwhsepharea(array('min' => 12)); // WHERE IntbWhsePhArea > 12
     * </code>
     *
     * @param     mixed $intbwhsepharea The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvWhseOrigQuery The current query, for fluid interface
     */
    public function filterByIntbwhsepharea($intbwhsepharea = null, $comparison = null)
    {
        if (is_array($intbwhsepharea)) {
            $useMinMax = false;
            if (isset($intbwhsepharea['min'])) {
                $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSEPHAREA, $intbwhsepharea['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($intbwhsepharea['max'])) {
                $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSEPHAREA, $intbwhsepharea['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSEPHAREA, $intbwhsepharea, $comparison);
    }

    /**
     * Filter the query on the IntbWhsePhFrst3 column
     *
     * Example usage:
     * <code>
     * $query->filterByIntbwhsephfrst3(1234); // WHERE IntbWhsePhFrst3 = 1234
     * $query->filterByIntbwhsephfrst3(array(12, 34)); // WHERE IntbWhsePhFrst3 IN (12, 34)
     * $query->filterByIntbwhsephfrst3(array('min' => 12)); // WHERE IntbWhsePhFrst3 > 12
     * </code>
     *
     * @param     mixed $intbwhsephfrst3 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvWhseOrigQuery The current query, for fluid interface
     */
    public function filterByIntbwhsephfrst3($intbwhsephfrst3 = null, $comparison = null)
    {
        if (is_array($intbwhsephfrst3)) {
            $useMinMax = false;
            if (isset($intbwhsephfrst3['min'])) {
                $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSEPHFRST3, $intbwhsephfrst3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($intbwhsephfrst3['max'])) {
                $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSEPHFRST3, $intbwhsephfrst3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSEPHFRST3, $intbwhsephfrst3, $comparison);
    }

    /**
     * Filter the query on the IntbWhsePhLast4 column
     *
     * Example usage:
     * <code>
     * $query->filterByIntbwhsephlast4(1234); // WHERE IntbWhsePhLast4 = 1234
     * $query->filterByIntbwhsephlast4(array(12, 34)); // WHERE IntbWhsePhLast4 IN (12, 34)
     * $query->filterByIntbwhsephlast4(array('min' => 12)); // WHERE IntbWhsePhLast4 > 12
     * </code>
     *
     * @param     mixed $intbwhsephlast4 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvWhseOrigQuery The current query, for fluid interface
     */
    public function filterByIntbwhsephlast4($intbwhsephlast4 = null, $comparison = null)
    {
        if (is_array($intbwhsephlast4)) {
            $useMinMax = false;
            if (isset($intbwhsephlast4['min'])) {
                $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSEPHLAST4, $intbwhsephlast4['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($intbwhsephlast4['max'])) {
                $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSEPHLAST4, $intbwhsephlast4['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSEPHLAST4, $intbwhsephlast4, $comparison);
    }

    /**
     * Filter the query on the IntbWhsePhExt column
     *
     * Example usage:
     * <code>
     * $query->filterByIntbwhsephext('fooValue');   // WHERE IntbWhsePhExt = 'fooValue'
     * $query->filterByIntbwhsephext('%fooValue%', Criteria::LIKE); // WHERE IntbWhsePhExt LIKE '%fooValue%'
     * </code>
     *
     * @param     string $intbwhsephext The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvWhseOrigQuery The current query, for fluid interface
     */
    public function filterByIntbwhsephext($intbwhsephext = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhsephext)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSEPHEXT, $intbwhsephext, $comparison);
    }

    /**
     * Filter the query on the IntbWhseFaxArea column
     *
     * Example usage:
     * <code>
     * $query->filterByIntbwhsefaxarea(1234); // WHERE IntbWhseFaxArea = 1234
     * $query->filterByIntbwhsefaxarea(array(12, 34)); // WHERE IntbWhseFaxArea IN (12, 34)
     * $query->filterByIntbwhsefaxarea(array('min' => 12)); // WHERE IntbWhseFaxArea > 12
     * </code>
     *
     * @param     mixed $intbwhsefaxarea The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvWhseOrigQuery The current query, for fluid interface
     */
    public function filterByIntbwhsefaxarea($intbwhsefaxarea = null, $comparison = null)
    {
        if (is_array($intbwhsefaxarea)) {
            $useMinMax = false;
            if (isset($intbwhsefaxarea['min'])) {
                $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSEFAXAREA, $intbwhsefaxarea['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($intbwhsefaxarea['max'])) {
                $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSEFAXAREA, $intbwhsefaxarea['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSEFAXAREA, $intbwhsefaxarea, $comparison);
    }

    /**
     * Filter the query on the IntbWhseFaxFrst3 column
     *
     * Example usage:
     * <code>
     * $query->filterByIntbwhsefaxfrst3(1234); // WHERE IntbWhseFaxFrst3 = 1234
     * $query->filterByIntbwhsefaxfrst3(array(12, 34)); // WHERE IntbWhseFaxFrst3 IN (12, 34)
     * $query->filterByIntbwhsefaxfrst3(array('min' => 12)); // WHERE IntbWhseFaxFrst3 > 12
     * </code>
     *
     * @param     mixed $intbwhsefaxfrst3 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvWhseOrigQuery The current query, for fluid interface
     */
    public function filterByIntbwhsefaxfrst3($intbwhsefaxfrst3 = null, $comparison = null)
    {
        if (is_array($intbwhsefaxfrst3)) {
            $useMinMax = false;
            if (isset($intbwhsefaxfrst3['min'])) {
                $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSEFAXFRST3, $intbwhsefaxfrst3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($intbwhsefaxfrst3['max'])) {
                $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSEFAXFRST3, $intbwhsefaxfrst3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSEFAXFRST3, $intbwhsefaxfrst3, $comparison);
    }

    /**
     * Filter the query on the IntbWhseFaxLast4 column
     *
     * Example usage:
     * <code>
     * $query->filterByIntbwhsefaxlast4(1234); // WHERE IntbWhseFaxLast4 = 1234
     * $query->filterByIntbwhsefaxlast4(array(12, 34)); // WHERE IntbWhseFaxLast4 IN (12, 34)
     * $query->filterByIntbwhsefaxlast4(array('min' => 12)); // WHERE IntbWhseFaxLast4 > 12
     * </code>
     *
     * @param     mixed $intbwhsefaxlast4 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvWhseOrigQuery The current query, for fluid interface
     */
    public function filterByIntbwhsefaxlast4($intbwhsefaxlast4 = null, $comparison = null)
    {
        if (is_array($intbwhsefaxlast4)) {
            $useMinMax = false;
            if (isset($intbwhsefaxlast4['min'])) {
                $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSEFAXLAST4, $intbwhsefaxlast4['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($intbwhsefaxlast4['max'])) {
                $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSEFAXLAST4, $intbwhsefaxlast4['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSEFAXLAST4, $intbwhsefaxlast4, $comparison);
    }

    /**
     * Filter the query on the IntbWhseEmailAdr column
     *
     * Example usage:
     * <code>
     * $query->filterByIntbwhseemailadr('fooValue');   // WHERE IntbWhseEmailAdr = 'fooValue'
     * $query->filterByIntbwhseemailadr('%fooValue%', Criteria::LIKE); // WHERE IntbWhseEmailAdr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $intbwhseemailadr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvWhseOrigQuery The current query, for fluid interface
     */
    public function filterByIntbwhseemailadr($intbwhseemailadr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhseemailadr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSEEMAILADR, $intbwhseemailadr, $comparison);
    }

    /**
     * Filter the query on the IntbWhseQcRgaBin column
     *
     * Example usage:
     * <code>
     * $query->filterByIntbwhseqcrgabin('fooValue');   // WHERE IntbWhseQcRgaBin = 'fooValue'
     * $query->filterByIntbwhseqcrgabin('%fooValue%', Criteria::LIKE); // WHERE IntbWhseQcRgaBin LIKE '%fooValue%'
     * </code>
     *
     * @param     string $intbwhseqcrgabin The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvWhseOrigQuery The current query, for fluid interface
     */
    public function filterByIntbwhseqcrgabin($intbwhseqcrgabin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhseqcrgabin)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSEQCRGABIN, $intbwhseqcrgabin, $comparison);
    }

    /**
     * Filter the query on the IntbWhseRfPrinter1 column
     *
     * Example usage:
     * <code>
     * $query->filterByIntbwhserfprinter1('fooValue');   // WHERE IntbWhseRfPrinter1 = 'fooValue'
     * $query->filterByIntbwhserfprinter1('%fooValue%', Criteria::LIKE); // WHERE IntbWhseRfPrinter1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $intbwhserfprinter1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvWhseOrigQuery The current query, for fluid interface
     */
    public function filterByIntbwhserfprinter1($intbwhserfprinter1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhserfprinter1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSERFPRINTER1, $intbwhserfprinter1, $comparison);
    }

    /**
     * Filter the query on the IntbWhseRfPrinter2 column
     *
     * Example usage:
     * <code>
     * $query->filterByIntbwhserfprinter2('fooValue');   // WHERE IntbWhseRfPrinter2 = 'fooValue'
     * $query->filterByIntbwhserfprinter2('%fooValue%', Criteria::LIKE); // WHERE IntbWhseRfPrinter2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $intbwhserfprinter2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvWhseOrigQuery The current query, for fluid interface
     */
    public function filterByIntbwhserfprinter2($intbwhserfprinter2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhserfprinter2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSERFPRINTER2, $intbwhserfprinter2, $comparison);
    }

    /**
     * Filter the query on the IntbWhseRfPrinter3 column
     *
     * Example usage:
     * <code>
     * $query->filterByIntbwhserfprinter3('fooValue');   // WHERE IntbWhseRfPrinter3 = 'fooValue'
     * $query->filterByIntbwhserfprinter3('%fooValue%', Criteria::LIKE); // WHERE IntbWhseRfPrinter3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $intbwhserfprinter3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvWhseOrigQuery The current query, for fluid interface
     */
    public function filterByIntbwhserfprinter3($intbwhserfprinter3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhserfprinter3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSERFPRINTER3, $intbwhserfprinter3, $comparison);
    }

    /**
     * Filter the query on the IntbWhseRfPrinter4 column
     *
     * Example usage:
     * <code>
     * $query->filterByIntbwhserfprinter4('fooValue');   // WHERE IntbWhseRfPrinter4 = 'fooValue'
     * $query->filterByIntbwhserfprinter4('%fooValue%', Criteria::LIKE); // WHERE IntbWhseRfPrinter4 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $intbwhserfprinter4 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvWhseOrigQuery The current query, for fluid interface
     */
    public function filterByIntbwhserfprinter4($intbwhserfprinter4 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhserfprinter4)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSERFPRINTER4, $intbwhserfprinter4, $comparison);
    }

    /**
     * Filter the query on the IntbWhseRfPrinter5 column
     *
     * Example usage:
     * <code>
     * $query->filterByIntbwhserfprinter5('fooValue');   // WHERE IntbWhseRfPrinter5 = 'fooValue'
     * $query->filterByIntbwhserfprinter5('%fooValue%', Criteria::LIKE); // WHERE IntbWhseRfPrinter5 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $intbwhserfprinter5 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvWhseOrigQuery The current query, for fluid interface
     */
    public function filterByIntbwhserfprinter5($intbwhserfprinter5 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhserfprinter5)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSERFPRINTER5, $intbwhserfprinter5, $comparison);
    }

    /**
     * Filter the query on the IntbWhseProfWhse column
     *
     * Example usage:
     * <code>
     * $query->filterByIntbwhseprofwhse('fooValue');   // WHERE IntbWhseProfWhse = 'fooValue'
     * $query->filterByIntbwhseprofwhse('%fooValue%', Criteria::LIKE); // WHERE IntbWhseProfWhse LIKE '%fooValue%'
     * </code>
     *
     * @param     string $intbwhseprofwhse The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvWhseOrigQuery The current query, for fluid interface
     */
    public function filterByIntbwhseprofwhse($intbwhseprofwhse = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhseprofwhse)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSEPROFWHSE, $intbwhseprofwhse, $comparison);
    }

    /**
     * Filter the query on the IntbWhseAsetWhse column
     *
     * Example usage:
     * <code>
     * $query->filterByIntbwhseasetwhse('fooValue');   // WHERE IntbWhseAsetWhse = 'fooValue'
     * $query->filterByIntbwhseasetwhse('%fooValue%', Criteria::LIKE); // WHERE IntbWhseAsetWhse LIKE '%fooValue%'
     * </code>
     *
     * @param     string $intbwhseasetwhse The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvWhseOrigQuery The current query, for fluid interface
     */
    public function filterByIntbwhseasetwhse($intbwhseasetwhse = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhseasetwhse)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSEASETWHSE, $intbwhseasetwhse, $comparison);
    }

    /**
     * Filter the query on the IntbWhseConsignWhse column
     *
     * Example usage:
     * <code>
     * $query->filterByIntbwhseconsignwhse('fooValue');   // WHERE IntbWhseConsignWhse = 'fooValue'
     * $query->filterByIntbwhseconsignwhse('%fooValue%', Criteria::LIKE); // WHERE IntbWhseConsignWhse LIKE '%fooValue%'
     * </code>
     *
     * @param     string $intbwhseconsignwhse The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvWhseOrigQuery The current query, for fluid interface
     */
    public function filterByIntbwhseconsignwhse($intbwhseconsignwhse = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhseconsignwhse)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSECONSIGNWHSE, $intbwhseconsignwhse, $comparison);
    }

    /**
     * Filter the query on the IntbWhseBinRangeList column
     *
     * Example usage:
     * <code>
     * $query->filterByIntbwhsebinrangelist('fooValue');   // WHERE IntbWhseBinRangeList = 'fooValue'
     * $query->filterByIntbwhsebinrangelist('%fooValue%', Criteria::LIKE); // WHERE IntbWhseBinRangeList LIKE '%fooValue%'
     * </code>
     *
     * @param     string $intbwhsebinrangelist The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvWhseOrigQuery The current query, for fluid interface
     */
    public function filterByIntbwhsebinrangelist($intbwhsebinrangelist = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhsebinrangelist)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSEBINRANGELIST, $intbwhsebinrangelist, $comparison);
    }

    /**
     * Filter the query on the IntbWhseSupplyWhse column
     *
     * Example usage:
     * <code>
     * $query->filterByIntbwhsesupplywhse('fooValue');   // WHERE IntbWhseSupplyWhse = 'fooValue'
     * $query->filterByIntbwhsesupplywhse('%fooValue%', Criteria::LIKE); // WHERE IntbWhseSupplyWhse LIKE '%fooValue%'
     * </code>
     *
     * @param     string $intbwhsesupplywhse The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvWhseOrigQuery The current query, for fluid interface
     */
    public function filterByIntbwhsesupplywhse($intbwhsesupplywhse = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhsesupplywhse)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSESUPPLYWHSE, $intbwhsesupplywhse, $comparison);
    }

    /**
     * Filter the query on the DateUpdtd column
     *
     * Example usage:
     * <code>
     * $query->filterByDateupdtd(1234); // WHERE DateUpdtd = 1234
     * $query->filterByDateupdtd(array(12, 34)); // WHERE DateUpdtd IN (12, 34)
     * $query->filterByDateupdtd(array('min' => 12)); // WHERE DateUpdtd > 12
     * </code>
     *
     * @param     mixed $dateupdtd The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvWhseOrigQuery The current query, for fluid interface
     */
    public function filterByDateupdtd($dateupdtd = null, $comparison = null)
    {
        if (is_array($dateupdtd)) {
            $useMinMax = false;
            if (isset($dateupdtd['min'])) {
                $this->addUsingAlias(InvWhseOrigTableMap::COL_DATEUPDTD, $dateupdtd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateupdtd['max'])) {
                $this->addUsingAlias(InvWhseOrigTableMap::COL_DATEUPDTD, $dateupdtd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseOrigTableMap::COL_DATEUPDTD, $dateupdtd, $comparison);
    }

    /**
     * Filter the query on the TimeUpdtd column
     *
     * Example usage:
     * <code>
     * $query->filterByTimeupdtd(1234); // WHERE TimeUpdtd = 1234
     * $query->filterByTimeupdtd(array(12, 34)); // WHERE TimeUpdtd IN (12, 34)
     * $query->filterByTimeupdtd(array('min' => 12)); // WHERE TimeUpdtd > 12
     * </code>
     *
     * @param     mixed $timeupdtd The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvWhseOrigQuery The current query, for fluid interface
     */
    public function filterByTimeupdtd($timeupdtd = null, $comparison = null)
    {
        if (is_array($timeupdtd)) {
            $useMinMax = false;
            if (isset($timeupdtd['min'])) {
                $this->addUsingAlias(InvWhseOrigTableMap::COL_TIMEUPDTD, $timeupdtd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timeupdtd['max'])) {
                $this->addUsingAlias(InvWhseOrigTableMap::COL_TIMEUPDTD, $timeupdtd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseOrigTableMap::COL_TIMEUPDTD, $timeupdtd, $comparison);
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
     * @return $this|ChildInvWhseOrigQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseOrigTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildInvWhseOrig $invWhseOrig Object to remove from the list of results
     *
     * @return $this|ChildInvWhseOrigQuery The current query, for fluid interface
     */
    public function prune($invWhseOrig = null)
    {
        if ($invWhseOrig) {
            $this->addUsingAlias(InvWhseOrigTableMap::COL_INTBWHSEORIG, $invWhseOrig->getIntbwhseorig(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the inv_whse_orig table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InvWhseOrigTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            InvWhseOrigTableMap::clearInstancePool();
            InvWhseOrigTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(InvWhseOrigTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(InvWhseOrigTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            InvWhseOrigTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            InvWhseOrigTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // InvWhseOrigQuery
