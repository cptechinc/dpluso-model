<?php

namespace Base;

use \LockRecord as ChildLockRecord;
use \LockRecordQuery as ChildLockRecordQuery;
use \Exception;
use \PDO;
use Map\LockRecordTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'lockrecord' table.
 *
 *
 *
 * @method     ChildLockRecordQuery orderByFunction($order = Criteria::ASC) Order by the function column
 * @method     ChildLockRecordQuery orderByKey($order = Criteria::ASC) Order by the key column
 * @method     ChildLockRecordQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildLockRecordQuery orderByUserid($order = Criteria::ASC) Order by the userid column
 *
 * @method     ChildLockRecordQuery groupByFunction() Group by the function column
 * @method     ChildLockRecordQuery groupByKey() Group by the key column
 * @method     ChildLockRecordQuery groupBySessionid() Group by the sessionid column
 * @method     ChildLockRecordQuery groupByUserid() Group by the userid column
 *
 * @method     ChildLockRecordQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildLockRecordQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildLockRecordQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildLockRecordQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildLockRecordQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildLockRecordQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildLockRecord findOne(ConnectionInterface $con = null) Return the first ChildLockRecord matching the query
 * @method     ChildLockRecord findOneOrCreate(ConnectionInterface $con = null) Return the first ChildLockRecord matching the query, or a new ChildLockRecord object populated from the query conditions when no match is found
 *
 * @method     ChildLockRecord findOneByFunction(string $function) Return the first ChildLockRecord filtered by the function column
 * @method     ChildLockRecord findOneByKey(string $key) Return the first ChildLockRecord filtered by the key column
 * @method     ChildLockRecord findOneBySessionid(string $sessionid) Return the first ChildLockRecord filtered by the sessionid column
 * @method     ChildLockRecord findOneByUserid(string $userid) Return the first ChildLockRecord filtered by the userid column *

 * @method     ChildLockRecord requirePk($key, ConnectionInterface $con = null) Return the ChildLockRecord by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLockRecord requireOne(ConnectionInterface $con = null) Return the first ChildLockRecord matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLockRecord requireOneByFunction(string $function) Return the first ChildLockRecord filtered by the function column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLockRecord requireOneByKey(string $key) Return the first ChildLockRecord filtered by the key column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLockRecord requireOneBySessionid(string $sessionid) Return the first ChildLockRecord filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLockRecord requireOneByUserid(string $userid) Return the first ChildLockRecord filtered by the userid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLockRecord[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildLockRecord objects based on current ModelCriteria
 * @method     ChildLockRecord[]|ObjectCollection findByFunction(string $function) Return ChildLockRecord objects filtered by the function column
 * @method     ChildLockRecord[]|ObjectCollection findByKey(string $key) Return ChildLockRecord objects filtered by the key column
 * @method     ChildLockRecord[]|ObjectCollection findBySessionid(string $sessionid) Return ChildLockRecord objects filtered by the sessionid column
 * @method     ChildLockRecord[]|ObjectCollection findByUserid(string $userid) Return ChildLockRecord objects filtered by the userid column
 * @method     ChildLockRecord[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class LockRecordQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\LockRecordQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\LockRecord', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildLockRecordQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildLockRecordQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildLockRecordQuery) {
            return $criteria;
        }
        $query = new ChildLockRecordQuery();
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
     * @param array[$function, $key] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildLockRecord|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(LockRecordTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = LockRecordTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildLockRecord A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT function, key, sessionid, userid FROM lockrecord WHERE function = :p0 AND key = :p1';
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
            /** @var ChildLockRecord $obj */
            $obj = new ChildLockRecord();
            $obj->hydrate($row);
            LockRecordTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildLockRecord|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildLockRecordQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(LockRecordTableMap::COL_FUNCTION, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(LockRecordTableMap::COL_KEY, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildLockRecordQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(LockRecordTableMap::COL_FUNCTION, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(LockRecordTableMap::COL_KEY, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the function column
     *
     * Example usage:
     * <code>
     * $query->filterByFunction('fooValue');   // WHERE function = 'fooValue'
     * $query->filterByFunction('%fooValue%', Criteria::LIKE); // WHERE function LIKE '%fooValue%'
     * </code>
     *
     * @param     string $function The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLockRecordQuery The current query, for fluid interface
     */
    public function filterByFunction($function = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($function)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LockRecordTableMap::COL_FUNCTION, $function, $comparison);
    }

    /**
     * Filter the query on the key column
     *
     * Example usage:
     * <code>
     * $query->filterByKey('fooValue');   // WHERE key = 'fooValue'
     * $query->filterByKey('%fooValue%', Criteria::LIKE); // WHERE key LIKE '%fooValue%'
     * </code>
     *
     * @param     string $key The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLockRecordQuery The current query, for fluid interface
     */
    public function filterByKey($key = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($key)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LockRecordTableMap::COL_KEY, $key, $comparison);
    }

    /**
     * Filter the query on the sessionid column
     *
     * Example usage:
     * <code>
     * $query->filterBySessionid('fooValue');   // WHERE sessionid = 'fooValue'
     * $query->filterBySessionid('%fooValue%', Criteria::LIKE); // WHERE sessionid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sessionid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLockRecordQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LockRecordTableMap::COL_SESSIONID, $sessionid, $comparison);
    }

    /**
     * Filter the query on the userid column
     *
     * Example usage:
     * <code>
     * $query->filterByUserid('fooValue');   // WHERE userid = 'fooValue'
     * $query->filterByUserid('%fooValue%', Criteria::LIKE); // WHERE userid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $userid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLockRecordQuery The current query, for fluid interface
     */
    public function filterByUserid($userid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LockRecordTableMap::COL_USERID, $userid, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildLockRecord $lockRecord Object to remove from the list of results
     *
     * @return $this|ChildLockRecordQuery The current query, for fluid interface
     */
    public function prune($lockRecord = null)
    {
        if ($lockRecord) {
            $this->addCond('pruneCond0', $this->getAliasedColName(LockRecordTableMap::COL_FUNCTION), $lockRecord->getFunction(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(LockRecordTableMap::COL_KEY), $lockRecord->getKey(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the lockrecord table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LockRecordTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            LockRecordTableMap::clearInstancePool();
            LockRecordTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(LockRecordTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(LockRecordTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            LockRecordTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            LockRecordTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // LockRecordQuery
