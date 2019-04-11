<?php

namespace Base;

use \Statesandprovinces as ChildStatesandprovinces;
use \StatesandprovincesQuery as ChildStatesandprovincesQuery;
use \Exception;
use \PDO;
use Map\StatesandprovincesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'statesandprovinces' table.
 *
 *
 *
 * @method     ChildStatesandprovincesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildStatesandprovincesQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildStatesandprovincesQuery orderByAbbreviation($order = Criteria::ASC) Order by the abbreviation column
 * @method     ChildStatesandprovincesQuery orderByCountry($order = Criteria::ASC) Order by the country column
 * @method     ChildStatesandprovincesQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildStatesandprovincesQuery orderByAssocPress($order = Criteria::ASC) Order by the assoc_press column
 *
 * @method     ChildStatesandprovincesQuery groupById() Group by the id column
 * @method     ChildStatesandprovincesQuery groupByName() Group by the name column
 * @method     ChildStatesandprovincesQuery groupByAbbreviation() Group by the abbreviation column
 * @method     ChildStatesandprovincesQuery groupByCountry() Group by the country column
 * @method     ChildStatesandprovincesQuery groupByType() Group by the type column
 * @method     ChildStatesandprovincesQuery groupByAssocPress() Group by the assoc_press column
 *
 * @method     ChildStatesandprovincesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildStatesandprovincesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildStatesandprovincesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildStatesandprovincesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildStatesandprovincesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildStatesandprovincesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildStatesandprovinces findOne(ConnectionInterface $con = null) Return the first ChildStatesandprovinces matching the query
 * @method     ChildStatesandprovinces findOneOrCreate(ConnectionInterface $con = null) Return the first ChildStatesandprovinces matching the query, or a new ChildStatesandprovinces object populated from the query conditions when no match is found
 *
 * @method     ChildStatesandprovinces findOneById(int $id) Return the first ChildStatesandprovinces filtered by the id column
 * @method     ChildStatesandprovinces findOneByName(string $name) Return the first ChildStatesandprovinces filtered by the name column
 * @method     ChildStatesandprovinces findOneByAbbreviation(string $abbreviation) Return the first ChildStatesandprovinces filtered by the abbreviation column
 * @method     ChildStatesandprovinces findOneByCountry(string $country) Return the first ChildStatesandprovinces filtered by the country column
 * @method     ChildStatesandprovinces findOneByType(string $type) Return the first ChildStatesandprovinces filtered by the type column
 * @method     ChildStatesandprovinces findOneByAssocPress(string $assoc_press) Return the first ChildStatesandprovinces filtered by the assoc_press column *

 * @method     ChildStatesandprovinces requirePk($key, ConnectionInterface $con = null) Return the ChildStatesandprovinces by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStatesandprovinces requireOne(ConnectionInterface $con = null) Return the first ChildStatesandprovinces matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildStatesandprovinces requireOneById(int $id) Return the first ChildStatesandprovinces filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStatesandprovinces requireOneByName(string $name) Return the first ChildStatesandprovinces filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStatesandprovinces requireOneByAbbreviation(string $abbreviation) Return the first ChildStatesandprovinces filtered by the abbreviation column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStatesandprovinces requireOneByCountry(string $country) Return the first ChildStatesandprovinces filtered by the country column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStatesandprovinces requireOneByType(string $type) Return the first ChildStatesandprovinces filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStatesandprovinces requireOneByAssocPress(string $assoc_press) Return the first ChildStatesandprovinces filtered by the assoc_press column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildStatesandprovinces[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildStatesandprovinces objects based on current ModelCriteria
 * @method     ChildStatesandprovinces[]|ObjectCollection findById(int $id) Return ChildStatesandprovinces objects filtered by the id column
 * @method     ChildStatesandprovinces[]|ObjectCollection findByName(string $name) Return ChildStatesandprovinces objects filtered by the name column
 * @method     ChildStatesandprovinces[]|ObjectCollection findByAbbreviation(string $abbreviation) Return ChildStatesandprovinces objects filtered by the abbreviation column
 * @method     ChildStatesandprovinces[]|ObjectCollection findByCountry(string $country) Return ChildStatesandprovinces objects filtered by the country column
 * @method     ChildStatesandprovinces[]|ObjectCollection findByType(string $type) Return ChildStatesandprovinces objects filtered by the type column
 * @method     ChildStatesandprovinces[]|ObjectCollection findByAssocPress(string $assoc_press) Return ChildStatesandprovinces objects filtered by the assoc_press column
 * @method     ChildStatesandprovinces[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class StatesandprovincesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\StatesandprovincesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Statesandprovinces', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildStatesandprovincesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildStatesandprovincesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildStatesandprovincesQuery) {
            return $criteria;
        }
        $query = new ChildStatesandprovincesQuery();
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
     * @return ChildStatesandprovinces|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(StatesandprovincesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = StatesandprovincesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildStatesandprovinces A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, name, abbreviation, country, type, assoc_press FROM statesandprovinces WHERE id = :p0';
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
            /** @var ChildStatesandprovinces $obj */
            $obj = new ChildStatesandprovinces();
            $obj->hydrate($row);
            StatesandprovincesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildStatesandprovinces|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildStatesandprovincesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(StatesandprovincesTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildStatesandprovincesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(StatesandprovincesTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildStatesandprovincesQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(StatesandprovincesTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(StatesandprovincesTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StatesandprovincesTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildStatesandprovincesQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StatesandprovincesTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the abbreviation column
     *
     * Example usage:
     * <code>
     * $query->filterByAbbreviation('fooValue');   // WHERE abbreviation = 'fooValue'
     * $query->filterByAbbreviation('%fooValue%', Criteria::LIKE); // WHERE abbreviation LIKE '%fooValue%'
     * </code>
     *
     * @param     string $abbreviation The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStatesandprovincesQuery The current query, for fluid interface
     */
    public function filterByAbbreviation($abbreviation = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($abbreviation)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StatesandprovincesTableMap::COL_ABBREVIATION, $abbreviation, $comparison);
    }

    /**
     * Filter the query on the country column
     *
     * Example usage:
     * <code>
     * $query->filterByCountry('fooValue');   // WHERE country = 'fooValue'
     * $query->filterByCountry('%fooValue%', Criteria::LIKE); // WHERE country LIKE '%fooValue%'
     * </code>
     *
     * @param     string $country The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStatesandprovincesQuery The current query, for fluid interface
     */
    public function filterByCountry($country = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($country)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StatesandprovincesTableMap::COL_COUNTRY, $country, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
     * $query->filterByType('%fooValue%', Criteria::LIKE); // WHERE type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $type The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStatesandprovincesQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StatesandprovincesTableMap::COL_TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the assoc_press column
     *
     * Example usage:
     * <code>
     * $query->filterByAssocPress('fooValue');   // WHERE assoc_press = 'fooValue'
     * $query->filterByAssocPress('%fooValue%', Criteria::LIKE); // WHERE assoc_press LIKE '%fooValue%'
     * </code>
     *
     * @param     string $assocPress The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStatesandprovincesQuery The current query, for fluid interface
     */
    public function filterByAssocPress($assocPress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($assocPress)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StatesandprovincesTableMap::COL_ASSOC_PRESS, $assocPress, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildStatesandprovinces $statesandprovinces Object to remove from the list of results
     *
     * @return $this|ChildStatesandprovincesQuery The current query, for fluid interface
     */
    public function prune($statesandprovinces = null)
    {
        if ($statesandprovinces) {
            $this->addUsingAlias(StatesandprovincesTableMap::COL_ID, $statesandprovinces->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the statesandprovinces table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(StatesandprovincesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            StatesandprovincesTableMap::clearInstancePool();
            StatesandprovincesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(StatesandprovincesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(StatesandprovincesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            StatesandprovincesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            StatesandprovincesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // StatesandprovincesQuery
