<?php

namespace Base;

use \LogSignin as ChildLogSignin;
use \LogSigninQuery as ChildLogSigninQuery;
use \Exception;
use \PDO;
use Map\LogSigninTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'log_signin' table.
 *
 *
 *
 * @method     ChildLogSigninQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildLogSigninQuery orderByUser($order = Criteria::ASC) Order by the user column
 * @method     ChildLogSigninQuery orderByDate($order = Criteria::ASC) Order by the date column
 *
 * @method     ChildLogSigninQuery groupBySessionid() Group by the sessionid column
 * @method     ChildLogSigninQuery groupByUser() Group by the user column
 * @method     ChildLogSigninQuery groupByDate() Group by the date column
 *
 * @method     ChildLogSigninQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildLogSigninQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildLogSigninQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildLogSigninQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildLogSigninQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildLogSigninQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildLogSignin findOne(ConnectionInterface $con = null) Return the first ChildLogSignin matching the query
 * @method     ChildLogSignin findOneOrCreate(ConnectionInterface $con = null) Return the first ChildLogSignin matching the query, or a new ChildLogSignin object populated from the query conditions when no match is found
 *
 * @method     ChildLogSignin findOneBySessionid(string $sessionid) Return the first ChildLogSignin filtered by the sessionid column
 * @method     ChildLogSignin findOneByUser(string $user) Return the first ChildLogSignin filtered by the user column
 * @method     ChildLogSignin findOneByDate(string $date) Return the first ChildLogSignin filtered by the date column *

 * @method     ChildLogSignin requirePk($key, ConnectionInterface $con = null) Return the ChildLogSignin by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogSignin requireOne(ConnectionInterface $con = null) Return the first ChildLogSignin matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLogSignin requireOneBySessionid(string $sessionid) Return the first ChildLogSignin filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogSignin requireOneByUser(string $user) Return the first ChildLogSignin filtered by the user column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLogSignin requireOneByDate(string $date) Return the first ChildLogSignin filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLogSignin[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildLogSignin objects based on current ModelCriteria
 * @method     ChildLogSignin[]|ObjectCollection findBySessionid(string $sessionid) Return ChildLogSignin objects filtered by the sessionid column
 * @method     ChildLogSignin[]|ObjectCollection findByUser(string $user) Return ChildLogSignin objects filtered by the user column
 * @method     ChildLogSignin[]|ObjectCollection findByDate(string $date) Return ChildLogSignin objects filtered by the date column
 * @method     ChildLogSignin[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class LogSigninQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\LogSigninQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\LogSignin', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildLogSigninQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildLogSigninQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildLogSigninQuery) {
            return $criteria;
        }
        $query = new ChildLogSigninQuery();
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
     * @param array[$sessionid, $user] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildLogSignin|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(LogSigninTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = LogSigninTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildLogSignin A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, user, date FROM log_signin WHERE sessionid = :p0 AND user = :p1';
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
            /** @var ChildLogSignin $obj */
            $obj = new ChildLogSignin();
            $obj->hydrate($row);
            LogSigninTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildLogSignin|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildLogSigninQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(LogSigninTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(LogSigninTableMap::COL_USER, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildLogSigninQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(LogSigninTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(LogSigninTableMap::COL_USER, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @return $this|ChildLogSigninQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LogSigninTableMap::COL_SESSIONID, $sessionid, $comparison);
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
     * @return $this|ChildLogSigninQuery The current query, for fluid interface
     */
    public function filterByUser($user = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($user)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LogSigninTableMap::COL_USER, $user, $comparison);
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate('2011-03-14'); // WHERE date = '2011-03-14'
     * $query->filterByDate('now'); // WHERE date = '2011-03-14'
     * $query->filterByDate(array('max' => 'yesterday')); // WHERE date > '2011-03-13'
     * </code>
     *
     * @param     mixed $date The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLogSigninQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(LogSigninTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(LogSigninTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LogSigninTableMap::COL_DATE, $date, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildLogSignin $logSignin Object to remove from the list of results
     *
     * @return $this|ChildLogSigninQuery The current query, for fluid interface
     */
    public function prune($logSignin = null)
    {
        if ($logSignin) {
            $this->addCond('pruneCond0', $this->getAliasedColName(LogSigninTableMap::COL_SESSIONID), $logSignin->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(LogSigninTableMap::COL_USER), $logSignin->getUser(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the log_signin table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LogSigninTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            LogSigninTableMap::clearInstancePool();
            LogSigninTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(LogSigninTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(LogSigninTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            LogSigninTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            LogSigninTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // LogSigninQuery
