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
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the `billing` table.
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
 * @method     ChildBilling|null findOne(?ConnectionInterface $con = null) Return the first ChildBilling matching the query
 * @method     ChildBilling findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildBilling matching the query, or a new ChildBilling object populated from the query conditions when no match is found
 *
 * @method     ChildBilling|null findOneBySessionid(string $sessionid) Return the first ChildBilling filtered by the sessionid column
 * @method     ChildBilling|null findOneByDate(int $date) Return the first ChildBilling filtered by the date column
 * @method     ChildBilling|null findOneByTime(int $time) Return the first ChildBilling filtered by the time column
 * @method     ChildBilling|null findOneByBconame(string $bconame) Return the first ChildBilling filtered by the bconame column
 * @method     ChildBilling|null findOneByBaddress(string $baddress) Return the first ChildBilling filtered by the baddress column
 * @method     ChildBilling|null findOneByBaddress2(string $baddress2) Return the first ChildBilling filtered by the baddress2 column
 * @method     ChildBilling|null findOneByBname(string $bname) Return the first ChildBilling filtered by the bname column
 * @method     ChildBilling|null findOneByBcity(string $bcity) Return the first ChildBilling filtered by the bcity column
 * @method     ChildBilling|null findOneByBst(string $bst) Return the first ChildBilling filtered by the bst column
 * @method     ChildBilling|null findOneByBzip(string $bzip) Return the first ChildBilling filtered by the bzip column
 * @method     ChildBilling|null findOneByBcountry(string $bcountry) Return the first ChildBilling filtered by the bcountry column
 * @method     ChildBilling|null findOneBySconame(string $sconame) Return the first ChildBilling filtered by the sconame column
 * @method     ChildBilling|null findOneBySname(string $sname) Return the first ChildBilling filtered by the sname column
 * @method     ChildBilling|null findOneBySaddress(string $saddress) Return the first ChildBilling filtered by the saddress column
 * @method     ChildBilling|null findOneBySaddress2(string $saddress2) Return the first ChildBilling filtered by the saddress2 column
 * @method     ChildBilling|null findOneByScity(string $scity) Return the first ChildBilling filtered by the scity column
 * @method     ChildBilling|null findOneBySst(string $sst) Return the first ChildBilling filtered by the sst column
 * @method     ChildBilling|null findOneBySzip(string $szip) Return the first ChildBilling filtered by the szip column
 * @method     ChildBilling|null findOneByScountry(string $scountry) Return the first ChildBilling filtered by the scountry column
 * @method     ChildBilling|null findOneByCcno(string $ccno) Return the first ChildBilling filtered by the ccno column
 * @method     ChildBilling|null findOneByEmail(string $email) Return the first ChildBilling filtered by the email column
 * @method     ChildBilling|null findOneByPhone(string $phone) Return the first ChildBilling filtered by the phone column
 * @method     ChildBilling|null findOneByVc(string $vc) Return the first ChildBilling filtered by the vc column
 * @method     ChildBilling|null findOneByError(string $error) Return the first ChildBilling filtered by the error column
 * @method     ChildBilling|null findOneByErmes(string $ermes) Return the first ChildBilling filtered by the ermes column
 * @method     ChildBilling|null findOneByOrders(string $orders) Return the first ChildBilling filtered by the orders column
 * @method     ChildBilling|null findOneByXpdate(string $xpdate) Return the first ChildBilling filtered by the xpdate column
 * @method     ChildBilling|null findOneByPono(string $pono) Return the first ChildBilling filtered by the pono column
 * @method     ChildBilling|null findOneByPaymenttype(string $paymenttype) Return the first ChildBilling filtered by the paymenttype column
 * @method     ChildBilling|null findOneByShipmeth(string $shipmeth) Return the first ChildBilling filtered by the shipmeth column
 * @method     ChildBilling|null findOneByShipcom(string $shipcom) Return the first ChildBilling filtered by the shipcom column
 * @method     ChildBilling|null findOneByNote(string $note) Return the first ChildBilling filtered by the note column
 * @method     ChildBilling|null findOneByTermtype(string $termtype) Return the first ChildBilling filtered by the termtype column
 * @method     ChildBilling|null findOneByCustid(string $custid) Return the first ChildBilling filtered by the custid column
 * @method     ChildBilling|null findOneByShiptoid(string $shiptoid) Return the first ChildBilling filtered by the shiptoid column
 * @method     ChildBilling|null findOneByBaddress3(string $baddress3) Return the first ChildBilling filtered by the baddress3 column
 * @method     ChildBilling|null findOneBySaddress3(string $saddress3) Return the first ChildBilling filtered by the saddress3 column
 * @method     ChildBilling|null findOneByNewnbr(string $newnbr) Return the first ChildBilling filtered by the newnbr column
 * @method     ChildBilling|null findOneByFaxnbr(string $faxnbr) Return the first ChildBilling filtered by the faxnbr column
 * @method     ChildBilling|null findOneByRqstdate(string $rqstdate) Return the first ChildBilling filtered by the rqstdate column
 * @method     ChildBilling|null findOneByDummy(string $dummy) Return the first ChildBilling filtered by the dummy column
 *
 * @method     ChildBilling requirePk($key, ?ConnectionInterface $con = null) Return the ChildBilling by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBilling requireOne(?ConnectionInterface $con = null) Return the first ChildBilling matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
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
 * @method     ChildBilling[]|Collection find(?ConnectionInterface $con = null) Return ChildBilling objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildBilling> find(?ConnectionInterface $con = null) Return ChildBilling objects based on current ModelCriteria
 *
 * @method     ChildBilling[]|Collection findBySessionid(string|array<string> $sessionid) Return ChildBilling objects filtered by the sessionid column
 * @psalm-method Collection&\Traversable<ChildBilling> findBySessionid(string|array<string> $sessionid) Return ChildBilling objects filtered by the sessionid column
 * @method     ChildBilling[]|Collection findByDate(int|array<int> $date) Return ChildBilling objects filtered by the date column
 * @psalm-method Collection&\Traversable<ChildBilling> findByDate(int|array<int> $date) Return ChildBilling objects filtered by the date column
 * @method     ChildBilling[]|Collection findByTime(int|array<int> $time) Return ChildBilling objects filtered by the time column
 * @psalm-method Collection&\Traversable<ChildBilling> findByTime(int|array<int> $time) Return ChildBilling objects filtered by the time column
 * @method     ChildBilling[]|Collection findByBconame(string|array<string> $bconame) Return ChildBilling objects filtered by the bconame column
 * @psalm-method Collection&\Traversable<ChildBilling> findByBconame(string|array<string> $bconame) Return ChildBilling objects filtered by the bconame column
 * @method     ChildBilling[]|Collection findByBaddress(string|array<string> $baddress) Return ChildBilling objects filtered by the baddress column
 * @psalm-method Collection&\Traversable<ChildBilling> findByBaddress(string|array<string> $baddress) Return ChildBilling objects filtered by the baddress column
 * @method     ChildBilling[]|Collection findByBaddress2(string|array<string> $baddress2) Return ChildBilling objects filtered by the baddress2 column
 * @psalm-method Collection&\Traversable<ChildBilling> findByBaddress2(string|array<string> $baddress2) Return ChildBilling objects filtered by the baddress2 column
 * @method     ChildBilling[]|Collection findByBname(string|array<string> $bname) Return ChildBilling objects filtered by the bname column
 * @psalm-method Collection&\Traversable<ChildBilling> findByBname(string|array<string> $bname) Return ChildBilling objects filtered by the bname column
 * @method     ChildBilling[]|Collection findByBcity(string|array<string> $bcity) Return ChildBilling objects filtered by the bcity column
 * @psalm-method Collection&\Traversable<ChildBilling> findByBcity(string|array<string> $bcity) Return ChildBilling objects filtered by the bcity column
 * @method     ChildBilling[]|Collection findByBst(string|array<string> $bst) Return ChildBilling objects filtered by the bst column
 * @psalm-method Collection&\Traversable<ChildBilling> findByBst(string|array<string> $bst) Return ChildBilling objects filtered by the bst column
 * @method     ChildBilling[]|Collection findByBzip(string|array<string> $bzip) Return ChildBilling objects filtered by the bzip column
 * @psalm-method Collection&\Traversable<ChildBilling> findByBzip(string|array<string> $bzip) Return ChildBilling objects filtered by the bzip column
 * @method     ChildBilling[]|Collection findByBcountry(string|array<string> $bcountry) Return ChildBilling objects filtered by the bcountry column
 * @psalm-method Collection&\Traversable<ChildBilling> findByBcountry(string|array<string> $bcountry) Return ChildBilling objects filtered by the bcountry column
 * @method     ChildBilling[]|Collection findBySconame(string|array<string> $sconame) Return ChildBilling objects filtered by the sconame column
 * @psalm-method Collection&\Traversable<ChildBilling> findBySconame(string|array<string> $sconame) Return ChildBilling objects filtered by the sconame column
 * @method     ChildBilling[]|Collection findBySname(string|array<string> $sname) Return ChildBilling objects filtered by the sname column
 * @psalm-method Collection&\Traversable<ChildBilling> findBySname(string|array<string> $sname) Return ChildBilling objects filtered by the sname column
 * @method     ChildBilling[]|Collection findBySaddress(string|array<string> $saddress) Return ChildBilling objects filtered by the saddress column
 * @psalm-method Collection&\Traversable<ChildBilling> findBySaddress(string|array<string> $saddress) Return ChildBilling objects filtered by the saddress column
 * @method     ChildBilling[]|Collection findBySaddress2(string|array<string> $saddress2) Return ChildBilling objects filtered by the saddress2 column
 * @psalm-method Collection&\Traversable<ChildBilling> findBySaddress2(string|array<string> $saddress2) Return ChildBilling objects filtered by the saddress2 column
 * @method     ChildBilling[]|Collection findByScity(string|array<string> $scity) Return ChildBilling objects filtered by the scity column
 * @psalm-method Collection&\Traversable<ChildBilling> findByScity(string|array<string> $scity) Return ChildBilling objects filtered by the scity column
 * @method     ChildBilling[]|Collection findBySst(string|array<string> $sst) Return ChildBilling objects filtered by the sst column
 * @psalm-method Collection&\Traversable<ChildBilling> findBySst(string|array<string> $sst) Return ChildBilling objects filtered by the sst column
 * @method     ChildBilling[]|Collection findBySzip(string|array<string> $szip) Return ChildBilling objects filtered by the szip column
 * @psalm-method Collection&\Traversable<ChildBilling> findBySzip(string|array<string> $szip) Return ChildBilling objects filtered by the szip column
 * @method     ChildBilling[]|Collection findByScountry(string|array<string> $scountry) Return ChildBilling objects filtered by the scountry column
 * @psalm-method Collection&\Traversable<ChildBilling> findByScountry(string|array<string> $scountry) Return ChildBilling objects filtered by the scountry column
 * @method     ChildBilling[]|Collection findByCcno(string|array<string> $ccno) Return ChildBilling objects filtered by the ccno column
 * @psalm-method Collection&\Traversable<ChildBilling> findByCcno(string|array<string> $ccno) Return ChildBilling objects filtered by the ccno column
 * @method     ChildBilling[]|Collection findByEmail(string|array<string> $email) Return ChildBilling objects filtered by the email column
 * @psalm-method Collection&\Traversable<ChildBilling> findByEmail(string|array<string> $email) Return ChildBilling objects filtered by the email column
 * @method     ChildBilling[]|Collection findByPhone(string|array<string> $phone) Return ChildBilling objects filtered by the phone column
 * @psalm-method Collection&\Traversable<ChildBilling> findByPhone(string|array<string> $phone) Return ChildBilling objects filtered by the phone column
 * @method     ChildBilling[]|Collection findByVc(string|array<string> $vc) Return ChildBilling objects filtered by the vc column
 * @psalm-method Collection&\Traversable<ChildBilling> findByVc(string|array<string> $vc) Return ChildBilling objects filtered by the vc column
 * @method     ChildBilling[]|Collection findByError(string|array<string> $error) Return ChildBilling objects filtered by the error column
 * @psalm-method Collection&\Traversable<ChildBilling> findByError(string|array<string> $error) Return ChildBilling objects filtered by the error column
 * @method     ChildBilling[]|Collection findByErmes(string|array<string> $ermes) Return ChildBilling objects filtered by the ermes column
 * @psalm-method Collection&\Traversable<ChildBilling> findByErmes(string|array<string> $ermes) Return ChildBilling objects filtered by the ermes column
 * @method     ChildBilling[]|Collection findByOrders(string|array<string> $orders) Return ChildBilling objects filtered by the orders column
 * @psalm-method Collection&\Traversable<ChildBilling> findByOrders(string|array<string> $orders) Return ChildBilling objects filtered by the orders column
 * @method     ChildBilling[]|Collection findByXpdate(string|array<string> $xpdate) Return ChildBilling objects filtered by the xpdate column
 * @psalm-method Collection&\Traversable<ChildBilling> findByXpdate(string|array<string> $xpdate) Return ChildBilling objects filtered by the xpdate column
 * @method     ChildBilling[]|Collection findByPono(string|array<string> $pono) Return ChildBilling objects filtered by the pono column
 * @psalm-method Collection&\Traversable<ChildBilling> findByPono(string|array<string> $pono) Return ChildBilling objects filtered by the pono column
 * @method     ChildBilling[]|Collection findByPaymenttype(string|array<string> $paymenttype) Return ChildBilling objects filtered by the paymenttype column
 * @psalm-method Collection&\Traversable<ChildBilling> findByPaymenttype(string|array<string> $paymenttype) Return ChildBilling objects filtered by the paymenttype column
 * @method     ChildBilling[]|Collection findByShipmeth(string|array<string> $shipmeth) Return ChildBilling objects filtered by the shipmeth column
 * @psalm-method Collection&\Traversable<ChildBilling> findByShipmeth(string|array<string> $shipmeth) Return ChildBilling objects filtered by the shipmeth column
 * @method     ChildBilling[]|Collection findByShipcom(string|array<string> $shipcom) Return ChildBilling objects filtered by the shipcom column
 * @psalm-method Collection&\Traversable<ChildBilling> findByShipcom(string|array<string> $shipcom) Return ChildBilling objects filtered by the shipcom column
 * @method     ChildBilling[]|Collection findByNote(string|array<string> $note) Return ChildBilling objects filtered by the note column
 * @psalm-method Collection&\Traversable<ChildBilling> findByNote(string|array<string> $note) Return ChildBilling objects filtered by the note column
 * @method     ChildBilling[]|Collection findByTermtype(string|array<string> $termtype) Return ChildBilling objects filtered by the termtype column
 * @psalm-method Collection&\Traversable<ChildBilling> findByTermtype(string|array<string> $termtype) Return ChildBilling objects filtered by the termtype column
 * @method     ChildBilling[]|Collection findByCustid(string|array<string> $custid) Return ChildBilling objects filtered by the custid column
 * @psalm-method Collection&\Traversable<ChildBilling> findByCustid(string|array<string> $custid) Return ChildBilling objects filtered by the custid column
 * @method     ChildBilling[]|Collection findByShiptoid(string|array<string> $shiptoid) Return ChildBilling objects filtered by the shiptoid column
 * @psalm-method Collection&\Traversable<ChildBilling> findByShiptoid(string|array<string> $shiptoid) Return ChildBilling objects filtered by the shiptoid column
 * @method     ChildBilling[]|Collection findByBaddress3(string|array<string> $baddress3) Return ChildBilling objects filtered by the baddress3 column
 * @psalm-method Collection&\Traversable<ChildBilling> findByBaddress3(string|array<string> $baddress3) Return ChildBilling objects filtered by the baddress3 column
 * @method     ChildBilling[]|Collection findBySaddress3(string|array<string> $saddress3) Return ChildBilling objects filtered by the saddress3 column
 * @psalm-method Collection&\Traversable<ChildBilling> findBySaddress3(string|array<string> $saddress3) Return ChildBilling objects filtered by the saddress3 column
 * @method     ChildBilling[]|Collection findByNewnbr(string|array<string> $newnbr) Return ChildBilling objects filtered by the newnbr column
 * @psalm-method Collection&\Traversable<ChildBilling> findByNewnbr(string|array<string> $newnbr) Return ChildBilling objects filtered by the newnbr column
 * @method     ChildBilling[]|Collection findByFaxnbr(string|array<string> $faxnbr) Return ChildBilling objects filtered by the faxnbr column
 * @psalm-method Collection&\Traversable<ChildBilling> findByFaxnbr(string|array<string> $faxnbr) Return ChildBilling objects filtered by the faxnbr column
 * @method     ChildBilling[]|Collection findByRqstdate(string|array<string> $rqstdate) Return ChildBilling objects filtered by the rqstdate column
 * @psalm-method Collection&\Traversable<ChildBilling> findByRqstdate(string|array<string> $rqstdate) Return ChildBilling objects filtered by the rqstdate column
 * @method     ChildBilling[]|Collection findByDummy(string|array<string> $dummy) Return ChildBilling objects filtered by the dummy column
 * @psalm-method Collection&\Traversable<ChildBilling> findByDummy(string|array<string> $dummy) Return ChildBilling objects filtered by the dummy column
 *
 * @method     ChildBilling[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildBilling> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class BillingQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\BillingQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Billing', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBillingQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBillingQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
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
    public function findPk($key, ?ConnectionInterface $con = null)
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
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
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
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
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

        $this->addUsingAlias(BillingTableMap::COL_SESSIONID, $key, Criteria::EQUAL);

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

        $this->addUsingAlias(BillingTableMap::COL_SESSIONID, $keys, Criteria::IN);

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

        $this->addUsingAlias(BillingTableMap::COL_SESSIONID, $sessionid, $comparison);

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

        $this->addUsingAlias(BillingTableMap::COL_DATE, $date, $comparison);

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

        $this->addUsingAlias(BillingTableMap::COL_TIME, $time, $comparison);

        return $this;
    }

    /**
     * Filter the query on the bconame column
     *
     * Example usage:
     * <code>
     * $query->filterByBconame('fooValue');   // WHERE bconame = 'fooValue'
     * $query->filterByBconame('%fooValue%', Criteria::LIKE); // WHERE bconame LIKE '%fooValue%'
     * $query->filterByBconame(['foo', 'bar']); // WHERE bconame IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $bconame The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByBconame($bconame = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bconame)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BillingTableMap::COL_BCONAME, $bconame, $comparison);

        return $this;
    }

    /**
     * Filter the query on the baddress column
     *
     * Example usage:
     * <code>
     * $query->filterByBaddress('fooValue');   // WHERE baddress = 'fooValue'
     * $query->filterByBaddress('%fooValue%', Criteria::LIKE); // WHERE baddress LIKE '%fooValue%'
     * $query->filterByBaddress(['foo', 'bar']); // WHERE baddress IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $baddress The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByBaddress($baddress = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($baddress)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BillingTableMap::COL_BADDRESS, $baddress, $comparison);

        return $this;
    }

    /**
     * Filter the query on the baddress2 column
     *
     * Example usage:
     * <code>
     * $query->filterByBaddress2('fooValue');   // WHERE baddress2 = 'fooValue'
     * $query->filterByBaddress2('%fooValue%', Criteria::LIKE); // WHERE baddress2 LIKE '%fooValue%'
     * $query->filterByBaddress2(['foo', 'bar']); // WHERE baddress2 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $baddress2 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByBaddress2($baddress2 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($baddress2)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BillingTableMap::COL_BADDRESS2, $baddress2, $comparison);

        return $this;
    }

    /**
     * Filter the query on the bname column
     *
     * Example usage:
     * <code>
     * $query->filterByBname('fooValue');   // WHERE bname = 'fooValue'
     * $query->filterByBname('%fooValue%', Criteria::LIKE); // WHERE bname LIKE '%fooValue%'
     * $query->filterByBname(['foo', 'bar']); // WHERE bname IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $bname The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByBname($bname = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bname)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BillingTableMap::COL_BNAME, $bname, $comparison);

        return $this;
    }

    /**
     * Filter the query on the bcity column
     *
     * Example usage:
     * <code>
     * $query->filterByBcity('fooValue');   // WHERE bcity = 'fooValue'
     * $query->filterByBcity('%fooValue%', Criteria::LIKE); // WHERE bcity LIKE '%fooValue%'
     * $query->filterByBcity(['foo', 'bar']); // WHERE bcity IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $bcity The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByBcity($bcity = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bcity)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BillingTableMap::COL_BCITY, $bcity, $comparison);

        return $this;
    }

    /**
     * Filter the query on the bst column
     *
     * Example usage:
     * <code>
     * $query->filterByBst('fooValue');   // WHERE bst = 'fooValue'
     * $query->filterByBst('%fooValue%', Criteria::LIKE); // WHERE bst LIKE '%fooValue%'
     * $query->filterByBst(['foo', 'bar']); // WHERE bst IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $bst The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByBst($bst = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bst)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BillingTableMap::COL_BST, $bst, $comparison);

        return $this;
    }

    /**
     * Filter the query on the bzip column
     *
     * Example usage:
     * <code>
     * $query->filterByBzip('fooValue');   // WHERE bzip = 'fooValue'
     * $query->filterByBzip('%fooValue%', Criteria::LIKE); // WHERE bzip LIKE '%fooValue%'
     * $query->filterByBzip(['foo', 'bar']); // WHERE bzip IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $bzip The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByBzip($bzip = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bzip)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BillingTableMap::COL_BZIP, $bzip, $comparison);

        return $this;
    }

    /**
     * Filter the query on the bcountry column
     *
     * Example usage:
     * <code>
     * $query->filterByBcountry('fooValue');   // WHERE bcountry = 'fooValue'
     * $query->filterByBcountry('%fooValue%', Criteria::LIKE); // WHERE bcountry LIKE '%fooValue%'
     * $query->filterByBcountry(['foo', 'bar']); // WHERE bcountry IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $bcountry The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByBcountry($bcountry = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bcountry)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BillingTableMap::COL_BCOUNTRY, $bcountry, $comparison);

        return $this;
    }

    /**
     * Filter the query on the sconame column
     *
     * Example usage:
     * <code>
     * $query->filterBySconame('fooValue');   // WHERE sconame = 'fooValue'
     * $query->filterBySconame('%fooValue%', Criteria::LIKE); // WHERE sconame LIKE '%fooValue%'
     * $query->filterBySconame(['foo', 'bar']); // WHERE sconame IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $sconame The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySconame($sconame = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sconame)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BillingTableMap::COL_SCONAME, $sconame, $comparison);

        return $this;
    }

    /**
     * Filter the query on the sname column
     *
     * Example usage:
     * <code>
     * $query->filterBySname('fooValue');   // WHERE sname = 'fooValue'
     * $query->filterBySname('%fooValue%', Criteria::LIKE); // WHERE sname LIKE '%fooValue%'
     * $query->filterBySname(['foo', 'bar']); // WHERE sname IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $sname The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySname($sname = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sname)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BillingTableMap::COL_SNAME, $sname, $comparison);

        return $this;
    }

    /**
     * Filter the query on the saddress column
     *
     * Example usage:
     * <code>
     * $query->filterBySaddress('fooValue');   // WHERE saddress = 'fooValue'
     * $query->filterBySaddress('%fooValue%', Criteria::LIKE); // WHERE saddress LIKE '%fooValue%'
     * $query->filterBySaddress(['foo', 'bar']); // WHERE saddress IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $saddress The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySaddress($saddress = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($saddress)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BillingTableMap::COL_SADDRESS, $saddress, $comparison);

        return $this;
    }

    /**
     * Filter the query on the saddress2 column
     *
     * Example usage:
     * <code>
     * $query->filterBySaddress2('fooValue');   // WHERE saddress2 = 'fooValue'
     * $query->filterBySaddress2('%fooValue%', Criteria::LIKE); // WHERE saddress2 LIKE '%fooValue%'
     * $query->filterBySaddress2(['foo', 'bar']); // WHERE saddress2 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $saddress2 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySaddress2($saddress2 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($saddress2)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BillingTableMap::COL_SADDRESS2, $saddress2, $comparison);

        return $this;
    }

    /**
     * Filter the query on the scity column
     *
     * Example usage:
     * <code>
     * $query->filterByScity('fooValue');   // WHERE scity = 'fooValue'
     * $query->filterByScity('%fooValue%', Criteria::LIKE); // WHERE scity LIKE '%fooValue%'
     * $query->filterByScity(['foo', 'bar']); // WHERE scity IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $scity The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByScity($scity = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($scity)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BillingTableMap::COL_SCITY, $scity, $comparison);

        return $this;
    }

    /**
     * Filter the query on the sst column
     *
     * Example usage:
     * <code>
     * $query->filterBySst('fooValue');   // WHERE sst = 'fooValue'
     * $query->filterBySst('%fooValue%', Criteria::LIKE); // WHERE sst LIKE '%fooValue%'
     * $query->filterBySst(['foo', 'bar']); // WHERE sst IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $sst The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySst($sst = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sst)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BillingTableMap::COL_SST, $sst, $comparison);

        return $this;
    }

    /**
     * Filter the query on the szip column
     *
     * Example usage:
     * <code>
     * $query->filterBySzip('fooValue');   // WHERE szip = 'fooValue'
     * $query->filterBySzip('%fooValue%', Criteria::LIKE); // WHERE szip LIKE '%fooValue%'
     * $query->filterBySzip(['foo', 'bar']); // WHERE szip IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $szip The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySzip($szip = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($szip)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BillingTableMap::COL_SZIP, $szip, $comparison);

        return $this;
    }

    /**
     * Filter the query on the scountry column
     *
     * Example usage:
     * <code>
     * $query->filterByScountry('fooValue');   // WHERE scountry = 'fooValue'
     * $query->filterByScountry('%fooValue%', Criteria::LIKE); // WHERE scountry LIKE '%fooValue%'
     * $query->filterByScountry(['foo', 'bar']); // WHERE scountry IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $scountry The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByScountry($scountry = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($scountry)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BillingTableMap::COL_SCOUNTRY, $scountry, $comparison);

        return $this;
    }

    /**
     * Filter the query on the ccno column
     *
     * Example usage:
     * <code>
     * $query->filterByCcno('fooValue');   // WHERE ccno = 'fooValue'
     * $query->filterByCcno('%fooValue%', Criteria::LIKE); // WHERE ccno LIKE '%fooValue%'
     * $query->filterByCcno(['foo', 'bar']); // WHERE ccno IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $ccno The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCcno($ccno = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ccno)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BillingTableMap::COL_CCNO, $ccno, $comparison);

        return $this;
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * $query->filterByEmail(['foo', 'bar']); // WHERE email IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $email The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByEmail($email = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BillingTableMap::COL_EMAIL, $email, $comparison);

        return $this;
    }

    /**
     * Filter the query on the phone column
     *
     * Example usage:
     * <code>
     * $query->filterByPhone('fooValue');   // WHERE phone = 'fooValue'
     * $query->filterByPhone('%fooValue%', Criteria::LIKE); // WHERE phone LIKE '%fooValue%'
     * $query->filterByPhone(['foo', 'bar']); // WHERE phone IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $phone The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPhone($phone = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BillingTableMap::COL_PHONE, $phone, $comparison);

        return $this;
    }

    /**
     * Filter the query on the vc column
     *
     * Example usage:
     * <code>
     * $query->filterByVc('fooValue');   // WHERE vc = 'fooValue'
     * $query->filterByVc('%fooValue%', Criteria::LIKE); // WHERE vc LIKE '%fooValue%'
     * $query->filterByVc(['foo', 'bar']); // WHERE vc IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $vc The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByVc($vc = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($vc)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BillingTableMap::COL_VC, $vc, $comparison);

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

        $this->addUsingAlias(BillingTableMap::COL_ERROR, $error, $comparison);

        return $this;
    }

    /**
     * Filter the query on the ermes column
     *
     * Example usage:
     * <code>
     * $query->filterByErmes('fooValue');   // WHERE ermes = 'fooValue'
     * $query->filterByErmes('%fooValue%', Criteria::LIKE); // WHERE ermes LIKE '%fooValue%'
     * $query->filterByErmes(['foo', 'bar']); // WHERE ermes IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $ermes The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByErmes($ermes = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ermes)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BillingTableMap::COL_ERMES, $ermes, $comparison);

        return $this;
    }

    /**
     * Filter the query on the orders column
     *
     * Example usage:
     * <code>
     * $query->filterByOrders('fooValue');   // WHERE orders = 'fooValue'
     * $query->filterByOrders('%fooValue%', Criteria::LIKE); // WHERE orders LIKE '%fooValue%'
     * $query->filterByOrders(['foo', 'bar']); // WHERE orders IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $orders The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByOrders($orders = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($orders)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BillingTableMap::COL_ORDERS, $orders, $comparison);

        return $this;
    }

    /**
     * Filter the query on the xpdate column
     *
     * Example usage:
     * <code>
     * $query->filterByXpdate('fooValue');   // WHERE xpdate = 'fooValue'
     * $query->filterByXpdate('%fooValue%', Criteria::LIKE); // WHERE xpdate LIKE '%fooValue%'
     * $query->filterByXpdate(['foo', 'bar']); // WHERE xpdate IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $xpdate The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByXpdate($xpdate = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($xpdate)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BillingTableMap::COL_XPDATE, $xpdate, $comparison);

        return $this;
    }

    /**
     * Filter the query on the pono column
     *
     * Example usage:
     * <code>
     * $query->filterByPono('fooValue');   // WHERE pono = 'fooValue'
     * $query->filterByPono('%fooValue%', Criteria::LIKE); // WHERE pono LIKE '%fooValue%'
     * $query->filterByPono(['foo', 'bar']); // WHERE pono IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $pono The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPono($pono = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pono)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BillingTableMap::COL_PONO, $pono, $comparison);

        return $this;
    }

    /**
     * Filter the query on the paymenttype column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymenttype('fooValue');   // WHERE paymenttype = 'fooValue'
     * $query->filterByPaymenttype('%fooValue%', Criteria::LIKE); // WHERE paymenttype LIKE '%fooValue%'
     * $query->filterByPaymenttype(['foo', 'bar']); // WHERE paymenttype IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $paymenttype The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPaymenttype($paymenttype = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($paymenttype)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BillingTableMap::COL_PAYMENTTYPE, $paymenttype, $comparison);

        return $this;
    }

    /**
     * Filter the query on the shipmeth column
     *
     * Example usage:
     * <code>
     * $query->filterByShipmeth('fooValue');   // WHERE shipmeth = 'fooValue'
     * $query->filterByShipmeth('%fooValue%', Criteria::LIKE); // WHERE shipmeth LIKE '%fooValue%'
     * $query->filterByShipmeth(['foo', 'bar']); // WHERE shipmeth IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $shipmeth The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByShipmeth($shipmeth = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipmeth)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BillingTableMap::COL_SHIPMETH, $shipmeth, $comparison);

        return $this;
    }

    /**
     * Filter the query on the shipcom column
     *
     * Example usage:
     * <code>
     * $query->filterByShipcom('fooValue');   // WHERE shipcom = 'fooValue'
     * $query->filterByShipcom('%fooValue%', Criteria::LIKE); // WHERE shipcom LIKE '%fooValue%'
     * $query->filterByShipcom(['foo', 'bar']); // WHERE shipcom IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $shipcom The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByShipcom($shipcom = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipcom)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BillingTableMap::COL_SHIPCOM, $shipcom, $comparison);

        return $this;
    }

    /**
     * Filter the query on the note column
     *
     * Example usage:
     * <code>
     * $query->filterByNote('fooValue');   // WHERE note = 'fooValue'
     * $query->filterByNote('%fooValue%', Criteria::LIKE); // WHERE note LIKE '%fooValue%'
     * $query->filterByNote(['foo', 'bar']); // WHERE note IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $note The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByNote($note = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($note)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BillingTableMap::COL_NOTE, $note, $comparison);

        return $this;
    }

    /**
     * Filter the query on the termtype column
     *
     * Example usage:
     * <code>
     * $query->filterByTermtype('fooValue');   // WHERE termtype = 'fooValue'
     * $query->filterByTermtype('%fooValue%', Criteria::LIKE); // WHERE termtype LIKE '%fooValue%'
     * $query->filterByTermtype(['foo', 'bar']); // WHERE termtype IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $termtype The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTermtype($termtype = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($termtype)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BillingTableMap::COL_TERMTYPE, $termtype, $comparison);

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

        $this->addUsingAlias(BillingTableMap::COL_CUSTID, $custid, $comparison);

        return $this;
    }

    /**
     * Filter the query on the shiptoid column
     *
     * Example usage:
     * <code>
     * $query->filterByShiptoid('fooValue');   // WHERE shiptoid = 'fooValue'
     * $query->filterByShiptoid('%fooValue%', Criteria::LIKE); // WHERE shiptoid LIKE '%fooValue%'
     * $query->filterByShiptoid(['foo', 'bar']); // WHERE shiptoid IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $shiptoid The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByShiptoid($shiptoid = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shiptoid)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BillingTableMap::COL_SHIPTOID, $shiptoid, $comparison);

        return $this;
    }

    /**
     * Filter the query on the baddress3 column
     *
     * Example usage:
     * <code>
     * $query->filterByBaddress3('fooValue');   // WHERE baddress3 = 'fooValue'
     * $query->filterByBaddress3('%fooValue%', Criteria::LIKE); // WHERE baddress3 LIKE '%fooValue%'
     * $query->filterByBaddress3(['foo', 'bar']); // WHERE baddress3 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $baddress3 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByBaddress3($baddress3 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($baddress3)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BillingTableMap::COL_BADDRESS3, $baddress3, $comparison);

        return $this;
    }

    /**
     * Filter the query on the saddress3 column
     *
     * Example usage:
     * <code>
     * $query->filterBySaddress3('fooValue');   // WHERE saddress3 = 'fooValue'
     * $query->filterBySaddress3('%fooValue%', Criteria::LIKE); // WHERE saddress3 LIKE '%fooValue%'
     * $query->filterBySaddress3(['foo', 'bar']); // WHERE saddress3 IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $saddress3 The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySaddress3($saddress3 = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($saddress3)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BillingTableMap::COL_SADDRESS3, $saddress3, $comparison);

        return $this;
    }

    /**
     * Filter the query on the newnbr column
     *
     * Example usage:
     * <code>
     * $query->filterByNewnbr('fooValue');   // WHERE newnbr = 'fooValue'
     * $query->filterByNewnbr('%fooValue%', Criteria::LIKE); // WHERE newnbr LIKE '%fooValue%'
     * $query->filterByNewnbr(['foo', 'bar']); // WHERE newnbr IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $newnbr The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByNewnbr($newnbr = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($newnbr)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BillingTableMap::COL_NEWNBR, $newnbr, $comparison);

        return $this;
    }

    /**
     * Filter the query on the faxnbr column
     *
     * Example usage:
     * <code>
     * $query->filterByFaxnbr('fooValue');   // WHERE faxnbr = 'fooValue'
     * $query->filterByFaxnbr('%fooValue%', Criteria::LIKE); // WHERE faxnbr LIKE '%fooValue%'
     * $query->filterByFaxnbr(['foo', 'bar']); // WHERE faxnbr IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $faxnbr The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByFaxnbr($faxnbr = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($faxnbr)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BillingTableMap::COL_FAXNBR, $faxnbr, $comparison);

        return $this;
    }

    /**
     * Filter the query on the rqstdate column
     *
     * Example usage:
     * <code>
     * $query->filterByRqstdate('fooValue');   // WHERE rqstdate = 'fooValue'
     * $query->filterByRqstdate('%fooValue%', Criteria::LIKE); // WHERE rqstdate LIKE '%fooValue%'
     * $query->filterByRqstdate(['foo', 'bar']); // WHERE rqstdate IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $rqstdate The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByRqstdate($rqstdate = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rqstdate)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BillingTableMap::COL_RQSTDATE, $rqstdate, $comparison);

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

        $this->addUsingAlias(BillingTableMap::COL_DUMMY, $dummy, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildBilling $billing Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
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
    public function doDeleteAll(?ConnectionInterface $con = null): int
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
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(?ConnectionInterface $con = null): int
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

}
