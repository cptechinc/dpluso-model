<?php

namespace Base;

use \Bookingc as ChildBookingc;
use \BookingcQuery as ChildBookingcQuery;
use \Exception;
use \PDO;
use Map\BookingcTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the `bookingc` table.
 *
 * @method     ChildBookingcQuery orderByCustid($order = Criteria::ASC) Order by the custid column
 * @method     ChildBookingcQuery orderByShiptoid($order = Criteria::ASC) Order by the shiptoid column
 * @method     ChildBookingcQuery orderByBookdate($order = Criteria::ASC) Order by the bookdate column
 * @method     ChildBookingcQuery orderBySalesrep($order = Criteria::ASC) Order by the salesrep column
 * @method     ChildBookingcQuery orderByAmount($order = Criteria::ASC) Order by the amount column
 * @method     ChildBookingcQuery orderByDateupdated($order = Criteria::ASC) Order by the dateupdated column
 * @method     ChildBookingcQuery orderByTimeupdated($order = Criteria::ASC) Order by the timeupdated column
 *
 * @method     ChildBookingcQuery groupByCustid() Group by the custid column
 * @method     ChildBookingcQuery groupByShiptoid() Group by the shiptoid column
 * @method     ChildBookingcQuery groupByBookdate() Group by the bookdate column
 * @method     ChildBookingcQuery groupBySalesrep() Group by the salesrep column
 * @method     ChildBookingcQuery groupByAmount() Group by the amount column
 * @method     ChildBookingcQuery groupByDateupdated() Group by the dateupdated column
 * @method     ChildBookingcQuery groupByTimeupdated() Group by the timeupdated column
 *
 * @method     ChildBookingcQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildBookingcQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildBookingcQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildBookingcQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildBookingcQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildBookingcQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildBookingc|null findOne(?ConnectionInterface $con = null) Return the first ChildBookingc matching the query
 * @method     ChildBookingc findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildBookingc matching the query, or a new ChildBookingc object populated from the query conditions when no match is found
 *
 * @method     ChildBookingc|null findOneByCustid(string $custid) Return the first ChildBookingc filtered by the custid column
 * @method     ChildBookingc|null findOneByShiptoid(string $shiptoid) Return the first ChildBookingc filtered by the shiptoid column
 * @method     ChildBookingc|null findOneByBookdate(int $bookdate) Return the first ChildBookingc filtered by the bookdate column
 * @method     ChildBookingc|null findOneBySalesrep(string $salesrep) Return the first ChildBookingc filtered by the salesrep column
 * @method     ChildBookingc|null findOneByAmount(string $amount) Return the first ChildBookingc filtered by the amount column
 * @method     ChildBookingc|null findOneByDateupdated(int $dateupdated) Return the first ChildBookingc filtered by the dateupdated column
 * @method     ChildBookingc|null findOneByTimeupdated(string $timeupdated) Return the first ChildBookingc filtered by the timeupdated column
 *
 * @method     ChildBookingc requirePk($key, ?ConnectionInterface $con = null) Return the ChildBookingc by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingc requireOne(?ConnectionInterface $con = null) Return the first ChildBookingc matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBookingc requireOneByCustid(string $custid) Return the first ChildBookingc filtered by the custid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingc requireOneByShiptoid(string $shiptoid) Return the first ChildBookingc filtered by the shiptoid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingc requireOneByBookdate(int $bookdate) Return the first ChildBookingc filtered by the bookdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingc requireOneBySalesrep(string $salesrep) Return the first ChildBookingc filtered by the salesrep column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingc requireOneByAmount(string $amount) Return the first ChildBookingc filtered by the amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingc requireOneByDateupdated(int $dateupdated) Return the first ChildBookingc filtered by the dateupdated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingc requireOneByTimeupdated(string $timeupdated) Return the first ChildBookingc filtered by the timeupdated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBookingc[]|Collection find(?ConnectionInterface $con = null) Return ChildBookingc objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildBookingc> find(?ConnectionInterface $con = null) Return ChildBookingc objects based on current ModelCriteria
 *
 * @method     ChildBookingc[]|Collection findByCustid(string|array<string> $custid) Return ChildBookingc objects filtered by the custid column
 * @psalm-method Collection&\Traversable<ChildBookingc> findByCustid(string|array<string> $custid) Return ChildBookingc objects filtered by the custid column
 * @method     ChildBookingc[]|Collection findByShiptoid(string|array<string> $shiptoid) Return ChildBookingc objects filtered by the shiptoid column
 * @psalm-method Collection&\Traversable<ChildBookingc> findByShiptoid(string|array<string> $shiptoid) Return ChildBookingc objects filtered by the shiptoid column
 * @method     ChildBookingc[]|Collection findByBookdate(int|array<int> $bookdate) Return ChildBookingc objects filtered by the bookdate column
 * @psalm-method Collection&\Traversable<ChildBookingc> findByBookdate(int|array<int> $bookdate) Return ChildBookingc objects filtered by the bookdate column
 * @method     ChildBookingc[]|Collection findBySalesrep(string|array<string> $salesrep) Return ChildBookingc objects filtered by the salesrep column
 * @psalm-method Collection&\Traversable<ChildBookingc> findBySalesrep(string|array<string> $salesrep) Return ChildBookingc objects filtered by the salesrep column
 * @method     ChildBookingc[]|Collection findByAmount(string|array<string> $amount) Return ChildBookingc objects filtered by the amount column
 * @psalm-method Collection&\Traversable<ChildBookingc> findByAmount(string|array<string> $amount) Return ChildBookingc objects filtered by the amount column
 * @method     ChildBookingc[]|Collection findByDateupdated(int|array<int> $dateupdated) Return ChildBookingc objects filtered by the dateupdated column
 * @psalm-method Collection&\Traversable<ChildBookingc> findByDateupdated(int|array<int> $dateupdated) Return ChildBookingc objects filtered by the dateupdated column
 * @method     ChildBookingc[]|Collection findByTimeupdated(string|array<string> $timeupdated) Return ChildBookingc objects filtered by the timeupdated column
 * @psalm-method Collection&\Traversable<ChildBookingc> findByTimeupdated(string|array<string> $timeupdated) Return ChildBookingc objects filtered by the timeupdated column
 *
 * @method     ChildBookingc[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildBookingc> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class BookingcQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\BookingcQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Bookingc', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBookingcQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBookingcQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildBookingcQuery) {
            return $criteria;
        }
        $query = new ChildBookingcQuery();
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
     * $obj = $c->findPk(array(12, 34, 56, 78), $con);
     * </code>
     *
     * @param array[$custid, $shiptoid, $bookdate, $salesrep] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildBookingc|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(BookingcTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = BookingcTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2]), (null === $key[3] || is_scalar($key[3]) || is_callable([$key[3], '__toString']) ? (string) $key[3] : $key[3])]))))) {
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
     * @return ChildBookingc A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT custid, shiptoid, bookdate, salesrep, amount, dateupdated, timeupdated FROM bookingc WHERE custid = :p0 AND shiptoid = :p1 AND bookdate = :p2 AND salesrep = :p3';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->bindValue(':p2', $key[2], PDO::PARAM_INT);
            $stmt->bindValue(':p3', $key[3], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildBookingc $obj */
            $obj = new ChildBookingc();
            $obj->hydrate($row);
            BookingcTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2]), (null === $key[3] || is_scalar($key[3]) || is_callable([$key[3], '__toString']) ? (string) $key[3] : $key[3])]));
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
     * @return ChildBookingc|array|mixed the result, formatted by the current formatter
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
        $this->addUsingAlias(BookingcTableMap::COL_CUSTID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(BookingcTableMap::COL_SHIPTOID, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(BookingcTableMap::COL_BOOKDATE, $key[2], Criteria::EQUAL);
        $this->addUsingAlias(BookingcTableMap::COL_SALESREP, $key[3], Criteria::EQUAL);

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
            $cton0 = $this->getNewCriterion(BookingcTableMap::COL_CUSTID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(BookingcTableMap::COL_SHIPTOID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(BookingcTableMap::COL_BOOKDATE, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
            $cton3 = $this->getNewCriterion(BookingcTableMap::COL_SALESREP, $key[3], Criteria::EQUAL);
            $cton0->addAnd($cton3);
            $this->addOr($cton0);
        }

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

        $this->addUsingAlias(BookingcTableMap::COL_CUSTID, $custid, $comparison);

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

        $this->addUsingAlias(BookingcTableMap::COL_SHIPTOID, $shiptoid, $comparison);

        return $this;
    }

    /**
     * Filter the query on the bookdate column
     *
     * Example usage:
     * <code>
     * $query->filterByBookdate(1234); // WHERE bookdate = 1234
     * $query->filterByBookdate(array(12, 34)); // WHERE bookdate IN (12, 34)
     * $query->filterByBookdate(array('min' => 12)); // WHERE bookdate > 12
     * </code>
     *
     * @param mixed $bookdate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByBookdate($bookdate = null, ?string $comparison = null)
    {
        if (is_array($bookdate)) {
            $useMinMax = false;
            if (isset($bookdate['min'])) {
                $this->addUsingAlias(BookingcTableMap::COL_BOOKDATE, $bookdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bookdate['max'])) {
                $this->addUsingAlias(BookingcTableMap::COL_BOOKDATE, $bookdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BookingcTableMap::COL_BOOKDATE, $bookdate, $comparison);

        return $this;
    }

    /**
     * Filter the query on the salesrep column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesrep('fooValue');   // WHERE salesrep = 'fooValue'
     * $query->filterBySalesrep('%fooValue%', Criteria::LIKE); // WHERE salesrep LIKE '%fooValue%'
     * $query->filterBySalesrep(['foo', 'bar']); // WHERE salesrep IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $salesrep The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySalesrep($salesrep = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($salesrep)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BookingcTableMap::COL_SALESREP, $salesrep, $comparison);

        return $this;
    }

    /**
     * Filter the query on the amount column
     *
     * Example usage:
     * <code>
     * $query->filterByAmount(1234); // WHERE amount = 1234
     * $query->filterByAmount(array(12, 34)); // WHERE amount IN (12, 34)
     * $query->filterByAmount(array('min' => 12)); // WHERE amount > 12
     * </code>
     *
     * @param mixed $amount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByAmount($amount = null, ?string $comparison = null)
    {
        if (is_array($amount)) {
            $useMinMax = false;
            if (isset($amount['min'])) {
                $this->addUsingAlias(BookingcTableMap::COL_AMOUNT, $amount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amount['max'])) {
                $this->addUsingAlias(BookingcTableMap::COL_AMOUNT, $amount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BookingcTableMap::COL_AMOUNT, $amount, $comparison);

        return $this;
    }

    /**
     * Filter the query on the dateupdated column
     *
     * Example usage:
     * <code>
     * $query->filterByDateupdated(1234); // WHERE dateupdated = 1234
     * $query->filterByDateupdated(array(12, 34)); // WHERE dateupdated IN (12, 34)
     * $query->filterByDateupdated(array('min' => 12)); // WHERE dateupdated > 12
     * </code>
     *
     * @param mixed $dateupdated The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDateupdated($dateupdated = null, ?string $comparison = null)
    {
        if (is_array($dateupdated)) {
            $useMinMax = false;
            if (isset($dateupdated['min'])) {
                $this->addUsingAlias(BookingcTableMap::COL_DATEUPDATED, $dateupdated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateupdated['max'])) {
                $this->addUsingAlias(BookingcTableMap::COL_DATEUPDATED, $dateupdated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BookingcTableMap::COL_DATEUPDATED, $dateupdated, $comparison);

        return $this;
    }

    /**
     * Filter the query on the timeupdated column
     *
     * Example usage:
     * <code>
     * $query->filterByTimeupdated('fooValue');   // WHERE timeupdated = 'fooValue'
     * $query->filterByTimeupdated('%fooValue%', Criteria::LIKE); // WHERE timeupdated LIKE '%fooValue%'
     * $query->filterByTimeupdated(['foo', 'bar']); // WHERE timeupdated IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $timeupdated The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTimeupdated($timeupdated = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($timeupdated)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BookingcTableMap::COL_TIMEUPDATED, $timeupdated, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildBookingc $bookingc Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($bookingc = null)
    {
        if ($bookingc) {
            $this->addCond('pruneCond0', $this->getAliasedColName(BookingcTableMap::COL_CUSTID), $bookingc->getCustid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(BookingcTableMap::COL_SHIPTOID), $bookingc->getShiptoid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(BookingcTableMap::COL_BOOKDATE), $bookingc->getBookdate(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond3', $this->getAliasedColName(BookingcTableMap::COL_SALESREP), $bookingc->getSalesrep(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2', 'pruneCond3'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the bookingc table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BookingcTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BookingcTableMap::clearInstancePool();
            BookingcTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(BookingcTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(BookingcTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            BookingcTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            BookingcTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
