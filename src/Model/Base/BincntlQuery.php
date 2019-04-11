<?php

namespace Base;

use \Bincntl as ChildBincntl;
use \BincntlQuery as ChildBincntlQuery;
use \Exception;
use \PDO;
use Map\BincntlTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'bincntl' table.
 *
 *
 *
 * @method     ChildBincntlQuery orderByWarehouse($order = Criteria::ASC) Order by the warehouse column
 * @method     ChildBincntlQuery orderByBinfrom($order = Criteria::ASC) Order by the binfrom column
 * @method     ChildBincntlQuery orderByBinthru($order = Criteria::ASC) Order by the binthru column
 * @method     ChildBincntlQuery orderByBintype($order = Criteria::ASC) Order by the bintype column
 * @method     ChildBincntlQuery orderByBinarea($order = Criteria::ASC) Order by the binarea column
 * @method     ChildBincntlQuery orderByBindesc($order = Criteria::ASC) Order by the bindesc column
 * @method     ChildBincntlQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildBincntlQuery groupByWarehouse() Group by the warehouse column
 * @method     ChildBincntlQuery groupByBinfrom() Group by the binfrom column
 * @method     ChildBincntlQuery groupByBinthru() Group by the binthru column
 * @method     ChildBincntlQuery groupByBintype() Group by the bintype column
 * @method     ChildBincntlQuery groupByBinarea() Group by the binarea column
 * @method     ChildBincntlQuery groupByBindesc() Group by the bindesc column
 * @method     ChildBincntlQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildBincntlQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildBincntlQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildBincntlQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildBincntlQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildBincntlQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildBincntlQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildBincntl findOne(ConnectionInterface $con = null) Return the first ChildBincntl matching the query
 * @method     ChildBincntl findOneOrCreate(ConnectionInterface $con = null) Return the first ChildBincntl matching the query, or a new ChildBincntl object populated from the query conditions when no match is found
 *
 * @method     ChildBincntl findOneByWarehouse(string $warehouse) Return the first ChildBincntl filtered by the warehouse column
 * @method     ChildBincntl findOneByBinfrom(string $binfrom) Return the first ChildBincntl filtered by the binfrom column
 * @method     ChildBincntl findOneByBinthru(string $binthru) Return the first ChildBincntl filtered by the binthru column
 * @method     ChildBincntl findOneByBintype(string $bintype) Return the first ChildBincntl filtered by the bintype column
 * @method     ChildBincntl findOneByBinarea(string $binarea) Return the first ChildBincntl filtered by the binarea column
 * @method     ChildBincntl findOneByBindesc(string $bindesc) Return the first ChildBincntl filtered by the bindesc column
 * @method     ChildBincntl findOneByDummy(string $dummy) Return the first ChildBincntl filtered by the dummy column *

 * @method     ChildBincntl requirePk($key, ConnectionInterface $con = null) Return the ChildBincntl by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBincntl requireOne(ConnectionInterface $con = null) Return the first ChildBincntl matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBincntl requireOneByWarehouse(string $warehouse) Return the first ChildBincntl filtered by the warehouse column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBincntl requireOneByBinfrom(string $binfrom) Return the first ChildBincntl filtered by the binfrom column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBincntl requireOneByBinthru(string $binthru) Return the first ChildBincntl filtered by the binthru column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBincntl requireOneByBintype(string $bintype) Return the first ChildBincntl filtered by the bintype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBincntl requireOneByBinarea(string $binarea) Return the first ChildBincntl filtered by the binarea column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBincntl requireOneByBindesc(string $bindesc) Return the first ChildBincntl filtered by the bindesc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildBincntl requireOneByDummy(string $dummy) Return the first ChildBincntl filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildBincntl[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildBincntl objects based on current ModelCriteria
 * @method     ChildBincntl[]|ObjectCollection findByWarehouse(string $warehouse) Return ChildBincntl objects filtered by the warehouse column
 * @method     ChildBincntl[]|ObjectCollection findByBinfrom(string $binfrom) Return ChildBincntl objects filtered by the binfrom column
 * @method     ChildBincntl[]|ObjectCollection findByBinthru(string $binthru) Return ChildBincntl objects filtered by the binthru column
 * @method     ChildBincntl[]|ObjectCollection findByBintype(string $bintype) Return ChildBincntl objects filtered by the bintype column
 * @method     ChildBincntl[]|ObjectCollection findByBinarea(string $binarea) Return ChildBincntl objects filtered by the binarea column
 * @method     ChildBincntl[]|ObjectCollection findByBindesc(string $bindesc) Return ChildBincntl objects filtered by the bindesc column
 * @method     ChildBincntl[]|ObjectCollection findByDummy(string $dummy) Return ChildBincntl objects filtered by the dummy column
 * @method     ChildBincntl[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class BincntlQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\BincntlQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Bincntl', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBincntlQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBincntlQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildBincntlQuery) {
            return $criteria;
        }
        $query = new ChildBincntlQuery();
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
     * $obj = $c->findPk(array(12, 34, 56), $con);
     * </code>
     *
     * @param array[$warehouse, $binfrom, $binthru] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildBincntl|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(BincntlTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = BincntlTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2])]))))) {
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
     * @return ChildBincntl A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT warehouse, binfrom, binthru, bintype, binarea, bindesc, dummy FROM bincntl WHERE warehouse = :p0 AND binfrom = :p1 AND binthru = :p2';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->bindValue(':p2', $key[2], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildBincntl $obj */
            $obj = new ChildBincntl();
            $obj->hydrate($row);
            BincntlTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2])]));
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
     * @return ChildBincntl|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildBincntlQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(BincntlTableMap::COL_WAREHOUSE, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(BincntlTableMap::COL_BINFROM, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(BincntlTableMap::COL_BINTHRU, $key[2], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildBincntlQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(BincntlTableMap::COL_WAREHOUSE, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(BincntlTableMap::COL_BINFROM, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(BincntlTableMap::COL_BINTHRU, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the warehouse column
     *
     * Example usage:
     * <code>
     * $query->filterByWarehouse('fooValue');   // WHERE warehouse = 'fooValue'
     * $query->filterByWarehouse('%fooValue%', Criteria::LIKE); // WHERE warehouse LIKE '%fooValue%'
     * </code>
     *
     * @param     string $warehouse The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBincntlQuery The current query, for fluid interface
     */
    public function filterByWarehouse($warehouse = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($warehouse)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BincntlTableMap::COL_WAREHOUSE, $warehouse, $comparison);
    }

    /**
     * Filter the query on the binfrom column
     *
     * Example usage:
     * <code>
     * $query->filterByBinfrom('fooValue');   // WHERE binfrom = 'fooValue'
     * $query->filterByBinfrom('%fooValue%', Criteria::LIKE); // WHERE binfrom LIKE '%fooValue%'
     * </code>
     *
     * @param     string $binfrom The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBincntlQuery The current query, for fluid interface
     */
    public function filterByBinfrom($binfrom = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($binfrom)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BincntlTableMap::COL_BINFROM, $binfrom, $comparison);
    }

    /**
     * Filter the query on the binthru column
     *
     * Example usage:
     * <code>
     * $query->filterByBinthru('fooValue');   // WHERE binthru = 'fooValue'
     * $query->filterByBinthru('%fooValue%', Criteria::LIKE); // WHERE binthru LIKE '%fooValue%'
     * </code>
     *
     * @param     string $binthru The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBincntlQuery The current query, for fluid interface
     */
    public function filterByBinthru($binthru = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($binthru)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BincntlTableMap::COL_BINTHRU, $binthru, $comparison);
    }

    /**
     * Filter the query on the bintype column
     *
     * Example usage:
     * <code>
     * $query->filterByBintype('fooValue');   // WHERE bintype = 'fooValue'
     * $query->filterByBintype('%fooValue%', Criteria::LIKE); // WHERE bintype LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bintype The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBincntlQuery The current query, for fluid interface
     */
    public function filterByBintype($bintype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bintype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BincntlTableMap::COL_BINTYPE, $bintype, $comparison);
    }

    /**
     * Filter the query on the binarea column
     *
     * Example usage:
     * <code>
     * $query->filterByBinarea('fooValue');   // WHERE binarea = 'fooValue'
     * $query->filterByBinarea('%fooValue%', Criteria::LIKE); // WHERE binarea LIKE '%fooValue%'
     * </code>
     *
     * @param     string $binarea The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBincntlQuery The current query, for fluid interface
     */
    public function filterByBinarea($binarea = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($binarea)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BincntlTableMap::COL_BINAREA, $binarea, $comparison);
    }

    /**
     * Filter the query on the bindesc column
     *
     * Example usage:
     * <code>
     * $query->filterByBindesc('fooValue');   // WHERE bindesc = 'fooValue'
     * $query->filterByBindesc('%fooValue%', Criteria::LIKE); // WHERE bindesc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bindesc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBincntlQuery The current query, for fluid interface
     */
    public function filterByBindesc($bindesc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bindesc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BincntlTableMap::COL_BINDESC, $bindesc, $comparison);
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
     * @return $this|ChildBincntlQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BincntlTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildBincntl $bincntl Object to remove from the list of results
     *
     * @return $this|ChildBincntlQuery The current query, for fluid interface
     */
    public function prune($bincntl = null)
    {
        if ($bincntl) {
            $this->addCond('pruneCond0', $this->getAliasedColName(BincntlTableMap::COL_WAREHOUSE), $bincntl->getWarehouse(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(BincntlTableMap::COL_BINFROM), $bincntl->getBinfrom(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(BincntlTableMap::COL_BINTHRU), $bincntl->getBinthru(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the bincntl table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BincntlTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BincntlTableMap::clearInstancePool();
            BincntlTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(BincntlTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(BincntlTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            BincntlTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            BincntlTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // BincntlQuery
