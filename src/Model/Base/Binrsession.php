<?php

namespace Base;

use \BinrsessionQuery as ChildBinrsessionQuery;
use \Exception;
use \PDO;
use Map\BinrsessionTableMap;
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
 * Base class that represents a row from the 'binrsession' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Binrsession implements ActiveRecordInterface
{
    /**
     * TableMap class name
     *
     * @var string
     */
    public const TABLE_MAP = '\\Map\\BinrsessionTableMap';


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
     * The value for the loginid field.
     *
     * @var        string|null
     */
    protected $loginid;

    /**
     * The value for the whseid field.
     *
     * @var        string|null
     */
    protected $whseid;

    /**
     * The value for the itemid field.
     *
     * @var        string|null
     */
    protected $itemid;

    /**
     * The value for the itemtype field.
     *
     * @var        string|null
     */
    protected $itemtype;

    /**
     * The value for the lotserial field.
     *
     * @var        string|null
     */
    protected $lotserial;

    /**
     * The value for the frombin field.
     *
     * @var        string|null
     */
    protected $frombin;

    /**
     * The value for the frombinqty field.
     *
     * @var        int|null
     */
    protected $frombinqty;

    /**
     * The value for the tobin field.
     *
     * @var        string|null
     */
    protected $tobin;

    /**
     * The value for the tobinqty field.
     *
     * @var        int|null
     */
    protected $tobinqty;

    /**
     * The value for the function field.
     *
     * @var        string|null
     */
    protected $function;

    /**
     * The value for the status field.
     *
     * @var        string|null
     */
    protected $status;

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
     * Initializes internal state of Base\Binrsession object.
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
     * Compares this with another <code>Binrsession</code> instance.  If
     * <code>obj</code> is an instance of <code>Binrsession</code>, delegates to
     * <code>equals(Binrsession)</code>.  Otherwise, returns <code>false</code>.
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
     * Get the [loginid] column value.
     *
     * @return string|null
     */
    public function getLoginid()
    {
        return $this->loginid;
    }

    /**
     * Get the [whseid] column value.
     *
     * @return string|null
     */
    public function getWhseid()
    {
        return $this->whseid;
    }

    /**
     * Get the [itemid] column value.
     *
     * @return string|null
     */
    public function getItemid()
    {
        return $this->itemid;
    }

    /**
     * Get the [itemtype] column value.
     *
     * @return string|null
     */
    public function getItemtype()
    {
        return $this->itemtype;
    }

    /**
     * Get the [lotserial] column value.
     *
     * @return string|null
     */
    public function getLotserial()
    {
        return $this->lotserial;
    }

    /**
     * Get the [frombin] column value.
     *
     * @return string|null
     */
    public function getFrombin()
    {
        return $this->frombin;
    }

    /**
     * Get the [frombinqty] column value.
     *
     * @return int|null
     */
    public function getFrombinqty()
    {
        return $this->frombinqty;
    }

    /**
     * Get the [tobin] column value.
     *
     * @return string|null
     */
    public function getTobin()
    {
        return $this->tobin;
    }

    /**
     * Get the [tobinqty] column value.
     *
     * @return int|null
     */
    public function getTobinqty()
    {
        return $this->tobinqty;
    }

    /**
     * Get the [function] column value.
     *
     * @return string|null
     */
    public function getFunction()
    {
        return $this->function;
    }

    /**
     * Get the [status] column value.
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->status;
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
            $this->modifiedColumns[BinrsessionTableMap::COL_SESSIONID] = true;
        }

        return $this;
    }

    /**
     * Set the value of [loginid] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setLoginid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->loginid !== $v) {
            $this->loginid = $v;
            $this->modifiedColumns[BinrsessionTableMap::COL_LOGINID] = true;
        }

        return $this;
    }

    /**
     * Set the value of [whseid] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setWhseid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->whseid !== $v) {
            $this->whseid = $v;
            $this->modifiedColumns[BinrsessionTableMap::COL_WHSEID] = true;
        }

        return $this;
    }

    /**
     * Set the value of [itemid] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setItemid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->itemid !== $v) {
            $this->itemid = $v;
            $this->modifiedColumns[BinrsessionTableMap::COL_ITEMID] = true;
        }

        return $this;
    }

    /**
     * Set the value of [itemtype] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setItemtype($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->itemtype !== $v) {
            $this->itemtype = $v;
            $this->modifiedColumns[BinrsessionTableMap::COL_ITEMTYPE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [lotserial] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setLotserial($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lotserial !== $v) {
            $this->lotserial = $v;
            $this->modifiedColumns[BinrsessionTableMap::COL_LOTSERIAL] = true;
        }

        return $this;
    }

    /**
     * Set the value of [frombin] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setFrombin($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->frombin !== $v) {
            $this->frombin = $v;
            $this->modifiedColumns[BinrsessionTableMap::COL_FROMBIN] = true;
        }

        return $this;
    }

    /**
     * Set the value of [frombinqty] column.
     *
     * @param int|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setFrombinqty($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->frombinqty !== $v) {
            $this->frombinqty = $v;
            $this->modifiedColumns[BinrsessionTableMap::COL_FROMBINQTY] = true;
        }

        return $this;
    }

    /**
     * Set the value of [tobin] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setTobin($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tobin !== $v) {
            $this->tobin = $v;
            $this->modifiedColumns[BinrsessionTableMap::COL_TOBIN] = true;
        }

        return $this;
    }

    /**
     * Set the value of [tobinqty] column.
     *
     * @param int|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setTobinqty($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->tobinqty !== $v) {
            $this->tobinqty = $v;
            $this->modifiedColumns[BinrsessionTableMap::COL_TOBINQTY] = true;
        }

        return $this;
    }

    /**
     * Set the value of [function] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setFunction($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->function !== $v) {
            $this->function = $v;
            $this->modifiedColumns[BinrsessionTableMap::COL_FUNCTION] = true;
        }

        return $this;
    }

    /**
     * Set the value of [status] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[BinrsessionTableMap::COL_STATUS] = true;
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
            $this->modifiedColumns[BinrsessionTableMap::COL_DATE] = true;
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
            $this->modifiedColumns[BinrsessionTableMap::COL_TIME] = true;
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
            $this->modifiedColumns[BinrsessionTableMap::COL_DUMMY] = true;
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : BinrsessionTableMap::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sessionid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : BinrsessionTableMap::translateFieldName('Loginid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->loginid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : BinrsessionTableMap::translateFieldName('Whseid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->whseid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : BinrsessionTableMap::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->itemid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : BinrsessionTableMap::translateFieldName('Itemtype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->itemtype = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : BinrsessionTableMap::translateFieldName('Lotserial', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lotserial = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : BinrsessionTableMap::translateFieldName('Frombin', TableMap::TYPE_PHPNAME, $indexType)];
            $this->frombin = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : BinrsessionTableMap::translateFieldName('Frombinqty', TableMap::TYPE_PHPNAME, $indexType)];
            $this->frombinqty = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : BinrsessionTableMap::translateFieldName('Tobin', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tobin = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : BinrsessionTableMap::translateFieldName('Tobinqty', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tobinqty = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : BinrsessionTableMap::translateFieldName('Function', TableMap::TYPE_PHPNAME, $indexType)];
            $this->function = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : BinrsessionTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : BinrsessionTableMap::translateFieldName('Date', TableMap::TYPE_PHPNAME, $indexType)];
            $this->date = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : BinrsessionTableMap::translateFieldName('Time', TableMap::TYPE_PHPNAME, $indexType)];
            $this->time = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : BinrsessionTableMap::translateFieldName('Dummy', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dummy = (null !== $col) ? (string) $col : null;

            $this->resetModified();
            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 15; // 15 = BinrsessionTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Binrsession'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(BinrsessionTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildBinrsessionQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see Binrsession::setDeleted()
     * @see Binrsession::isDeleted()
     */
    public function delete(?ConnectionInterface $con = null): void
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(BinrsessionTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildBinrsessionQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(BinrsessionTableMap::DATABASE_NAME);
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
                BinrsessionTableMap::addInstanceToPool($this);
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
        if ($this->isColumnModified(BinrsessionTableMap::COL_SESSIONID)) {
            $modifiedColumns[':p' . $index++]  = 'sessionid';
        }
        if ($this->isColumnModified(BinrsessionTableMap::COL_LOGINID)) {
            $modifiedColumns[':p' . $index++]  = 'loginid';
        }
        if ($this->isColumnModified(BinrsessionTableMap::COL_WHSEID)) {
            $modifiedColumns[':p' . $index++]  = 'whseid';
        }
        if ($this->isColumnModified(BinrsessionTableMap::COL_ITEMID)) {
            $modifiedColumns[':p' . $index++]  = 'itemid';
        }
        if ($this->isColumnModified(BinrsessionTableMap::COL_ITEMTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'itemtype';
        }
        if ($this->isColumnModified(BinrsessionTableMap::COL_LOTSERIAL)) {
            $modifiedColumns[':p' . $index++]  = 'lotserial';
        }
        if ($this->isColumnModified(BinrsessionTableMap::COL_FROMBIN)) {
            $modifiedColumns[':p' . $index++]  = 'frombin';
        }
        if ($this->isColumnModified(BinrsessionTableMap::COL_FROMBINQTY)) {
            $modifiedColumns[':p' . $index++]  = 'frombinqty';
        }
        if ($this->isColumnModified(BinrsessionTableMap::COL_TOBIN)) {
            $modifiedColumns[':p' . $index++]  = 'tobin';
        }
        if ($this->isColumnModified(BinrsessionTableMap::COL_TOBINQTY)) {
            $modifiedColumns[':p' . $index++]  = 'tobinqty';
        }
        if ($this->isColumnModified(BinrsessionTableMap::COL_FUNCTION)) {
            $modifiedColumns[':p' . $index++]  = 'function';
        }
        if ($this->isColumnModified(BinrsessionTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'status';
        }
        if ($this->isColumnModified(BinrsessionTableMap::COL_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'date';
        }
        if ($this->isColumnModified(BinrsessionTableMap::COL_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'time';
        }
        if ($this->isColumnModified(BinrsessionTableMap::COL_DUMMY)) {
            $modifiedColumns[':p' . $index++]  = 'dummy';
        }

        $sql = sprintf(
            'INSERT INTO binrsession (%s) VALUES (%s)',
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
                    case 'loginid':
                        $stmt->bindValue($identifier, $this->loginid, PDO::PARAM_STR);

                        break;
                    case 'whseid':
                        $stmt->bindValue($identifier, $this->whseid, PDO::PARAM_STR);

                        break;
                    case 'itemid':
                        $stmt->bindValue($identifier, $this->itemid, PDO::PARAM_STR);

                        break;
                    case 'itemtype':
                        $stmt->bindValue($identifier, $this->itemtype, PDO::PARAM_STR);

                        break;
                    case 'lotserial':
                        $stmt->bindValue($identifier, $this->lotserial, PDO::PARAM_STR);

                        break;
                    case 'frombin':
                        $stmt->bindValue($identifier, $this->frombin, PDO::PARAM_STR);

                        break;
                    case 'frombinqty':
                        $stmt->bindValue($identifier, $this->frombinqty, PDO::PARAM_INT);

                        break;
                    case 'tobin':
                        $stmt->bindValue($identifier, $this->tobin, PDO::PARAM_STR);

                        break;
                    case 'tobinqty':
                        $stmt->bindValue($identifier, $this->tobinqty, PDO::PARAM_INT);

                        break;
                    case 'function':
                        $stmt->bindValue($identifier, $this->function, PDO::PARAM_STR);

                        break;
                    case 'status':
                        $stmt->bindValue($identifier, $this->status, PDO::PARAM_STR);

                        break;
                    case 'date':
                        $stmt->bindValue($identifier, $this->date, PDO::PARAM_INT);

                        break;
                    case 'time':
                        $stmt->bindValue($identifier, $this->time, PDO::PARAM_INT);

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
        $pos = BinrsessionTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getLoginid();

            case 2:
                return $this->getWhseid();

            case 3:
                return $this->getItemid();

            case 4:
                return $this->getItemtype();

            case 5:
                return $this->getLotserial();

            case 6:
                return $this->getFrombin();

            case 7:
                return $this->getFrombinqty();

            case 8:
                return $this->getTobin();

            case 9:
                return $this->getTobinqty();

            case 10:
                return $this->getFunction();

            case 11:
                return $this->getStatus();

            case 12:
                return $this->getDate();

            case 13:
                return $this->getTime();

            case 14:
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
        if (isset($alreadyDumpedObjects['Binrsession'][$this->hashCode()])) {
            return ['*RECURSION*'];
        }
        $alreadyDumpedObjects['Binrsession'][$this->hashCode()] = true;
        $keys = BinrsessionTableMap::getFieldNames($keyType);
        $result = [
            $keys[0] => $this->getSessionid(),
            $keys[1] => $this->getLoginid(),
            $keys[2] => $this->getWhseid(),
            $keys[3] => $this->getItemid(),
            $keys[4] => $this->getItemtype(),
            $keys[5] => $this->getLotserial(),
            $keys[6] => $this->getFrombin(),
            $keys[7] => $this->getFrombinqty(),
            $keys[8] => $this->getTobin(),
            $keys[9] => $this->getTobinqty(),
            $keys[10] => $this->getFunction(),
            $keys[11] => $this->getStatus(),
            $keys[12] => $this->getDate(),
            $keys[13] => $this->getTime(),
            $keys[14] => $this->getDummy(),
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
        $pos = BinrsessionTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

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
                $this->setLoginid($value);
                break;
            case 2:
                $this->setWhseid($value);
                break;
            case 3:
                $this->setItemid($value);
                break;
            case 4:
                $this->setItemtype($value);
                break;
            case 5:
                $this->setLotserial($value);
                break;
            case 6:
                $this->setFrombin($value);
                break;
            case 7:
                $this->setFrombinqty($value);
                break;
            case 8:
                $this->setTobin($value);
                break;
            case 9:
                $this->setTobinqty($value);
                break;
            case 10:
                $this->setFunction($value);
                break;
            case 11:
                $this->setStatus($value);
                break;
            case 12:
                $this->setDate($value);
                break;
            case 13:
                $this->setTime($value);
                break;
            case 14:
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
        $keys = BinrsessionTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setSessionid($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setLoginid($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setWhseid($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setItemid($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setItemtype($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setLotserial($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setFrombin($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setFrombinqty($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setTobin($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setTobinqty($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setFunction($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setStatus($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setDate($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setTime($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setDummy($arr[$keys[14]]);
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
        $criteria = new Criteria(BinrsessionTableMap::DATABASE_NAME);

        if ($this->isColumnModified(BinrsessionTableMap::COL_SESSIONID)) {
            $criteria->add(BinrsessionTableMap::COL_SESSIONID, $this->sessionid);
        }
        if ($this->isColumnModified(BinrsessionTableMap::COL_LOGINID)) {
            $criteria->add(BinrsessionTableMap::COL_LOGINID, $this->loginid);
        }
        if ($this->isColumnModified(BinrsessionTableMap::COL_WHSEID)) {
            $criteria->add(BinrsessionTableMap::COL_WHSEID, $this->whseid);
        }
        if ($this->isColumnModified(BinrsessionTableMap::COL_ITEMID)) {
            $criteria->add(BinrsessionTableMap::COL_ITEMID, $this->itemid);
        }
        if ($this->isColumnModified(BinrsessionTableMap::COL_ITEMTYPE)) {
            $criteria->add(BinrsessionTableMap::COL_ITEMTYPE, $this->itemtype);
        }
        if ($this->isColumnModified(BinrsessionTableMap::COL_LOTSERIAL)) {
            $criteria->add(BinrsessionTableMap::COL_LOTSERIAL, $this->lotserial);
        }
        if ($this->isColumnModified(BinrsessionTableMap::COL_FROMBIN)) {
            $criteria->add(BinrsessionTableMap::COL_FROMBIN, $this->frombin);
        }
        if ($this->isColumnModified(BinrsessionTableMap::COL_FROMBINQTY)) {
            $criteria->add(BinrsessionTableMap::COL_FROMBINQTY, $this->frombinqty);
        }
        if ($this->isColumnModified(BinrsessionTableMap::COL_TOBIN)) {
            $criteria->add(BinrsessionTableMap::COL_TOBIN, $this->tobin);
        }
        if ($this->isColumnModified(BinrsessionTableMap::COL_TOBINQTY)) {
            $criteria->add(BinrsessionTableMap::COL_TOBINQTY, $this->tobinqty);
        }
        if ($this->isColumnModified(BinrsessionTableMap::COL_FUNCTION)) {
            $criteria->add(BinrsessionTableMap::COL_FUNCTION, $this->function);
        }
        if ($this->isColumnModified(BinrsessionTableMap::COL_STATUS)) {
            $criteria->add(BinrsessionTableMap::COL_STATUS, $this->status);
        }
        if ($this->isColumnModified(BinrsessionTableMap::COL_DATE)) {
            $criteria->add(BinrsessionTableMap::COL_DATE, $this->date);
        }
        if ($this->isColumnModified(BinrsessionTableMap::COL_TIME)) {
            $criteria->add(BinrsessionTableMap::COL_TIME, $this->time);
        }
        if ($this->isColumnModified(BinrsessionTableMap::COL_DUMMY)) {
            $criteria->add(BinrsessionTableMap::COL_DUMMY, $this->dummy);
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
        $criteria = ChildBinrsessionQuery::create();
        $criteria->add(BinrsessionTableMap::COL_SESSIONID, $this->sessionid);

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
     * @param object $copyObj An object of \Binrsession (or compatible) type.
     * @param bool $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param bool $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws \Propel\Runtime\Exception\PropelException
     * @return void
     */
    public function copyInto(object $copyObj, bool $deepCopy = false, bool $makeNew = true): void
    {
        $copyObj->setSessionid($this->getSessionid());
        $copyObj->setLoginid($this->getLoginid());
        $copyObj->setWhseid($this->getWhseid());
        $copyObj->setItemid($this->getItemid());
        $copyObj->setItemtype($this->getItemtype());
        $copyObj->setLotserial($this->getLotserial());
        $copyObj->setFrombin($this->getFrombin());
        $copyObj->setFrombinqty($this->getFrombinqty());
        $copyObj->setTobin($this->getTobin());
        $copyObj->setTobinqty($this->getTobinqty());
        $copyObj->setFunction($this->getFunction());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setDate($this->getDate());
        $copyObj->setTime($this->getTime());
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
     * @return \Binrsession Clone of current object.
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
        $this->loginid = null;
        $this->whseid = null;
        $this->itemid = null;
        $this->itemtype = null;
        $this->lotserial = null;
        $this->frombin = null;
        $this->frombinqty = null;
        $this->tobin = null;
        $this->tobinqty = null;
        $this->function = null;
        $this->status = null;
        $this->date = null;
        $this->time = null;
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
        return (string) $this->exportTo(BinrsessionTableMap::DEFAULT_STRING_FORMAT);
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
