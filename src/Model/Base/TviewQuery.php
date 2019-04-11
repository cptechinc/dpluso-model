<?php

namespace Base;

use \Tview as ChildTview;
use \TviewQuery as ChildTviewQuery;
use \Exception;
use \PDO;
use Map\TviewTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'tview' table.
 *
 *
 *
 * @method     ChildTviewQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildTviewQuery orderByRecno($order = Criteria::ASC) Order by the recno column
 * @method     ChildTviewQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildTviewQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildTviewQuery orderByC1($order = Criteria::ASC) Order by the c1 column
 * @method     ChildTviewQuery orderByC2($order = Criteria::ASC) Order by the c2 column
 * @method     ChildTviewQuery orderByC3($order = Criteria::ASC) Order by the c3 column
 * @method     ChildTviewQuery orderByC4($order = Criteria::ASC) Order by the c4 column
 * @method     ChildTviewQuery orderByC5($order = Criteria::ASC) Order by the c5 column
 * @method     ChildTviewQuery orderByC6($order = Criteria::ASC) Order by the c6 column
 * @method     ChildTviewQuery orderByC7($order = Criteria::ASC) Order by the c7 column
 * @method     ChildTviewQuery orderByC8($order = Criteria::ASC) Order by the c8 column
 * @method     ChildTviewQuery orderByC9($order = Criteria::ASC) Order by the c9 column
 * @method     ChildTviewQuery orderByC10($order = Criteria::ASC) Order by the c10 column
 * @method     ChildTviewQuery orderByFamid($order = Criteria::ASC) Order by the famid column
 * @method     ChildTviewQuery orderByItemid($order = Criteria::ASC) Order by the itemid column
 * @method     ChildTviewQuery orderByPicid($order = Criteria::ASC) Order by the picid column
 * @method     ChildTviewQuery orderByVidinffg($order = Criteria::ASC) Order by the vidinffg column
 * @method     ChildTviewQuery orderByVidinflk($order = Criteria::ASC) Order by the vidinflk column
 * @method     ChildTviewQuery orderByMessage($order = Criteria::ASC) Order by the message column
 * @method     ChildTviewQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildTviewQuery groupBySessionid() Group by the sessionid column
 * @method     ChildTviewQuery groupByRecno() Group by the recno column
 * @method     ChildTviewQuery groupByDate() Group by the date column
 * @method     ChildTviewQuery groupByTime() Group by the time column
 * @method     ChildTviewQuery groupByC1() Group by the c1 column
 * @method     ChildTviewQuery groupByC2() Group by the c2 column
 * @method     ChildTviewQuery groupByC3() Group by the c3 column
 * @method     ChildTviewQuery groupByC4() Group by the c4 column
 * @method     ChildTviewQuery groupByC5() Group by the c5 column
 * @method     ChildTviewQuery groupByC6() Group by the c6 column
 * @method     ChildTviewQuery groupByC7() Group by the c7 column
 * @method     ChildTviewQuery groupByC8() Group by the c8 column
 * @method     ChildTviewQuery groupByC9() Group by the c9 column
 * @method     ChildTviewQuery groupByC10() Group by the c10 column
 * @method     ChildTviewQuery groupByFamid() Group by the famid column
 * @method     ChildTviewQuery groupByItemid() Group by the itemid column
 * @method     ChildTviewQuery groupByPicid() Group by the picid column
 * @method     ChildTviewQuery groupByVidinffg() Group by the vidinffg column
 * @method     ChildTviewQuery groupByVidinflk() Group by the vidinflk column
 * @method     ChildTviewQuery groupByMessage() Group by the message column
 * @method     ChildTviewQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildTviewQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTviewQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTviewQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTviewQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTviewQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTviewQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTview findOne(ConnectionInterface $con = null) Return the first ChildTview matching the query
 * @method     ChildTview findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTview matching the query, or a new ChildTview object populated from the query conditions when no match is found
 *
 * @method     ChildTview findOneBySessionid(string $sessionid) Return the first ChildTview filtered by the sessionid column
 * @method     ChildTview findOneByRecno(string $recno) Return the first ChildTview filtered by the recno column
 * @method     ChildTview findOneByDate(string $date) Return the first ChildTview filtered by the date column
 * @method     ChildTview findOneByTime(string $time) Return the first ChildTview filtered by the time column
 * @method     ChildTview findOneByC1(string $c1) Return the first ChildTview filtered by the c1 column
 * @method     ChildTview findOneByC2(string $c2) Return the first ChildTview filtered by the c2 column
 * @method     ChildTview findOneByC3(string $c3) Return the first ChildTview filtered by the c3 column
 * @method     ChildTview findOneByC4(string $c4) Return the first ChildTview filtered by the c4 column
 * @method     ChildTview findOneByC5(string $c5) Return the first ChildTview filtered by the c5 column
 * @method     ChildTview findOneByC6(string $c6) Return the first ChildTview filtered by the c6 column
 * @method     ChildTview findOneByC7(string $c7) Return the first ChildTview filtered by the c7 column
 * @method     ChildTview findOneByC8(string $c8) Return the first ChildTview filtered by the c8 column
 * @method     ChildTview findOneByC9(string $c9) Return the first ChildTview filtered by the c9 column
 * @method     ChildTview findOneByC10(string $c10) Return the first ChildTview filtered by the c10 column
 * @method     ChildTview findOneByFamid(string $famid) Return the first ChildTview filtered by the famid column
 * @method     ChildTview findOneByItemid(string $itemid) Return the first ChildTview filtered by the itemid column
 * @method     ChildTview findOneByPicid(string $picid) Return the first ChildTview filtered by the picid column
 * @method     ChildTview findOneByVidinffg(string $vidinffg) Return the first ChildTview filtered by the vidinffg column
 * @method     ChildTview findOneByVidinflk(string $vidinflk) Return the first ChildTview filtered by the vidinflk column
 * @method     ChildTview findOneByMessage(string $message) Return the first ChildTview filtered by the message column
 * @method     ChildTview findOneByDummy(string $dummy) Return the first ChildTview filtered by the dummy column *

 * @method     ChildTview requirePk($key, ConnectionInterface $con = null) Return the ChildTview by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTview requireOne(ConnectionInterface $con = null) Return the first ChildTview matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTview requireOneBySessionid(string $sessionid) Return the first ChildTview filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTview requireOneByRecno(string $recno) Return the first ChildTview filtered by the recno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTview requireOneByDate(string $date) Return the first ChildTview filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTview requireOneByTime(string $time) Return the first ChildTview filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTview requireOneByC1(string $c1) Return the first ChildTview filtered by the c1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTview requireOneByC2(string $c2) Return the first ChildTview filtered by the c2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTview requireOneByC3(string $c3) Return the first ChildTview filtered by the c3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTview requireOneByC4(string $c4) Return the first ChildTview filtered by the c4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTview requireOneByC5(string $c5) Return the first ChildTview filtered by the c5 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTview requireOneByC6(string $c6) Return the first ChildTview filtered by the c6 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTview requireOneByC7(string $c7) Return the first ChildTview filtered by the c7 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTview requireOneByC8(string $c8) Return the first ChildTview filtered by the c8 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTview requireOneByC9(string $c9) Return the first ChildTview filtered by the c9 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTview requireOneByC10(string $c10) Return the first ChildTview filtered by the c10 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTview requireOneByFamid(string $famid) Return the first ChildTview filtered by the famid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTview requireOneByItemid(string $itemid) Return the first ChildTview filtered by the itemid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTview requireOneByPicid(string $picid) Return the first ChildTview filtered by the picid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTview requireOneByVidinffg(string $vidinffg) Return the first ChildTview filtered by the vidinffg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTview requireOneByVidinflk(string $vidinflk) Return the first ChildTview filtered by the vidinflk column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTview requireOneByMessage(string $message) Return the first ChildTview filtered by the message column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTview requireOneByDummy(string $dummy) Return the first ChildTview filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTview[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTview objects based on current ModelCriteria
 * @method     ChildTview[]|ObjectCollection findBySessionid(string $sessionid) Return ChildTview objects filtered by the sessionid column
 * @method     ChildTview[]|ObjectCollection findByRecno(string $recno) Return ChildTview objects filtered by the recno column
 * @method     ChildTview[]|ObjectCollection findByDate(string $date) Return ChildTview objects filtered by the date column
 * @method     ChildTview[]|ObjectCollection findByTime(string $time) Return ChildTview objects filtered by the time column
 * @method     ChildTview[]|ObjectCollection findByC1(string $c1) Return ChildTview objects filtered by the c1 column
 * @method     ChildTview[]|ObjectCollection findByC2(string $c2) Return ChildTview objects filtered by the c2 column
 * @method     ChildTview[]|ObjectCollection findByC3(string $c3) Return ChildTview objects filtered by the c3 column
 * @method     ChildTview[]|ObjectCollection findByC4(string $c4) Return ChildTview objects filtered by the c4 column
 * @method     ChildTview[]|ObjectCollection findByC5(string $c5) Return ChildTview objects filtered by the c5 column
 * @method     ChildTview[]|ObjectCollection findByC6(string $c6) Return ChildTview objects filtered by the c6 column
 * @method     ChildTview[]|ObjectCollection findByC7(string $c7) Return ChildTview objects filtered by the c7 column
 * @method     ChildTview[]|ObjectCollection findByC8(string $c8) Return ChildTview objects filtered by the c8 column
 * @method     ChildTview[]|ObjectCollection findByC9(string $c9) Return ChildTview objects filtered by the c9 column
 * @method     ChildTview[]|ObjectCollection findByC10(string $c10) Return ChildTview objects filtered by the c10 column
 * @method     ChildTview[]|ObjectCollection findByFamid(string $famid) Return ChildTview objects filtered by the famid column
 * @method     ChildTview[]|ObjectCollection findByItemid(string $itemid) Return ChildTview objects filtered by the itemid column
 * @method     ChildTview[]|ObjectCollection findByPicid(string $picid) Return ChildTview objects filtered by the picid column
 * @method     ChildTview[]|ObjectCollection findByVidinffg(string $vidinffg) Return ChildTview objects filtered by the vidinffg column
 * @method     ChildTview[]|ObjectCollection findByVidinflk(string $vidinflk) Return ChildTview objects filtered by the vidinflk column
 * @method     ChildTview[]|ObjectCollection findByMessage(string $message) Return ChildTview objects filtered by the message column
 * @method     ChildTview[]|ObjectCollection findByDummy(string $dummy) Return ChildTview objects filtered by the dummy column
 * @method     ChildTview[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TviewQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TviewQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Tview', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTviewQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTviewQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTviewQuery) {
            return $criteria;
        }
        $query = new ChildTviewQuery();
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
     * @return ChildTview|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TviewTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TviewTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildTview A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, recno, date, time, c1, c2, c3, c4, c5, c6, c7, c8, c9, c10, famid, itemid, picid, vidinffg, vidinflk, message, dummy FROM tview WHERE sessionid = :p0 AND recno = :p1';
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
            /** @var ChildTview $obj */
            $obj = new ChildTview();
            $obj->hydrate($row);
            TviewTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildTview|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTviewQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(TviewTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(TviewTableMap::COL_RECNO, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTviewQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(TviewTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(TviewTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
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
     * @return $this|ChildTviewQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TviewTableMap::COL_SESSIONID, $sessionid, $comparison);
    }

    /**
     * Filter the query on the recno column
     *
     * Example usage:
     * <code>
     * $query->filterByRecno('fooValue');   // WHERE recno = 'fooValue'
     * $query->filterByRecno('%fooValue%', Criteria::LIKE); // WHERE recno LIKE '%fooValue%'
     * </code>
     *
     * @param     string $recno The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTviewQuery The current query, for fluid interface
     */
    public function filterByRecno($recno = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($recno)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TviewTableMap::COL_RECNO, $recno, $comparison);
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
     * @return $this|ChildTviewQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($date)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TviewTableMap::COL_DATE, $date, $comparison);
    }

    /**
     * Filter the query on the time column
     *
     * Example usage:
     * <code>
     * $query->filterByTime('fooValue');   // WHERE time = 'fooValue'
     * $query->filterByTime('%fooValue%', Criteria::LIKE); // WHERE time LIKE '%fooValue%'
     * </code>
     *
     * @param     string $time The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTviewQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($time)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TviewTableMap::COL_TIME, $time, $comparison);
    }

    /**
     * Filter the query on the c1 column
     *
     * Example usage:
     * <code>
     * $query->filterByC1('fooValue');   // WHERE c1 = 'fooValue'
     * $query->filterByC1('%fooValue%', Criteria::LIKE); // WHERE c1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $c1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTviewQuery The current query, for fluid interface
     */
    public function filterByC1($c1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($c1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TviewTableMap::COL_C1, $c1, $comparison);
    }

    /**
     * Filter the query on the c2 column
     *
     * Example usage:
     * <code>
     * $query->filterByC2('fooValue');   // WHERE c2 = 'fooValue'
     * $query->filterByC2('%fooValue%', Criteria::LIKE); // WHERE c2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $c2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTviewQuery The current query, for fluid interface
     */
    public function filterByC2($c2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($c2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TviewTableMap::COL_C2, $c2, $comparison);
    }

    /**
     * Filter the query on the c3 column
     *
     * Example usage:
     * <code>
     * $query->filterByC3('fooValue');   // WHERE c3 = 'fooValue'
     * $query->filterByC3('%fooValue%', Criteria::LIKE); // WHERE c3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $c3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTviewQuery The current query, for fluid interface
     */
    public function filterByC3($c3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($c3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TviewTableMap::COL_C3, $c3, $comparison);
    }

    /**
     * Filter the query on the c4 column
     *
     * Example usage:
     * <code>
     * $query->filterByC4('fooValue');   // WHERE c4 = 'fooValue'
     * $query->filterByC4('%fooValue%', Criteria::LIKE); // WHERE c4 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $c4 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTviewQuery The current query, for fluid interface
     */
    public function filterByC4($c4 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($c4)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TviewTableMap::COL_C4, $c4, $comparison);
    }

    /**
     * Filter the query on the c5 column
     *
     * Example usage:
     * <code>
     * $query->filterByC5('fooValue');   // WHERE c5 = 'fooValue'
     * $query->filterByC5('%fooValue%', Criteria::LIKE); // WHERE c5 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $c5 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTviewQuery The current query, for fluid interface
     */
    public function filterByC5($c5 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($c5)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TviewTableMap::COL_C5, $c5, $comparison);
    }

    /**
     * Filter the query on the c6 column
     *
     * Example usage:
     * <code>
     * $query->filterByC6('fooValue');   // WHERE c6 = 'fooValue'
     * $query->filterByC6('%fooValue%', Criteria::LIKE); // WHERE c6 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $c6 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTviewQuery The current query, for fluid interface
     */
    public function filterByC6($c6 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($c6)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TviewTableMap::COL_C6, $c6, $comparison);
    }

    /**
     * Filter the query on the c7 column
     *
     * Example usage:
     * <code>
     * $query->filterByC7('fooValue');   // WHERE c7 = 'fooValue'
     * $query->filterByC7('%fooValue%', Criteria::LIKE); // WHERE c7 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $c7 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTviewQuery The current query, for fluid interface
     */
    public function filterByC7($c7 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($c7)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TviewTableMap::COL_C7, $c7, $comparison);
    }

    /**
     * Filter the query on the c8 column
     *
     * Example usage:
     * <code>
     * $query->filterByC8('fooValue');   // WHERE c8 = 'fooValue'
     * $query->filterByC8('%fooValue%', Criteria::LIKE); // WHERE c8 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $c8 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTviewQuery The current query, for fluid interface
     */
    public function filterByC8($c8 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($c8)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TviewTableMap::COL_C8, $c8, $comparison);
    }

    /**
     * Filter the query on the c9 column
     *
     * Example usage:
     * <code>
     * $query->filterByC9('fooValue');   // WHERE c9 = 'fooValue'
     * $query->filterByC9('%fooValue%', Criteria::LIKE); // WHERE c9 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $c9 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTviewQuery The current query, for fluid interface
     */
    public function filterByC9($c9 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($c9)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TviewTableMap::COL_C9, $c9, $comparison);
    }

    /**
     * Filter the query on the c10 column
     *
     * Example usage:
     * <code>
     * $query->filterByC10('fooValue');   // WHERE c10 = 'fooValue'
     * $query->filterByC10('%fooValue%', Criteria::LIKE); // WHERE c10 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $c10 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTviewQuery The current query, for fluid interface
     */
    public function filterByC10($c10 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($c10)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TviewTableMap::COL_C10, $c10, $comparison);
    }

    /**
     * Filter the query on the famid column
     *
     * Example usage:
     * <code>
     * $query->filterByFamid('fooValue');   // WHERE famid = 'fooValue'
     * $query->filterByFamid('%fooValue%', Criteria::LIKE); // WHERE famid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $famid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTviewQuery The current query, for fluid interface
     */
    public function filterByFamid($famid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($famid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TviewTableMap::COL_FAMID, $famid, $comparison);
    }

    /**
     * Filter the query on the itemid column
     *
     * Example usage:
     * <code>
     * $query->filterByItemid('fooValue');   // WHERE itemid = 'fooValue'
     * $query->filterByItemid('%fooValue%', Criteria::LIKE); // WHERE itemid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $itemid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTviewQuery The current query, for fluid interface
     */
    public function filterByItemid($itemid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TviewTableMap::COL_ITEMID, $itemid, $comparison);
    }

    /**
     * Filter the query on the picid column
     *
     * Example usage:
     * <code>
     * $query->filterByPicid('fooValue');   // WHERE picid = 'fooValue'
     * $query->filterByPicid('%fooValue%', Criteria::LIKE); // WHERE picid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $picid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTviewQuery The current query, for fluid interface
     */
    public function filterByPicid($picid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($picid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TviewTableMap::COL_PICID, $picid, $comparison);
    }

    /**
     * Filter the query on the vidinffg column
     *
     * Example usage:
     * <code>
     * $query->filterByVidinffg('fooValue');   // WHERE vidinffg = 'fooValue'
     * $query->filterByVidinffg('%fooValue%', Criteria::LIKE); // WHERE vidinffg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $vidinffg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTviewQuery The current query, for fluid interface
     */
    public function filterByVidinffg($vidinffg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($vidinffg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TviewTableMap::COL_VIDINFFG, $vidinffg, $comparison);
    }

    /**
     * Filter the query on the vidinflk column
     *
     * Example usage:
     * <code>
     * $query->filterByVidinflk('fooValue');   // WHERE vidinflk = 'fooValue'
     * $query->filterByVidinflk('%fooValue%', Criteria::LIKE); // WHERE vidinflk LIKE '%fooValue%'
     * </code>
     *
     * @param     string $vidinflk The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTviewQuery The current query, for fluid interface
     */
    public function filterByVidinflk($vidinflk = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($vidinflk)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TviewTableMap::COL_VIDINFLK, $vidinflk, $comparison);
    }

    /**
     * Filter the query on the message column
     *
     * Example usage:
     * <code>
     * $query->filterByMessage('fooValue');   // WHERE message = 'fooValue'
     * $query->filterByMessage('%fooValue%', Criteria::LIKE); // WHERE message LIKE '%fooValue%'
     * </code>
     *
     * @param     string $message The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTviewQuery The current query, for fluid interface
     */
    public function filterByMessage($message = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($message)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TviewTableMap::COL_MESSAGE, $message, $comparison);
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
     * @return $this|ChildTviewQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TviewTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTview $tview Object to remove from the list of results
     *
     * @return $this|ChildTviewQuery The current query, for fluid interface
     */
    public function prune($tview = null)
    {
        if ($tview) {
            $this->addCond('pruneCond0', $this->getAliasedColName(TviewTableMap::COL_SESSIONID), $tview->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(TviewTableMap::COL_RECNO), $tview->getRecno(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tview table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TviewTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TviewTableMap::clearInstancePool();
            TviewTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TviewTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TviewTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TviewTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TviewTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TviewQuery
