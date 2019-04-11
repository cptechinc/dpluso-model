<?php

namespace Base;

use \Custnotes as ChildCustnotes;
use \CustnotesQuery as ChildCustnotesQuery;
use \Exception;
use \PDO;
use Map\CustnotesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'custnotes' table.
 *
 *
 *
 * @method     ChildCustnotesQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildCustnotesQuery orderByRecno($order = Criteria::ASC) Order by the recno column
 * @method     ChildCustnotesQuery orderByCustid($order = Criteria::ASC) Order by the custid column
 * @method     ChildCustnotesQuery orderByShipid($order = Criteria::ASC) Order by the shipid column
 * @method     ChildCustnotesQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildCustnotesQuery orderByAuthor($order = Criteria::ASC) Order by the author column
 * @method     ChildCustnotesQuery orderByNote($order = Criteria::ASC) Order by the note column
 *
 * @method     ChildCustnotesQuery groupBySessionid() Group by the sessionid column
 * @method     ChildCustnotesQuery groupByRecno() Group by the recno column
 * @method     ChildCustnotesQuery groupByCustid() Group by the custid column
 * @method     ChildCustnotesQuery groupByShipid() Group by the shipid column
 * @method     ChildCustnotesQuery groupByDate() Group by the date column
 * @method     ChildCustnotesQuery groupByAuthor() Group by the author column
 * @method     ChildCustnotesQuery groupByNote() Group by the note column
 *
 * @method     ChildCustnotesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCustnotesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCustnotesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCustnotesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCustnotesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCustnotesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCustnotes findOne(ConnectionInterface $con = null) Return the first ChildCustnotes matching the query
 * @method     ChildCustnotes findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCustnotes matching the query, or a new ChildCustnotes object populated from the query conditions when no match is found
 *
 * @method     ChildCustnotes findOneBySessionid(string $sessionid) Return the first ChildCustnotes filtered by the sessionid column
 * @method     ChildCustnotes findOneByRecno(int $recno) Return the first ChildCustnotes filtered by the recno column
 * @method     ChildCustnotes findOneByCustid(string $custid) Return the first ChildCustnotes filtered by the custid column
 * @method     ChildCustnotes findOneByShipid(string $shipid) Return the first ChildCustnotes filtered by the shipid column
 * @method     ChildCustnotes findOneByDate(string $date) Return the first ChildCustnotes filtered by the date column
 * @method     ChildCustnotes findOneByAuthor(string $author) Return the first ChildCustnotes filtered by the author column
 * @method     ChildCustnotes findOneByNote(string $note) Return the first ChildCustnotes filtered by the note column *

 * @method     ChildCustnotes requirePk($key, ConnectionInterface $con = null) Return the ChildCustnotes by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustnotes requireOne(ConnectionInterface $con = null) Return the first ChildCustnotes matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCustnotes requireOneBySessionid(string $sessionid) Return the first ChildCustnotes filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustnotes requireOneByRecno(int $recno) Return the first ChildCustnotes filtered by the recno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustnotes requireOneByCustid(string $custid) Return the first ChildCustnotes filtered by the custid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustnotes requireOneByShipid(string $shipid) Return the first ChildCustnotes filtered by the shipid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustnotes requireOneByDate(string $date) Return the first ChildCustnotes filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustnotes requireOneByAuthor(string $author) Return the first ChildCustnotes filtered by the author column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustnotes requireOneByNote(string $note) Return the first ChildCustnotes filtered by the note column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCustnotes[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCustnotes objects based on current ModelCriteria
 * @method     ChildCustnotes[]|ObjectCollection findBySessionid(string $sessionid) Return ChildCustnotes objects filtered by the sessionid column
 * @method     ChildCustnotes[]|ObjectCollection findByRecno(int $recno) Return ChildCustnotes objects filtered by the recno column
 * @method     ChildCustnotes[]|ObjectCollection findByCustid(string $custid) Return ChildCustnotes objects filtered by the custid column
 * @method     ChildCustnotes[]|ObjectCollection findByShipid(string $shipid) Return ChildCustnotes objects filtered by the shipid column
 * @method     ChildCustnotes[]|ObjectCollection findByDate(string $date) Return ChildCustnotes objects filtered by the date column
 * @method     ChildCustnotes[]|ObjectCollection findByAuthor(string $author) Return ChildCustnotes objects filtered by the author column
 * @method     ChildCustnotes[]|ObjectCollection findByNote(string $note) Return ChildCustnotes objects filtered by the note column
 * @method     ChildCustnotes[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CustnotesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CustnotesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Custnotes', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCustnotesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCustnotesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCustnotesQuery) {
            return $criteria;
        }
        $query = new ChildCustnotesQuery();
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
     * @param array[$sessionid, $recno] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildCustnotes|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CustnotesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CustnotesTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildCustnotes A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, recno, custid, shipid, date, author, note FROM custnotes WHERE sessionid = :p0 AND recno = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildCustnotes $obj */
            $obj = new ChildCustnotes();
            $obj->hydrate($row);
            CustnotesTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildCustnotes|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCustnotesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(CustnotesTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(CustnotesTableMap::COL_RECNO, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCustnotesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(CustnotesTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(CustnotesTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
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
     * @return $this|ChildCustnotesQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustnotesTableMap::COL_SESSIONID, $sessionid, $comparison);
    }

    /**
     * Filter the query on the recno column
     *
     * Example usage:
     * <code>
     * $query->filterByRecno(1234); // WHERE recno = 1234
     * $query->filterByRecno(array(12, 34)); // WHERE recno IN (12, 34)
     * $query->filterByRecno(array('min' => 12)); // WHERE recno > 12
     * </code>
     *
     * @param     mixed $recno The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustnotesQuery The current query, for fluid interface
     */
    public function filterByRecno($recno = null, $comparison = null)
    {
        if (is_array($recno)) {
            $useMinMax = false;
            if (isset($recno['min'])) {
                $this->addUsingAlias(CustnotesTableMap::COL_RECNO, $recno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recno['max'])) {
                $this->addUsingAlias(CustnotesTableMap::COL_RECNO, $recno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustnotesTableMap::COL_RECNO, $recno, $comparison);
    }

    /**
     * Filter the query on the custid column
     *
     * Example usage:
     * <code>
     * $query->filterByCustid('fooValue');   // WHERE custid = 'fooValue'
     * $query->filterByCustid('%fooValue%', Criteria::LIKE); // WHERE custid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $custid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustnotesQuery The current query, for fluid interface
     */
    public function filterByCustid($custid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustnotesTableMap::COL_CUSTID, $custid, $comparison);
    }

    /**
     * Filter the query on the shipid column
     *
     * Example usage:
     * <code>
     * $query->filterByShipid('fooValue');   // WHERE shipid = 'fooValue'
     * $query->filterByShipid('%fooValue%', Criteria::LIKE); // WHERE shipid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shipid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustnotesQuery The current query, for fluid interface
     */
    public function filterByShipid($shipid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustnotesTableMap::COL_SHIPID, $shipid, $comparison);
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate('fooValue');   // WHERE date = 'fooValue'
     * $query->filterByDate('%fooValue%', Criteria::LIKE); // WHERE date LIKE '%fooValue%'
     * </code>
     *
     * @param     string $date The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustnotesQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($date)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustnotesTableMap::COL_DATE, $date, $comparison);
    }

    /**
     * Filter the query on the author column
     *
     * Example usage:
     * <code>
     * $query->filterByAuthor('fooValue');   // WHERE author = 'fooValue'
     * $query->filterByAuthor('%fooValue%', Criteria::LIKE); // WHERE author LIKE '%fooValue%'
     * </code>
     *
     * @param     string $author The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustnotesQuery The current query, for fluid interface
     */
    public function filterByAuthor($author = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($author)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustnotesTableMap::COL_AUTHOR, $author, $comparison);
    }

    /**
     * Filter the query on the note column
     *
     * Example usage:
     * <code>
     * $query->filterByNote('fooValue');   // WHERE note = 'fooValue'
     * $query->filterByNote('%fooValue%', Criteria::LIKE); // WHERE note LIKE '%fooValue%'
     * </code>
     *
     * @param     string $note The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustnotesQuery The current query, for fluid interface
     */
    public function filterByNote($note = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($note)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustnotesTableMap::COL_NOTE, $note, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCustnotes $custnotes Object to remove from the list of results
     *
     * @return $this|ChildCustnotesQuery The current query, for fluid interface
     */
    public function prune($custnotes = null)
    {
        if ($custnotes) {
            $this->addCond('pruneCond0', $this->getAliasedColName(CustnotesTableMap::COL_SESSIONID), $custnotes->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(CustnotesTableMap::COL_RECNO), $custnotes->getRecno(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the custnotes table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CustnotesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CustnotesTableMap::clearInstancePool();
            CustnotesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CustnotesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CustnotesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CustnotesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CustnotesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CustnotesQuery
