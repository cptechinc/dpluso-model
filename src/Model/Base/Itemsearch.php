<?php

namespace Base;

use \ItemsearchQuery as ChildItemsearchQuery;
use \Exception;
use \PDO;
use Map\ItemsearchTableMap;
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
 * Base class that represents a row from the 'itemsearch' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Itemsearch implements ActiveRecordInterface
{
    /**
     * TableMap class name
     *
     * @var string
     */
    public const TABLE_MAP = '\\Map\\ItemsearchTableMap';


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
     * The value for the recno field.
     *
     * @var        int|null
     */
    protected $recno;

    /**
     * The value for the itemid field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $itemid;

    /**
     * The value for the origintype field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $origintype;

    /**
     * The value for the originid field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $originid;

    /**
     * The value for the refitemid field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $refitemid;

    /**
     * The value for the desc1 field.
     *
     * @var        string|null
     */
    protected $desc1;

    /**
     * The value for the desc2 field.
     *
     * @var        string|null
     */
    protected $desc2;

    /**
     * The value for the image field.
     *
     * @var        string|null
     */
    protected $image;

    /**
     * The value for the qty_percase field.
     *
     * @var        int|null
     */
    protected $qty_percase;

    /**
     * The value for the create_date field.
     *
     * @var        string|null
     */
    protected $create_date;

    /**
     * The value for the create_time field.
     *
     * @var        string|null
     */
    protected $create_time;

    /**
     * The value for the itemstatus field.
     *
     * @var        string|null
     */
    protected $itemstatus;

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
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues(): void
    {
        $this->itemid = '';
        $this->origintype = '';
        $this->originid = '';
        $this->refitemid = '';
    }

    /**
     * Initializes internal state of Base\Itemsearch object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
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
     * Compares this with another <code>Itemsearch</code> instance.  If
     * <code>obj</code> is an instance of <code>Itemsearch</code>, delegates to
     * <code>equals(Itemsearch)</code>.  Otherwise, returns <code>false</code>.
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
     * Get the [recno] column value.
     *
     * @return int|null
     */
    public function getRecno()
    {
        return $this->recno;
    }

    /**
     * Get the [itemid] column value.
     *
     * @return string
     */
    public function getItemid()
    {
        return $this->itemid;
    }

    /**
     * Get the [origintype] column value.
     *
     * @return string
     */
    public function getOrigintype()
    {
        return $this->origintype;
    }

    /**
     * Get the [originid] column value.
     *
     * @return string
     */
    public function getOriginid()
    {
        return $this->originid;
    }

    /**
     * Get the [refitemid] column value.
     *
     * @return string
     */
    public function getRefitemid()
    {
        return $this->refitemid;
    }

    /**
     * Get the [desc1] column value.
     *
     * @return string|null
     */
    public function getDesc1()
    {
        return $this->desc1;
    }

    /**
     * Get the [desc2] column value.
     *
     * @return string|null
     */
    public function getDesc2()
    {
        return $this->desc2;
    }

    /**
     * Get the [image] column value.
     *
     * @return string|null
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Get the [qty_percase] column value.
     *
     * @return int|null
     */
    public function getQtyPercase()
    {
        return $this->qty_percase;
    }

    /**
     * Get the [create_date] column value.
     *
     * @return string|null
     */
    public function getCreateDate()
    {
        return $this->create_date;
    }

    /**
     * Get the [create_time] column value.
     *
     * @return string|null
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }

    /**
     * Get the [itemstatus] column value.
     *
     * @return string|null
     */
    public function getItemstatus()
    {
        return $this->itemstatus;
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
     * Set the value of [recno] column.
     *
     * @param int|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setRecno($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->recno !== $v) {
            $this->recno = $v;
            $this->modifiedColumns[ItemsearchTableMap::COL_RECNO] = true;
        }

        return $this;
    }

    /**
     * Set the value of [itemid] column.
     *
     * @param string $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setItemid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->itemid !== $v) {
            $this->itemid = $v;
            $this->modifiedColumns[ItemsearchTableMap::COL_ITEMID] = true;
        }

        return $this;
    }

    /**
     * Set the value of [origintype] column.
     *
     * @param string $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setOrigintype($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->origintype !== $v) {
            $this->origintype = $v;
            $this->modifiedColumns[ItemsearchTableMap::COL_ORIGINTYPE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [originid] column.
     *
     * @param string $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setOriginid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->originid !== $v) {
            $this->originid = $v;
            $this->modifiedColumns[ItemsearchTableMap::COL_ORIGINID] = true;
        }

        return $this;
    }

    /**
     * Set the value of [refitemid] column.
     *
     * @param string $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setRefitemid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->refitemid !== $v) {
            $this->refitemid = $v;
            $this->modifiedColumns[ItemsearchTableMap::COL_REFITEMID] = true;
        }

        return $this;
    }

    /**
     * Set the value of [desc1] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setDesc1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->desc1 !== $v) {
            $this->desc1 = $v;
            $this->modifiedColumns[ItemsearchTableMap::COL_DESC1] = true;
        }

        return $this;
    }

    /**
     * Set the value of [desc2] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setDesc2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->desc2 !== $v) {
            $this->desc2 = $v;
            $this->modifiedColumns[ItemsearchTableMap::COL_DESC2] = true;
        }

        return $this;
    }

    /**
     * Set the value of [image] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setImage($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->image !== $v) {
            $this->image = $v;
            $this->modifiedColumns[ItemsearchTableMap::COL_IMAGE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [qty_percase] column.
     *
     * @param int|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setQtyPercase($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->qty_percase !== $v) {
            $this->qty_percase = $v;
            $this->modifiedColumns[ItemsearchTableMap::COL_QTY_PERCASE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [create_date] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->create_date !== $v) {
            $this->create_date = $v;
            $this->modifiedColumns[ItemsearchTableMap::COL_CREATE_DATE] = true;
        }

        return $this;
    }

    /**
     * Set the value of [create_time] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setCreateTime($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->create_time !== $v) {
            $this->create_time = $v;
            $this->modifiedColumns[ItemsearchTableMap::COL_CREATE_TIME] = true;
        }

        return $this;
    }

    /**
     * Set the value of [itemstatus] column.
     *
     * @param string|null $v New value
     * @return $this The current object (for fluent API support)
     */
    public function setItemstatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->itemstatus !== $v) {
            $this->itemstatus = $v;
            $this->modifiedColumns[ItemsearchTableMap::COL_ITEMSTATUS] = true;
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
            $this->modifiedColumns[ItemsearchTableMap::COL_DUMMY] = true;
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
            if ($this->itemid !== '') {
                return false;
            }

            if ($this->origintype !== '') {
                return false;
            }

            if ($this->originid !== '') {
                return false;
            }

            if ($this->refitemid !== '') {
                return false;
            }

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : ItemsearchTableMap::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)];
            $this->recno = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : ItemsearchTableMap::translateFieldName('Itemid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->itemid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : ItemsearchTableMap::translateFieldName('Origintype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->origintype = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : ItemsearchTableMap::translateFieldName('Originid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->originid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : ItemsearchTableMap::translateFieldName('Refitemid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->refitemid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : ItemsearchTableMap::translateFieldName('Desc1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->desc1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : ItemsearchTableMap::translateFieldName('Desc2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->desc2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : ItemsearchTableMap::translateFieldName('Image', TableMap::TYPE_PHPNAME, $indexType)];
            $this->image = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : ItemsearchTableMap::translateFieldName('QtyPercase', TableMap::TYPE_PHPNAME, $indexType)];
            $this->qty_percase = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : ItemsearchTableMap::translateFieldName('CreateDate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->create_date = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : ItemsearchTableMap::translateFieldName('CreateTime', TableMap::TYPE_PHPNAME, $indexType)];
            $this->create_time = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : ItemsearchTableMap::translateFieldName('Itemstatus', TableMap::TYPE_PHPNAME, $indexType)];
            $this->itemstatus = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : ItemsearchTableMap::translateFieldName('Dummy', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dummy = (null !== $col) ? (string) $col : null;

            $this->resetModified();
            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 13; // 13 = ItemsearchTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Itemsearch'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(ItemsearchTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildItemsearchQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see Itemsearch::setDeleted()
     * @see Itemsearch::isDeleted()
     */
    public function delete(?ConnectionInterface $con = null): void
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(ItemsearchTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildItemsearchQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(ItemsearchTableMap::DATABASE_NAME);
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
                ItemsearchTableMap::addInstanceToPool($this);
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
        if ($this->isColumnModified(ItemsearchTableMap::COL_RECNO)) {
            $modifiedColumns[':p' . $index++]  = 'recno';
        }
        if ($this->isColumnModified(ItemsearchTableMap::COL_ITEMID)) {
            $modifiedColumns[':p' . $index++]  = 'itemid';
        }
        if ($this->isColumnModified(ItemsearchTableMap::COL_ORIGINTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'origintype';
        }
        if ($this->isColumnModified(ItemsearchTableMap::COL_ORIGINID)) {
            $modifiedColumns[':p' . $index++]  = 'originid';
        }
        if ($this->isColumnModified(ItemsearchTableMap::COL_REFITEMID)) {
            $modifiedColumns[':p' . $index++]  = 'refitemid';
        }
        if ($this->isColumnModified(ItemsearchTableMap::COL_DESC1)) {
            $modifiedColumns[':p' . $index++]  = 'desc1';
        }
        if ($this->isColumnModified(ItemsearchTableMap::COL_DESC2)) {
            $modifiedColumns[':p' . $index++]  = 'desc2';
        }
        if ($this->isColumnModified(ItemsearchTableMap::COL_IMAGE)) {
            $modifiedColumns[':p' . $index++]  = 'image';
        }
        if ($this->isColumnModified(ItemsearchTableMap::COL_QTY_PERCASE)) {
            $modifiedColumns[':p' . $index++]  = 'qty_percase';
        }
        if ($this->isColumnModified(ItemsearchTableMap::COL_CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'create_date';
        }
        if ($this->isColumnModified(ItemsearchTableMap::COL_CREATE_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'create_time';
        }
        if ($this->isColumnModified(ItemsearchTableMap::COL_ITEMSTATUS)) {
            $modifiedColumns[':p' . $index++]  = 'itemstatus';
        }
        if ($this->isColumnModified(ItemsearchTableMap::COL_DUMMY)) {
            $modifiedColumns[':p' . $index++]  = 'dummy';
        }

        $sql = sprintf(
            'INSERT INTO itemsearch (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'recno':
                        $stmt->bindValue($identifier, $this->recno, PDO::PARAM_INT);

                        break;
                    case 'itemid':
                        $stmt->bindValue($identifier, $this->itemid, PDO::PARAM_STR);

                        break;
                    case 'origintype':
                        $stmt->bindValue($identifier, $this->origintype, PDO::PARAM_STR);

                        break;
                    case 'originid':
                        $stmt->bindValue($identifier, $this->originid, PDO::PARAM_STR);

                        break;
                    case 'refitemid':
                        $stmt->bindValue($identifier, $this->refitemid, PDO::PARAM_STR);

                        break;
                    case 'desc1':
                        $stmt->bindValue($identifier, $this->desc1, PDO::PARAM_STR);

                        break;
                    case 'desc2':
                        $stmt->bindValue($identifier, $this->desc2, PDO::PARAM_STR);

                        break;
                    case 'image':
                        $stmt->bindValue($identifier, $this->image, PDO::PARAM_STR);

                        break;
                    case 'qty_percase':
                        $stmt->bindValue($identifier, $this->qty_percase, PDO::PARAM_INT);

                        break;
                    case 'create_date':
                        $stmt->bindValue($identifier, $this->create_date, PDO::PARAM_STR);

                        break;
                    case 'create_time':
                        $stmt->bindValue($identifier, $this->create_time, PDO::PARAM_STR);

                        break;
                    case 'itemstatus':
                        $stmt->bindValue($identifier, $this->itemstatus, PDO::PARAM_STR);

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
        $pos = ItemsearchTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getRecno();

            case 1:
                return $this->getItemid();

            case 2:
                return $this->getOrigintype();

            case 3:
                return $this->getOriginid();

            case 4:
                return $this->getRefitemid();

            case 5:
                return $this->getDesc1();

            case 6:
                return $this->getDesc2();

            case 7:
                return $this->getImage();

            case 8:
                return $this->getQtyPercase();

            case 9:
                return $this->getCreateDate();

            case 10:
                return $this->getCreateTime();

            case 11:
                return $this->getItemstatus();

            case 12:
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
        if (isset($alreadyDumpedObjects['Itemsearch'][$this->hashCode()])) {
            return ['*RECURSION*'];
        }
        $alreadyDumpedObjects['Itemsearch'][$this->hashCode()] = true;
        $keys = ItemsearchTableMap::getFieldNames($keyType);
        $result = [
            $keys[0] => $this->getRecno(),
            $keys[1] => $this->getItemid(),
            $keys[2] => $this->getOrigintype(),
            $keys[3] => $this->getOriginid(),
            $keys[4] => $this->getRefitemid(),
            $keys[5] => $this->getDesc1(),
            $keys[6] => $this->getDesc2(),
            $keys[7] => $this->getImage(),
            $keys[8] => $this->getQtyPercase(),
            $keys[9] => $this->getCreateDate(),
            $keys[10] => $this->getCreateTime(),
            $keys[11] => $this->getItemstatus(),
            $keys[12] => $this->getDummy(),
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
        $pos = ItemsearchTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

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
                $this->setRecno($value);
                break;
            case 1:
                $this->setItemid($value);
                break;
            case 2:
                $this->setOrigintype($value);
                break;
            case 3:
                $this->setOriginid($value);
                break;
            case 4:
                $this->setRefitemid($value);
                break;
            case 5:
                $this->setDesc1($value);
                break;
            case 6:
                $this->setDesc2($value);
                break;
            case 7:
                $this->setImage($value);
                break;
            case 8:
                $this->setQtyPercase($value);
                break;
            case 9:
                $this->setCreateDate($value);
                break;
            case 10:
                $this->setCreateTime($value);
                break;
            case 11:
                $this->setItemstatus($value);
                break;
            case 12:
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
        $keys = ItemsearchTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setRecno($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setItemid($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setOrigintype($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setOriginid($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setRefitemid($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setDesc1($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setDesc2($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setImage($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setQtyPercase($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setCreateDate($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setCreateTime($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setItemstatus($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setDummy($arr[$keys[12]]);
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
        $criteria = new Criteria(ItemsearchTableMap::DATABASE_NAME);

        if ($this->isColumnModified(ItemsearchTableMap::COL_RECNO)) {
            $criteria->add(ItemsearchTableMap::COL_RECNO, $this->recno);
        }
        if ($this->isColumnModified(ItemsearchTableMap::COL_ITEMID)) {
            $criteria->add(ItemsearchTableMap::COL_ITEMID, $this->itemid);
        }
        if ($this->isColumnModified(ItemsearchTableMap::COL_ORIGINTYPE)) {
            $criteria->add(ItemsearchTableMap::COL_ORIGINTYPE, $this->origintype);
        }
        if ($this->isColumnModified(ItemsearchTableMap::COL_ORIGINID)) {
            $criteria->add(ItemsearchTableMap::COL_ORIGINID, $this->originid);
        }
        if ($this->isColumnModified(ItemsearchTableMap::COL_REFITEMID)) {
            $criteria->add(ItemsearchTableMap::COL_REFITEMID, $this->refitemid);
        }
        if ($this->isColumnModified(ItemsearchTableMap::COL_DESC1)) {
            $criteria->add(ItemsearchTableMap::COL_DESC1, $this->desc1);
        }
        if ($this->isColumnModified(ItemsearchTableMap::COL_DESC2)) {
            $criteria->add(ItemsearchTableMap::COL_DESC2, $this->desc2);
        }
        if ($this->isColumnModified(ItemsearchTableMap::COL_IMAGE)) {
            $criteria->add(ItemsearchTableMap::COL_IMAGE, $this->image);
        }
        if ($this->isColumnModified(ItemsearchTableMap::COL_QTY_PERCASE)) {
            $criteria->add(ItemsearchTableMap::COL_QTY_PERCASE, $this->qty_percase);
        }
        if ($this->isColumnModified(ItemsearchTableMap::COL_CREATE_DATE)) {
            $criteria->add(ItemsearchTableMap::COL_CREATE_DATE, $this->create_date);
        }
        if ($this->isColumnModified(ItemsearchTableMap::COL_CREATE_TIME)) {
            $criteria->add(ItemsearchTableMap::COL_CREATE_TIME, $this->create_time);
        }
        if ($this->isColumnModified(ItemsearchTableMap::COL_ITEMSTATUS)) {
            $criteria->add(ItemsearchTableMap::COL_ITEMSTATUS, $this->itemstatus);
        }
        if ($this->isColumnModified(ItemsearchTableMap::COL_DUMMY)) {
            $criteria->add(ItemsearchTableMap::COL_DUMMY, $this->dummy);
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
        $criteria = ChildItemsearchQuery::create();
        $criteria->add(ItemsearchTableMap::COL_ITEMID, $this->itemid);
        $criteria->add(ItemsearchTableMap::COL_ORIGINTYPE, $this->origintype);
        $criteria->add(ItemsearchTableMap::COL_ORIGINID, $this->originid);
        $criteria->add(ItemsearchTableMap::COL_REFITEMID, $this->refitemid);

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
        $validPk = null !== $this->getItemid() &&
            null !== $this->getOrigintype() &&
            null !== $this->getOriginid() &&
            null !== $this->getRefitemid();

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
     * Returns the composite primary key for this object.
     * The array elements will be in same order as specified in XML.
     * @return array
     */
    public function getPrimaryKey()
    {
        $pks = [];
        $pks[0] = $this->getItemid();
        $pks[1] = $this->getOrigintype();
        $pks[2] = $this->getOriginid();
        $pks[3] = $this->getRefitemid();

        return $pks;
    }

    /**
     * Set the [composite] primary key.
     *
     * @param array $keys The elements of the composite key (order must match the order in XML file).
     * @return void
     */
    public function setPrimaryKey(array $keys): void
    {
        $this->setItemid($keys[0]);
        $this->setOrigintype($keys[1]);
        $this->setOriginid($keys[2]);
        $this->setRefitemid($keys[3]);
    }

    /**
     * Returns true if the primary key for this object is null.
     *
     * @return bool
     */
    public function isPrimaryKeyNull(): bool
    {
        return (null === $this->getItemid()) && (null === $this->getOrigintype()) && (null === $this->getOriginid()) && (null === $this->getRefitemid());
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of \Itemsearch (or compatible) type.
     * @param bool $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param bool $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws \Propel\Runtime\Exception\PropelException
     * @return void
     */
    public function copyInto(object $copyObj, bool $deepCopy = false, bool $makeNew = true): void
    {
        $copyObj->setRecno($this->getRecno());
        $copyObj->setItemid($this->getItemid());
        $copyObj->setOrigintype($this->getOrigintype());
        $copyObj->setOriginid($this->getOriginid());
        $copyObj->setRefitemid($this->getRefitemid());
        $copyObj->setDesc1($this->getDesc1());
        $copyObj->setDesc2($this->getDesc2());
        $copyObj->setImage($this->getImage());
        $copyObj->setQtyPercase($this->getQtyPercase());
        $copyObj->setCreateDate($this->getCreateDate());
        $copyObj->setCreateTime($this->getCreateTime());
        $copyObj->setItemstatus($this->getItemstatus());
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
     * @return \Itemsearch Clone of current object.
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
        $this->recno = null;
        $this->itemid = null;
        $this->origintype = null;
        $this->originid = null;
        $this->refitemid = null;
        $this->desc1 = null;
        $this->desc2 = null;
        $this->image = null;
        $this->qty_percase = null;
        $this->create_date = null;
        $this->create_time = null;
        $this->itemstatus = null;
        $this->dummy = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
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
        return (string) $this->exportTo(ItemsearchTableMap::DEFAULT_STRING_FORMAT);
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
