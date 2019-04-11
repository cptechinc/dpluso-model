<?php

namespace Base;

use \Orddocs as ChildOrddocs;
use \OrddocsQuery as ChildOrddocsQuery;
use \Exception;
use \PDO;
use Map\OrddocsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'orddocs' table.
 *
 *
 *
 * @method     ChildOrddocsQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildOrddocsQuery orderByRecno($order = Criteria::ASC) Order by the recno column
 * @method     ChildOrddocsQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildOrddocsQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildOrddocsQuery orderByOrderno($order = Criteria::ASC) Order by the orderno column
 * @method     ChildOrddocsQuery orderByLinenbr($order = Criteria::ASC) Order by the linenbr column
 * @method     ChildOrddocsQuery orderByItemnbr($order = Criteria::ASC) Order by the itemnbr column
 * @method     ChildOrddocsQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildOrddocsQuery orderByCreatedate($order = Criteria::ASC) Order by the createdate column
 * @method     ChildOrddocsQuery orderByCreatetime($order = Criteria::ASC) Order by the createtime column
 * @method     ChildOrddocsQuery orderByPathname($order = Criteria::ASC) Order by the pathname column
 * @method     ChildOrddocsQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildOrddocsQuery groupBySessionid() Group by the sessionid column
 * @method     ChildOrddocsQuery groupByRecno() Group by the recno column
 * @method     ChildOrddocsQuery groupByDate() Group by the date column
 * @method     ChildOrddocsQuery groupByTime() Group by the time column
 * @method     ChildOrddocsQuery groupByOrderno() Group by the orderno column
 * @method     ChildOrddocsQuery groupByLinenbr() Group by the linenbr column
 * @method     ChildOrddocsQuery groupByItemnbr() Group by the itemnbr column
 * @method     ChildOrddocsQuery groupByTitle() Group by the title column
 * @method     ChildOrddocsQuery groupByCreatedate() Group by the createdate column
 * @method     ChildOrddocsQuery groupByCreatetime() Group by the createtime column
 * @method     ChildOrddocsQuery groupByPathname() Group by the pathname column
 * @method     ChildOrddocsQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildOrddocsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOrddocsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOrddocsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOrddocsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOrddocsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOrddocsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOrddocs findOne(ConnectionInterface $con = null) Return the first ChildOrddocs matching the query
 * @method     ChildOrddocs findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOrddocs matching the query, or a new ChildOrddocs object populated from the query conditions when no match is found
 *
 * @method     ChildOrddocs findOneBySessionid(string $sessionid) Return the first ChildOrddocs filtered by the sessionid column
 * @method     ChildOrddocs findOneByRecno(int $recno) Return the first ChildOrddocs filtered by the recno column
 * @method     ChildOrddocs findOneByDate(int $date) Return the first ChildOrddocs filtered by the date column
 * @method     ChildOrddocs findOneByTime(int $time) Return the first ChildOrddocs filtered by the time column
 * @method     ChildOrddocs findOneByOrderno(string $orderno) Return the first ChildOrddocs filtered by the orderno column
 * @method     ChildOrddocs findOneByLinenbr(string $linenbr) Return the first ChildOrddocs filtered by the linenbr column
 * @method     ChildOrddocs findOneByItemnbr(string $itemnbr) Return the first ChildOrddocs filtered by the itemnbr column
 * @method     ChildOrddocs findOneByTitle(string $title) Return the first ChildOrddocs filtered by the title column
 * @method     ChildOrddocs findOneByCreatedate(string $createdate) Return the first ChildOrddocs filtered by the createdate column
 * @method     ChildOrddocs findOneByCreatetime(string $createtime) Return the first ChildOrddocs filtered by the createtime column
 * @method     ChildOrddocs findOneByPathname(string $pathname) Return the first ChildOrddocs filtered by the pathname column
 * @method     ChildOrddocs findOneByDummy(string $dummy) Return the first ChildOrddocs filtered by the dummy column *

 * @method     ChildOrddocs requirePk($key, ConnectionInterface $con = null) Return the ChildOrddocs by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrddocs requireOne(ConnectionInterface $con = null) Return the first ChildOrddocs matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrddocs requireOneBySessionid(string $sessionid) Return the first ChildOrddocs filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrddocs requireOneByRecno(int $recno) Return the first ChildOrddocs filtered by the recno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrddocs requireOneByDate(int $date) Return the first ChildOrddocs filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrddocs requireOneByTime(int $time) Return the first ChildOrddocs filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrddocs requireOneByOrderno(string $orderno) Return the first ChildOrddocs filtered by the orderno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrddocs requireOneByLinenbr(string $linenbr) Return the first ChildOrddocs filtered by the linenbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrddocs requireOneByItemnbr(string $itemnbr) Return the first ChildOrddocs filtered by the itemnbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrddocs requireOneByTitle(string $title) Return the first ChildOrddocs filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrddocs requireOneByCreatedate(string $createdate) Return the first ChildOrddocs filtered by the createdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrddocs requireOneByCreatetime(string $createtime) Return the first ChildOrddocs filtered by the createtime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrddocs requireOneByPathname(string $pathname) Return the first ChildOrddocs filtered by the pathname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrddocs requireOneByDummy(string $dummy) Return the first ChildOrddocs filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrddocs[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOrddocs objects based on current ModelCriteria
 * @method     ChildOrddocs[]|ObjectCollection findBySessionid(string $sessionid) Return ChildOrddocs objects filtered by the sessionid column
 * @method     ChildOrddocs[]|ObjectCollection findByRecno(int $recno) Return ChildOrddocs objects filtered by the recno column
 * @method     ChildOrddocs[]|ObjectCollection findByDate(int $date) Return ChildOrddocs objects filtered by the date column
 * @method     ChildOrddocs[]|ObjectCollection findByTime(int $time) Return ChildOrddocs objects filtered by the time column
 * @method     ChildOrddocs[]|ObjectCollection findByOrderno(string $orderno) Return ChildOrddocs objects filtered by the orderno column
 * @method     ChildOrddocs[]|ObjectCollection findByLinenbr(string $linenbr) Return ChildOrddocs objects filtered by the linenbr column
 * @method     ChildOrddocs[]|ObjectCollection findByItemnbr(string $itemnbr) Return ChildOrddocs objects filtered by the itemnbr column
 * @method     ChildOrddocs[]|ObjectCollection findByTitle(string $title) Return ChildOrddocs objects filtered by the title column
 * @method     ChildOrddocs[]|ObjectCollection findByCreatedate(string $createdate) Return ChildOrddocs objects filtered by the createdate column
 * @method     ChildOrddocs[]|ObjectCollection findByCreatetime(string $createtime) Return ChildOrddocs objects filtered by the createtime column
 * @method     ChildOrddocs[]|ObjectCollection findByPathname(string $pathname) Return ChildOrddocs objects filtered by the pathname column
 * @method     ChildOrddocs[]|ObjectCollection findByDummy(string $dummy) Return ChildOrddocs objects filtered by the dummy column
 * @method     ChildOrddocs[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OrddocsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OrddocsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Orddocs', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOrddocsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOrddocsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOrddocsQuery) {
            return $criteria;
        }
        $query = new ChildOrddocsQuery();
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
     * @return ChildOrddocs|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OrddocsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OrddocsTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildOrddocs A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, recno, date, time, orderno, linenbr, itemnbr, title, createdate, createtime, pathname, dummy FROM orddocs WHERE sessionid = :p0 AND recno = :p1';
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
            /** @var ChildOrddocs $obj */
            $obj = new ChildOrddocs();
            $obj->hydrate($row);
            OrddocsTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildOrddocs|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOrddocsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(OrddocsTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(OrddocsTableMap::COL_RECNO, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOrddocsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(OrddocsTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(OrddocsTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
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
     * @return $this|ChildOrddocsQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrddocsTableMap::COL_SESSIONID, $sessionid, $comparison);
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
     * @return $this|ChildOrddocsQuery The current query, for fluid interface
     */
    public function filterByRecno($recno = null, $comparison = null)
    {
        if (is_array($recno)) {
            $useMinMax = false;
            if (isset($recno['min'])) {
                $this->addUsingAlias(OrddocsTableMap::COL_RECNO, $recno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recno['max'])) {
                $this->addUsingAlias(OrddocsTableMap::COL_RECNO, $recno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrddocsTableMap::COL_RECNO, $recno, $comparison);
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate(1234); // WHERE date = 1234
     * $query->filterByDate(array(12, 34)); // WHERE date IN (12, 34)
     * $query->filterByDate(array('min' => 12)); // WHERE date > 12
     * </code>
     *
     * @param     mixed $date The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrddocsQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(OrddocsTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(OrddocsTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrddocsTableMap::COL_DATE, $date, $comparison);
    }

    /**
     * Filter the query on the time column
     *
     * Example usage:
     * <code>
     * $query->filterByTime(1234); // WHERE time = 1234
     * $query->filterByTime(array(12, 34)); // WHERE time IN (12, 34)
     * $query->filterByTime(array('min' => 12)); // WHERE time > 12
     * </code>
     *
     * @param     mixed $time The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrddocsQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(OrddocsTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(OrddocsTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrddocsTableMap::COL_TIME, $time, $comparison);
    }

    /**
     * Filter the query on the orderno column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderno('fooValue');   // WHERE orderno = 'fooValue'
     * $query->filterByOrderno('%fooValue%', Criteria::LIKE); // WHERE orderno LIKE '%fooValue%'
     * </code>
     *
     * @param     string $orderno The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrddocsQuery The current query, for fluid interface
     */
    public function filterByOrderno($orderno = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($orderno)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrddocsTableMap::COL_ORDERNO, $orderno, $comparison);
    }

    /**
     * Filter the query on the linenbr column
     *
     * Example usage:
     * <code>
     * $query->filterByLinenbr('fooValue');   // WHERE linenbr = 'fooValue'
     * $query->filterByLinenbr('%fooValue%', Criteria::LIKE); // WHERE linenbr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $linenbr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrddocsQuery The current query, for fluid interface
     */
    public function filterByLinenbr($linenbr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($linenbr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrddocsTableMap::COL_LINENBR, $linenbr, $comparison);
    }

    /**
     * Filter the query on the itemnbr column
     *
     * Example usage:
     * <code>
     * $query->filterByItemnbr('fooValue');   // WHERE itemnbr = 'fooValue'
     * $query->filterByItemnbr('%fooValue%', Criteria::LIKE); // WHERE itemnbr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $itemnbr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrddocsQuery The current query, for fluid interface
     */
    public function filterByItemnbr($itemnbr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemnbr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrddocsTableMap::COL_ITEMNBR, $itemnbr, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%', Criteria::LIKE); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrddocsQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrddocsTableMap::COL_TITLE, $title, $comparison);
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
     * @return $this|ChildOrddocsQuery The current query, for fluid interface
     */
    public function filterByCreatedate($createdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($createdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrddocsTableMap::COL_CREATEDATE, $createdate, $comparison);
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
     * @return $this|ChildOrddocsQuery The current query, for fluid interface
     */
    public function filterByCreatetime($createtime = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($createtime)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrddocsTableMap::COL_CREATETIME, $createtime, $comparison);
    }

    /**
     * Filter the query on the pathname column
     *
     * Example usage:
     * <code>
     * $query->filterByPathname('fooValue');   // WHERE pathname = 'fooValue'
     * $query->filterByPathname('%fooValue%', Criteria::LIKE); // WHERE pathname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pathname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrddocsQuery The current query, for fluid interface
     */
    public function filterByPathname($pathname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pathname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrddocsTableMap::COL_PATHNAME, $pathname, $comparison);
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
     * @return $this|ChildOrddocsQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrddocsTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOrddocs $orddocs Object to remove from the list of results
     *
     * @return $this|ChildOrddocsQuery The current query, for fluid interface
     */
    public function prune($orddocs = null)
    {
        if ($orddocs) {
            $this->addCond('pruneCond0', $this->getAliasedColName(OrddocsTableMap::COL_SESSIONID), $orddocs->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(OrddocsTableMap::COL_RECNO), $orddocs->getRecno(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the orddocs table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OrddocsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OrddocsTableMap::clearInstancePool();
            OrddocsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OrddocsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OrddocsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OrddocsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OrddocsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OrddocsQuery
