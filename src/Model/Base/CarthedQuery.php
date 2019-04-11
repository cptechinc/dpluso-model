<?php

namespace Base;

use \Carthed as ChildCarthed;
use \CarthedQuery as ChildCarthedQuery;
use \Exception;
use \PDO;
use Map\CarthedTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'carthed' table.
 *
 *
 *
 * @method     ChildCarthedQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildCarthedQuery orderByRecno($order = Criteria::ASC) Order by the recno column
 * @method     ChildCarthedQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildCarthedQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildCarthedQuery orderByCustid($order = Criteria::ASC) Order by the custid column
 * @method     ChildCarthedQuery orderByShiptoid($order = Criteria::ASC) Order by the shiptoid column
 * @method     ChildCarthedQuery orderByCustname($order = Criteria::ASC) Order by the custname column
 * @method     ChildCarthedQuery orderByOrderno($order = Criteria::ASC) Order by the orderno column
 * @method     ChildCarthedQuery orderByCustpo($order = Criteria::ASC) Order by the custpo column
 * @method     ChildCarthedQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildCarthedQuery orderByOrderdate($order = Criteria::ASC) Order by the orderdate column
 * @method     ChildCarthedQuery orderByInvdate($order = Criteria::ASC) Order by the invdate column
 * @method     ChildCarthedQuery orderByShipdate($order = Criteria::ASC) Order by the shipdate column
 * @method     ChildCarthedQuery orderByHasdocuments($order = Criteria::ASC) Order by the hasdocuments column
 * @method     ChildCarthedQuery orderByHastracking($order = Criteria::ASC) Order by the hastracking column
 * @method     ChildCarthedQuery orderBySubtotal($order = Criteria::ASC) Order by the subtotal column
 * @method     ChildCarthedQuery orderBySalestax($order = Criteria::ASC) Order by the salestax column
 * @method     ChildCarthedQuery orderByFreight($order = Criteria::ASC) Order by the freight column
 * @method     ChildCarthedQuery orderByMisccost($order = Criteria::ASC) Order by the misccost column
 * @method     ChildCarthedQuery orderByOrdertotal($order = Criteria::ASC) Order by the ordertotal column
 * @method     ChildCarthedQuery orderByHasnotes($order = Criteria::ASC) Order by the hasnotes column
 * @method     ChildCarthedQuery orderByEditord($order = Criteria::ASC) Order by the editord column
 * @method     ChildCarthedQuery orderByError($order = Criteria::ASC) Order by the error column
 * @method     ChildCarthedQuery orderByErrormsg($order = Criteria::ASC) Order by the errormsg column
 * @method     ChildCarthedQuery orderBySconame($order = Criteria::ASC) Order by the sconame column
 * @method     ChildCarthedQuery orderByShipname($order = Criteria::ASC) Order by the shipname column
 * @method     ChildCarthedQuery orderByShipaddress($order = Criteria::ASC) Order by the shipaddress column
 * @method     ChildCarthedQuery orderByShipaddress2($order = Criteria::ASC) Order by the shipaddress2 column
 * @method     ChildCarthedQuery orderByShipcity($order = Criteria::ASC) Order by the shipcity column
 * @method     ChildCarthedQuery orderByShipstate($order = Criteria::ASC) Order by the shipstate column
 * @method     ChildCarthedQuery orderByShipzip($order = Criteria::ASC) Order by the shipzip column
 * @method     ChildCarthedQuery orderByShipcountry($order = Criteria::ASC) Order by the shipcountry column
 * @method     ChildCarthedQuery orderByContact($order = Criteria::ASC) Order by the contact column
 * @method     ChildCarthedQuery orderByPhintl($order = Criteria::ASC) Order by the phintl column
 * @method     ChildCarthedQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     ChildCarthedQuery orderByExtension($order = Criteria::ASC) Order by the extension column
 * @method     ChildCarthedQuery orderByFaxnbr($order = Criteria::ASC) Order by the faxnbr column
 * @method     ChildCarthedQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildCarthedQuery orderByReleasenbr($order = Criteria::ASC) Order by the releasenbr column
 * @method     ChildCarthedQuery orderByShipviacd($order = Criteria::ASC) Order by the shipviacd column
 * @method     ChildCarthedQuery orderByShipviadesc($order = Criteria::ASC) Order by the shipviadesc column
 * @method     ChildCarthedQuery orderByTermcode($order = Criteria::ASC) Order by the termcode column
 * @method     ChildCarthedQuery orderByTermtype($order = Criteria::ASC) Order by the termtype column
 * @method     ChildCarthedQuery orderByTermdesc($order = Criteria::ASC) Order by the termdesc column
 * @method     ChildCarthedQuery orderByRqstdate($order = Criteria::ASC) Order by the rqstdate column
 * @method     ChildCarthedQuery orderByShipcom($order = Criteria::ASC) Order by the shipcom column
 * @method     ChildCarthedQuery orderBySp1($order = Criteria::ASC) Order by the sp1 column
 * @method     ChildCarthedQuery orderBySp1name($order = Criteria::ASC) Order by the sp1name column
 * @method     ChildCarthedQuery orderByCardnumber($order = Criteria::ASC) Order by the cardnumber column
 * @method     ChildCarthedQuery orderByCardexpire($order = Criteria::ASC) Order by the cardexpire column
 * @method     ChildCarthedQuery orderByCardcode($order = Criteria::ASC) Order by the cardcode column
 * @method     ChildCarthedQuery orderByCardapproval($order = Criteria::ASC) Order by the cardapproval column
 * @method     ChildCarthedQuery orderByTotalcost($order = Criteria::ASC) Order by the totalcost column
 * @method     ChildCarthedQuery orderByTotaldiscount($order = Criteria::ASC) Order by the totaldiscount column
 * @method     ChildCarthedQuery orderByPaymenttype($order = Criteria::ASC) Order by the paymenttype column
 * @method     ChildCarthedQuery orderBySrcdatefrom($order = Criteria::ASC) Order by the srcdatefrom column
 * @method     ChildCarthedQuery orderBySrcdatethru($order = Criteria::ASC) Order by the srcdatethru column
 * @method     ChildCarthedQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildCarthedQuery groupBySessionid() Group by the sessionid column
 * @method     ChildCarthedQuery groupByRecno() Group by the recno column
 * @method     ChildCarthedQuery groupByDate() Group by the date column
 * @method     ChildCarthedQuery groupByTime() Group by the time column
 * @method     ChildCarthedQuery groupByCustid() Group by the custid column
 * @method     ChildCarthedQuery groupByShiptoid() Group by the shiptoid column
 * @method     ChildCarthedQuery groupByCustname() Group by the custname column
 * @method     ChildCarthedQuery groupByOrderno() Group by the orderno column
 * @method     ChildCarthedQuery groupByCustpo() Group by the custpo column
 * @method     ChildCarthedQuery groupByStatus() Group by the status column
 * @method     ChildCarthedQuery groupByOrderdate() Group by the orderdate column
 * @method     ChildCarthedQuery groupByInvdate() Group by the invdate column
 * @method     ChildCarthedQuery groupByShipdate() Group by the shipdate column
 * @method     ChildCarthedQuery groupByHasdocuments() Group by the hasdocuments column
 * @method     ChildCarthedQuery groupByHastracking() Group by the hastracking column
 * @method     ChildCarthedQuery groupBySubtotal() Group by the subtotal column
 * @method     ChildCarthedQuery groupBySalestax() Group by the salestax column
 * @method     ChildCarthedQuery groupByFreight() Group by the freight column
 * @method     ChildCarthedQuery groupByMisccost() Group by the misccost column
 * @method     ChildCarthedQuery groupByOrdertotal() Group by the ordertotal column
 * @method     ChildCarthedQuery groupByHasnotes() Group by the hasnotes column
 * @method     ChildCarthedQuery groupByEditord() Group by the editord column
 * @method     ChildCarthedQuery groupByError() Group by the error column
 * @method     ChildCarthedQuery groupByErrormsg() Group by the errormsg column
 * @method     ChildCarthedQuery groupBySconame() Group by the sconame column
 * @method     ChildCarthedQuery groupByShipname() Group by the shipname column
 * @method     ChildCarthedQuery groupByShipaddress() Group by the shipaddress column
 * @method     ChildCarthedQuery groupByShipaddress2() Group by the shipaddress2 column
 * @method     ChildCarthedQuery groupByShipcity() Group by the shipcity column
 * @method     ChildCarthedQuery groupByShipstate() Group by the shipstate column
 * @method     ChildCarthedQuery groupByShipzip() Group by the shipzip column
 * @method     ChildCarthedQuery groupByShipcountry() Group by the shipcountry column
 * @method     ChildCarthedQuery groupByContact() Group by the contact column
 * @method     ChildCarthedQuery groupByPhintl() Group by the phintl column
 * @method     ChildCarthedQuery groupByPhone() Group by the phone column
 * @method     ChildCarthedQuery groupByExtension() Group by the extension column
 * @method     ChildCarthedQuery groupByFaxnbr() Group by the faxnbr column
 * @method     ChildCarthedQuery groupByEmail() Group by the email column
 * @method     ChildCarthedQuery groupByReleasenbr() Group by the releasenbr column
 * @method     ChildCarthedQuery groupByShipviacd() Group by the shipviacd column
 * @method     ChildCarthedQuery groupByShipviadesc() Group by the shipviadesc column
 * @method     ChildCarthedQuery groupByTermcode() Group by the termcode column
 * @method     ChildCarthedQuery groupByTermtype() Group by the termtype column
 * @method     ChildCarthedQuery groupByTermdesc() Group by the termdesc column
 * @method     ChildCarthedQuery groupByRqstdate() Group by the rqstdate column
 * @method     ChildCarthedQuery groupByShipcom() Group by the shipcom column
 * @method     ChildCarthedQuery groupBySp1() Group by the sp1 column
 * @method     ChildCarthedQuery groupBySp1name() Group by the sp1name column
 * @method     ChildCarthedQuery groupByCardnumber() Group by the cardnumber column
 * @method     ChildCarthedQuery groupByCardexpire() Group by the cardexpire column
 * @method     ChildCarthedQuery groupByCardcode() Group by the cardcode column
 * @method     ChildCarthedQuery groupByCardapproval() Group by the cardapproval column
 * @method     ChildCarthedQuery groupByTotalcost() Group by the totalcost column
 * @method     ChildCarthedQuery groupByTotaldiscount() Group by the totaldiscount column
 * @method     ChildCarthedQuery groupByPaymenttype() Group by the paymenttype column
 * @method     ChildCarthedQuery groupBySrcdatefrom() Group by the srcdatefrom column
 * @method     ChildCarthedQuery groupBySrcdatethru() Group by the srcdatethru column
 * @method     ChildCarthedQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildCarthedQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCarthedQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCarthedQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCarthedQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCarthedQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCarthedQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCarthed findOne(ConnectionInterface $con = null) Return the first ChildCarthed matching the query
 * @method     ChildCarthed findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCarthed matching the query, or a new ChildCarthed object populated from the query conditions when no match is found
 *
 * @method     ChildCarthed findOneBySessionid(string $sessionid) Return the first ChildCarthed filtered by the sessionid column
 * @method     ChildCarthed findOneByRecno(int $recno) Return the first ChildCarthed filtered by the recno column
 * @method     ChildCarthed findOneByDate(int $date) Return the first ChildCarthed filtered by the date column
 * @method     ChildCarthed findOneByTime(int $time) Return the first ChildCarthed filtered by the time column
 * @method     ChildCarthed findOneByCustid(string $custid) Return the first ChildCarthed filtered by the custid column
 * @method     ChildCarthed findOneByShiptoid(string $shiptoid) Return the first ChildCarthed filtered by the shiptoid column
 * @method     ChildCarthed findOneByCustname(string $custname) Return the first ChildCarthed filtered by the custname column
 * @method     ChildCarthed findOneByOrderno(string $orderno) Return the first ChildCarthed filtered by the orderno column
 * @method     ChildCarthed findOneByCustpo(string $custpo) Return the first ChildCarthed filtered by the custpo column
 * @method     ChildCarthed findOneByStatus(string $status) Return the first ChildCarthed filtered by the status column
 * @method     ChildCarthed findOneByOrderdate(string $orderdate) Return the first ChildCarthed filtered by the orderdate column
 * @method     ChildCarthed findOneByInvdate(string $invdate) Return the first ChildCarthed filtered by the invdate column
 * @method     ChildCarthed findOneByShipdate(string $shipdate) Return the first ChildCarthed filtered by the shipdate column
 * @method     ChildCarthed findOneByHasdocuments(string $hasdocuments) Return the first ChildCarthed filtered by the hasdocuments column
 * @method     ChildCarthed findOneByHastracking(string $hastracking) Return the first ChildCarthed filtered by the hastracking column
 * @method     ChildCarthed findOneBySubtotal(string $subtotal) Return the first ChildCarthed filtered by the subtotal column
 * @method     ChildCarthed findOneBySalestax(string $salestax) Return the first ChildCarthed filtered by the salestax column
 * @method     ChildCarthed findOneByFreight(string $freight) Return the first ChildCarthed filtered by the freight column
 * @method     ChildCarthed findOneByMisccost(string $misccost) Return the first ChildCarthed filtered by the misccost column
 * @method     ChildCarthed findOneByOrdertotal(string $ordertotal) Return the first ChildCarthed filtered by the ordertotal column
 * @method     ChildCarthed findOneByHasnotes(string $hasnotes) Return the first ChildCarthed filtered by the hasnotes column
 * @method     ChildCarthed findOneByEditord(string $editord) Return the first ChildCarthed filtered by the editord column
 * @method     ChildCarthed findOneByError(string $error) Return the first ChildCarthed filtered by the error column
 * @method     ChildCarthed findOneByErrormsg(string $errormsg) Return the first ChildCarthed filtered by the errormsg column
 * @method     ChildCarthed findOneBySconame(string $sconame) Return the first ChildCarthed filtered by the sconame column
 * @method     ChildCarthed findOneByShipname(string $shipname) Return the first ChildCarthed filtered by the shipname column
 * @method     ChildCarthed findOneByShipaddress(string $shipaddress) Return the first ChildCarthed filtered by the shipaddress column
 * @method     ChildCarthed findOneByShipaddress2(string $shipaddress2) Return the first ChildCarthed filtered by the shipaddress2 column
 * @method     ChildCarthed findOneByShipcity(string $shipcity) Return the first ChildCarthed filtered by the shipcity column
 * @method     ChildCarthed findOneByShipstate(string $shipstate) Return the first ChildCarthed filtered by the shipstate column
 * @method     ChildCarthed findOneByShipzip(string $shipzip) Return the first ChildCarthed filtered by the shipzip column
 * @method     ChildCarthed findOneByShipcountry(string $shipcountry) Return the first ChildCarthed filtered by the shipcountry column
 * @method     ChildCarthed findOneByContact(string $contact) Return the first ChildCarthed filtered by the contact column
 * @method     ChildCarthed findOneByPhintl(string $phintl) Return the first ChildCarthed filtered by the phintl column
 * @method     ChildCarthed findOneByPhone(string $phone) Return the first ChildCarthed filtered by the phone column
 * @method     ChildCarthed findOneByExtension(string $extension) Return the first ChildCarthed filtered by the extension column
 * @method     ChildCarthed findOneByFaxnbr(string $faxnbr) Return the first ChildCarthed filtered by the faxnbr column
 * @method     ChildCarthed findOneByEmail(string $email) Return the first ChildCarthed filtered by the email column
 * @method     ChildCarthed findOneByReleasenbr(string $releasenbr) Return the first ChildCarthed filtered by the releasenbr column
 * @method     ChildCarthed findOneByShipviacd(string $shipviacd) Return the first ChildCarthed filtered by the shipviacd column
 * @method     ChildCarthed findOneByShipviadesc(string $shipviadesc) Return the first ChildCarthed filtered by the shipviadesc column
 * @method     ChildCarthed findOneByTermcode(string $termcode) Return the first ChildCarthed filtered by the termcode column
 * @method     ChildCarthed findOneByTermtype(string $termtype) Return the first ChildCarthed filtered by the termtype column
 * @method     ChildCarthed findOneByTermdesc(string $termdesc) Return the first ChildCarthed filtered by the termdesc column
 * @method     ChildCarthed findOneByRqstdate(string $rqstdate) Return the first ChildCarthed filtered by the rqstdate column
 * @method     ChildCarthed findOneByShipcom(string $shipcom) Return the first ChildCarthed filtered by the shipcom column
 * @method     ChildCarthed findOneBySp1(string $sp1) Return the first ChildCarthed filtered by the sp1 column
 * @method     ChildCarthed findOneBySp1name(string $sp1name) Return the first ChildCarthed filtered by the sp1name column
 * @method     ChildCarthed findOneByCardnumber(string $cardnumber) Return the first ChildCarthed filtered by the cardnumber column
 * @method     ChildCarthed findOneByCardexpire(string $cardexpire) Return the first ChildCarthed filtered by the cardexpire column
 * @method     ChildCarthed findOneByCardcode(string $cardcode) Return the first ChildCarthed filtered by the cardcode column
 * @method     ChildCarthed findOneByCardapproval(string $cardapproval) Return the first ChildCarthed filtered by the cardapproval column
 * @method     ChildCarthed findOneByTotalcost(string $totalcost) Return the first ChildCarthed filtered by the totalcost column
 * @method     ChildCarthed findOneByTotaldiscount(string $totaldiscount) Return the first ChildCarthed filtered by the totaldiscount column
 * @method     ChildCarthed findOneByPaymenttype(string $paymenttype) Return the first ChildCarthed filtered by the paymenttype column
 * @method     ChildCarthed findOneBySrcdatefrom(string $srcdatefrom) Return the first ChildCarthed filtered by the srcdatefrom column
 * @method     ChildCarthed findOneBySrcdatethru(string $srcdatethru) Return the first ChildCarthed filtered by the srcdatethru column
 * @method     ChildCarthed findOneByDummy(string $dummy) Return the first ChildCarthed filtered by the dummy column *

 * @method     ChildCarthed requirePk($key, ConnectionInterface $con = null) Return the ChildCarthed by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOne(ConnectionInterface $con = null) Return the first ChildCarthed matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCarthed requireOneBySessionid(string $sessionid) Return the first ChildCarthed filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByRecno(int $recno) Return the first ChildCarthed filtered by the recno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByDate(int $date) Return the first ChildCarthed filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByTime(int $time) Return the first ChildCarthed filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByCustid(string $custid) Return the first ChildCarthed filtered by the custid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByShiptoid(string $shiptoid) Return the first ChildCarthed filtered by the shiptoid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByCustname(string $custname) Return the first ChildCarthed filtered by the custname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByOrderno(string $orderno) Return the first ChildCarthed filtered by the orderno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByCustpo(string $custpo) Return the first ChildCarthed filtered by the custpo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByStatus(string $status) Return the first ChildCarthed filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByOrderdate(string $orderdate) Return the first ChildCarthed filtered by the orderdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByInvdate(string $invdate) Return the first ChildCarthed filtered by the invdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByShipdate(string $shipdate) Return the first ChildCarthed filtered by the shipdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByHasdocuments(string $hasdocuments) Return the first ChildCarthed filtered by the hasdocuments column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByHastracking(string $hastracking) Return the first ChildCarthed filtered by the hastracking column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneBySubtotal(string $subtotal) Return the first ChildCarthed filtered by the subtotal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneBySalestax(string $salestax) Return the first ChildCarthed filtered by the salestax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByFreight(string $freight) Return the first ChildCarthed filtered by the freight column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByMisccost(string $misccost) Return the first ChildCarthed filtered by the misccost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByOrdertotal(string $ordertotal) Return the first ChildCarthed filtered by the ordertotal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByHasnotes(string $hasnotes) Return the first ChildCarthed filtered by the hasnotes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByEditord(string $editord) Return the first ChildCarthed filtered by the editord column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByError(string $error) Return the first ChildCarthed filtered by the error column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByErrormsg(string $errormsg) Return the first ChildCarthed filtered by the errormsg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneBySconame(string $sconame) Return the first ChildCarthed filtered by the sconame column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByShipname(string $shipname) Return the first ChildCarthed filtered by the shipname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByShipaddress(string $shipaddress) Return the first ChildCarthed filtered by the shipaddress column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByShipaddress2(string $shipaddress2) Return the first ChildCarthed filtered by the shipaddress2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByShipcity(string $shipcity) Return the first ChildCarthed filtered by the shipcity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByShipstate(string $shipstate) Return the first ChildCarthed filtered by the shipstate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByShipzip(string $shipzip) Return the first ChildCarthed filtered by the shipzip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByShipcountry(string $shipcountry) Return the first ChildCarthed filtered by the shipcountry column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByContact(string $contact) Return the first ChildCarthed filtered by the contact column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByPhintl(string $phintl) Return the first ChildCarthed filtered by the phintl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByPhone(string $phone) Return the first ChildCarthed filtered by the phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByExtension(string $extension) Return the first ChildCarthed filtered by the extension column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByFaxnbr(string $faxnbr) Return the first ChildCarthed filtered by the faxnbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByEmail(string $email) Return the first ChildCarthed filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByReleasenbr(string $releasenbr) Return the first ChildCarthed filtered by the releasenbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByShipviacd(string $shipviacd) Return the first ChildCarthed filtered by the shipviacd column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByShipviadesc(string $shipviadesc) Return the first ChildCarthed filtered by the shipviadesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByTermcode(string $termcode) Return the first ChildCarthed filtered by the termcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByTermtype(string $termtype) Return the first ChildCarthed filtered by the termtype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByTermdesc(string $termdesc) Return the first ChildCarthed filtered by the termdesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByRqstdate(string $rqstdate) Return the first ChildCarthed filtered by the rqstdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByShipcom(string $shipcom) Return the first ChildCarthed filtered by the shipcom column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneBySp1(string $sp1) Return the first ChildCarthed filtered by the sp1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneBySp1name(string $sp1name) Return the first ChildCarthed filtered by the sp1name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByCardnumber(string $cardnumber) Return the first ChildCarthed filtered by the cardnumber column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByCardexpire(string $cardexpire) Return the first ChildCarthed filtered by the cardexpire column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByCardcode(string $cardcode) Return the first ChildCarthed filtered by the cardcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByCardapproval(string $cardapproval) Return the first ChildCarthed filtered by the cardapproval column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByTotalcost(string $totalcost) Return the first ChildCarthed filtered by the totalcost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByTotaldiscount(string $totaldiscount) Return the first ChildCarthed filtered by the totaldiscount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByPaymenttype(string $paymenttype) Return the first ChildCarthed filtered by the paymenttype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneBySrcdatefrom(string $srcdatefrom) Return the first ChildCarthed filtered by the srcdatefrom column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneBySrcdatethru(string $srcdatethru) Return the first ChildCarthed filtered by the srcdatethru column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCarthed requireOneByDummy(string $dummy) Return the first ChildCarthed filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCarthed[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCarthed objects based on current ModelCriteria
 * @method     ChildCarthed[]|ObjectCollection findBySessionid(string $sessionid) Return ChildCarthed objects filtered by the sessionid column
 * @method     ChildCarthed[]|ObjectCollection findByRecno(int $recno) Return ChildCarthed objects filtered by the recno column
 * @method     ChildCarthed[]|ObjectCollection findByDate(int $date) Return ChildCarthed objects filtered by the date column
 * @method     ChildCarthed[]|ObjectCollection findByTime(int $time) Return ChildCarthed objects filtered by the time column
 * @method     ChildCarthed[]|ObjectCollection findByCustid(string $custid) Return ChildCarthed objects filtered by the custid column
 * @method     ChildCarthed[]|ObjectCollection findByShiptoid(string $shiptoid) Return ChildCarthed objects filtered by the shiptoid column
 * @method     ChildCarthed[]|ObjectCollection findByCustname(string $custname) Return ChildCarthed objects filtered by the custname column
 * @method     ChildCarthed[]|ObjectCollection findByOrderno(string $orderno) Return ChildCarthed objects filtered by the orderno column
 * @method     ChildCarthed[]|ObjectCollection findByCustpo(string $custpo) Return ChildCarthed objects filtered by the custpo column
 * @method     ChildCarthed[]|ObjectCollection findByStatus(string $status) Return ChildCarthed objects filtered by the status column
 * @method     ChildCarthed[]|ObjectCollection findByOrderdate(string $orderdate) Return ChildCarthed objects filtered by the orderdate column
 * @method     ChildCarthed[]|ObjectCollection findByInvdate(string $invdate) Return ChildCarthed objects filtered by the invdate column
 * @method     ChildCarthed[]|ObjectCollection findByShipdate(string $shipdate) Return ChildCarthed objects filtered by the shipdate column
 * @method     ChildCarthed[]|ObjectCollection findByHasdocuments(string $hasdocuments) Return ChildCarthed objects filtered by the hasdocuments column
 * @method     ChildCarthed[]|ObjectCollection findByHastracking(string $hastracking) Return ChildCarthed objects filtered by the hastracking column
 * @method     ChildCarthed[]|ObjectCollection findBySubtotal(string $subtotal) Return ChildCarthed objects filtered by the subtotal column
 * @method     ChildCarthed[]|ObjectCollection findBySalestax(string $salestax) Return ChildCarthed objects filtered by the salestax column
 * @method     ChildCarthed[]|ObjectCollection findByFreight(string $freight) Return ChildCarthed objects filtered by the freight column
 * @method     ChildCarthed[]|ObjectCollection findByMisccost(string $misccost) Return ChildCarthed objects filtered by the misccost column
 * @method     ChildCarthed[]|ObjectCollection findByOrdertotal(string $ordertotal) Return ChildCarthed objects filtered by the ordertotal column
 * @method     ChildCarthed[]|ObjectCollection findByHasnotes(string $hasnotes) Return ChildCarthed objects filtered by the hasnotes column
 * @method     ChildCarthed[]|ObjectCollection findByEditord(string $editord) Return ChildCarthed objects filtered by the editord column
 * @method     ChildCarthed[]|ObjectCollection findByError(string $error) Return ChildCarthed objects filtered by the error column
 * @method     ChildCarthed[]|ObjectCollection findByErrormsg(string $errormsg) Return ChildCarthed objects filtered by the errormsg column
 * @method     ChildCarthed[]|ObjectCollection findBySconame(string $sconame) Return ChildCarthed objects filtered by the sconame column
 * @method     ChildCarthed[]|ObjectCollection findByShipname(string $shipname) Return ChildCarthed objects filtered by the shipname column
 * @method     ChildCarthed[]|ObjectCollection findByShipaddress(string $shipaddress) Return ChildCarthed objects filtered by the shipaddress column
 * @method     ChildCarthed[]|ObjectCollection findByShipaddress2(string $shipaddress2) Return ChildCarthed objects filtered by the shipaddress2 column
 * @method     ChildCarthed[]|ObjectCollection findByShipcity(string $shipcity) Return ChildCarthed objects filtered by the shipcity column
 * @method     ChildCarthed[]|ObjectCollection findByShipstate(string $shipstate) Return ChildCarthed objects filtered by the shipstate column
 * @method     ChildCarthed[]|ObjectCollection findByShipzip(string $shipzip) Return ChildCarthed objects filtered by the shipzip column
 * @method     ChildCarthed[]|ObjectCollection findByShipcountry(string $shipcountry) Return ChildCarthed objects filtered by the shipcountry column
 * @method     ChildCarthed[]|ObjectCollection findByContact(string $contact) Return ChildCarthed objects filtered by the contact column
 * @method     ChildCarthed[]|ObjectCollection findByPhintl(string $phintl) Return ChildCarthed objects filtered by the phintl column
 * @method     ChildCarthed[]|ObjectCollection findByPhone(string $phone) Return ChildCarthed objects filtered by the phone column
 * @method     ChildCarthed[]|ObjectCollection findByExtension(string $extension) Return ChildCarthed objects filtered by the extension column
 * @method     ChildCarthed[]|ObjectCollection findByFaxnbr(string $faxnbr) Return ChildCarthed objects filtered by the faxnbr column
 * @method     ChildCarthed[]|ObjectCollection findByEmail(string $email) Return ChildCarthed objects filtered by the email column
 * @method     ChildCarthed[]|ObjectCollection findByReleasenbr(string $releasenbr) Return ChildCarthed objects filtered by the releasenbr column
 * @method     ChildCarthed[]|ObjectCollection findByShipviacd(string $shipviacd) Return ChildCarthed objects filtered by the shipviacd column
 * @method     ChildCarthed[]|ObjectCollection findByShipviadesc(string $shipviadesc) Return ChildCarthed objects filtered by the shipviadesc column
 * @method     ChildCarthed[]|ObjectCollection findByTermcode(string $termcode) Return ChildCarthed objects filtered by the termcode column
 * @method     ChildCarthed[]|ObjectCollection findByTermtype(string $termtype) Return ChildCarthed objects filtered by the termtype column
 * @method     ChildCarthed[]|ObjectCollection findByTermdesc(string $termdesc) Return ChildCarthed objects filtered by the termdesc column
 * @method     ChildCarthed[]|ObjectCollection findByRqstdate(string $rqstdate) Return ChildCarthed objects filtered by the rqstdate column
 * @method     ChildCarthed[]|ObjectCollection findByShipcom(string $shipcom) Return ChildCarthed objects filtered by the shipcom column
 * @method     ChildCarthed[]|ObjectCollection findBySp1(string $sp1) Return ChildCarthed objects filtered by the sp1 column
 * @method     ChildCarthed[]|ObjectCollection findBySp1name(string $sp1name) Return ChildCarthed objects filtered by the sp1name column
 * @method     ChildCarthed[]|ObjectCollection findByCardnumber(string $cardnumber) Return ChildCarthed objects filtered by the cardnumber column
 * @method     ChildCarthed[]|ObjectCollection findByCardexpire(string $cardexpire) Return ChildCarthed objects filtered by the cardexpire column
 * @method     ChildCarthed[]|ObjectCollection findByCardcode(string $cardcode) Return ChildCarthed objects filtered by the cardcode column
 * @method     ChildCarthed[]|ObjectCollection findByCardapproval(string $cardapproval) Return ChildCarthed objects filtered by the cardapproval column
 * @method     ChildCarthed[]|ObjectCollection findByTotalcost(string $totalcost) Return ChildCarthed objects filtered by the totalcost column
 * @method     ChildCarthed[]|ObjectCollection findByTotaldiscount(string $totaldiscount) Return ChildCarthed objects filtered by the totaldiscount column
 * @method     ChildCarthed[]|ObjectCollection findByPaymenttype(string $paymenttype) Return ChildCarthed objects filtered by the paymenttype column
 * @method     ChildCarthed[]|ObjectCollection findBySrcdatefrom(string $srcdatefrom) Return ChildCarthed objects filtered by the srcdatefrom column
 * @method     ChildCarthed[]|ObjectCollection findBySrcdatethru(string $srcdatethru) Return ChildCarthed objects filtered by the srcdatethru column
 * @method     ChildCarthed[]|ObjectCollection findByDummy(string $dummy) Return ChildCarthed objects filtered by the dummy column
 * @method     ChildCarthed[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CarthedQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CarthedQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Carthed', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCarthedQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCarthedQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCarthedQuery) {
            return $criteria;
        }
        $query = new ChildCarthedQuery();
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
     * @return ChildCarthed|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CarthedTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CarthedTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildCarthed A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, recno, date, time, custid, shiptoid, custname, orderno, custpo, status, orderdate, invdate, shipdate, hasdocuments, hastracking, subtotal, salestax, freight, misccost, ordertotal, hasnotes, editord, error, errormsg, sconame, shipname, shipaddress, shipaddress2, shipcity, shipstate, shipzip, shipcountry, contact, phintl, phone, extension, faxnbr, email, releasenbr, shipviacd, shipviadesc, termcode, termtype, termdesc, rqstdate, shipcom, sp1, sp1name, cardnumber, cardexpire, cardcode, cardapproval, totalcost, totaldiscount, paymenttype, srcdatefrom, srcdatethru, dummy FROM carthed WHERE sessionid = :p0 AND recno = :p1';
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
            /** @var ChildCarthed $obj */
            $obj = new ChildCarthed();
            $obj->hydrate($row);
            CarthedTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildCarthed|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(CarthedTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(CarthedTableMap::COL_RECNO, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(CarthedTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(CarthedTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
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
     * </code>
     *
     * @param     string $sessionid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_SESSIONID, $sessionid, $comparison);
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
     * @param     mixed $recno The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByRecno($recno = null, $comparison = null)
    {
        if (is_array($recno)) {
            $useMinMax = false;
            if (isset($recno['min'])) {
                $this->addUsingAlias(CarthedTableMap::COL_RECNO, $recno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recno['max'])) {
                $this->addUsingAlias(CarthedTableMap::COL_RECNO, $recno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_RECNO, $recno, $comparison);
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
     * @param     mixed $date The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(CarthedTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(CarthedTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_DATE, $date, $comparison);
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
     * @param     mixed $time The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(CarthedTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(CarthedTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_TIME, $time, $comparison);
    }

    /**
     * Filter the query on the custid column
     *
     * Example usage:
     * <code>
     * $query->filterByCustid('fooValue');   // WHERE custid = 'fooValue'
     * $query->filterByCustid('%fooValue%', Criteria::LIKE); // WHERE custid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $custid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByCustid($custid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_CUSTID, $custid, $comparison);
    }

    /**
     * Filter the query on the shiptoid column
     *
     * Example usage:
     * <code>
     * $query->filterByShiptoid('fooValue');   // WHERE shiptoid = 'fooValue'
     * $query->filterByShiptoid('%fooValue%', Criteria::LIKE); // WHERE shiptoid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shiptoid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByShiptoid($shiptoid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shiptoid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_SHIPTOID, $shiptoid, $comparison);
    }

    /**
     * Filter the query on the custname column
     *
     * Example usage:
     * <code>
     * $query->filterByCustname('fooValue');   // WHERE custname = 'fooValue'
     * $query->filterByCustname('%fooValue%', Criteria::LIKE); // WHERE custname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $custname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByCustname($custname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_CUSTNAME, $custname, $comparison);
    }

    /**
     * Filter the query on the orderno column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderno('fooValue');   // WHERE orderno = 'fooValue'
     * $query->filterByOrderno('%fooValue%', Criteria::LIKE); // WHERE orderno LIKE '%fooValue%'
     * </code>
     *
     * @param     string $orderno The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByOrderno($orderno = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($orderno)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_ORDERNO, $orderno, $comparison);
    }

    /**
     * Filter the query on the custpo column
     *
     * Example usage:
     * <code>
     * $query->filterByCustpo('fooValue');   // WHERE custpo = 'fooValue'
     * $query->filterByCustpo('%fooValue%', Criteria::LIKE); // WHERE custpo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $custpo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByCustpo($custpo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custpo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_CUSTPO, $custpo, $comparison);
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
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the orderdate column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderdate('fooValue');   // WHERE orderdate = 'fooValue'
     * $query->filterByOrderdate('%fooValue%', Criteria::LIKE); // WHERE orderdate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $orderdate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByOrderdate($orderdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($orderdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_ORDERDATE, $orderdate, $comparison);
    }

    /**
     * Filter the query on the invdate column
     *
     * Example usage:
     * <code>
     * $query->filterByInvdate('fooValue');   // WHERE invdate = 'fooValue'
     * $query->filterByInvdate('%fooValue%', Criteria::LIKE); // WHERE invdate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $invdate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByInvdate($invdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($invdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_INVDATE, $invdate, $comparison);
    }

    /**
     * Filter the query on the shipdate column
     *
     * Example usage:
     * <code>
     * $query->filterByShipdate('fooValue');   // WHERE shipdate = 'fooValue'
     * $query->filterByShipdate('%fooValue%', Criteria::LIKE); // WHERE shipdate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shipdate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByShipdate($shipdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_SHIPDATE, $shipdate, $comparison);
    }

    /**
     * Filter the query on the hasdocuments column
     *
     * Example usage:
     * <code>
     * $query->filterByHasdocuments('fooValue');   // WHERE hasdocuments = 'fooValue'
     * $query->filterByHasdocuments('%fooValue%', Criteria::LIKE); // WHERE hasdocuments LIKE '%fooValue%'
     * </code>
     *
     * @param     string $hasdocuments The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByHasdocuments($hasdocuments = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hasdocuments)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_HASDOCUMENTS, $hasdocuments, $comparison);
    }

    /**
     * Filter the query on the hastracking column
     *
     * Example usage:
     * <code>
     * $query->filterByHastracking('fooValue');   // WHERE hastracking = 'fooValue'
     * $query->filterByHastracking('%fooValue%', Criteria::LIKE); // WHERE hastracking LIKE '%fooValue%'
     * </code>
     *
     * @param     string $hastracking The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByHastracking($hastracking = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hastracking)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_HASTRACKING, $hastracking, $comparison);
    }

    /**
     * Filter the query on the subtotal column
     *
     * Example usage:
     * <code>
     * $query->filterBySubtotal('fooValue');   // WHERE subtotal = 'fooValue'
     * $query->filterBySubtotal('%fooValue%', Criteria::LIKE); // WHERE subtotal LIKE '%fooValue%'
     * </code>
     *
     * @param     string $subtotal The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterBySubtotal($subtotal = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($subtotal)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_SUBTOTAL, $subtotal, $comparison);
    }

    /**
     * Filter the query on the salestax column
     *
     * Example usage:
     * <code>
     * $query->filterBySalestax('fooValue');   // WHERE salestax = 'fooValue'
     * $query->filterBySalestax('%fooValue%', Criteria::LIKE); // WHERE salestax LIKE '%fooValue%'
     * </code>
     *
     * @param     string $salestax The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterBySalestax($salestax = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($salestax)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_SALESTAX, $salestax, $comparison);
    }

    /**
     * Filter the query on the freight column
     *
     * Example usage:
     * <code>
     * $query->filterByFreight('fooValue');   // WHERE freight = 'fooValue'
     * $query->filterByFreight('%fooValue%', Criteria::LIKE); // WHERE freight LIKE '%fooValue%'
     * </code>
     *
     * @param     string $freight The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByFreight($freight = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($freight)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_FREIGHT, $freight, $comparison);
    }

    /**
     * Filter the query on the misccost column
     *
     * Example usage:
     * <code>
     * $query->filterByMisccost('fooValue');   // WHERE misccost = 'fooValue'
     * $query->filterByMisccost('%fooValue%', Criteria::LIKE); // WHERE misccost LIKE '%fooValue%'
     * </code>
     *
     * @param     string $misccost The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByMisccost($misccost = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($misccost)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_MISCCOST, $misccost, $comparison);
    }

    /**
     * Filter the query on the ordertotal column
     *
     * Example usage:
     * <code>
     * $query->filterByOrdertotal('fooValue');   // WHERE ordertotal = 'fooValue'
     * $query->filterByOrdertotal('%fooValue%', Criteria::LIKE); // WHERE ordertotal LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ordertotal The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByOrdertotal($ordertotal = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ordertotal)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_ORDERTOTAL, $ordertotal, $comparison);
    }

    /**
     * Filter the query on the hasnotes column
     *
     * Example usage:
     * <code>
     * $query->filterByHasnotes('fooValue');   // WHERE hasnotes = 'fooValue'
     * $query->filterByHasnotes('%fooValue%', Criteria::LIKE); // WHERE hasnotes LIKE '%fooValue%'
     * </code>
     *
     * @param     string $hasnotes The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByHasnotes($hasnotes = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hasnotes)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_HASNOTES, $hasnotes, $comparison);
    }

    /**
     * Filter the query on the editord column
     *
     * Example usage:
     * <code>
     * $query->filterByEditord('fooValue');   // WHERE editord = 'fooValue'
     * $query->filterByEditord('%fooValue%', Criteria::LIKE); // WHERE editord LIKE '%fooValue%'
     * </code>
     *
     * @param     string $editord The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByEditord($editord = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($editord)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_EDITORD, $editord, $comparison);
    }

    /**
     * Filter the query on the error column
     *
     * Example usage:
     * <code>
     * $query->filterByError('fooValue');   // WHERE error = 'fooValue'
     * $query->filterByError('%fooValue%', Criteria::LIKE); // WHERE error LIKE '%fooValue%'
     * </code>
     *
     * @param     string $error The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByError($error = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($error)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_ERROR, $error, $comparison);
    }

    /**
     * Filter the query on the errormsg column
     *
     * Example usage:
     * <code>
     * $query->filterByErrormsg('fooValue');   // WHERE errormsg = 'fooValue'
     * $query->filterByErrormsg('%fooValue%', Criteria::LIKE); // WHERE errormsg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $errormsg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByErrormsg($errormsg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($errormsg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_ERRORMSG, $errormsg, $comparison);
    }

    /**
     * Filter the query on the sconame column
     *
     * Example usage:
     * <code>
     * $query->filterBySconame('fooValue');   // WHERE sconame = 'fooValue'
     * $query->filterBySconame('%fooValue%', Criteria::LIKE); // WHERE sconame LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sconame The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterBySconame($sconame = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sconame)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_SCONAME, $sconame, $comparison);
    }

    /**
     * Filter the query on the shipname column
     *
     * Example usage:
     * <code>
     * $query->filterByShipname('fooValue');   // WHERE shipname = 'fooValue'
     * $query->filterByShipname('%fooValue%', Criteria::LIKE); // WHERE shipname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shipname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByShipname($shipname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_SHIPNAME, $shipname, $comparison);
    }

    /**
     * Filter the query on the shipaddress column
     *
     * Example usage:
     * <code>
     * $query->filterByShipaddress('fooValue');   // WHERE shipaddress = 'fooValue'
     * $query->filterByShipaddress('%fooValue%', Criteria::LIKE); // WHERE shipaddress LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shipaddress The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByShipaddress($shipaddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipaddress)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_SHIPADDRESS, $shipaddress, $comparison);
    }

    /**
     * Filter the query on the shipaddress2 column
     *
     * Example usage:
     * <code>
     * $query->filterByShipaddress2('fooValue');   // WHERE shipaddress2 = 'fooValue'
     * $query->filterByShipaddress2('%fooValue%', Criteria::LIKE); // WHERE shipaddress2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shipaddress2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByShipaddress2($shipaddress2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipaddress2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_SHIPADDRESS2, $shipaddress2, $comparison);
    }

    /**
     * Filter the query on the shipcity column
     *
     * Example usage:
     * <code>
     * $query->filterByShipcity('fooValue');   // WHERE shipcity = 'fooValue'
     * $query->filterByShipcity('%fooValue%', Criteria::LIKE); // WHERE shipcity LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shipcity The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByShipcity($shipcity = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipcity)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_SHIPCITY, $shipcity, $comparison);
    }

    /**
     * Filter the query on the shipstate column
     *
     * Example usage:
     * <code>
     * $query->filterByShipstate('fooValue');   // WHERE shipstate = 'fooValue'
     * $query->filterByShipstate('%fooValue%', Criteria::LIKE); // WHERE shipstate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shipstate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByShipstate($shipstate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipstate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_SHIPSTATE, $shipstate, $comparison);
    }

    /**
     * Filter the query on the shipzip column
     *
     * Example usage:
     * <code>
     * $query->filterByShipzip('fooValue');   // WHERE shipzip = 'fooValue'
     * $query->filterByShipzip('%fooValue%', Criteria::LIKE); // WHERE shipzip LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shipzip The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByShipzip($shipzip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipzip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_SHIPZIP, $shipzip, $comparison);
    }

    /**
     * Filter the query on the shipcountry column
     *
     * Example usage:
     * <code>
     * $query->filterByShipcountry('fooValue');   // WHERE shipcountry = 'fooValue'
     * $query->filterByShipcountry('%fooValue%', Criteria::LIKE); // WHERE shipcountry LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shipcountry The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByShipcountry($shipcountry = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipcountry)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_SHIPCOUNTRY, $shipcountry, $comparison);
    }

    /**
     * Filter the query on the contact column
     *
     * Example usage:
     * <code>
     * $query->filterByContact('fooValue');   // WHERE contact = 'fooValue'
     * $query->filterByContact('%fooValue%', Criteria::LIKE); // WHERE contact LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contact The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByContact($contact = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contact)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_CONTACT, $contact, $comparison);
    }

    /**
     * Filter the query on the phintl column
     *
     * Example usage:
     * <code>
     * $query->filterByPhintl('fooValue');   // WHERE phintl = 'fooValue'
     * $query->filterByPhintl('%fooValue%', Criteria::LIKE); // WHERE phintl LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phintl The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByPhintl($phintl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phintl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_PHINTL, $phintl, $comparison);
    }

    /**
     * Filter the query on the phone column
     *
     * Example usage:
     * <code>
     * $query->filterByPhone('fooValue');   // WHERE phone = 'fooValue'
     * $query->filterByPhone('%fooValue%', Criteria::LIKE); // WHERE phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phone The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByPhone($phone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_PHONE, $phone, $comparison);
    }

    /**
     * Filter the query on the extension column
     *
     * Example usage:
     * <code>
     * $query->filterByExtension('fooValue');   // WHERE extension = 'fooValue'
     * $query->filterByExtension('%fooValue%', Criteria::LIKE); // WHERE extension LIKE '%fooValue%'
     * </code>
     *
     * @param     string $extension The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByExtension($extension = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($extension)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_EXTENSION, $extension, $comparison);
    }

    /**
     * Filter the query on the faxnbr column
     *
     * Example usage:
     * <code>
     * $query->filterByFaxnbr('fooValue');   // WHERE faxnbr = 'fooValue'
     * $query->filterByFaxnbr('%fooValue%', Criteria::LIKE); // WHERE faxnbr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $faxnbr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByFaxnbr($faxnbr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($faxnbr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_FAXNBR, $faxnbr, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the releasenbr column
     *
     * Example usage:
     * <code>
     * $query->filterByReleasenbr('fooValue');   // WHERE releasenbr = 'fooValue'
     * $query->filterByReleasenbr('%fooValue%', Criteria::LIKE); // WHERE releasenbr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $releasenbr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByReleasenbr($releasenbr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($releasenbr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_RELEASENBR, $releasenbr, $comparison);
    }

    /**
     * Filter the query on the shipviacd column
     *
     * Example usage:
     * <code>
     * $query->filterByShipviacd('fooValue');   // WHERE shipviacd = 'fooValue'
     * $query->filterByShipviacd('%fooValue%', Criteria::LIKE); // WHERE shipviacd LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shipviacd The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByShipviacd($shipviacd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipviacd)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_SHIPVIACD, $shipviacd, $comparison);
    }

    /**
     * Filter the query on the shipviadesc column
     *
     * Example usage:
     * <code>
     * $query->filterByShipviadesc('fooValue');   // WHERE shipviadesc = 'fooValue'
     * $query->filterByShipviadesc('%fooValue%', Criteria::LIKE); // WHERE shipviadesc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shipviadesc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByShipviadesc($shipviadesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipviadesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_SHIPVIADESC, $shipviadesc, $comparison);
    }

    /**
     * Filter the query on the termcode column
     *
     * Example usage:
     * <code>
     * $query->filterByTermcode('fooValue');   // WHERE termcode = 'fooValue'
     * $query->filterByTermcode('%fooValue%', Criteria::LIKE); // WHERE termcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $termcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByTermcode($termcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($termcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_TERMCODE, $termcode, $comparison);
    }

    /**
     * Filter the query on the termtype column
     *
     * Example usage:
     * <code>
     * $query->filterByTermtype('fooValue');   // WHERE termtype = 'fooValue'
     * $query->filterByTermtype('%fooValue%', Criteria::LIKE); // WHERE termtype LIKE '%fooValue%'
     * </code>
     *
     * @param     string $termtype The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByTermtype($termtype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($termtype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_TERMTYPE, $termtype, $comparison);
    }

    /**
     * Filter the query on the termdesc column
     *
     * Example usage:
     * <code>
     * $query->filterByTermdesc('fooValue');   // WHERE termdesc = 'fooValue'
     * $query->filterByTermdesc('%fooValue%', Criteria::LIKE); // WHERE termdesc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $termdesc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByTermdesc($termdesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($termdesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_TERMDESC, $termdesc, $comparison);
    }

    /**
     * Filter the query on the rqstdate column
     *
     * Example usage:
     * <code>
     * $query->filterByRqstdate('fooValue');   // WHERE rqstdate = 'fooValue'
     * $query->filterByRqstdate('%fooValue%', Criteria::LIKE); // WHERE rqstdate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rqstdate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByRqstdate($rqstdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rqstdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_RQSTDATE, $rqstdate, $comparison);
    }

    /**
     * Filter the query on the shipcom column
     *
     * Example usage:
     * <code>
     * $query->filterByShipcom('fooValue');   // WHERE shipcom = 'fooValue'
     * $query->filterByShipcom('%fooValue%', Criteria::LIKE); // WHERE shipcom LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shipcom The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByShipcom($shipcom = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipcom)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_SHIPCOM, $shipcom, $comparison);
    }

    /**
     * Filter the query on the sp1 column
     *
     * Example usage:
     * <code>
     * $query->filterBySp1('fooValue');   // WHERE sp1 = 'fooValue'
     * $query->filterBySp1('%fooValue%', Criteria::LIKE); // WHERE sp1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sp1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterBySp1($sp1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sp1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_SP1, $sp1, $comparison);
    }

    /**
     * Filter the query on the sp1name column
     *
     * Example usage:
     * <code>
     * $query->filterBySp1name('fooValue');   // WHERE sp1name = 'fooValue'
     * $query->filterBySp1name('%fooValue%', Criteria::LIKE); // WHERE sp1name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sp1name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterBySp1name($sp1name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sp1name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_SP1NAME, $sp1name, $comparison);
    }

    /**
     * Filter the query on the cardnumber column
     *
     * Example usage:
     * <code>
     * $query->filterByCardnumber('fooValue');   // WHERE cardnumber = 'fooValue'
     * $query->filterByCardnumber('%fooValue%', Criteria::LIKE); // WHERE cardnumber LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cardnumber The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByCardnumber($cardnumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cardnumber)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_CARDNUMBER, $cardnumber, $comparison);
    }

    /**
     * Filter the query on the cardexpire column
     *
     * Example usage:
     * <code>
     * $query->filterByCardexpire('fooValue');   // WHERE cardexpire = 'fooValue'
     * $query->filterByCardexpire('%fooValue%', Criteria::LIKE); // WHERE cardexpire LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cardexpire The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByCardexpire($cardexpire = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cardexpire)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_CARDEXPIRE, $cardexpire, $comparison);
    }

    /**
     * Filter the query on the cardcode column
     *
     * Example usage:
     * <code>
     * $query->filterByCardcode('fooValue');   // WHERE cardcode = 'fooValue'
     * $query->filterByCardcode('%fooValue%', Criteria::LIKE); // WHERE cardcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cardcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByCardcode($cardcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cardcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_CARDCODE, $cardcode, $comparison);
    }

    /**
     * Filter the query on the cardapproval column
     *
     * Example usage:
     * <code>
     * $query->filterByCardapproval('fooValue');   // WHERE cardapproval = 'fooValue'
     * $query->filterByCardapproval('%fooValue%', Criteria::LIKE); // WHERE cardapproval LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cardapproval The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByCardapproval($cardapproval = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cardapproval)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_CARDAPPROVAL, $cardapproval, $comparison);
    }

    /**
     * Filter the query on the totalcost column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalcost('fooValue');   // WHERE totalcost = 'fooValue'
     * $query->filterByTotalcost('%fooValue%', Criteria::LIKE); // WHERE totalcost LIKE '%fooValue%'
     * </code>
     *
     * @param     string $totalcost The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByTotalcost($totalcost = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($totalcost)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_TOTALCOST, $totalcost, $comparison);
    }

    /**
     * Filter the query on the totaldiscount column
     *
     * Example usage:
     * <code>
     * $query->filterByTotaldiscount('fooValue');   // WHERE totaldiscount = 'fooValue'
     * $query->filterByTotaldiscount('%fooValue%', Criteria::LIKE); // WHERE totaldiscount LIKE '%fooValue%'
     * </code>
     *
     * @param     string $totaldiscount The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByTotaldiscount($totaldiscount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($totaldiscount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_TOTALDISCOUNT, $totaldiscount, $comparison);
    }

    /**
     * Filter the query on the paymenttype column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymenttype('fooValue');   // WHERE paymenttype = 'fooValue'
     * $query->filterByPaymenttype('%fooValue%', Criteria::LIKE); // WHERE paymenttype LIKE '%fooValue%'
     * </code>
     *
     * @param     string $paymenttype The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByPaymenttype($paymenttype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($paymenttype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_PAYMENTTYPE, $paymenttype, $comparison);
    }

    /**
     * Filter the query on the srcdatefrom column
     *
     * Example usage:
     * <code>
     * $query->filterBySrcdatefrom('fooValue');   // WHERE srcdatefrom = 'fooValue'
     * $query->filterBySrcdatefrom('%fooValue%', Criteria::LIKE); // WHERE srcdatefrom LIKE '%fooValue%'
     * </code>
     *
     * @param     string $srcdatefrom The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterBySrcdatefrom($srcdatefrom = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($srcdatefrom)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_SRCDATEFROM, $srcdatefrom, $comparison);
    }

    /**
     * Filter the query on the srcdatethru column
     *
     * Example usage:
     * <code>
     * $query->filterBySrcdatethru('fooValue');   // WHERE srcdatethru = 'fooValue'
     * $query->filterBySrcdatethru('%fooValue%', Criteria::LIKE); // WHERE srcdatethru LIKE '%fooValue%'
     * </code>
     *
     * @param     string $srcdatethru The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterBySrcdatethru($srcdatethru = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($srcdatethru)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_SRCDATETHRU, $srcdatethru, $comparison);
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
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CarthedTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCarthed $carthed Object to remove from the list of results
     *
     * @return $this|ChildCarthedQuery The current query, for fluid interface
     */
    public function prune($carthed = null)
    {
        if ($carthed) {
            $this->addCond('pruneCond0', $this->getAliasedColName(CarthedTableMap::COL_SESSIONID), $carthed->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(CarthedTableMap::COL_RECNO), $carthed->getRecno(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the carthed table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CarthedTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CarthedTableMap::clearInstancePool();
            CarthedTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CarthedTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CarthedTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CarthedTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CarthedTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CarthedQuery
