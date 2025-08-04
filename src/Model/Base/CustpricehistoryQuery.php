<?php

namespace Base;

use \Custpricehistory as ChildCustpricehistory;
use \CustpricehistoryQuery as ChildCustpricehistoryQuery;
use \Exception;
use \PDO;
use Map\CustpricehistoryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the `custpricehistory` table.
 *
 * @method     ChildCustpricehistoryQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildCustpricehistoryQuery orderByItemid($order = Criteria::ASC) Order by the itemid column
 * @method     ChildCustpricehistoryQuery orderByLastqty($order = Criteria::ASC) Order by the lastqty column
 * @method     ChildCustpricehistoryQuery orderByLastsold($order = Criteria::ASC) Order by the lastsold column
 * @method     ChildCustpricehistoryQuery orderByLastprice($order = Criteria::ASC) Order by the lastprice column
 * @method     ChildCustpricehistoryQuery orderByOrdn($order = Criteria::ASC) Order by the ordn column
 * @method     ChildCustpricehistoryQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildCustpricehistoryQuery groupBySessionid() Group by the sessionid column
 * @method     ChildCustpricehistoryQuery groupByItemid() Group by the itemid column
 * @method     ChildCustpricehistoryQuery groupByLastqty() Group by the lastqty column
 * @method     ChildCustpricehistoryQuery groupByLastsold() Group by the lastsold column
 * @method     ChildCustpricehistoryQuery groupByLastprice() Group by the lastprice column
 * @method     ChildCustpricehistoryQuery groupByOrdn() Group by the ordn column
 * @method     ChildCustpricehistoryQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildCustpricehistoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCustpricehistoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCustpricehistoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCustpricehistoryQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCustpricehistoryQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCustpricehistoryQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCustpricehistory|null findOne(?ConnectionInterface $con = null) Return the first ChildCustpricehistory matching the query
 * @method     ChildCustpricehistory findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildCustpricehistory matching the query, or a new ChildCustpricehistory object populated from the query conditions when no match is found
 *
 * @method     ChildCustpricehistory|null findOneBySessionid(string $sessionid) Return the first ChildCustpricehistory filtered by the sessionid column
 * @method     ChildCustpricehistory|null findOneByItemid(string $itemid) Return the first ChildCustpricehistory filtered by the itemid column
 * @method     ChildCustpricehistory|null findOneByLastqty(string $lastqty) Return the first ChildCustpricehistory filtered by the lastqty column
 * @method     ChildCustpricehistory|null findOneByLastsold(string $lastsold) Return the first ChildCustpricehistory filtered by the lastsold column
 * @method     ChildCustpricehistory|null findOneByLastprice(string $lastprice) Return the first ChildCustpricehistory filtered by the lastprice column
 * @method     ChildCustpricehistory|null findOneByOrdn(string $ordn) Return the first ChildCustpricehistory filtered by the ordn column
 * @method     ChildCustpricehistory|null findOneByDummy(string $dummy) Return the first ChildCustpricehistory filtered by the dummy column
 *
 * @method     ChildCustpricehistory requirePk($key, ?ConnectionInterface $con = null) Return the ChildCustpricehistory by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustpricehistory requireOne(?ConnectionInterface $con = null) Return the first ChildCustpricehistory matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCustpricehistory requireOneBySessionid(string $sessionid) Return the first ChildCustpricehistory filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustpricehistory requireOneByItemid(string $itemid) Return the first ChildCustpricehistory filtered by the itemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustpricehistory requireOneByLastqty(string $lastqty) Return the first ChildCustpricehistory filtered by the lastqty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustpricehistory requireOneByLastsold(string $lastsold) Return the first ChildCustpricehistory filtered by the lastsold column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustpricehistory requireOneByLastprice(string $lastprice) Return the first ChildCustpricehistory filtered by the lastprice column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustpricehistory requireOneByOrdn(string $ordn) Return the first ChildCustpricehistory filtered by the ordn column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustpricehistory requireOneByDummy(string $dummy) Return the first ChildCustpricehistory filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCustpricehistory[]|Collection find(?ConnectionInterface $con = null) Return ChildCustpricehistory objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildCustpricehistory> find(?ConnectionInterface $con = null) Return ChildCustpricehistory objects based on current ModelCriteria
 *
 * @method     ChildCustpricehistory[]|Collection findBySessionid(string|array<string> $sessionid) Return ChildCustpricehistory objects filtered by the sessionid column
 * @psalm-method Collection&\Traversable<ChildCustpricehistory> findBySessionid(string|array<string> $sessionid) Return ChildCustpricehistory objects filtered by the sessionid column
 * @method     ChildCustpricehistory[]|Collection findByItemid(string|array<string> $itemid) Return ChildCustpricehistory objects filtered by the itemid column
 * @psalm-method Collection&\Traversable<ChildCustpricehistory> findByItemid(string|array<string> $itemid) Return ChildCustpricehistory objects filtered by the itemid column
 * @method     ChildCustpricehistory[]|Collection findByLastqty(string|array<string> $lastqty) Return ChildCustpricehistory objects filtered by the lastqty column
 * @psalm-method Collection&\Traversable<ChildCustpricehistory> findByLastqty(string|array<string> $lastqty) Return ChildCustpricehistory objects filtered by the lastqty column
 * @method     ChildCustpricehistory[]|Collection findByLastsold(string|array<string> $lastsold) Return ChildCustpricehistory objects filtered by the lastsold column
 * @psalm-method Collection&\Traversable<ChildCustpricehistory> findByLastsold(string|array<string> $lastsold) Return ChildCustpricehistory objects filtered by the lastsold column
 * @method     ChildCustpricehistory[]|Collection findByLastprice(string|array<string> $lastprice) Return ChildCustpricehistory objects filtered by the lastprice column
 * @psalm-method Collection&\Traversable<ChildCustpricehistory> findByLastprice(string|array<string> $lastprice) Return ChildCustpricehistory objects filtered by the lastprice column
 * @method     ChildCustpricehistory[]|Collection findByOrdn(string|array<string> $ordn) Return ChildCustpricehistory objects filtered by the ordn column
 * @psalm-method Collection&\Traversable<ChildCustpricehistory> findByOrdn(string|array<string> $ordn) Return ChildCustpricehistory objects filtered by the ordn column
 * @method     ChildCustpricehistory[]|Collection findByDummy(string|array<string> $dummy) Return ChildCustpricehistory objects filtered by the dummy column
 * @psalm-method Collection&\Traversable<ChildCustpricehistory> findByDummy(string|array<string> $dummy) Return ChildCustpricehistory objects filtered by the dummy column
 *
 * @method     ChildCustpricehistory[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildCustpricehistory> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class CustpricehistoryQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CustpricehistoryQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Custpricehistory', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCustpricehistoryQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCustpricehistoryQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildCustpricehistoryQuery) {
            return $criteria;
        }
        $query = new ChildCustpricehistoryQuery();
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
     * @param array[$sessionid, $itemid] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildCustpricehistory|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CustpricehistoryTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CustpricehistoryTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCustpricehistory A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, itemid, lastqty, lastsold, lastprice, ordn, dummy FROM custpricehistory WHERE sessionid = :p0 AND itemid = :p1';
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
            /** @var ChildCustpricehistory $obj */
            $obj = new ChildCustpricehistory();
            $obj->hydrate($row);
            CustpricehistoryTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
     *
     * @return ChildCustpricehistory|array|mixed the result, formatted by the current formatter
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
     * @param array $keys Primary keys to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return Collection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ?ConnectionInterface $con = null)
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
     * @param mixed $key Primary key to use for the query
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(CustpricehistoryTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(CustpricehistoryTableMap::COL_ITEMID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param array|int $keys The list of primary key to use for the query
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            $this->add(null, '1<>1', Criteria::CUSTOM);

            return $this;
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(CustpricehistoryTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(CustpricehistoryTableMap::COL_ITEMID, $key[1], Criteria::EQUAL);
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
     * $query->filterBySessionid(['foo', 'bar']); // WHERE sessionid IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $sessionid The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CustpricehistoryTableMap::COL_SESSIONID, $sessionid, $comparison);

        return $this;
    }

    /**
     * Filter the query on the itemid column
     *
     * Example usage:
     * <code>
     * $query->filterByItemid('fooValue');   // WHERE itemid = 'fooValue'
     * $query->filterByItemid('%fooValue%', Criteria::LIKE); // WHERE itemid LIKE '%fooValue%'
     * $query->filterByItemid(['foo', 'bar']); // WHERE itemid IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $itemid The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByItemid($itemid = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemid)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CustpricehistoryTableMap::COL_ITEMID, $itemid, $comparison);

        return $this;
    }

    /**
     * Filter the query on the lastqty column
     *
     * Example usage:
     * <code>
     * $query->filterByLastqty('fooValue');   // WHERE lastqty = 'fooValue'
     * $query->filterByLastqty('%fooValue%', Criteria::LIKE); // WHERE lastqty LIKE '%fooValue%'
     * $query->filterByLastqty(['foo', 'bar']); // WHERE lastqty IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $lastqty The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByLastqty($lastqty = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastqty)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CustpricehistoryTableMap::COL_LASTQTY, $lastqty, $comparison);

        return $this;
    }

    /**
     * Filter the query on the lastsold column
     *
     * Example usage:
     * <code>
     * $query->filterByLastsold('fooValue');   // WHERE lastsold = 'fooValue'
     * $query->filterByLastsold('%fooValue%', Criteria::LIKE); // WHERE lastsold LIKE '%fooValue%'
     * $query->filterByLastsold(['foo', 'bar']); // WHERE lastsold IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $lastsold The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByLastsold($lastsold = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastsold)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CustpricehistoryTableMap::COL_LASTSOLD, $lastsold, $comparison);

        return $this;
    }

    /**
     * Filter the query on the lastprice column
     *
     * Example usage:
     * <code>
     * $query->filterByLastprice('fooValue');   // WHERE lastprice = 'fooValue'
     * $query->filterByLastprice('%fooValue%', Criteria::LIKE); // WHERE lastprice LIKE '%fooValue%'
     * $query->filterByLastprice(['foo', 'bar']); // WHERE lastprice IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $lastprice The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByLastprice($lastprice = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastprice)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CustpricehistoryTableMap::COL_LASTPRICE, $lastprice, $comparison);

        return $this;
    }

    /**
     * Filter the query on the ordn column
     *
     * Example usage:
     * <code>
     * $query->filterByOrdn('fooValue');   // WHERE ordn = 'fooValue'
     * $query->filterByOrdn('%fooValue%', Criteria::LIKE); // WHERE ordn LIKE '%fooValue%'
     * $query->filterByOrdn(['foo', 'bar']); // WHERE ordn IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $ordn The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByOrdn($ordn = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ordn)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CustpricehistoryTableMap::COL_ORDN, $ordn, $comparison);

        return $this;
    }

    /**
     * Filter the query on the dummy column
     *
     * Example usage:
     * <code>
     * $query->filterByDummy('fooValue');   // WHERE dummy = 'fooValue'
     * $query->filterByDummy('%fooValue%', Criteria::LIKE); // WHERE dummy LIKE '%fooValue%'
     * $query->filterByDummy(['foo', 'bar']); // WHERE dummy IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $dummy The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CustpricehistoryTableMap::COL_DUMMY, $dummy, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildCustpricehistory $custpricehistory Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($custpricehistory = null)
    {
        if ($custpricehistory) {
            $this->addCond('pruneCond0', $this->getAliasedColName(CustpricehistoryTableMap::COL_SESSIONID), $custpricehistory->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(CustpricehistoryTableMap::COL_ITEMID), $custpricehistory->getItemid(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the custpricehistory table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CustpricehistoryTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CustpricehistoryTableMap::clearInstancePool();
            CustpricehistoryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CustpricehistoryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CustpricehistoryTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CustpricehistoryTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CustpricehistoryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
