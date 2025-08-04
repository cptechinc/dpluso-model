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
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the `useractions` table.
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
 * @method     ChildUseractions|null findOne(?ConnectionInterface $con = null) Return the first ChildUseractions matching the query
 * @method     ChildUseractions findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildUseractions matching the query, or a new ChildUseractions object populated from the query conditions when no match is found
 *
 * @method     ChildUseractions|null findOneById(int $id) Return the first ChildUseractions filtered by the id column
 * @method     ChildUseractions|null findOneByDatecreated(string $datecreated) Return the first ChildUseractions filtered by the datecreated column
 * @method     ChildUseractions|null findOneByActiontype(string $actiontype) Return the first ChildUseractions filtered by the actiontype column
 * @method     ChildUseractions|null findOneByActionsubtype(string $actionsubtype) Return the first ChildUseractions filtered by the actionsubtype column
 * @method     ChildUseractions|null findOneByDuedate(string $duedate) Return the first ChildUseractions filtered by the duedate column
 * @method     ChildUseractions|null findOneByCreatedby(string $createdby) Return the first ChildUseractions filtered by the createdby column
 * @method     ChildUseractions|null findOneByAssignedto(string $assignedto) Return the first ChildUseractions filtered by the assignedto column
 * @method     ChildUseractions|null findOneByAssignedby(string $assignedby) Return the first ChildUseractions filtered by the assignedby column
 * @method     ChildUseractions|null findOneByTitle(string $title) Return the first ChildUseractions filtered by the title column
 * @method     ChildUseractions|null findOneByTextbody(string $textbody) Return the first ChildUseractions filtered by the textbody column
 * @method     ChildUseractions|null findOneByReflectnote(string $reflectnote) Return the first ChildUseractions filtered by the reflectnote column
 * @method     ChildUseractions|null findOneByCompleted(string $completed) Return the first ChildUseractions filtered by the completed column
 * @method     ChildUseractions|null findOneByDatecompleted(string $datecompleted) Return the first ChildUseractions filtered by the datecompleted column
 * @method     ChildUseractions|null findOneByDateupdated(string $dateupdated) Return the first ChildUseractions filtered by the dateupdated column
 * @method     ChildUseractions|null findOneByCustomerlink(string $customerlink) Return the first ChildUseractions filtered by the customerlink column
 * @method     ChildUseractions|null findOneByShiptolink(string $shiptolink) Return the first ChildUseractions filtered by the shiptolink column
 * @method     ChildUseractions|null findOneByContactlink(string $contactlink) Return the first ChildUseractions filtered by the contactlink column
 * @method     ChildUseractions|null findOneBySalesorderlink(string $salesorderlink) Return the first ChildUseractions filtered by the salesorderlink column
 * @method     ChildUseractions|null findOneByQuotelink(string $quotelink) Return the first ChildUseractions filtered by the quotelink column
 * @method     ChildUseractions|null findOneByVendorlink(string $vendorlink) Return the first ChildUseractions filtered by the vendorlink column
 * @method     ChildUseractions|null findOneByVendorshipfromlink(string $vendorshipfromlink) Return the first ChildUseractions filtered by the vendorshipfromlink column
 * @method     ChildUseractions|null findOneByPurchaseorderlink(string $purchaseorderlink) Return the first ChildUseractions filtered by the purchaseorderlink column
 * @method     ChildUseractions|null findOneByActionlink(string $actionlink) Return the first ChildUseractions filtered by the actionlink column
 * @method     ChildUseractions|null findOneByRescheduledlink(string $rescheduledlink) Return the first ChildUseractions filtered by the rescheduledlink column
 *
 * @method     ChildUseractions requirePk($key, ?ConnectionInterface $con = null) Return the ChildUseractions by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUseractions requireOne(?ConnectionInterface $con = null) Return the first ChildUseractions matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
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
 * @method     ChildUseractions[]|Collection find(?ConnectionInterface $con = null) Return ChildUseractions objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildUseractions> find(?ConnectionInterface $con = null) Return ChildUseractions objects based on current ModelCriteria
 *
 * @method     ChildUseractions[]|Collection findById(int|array<int> $id) Return ChildUseractions objects filtered by the id column
 * @psalm-method Collection&\Traversable<ChildUseractions> findById(int|array<int> $id) Return ChildUseractions objects filtered by the id column
 * @method     ChildUseractions[]|Collection findByDatecreated(string|array<string> $datecreated) Return ChildUseractions objects filtered by the datecreated column
 * @psalm-method Collection&\Traversable<ChildUseractions> findByDatecreated(string|array<string> $datecreated) Return ChildUseractions objects filtered by the datecreated column
 * @method     ChildUseractions[]|Collection findByActiontype(string|array<string> $actiontype) Return ChildUseractions objects filtered by the actiontype column
 * @psalm-method Collection&\Traversable<ChildUseractions> findByActiontype(string|array<string> $actiontype) Return ChildUseractions objects filtered by the actiontype column
 * @method     ChildUseractions[]|Collection findByActionsubtype(string|array<string> $actionsubtype) Return ChildUseractions objects filtered by the actionsubtype column
 * @psalm-method Collection&\Traversable<ChildUseractions> findByActionsubtype(string|array<string> $actionsubtype) Return ChildUseractions objects filtered by the actionsubtype column
 * @method     ChildUseractions[]|Collection findByDuedate(string|array<string> $duedate) Return ChildUseractions objects filtered by the duedate column
 * @psalm-method Collection&\Traversable<ChildUseractions> findByDuedate(string|array<string> $duedate) Return ChildUseractions objects filtered by the duedate column
 * @method     ChildUseractions[]|Collection findByCreatedby(string|array<string> $createdby) Return ChildUseractions objects filtered by the createdby column
 * @psalm-method Collection&\Traversable<ChildUseractions> findByCreatedby(string|array<string> $createdby) Return ChildUseractions objects filtered by the createdby column
 * @method     ChildUseractions[]|Collection findByAssignedto(string|array<string> $assignedto) Return ChildUseractions objects filtered by the assignedto column
 * @psalm-method Collection&\Traversable<ChildUseractions> findByAssignedto(string|array<string> $assignedto) Return ChildUseractions objects filtered by the assignedto column
 * @method     ChildUseractions[]|Collection findByAssignedby(string|array<string> $assignedby) Return ChildUseractions objects filtered by the assignedby column
 * @psalm-method Collection&\Traversable<ChildUseractions> findByAssignedby(string|array<string> $assignedby) Return ChildUseractions objects filtered by the assignedby column
 * @method     ChildUseractions[]|Collection findByTitle(string|array<string> $title) Return ChildUseractions objects filtered by the title column
 * @psalm-method Collection&\Traversable<ChildUseractions> findByTitle(string|array<string> $title) Return ChildUseractions objects filtered by the title column
 * @method     ChildUseractions[]|Collection findByTextbody(string|array<string> $textbody) Return ChildUseractions objects filtered by the textbody column
 * @psalm-method Collection&\Traversable<ChildUseractions> findByTextbody(string|array<string> $textbody) Return ChildUseractions objects filtered by the textbody column
 * @method     ChildUseractions[]|Collection findByReflectnote(string|array<string> $reflectnote) Return ChildUseractions objects filtered by the reflectnote column
 * @psalm-method Collection&\Traversable<ChildUseractions> findByReflectnote(string|array<string> $reflectnote) Return ChildUseractions objects filtered by the reflectnote column
 * @method     ChildUseractions[]|Collection findByCompleted(string|array<string> $completed) Return ChildUseractions objects filtered by the completed column
 * @psalm-method Collection&\Traversable<ChildUseractions> findByCompleted(string|array<string> $completed) Return ChildUseractions objects filtered by the completed column
 * @method     ChildUseractions[]|Collection findByDatecompleted(string|array<string> $datecompleted) Return ChildUseractions objects filtered by the datecompleted column
 * @psalm-method Collection&\Traversable<ChildUseractions> findByDatecompleted(string|array<string> $datecompleted) Return ChildUseractions objects filtered by the datecompleted column
 * @method     ChildUseractions[]|Collection findByDateupdated(string|array<string> $dateupdated) Return ChildUseractions objects filtered by the dateupdated column
 * @psalm-method Collection&\Traversable<ChildUseractions> findByDateupdated(string|array<string> $dateupdated) Return ChildUseractions objects filtered by the dateupdated column
 * @method     ChildUseractions[]|Collection findByCustomerlink(string|array<string> $customerlink) Return ChildUseractions objects filtered by the customerlink column
 * @psalm-method Collection&\Traversable<ChildUseractions> findByCustomerlink(string|array<string> $customerlink) Return ChildUseractions objects filtered by the customerlink column
 * @method     ChildUseractions[]|Collection findByShiptolink(string|array<string> $shiptolink) Return ChildUseractions objects filtered by the shiptolink column
 * @psalm-method Collection&\Traversable<ChildUseractions> findByShiptolink(string|array<string> $shiptolink) Return ChildUseractions objects filtered by the shiptolink column
 * @method     ChildUseractions[]|Collection findByContactlink(string|array<string> $contactlink) Return ChildUseractions objects filtered by the contactlink column
 * @psalm-method Collection&\Traversable<ChildUseractions> findByContactlink(string|array<string> $contactlink) Return ChildUseractions objects filtered by the contactlink column
 * @method     ChildUseractions[]|Collection findBySalesorderlink(string|array<string> $salesorderlink) Return ChildUseractions objects filtered by the salesorderlink column
 * @psalm-method Collection&\Traversable<ChildUseractions> findBySalesorderlink(string|array<string> $salesorderlink) Return ChildUseractions objects filtered by the salesorderlink column
 * @method     ChildUseractions[]|Collection findByQuotelink(string|array<string> $quotelink) Return ChildUseractions objects filtered by the quotelink column
 * @psalm-method Collection&\Traversable<ChildUseractions> findByQuotelink(string|array<string> $quotelink) Return ChildUseractions objects filtered by the quotelink column
 * @method     ChildUseractions[]|Collection findByVendorlink(string|array<string> $vendorlink) Return ChildUseractions objects filtered by the vendorlink column
 * @psalm-method Collection&\Traversable<ChildUseractions> findByVendorlink(string|array<string> $vendorlink) Return ChildUseractions objects filtered by the vendorlink column
 * @method     ChildUseractions[]|Collection findByVendorshipfromlink(string|array<string> $vendorshipfromlink) Return ChildUseractions objects filtered by the vendorshipfromlink column
 * @psalm-method Collection&\Traversable<ChildUseractions> findByVendorshipfromlink(string|array<string> $vendorshipfromlink) Return ChildUseractions objects filtered by the vendorshipfromlink column
 * @method     ChildUseractions[]|Collection findByPurchaseorderlink(string|array<string> $purchaseorderlink) Return ChildUseractions objects filtered by the purchaseorderlink column
 * @psalm-method Collection&\Traversable<ChildUseractions> findByPurchaseorderlink(string|array<string> $purchaseorderlink) Return ChildUseractions objects filtered by the purchaseorderlink column
 * @method     ChildUseractions[]|Collection findByActionlink(string|array<string> $actionlink) Return ChildUseractions objects filtered by the actionlink column
 * @psalm-method Collection&\Traversable<ChildUseractions> findByActionlink(string|array<string> $actionlink) Return ChildUseractions objects filtered by the actionlink column
 * @method     ChildUseractions[]|Collection findByRescheduledlink(string|array<string> $rescheduledlink) Return ChildUseractions objects filtered by the rescheduledlink column
 * @psalm-method Collection&\Traversable<ChildUseractions> findByRescheduledlink(string|array<string> $rescheduledlink) Return ChildUseractions objects filtered by the rescheduledlink column
 *
 * @method     ChildUseractions[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildUseractions> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class UseractionsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\UseractionsQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dplusodb', $modelName = '\\Useractions', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildUseractionsQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildUseractionsQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
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
    public function findPk($key, ?ConnectionInterface $con = null)
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
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
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
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
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

        $this->addUsingAlias(UseractionsTableMap::COL_ID, $key, Criteria::EQUAL);

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

        $this->addUsingAlias(UseractionsTableMap::COL_ID, $keys, Criteria::IN);

        return $this;
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
     * @param mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterById($id = null, ?string $comparison = null)
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

        $this->addUsingAlias(UseractionsTableMap::COL_ID, $id, $comparison);

        return $this;
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
     * @param mixed $datecreated The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDatecreated($datecreated = null, ?string $comparison = null)
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

        $this->addUsingAlias(UseractionsTableMap::COL_DATECREATED, $datecreated, $comparison);

        return $this;
    }

    /**
     * Filter the query on the actiontype column
     *
     * Example usage:
     * <code>
     * $query->filterByActiontype('fooValue');   // WHERE actiontype = 'fooValue'
     * $query->filterByActiontype('%fooValue%', Criteria::LIKE); // WHERE actiontype LIKE '%fooValue%'
     * $query->filterByActiontype(['foo', 'bar']); // WHERE actiontype IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $actiontype The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByActiontype($actiontype = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($actiontype)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UseractionsTableMap::COL_ACTIONTYPE, $actiontype, $comparison);

        return $this;
    }

    /**
     * Filter the query on the actionsubtype column
     *
     * Example usage:
     * <code>
     * $query->filterByActionsubtype('fooValue');   // WHERE actionsubtype = 'fooValue'
     * $query->filterByActionsubtype('%fooValue%', Criteria::LIKE); // WHERE actionsubtype LIKE '%fooValue%'
     * $query->filterByActionsubtype(['foo', 'bar']); // WHERE actionsubtype IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $actionsubtype The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByActionsubtype($actionsubtype = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($actionsubtype)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UseractionsTableMap::COL_ACTIONSUBTYPE, $actionsubtype, $comparison);

        return $this;
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
     * @param mixed $duedate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDuedate($duedate = null, ?string $comparison = null)
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

        $this->addUsingAlias(UseractionsTableMap::COL_DUEDATE, $duedate, $comparison);

        return $this;
    }

    /**
     * Filter the query on the createdby column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedby('fooValue');   // WHERE createdby = 'fooValue'
     * $query->filterByCreatedby('%fooValue%', Criteria::LIKE); // WHERE createdby LIKE '%fooValue%'
     * $query->filterByCreatedby(['foo', 'bar']); // WHERE createdby IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $createdby The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCreatedby($createdby = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($createdby)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UseractionsTableMap::COL_CREATEDBY, $createdby, $comparison);

        return $this;
    }

    /**
     * Filter the query on the assignedto column
     *
     * Example usage:
     * <code>
     * $query->filterByAssignedto('fooValue');   // WHERE assignedto = 'fooValue'
     * $query->filterByAssignedto('%fooValue%', Criteria::LIKE); // WHERE assignedto LIKE '%fooValue%'
     * $query->filterByAssignedto(['foo', 'bar']); // WHERE assignedto IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $assignedto The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByAssignedto($assignedto = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($assignedto)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UseractionsTableMap::COL_ASSIGNEDTO, $assignedto, $comparison);

        return $this;
    }

    /**
     * Filter the query on the assignedby column
     *
     * Example usage:
     * <code>
     * $query->filterByAssignedby('fooValue');   // WHERE assignedby = 'fooValue'
     * $query->filterByAssignedby('%fooValue%', Criteria::LIKE); // WHERE assignedby LIKE '%fooValue%'
     * $query->filterByAssignedby(['foo', 'bar']); // WHERE assignedby IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $assignedby The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByAssignedby($assignedby = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($assignedby)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UseractionsTableMap::COL_ASSIGNEDBY, $assignedby, $comparison);

        return $this;
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%', Criteria::LIKE); // WHERE title LIKE '%fooValue%'
     * $query->filterByTitle(['foo', 'bar']); // WHERE title IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $title The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTitle($title = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UseractionsTableMap::COL_TITLE, $title, $comparison);

        return $this;
    }

    /**
     * Filter the query on the textbody column
     *
     * Example usage:
     * <code>
     * $query->filterByTextbody('fooValue');   // WHERE textbody = 'fooValue'
     * $query->filterByTextbody('%fooValue%', Criteria::LIKE); // WHERE textbody LIKE '%fooValue%'
     * $query->filterByTextbody(['foo', 'bar']); // WHERE textbody IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $textbody The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTextbody($textbody = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($textbody)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UseractionsTableMap::COL_TEXTBODY, $textbody, $comparison);

        return $this;
    }

    /**
     * Filter the query on the reflectnote column
     *
     * Example usage:
     * <code>
     * $query->filterByReflectnote('fooValue');   // WHERE reflectnote = 'fooValue'
     * $query->filterByReflectnote('%fooValue%', Criteria::LIKE); // WHERE reflectnote LIKE '%fooValue%'
     * $query->filterByReflectnote(['foo', 'bar']); // WHERE reflectnote IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $reflectnote The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByReflectnote($reflectnote = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($reflectnote)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UseractionsTableMap::COL_REFLECTNOTE, $reflectnote, $comparison);

        return $this;
    }

    /**
     * Filter the query on the completed column
     *
     * Example usage:
     * <code>
     * $query->filterByCompleted('fooValue');   // WHERE completed = 'fooValue'
     * $query->filterByCompleted('%fooValue%', Criteria::LIKE); // WHERE completed LIKE '%fooValue%'
     * $query->filterByCompleted(['foo', 'bar']); // WHERE completed IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $completed The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCompleted($completed = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($completed)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UseractionsTableMap::COL_COMPLETED, $completed, $comparison);

        return $this;
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
     * @param mixed $datecompleted The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDatecompleted($datecompleted = null, ?string $comparison = null)
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

        $this->addUsingAlias(UseractionsTableMap::COL_DATECOMPLETED, $datecompleted, $comparison);

        return $this;
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
     * @param mixed $dateupdated The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDateupdated($dateupdated = null, ?string $comparison = null)
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

        $this->addUsingAlias(UseractionsTableMap::COL_DATEUPDATED, $dateupdated, $comparison);

        return $this;
    }

    /**
     * Filter the query on the customerlink column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomerlink('fooValue');   // WHERE customerlink = 'fooValue'
     * $query->filterByCustomerlink('%fooValue%', Criteria::LIKE); // WHERE customerlink LIKE '%fooValue%'
     * $query->filterByCustomerlink(['foo', 'bar']); // WHERE customerlink IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $customerlink The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCustomerlink($customerlink = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($customerlink)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UseractionsTableMap::COL_CUSTOMERLINK, $customerlink, $comparison);

        return $this;
    }

    /**
     * Filter the query on the shiptolink column
     *
     * Example usage:
     * <code>
     * $query->filterByShiptolink('fooValue');   // WHERE shiptolink = 'fooValue'
     * $query->filterByShiptolink('%fooValue%', Criteria::LIKE); // WHERE shiptolink LIKE '%fooValue%'
     * $query->filterByShiptolink(['foo', 'bar']); // WHERE shiptolink IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $shiptolink The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByShiptolink($shiptolink = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shiptolink)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UseractionsTableMap::COL_SHIPTOLINK, $shiptolink, $comparison);

        return $this;
    }

    /**
     * Filter the query on the contactlink column
     *
     * Example usage:
     * <code>
     * $query->filterByContactlink('fooValue');   // WHERE contactlink = 'fooValue'
     * $query->filterByContactlink('%fooValue%', Criteria::LIKE); // WHERE contactlink LIKE '%fooValue%'
     * $query->filterByContactlink(['foo', 'bar']); // WHERE contactlink IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $contactlink The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByContactlink($contactlink = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contactlink)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UseractionsTableMap::COL_CONTACTLINK, $contactlink, $comparison);

        return $this;
    }

    /**
     * Filter the query on the salesorderlink column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesorderlink('fooValue');   // WHERE salesorderlink = 'fooValue'
     * $query->filterBySalesorderlink('%fooValue%', Criteria::LIKE); // WHERE salesorderlink LIKE '%fooValue%'
     * $query->filterBySalesorderlink(['foo', 'bar']); // WHERE salesorderlink IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $salesorderlink The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterBySalesorderlink($salesorderlink = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($salesorderlink)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UseractionsTableMap::COL_SALESORDERLINK, $salesorderlink, $comparison);

        return $this;
    }

    /**
     * Filter the query on the quotelink column
     *
     * Example usage:
     * <code>
     * $query->filterByQuotelink('fooValue');   // WHERE quotelink = 'fooValue'
     * $query->filterByQuotelink('%fooValue%', Criteria::LIKE); // WHERE quotelink LIKE '%fooValue%'
     * $query->filterByQuotelink(['foo', 'bar']); // WHERE quotelink IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $quotelink The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByQuotelink($quotelink = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($quotelink)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UseractionsTableMap::COL_QUOTELINK, $quotelink, $comparison);

        return $this;
    }

    /**
     * Filter the query on the vendorlink column
     *
     * Example usage:
     * <code>
     * $query->filterByVendorlink('fooValue');   // WHERE vendorlink = 'fooValue'
     * $query->filterByVendorlink('%fooValue%', Criteria::LIKE); // WHERE vendorlink LIKE '%fooValue%'
     * $query->filterByVendorlink(['foo', 'bar']); // WHERE vendorlink IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $vendorlink The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByVendorlink($vendorlink = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($vendorlink)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UseractionsTableMap::COL_VENDORLINK, $vendorlink, $comparison);

        return $this;
    }

    /**
     * Filter the query on the vendorshipfromlink column
     *
     * Example usage:
     * <code>
     * $query->filterByVendorshipfromlink('fooValue');   // WHERE vendorshipfromlink = 'fooValue'
     * $query->filterByVendorshipfromlink('%fooValue%', Criteria::LIKE); // WHERE vendorshipfromlink LIKE '%fooValue%'
     * $query->filterByVendorshipfromlink(['foo', 'bar']); // WHERE vendorshipfromlink IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $vendorshipfromlink The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByVendorshipfromlink($vendorshipfromlink = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($vendorshipfromlink)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UseractionsTableMap::COL_VENDORSHIPFROMLINK, $vendorshipfromlink, $comparison);

        return $this;
    }

    /**
     * Filter the query on the purchaseorderlink column
     *
     * Example usage:
     * <code>
     * $query->filterByPurchaseorderlink('fooValue');   // WHERE purchaseorderlink = 'fooValue'
     * $query->filterByPurchaseorderlink('%fooValue%', Criteria::LIKE); // WHERE purchaseorderlink LIKE '%fooValue%'
     * $query->filterByPurchaseorderlink(['foo', 'bar']); // WHERE purchaseorderlink IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $purchaseorderlink The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPurchaseorderlink($purchaseorderlink = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($purchaseorderlink)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UseractionsTableMap::COL_PURCHASEORDERLINK, $purchaseorderlink, $comparison);

        return $this;
    }

    /**
     * Filter the query on the actionlink column
     *
     * Example usage:
     * <code>
     * $query->filterByActionlink('fooValue');   // WHERE actionlink = 'fooValue'
     * $query->filterByActionlink('%fooValue%', Criteria::LIKE); // WHERE actionlink LIKE '%fooValue%'
     * $query->filterByActionlink(['foo', 'bar']); // WHERE actionlink IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $actionlink The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByActionlink($actionlink = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($actionlink)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UseractionsTableMap::COL_ACTIONLINK, $actionlink, $comparison);

        return $this;
    }

    /**
     * Filter the query on the rescheduledlink column
     *
     * Example usage:
     * <code>
     * $query->filterByRescheduledlink('fooValue');   // WHERE rescheduledlink = 'fooValue'
     * $query->filterByRescheduledlink('%fooValue%', Criteria::LIKE); // WHERE rescheduledlink LIKE '%fooValue%'
     * $query->filterByRescheduledlink(['foo', 'bar']); // WHERE rescheduledlink IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $rescheduledlink The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByRescheduledlink($rescheduledlink = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rescheduledlink)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UseractionsTableMap::COL_RESCHEDULEDLINK, $rescheduledlink, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildUseractions $useractions Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
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
    public function doDeleteAll(?ConnectionInterface $con = null): int
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
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(?ConnectionInterface $con = null): int
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

}
