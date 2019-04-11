<?php

namespace Base;

use \CatagoryQuery as ChildCatagoryQuery;
use \Exception;
use \PDO;
use Map\CatagoryTableMap;
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
 * Base class that represents a row from the 'catagory' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Catagory implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\CatagoryTableMap';


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
     * The value for the catid field.
     *
     * @var        string
     */
    protected $catid;

    /**
     * The value for the catdesc field.
     *
     * @var        string
     */
    protected $catdesc;

    /**
     * The value for the displayorder field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $displayorder;

    /**
     * The value for the sub field.
     *
     * @var        string
     */
    protected $sub;

    /**
     * The value for the parent field.
     *
     * @var        string
     */
    protected $parent;

    /**
     * The value for the cf field.
     *
     * @var        string
     */
    protected $cf;

    /**
     * The value for the pf field.
     *
     * @var        string
     */
    protected $pf;

    /**
     * The value for the cat1 field.
     *
     * @var        string
     */
    protected $cat1;

    /**
     * The value for the fulcat field.
     *
     * @var        string
     */
    protected $fulcat;

    /**
     * The value for the sdis field.
     *
     * @var        string
     */
    protected $sdis;

    /**
     * The value for the cata field.
     *
     * @var        string
     */
    protected $cata;

    /**
     * The value for the catb field.
     *
     * @var        string
     */
    protected $catb;

    /**
     * The value for the catc field.
     *
     * @var        string
     */
    protected $catc;

    /**
     * The value for the catd field.
     *
     * @var        string
     */
    protected $catd;

    /**
     * The value for the cate field.
     *
     * @var        string
     */
    protected $cate;

    /**
     * The value for the image field.
     *
     * @var        string
     */
    protected $image;

    /**
     * The value for the shortdesc field.
     *
     * @var        string
     */
    protected $shortdesc;

    /**
     * The value for the longdesc field.
     *
     * @var        string
     */
    protected $longdesc;

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
        $this->displayorder = 0;
    }

    /**
     * Initializes internal state of Base\Catagory object.
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
     * Compares this with another <code>Catagory</code> instance.  If
     * <code>obj</code> is an instance of <code>Catagory</code>, delegates to
     * <code>equals(Catagory)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Catagory The current object, for fluid interface
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
     * Get the [catid] column value.
     *
     * @return string
     */
    public function getCatid()
    {
        return $this->catid;
    }

    /**
     * Get the [catdesc] column value.
     *
     * @return string
     */
    public function getCatdesc()
    {
        return $this->catdesc;
    }

    /**
     * Get the [displayorder] column value.
     *
     * @return int
     */
    public function getDisplayorder()
    {
        return $this->displayorder;
    }

    /**
     * Get the [sub] column value.
     *
     * @return string
     */
    public function getSub()
    {
        return $this->sub;
    }

    /**
     * Get the [parent] column value.
     *
     * @return string
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Get the [cf] column value.
     *
     * @return string
     */
    public function getCf()
    {
        return $this->cf;
    }

    /**
     * Get the [pf] column value.
     *
     * @return string
     */
    public function getPf()
    {
        return $this->pf;
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
     * Get the [fulcat] column value.
     *
     * @return string
     */
    public function getFulcat()
    {
        return $this->fulcat;
    }

    /**
     * Get the [sdis] column value.
     *
     * @return string
     */
    public function getSdis()
    {
        return $this->sdis;
    }

    /**
     * Get the [cata] column value.
     *
     * @return string
     */
    public function getCata()
    {
        return $this->cata;
    }

    /**
     * Get the [catb] column value.
     *
     * @return string
     */
    public function getCatb()
    {
        return $this->catb;
    }

    /**
     * Get the [catc] column value.
     *
     * @return string
     */
    public function getCatc()
    {
        return $this->catc;
    }

    /**
     * Get the [catd] column value.
     *
     * @return string
     */
    public function getCatd()
    {
        return $this->catd;
    }

    /**
     * Get the [cate] column value.
     *
     * @return string
     */
    public function getCate()
    {
        return $this->cate;
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
     * Get the [shortdesc] column value.
     *
     * @return string
     */
    public function getShortdesc()
    {
        return $this->shortdesc;
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
     * Get the [dummy] column value.
     *
     * @return string
     */
    public function getDummy()
    {
        return $this->dummy;
    }

    /**
     * Set the value of [catid] column.
     *
     * @param string $v new value
     * @return $this|\Catagory The current object (for fluent API support)
     */
    public function setCatid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->catid !== $v) {
            $this->catid = $v;
            $this->modifiedColumns[CatagoryTableMap::COL_CATID] = true;
        }

        return $this;
    } // setCatid()

    /**
     * Set the value of [catdesc] column.
     *
     * @param string $v new value
     * @return $this|\Catagory The current object (for fluent API support)
     */
    public function setCatdesc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->catdesc !== $v) {
            $this->catdesc = $v;
            $this->modifiedColumns[CatagoryTableMap::COL_CATDESC] = true;
        }

        return $this;
    } // setCatdesc()

    /**
     * Set the value of [displayorder] column.
     *
     * @param int $v new value
     * @return $this|\Catagory The current object (for fluent API support)
     */
    public function setDisplayorder($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->displayorder !== $v) {
            $this->displayorder = $v;
            $this->modifiedColumns[CatagoryTableMap::COL_DISPLAYORDER] = true;
        }

        return $this;
    } // setDisplayorder()

    /**
     * Set the value of [sub] column.
     *
     * @param string $v new value
     * @return $this|\Catagory The current object (for fluent API support)
     */
    public function setSub($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sub !== $v) {
            $this->sub = $v;
            $this->modifiedColumns[CatagoryTableMap::COL_SUB] = true;
        }

        return $this;
    } // setSub()

    /**
     * Set the value of [parent] column.
     *
     * @param string $v new value
     * @return $this|\Catagory The current object (for fluent API support)
     */
    public function setParent($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->parent !== $v) {
            $this->parent = $v;
            $this->modifiedColumns[CatagoryTableMap::COL_PARENT] = true;
        }

        return $this;
    } // setParent()

    /**
     * Set the value of [cf] column.
     *
     * @param string $v new value
     * @return $this|\Catagory The current object (for fluent API support)
     */
    public function setCf($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cf !== $v) {
            $this->cf = $v;
            $this->modifiedColumns[CatagoryTableMap::COL_CF] = true;
        }

        return $this;
    } // setCf()

    /**
     * Set the value of [pf] column.
     *
     * @param string $v new value
     * @return $this|\Catagory The current object (for fluent API support)
     */
    public function setPf($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pf !== $v) {
            $this->pf = $v;
            $this->modifiedColumns[CatagoryTableMap::COL_PF] = true;
        }

        return $this;
    } // setPf()

    /**
     * Set the value of [cat1] column.
     *
     * @param string $v new value
     * @return $this|\Catagory The current object (for fluent API support)
     */
    public function setCat1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cat1 !== $v) {
            $this->cat1 = $v;
            $this->modifiedColumns[CatagoryTableMap::COL_CAT1] = true;
        }

        return $this;
    } // setCat1()

    /**
     * Set the value of [fulcat] column.
     *
     * @param string $v new value
     * @return $this|\Catagory The current object (for fluent API support)
     */
    public function setFulcat($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->fulcat !== $v) {
            $this->fulcat = $v;
            $this->modifiedColumns[CatagoryTableMap::COL_FULCAT] = true;
        }

        return $this;
    } // setFulcat()

    /**
     * Set the value of [sdis] column.
     *
     * @param string $v new value
     * @return $this|\Catagory The current object (for fluent API support)
     */
    public function setSdis($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sdis !== $v) {
            $this->sdis = $v;
            $this->modifiedColumns[CatagoryTableMap::COL_SDIS] = true;
        }

        return $this;
    } // setSdis()

    /**
     * Set the value of [cata] column.
     *
     * @param string $v new value
     * @return $this|\Catagory The current object (for fluent API support)
     */
    public function setCata($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cata !== $v) {
            $this->cata = $v;
            $this->modifiedColumns[CatagoryTableMap::COL_CATA] = true;
        }

        return $this;
    } // setCata()

    /**
     * Set the value of [catb] column.
     *
     * @param string $v new value
     * @return $this|\Catagory The current object (for fluent API support)
     */
    public function setCatb($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->catb !== $v) {
            $this->catb = $v;
            $this->modifiedColumns[CatagoryTableMap::COL_CATB] = true;
        }

        return $this;
    } // setCatb()

    /**
     * Set the value of [catc] column.
     *
     * @param string $v new value
     * @return $this|\Catagory The current object (for fluent API support)
     */
    public function setCatc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->catc !== $v) {
            $this->catc = $v;
            $this->modifiedColumns[CatagoryTableMap::COL_CATC] = true;
        }

        return $this;
    } // setCatc()

    /**
     * Set the value of [catd] column.
     *
     * @param string $v new value
     * @return $this|\Catagory The current object (for fluent API support)
     */
    public function setCatd($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->catd !== $v) {
            $this->catd = $v;
            $this->modifiedColumns[CatagoryTableMap::COL_CATD] = true;
        }

        return $this;
    } // setCatd()

    /**
     * Set the value of [cate] column.
     *
     * @param string $v new value
     * @return $this|\Catagory The current object (for fluent API support)
     */
    public function setCate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cate !== $v) {
            $this->cate = $v;
            $this->modifiedColumns[CatagoryTableMap::COL_CATE] = true;
        }

        return $this;
    } // setCate()

    /**
     * Set the value of [image] column.
     *
     * @param string $v new value
     * @return $this|\Catagory The current object (for fluent API support)
     */
    public function setImage($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->image !== $v) {
            $this->image = $v;
            $this->modifiedColumns[CatagoryTableMap::COL_IMAGE] = true;
        }

        return $this;
    } // setImage()

    /**
     * Set the value of [shortdesc] column.
     *
     * @param string $v new value
     * @return $this|\Catagory The current object (for fluent API support)
     */
    public function setShortdesc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shortdesc !== $v) {
            $this->shortdesc = $v;
            $this->modifiedColumns[CatagoryTableMap::COL_SHORTDESC] = true;
        }

        return $this;
    } // setShortdesc()

    /**
     * Set the value of [longdesc] column.
     *
     * @param string $v new value
     * @return $this|\Catagory The current object (for fluent API support)
     */
    public function setLongdesc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->longdesc !== $v) {
            $this->longdesc = $v;
            $this->modifiedColumns[CatagoryTableMap::COL_LONGDESC] = true;
        }

        return $this;
    } // setLongdesc()

    /**
     * Set the value of [dummy] column.
     *
     * @param string $v new value
     * @return $this|\Catagory The current object (for fluent API support)
     */
    public function setDummy($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dummy !== $v) {
            $this->dummy = $v;
            $this->modifiedColumns[CatagoryTableMap::COL_DUMMY] = true;
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
            if ($this->displayorder !== 0) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : CatagoryTableMap::translateFieldName('Catid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->catid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : CatagoryTableMap::translateFieldName('Catdesc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->catdesc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : CatagoryTableMap::translateFieldName('Displayorder', TableMap::TYPE_PHPNAME, $indexType)];
            $this->displayorder = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : CatagoryTableMap::translateFieldName('Sub', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sub = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : CatagoryTableMap::translateFieldName('Parent', TableMap::TYPE_PHPNAME, $indexType)];
            $this->parent = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : CatagoryTableMap::translateFieldName('Cf', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cf = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : CatagoryTableMap::translateFieldName('Pf', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pf = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : CatagoryTableMap::translateFieldName('Cat1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cat1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : CatagoryTableMap::translateFieldName('Fulcat', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fulcat = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : CatagoryTableMap::translateFieldName('Sdis', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sdis = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : CatagoryTableMap::translateFieldName('Cata', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cata = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : CatagoryTableMap::translateFieldName('Catb', TableMap::TYPE_PHPNAME, $indexType)];
            $this->catb = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : CatagoryTableMap::translateFieldName('Catc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->catc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : CatagoryTableMap::translateFieldName('Catd', TableMap::TYPE_PHPNAME, $indexType)];
            $this->catd = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : CatagoryTableMap::translateFieldName('Cate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : CatagoryTableMap::translateFieldName('Image', TableMap::TYPE_PHPNAME, $indexType)];
            $this->image = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : CatagoryTableMap::translateFieldName('Shortdesc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shortdesc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : CatagoryTableMap::translateFieldName('Longdesc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->longdesc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : CatagoryTableMap::translateFieldName('Dummy', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dummy = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 19; // 19 = CatagoryTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Catagory'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(CatagoryTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildCatagoryQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see Catagory::setDeleted()
     * @see Catagory::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(CatagoryTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildCatagoryQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(CatagoryTableMap::DATABASE_NAME);
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
                CatagoryTableMap::addInstanceToPool($this);
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
        if ($this->isColumnModified(CatagoryTableMap::COL_CATID)) {
            $modifiedColumns[':p' . $index++]  = 'catid';
        }
        if ($this->isColumnModified(CatagoryTableMap::COL_CATDESC)) {
            $modifiedColumns[':p' . $index++]  = 'catdesc';
        }
        if ($this->isColumnModified(CatagoryTableMap::COL_DISPLAYORDER)) {
            $modifiedColumns[':p' . $index++]  = 'displayOrder';
        }
        if ($this->isColumnModified(CatagoryTableMap::COL_SUB)) {
            $modifiedColumns[':p' . $index++]  = 'sub';
        }
        if ($this->isColumnModified(CatagoryTableMap::COL_PARENT)) {
            $modifiedColumns[':p' . $index++]  = 'parent';
        }
        if ($this->isColumnModified(CatagoryTableMap::COL_CF)) {
            $modifiedColumns[':p' . $index++]  = 'cf';
        }
        if ($this->isColumnModified(CatagoryTableMap::COL_PF)) {
            $modifiedColumns[':p' . $index++]  = 'pf';
        }
        if ($this->isColumnModified(CatagoryTableMap::COL_CAT1)) {
            $modifiedColumns[':p' . $index++]  = 'cat1';
        }
        if ($this->isColumnModified(CatagoryTableMap::COL_FULCAT)) {
            $modifiedColumns[':p' . $index++]  = 'fulcat';
        }
        if ($this->isColumnModified(CatagoryTableMap::COL_SDIS)) {
            $modifiedColumns[':p' . $index++]  = 'sdis';
        }
        if ($this->isColumnModified(CatagoryTableMap::COL_CATA)) {
            $modifiedColumns[':p' . $index++]  = 'cata';
        }
        if ($this->isColumnModified(CatagoryTableMap::COL_CATB)) {
            $modifiedColumns[':p' . $index++]  = 'catb';
        }
        if ($this->isColumnModified(CatagoryTableMap::COL_CATC)) {
            $modifiedColumns[':p' . $index++]  = 'catc';
        }
        if ($this->isColumnModified(CatagoryTableMap::COL_CATD)) {
            $modifiedColumns[':p' . $index++]  = 'catd';
        }
        if ($this->isColumnModified(CatagoryTableMap::COL_CATE)) {
            $modifiedColumns[':p' . $index++]  = 'cate';
        }
        if ($this->isColumnModified(CatagoryTableMap::COL_IMAGE)) {
            $modifiedColumns[':p' . $index++]  = 'image';
        }
        if ($this->isColumnModified(CatagoryTableMap::COL_SHORTDESC)) {
            $modifiedColumns[':p' . $index++]  = 'shortdesc';
        }
        if ($this->isColumnModified(CatagoryTableMap::COL_LONGDESC)) {
            $modifiedColumns[':p' . $index++]  = 'longdesc';
        }
        if ($this->isColumnModified(CatagoryTableMap::COL_DUMMY)) {
            $modifiedColumns[':p' . $index++]  = 'dummy';
        }

        $sql = sprintf(
            'INSERT INTO catagory (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'catid':
                        $stmt->bindValue($identifier, $this->catid, PDO::PARAM_STR);
                        break;
                    case 'catdesc':
                        $stmt->bindValue($identifier, $this->catdesc, PDO::PARAM_STR);
                        break;
                    case 'displayOrder':
                        $stmt->bindValue($identifier, $this->displayorder, PDO::PARAM_INT);
                        break;
                    case 'sub':
                        $stmt->bindValue($identifier, $this->sub, PDO::PARAM_STR);
                        break;
                    case 'parent':
                        $stmt->bindValue($identifier, $this->parent, PDO::PARAM_STR);
                        break;
                    case 'cf':
                        $stmt->bindValue($identifier, $this->cf, PDO::PARAM_STR);
                        break;
                    case 'pf':
                        $stmt->bindValue($identifier, $this->pf, PDO::PARAM_STR);
                        break;
                    case 'cat1':
                        $stmt->bindValue($identifier, $this->cat1, PDO::PARAM_STR);
                        break;
                    case 'fulcat':
                        $stmt->bindValue($identifier, $this->fulcat, PDO::PARAM_STR);
                        break;
                    case 'sdis':
                        $stmt->bindValue($identifier, $this->sdis, PDO::PARAM_STR);
                        break;
                    case 'cata':
                        $stmt->bindValue($identifier, $this->cata, PDO::PARAM_STR);
                        break;
                    case 'catb':
                        $stmt->bindValue($identifier, $this->catb, PDO::PARAM_STR);
                        break;
                    case 'catc':
                        $stmt->bindValue($identifier, $this->catc, PDO::PARAM_STR);
                        break;
                    case 'catd':
                        $stmt->bindValue($identifier, $this->catd, PDO::PARAM_STR);
                        break;
                    case 'cate':
                        $stmt->bindValue($identifier, $this->cate, PDO::PARAM_STR);
                        break;
                    case 'image':
                        $stmt->bindValue($identifier, $this->image, PDO::PARAM_STR);
                        break;
                    case 'shortdesc':
                        $stmt->bindValue($identifier, $this->shortdesc, PDO::PARAM_STR);
                        break;
                    case 'longdesc':
                        $stmt->bindValue($identifier, $this->longdesc, PDO::PARAM_STR);
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
        $pos = CatagoryTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getCatid();
                break;
            case 1:
                return $this->getCatdesc();
                break;
            case 2:
                return $this->getDisplayorder();
                break;
            case 3:
                return $this->getSub();
                break;
            case 4:
                return $this->getParent();
                break;
            case 5:
                return $this->getCf();
                break;
            case 6:
                return $this->getPf();
                break;
            case 7:
                return $this->getCat1();
                break;
            case 8:
                return $this->getFulcat();
                break;
            case 9:
                return $this->getSdis();
                break;
            case 10:
                return $this->getCata();
                break;
            case 11:
                return $this->getCatb();
                break;
            case 12:
                return $this->getCatc();
                break;
            case 13:
                return $this->getCatd();
                break;
            case 14:
                return $this->getCate();
                break;
            case 15:
                return $this->getImage();
                break;
            case 16:
                return $this->getShortdesc();
                break;
            case 17:
                return $this->getLongdesc();
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

        if (isset($alreadyDumpedObjects['Catagory'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Catagory'][$this->hashCode()] = true;
        $keys = CatagoryTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getCatid(),
            $keys[1] => $this->getCatdesc(),
            $keys[2] => $this->getDisplayorder(),
            $keys[3] => $this->getSub(),
            $keys[4] => $this->getParent(),
            $keys[5] => $this->getCf(),
            $keys[6] => $this->getPf(),
            $keys[7] => $this->getCat1(),
            $keys[8] => $this->getFulcat(),
            $keys[9] => $this->getSdis(),
            $keys[10] => $this->getCata(),
            $keys[11] => $this->getCatb(),
            $keys[12] => $this->getCatc(),
            $keys[13] => $this->getCatd(),
            $keys[14] => $this->getCate(),
            $keys[15] => $this->getImage(),
            $keys[16] => $this->getShortdesc(),
            $keys[17] => $this->getLongdesc(),
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
     * @return $this|\Catagory
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = CatagoryTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Catagory
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setCatid($value);
                break;
            case 1:
                $this->setCatdesc($value);
                break;
            case 2:
                $this->setDisplayorder($value);
                break;
            case 3:
                $this->setSub($value);
                break;
            case 4:
                $this->setParent($value);
                break;
            case 5:
                $this->setCf($value);
                break;
            case 6:
                $this->setPf($value);
                break;
            case 7:
                $this->setCat1($value);
                break;
            case 8:
                $this->setFulcat($value);
                break;
            case 9:
                $this->setSdis($value);
                break;
            case 10:
                $this->setCata($value);
                break;
            case 11:
                $this->setCatb($value);
                break;
            case 12:
                $this->setCatc($value);
                break;
            case 13:
                $this->setCatd($value);
                break;
            case 14:
                $this->setCate($value);
                break;
            case 15:
                $this->setImage($value);
                break;
            case 16:
                $this->setShortdesc($value);
                break;
            case 17:
                $this->setLongdesc($value);
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
        $keys = CatagoryTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setCatid($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setCatdesc($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setDisplayorder($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setSub($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setParent($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setCf($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setPf($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setCat1($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setFulcat($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setSdis($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setCata($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setCatb($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setCatc($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setCatd($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setCate($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setImage($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setShortdesc($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setLongdesc($arr[$keys[17]]);
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
     * @return $this|\Catagory The current object, for fluid interface
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
        $criteria = new Criteria(CatagoryTableMap::DATABASE_NAME);

        if ($this->isColumnModified(CatagoryTableMap::COL_CATID)) {
            $criteria->add(CatagoryTableMap::COL_CATID, $this->catid);
        }
        if ($this->isColumnModified(CatagoryTableMap::COL_CATDESC)) {
            $criteria->add(CatagoryTableMap::COL_CATDESC, $this->catdesc);
        }
        if ($this->isColumnModified(CatagoryTableMap::COL_DISPLAYORDER)) {
            $criteria->add(CatagoryTableMap::COL_DISPLAYORDER, $this->displayorder);
        }
        if ($this->isColumnModified(CatagoryTableMap::COL_SUB)) {
            $criteria->add(CatagoryTableMap::COL_SUB, $this->sub);
        }
        if ($this->isColumnModified(CatagoryTableMap::COL_PARENT)) {
            $criteria->add(CatagoryTableMap::COL_PARENT, $this->parent);
        }
        if ($this->isColumnModified(CatagoryTableMap::COL_CF)) {
            $criteria->add(CatagoryTableMap::COL_CF, $this->cf);
        }
        if ($this->isColumnModified(CatagoryTableMap::COL_PF)) {
            $criteria->add(CatagoryTableMap::COL_PF, $this->pf);
        }
        if ($this->isColumnModified(CatagoryTableMap::COL_CAT1)) {
            $criteria->add(CatagoryTableMap::COL_CAT1, $this->cat1);
        }
        if ($this->isColumnModified(CatagoryTableMap::COL_FULCAT)) {
            $criteria->add(CatagoryTableMap::COL_FULCAT, $this->fulcat);
        }
        if ($this->isColumnModified(CatagoryTableMap::COL_SDIS)) {
            $criteria->add(CatagoryTableMap::COL_SDIS, $this->sdis);
        }
        if ($this->isColumnModified(CatagoryTableMap::COL_CATA)) {
            $criteria->add(CatagoryTableMap::COL_CATA, $this->cata);
        }
        if ($this->isColumnModified(CatagoryTableMap::COL_CATB)) {
            $criteria->add(CatagoryTableMap::COL_CATB, $this->catb);
        }
        if ($this->isColumnModified(CatagoryTableMap::COL_CATC)) {
            $criteria->add(CatagoryTableMap::COL_CATC, $this->catc);
        }
        if ($this->isColumnModified(CatagoryTableMap::COL_CATD)) {
            $criteria->add(CatagoryTableMap::COL_CATD, $this->catd);
        }
        if ($this->isColumnModified(CatagoryTableMap::COL_CATE)) {
            $criteria->add(CatagoryTableMap::COL_CATE, $this->cate);
        }
        if ($this->isColumnModified(CatagoryTableMap::COL_IMAGE)) {
            $criteria->add(CatagoryTableMap::COL_IMAGE, $this->image);
        }
        if ($this->isColumnModified(CatagoryTableMap::COL_SHORTDESC)) {
            $criteria->add(CatagoryTableMap::COL_SHORTDESC, $this->shortdesc);
        }
        if ($this->isColumnModified(CatagoryTableMap::COL_LONGDESC)) {
            $criteria->add(CatagoryTableMap::COL_LONGDESC, $this->longdesc);
        }
        if ($this->isColumnModified(CatagoryTableMap::COL_DUMMY)) {
            $criteria->add(CatagoryTableMap::COL_DUMMY, $this->dummy);
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
        $criteria = ChildCatagoryQuery::create();
        $criteria->add(CatagoryTableMap::COL_CATID, $this->catid);
        $criteria->add(CatagoryTableMap::COL_DISPLAYORDER, $this->displayorder);

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
        $validPk = null !== $this->getCatid() &&
            null !== $this->getDisplayorder();

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
        $pks[0] = $this->getCatid();
        $pks[1] = $this->getDisplayorder();

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
        $this->setCatid($keys[0]);
        $this->setDisplayorder($keys[1]);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return (null === $this->getCatid()) && (null === $this->getDisplayorder());
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Catagory (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setCatid($this->getCatid());
        $copyObj->setCatdesc($this->getCatdesc());
        $copyObj->setDisplayorder($this->getDisplayorder());
        $copyObj->setSub($this->getSub());
        $copyObj->setParent($this->getParent());
        $copyObj->setCf($this->getCf());
        $copyObj->setPf($this->getPf());
        $copyObj->setCat1($this->getCat1());
        $copyObj->setFulcat($this->getFulcat());
        $copyObj->setSdis($this->getSdis());
        $copyObj->setCata($this->getCata());
        $copyObj->setCatb($this->getCatb());
        $copyObj->setCatc($this->getCatc());
        $copyObj->setCatd($this->getCatd());
        $copyObj->setCate($this->getCate());
        $copyObj->setImage($this->getImage());
        $copyObj->setShortdesc($this->getShortdesc());
        $copyObj->setLongdesc($this->getLongdesc());
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
     * @return \Catagory Clone of current object.
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
        $this->catid = null;
        $this->catdesc = null;
        $this->displayorder = null;
        $this->sub = null;
        $this->parent = null;
        $this->cf = null;
        $this->pf = null;
        $this->cat1 = null;
        $this->fulcat = null;
        $this->sdis = null;
        $this->cata = null;
        $this->catb = null;
        $this->catc = null;
        $this->catd = null;
        $this->cate = null;
        $this->image = null;
        $this->shortdesc = null;
        $this->longdesc = null;
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
        return (string) $this->exportTo(CatagoryTableMap::DEFAULT_STRING_FORMAT);
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
