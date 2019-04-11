<?php

namespace Base;

use \Ordrtot as ChildOrdrtot;
use \OrdrtotQuery as ChildOrdrtotQuery;
use \Exception;
use \PDO;
use Map\OrdrtotTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ordrtot' table.
 *
 *
 *
 * @method     ChildOrdrtotQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildOrdrtotQuery orderByRecno($order = Criteria::ASC) Order by the recno column
 * @method     ChildOrdrtotQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildOrdrtotQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildOrdrtotQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildOrdrtotQuery orderByCustid($order = Criteria::ASC) Order by the custid column
 * @method     ChildOrdrtotQuery orderByShiptoid($order = Criteria::ASC) Order by the shiptoid column
 * @method     ChildOrdrtotQuery orderBySaleordnbr($order = Criteria::ASC) Order by the saleordnbr column
 * @method     ChildOrdrtotQuery orderBySaleordamt($order = Criteria::ASC) Order by the saleordamt column
 * @method     ChildOrdrtotQuery orderByOpeninvnbr($order = Criteria::ASC) Order by the openinvnbr column
 * @method     ChildOrdrtotQuery orderByOpeninvamt($order = Criteria::ASC) Order by the openinvamt column
 * @method     ChildOrdrtotQuery orderByQuotesbr($order = Criteria::ASC) Order by the quotesbr column
 * @method     ChildOrdrtotQuery orderByQuotesmt($order = Criteria::ASC) Order by the quotesmt column
 * @method     ChildOrdrtotQuery orderByMonthtodatenbr($order = Criteria::ASC) Order by the monthtodatenbr column
 * @method     ChildOrdrtotQuery orderByMonthtodateamt($order = Criteria::ASC) Order by the monthtodateamt column
 * @method     ChildOrdrtotQuery orderByYeartodatenbr($order = Criteria::ASC) Order by the yeartodatenbr column
 * @method     ChildOrdrtotQuery orderByYeartodateamt($order = Criteria::ASC) Order by the yeartodateamt column
 * @method     ChildOrdrtotQuery orderByLast12nbr($order = Criteria::ASC) Order by the last12nbr column
 * @method     ChildOrdrtotQuery orderByLast12amt($order = Criteria::ASC) Order by the last12amt column
 * @method     ChildOrdrtotQuery orderByPrevyearnbr($order = Criteria::ASC) Order by the prevyearnbr column
 * @method     ChildOrdrtotQuery orderByPrevyearamt($order = Criteria::ASC) Order by the prevyearamt column
 * @method     ChildOrdrtotQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildOrdrtotQuery groupBySessionid() Group by the sessionid column
 * @method     ChildOrdrtotQuery groupByRecno() Group by the recno column
 * @method     ChildOrdrtotQuery groupByDate() Group by the date column
 * @method     ChildOrdrtotQuery groupByTime() Group by the time column
 * @method     ChildOrdrtotQuery groupByType() Group by the type column
 * @method     ChildOrdrtotQuery groupByCustid() Group by the custid column
 * @method     ChildOrdrtotQuery groupByShiptoid() Group by the shiptoid column
 * @method     ChildOrdrtotQuery groupBySaleordnbr() Group by the saleordnbr column
 * @method     ChildOrdrtotQuery groupBySaleordamt() Group by the saleordamt column
 * @method     ChildOrdrtotQuery groupByOpeninvnbr() Group by the openinvnbr column
 * @method     ChildOrdrtotQuery groupByOpeninvamt() Group by the openinvamt column
 * @method     ChildOrdrtotQuery groupByQuotesbr() Group by the quotesbr column
 * @method     ChildOrdrtotQuery groupByQuotesmt() Group by the quotesmt column
 * @method     ChildOrdrtotQuery groupByMonthtodatenbr() Group by the monthtodatenbr column
 * @method     ChildOrdrtotQuery groupByMonthtodateamt() Group by the monthtodateamt column
 * @method     ChildOrdrtotQuery groupByYeartodatenbr() Group by the yeartodatenbr column
 * @method     ChildOrdrtotQuery groupByYeartodateamt() Group by the yeartodateamt column
 * @method     ChildOrdrtotQuery groupByLast12nbr() Group by the last12nbr column
 * @method     ChildOrdrtotQuery groupByLast12amt() Group by the last12amt column
 * @method     ChildOrdrtotQuery groupByPrevyearnbr() Group by the prevyearnbr column
 * @method     ChildOrdrtotQuery groupByPrevyearamt() Group by the prevyearamt column
 * @method     ChildOrdrtotQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildOrdrtotQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOrdrtotQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOrdrtotQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOrdrtotQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOrdrtotQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOrdrtotQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOrdrtot findOne(ConnectionInterface $con = null) Return the first ChildOrdrtot matching the query
 * @method     ChildOrdrtot findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOrdrtot matching the query, or a new ChildOrdrtot object populated from the query conditions when no match is found
 *
 * @method     ChildOrdrtot findOneBySessionid(string $sessionid) Return the first ChildOrdrtot filtered by the sessionid column
 * @method     ChildOrdrtot findOneByRecno(int $recno) Return the first ChildOrdrtot filtered by the recno column
 * @method     ChildOrdrtot findOneByDate(int $date) Return the first ChildOrdrtot filtered by the date column
 * @method     ChildOrdrtot findOneByTime(int $time) Return the first ChildOrdrtot filtered by the time column
 * @method     ChildOrdrtot findOneByType(string $type) Return the first ChildOrdrtot filtered by the type column
 * @method     ChildOrdrtot findOneByCustid(string $custid) Return the first ChildOrdrtot filtered by the custid column
 * @method     ChildOrdrtot findOneByShiptoid(string $shiptoid) Return the first ChildOrdrtot filtered by the shiptoid column
 * @method     ChildOrdrtot findOneBySaleordnbr(int $saleordnbr) Return the first ChildOrdrtot filtered by the saleordnbr column
 * @method     ChildOrdrtot findOneBySaleordamt(string $saleordamt) Return the first ChildOrdrtot filtered by the saleordamt column
 * @method     ChildOrdrtot findOneByOpeninvnbr(int $openinvnbr) Return the first ChildOrdrtot filtered by the openinvnbr column
 * @method     ChildOrdrtot findOneByOpeninvamt(string $openinvamt) Return the first ChildOrdrtot filtered by the openinvamt column
 * @method     ChildOrdrtot findOneByQuotesbr(int $quotesbr) Return the first ChildOrdrtot filtered by the quotesbr column
 * @method     ChildOrdrtot findOneByQuotesmt(string $quotesmt) Return the first ChildOrdrtot filtered by the quotesmt column
 * @method     ChildOrdrtot findOneByMonthtodatenbr(int $monthtodatenbr) Return the first ChildOrdrtot filtered by the monthtodatenbr column
 * @method     ChildOrdrtot findOneByMonthtodateamt(string $monthtodateamt) Return the first ChildOrdrtot filtered by the monthtodateamt column
 * @method     ChildOrdrtot findOneByYeartodatenbr(int $yeartodatenbr) Return the first ChildOrdrtot filtered by the yeartodatenbr column
 * @method     ChildOrdrtot findOneByYeartodateamt(string $yeartodateamt) Return the first ChildOrdrtot filtered by the yeartodateamt column
 * @method     ChildOrdrtot findOneByLast12nbr(int $last12nbr) Return the first ChildOrdrtot filtered by the last12nbr column
 * @method     ChildOrdrtot findOneByLast12amt(string $last12amt) Return the first ChildOrdrtot filtered by the last12amt column
 * @method     ChildOrdrtot findOneByPrevyearnbr(int $prevyearnbr) Return the first ChildOrdrtot filtered by the prevyearnbr column
 * @method     ChildOrdrtot findOneByPrevyearamt(string $prevyearamt) Return the first ChildOrdrtot filtered by the prevyearamt column
 * @method     ChildOrdrtot findOneByDummy(string $dummy) Return the first ChildOrdrtot filtered by the dummy column *

 * @method     ChildOrdrtot requirePk($key, ConnectionInterface $con = null) Return the ChildOrdrtot by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrtot requireOne(ConnectionInterface $con = null) Return the first ChildOrdrtot matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrdrtot requireOneBySessionid(string $sessionid) Return the first ChildOrdrtot filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrtot requireOneByRecno(int $recno) Return the first ChildOrdrtot filtered by the recno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrtot requireOneByDate(int $date) Return the first ChildOrdrtot filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrtot requireOneByTime(int $time) Return the first ChildOrdrtot filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrtot requireOneByType(string $type) Return the first ChildOrdrtot filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrtot requireOneByCustid(string $custid) Return the first ChildOrdrtot filtered by the custid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrtot requireOneByShiptoid(string $shiptoid) Return the first ChildOrdrtot filtered by the shiptoid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrtot requireOneBySaleordnbr(int $saleordnbr) Return the first ChildOrdrtot filtered by the saleordnbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrtot requireOneBySaleordamt(string $saleordamt) Return the first ChildOrdrtot filtered by the saleordamt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrtot requireOneByOpeninvnbr(int $openinvnbr) Return the first ChildOrdrtot filtered by the openinvnbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrtot requireOneByOpeninvamt(string $openinvamt) Return the first ChildOrdrtot filtered by the openinvamt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrtot requireOneByQuotesbr(int $quotesbr) Return the first ChildOrdrtot filtered by the quotesbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrtot requireOneByQuotesmt(string $quotesmt) Return the first ChildOrdrtot filtered by the quotesmt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrtot requireOneByMonthtodatenbr(int $monthtodatenbr) Return the first ChildOrdrtot filtered by the monthtodatenbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrtot requireOneByMonthtodateamt(string $monthtodateamt) Return the first ChildOrdrtot filtered by the monthtodateamt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrtot requireOneByYeartodatenbr(int $yeartodatenbr) Return the first ChildOrdrtot filtered by the yeartodatenbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrtot requireOneByYeartodateamt(string $yeartodateamt) Return the first ChildOrdrtot filtered by the yeartodateamt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrtot requireOneByLast12nbr(int $last12nbr) Return the first ChildOrdrtot filtered by the last12nbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrtot requireOneByLast12amt(string $last12amt) Return the first ChildOrdrtot filtered by the last12amt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrtot requireOneByPrevyearnbr(int $prevyearnbr) Return the first ChildOrdrtot filtered by the prevyearnbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrtot requireOneByPrevyearamt(string $prevyearamt) Return the first ChildOrdrtot filtered by the prevyearamt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrdrtot requireOneByDummy(string $dummy) Return the first ChildOrdrtot filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrdrtot[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOrdrtot objects based on current ModelCriteria
 * @method     ChildOrdrtot[]|ObjectCollection findBySessionid(string $sessionid) Return ChildOrdrtot objects filtered by the sessionid column
 * @method     ChildOrdrtot[]|ObjectCollection findByRecno(int $recno) Return ChildOrdrtot objects filtered by the recno column
 * @method     ChildOrdrtot[]|ObjectCollection findByDate(int $date) Return ChildOrdrtot objects filtered by the date column
 * @method     ChildOrdrtot[]|ObjectCollection findByTime(int $time) Return ChildOrdrtot objects filtered by the time column
 * @method     ChildOrdrtot[]|ObjectCollection findByType(string $type) Return ChildOrdrtot objects filtered by the type column
 * @method     ChildOrdrtot[]|ObjectCollection findByCustid(string $custid) Return ChildOrdrtot objects filtered by the custid column
 * @method     ChildOrdrtot[]|ObjectCollection findByShiptoid(string $shiptoid) Return ChildOrdrtot objects filtered by the shiptoid column
 * @method     ChildOrdrtot[]|ObjectCollection findBySaleordnbr(int $saleordnbr) Return ChildOrdrtot objects filtered by the saleordnbr column
 * @method     ChildOrdrtot[]|ObjectCollection findBySaleordamt(string $saleordamt) Return ChildOrdrtot objects filtered by the saleordamt column
 * @method     ChildOrdrtot[]|ObjectCollection findByOpeninvnbr(int $openinvnbr) Return ChildOrdrtot objects filtered by the openinvnbr column
 * @method     ChildOrdrtot[]|ObjectCollection findByOpeninvamt(string $openinvamt) Return ChildOrdrtot objects filtered by the openinvamt column
 * @method     ChildOrdrtot[]|ObjectCollection findByQuotesbr(int $quotesbr) Return ChildOrdrtot objects filtered by the quotesbr column
 * @method     ChildOrdrtot[]|ObjectCollection findByQuotesmt(string $quotesmt) Return ChildOrdrtot objects filtered by the quotesmt column
 * @method     ChildOrdrtot[]|ObjectCollection findByMonthtodatenbr(int $monthtodatenbr) Return ChildOrdrtot objects filtered by the monthtodatenbr column
 * @method     ChildOrdrtot[]|ObjectCollection findByMonthtodateamt(string $monthtodateamt) Return ChildOrdrtot objects filtered by the monthtodateamt column
 * @method     ChildOrdrtot[]|ObjectCollection findByYeartodatenbr(int $yeartodatenbr) Return ChildOrdrtot objects filtered by the yeartodatenbr column
 * @method     ChildOrdrtot[]|ObjectCollection findByYeartodateamt(string $yeartodateamt) Return ChildOrdrtot objects filtered by the yeartodateamt column
 * @method     ChildOrdrtot[]|ObjectCollection findByLast12nbr(int $last12nbr) Return ChildOrdrtot objects filtered by the last12nbr column
 * @method     ChildOrdrtot[]|ObjectCollection findByLast12amt(string $last12amt) Return ChildOrdrtot objects filtered by the last12amt column
 * @method     ChildOrdrtot[]|ObjectCollection findByPrevyearnbr(int $prevyearnbr) Return ChildOrdrtot objects filtered by the prevyearnbr column
 * @method     ChildOrdrtot[]|ObjectCollection findByPrevyearamt(string $prevyearamt) Return ChildOrdrtot objects filtered by the prevyearamt column
 * @method     ChildOrdrtot[]|ObjectCollection findByDummy(string $dummy) Return ChildOrdrtot objects filtered by the dummy column
 * @method     ChildOrdrtot[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OrdrtotQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OrdrtotQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Ordrtot', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOrdrtotQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOrdrtotQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOrdrtotQuery) {
            return $criteria;
        }
        $query = new ChildOrdrtotQuery();
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
     * @return ChildOrdrtot|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OrdrtotTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OrdrtotTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildOrdrtot A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, recno, date, time, type, custid, shiptoid, saleordnbr, saleordamt, openinvnbr, openinvamt, quotesbr, quotesmt, monthtodatenbr, monthtodateamt, yeartodatenbr, yeartodateamt, last12nbr, last12amt, prevyearnbr, prevyearamt, dummy FROM ordrtot WHERE sessionid = :p0 AND recno = :p1';
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
            /** @var ChildOrdrtot $obj */
            $obj = new ChildOrdrtot();
            $obj->hydrate($row);
            OrdrtotTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildOrdrtot|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOrdrtotQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(OrdrtotTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(OrdrtotTableMap::COL_RECNO, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOrdrtotQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(OrdrtotTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(OrdrtotTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
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
     * @return $this|ChildOrdrtotQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrtotTableMap::COL_SESSIONID, $sessionid, $comparison);
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
     * @return $this|ChildOrdrtotQuery The current query, for fluid interface
     */
    public function filterByRecno($recno = null, $comparison = null)
    {
        if (is_array($recno)) {
            $useMinMax = false;
            if (isset($recno['min'])) {
                $this->addUsingAlias(OrdrtotTableMap::COL_RECNO, $recno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recno['max'])) {
                $this->addUsingAlias(OrdrtotTableMap::COL_RECNO, $recno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrtotTableMap::COL_RECNO, $recno, $comparison);
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
     * @return $this|ChildOrdrtotQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(OrdrtotTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(OrdrtotTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrtotTableMap::COL_DATE, $date, $comparison);
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
     * @return $this|ChildOrdrtotQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(OrdrtotTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(OrdrtotTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrtotTableMap::COL_TIME, $time, $comparison);
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
     * @return $this|ChildOrdrtotQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrtotTableMap::COL_TYPE, $type, $comparison);
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
     * @return $this|ChildOrdrtotQuery The current query, for fluid interface
     */
    public function filterByCustid($custid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrtotTableMap::COL_CUSTID, $custid, $comparison);
    }

    /**
     * Filter the query on the shiptoid column
     *
     * Example usage:
     * <code>
     * $query->filterByShiptoid('fooValue');   // WHERE shiptoid = 'fooValue'
     * $query->filterByShiptoid('%fooValue%', Criteria::LIKE); // WHERE shiptoid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shiptoid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrtotQuery The current query, for fluid interface
     */
    public function filterByShiptoid($shiptoid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shiptoid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrtotTableMap::COL_SHIPTOID, $shiptoid, $comparison);
    }

    /**
     * Filter the query on the saleordnbr column
     *
     * Example usage:
     * <code>
     * $query->filterBySaleordnbr(1234); // WHERE saleordnbr = 1234
     * $query->filterBySaleordnbr(array(12, 34)); // WHERE saleordnbr IN (12, 34)
     * $query->filterBySaleordnbr(array('min' => 12)); // WHERE saleordnbr > 12
     * </code>
     *
     * @param     mixed $saleordnbr The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrtotQuery The current query, for fluid interface
     */
    public function filterBySaleordnbr($saleordnbr = null, $comparison = null)
    {
        if (is_array($saleordnbr)) {
            $useMinMax = false;
            if (isset($saleordnbr['min'])) {
                $this->addUsingAlias(OrdrtotTableMap::COL_SALEORDNBR, $saleordnbr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($saleordnbr['max'])) {
                $this->addUsingAlias(OrdrtotTableMap::COL_SALEORDNBR, $saleordnbr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrtotTableMap::COL_SALEORDNBR, $saleordnbr, $comparison);
    }

    /**
     * Filter the query on the saleordamt column
     *
     * Example usage:
     * <code>
     * $query->filterBySaleordamt(1234); // WHERE saleordamt = 1234
     * $query->filterBySaleordamt(array(12, 34)); // WHERE saleordamt IN (12, 34)
     * $query->filterBySaleordamt(array('min' => 12)); // WHERE saleordamt > 12
     * </code>
     *
     * @param     mixed $saleordamt The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrtotQuery The current query, for fluid interface
     */
    public function filterBySaleordamt($saleordamt = null, $comparison = null)
    {
        if (is_array($saleordamt)) {
            $useMinMax = false;
            if (isset($saleordamt['min'])) {
                $this->addUsingAlias(OrdrtotTableMap::COL_SALEORDAMT, $saleordamt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($saleordamt['max'])) {
                $this->addUsingAlias(OrdrtotTableMap::COL_SALEORDAMT, $saleordamt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrtotTableMap::COL_SALEORDAMT, $saleordamt, $comparison);
    }

    /**
     * Filter the query on the openinvnbr column
     *
     * Example usage:
     * <code>
     * $query->filterByOpeninvnbr(1234); // WHERE openinvnbr = 1234
     * $query->filterByOpeninvnbr(array(12, 34)); // WHERE openinvnbr IN (12, 34)
     * $query->filterByOpeninvnbr(array('min' => 12)); // WHERE openinvnbr > 12
     * </code>
     *
     * @param     mixed $openinvnbr The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrtotQuery The current query, for fluid interface
     */
    public function filterByOpeninvnbr($openinvnbr = null, $comparison = null)
    {
        if (is_array($openinvnbr)) {
            $useMinMax = false;
            if (isset($openinvnbr['min'])) {
                $this->addUsingAlias(OrdrtotTableMap::COL_OPENINVNBR, $openinvnbr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($openinvnbr['max'])) {
                $this->addUsingAlias(OrdrtotTableMap::COL_OPENINVNBR, $openinvnbr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrtotTableMap::COL_OPENINVNBR, $openinvnbr, $comparison);
    }

    /**
     * Filter the query on the openinvamt column
     *
     * Example usage:
     * <code>
     * $query->filterByOpeninvamt(1234); // WHERE openinvamt = 1234
     * $query->filterByOpeninvamt(array(12, 34)); // WHERE openinvamt IN (12, 34)
     * $query->filterByOpeninvamt(array('min' => 12)); // WHERE openinvamt > 12
     * </code>
     *
     * @param     mixed $openinvamt The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrtotQuery The current query, for fluid interface
     */
    public function filterByOpeninvamt($openinvamt = null, $comparison = null)
    {
        if (is_array($openinvamt)) {
            $useMinMax = false;
            if (isset($openinvamt['min'])) {
                $this->addUsingAlias(OrdrtotTableMap::COL_OPENINVAMT, $openinvamt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($openinvamt['max'])) {
                $this->addUsingAlias(OrdrtotTableMap::COL_OPENINVAMT, $openinvamt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrtotTableMap::COL_OPENINVAMT, $openinvamt, $comparison);
    }

    /**
     * Filter the query on the quotesbr column
     *
     * Example usage:
     * <code>
     * $query->filterByQuotesbr(1234); // WHERE quotesbr = 1234
     * $query->filterByQuotesbr(array(12, 34)); // WHERE quotesbr IN (12, 34)
     * $query->filterByQuotesbr(array('min' => 12)); // WHERE quotesbr > 12
     * </code>
     *
     * @param     mixed $quotesbr The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrtotQuery The current query, for fluid interface
     */
    public function filterByQuotesbr($quotesbr = null, $comparison = null)
    {
        if (is_array($quotesbr)) {
            $useMinMax = false;
            if (isset($quotesbr['min'])) {
                $this->addUsingAlias(OrdrtotTableMap::COL_QUOTESBR, $quotesbr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quotesbr['max'])) {
                $this->addUsingAlias(OrdrtotTableMap::COL_QUOTESBR, $quotesbr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrtotTableMap::COL_QUOTESBR, $quotesbr, $comparison);
    }

    /**
     * Filter the query on the quotesmt column
     *
     * Example usage:
     * <code>
     * $query->filterByQuotesmt(1234); // WHERE quotesmt = 1234
     * $query->filterByQuotesmt(array(12, 34)); // WHERE quotesmt IN (12, 34)
     * $query->filterByQuotesmt(array('min' => 12)); // WHERE quotesmt > 12
     * </code>
     *
     * @param     mixed $quotesmt The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrtotQuery The current query, for fluid interface
     */
    public function filterByQuotesmt($quotesmt = null, $comparison = null)
    {
        if (is_array($quotesmt)) {
            $useMinMax = false;
            if (isset($quotesmt['min'])) {
                $this->addUsingAlias(OrdrtotTableMap::COL_QUOTESMT, $quotesmt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quotesmt['max'])) {
                $this->addUsingAlias(OrdrtotTableMap::COL_QUOTESMT, $quotesmt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrtotTableMap::COL_QUOTESMT, $quotesmt, $comparison);
    }

    /**
     * Filter the query on the monthtodatenbr column
     *
     * Example usage:
     * <code>
     * $query->filterByMonthtodatenbr(1234); // WHERE monthtodatenbr = 1234
     * $query->filterByMonthtodatenbr(array(12, 34)); // WHERE monthtodatenbr IN (12, 34)
     * $query->filterByMonthtodatenbr(array('min' => 12)); // WHERE monthtodatenbr > 12
     * </code>
     *
     * @param     mixed $monthtodatenbr The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrtotQuery The current query, for fluid interface
     */
    public function filterByMonthtodatenbr($monthtodatenbr = null, $comparison = null)
    {
        if (is_array($monthtodatenbr)) {
            $useMinMax = false;
            if (isset($monthtodatenbr['min'])) {
                $this->addUsingAlias(OrdrtotTableMap::COL_MONTHTODATENBR, $monthtodatenbr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($monthtodatenbr['max'])) {
                $this->addUsingAlias(OrdrtotTableMap::COL_MONTHTODATENBR, $monthtodatenbr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrtotTableMap::COL_MONTHTODATENBR, $monthtodatenbr, $comparison);
    }

    /**
     * Filter the query on the monthtodateamt column
     *
     * Example usage:
     * <code>
     * $query->filterByMonthtodateamt(1234); // WHERE monthtodateamt = 1234
     * $query->filterByMonthtodateamt(array(12, 34)); // WHERE monthtodateamt IN (12, 34)
     * $query->filterByMonthtodateamt(array('min' => 12)); // WHERE monthtodateamt > 12
     * </code>
     *
     * @param     mixed $monthtodateamt The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrtotQuery The current query, for fluid interface
     */
    public function filterByMonthtodateamt($monthtodateamt = null, $comparison = null)
    {
        if (is_array($monthtodateamt)) {
            $useMinMax = false;
            if (isset($monthtodateamt['min'])) {
                $this->addUsingAlias(OrdrtotTableMap::COL_MONTHTODATEAMT, $monthtodateamt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($monthtodateamt['max'])) {
                $this->addUsingAlias(OrdrtotTableMap::COL_MONTHTODATEAMT, $monthtodateamt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrtotTableMap::COL_MONTHTODATEAMT, $monthtodateamt, $comparison);
    }

    /**
     * Filter the query on the yeartodatenbr column
     *
     * Example usage:
     * <code>
     * $query->filterByYeartodatenbr(1234); // WHERE yeartodatenbr = 1234
     * $query->filterByYeartodatenbr(array(12, 34)); // WHERE yeartodatenbr IN (12, 34)
     * $query->filterByYeartodatenbr(array('min' => 12)); // WHERE yeartodatenbr > 12
     * </code>
     *
     * @param     mixed $yeartodatenbr The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrtotQuery The current query, for fluid interface
     */
    public function filterByYeartodatenbr($yeartodatenbr = null, $comparison = null)
    {
        if (is_array($yeartodatenbr)) {
            $useMinMax = false;
            if (isset($yeartodatenbr['min'])) {
                $this->addUsingAlias(OrdrtotTableMap::COL_YEARTODATENBR, $yeartodatenbr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($yeartodatenbr['max'])) {
                $this->addUsingAlias(OrdrtotTableMap::COL_YEARTODATENBR, $yeartodatenbr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrtotTableMap::COL_YEARTODATENBR, $yeartodatenbr, $comparison);
    }

    /**
     * Filter the query on the yeartodateamt column
     *
     * Example usage:
     * <code>
     * $query->filterByYeartodateamt(1234); // WHERE yeartodateamt = 1234
     * $query->filterByYeartodateamt(array(12, 34)); // WHERE yeartodateamt IN (12, 34)
     * $query->filterByYeartodateamt(array('min' => 12)); // WHERE yeartodateamt > 12
     * </code>
     *
     * @param     mixed $yeartodateamt The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrtotQuery The current query, for fluid interface
     */
    public function filterByYeartodateamt($yeartodateamt = null, $comparison = null)
    {
        if (is_array($yeartodateamt)) {
            $useMinMax = false;
            if (isset($yeartodateamt['min'])) {
                $this->addUsingAlias(OrdrtotTableMap::COL_YEARTODATEAMT, $yeartodateamt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($yeartodateamt['max'])) {
                $this->addUsingAlias(OrdrtotTableMap::COL_YEARTODATEAMT, $yeartodateamt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrtotTableMap::COL_YEARTODATEAMT, $yeartodateamt, $comparison);
    }

    /**
     * Filter the query on the last12nbr column
     *
     * Example usage:
     * <code>
     * $query->filterByLast12nbr(1234); // WHERE last12nbr = 1234
     * $query->filterByLast12nbr(array(12, 34)); // WHERE last12nbr IN (12, 34)
     * $query->filterByLast12nbr(array('min' => 12)); // WHERE last12nbr > 12
     * </code>
     *
     * @param     mixed $last12nbr The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrtotQuery The current query, for fluid interface
     */
    public function filterByLast12nbr($last12nbr = null, $comparison = null)
    {
        if (is_array($last12nbr)) {
            $useMinMax = false;
            if (isset($last12nbr['min'])) {
                $this->addUsingAlias(OrdrtotTableMap::COL_LAST12NBR, $last12nbr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($last12nbr['max'])) {
                $this->addUsingAlias(OrdrtotTableMap::COL_LAST12NBR, $last12nbr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrtotTableMap::COL_LAST12NBR, $last12nbr, $comparison);
    }

    /**
     * Filter the query on the last12amt column
     *
     * Example usage:
     * <code>
     * $query->filterByLast12amt(1234); // WHERE last12amt = 1234
     * $query->filterByLast12amt(array(12, 34)); // WHERE last12amt IN (12, 34)
     * $query->filterByLast12amt(array('min' => 12)); // WHERE last12amt > 12
     * </code>
     *
     * @param     mixed $last12amt The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrtotQuery The current query, for fluid interface
     */
    public function filterByLast12amt($last12amt = null, $comparison = null)
    {
        if (is_array($last12amt)) {
            $useMinMax = false;
            if (isset($last12amt['min'])) {
                $this->addUsingAlias(OrdrtotTableMap::COL_LAST12AMT, $last12amt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($last12amt['max'])) {
                $this->addUsingAlias(OrdrtotTableMap::COL_LAST12AMT, $last12amt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrtotTableMap::COL_LAST12AMT, $last12amt, $comparison);
    }

    /**
     * Filter the query on the prevyearnbr column
     *
     * Example usage:
     * <code>
     * $query->filterByPrevyearnbr(1234); // WHERE prevyearnbr = 1234
     * $query->filterByPrevyearnbr(array(12, 34)); // WHERE prevyearnbr IN (12, 34)
     * $query->filterByPrevyearnbr(array('min' => 12)); // WHERE prevyearnbr > 12
     * </code>
     *
     * @param     mixed $prevyearnbr The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrtotQuery The current query, for fluid interface
     */
    public function filterByPrevyearnbr($prevyearnbr = null, $comparison = null)
    {
        if (is_array($prevyearnbr)) {
            $useMinMax = false;
            if (isset($prevyearnbr['min'])) {
                $this->addUsingAlias(OrdrtotTableMap::COL_PREVYEARNBR, $prevyearnbr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($prevyearnbr['max'])) {
                $this->addUsingAlias(OrdrtotTableMap::COL_PREVYEARNBR, $prevyearnbr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrtotTableMap::COL_PREVYEARNBR, $prevyearnbr, $comparison);
    }

    /**
     * Filter the query on the prevyearamt column
     *
     * Example usage:
     * <code>
     * $query->filterByPrevyearamt(1234); // WHERE prevyearamt = 1234
     * $query->filterByPrevyearamt(array(12, 34)); // WHERE prevyearamt IN (12, 34)
     * $query->filterByPrevyearamt(array('min' => 12)); // WHERE prevyearamt > 12
     * </code>
     *
     * @param     mixed $prevyearamt The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdrtotQuery The current query, for fluid interface
     */
    public function filterByPrevyearamt($prevyearamt = null, $comparison = null)
    {
        if (is_array($prevyearamt)) {
            $useMinMax = false;
            if (isset($prevyearamt['min'])) {
                $this->addUsingAlias(OrdrtotTableMap::COL_PREVYEARAMT, $prevyearamt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($prevyearamt['max'])) {
                $this->addUsingAlias(OrdrtotTableMap::COL_PREVYEARAMT, $prevyearamt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrtotTableMap::COL_PREVYEARAMT, $prevyearamt, $comparison);
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
     * @return $this|ChildOrdrtotQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdrtotTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOrdrtot $ordrtot Object to remove from the list of results
     *
     * @return $this|ChildOrdrtotQuery The current query, for fluid interface
     */
    public function prune($ordrtot = null)
    {
        if ($ordrtot) {
            $this->addCond('pruneCond0', $this->getAliasedColName(OrdrtotTableMap::COL_SESSIONID), $ordrtot->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(OrdrtotTableMap::COL_RECNO), $ordrtot->getRecno(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ordrtot table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OrdrtotTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OrdrtotTableMap::clearInstancePool();
            OrdrtotTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OrdrtotTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OrdrtotTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OrdrtotTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OrdrtotTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OrdrtotQuery
