<?php

namespace Base;

use \BillingQuery as ChildBillingQuery;
use \Exception;
use \PDO;
use Map\BillingTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;

/**
 * Base class that represents a row from the 'billing' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Billing implements ActiveRecordInterface
{
    /**
     * TableMap class name
     *
     * @var string
     */
    public const TABLE_MAP = '\\Map\\BillingTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var bool
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var bool
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = [];

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = [];

    /**
     * The value for the sessionid field.
     *
     * @var        string
     */
    protected $sessionid;

    /**
     * The value for the date field.
     *
     * @var        int|null
     */
    protected $date;

    /**
     * The value for the time field.
     *
     * @var        int|null
     */
    protected $time;

    /**
     * The value for the bconame field.
     *
     * @var        string|null
     */
    protected $bconame;

    /**
     * The value for the baddress field.
     *
     * @var        string|null
     */
    protected $baddress;

    /**
     * The value for the baddress2 field.
     *
     * @var        string|null
     */
    protected $baddress2;

    /**
     * The value for the bname field.
     *
     * @var        string|null
     */
    protected $bname;

    /**
     * The value for the bcity field.
     *
     * @var        string|null
     */
    protected $bcity;

    /**
     * The value for the bst field.
     *
     * @var        string|null
     */
    protected $bst;

    /**
     * The value for the bzip field.
     *
     * @var        string|null
     */
    protected $bzip;

    /**
     * The value for the bcountry field.
     *
     * @var        string|null
     */
    protected $bcountry;

    /**
     * The value for the sconame field.
     *
     * @var        string|null
     */
    protected $sconame;

    /**
     * The value for the sname field.
     *
     * @var        string|null
     */
    protected $sname;

    /**
     * The value for the saddress field.
     *
     * @var        string|null
     */
    protected $saddress;

    /**
     * The value for the saddress2 field.
     *
     * @var        string|null
     */
    protected $saddress2;

    /**
     * The value for the scity field.
     *
     * @var        string|null
     */
    protected $scity;

    /**
     * The value for the sst field.
     *
     * @var        string|null
     */
    protected $sst;

    /**
     * The value for the szip field.
     *
     * @var        string|null
     */
    protected $szip;

    /**
     * The value for the scountry field.
     *
     * @var        string|null
     */
    protected $scountry;

    /**
     * The value for the ccno field.
     *
     * @var        string|null
     */
    protected $ccno;

    /**
     * The value for the email field.
     *
     * @var        string|null
     */
    protected $email;

    /**
     * The value for the phone field.
     *
     * @var        string|null
     */
    protected $phone;

    /**
     * The value for the vc field.
     *
     * @var        string|null
     */
    protected $vc;

    /**
     * The value for the error field.
     *
     * @var        string|null
     */
    protected $error;

    /**
     * The value for the ermes field.
     *
     * @var        string|null
     */
    protected $ermes;

    /**
     * The value for the orders field.
     *
     * @var        string|null
     */
    protected $orders;

    /**
     * The value for the xpdate field.
     *
     * @var        string|null
     */
    protected $xpdate;

    /**
     * The value for the pono field.
     *
     * @var        string|null
     */
    protected $pono;

    /**
     * The value for the paymenttype field.
     *
     * @var        string|null
     */
    protected $paymenttype;

    /**
     * The value for the shipmeth field.
     *
     * @var        string|null
     */
    protected $shipmeth;

    /**
     * The value for the shipcom field.
     *
     * @var        string|null
     */
    protected $shipcom;

    /**
     * The value for the note field.
     *
     * @var        string|null
     */
    protected $note;

    /**
     * The value for the termtype field.
     *
     * @var        string|null
     */
    protected $termtype;

    /**
     * The value for the custid field.
     *
     * @var        string|null
     */
    protected $custid;

    /**
     * The value for the shiptoid field.
     *
     * @var        string|null
     */
    protected $shiptoid;

    /**
     * The value for the baddress3 field.
     *
     * @var        string|null
     */
    protected $baddress3;

    /**
     * The value for the saddress3 field.
     *
     * @var        string|null
     */
    protected $saddress3;

    /**
     * The value for the newnbr field.
     *
     * @var        string|null
     */
    protected $newnbr;

    /**
     * The value for the faxnbr field.
     *
     * @var        string|null
     */
    protected $faxnbr;

    /**
     * The value for the rqstdate field.
     *
     * @var        string|null
     */
    protected $rqstdate;

    /**
     * The value for the dummy field.
     *
     * @var        string|null
     */
    protected $dummy;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var bool
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of Base\Billing object.
     */
    public function __construct()
    {
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return bool True if the object has been modified.
     */
    public function isModified(): bool
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param string $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return bool True if $col has been modified.
     */
    public function isColumnModified(string $col): bool
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns(): array
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return bool True, if the object has never been persisted.
     */
    public function isNew(): bool
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param bool $b the state of the object.
     */
    public function setNew(bool $b): void
    {
        $this->new = $b;
    }

    /**
     * Whether this object has been deleted.
     * @return bool The deleted state of this object.
     */
    public function isDeleted(): bool
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param bool $b The deleted state of this object.
     * @return void
     */
    public function setDeleted(bool $b): void
    {
        $this->deleted = $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified(?string $col = null): void
    {
        if (null !== $col) {
            unset($this->modifiedColumns[$col]);
        } else {
            $this->modifiedColumns = [];
        }
    }

    /**
     * Compares this with another <code>Billing</code> instance.  If
     * <code>obj</code> is an instance of <code>Billing</code>, delegates to
     * <code>equals(Billing)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param mixed $obj The object to compare to.
     * @return bool Whether equal to the object specified.
     */
    public function equals($obj): bool
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns(): array
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param string $name The virtual column name
     * @return bool
     */
    public function hasVirtualColumn(string $name): bool
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param string $name The virtual column name
     * @return mixed
     *
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function getVirtualColumn(string $name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of nonexistent virtual column `%s`.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name The virtual column name
     * @param mixed $value The value to give to the virtual column
     *
     * @return $this The current object, for fluid interface
     */
    public function setVirtualColumn(string $name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param string $msg
     * @param int $priority One of the Propel::LOG_* logging levels
     * @return void
     */
    protected function log(string $msg, int $priority = Propel::LOG_INFO): void
    {
        Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param \Propel\Runtime\Parser\AbstractParser|string $parser An AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param bool $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @param string $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME, TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM. Defaults to TableMap::TYPE_PHPNAME.
     * @return string The exported data
     */
    public function exportTo($parser, bool $includeLazyLoadColumns = true, string $keyType = TableMap::TYPE_PHPNAME): string
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray($keyType, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     *
     * @return array<string>
     */
    public function __sleep(): array
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [sessionid] column value.
     *
     * @return string
     */
    public function getSessionid()
    {
        return $this->sessionid;
    }

    /**
     * Get the [date] column value.
     *
     * @return int|null
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Get the [time] column value.
     *
     * @return int|null
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Get the [bconame] column value.
     *
     * @return string|null
     */
    public function getBconame()
    {
        return $this->bconame;
    }

    /**
     * Get the [baddress] column value.
     *
     * @return string|null
     */
    public function getBaddress()
    {
        return $this->baddress;
    }

    /**
     * Get the [baddress2] column value.
     *
     * @return string|null
     */
    public function getBaddress2()
    {
        return $this->baddress2;
    }

    /**
     * Get the [bname] column value.
     *
     * @return string|null
     */
    public function getBname()
    {
        return $this->bname;
    }

    /**
     * Get the [bcity] column value.
     *
     * @return string|null
     */
    public function getBcity()
    {
        return $this->bcity;
    }

    /**
     * Get the [bst] column value.
     *
     * @return string|null
     */
    public function getBst()
    {
        return $this->bst;
    }

    /**
     * Get the [bzip] column value.
     *
     * @return string|null
     */
    public function getBzip()
    {
        return $this->bzip;
    }

    /**
     * Get the [bcountry] column value.
     *
     * @return string|null
     */
    public function getBcountry()
    {
        return $this->bcountry;
    }

    /**
     * Get the [sconame] column value.
     *
     * @return string|null
     */
    public function getSconame()
    {
        return $this->sconame;
    }

    /**
     * Get the [sname] column value.
     *
     * @return string|null
     */
    public function getSname()
    {
        return $this->sname;
    }

    /**
     * Get the [saddress] column value.
     *
     * @return string|null
     */
    public function getSaddress()
    {
        return $this->saddress;
    }

    /**
     * Get the [saddress2] column value.
     *
     * @return string|null
     */
    public function getSaddress2()
    {
        return $this->saddress2;
    }

    /**
     * Get the [scity] column value.
     *
     * @return string|null
     */
    public function getScity()
    {
        return $this->scity;
    }

    /**
     * Get the [sst] column value.
     *
     * @return string|null
     */
    public function getSst()
    {
        return $this->sst;
    }

    /**
     * Get the [szip] column value.
     *
     * @return string|null
     */
    public function getSzip()
    {
        return $this->szip;
    }

    /**
     * Get the [scountry] column value.
     *
     * @return string|null
     */
    public function getScountry()
    {
        return $this->scountry;
    }

    /**
     * Get the [ccno] column value.
     *
     * @return string|null
     */
    public function getCcno()
    {
        return $this->ccno;
    }

    /**
     * Get the [email] column value.
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the [phone] column value.
     *
     * @return string|null
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Get the [vc] column value.
     *
     * @return string|null
     */
    public function getVc()
    {
        return $this->vc;
    }

    /**
     * Get the [error] column value.
     *
     * @return string|null
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Get the [ermes] column value.
     *
     * @return string|null
     */
    public function getErmes()
    {
        return $this->ermes;
    }

    /**
     * Get the [orders] column value.
     *
     * @return string|null
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * Get the [xpdate] column value.
     *
     * @return string|null
     */
    public function getXpdate()
    {
        return $this->xpdate;
    }

    /**
     * Get the [pono] column value.
     *
     * @return string|null
     */
    public function getPono()
    {
        return $this->pono;
    }

    /**
     * Get the [paymenttype] column value.
     *
     * @return string|null
     */
    public function getPaymenttype()
    {
        return $this->paymenttype;
    }

    /**
     * Get the [shipmeth] column value.
     *
     * @return string|null
     */
    public function getShipmeth()
    {
        return $this->shipmeth;
    }

    /**
     * Get the [shipcom] column value.
     *
     * @return string|null
     */
    public function getShipcom()
    {
        return $this->shipcom;
    }

    /**
     * Get the [note] column value.
     *
     * @return string|null
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Get the [termtype] column value.
     *
     * @return string|null
     */
    public function getTermtype()
    {
        return $this->termtype;
    }

    /**
     * Get the [custid] column value.
     *
     * @return string|null
     */
    public function getCustid()
    {
        return $this->custid;
    }

    /**
     * Get the [shiptoid] column value.
     *
     * @return string|null
     */
    public function getShiptoid()
    {
        return $this->shiptoid;
    }

    /**
     * Get the [baddress3] column value.
     *
     * @return string|null
     */
    public function getBaddress3()
    {
        return $this->baddress3;
    }

    /**
     * Get the [saddress3] column value.
     *
     * @return string|null
     */
    public function getSaddress3()
    {
        return $this->saddress3;
    }

    /**
     * Get the [newnbr] column value.
     *
     * @return string|null
     */
    public function getNewnbr()
    {
        return $this->newnbr;
    }

    /**
     * Get the [faxnbr] column value.
     *
     * @return string|null
     */
    public function getFaxnbr()
    {
        return $this->faxnbr;
    }

    /**
     * Get the [rqstdate] column value.
     *
     * @return string|null
     */
    public function getRqstdate()
    {
        return $this->rqstdate;
    }

    /**
     * Get the [dummy] column value.
     *
     * @return string|null
     */
    public function getDummy()
    {
        return $this->dummy;
    }

    /**
     * Set the value of [sessionid] column.
     *
     * @param string $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setSessionid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sessionid !== $v) {
            $this->sessionid = $v;
            $this->modifiedColumns[BillingTableMap::COL_SESSIONID] = true;
        }

        return $this;
    }

    /**
     * Set the value of [date] column.
     *
     * @param int|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setDate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->date !== $v) {
            $this->date = $v;
            $this->modifiedColumns[BillingTableMap::COL_DATE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [time] column.
     *
     * @param int|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setTime($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->time !== $v) {
            $this->time = $v;
            $this->modifiedColumns[BillingTableMap::COL_TIME] = true;
        }

        return $this;
    }

    /**
     * Set the value of [bconame] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setBconame($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bconame !== $v) {
            $this->bconame = $v;
            $this->modifiedColumns[BillingTableMap::COL_BCONAME] = true;
        }

        return $this;
    }

    /**
     * Set the value of [baddress] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setBaddress($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->baddress !== $v) {
            $this->baddress = $v;
            $this->modifiedColumns[BillingTableMap::COL_BADDRESS] = true;
        }

        return $this;
    }

    /**
     * Set the value of [baddress2] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setBaddress2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->baddress2 !== $v) {
            $this->baddress2 = $v;
            $this->modifiedColumns[BillingTableMap::COL_BADDRESS2] = true;
        }

        return $this;
    }

    /**
     * Set the value of [bname] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setBname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bname !== $v) {
            $this->bname = $v;
            $this->modifiedColumns[BillingTableMap::COL_BNAME] = true;
        }

        return $this;
    }

    /**
     * Set the value of [bcity] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setBcity($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bcity !== $v) {
            $this->bcity = $v;
            $this->modifiedColumns[BillingTableMap::COL_BCITY] = true;
        }

        return $this;
    }

    /**
     * Set the value of [bst] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setBst($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bst !== $v) {
            $this->bst = $v;
            $this->modifiedColumns[BillingTableMap::COL_BST] = true;
        }

        return $this;
    }

    /**
     * Set the value of [bzip] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setBzip($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bzip !== $v) {
            $this->bzip = $v;
            $this->modifiedColumns[BillingTableMap::COL_BZIP] = true;
        }

        return $this;
    }

    /**
     * Set the value of [bcountry] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setBcountry($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->bcountry !== $v) {
            $this->bcountry = $v;
            $this->modifiedColumns[BillingTableMap::COL_BCOUNTRY] = true;
        }

        return $this;
    }

    /**
     * Set the value of [sconame] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setSconame($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sconame !== $v) {
            $this->sconame = $v;
            $this->modifiedColumns[BillingTableMap::COL_SCONAME] = true;
        }

        return $this;
    }

    /**
     * Set the value of [sname] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setSname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sname !== $v) {
            $this->sname = $v;
            $this->modifiedColumns[BillingTableMap::COL_SNAME] = true;
        }

        return $this;
    }

    /**
     * Set the value of [saddress] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setSaddress($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->saddress !== $v) {
            $this->saddress = $v;
            $this->modifiedColumns[BillingTableMap::COL_SADDRESS] = true;
        }

        return $this;
    }

    /**
     * Set the value of [saddress2] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setSaddress2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->saddress2 !== $v) {
            $this->saddress2 = $v;
            $this->modifiedColumns[BillingTableMap::COL_SADDRESS2] = true;
        }

        return $this;
    }

    /**
     * Set the value of [scity] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setScity($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->scity !== $v) {
            $this->scity = $v;
            $this->modifiedColumns[BillingTableMap::COL_SCITY] = true;
        }

        return $this;
    }

    /**
     * Set the value of [sst] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setSst($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sst !== $v) {
            $this->sst = $v;
            $this->modifiedColumns[BillingTableMap::COL_SST] = true;
        }

        return $this;
    }

    /**
     * Set the value of [szip] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setSzip($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->szip !== $v) {
            $this->szip = $v;
            $this->modifiedColumns[BillingTableMap::COL_SZIP] = true;
        }

        return $this;
    }

    /**
     * Set the value of [scountry] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setScountry($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->scountry !== $v) {
            $this->scountry = $v;
            $this->modifiedColumns[BillingTableMap::COL_SCOUNTRY] = true;
        }

        return $this;
    }

    /**
     * Set the value of [ccno] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setCcno($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ccno !== $v) {
            $this->ccno = $v;
            $this->modifiedColumns[BillingTableMap::COL_CCNO] = true;
        }

        return $this;
    }

    /**
     * Set the value of [email] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[BillingTableMap::COL_EMAIL] = true;
        }

        return $this;
    }

    /**
     * Set the value of [phone] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPhone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->phone !== $v) {
            $this->phone = $v;
            $this->modifiedColumns[BillingTableMap::COL_PHONE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [vc] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setVc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->vc !== $v) {
            $this->vc = $v;
            $this->modifiedColumns[BillingTableMap::COL_VC] = true;
        }

        return $this;
    }

    /**
     * Set the value of [error] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setError($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->error !== $v) {
            $this->error = $v;
            $this->modifiedColumns[BillingTableMap::COL_ERROR] = true;
        }

        return $this;
    }

    /**
     * Set the value of [ermes] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setErmes($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ermes !== $v) {
            $this->ermes = $v;
            $this->modifiedColumns[BillingTableMap::COL_ERMES] = true;
        }

        return $this;
    }

    /**
     * Set the value of [orders] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setOrders($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->orders !== $v) {
            $this->orders = $v;
            $this->modifiedColumns[BillingTableMap::COL_ORDERS] = true;
        }

        return $this;
    }

    /**
     * Set the value of [xpdate] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setXpdate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->xpdate !== $v) {
            $this->xpdate = $v;
            $this->modifiedColumns[BillingTableMap::COL_XPDATE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [pono] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPono($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pono !== $v) {
            $this->pono = $v;
            $this->modifiedColumns[BillingTableMap::COL_PONO] = true;
        }

        return $this;
    }

    /**
     * Set the value of [paymenttype] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setPaymenttype($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->paymenttype !== $v) {
            $this->paymenttype = $v;
            $this->modifiedColumns[BillingTableMap::COL_PAYMENTTYPE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [shipmeth] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setShipmeth($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipmeth !== $v) {
            $this->shipmeth = $v;
            $this->modifiedColumns[BillingTableMap::COL_SHIPMETH] = true;
        }

        return $this;
    }

    /**
     * Set the value of [shipcom] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setShipcom($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipcom !== $v) {
            $this->shipcom = $v;
            $this->modifiedColumns[BillingTableMap::COL_SHIPCOM] = true;
        }

        return $this;
    }

    /**
     * Set the value of [note] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setNote($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->note !== $v) {
            $this->note = $v;
            $this->modifiedColumns[BillingTableMap::COL_NOTE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [termtype] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setTermtype($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->termtype !== $v) {
            $this->termtype = $v;
            $this->modifiedColumns[BillingTableMap::COL_TERMTYPE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [custid] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setCustid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->custid !== $v) {
            $this->custid = $v;
            $this->modifiedColumns[BillingTableMap::COL_CUSTID] = true;
        }

        return $this;
    }

    /**
     * Set the value of [shiptoid] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setShiptoid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shiptoid !== $v) {
            $this->shiptoid = $v;
            $this->modifiedColumns[BillingTableMap::COL_SHIPTOID] = true;
        }

        return $this;
    }

    /**
     * Set the value of [baddress3] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setBaddress3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->baddress3 !== $v) {
            $this->baddress3 = $v;
            $this->modifiedColumns[BillingTableMap::COL_BADDRESS3] = true;
        }

        return $this;
    }

    /**
     * Set the value of [saddress3] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setSaddress3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->saddress3 !== $v) {
            $this->saddress3 = $v;
            $this->modifiedColumns[BillingTableMap::COL_SADDRESS3] = true;
        }

        return $this;
    }

    /**
     * Set the value of [newnbr] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setNewnbr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->newnbr !== $v) {
            $this->newnbr = $v;
            $this->modifiedColumns[BillingTableMap::COL_NEWNBR] = true;
        }

        return $this;
    }

    /**
     * Set the value of [faxnbr] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setFaxnbr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->faxnbr !== $v) {
            $this->faxnbr = $v;
            $this->modifiedColumns[BillingTableMap::COL_FAXNBR] = true;
        }

        return $this;
    }

    /**
     * Set the value of [rqstdate] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setRqstdate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->rqstdate !== $v) {
            $this->rqstdate = $v;
            $this->modifiedColumns[BillingTableMap::COL_RQSTDATE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [dummy] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setDummy($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dummy !== $v) {
            $this->dummy = $v;
            $this->modifiedColumns[BillingTableMap::COL_DUMMY] = true;
        }

        return $this;
    }

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return bool Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues(): bool
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    }

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array $row The row returned by DataFetcher->fetch().
     * @param int $startcol 0-based offset column which indicates which resultset column to start with.
     * @param bool $rehydrate Whether this object is being re-hydrated from the database.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int next starting column
     * @throws \Propel\Runtime\Exception\PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate(array $row, int $startcol = 0, bool $rehydrate = false, string $indexType = TableMap::TYPE_NUM): int
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : BillingTableMap::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sessionid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : BillingTableMap::translateFieldName('Date', TableMap::TYPE_PHPNAME, $indexType)];
            $this->date = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : BillingTableMap::translateFieldName('Time', TableMap::TYPE_PHPNAME, $indexType)];
            $this->time = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : BillingTableMap::translateFieldName('Bconame', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bconame = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : BillingTableMap::translateFieldName('Baddress', TableMap::TYPE_PHPNAME, $indexType)];
            $this->baddress = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : BillingTableMap::translateFieldName('Baddress2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->baddress2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : BillingTableMap::translateFieldName('Bname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : BillingTableMap::translateFieldName('Bcity', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bcity = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : BillingTableMap::translateFieldName('Bst', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bst = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : BillingTableMap::translateFieldName('Bzip', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bzip = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : BillingTableMap::translateFieldName('Bcountry', TableMap::TYPE_PHPNAME, $indexType)];
            $this->bcountry = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : BillingTableMap::translateFieldName('Sconame', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sconame = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : BillingTableMap::translateFieldName('Sname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : BillingTableMap::translateFieldName('Saddress', TableMap::TYPE_PHPNAME, $indexType)];
            $this->saddress = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : BillingTableMap::translateFieldName('Saddress2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->saddress2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : BillingTableMap::translateFieldName('Scity', TableMap::TYPE_PHPNAME, $indexType)];
            $this->scity = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : BillingTableMap::translateFieldName('Sst', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sst = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : BillingTableMap::translateFieldName('Szip', TableMap::TYPE_PHPNAME, $indexType)];
            $this->szip = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : BillingTableMap::translateFieldName('Scountry', TableMap::TYPE_PHPNAME, $indexType)];
            $this->scountry = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : BillingTableMap::translateFieldName('Ccno', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ccno = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : BillingTableMap::translateFieldName('Email', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : BillingTableMap::translateFieldName('Phone', TableMap::TYPE_PHPNAME, $indexType)];
            $this->phone = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : BillingTableMap::translateFieldName('Vc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->vc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : BillingTableMap::translateFieldName('Error', TableMap::TYPE_PHPNAME, $indexType)];
            $this->error = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : BillingTableMap::translateFieldName('Ermes', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ermes = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : BillingTableMap::translateFieldName('Orders', TableMap::TYPE_PHPNAME, $indexType)];
            $this->orders = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : BillingTableMap::translateFieldName('Xpdate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->xpdate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : BillingTableMap::translateFieldName('Pono', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pono = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 28 + $startcol : BillingTableMap::translateFieldName('Paymenttype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->paymenttype = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 29 + $startcol : BillingTableMap::translateFieldName('Shipmeth', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipmeth = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 30 + $startcol : BillingTableMap::translateFieldName('Shipcom', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipcom = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 31 + $startcol : BillingTableMap::translateFieldName('Note', TableMap::TYPE_PHPNAME, $indexType)];
            $this->note = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 32 + $startcol : BillingTableMap::translateFieldName('Termtype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->termtype = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 33 + $startcol : BillingTableMap::translateFieldName('Custid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->custid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 34 + $startcol : BillingTableMap::translateFieldName('Shiptoid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shiptoid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 35 + $startcol : BillingTableMap::translateFieldName('Baddress3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->baddress3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 36 + $startcol : BillingTableMap::translateFieldName('Saddress3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->saddress3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 37 + $startcol : BillingTableMap::translateFieldName('Newnbr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->newnbr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 38 + $startcol : BillingTableMap::translateFieldName('Faxnbr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->faxnbr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 39 + $startcol : BillingTableMap::translateFieldName('Rqstdate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rqstdate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 40 + $startcol : BillingTableMap::translateFieldName('Dummy', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dummy = (null !== $col) ? (string) $col : null;

            $this->resetModified();
            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 41; // 41 = BillingTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Billing'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws \Propel\Runtime\Exception\PropelException
     * @return void
     */
    public function ensureConsistency(): void
    {
    }

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param bool $deep (optional) Whether to also de-associated any related objects.
     * @param ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws \Propel\Runtime\Exception\PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload(bool $deep = false, ?ConnectionInterface $con = null): void
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(BillingTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildBillingQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param ConnectionInterface $con
     * @return void
     * @throws \Propel\Runtime\Exception\PropelException
     * @see Billing::setDeleted()
     * @see Billing::isDeleted()
     */
    public function delete(?ConnectionInterface $con = null): void
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(BillingTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildBillingQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param ConnectionInterface $con
     * @return int The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws \Propel\Runtime\Exception\PropelException
     * @see doSave()
     */
    public function save(?ConnectionInterface $con = null): int
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(BillingTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                BillingTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param ConnectionInterface $con
     * @return int The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws \Propel\Runtime\Exception\PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con): int
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    }

    /**
     * Insert the row in the database.
     *
     * @param ConnectionInterface $con
     *
     * @throws \Propel\Runtime\Exception\PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con): void
    {
        $modifiedColumns = [];
        $index = 0;


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(BillingTableMap::COL_SESSIONID)) {
            $modifiedColumns[':p' . $index++]  = 'sessionid';
        }
        if ($this->isColumnModified(BillingTableMap::COL_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'date';
        }
        if ($this->isColumnModified(BillingTableMap::COL_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'time';
        }
        if ($this->isColumnModified(BillingTableMap::COL_BCONAME)) {
            $modifiedColumns[':p' . $index++]  = 'bconame';
        }
        if ($this->isColumnModified(BillingTableMap::COL_BADDRESS)) {
            $modifiedColumns[':p' . $index++]  = 'baddress';
        }
        if ($this->isColumnModified(BillingTableMap::COL_BADDRESS2)) {
            $modifiedColumns[':p' . $index++]  = 'baddress2';
        }
        if ($this->isColumnModified(BillingTableMap::COL_BNAME)) {
            $modifiedColumns[':p' . $index++]  = 'bname';
        }
        if ($this->isColumnModified(BillingTableMap::COL_BCITY)) {
            $modifiedColumns[':p' . $index++]  = 'bcity';
        }
        if ($this->isColumnModified(BillingTableMap::COL_BST)) {
            $modifiedColumns[':p' . $index++]  = 'bst';
        }
        if ($this->isColumnModified(BillingTableMap::COL_BZIP)) {
            $modifiedColumns[':p' . $index++]  = 'bzip';
        }
        if ($this->isColumnModified(BillingTableMap::COL_BCOUNTRY)) {
            $modifiedColumns[':p' . $index++]  = 'bcountry';
        }
        if ($this->isColumnModified(BillingTableMap::COL_SCONAME)) {
            $modifiedColumns[':p' . $index++]  = 'sconame';
        }
        if ($this->isColumnModified(BillingTableMap::COL_SNAME)) {
            $modifiedColumns[':p' . $index++]  = 'sname';
        }
        if ($this->isColumnModified(BillingTableMap::COL_SADDRESS)) {
            $modifiedColumns[':p' . $index++]  = 'saddress';
        }
        if ($this->isColumnModified(BillingTableMap::COL_SADDRESS2)) {
            $modifiedColumns[':p' . $index++]  = 'saddress2';
        }
        if ($this->isColumnModified(BillingTableMap::COL_SCITY)) {
            $modifiedColumns[':p' . $index++]  = 'scity';
        }
        if ($this->isColumnModified(BillingTableMap::COL_SST)) {
            $modifiedColumns[':p' . $index++]  = 'sst';
        }
        if ($this->isColumnModified(BillingTableMap::COL_SZIP)) {
            $modifiedColumns[':p' . $index++]  = 'szip';
        }
        if ($this->isColumnModified(BillingTableMap::COL_SCOUNTRY)) {
            $modifiedColumns[':p' . $index++]  = 'scountry';
        }
        if ($this->isColumnModified(BillingTableMap::COL_CCNO)) {
            $modifiedColumns[':p' . $index++]  = 'ccno';
        }
        if ($this->isColumnModified(BillingTableMap::COL_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'email';
        }
        if ($this->isColumnModified(BillingTableMap::COL_PHONE)) {
            $modifiedColumns[':p' . $index++]  = 'phone';
        }
        if ($this->isColumnModified(BillingTableMap::COL_VC)) {
            $modifiedColumns[':p' . $index++]  = 'vc';
        }
        if ($this->isColumnModified(BillingTableMap::COL_ERROR)) {
            $modifiedColumns[':p' . $index++]  = 'error';
        }
        if ($this->isColumnModified(BillingTableMap::COL_ERMES)) {
            $modifiedColumns[':p' . $index++]  = 'ermes';
        }
        if ($this->isColumnModified(BillingTableMap::COL_ORDERS)) {
            $modifiedColumns[':p' . $index++]  = 'orders';
        }
        if ($this->isColumnModified(BillingTableMap::COL_XPDATE)) {
            $modifiedColumns[':p' . $index++]  = 'xpdate';
        }
        if ($this->isColumnModified(BillingTableMap::COL_PONO)) {
            $modifiedColumns[':p' . $index++]  = 'pono';
        }
        if ($this->isColumnModified(BillingTableMap::COL_PAYMENTTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'paymenttype';
        }
        if ($this->isColumnModified(BillingTableMap::COL_SHIPMETH)) {
            $modifiedColumns[':p' . $index++]  = 'shipmeth';
        }
        if ($this->isColumnModified(BillingTableMap::COL_SHIPCOM)) {
            $modifiedColumns[':p' . $index++]  = 'shipcom';
        }
        if ($this->isColumnModified(BillingTableMap::COL_NOTE)) {
            $modifiedColumns[':p' . $index++]  = 'note';
        }
        if ($this->isColumnModified(BillingTableMap::COL_TERMTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'termtype';
        }
        if ($this->isColumnModified(BillingTableMap::COL_CUSTID)) {
            $modifiedColumns[':p' . $index++]  = 'custid';
        }
        if ($this->isColumnModified(BillingTableMap::COL_SHIPTOID)) {
            $modifiedColumns[':p' . $index++]  = 'shiptoid';
        }
        if ($this->isColumnModified(BillingTableMap::COL_BADDRESS3)) {
            $modifiedColumns[':p' . $index++]  = 'baddress3';
        }
        if ($this->isColumnModified(BillingTableMap::COL_SADDRESS3)) {
            $modifiedColumns[':p' . $index++]  = 'saddress3';
        }
        if ($this->isColumnModified(BillingTableMap::COL_NEWNBR)) {
            $modifiedColumns[':p' . $index++]  = 'newnbr';
        }
        if ($this->isColumnModified(BillingTableMap::COL_FAXNBR)) {
            $modifiedColumns[':p' . $index++]  = 'faxnbr';
        }
        if ($this->isColumnModified(BillingTableMap::COL_RQSTDATE)) {
            $modifiedColumns[':p' . $index++]  = 'rqstdate';
        }
        if ($this->isColumnModified(BillingTableMap::COL_DUMMY)) {
            $modifiedColumns[':p' . $index++]  = 'dummy';
        }

        $sql = sprintf(
            'INSERT INTO billing (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'sessionid':
                        $stmt->bindValue($identifier, $this->sessionid, PDO::PARAM_STR);

                        break;
                    case 'date':
                        $stmt->bindValue($identifier, $this->date, PDO::PARAM_INT);

                        break;
                    case 'time':
                        $stmt->bindValue($identifier, $this->time, PDO::PARAM_INT);

                        break;
                    case 'bconame':
                        $stmt->bindValue($identifier, $this->bconame, PDO::PARAM_STR);

                        break;
                    case 'baddress':
                        $stmt->bindValue($identifier, $this->baddress, PDO::PARAM_STR);

                        break;
                    case 'baddress2':
                        $stmt->bindValue($identifier, $this->baddress2, PDO::PARAM_STR);

                        break;
                    case 'bname':
                        $stmt->bindValue($identifier, $this->bname, PDO::PARAM_STR);

                        break;
                    case 'bcity':
                        $stmt->bindValue($identifier, $this->bcity, PDO::PARAM_STR);

                        break;
                    case 'bst':
                        $stmt->bindValue($identifier, $this->bst, PDO::PARAM_STR);

                        break;
                    case 'bzip':
                        $stmt->bindValue($identifier, $this->bzip, PDO::PARAM_STR);

                        break;
                    case 'bcountry':
                        $stmt->bindValue($identifier, $this->bcountry, PDO::PARAM_STR);

                        break;
                    case 'sconame':
                        $stmt->bindValue($identifier, $this->sconame, PDO::PARAM_STR);

                        break;
                    case 'sname':
                        $stmt->bindValue($identifier, $this->sname, PDO::PARAM_STR);

                        break;
                    case 'saddress':
                        $stmt->bindValue($identifier, $this->saddress, PDO::PARAM_STR);

                        break;
                    case 'saddress2':
                        $stmt->bindValue($identifier, $this->saddress2, PDO::PARAM_STR);

                        break;
                    case 'scity':
                        $stmt->bindValue($identifier, $this->scity, PDO::PARAM_STR);

                        break;
                    case 'sst':
                        $stmt->bindValue($identifier, $this->sst, PDO::PARAM_STR);

                        break;
                    case 'szip':
                        $stmt->bindValue($identifier, $this->szip, PDO::PARAM_STR);

                        break;
                    case 'scountry':
                        $stmt->bindValue($identifier, $this->scountry, PDO::PARAM_STR);

                        break;
                    case 'ccno':
                        $stmt->bindValue($identifier, $this->ccno, PDO::PARAM_STR);

                        break;
                    case 'email':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);

                        break;
                    case 'phone':
                        $stmt->bindValue($identifier, $this->phone, PDO::PARAM_STR);

                        break;
                    case 'vc':
                        $stmt->bindValue($identifier, $this->vc, PDO::PARAM_STR);

                        break;
                    case 'error':
                        $stmt->bindValue($identifier, $this->error, PDO::PARAM_STR);

                        break;
                    case 'ermes':
                        $stmt->bindValue($identifier, $this->ermes, PDO::PARAM_STR);

                        break;
                    case 'orders':
                        $stmt->bindValue($identifier, $this->orders, PDO::PARAM_STR);

                        break;
                    case 'xpdate':
                        $stmt->bindValue($identifier, $this->xpdate, PDO::PARAM_STR);

                        break;
                    case 'pono':
                        $stmt->bindValue($identifier, $this->pono, PDO::PARAM_STR);

                        break;
                    case 'paymenttype':
                        $stmt->bindValue($identifier, $this->paymenttype, PDO::PARAM_STR);

                        break;
                    case 'shipmeth':
                        $stmt->bindValue($identifier, $this->shipmeth, PDO::PARAM_STR);

                        break;
                    case 'shipcom':
                        $stmt->bindValue($identifier, $this->shipcom, PDO::PARAM_STR);

                        break;
                    case 'note':
                        $stmt->bindValue($identifier, $this->note, PDO::PARAM_STR);

                        break;
                    case 'termtype':
                        $stmt->bindValue($identifier, $this->termtype, PDO::PARAM_STR);

                        break;
                    case 'custid':
                        $stmt->bindValue($identifier, $this->custid, PDO::PARAM_STR);

                        break;
                    case 'shiptoid':
                        $stmt->bindValue($identifier, $this->shiptoid, PDO::PARAM_STR);

                        break;
                    case 'baddress3':
                        $stmt->bindValue($identifier, $this->baddress3, PDO::PARAM_STR);

                        break;
                    case 'saddress3':
                        $stmt->bindValue($identifier, $this->saddress3, PDO::PARAM_STR);

                        break;
                    case 'newnbr':
                        $stmt->bindValue($identifier, $this->newnbr, PDO::PARAM_STR);

                        break;
                    case 'faxnbr':
                        $stmt->bindValue($identifier, $this->faxnbr, PDO::PARAM_STR);

                        break;
                    case 'rqstdate':
                        $stmt->bindValue($identifier, $this->rqstdate, PDO::PARAM_STR);

                        break;
                    case 'dummy':
                        $stmt->bindValue($identifier, $this->dummy, PDO::PARAM_STR);

                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param ConnectionInterface $con
     *
     * @return int Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con): int
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName(string $name, string $type = TableMap::TYPE_PHPNAME)
    {
        $pos = BillingTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos Position in XML schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition(int $pos)
    {
        switch ($pos) {
            case 0:
                return $this->getSessionid();

            case 1:
                return $this->getDate();

            case 2:
                return $this->getTime();

            case 3:
                return $this->getBconame();

            case 4:
                return $this->getBaddress();

            case 5:
                return $this->getBaddress2();

            case 6:
                return $this->getBname();

            case 7:
                return $this->getBcity();

            case 8:
                return $this->getBst();

            case 9:
                return $this->getBzip();

            case 10:
                return $this->getBcountry();

            case 11:
                return $this->getSconame();

            case 12:
                return $this->getSname();

            case 13:
                return $this->getSaddress();

            case 14:
                return $this->getSaddress2();

            case 15:
                return $this->getScity();

            case 16:
                return $this->getSst();

            case 17:
                return $this->getSzip();

            case 18:
                return $this->getScountry();

            case 19:
                return $this->getCcno();

            case 20:
                return $this->getEmail();

            case 21:
                return $this->getPhone();

            case 22:
                return $this->getVc();

            case 23:
                return $this->getError();

            case 24:
                return $this->getErmes();

            case 25:
                return $this->getOrders();

            case 26:
                return $this->getXpdate();

            case 27:
                return $this->getPono();

            case 28:
                return $this->getPaymenttype();

            case 29:
                return $this->getShipmeth();

            case 30:
                return $this->getShipcom();

            case 31:
                return $this->getNote();

            case 32:
                return $this->getTermtype();

            case 33:
                return $this->getCustid();

            case 34:
                return $this->getShiptoid();

            case 35:
                return $this->getBaddress3();

            case 36:
                return $this->getSaddress3();

            case 37:
                return $this->getNewnbr();

            case 38:
                return $this->getFaxnbr();

            case 39:
                return $this->getRqstdate();

            case 40:
                return $this->getDummy();

            default:
                return null;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param string $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param bool $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param array $alreadyDumpedObjects List of objects to skip to avoid recursion
     *
     * @return array An associative array containing the field names (as keys) and field values
     */
    public function toArray(string $keyType = TableMap::TYPE_PHPNAME, bool $includeLazyLoadColumns = true, array $alreadyDumpedObjects = []): array
    {
        if (isset($alreadyDumpedObjects['Billing'][$this->hashCode()])) {
            return ['*RECURSION*'];
        }
        $alreadyDumpedObjects['Billing'][$this->hashCode()] = true;
        $keys = BillingTableMap::getFieldNames($keyType);
        $result = [
            $keys[0] => $this->getSessionid(),
            $keys[1] => $this->getDate(),
            $keys[2] => $this->getTime(),
            $keys[3] => $this->getBconame(),
            $keys[4] => $this->getBaddress(),
            $keys[5] => $this->getBaddress2(),
            $keys[6] => $this->getBname(),
            $keys[7] => $this->getBcity(),
            $keys[8] => $this->getBst(),
            $keys[9] => $this->getBzip(),
            $keys[10] => $this->getBcountry(),
            $keys[11] => $this->getSconame(),
            $keys[12] => $this->getSname(),
            $keys[13] => $this->getSaddress(),
            $keys[14] => $this->getSaddress2(),
            $keys[15] => $this->getScity(),
            $keys[16] => $this->getSst(),
            $keys[17] => $this->getSzip(),
            $keys[18] => $this->getScountry(),
            $keys[19] => $this->getCcno(),
            $keys[20] => $this->getEmail(),
            $keys[21] => $this->getPhone(),
            $keys[22] => $this->getVc(),
            $keys[23] => $this->getError(),
            $keys[24] => $this->getErmes(),
            $keys[25] => $this->getOrders(),
            $keys[26] => $this->getXpdate(),
            $keys[27] => $this->getPono(),
            $keys[28] => $this->getPaymenttype(),
            $keys[29] => $this->getShipmeth(),
            $keys[30] => $this->getShipcom(),
            $keys[31] => $this->getNote(),
            $keys[32] => $this->getTermtype(),
            $keys[33] => $this->getCustid(),
            $keys[34] => $this->getShiptoid(),
            $keys[35] => $this->getBaddress3(),
            $keys[36] => $this->getSaddress3(),
            $keys[37] => $this->getNewnbr(),
            $keys[38] => $this->getFaxnbr(),
            $keys[39] => $this->getRqstdate(),
            $keys[40] => $this->getDummy(),
        ];
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }


        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this
     */
    public function setByName(string $name, $value, string $type = TableMap::TYPE_PHPNAME)
    {
        $pos = BillingTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        $this->setByPosition($pos, $value);

        return $this;
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return $this
     */
    public function setByPosition(int $pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setSessionid($value);
                break;
            case 1:
                $this->setDate($value);
                break;
            case 2:
                $this->setTime($value);
                break;
            case 3:
                $this->setBconame($value);
                break;
            case 4:
                $this->setBaddress($value);
                break;
            case 5:
                $this->setBaddress2($value);
                break;
            case 6:
                $this->setBname($value);
                break;
            case 7:
                $this->setBcity($value);
                break;
            case 8:
                $this->setBst($value);
                break;
            case 9:
                $this->setBzip($value);
                break;
            case 10:
                $this->setBcountry($value);
                break;
            case 11:
                $this->setSconame($value);
                break;
            case 12:
                $this->setSname($value);
                break;
            case 13:
                $this->setSaddress($value);
                break;
            case 14:
                $this->setSaddress2($value);
                break;
            case 15:
                $this->setScity($value);
                break;
            case 16:
                $this->setSst($value);
                break;
            case 17:
                $this->setSzip($value);
                break;
            case 18:
                $this->setScountry($value);
                break;
            case 19:
                $this->setCcno($value);
                break;
            case 20:
                $this->setEmail($value);
                break;
            case 21:
                $this->setPhone($value);
                break;
            case 22:
                $this->setVc($value);
                break;
            case 23:
                $this->setError($value);
                break;
            case 24:
                $this->setErmes($value);
                break;
            case 25:
                $this->setOrders($value);
                break;
            case 26:
                $this->setXpdate($value);
                break;
            case 27:
                $this->setPono($value);
                break;
            case 28:
                $this->setPaymenttype($value);
                break;
            case 29:
                $this->setShipmeth($value);
                break;
            case 30:
                $this->setShipcom($value);
                break;
            case 31:
                $this->setNote($value);
                break;
            case 32:
                $this->setTermtype($value);
                break;
            case 33:
                $this->setCustid($value);
                break;
            case 34:
                $this->setShiptoid($value);
                break;
            case 35:
                $this->setBaddress3($value);
                break;
            case 36:
                $this->setSaddress3($value);
                break;
            case 37:
                $this->setNewnbr($value);
                break;
            case 38:
                $this->setFaxnbr($value);
                break;
            case 39:
                $this->setRqstdate($value);
                break;
            case 40:
                $this->setDummy($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param array $arr An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return $this
     */
    public function fromArray(array $arr, string $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = BillingTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setSessionid($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setDate($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setTime($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setBconame($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setBaddress($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setBaddress2($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setBname($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setBcity($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setBst($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setBzip($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setBcountry($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setSconame($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setSname($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setSaddress($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setSaddress2($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setScity($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setSst($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setSzip($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setScountry($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setCcno($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setEmail($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setPhone($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setVc($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setError($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setErmes($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setOrders($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setXpdate($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setPono($arr[$keys[27]]);
        }
        if (array_key_exists($keys[28], $arr)) {
            $this->setPaymenttype($arr[$keys[28]]);
        }
        if (array_key_exists($keys[29], $arr)) {
            $this->setShipmeth($arr[$keys[29]]);
        }
        if (array_key_exists($keys[30], $arr)) {
            $this->setShipcom($arr[$keys[30]]);
        }
        if (array_key_exists($keys[31], $arr)) {
            $this->setNote($arr[$keys[31]]);
        }
        if (array_key_exists($keys[32], $arr)) {
            $this->setTermtype($arr[$keys[32]]);
        }
        if (array_key_exists($keys[33], $arr)) {
            $this->setCustid($arr[$keys[33]]);
        }
        if (array_key_exists($keys[34], $arr)) {
            $this->setShiptoid($arr[$keys[34]]);
        }
        if (array_key_exists($keys[35], $arr)) {
            $this->setBaddress3($arr[$keys[35]]);
        }
        if (array_key_exists($keys[36], $arr)) {
            $this->setSaddress3($arr[$keys[36]]);
        }
        if (array_key_exists($keys[37], $arr)) {
            $this->setNewnbr($arr[$keys[37]]);
        }
        if (array_key_exists($keys[38], $arr)) {
            $this->setFaxnbr($arr[$keys[38]]);
        }
        if (array_key_exists($keys[39], $arr)) {
            $this->setRqstdate($arr[$keys[39]]);
        }
        if (array_key_exists($keys[40], $arr)) {
            $this->setDummy($arr[$keys[40]]);
        }

        return $this;
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this The current object, for fluid interface
     */
    public function importFrom($parser, string $data, string $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return \Propel\Runtime\ActiveQuery\Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria(): Criteria
    {
        $criteria = new Criteria(BillingTableMap::DATABASE_NAME);

        if ($this->isColumnModified(BillingTableMap::COL_SESSIONID)) {
            $criteria->add(BillingTableMap::COL_SESSIONID, $this->sessionid);
        }
        if ($this->isColumnModified(BillingTableMap::COL_DATE)) {
            $criteria->add(BillingTableMap::COL_DATE, $this->date);
        }
        if ($this->isColumnModified(BillingTableMap::COL_TIME)) {
            $criteria->add(BillingTableMap::COL_TIME, $this->time);
        }
        if ($this->isColumnModified(BillingTableMap::COL_BCONAME)) {
            $criteria->add(BillingTableMap::COL_BCONAME, $this->bconame);
        }
        if ($this->isColumnModified(BillingTableMap::COL_BADDRESS)) {
            $criteria->add(BillingTableMap::COL_BADDRESS, $this->baddress);
        }
        if ($this->isColumnModified(BillingTableMap::COL_BADDRESS2)) {
            $criteria->add(BillingTableMap::COL_BADDRESS2, $this->baddress2);
        }
        if ($this->isColumnModified(BillingTableMap::COL_BNAME)) {
            $criteria->add(BillingTableMap::COL_BNAME, $this->bname);
        }
        if ($this->isColumnModified(BillingTableMap::COL_BCITY)) {
            $criteria->add(BillingTableMap::COL_BCITY, $this->bcity);
        }
        if ($this->isColumnModified(BillingTableMap::COL_BST)) {
            $criteria->add(BillingTableMap::COL_BST, $this->bst);
        }
        if ($this->isColumnModified(BillingTableMap::COL_BZIP)) {
            $criteria->add(BillingTableMap::COL_BZIP, $this->bzip);
        }
        if ($this->isColumnModified(BillingTableMap::COL_BCOUNTRY)) {
            $criteria->add(BillingTableMap::COL_BCOUNTRY, $this->bcountry);
        }
        if ($this->isColumnModified(BillingTableMap::COL_SCONAME)) {
            $criteria->add(BillingTableMap::COL_SCONAME, $this->sconame);
        }
        if ($this->isColumnModified(BillingTableMap::COL_SNAME)) {
            $criteria->add(BillingTableMap::COL_SNAME, $this->sname);
        }
        if ($this->isColumnModified(BillingTableMap::COL_SADDRESS)) {
            $criteria->add(BillingTableMap::COL_SADDRESS, $this->saddress);
        }
        if ($this->isColumnModified(BillingTableMap::COL_SADDRESS2)) {
            $criteria->add(BillingTableMap::COL_SADDRESS2, $this->saddress2);
        }
        if ($this->isColumnModified(BillingTableMap::COL_SCITY)) {
            $criteria->add(BillingTableMap::COL_SCITY, $this->scity);
        }
        if ($this->isColumnModified(BillingTableMap::COL_SST)) {
            $criteria->add(BillingTableMap::COL_SST, $this->sst);
        }
        if ($this->isColumnModified(BillingTableMap::COL_SZIP)) {
            $criteria->add(BillingTableMap::COL_SZIP, $this->szip);
        }
        if ($this->isColumnModified(BillingTableMap::COL_SCOUNTRY)) {
            $criteria->add(BillingTableMap::COL_SCOUNTRY, $this->scountry);
        }
        if ($this->isColumnModified(BillingTableMap::COL_CCNO)) {
            $criteria->add(BillingTableMap::COL_CCNO, $this->ccno);
        }
        if ($this->isColumnModified(BillingTableMap::COL_EMAIL)) {
            $criteria->add(BillingTableMap::COL_EMAIL, $this->email);
        }
        if ($this->isColumnModified(BillingTableMap::COL_PHONE)) {
            $criteria->add(BillingTableMap::COL_PHONE, $this->phone);
        }
        if ($this->isColumnModified(BillingTableMap::COL_VC)) {
            $criteria->add(BillingTableMap::COL_VC, $this->vc);
        }
        if ($this->isColumnModified(BillingTableMap::COL_ERROR)) {
            $criteria->add(BillingTableMap::COL_ERROR, $this->error);
        }
        if ($this->isColumnModified(BillingTableMap::COL_ERMES)) {
            $criteria->add(BillingTableMap::COL_ERMES, $this->ermes);
        }
        if ($this->isColumnModified(BillingTableMap::COL_ORDERS)) {
            $criteria->add(BillingTableMap::COL_ORDERS, $this->orders);
        }
        if ($this->isColumnModified(BillingTableMap::COL_XPDATE)) {
            $criteria->add(BillingTableMap::COL_XPDATE, $this->xpdate);
        }
        if ($this->isColumnModified(BillingTableMap::COL_PONO)) {
            $criteria->add(BillingTableMap::COL_PONO, $this->pono);
        }
        if ($this->isColumnModified(BillingTableMap::COL_PAYMENTTYPE)) {
            $criteria->add(BillingTableMap::COL_PAYMENTTYPE, $this->paymenttype);
        }
        if ($this->isColumnModified(BillingTableMap::COL_SHIPMETH)) {
            $criteria->add(BillingTableMap::COL_SHIPMETH, $this->shipmeth);
        }
        if ($this->isColumnModified(BillingTableMap::COL_SHIPCOM)) {
            $criteria->add(BillingTableMap::COL_SHIPCOM, $this->shipcom);
        }
        if ($this->isColumnModified(BillingTableMap::COL_NOTE)) {
            $criteria->add(BillingTableMap::COL_NOTE, $this->note);
        }
        if ($this->isColumnModified(BillingTableMap::COL_TERMTYPE)) {
            $criteria->add(BillingTableMap::COL_TERMTYPE, $this->termtype);
        }
        if ($this->isColumnModified(BillingTableMap::COL_CUSTID)) {
            $criteria->add(BillingTableMap::COL_CUSTID, $this->custid);
        }
        if ($this->isColumnModified(BillingTableMap::COL_SHIPTOID)) {
            $criteria->add(BillingTableMap::COL_SHIPTOID, $this->shiptoid);
        }
        if ($this->isColumnModified(BillingTableMap::COL_BADDRESS3)) {
            $criteria->add(BillingTableMap::COL_BADDRESS3, $this->baddress3);
        }
        if ($this->isColumnModified(BillingTableMap::COL_SADDRESS3)) {
            $criteria->add(BillingTableMap::COL_SADDRESS3, $this->saddress3);
        }
        if ($this->isColumnModified(BillingTableMap::COL_NEWNBR)) {
            $criteria->add(BillingTableMap::COL_NEWNBR, $this->newnbr);
        }
        if ($this->isColumnModified(BillingTableMap::COL_FAXNBR)) {
            $criteria->add(BillingTableMap::COL_FAXNBR, $this->faxnbr);
        }
        if ($this->isColumnModified(BillingTableMap::COL_RQSTDATE)) {
            $criteria->add(BillingTableMap::COL_RQSTDATE, $this->rqstdate);
        }
        if ($this->isColumnModified(BillingTableMap::COL_DUMMY)) {
            $criteria->add(BillingTableMap::COL_DUMMY, $this->dummy);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return \Propel\Runtime\ActiveQuery\Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria(): Criteria
    {
        $criteria = ChildBillingQuery::create();
        $criteria->add(BillingTableMap::COL_SESSIONID, $this->sessionid);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int|string Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getSessionid();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getSessionid();
    }

    /**
     * Generic method to set the primary key (sessionid column).
     *
     * @param string|null $key Primary key.
     * @return void
     */
    public function setPrimaryKey(?string $key = null): void
    {
        $this->setSessionid($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     *
     * @return bool
     */
    public function isPrimaryKeyNull(): bool
    {
        return null === $this->getSessionid();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of \Billing (or compatible) type.
     * @param bool $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param bool $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws \Propel\Runtime\Exception\PropelException
     * @return void
     */
    public function copyInto(object $copyObj, bool $deepCopy = false, bool $makeNew = true): void
    {
        $copyObj->setSessionid($this->getSessionid());
        $copyObj->setDate($this->getDate());
        $copyObj->setTime($this->getTime());
        $copyObj->setBconame($this->getBconame());
        $copyObj->setBaddress($this->getBaddress());
        $copyObj->setBaddress2($this->getBaddress2());
        $copyObj->setBname($this->getBname());
        $copyObj->setBcity($this->getBcity());
        $copyObj->setBst($this->getBst());
        $copyObj->setBzip($this->getBzip());
        $copyObj->setBcountry($this->getBcountry());
        $copyObj->setSconame($this->getSconame());
        $copyObj->setSname($this->getSname());
        $copyObj->setSaddress($this->getSaddress());
        $copyObj->setSaddress2($this->getSaddress2());
        $copyObj->setScity($this->getScity());
        $copyObj->setSst($this->getSst());
        $copyObj->setSzip($this->getSzip());
        $copyObj->setScountry($this->getScountry());
        $copyObj->setCcno($this->getCcno());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setPhone($this->getPhone());
        $copyObj->setVc($this->getVc());
        $copyObj->setError($this->getError());
        $copyObj->setErmes($this->getErmes());
        $copyObj->setOrders($this->getOrders());
        $copyObj->setXpdate($this->getXpdate());
        $copyObj->setPono($this->getPono());
        $copyObj->setPaymenttype($this->getPaymenttype());
        $copyObj->setShipmeth($this->getShipmeth());
        $copyObj->setShipcom($this->getShipcom());
        $copyObj->setNote($this->getNote());
        $copyObj->setTermtype($this->getTermtype());
        $copyObj->setCustid($this->getCustid());
        $copyObj->setShiptoid($this->getShiptoid());
        $copyObj->setBaddress3($this->getBaddress3());
        $copyObj->setSaddress3($this->getSaddress3());
        $copyObj->setNewnbr($this->getNewnbr());
        $copyObj->setFaxnbr($this->getFaxnbr());
        $copyObj->setRqstdate($this->getRqstdate());
        $copyObj->setDummy($this->getDummy());
        if ($makeNew) {
            $copyObj->setNew(true);
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param bool $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Billing Clone of current object.
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function copy(bool $deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     *
     * @return $this
     */
    public function clear()
    {
        $this->sessionid = null;
        $this->date = null;
        $this->time = null;
        $this->bconame = null;
        $this->baddress = null;
        $this->baddress2 = null;
        $this->bname = null;
        $this->bcity = null;
        $this->bst = null;
        $this->bzip = null;
        $this->bcountry = null;
        $this->sconame = null;
        $this->sname = null;
        $this->saddress = null;
        $this->saddress2 = null;
        $this->scity = null;
        $this->sst = null;
        $this->szip = null;
        $this->scountry = null;
        $this->ccno = null;
        $this->email = null;
        $this->phone = null;
        $this->vc = null;
        $this->error = null;
        $this->ermes = null;
        $this->orders = null;
        $this->xpdate = null;
        $this->pono = null;
        $this->paymenttype = null;
        $this->shipmeth = null;
        $this->shipcom = null;
        $this->note = null;
        $this->termtype = null;
        $this->custid = null;
        $this->shiptoid = null;
        $this->baddress3 = null;
        $this->saddress3 = null;
        $this->newnbr = null;
        $this->faxnbr = null;
        $this->rqstdate = null;
        $this->dummy = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);

        return $this;
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param bool $deep Whether to also clear the references on all referrer objects.
     * @return $this
     */
    public function clearAllReferences(bool $deep = false)
    {
        if ($deep) {
        } // if ($deep)

        return $this;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(BillingTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param ConnectionInterface|null $con
     * @return bool
     */
    public function preSave(?ConnectionInterface $con = null): bool
    {
                return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface|null $con
     * @return void
     */
    public function postSave(?ConnectionInterface $con = null): void
    {
            }

    /**
     * Code to be run before inserting to database
     * @param ConnectionInterface|null $con
     * @return bool
     */
    public function preInsert(?ConnectionInterface $con = null): bool
    {
                return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface|null $con
     * @return void
     */
    public function postInsert(?ConnectionInterface $con = null): void
    {
            }

    /**
     * Code to be run before updating the object in database
     * @param ConnectionInterface|null $con
     * @return bool
     */
    public function preUpdate(?ConnectionInterface $con = null): bool
    {
                return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface|null $con
     * @return void
     */
    public function postUpdate(?ConnectionInterface $con = null): void
    {
            }

    /**
     * Code to be run before deleting the object in database
     * @param ConnectionInterface|null $con
     * @return bool
     */
    public function preDelete(?ConnectionInterface $con = null): bool
    {
                return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface|null $con
     * @return void
     */
    public function postDelete(?ConnectionInterface $con = null): void
    {
            }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);
            $inputData = $params[0];
            $keyType = $params[1] ?? TableMap::TYPE_PHPNAME;

            return $this->importFrom($format, $inputData, $keyType);
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = $params[0] ?? true;
            $keyType = $params[1] ?? TableMap::TYPE_PHPNAME;

            return $this->exportTo($format, $includeLazyLoadColumns, $keyType);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
