<?php

namespace Base;

use \FamilyQuery as ChildFamilyQuery;
use \Exception;
use \PDO;
use Map\FamilyTableMap;
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
 * Base class that represents a row from the 'family' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Family implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\FamilyTableMap';


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
     * The value for the famid field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $famid;

    /**
     * The value for the name1 field.
     *
     * @var        string
     */
    protected $name1;

    /**
     * The value for the name2 field.
     *
     * @var        string
     */
    protected $name2;

    /**
     * The value for the name3 field.
     *
     * @var        string
     */
    protected $name3;

    /**
     * The value for the longdesc field.
     *
     * @var        string
     */
    protected $longdesc;

    /**
     * The value for the image field.
     *
     * @var        string
     */
    protected $image;

    /**
     * The value for the speca field.
     *
     * @var        string
     */
    protected $speca;

    /**
     * The value for the specb field.
     *
     * @var        string
     */
    protected $specb;

    /**
     * The value for the specc field.
     *
     * @var        string
     */
    protected $specc;

    /**
     * The value for the specd field.
     *
     * @var        string
     */
    protected $specd;

    /**
     * The value for the spece field.
     *
     * @var        string
     */
    protected $spece;

    /**
     * The value for the specf field.
     *
     * @var        string
     */
    protected $specf;

    /**
     * The value for the specg field.
     *
     * @var        string
     */
    protected $specg;

    /**
     * The value for the spech field.
     *
     * @var        string
     */
    protected $spech;

    /**
     * The value for the shortdesc field.
     *
     * @var        string
     */
    protected $shortdesc;

    /**
     * The value for the catid field.
     *
     * @var        string
     */
    protected $catid;

    /**
     * The value for the tview field.
     *
     * @var        string
     */
    protected $tview;

    /**
     * The value for the ftype field.
     *
     * @var        string
     */
    protected $ftype;

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
        $this->famid = '';
    }

    /**
     * Initializes internal state of Base\Family object.
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
     * Compares this with another <code>Family</code> instance.  If
     * <code>obj</code> is an instance of <code>Family</code>, delegates to
     * <code>equals(Family)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Family The current object, for fluid interface
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
     * Get the [famid] column value.
     *
     * @return string
     */
    public function getFamid()
    {
        return $this->famid;
    }

    /**
     * Get the [name1] column value.
     *
     * @return string
     */
    public function getName1()
    {
        return $this->name1;
    }

    /**
     * Get the [name2] column value.
     *
     * @return string
     */
    public function getName2()
    {
        return $this->name2;
    }

    /**
     * Get the [name3] column value.
     *
     * @return string
     */
    public function getName3()
    {
        return $this->name3;
    }

    /**
     * Get the [longdesc] column value.
     *
     * @return string
     */
    public function getLongdesc()
    {
        return $this->longdesc;
    }

    /**
     * Get the [image] column value.
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Get the [speca] column value.
     *
     * @return string
     */
    public function getSpeca()
    {
        return $this->speca;
    }

    /**
     * Get the [specb] column value.
     *
     * @return string
     */
    public function getSpecb()
    {
        return $this->specb;
    }

    /**
     * Get the [specc] column value.
     *
     * @return string
     */
    public function getSpecc()
    {
        return $this->specc;
    }

    /**
     * Get the [specd] column value.
     *
     * @return string
     */
    public function getSpecd()
    {
        return $this->specd;
    }

    /**
     * Get the [spece] column value.
     *
     * @return string
     */
    public function getSpece()
    {
        return $this->spece;
    }

    /**
     * Get the [specf] column value.
     *
     * @return string
     */
    public function getSpecf()
    {
        return $this->specf;
    }

    /**
     * Get the [specg] column value.
     *
     * @return string
     */
    public function getSpecg()
    {
        return $this->specg;
    }

    /**
     * Get the [spech] column value.
     *
     * @return string
     */
    public function getSpech()
    {
        return $this->spech;
    }

    /**
     * Get the [shortdesc] column value.
     *
     * @return string
     */
    public function getShortdesc()
    {
        return $this->shortdesc;
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
     * Get the [tview] column value.
     *
     * @return string
     */
    public function getTview()
    {
        return $this->tview;
    }

    /**
     * Get the [ftype] column value.
     *
     * @return string
     */
    public function getFtype()
    {
        return $this->ftype;
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
     * Set the value of [famid] column.
     *
     * @param string $v new value
     * @return $this|\Family The current object (for fluent API support)
     */
    public function setFamid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->famid !== $v) {
            $this->famid = $v;
            $this->modifiedColumns[FamilyTableMap::COL_FAMID] = true;
        }

        return $this;
    } // setFamid()

    /**
     * Set the value of [name1] column.
     *
     * @param string $v new value
     * @return $this|\Family The current object (for fluent API support)
     */
    public function setName1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name1 !== $v) {
            $this->name1 = $v;
            $this->modifiedColumns[FamilyTableMap::COL_NAME1] = true;
        }

        return $this;
    } // setName1()

    /**
     * Set the value of [name2] column.
     *
     * @param string $v new value
     * @return $this|\Family The current object (for fluent API support)
     */
    public function setName2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name2 !== $v) {
            $this->name2 = $v;
            $this->modifiedColumns[FamilyTableMap::COL_NAME2] = true;
        }

        return $this;
    } // setName2()

    /**
     * Set the value of [name3] column.
     *
     * @param string $v new value
     * @return $this|\Family The current object (for fluent API support)
     */
    public function setName3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name3 !== $v) {
            $this->name3 = $v;
            $this->modifiedColumns[FamilyTableMap::COL_NAME3] = true;
        }

        return $this;
    } // setName3()

    /**
     * Set the value of [longdesc] column.
     *
     * @param string $v new value
     * @return $this|\Family The current object (for fluent API support)
     */
    public function setLongdesc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->longdesc !== $v) {
            $this->longdesc = $v;
            $this->modifiedColumns[FamilyTableMap::COL_LONGDESC] = true;
        }

        return $this;
    } // setLongdesc()

    /**
     * Set the value of [image] column.
     *
     * @param string $v new value
     * @return $this|\Family The current object (for fluent API support)
     */
    public function setImage($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->image !== $v) {
            $this->image = $v;
            $this->modifiedColumns[FamilyTableMap::COL_IMAGE] = true;
        }

        return $this;
    } // setImage()

    /**
     * Set the value of [speca] column.
     *
     * @param string $v new value
     * @return $this|\Family The current object (for fluent API support)
     */
    public function setSpeca($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->speca !== $v) {
            $this->speca = $v;
            $this->modifiedColumns[FamilyTableMap::COL_SPECA] = true;
        }

        return $this;
    } // setSpeca()

    /**
     * Set the value of [specb] column.
     *
     * @param string $v new value
     * @return $this|\Family The current object (for fluent API support)
     */
    public function setSpecb($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->specb !== $v) {
            $this->specb = $v;
            $this->modifiedColumns[FamilyTableMap::COL_SPECB] = true;
        }

        return $this;
    } // setSpecb()

    /**
     * Set the value of [specc] column.
     *
     * @param string $v new value
     * @return $this|\Family The current object (for fluent API support)
     */
    public function setSpecc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->specc !== $v) {
            $this->specc = $v;
            $this->modifiedColumns[FamilyTableMap::COL_SPECC] = true;
        }

        return $this;
    } // setSpecc()

    /**
     * Set the value of [specd] column.
     *
     * @param string $v new value
     * @return $this|\Family The current object (for fluent API support)
     */
    public function setSpecd($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->specd !== $v) {
            $this->specd = $v;
            $this->modifiedColumns[FamilyTableMap::COL_SPECD] = true;
        }

        return $this;
    } // setSpecd()

    /**
     * Set the value of [spece] column.
     *
     * @param string $v new value
     * @return $this|\Family The current object (for fluent API support)
     */
    public function setSpece($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->spece !== $v) {
            $this->spece = $v;
            $this->modifiedColumns[FamilyTableMap::COL_SPECE] = true;
        }

        return $this;
    } // setSpece()

    /**
     * Set the value of [specf] column.
     *
     * @param string $v new value
     * @return $this|\Family The current object (for fluent API support)
     */
    public function setSpecf($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->specf !== $v) {
            $this->specf = $v;
            $this->modifiedColumns[FamilyTableMap::COL_SPECF] = true;
        }

        return $this;
    } // setSpecf()

    /**
     * Set the value of [specg] column.
     *
     * @param string $v new value
     * @return $this|\Family The current object (for fluent API support)
     */
    public function setSpecg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->specg !== $v) {
            $this->specg = $v;
            $this->modifiedColumns[FamilyTableMap::COL_SPECG] = true;
        }

        return $this;
    } // setSpecg()

    /**
     * Set the value of [spech] column.
     *
     * @param string $v new value
     * @return $this|\Family The current object (for fluent API support)
     */
    public function setSpech($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->spech !== $v) {
            $this->spech = $v;
            $this->modifiedColumns[FamilyTableMap::COL_SPECH] = true;
        }

        return $this;
    } // setSpech()

    /**
     * Set the value of [shortdesc] column.
     *
     * @param string $v new value
     * @return $this|\Family The current object (for fluent API support)
     */
    public function setShortdesc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shortdesc !== $v) {
            $this->shortdesc = $v;
            $this->modifiedColumns[FamilyTableMap::COL_SHORTDESC] = true;
        }

        return $this;
    } // setShortdesc()

    /**
     * Set the value of [catid] column.
     *
     * @param string $v new value
     * @return $this|\Family The current object (for fluent API support)
     */
    public function setCatid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->catid !== $v) {
            $this->catid = $v;
            $this->modifiedColumns[FamilyTableMap::COL_CATID] = true;
        }

        return $this;
    } // setCatid()

    /**
     * Set the value of [tview] column.
     *
     * @param string $v new value
     * @return $this|\Family The current object (for fluent API support)
     */
    public function setTview($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tview !== $v) {
            $this->tview = $v;
            $this->modifiedColumns[FamilyTableMap::COL_TVIEW] = true;
        }

        return $this;
    } // setTview()

    /**
     * Set the value of [ftype] column.
     *
     * @param string $v new value
     * @return $this|\Family The current object (for fluent API support)
     */
    public function setFtype($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ftype !== $v) {
            $this->ftype = $v;
            $this->modifiedColumns[FamilyTableMap::COL_FTYPE] = true;
        }

        return $this;
    } // setFtype()

    /**
     * Set the value of [dummy] column.
     *
     * @param string $v new value
     * @return $this|\Family The current object (for fluent API support)
     */
    public function setDummy($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dummy !== $v) {
            $this->dummy = $v;
            $this->modifiedColumns[FamilyTableMap::COL_DUMMY] = true;
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
            if ($this->famid !== '') {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : FamilyTableMap::translateFieldName('Famid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->famid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : FamilyTableMap::translateFieldName('Name1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : FamilyTableMap::translateFieldName('Name2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : FamilyTableMap::translateFieldName('Name3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : FamilyTableMap::translateFieldName('Longdesc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->longdesc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : FamilyTableMap::translateFieldName('Image', TableMap::TYPE_PHPNAME, $indexType)];
            $this->image = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : FamilyTableMap::translateFieldName('Speca', TableMap::TYPE_PHPNAME, $indexType)];
            $this->speca = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : FamilyTableMap::translateFieldName('Specb', TableMap::TYPE_PHPNAME, $indexType)];
            $this->specb = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : FamilyTableMap::translateFieldName('Specc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->specc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : FamilyTableMap::translateFieldName('Specd', TableMap::TYPE_PHPNAME, $indexType)];
            $this->specd = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : FamilyTableMap::translateFieldName('Spece', TableMap::TYPE_PHPNAME, $indexType)];
            $this->spece = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : FamilyTableMap::translateFieldName('Specf', TableMap::TYPE_PHPNAME, $indexType)];
            $this->specf = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : FamilyTableMap::translateFieldName('Specg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->specg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : FamilyTableMap::translateFieldName('Spech', TableMap::TYPE_PHPNAME, $indexType)];
            $this->spech = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : FamilyTableMap::translateFieldName('Shortdesc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shortdesc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : FamilyTableMap::translateFieldName('Catid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->catid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : FamilyTableMap::translateFieldName('Tview', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tview = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : FamilyTableMap::translateFieldName('Ftype', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ftype = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : FamilyTableMap::translateFieldName('Dummy', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dummy = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 19; // 19 = FamilyTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Family'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(FamilyTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildFamilyQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see Family::setDeleted()
     * @see Family::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(FamilyTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildFamilyQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(FamilyTableMap::DATABASE_NAME);
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
                FamilyTableMap::addInstanceToPool($this);
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
        if ($this->isColumnModified(FamilyTableMap::COL_FAMID)) {
            $modifiedColumns[':p' . $index++]  = 'famID';
        }
        if ($this->isColumnModified(FamilyTableMap::COL_NAME1)) {
            $modifiedColumns[':p' . $index++]  = 'name1';
        }
        if ($this->isColumnModified(FamilyTableMap::COL_NAME2)) {
            $modifiedColumns[':p' . $index++]  = 'name2';
        }
        if ($this->isColumnModified(FamilyTableMap::COL_NAME3)) {
            $modifiedColumns[':p' . $index++]  = 'name3';
        }
        if ($this->isColumnModified(FamilyTableMap::COL_LONGDESC)) {
            $modifiedColumns[':p' . $index++]  = 'longdesc';
        }
        if ($this->isColumnModified(FamilyTableMap::COL_IMAGE)) {
            $modifiedColumns[':p' . $index++]  = 'image';
        }
        if ($this->isColumnModified(FamilyTableMap::COL_SPECA)) {
            $modifiedColumns[':p' . $index++]  = 'speca';
        }
        if ($this->isColumnModified(FamilyTableMap::COL_SPECB)) {
            $modifiedColumns[':p' . $index++]  = 'specb';
        }
        if ($this->isColumnModified(FamilyTableMap::COL_SPECC)) {
            $modifiedColumns[':p' . $index++]  = 'specc';
        }
        if ($this->isColumnModified(FamilyTableMap::COL_SPECD)) {
            $modifiedColumns[':p' . $index++]  = 'specd';
        }
        if ($this->isColumnModified(FamilyTableMap::COL_SPECE)) {
            $modifiedColumns[':p' . $index++]  = 'spece';
        }
        if ($this->isColumnModified(FamilyTableMap::COL_SPECF)) {
            $modifiedColumns[':p' . $index++]  = 'specf';
        }
        if ($this->isColumnModified(FamilyTableMap::COL_SPECG)) {
            $modifiedColumns[':p' . $index++]  = 'specg';
        }
        if ($this->isColumnModified(FamilyTableMap::COL_SPECH)) {
            $modifiedColumns[':p' . $index++]  = 'spech';
        }
        if ($this->isColumnModified(FamilyTableMap::COL_SHORTDESC)) {
            $modifiedColumns[':p' . $index++]  = 'shortdesc';
        }
        if ($this->isColumnModified(FamilyTableMap::COL_CATID)) {
            $modifiedColumns[':p' . $index++]  = 'catid';
        }
        if ($this->isColumnModified(FamilyTableMap::COL_TVIEW)) {
            $modifiedColumns[':p' . $index++]  = 'tview';
        }
        if ($this->isColumnModified(FamilyTableMap::COL_FTYPE)) {
            $modifiedColumns[':p' . $index++]  = 'ftype';
        }
        if ($this->isColumnModified(FamilyTableMap::COL_DUMMY)) {
            $modifiedColumns[':p' . $index++]  = 'dummy';
        }

        $sql = sprintf(
            'INSERT INTO family (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'famID':
                        $stmt->bindValue($identifier, $this->famid, PDO::PARAM_STR);
                        break;
                    case 'name1':
                        $stmt->bindValue($identifier, $this->name1, PDO::PARAM_STR);
                        break;
                    case 'name2':
                        $stmt->bindValue($identifier, $this->name2, PDO::PARAM_STR);
                        break;
                    case 'name3':
                        $stmt->bindValue($identifier, $this->name3, PDO::PARAM_STR);
                        break;
                    case 'longdesc':
                        $stmt->bindValue($identifier, $this->longdesc, PDO::PARAM_STR);
                        break;
                    case 'image':
                        $stmt->bindValue($identifier, $this->image, PDO::PARAM_STR);
                        break;
                    case 'speca':
                        $stmt->bindValue($identifier, $this->speca, PDO::PARAM_STR);
                        break;
                    case 'specb':
                        $stmt->bindValue($identifier, $this->specb, PDO::PARAM_STR);
                        break;
                    case 'specc':
                        $stmt->bindValue($identifier, $this->specc, PDO::PARAM_STR);
                        break;
                    case 'specd':
                        $stmt->bindValue($identifier, $this->specd, PDO::PARAM_STR);
                        break;
                    case 'spece':
                        $stmt->bindValue($identifier, $this->spece, PDO::PARAM_STR);
                        break;
                    case 'specf':
                        $stmt->bindValue($identifier, $this->specf, PDO::PARAM_STR);
                        break;
                    case 'specg':
                        $stmt->bindValue($identifier, $this->specg, PDO::PARAM_STR);
                        break;
                    case 'spech':
                        $stmt->bindValue($identifier, $this->spech, PDO::PARAM_STR);
                        break;
                    case 'shortdesc':
                        $stmt->bindValue($identifier, $this->shortdesc, PDO::PARAM_STR);
                        break;
                    case 'catid':
                        $stmt->bindValue($identifier, $this->catid, PDO::PARAM_STR);
                        break;
                    case 'tview':
                        $stmt->bindValue($identifier, $this->tview, PDO::PARAM_STR);
                        break;
                    case 'ftype':
                        $stmt->bindValue($identifier, $this->ftype, PDO::PARAM_STR);
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
        $pos = FamilyTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getFamid();
                break;
            case 1:
                return $this->getName1();
                break;
            case 2:
                return $this->getName2();
                break;
            case 3:
                return $this->getName3();
                break;
            case 4:
                return $this->getLongdesc();
                break;
            case 5:
                return $this->getImage();
                break;
            case 6:
                return $this->getSpeca();
                break;
            case 7:
                return $this->getSpecb();
                break;
            case 8:
                return $this->getSpecc();
                break;
            case 9:
                return $this->getSpecd();
                break;
            case 10:
                return $this->getSpece();
                break;
            case 11:
                return $this->getSpecf();
                break;
            case 12:
                return $this->getSpecg();
                break;
            case 13:
                return $this->getSpech();
                break;
            case 14:
                return $this->getShortdesc();
                break;
            case 15:
                return $this->getCatid();
                break;
            case 16:
                return $this->getTview();
                break;
            case 17:
                return $this->getFtype();
                break;
            case 18:
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

        if (isset($alreadyDumpedObjects['Family'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Family'][$this->hashCode()] = true;
        $keys = FamilyTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getFamid(),
            $keys[1] => $this->getName1(),
            $keys[2] => $this->getName2(),
            $keys[3] => $this->getName3(),
            $keys[4] => $this->getLongdesc(),
            $keys[5] => $this->getImage(),
            $keys[6] => $this->getSpeca(),
            $keys[7] => $this->getSpecb(),
            $keys[8] => $this->getSpecc(),
            $keys[9] => $this->getSpecd(),
            $keys[10] => $this->getSpece(),
            $keys[11] => $this->getSpecf(),
            $keys[12] => $this->getSpecg(),
            $keys[13] => $this->getSpech(),
            $keys[14] => $this->getShortdesc(),
            $keys[15] => $this->getCatid(),
            $keys[16] => $this->getTview(),
            $keys[17] => $this->getFtype(),
            $keys[18] => $this->getDummy(),
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
     * @return $this|\Family
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = FamilyTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Family
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setFamid($value);
                break;
            case 1:
                $this->setName1($value);
                break;
            case 2:
                $this->setName2($value);
                break;
            case 3:
                $this->setName3($value);
                break;
            case 4:
                $this->setLongdesc($value);
                break;
            case 5:
                $this->setImage($value);
                break;
            case 6:
                $this->setSpeca($value);
                break;
            case 7:
                $this->setSpecb($value);
                break;
            case 8:
                $this->setSpecc($value);
                break;
            case 9:
                $this->setSpecd($value);
                break;
            case 10:
                $this->setSpece($value);
                break;
            case 11:
                $this->setSpecf($value);
                break;
            case 12:
                $this->setSpecg($value);
                break;
            case 13:
                $this->setSpech($value);
                break;
            case 14:
                $this->setShortdesc($value);
                break;
            case 15:
                $this->setCatid($value);
                break;
            case 16:
                $this->setTview($value);
                break;
            case 17:
                $this->setFtype($value);
                break;
            case 18:
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
        $keys = FamilyTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setFamid($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setName1($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setName2($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setName3($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setLongdesc($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setImage($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setSpeca($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setSpecb($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setSpecc($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setSpecd($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setSpece($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setSpecf($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setSpecg($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setSpech($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setShortdesc($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setCatid($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setTview($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setFtype($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setDummy($arr[$keys[18]]);
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
     * @return $this|\Family The current object, for fluid interface
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
        $criteria = new Criteria(FamilyTableMap::DATABASE_NAME);

        if ($this->isColumnModified(FamilyTableMap::COL_FAMID)) {
            $criteria->add(FamilyTableMap::COL_FAMID, $this->famid);
        }
        if ($this->isColumnModified(FamilyTableMap::COL_NAME1)) {
            $criteria->add(FamilyTableMap::COL_NAME1, $this->name1);
        }
        if ($this->isColumnModified(FamilyTableMap::COL_NAME2)) {
            $criteria->add(FamilyTableMap::COL_NAME2, $this->name2);
        }
        if ($this->isColumnModified(FamilyTableMap::COL_NAME3)) {
            $criteria->add(FamilyTableMap::COL_NAME3, $this->name3);
        }
        if ($this->isColumnModified(FamilyTableMap::COL_LONGDESC)) {
            $criteria->add(FamilyTableMap::COL_LONGDESC, $this->longdesc);
        }
        if ($this->isColumnModified(FamilyTableMap::COL_IMAGE)) {
            $criteria->add(FamilyTableMap::COL_IMAGE, $this->image);
        }
        if ($this->isColumnModified(FamilyTableMap::COL_SPECA)) {
            $criteria->add(FamilyTableMap::COL_SPECA, $this->speca);
        }
        if ($this->isColumnModified(FamilyTableMap::COL_SPECB)) {
            $criteria->add(FamilyTableMap::COL_SPECB, $this->specb);
        }
        if ($this->isColumnModified(FamilyTableMap::COL_SPECC)) {
            $criteria->add(FamilyTableMap::COL_SPECC, $this->specc);
        }
        if ($this->isColumnModified(FamilyTableMap::COL_SPECD)) {
            $criteria->add(FamilyTableMap::COL_SPECD, $this->specd);
        }
        if ($this->isColumnModified(FamilyTableMap::COL_SPECE)) {
            $criteria->add(FamilyTableMap::COL_SPECE, $this->spece);
        }
        if ($this->isColumnModified(FamilyTableMap::COL_SPECF)) {
            $criteria->add(FamilyTableMap::COL_SPECF, $this->specf);
        }
        if ($this->isColumnModified(FamilyTableMap::COL_SPECG)) {
            $criteria->add(FamilyTableMap::COL_SPECG, $this->specg);
        }
        if ($this->isColumnModified(FamilyTableMap::COL_SPECH)) {
            $criteria->add(FamilyTableMap::COL_SPECH, $this->spech);
        }
        if ($this->isColumnModified(FamilyTableMap::COL_SHORTDESC)) {
            $criteria->add(FamilyTableMap::COL_SHORTDESC, $this->shortdesc);
        }
        if ($this->isColumnModified(FamilyTableMap::COL_CATID)) {
            $criteria->add(FamilyTableMap::COL_CATID, $this->catid);
        }
        if ($this->isColumnModified(FamilyTableMap::COL_TVIEW)) {
            $criteria->add(FamilyTableMap::COL_TVIEW, $this->tview);
        }
        if ($this->isColumnModified(FamilyTableMap::COL_FTYPE)) {
            $criteria->add(FamilyTableMap::COL_FTYPE, $this->ftype);
        }
        if ($this->isColumnModified(FamilyTableMap::COL_DUMMY)) {
            $criteria->add(FamilyTableMap::COL_DUMMY, $this->dummy);
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
        $criteria = ChildFamilyQuery::create();
        $criteria->add(FamilyTableMap::COL_FAMID, $this->famid);

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
        $validPk = null !== $this->getFamid();

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
        return $this->getFamid();
    }

    /**
     * Generic method to set the primary key (famid column).
     *
     * @param       string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setFamid($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getFamid();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Family (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFamid($this->getFamid());
        $copyObj->setName1($this->getName1());
        $copyObj->setName2($this->getName2());
        $copyObj->setName3($this->getName3());
        $copyObj->setLongdesc($this->getLongdesc());
        $copyObj->setImage($this->getImage());
        $copyObj->setSpeca($this->getSpeca());
        $copyObj->setSpecb($this->getSpecb());
        $copyObj->setSpecc($this->getSpecc());
        $copyObj->setSpecd($this->getSpecd());
        $copyObj->setSpece($this->getSpece());
        $copyObj->setSpecf($this->getSpecf());
        $copyObj->setSpecg($this->getSpecg());
        $copyObj->setSpech($this->getSpech());
        $copyObj->setShortdesc($this->getShortdesc());
        $copyObj->setCatid($this->getCatid());
        $copyObj->setTview($this->getTview());
        $copyObj->setFtype($this->getFtype());
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
     * @return \Family Clone of current object.
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
        $this->famid = null;
        $this->name1 = null;
        $this->name2 = null;
        $this->name3 = null;
        $this->longdesc = null;
        $this->image = null;
        $this->speca = null;
        $this->specb = null;
        $this->specc = null;
        $this->specd = null;
        $this->spece = null;
        $this->specf = null;
        $this->specg = null;
        $this->spech = null;
        $this->shortdesc = null;
        $this->catid = null;
        $this->tview = null;
        $this->ftype = null;
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
        return (string) $this->exportTo(FamilyTableMap::DEFAULT_STRING_FORMAT);
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
