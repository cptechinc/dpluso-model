<?php

namespace Base;

use \ItemMakeModelYear as ChildItemMakeModelYear;
use \ItemMakeModelYearQuery as ChildItemMakeModelYearQuery;
use \Exception;
use \PDO;
use Map\ItemMakeModelYearTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'item_make_model' table.
 *
 *
 *
 * @method     ChildItemMakeModelYearQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildItemMakeModelYearQuery orderByFromyear($order = Criteria::ASC) Order by the fromyear column
 * @method     ChildItemMakeModelYearQuery orderByThroughyear($order = Criteria::ASC) Order by the throughyear column
 * @method     ChildItemMakeModelYearQuery orderByMake($order = Criteria::ASC) Order by the make column
 * @method     ChildItemMakeModelYearQuery orderByModel($order = Criteria::ASC) Order by the model column
 * @method     ChildItemMakeModelYearQuery orderByItemid($order = Criteria::ASC) Order by the itemid column
 * @method     ChildItemMakeModelYearQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildItemMakeModelYearQuery orderByTime($order = Criteria::ASC) Order by the time column
 *
 * @method     ChildItemMakeModelYearQuery groupById() Group by the id column
 * @method     ChildItemMakeModelYearQuery groupByFromyear() Group by the fromyear column
 * @method     ChildItemMakeModelYearQuery groupByThroughyear() Group by the throughyear column
 * @method     ChildItemMakeModelYearQuery groupByMake() Group by the make column
 * @method     ChildItemMakeModelYearQuery groupByModel() Group by the model column
 * @method     ChildItemMakeModelYearQuery groupByItemid() Group by the itemid column
 * @method     ChildItemMakeModelYearQuery groupByDate() Group by the date column
 * @method     ChildItemMakeModelYearQuery groupByTime() Group by the time column
 *
 * @method     ChildItemMakeModelYearQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildItemMakeModelYearQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildItemMakeModelYearQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildItemMakeModelYearQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildItemMakeModelYearQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildItemMakeModelYearQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildItemMakeModelYear findOne(ConnectionInterface $con = null) Return the first ChildItemMakeModelYear matching the query
 * @method     ChildItemMakeModelYear findOneOrCreate(ConnectionInterface $con = null) Return the first ChildItemMakeModelYear matching the query, or a new ChildItemMakeModelYear object populated from the query conditions when no match is found
 *
 * @method     ChildItemMakeModelYear findOneById(int $id) Return the first ChildItemMakeModelYear filtered by the id column
 * @method     ChildItemMakeModelYear findOneByFromyear(int $fromyear) Return the first ChildItemMakeModelYear filtered by the fromyear column
 * @method     ChildItemMakeModelYear findOneByThroughyear(int $throughyear) Return the first ChildItemMakeModelYear filtered by the throughyear column
 * @method     ChildItemMakeModelYear findOneByMake(string $make) Return the first ChildItemMakeModelYear filtered by the make column
 * @method     ChildItemMakeModelYear findOneByModel(string $model) Return the first ChildItemMakeModelYear filtered by the model column
 * @method     ChildItemMakeModelYear findOneByItemid(string $itemid) Return the first ChildItemMakeModelYear filtered by the itemid column
 * @method     ChildItemMakeModelYear findOneByDate(int $date) Return the first ChildItemMakeModelYear filtered by the date column
 * @method     ChildItemMakeModelYear findOneByTime(int $time) Return the first ChildItemMakeModelYear filtered by the time column *

 * @method     ChildItemMakeModelYear requirePk($key, ConnectionInterface $con = null) Return the ChildItemMakeModelYear by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemMakeModelYear requireOne(ConnectionInterface $con = null) Return the first ChildItemMakeModelYear matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildItemMakeModelYear requireOneById(int $id) Return the first ChildItemMakeModelYear filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemMakeModelYear requireOneByFromyear(int $fromyear) Return the first ChildItemMakeModelYear filtered by the fromyear column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemMakeModelYear requireOneByThroughyear(int $throughyear) Return the first ChildItemMakeModelYear filtered by the throughyear column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemMakeModelYear requireOneByMake(string $make) Return the first ChildItemMakeModelYear filtered by the make column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemMakeModelYear requireOneByModel(string $model) Return the first ChildItemMakeModelYear filtered by the model column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemMakeModelYear requireOneByItemid(string $itemid) Return the first ChildItemMakeModelYear filtered by the itemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemMakeModelYear requireOneByDate(int $date) Return the first ChildItemMakeModelYear filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItemMakeModelYear requireOneByTime(int $time) Return the first ChildItemMakeModelYear filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildItemMakeModelYear[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildItemMakeModelYear objects based on current ModelCriteria
 * @method     ChildItemMakeModelYear[]|ObjectCollection findById(int $id) Return ChildItemMakeModelYear objects filtered by the id column
 * @method     ChildItemMakeModelYear[]|ObjectCollection findByFromyear(int $fromyear) Return ChildItemMakeModelYear objects filtered by the fromyear column
 * @method     ChildItemMakeModelYear[]|ObjectCollection findByThroughyear(int $throughyear) Return ChildItemMakeModelYear objects filtered by the throughyear column
 * @method     ChildItemMakeModelYear[]|ObjectCollection findByMake(string $make) Return ChildItemMakeModelYear objects filtered by the make column
 * @method     ChildItemMakeModelYear[]|ObjectCollection findByModel(string $model) Return ChildItemMakeModelYear objects filtered by the model column
 * @method     ChildItemMakeModelYear[]|ObjectCollection findByItemid(string $itemid) Return ChildItemMakeModelYear objects filtered by the itemid column
 * @method     ChildItemMakeModelYear[]|ObjectCollection findByDate(int $date) Return ChildItemMakeModelYear objects filtered by the date column
 * @method     ChildItemMakeModelYear[]|ObjectCollection findByTime(int $time) Return ChildItemMakeModelYear objects filtered by the time column
 * @method     ChildItemMakeModelYear[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ItemMakeModelYearQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ItemMakeModelYearQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\ItemMakeModelYear', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildItemMakeModelYearQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildItemMakeModelYearQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildItemMakeModelYearQuery) {
            return $criteria;
        }
        $query = new ChildItemMakeModelYearQuery();
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
     * @return ChildItemMakeModelYear|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ItemMakeModelYearTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ItemMakeModelYearTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildItemMakeModelYear A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, fromyear, throughyear, make, model, itemid, date, time FROM item_make_model WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildItemMakeModelYear $obj */
            $obj = new ChildItemMakeModelYear();
            $obj->hydrate($row);
            ItemMakeModelYearTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildItemMakeModelYear|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildItemMakeModelYearQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ItemMakeModelYearTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildItemMakeModelYearQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ItemMakeModelYearTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemMakeModelYearQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ItemMakeModelYearTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ItemMakeModelYearTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemMakeModelYearTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the fromyear column
     *
     * Example usage:
     * <code>
     * $query->filterByFromyear(1234); // WHERE fromyear = 1234
     * $query->filterByFromyear(array(12, 34)); // WHERE fromyear IN (12, 34)
     * $query->filterByFromyear(array('min' => 12)); // WHERE fromyear > 12
     * </code>
     *
     * @param     mixed $fromyear The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemMakeModelYearQuery The current query, for fluid interface
     */
    public function filterByFromyear($fromyear = null, $comparison = null)
    {
        if (is_array($fromyear)) {
            $useMinMax = false;
            if (isset($fromyear['min'])) {
                $this->addUsingAlias(ItemMakeModelYearTableMap::COL_FROMYEAR, $fromyear['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fromyear['max'])) {
                $this->addUsingAlias(ItemMakeModelYearTableMap::COL_FROMYEAR, $fromyear['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemMakeModelYearTableMap::COL_FROMYEAR, $fromyear, $comparison);
    }

    /**
     * Filter the query on the throughyear column
     *
     * Example usage:
     * <code>
     * $query->filterByThroughyear(1234); // WHERE throughyear = 1234
     * $query->filterByThroughyear(array(12, 34)); // WHERE throughyear IN (12, 34)
     * $query->filterByThroughyear(array('min' => 12)); // WHERE throughyear > 12
     * </code>
     *
     * @param     mixed $throughyear The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemMakeModelYearQuery The current query, for fluid interface
     */
    public function filterByThroughyear($throughyear = null, $comparison = null)
    {
        if (is_array($throughyear)) {
            $useMinMax = false;
            if (isset($throughyear['min'])) {
                $this->addUsingAlias(ItemMakeModelYearTableMap::COL_THROUGHYEAR, $throughyear['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($throughyear['max'])) {
                $this->addUsingAlias(ItemMakeModelYearTableMap::COL_THROUGHYEAR, $throughyear['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemMakeModelYearTableMap::COL_THROUGHYEAR, $throughyear, $comparison);
    }

    /**
     * Filter the query on the make column
     *
     * Example usage:
     * <code>
     * $query->filterByMake('fooValue');   // WHERE make = 'fooValue'
     * $query->filterByMake('%fooValue%', Criteria::LIKE); // WHERE make LIKE '%fooValue%'
     * </code>
     *
     * @param     string $make The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemMakeModelYearQuery The current query, for fluid interface
     */
    public function filterByMake($make = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($make)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemMakeModelYearTableMap::COL_MAKE, $make, $comparison);
    }

    /**
     * Filter the query on the model column
     *
     * Example usage:
     * <code>
     * $query->filterByModel('fooValue');   // WHERE model = 'fooValue'
     * $query->filterByModel('%fooValue%', Criteria::LIKE); // WHERE model LIKE '%fooValue%'
     * </code>
     *
     * @param     string $model The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemMakeModelYearQuery The current query, for fluid interface
     */
    public function filterByModel($model = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($model)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemMakeModelYearTableMap::COL_MODEL, $model, $comparison);
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
     * @return $this|ChildItemMakeModelYearQuery The current query, for fluid interface
     */
    public function filterByItemid($itemid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemMakeModelYearTableMap::COL_ITEMID, $itemid, $comparison);
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
     * @return $this|ChildItemMakeModelYearQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(ItemMakeModelYearTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(ItemMakeModelYearTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemMakeModelYearTableMap::COL_DATE, $date, $comparison);
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
     * @return $this|ChildItemMakeModelYearQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(ItemMakeModelYearTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(ItemMakeModelYearTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemMakeModelYearTableMap::COL_TIME, $time, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildItemMakeModelYear $itemMakeModelYear Object to remove from the list of results
     *
     * @return $this|ChildItemMakeModelYearQuery The current query, for fluid interface
     */
    public function prune($itemMakeModelYear = null)
    {
        if ($itemMakeModelYear) {
            $this->addUsingAlias(ItemMakeModelYearTableMap::COL_ID, $itemMakeModelYear->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the item_make_model table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ItemMakeModelYearTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ItemMakeModelYearTableMap::clearInstancePool();
            ItemMakeModelYearTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ItemMakeModelYearTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ItemMakeModelYearTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ItemMakeModelYearTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ItemMakeModelYearTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ItemMakeModelYearQuery
