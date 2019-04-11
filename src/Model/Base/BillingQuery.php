<?php

namespace Base;

use \Billing as ChildBilling;
use \BillingQuery as ChildBillingQuery;
use \Exception;
use \PDO;
use Map\BillingTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'billing' table.
 *
 *
 *
 * @method     ChildBillingQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildBillingQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildBillingQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildBillingQuery orderByBconame($order = Criteria::ASC) Order by the bconame column
 * @method     ChildBillingQuery orderByBaddress($order = Criteria::ASC) Order by the baddress column
 * @method     ChildBillingQuery orderByBaddress2($order = Criteria::ASC) Order by the baddress2 column
 * @method     ChildBillingQuery orderByBname($order = Criteria::ASC) Order by the bname column
 * @method     ChildBillingQuery orderByBcity($order = Criteria::ASC) Order by the bcity column
 * @method     ChildBillingQuery orderByBst($order = Criteria::ASC) Order by the bst column
 * @method     ChildBillingQuery orderByBzip($order = Criteria::ASC) Order by the bzip column
 * @method     ChildBillingQuery orderByBcountry($order = Criteria::ASC) Order by the bcountry column
 * @method     ChildBillingQuery orderBySconame($order = Criteria::ASC) Order by the sconame column
 * @method     ChildBillingQuery orderBySname($order = Criteria::ASC) Order by the sname column
 * @method     ChildBillingQuery orderBySaddress($order = Criteria::ASC) Order by the saddress column
 * @method     ChildBillingQuery orderBySaddress2($order = Criteria::ASC) Order by the saddress2 column
 * @method     ChildBillingQuery orderByScity($order = Criteria::ASC) Order by the scity column
 * @method     ChildBillingQuery orderBySst($order = Criteria::ASC) Order by the sst column
 * @method     ChildBillingQuery orderBySzip($order = Criteria::ASC) Order by the szip column
 * @method     ChildBillingQuery orderByScountry($order = Criteria::ASC) Order by the scountry column
 * @method     ChildBillingQuery orderByCcno($order = Criteria::ASC) Order by the ccno column
 * @method     ChildBillingQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildBillingQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     ChildBillingQuery orderByVc($order = Criteria::ASC) Order by the vc column
 * @method     ChildBillingQuery orderByError($order = Criteria::ASC) Order by the error column
 * @method     ChildBillingQuery orderByErmes($order = Criteria::ASC) Order by the ermes column
 * @method     ChildBillingQuery orderByOrders($order = Criteria::ASC) Order by the orders column
 * @method     ChildBillingQuery orderByXpdate($order = Criteria::ASC) Order by the xpdate column
 * @method     ChildBillingQuery orderByPono($order = Criteria::ASC) Order by the pono column
 * @method     ChildBillingQuery orderByPaymenttype($order = Criteria::ASC) Order by the paymenttype column
 * @method     ChildBillingQuery orderByShipmeth($order = Criteria::ASC) Order by the shipmeth column
 * @method     ChildBillingQuery orderByShipcom($order = Criteria::ASC) Order by the shipcom column
 * @method     ChildBillingQuery orderByNote($order = Criteria::ASC) Order by the note column
 * @method     ChildBillingQuery orderByTermtype($order = Criteria::ASC) Order by the termtype column
 * @method     ChildBillingQuery orderByCustid($order = Criteria::ASC) Order by the custid column
 * @method     ChildBillingQuery orderByShiptoid($order = Criteria::ASC) Order by the shiptoid column
 * @method     ChildBillingQuery orderByBaddress3($order = Criteria::ASC) Order by the baddress3 column
 * @method     ChildBillingQuery orderBySaddress3($order = Criteria::ASC) Order by the saddress3 column
 * @method     ChildBillingQuery orderByNewnbr($order = Criteria::ASC) Order by the newnbr column
 * @method     ChildBillingQuery orderByFaxnbr($order = Criteria::ASC) Order by the faxnbr column
 * @method     ChildBillingQuery orderByRqstdate($order = Criteria::ASC) Order by the rqstdate column
 * @method     ChildBillingQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildBillingQuery groupBySessionid() Group by the sessionid column
 * @method     ChildBillingQuery groupByDate() Group by the date column
 * @method     ChildBillingQuery groupByTime() Group by the time column
 * @method     ChildBillingQuery groupByBconame() Group by the bconame column
 * @method     ChildBillingQuery groupByBaddress() Group by the baddress column
 * @method     ChildBillingQuery groupByBaddress2() Group by the baddress2 column
 * @method     ChildBillingQuery groupByBname() Group by the bname column
 * @method     ChildBillingQuery groupByBcity() Group by the bcity column
 * @method     ChildBillingQuery groupByBst() Group by the bst column
 * @method     ChildBillingQuery groupByBzip() Group by the bzip column
 * @method     ChildBillingQuery groupByBcountry() Group by the bcountry column
 * @method     ChildBillingQuery groupBySconame() Group by the sconame column
 * @method     ChildBillingQuery groupBySname() Group by the sname column
 * @method     ChildBillingQuery groupBySaddress() Group by the saddress column
 * @method     ChildBillingQuery groupBySaddress2() Group by the saddress2 column
 * @method     ChildBillingQuery groupByScity() Group by the scity column
 * @method     ChildBillingQuery groupBySst() Group by the sst column
 * @method     ChildBillingQuery groupBySzip() Group by the szip column
 * @method     ChildBillingQuery groupByScountry() Group by the scountry column
 * @method     ChildBillingQuery groupByCcno() Group by the ccno column
 * @method     ChildBillingQuery groupByEmail() Group by the email column
 * @method     ChildBillingQuery groupByPhone() Group by the phone column
 * @method     ChildBillingQuery groupByVc() Group by the vc column
 * @method     ChildBillingQuery groupByError() Group by the error column
 * @method     ChildBillingQuery groupByErmes() Group by the ermes column
 * @method     ChildBillingQuery groupByOrders() Group by the orders column
 * @method     ChildBillingQuery groupByXpdate() Group by the xpdate column
 * @method     ChildBillingQuery groupByPono() Group by the pono column
 * @method     ChildBillingQuery groupByPaymenttype() Group by the paymenttype column
 * @method     ChildBillingQuery groupByShipmeth() Group by the shipmeth column
 * @method     ChildBillingQuery groupByShipcom() Group by the shipcom column
 * @method     ChildBillingQuery groupByNote() Group by the note column
 * @method     ChildBillingQuery groupByTermtype() Group by the termtype column
 * @method     ChildBillingQuery groupByCustid() Group by the custid column
 * @method     ChildBillingQuery groupByShiptoid() Group by the shiptoid column
 * @method     ChildBillingQuery groupByBaddress3() Group by the baddress3 column
 * @method     ChildBillingQuery groupBySaddress3() Group by the saddress3 column
 * @method     ChildBillingQuery groupByNewnbr() Group by the newnbr column
 * @method     ChildBillingQuery groupByFaxnbr() Group by the faxnbr column
 * @method     ChildBillingQuery groupByRqstdate() Group by the rqstdate column
 * @method     ChildBillingQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildBillingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildBillingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildBillingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildBillingQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildBillingQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildBillingQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildBilling findOne(ConnectionInterface $con = null) Return the first ChildBilling matching the query
 * @method     ChildBilling findOneOrCreate(ConnectionInterface $con = null) Return the first ChildBilling matching the query, or a new ChildBilling object populated from the query conditions when no match is found
 *
 * @method     ChildBilling findOneBySessionid(string $sessionid) Return the first ChildBilling filtered by the sessionid column
 * @method     ChildBilling findOneByDate(int $date) Return the first ChildBilling filtered by the date column
 * @method     ChildBilling findOneByTime(int $time) Return the first ChildBilling filtered by the time column
 * @method     ChildBilling findOneByBconame(string $bconame) Return the first ChildBilling filtered by the bconame column
 * @method     ChildBilling findOneByBaddress(string $baddress) Return the first ChildBilling filtered by the baddress column
 * @method     ChildBilling findOneByBaddress2(string $baddress2) Return the first ChildBilling filtered by the baddress2 column
 * @method     ChildBilling findOneByBname(string $bname) Return the first ChildBilling filtered by the bname column
 * @method     ChildBilling findOneByBcity(string $bcity) Return the first ChildBilling filtered by the bcity column
 * @method     ChildBilling findOneByBst(string $bst) Return the first ChildBilling filtered by the bst column
 * @method     ChildBilling findOneByBzip(string $bzip) Return the first ChildBilling filtered by the bzip column
 * @method     ChildBilling findOneByBcountry(string $bcountry) Return the first ChildBilling filtered by the bcountry column
 * @method     ChildBilling findOneBySconame(string $sconame) Return the first ChildBilling filtered by the sconame column
 * @method     ChildBilling findOneBySname(string $sname) Return the first ChildBilling filtered by the sname column
 * @method     ChildBilling findOneBySaddress(string $saddress) Return the first ChildBilling filtered by the saddress column
 * @method     ChildBilling findOneBySaddress2(string $saddress2) Return the first ChildBilling filtered by the saddress2 column
 * @method     ChildBilling findOneByScity(string $scity) Return the first ChildBilling filtered by the scity column
 * @method     ChildBilling findOneBySst(string $sst) Return the first ChildBilling filtered by the sst column
 * @method     ChildBilling findOneBySzip(string $szip) Return the first ChildBilling filtered by the szip column
 * @method     ChildBilling findOneByScountry(string $scountry) Return the first ChildBilling filtered by the scountry column
 * @method     ChildBilling findOneByCcno(string $ccno) Return the first ChildBilling filtered by the ccno column
 * @method     ChildBilling findOneByEmail(string $email) Return the first ChildBilling filtered by the email column
 * @method     ChildBilling findOneByPhone(string $phone) Return the first ChildBilling filtered by the phone column
 * @method     ChildBilling findOneByVc(string $vc) Return the first ChildBilling filtered by the vc column
 * @method     ChildBilling findOneByError(string $error) Return the first ChildBilling filtered by the error column
 * @method     ChildBilling findOneByErmes(string $ermes) Return the first ChildBilling filtered by the ermes column
 * @method     ChildBilling findOneByOrders(string $orders) Return the first ChildBilling filtered by the orders column
 * @method     ChildBilling findOneByXpdate(string $xpdate) Return the first ChildBilling filtered by the xpdate column
 * @method     ChildBilling findOneByPono(string $pono) Return the first ChildBilling filtered by the pono column
 * @method     ChildBilling findOneByPaymenttype(string $paymenttype) Return the first ChildBilling filtered by the paymenttype column
 * @method     ChildBilling findOneByShipmeth(string $shipmeth) Return the first ChildBilling filtered by the shipmeth column
 * @method     ChildBilling findOneByShipcom(string $shipcom) Return the first ChildBilling filtered by the shipcom column
 * @method     ChildBilling findOneByNote(string $note) Return the first ChildBilling filtered by the note column
 * @method     ChildBilling findOneByTermtype(string $termtype) Return the first ChildBilling filtered by the termtype column
 * @method     ChildBilling findOneByCustid(string $custid) Return the first ChildBilling filtered by the custid column
 * @method     ChildBilling findOneByShiptoid(string $shiptoid) Return the first ChildBilling filtered by the shiptoid column
 * @method     ChildBilling findOneByBaddress3(string $baddress3) Return the first ChildBilling filtered by the baddress3 column
 * @method     ChildBilling findOneBySaddress3(string $saddress3) Return the first ChildBilling filtered by the saddress3 column
 * @method     ChildBilling findOneByNewnbr(string $newnbr) Return the first ChildBilling filtered by the newnbr column
 * @method     ChildBilling findOneByFaxnbr(string $faxnbr) Return the first ChildBilling filtered by the faxnbr column
 * @method     ChildBilling findOneByRqstdate(string $rqstdate) Return the first ChildBilling filtered by the rqstdate column
 * @method     ChildBilling findOneByDummy(string $dummy) Return the first ChildBilling filtered by the dummy column *

 * @method     ChildBilling requirePk($key, ConnectionInterface $con = null) Return the ChildBilling by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOne(ConnectionInterface $con = null) Return the first ChildBilling matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBilling requireOneBySessionid(string $sessionid) Return the first ChildBilling filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneByDate(int $date) Return the first ChildBilling filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneByTime(int $time) Return the first ChildBilling filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneByBconame(string $bconame) Return the first ChildBilling filtered by the bconame column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneByBaddress(string $baddress) Return the first ChildBilling filtered by the baddress column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneByBaddress2(string $baddress2) Return the first ChildBilling filtered by the baddress2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneByBname(string $bname) Return the first ChildBilling filtered by the bname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneByBcity(string $bcity) Return the first ChildBilling filtered by the bcity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneByBst(string $bst) Return the first ChildBilling filtered by the bst column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneByBzip(string $bzip) Return the first ChildBilling filtered by the bzip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneByBcountry(string $bcountry) Return the first ChildBilling filtered by the bcountry column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneBySconame(string $sconame) Return the first ChildBilling filtered by the sconame column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneBySname(string $sname) Return the first ChildBilling filtered by the sname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneBySaddress(string $saddress) Return the first ChildBilling filtered by the saddress column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneBySaddress2(string $saddress2) Return the first ChildBilling filtered by the saddress2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneByScity(string $scity) Return the first ChildBilling filtered by the scity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneBySst(string $sst) Return the first ChildBilling filtered by the sst column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneBySzip(string $szip) Return the first ChildBilling filtered by the szip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneByScountry(string $scountry) Return the first ChildBilling filtered by the scountry column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneByCcno(string $ccno) Return the first ChildBilling filtered by the ccno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneByEmail(string $email) Return the first ChildBilling filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneByPhone(string $phone) Return the first ChildBilling filtered by the phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneByVc(string $vc) Return the first ChildBilling filtered by the vc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneByError(string $error) Return the first ChildBilling filtered by the error column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneByErmes(string $ermes) Return the first ChildBilling filtered by the ermes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneByOrders(string $orders) Return the first ChildBilling filtered by the orders column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneByXpdate(string $xpdate) Return the first ChildBilling filtered by the xpdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneByPono(string $pono) Return the first ChildBilling filtered by the pono column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneByPaymenttype(string $paymenttype) Return the first ChildBilling filtered by the paymenttype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneByShipmeth(string $shipmeth) Return the first ChildBilling filtered by the shipmeth column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneByShipcom(string $shipcom) Return the first ChildBilling filtered by the shipcom column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneByNote(string $note) Return the first ChildBilling filtered by the note column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneByTermtype(string $termtype) Return the first ChildBilling filtered by the termtype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneByCustid(string $custid) Return the first ChildBilling filtered by the custid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneByShiptoid(string $shiptoid) Return the first ChildBilling filtered by the shiptoid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneByBaddress3(string $baddress3) Return the first ChildBilling filtered by the baddress3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneBySaddress3(string $saddress3) Return the first ChildBilling filtered by the saddress3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneByNewnbr(string $newnbr) Return the first ChildBilling filtered by the newnbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneByFaxnbr(string $faxnbr) Return the first ChildBilling filtered by the faxnbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneByRqstdate(string $rqstdate) Return the first ChildBilling filtered by the rqstdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOneByDummy(string $dummy) Return the first ChildBilling filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBilling[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildBilling objects based on current ModelCriteria
 * @method     ChildBilling[]|ObjectCollection findBySessionid(string $sessionid) Return ChildBilling objects filtered by the sessionid column
 * @method     ChildBilling[]|ObjectCollection findByDate(int $date) Return ChildBilling objects filtered by the date column
 * @method     ChildBilling[]|ObjectCollection findByTime(int $time) Return ChildBilling objects filtered by the time column
 * @method     ChildBilling[]|ObjectCollection findByBconame(string $bconame) Return ChildBilling objects filtered by the bconame column
 * @method     ChildBilling[]|ObjectCollection findByBaddress(string $baddress) Return ChildBilling objects filtered by the baddress column
 * @method     ChildBilling[]|ObjectCollection findByBaddress2(string $baddress2) Return ChildBilling objects filtered by the baddress2 column
 * @method     ChildBilling[]|ObjectCollection findByBname(string $bname) Return ChildBilling objects filtered by the bname column
 * @method     ChildBilling[]|ObjectCollection findByBcity(string $bcity) Return ChildBilling objects filtered by the bcity column
 * @method     ChildBilling[]|ObjectCollection findByBst(string $bst) Return ChildBilling objects filtered by the bst column
 * @method     ChildBilling[]|ObjectCollection findByBzip(string $bzip) Return ChildBilling objects filtered by the bzip column
 * @method     ChildBilling[]|ObjectCollection findByBcountry(string $bcountry) Return ChildBilling objects filtered by the bcountry column
 * @method     ChildBilling[]|ObjectCollection findBySconame(string $sconame) Return ChildBilling objects filtered by the sconame column
 * @method     ChildBilling[]|ObjectCollection findBySname(string $sname) Return ChildBilling objects filtered by the sname column
 * @method     ChildBilling[]|ObjectCollection findBySaddress(string $saddress) Return ChildBilling objects filtered by the saddress column
 * @method     ChildBilling[]|ObjectCollection findBySaddress2(string $saddress2) Return ChildBilling objects filtered by the saddress2 column
 * @method     ChildBilling[]|ObjectCollection findByScity(string $scity) Return ChildBilling objects filtered by the scity column
 * @method     ChildBilling[]|ObjectCollection findBySst(string $sst) Return ChildBilling objects filtered by the sst column
 * @method     ChildBilling[]|ObjectCollection findBySzip(string $szip) Return ChildBilling objects filtered by the szip column
 * @method     ChildBilling[]|ObjectCollection findByScountry(string $scountry) Return ChildBilling objects filtered by the scountry column
 * @method     ChildBilling[]|ObjectCollection findByCcno(string $ccno) Return ChildBilling objects filtered by the ccno column
 * @method     ChildBilling[]|ObjectCollection findByEmail(string $email) Return ChildBilling objects filtered by the email column
 * @method     ChildBilling[]|ObjectCollection findByPhone(string $phone) Return ChildBilling objects filtered by the phone column
 * @method     ChildBilling[]|ObjectCollection findByVc(string $vc) Return ChildBilling objects filtered by the vc column
 * @method     ChildBilling[]|ObjectCollection findByError(string $error) Return ChildBilling objects filtered by the error column
 * @method     ChildBilling[]|ObjectCollection findByErmes(string $ermes) Return ChildBilling objects filtered by the ermes column
 * @method     ChildBilling[]|ObjectCollection findByOrders(string $orders) Return ChildBilling objects filtered by the orders column
 * @method     ChildBilling[]|ObjectCollection findByXpdate(string $xpdate) Return ChildBilling objects filtered by the xpdate column
 * @method     ChildBilling[]|ObjectCollection findByPono(string $pono) Return ChildBilling objects filtered by the pono column
 * @method     ChildBilling[]|ObjectCollection findByPaymenttype(string $paymenttype) Return ChildBilling objects filtered by the paymenttype column
 * @method     ChildBilling[]|ObjectCollection findByShipmeth(string $shipmeth) Return ChildBilling objects filtered by the shipmeth column
 * @method     ChildBilling[]|ObjectCollection findByShipcom(string $shipcom) Return ChildBilling objects filtered by the shipcom column
 * @method     ChildBilling[]|ObjectCollection findByNote(string $note) Return ChildBilling objects filtered by the note column
 * @method     ChildBilling[]|ObjectCollection findByTermtype(string $termtype) Return ChildBilling objects filtered by the termtype column
 * @method     ChildBilling[]|ObjectCollection findByCustid(string $custid) Return ChildBilling objects filtered by the custid column
 * @method     ChildBilling[]|ObjectCollection findByShiptoid(string $shiptoid) Return ChildBilling objects filtered by the shiptoid column
 * @method     ChildBilling[]|ObjectCollection findByBaddress3(string $baddress3) Return ChildBilling objects filtered by the baddress3 column
 * @method     ChildBilling[]|ObjectCollection findBySaddress3(string $saddress3) Return ChildBilling objects filtered by the saddress3 column
 * @method     ChildBilling[]|ObjectCollection findByNewnbr(string $newnbr) Return ChildBilling objects filtered by the newnbr column
 * @method     ChildBilling[]|ObjectCollection findByFaxnbr(string $faxnbr) Return ChildBilling objects filtered by the faxnbr column
 * @method     ChildBilling[]|ObjectCollection findByRqstdate(string $rqstdate) Return ChildBilling objects filtered by the rqstdate column
 * @method     ChildBilling[]|ObjectCollection findByDummy(string $dummy) Return ChildBilling objects filtered by the dummy column
 * @method     ChildBilling[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class BillingQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\BillingQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Billing', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBillingQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBillingQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildBillingQuery) {
            return $criteria;
        }
        $query = new ChildBillingQuery();
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
     * @return ChildBilling|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(BillingTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = BillingTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildBilling A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, date, time, bconame, baddress, baddress2, bname, bcity, bst, bzip, bcountry, sconame, sname, saddress, saddress2, scity, sst, szip, scountry, ccno, email, phone, vc, error, ermes, orders, xpdate, pono, paymenttype, shipmeth, shipcom, note, termtype, custid, shiptoid, baddress3, saddress3, newnbr, faxnbr, rqstdate, dummy FROM billing WHERE sessionid = :p0';
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
            /** @var ChildBilling $obj */
            $obj = new ChildBilling();
            $obj->hydrate($row);
            BillingTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildBilling|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BillingTableMap::COL_SESSIONID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BillingTableMap::COL_SESSIONID, $keys, Criteria::IN);
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
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_SESSIONID, $sessionid, $comparison);
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
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(BillingTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(BillingTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_DATE, $date, $comparison);
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
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(BillingTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(BillingTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_TIME, $time, $comparison);
    }

    /**
     * Filter the query on the bconame column
     *
     * Example usage:
     * <code>
     * $query->filterByBconame('fooValue');   // WHERE bconame = 'fooValue'
     * $query->filterByBconame('%fooValue%', Criteria::LIKE); // WHERE bconame LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bconame The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterByBconame($bconame = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bconame)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_BCONAME, $bconame, $comparison);
    }

    /**
     * Filter the query on the baddress column
     *
     * Example usage:
     * <code>
     * $query->filterByBaddress('fooValue');   // WHERE baddress = 'fooValue'
     * $query->filterByBaddress('%fooValue%', Criteria::LIKE); // WHERE baddress LIKE '%fooValue%'
     * </code>
     *
     * @param     string $baddress The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterByBaddress($baddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($baddress)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_BADDRESS, $baddress, $comparison);
    }

    /**
     * Filter the query on the baddress2 column
     *
     * Example usage:
     * <code>
     * $query->filterByBaddress2('fooValue');   // WHERE baddress2 = 'fooValue'
     * $query->filterByBaddress2('%fooValue%', Criteria::LIKE); // WHERE baddress2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $baddress2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterByBaddress2($baddress2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($baddress2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_BADDRESS2, $baddress2, $comparison);
    }

    /**
     * Filter the query on the bname column
     *
     * Example usage:
     * <code>
     * $query->filterByBname('fooValue');   // WHERE bname = 'fooValue'
     * $query->filterByBname('%fooValue%', Criteria::LIKE); // WHERE bname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterByBname($bname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_BNAME, $bname, $comparison);
    }

    /**
     * Filter the query on the bcity column
     *
     * Example usage:
     * <code>
     * $query->filterByBcity('fooValue');   // WHERE bcity = 'fooValue'
     * $query->filterByBcity('%fooValue%', Criteria::LIKE); // WHERE bcity LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bcity The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterByBcity($bcity = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bcity)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_BCITY, $bcity, $comparison);
    }

    /**
     * Filter the query on the bst column
     *
     * Example usage:
     * <code>
     * $query->filterByBst('fooValue');   // WHERE bst = 'fooValue'
     * $query->filterByBst('%fooValue%', Criteria::LIKE); // WHERE bst LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bst The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterByBst($bst = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bst)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_BST, $bst, $comparison);
    }

    /**
     * Filter the query on the bzip column
     *
     * Example usage:
     * <code>
     * $query->filterByBzip('fooValue');   // WHERE bzip = 'fooValue'
     * $query->filterByBzip('%fooValue%', Criteria::LIKE); // WHERE bzip LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bzip The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterByBzip($bzip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bzip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_BZIP, $bzip, $comparison);
    }

    /**
     * Filter the query on the bcountry column
     *
     * Example usage:
     * <code>
     * $query->filterByBcountry('fooValue');   // WHERE bcountry = 'fooValue'
     * $query->filterByBcountry('%fooValue%', Criteria::LIKE); // WHERE bcountry LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bcountry The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterByBcountry($bcountry = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bcountry)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_BCOUNTRY, $bcountry, $comparison);
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
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterBySconame($sconame = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sconame)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_SCONAME, $sconame, $comparison);
    }

    /**
     * Filter the query on the sname column
     *
     * Example usage:
     * <code>
     * $query->filterBySname('fooValue');   // WHERE sname = 'fooValue'
     * $query->filterBySname('%fooValue%', Criteria::LIKE); // WHERE sname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterBySname($sname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_SNAME, $sname, $comparison);
    }

    /**
     * Filter the query on the saddress column
     *
     * Example usage:
     * <code>
     * $query->filterBySaddress('fooValue');   // WHERE saddress = 'fooValue'
     * $query->filterBySaddress('%fooValue%', Criteria::LIKE); // WHERE saddress LIKE '%fooValue%'
     * </code>
     *
     * @param     string $saddress The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterBySaddress($saddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($saddress)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_SADDRESS, $saddress, $comparison);
    }

    /**
     * Filter the query on the saddress2 column
     *
     * Example usage:
     * <code>
     * $query->filterBySaddress2('fooValue');   // WHERE saddress2 = 'fooValue'
     * $query->filterBySaddress2('%fooValue%', Criteria::LIKE); // WHERE saddress2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $saddress2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterBySaddress2($saddress2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($saddress2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_SADDRESS2, $saddress2, $comparison);
    }

    /**
     * Filter the query on the scity column
     *
     * Example usage:
     * <code>
     * $query->filterByScity('fooValue');   // WHERE scity = 'fooValue'
     * $query->filterByScity('%fooValue%', Criteria::LIKE); // WHERE scity LIKE '%fooValue%'
     * </code>
     *
     * @param     string $scity The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterByScity($scity = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($scity)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_SCITY, $scity, $comparison);
    }

    /**
     * Filter the query on the sst column
     *
     * Example usage:
     * <code>
     * $query->filterBySst('fooValue');   // WHERE sst = 'fooValue'
     * $query->filterBySst('%fooValue%', Criteria::LIKE); // WHERE sst LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sst The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterBySst($sst = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sst)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_SST, $sst, $comparison);
    }

    /**
     * Filter the query on the szip column
     *
     * Example usage:
     * <code>
     * $query->filterBySzip('fooValue');   // WHERE szip = 'fooValue'
     * $query->filterBySzip('%fooValue%', Criteria::LIKE); // WHERE szip LIKE '%fooValue%'
     * </code>
     *
     * @param     string $szip The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterBySzip($szip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($szip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_SZIP, $szip, $comparison);
    }

    /**
     * Filter the query on the scountry column
     *
     * Example usage:
     * <code>
     * $query->filterByScountry('fooValue');   // WHERE scountry = 'fooValue'
     * $query->filterByScountry('%fooValue%', Criteria::LIKE); // WHERE scountry LIKE '%fooValue%'
     * </code>
     *
     * @param     string $scountry The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterByScountry($scountry = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($scountry)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_SCOUNTRY, $scountry, $comparison);
    }

    /**
     * Filter the query on the ccno column
     *
     * Example usage:
     * <code>
     * $query->filterByCcno('fooValue');   // WHERE ccno = 'fooValue'
     * $query->filterByCcno('%fooValue%', Criteria::LIKE); // WHERE ccno LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ccno The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterByCcno($ccno = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ccno)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_CCNO, $ccno, $comparison);
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
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_EMAIL, $email, $comparison);
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
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterByPhone($phone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_PHONE, $phone, $comparison);
    }

    /**
     * Filter the query on the vc column
     *
     * Example usage:
     * <code>
     * $query->filterByVc('fooValue');   // WHERE vc = 'fooValue'
     * $query->filterByVc('%fooValue%', Criteria::LIKE); // WHERE vc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $vc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterByVc($vc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($vc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_VC, $vc, $comparison);
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
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterByError($error = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($error)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_ERROR, $error, $comparison);
    }

    /**
     * Filter the query on the ermes column
     *
     * Example usage:
     * <code>
     * $query->filterByErmes('fooValue');   // WHERE ermes = 'fooValue'
     * $query->filterByErmes('%fooValue%', Criteria::LIKE); // WHERE ermes LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ermes The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterByErmes($ermes = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ermes)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_ERMES, $ermes, $comparison);
    }

    /**
     * Filter the query on the orders column
     *
     * Example usage:
     * <code>
     * $query->filterByOrders('fooValue');   // WHERE orders = 'fooValue'
     * $query->filterByOrders('%fooValue%', Criteria::LIKE); // WHERE orders LIKE '%fooValue%'
     * </code>
     *
     * @param     string $orders The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterByOrders($orders = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($orders)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_ORDERS, $orders, $comparison);
    }

    /**
     * Filter the query on the xpdate column
     *
     * Example usage:
     * <code>
     * $query->filterByXpdate('fooValue');   // WHERE xpdate = 'fooValue'
     * $query->filterByXpdate('%fooValue%', Criteria::LIKE); // WHERE xpdate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $xpdate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterByXpdate($xpdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($xpdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_XPDATE, $xpdate, $comparison);
    }

    /**
     * Filter the query on the pono column
     *
     * Example usage:
     * <code>
     * $query->filterByPono('fooValue');   // WHERE pono = 'fooValue'
     * $query->filterByPono('%fooValue%', Criteria::LIKE); // WHERE pono LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pono The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterByPono($pono = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pono)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_PONO, $pono, $comparison);
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
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterByPaymenttype($paymenttype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($paymenttype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_PAYMENTTYPE, $paymenttype, $comparison);
    }

    /**
     * Filter the query on the shipmeth column
     *
     * Example usage:
     * <code>
     * $query->filterByShipmeth('fooValue');   // WHERE shipmeth = 'fooValue'
     * $query->filterByShipmeth('%fooValue%', Criteria::LIKE); // WHERE shipmeth LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shipmeth The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterByShipmeth($shipmeth = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipmeth)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_SHIPMETH, $shipmeth, $comparison);
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
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterByShipcom($shipcom = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipcom)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_SHIPCOM, $shipcom, $comparison);
    }

    /**
     * Filter the query on the note column
     *
     * Example usage:
     * <code>
     * $query->filterByNote('fooValue');   // WHERE note = 'fooValue'
     * $query->filterByNote('%fooValue%', Criteria::LIKE); // WHERE note LIKE '%fooValue%'
     * </code>
     *
     * @param     string $note The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterByNote($note = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($note)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_NOTE, $note, $comparison);
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
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterByTermtype($termtype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($termtype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_TERMTYPE, $termtype, $comparison);
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
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterByCustid($custid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_CUSTID, $custid, $comparison);
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
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterByShiptoid($shiptoid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shiptoid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_SHIPTOID, $shiptoid, $comparison);
    }

    /**
     * Filter the query on the baddress3 column
     *
     * Example usage:
     * <code>
     * $query->filterByBaddress3('fooValue');   // WHERE baddress3 = 'fooValue'
     * $query->filterByBaddress3('%fooValue%', Criteria::LIKE); // WHERE baddress3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $baddress3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterByBaddress3($baddress3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($baddress3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_BADDRESS3, $baddress3, $comparison);
    }

    /**
     * Filter the query on the saddress3 column
     *
     * Example usage:
     * <code>
     * $query->filterBySaddress3('fooValue');   // WHERE saddress3 = 'fooValue'
     * $query->filterBySaddress3('%fooValue%', Criteria::LIKE); // WHERE saddress3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $saddress3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterBySaddress3($saddress3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($saddress3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_SADDRESS3, $saddress3, $comparison);
    }

    /**
     * Filter the query on the newnbr column
     *
     * Example usage:
     * <code>
     * $query->filterByNewnbr('fooValue');   // WHERE newnbr = 'fooValue'
     * $query->filterByNewnbr('%fooValue%', Criteria::LIKE); // WHERE newnbr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $newnbr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterByNewnbr($newnbr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($newnbr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_NEWNBR, $newnbr, $comparison);
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
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterByFaxnbr($faxnbr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($faxnbr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_FAXNBR, $faxnbr, $comparison);
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
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterByRqstdate($rqstdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rqstdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_RQSTDATE, $rqstdate, $comparison);
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
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BillingTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildBilling $billing Object to remove from the list of results
     *
     * @return $this|ChildBillingQuery The current query, for fluid interface
     */
    public function prune($billing = null)
    {
        if ($billing) {
            $this->addUsingAlias(BillingTableMap::COL_SESSIONID, $billing->getSessionid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the billing table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BillingTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BillingTableMap::clearInstancePool();
            BillingTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(BillingTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(BillingTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            BillingTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            BillingTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // BillingQuery
