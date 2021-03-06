<?php

namespace Base;

use \Tableformatter as ChildTableformatter;
use \TableformatterQuery as ChildTableformatterQuery;
use \Exception;
use \PDO;
use Map\TableformatterTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'tableformatter' table.
 *
 *
 *
 * @method     ChildTableformatterQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildTableformatterQuery orderByUser($order = Criteria::ASC) Order by the user column
 * @method     ChildTableformatterQuery orderByFormattertype($order = Criteria::ASC) Order by the formattertype column
 * @method     ChildTableformatterQuery orderByData($order = Criteria::ASC) Order by the data column
 *
 * @method     ChildTableformatterQuery groupById() Group by the id column
 * @method     ChildTableformatterQuery groupByUser() Group by the user column
 * @method     ChildTableformatterQuery groupByFormattertype() Group by the formattertype column
 * @method     ChildTableformatterQuery groupByData() Group by the data column
 *
 * @method     ChildTableformatterQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTableformatterQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTableformatterQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTableformatterQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTableformatterQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTableformatterQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTableformatter findOne(ConnectionInterface $con = null) Return the first ChildTableformatter matching the query
 * @method     ChildTableformatter findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTableformatter matching the query, or a new ChildTableformatter object populated from the query conditions when no match is found
 *
 * @method     ChildTableformatter findOneById(int $id) Return the first ChildTableformatter filtered by the id column
 * @method     ChildTableformatter findOneByUser(string $user) Return the first ChildTableformatter filtered by the user column
 * @method     ChildTableformatter findOneByFormattertype(string $formattertype) Return the first ChildTableformatter filtered by the formattertype column
 * @method     ChildTableformatter findOneByData(string $data) Return the first ChildTableformatter filtered by the data column *

 * @method     ChildTableformatter requirePk($key, ConnectionInterface $con = null) Return the ChildTableformatter by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTableformatter requireOne(ConnectionInterface $con = null) Return the first ChildTableformatter matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTableformatter requireOneById(int $id) Return the first ChildTableformatter filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTableformatter requireOneByUser(string $user) Return the first ChildTableformatter filtered by the user column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTableformatter requireOneByFormattertype(string $formattertype) Return the first ChildTableformatter filtered by the formattertype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTableformatter requireOneByData(string $data) Return the first ChildTableformatter filtered by the data column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTableformatter[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTableformatter objects based on current ModelCriteria
 * @method     ChildTableformatter[]|ObjectCollection findById(int $id) Return ChildTableformatter objects filtered by the id column
 * @method     ChildTableformatter[]|ObjectCollection findByUser(string $user) Return ChildTableformatter objects filtered by the user column
 * @method     ChildTableformatter[]|ObjectCollection findByFormattertype(string $formattertype) Return ChildTableformatter objects filtered by the formattertype column
 * @method     ChildTableformatter[]|ObjectCollection findByData(string $data) Return ChildTableformatter objects filtered by the data column
 * @method     ChildTableformatter[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TableformatterQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TableformatterQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Tableformatter', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTableformatterQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTableformatterQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTableformatterQuery) {
            return $criteria;
        }
        $query = new ChildTableformatterQuery();
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
     * @return ChildTableformatter|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TableformatterTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TableformatterTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTableformatter A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, user, formattertype, data FROM tableformatter WHERE id = :p0';
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
            /** @var ChildTableformatter $obj */
            $obj = new ChildTableformatter();
            $obj->hydrate($row);
            TableformatterTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTableformatter|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTableformatterQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TableformatterTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTableformatterQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TableformatterTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildTableformatterQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(TableformatterTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(TableformatterTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TableformatterTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the user column
     *
     * Example usage:
     * <code>
     * $query->filterByUser('fooValue');   // WHERE user = 'fooValue'
     * $query->filterByUser('%fooValue%', Criteria::LIKE); // WHERE user LIKE '%fooValue%'
     * </code>
     *
     * @param     string $user The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTableformatterQuery The current query, for fluid interface
     */
    public function filterByUser($user = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($user)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TableformatterTableMap::COL_USER, $user, $comparison);
    }

    /**
     * Filter the query on the formattertype column
     *
     * Example usage:
     * <code>
     * $query->filterByFormattertype('fooValue');   // WHERE formattertype = 'fooValue'
     * $query->filterByFormattertype('%fooValue%', Criteria::LIKE); // WHERE formattertype LIKE '%fooValue%'
     * </code>
     *
     * @param     string $formattertype The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTableformatterQuery The current query, for fluid interface
     */
    public function filterByFormattertype($formattertype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($formattertype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TableformatterTableMap::COL_FORMATTERTYPE, $formattertype, $comparison);
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
     * @return $this|ChildTableformatterQuery The current query, for fluid interface
     */
    public function filterByData($data = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($data)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TableformatterTableMap::COL_DATA, $data, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTableformatter $tableformatter Object to remove from the list of results
     *
     * @return $this|ChildTableformatterQuery The current query, for fluid interface
     */
    public function prune($tableformatter = null)
    {
        if ($tableformatter) {
            $this->addUsingAlias(TableformatterTableMap::COL_ID, $tableformatter->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tableformatter table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TableformatterTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TableformatterTableMap::clearInstancePool();
            TableformatterTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TableformatterTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TableformatterTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TableformatterTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TableformatterTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TableformatterQuery
