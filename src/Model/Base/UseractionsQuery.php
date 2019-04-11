<?php

namespace Base;

use \Useractions as ChildUseractions;
use \UseractionsQuery as ChildUseractionsQuery;
use \Exception;
use \PDO;
use Map\UseractionsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'useractions' table.
 *
 *
 *
 * @method     ChildUseractionsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildUseractionsQuery orderByDatecreated($order = Criteria::ASC) Order by the datecreated column
 * @method     ChildUseractionsQuery orderByActiontype($order = Criteria::ASC) Order by the actiontype column
 * @method     ChildUseractionsQuery orderByActionsubtype($order = Criteria::ASC) Order by the actionsubtype column
 * @method     ChildUseractionsQuery orderByDuedate($order = Criteria::ASC) Order by the duedate column
 * @method     ChildUseractionsQuery orderByCreatedby($order = Criteria::ASC) Order by the createdby column
 * @method     ChildUseractionsQuery orderByAssignedto($order = Criteria::ASC) Order by the assignedto column
 * @method     ChildUseractionsQuery orderByAssignedby($order = Criteria::ASC) Order by the assignedby column
 * @method     ChildUseractionsQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildUseractionsQuery orderByTextbody($order = Criteria::ASC) Order by the textbody column
 * @method     ChildUseractionsQuery orderByReflectnote($order = Criteria::ASC) Order by the reflectnote column
 * @method     ChildUseractionsQuery orderByCompleted($order = Criteria::ASC) Order by the completed column
 * @method     ChildUseractionsQuery orderByDatecompleted($order = Criteria::ASC) Order by the datecompleted column
 * @method     ChildUseractionsQuery orderByDateupdated($order = Criteria::ASC) Order by the dateupdated column
 * @method     ChildUseractionsQuery orderByCustomerlink($order = Criteria::ASC) Order by the customerlink column
 * @method     ChildUseractionsQuery orderByShiptolink($order = Criteria::ASC) Order by the shiptolink column
 * @method     ChildUseractionsQuery orderByContactlink($order = Criteria::ASC) Order by the contactlink column
 * @method     ChildUseractionsQuery orderBySalesorderlink($order = Criteria::ASC) Order by the salesorderlink column
 * @method     ChildUseractionsQuery orderByQuotelink($order = Criteria::ASC) Order by the quotelink column
 * @method     ChildUseractionsQuery orderByVendorlink($order = Criteria::ASC) Order by the vendorlink column
 * @method     ChildUseractionsQuery orderByVendorshipfromlink($order = Criteria::ASC) Order by the vendorshipfromlink column
 * @method     ChildUseractionsQuery orderByPurchaseorderlink($order = Criteria::ASC) Order by the purchaseorderlink column
 * @method     ChildUseractionsQuery orderByActionlink($order = Criteria::ASC) Order by the actionlink column
 * @method     ChildUseractionsQuery orderByRescheduledlink($order = Criteria::ASC) Order by the rescheduledlink column
 *
 * @method     ChildUseractionsQuery groupById() Group by the id column
 * @method     ChildUseractionsQuery groupByDatecreated() Group by the datecreated column
 * @method     ChildUseractionsQuery groupByActiontype() Group by the actiontype column
 * @method     ChildUseractionsQuery groupByActionsubtype() Group by the actionsubtype column
 * @method     ChildUseractionsQuery groupByDuedate() Group by the duedate column
 * @method     ChildUseractionsQuery groupByCreatedby() Group by the createdby column
 * @method     ChildUseractionsQuery groupByAssignedto() Group by the assignedto column
 * @method     ChildUseractionsQuery groupByAssignedby() Group by the assignedby column
 * @method     ChildUseractionsQuery groupByTitle() Group by the title column
 * @method     ChildUseractionsQuery groupByTextbody() Group by the textbody column
 * @method     ChildUseractionsQuery groupByReflectnote() Group by the reflectnote column
 * @method     ChildUseractionsQuery groupByCompleted() Group by the completed column
 * @method     ChildUseractionsQuery groupByDatecompleted() Group by the datecompleted column
 * @method     ChildUseractionsQuery groupByDateupdated() Group by the dateupdated column
 * @method     ChildUseractionsQuery groupByCustomerlink() Group by the customerlink column
 * @method     ChildUseractionsQuery groupByShiptolink() Group by the shiptolink column
 * @method     ChildUseractionsQuery groupByContactlink() Group by the contactlink column
 * @method     ChildUseractionsQuery groupBySalesorderlink() Group by the salesorderlink column
 * @method     ChildUseractionsQuery groupByQuotelink() Group by the quotelink column
 * @method     ChildUseractionsQuery groupByVendorlink() Group by the vendorlink column
 * @method     ChildUseractionsQuery groupByVendorshipfromlink() Group by the vendorshipfromlink column
 * @method     ChildUseractionsQuery groupByPurchaseorderlink() Group by the purchaseorderlink column
 * @method     ChildUseractionsQuery groupByActionlink() Group by the actionlink column
 * @method     ChildUseractionsQuery groupByRescheduledlink() Group by the rescheduledlink column
 *
 * @method     ChildUseractionsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildUseractionsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildUseractionsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildUseractionsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildUseractionsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildUseractionsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildUseractions findOne(ConnectionInterface $con = null) Return the first ChildUseractions matching the query
 * @method     ChildUseractions findOneOrCreate(ConnectionInterface $con = null) Return the first ChildUseractions matching the query, or a new ChildUseractions object populated from the query conditions when no match is found
 *
 * @method     ChildUseractions findOneById(int $id) Return the first ChildUseractions filtered by the id column
 * @method     ChildUseractions findOneByDatecreated(string $datecreated) Return the first ChildUseractions filtered by the datecreated column
 * @method     ChildUseractions findOneByActiontype(string $actiontype) Return the first ChildUseractions filtered by the actiontype column
 * @method     ChildUseractions findOneByActionsubtype(string $actionsubtype) Return the first ChildUseractions filtered by the actionsubtype column
 * @method     ChildUseractions findOneByDuedate(string $duedate) Return the first ChildUseractions filtered by the duedate column
 * @method     ChildUseractions findOneByCreatedby(string $createdby) Return the first ChildUseractions filtered by the createdby column
 * @method     ChildUseractions findOneByAssignedto(string $assignedto) Return the first ChildUseractions filtered by the assignedto column
 * @method     ChildUseractions findOneByAssignedby(string $assignedby) Return the first ChildUseractions filtered by the assignedby column
 * @method     ChildUseractions findOneByTitle(string $title) Return the first ChildUseractions filtered by the title column
 * @method     ChildUseractions findOneByTextbody(string $textbody) Return the first ChildUseractions filtered by the textbody column
 * @method     ChildUseractions findOneByReflectnote(string $reflectnote) Return the first ChildUseractions filtered by the reflectnote column
 * @method     ChildUseractions findOneByCompleted(string $completed) Return the first ChildUseractions filtered by the completed column
 * @method     ChildUseractions findOneByDatecompleted(string $datecompleted) Return the first ChildUseractions filtered by the datecompleted column
 * @method     ChildUseractions findOneByDateupdated(string $dateupdated) Return the first ChildUseractions filtered by the dateupdated column
 * @method     ChildUseractions findOneByCustomerlink(string $customerlink) Return the first ChildUseractions filtered by the customerlink column
 * @method     ChildUseractions findOneByShiptolink(string $shiptolink) Return the first ChildUseractions filtered by the shiptolink column
 * @method     ChildUseractions findOneByContactlink(string $contactlink) Return the first ChildUseractions filtered by the contactlink column
 * @method     ChildUseractions findOneBySalesorderlink(string $salesorderlink) Return the first ChildUseractions filtered by the salesorderlink column
 * @method     ChildUseractions findOneByQuotelink(string $quotelink) Return the first ChildUseractions filtered by the quotelink column
 * @method     ChildUseractions findOneByVendorlink(string $vendorlink) Return the first ChildUseractions filtered by the vendorlink column
 * @method     ChildUseractions findOneByVendorshipfromlink(string $vendorshipfromlink) Return the first ChildUseractions filtered by the vendorshipfromlink column
 * @method     ChildUseractions findOneByPurchaseorderlink(string $purchaseorderlink) Return the first ChildUseractions filtered by the purchaseorderlink column
 * @method     ChildUseractions findOneByActionlink(string $actionlink) Return the first ChildUseractions filtered by the actionlink column
 * @method     ChildUseractions findOneByRescheduledlink(string $rescheduledlink) Return the first ChildUseractions filtered by the rescheduledlink column *

 * @method     ChildUseractions requirePk($key, ConnectionInterface $con = null) Return the ChildUseractions by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUseractions requireOne(ConnectionInterface $con = null) Return the first ChildUseractions matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUseractions requireOneById(int $id) Return the first ChildUseractions filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUseractions requireOneByDatecreated(string $datecreated) Return the first ChildUseractions filtered by the datecreated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUseractions requireOneByActiontype(string $actiontype) Return the first ChildUseractions filtered by the actiontype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUseractions requireOneByActionsubtype(string $actionsubtype) Return the first ChildUseractions filtered by the actionsubtype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUseractions requireOneByDuedate(string $duedate) Return the first ChildUseractions filtered by the duedate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUseractions requireOneByCreatedby(string $createdby) Return the first ChildUseractions filtered by the createdby column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUseractions requireOneByAssignedto(string $assignedto) Return the first ChildUseractions filtered by the assignedto column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUseractions requireOneByAssignedby(string $assignedby) Return the first ChildUseractions filtered by the assignedby column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUseractions requireOneByTitle(string $title) Return the first ChildUseractions filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUseractions requireOneByTextbody(string $textbody) Return the first ChildUseractions filtered by the textbody column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUseractions requireOneByReflectnote(string $reflectnote) Return the first ChildUseractions filtered by the reflectnote column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUseractions requireOneByCompleted(string $completed) Return the first ChildUseractions filtered by the completed column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUseractions requireOneByDatecompleted(string $datecompleted) Return the first ChildUseractions filtered by the datecompleted column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUseractions requireOneByDateupdated(string $dateupdated) Return the first ChildUseractions filtered by the dateupdated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUseractions requireOneByCustomerlink(string $customerlink) Return the first ChildUseractions filtered by the customerlink column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUseractions requireOneByShiptolink(string $shiptolink) Return the first ChildUseractions filtered by the shiptolink column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUseractions requireOneByContactlink(string $contactlink) Return the first ChildUseractions filtered by the contactlink column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUseractions requireOneBySalesorderlink(string $salesorderlink) Return the first ChildUseractions filtered by the salesorderlink column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUseractions requireOneByQuotelink(string $quotelink) Return the first ChildUseractions filtered by the quotelink column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUseractions requireOneByVendorlink(string $vendorlink) Return the first ChildUseractions filtered by the vendorlink column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUseractions requireOneByVendorshipfromlink(string $vendorshipfromlink) Return the first ChildUseractions filtered by the vendorshipfromlink column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUseractions requireOneByPurchaseorderlink(string $purchaseorderlink) Return the first ChildUseractions filtered by the purchaseorderlink column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUseractions requireOneByActionlink(string $actionlink) Return the first ChildUseractions filtered by the actionlink column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUseractions requireOneByRescheduledlink(string $rescheduledlink) Return the first ChildUseractions filtered by the rescheduledlink column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUseractions[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildUseractions objects based on current ModelCriteria
 * @method     ChildUseractions[]|ObjectCollection findById(int $id) Return ChildUseractions objects filtered by the id column
 * @method     ChildUseractions[]|ObjectCollection findByDatecreated(string $datecreated) Return ChildUseractions objects filtered by the datecreated column
 * @method     ChildUseractions[]|ObjectCollection findByActiontype(string $actiontype) Return ChildUseractions objects filtered by the actiontype column
 * @method     ChildUseractions[]|ObjectCollection findByActionsubtype(string $actionsubtype) Return ChildUseractions objects filtered by the actionsubtype column
 * @method     ChildUseractions[]|ObjectCollection findByDuedate(string $duedate) Return ChildUseractions objects filtered by the duedate column
 * @method     ChildUseractions[]|ObjectCollection findByCreatedby(string $createdby) Return ChildUseractions objects filtered by the createdby column
 * @method     ChildUseractions[]|ObjectCollection findByAssignedto(string $assignedto) Return ChildUseractions objects filtered by the assignedto column
 * @method     ChildUseractions[]|ObjectCollection findByAssignedby(string $assignedby) Return ChildUseractions objects filtered by the assignedby column
 * @method     ChildUseractions[]|ObjectCollection findByTitle(string $title) Return ChildUseractions objects filtered by the title column
 * @method     ChildUseractions[]|ObjectCollection findByTextbody(string $textbody) Return ChildUseractions objects filtered by the textbody column
 * @method     ChildUseractions[]|ObjectCollection findByReflectnote(string $reflectnote) Return ChildUseractions objects filtered by the reflectnote column
 * @method     ChildUseractions[]|ObjectCollection findByCompleted(string $completed) Return ChildUseractions objects filtered by the completed column
 * @method     ChildUseractions[]|ObjectCollection findByDatecompleted(string $datecompleted) Return ChildUseractions objects filtered by the datecompleted column
 * @method     ChildUseractions[]|ObjectCollection findByDateupdated(string $dateupdated) Return ChildUseractions objects filtered by the dateupdated column
 * @method     ChildUseractions[]|ObjectCollection findByCustomerlink(string $customerlink) Return ChildUseractions objects filtered by the customerlink column
 * @method     ChildUseractions[]|ObjectCollection findByShiptolink(string $shiptolink) Return ChildUseractions objects filtered by the shiptolink column
 * @method     ChildUseractions[]|ObjectCollection findByContactlink(string $contactlink) Return ChildUseractions objects filtered by the contactlink column
 * @method     ChildUseractions[]|ObjectCollection findBySalesorderlink(string $salesorderlink) Return ChildUseractions objects filtered by the salesorderlink column
 * @method     ChildUseractions[]|ObjectCollection findByQuotelink(string $quotelink) Return ChildUseractions objects filtered by the quotelink column
 * @method     ChildUseractions[]|ObjectCollection findByVendorlink(string $vendorlink) Return ChildUseractions objects filtered by the vendorlink column
 * @method     ChildUseractions[]|ObjectCollection findByVendorshipfromlink(string $vendorshipfromlink) Return ChildUseractions objects filtered by the vendorshipfromlink column
 * @method     ChildUseractions[]|ObjectCollection findByPurchaseorderlink(string $purchaseorderlink) Return ChildUseractions objects filtered by the purchaseorderlink column
 * @method     ChildUseractions[]|ObjectCollection findByActionlink(string $actionlink) Return ChildUseractions objects filtered by the actionlink column
 * @method     ChildUseractions[]|ObjectCollection findByRescheduledlink(string $rescheduledlink) Return ChildUseractions objects filtered by the rescheduledlink column
 * @method     ChildUseractions[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class UseractionsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\UseractionsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Useractions', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildUseractionsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildUseractionsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildUseractionsQuery) {
            return $criteria;
        }
        $query = new ChildUseractionsQuery();
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
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildUseractions|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(UseractionsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = UseractionsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildUseractions A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, datecreated, actiontype, actionsubtype, duedate, createdby, assignedto, assignedby, title, textbody, reflectnote, completed, datecompleted, dateupdated, customerlink, shiptolink, contactlink, salesorderlink, quotelink, vendorlink, vendorshipfromlink, purchaseorderlink, actionlink, rescheduledlink FROM useractions WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildUseractions $obj */
            $obj = new ChildUseractions();
            $obj->hydrate($row);
            UseractionsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildUseractions|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(12, 56, 832), $con);
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
     * @return $this|ChildUseractionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UseractionsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildUseractionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UseractionsTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUseractionsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(UseractionsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(UseractionsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UseractionsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the datecreated column
     *
     * Example usage:
     * <code>
     * $query->filterByDatecreated('2011-03-14'); // WHERE datecreated = '2011-03-14'
     * $query->filterByDatecreated('now'); // WHERE datecreated = '2011-03-14'
     * $query->filterByDatecreated(array('max' => 'yesterday')); // WHERE datecreated > '2011-03-13'
     * </code>
     *
     * @param     mixed $datecreated The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUseractionsQuery The current query, for fluid interface
     */
    public function filterByDatecreated($datecreated = null, $comparison = null)
    {
        if (is_array($datecreated)) {
            $useMinMax = false;
            if (isset($datecreated['min'])) {
                $this->addUsingAlias(UseractionsTableMap::COL_DATECREATED, $datecreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($datecreated['max'])) {
                $this->addUsingAlias(UseractionsTableMap::COL_DATECREATED, $datecreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UseractionsTableMap::COL_DATECREATED, $datecreated, $comparison);
    }

    /**
     * Filter the query on the actiontype column
     *
     * Example usage:
     * <code>
     * $query->filterByActiontype('fooValue');   // WHERE actiontype = 'fooValue'
     * $query->filterByActiontype('%fooValue%', Criteria::LIKE); // WHERE actiontype LIKE '%fooValue%'
     * </code>
     *
     * @param     string $actiontype The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUseractionsQuery The current query, for fluid interface
     */
    public function filterByActiontype($actiontype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($actiontype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UseractionsTableMap::COL_ACTIONTYPE, $actiontype, $comparison);
    }

    /**
     * Filter the query on the actionsubtype column
     *
     * Example usage:
     * <code>
     * $query->filterByActionsubtype('fooValue');   // WHERE actionsubtype = 'fooValue'
     * $query->filterByActionsubtype('%fooValue%', Criteria::LIKE); // WHERE actionsubtype LIKE '%fooValue%'
     * </code>
     *
     * @param     string $actionsubtype The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUseractionsQuery The current query, for fluid interface
     */
    public function filterByActionsubtype($actionsubtype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($actionsubtype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UseractionsTableMap::COL_ACTIONSUBTYPE, $actionsubtype, $comparison);
    }

    /**
     * Filter the query on the duedate column
     *
     * Example usage:
     * <code>
     * $query->filterByDuedate('2011-03-14'); // WHERE duedate = '2011-03-14'
     * $query->filterByDuedate('now'); // WHERE duedate = '2011-03-14'
     * $query->filterByDuedate(array('max' => 'yesterday')); // WHERE duedate > '2011-03-13'
     * </code>
     *
     * @param     mixed $duedate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUseractionsQuery The current query, for fluid interface
     */
    public function filterByDuedate($duedate = null, $comparison = null)
    {
        if (is_array($duedate)) {
            $useMinMax = false;
            if (isset($duedate['min'])) {
                $this->addUsingAlias(UseractionsTableMap::COL_DUEDATE, $duedate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($duedate['max'])) {
                $this->addUsingAlias(UseractionsTableMap::COL_DUEDATE, $duedate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UseractionsTableMap::COL_DUEDATE, $duedate, $comparison);
    }

    /**
     * Filter the query on the createdby column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedby('fooValue');   // WHERE createdby = 'fooValue'
     * $query->filterByCreatedby('%fooValue%', Criteria::LIKE); // WHERE createdby LIKE '%fooValue%'
     * </code>
     *
     * @param     string $createdby The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUseractionsQuery The current query, for fluid interface
     */
    public function filterByCreatedby($createdby = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($createdby)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UseractionsTableMap::COL_CREATEDBY, $createdby, $comparison);
    }

    /**
     * Filter the query on the assignedto column
     *
     * Example usage:
     * <code>
     * $query->filterByAssignedto('fooValue');   // WHERE assignedto = 'fooValue'
     * $query->filterByAssignedto('%fooValue%', Criteria::LIKE); // WHERE assignedto LIKE '%fooValue%'
     * </code>
     *
     * @param     string $assignedto The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUseractionsQuery The current query, for fluid interface
     */
    public function filterByAssignedto($assignedto = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($assignedto)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UseractionsTableMap::COL_ASSIGNEDTO, $assignedto, $comparison);
    }

    /**
     * Filter the query on the assignedby column
     *
     * Example usage:
     * <code>
     * $query->filterByAssignedby('fooValue');   // WHERE assignedby = 'fooValue'
     * $query->filterByAssignedby('%fooValue%', Criteria::LIKE); // WHERE assignedby LIKE '%fooValue%'
     * </code>
     *
     * @param     string $assignedby The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUseractionsQuery The current query, for fluid interface
     */
    public function filterByAssignedby($assignedby = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($assignedby)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UseractionsTableMap::COL_ASSIGNEDBY, $assignedby, $comparison);
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
     * @return $this|ChildUseractionsQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UseractionsTableMap::COL_TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the textbody column
     *
     * Example usage:
     * <code>
     * $query->filterByTextbody('fooValue');   // WHERE textbody = 'fooValue'
     * $query->filterByTextbody('%fooValue%', Criteria::LIKE); // WHERE textbody LIKE '%fooValue%'
     * </code>
     *
     * @param     string $textbody The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUseractionsQuery The current query, for fluid interface
     */
    public function filterByTextbody($textbody = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($textbody)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UseractionsTableMap::COL_TEXTBODY, $textbody, $comparison);
    }

    /**
     * Filter the query on the reflectnote column
     *
     * Example usage:
     * <code>
     * $query->filterByReflectnote('fooValue');   // WHERE reflectnote = 'fooValue'
     * $query->filterByReflectnote('%fooValue%', Criteria::LIKE); // WHERE reflectnote LIKE '%fooValue%'
     * </code>
     *
     * @param     string $reflectnote The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUseractionsQuery The current query, for fluid interface
     */
    public function filterByReflectnote($reflectnote = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($reflectnote)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UseractionsTableMap::COL_REFLECTNOTE, $reflectnote, $comparison);
    }

    /**
     * Filter the query on the completed column
     *
     * Example usage:
     * <code>
     * $query->filterByCompleted('fooValue');   // WHERE completed = 'fooValue'
     * $query->filterByCompleted('%fooValue%', Criteria::LIKE); // WHERE completed LIKE '%fooValue%'
     * </code>
     *
     * @param     string $completed The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUseractionsQuery The current query, for fluid interface
     */
    public function filterByCompleted($completed = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($completed)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UseractionsTableMap::COL_COMPLETED, $completed, $comparison);
    }

    /**
     * Filter the query on the datecompleted column
     *
     * Example usage:
     * <code>
     * $query->filterByDatecompleted('2011-03-14'); // WHERE datecompleted = '2011-03-14'
     * $query->filterByDatecompleted('now'); // WHERE datecompleted = '2011-03-14'
     * $query->filterByDatecompleted(array('max' => 'yesterday')); // WHERE datecompleted > '2011-03-13'
     * </code>
     *
     * @param     mixed $datecompleted The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUseractionsQuery The current query, for fluid interface
     */
    public function filterByDatecompleted($datecompleted = null, $comparison = null)
    {
        if (is_array($datecompleted)) {
            $useMinMax = false;
            if (isset($datecompleted['min'])) {
                $this->addUsingAlias(UseractionsTableMap::COL_DATECOMPLETED, $datecompleted['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($datecompleted['max'])) {
                $this->addUsingAlias(UseractionsTableMap::COL_DATECOMPLETED, $datecompleted['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UseractionsTableMap::COL_DATECOMPLETED, $datecompleted, $comparison);
    }

    /**
     * Filter the query on the dateupdated column
     *
     * Example usage:
     * <code>
     * $query->filterByDateupdated('2011-03-14'); // WHERE dateupdated = '2011-03-14'
     * $query->filterByDateupdated('now'); // WHERE dateupdated = '2011-03-14'
     * $query->filterByDateupdated(array('max' => 'yesterday')); // WHERE dateupdated > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateupdated The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUseractionsQuery The current query, for fluid interface
     */
    public function filterByDateupdated($dateupdated = null, $comparison = null)
    {
        if (is_array($dateupdated)) {
            $useMinMax = false;
            if (isset($dateupdated['min'])) {
                $this->addUsingAlias(UseractionsTableMap::COL_DATEUPDATED, $dateupdated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateupdated['max'])) {
                $this->addUsingAlias(UseractionsTableMap::COL_DATEUPDATED, $dateupdated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UseractionsTableMap::COL_DATEUPDATED, $dateupdated, $comparison);
    }

    /**
     * Filter the query on the customerlink column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomerlink('fooValue');   // WHERE customerlink = 'fooValue'
     * $query->filterByCustomerlink('%fooValue%', Criteria::LIKE); // WHERE customerlink LIKE '%fooValue%'
     * </code>
     *
     * @param     string $customerlink The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUseractionsQuery The current query, for fluid interface
     */
    public function filterByCustomerlink($customerlink = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($customerlink)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UseractionsTableMap::COL_CUSTOMERLINK, $customerlink, $comparison);
    }

    /**
     * Filter the query on the shiptolink column
     *
     * Example usage:
     * <code>
     * $query->filterByShiptolink('fooValue');   // WHERE shiptolink = 'fooValue'
     * $query->filterByShiptolink('%fooValue%', Criteria::LIKE); // WHERE shiptolink LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shiptolink The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUseractionsQuery The current query, for fluid interface
     */
    public function filterByShiptolink($shiptolink = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shiptolink)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UseractionsTableMap::COL_SHIPTOLINK, $shiptolink, $comparison);
    }

    /**
     * Filter the query on the contactlink column
     *
     * Example usage:
     * <code>
     * $query->filterByContactlink('fooValue');   // WHERE contactlink = 'fooValue'
     * $query->filterByContactlink('%fooValue%', Criteria::LIKE); // WHERE contactlink LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contactlink The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUseractionsQuery The current query, for fluid interface
     */
    public function filterByContactlink($contactlink = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactlink)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UseractionsTableMap::COL_CONTACTLINK, $contactlink, $comparison);
    }

    /**
     * Filter the query on the salesorderlink column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesorderlink('fooValue');   // WHERE salesorderlink = 'fooValue'
     * $query->filterBySalesorderlink('%fooValue%', Criteria::LIKE); // WHERE salesorderlink LIKE '%fooValue%'
     * </code>
     *
     * @param     string $salesorderlink The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUseractionsQuery The current query, for fluid interface
     */
    public function filterBySalesorderlink($salesorderlink = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($salesorderlink)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UseractionsTableMap::COL_SALESORDERLINK, $salesorderlink, $comparison);
    }

    /**
     * Filter the query on the quotelink column
     *
     * Example usage:
     * <code>
     * $query->filterByQuotelink('fooValue');   // WHERE quotelink = 'fooValue'
     * $query->filterByQuotelink('%fooValue%', Criteria::LIKE); // WHERE quotelink LIKE '%fooValue%'
     * </code>
     *
     * @param     string $quotelink The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUseractionsQuery The current query, for fluid interface
     */
    public function filterByQuotelink($quotelink = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($quotelink)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UseractionsTableMap::COL_QUOTELINK, $quotelink, $comparison);
    }

    /**
     * Filter the query on the vendorlink column
     *
     * Example usage:
     * <code>
     * $query->filterByVendorlink('fooValue');   // WHERE vendorlink = 'fooValue'
     * $query->filterByVendorlink('%fooValue%', Criteria::LIKE); // WHERE vendorlink LIKE '%fooValue%'
     * </code>
     *
     * @param     string $vendorlink The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUseractionsQuery The current query, for fluid interface
     */
    public function filterByVendorlink($vendorlink = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($vendorlink)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UseractionsTableMap::COL_VENDORLINK, $vendorlink, $comparison);
    }

    /**
     * Filter the query on the vendorshipfromlink column
     *
     * Example usage:
     * <code>
     * $query->filterByVendorshipfromlink('fooValue');   // WHERE vendorshipfromlink = 'fooValue'
     * $query->filterByVendorshipfromlink('%fooValue%', Criteria::LIKE); // WHERE vendorshipfromlink LIKE '%fooValue%'
     * </code>
     *
     * @param     string $vendorshipfromlink The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUseractionsQuery The current query, for fluid interface
     */
    public function filterByVendorshipfromlink($vendorshipfromlink = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($vendorshipfromlink)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UseractionsTableMap::COL_VENDORSHIPFROMLINK, $vendorshipfromlink, $comparison);
    }

    /**
     * Filter the query on the purchaseorderlink column
     *
     * Example usage:
     * <code>
     * $query->filterByPurchaseorderlink('fooValue');   // WHERE purchaseorderlink = 'fooValue'
     * $query->filterByPurchaseorderlink('%fooValue%', Criteria::LIKE); // WHERE purchaseorderlink LIKE '%fooValue%'
     * </code>
     *
     * @param     string $purchaseorderlink The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUseractionsQuery The current query, for fluid interface
     */
    public function filterByPurchaseorderlink($purchaseorderlink = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($purchaseorderlink)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UseractionsTableMap::COL_PURCHASEORDERLINK, $purchaseorderlink, $comparison);
    }

    /**
     * Filter the query on the actionlink column
     *
     * Example usage:
     * <code>
     * $query->filterByActionlink('fooValue');   // WHERE actionlink = 'fooValue'
     * $query->filterByActionlink('%fooValue%', Criteria::LIKE); // WHERE actionlink LIKE '%fooValue%'
     * </code>
     *
     * @param     string $actionlink The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUseractionsQuery The current query, for fluid interface
     */
    public function filterByActionlink($actionlink = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($actionlink)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UseractionsTableMap::COL_ACTIONLINK, $actionlink, $comparison);
    }

    /**
     * Filter the query on the rescheduledlink column
     *
     * Example usage:
     * <code>
     * $query->filterByRescheduledlink('fooValue');   // WHERE rescheduledlink = 'fooValue'
     * $query->filterByRescheduledlink('%fooValue%', Criteria::LIKE); // WHERE rescheduledlink LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rescheduledlink The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUseractionsQuery The current query, for fluid interface
     */
    public function filterByRescheduledlink($rescheduledlink = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rescheduledlink)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UseractionsTableMap::COL_RESCHEDULEDLINK, $rescheduledlink, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildUseractions $useractions Object to remove from the list of results
     *
     * @return $this|ChildUseractionsQuery The current query, for fluid interface
     */
    public function prune($useractions = null)
    {
        if ($useractions) {
            $this->addUsingAlias(UseractionsTableMap::COL_ID, $useractions->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the useractions table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UseractionsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            UseractionsTableMap::clearInstancePool();
            UseractionsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(UseractionsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(UseractionsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            UseractionsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            UseractionsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // UseractionsQuery
