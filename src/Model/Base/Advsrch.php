<?php

namespace Base;

use \AdvsrchQuery as ChildAdvsrchQuery;
use \Exception;
use \PDO;
use Map\AdvsrchTableMap;
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
 * Base class that represents a row from the 'advsrch' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Advsrch implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\AdvsrchTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the recordno field.
     *
     * @var        int
     */
    protected $recordno;

    /**
     * The value for the catid field.
     *
     * @var        string
     */
    protected $catid;

    /**
     * The value for the cat1 field.
     *
     * @var        string
     */
    protected $cat1;

    /**
     * The value for the cat2 field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $cat2;

    /**
     * The value for the cat3 field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $cat3;

    /**
     * The value for the cat4 field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $cat4;

    /**
     * The value for the cat5 field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $cat5;

    /**
     * The value for the optcode field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $optcode;

    /**
     * The value for the adsrchfield field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $adsrchfield;

    /**
     * The value for the optcodedesc1 field.
     *
     * @var        string
     */
    protected $optcodedesc1;

    /**
     * The value for the optcodedesc2 field.
     *
     * @var        string
     */
    protected $optcodedesc2;

    /**
     * The value for the adsrchtype field.
     *
     * @var        string
     */
    protected $adsrchtype;

    /**
     * The value for the dummy field.
     *
     * @var        string
     */
    protected $dummy;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->cat2 = '';
        $this->cat3 = '';
        $this->cat4 = '';
        $this->cat5 = '';
        $this->optcode = '';
        $this->adsrchfield = '';
    }

    /**
     * Initializes internal state of Base\Advsrch object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Advsrch</code> instance.  If
     * <code>obj</code> is an instance of <code>Advsrch</code>, delegates to
     * <code>equals(Advsrch)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
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
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|Advsrch The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
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
     * Get the [recordno] column value.
     *
     * @return int
     */
    public function getRecordno()
    {
        return $this->recordno;
    }

    /**
     * Get the [catid] column value.
     *
     * @return string
     */
    public function getCatid()
    {
        return $this->catid;
    }

    /**
     * Get the [cat1] column value.
     *
     * @return string
     */
    public function getCat1()
    {
        return $this->cat1;
    }

    /**
     * Get the [cat2] column value.
     *
     * @return string
     */
    public function getCat2()
    {
        return $this->cat2;
    }

    /**
     * Get the [cat3] column value.
     *
     * @return string
     */
    public function getCat3()
    {
        return $this->cat3;
    }

    /**
     * Get the [cat4] column value.
     *
     * @return string
     */
    public function getCat4()
    {
        return $this->cat4;
    }

    /**
     * Get the [cat5] column value.
     *
     * @return string
     */
    public function getCat5()
    {
        return $this->cat5;
    }

    /**
     * Get the [optcode] column value.
     *
     * @return string
     */
    public function getOptcode()
    {
        return $this->optcode;
    }

    /**
     * Get the [adsrchfield] column value.
     *
     * @return string
     */
    public function getAdsrchfield()
    {
        return $this->adsrchfield;
    }

    /**
     * Get the [optcodedesc1] column value.
     *
     * @return string
     */
    public function getOptcodedesc1()
    {
        return $this->optcodedesc1;
    }

    /**
     * Get the [optcodedesc2] column value.
     *
     * @return string
     */
    public function getOptcodedesc2()
    {
        return $this->optcodedesc2;
    }

    /**
     * Get the [adsrchtype] column value.
     *
     * @return string
     */
    public function getAdsrchtype()
    {
        return $this->adsrchtype;
    }

    /**
     * Get the [dummy] column value.
     *
     * @return string
     */
    public function getDummy()
    {
        return $this->dummy;
    }

    /**
     * Set the value of [recordno] column.
     *
     * @param int $v new value
     * @return $this|\Advsrch The current object (for fluent API support)
     */
    public function setRecordno($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->recordno !== $v) {
            $this->recordno = $v;
            $this->modifiedColumns[AdvsrchTableMap::COL_RECORDNO] = true;
        }

        return $this;
    } // setRecordno()

    /**
     * Set the value of [catid] column.
     *
     * @param string $v new value
     * @return $this|\Advsrch The current object (for fluent API support)
     */
    public function setCatid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->catid !== $v) {
            $this->catid = $v;
            $this->modifiedColumns[AdvsrchTableMap::COL_CATID] = true;
        }

        return $this;
    } // setCatid()

    /**
     * Set the value of [cat1] column.
     *
     * @param string $v new value
     * @return $this|\Advsrch The current object (for fluent API support)
     */
    public function setCat1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cat1 !== $v) {
            $this->cat1 = $v;
            $this->modifiedColumns[AdvsrchTableMap::COL_CAT1] = true;
        }

        return $this;
    } // setCat1()

    /**
     * Set the value of [cat2] column.
     *
     * @param string $v new value
     * @return $this|\Advsrch The current object (for fluent API support)
     */
    public function setCat2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cat2 !== $v) {
            $this->cat2 = $v;
            $this->modifiedColumns[AdvsrchTableMap::COL_CAT2] = true;
        }

        return $this;
    } // setCat2()

    /**
     * Set the value of [cat3] column.
     *
     * @param string $v new value
     * @return $this|\Advsrch The current object (for fluent API support)
     */
    public function setCat3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cat3 !== $v) {
            $this->cat3 = $v;
            $this->modifiedColumns[AdvsrchTableMap::COL_CAT3] = true;
        }

        return $this;
    } // setCat3()

    /**
     * Set the value of [cat4] column.
     *
     * @param string $v new value
     * @return $this|\Advsrch The current object (for fluent API support)
     */
    public function setCat4($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cat4 !== $v) {
            $this->cat4 = $v;
            $this->modifiedColumns[AdvsrchTableMap::COL_CAT4] = true;
        }

        return $this;
    } // setCat4()

    /**
     * Set the value of [cat5] column.
     *
     * @param string $v new value
     * @return $this|\Advsrch The current object (for fluent API support)
     */
    public function setCat5($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cat5 !== $v) {
            $this->cat5 = $v;
            $this->modifiedColumns[AdvsrchTableMap::COL_CAT5] = true;
        }

        return $this;
    } // setCat5()

    /**
     * Set the value of [optcode] column.
     *
     * @param string $v new value
     * @return $this|\Advsrch The current object (for fluent API support)
     */
    public function setOptcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optcode !== $v) {
            $this->optcode = $v;
            $this->modifiedColumns[AdvsrchTableMap::COL_OPTCODE] = true;
        }

        return $this;
    } // setOptcode()

    /**
     * Set the value of [adsrchfield] column.
     *
     * @param string $v new value
     * @return $this|\Advsrch The current object (for fluent API support)
     */
    public function setAdsrchfield($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->adsrchfield !== $v) {
            $this->adsrchfield = $v;
            $this->modifiedColumns[AdvsrchTableMap::COL_ADSRCHFIELD] = true;
        }

        return $this;
    } // setAdsrchfield()

    /**
     * Set the value of [optcodedesc1] column.
     *
     * @param string $v new value
     * @return $this|\Advsrch The current object (for fluent API support)
     */
    public function setOptcodedesc1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optcodedesc1 !== $v) {
            $this->optcodedesc1 = $v;
            $this->modifiedColumns[AdvsrchTableMap::COL_OPTCODEDESC1] = true;
        }

        return $this;
    } // setOptcodedesc1()

    /**
     * Set the value of [optcodedesc2] column.
     *
     * @param string $v new value
     * @return $this|\Advsrch The current object (for fluent API support)
     */
    public function setOptcodedesc2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->optcodedesc2 !== $v) {
            $this->optcodedesc2 = $v;
            $this->modifiedColumns[AdvsrchTableMap::COL_OPTCODEDESC2] = true;
        }

        return $this;
    } // setOptcodedesc2()

    /**
     * Set the value of [adsrchtype] column.
     *
     * @param string $v new value
     * @return $this|\Advsrch The current object (for fluent API support)
     */
    public function setAdsrchtype($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->adsrchtype !== $v) {
            $this->adsrchtype = $v;
            $this->modifiedColumns[AdvsrchTableMap::COL_ADSRCHTYPE] = true;
        }

        return $this;
    } // setAdsrchtype()

    /**
     * Set the value of [dummy] column.
     *
     * @param string $v new value
     * @return $this|\Advsrch The current object (for fluent API support)
     */
    public function setDummy($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dummy !== $v) {
            $this->dummy = $v;
            $this->modifiedColumns[AdvsrchTableMap::COL_DUMMY] = true;
        }

        return $this;
    } // setDummy()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->cat2 !== '') {
                return false;
            }

            if ($this->cat3 !== '') {
                return false;
            }

            if ($this->cat4 !== '') {
                return false;
            }

            if ($this->cat5 !== '') {
                return false;
            }

            if ($this->optcode !== '') {
                return false;
            }

            if ($this->adsrchfield !== '') {
                return false;
            }

        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : AdvsrchTableMap::translateFieldName('Recordno', TableMap::TYPE_PHPNAME, $indexType)];
            $this->recordno = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : AdvsrchTableMap::translateFieldName('Catid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->catid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : AdvsrchTableMap::translateFieldName('Cat1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cat1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : AdvsrchTableMap::translateFieldName('Cat2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cat2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : AdvsrchTableMap::translateFieldName('Cat3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cat3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : AdvsrchTableMap::translateFieldName('Cat4', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cat4 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : AdvsrchTableMap::translateFieldName('Cat5', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cat5 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : AdvsrchTableMap::translateFieldName('Optcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : AdvsrchTableMap::translateFieldName('Adsrchfield', TableMap::TYPE_PHPNAME, $indexType)];
            $this->adsrchfield = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : AdvsrchTableMap::translateFieldName('Optcodedesc1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optcodedesc1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : AdvsrchTableMap::translateFieldName('Optcodedesc2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->optcodedesc2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : AdvsrchTableMap::translateFieldName('Adsrchtype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->adsrchtype = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : AdvsrchTableMap::translateFieldName('Dummy', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dummy = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 13; // 13 = AdvsrchTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Advsrch'), 0, $e);
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
     * @throws PropelException
     */
    public function ensureConsistency()
    {
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AdvsrchTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildAdvsrchQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Advsrch::setDeleted()
     * @see Advsrch::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AdvsrchTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildAdvsrchQuery::create()
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
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AdvsrchTableMap::DATABASE_NAME);
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
                AdvsrchTableMap::addInstanceToPool($this);
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
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
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
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AdvsrchTableMap::COL_RECORDNO)) {
            $modifiedColumns[':p' . $index++]  = 'recordno';
        }
        if ($this->isColumnModified(AdvsrchTableMap::COL_CATID)) {
            $modifiedColumns[':p' . $index++]  = 'catid';
        }
        if ($this->isColumnModified(AdvsrchTableMap::COL_CAT1)) {
            $modifiedColumns[':p' . $index++]  = 'cat1';
        }
        if ($this->isColumnModified(AdvsrchTableMap::COL_CAT2)) {
            $modifiedColumns[':p' . $index++]  = 'cat2';
        }
        if ($this->isColumnModified(AdvsrchTableMap::COL_CAT3)) {
            $modifiedColumns[':p' . $index++]  = 'cat3';
        }
        if ($this->isColumnModified(AdvsrchTableMap::COL_CAT4)) {
            $modifiedColumns[':p' . $index++]  = 'cat4';
        }
        if ($this->isColumnModified(AdvsrchTableMap::COL_CAT5)) {
            $modifiedColumns[':p' . $index++]  = 'cat5';
        }
        if ($this->isColumnModified(AdvsrchTableMap::COL_OPTCODE)) {
            $modifiedColumns[':p' . $index++]  = 'optcode';
        }
        if ($this->isColumnModified(AdvsrchTableMap::COL_ADSRCHFIELD)) {
            $modifiedColumns[':p' . $index++]  = 'adsrchfield';
        }
        if ($this->isColumnModified(AdvsrchTableMap::COL_OPTCODEDESC1)) {
            $modifiedColumns[':p' . $index++]  = 'optcodedesc1';
        }
        if ($this->isColumnModified(AdvsrchTableMap::COL_OPTCODEDESC2)) {
            $modifiedColumns[':p' . $index++]  = 'optcodedesc2';
        }
        if ($this->isColumnModified(AdvsrchTableMap::COL_ADSRCHTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'adsrchtype';
        }
        if ($this->isColumnModified(AdvsrchTableMap::COL_DUMMY)) {
            $modifiedColumns[':p' . $index++]  = 'dummy';
        }

        $sql = sprintf(
            'INSERT INTO advsrch (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'recordno':
                        $stmt->bindValue($identifier, $this->recordno, PDO::PARAM_INT);
                        break;
                    case 'catid':
                        $stmt->bindValue($identifier, $this->catid, PDO::PARAM_STR);
                        break;
                    case 'cat1':
                        $stmt->bindValue($identifier, $this->cat1, PDO::PARAM_STR);
                        break;
                    case 'cat2':
                        $stmt->bindValue($identifier, $this->cat2, PDO::PARAM_STR);
                        break;
                    case 'cat3':
                        $stmt->bindValue($identifier, $this->cat3, PDO::PARAM_STR);
                        break;
                    case 'cat4':
                        $stmt->bindValue($identifier, $this->cat4, PDO::PARAM_STR);
                        break;
                    case 'cat5':
                        $stmt->bindValue($identifier, $this->cat5, PDO::PARAM_STR);
                        break;
                    case 'optcode':
                        $stmt->bindValue($identifier, $this->optcode, PDO::PARAM_STR);
                        break;
                    case 'adsrchfield':
                        $stmt->bindValue($identifier, $this->adsrchfield, PDO::PARAM_STR);
                        break;
                    case 'optcodedesc1':
                        $stmt->bindValue($identifier, $this->optcodedesc1, PDO::PARAM_STR);
                        break;
                    case 'optcodedesc2':
                        $stmt->bindValue($identifier, $this->optcodedesc2, PDO::PARAM_STR);
                        break;
                    case 'adsrchtype':
                        $stmt->bindValue($identifier, $this->adsrchtype, PDO::PARAM_STR);
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
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AdvsrchTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getRecordno();
                break;
            case 1:
                return $this->getCatid();
                break;
            case 2:
                return $this->getCat1();
                break;
            case 3:
                return $this->getCat2();
                break;
            case 4:
                return $this->getCat3();
                break;
            case 5:
                return $this->getCat4();
                break;
            case 6:
                return $this->getCat5();
                break;
            case 7:
                return $this->getOptcode();
                break;
            case 8:
                return $this->getAdsrchfield();
                break;
            case 9:
                return $this->getOptcodedesc1();
                break;
            case 10:
                return $this->getOptcodedesc2();
                break;
            case 11:
                return $this->getAdsrchtype();
                break;
            case 12:
                return $this->getDummy();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {

        if (isset($alreadyDumpedObjects['Advsrch'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Advsrch'][$this->hashCode()] = true;
        $keys = AdvsrchTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getRecordno(),
            $keys[1] => $this->getCatid(),
            $keys[2] => $this->getCat1(),
            $keys[3] => $this->getCat2(),
            $keys[4] => $this->getCat3(),
            $keys[5] => $this->getCat4(),
            $keys[6] => $this->getCat5(),
            $keys[7] => $this->getOptcode(),
            $keys[8] => $this->getAdsrchfield(),
            $keys[9] => $this->getOptcodedesc1(),
            $keys[10] => $this->getOptcodedesc2(),
            $keys[11] => $this->getAdsrchtype(),
            $keys[12] => $this->getDummy(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }


        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\Advsrch
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AdvsrchTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Advsrch
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setRecordno($value);
                break;
            case 1:
                $this->setCatid($value);
                break;
            case 2:
                $this->setCat1($value);
                break;
            case 3:
                $this->setCat2($value);
                break;
            case 4:
                $this->setCat3($value);
                break;
            case 5:
                $this->setCat4($value);
                break;
            case 6:
                $this->setCat5($value);
                break;
            case 7:
                $this->setOptcode($value);
                break;
            case 8:
                $this->setAdsrchfield($value);
                break;
            case 9:
                $this->setOptcodedesc1($value);
                break;
            case 10:
                $this->setOptcodedesc2($value);
                break;
            case 11:
                $this->setAdsrchtype($value);
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
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = AdvsrchTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setRecordno($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setCatid($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setCat1($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setCat2($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setCat3($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setCat4($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setCat5($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setOptcode($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setAdsrchfield($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setOptcodedesc1($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setOptcodedesc2($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setAdsrchtype($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setDummy($arr[$keys[12]]);
        }
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
     * @return $this|\Advsrch The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
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
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(AdvsrchTableMap::DATABASE_NAME);

        if ($this->isColumnModified(AdvsrchTableMap::COL_RECORDNO)) {
            $criteria->add(AdvsrchTableMap::COL_RECORDNO, $this->recordno);
        }
        if ($this->isColumnModified(AdvsrchTableMap::COL_CATID)) {
            $criteria->add(AdvsrchTableMap::COL_CATID, $this->catid);
        }
        if ($this->isColumnModified(AdvsrchTableMap::COL_CAT1)) {
            $criteria->add(AdvsrchTableMap::COL_CAT1, $this->cat1);
        }
        if ($this->isColumnModified(AdvsrchTableMap::COL_CAT2)) {
            $criteria->add(AdvsrchTableMap::COL_CAT2, $this->cat2);
        }
        if ($this->isColumnModified(AdvsrchTableMap::COL_CAT3)) {
            $criteria->add(AdvsrchTableMap::COL_CAT3, $this->cat3);
        }
        if ($this->isColumnModified(AdvsrchTableMap::COL_CAT4)) {
            $criteria->add(AdvsrchTableMap::COL_CAT4, $this->cat4);
        }
        if ($this->isColumnModified(AdvsrchTableMap::COL_CAT5)) {
            $criteria->add(AdvsrchTableMap::COL_CAT5, $this->cat5);
        }
        if ($this->isColumnModified(AdvsrchTableMap::COL_OPTCODE)) {
            $criteria->add(AdvsrchTableMap::COL_OPTCODE, $this->optcode);
        }
        if ($this->isColumnModified(AdvsrchTableMap::COL_ADSRCHFIELD)) {
            $criteria->add(AdvsrchTableMap::COL_ADSRCHFIELD, $this->adsrchfield);
        }
        if ($this->isColumnModified(AdvsrchTableMap::COL_OPTCODEDESC1)) {
            $criteria->add(AdvsrchTableMap::COL_OPTCODEDESC1, $this->optcodedesc1);
        }
        if ($this->isColumnModified(AdvsrchTableMap::COL_OPTCODEDESC2)) {
            $criteria->add(AdvsrchTableMap::COL_OPTCODEDESC2, $this->optcodedesc2);
        }
        if ($this->isColumnModified(AdvsrchTableMap::COL_ADSRCHTYPE)) {
            $criteria->add(AdvsrchTableMap::COL_ADSRCHTYPE, $this->adsrchtype);
        }
        if ($this->isColumnModified(AdvsrchTableMap::COL_DUMMY)) {
            $criteria->add(AdvsrchTableMap::COL_DUMMY, $this->dummy);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildAdvsrchQuery::create();
        $criteria->add(AdvsrchTableMap::COL_RECORDNO, $this->recordno);
        $criteria->add(AdvsrchTableMap::COL_CATID, $this->catid);
        $criteria->add(AdvsrchTableMap::COL_CAT1, $this->cat1);
        $criteria->add(AdvsrchTableMap::COL_CAT2, $this->cat2);
        $criteria->add(AdvsrchTableMap::COL_CAT3, $this->cat3);
        $criteria->add(AdvsrchTableMap::COL_CAT4, $this->cat4);
        $criteria->add(AdvsrchTableMap::COL_CAT5, $this->cat5);
        $criteria->add(AdvsrchTableMap::COL_OPTCODE, $this->optcode);
        $criteria->add(AdvsrchTableMap::COL_ADSRCHFIELD, $this->adsrchfield);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getRecordno() &&
            null !== $this->getCatid() &&
            null !== $this->getCat1() &&
            null !== $this->getCat2() &&
            null !== $this->getCat3() &&
            null !== $this->getCat4() &&
            null !== $this->getCat5() &&
            null !== $this->getOptcode() &&
            null !== $this->getAdsrchfield();

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
        $pks = array();
        $pks[0] = $this->getRecordno();
        $pks[1] = $this->getCatid();
        $pks[2] = $this->getCat1();
        $pks[3] = $this->getCat2();
        $pks[4] = $this->getCat3();
        $pks[5] = $this->getCat4();
        $pks[6] = $this->getCat5();
        $pks[7] = $this->getOptcode();
        $pks[8] = $this->getAdsrchfield();

        return $pks;
    }

    /**
     * Set the [composite] primary key.
     *
     * @param      array $keys The elements of the composite key (order must match the order in XML file).
     * @return void
     */
    public function setPrimaryKey($keys)
    {
        $this->setRecordno($keys[0]);
        $this->setCatid($keys[1]);
        $this->setCat1($keys[2]);
        $this->setCat2($keys[3]);
        $this->setCat3($keys[4]);
        $this->setCat4($keys[5]);
        $this->setCat5($keys[6]);
        $this->setOptcode($keys[7]);
        $this->setAdsrchfield($keys[8]);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return (null === $this->getRecordno()) && (null === $this->getCatid()) && (null === $this->getCat1()) && (null === $this->getCat2()) && (null === $this->getCat3()) && (null === $this->getCat4()) && (null === $this->getCat5()) && (null === $this->getOptcode()) && (null === $this->getAdsrchfield());
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Advsrch (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setRecordno($this->getRecordno());
        $copyObj->setCatid($this->getCatid());
        $copyObj->setCat1($this->getCat1());
        $copyObj->setCat2($this->getCat2());
        $copyObj->setCat3($this->getCat3());
        $copyObj->setCat4($this->getCat4());
        $copyObj->setCat5($this->getCat5());
        $copyObj->setOptcode($this->getOptcode());
        $copyObj->setAdsrchfield($this->getAdsrchfield());
        $copyObj->setOptcodedesc1($this->getOptcodedesc1());
        $copyObj->setOptcodedesc2($this->getOptcodedesc2());
        $copyObj->setAdsrchtype($this->getAdsrchtype());
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
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Advsrch Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
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
     */
    public function clear()
    {
        $this->recordno = null;
        $this->catid = null;
        $this->cat1 = null;
        $this->cat2 = null;
        $this->cat3 = null;
        $this->cat4 = null;
        $this->cat5 = null;
        $this->optcode = null;
        $this->adsrchfield = null;
        $this->optcodedesc1 = null;
        $this->optcodedesc2 = null;
        $this->adsrchtype = null;
        $this->dummy = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
        } // if ($deep)

    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(AdvsrchTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
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

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
