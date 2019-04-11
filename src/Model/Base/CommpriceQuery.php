<?php

namespace Base;

use \Commprice as ChildCommprice;
use \CommpriceQuery as ChildCommpriceQuery;
use \Exception;
use \PDO;
use Map\CommpriceTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'commprice' table.
 *
 *
 *
 * @method     ChildCommpriceQuery orderByItemid($order = Criteria::ASC) Order by the itemid column
 * @method     ChildCommpriceQuery orderByPercent($order = Criteria::ASC) Order by the percent column
 * @method     ChildCommpriceQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildCommpriceQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildCommpriceQuery orderByTime($order = Criteria::ASC) Order by the time column
 *
 * @method     ChildCommpriceQuery groupByItemid() Group by the itemid column
 * @method     ChildCommpriceQuery groupByPercent() Group by the percent column
 * @method     ChildCommpriceQuery groupByPrice() Group by the price column
 * @method     ChildCommpriceQuery groupByDate() Group by the date column
 * @method     ChildCommpriceQuery groupByTime() Group by the time column
 *
 * @method     ChildCommpriceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCommpriceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCommpriceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCommpriceQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCommpriceQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCommpriceQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCommprice findOne(ConnectionInterface $con = null) Return the first ChildCommprice matching the query
 * @method     ChildCommprice findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCommprice matching the query, or a new ChildCommprice object populated from the query conditions when no match is found
 *
 * @method     ChildCommprice findOneByItemid(string $itemid) Return the first ChildCommprice filtered by the itemid column
 * @method     ChildCommprice findOneByPercent(string $percent) Return the first ChildCommprice filtered by the percent column
 * @method     ChildCommprice findOneByPrice(string $price) Return the first ChildCommprice filtered by the price column
 * @method     ChildCommprice findOneByDate(int $date) Return the first ChildCommprice filtered by the date column
 * @method     ChildCommprice findOneByTime(int $time) Return the first ChildCommprice filtered by the time column *

 * @method     ChildCommprice requirePk($key, ConnectionInterface $con = null) Return the ChildCommprice by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCommprice requireOne(ConnectionInterface $con = null) Return the first ChildCommprice matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCommprice requireOneByItemid(string $itemid) Return the first ChildCommprice filtered by the itemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCommprice requireOneByPercent(string $percent) Return the first ChildCommprice filtered by the percent column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCommprice requireOneByPrice(string $price) Return the first ChildCommprice filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCommprice requireOneByDate(int $date) Return the first ChildCommprice filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCommprice requireOneByTime(int $time) Return the first ChildCommprice filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCommprice[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCommprice objects based on current ModelCriteria
 * @method     ChildCommprice[]|ObjectCollection findByItemid(string $itemid) Return ChildCommprice objects filtered by the itemid column
 * @method     ChildCommprice[]|ObjectCollection findByPercent(string $percent) Return ChildCommprice objects filtered by the percent column
 * @method     ChildCommprice[]|ObjectCollection findByPrice(string $price) Return ChildCommprice objects filtered by the price column
 * @method     ChildCommprice[]|ObjectCollection findByDate(int $date) Return ChildCommprice objects filtered by the date column
 * @method     ChildCommprice[]|ObjectCollection findByTime(int $time) Return ChildCommprice objects filtered by the time column
 * @method     ChildCommprice[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CommpriceQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CommpriceQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Commprice', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCommpriceQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCommpriceQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCommpriceQuery) {
            return $criteria;
        }
        $query = new ChildCommpriceQuery();
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
     * @param array[$itemid, $percent] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildCommprice|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CommpriceTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CommpriceTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildCommprice A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT itemid, percent, price, date, time FROM commprice WHERE itemid = :p0 AND percent = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildCommprice $obj */
            $obj = new ChildCommprice();
            $obj->hydrate($row);
            CommpriceTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildCommprice|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCommpriceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(CommpriceTableMap::COL_ITEMID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(CommpriceTableMap::COL_PERCENT, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCommpriceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(CommpriceTableMap::COL_ITEMID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(CommpriceTableMap::COL_PERCENT, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @return $this|ChildCommpriceQuery The current query, for fluid interface
     */
    public function filterByItemid($itemid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommpriceTableMap::COL_ITEMID, $itemid, $comparison);
    }

    /**
     * Filter the query on the percent column
     *
     * Example usage:
     * <code>
     * $query->filterByPercent(1234); // WHERE percent = 1234
     * $query->filterByPercent(array(12, 34)); // WHERE percent IN (12, 34)
     * $query->filterByPercent(array('min' => 12)); // WHERE percent > 12
     * </code>
     *
     * @param     mixed $percent The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCommpriceQuery The current query, for fluid interface
     */
    public function filterByPercent($percent = null, $comparison = null)
    {
        if (is_array($percent)) {
            $useMinMax = false;
            if (isset($percent['min'])) {
                $this->addUsingAlias(CommpriceTableMap::COL_PERCENT, $percent['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($percent['max'])) {
                $this->addUsingAlias(CommpriceTableMap::COL_PERCENT, $percent['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommpriceTableMap::COL_PERCENT, $percent, $comparison);
    }

    /**
     * Filter the query on the price column
     *
     * Example usage:
     * <code>
     * $query->filterByPrice(1234); // WHERE price = 1234
     * $query->filterByPrice(array(12, 34)); // WHERE price IN (12, 34)
     * $query->filterByPrice(array('min' => 12)); // WHERE price > 12
     * </code>
     *
     * @param     mixed $price The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCommpriceQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(CommpriceTableMap::COL_PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(CommpriceTableMap::COL_PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommpriceTableMap::COL_PRICE, $price, $comparison);
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
     * @return $this|ChildCommpriceQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(CommpriceTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(CommpriceTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommpriceTableMap::COL_DATE, $date, $comparison);
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
     * @return $this|ChildCommpriceQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(CommpriceTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(CommpriceTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommpriceTableMap::COL_TIME, $time, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCommprice $commprice Object to remove from the list of results
     *
     * @return $this|ChildCommpriceQuery The current query, for fluid interface
     */
    public function prune($commprice = null)
    {
        if ($commprice) {
            $this->addCond('pruneCond0', $this->getAliasedColName(CommpriceTableMap::COL_ITEMID), $commprice->getItemid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(CommpriceTableMap::COL_PERCENT), $commprice->getPercent(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the commprice table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CommpriceTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CommpriceTableMap::clearInstancePool();
            CommpriceTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CommpriceTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CommpriceTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CommpriceTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CommpriceTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CommpriceQuery
