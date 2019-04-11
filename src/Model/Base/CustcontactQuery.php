<?php

namespace Base;

use \Custcontact as ChildCustcontact;
use \CustcontactQuery as ChildCustcontactQuery;
use \Exception;
use \PDO;
use Map\CustcontactTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'custcontact' table.
 *
 *
 *
 * @method     ChildCustcontactQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildCustcontactQuery orderByRecno($order = Criteria::ASC) Order by the recno column
 * @method     ChildCustcontactQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildCustcontactQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildCustcontactQuery orderByCustid($order = Criteria::ASC) Order by the custid column
 * @method     ChildCustcontactQuery orderByShiptoid($order = Criteria::ASC) Order by the shiptoid column
 * @method     ChildCustcontactQuery orderByContactid($order = Criteria::ASC) Order by the contactid column
 * @method     ChildCustcontactQuery orderByPhtype($order = Criteria::ASC) Order by the phtype column
 * @method     ChildCustcontactQuery orderByPhseq($order = Criteria::ASC) Order by the phseq column
 * @method     ChildCustcontactQuery orderByPhintl($order = Criteria::ASC) Order by the phintl column
 * @method     ChildCustcontactQuery orderByOfficephone($order = Criteria::ASC) Order by the officephone column
 * @method     ChildCustcontactQuery orderByExtension($order = Criteria::ASC) Order by the extension column
 * @method     ChildCustcontactQuery orderByCellphone($order = Criteria::ASC) Order by the cellphone column
 * @method     ChildCustcontactQuery orderByFaxnumber($order = Criteria::ASC) Order by the faxnumber column
 * @method     ChildCustcontactQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildCustcontactQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildCustcontactQuery orderByWebaddress($order = Criteria::ASC) Order by the webaddress column
 * @method     ChildCustcontactQuery orderByLastcontact($order = Criteria::ASC) Order by the lastcontact column
 * @method     ChildCustcontactQuery orderByFollowupdate($order = Criteria::ASC) Order by the followupdate column
 * @method     ChildCustcontactQuery orderByErrormsg($order = Criteria::ASC) Order by the errormsg column
 * @method     ChildCustcontactQuery orderByShptoname($order = Criteria::ASC) Order by the shptoname column
 * @method     ChildCustcontactQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildCustcontactQuery groupBySessionid() Group by the sessionid column
 * @method     ChildCustcontactQuery groupByRecno() Group by the recno column
 * @method     ChildCustcontactQuery groupByDate() Group by the date column
 * @method     ChildCustcontactQuery groupByTime() Group by the time column
 * @method     ChildCustcontactQuery groupByCustid() Group by the custid column
 * @method     ChildCustcontactQuery groupByShiptoid() Group by the shiptoid column
 * @method     ChildCustcontactQuery groupByContactid() Group by the contactid column
 * @method     ChildCustcontactQuery groupByPhtype() Group by the phtype column
 * @method     ChildCustcontactQuery groupByPhseq() Group by the phseq column
 * @method     ChildCustcontactQuery groupByPhintl() Group by the phintl column
 * @method     ChildCustcontactQuery groupByOfficephone() Group by the officephone column
 * @method     ChildCustcontactQuery groupByExtension() Group by the extension column
 * @method     ChildCustcontactQuery groupByCellphone() Group by the cellphone column
 * @method     ChildCustcontactQuery groupByFaxnumber() Group by the faxnumber column
 * @method     ChildCustcontactQuery groupByTitle() Group by the title column
 * @method     ChildCustcontactQuery groupByEmail() Group by the email column
 * @method     ChildCustcontactQuery groupByWebaddress() Group by the webaddress column
 * @method     ChildCustcontactQuery groupByLastcontact() Group by the lastcontact column
 * @method     ChildCustcontactQuery groupByFollowupdate() Group by the followupdate column
 * @method     ChildCustcontactQuery groupByErrormsg() Group by the errormsg column
 * @method     ChildCustcontactQuery groupByShptoname() Group by the shptoname column
 * @method     ChildCustcontactQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildCustcontactQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCustcontactQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCustcontactQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCustcontactQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCustcontactQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCustcontactQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCustcontact findOne(ConnectionInterface $con = null) Return the first ChildCustcontact matching the query
 * @method     ChildCustcontact findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCustcontact matching the query, or a new ChildCustcontact object populated from the query conditions when no match is found
 *
 * @method     ChildCustcontact findOneBySessionid(string $sessionid) Return the first ChildCustcontact filtered by the sessionid column
 * @method     ChildCustcontact findOneByRecno(int $recno) Return the first ChildCustcontact filtered by the recno column
 * @method     ChildCustcontact findOneByDate(int $date) Return the first ChildCustcontact filtered by the date column
 * @method     ChildCustcontact findOneByTime(int $time) Return the first ChildCustcontact filtered by the time column
 * @method     ChildCustcontact findOneByCustid(string $custid) Return the first ChildCustcontact filtered by the custid column
 * @method     ChildCustcontact findOneByShiptoid(string $shiptoid) Return the first ChildCustcontact filtered by the shiptoid column
 * @method     ChildCustcontact findOneByContactid(string $contactid) Return the first ChildCustcontact filtered by the contactid column
 * @method     ChildCustcontact findOneByPhtype(string $phtype) Return the first ChildCustcontact filtered by the phtype column
 * @method     ChildCustcontact findOneByPhseq(string $phseq) Return the first ChildCustcontact filtered by the phseq column
 * @method     ChildCustcontact findOneByPhintl(string $phintl) Return the first ChildCustcontact filtered by the phintl column
 * @method     ChildCustcontact findOneByOfficephone(string $officephone) Return the first ChildCustcontact filtered by the officephone column
 * @method     ChildCustcontact findOneByExtension(string $extension) Return the first ChildCustcontact filtered by the extension column
 * @method     ChildCustcontact findOneByCellphone(string $cellphone) Return the first ChildCustcontact filtered by the cellphone column
 * @method     ChildCustcontact findOneByFaxnumber(string $faxnumber) Return the first ChildCustcontact filtered by the faxnumber column
 * @method     ChildCustcontact findOneByTitle(string $title) Return the first ChildCustcontact filtered by the title column
 * @method     ChildCustcontact findOneByEmail(string $email) Return the first ChildCustcontact filtered by the email column
 * @method     ChildCustcontact findOneByWebaddress(string $webaddress) Return the first ChildCustcontact filtered by the webaddress column
 * @method     ChildCustcontact findOneByLastcontact(string $lastcontact) Return the first ChildCustcontact filtered by the lastcontact column
 * @method     ChildCustcontact findOneByFollowupdate(string $followupdate) Return the first ChildCustcontact filtered by the followupdate column
 * @method     ChildCustcontact findOneByErrormsg(string $errormsg) Return the first ChildCustcontact filtered by the errormsg column
 * @method     ChildCustcontact findOneByShptoname(string $shptoname) Return the first ChildCustcontact filtered by the shptoname column
 * @method     ChildCustcontact findOneByDummy(string $dummy) Return the first ChildCustcontact filtered by the dummy column *

 * @method     ChildCustcontact requirePk($key, ConnectionInterface $con = null) Return the ChildCustcontact by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustcontact requireOne(ConnectionInterface $con = null) Return the first ChildCustcontact matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCustcontact requireOneBySessionid(string $sessionid) Return the first ChildCustcontact filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustcontact requireOneByRecno(int $recno) Return the first ChildCustcontact filtered by the recno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustcontact requireOneByDate(int $date) Return the first ChildCustcontact filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustcontact requireOneByTime(int $time) Return the first ChildCustcontact filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustcontact requireOneByCustid(string $custid) Return the first ChildCustcontact filtered by the custid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustcontact requireOneByShiptoid(string $shiptoid) Return the first ChildCustcontact filtered by the shiptoid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustcontact requireOneByContactid(string $contactid) Return the first ChildCustcontact filtered by the contactid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustcontact requireOneByPhtype(string $phtype) Return the first ChildCustcontact filtered by the phtype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustcontact requireOneByPhseq(string $phseq) Return the first ChildCustcontact filtered by the phseq column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustcontact requireOneByPhintl(string $phintl) Return the first ChildCustcontact filtered by the phintl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustcontact requireOneByOfficephone(string $officephone) Return the first ChildCustcontact filtered by the officephone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustcontact requireOneByExtension(string $extension) Return the first ChildCustcontact filtered by the extension column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustcontact requireOneByCellphone(string $cellphone) Return the first ChildCustcontact filtered by the cellphone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustcontact requireOneByFaxnumber(string $faxnumber) Return the first ChildCustcontact filtered by the faxnumber column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustcontact requireOneByTitle(string $title) Return the first ChildCustcontact filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustcontact requireOneByEmail(string $email) Return the first ChildCustcontact filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustcontact requireOneByWebaddress(string $webaddress) Return the first ChildCustcontact filtered by the webaddress column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustcontact requireOneByLastcontact(string $lastcontact) Return the first ChildCustcontact filtered by the lastcontact column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustcontact requireOneByFollowupdate(string $followupdate) Return the first ChildCustcontact filtered by the followupdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustcontact requireOneByErrormsg(string $errormsg) Return the first ChildCustcontact filtered by the errormsg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustcontact requireOneByShptoname(string $shptoname) Return the first ChildCustcontact filtered by the shptoname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCustcontact requireOneByDummy(string $dummy) Return the first ChildCustcontact filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCustcontact[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCustcontact objects based on current ModelCriteria
 * @method     ChildCustcontact[]|ObjectCollection findBySessionid(string $sessionid) Return ChildCustcontact objects filtered by the sessionid column
 * @method     ChildCustcontact[]|ObjectCollection findByRecno(int $recno) Return ChildCustcontact objects filtered by the recno column
 * @method     ChildCustcontact[]|ObjectCollection findByDate(int $date) Return ChildCustcontact objects filtered by the date column
 * @method     ChildCustcontact[]|ObjectCollection findByTime(int $time) Return ChildCustcontact objects filtered by the time column
 * @method     ChildCustcontact[]|ObjectCollection findByCustid(string $custid) Return ChildCustcontact objects filtered by the custid column
 * @method     ChildCustcontact[]|ObjectCollection findByShiptoid(string $shiptoid) Return ChildCustcontact objects filtered by the shiptoid column
 * @method     ChildCustcontact[]|ObjectCollection findByContactid(string $contactid) Return ChildCustcontact objects filtered by the contactid column
 * @method     ChildCustcontact[]|ObjectCollection findByPhtype(string $phtype) Return ChildCustcontact objects filtered by the phtype column
 * @method     ChildCustcontact[]|ObjectCollection findByPhseq(string $phseq) Return ChildCustcontact objects filtered by the phseq column
 * @method     ChildCustcontact[]|ObjectCollection findByPhintl(string $phintl) Return ChildCustcontact objects filtered by the phintl column
 * @method     ChildCustcontact[]|ObjectCollection findByOfficephone(string $officephone) Return ChildCustcontact objects filtered by the officephone column
 * @method     ChildCustcontact[]|ObjectCollection findByExtension(string $extension) Return ChildCustcontact objects filtered by the extension column
 * @method     ChildCustcontact[]|ObjectCollection findByCellphone(string $cellphone) Return ChildCustcontact objects filtered by the cellphone column
 * @method     ChildCustcontact[]|ObjectCollection findByFaxnumber(string $faxnumber) Return ChildCustcontact objects filtered by the faxnumber column
 * @method     ChildCustcontact[]|ObjectCollection findByTitle(string $title) Return ChildCustcontact objects filtered by the title column
 * @method     ChildCustcontact[]|ObjectCollection findByEmail(string $email) Return ChildCustcontact objects filtered by the email column
 * @method     ChildCustcontact[]|ObjectCollection findByWebaddress(string $webaddress) Return ChildCustcontact objects filtered by the webaddress column
 * @method     ChildCustcontact[]|ObjectCollection findByLastcontact(string $lastcontact) Return ChildCustcontact objects filtered by the lastcontact column
 * @method     ChildCustcontact[]|ObjectCollection findByFollowupdate(string $followupdate) Return ChildCustcontact objects filtered by the followupdate column
 * @method     ChildCustcontact[]|ObjectCollection findByErrormsg(string $errormsg) Return ChildCustcontact objects filtered by the errormsg column
 * @method     ChildCustcontact[]|ObjectCollection findByShptoname(string $shptoname) Return ChildCustcontact objects filtered by the shptoname column
 * @method     ChildCustcontact[]|ObjectCollection findByDummy(string $dummy) Return ChildCustcontact objects filtered by the dummy column
 * @method     ChildCustcontact[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CustcontactQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CustcontactQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Custcontact', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCustcontactQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCustcontactQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCustcontactQuery) {
            return $criteria;
        }
        $query = new ChildCustcontactQuery();
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
     * @return ChildCustcontact|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CustcontactTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CustcontactTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildCustcontact A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, recno, date, time, custid, shiptoid, contactid, phtype, phseq, phintl, officephone, extension, cellphone, faxnumber, title, email, webaddress, lastcontact, followupdate, errormsg, shptoname, dummy FROM custcontact WHERE sessionid = :p0 AND recno = :p1';
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
            /** @var ChildCustcontact $obj */
            $obj = new ChildCustcontact();
            $obj->hydrate($row);
            CustcontactTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildCustcontact|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCustcontactQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(CustcontactTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(CustcontactTableMap::COL_RECNO, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCustcontactQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(CustcontactTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(CustcontactTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
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
     * @return $this|ChildCustcontactQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustcontactTableMap::COL_SESSIONID, $sessionid, $comparison);
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
     * @return $this|ChildCustcontactQuery The current query, for fluid interface
     */
    public function filterByRecno($recno = null, $comparison = null)
    {
        if (is_array($recno)) {
            $useMinMax = false;
            if (isset($recno['min'])) {
                $this->addUsingAlias(CustcontactTableMap::COL_RECNO, $recno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recno['max'])) {
                $this->addUsingAlias(CustcontactTableMap::COL_RECNO, $recno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustcontactTableMap::COL_RECNO, $recno, $comparison);
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
     * @return $this|ChildCustcontactQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(CustcontactTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(CustcontactTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustcontactTableMap::COL_DATE, $date, $comparison);
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
     * @return $this|ChildCustcontactQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(CustcontactTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(CustcontactTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustcontactTableMap::COL_TIME, $time, $comparison);
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
     * @return $this|ChildCustcontactQuery The current query, for fluid interface
     */
    public function filterByCustid($custid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustcontactTableMap::COL_CUSTID, $custid, $comparison);
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
     * @return $this|ChildCustcontactQuery The current query, for fluid interface
     */
    public function filterByShiptoid($shiptoid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shiptoid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustcontactTableMap::COL_SHIPTOID, $shiptoid, $comparison);
    }

    /**
     * Filter the query on the contactid column
     *
     * Example usage:
     * <code>
     * $query->filterByContactid('fooValue');   // WHERE contactid = 'fooValue'
     * $query->filterByContactid('%fooValue%', Criteria::LIKE); // WHERE contactid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustcontactQuery The current query, for fluid interface
     */
    public function filterByContactid($contactid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustcontactTableMap::COL_CONTACTID, $contactid, $comparison);
    }

    /**
     * Filter the query on the phtype column
     *
     * Example usage:
     * <code>
     * $query->filterByPhtype('fooValue');   // WHERE phtype = 'fooValue'
     * $query->filterByPhtype('%fooValue%', Criteria::LIKE); // WHERE phtype LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phtype The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustcontactQuery The current query, for fluid interface
     */
    public function filterByPhtype($phtype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phtype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustcontactTableMap::COL_PHTYPE, $phtype, $comparison);
    }

    /**
     * Filter the query on the phseq column
     *
     * Example usage:
     * <code>
     * $query->filterByPhseq('fooValue');   // WHERE phseq = 'fooValue'
     * $query->filterByPhseq('%fooValue%', Criteria::LIKE); // WHERE phseq LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phseq The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustcontactQuery The current query, for fluid interface
     */
    public function filterByPhseq($phseq = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phseq)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustcontactTableMap::COL_PHSEQ, $phseq, $comparison);
    }

    /**
     * Filter the query on the phintl column
     *
     * Example usage:
     * <code>
     * $query->filterByPhintl('fooValue');   // WHERE phintl = 'fooValue'
     * $query->filterByPhintl('%fooValue%', Criteria::LIKE); // WHERE phintl LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phintl The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustcontactQuery The current query, for fluid interface
     */
    public function filterByPhintl($phintl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phintl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustcontactTableMap::COL_PHINTL, $phintl, $comparison);
    }

    /**
     * Filter the query on the officephone column
     *
     * Example usage:
     * <code>
     * $query->filterByOfficephone('fooValue');   // WHERE officephone = 'fooValue'
     * $query->filterByOfficephone('%fooValue%', Criteria::LIKE); // WHERE officephone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $officephone The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustcontactQuery The current query, for fluid interface
     */
    public function filterByOfficephone($officephone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($officephone)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustcontactTableMap::COL_OFFICEPHONE, $officephone, $comparison);
    }

    /**
     * Filter the query on the extension column
     *
     * Example usage:
     * <code>
     * $query->filterByExtension('fooValue');   // WHERE extension = 'fooValue'
     * $query->filterByExtension('%fooValue%', Criteria::LIKE); // WHERE extension LIKE '%fooValue%'
     * </code>
     *
     * @param     string $extension The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustcontactQuery The current query, for fluid interface
     */
    public function filterByExtension($extension = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($extension)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustcontactTableMap::COL_EXTENSION, $extension, $comparison);
    }

    /**
     * Filter the query on the cellphone column
     *
     * Example usage:
     * <code>
     * $query->filterByCellphone('fooValue');   // WHERE cellphone = 'fooValue'
     * $query->filterByCellphone('%fooValue%', Criteria::LIKE); // WHERE cellphone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cellphone The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustcontactQuery The current query, for fluid interface
     */
    public function filterByCellphone($cellphone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cellphone)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustcontactTableMap::COL_CELLPHONE, $cellphone, $comparison);
    }

    /**
     * Filter the query on the faxnumber column
     *
     * Example usage:
     * <code>
     * $query->filterByFaxnumber('fooValue');   // WHERE faxnumber = 'fooValue'
     * $query->filterByFaxnumber('%fooValue%', Criteria::LIKE); // WHERE faxnumber LIKE '%fooValue%'
     * </code>
     *
     * @param     string $faxnumber The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustcontactQuery The current query, for fluid interface
     */
    public function filterByFaxnumber($faxnumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($faxnumber)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustcontactTableMap::COL_FAXNUMBER, $faxnumber, $comparison);
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
     * @return $this|ChildCustcontactQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustcontactTableMap::COL_TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustcontactQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustcontactTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the webaddress column
     *
     * Example usage:
     * <code>
     * $query->filterByWebaddress('fooValue');   // WHERE webaddress = 'fooValue'
     * $query->filterByWebaddress('%fooValue%', Criteria::LIKE); // WHERE webaddress LIKE '%fooValue%'
     * </code>
     *
     * @param     string $webaddress The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustcontactQuery The current query, for fluid interface
     */
    public function filterByWebaddress($webaddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($webaddress)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustcontactTableMap::COL_WEBADDRESS, $webaddress, $comparison);
    }

    /**
     * Filter the query on the lastcontact column
     *
     * Example usage:
     * <code>
     * $query->filterByLastcontact('fooValue');   // WHERE lastcontact = 'fooValue'
     * $query->filterByLastcontact('%fooValue%', Criteria::LIKE); // WHERE lastcontact LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lastcontact The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustcontactQuery The current query, for fluid interface
     */
    public function filterByLastcontact($lastcontact = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastcontact)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustcontactTableMap::COL_LASTCONTACT, $lastcontact, $comparison);
    }

    /**
     * Filter the query on the followupdate column
     *
     * Example usage:
     * <code>
     * $query->filterByFollowupdate('fooValue');   // WHERE followupdate = 'fooValue'
     * $query->filterByFollowupdate('%fooValue%', Criteria::LIKE); // WHERE followupdate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $followupdate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustcontactQuery The current query, for fluid interface
     */
    public function filterByFollowupdate($followupdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($followupdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustcontactTableMap::COL_FOLLOWUPDATE, $followupdate, $comparison);
    }

    /**
     * Filter the query on the errormsg column
     *
     * Example usage:
     * <code>
     * $query->filterByErrormsg('fooValue');   // WHERE errormsg = 'fooValue'
     * $query->filterByErrormsg('%fooValue%', Criteria::LIKE); // WHERE errormsg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $errormsg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustcontactQuery The current query, for fluid interface
     */
    public function filterByErrormsg($errormsg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($errormsg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustcontactTableMap::COL_ERRORMSG, $errormsg, $comparison);
    }

    /**
     * Filter the query on the shptoname column
     *
     * Example usage:
     * <code>
     * $query->filterByShptoname('fooValue');   // WHERE shptoname = 'fooValue'
     * $query->filterByShptoname('%fooValue%', Criteria::LIKE); // WHERE shptoname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shptoname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCustcontactQuery The current query, for fluid interface
     */
    public function filterByShptoname($shptoname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shptoname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustcontactTableMap::COL_SHPTONAME, $shptoname, $comparison);
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
     * @return $this|ChildCustcontactQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CustcontactTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCustcontact $custcontact Object to remove from the list of results
     *
     * @return $this|ChildCustcontactQuery The current query, for fluid interface
     */
    public function prune($custcontact = null)
    {
        if ($custcontact) {
            $this->addCond('pruneCond0', $this->getAliasedColName(CustcontactTableMap::COL_SESSIONID), $custcontact->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(CustcontactTableMap::COL_RECNO), $custcontact->getRecno(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the custcontact table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CustcontactTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CustcontactTableMap::clearInstancePool();
            CustcontactTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CustcontactTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CustcontactTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CustcontactTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CustcontactTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CustcontactQuery
