<?php

namespace Base;

use \Funcperm as ChildFuncperm;
use \FuncpermQuery as ChildFuncpermQuery;
use \Exception;
use \PDO;
use Map\FuncpermTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'funcperm' table.
 *
 *
 *
 * @method     ChildFuncpermQuery orderByLoginid($order = Criteria::ASC) Order by the loginid column
 * @method     ChildFuncpermQuery orderByFunction($order = Criteria::ASC) Order by the function column
 * @method     ChildFuncpermQuery orderByPermission($order = Criteria::ASC) Order by the permission column
 * @method     ChildFuncpermQuery orderByCreatedate($order = Criteria::ASC) Order by the createdate column
 * @method     ChildFuncpermQuery orderByCreatetime($order = Criteria::ASC) Order by the createtime column
 * @method     ChildFuncpermQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildFuncpermQuery groupByLoginid() Group by the loginid column
 * @method     ChildFuncpermQuery groupByFunction() Group by the function column
 * @method     ChildFuncpermQuery groupByPermission() Group by the permission column
 * @method     ChildFuncpermQuery groupByCreatedate() Group by the createdate column
 * @method     ChildFuncpermQuery groupByCreatetime() Group by the createtime column
 * @method     ChildFuncpermQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildFuncpermQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildFuncpermQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildFuncpermQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildFuncpermQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildFuncpermQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildFuncpermQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildFuncperm findOne(ConnectionInterface $con = null) Return the first ChildFuncperm matching the query
 * @method     ChildFuncperm findOneOrCreate(ConnectionInterface $con = null) Return the first ChildFuncperm matching the query, or a new ChildFuncperm object populated from the query conditions when no match is found
 *
 * @method     ChildFuncperm findOneByLoginid(string $loginid) Return the first ChildFuncperm filtered by the loginid column
 * @method     ChildFuncperm findOneByFunction(string $function) Return the first ChildFuncperm filtered by the function column
 * @method     ChildFuncperm findOneByPermission(string $permission) Return the first ChildFuncperm filtered by the permission column
 * @method     ChildFuncperm findOneByCreatedate(string $createdate) Return the first ChildFuncperm filtered by the createdate column
 * @method     ChildFuncperm findOneByCreatetime(string $createtime) Return the first ChildFuncperm filtered by the createtime column
 * @method     ChildFuncperm findOneByDummy(string $dummy) Return the first ChildFuncperm filtered by the dummy column *

 * @method     ChildFuncperm requirePk($key, ConnectionInterface $con = null) Return the ChildFuncperm by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFuncperm requireOne(ConnectionInterface $con = null) Return the first ChildFuncperm matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFuncperm requireOneByLoginid(string $loginid) Return the first ChildFuncperm filtered by the loginid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFuncperm requireOneByFunction(string $function) Return the first ChildFuncperm filtered by the function column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFuncperm requireOneByPermission(string $permission) Return the first ChildFuncperm filtered by the permission column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFuncperm requireOneByCreatedate(string $createdate) Return the first ChildFuncperm filtered by the createdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFuncperm requireOneByCreatetime(string $createtime) Return the first ChildFuncperm filtered by the createtime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildFuncperm requireOneByDummy(string $dummy) Return the first ChildFuncperm filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildFuncperm[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildFuncperm objects based on current ModelCriteria
 * @method     ChildFuncperm[]|ObjectCollection findByLoginid(string $loginid) Return ChildFuncperm objects filtered by the loginid column
 * @method     ChildFuncperm[]|ObjectCollection findByFunction(string $function) Return ChildFuncperm objects filtered by the function column
 * @method     ChildFuncperm[]|ObjectCollection findByPermission(string $permission) Return ChildFuncperm objects filtered by the permission column
 * @method     ChildFuncperm[]|ObjectCollection findByCreatedate(string $createdate) Return ChildFuncperm objects filtered by the createdate column
 * @method     ChildFuncperm[]|ObjectCollection findByCreatetime(string $createtime) Return ChildFuncperm objects filtered by the createtime column
 * @method     ChildFuncperm[]|ObjectCollection findByDummy(string $dummy) Return ChildFuncperm objects filtered by the dummy column
 * @method     ChildFuncperm[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class FuncpermQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\FuncpermQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Funcperm', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildFuncpermQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildFuncpermQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildFuncpermQuery) {
            return $criteria;
        }
        $query = new ChildFuncpermQuery();
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
     * @param array[$loginid, $function] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildFuncperm|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(FuncpermTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = FuncpermTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildFuncperm A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT loginid, function, permission, createdate, createtime, dummy FROM funcperm WHERE loginid = :p0 AND function = :p1';
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
            /** @var ChildFuncperm $obj */
            $obj = new ChildFuncperm();
            $obj->hydrate($row);
            FuncpermTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildFuncperm|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildFuncpermQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(FuncpermTableMap::COL_LOGINID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(FuncpermTableMap::COL_FUNCTION, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildFuncpermQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(FuncpermTableMap::COL_LOGINID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(FuncpermTableMap::COL_FUNCTION, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the loginid column
     *
     * Example usage:
     * <code>
     * $query->filterByLoginid('fooValue');   // WHERE loginid = 'fooValue'
     * $query->filterByLoginid('%fooValue%', Criteria::LIKE); // WHERE loginid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $loginid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFuncpermQuery The current query, for fluid interface
     */
    public function filterByLoginid($loginid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($loginid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FuncpermTableMap::COL_LOGINID, $loginid, $comparison);
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
     * @return $this|ChildFuncpermQuery The current query, for fluid interface
     */
    public function filterByFunction($function = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($function)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FuncpermTableMap::COL_FUNCTION, $function, $comparison);
    }

    /**
     * Filter the query on the permission column
     *
     * Example usage:
     * <code>
     * $query->filterByPermission('fooValue');   // WHERE permission = 'fooValue'
     * $query->filterByPermission('%fooValue%', Criteria::LIKE); // WHERE permission LIKE '%fooValue%'
     * </code>
     *
     * @param     string $permission The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFuncpermQuery The current query, for fluid interface
     */
    public function filterByPermission($permission = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($permission)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FuncpermTableMap::COL_PERMISSION, $permission, $comparison);
    }

    /**
     * Filter the query on the createdate column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedate('fooValue');   // WHERE createdate = 'fooValue'
     * $query->filterByCreatedate('%fooValue%', Criteria::LIKE); // WHERE createdate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $createdate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFuncpermQuery The current query, for fluid interface
     */
    public function filterByCreatedate($createdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($createdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FuncpermTableMap::COL_CREATEDATE, $createdate, $comparison);
    }

    /**
     * Filter the query on the createtime column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatetime('fooValue');   // WHERE createtime = 'fooValue'
     * $query->filterByCreatetime('%fooValue%', Criteria::LIKE); // WHERE createtime LIKE '%fooValue%'
     * </code>
     *
     * @param     string $createtime The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildFuncpermQuery The current query, for fluid interface
     */
    public function filterByCreatetime($createtime = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($createtime)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FuncpermTableMap::COL_CREATETIME, $createtime, $comparison);
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
     * @return $this|ChildFuncpermQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FuncpermTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildFuncperm $funcperm Object to remove from the list of results
     *
     * @return $this|ChildFuncpermQuery The current query, for fluid interface
     */
    public function prune($funcperm = null)
    {
        if ($funcperm) {
            $this->addCond('pruneCond0', $this->getAliasedColName(FuncpermTableMap::COL_LOGINID), $funcperm->getLoginid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(FuncpermTableMap::COL_FUNCTION), $funcperm->getFunction(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the funcperm table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FuncpermTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            FuncpermTableMap::clearInstancePool();
            FuncpermTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(FuncpermTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(FuncpermTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            FuncpermTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            FuncpermTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // FuncpermQuery
