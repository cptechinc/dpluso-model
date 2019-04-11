<?php

namespace Base;

use \Bookingd as ChildBookingd;
use \BookingdQuery as ChildBookingdQuery;
use \Exception;
use \PDO;
use Map\BookingdTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'bookingd' table.
 *
 *
 *
 * @method     ChildBookingdQuery orderByBookdate($order = Criteria::ASC) Order by the bookdate column
 * @method     ChildBookingdQuery orderByCustid($order = Criteria::ASC) Order by the custid column
 * @method     ChildBookingdQuery orderByShiptoid($order = Criteria::ASC) Order by the shiptoid column
 * @method     ChildBookingdQuery orderBySalesorderbase($order = Criteria::ASC) Order by the salesorderbase column
 * @method     ChildBookingdQuery orderByOrigorderline($order = Criteria::ASC) Order by the origorderline column
 * @method     ChildBookingdQuery orderByItemid($order = Criteria::ASC) Order by the itemid column
 * @method     ChildBookingdQuery orderBySalesordernbr($order = Criteria::ASC) Order by the salesordernbr column
 * @method     ChildBookingdQuery orderBySalesperson1($order = Criteria::ASC) Order by the salesperson1 column
 * @method     ChildBookingdQuery orderByB4qty($order = Criteria::ASC) Order by the b4qty column
 * @method     ChildBookingdQuery orderByB4price($order = Criteria::ASC) Order by the b4price column
 * @method     ChildBookingdQuery orderByB4uom($order = Criteria::ASC) Order by the b4uom column
 * @method     ChildBookingdQuery orderByAfterqty($order = Criteria::ASC) Order by the afterqty column
 * @method     ChildBookingdQuery orderByAfterprice($order = Criteria::ASC) Order by the afterprice column
 * @method     ChildBookingdQuery orderByAfteruom($order = Criteria::ASC) Order by the afteruom column
 * @method     ChildBookingdQuery orderByNetamount($order = Criteria::ASC) Order by the netamount column
 * @method     ChildBookingdQuery orderByCreatedate($order = Criteria::ASC) Order by the createdate column
 * @method     ChildBookingdQuery orderByCreatetime($order = Criteria::ASC) Order by the createtime column
 * @method     ChildBookingdQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildBookingdQuery groupByBookdate() Group by the bookdate column
 * @method     ChildBookingdQuery groupByCustid() Group by the custid column
 * @method     ChildBookingdQuery groupByShiptoid() Group by the shiptoid column
 * @method     ChildBookingdQuery groupBySalesorderbase() Group by the salesorderbase column
 * @method     ChildBookingdQuery groupByOrigorderline() Group by the origorderline column
 * @method     ChildBookingdQuery groupByItemid() Group by the itemid column
 * @method     ChildBookingdQuery groupBySalesordernbr() Group by the salesordernbr column
 * @method     ChildBookingdQuery groupBySalesperson1() Group by the salesperson1 column
 * @method     ChildBookingdQuery groupByB4qty() Group by the b4qty column
 * @method     ChildBookingdQuery groupByB4price() Group by the b4price column
 * @method     ChildBookingdQuery groupByB4uom() Group by the b4uom column
 * @method     ChildBookingdQuery groupByAfterqty() Group by the afterqty column
 * @method     ChildBookingdQuery groupByAfterprice() Group by the afterprice column
 * @method     ChildBookingdQuery groupByAfteruom() Group by the afteruom column
 * @method     ChildBookingdQuery groupByNetamount() Group by the netamount column
 * @method     ChildBookingdQuery groupByCreatedate() Group by the createdate column
 * @method     ChildBookingdQuery groupByCreatetime() Group by the createtime column
 * @method     ChildBookingdQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildBookingdQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildBookingdQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildBookingdQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildBookingdQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildBookingdQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildBookingdQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildBookingd findOne(ConnectionInterface $con = null) Return the first ChildBookingd matching the query
 * @method     ChildBookingd findOneOrCreate(ConnectionInterface $con = null) Return the first ChildBookingd matching the query, or a new ChildBookingd object populated from the query conditions when no match is found
 *
 * @method     ChildBookingd findOneByBookdate(string $bookdate) Return the first ChildBookingd filtered by the bookdate column
 * @method     ChildBookingd findOneByCustid(string $custid) Return the first ChildBookingd filtered by the custid column
 * @method     ChildBookingd findOneByShiptoid(string $shiptoid) Return the first ChildBookingd filtered by the shiptoid column
 * @method     ChildBookingd findOneBySalesorderbase(int $salesorderbase) Return the first ChildBookingd filtered by the salesorderbase column
 * @method     ChildBookingd findOneByOrigorderline(int $origorderline) Return the first ChildBookingd filtered by the origorderline column
 * @method     ChildBookingd findOneByItemid(string $itemid) Return the first ChildBookingd filtered by the itemid column
 * @method     ChildBookingd findOneBySalesordernbr(int $salesordernbr) Return the first ChildBookingd filtered by the salesordernbr column
 * @method     ChildBookingd findOneBySalesperson1(string $salesperson1) Return the first ChildBookingd filtered by the salesperson1 column
 * @method     ChildBookingd findOneByB4qty(string $b4qty) Return the first ChildBookingd filtered by the b4qty column
 * @method     ChildBookingd findOneByB4price(string $b4price) Return the first ChildBookingd filtered by the b4price column
 * @method     ChildBookingd findOneByB4uom(string $b4uom) Return the first ChildBookingd filtered by the b4uom column
 * @method     ChildBookingd findOneByAfterqty(string $afterqty) Return the first ChildBookingd filtered by the afterqty column
 * @method     ChildBookingd findOneByAfterprice(string $afterprice) Return the first ChildBookingd filtered by the afterprice column
 * @method     ChildBookingd findOneByAfteruom(string $afteruom) Return the first ChildBookingd filtered by the afteruom column
 * @method     ChildBookingd findOneByNetamount(string $netamount) Return the first ChildBookingd filtered by the netamount column
 * @method     ChildBookingd findOneByCreatedate(string $createdate) Return the first ChildBookingd filtered by the createdate column
 * @method     ChildBookingd findOneByCreatetime(string $createtime) Return the first ChildBookingd filtered by the createtime column
 * @method     ChildBookingd findOneByDummy(string $dummy) Return the first ChildBookingd filtered by the dummy column *

 * @method     ChildBookingd requirePk($key, ConnectionInterface $con = null) Return the ChildBookingd by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingd requireOne(ConnectionInterface $con = null) Return the first ChildBookingd matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBookingd requireOneByBookdate(string $bookdate) Return the first ChildBookingd filtered by the bookdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingd requireOneByCustid(string $custid) Return the first ChildBookingd filtered by the custid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingd requireOneByShiptoid(string $shiptoid) Return the first ChildBookingd filtered by the shiptoid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingd requireOneBySalesorderbase(int $salesorderbase) Return the first ChildBookingd filtered by the salesorderbase column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingd requireOneByOrigorderline(int $origorderline) Return the first ChildBookingd filtered by the origorderline column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingd requireOneByItemid(string $itemid) Return the first ChildBookingd filtered by the itemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingd requireOneBySalesordernbr(int $salesordernbr) Return the first ChildBookingd filtered by the salesordernbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingd requireOneBySalesperson1(string $salesperson1) Return the first ChildBookingd filtered by the salesperson1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingd requireOneByB4qty(string $b4qty) Return the first ChildBookingd filtered by the b4qty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingd requireOneByB4price(string $b4price) Return the first ChildBookingd filtered by the b4price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingd requireOneByB4uom(string $b4uom) Return the first ChildBookingd filtered by the b4uom column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingd requireOneByAfterqty(string $afterqty) Return the first ChildBookingd filtered by the afterqty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingd requireOneByAfterprice(string $afterprice) Return the first ChildBookingd filtered by the afterprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingd requireOneByAfteruom(string $afteruom) Return the first ChildBookingd filtered by the afteruom column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingd requireOneByNetamount(string $netamount) Return the first ChildBookingd filtered by the netamount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingd requireOneByCreatedate(string $createdate) Return the first ChildBookingd filtered by the createdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingd requireOneByCreatetime(string $createtime) Return the first ChildBookingd filtered by the createtime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingd requireOneByDummy(string $dummy) Return the first ChildBookingd filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBookingd[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildBookingd objects based on current ModelCriteria
 * @method     ChildBookingd[]|ObjectCollection findByBookdate(string $bookdate) Return ChildBookingd objects filtered by the bookdate column
 * @method     ChildBookingd[]|ObjectCollection findByCustid(string $custid) Return ChildBookingd objects filtered by the custid column
 * @method     ChildBookingd[]|ObjectCollection findByShiptoid(string $shiptoid) Return ChildBookingd objects filtered by the shiptoid column
 * @method     ChildBookingd[]|ObjectCollection findBySalesorderbase(int $salesorderbase) Return ChildBookingd objects filtered by the salesorderbase column
 * @method     ChildBookingd[]|ObjectCollection findByOrigorderline(int $origorderline) Return ChildBookingd objects filtered by the origorderline column
 * @method     ChildBookingd[]|ObjectCollection findByItemid(string $itemid) Return ChildBookingd objects filtered by the itemid column
 * @method     ChildBookingd[]|ObjectCollection findBySalesordernbr(int $salesordernbr) Return ChildBookingd objects filtered by the salesordernbr column
 * @method     ChildBookingd[]|ObjectCollection findBySalesperson1(string $salesperson1) Return ChildBookingd objects filtered by the salesperson1 column
 * @method     ChildBookingd[]|ObjectCollection findByB4qty(string $b4qty) Return ChildBookingd objects filtered by the b4qty column
 * @method     ChildBookingd[]|ObjectCollection findByB4price(string $b4price) Return ChildBookingd objects filtered by the b4price column
 * @method     ChildBookingd[]|ObjectCollection findByB4uom(string $b4uom) Return ChildBookingd objects filtered by the b4uom column
 * @method     ChildBookingd[]|ObjectCollection findByAfterqty(string $afterqty) Return ChildBookingd objects filtered by the afterqty column
 * @method     ChildBookingd[]|ObjectCollection findByAfterprice(string $afterprice) Return ChildBookingd objects filtered by the afterprice column
 * @method     ChildBookingd[]|ObjectCollection findByAfteruom(string $afteruom) Return ChildBookingd objects filtered by the afteruom column
 * @method     ChildBookingd[]|ObjectCollection findByNetamount(string $netamount) Return ChildBookingd objects filtered by the netamount column
 * @method     ChildBookingd[]|ObjectCollection findByCreatedate(string $createdate) Return ChildBookingd objects filtered by the createdate column
 * @method     ChildBookingd[]|ObjectCollection findByCreatetime(string $createtime) Return ChildBookingd objects filtered by the createtime column
 * @method     ChildBookingd[]|ObjectCollection findByDummy(string $dummy) Return ChildBookingd objects filtered by the dummy column
 * @method     ChildBookingd[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class BookingdQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\BookingdQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Bookingd', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBookingdQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBookingdQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildBookingdQuery) {
            return $criteria;
        }
        $query = new ChildBookingdQuery();
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
     * $obj = $c->findPk(array(12, 34, 56, 78, 91), $con);
     * </code>
     *
     * @param array[$bookdate, $custid, $shiptoid, $salesorderbase, $origorderline, $itemid] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildBookingd|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(BookingdTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = BookingdTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2]), (null === $key[3] || is_scalar($key[3]) || is_callable([$key[3], '__toString']) ? (string) $key[3] : $key[3]), (null === $key[4] || is_scalar($key[4]) || is_callable([$key[4], '__toString']) ? (string) $key[4] : $key[4]), (null === $key[5] || is_scalar($key[5]) || is_callable([$key[5], '__toString']) ? (string) $key[5] : $key[5])]))))) {
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
     * @return ChildBookingd A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT bookdate, custid, shiptoid, salesorderbase, origorderline, itemid, salesordernbr, salesperson1, b4qty, b4price, b4uom, afterqty, afterprice, afteruom, netamount, createdate, createtime, dummy FROM bookingd WHERE bookdate = :p0 AND custid = :p1 AND shiptoid = :p2 AND salesorderbase = :p3 AND origorderline = :p4 AND itemid = :p5';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->bindValue(':p2', $key[2], PDO::PARAM_STR);
            $stmt->bindValue(':p3', $key[3], PDO::PARAM_INT);
            $stmt->bindValue(':p4', $key[4], PDO::PARAM_INT);
            $stmt->bindValue(':p5', $key[5], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildBookingd $obj */
            $obj = new ChildBookingd();
            $obj->hydrate($row);
            BookingdTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2]), (null === $key[3] || is_scalar($key[3]) || is_callable([$key[3], '__toString']) ? (string) $key[3] : $key[3]), (null === $key[4] || is_scalar($key[4]) || is_callable([$key[4], '__toString']) ? (string) $key[4] : $key[4]), (null === $key[5] || is_scalar($key[5]) || is_callable([$key[5], '__toString']) ? (string) $key[5] : $key[5])]));
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
     * @return ChildBookingd|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildBookingdQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(BookingdTableMap::COL_BOOKDATE, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(BookingdTableMap::COL_CUSTID, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(BookingdTableMap::COL_SHIPTOID, $key[2], Criteria::EQUAL);
        $this->addUsingAlias(BookingdTableMap::COL_SALESORDERBASE, $key[3], Criteria::EQUAL);
        $this->addUsingAlias(BookingdTableMap::COL_ORIGORDERLINE, $key[4], Criteria::EQUAL);
        $this->addUsingAlias(BookingdTableMap::COL_ITEMID, $key[5], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildBookingdQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(BookingdTableMap::COL_BOOKDATE, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(BookingdTableMap::COL_CUSTID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(BookingdTableMap::COL_SHIPTOID, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
            $cton3 = $this->getNewCriterion(BookingdTableMap::COL_SALESORDERBASE, $key[3], Criteria::EQUAL);
            $cton0->addAnd($cton3);
            $cton4 = $this->getNewCriterion(BookingdTableMap::COL_ORIGORDERLINE, $key[4], Criteria::EQUAL);
            $cton0->addAnd($cton4);
            $cton5 = $this->getNewCriterion(BookingdTableMap::COL_ITEMID, $key[5], Criteria::EQUAL);
            $cton0->addAnd($cton5);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the bookdate column
     *
     * Example usage:
     * <code>
     * $query->filterByBookdate('fooValue');   // WHERE bookdate = 'fooValue'
     * $query->filterByBookdate('%fooValue%', Criteria::LIKE); // WHERE bookdate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bookdate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookingdQuery The current query, for fluid interface
     */
    public function filterByBookdate($bookdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bookdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingdTableMap::COL_BOOKDATE, $bookdate, $comparison);
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
     * @return $this|ChildBookingdQuery The current query, for fluid interface
     */
    public function filterByCustid($custid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingdTableMap::COL_CUSTID, $custid, $comparison);
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
     * @return $this|ChildBookingdQuery The current query, for fluid interface
     */
    public function filterByShiptoid($shiptoid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shiptoid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingdTableMap::COL_SHIPTOID, $shiptoid, $comparison);
    }

    /**
     * Filter the query on the salesorderbase column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesorderbase(1234); // WHERE salesorderbase = 1234
     * $query->filterBySalesorderbase(array(12, 34)); // WHERE salesorderbase IN (12, 34)
     * $query->filterBySalesorderbase(array('min' => 12)); // WHERE salesorderbase > 12
     * </code>
     *
     * @param     mixed $salesorderbase The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookingdQuery The current query, for fluid interface
     */
    public function filterBySalesorderbase($salesorderbase = null, $comparison = null)
    {
        if (is_array($salesorderbase)) {
            $useMinMax = false;
            if (isset($salesorderbase['min'])) {
                $this->addUsingAlias(BookingdTableMap::COL_SALESORDERBASE, $salesorderbase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($salesorderbase['max'])) {
                $this->addUsingAlias(BookingdTableMap::COL_SALESORDERBASE, $salesorderbase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingdTableMap::COL_SALESORDERBASE, $salesorderbase, $comparison);
    }

    /**
     * Filter the query on the origorderline column
     *
     * Example usage:
     * <code>
     * $query->filterByOrigorderline(1234); // WHERE origorderline = 1234
     * $query->filterByOrigorderline(array(12, 34)); // WHERE origorderline IN (12, 34)
     * $query->filterByOrigorderline(array('min' => 12)); // WHERE origorderline > 12
     * </code>
     *
     * @param     mixed $origorderline The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookingdQuery The current query, for fluid interface
     */
    public function filterByOrigorderline($origorderline = null, $comparison = null)
    {
        if (is_array($origorderline)) {
            $useMinMax = false;
            if (isset($origorderline['min'])) {
                $this->addUsingAlias(BookingdTableMap::COL_ORIGORDERLINE, $origorderline['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($origorderline['max'])) {
                $this->addUsingAlias(BookingdTableMap::COL_ORIGORDERLINE, $origorderline['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingdTableMap::COL_ORIGORDERLINE, $origorderline, $comparison);
    }

    /**
     * Filter the query on the itemid column
     *
     * Example usage:
     * <code>
     * $query->filterByItemid('fooValue');   // WHERE itemid = 'fooValue'
     * $query->filterByItemid('%fooValue%', Criteria::LIKE); // WHERE itemid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $itemid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookingdQuery The current query, for fluid interface
     */
    public function filterByItemid($itemid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingdTableMap::COL_ITEMID, $itemid, $comparison);
    }

    /**
     * Filter the query on the salesordernbr column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesordernbr(1234); // WHERE salesordernbr = 1234
     * $query->filterBySalesordernbr(array(12, 34)); // WHERE salesordernbr IN (12, 34)
     * $query->filterBySalesordernbr(array('min' => 12)); // WHERE salesordernbr > 12
     * </code>
     *
     * @param     mixed $salesordernbr The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookingdQuery The current query, for fluid interface
     */
    public function filterBySalesordernbr($salesordernbr = null, $comparison = null)
    {
        if (is_array($salesordernbr)) {
            $useMinMax = false;
            if (isset($salesordernbr['min'])) {
                $this->addUsingAlias(BookingdTableMap::COL_SALESORDERNBR, $salesordernbr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($salesordernbr['max'])) {
                $this->addUsingAlias(BookingdTableMap::COL_SALESORDERNBR, $salesordernbr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingdTableMap::COL_SALESORDERNBR, $salesordernbr, $comparison);
    }

    /**
     * Filter the query on the salesperson1 column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesperson1('fooValue');   // WHERE salesperson1 = 'fooValue'
     * $query->filterBySalesperson1('%fooValue%', Criteria::LIKE); // WHERE salesperson1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $salesperson1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookingdQuery The current query, for fluid interface
     */
    public function filterBySalesperson1($salesperson1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($salesperson1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingdTableMap::COL_SALESPERSON1, $salesperson1, $comparison);
    }

    /**
     * Filter the query on the b4qty column
     *
     * Example usage:
     * <code>
     * $query->filterByB4qty(1234); // WHERE b4qty = 1234
     * $query->filterByB4qty(array(12, 34)); // WHERE b4qty IN (12, 34)
     * $query->filterByB4qty(array('min' => 12)); // WHERE b4qty > 12
     * </code>
     *
     * @param     mixed $b4qty The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookingdQuery The current query, for fluid interface
     */
    public function filterByB4qty($b4qty = null, $comparison = null)
    {
        if (is_array($b4qty)) {
            $useMinMax = false;
            if (isset($b4qty['min'])) {
                $this->addUsingAlias(BookingdTableMap::COL_B4QTY, $b4qty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($b4qty['max'])) {
                $this->addUsingAlias(BookingdTableMap::COL_B4QTY, $b4qty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingdTableMap::COL_B4QTY, $b4qty, $comparison);
    }

    /**
     * Filter the query on the b4price column
     *
     * Example usage:
     * <code>
     * $query->filterByB4price(1234); // WHERE b4price = 1234
     * $query->filterByB4price(array(12, 34)); // WHERE b4price IN (12, 34)
     * $query->filterByB4price(array('min' => 12)); // WHERE b4price > 12
     * </code>
     *
     * @param     mixed $b4price The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookingdQuery The current query, for fluid interface
     */
    public function filterByB4price($b4price = null, $comparison = null)
    {
        if (is_array($b4price)) {
            $useMinMax = false;
            if (isset($b4price['min'])) {
                $this->addUsingAlias(BookingdTableMap::COL_B4PRICE, $b4price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($b4price['max'])) {
                $this->addUsingAlias(BookingdTableMap::COL_B4PRICE, $b4price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingdTableMap::COL_B4PRICE, $b4price, $comparison);
    }

    /**
     * Filter the query on the b4uom column
     *
     * Example usage:
     * <code>
     * $query->filterByB4uom('fooValue');   // WHERE b4uom = 'fooValue'
     * $query->filterByB4uom('%fooValue%', Criteria::LIKE); // WHERE b4uom LIKE '%fooValue%'
     * </code>
     *
     * @param     string $b4uom The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookingdQuery The current query, for fluid interface
     */
    public function filterByB4uom($b4uom = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($b4uom)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingdTableMap::COL_B4UOM, $b4uom, $comparison);
    }

    /**
     * Filter the query on the afterqty column
     *
     * Example usage:
     * <code>
     * $query->filterByAfterqty(1234); // WHERE afterqty = 1234
     * $query->filterByAfterqty(array(12, 34)); // WHERE afterqty IN (12, 34)
     * $query->filterByAfterqty(array('min' => 12)); // WHERE afterqty > 12
     * </code>
     *
     * @param     mixed $afterqty The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookingdQuery The current query, for fluid interface
     */
    public function filterByAfterqty($afterqty = null, $comparison = null)
    {
        if (is_array($afterqty)) {
            $useMinMax = false;
            if (isset($afterqty['min'])) {
                $this->addUsingAlias(BookingdTableMap::COL_AFTERQTY, $afterqty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($afterqty['max'])) {
                $this->addUsingAlias(BookingdTableMap::COL_AFTERQTY, $afterqty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingdTableMap::COL_AFTERQTY, $afterqty, $comparison);
    }

    /**
     * Filter the query on the afterprice column
     *
     * Example usage:
     * <code>
     * $query->filterByAfterprice(1234); // WHERE afterprice = 1234
     * $query->filterByAfterprice(array(12, 34)); // WHERE afterprice IN (12, 34)
     * $query->filterByAfterprice(array('min' => 12)); // WHERE afterprice > 12
     * </code>
     *
     * @param     mixed $afterprice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookingdQuery The current query, for fluid interface
     */
    public function filterByAfterprice($afterprice = null, $comparison = null)
    {
        if (is_array($afterprice)) {
            $useMinMax = false;
            if (isset($afterprice['min'])) {
                $this->addUsingAlias(BookingdTableMap::COL_AFTERPRICE, $afterprice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($afterprice['max'])) {
                $this->addUsingAlias(BookingdTableMap::COL_AFTERPRICE, $afterprice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingdTableMap::COL_AFTERPRICE, $afterprice, $comparison);
    }

    /**
     * Filter the query on the afteruom column
     *
     * Example usage:
     * <code>
     * $query->filterByAfteruom('fooValue');   // WHERE afteruom = 'fooValue'
     * $query->filterByAfteruom('%fooValue%', Criteria::LIKE); // WHERE afteruom LIKE '%fooValue%'
     * </code>
     *
     * @param     string $afteruom The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookingdQuery The current query, for fluid interface
     */
    public function filterByAfteruom($afteruom = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($afteruom)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingdTableMap::COL_AFTERUOM, $afteruom, $comparison);
    }

    /**
     * Filter the query on the netamount column
     *
     * Example usage:
     * <code>
     * $query->filterByNetamount(1234); // WHERE netamount = 1234
     * $query->filterByNetamount(array(12, 34)); // WHERE netamount IN (12, 34)
     * $query->filterByNetamount(array('min' => 12)); // WHERE netamount > 12
     * </code>
     *
     * @param     mixed $netamount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookingdQuery The current query, for fluid interface
     */
    public function filterByNetamount($netamount = null, $comparison = null)
    {
        if (is_array($netamount)) {
            $useMinMax = false;
            if (isset($netamount['min'])) {
                $this->addUsingAlias(BookingdTableMap::COL_NETAMOUNT, $netamount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($netamount['max'])) {
                $this->addUsingAlias(BookingdTableMap::COL_NETAMOUNT, $netamount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingdTableMap::COL_NETAMOUNT, $netamount, $comparison);
    }

    /**
     * Filter the query on the createdate column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedate('fooValue');   // WHERE createdate = 'fooValue'
     * $query->filterByCreatedate('%fooValue%', Criteria::LIKE); // WHERE createdate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $createdate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookingdQuery The current query, for fluid interface
     */
    public function filterByCreatedate($createdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($createdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingdTableMap::COL_CREATEDATE, $createdate, $comparison);
    }

    /**
     * Filter the query on the createtime column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatetime('fooValue');   // WHERE createtime = 'fooValue'
     * $query->filterByCreatetime('%fooValue%', Criteria::LIKE); // WHERE createtime LIKE '%fooValue%'
     * </code>
     *
     * @param     string $createtime The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookingdQuery The current query, for fluid interface
     */
    public function filterByCreatetime($createtime = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($createtime)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingdTableMap::COL_CREATETIME, $createtime, $comparison);
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
     * @return $this|ChildBookingdQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingdTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildBookingd $bookingd Object to remove from the list of results
     *
     * @return $this|ChildBookingdQuery The current query, for fluid interface
     */
    public function prune($bookingd = null)
    {
        if ($bookingd) {
            $this->addCond('pruneCond0', $this->getAliasedColName(BookingdTableMap::COL_BOOKDATE), $bookingd->getBookdate(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(BookingdTableMap::COL_CUSTID), $bookingd->getCustid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(BookingdTableMap::COL_SHIPTOID), $bookingd->getShiptoid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond3', $this->getAliasedColName(BookingdTableMap::COL_SALESORDERBASE), $bookingd->getSalesorderbase(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond4', $this->getAliasedColName(BookingdTableMap::COL_ORIGORDERLINE), $bookingd->getOrigorderline(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond5', $this->getAliasedColName(BookingdTableMap::COL_ITEMID), $bookingd->getItemid(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2', 'pruneCond3', 'pruneCond4', 'pruneCond5'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the bookingd table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BookingdTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BookingdTableMap::clearInstancePool();
            BookingdTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(BookingdTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(BookingdTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            BookingdTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            BookingdTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // BookingdQuery
