<?php

namespace Base;

use \InvWhseFrom as ChildInvWhseFrom;
use \InvWhseFromQuery as ChildInvWhseFromQuery;
use \Exception;
use \PDO;
use Map\InvWhseFromTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'inv_whse_from' table.
 *
 *
 *
 * @method     ChildInvWhseFromQuery orderByIntbwhsefrom($order = Criteria::ASC) Order by the IntbWhseFrom column
 * @method     ChildInvWhseFromQuery orderByIntbwhsename($order = Criteria::ASC) Order by the IntbWhseName column
 * @method     ChildInvWhseFromQuery orderByIntbwhseadr1($order = Criteria::ASC) Order by the IntbWhseAdr1 column
 * @method     ChildInvWhseFromQuery orderByIntbwhseadr2($order = Criteria::ASC) Order by the IntbWhseAdr2 column
 * @method     ChildInvWhseFromQuery orderByIntbwhsecity($order = Criteria::ASC) Order by the IntbWhseCity column
 * @method     ChildInvWhseFromQuery orderByIntbwhsestat($order = Criteria::ASC) Order by the IntbWhseStat column
 * @method     ChildInvWhseFromQuery orderByIntbwhsezipcode($order = Criteria::ASC) Order by the IntbWhseZipCode column
 * @method     ChildInvWhseFromQuery orderByIntbwhsectry($order = Criteria::ASC) Order by the IntbWhseCtry column
 * @method     ChildInvWhseFromQuery orderByIntbwhseusehandheld($order = Criteria::ASC) Order by the IntbWhseUseHandheld column
 * @method     ChildInvWhseFromQuery orderByIntbwhsecashcust($order = Criteria::ASC) Order by the IntbWhseCashCust column
 * @method     ChildInvWhseFromQuery orderByIntbwhsepickdtl($order = Criteria::ASC) Order by the IntbWhsePickDtl column
 * @method     ChildInvWhseFromQuery orderByIntbwhseprodbin($order = Criteria::ASC) Order by the IntbWhseProdBin column
 * @method     ChildInvWhseFromQuery orderByIntbwhsepharea($order = Criteria::ASC) Order by the IntbWhsePhArea column
 * @method     ChildInvWhseFromQuery orderByIntbwhsephfrst3($order = Criteria::ASC) Order by the IntbWhsePhFrst3 column
 * @method     ChildInvWhseFromQuery orderByIntbwhsephlast4($order = Criteria::ASC) Order by the IntbWhsePhLast4 column
 * @method     ChildInvWhseFromQuery orderByIntbwhsephext($order = Criteria::ASC) Order by the IntbWhsePhExt column
 * @method     ChildInvWhseFromQuery orderByIntbwhsefaxarea($order = Criteria::ASC) Order by the IntbWhseFaxArea column
 * @method     ChildInvWhseFromQuery orderByIntbwhsefaxfrst3($order = Criteria::ASC) Order by the IntbWhseFaxFrst3 column
 * @method     ChildInvWhseFromQuery orderByIntbwhsefaxlast4($order = Criteria::ASC) Order by the IntbWhseFaxLast4 column
 * @method     ChildInvWhseFromQuery orderByIntbwhseemailadr($order = Criteria::ASC) Order by the IntbWhseEmailAdr column
 * @method     ChildInvWhseFromQuery orderByIntbwhseqcrgabin($order = Criteria::ASC) Order by the IntbWhseQcRgaBin column
 * @method     ChildInvWhseFromQuery orderByIntbwhserfprinter1($order = Criteria::ASC) Order by the IntbWhseRfPrinter1 column
 * @method     ChildInvWhseFromQuery orderByIntbwhserfprinter2($order = Criteria::ASC) Order by the IntbWhseRfPrinter2 column
 * @method     ChildInvWhseFromQuery orderByIntbwhserfprinter3($order = Criteria::ASC) Order by the IntbWhseRfPrinter3 column
 * @method     ChildInvWhseFromQuery orderByIntbwhserfprinter4($order = Criteria::ASC) Order by the IntbWhseRfPrinter4 column
 * @method     ChildInvWhseFromQuery orderByIntbwhserfprinter5($order = Criteria::ASC) Order by the IntbWhseRfPrinter5 column
 * @method     ChildInvWhseFromQuery orderByIntbwhseprofwhse($order = Criteria::ASC) Order by the IntbWhseProfWhse column
 * @method     ChildInvWhseFromQuery orderByIntbwhseasetwhse($order = Criteria::ASC) Order by the IntbWhseAsetWhse column
 * @method     ChildInvWhseFromQuery orderByIntbwhseconsignwhse($order = Criteria::ASC) Order by the IntbWhseConsignWhse column
 * @method     ChildInvWhseFromQuery orderByIntbwhsebinrangelist($order = Criteria::ASC) Order by the IntbWhseBinRangeList column
 * @method     ChildInvWhseFromQuery orderByIntbwhsesupplywhse($order = Criteria::ASC) Order by the IntbWhseSupplyWhse column
 * @method     ChildInvWhseFromQuery orderByDateupdtd($order = Criteria::ASC) Order by the DateUpdtd column
 * @method     ChildInvWhseFromQuery orderByTimeupdtd($order = Criteria::ASC) Order by the TimeUpdtd column
 * @method     ChildInvWhseFromQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildInvWhseFromQuery groupByIntbwhsefrom() Group by the IntbWhseFrom column
 * @method     ChildInvWhseFromQuery groupByIntbwhsename() Group by the IntbWhseName column
 * @method     ChildInvWhseFromQuery groupByIntbwhseadr1() Group by the IntbWhseAdr1 column
 * @method     ChildInvWhseFromQuery groupByIntbwhseadr2() Group by the IntbWhseAdr2 column
 * @method     ChildInvWhseFromQuery groupByIntbwhsecity() Group by the IntbWhseCity column
 * @method     ChildInvWhseFromQuery groupByIntbwhsestat() Group by the IntbWhseStat column
 * @method     ChildInvWhseFromQuery groupByIntbwhsezipcode() Group by the IntbWhseZipCode column
 * @method     ChildInvWhseFromQuery groupByIntbwhsectry() Group by the IntbWhseCtry column
 * @method     ChildInvWhseFromQuery groupByIntbwhseusehandheld() Group by the IntbWhseUseHandheld column
 * @method     ChildInvWhseFromQuery groupByIntbwhsecashcust() Group by the IntbWhseCashCust column
 * @method     ChildInvWhseFromQuery groupByIntbwhsepickdtl() Group by the IntbWhsePickDtl column
 * @method     ChildInvWhseFromQuery groupByIntbwhseprodbin() Group by the IntbWhseProdBin column
 * @method     ChildInvWhseFromQuery groupByIntbwhsepharea() Group by the IntbWhsePhArea column
 * @method     ChildInvWhseFromQuery groupByIntbwhsephfrst3() Group by the IntbWhsePhFrst3 column
 * @method     ChildInvWhseFromQuery groupByIntbwhsephlast4() Group by the IntbWhsePhLast4 column
 * @method     ChildInvWhseFromQuery groupByIntbwhsephext() Group by the IntbWhsePhExt column
 * @method     ChildInvWhseFromQuery groupByIntbwhsefaxarea() Group by the IntbWhseFaxArea column
 * @method     ChildInvWhseFromQuery groupByIntbwhsefaxfrst3() Group by the IntbWhseFaxFrst3 column
 * @method     ChildInvWhseFromQuery groupByIntbwhsefaxlast4() Group by the IntbWhseFaxLast4 column
 * @method     ChildInvWhseFromQuery groupByIntbwhseemailadr() Group by the IntbWhseEmailAdr column
 * @method     ChildInvWhseFromQuery groupByIntbwhseqcrgabin() Group by the IntbWhseQcRgaBin column
 * @method     ChildInvWhseFromQuery groupByIntbwhserfprinter1() Group by the IntbWhseRfPrinter1 column
 * @method     ChildInvWhseFromQuery groupByIntbwhserfprinter2() Group by the IntbWhseRfPrinter2 column
 * @method     ChildInvWhseFromQuery groupByIntbwhserfprinter3() Group by the IntbWhseRfPrinter3 column
 * @method     ChildInvWhseFromQuery groupByIntbwhserfprinter4() Group by the IntbWhseRfPrinter4 column
 * @method     ChildInvWhseFromQuery groupByIntbwhserfprinter5() Group by the IntbWhseRfPrinter5 column
 * @method     ChildInvWhseFromQuery groupByIntbwhseprofwhse() Group by the IntbWhseProfWhse column
 * @method     ChildInvWhseFromQuery groupByIntbwhseasetwhse() Group by the IntbWhseAsetWhse column
 * @method     ChildInvWhseFromQuery groupByIntbwhseconsignwhse() Group by the IntbWhseConsignWhse column
 * @method     ChildInvWhseFromQuery groupByIntbwhsebinrangelist() Group by the IntbWhseBinRangeList column
 * @method     ChildInvWhseFromQuery groupByIntbwhsesupplywhse() Group by the IntbWhseSupplyWhse column
 * @method     ChildInvWhseFromQuery groupByDateupdtd() Group by the DateUpdtd column
 * @method     ChildInvWhseFromQuery groupByTimeupdtd() Group by the TimeUpdtd column
 * @method     ChildInvWhseFromQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildInvWhseFromQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildInvWhseFromQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildInvWhseFromQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildInvWhseFromQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildInvWhseFromQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildInvWhseFromQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildInvWhseFrom findOne(ConnectionInterface $con = null) Return the first ChildInvWhseFrom matching the query
 * @method     ChildInvWhseFrom findOneOrCreate(ConnectionInterface $con = null) Return the first ChildInvWhseFrom matching the query, or a new ChildInvWhseFrom object populated from the query conditions when no match is found
 *
 * @method     ChildInvWhseFrom findOneByIntbwhsefrom(string $IntbWhseFrom) Return the first ChildInvWhseFrom filtered by the IntbWhseFrom column
 * @method     ChildInvWhseFrom findOneByIntbwhsename(string $IntbWhseName) Return the first ChildInvWhseFrom filtered by the IntbWhseName column
 * @method     ChildInvWhseFrom findOneByIntbwhseadr1(string $IntbWhseAdr1) Return the first ChildInvWhseFrom filtered by the IntbWhseAdr1 column
 * @method     ChildInvWhseFrom findOneByIntbwhseadr2(string $IntbWhseAdr2) Return the first ChildInvWhseFrom filtered by the IntbWhseAdr2 column
 * @method     ChildInvWhseFrom findOneByIntbwhsecity(string $IntbWhseCity) Return the first ChildInvWhseFrom filtered by the IntbWhseCity column
 * @method     ChildInvWhseFrom findOneByIntbwhsestat(string $IntbWhseStat) Return the first ChildInvWhseFrom filtered by the IntbWhseStat column
 * @method     ChildInvWhseFrom findOneByIntbwhsezipcode(string $IntbWhseZipCode) Return the first ChildInvWhseFrom filtered by the IntbWhseZipCode column
 * @method     ChildInvWhseFrom findOneByIntbwhsectry(string $IntbWhseCtry) Return the first ChildInvWhseFrom filtered by the IntbWhseCtry column
 * @method     ChildInvWhseFrom findOneByIntbwhseusehandheld(string $IntbWhseUseHandheld) Return the first ChildInvWhseFrom filtered by the IntbWhseUseHandheld column
 * @method     ChildInvWhseFrom findOneByIntbwhsecashcust(string $IntbWhseCashCust) Return the first ChildInvWhseFrom filtered by the IntbWhseCashCust column
 * @method     ChildInvWhseFrom findOneByIntbwhsepickdtl(string $IntbWhsePickDtl) Return the first ChildInvWhseFrom filtered by the IntbWhsePickDtl column
 * @method     ChildInvWhseFrom findOneByIntbwhseprodbin(string $IntbWhseProdBin) Return the first ChildInvWhseFrom filtered by the IntbWhseProdBin column
 * @method     ChildInvWhseFrom findOneByIntbwhsepharea(int $IntbWhsePhArea) Return the first ChildInvWhseFrom filtered by the IntbWhsePhArea column
 * @method     ChildInvWhseFrom findOneByIntbwhsephfrst3(int $IntbWhsePhFrst3) Return the first ChildInvWhseFrom filtered by the IntbWhsePhFrst3 column
 * @method     ChildInvWhseFrom findOneByIntbwhsephlast4(int $IntbWhsePhLast4) Return the first ChildInvWhseFrom filtered by the IntbWhsePhLast4 column
 * @method     ChildInvWhseFrom findOneByIntbwhsephext(string $IntbWhsePhExt) Return the first ChildInvWhseFrom filtered by the IntbWhsePhExt column
 * @method     ChildInvWhseFrom findOneByIntbwhsefaxarea(int $IntbWhseFaxArea) Return the first ChildInvWhseFrom filtered by the IntbWhseFaxArea column
 * @method     ChildInvWhseFrom findOneByIntbwhsefaxfrst3(int $IntbWhseFaxFrst3) Return the first ChildInvWhseFrom filtered by the IntbWhseFaxFrst3 column
 * @method     ChildInvWhseFrom findOneByIntbwhsefaxlast4(int $IntbWhseFaxLast4) Return the first ChildInvWhseFrom filtered by the IntbWhseFaxLast4 column
 * @method     ChildInvWhseFrom findOneByIntbwhseemailadr(string $IntbWhseEmailAdr) Return the first ChildInvWhseFrom filtered by the IntbWhseEmailAdr column
 * @method     ChildInvWhseFrom findOneByIntbwhseqcrgabin(string $IntbWhseQcRgaBin) Return the first ChildInvWhseFrom filtered by the IntbWhseQcRgaBin column
 * @method     ChildInvWhseFrom findOneByIntbwhserfprinter1(string $IntbWhseRfPrinter1) Return the first ChildInvWhseFrom filtered by the IntbWhseRfPrinter1 column
 * @method     ChildInvWhseFrom findOneByIntbwhserfprinter2(string $IntbWhseRfPrinter2) Return the first ChildInvWhseFrom filtered by the IntbWhseRfPrinter2 column
 * @method     ChildInvWhseFrom findOneByIntbwhserfprinter3(string $IntbWhseRfPrinter3) Return the first ChildInvWhseFrom filtered by the IntbWhseRfPrinter3 column
 * @method     ChildInvWhseFrom findOneByIntbwhserfprinter4(string $IntbWhseRfPrinter4) Return the first ChildInvWhseFrom filtered by the IntbWhseRfPrinter4 column
 * @method     ChildInvWhseFrom findOneByIntbwhserfprinter5(string $IntbWhseRfPrinter5) Return the first ChildInvWhseFrom filtered by the IntbWhseRfPrinter5 column
 * @method     ChildInvWhseFrom findOneByIntbwhseprofwhse(string $IntbWhseProfWhse) Return the first ChildInvWhseFrom filtered by the IntbWhseProfWhse column
 * @method     ChildInvWhseFrom findOneByIntbwhseasetwhse(string $IntbWhseAsetWhse) Return the first ChildInvWhseFrom filtered by the IntbWhseAsetWhse column
 * @method     ChildInvWhseFrom findOneByIntbwhseconsignwhse(string $IntbWhseConsignWhse) Return the first ChildInvWhseFrom filtered by the IntbWhseConsignWhse column
 * @method     ChildInvWhseFrom findOneByIntbwhsebinrangelist(string $IntbWhseBinRangeList) Return the first ChildInvWhseFrom filtered by the IntbWhseBinRangeList column
 * @method     ChildInvWhseFrom findOneByIntbwhsesupplywhse(string $IntbWhseSupplyWhse) Return the first ChildInvWhseFrom filtered by the IntbWhseSupplyWhse column
 * @method     ChildInvWhseFrom findOneByDateupdtd(int $DateUpdtd) Return the first ChildInvWhseFrom filtered by the DateUpdtd column
 * @method     ChildInvWhseFrom findOneByTimeupdtd(int $TimeUpdtd) Return the first ChildInvWhseFrom filtered by the TimeUpdtd column
 * @method     ChildInvWhseFrom findOneByDummy(string $dummy) Return the first ChildInvWhseFrom filtered by the dummy column *

 * @method     ChildInvWhseFrom requirePk($key, ConnectionInterface $con = null) Return the ChildInvWhseFrom by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseFrom requireOne(ConnectionInterface $con = null) Return the first ChildInvWhseFrom matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInvWhseFrom requireOneByIntbwhsefrom(string $IntbWhseFrom) Return the first ChildInvWhseFrom filtered by the IntbWhseFrom column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseFrom requireOneByIntbwhsename(string $IntbWhseName) Return the first ChildInvWhseFrom filtered by the IntbWhseName column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseFrom requireOneByIntbwhseadr1(string $IntbWhseAdr1) Return the first ChildInvWhseFrom filtered by the IntbWhseAdr1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseFrom requireOneByIntbwhseadr2(string $IntbWhseAdr2) Return the first ChildInvWhseFrom filtered by the IntbWhseAdr2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseFrom requireOneByIntbwhsecity(string $IntbWhseCity) Return the first ChildInvWhseFrom filtered by the IntbWhseCity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseFrom requireOneByIntbwhsestat(string $IntbWhseStat) Return the first ChildInvWhseFrom filtered by the IntbWhseStat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseFrom requireOneByIntbwhsezipcode(string $IntbWhseZipCode) Return the first ChildInvWhseFrom filtered by the IntbWhseZipCode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseFrom requireOneByIntbwhsectry(string $IntbWhseCtry) Return the first ChildInvWhseFrom filtered by the IntbWhseCtry column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseFrom requireOneByIntbwhseusehandheld(string $IntbWhseUseHandheld) Return the first ChildInvWhseFrom filtered by the IntbWhseUseHandheld column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseFrom requireOneByIntbwhsecashcust(string $IntbWhseCashCust) Return the first ChildInvWhseFrom filtered by the IntbWhseCashCust column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseFrom requireOneByIntbwhsepickdtl(string $IntbWhsePickDtl) Return the first ChildInvWhseFrom filtered by the IntbWhsePickDtl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseFrom requireOneByIntbwhseprodbin(string $IntbWhseProdBin) Return the first ChildInvWhseFrom filtered by the IntbWhseProdBin column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseFrom requireOneByIntbwhsepharea(int $IntbWhsePhArea) Return the first ChildInvWhseFrom filtered by the IntbWhsePhArea column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseFrom requireOneByIntbwhsephfrst3(int $IntbWhsePhFrst3) Return the first ChildInvWhseFrom filtered by the IntbWhsePhFrst3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseFrom requireOneByIntbwhsephlast4(int $IntbWhsePhLast4) Return the first ChildInvWhseFrom filtered by the IntbWhsePhLast4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseFrom requireOneByIntbwhsephext(string $IntbWhsePhExt) Return the first ChildInvWhseFrom filtered by the IntbWhsePhExt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseFrom requireOneByIntbwhsefaxarea(int $IntbWhseFaxArea) Return the first ChildInvWhseFrom filtered by the IntbWhseFaxArea column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseFrom requireOneByIntbwhsefaxfrst3(int $IntbWhseFaxFrst3) Return the first ChildInvWhseFrom filtered by the IntbWhseFaxFrst3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseFrom requireOneByIntbwhsefaxlast4(int $IntbWhseFaxLast4) Return the first ChildInvWhseFrom filtered by the IntbWhseFaxLast4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseFrom requireOneByIntbwhseemailadr(string $IntbWhseEmailAdr) Return the first ChildInvWhseFrom filtered by the IntbWhseEmailAdr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseFrom requireOneByIntbwhseqcrgabin(string $IntbWhseQcRgaBin) Return the first ChildInvWhseFrom filtered by the IntbWhseQcRgaBin column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseFrom requireOneByIntbwhserfprinter1(string $IntbWhseRfPrinter1) Return the first ChildInvWhseFrom filtered by the IntbWhseRfPrinter1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseFrom requireOneByIntbwhserfprinter2(string $IntbWhseRfPrinter2) Return the first ChildInvWhseFrom filtered by the IntbWhseRfPrinter2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseFrom requireOneByIntbwhserfprinter3(string $IntbWhseRfPrinter3) Return the first ChildInvWhseFrom filtered by the IntbWhseRfPrinter3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseFrom requireOneByIntbwhserfprinter4(string $IntbWhseRfPrinter4) Return the first ChildInvWhseFrom filtered by the IntbWhseRfPrinter4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseFrom requireOneByIntbwhserfprinter5(string $IntbWhseRfPrinter5) Return the first ChildInvWhseFrom filtered by the IntbWhseRfPrinter5 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseFrom requireOneByIntbwhseprofwhse(string $IntbWhseProfWhse) Return the first ChildInvWhseFrom filtered by the IntbWhseProfWhse column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseFrom requireOneByIntbwhseasetwhse(string $IntbWhseAsetWhse) Return the first ChildInvWhseFrom filtered by the IntbWhseAsetWhse column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseFrom requireOneByIntbwhseconsignwhse(string $IntbWhseConsignWhse) Return the first ChildInvWhseFrom filtered by the IntbWhseConsignWhse column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseFrom requireOneByIntbwhsebinrangelist(string $IntbWhseBinRangeList) Return the first ChildInvWhseFrom filtered by the IntbWhseBinRangeList column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseFrom requireOneByIntbwhsesupplywhse(string $IntbWhseSupplyWhse) Return the first ChildInvWhseFrom filtered by the IntbWhseSupplyWhse column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseFrom requireOneByDateupdtd(int $DateUpdtd) Return the first ChildInvWhseFrom filtered by the DateUpdtd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseFrom requireOneByTimeupdtd(int $TimeUpdtd) Return the first ChildInvWhseFrom filtered by the TimeUpdtd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvWhseFrom requireOneByDummy(string $dummy) Return the first ChildInvWhseFrom filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInvWhseFrom[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildInvWhseFrom objects based on current ModelCriteria
 * @method     ChildInvWhseFrom[]|ObjectCollection findByIntbwhsefrom(string $IntbWhseFrom) Return ChildInvWhseFrom objects filtered by the IntbWhseFrom column
 * @method     ChildInvWhseFrom[]|ObjectCollection findByIntbwhsename(string $IntbWhseName) Return ChildInvWhseFrom objects filtered by the IntbWhseName column
 * @method     ChildInvWhseFrom[]|ObjectCollection findByIntbwhseadr1(string $IntbWhseAdr1) Return ChildInvWhseFrom objects filtered by the IntbWhseAdr1 column
 * @method     ChildInvWhseFrom[]|ObjectCollection findByIntbwhseadr2(string $IntbWhseAdr2) Return ChildInvWhseFrom objects filtered by the IntbWhseAdr2 column
 * @method     ChildInvWhseFrom[]|ObjectCollection findByIntbwhsecity(string $IntbWhseCity) Return ChildInvWhseFrom objects filtered by the IntbWhseCity column
 * @method     ChildInvWhseFrom[]|ObjectCollection findByIntbwhsestat(string $IntbWhseStat) Return ChildInvWhseFrom objects filtered by the IntbWhseStat column
 * @method     ChildInvWhseFrom[]|ObjectCollection findByIntbwhsezipcode(string $IntbWhseZipCode) Return ChildInvWhseFrom objects filtered by the IntbWhseZipCode column
 * @method     ChildInvWhseFrom[]|ObjectCollection findByIntbwhsectry(string $IntbWhseCtry) Return ChildInvWhseFrom objects filtered by the IntbWhseCtry column
 * @method     ChildInvWhseFrom[]|ObjectCollection findByIntbwhseusehandheld(string $IntbWhseUseHandheld) Return ChildInvWhseFrom objects filtered by the IntbWhseUseHandheld column
 * @method     ChildInvWhseFrom[]|ObjectCollection findByIntbwhsecashcust(string $IntbWhseCashCust) Return ChildInvWhseFrom objects filtered by the IntbWhseCashCust column
 * @method     ChildInvWhseFrom[]|ObjectCollection findByIntbwhsepickdtl(string $IntbWhsePickDtl) Return ChildInvWhseFrom objects filtered by the IntbWhsePickDtl column
 * @method     ChildInvWhseFrom[]|ObjectCollection findByIntbwhseprodbin(string $IntbWhseProdBin) Return ChildInvWhseFrom objects filtered by the IntbWhseProdBin column
 * @method     ChildInvWhseFrom[]|ObjectCollection findByIntbwhsepharea(int $IntbWhsePhArea) Return ChildInvWhseFrom objects filtered by the IntbWhsePhArea column
 * @method     ChildInvWhseFrom[]|ObjectCollection findByIntbwhsephfrst3(int $IntbWhsePhFrst3) Return ChildInvWhseFrom objects filtered by the IntbWhsePhFrst3 column
 * @method     ChildInvWhseFrom[]|ObjectCollection findByIntbwhsephlast4(int $IntbWhsePhLast4) Return ChildInvWhseFrom objects filtered by the IntbWhsePhLast4 column
 * @method     ChildInvWhseFrom[]|ObjectCollection findByIntbwhsephext(string $IntbWhsePhExt) Return ChildInvWhseFrom objects filtered by the IntbWhsePhExt column
 * @method     ChildInvWhseFrom[]|ObjectCollection findByIntbwhsefaxarea(int $IntbWhseFaxArea) Return ChildInvWhseFrom objects filtered by the IntbWhseFaxArea column
 * @method     ChildInvWhseFrom[]|ObjectCollection findByIntbwhsefaxfrst3(int $IntbWhseFaxFrst3) Return ChildInvWhseFrom objects filtered by the IntbWhseFaxFrst3 column
 * @method     ChildInvWhseFrom[]|ObjectCollection findByIntbwhsefaxlast4(int $IntbWhseFaxLast4) Return ChildInvWhseFrom objects filtered by the IntbWhseFaxLast4 column
 * @method     ChildInvWhseFrom[]|ObjectCollection findByIntbwhseemailadr(string $IntbWhseEmailAdr) Return ChildInvWhseFrom objects filtered by the IntbWhseEmailAdr column
 * @method     ChildInvWhseFrom[]|ObjectCollection findByIntbwhseqcrgabin(string $IntbWhseQcRgaBin) Return ChildInvWhseFrom objects filtered by the IntbWhseQcRgaBin column
 * @method     ChildInvWhseFrom[]|ObjectCollection findByIntbwhserfprinter1(string $IntbWhseRfPrinter1) Return ChildInvWhseFrom objects filtered by the IntbWhseRfPrinter1 column
 * @method     ChildInvWhseFrom[]|ObjectCollection findByIntbwhserfprinter2(string $IntbWhseRfPrinter2) Return ChildInvWhseFrom objects filtered by the IntbWhseRfPrinter2 column
 * @method     ChildInvWhseFrom[]|ObjectCollection findByIntbwhserfprinter3(string $IntbWhseRfPrinter3) Return ChildInvWhseFrom objects filtered by the IntbWhseRfPrinter3 column
 * @method     ChildInvWhseFrom[]|ObjectCollection findByIntbwhserfprinter4(string $IntbWhseRfPrinter4) Return ChildInvWhseFrom objects filtered by the IntbWhseRfPrinter4 column
 * @method     ChildInvWhseFrom[]|ObjectCollection findByIntbwhserfprinter5(string $IntbWhseRfPrinter5) Return ChildInvWhseFrom objects filtered by the IntbWhseRfPrinter5 column
 * @method     ChildInvWhseFrom[]|ObjectCollection findByIntbwhseprofwhse(string $IntbWhseProfWhse) Return ChildInvWhseFrom objects filtered by the IntbWhseProfWhse column
 * @method     ChildInvWhseFrom[]|ObjectCollection findByIntbwhseasetwhse(string $IntbWhseAsetWhse) Return ChildInvWhseFrom objects filtered by the IntbWhseAsetWhse column
 * @method     ChildInvWhseFrom[]|ObjectCollection findByIntbwhseconsignwhse(string $IntbWhseConsignWhse) Return ChildInvWhseFrom objects filtered by the IntbWhseConsignWhse column
 * @method     ChildInvWhseFrom[]|ObjectCollection findByIntbwhsebinrangelist(string $IntbWhseBinRangeList) Return ChildInvWhseFrom objects filtered by the IntbWhseBinRangeList column
 * @method     ChildInvWhseFrom[]|ObjectCollection findByIntbwhsesupplywhse(string $IntbWhseSupplyWhse) Return ChildInvWhseFrom objects filtered by the IntbWhseSupplyWhse column
 * @method     ChildInvWhseFrom[]|ObjectCollection findByDateupdtd(int $DateUpdtd) Return ChildInvWhseFrom objects filtered by the DateUpdtd column
 * @method     ChildInvWhseFrom[]|ObjectCollection findByTimeupdtd(int $TimeUpdtd) Return ChildInvWhseFrom objects filtered by the TimeUpdtd column
 * @method     ChildInvWhseFrom[]|ObjectCollection findByDummy(string $dummy) Return ChildInvWhseFrom objects filtered by the dummy column
 * @method     ChildInvWhseFrom[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class InvWhseFromQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\InvWhseFromQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\InvWhseFrom', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildInvWhseFromQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildInvWhseFromQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildInvWhseFromQuery) {
            return $criteria;
        }
        $query = new ChildInvWhseFromQuery();
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
     * @return ChildInvWhseFrom|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(InvWhseFromTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = InvWhseFromTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildInvWhseFrom A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT IntbWhseFrom, IntbWhseName, IntbWhseAdr1, IntbWhseAdr2, IntbWhseCity, IntbWhseStat, IntbWhseZipCode, IntbWhseCtry, IntbWhseUseHandheld, IntbWhseCashCust, IntbWhsePickDtl, IntbWhseProdBin, IntbWhsePhArea, IntbWhsePhFrst3, IntbWhsePhLast4, IntbWhsePhExt, IntbWhseFaxArea, IntbWhseFaxFrst3, IntbWhseFaxLast4, IntbWhseEmailAdr, IntbWhseQcRgaBin, IntbWhseRfPrinter1, IntbWhseRfPrinter2, IntbWhseRfPrinter3, IntbWhseRfPrinter4, IntbWhseRfPrinter5, IntbWhseProfWhse, IntbWhseAsetWhse, IntbWhseConsignWhse, IntbWhseBinRangeList, IntbWhseSupplyWhse, DateUpdtd, TimeUpdtd, dummy FROM inv_whse_from WHERE IntbWhseFrom = :p0';
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
            /** @var ChildInvWhseFrom $obj */
            $obj = new ChildInvWhseFrom();
            $obj->hydrate($row);
            InvWhseFromTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildInvWhseFrom|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildInvWhseFromQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSEFROM, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildInvWhseFromQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSEFROM, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the IntbWhseFrom column
     *
     * Example usage:
     * <code>
     * $query->filterByIntbwhsefrom('fooValue');   // WHERE IntbWhseFrom = 'fooValue'
     * $query->filterByIntbwhsefrom('%fooValue%', Criteria::LIKE); // WHERE IntbWhseFrom LIKE '%fooValue%'
     * </code>
     *
     * @param     string $intbwhsefrom The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInvWhseFromQuery The current query, for fluid interface
     */
    public function filterByIntbwhsefrom($intbwhsefrom = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhsefrom)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSEFROM, $intbwhsefrom, $comparison);
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
     * @return $this|ChildInvWhseFromQuery The current query, for fluid interface
     */
    public function filterByIntbwhsename($intbwhsename = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhsename)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSENAME, $intbwhsename, $comparison);
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
     * @return $this|ChildInvWhseFromQuery The current query, for fluid interface
     */
    public function filterByIntbwhseadr1($intbwhseadr1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhseadr1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSEADR1, $intbwhseadr1, $comparison);
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
     * @return $this|ChildInvWhseFromQuery The current query, for fluid interface
     */
    public function filterByIntbwhseadr2($intbwhseadr2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhseadr2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSEADR2, $intbwhseadr2, $comparison);
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
     * @return $this|ChildInvWhseFromQuery The current query, for fluid interface
     */
    public function filterByIntbwhsecity($intbwhsecity = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhsecity)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSECITY, $intbwhsecity, $comparison);
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
     * @return $this|ChildInvWhseFromQuery The current query, for fluid interface
     */
    public function filterByIntbwhsestat($intbwhsestat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhsestat)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSESTAT, $intbwhsestat, $comparison);
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
     * @return $this|ChildInvWhseFromQuery The current query, for fluid interface
     */
    public function filterByIntbwhsezipcode($intbwhsezipcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhsezipcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSEZIPCODE, $intbwhsezipcode, $comparison);
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
     * @return $this|ChildInvWhseFromQuery The current query, for fluid interface
     */
    public function filterByIntbwhsectry($intbwhsectry = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhsectry)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSECTRY, $intbwhsectry, $comparison);
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
     * @return $this|ChildInvWhseFromQuery The current query, for fluid interface
     */
    public function filterByIntbwhseusehandheld($intbwhseusehandheld = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhseusehandheld)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSEUSEHANDHELD, $intbwhseusehandheld, $comparison);
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
     * @return $this|ChildInvWhseFromQuery The current query, for fluid interface
     */
    public function filterByIntbwhsecashcust($intbwhsecashcust = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhsecashcust)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSECASHCUST, $intbwhsecashcust, $comparison);
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
     * @return $this|ChildInvWhseFromQuery The current query, for fluid interface
     */
    public function filterByIntbwhsepickdtl($intbwhsepickdtl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhsepickdtl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSEPICKDTL, $intbwhsepickdtl, $comparison);
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
     * @return $this|ChildInvWhseFromQuery The current query, for fluid interface
     */
    public function filterByIntbwhseprodbin($intbwhseprodbin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhseprodbin)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSEPRODBIN, $intbwhseprodbin, $comparison);
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
     * @return $this|ChildInvWhseFromQuery The current query, for fluid interface
     */
    public function filterByIntbwhsepharea($intbwhsepharea = null, $comparison = null)
    {
        if (is_array($intbwhsepharea)) {
            $useMinMax = false;
            if (isset($intbwhsepharea['min'])) {
                $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSEPHAREA, $intbwhsepharea['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($intbwhsepharea['max'])) {
                $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSEPHAREA, $intbwhsepharea['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSEPHAREA, $intbwhsepharea, $comparison);
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
     * @return $this|ChildInvWhseFromQuery The current query, for fluid interface
     */
    public function filterByIntbwhsephfrst3($intbwhsephfrst3 = null, $comparison = null)
    {
        if (is_array($intbwhsephfrst3)) {
            $useMinMax = false;
            if (isset($intbwhsephfrst3['min'])) {
                $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSEPHFRST3, $intbwhsephfrst3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($intbwhsephfrst3['max'])) {
                $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSEPHFRST3, $intbwhsephfrst3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSEPHFRST3, $intbwhsephfrst3, $comparison);
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
     * @return $this|ChildInvWhseFromQuery The current query, for fluid interface
     */
    public function filterByIntbwhsephlast4($intbwhsephlast4 = null, $comparison = null)
    {
        if (is_array($intbwhsephlast4)) {
            $useMinMax = false;
            if (isset($intbwhsephlast4['min'])) {
                $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSEPHLAST4, $intbwhsephlast4['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($intbwhsephlast4['max'])) {
                $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSEPHLAST4, $intbwhsephlast4['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSEPHLAST4, $intbwhsephlast4, $comparison);
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
     * @return $this|ChildInvWhseFromQuery The current query, for fluid interface
     */
    public function filterByIntbwhsephext($intbwhsephext = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhsephext)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSEPHEXT, $intbwhsephext, $comparison);
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
     * @return $this|ChildInvWhseFromQuery The current query, for fluid interface
     */
    public function filterByIntbwhsefaxarea($intbwhsefaxarea = null, $comparison = null)
    {
        if (is_array($intbwhsefaxarea)) {
            $useMinMax = false;
            if (isset($intbwhsefaxarea['min'])) {
                $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSEFAXAREA, $intbwhsefaxarea['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($intbwhsefaxarea['max'])) {
                $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSEFAXAREA, $intbwhsefaxarea['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSEFAXAREA, $intbwhsefaxarea, $comparison);
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
     * @return $this|ChildInvWhseFromQuery The current query, for fluid interface
     */
    public function filterByIntbwhsefaxfrst3($intbwhsefaxfrst3 = null, $comparison = null)
    {
        if (is_array($intbwhsefaxfrst3)) {
            $useMinMax = false;
            if (isset($intbwhsefaxfrst3['min'])) {
                $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSEFAXFRST3, $intbwhsefaxfrst3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($intbwhsefaxfrst3['max'])) {
                $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSEFAXFRST3, $intbwhsefaxfrst3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSEFAXFRST3, $intbwhsefaxfrst3, $comparison);
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
     * @return $this|ChildInvWhseFromQuery The current query, for fluid interface
     */
    public function filterByIntbwhsefaxlast4($intbwhsefaxlast4 = null, $comparison = null)
    {
        if (is_array($intbwhsefaxlast4)) {
            $useMinMax = false;
            if (isset($intbwhsefaxlast4['min'])) {
                $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSEFAXLAST4, $intbwhsefaxlast4['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($intbwhsefaxlast4['max'])) {
                $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSEFAXLAST4, $intbwhsefaxlast4['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSEFAXLAST4, $intbwhsefaxlast4, $comparison);
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
     * @return $this|ChildInvWhseFromQuery The current query, for fluid interface
     */
    public function filterByIntbwhseemailadr($intbwhseemailadr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhseemailadr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSEEMAILADR, $intbwhseemailadr, $comparison);
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
     * @return $this|ChildInvWhseFromQuery The current query, for fluid interface
     */
    public function filterByIntbwhseqcrgabin($intbwhseqcrgabin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhseqcrgabin)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSEQCRGABIN, $intbwhseqcrgabin, $comparison);
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
     * @return $this|ChildInvWhseFromQuery The current query, for fluid interface
     */
    public function filterByIntbwhserfprinter1($intbwhserfprinter1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhserfprinter1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSERFPRINTER1, $intbwhserfprinter1, $comparison);
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
     * @return $this|ChildInvWhseFromQuery The current query, for fluid interface
     */
    public function filterByIntbwhserfprinter2($intbwhserfprinter2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhserfprinter2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSERFPRINTER2, $intbwhserfprinter2, $comparison);
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
     * @return $this|ChildInvWhseFromQuery The current query, for fluid interface
     */
    public function filterByIntbwhserfprinter3($intbwhserfprinter3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhserfprinter3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSERFPRINTER3, $intbwhserfprinter3, $comparison);
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
     * @return $this|ChildInvWhseFromQuery The current query, for fluid interface
     */
    public function filterByIntbwhserfprinter4($intbwhserfprinter4 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhserfprinter4)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSERFPRINTER4, $intbwhserfprinter4, $comparison);
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
     * @return $this|ChildInvWhseFromQuery The current query, for fluid interface
     */
    public function filterByIntbwhserfprinter5($intbwhserfprinter5 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhserfprinter5)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSERFPRINTER5, $intbwhserfprinter5, $comparison);
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
     * @return $this|ChildInvWhseFromQuery The current query, for fluid interface
     */
    public function filterByIntbwhseprofwhse($intbwhseprofwhse = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhseprofwhse)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSEPROFWHSE, $intbwhseprofwhse, $comparison);
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
     * @return $this|ChildInvWhseFromQuery The current query, for fluid interface
     */
    public function filterByIntbwhseasetwhse($intbwhseasetwhse = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhseasetwhse)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSEASETWHSE, $intbwhseasetwhse, $comparison);
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
     * @return $this|ChildInvWhseFromQuery The current query, for fluid interface
     */
    public function filterByIntbwhseconsignwhse($intbwhseconsignwhse = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhseconsignwhse)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSECONSIGNWHSE, $intbwhseconsignwhse, $comparison);
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
     * @return $this|ChildInvWhseFromQuery The current query, for fluid interface
     */
    public function filterByIntbwhsebinrangelist($intbwhsebinrangelist = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhsebinrangelist)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSEBINRANGELIST, $intbwhsebinrangelist, $comparison);
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
     * @return $this|ChildInvWhseFromQuery The current query, for fluid interface
     */
    public function filterByIntbwhsesupplywhse($intbwhsesupplywhse = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($intbwhsesupplywhse)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSESUPPLYWHSE, $intbwhsesupplywhse, $comparison);
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
     * @return $this|ChildInvWhseFromQuery The current query, for fluid interface
     */
    public function filterByDateupdtd($dateupdtd = null, $comparison = null)
    {
        if (is_array($dateupdtd)) {
            $useMinMax = false;
            if (isset($dateupdtd['min'])) {
                $this->addUsingAlias(InvWhseFromTableMap::COL_DATEUPDTD, $dateupdtd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateupdtd['max'])) {
                $this->addUsingAlias(InvWhseFromTableMap::COL_DATEUPDTD, $dateupdtd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseFromTableMap::COL_DATEUPDTD, $dateupdtd, $comparison);
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
     * @return $this|ChildInvWhseFromQuery The current query, for fluid interface
     */
    public function filterByTimeupdtd($timeupdtd = null, $comparison = null)
    {
        if (is_array($timeupdtd)) {
            $useMinMax = false;
            if (isset($timeupdtd['min'])) {
                $this->addUsingAlias(InvWhseFromTableMap::COL_TIMEUPDTD, $timeupdtd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timeupdtd['max'])) {
                $this->addUsingAlias(InvWhseFromTableMap::COL_TIMEUPDTD, $timeupdtd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseFromTableMap::COL_TIMEUPDTD, $timeupdtd, $comparison);
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
     * @return $this|ChildInvWhseFromQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InvWhseFromTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildInvWhseFrom $invWhseFrom Object to remove from the list of results
     *
     * @return $this|ChildInvWhseFromQuery The current query, for fluid interface
     */
    public function prune($invWhseFrom = null)
    {
        if ($invWhseFrom) {
            $this->addUsingAlias(InvWhseFromTableMap::COL_INTBWHSEFROM, $invWhseFrom->getIntbwhsefrom(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the inv_whse_from table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InvWhseFromTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            InvWhseFromTableMap::clearInstancePool();
            InvWhseFromTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(InvWhseFromTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(InvWhseFromTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            InvWhseFromTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            InvWhseFromTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // InvWhseFromQuery
