<?php

namespace Base;

use \Bookingr as ChildBookingr;
use \BookingrQuery as ChildBookingrQuery;
use \Exception;
use \PDO;
use Map\BookingrTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'bookingr' table.
 *
 *
 *
 * @method     ChildBookingrQuery orderBySalesrep($order = Criteria::ASC) Order by the salesrep column
 * @method     ChildBookingrQuery orderByBookdate($order = Criteria::ASC) Order by the bookdate column
 * @method     ChildBookingrQuery orderByWhse($order = Criteria::ASC) Order by the whse column
 * @method     ChildBookingrQuery orderByAmount($order = Criteria::ASC) Order by the amount column
 * @method     ChildBookingrQuery orderBySalesgroup($order = Criteria::ASC) Order by the salesgroup column
 * @method     ChildBookingrQuery orderByDateupdated($order = Criteria::ASC) Order by the dateupdated column
 * @method     ChildBookingrQuery orderByTimeupdated($order = Criteria::ASC) Order by the timeupdated column
 *
 * @method     ChildBookingrQuery groupBySalesrep() Group by the salesrep column
 * @method     ChildBookingrQuery groupByBookdate() Group by the bookdate column
 * @method     ChildBookingrQuery groupByWhse() Group by the whse column
 * @method     ChildBookingrQuery groupByAmount() Group by the amount column
 * @method     ChildBookingrQuery groupBySalesgroup() Group by the salesgroup column
 * @method     ChildBookingrQuery groupByDateupdated() Group by the dateupdated column
 * @method     ChildBookingrQuery groupByTimeupdated() Group by the timeupdated column
 *
 * @method     ChildBookingrQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildBookingrQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildBookingrQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildBookingrQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildBookingrQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildBookingrQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildBookingr findOne(ConnectionInterface $con = null) Return the first ChildBookingr matching the query
 * @method     ChildBookingr findOneOrCreate(ConnectionInterface $con = null) Return the first ChildBookingr matching the query, or a new ChildBookingr object populated from the query conditions when no match is found
 *
 * @method     ChildBookingr findOneBySalesrep(string $salesrep) Return the first ChildBookingr filtered by the salesrep column
 * @method     ChildBookingr findOneByBookdate(int $bookdate) Return the first ChildBookingr filtered by the bookdate column
 * @method     ChildBookingr findOneByWhse(string $whse) Return the first ChildBookingr filtered by the whse column
 * @method     ChildBookingr findOneByAmount(string $amount) Return the first ChildBookingr filtered by the amount column
 * @method     ChildBookingr findOneBySalesgroup(string $salesgroup) Return the first ChildBookingr filtered by the salesgroup column
 * @method     ChildBookingr findOneByDateupdated(int $dateupdated) Return the first ChildBookingr filtered by the dateupdated column
 * @method     ChildBookingr findOneByTimeupdated(string $timeupdated) Return the first ChildBookingr filtered by the timeupdated column *

 * @method     ChildBookingr requirePk($key, ConnectionInterface $con = null) Return the ChildBookingr by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingr requireOne(ConnectionInterface $con = null) Return the first ChildBookingr matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBookingr requireOneBySalesrep(string $salesrep) Return the first ChildBookingr filtered by the salesrep column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingr requireOneByBookdate(int $bookdate) Return the first ChildBookingr filtered by the bookdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingr requireOneByWhse(string $whse) Return the first ChildBookingr filtered by the whse column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingr requireOneByAmount(string $amount) Return the first ChildBookingr filtered by the amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingr requireOneBySalesgroup(string $salesgroup) Return the first ChildBookingr filtered by the salesgroup column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingr requireOneByDateupdated(int $dateupdated) Return the first ChildBookingr filtered by the dateupdated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBookingr requireOneByTimeupdated(string $timeupdated) Return the first ChildBookingr filtered by the timeupdated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBookingr[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildBookingr objects based on current ModelCriteria
 * @method     ChildBookingr[]|ObjectCollection findBySalesrep(string $salesrep) Return ChildBookingr objects filtered by the salesrep column
 * @method     ChildBookingr[]|ObjectCollection findByBookdate(int $bookdate) Return ChildBookingr objects filtered by the bookdate column
 * @method     ChildBookingr[]|ObjectCollection findByWhse(string $whse) Return ChildBookingr objects filtered by the whse column
 * @method     ChildBookingr[]|ObjectCollection findByAmount(string $amount) Return ChildBookingr objects filtered by the amount column
 * @method     ChildBookingr[]|ObjectCollection findBySalesgroup(string $salesgroup) Return ChildBookingr objects filtered by the salesgroup column
 * @method     ChildBookingr[]|ObjectCollection findByDateupdated(int $dateupdated) Return ChildBookingr objects filtered by the dateupdated column
 * @method     ChildBookingr[]|ObjectCollection findByTimeupdated(string $timeupdated) Return ChildBookingr objects filtered by the timeupdated column
 * @method     ChildBookingr[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class BookingrQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\BookingrQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Bookingr', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBookingrQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBookingrQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildBookingrQuery) {
            return $criteria;
        }
        $query = new ChildBookingrQuery();
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
     * @return ChildBookingr|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(BookingrTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = BookingrTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildBookingr A model object, or null if the key is not found
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
            /** @var ChildBookingr $obj */
            $obj = new ChildBookingr();
            $obj->hydrate($row);
            BookingrTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildBookingr|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildBookingrQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(BookingrTableMap::COL_SALESREP, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(BookingrTableMap::COL_BOOKDATE, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildBookingrQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(BookingrTableMap::COL_SALESREP, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(BookingrTableMap::COL_BOOKDATE, $key[1], Criteria::EQUAL);
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
     * </code>
     *
     * @param     string $salesrep The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookingrQuery The current query, for fluid interface
     */
    public function filterBySalesrep($salesrep = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($salesrep)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingrTableMap::COL_SALESREP, $salesrep, $comparison);
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
     * @param     mixed $bookdate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookingrQuery The current query, for fluid interface
     */
    public function filterByBookdate($bookdate = null, $comparison = null)
    {
        if (is_array($bookdate)) {
            $useMinMax = false;
            if (isset($bookdate['min'])) {
                $this->addUsingAlias(BookingrTableMap::COL_BOOKDATE, $bookdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bookdate['max'])) {
                $this->addUsingAlias(BookingrTableMap::COL_BOOKDATE, $bookdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingrTableMap::COL_BOOKDATE, $bookdate, $comparison);
    }

    /**
     * Filter the query on the whse column
     *
     * Example usage:
     * <code>
     * $query->filterByWhse('fooValue');   // WHERE whse = 'fooValue'
     * $query->filterByWhse('%fooValue%', Criteria::LIKE); // WHERE whse LIKE '%fooValue%'
     * </code>
     *
     * @param     string $whse The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookingrQuery The current query, for fluid interface
     */
    public function filterByWhse($whse = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whse)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingrTableMap::COL_WHSE, $whse, $comparison);
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
     * @param     mixed $amount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookingrQuery The current query, for fluid interface
     */
    public function filterByAmount($amount = null, $comparison = null)
    {
        if (is_array($amount)) {
            $useMinMax = false;
            if (isset($amount['min'])) {
                $this->addUsingAlias(BookingrTableMap::COL_AMOUNT, $amount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amount['max'])) {
                $this->addUsingAlias(BookingrTableMap::COL_AMOUNT, $amount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingrTableMap::COL_AMOUNT, $amount, $comparison);
    }

    /**
     * Filter the query on the salesgroup column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesgroup('fooValue');   // WHERE salesgroup = 'fooValue'
     * $query->filterBySalesgroup('%fooValue%', Criteria::LIKE); // WHERE salesgroup LIKE '%fooValue%'
     * </code>
     *
     * @param     string $salesgroup The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookingrQuery The current query, for fluid interface
     */
    public function filterBySalesgroup($salesgroup = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($salesgroup)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingrTableMap::COL_SALESGROUP, $salesgroup, $comparison);
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
     * @param     mixed $dateupdated The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookingrQuery The current query, for fluid interface
     */
    public function filterByDateupdated($dateupdated = null, $comparison = null)
    {
        if (is_array($dateupdated)) {
            $useMinMax = false;
            if (isset($dateupdated['min'])) {
                $this->addUsingAlias(BookingrTableMap::COL_DATEUPDATED, $dateupdated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateupdated['max'])) {
                $this->addUsingAlias(BookingrTableMap::COL_DATEUPDATED, $dateupdated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingrTableMap::COL_DATEUPDATED, $dateupdated, $comparison);
    }

    /**
     * Filter the query on the timeupdated column
     *
     * Example usage:
     * <code>
     * $query->filterByTimeupdated('fooValue');   // WHERE timeupdated = 'fooValue'
     * $query->filterByTimeupdated('%fooValue%', Criteria::LIKE); // WHERE timeupdated LIKE '%fooValue%'
     * </code>
     *
     * @param     string $timeupdated The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookingrQuery The current query, for fluid interface
     */
    public function filterByTimeupdated($timeupdated = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($timeupdated)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookingrTableMap::COL_TIMEUPDATED, $timeupdated, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildBookingr $bookingr Object to remove from the list of results
     *
     * @return $this|ChildBookingrQuery The current query, for fluid interface
     */
    public function prune($bookingr = null)
    {
        if ($bookingr) {
            $this->addCond('pruneCond0', $this->getAliasedColName(BookingrTableMap::COL_SALESREP), $bookingr->getSalesrep(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(BookingrTableMap::COL_BOOKDATE), $bookingr->getBookdate(), Criteria::NOT_EQUAL);
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
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BookingrTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BookingrTableMap::clearInstancePool();
            BookingrTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(BookingrTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(BookingrTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            BookingrTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            BookingrTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // BookingrQuery
