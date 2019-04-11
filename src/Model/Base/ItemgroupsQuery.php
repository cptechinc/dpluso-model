<?php

namespace Base;

use \Itemgroups as ChildItemgroups;
use \ItemgroupsQuery as ChildItemgroupsQuery;
use \Exception;
use \PDO;
use Map\ItemgroupsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'itemgroups' table.
 *
 *
 *
 * @method     ChildItemgroupsQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     ChildItemgroupsQuery orderByDesc($order = Criteria::ASC) Order by the desc column
 * @method     ChildItemgroupsQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildItemgroupsQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildItemgroupsQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildItemgroupsQuery groupByCode() Group by the code column
 * @method     ChildItemgroupsQuery groupByDesc() Group by the desc column
 * @method     ChildItemgroupsQuery groupByDate() Group by the date column
 * @method     ChildItemgroupsQuery groupByTime() Group by the time column
 * @method     ChildItemgroupsQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildItemgroupsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildItemgroupsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildItemgroupsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildItemgroupsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildItemgroupsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildItemgroupsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildItemgroups findOne(ConnectionInterface $con = null) Return the first ChildItemgroups matching the query
 * @method     ChildItemgroups findOneOrCreate(ConnectionInterface $con = null) Return the first ChildItemgroups matching the query, or a new ChildItemgroups object populated from the query conditions when no match is found
 *
 * @method     ChildItemgroups findOneByCode(string $code) Return the first ChildItemgroups filtered by the code column
 * @method     ChildItemgroups findOneByDesc(string $desc) Return the first ChildItemgroups filtered by the desc column
 * @method     ChildItemgroups findOneByDate(int $date) Return the first ChildItemgroups filtered by the date column
 * @method     ChildItemgroups findOneByTime(int $time) Return the first ChildItemgroups filtered by the time column
 * @method     ChildItemgroups findOneByDummy(string $dummy) Return the first ChildItemgroups filtered by the dummy column *

 * @method     ChildItemgroups requirePk($key, ConnectionInterface $con = null) Return the ChildItemgroups by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemgroups requireOne(ConnectionInterface $con = null) Return the first ChildItemgroups matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildItemgroups requireOneByCode(string $code) Return the first ChildItemgroups filtered by the code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemgroups requireOneByDesc(string $desc) Return the first ChildItemgroups filtered by the desc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemgroups requireOneByDate(int $date) Return the first ChildItemgroups filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemgroups requireOneByTime(int $time) Return the first ChildItemgroups filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemgroups requireOneByDummy(string $dummy) Return the first ChildItemgroups filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildItemgroups[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildItemgroups objects based on current ModelCriteria
 * @method     ChildItemgroups[]|ObjectCollection findByCode(string $code) Return ChildItemgroups objects filtered by the code column
 * @method     ChildItemgroups[]|ObjectCollection findByDesc(string $desc) Return ChildItemgroups objects filtered by the desc column
 * @method     ChildItemgroups[]|ObjectCollection findByDate(int $date) Return ChildItemgroups objects filtered by the date column
 * @method     ChildItemgroups[]|ObjectCollection findByTime(int $time) Return ChildItemgroups objects filtered by the time column
 * @method     ChildItemgroups[]|ObjectCollection findByDummy(string $dummy) Return ChildItemgroups objects filtered by the dummy column
 * @method     ChildItemgroups[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ItemgroupsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ItemgroupsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Itemgroups', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildItemgroupsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildItemgroupsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildItemgroupsQuery) {
            return $criteria;
        }
        $query = new ChildItemgroupsQuery();
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
     * @return ChildItemgroups|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ItemgroupsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ItemgroupsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildItemgroups A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT code, desc, date, time, dummy FROM itemgroups WHERE code = :p0';
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
            /** @var ChildItemgroups $obj */
            $obj = new ChildItemgroups();
            $obj->hydrate($row);
            ItemgroupsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildItemgroups|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildItemgroupsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ItemgroupsTableMap::COL_CODE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildItemgroupsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ItemgroupsTableMap::COL_CODE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the code column
     *
     * Example usage:
     * <code>
     * $query->filterByCode('fooValue');   // WHERE code = 'fooValue'
     * $query->filterByCode('%fooValue%', Criteria::LIKE); // WHERE code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $code The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemgroupsQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemgroupsTableMap::COL_CODE, $code, $comparison);
    }

    /**
     * Filter the query on the desc column
     *
     * Example usage:
     * <code>
     * $query->filterByDesc('fooValue');   // WHERE desc = 'fooValue'
     * $query->filterByDesc('%fooValue%', Criteria::LIKE); // WHERE desc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $desc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemgroupsQuery The current query, for fluid interface
     */
    public function filterByDesc($desc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($desc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemgroupsTableMap::COL_DESC, $desc, $comparison);
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
     * @return $this|ChildItemgroupsQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(ItemgroupsTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(ItemgroupsTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemgroupsTableMap::COL_DATE, $date, $comparison);
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
     * @return $this|ChildItemgroupsQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(ItemgroupsTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(ItemgroupsTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemgroupsTableMap::COL_TIME, $time, $comparison);
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
     * @return $this|ChildItemgroupsQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemgroupsTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildItemgroups $itemgroups Object to remove from the list of results
     *
     * @return $this|ChildItemgroupsQuery The current query, for fluid interface
     */
    public function prune($itemgroups = null)
    {
        if ($itemgroups) {
            $this->addUsingAlias(ItemgroupsTableMap::COL_CODE, $itemgroups->getCode(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the itemgroups table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ItemgroupsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ItemgroupsTableMap::clearInstancePool();
            ItemgroupsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ItemgroupsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ItemgroupsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ItemgroupsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ItemgroupsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ItemgroupsQuery
