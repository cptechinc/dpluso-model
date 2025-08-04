<?php

namespace Base;

use \Bookingsr as ChildBookingsr;
use \BookingsrQuery as ChildBookingsrQuery;
use \Exception;
use \PDO;
use Map\BookingsrTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the `bookingr` table.
 *
 * @method     ChildBookingsrQuery orderBySalesrep($order = Criteria::ASC) Order by the salesrep column
 * @method     ChildBookingsrQuery orderByBookdate($order = Criteria::ASC) Order by the bookdate column
 * @method     ChildBookingsrQuery orderByWhse($order = Criteria::ASC) Order by the whse column
 * @method     ChildBookingsrQuery orderByAmount($order = Criteria::ASC) Order by the amount column
 * @method     ChildBookingsrQuery orderBySalesgroup($order = Criteria::ASC) Order by the salesgroup column
 * @method     ChildBookingsrQuery orderByDateupdated($order = Criteria::ASC) Order by the dateupdated column
 * @method     ChildBookingsrQuery orderByTimeupdated($order = Criteria::ASC) Order by the timeupdated column
 *
 * @method     ChildBookingsrQuery groupBySalesrep() Group by the salesrep column
 * @method     ChildBookingsrQuery groupByBookdate() Group by the bookdate column
 * @method     ChildBookingsrQuery groupByWhse() Group by the whse column
 * @method     ChildBookingsrQuery groupByAmount() Group by the amount column
 * @method     ChildBookingsrQuery groupBySalesgroup() Group by the salesgroup column
 * @method     ChildBookingsrQuery groupByDateupdated() Group by the dateupdated column
 * @method     ChildBookingsrQuery groupByTimeupdated() Group by the timeupdated column
 *
 * @method     ChildBookingsrQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildBookingsrQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildBookingsrQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildBookingsrQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildBookingsrQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildBookingsrQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildBookingsr|null findOne(?ConnectionInterface $con = null) Return the first ChildBookingsr matching the query
 * @method     ChildBookingsr findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildBookingsr matching the query, or a new ChildBookingsr object populated from the query conditions when no match is found
 *
 * @method     ChildBookingsr|null findOneBySalesrep(string $salesrep) Return the first ChildBookingsr filtered by the salesrep column
 * @method     ChildBookingsr|null findOneByBookdate(int $bookdate) Return the first ChildBookingsr filtered by the bookdate column
 * @method     ChildBookingsr|null findOneByWhse(string $whse) Return the first ChildBookingsr filtered by the whse column
 * @method     ChildBookingsr|null findOneByAmount(string $amount) Return the first ChildBookingsr filtered by the amount column
 * @method     ChildBookingsr|null findOneBySalesgroup(string $salesgroup) Return the first ChildBookingsr filtered by the salesgroup column
 * @method     ChildBookingsr|null findOneByDateupdated(int $dateupdated) Return the first ChildBookingsr filtered by the dateupdated column
 * @method     ChildBookingsr|null findOneByTimeupdated(string $timeupdated) Return the first ChildBookingsr filtered by the timeupdated column
 *
 * @method     ChildBookingsr requirePk($key, ?ConnectionInterface $con = null) Return the ChildBookingsr by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingsr requireOne(?ConnectionInterface $con = null) Return the first ChildBookingsr matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBookingsr requireOneBySalesrep(string $salesrep) Return the first ChildBookingsr filtered by the salesrep column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingsr requireOneByBookdate(int $bookdate) Return the first ChildBookingsr filtered by the bookdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingsr requireOneByWhse(string $whse) Return the first ChildBookingsr filtered by the whse column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingsr requireOneByAmount(string $amount) Return the first ChildBookingsr filtered by the amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingsr requireOneBySalesgroup(string $salesgroup) Return the first ChildBookingsr filtered by the salesgroup column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingsr requireOneByDateupdated(int $dateupdated) Return the first ChildBookingsr filtered by the dateupdated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingsr requireOneByTimeupdated(string $timeupdated) Return the first ChildBookingsr filtered by the timeupdated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBookingsr[]|Collection find(?ConnectionInterface $con = null) Return ChildBookingsr objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildBookingsr> find(?ConnectionInterface $con = null) Return ChildBookingsr objects based on current ModelCriteria
 *
 * @method     ChildBookingsr[]|Collection findBySalesrep(string|array<string> $salesrep) Return ChildBookingsr objects filtered by the salesrep column
 * @psalm-method Collection&\Traversable<ChildBookingsr> findBySalesrep(string|array<string> $salesrep) Return ChildBookingsr objects filtered by the salesrep column
 * @method     ChildBookingsr[]|Collection findByBookdate(int|array<int> $bookdate) Return ChildBookingsr objects filtered by the bookdate column
 * @psalm-method Collection&\Traversable<ChildBookingsr> findByBookdate(int|array<int> $bookdate) Return ChildBookingsr objects filtered by the bookdate column
 * @method     ChildBookingsr[]|Collection findByWhse(string|array<string> $whse) Return ChildBookingsr objects filtered by the whse column
 * @psalm-method Collection&\Traversable<ChildBookingsr> findByWhse(string|array<string> $whse) Return ChildBookingsr objects filtered by the whse column
 * @method     ChildBookingsr[]|Collection findByAmount(string|array<string> $amount) Return ChildBookingsr objects filtered by the amount column
 * @psalm-method Collection&\Traversable<ChildBookingsr> findByAmount(string|array<string> $amount) Return ChildBookingsr objects filtered by the amount column
 * @method     ChildBookingsr[]|Collection findBySalesgroup(string|array<string> $salesgroup) Return ChildBookingsr objects filtered by the salesgroup column
 * @psalm-method Collection&\Traversable<ChildBookingsr> findBySalesgroup(string|array<string> $salesgroup) Return ChildBookingsr objects filtered by the salesgroup column
 * @method     ChildBookingsr[]|Collection findByDateupdated(int|array<int> $dateupdated) Return ChildBookingsr objects filtered by the dateupdated column
 * @psalm-method Collection&\Traversable<ChildBookingsr> findByDateupdated(int|array<int> $dateupdated) Return ChildBookingsr objects filtered by the dateupdated column
 * @method     ChildBookingsr[]|Collection findByTimeupdated(string|array<string> $timeupdated) Return ChildBookingsr objects filtered by the timeupdated column
 * @psalm-method Collection&\Traversable<ChildBookingsr> findByTimeupdated(string|array<string> $timeupdated) Return ChildBookingsr objects filtered by the timeupdated column
 *
 * @method     ChildBookingsr[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildBookingsr> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class BookingsrQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\BookingsrQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Bookingsr', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBookingsrQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBookingsrQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildBookingsrQuery) {
            return $criteria;
        }
        $query = new ChildBookingsrQuery();
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
     * @param array[$salesrep, $bookdate] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildBookingsr|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(BookingsrTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = BookingsrTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildBookingsr A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT salesrep, bookdate, whse, amount, salesgroup, dateupdated, timeupdated FROM bookingr WHERE salesrep = :p0 AND bookdate = :p1';
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
            /** @var ChildBookingsr $obj */
            $obj = new ChildBookingsr();
            $obj->hydrate($row);
            BookingsrTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildBookingsr|array|mixed the result, formatted by the current formatter
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
        $this->addUsingAlias(BookingsrTableMap::COL_SALESREP, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(BookingsrTableMap::COL_BOOKDATE, $key[1], Criteria::EQUAL);

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
            $cton0 = $this->getNewCriterion(BookingsrTableMap::COL_SALESREP, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(BookingsrTableMap::COL_BOOKDATE, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

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

        $this->addUsingAlias(BookingsrTableMap::COL_SALESREP, $salesrep, $comparison);

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
                $this->addUsingAlias(BookingsrTableMap::COL_BOOKDATE, $bookdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bookdate['max'])) {
                $this->addUsingAlias(BookingsrTableMap::COL_BOOKDATE, $bookdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BookingsrTableMap::COL_BOOKDATE, $bookdate, $comparison);

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

        $this->addUsingAlias(BookingsrTableMap::COL_WHSE, $whse, $comparison);

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
                $this->addUsingAlias(BookingsrTableMap::COL_AMOUNT, $amount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amount['max'])) {
                $this->addUsingAlias(BookingsrTableMap::COL_AMOUNT, $amount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BookingsrTableMap::COL_AMOUNT, $amount, $comparison);

        return $this;
    }

    /**
     * Filter the query on the salesgroup column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesgroup('fooValue');   // WHERE salesgroup = 'fooValue'
     * $query->filterBySalesgroup('%fooValue%', Criteria::LIKE); // WHERE salesgroup LIKE '%fooValue%'
     * $query->filterBySalesgroup(['foo', 'bar']); // WHERE salesgroup IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $salesgroup The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySalesgroup($salesgroup = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($salesgroup)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BookingsrTableMap::COL_SALESGROUP, $salesgroup, $comparison);

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
                $this->addUsingAlias(BookingsrTableMap::COL_DATEUPDATED, $dateupdated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateupdated['max'])) {
                $this->addUsingAlias(BookingsrTableMap::COL_DATEUPDATED, $dateupdated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(BookingsrTableMap::COL_DATEUPDATED, $dateupdated, $comparison);

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

        $this->addUsingAlias(BookingsrTableMap::COL_TIMEUPDATED, $timeupdated, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildBookingsr $bookingsr Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($bookingsr = null)
    {
        if ($bookingsr) {
            $this->addCond('pruneCond0', $this->getAliasedColName(BookingsrTableMap::COL_SALESREP), $bookingsr->getSalesrep(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(BookingsrTableMap::COL_BOOKDATE), $bookingsr->getBookdate(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the bookingr table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BookingsrTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BookingsrTableMap::clearInstancePool();
            BookingsrTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(BookingsrTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(BookingsrTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            BookingsrTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            BookingsrTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
