<?php

namespace Base;

use \PagePathHistory as ChildPagePathHistory;
use \PagePathHistoryQuery as ChildPagePathHistoryQuery;
use \Exception;
use \PDO;
use Map\PagePathHistoryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'page_path_history' table.
 *
 *
 *
 * @method     ChildPagePathHistoryQuery orderByPath($order = Criteria::ASC) Order by the path column
 * @method     ChildPagePathHistoryQuery orderByPagesId($order = Criteria::ASC) Order by the pages_id column
 * @method     ChildPagePathHistoryQuery orderByCreated($order = Criteria::ASC) Order by the created column
 *
 * @method     ChildPagePathHistoryQuery groupByPath() Group by the path column
 * @method     ChildPagePathHistoryQuery groupByPagesId() Group by the pages_id column
 * @method     ChildPagePathHistoryQuery groupByCreated() Group by the created column
 *
 * @method     ChildPagePathHistoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPagePathHistoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPagePathHistoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPagePathHistoryQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPagePathHistoryQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPagePathHistoryQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPagePathHistory findOne(ConnectionInterface $con = null) Return the first ChildPagePathHistory matching the query
 * @method     ChildPagePathHistory findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPagePathHistory matching the query, or a new ChildPagePathHistory object populated from the query conditions when no match is found
 *
 * @method     ChildPagePathHistory findOneByPath(string $path) Return the first ChildPagePathHistory filtered by the path column
 * @method     ChildPagePathHistory findOneByPagesId(int $pages_id) Return the first ChildPagePathHistory filtered by the pages_id column
 * @method     ChildPagePathHistory findOneByCreated(string $created) Return the first ChildPagePathHistory filtered by the created column *

 * @method     ChildPagePathHistory requirePk($key, ConnectionInterface $con = null) Return the ChildPagePathHistory by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPagePathHistory requireOne(ConnectionInterface $con = null) Return the first ChildPagePathHistory matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPagePathHistory requireOneByPath(string $path) Return the first ChildPagePathHistory filtered by the path column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPagePathHistory requireOneByPagesId(int $pages_id) Return the first ChildPagePathHistory filtered by the pages_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPagePathHistory requireOneByCreated(string $created) Return the first ChildPagePathHistory filtered by the created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPagePathHistory[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPagePathHistory objects based on current ModelCriteria
 * @method     ChildPagePathHistory[]|ObjectCollection findByPath(string $path) Return ChildPagePathHistory objects filtered by the path column
 * @method     ChildPagePathHistory[]|ObjectCollection findByPagesId(int $pages_id) Return ChildPagePathHistory objects filtered by the pages_id column
 * @method     ChildPagePathHistory[]|ObjectCollection findByCreated(string $created) Return ChildPagePathHistory objects filtered by the created column
 * @method     ChildPagePathHistory[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PagePathHistoryQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\PagePathHistoryQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\PagePathHistory', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPagePathHistoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPagePathHistoryQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPagePathHistoryQuery) {
            return $criteria;
        }
        $query = new ChildPagePathHistoryQuery();
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
     * @return ChildPagePathHistory|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PagePathHistoryTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PagePathHistoryTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildPagePathHistory A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT path, pages_id, created FROM page_path_history WHERE path = :p0';
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
            /** @var ChildPagePathHistory $obj */
            $obj = new ChildPagePathHistory();
            $obj->hydrate($row);
            PagePathHistoryTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildPagePathHistory|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildPagePathHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PagePathHistoryTableMap::COL_PATH, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPagePathHistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PagePathHistoryTableMap::COL_PATH, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the path column
     *
     * Example usage:
     * <code>
     * $query->filterByPath('fooValue');   // WHERE path = 'fooValue'
     * $query->filterByPath('%fooValue%', Criteria::LIKE); // WHERE path LIKE '%fooValue%'
     * </code>
     *
     * @param     string $path The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPagePathHistoryQuery The current query, for fluid interface
     */
    public function filterByPath($path = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($path)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PagePathHistoryTableMap::COL_PATH, $path, $comparison);
    }

    /**
     * Filter the query on the pages_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPagesId(1234); // WHERE pages_id = 1234
     * $query->filterByPagesId(array(12, 34)); // WHERE pages_id IN (12, 34)
     * $query->filterByPagesId(array('min' => 12)); // WHERE pages_id > 12
     * </code>
     *
     * @param     mixed $pagesId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPagePathHistoryQuery The current query, for fluid interface
     */
    public function filterByPagesId($pagesId = null, $comparison = null)
    {
        if (is_array($pagesId)) {
            $useMinMax = false;
            if (isset($pagesId['min'])) {
                $this->addUsingAlias(PagePathHistoryTableMap::COL_PAGES_ID, $pagesId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pagesId['max'])) {
                $this->addUsingAlias(PagePathHistoryTableMap::COL_PAGES_ID, $pagesId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PagePathHistoryTableMap::COL_PAGES_ID, $pagesId, $comparison);
    }

    /**
     * Filter the query on the created column
     *
     * Example usage:
     * <code>
     * $query->filterByCreated('2011-03-14'); // WHERE created = '2011-03-14'
     * $query->filterByCreated('now'); // WHERE created = '2011-03-14'
     * $query->filterByCreated(array('max' => 'yesterday')); // WHERE created > '2011-03-13'
     * </code>
     *
     * @param     mixed $created The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPagePathHistoryQuery The current query, for fluid interface
     */
    public function filterByCreated($created = null, $comparison = null)
    {
        if (is_array($created)) {
            $useMinMax = false;
            if (isset($created['min'])) {
                $this->addUsingAlias(PagePathHistoryTableMap::COL_CREATED, $created['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($created['max'])) {
                $this->addUsingAlias(PagePathHistoryTableMap::COL_CREATED, $created['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PagePathHistoryTableMap::COL_CREATED, $created, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPagePathHistory $pagePathHistory Object to remove from the list of results
     *
     * @return $this|ChildPagePathHistoryQuery The current query, for fluid interface
     */
    public function prune($pagePathHistory = null)
    {
        if ($pagePathHistory) {
            $this->addUsingAlias(PagePathHistoryTableMap::COL_PATH, $pagePathHistory->getPath(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the page_path_history table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PagePathHistoryTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PagePathHistoryTableMap::clearInstancePool();
            PagePathHistoryTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PagePathHistoryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PagePathHistoryTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PagePathHistoryTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PagePathHistoryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PagePathHistoryQuery
