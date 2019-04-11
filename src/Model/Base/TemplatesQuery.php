<?php

namespace Base;

use \Templates as ChildTemplates;
use \TemplatesQuery as ChildTemplatesQuery;
use \Exception;
use \PDO;
use Map\TemplatesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'templates' table.
 *
 *
 *
 * @method     ChildTemplatesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildTemplatesQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildTemplatesQuery orderByFieldgroupsId($order = Criteria::ASC) Order by the fieldgroups_id column
 * @method     ChildTemplatesQuery orderByFlags($order = Criteria::ASC) Order by the flags column
 * @method     ChildTemplatesQuery orderByCacheTime($order = Criteria::ASC) Order by the cache_time column
 * @method     ChildTemplatesQuery orderByData($order = Criteria::ASC) Order by the data column
 *
 * @method     ChildTemplatesQuery groupById() Group by the id column
 * @method     ChildTemplatesQuery groupByName() Group by the name column
 * @method     ChildTemplatesQuery groupByFieldgroupsId() Group by the fieldgroups_id column
 * @method     ChildTemplatesQuery groupByFlags() Group by the flags column
 * @method     ChildTemplatesQuery groupByCacheTime() Group by the cache_time column
 * @method     ChildTemplatesQuery groupByData() Group by the data column
 *
 * @method     ChildTemplatesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTemplatesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTemplatesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTemplatesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTemplatesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTemplatesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTemplates findOne(ConnectionInterface $con = null) Return the first ChildTemplates matching the query
 * @method     ChildTemplates findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTemplates matching the query, or a new ChildTemplates object populated from the query conditions when no match is found
 *
 * @method     ChildTemplates findOneById(int $id) Return the first ChildTemplates filtered by the id column
 * @method     ChildTemplates findOneByName(string $name) Return the first ChildTemplates filtered by the name column
 * @method     ChildTemplates findOneByFieldgroupsId(int $fieldgroups_id) Return the first ChildTemplates filtered by the fieldgroups_id column
 * @method     ChildTemplates findOneByFlags(int $flags) Return the first ChildTemplates filtered by the flags column
 * @method     ChildTemplates findOneByCacheTime(int $cache_time) Return the first ChildTemplates filtered by the cache_time column
 * @method     ChildTemplates findOneByData(string $data) Return the first ChildTemplates filtered by the data column *

 * @method     ChildTemplates requirePk($key, ConnectionInterface $con = null) Return the ChildTemplates by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTemplates requireOne(ConnectionInterface $con = null) Return the first ChildTemplates matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTemplates requireOneById(int $id) Return the first ChildTemplates filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTemplates requireOneByName(string $name) Return the first ChildTemplates filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTemplates requireOneByFieldgroupsId(int $fieldgroups_id) Return the first ChildTemplates filtered by the fieldgroups_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTemplates requireOneByFlags(int $flags) Return the first ChildTemplates filtered by the flags column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTemplates requireOneByCacheTime(int $cache_time) Return the first ChildTemplates filtered by the cache_time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTemplates requireOneByData(string $data) Return the first ChildTemplates filtered by the data column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTemplates[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTemplates objects based on current ModelCriteria
 * @method     ChildTemplates[]|ObjectCollection findById(int $id) Return ChildTemplates objects filtered by the id column
 * @method     ChildTemplates[]|ObjectCollection findByName(string $name) Return ChildTemplates objects filtered by the name column
 * @method     ChildTemplates[]|ObjectCollection findByFieldgroupsId(int $fieldgroups_id) Return ChildTemplates objects filtered by the fieldgroups_id column
 * @method     ChildTemplates[]|ObjectCollection findByFlags(int $flags) Return ChildTemplates objects filtered by the flags column
 * @method     ChildTemplates[]|ObjectCollection findByCacheTime(int $cache_time) Return ChildTemplates objects filtered by the cache_time column
 * @method     ChildTemplates[]|ObjectCollection findByData(string $data) Return ChildTemplates objects filtered by the data column
 * @method     ChildTemplates[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TemplatesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TemplatesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Templates', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTemplatesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTemplatesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTemplatesQuery) {
            return $criteria;
        }
        $query = new ChildTemplatesQuery();
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
     * @return ChildTemplates|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TemplatesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TemplatesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTemplates A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, name, fieldgroups_id, flags, cache_time, data FROM templates WHERE id = :p0';
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
            /** @var ChildTemplates $obj */
            $obj = new ChildTemplates();
            $obj->hydrate($row);
            TemplatesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTemplates|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTemplatesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TemplatesTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTemplatesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TemplatesTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildTemplatesQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(TemplatesTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(TemplatesTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TemplatesTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%', Criteria::LIKE); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTemplatesQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TemplatesTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the fieldgroups_id column
     *
     * Example usage:
     * <code>
     * $query->filterByFieldgroupsId(1234); // WHERE fieldgroups_id = 1234
     * $query->filterByFieldgroupsId(array(12, 34)); // WHERE fieldgroups_id IN (12, 34)
     * $query->filterByFieldgroupsId(array('min' => 12)); // WHERE fieldgroups_id > 12
     * </code>
     *
     * @param     mixed $fieldgroupsId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTemplatesQuery The current query, for fluid interface
     */
    public function filterByFieldgroupsId($fieldgroupsId = null, $comparison = null)
    {
        if (is_array($fieldgroupsId)) {
            $useMinMax = false;
            if (isset($fieldgroupsId['min'])) {
                $this->addUsingAlias(TemplatesTableMap::COL_FIELDGROUPS_ID, $fieldgroupsId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fieldgroupsId['max'])) {
                $this->addUsingAlias(TemplatesTableMap::COL_FIELDGROUPS_ID, $fieldgroupsId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TemplatesTableMap::COL_FIELDGROUPS_ID, $fieldgroupsId, $comparison);
    }

    /**
     * Filter the query on the flags column
     *
     * Example usage:
     * <code>
     * $query->filterByFlags(1234); // WHERE flags = 1234
     * $query->filterByFlags(array(12, 34)); // WHERE flags IN (12, 34)
     * $query->filterByFlags(array('min' => 12)); // WHERE flags > 12
     * </code>
     *
     * @param     mixed $flags The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTemplatesQuery The current query, for fluid interface
     */
    public function filterByFlags($flags = null, $comparison = null)
    {
        if (is_array($flags)) {
            $useMinMax = false;
            if (isset($flags['min'])) {
                $this->addUsingAlias(TemplatesTableMap::COL_FLAGS, $flags['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($flags['max'])) {
                $this->addUsingAlias(TemplatesTableMap::COL_FLAGS, $flags['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TemplatesTableMap::COL_FLAGS, $flags, $comparison);
    }

    /**
     * Filter the query on the cache_time column
     *
     * Example usage:
     * <code>
     * $query->filterByCacheTime(1234); // WHERE cache_time = 1234
     * $query->filterByCacheTime(array(12, 34)); // WHERE cache_time IN (12, 34)
     * $query->filterByCacheTime(array('min' => 12)); // WHERE cache_time > 12
     * </code>
     *
     * @param     mixed $cacheTime The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTemplatesQuery The current query, for fluid interface
     */
    public function filterByCacheTime($cacheTime = null, $comparison = null)
    {
        if (is_array($cacheTime)) {
            $useMinMax = false;
            if (isset($cacheTime['min'])) {
                $this->addUsingAlias(TemplatesTableMap::COL_CACHE_TIME, $cacheTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cacheTime['max'])) {
                $this->addUsingAlias(TemplatesTableMap::COL_CACHE_TIME, $cacheTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TemplatesTableMap::COL_CACHE_TIME, $cacheTime, $comparison);
    }

    /**
     * Filter the query on the data column
     *
     * Example usage:
     * <code>
     * $query->filterByData('fooValue');   // WHERE data = 'fooValue'
     * $query->filterByData('%fooValue%', Criteria::LIKE); // WHERE data LIKE '%fooValue%'
     * </code>
     *
     * @param     string $data The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTemplatesQuery The current query, for fluid interface
     */
    public function filterByData($data = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($data)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TemplatesTableMap::COL_DATA, $data, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTemplates $templates Object to remove from the list of results
     *
     * @return $this|ChildTemplatesQuery The current query, for fluid interface
     */
    public function prune($templates = null)
    {
        if ($templates) {
            $this->addUsingAlias(TemplatesTableMap::COL_ID, $templates->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the templates table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TemplatesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TemplatesTableMap::clearInstancePool();
            TemplatesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TemplatesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TemplatesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TemplatesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TemplatesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TemplatesQuery
