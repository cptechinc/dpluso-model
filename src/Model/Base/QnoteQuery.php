<?php

namespace Base;

use \Qnote as ChildQnote;
use \QnoteQuery as ChildQnoteQuery;
use \Exception;
use \PDO;
use Map\QnoteTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'qnote' table.
 *
 *
 *
 * @method     ChildQnoteQuery orderBySessionid($order = Criteria::ASC) Order by the sessionid column
 * @method     ChildQnoteQuery orderByRecno($order = Criteria::ASC) Order by the recno column
 * @method     ChildQnoteQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildQnoteQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildQnoteQuery orderByRectype($order = Criteria::ASC) Order by the rectype column
 * @method     ChildQnoteQuery orderByKey1($order = Criteria::ASC) Order by the key1 column
 * @method     ChildQnoteQuery orderByKey2($order = Criteria::ASC) Order by the key2 column
 * @method     ChildQnoteQuery orderByKey3($order = Criteria::ASC) Order by the key3 column
 * @method     ChildQnoteQuery orderByKey4($order = Criteria::ASC) Order by the key4 column
 * @method     ChildQnoteQuery orderByKey5($order = Criteria::ASC) Order by the key5 column
 * @method     ChildQnoteQuery orderByForm1($order = Criteria::ASC) Order by the form1 column
 * @method     ChildQnoteQuery orderByForm2($order = Criteria::ASC) Order by the form2 column
 * @method     ChildQnoteQuery orderByForm3($order = Criteria::ASC) Order by the form3 column
 * @method     ChildQnoteQuery orderByForm4($order = Criteria::ASC) Order by the form4 column
 * @method     ChildQnoteQuery orderByForm5($order = Criteria::ASC) Order by the form5 column
 * @method     ChildQnoteQuery orderByForm6($order = Criteria::ASC) Order by the form6 column
 * @method     ChildQnoteQuery orderByForm7($order = Criteria::ASC) Order by the form7 column
 * @method     ChildQnoteQuery orderByForm8($order = Criteria::ASC) Order by the form8 column
 * @method     ChildQnoteQuery orderByColwidth($order = Criteria::ASC) Order by the colwidth column
 * @method     ChildQnoteQuery orderByNotefld($order = Criteria::ASC) Order by the notefld column
 * @method     ChildQnoteQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildQnoteQuery groupBySessionid() Group by the sessionid column
 * @method     ChildQnoteQuery groupByRecno() Group by the recno column
 * @method     ChildQnoteQuery groupByDate() Group by the date column
 * @method     ChildQnoteQuery groupByTime() Group by the time column
 * @method     ChildQnoteQuery groupByRectype() Group by the rectype column
 * @method     ChildQnoteQuery groupByKey1() Group by the key1 column
 * @method     ChildQnoteQuery groupByKey2() Group by the key2 column
 * @method     ChildQnoteQuery groupByKey3() Group by the key3 column
 * @method     ChildQnoteQuery groupByKey4() Group by the key4 column
 * @method     ChildQnoteQuery groupByKey5() Group by the key5 column
 * @method     ChildQnoteQuery groupByForm1() Group by the form1 column
 * @method     ChildQnoteQuery groupByForm2() Group by the form2 column
 * @method     ChildQnoteQuery groupByForm3() Group by the form3 column
 * @method     ChildQnoteQuery groupByForm4() Group by the form4 column
 * @method     ChildQnoteQuery groupByForm5() Group by the form5 column
 * @method     ChildQnoteQuery groupByForm6() Group by the form6 column
 * @method     ChildQnoteQuery groupByForm7() Group by the form7 column
 * @method     ChildQnoteQuery groupByForm8() Group by the form8 column
 * @method     ChildQnoteQuery groupByColwidth() Group by the colwidth column
 * @method     ChildQnoteQuery groupByNotefld() Group by the notefld column
 * @method     ChildQnoteQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildQnoteQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildQnoteQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildQnoteQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildQnoteQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildQnoteQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildQnoteQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildQnote findOne(ConnectionInterface $con = null) Return the first ChildQnote matching the query
 * @method     ChildQnote findOneOrCreate(ConnectionInterface $con = null) Return the first ChildQnote matching the query, or a new ChildQnote object populated from the query conditions when no match is found
 *
 * @method     ChildQnote findOneBySessionid(string $sessionid) Return the first ChildQnote filtered by the sessionid column
 * @method     ChildQnote findOneByRecno(int $recno) Return the first ChildQnote filtered by the recno column
 * @method     ChildQnote findOneByDate(int $date) Return the first ChildQnote filtered by the date column
 * @method     ChildQnote findOneByTime(int $time) Return the first ChildQnote filtered by the time column
 * @method     ChildQnote findOneByRectype(string $rectype) Return the first ChildQnote filtered by the rectype column
 * @method     ChildQnote findOneByKey1(string $key1) Return the first ChildQnote filtered by the key1 column
 * @method     ChildQnote findOneByKey2(string $key2) Return the first ChildQnote filtered by the key2 column
 * @method     ChildQnote findOneByKey3(string $key3) Return the first ChildQnote filtered by the key3 column
 * @method     ChildQnote findOneByKey4(string $key4) Return the first ChildQnote filtered by the key4 column
 * @method     ChildQnote findOneByKey5(string $key5) Return the first ChildQnote filtered by the key5 column
 * @method     ChildQnote findOneByForm1(string $form1) Return the first ChildQnote filtered by the form1 column
 * @method     ChildQnote findOneByForm2(string $form2) Return the first ChildQnote filtered by the form2 column
 * @method     ChildQnote findOneByForm3(string $form3) Return the first ChildQnote filtered by the form3 column
 * @method     ChildQnote findOneByForm4(string $form4) Return the first ChildQnote filtered by the form4 column
 * @method     ChildQnote findOneByForm5(string $form5) Return the first ChildQnote filtered by the form5 column
 * @method     ChildQnote findOneByForm6(string $form6) Return the first ChildQnote filtered by the form6 column
 * @method     ChildQnote findOneByForm7(string $form7) Return the first ChildQnote filtered by the form7 column
 * @method     ChildQnote findOneByForm8(string $form8) Return the first ChildQnote filtered by the form8 column
 * @method     ChildQnote findOneByColwidth(int $colwidth) Return the first ChildQnote filtered by the colwidth column
 * @method     ChildQnote findOneByNotefld(string $notefld) Return the first ChildQnote filtered by the notefld column
 * @method     ChildQnote findOneByDummy(string $dummy) Return the first ChildQnote filtered by the dummy column *

 * @method     ChildQnote requirePk($key, ConnectionInterface $con = null) Return the ChildQnote by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQnote requireOne(ConnectionInterface $con = null) Return the first ChildQnote matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildQnote requireOneBySessionid(string $sessionid) Return the first ChildQnote filtered by the sessionid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQnote requireOneByRecno(int $recno) Return the first ChildQnote filtered by the recno column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQnote requireOneByDate(int $date) Return the first ChildQnote filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQnote requireOneByTime(int $time) Return the first ChildQnote filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQnote requireOneByRectype(string $rectype) Return the first ChildQnote filtered by the rectype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQnote requireOneByKey1(string $key1) Return the first ChildQnote filtered by the key1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQnote requireOneByKey2(string $key2) Return the first ChildQnote filtered by the key2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQnote requireOneByKey3(string $key3) Return the first ChildQnote filtered by the key3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQnote requireOneByKey4(string $key4) Return the first ChildQnote filtered by the key4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQnote requireOneByKey5(string $key5) Return the first ChildQnote filtered by the key5 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQnote requireOneByForm1(string $form1) Return the first ChildQnote filtered by the form1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQnote requireOneByForm2(string $form2) Return the first ChildQnote filtered by the form2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQnote requireOneByForm3(string $form3) Return the first ChildQnote filtered by the form3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQnote requireOneByForm4(string $form4) Return the first ChildQnote filtered by the form4 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQnote requireOneByForm5(string $form5) Return the first ChildQnote filtered by the form5 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQnote requireOneByForm6(string $form6) Return the first ChildQnote filtered by the form6 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQnote requireOneByForm7(string $form7) Return the first ChildQnote filtered by the form7 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQnote requireOneByForm8(string $form8) Return the first ChildQnote filtered by the form8 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQnote requireOneByColwidth(int $colwidth) Return the first ChildQnote filtered by the colwidth column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQnote requireOneByNotefld(string $notefld) Return the first ChildQnote filtered by the notefld column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQnote requireOneByDummy(string $dummy) Return the first ChildQnote filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildQnote[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildQnote objects based on current ModelCriteria
 * @method     ChildQnote[]|ObjectCollection findBySessionid(string $sessionid) Return ChildQnote objects filtered by the sessionid column
 * @method     ChildQnote[]|ObjectCollection findByRecno(int $recno) Return ChildQnote objects filtered by the recno column
 * @method     ChildQnote[]|ObjectCollection findByDate(int $date) Return ChildQnote objects filtered by the date column
 * @method     ChildQnote[]|ObjectCollection findByTime(int $time) Return ChildQnote objects filtered by the time column
 * @method     ChildQnote[]|ObjectCollection findByRectype(string $rectype) Return ChildQnote objects filtered by the rectype column
 * @method     ChildQnote[]|ObjectCollection findByKey1(string $key1) Return ChildQnote objects filtered by the key1 column
 * @method     ChildQnote[]|ObjectCollection findByKey2(string $key2) Return ChildQnote objects filtered by the key2 column
 * @method     ChildQnote[]|ObjectCollection findByKey3(string $key3) Return ChildQnote objects filtered by the key3 column
 * @method     ChildQnote[]|ObjectCollection findByKey4(string $key4) Return ChildQnote objects filtered by the key4 column
 * @method     ChildQnote[]|ObjectCollection findByKey5(string $key5) Return ChildQnote objects filtered by the key5 column
 * @method     ChildQnote[]|ObjectCollection findByForm1(string $form1) Return ChildQnote objects filtered by the form1 column
 * @method     ChildQnote[]|ObjectCollection findByForm2(string $form2) Return ChildQnote objects filtered by the form2 column
 * @method     ChildQnote[]|ObjectCollection findByForm3(string $form3) Return ChildQnote objects filtered by the form3 column
 * @method     ChildQnote[]|ObjectCollection findByForm4(string $form4) Return ChildQnote objects filtered by the form4 column
 * @method     ChildQnote[]|ObjectCollection findByForm5(string $form5) Return ChildQnote objects filtered by the form5 column
 * @method     ChildQnote[]|ObjectCollection findByForm6(string $form6) Return ChildQnote objects filtered by the form6 column
 * @method     ChildQnote[]|ObjectCollection findByForm7(string $form7) Return ChildQnote objects filtered by the form7 column
 * @method     ChildQnote[]|ObjectCollection findByForm8(string $form8) Return ChildQnote objects filtered by the form8 column
 * @method     ChildQnote[]|ObjectCollection findByColwidth(int $colwidth) Return ChildQnote objects filtered by the colwidth column
 * @method     ChildQnote[]|ObjectCollection findByNotefld(string $notefld) Return ChildQnote objects filtered by the notefld column
 * @method     ChildQnote[]|ObjectCollection findByDummy(string $dummy) Return ChildQnote objects filtered by the dummy column
 * @method     ChildQnote[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class QnoteQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\QnoteQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Qnote', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildQnoteQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildQnoteQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildQnoteQuery) {
            return $criteria;
        }
        $query = new ChildQnoteQuery();
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
     * $obj = $c->findPk(array(12, 34, 56, 78, 91), $con);
     * </code>
     *
     * @param array[$sessionid, $recno, $rectype, $key1, $key2, $form1, $form2, $form3, $form4, $form5] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildQnote|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(QnoteTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = QnoteTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2]), (null === $key[3] || is_scalar($key[3]) || is_callable([$key[3], '__toString']) ? (string) $key[3] : $key[3]), (null === $key[4] || is_scalar($key[4]) || is_callable([$key[4], '__toString']) ? (string) $key[4] : $key[4]), (null === $key[5] || is_scalar($key[5]) || is_callable([$key[5], '__toString']) ? (string) $key[5] : $key[5]), (null === $key[6] || is_scalar($key[6]) || is_callable([$key[6], '__toString']) ? (string) $key[6] : $key[6]), (null === $key[7] || is_scalar($key[7]) || is_callable([$key[7], '__toString']) ? (string) $key[7] : $key[7]), (null === $key[8] || is_scalar($key[8]) || is_callable([$key[8], '__toString']) ? (string) $key[8] : $key[8]), (null === $key[9] || is_scalar($key[9]) || is_callable([$key[9], '__toString']) ? (string) $key[9] : $key[9])]))))) {
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
     * @return ChildQnote A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sessionid, recno, date, time, rectype, key1, key2, key3, key4, key5, form1, form2, form3, form4, form5, form6, form7, form8, colwidth, notefld, dummy FROM qnote WHERE sessionid = :p0 AND recno = :p1 AND rectype = :p2 AND key1 = :p3 AND key2 = :p4 AND form1 = :p5 AND form2 = :p6 AND form3 = :p7 AND form4 = :p8 AND form5 = :p9';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->bindValue(':p2', $key[2], PDO::PARAM_STR);
            $stmt->bindValue(':p3', $key[3], PDO::PARAM_STR);
            $stmt->bindValue(':p4', $key[4], PDO::PARAM_STR);
            $stmt->bindValue(':p5', $key[5], PDO::PARAM_STR);
            $stmt->bindValue(':p6', $key[6], PDO::PARAM_STR);
            $stmt->bindValue(':p7', $key[7], PDO::PARAM_STR);
            $stmt->bindValue(':p8', $key[8], PDO::PARAM_STR);
            $stmt->bindValue(':p9', $key[9], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildQnote $obj */
            $obj = new ChildQnote();
            $obj->hydrate($row);
            QnoteTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1]), (null === $key[2] || is_scalar($key[2]) || is_callable([$key[2], '__toString']) ? (string) $key[2] : $key[2]), (null === $key[3] || is_scalar($key[3]) || is_callable([$key[3], '__toString']) ? (string) $key[3] : $key[3]), (null === $key[4] || is_scalar($key[4]) || is_callable([$key[4], '__toString']) ? (string) $key[4] : $key[4]), (null === $key[5] || is_scalar($key[5]) || is_callable([$key[5], '__toString']) ? (string) $key[5] : $key[5]), (null === $key[6] || is_scalar($key[6]) || is_callable([$key[6], '__toString']) ? (string) $key[6] : $key[6]), (null === $key[7] || is_scalar($key[7]) || is_callable([$key[7], '__toString']) ? (string) $key[7] : $key[7]), (null === $key[8] || is_scalar($key[8]) || is_callable([$key[8], '__toString']) ? (string) $key[8] : $key[8]), (null === $key[9] || is_scalar($key[9]) || is_callable([$key[9], '__toString']) ? (string) $key[9] : $key[9])]));
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
     * @return ChildQnote|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildQnoteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(QnoteTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(QnoteTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(QnoteTableMap::COL_RECTYPE, $key[2], Criteria::EQUAL);
        $this->addUsingAlias(QnoteTableMap::COL_KEY1, $key[3], Criteria::EQUAL);
        $this->addUsingAlias(QnoteTableMap::COL_KEY2, $key[4], Criteria::EQUAL);
        $this->addUsingAlias(QnoteTableMap::COL_FORM1, $key[5], Criteria::EQUAL);
        $this->addUsingAlias(QnoteTableMap::COL_FORM2, $key[6], Criteria::EQUAL);
        $this->addUsingAlias(QnoteTableMap::COL_FORM3, $key[7], Criteria::EQUAL);
        $this->addUsingAlias(QnoteTableMap::COL_FORM4, $key[8], Criteria::EQUAL);
        $this->addUsingAlias(QnoteTableMap::COL_FORM5, $key[9], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildQnoteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(QnoteTableMap::COL_SESSIONID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(QnoteTableMap::COL_RECNO, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(QnoteTableMap::COL_RECTYPE, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
            $cton3 = $this->getNewCriterion(QnoteTableMap::COL_KEY1, $key[3], Criteria::EQUAL);
            $cton0->addAnd($cton3);
            $cton4 = $this->getNewCriterion(QnoteTableMap::COL_KEY2, $key[4], Criteria::EQUAL);
            $cton0->addAnd($cton4);
            $cton5 = $this->getNewCriterion(QnoteTableMap::COL_FORM1, $key[5], Criteria::EQUAL);
            $cton0->addAnd($cton5);
            $cton6 = $this->getNewCriterion(QnoteTableMap::COL_FORM2, $key[6], Criteria::EQUAL);
            $cton0->addAnd($cton6);
            $cton7 = $this->getNewCriterion(QnoteTableMap::COL_FORM3, $key[7], Criteria::EQUAL);
            $cton0->addAnd($cton7);
            $cton8 = $this->getNewCriterion(QnoteTableMap::COL_FORM4, $key[8], Criteria::EQUAL);
            $cton0->addAnd($cton8);
            $cton9 = $this->getNewCriterion(QnoteTableMap::COL_FORM5, $key[9], Criteria::EQUAL);
            $cton0->addAnd($cton9);
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
     * @return $this|ChildQnoteQuery The current query, for fluid interface
     */
    public function filterBySessionid($sessionid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QnoteTableMap::COL_SESSIONID, $sessionid, $comparison);
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
     * @return $this|ChildQnoteQuery The current query, for fluid interface
     */
    public function filterByRecno($recno = null, $comparison = null)
    {
        if (is_array($recno)) {
            $useMinMax = false;
            if (isset($recno['min'])) {
                $this->addUsingAlias(QnoteTableMap::COL_RECNO, $recno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recno['max'])) {
                $this->addUsingAlias(QnoteTableMap::COL_RECNO, $recno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QnoteTableMap::COL_RECNO, $recno, $comparison);
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
     * @return $this|ChildQnoteQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(QnoteTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(QnoteTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QnoteTableMap::COL_DATE, $date, $comparison);
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
     * @return $this|ChildQnoteQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(QnoteTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(QnoteTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QnoteTableMap::COL_TIME, $time, $comparison);
    }

    /**
     * Filter the query on the rectype column
     *
     * Example usage:
     * <code>
     * $query->filterByRectype('fooValue');   // WHERE rectype = 'fooValue'
     * $query->filterByRectype('%fooValue%', Criteria::LIKE); // WHERE rectype LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rectype The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQnoteQuery The current query, for fluid interface
     */
    public function filterByRectype($rectype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rectype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QnoteTableMap::COL_RECTYPE, $rectype, $comparison);
    }

    /**
     * Filter the query on the key1 column
     *
     * Example usage:
     * <code>
     * $query->filterByKey1('fooValue');   // WHERE key1 = 'fooValue'
     * $query->filterByKey1('%fooValue%', Criteria::LIKE); // WHERE key1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $key1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQnoteQuery The current query, for fluid interface
     */
    public function filterByKey1($key1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($key1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QnoteTableMap::COL_KEY1, $key1, $comparison);
    }

    /**
     * Filter the query on the key2 column
     *
     * Example usage:
     * <code>
     * $query->filterByKey2('fooValue');   // WHERE key2 = 'fooValue'
     * $query->filterByKey2('%fooValue%', Criteria::LIKE); // WHERE key2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $key2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQnoteQuery The current query, for fluid interface
     */
    public function filterByKey2($key2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($key2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QnoteTableMap::COL_KEY2, $key2, $comparison);
    }

    /**
     * Filter the query on the key3 column
     *
     * Example usage:
     * <code>
     * $query->filterByKey3('fooValue');   // WHERE key3 = 'fooValue'
     * $query->filterByKey3('%fooValue%', Criteria::LIKE); // WHERE key3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $key3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQnoteQuery The current query, for fluid interface
     */
    public function filterByKey3($key3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($key3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QnoteTableMap::COL_KEY3, $key3, $comparison);
    }

    /**
     * Filter the query on the key4 column
     *
     * Example usage:
     * <code>
     * $query->filterByKey4('fooValue');   // WHERE key4 = 'fooValue'
     * $query->filterByKey4('%fooValue%', Criteria::LIKE); // WHERE key4 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $key4 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQnoteQuery The current query, for fluid interface
     */
    public function filterByKey4($key4 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($key4)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QnoteTableMap::COL_KEY4, $key4, $comparison);
    }

    /**
     * Filter the query on the key5 column
     *
     * Example usage:
     * <code>
     * $query->filterByKey5('fooValue');   // WHERE key5 = 'fooValue'
     * $query->filterByKey5('%fooValue%', Criteria::LIKE); // WHERE key5 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $key5 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQnoteQuery The current query, for fluid interface
     */
    public function filterByKey5($key5 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($key5)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QnoteTableMap::COL_KEY5, $key5, $comparison);
    }

    /**
     * Filter the query on the form1 column
     *
     * Example usage:
     * <code>
     * $query->filterByForm1('fooValue');   // WHERE form1 = 'fooValue'
     * $query->filterByForm1('%fooValue%', Criteria::LIKE); // WHERE form1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $form1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQnoteQuery The current query, for fluid interface
     */
    public function filterByForm1($form1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($form1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QnoteTableMap::COL_FORM1, $form1, $comparison);
    }

    /**
     * Filter the query on the form2 column
     *
     * Example usage:
     * <code>
     * $query->filterByForm2('fooValue');   // WHERE form2 = 'fooValue'
     * $query->filterByForm2('%fooValue%', Criteria::LIKE); // WHERE form2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $form2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQnoteQuery The current query, for fluid interface
     */
    public function filterByForm2($form2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($form2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QnoteTableMap::COL_FORM2, $form2, $comparison);
    }

    /**
     * Filter the query on the form3 column
     *
     * Example usage:
     * <code>
     * $query->filterByForm3('fooValue');   // WHERE form3 = 'fooValue'
     * $query->filterByForm3('%fooValue%', Criteria::LIKE); // WHERE form3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $form3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQnoteQuery The current query, for fluid interface
     */
    public function filterByForm3($form3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($form3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QnoteTableMap::COL_FORM3, $form3, $comparison);
    }

    /**
     * Filter the query on the form4 column
     *
     * Example usage:
     * <code>
     * $query->filterByForm4('fooValue');   // WHERE form4 = 'fooValue'
     * $query->filterByForm4('%fooValue%', Criteria::LIKE); // WHERE form4 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $form4 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQnoteQuery The current query, for fluid interface
     */
    public function filterByForm4($form4 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($form4)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QnoteTableMap::COL_FORM4, $form4, $comparison);
    }

    /**
     * Filter the query on the form5 column
     *
     * Example usage:
     * <code>
     * $query->filterByForm5('fooValue');   // WHERE form5 = 'fooValue'
     * $query->filterByForm5('%fooValue%', Criteria::LIKE); // WHERE form5 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $form5 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQnoteQuery The current query, for fluid interface
     */
    public function filterByForm5($form5 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($form5)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QnoteTableMap::COL_FORM5, $form5, $comparison);
    }

    /**
     * Filter the query on the form6 column
     *
     * Example usage:
     * <code>
     * $query->filterByForm6('fooValue');   // WHERE form6 = 'fooValue'
     * $query->filterByForm6('%fooValue%', Criteria::LIKE); // WHERE form6 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $form6 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQnoteQuery The current query, for fluid interface
     */
    public function filterByForm6($form6 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($form6)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QnoteTableMap::COL_FORM6, $form6, $comparison);
    }

    /**
     * Filter the query on the form7 column
     *
     * Example usage:
     * <code>
     * $query->filterByForm7('fooValue');   // WHERE form7 = 'fooValue'
     * $query->filterByForm7('%fooValue%', Criteria::LIKE); // WHERE form7 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $form7 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQnoteQuery The current query, for fluid interface
     */
    public function filterByForm7($form7 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($form7)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QnoteTableMap::COL_FORM7, $form7, $comparison);
    }

    /**
     * Filter the query on the form8 column
     *
     * Example usage:
     * <code>
     * $query->filterByForm8('fooValue');   // WHERE form8 = 'fooValue'
     * $query->filterByForm8('%fooValue%', Criteria::LIKE); // WHERE form8 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $form8 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQnoteQuery The current query, for fluid interface
     */
    public function filterByForm8($form8 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($form8)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QnoteTableMap::COL_FORM8, $form8, $comparison);
    }

    /**
     * Filter the query on the colwidth column
     *
     * Example usage:
     * <code>
     * $query->filterByColwidth(1234); // WHERE colwidth = 1234
     * $query->filterByColwidth(array(12, 34)); // WHERE colwidth IN (12, 34)
     * $query->filterByColwidth(array('min' => 12)); // WHERE colwidth > 12
     * </code>
     *
     * @param     mixed $colwidth The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQnoteQuery The current query, for fluid interface
     */
    public function filterByColwidth($colwidth = null, $comparison = null)
    {
        if (is_array($colwidth)) {
            $useMinMax = false;
            if (isset($colwidth['min'])) {
                $this->addUsingAlias(QnoteTableMap::COL_COLWIDTH, $colwidth['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($colwidth['max'])) {
                $this->addUsingAlias(QnoteTableMap::COL_COLWIDTH, $colwidth['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QnoteTableMap::COL_COLWIDTH, $colwidth, $comparison);
    }

    /**
     * Filter the query on the notefld column
     *
     * Example usage:
     * <code>
     * $query->filterByNotefld('fooValue');   // WHERE notefld = 'fooValue'
     * $query->filterByNotefld('%fooValue%', Criteria::LIKE); // WHERE notefld LIKE '%fooValue%'
     * </code>
     *
     * @param     string $notefld The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQnoteQuery The current query, for fluid interface
     */
    public function filterByNotefld($notefld = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($notefld)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QnoteTableMap::COL_NOTEFLD, $notefld, $comparison);
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
     * @return $this|ChildQnoteQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QnoteTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildQnote $qnote Object to remove from the list of results
     *
     * @return $this|ChildQnoteQuery The current query, for fluid interface
     */
    public function prune($qnote = null)
    {
        if ($qnote) {
            $this->addCond('pruneCond0', $this->getAliasedColName(QnoteTableMap::COL_SESSIONID), $qnote->getSessionid(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(QnoteTableMap::COL_RECNO), $qnote->getRecno(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(QnoteTableMap::COL_RECTYPE), $qnote->getRectype(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond3', $this->getAliasedColName(QnoteTableMap::COL_KEY1), $qnote->getKey1(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond4', $this->getAliasedColName(QnoteTableMap::COL_KEY2), $qnote->getKey2(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond5', $this->getAliasedColName(QnoteTableMap::COL_FORM1), $qnote->getForm1(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond6', $this->getAliasedColName(QnoteTableMap::COL_FORM2), $qnote->getForm2(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond7', $this->getAliasedColName(QnoteTableMap::COL_FORM3), $qnote->getForm3(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond8', $this->getAliasedColName(QnoteTableMap::COL_FORM4), $qnote->getForm4(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond9', $this->getAliasedColName(QnoteTableMap::COL_FORM5), $qnote->getForm5(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2', 'pruneCond3', 'pruneCond4', 'pruneCond5', 'pruneCond6', 'pruneCond7', 'pruneCond8', 'pruneCond9'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the qnote table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(QnoteTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            QnoteTableMap::clearInstancePool();
            QnoteTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(QnoteTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(QnoteTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            QnoteTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            QnoteTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // QnoteQuery
