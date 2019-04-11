<?php

namespace Base;

use \WhseTblQuery as ChildWhseTblQuery;
use \Exception;
use \PDO;
use Map\WhseTblTableMap;
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
 * Base class that represents a row from the 'whse_tbl' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class WhseTbl implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\WhseTblTableMap';


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
     * The value for the whseid field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $whseid;

    /**
     * The value for the whsename field.
     *
     * @var        string
     */
    protected $whsename;

    /**
     * The value for the whseadr1 field.
     *
     * @var        string
     */
    protected $whseadr1;

    /**
     * The value for the whseadr2 field.
     *
     * @var        string
     */
    protected $whseadr2;

    /**
     * The value for the whsecity field.
     *
     * @var        string
     */
    protected $whsecity;

    /**
     * The value for the whsestat field.
     *
     * @var        string
     */
    protected $whsestat;

    /**
     * The value for the whsezipcode field.
     *
     * @var        string
     */
    protected $whsezipcode;

    /**
     * The value for the whsectry field.
     *
     * @var        string
     */
    protected $whsectry;

    /**
     * The value for the whseusehandheld field.
     *
     * @var        string
     */
    protected $whseusehandheld;

    /**
     * The value for the whsecashcust field.
     *
     * @var        string
     */
    protected $whsecashcust;

    /**
     * The value for the whsepickdtl field.
     *
     * @var        string
     */
    protected $whsepickdtl;

    /**
     * The value for the whseprodbin field.
     *
     * @var        string
     */
    protected $whseprodbin;

    /**
     * The value for the whsephone field.
     *
     * @var        string
     */
    protected $whsephone;

    /**
     * The value for the whsephoneext field.
     *
     * @var        string
     */
    protected $whsephoneext;

    /**
     * The value for the whsefax field.
     *
     * @var        string
     */
    protected $whsefax;

    /**
     * The value for the whseemailadr field.
     *
     * @var        string
     */
    protected $whseemailadr;

    /**
     * The value for the whseqcrgabin field.
     *
     * @var        string
     */
    protected $whseqcrgabin;

    /**
     * The value for the whserfprinter1 field.
     *
     * @var        string
     */
    protected $whserfprinter1;

    /**
     * The value for the whserfprinter2 field.
     *
     * @var        string
     */
    protected $whserfprinter2;

    /**
     * The value for the whserfprinter3 field.
     *
     * @var        string
     */
    protected $whserfprinter3;

    /**
     * The value for the whserfprinter4 field.
     *
     * @var        string
     */
    protected $whserfprinter4;

    /**
     * The value for the whserfprinter5 field.
     *
     * @var        string
     */
    protected $whserfprinter5;

    /**
     * The value for the whseprofwhse field.
     *
     * @var        string
     */
    protected $whseprofwhse;

    /**
     * The value for the whseasetwhse field.
     *
     * @var        string
     */
    protected $whseasetwhse;

    /**
     * The value for the whseconsignwhse field.
     *
     * @var        string
     */
    protected $whseconsignwhse;

    /**
     * The value for the whsebinrangelist field.
     *
     * @var        string
     */
    protected $whsebinrangelist;

    /**
     * The value for the whsesupplywhse field.
     *
     * @var        string
     */
    protected $whsesupplywhse;

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
        $this->whseid = '';
    }

    /**
     * Initializes internal state of Base\WhseTbl object.
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
     * Compares this with another <code>WhseTbl</code> instance.  If
     * <code>obj</code> is an instance of <code>WhseTbl</code>, delegates to
     * <code>equals(WhseTbl)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|WhseTbl The current object, for fluid interface
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
     * Get the [whseid] column value.
     *
     * @return string
     */
    public function getWhseid()
    {
        return $this->whseid;
    }

    /**
     * Get the [whsename] column value.
     *
     * @return string
     */
    public function getWhsename()
    {
        return $this->whsename;
    }

    /**
     * Get the [whseadr1] column value.
     *
     * @return string
     */
    public function getWhseadr1()
    {
        return $this->whseadr1;
    }

    /**
     * Get the [whseadr2] column value.
     *
     * @return string
     */
    public function getWhseadr2()
    {
        return $this->whseadr2;
    }

    /**
     * Get the [whsecity] column value.
     *
     * @return string
     */
    public function getWhsecity()
    {
        return $this->whsecity;
    }

    /**
     * Get the [whsestat] column value.
     *
     * @return string
     */
    public function getWhsestat()
    {
        return $this->whsestat;
    }

    /**
     * Get the [whsezipcode] column value.
     *
     * @return string
     */
    public function getWhsezipcode()
    {
        return $this->whsezipcode;
    }

    /**
     * Get the [whsectry] column value.
     *
     * @return string
     */
    public function getWhsectry()
    {
        return $this->whsectry;
    }

    /**
     * Get the [whseusehandheld] column value.
     *
     * @return string
     */
    public function getWhseusehandheld()
    {
        return $this->whseusehandheld;
    }

    /**
     * Get the [whsecashcust] column value.
     *
     * @return string
     */
    public function getWhsecashcust()
    {
        return $this->whsecashcust;
    }

    /**
     * Get the [whsepickdtl] column value.
     *
     * @return string
     */
    public function getWhsepickdtl()
    {
        return $this->whsepickdtl;
    }

    /**
     * Get the [whseprodbin] column value.
     *
     * @return string
     */
    public function getWhseprodbin()
    {
        return $this->whseprodbin;
    }

    /**
     * Get the [whsephone] column value.
     *
     * @return string
     */
    public function getWhsephone()
    {
        return $this->whsephone;
    }

    /**
     * Get the [whsephoneext] column value.
     *
     * @return string
     */
    public function getWhsephoneext()
    {
        return $this->whsephoneext;
    }

    /**
     * Get the [whsefax] column value.
     *
     * @return string
     */
    public function getWhsefax()
    {
        return $this->whsefax;
    }

    /**
     * Get the [whseemailadr] column value.
     *
     * @return string
     */
    public function getWhseemailadr()
    {
        return $this->whseemailadr;
    }

    /**
     * Get the [whseqcrgabin] column value.
     *
     * @return string
     */
    public function getWhseqcrgabin()
    {
        return $this->whseqcrgabin;
    }

    /**
     * Get the [whserfprinter1] column value.
     *
     * @return string
     */
    public function getWhserfprinter1()
    {
        return $this->whserfprinter1;
    }

    /**
     * Get the [whserfprinter2] column value.
     *
     * @return string
     */
    public function getWhserfprinter2()
    {
        return $this->whserfprinter2;
    }

    /**
     * Get the [whserfprinter3] column value.
     *
     * @return string
     */
    public function getWhserfprinter3()
    {
        return $this->whserfprinter3;
    }

    /**
     * Get the [whserfprinter4] column value.
     *
     * @return string
     */
    public function getWhserfprinter4()
    {
        return $this->whserfprinter4;
    }

    /**
     * Get the [whserfprinter5] column value.
     *
     * @return string
     */
    public function getWhserfprinter5()
    {
        return $this->whserfprinter5;
    }

    /**
     * Get the [whseprofwhse] column value.
     *
     * @return string
     */
    public function getWhseprofwhse()
    {
        return $this->whseprofwhse;
    }

    /**
     * Get the [whseasetwhse] column value.
     *
     * @return string
     */
    public function getWhseasetwhse()
    {
        return $this->whseasetwhse;
    }

    /**
     * Get the [whseconsignwhse] column value.
     *
     * @return string
     */
    public function getWhseconsignwhse()
    {
        return $this->whseconsignwhse;
    }

    /**
     * Get the [whsebinrangelist] column value.
     *
     * @return string
     */
    public function getWhsebinrangelist()
    {
        return $this->whsebinrangelist;
    }

    /**
     * Get the [whsesupplywhse] column value.
     *
     * @return string
     */
    public function getWhsesupplywhse()
    {
        return $this->whsesupplywhse;
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
     * Set the value of [whseid] column.
     *
     * @param string $v new value
     * @return $this|\WhseTbl The current object (for fluent API support)
     */
    public function setWhseid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->whseid !== $v) {
            $this->whseid = $v;
            $this->modifiedColumns[WhseTblTableMap::COL_WHSEID] = true;
        }

        return $this;
    } // setWhseid()

    /**
     * Set the value of [whsename] column.
     *
     * @param string $v new value
     * @return $this|\WhseTbl The current object (for fluent API support)
     */
    public function setWhsename($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->whsename !== $v) {
            $this->whsename = $v;
            $this->modifiedColumns[WhseTblTableMap::COL_WHSENAME] = true;
        }

        return $this;
    } // setWhsename()

    /**
     * Set the value of [whseadr1] column.
     *
     * @param string $v new value
     * @return $this|\WhseTbl The current object (for fluent API support)
     */
    public function setWhseadr1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->whseadr1 !== $v) {
            $this->whseadr1 = $v;
            $this->modifiedColumns[WhseTblTableMap::COL_WHSEADR1] = true;
        }

        return $this;
    } // setWhseadr1()

    /**
     * Set the value of [whseadr2] column.
     *
     * @param string $v new value
     * @return $this|\WhseTbl The current object (for fluent API support)
     */
    public function setWhseadr2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->whseadr2 !== $v) {
            $this->whseadr2 = $v;
            $this->modifiedColumns[WhseTblTableMap::COL_WHSEADR2] = true;
        }

        return $this;
    } // setWhseadr2()

    /**
     * Set the value of [whsecity] column.
     *
     * @param string $v new value
     * @return $this|\WhseTbl The current object (for fluent API support)
     */
    public function setWhsecity($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->whsecity !== $v) {
            $this->whsecity = $v;
            $this->modifiedColumns[WhseTblTableMap::COL_WHSECITY] = true;
        }

        return $this;
    } // setWhsecity()

    /**
     * Set the value of [whsestat] column.
     *
     * @param string $v new value
     * @return $this|\WhseTbl The current object (for fluent API support)
     */
    public function setWhsestat($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->whsestat !== $v) {
            $this->whsestat = $v;
            $this->modifiedColumns[WhseTblTableMap::COL_WHSESTAT] = true;
        }

        return $this;
    } // setWhsestat()

    /**
     * Set the value of [whsezipcode] column.
     *
     * @param string $v new value
     * @return $this|\WhseTbl The current object (for fluent API support)
     */
    public function setWhsezipcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->whsezipcode !== $v) {
            $this->whsezipcode = $v;
            $this->modifiedColumns[WhseTblTableMap::COL_WHSEZIPCODE] = true;
        }

        return $this;
    } // setWhsezipcode()

    /**
     * Set the value of [whsectry] column.
     *
     * @param string $v new value
     * @return $this|\WhseTbl The current object (for fluent API support)
     */
    public function setWhsectry($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->whsectry !== $v) {
            $this->whsectry = $v;
            $this->modifiedColumns[WhseTblTableMap::COL_WHSECTRY] = true;
        }

        return $this;
    } // setWhsectry()

    /**
     * Set the value of [whseusehandheld] column.
     *
     * @param string $v new value
     * @return $this|\WhseTbl The current object (for fluent API support)
     */
    public function setWhseusehandheld($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->whseusehandheld !== $v) {
            $this->whseusehandheld = $v;
            $this->modifiedColumns[WhseTblTableMap::COL_WHSEUSEHANDHELD] = true;
        }

        return $this;
    } // setWhseusehandheld()

    /**
     * Set the value of [whsecashcust] column.
     *
     * @param string $v new value
     * @return $this|\WhseTbl The current object (for fluent API support)
     */
    public function setWhsecashcust($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->whsecashcust !== $v) {
            $this->whsecashcust = $v;
            $this->modifiedColumns[WhseTblTableMap::COL_WHSECASHCUST] = true;
        }

        return $this;
    } // setWhsecashcust()

    /**
     * Set the value of [whsepickdtl] column.
     *
     * @param string $v new value
     * @return $this|\WhseTbl The current object (for fluent API support)
     */
    public function setWhsepickdtl($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->whsepickdtl !== $v) {
            $this->whsepickdtl = $v;
            $this->modifiedColumns[WhseTblTableMap::COL_WHSEPICKDTL] = true;
        }

        return $this;
    } // setWhsepickdtl()

    /**
     * Set the value of [whseprodbin] column.
     *
     * @param string $v new value
     * @return $this|\WhseTbl The current object (for fluent API support)
     */
    public function setWhseprodbin($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->whseprodbin !== $v) {
            $this->whseprodbin = $v;
            $this->modifiedColumns[WhseTblTableMap::COL_WHSEPRODBIN] = true;
        }

        return $this;
    } // setWhseprodbin()

    /**
     * Set the value of [whsephone] column.
     *
     * @param string $v new value
     * @return $this|\WhseTbl The current object (for fluent API support)
     */
    public function setWhsephone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->whsephone !== $v) {
            $this->whsephone = $v;
            $this->modifiedColumns[WhseTblTableMap::COL_WHSEPHONE] = true;
        }

        return $this;
    } // setWhsephone()

    /**
     * Set the value of [whsephoneext] column.
     *
     * @param string $v new value
     * @return $this|\WhseTbl The current object (for fluent API support)
     */
    public function setWhsephoneext($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->whsephoneext !== $v) {
            $this->whsephoneext = $v;
            $this->modifiedColumns[WhseTblTableMap::COL_WHSEPHONEEXT] = true;
        }

        return $this;
    } // setWhsephoneext()

    /**
     * Set the value of [whsefax] column.
     *
     * @param string $v new value
     * @return $this|\WhseTbl The current object (for fluent API support)
     */
    public function setWhsefax($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->whsefax !== $v) {
            $this->whsefax = $v;
            $this->modifiedColumns[WhseTblTableMap::COL_WHSEFAX] = true;
        }

        return $this;
    } // setWhsefax()

    /**
     * Set the value of [whseemailadr] column.
     *
     * @param string $v new value
     * @return $this|\WhseTbl The current object (for fluent API support)
     */
    public function setWhseemailadr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->whseemailadr !== $v) {
            $this->whseemailadr = $v;
            $this->modifiedColumns[WhseTblTableMap::COL_WHSEEMAILADR] = true;
        }

        return $this;
    } // setWhseemailadr()

    /**
     * Set the value of [whseqcrgabin] column.
     *
     * @param string $v new value
     * @return $this|\WhseTbl The current object (for fluent API support)
     */
    public function setWhseqcrgabin($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->whseqcrgabin !== $v) {
            $this->whseqcrgabin = $v;
            $this->modifiedColumns[WhseTblTableMap::COL_WHSEQCRGABIN] = true;
        }

        return $this;
    } // setWhseqcrgabin()

    /**
     * Set the value of [whserfprinter1] column.
     *
     * @param string $v new value
     * @return $this|\WhseTbl The current object (for fluent API support)
     */
    public function setWhserfprinter1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->whserfprinter1 !== $v) {
            $this->whserfprinter1 = $v;
            $this->modifiedColumns[WhseTblTableMap::COL_WHSERFPRINTER1] = true;
        }

        return $this;
    } // setWhserfprinter1()

    /**
     * Set the value of [whserfprinter2] column.
     *
     * @param string $v new value
     * @return $this|\WhseTbl The current object (for fluent API support)
     */
    public function setWhserfprinter2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->whserfprinter2 !== $v) {
            $this->whserfprinter2 = $v;
            $this->modifiedColumns[WhseTblTableMap::COL_WHSERFPRINTER2] = true;
        }

        return $this;
    } // setWhserfprinter2()

    /**
     * Set the value of [whserfprinter3] column.
     *
     * @param string $v new value
     * @return $this|\WhseTbl The current object (for fluent API support)
     */
    public function setWhserfprinter3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->whserfprinter3 !== $v) {
            $this->whserfprinter3 = $v;
            $this->modifiedColumns[WhseTblTableMap::COL_WHSERFPRINTER3] = true;
        }

        return $this;
    } // setWhserfprinter3()

    /**
     * Set the value of [whserfprinter4] column.
     *
     * @param string $v new value
     * @return $this|\WhseTbl The current object (for fluent API support)
     */
    public function setWhserfprinter4($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->whserfprinter4 !== $v) {
            $this->whserfprinter4 = $v;
            $this->modifiedColumns[WhseTblTableMap::COL_WHSERFPRINTER4] = true;
        }

        return $this;
    } // setWhserfprinter4()

    /**
     * Set the value of [whserfprinter5] column.
     *
     * @param string $v new value
     * @return $this|\WhseTbl The current object (for fluent API support)
     */
    public function setWhserfprinter5($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->whserfprinter5 !== $v) {
            $this->whserfprinter5 = $v;
            $this->modifiedColumns[WhseTblTableMap::COL_WHSERFPRINTER5] = true;
        }

        return $this;
    } // setWhserfprinter5()

    /**
     * Set the value of [whseprofwhse] column.
     *
     * @param string $v new value
     * @return $this|\WhseTbl The current object (for fluent API support)
     */
    public function setWhseprofwhse($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->whseprofwhse !== $v) {
            $this->whseprofwhse = $v;
            $this->modifiedColumns[WhseTblTableMap::COL_WHSEPROFWHSE] = true;
        }

        return $this;
    } // setWhseprofwhse()

    /**
     * Set the value of [whseasetwhse] column.
     *
     * @param string $v new value
     * @return $this|\WhseTbl The current object (for fluent API support)
     */
    public function setWhseasetwhse($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->whseasetwhse !== $v) {
            $this->whseasetwhse = $v;
            $this->modifiedColumns[WhseTblTableMap::COL_WHSEASETWHSE] = true;
        }

        return $this;
    } // setWhseasetwhse()

    /**
     * Set the value of [whseconsignwhse] column.
     *
     * @param string $v new value
     * @return $this|\WhseTbl The current object (for fluent API support)
     */
    public function setWhseconsignwhse($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->whseconsignwhse !== $v) {
            $this->whseconsignwhse = $v;
            $this->modifiedColumns[WhseTblTableMap::COL_WHSECONSIGNWHSE] = true;
        }

        return $this;
    } // setWhseconsignwhse()

    /**
     * Set the value of [whsebinrangelist] column.
     *
     * @param string $v new value
     * @return $this|\WhseTbl The current object (for fluent API support)
     */
    public function setWhsebinrangelist($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->whsebinrangelist !== $v) {
            $this->whsebinrangelist = $v;
            $this->modifiedColumns[WhseTblTableMap::COL_WHSEBINRANGELIST] = true;
        }

        return $this;
    } // setWhsebinrangelist()

    /**
     * Set the value of [whsesupplywhse] column.
     *
     * @param string $v new value
     * @return $this|\WhseTbl The current object (for fluent API support)
     */
    public function setWhsesupplywhse($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->whsesupplywhse !== $v) {
            $this->whsesupplywhse = $v;
            $this->modifiedColumns[WhseTblTableMap::COL_WHSESUPPLYWHSE] = true;
        }

        return $this;
    } // setWhsesupplywhse()

    /**
     * Set the value of [dummy] column.
     *
     * @param string $v new value
     * @return $this|\WhseTbl The current object (for fluent API support)
     */
    public function setDummy($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dummy !== $v) {
            $this->dummy = $v;
            $this->modifiedColumns[WhseTblTableMap::COL_DUMMY] = true;
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
            if ($this->whseid !== '') {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : WhseTblTableMap::translateFieldName('Whseid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->whseid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : WhseTblTableMap::translateFieldName('Whsename', TableMap::TYPE_PHPNAME, $indexType)];
            $this->whsename = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : WhseTblTableMap::translateFieldName('Whseadr1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->whseadr1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : WhseTblTableMap::translateFieldName('Whseadr2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->whseadr2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : WhseTblTableMap::translateFieldName('Whsecity', TableMap::TYPE_PHPNAME, $indexType)];
            $this->whsecity = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : WhseTblTableMap::translateFieldName('Whsestat', TableMap::TYPE_PHPNAME, $indexType)];
            $this->whsestat = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : WhseTblTableMap::translateFieldName('Whsezipcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->whsezipcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : WhseTblTableMap::translateFieldName('Whsectry', TableMap::TYPE_PHPNAME, $indexType)];
            $this->whsectry = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : WhseTblTableMap::translateFieldName('Whseusehandheld', TableMap::TYPE_PHPNAME, $indexType)];
            $this->whseusehandheld = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : WhseTblTableMap::translateFieldName('Whsecashcust', TableMap::TYPE_PHPNAME, $indexType)];
            $this->whsecashcust = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : WhseTblTableMap::translateFieldName('Whsepickdtl', TableMap::TYPE_PHPNAME, $indexType)];
            $this->whsepickdtl = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : WhseTblTableMap::translateFieldName('Whseprodbin', TableMap::TYPE_PHPNAME, $indexType)];
            $this->whseprodbin = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : WhseTblTableMap::translateFieldName('Whsephone', TableMap::TYPE_PHPNAME, $indexType)];
            $this->whsephone = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : WhseTblTableMap::translateFieldName('Whsephoneext', TableMap::TYPE_PHPNAME, $indexType)];
            $this->whsephoneext = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : WhseTblTableMap::translateFieldName('Whsefax', TableMap::TYPE_PHPNAME, $indexType)];
            $this->whsefax = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : WhseTblTableMap::translateFieldName('Whseemailadr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->whseemailadr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : WhseTblTableMap::translateFieldName('Whseqcrgabin', TableMap::TYPE_PHPNAME, $indexType)];
            $this->whseqcrgabin = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : WhseTblTableMap::translateFieldName('Whserfprinter1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->whserfprinter1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : WhseTblTableMap::translateFieldName('Whserfprinter2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->whserfprinter2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : WhseTblTableMap::translateFieldName('Whserfprinter3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->whserfprinter3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : WhseTblTableMap::translateFieldName('Whserfprinter4', TableMap::TYPE_PHPNAME, $indexType)];
            $this->whserfprinter4 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : WhseTblTableMap::translateFieldName('Whserfprinter5', TableMap::TYPE_PHPNAME, $indexType)];
            $this->whserfprinter5 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : WhseTblTableMap::translateFieldName('Whseprofwhse', TableMap::TYPE_PHPNAME, $indexType)];
            $this->whseprofwhse = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : WhseTblTableMap::translateFieldName('Whseasetwhse', TableMap::TYPE_PHPNAME, $indexType)];
            $this->whseasetwhse = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : WhseTblTableMap::translateFieldName('Whseconsignwhse', TableMap::TYPE_PHPNAME, $indexType)];
            $this->whseconsignwhse = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : WhseTblTableMap::translateFieldName('Whsebinrangelist', TableMap::TYPE_PHPNAME, $indexType)];
            $this->whsebinrangelist = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : WhseTblTableMap::translateFieldName('Whsesupplywhse', TableMap::TYPE_PHPNAME, $indexType)];
            $this->whsesupplywhse = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : WhseTblTableMap::translateFieldName('Dummy', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dummy = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 28; // 28 = WhseTblTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\WhseTbl'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(WhseTblTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildWhseTblQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see WhseTbl::setDeleted()
     * @see WhseTbl::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(WhseTblTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildWhseTblQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(WhseTblTableMap::DATABASE_NAME);
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
                WhseTblTableMap::addInstanceToPool($this);
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
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSEID)) {
            $modifiedColumns[':p' . $index++]  = 'whseid';
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSENAME)) {
            $modifiedColumns[':p' . $index++]  = 'whsename';
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSEADR1)) {
            $modifiedColumns[':p' . $index++]  = 'whseadr1';
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSEADR2)) {
            $modifiedColumns[':p' . $index++]  = 'whseadr2';
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSECITY)) {
            $modifiedColumns[':p' . $index++]  = 'whsecity';
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSESTAT)) {
            $modifiedColumns[':p' . $index++]  = 'whsestat';
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSEZIPCODE)) {
            $modifiedColumns[':p' . $index++]  = 'whsezipcode';
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSECTRY)) {
            $modifiedColumns[':p' . $index++]  = 'whsectry';
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSEUSEHANDHELD)) {
            $modifiedColumns[':p' . $index++]  = 'whseusehandheld';
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSECASHCUST)) {
            $modifiedColumns[':p' . $index++]  = 'whsecashcust';
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSEPICKDTL)) {
            $modifiedColumns[':p' . $index++]  = 'whsepickdtl';
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSEPRODBIN)) {
            $modifiedColumns[':p' . $index++]  = 'whseprodbin';
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSEPHONE)) {
            $modifiedColumns[':p' . $index++]  = 'whsephone';
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSEPHONEEXT)) {
            $modifiedColumns[':p' . $index++]  = 'whsephoneext';
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSEFAX)) {
            $modifiedColumns[':p' . $index++]  = 'whsefax';
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSEEMAILADR)) {
            $modifiedColumns[':p' . $index++]  = 'whseemailadr';
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSEQCRGABIN)) {
            $modifiedColumns[':p' . $index++]  = 'whseqcrgabin';
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSERFPRINTER1)) {
            $modifiedColumns[':p' . $index++]  = 'whserfprinter1';
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSERFPRINTER2)) {
            $modifiedColumns[':p' . $index++]  = 'whserfprinter2';
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSERFPRINTER3)) {
            $modifiedColumns[':p' . $index++]  = 'whserfprinter3';
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSERFPRINTER4)) {
            $modifiedColumns[':p' . $index++]  = 'whserfprinter4';
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSERFPRINTER5)) {
            $modifiedColumns[':p' . $index++]  = 'whserfprinter5';
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSEPROFWHSE)) {
            $modifiedColumns[':p' . $index++]  = 'whseprofwhse';
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSEASETWHSE)) {
            $modifiedColumns[':p' . $index++]  = 'whseasetwhse';
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSECONSIGNWHSE)) {
            $modifiedColumns[':p' . $index++]  = 'whseconsignwhse';
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSEBINRANGELIST)) {
            $modifiedColumns[':p' . $index++]  = 'whsebinrangelist';
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSESUPPLYWHSE)) {
            $modifiedColumns[':p' . $index++]  = 'whsesupplywhse';
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_DUMMY)) {
            $modifiedColumns[':p' . $index++]  = 'dummy';
        }

        $sql = sprintf(
            'INSERT INTO whse_tbl (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'whseid':
                        $stmt->bindValue($identifier, $this->whseid, PDO::PARAM_STR);
                        break;
                    case 'whsename':
                        $stmt->bindValue($identifier, $this->whsename, PDO::PARAM_STR);
                        break;
                    case 'whseadr1':
                        $stmt->bindValue($identifier, $this->whseadr1, PDO::PARAM_STR);
                        break;
                    case 'whseadr2':
                        $stmt->bindValue($identifier, $this->whseadr2, PDO::PARAM_STR);
                        break;
                    case 'whsecity':
                        $stmt->bindValue($identifier, $this->whsecity, PDO::PARAM_STR);
                        break;
                    case 'whsestat':
                        $stmt->bindValue($identifier, $this->whsestat, PDO::PARAM_STR);
                        break;
                    case 'whsezipcode':
                        $stmt->bindValue($identifier, $this->whsezipcode, PDO::PARAM_STR);
                        break;
                    case 'whsectry':
                        $stmt->bindValue($identifier, $this->whsectry, PDO::PARAM_STR);
                        break;
                    case 'whseusehandheld':
                        $stmt->bindValue($identifier, $this->whseusehandheld, PDO::PARAM_STR);
                        break;
                    case 'whsecashcust':
                        $stmt->bindValue($identifier, $this->whsecashcust, PDO::PARAM_STR);
                        break;
                    case 'whsepickdtl':
                        $stmt->bindValue($identifier, $this->whsepickdtl, PDO::PARAM_STR);
                        break;
                    case 'whseprodbin':
                        $stmt->bindValue($identifier, $this->whseprodbin, PDO::PARAM_STR);
                        break;
                    case 'whsephone':
                        $stmt->bindValue($identifier, $this->whsephone, PDO::PARAM_STR);
                        break;
                    case 'whsephoneext':
                        $stmt->bindValue($identifier, $this->whsephoneext, PDO::PARAM_STR);
                        break;
                    case 'whsefax':
                        $stmt->bindValue($identifier, $this->whsefax, PDO::PARAM_STR);
                        break;
                    case 'whseemailadr':
                        $stmt->bindValue($identifier, $this->whseemailadr, PDO::PARAM_STR);
                        break;
                    case 'whseqcrgabin':
                        $stmt->bindValue($identifier, $this->whseqcrgabin, PDO::PARAM_STR);
                        break;
                    case 'whserfprinter1':
                        $stmt->bindValue($identifier, $this->whserfprinter1, PDO::PARAM_STR);
                        break;
                    case 'whserfprinter2':
                        $stmt->bindValue($identifier, $this->whserfprinter2, PDO::PARAM_STR);
                        break;
                    case 'whserfprinter3':
                        $stmt->bindValue($identifier, $this->whserfprinter3, PDO::PARAM_STR);
                        break;
                    case 'whserfprinter4':
                        $stmt->bindValue($identifier, $this->whserfprinter4, PDO::PARAM_STR);
                        break;
                    case 'whserfprinter5':
                        $stmt->bindValue($identifier, $this->whserfprinter5, PDO::PARAM_STR);
                        break;
                    case 'whseprofwhse':
                        $stmt->bindValue($identifier, $this->whseprofwhse, PDO::PARAM_STR);
                        break;
                    case 'whseasetwhse':
                        $stmt->bindValue($identifier, $this->whseasetwhse, PDO::PARAM_STR);
                        break;
                    case 'whseconsignwhse':
                        $stmt->bindValue($identifier, $this->whseconsignwhse, PDO::PARAM_STR);
                        break;
                    case 'whsebinrangelist':
                        $stmt->bindValue($identifier, $this->whsebinrangelist, PDO::PARAM_STR);
                        break;
                    case 'whsesupplywhse':
                        $stmt->bindValue($identifier, $this->whsesupplywhse, PDO::PARAM_STR);
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
        $pos = WhseTblTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getWhseid();
                break;
            case 1:
                return $this->getWhsename();
                break;
            case 2:
                return $this->getWhseadr1();
                break;
            case 3:
                return $this->getWhseadr2();
                break;
            case 4:
                return $this->getWhsecity();
                break;
            case 5:
                return $this->getWhsestat();
                break;
            case 6:
                return $this->getWhsezipcode();
                break;
            case 7:
                return $this->getWhsectry();
                break;
            case 8:
                return $this->getWhseusehandheld();
                break;
            case 9:
                return $this->getWhsecashcust();
                break;
            case 10:
                return $this->getWhsepickdtl();
                break;
            case 11:
                return $this->getWhseprodbin();
                break;
            case 12:
                return $this->getWhsephone();
                break;
            case 13:
                return $this->getWhsephoneext();
                break;
            case 14:
                return $this->getWhsefax();
                break;
            case 15:
                return $this->getWhseemailadr();
                break;
            case 16:
                return $this->getWhseqcrgabin();
                break;
            case 17:
                return $this->getWhserfprinter1();
                break;
            case 18:
                return $this->getWhserfprinter2();
                break;
            case 19:
                return $this->getWhserfprinter3();
                break;
            case 20:
                return $this->getWhserfprinter4();
                break;
            case 21:
                return $this->getWhserfprinter5();
                break;
            case 22:
                return $this->getWhseprofwhse();
                break;
            case 23:
                return $this->getWhseasetwhse();
                break;
            case 24:
                return $this->getWhseconsignwhse();
                break;
            case 25:
                return $this->getWhsebinrangelist();
                break;
            case 26:
                return $this->getWhsesupplywhse();
                break;
            case 27:
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

        if (isset($alreadyDumpedObjects['WhseTbl'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['WhseTbl'][$this->hashCode()] = true;
        $keys = WhseTblTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getWhseid(),
            $keys[1] => $this->getWhsename(),
            $keys[2] => $this->getWhseadr1(),
            $keys[3] => $this->getWhseadr2(),
            $keys[4] => $this->getWhsecity(),
            $keys[5] => $this->getWhsestat(),
            $keys[6] => $this->getWhsezipcode(),
            $keys[7] => $this->getWhsectry(),
            $keys[8] => $this->getWhseusehandheld(),
            $keys[9] => $this->getWhsecashcust(),
            $keys[10] => $this->getWhsepickdtl(),
            $keys[11] => $this->getWhseprodbin(),
            $keys[12] => $this->getWhsephone(),
            $keys[13] => $this->getWhsephoneext(),
            $keys[14] => $this->getWhsefax(),
            $keys[15] => $this->getWhseemailadr(),
            $keys[16] => $this->getWhseqcrgabin(),
            $keys[17] => $this->getWhserfprinter1(),
            $keys[18] => $this->getWhserfprinter2(),
            $keys[19] => $this->getWhserfprinter3(),
            $keys[20] => $this->getWhserfprinter4(),
            $keys[21] => $this->getWhserfprinter5(),
            $keys[22] => $this->getWhseprofwhse(),
            $keys[23] => $this->getWhseasetwhse(),
            $keys[24] => $this->getWhseconsignwhse(),
            $keys[25] => $this->getWhsebinrangelist(),
            $keys[26] => $this->getWhsesupplywhse(),
            $keys[27] => $this->getDummy(),
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
     * @return $this|\WhseTbl
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = WhseTblTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\WhseTbl
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setWhseid($value);
                break;
            case 1:
                $this->setWhsename($value);
                break;
            case 2:
                $this->setWhseadr1($value);
                break;
            case 3:
                $this->setWhseadr2($value);
                break;
            case 4:
                $this->setWhsecity($value);
                break;
            case 5:
                $this->setWhsestat($value);
                break;
            case 6:
                $this->setWhsezipcode($value);
                break;
            case 7:
                $this->setWhsectry($value);
                break;
            case 8:
                $this->setWhseusehandheld($value);
                break;
            case 9:
                $this->setWhsecashcust($value);
                break;
            case 10:
                $this->setWhsepickdtl($value);
                break;
            case 11:
                $this->setWhseprodbin($value);
                break;
            case 12:
                $this->setWhsephone($value);
                break;
            case 13:
                $this->setWhsephoneext($value);
                break;
            case 14:
                $this->setWhsefax($value);
                break;
            case 15:
                $this->setWhseemailadr($value);
                break;
            case 16:
                $this->setWhseqcrgabin($value);
                break;
            case 17:
                $this->setWhserfprinter1($value);
                break;
            case 18:
                $this->setWhserfprinter2($value);
                break;
            case 19:
                $this->setWhserfprinter3($value);
                break;
            case 20:
                $this->setWhserfprinter4($value);
                break;
            case 21:
                $this->setWhserfprinter5($value);
                break;
            case 22:
                $this->setWhseprofwhse($value);
                break;
            case 23:
                $this->setWhseasetwhse($value);
                break;
            case 24:
                $this->setWhseconsignwhse($value);
                break;
            case 25:
                $this->setWhsebinrangelist($value);
                break;
            case 26:
                $this->setWhsesupplywhse($value);
                break;
            case 27:
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
        $keys = WhseTblTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setWhseid($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setWhsename($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setWhseadr1($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setWhseadr2($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setWhsecity($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setWhsestat($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setWhsezipcode($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setWhsectry($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setWhseusehandheld($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setWhsecashcust($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setWhsepickdtl($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setWhseprodbin($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setWhsephone($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setWhsephoneext($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setWhsefax($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setWhseemailadr($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setWhseqcrgabin($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setWhserfprinter1($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setWhserfprinter2($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setWhserfprinter3($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setWhserfprinter4($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setWhserfprinter5($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setWhseprofwhse($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setWhseasetwhse($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setWhseconsignwhse($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setWhsebinrangelist($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setWhsesupplywhse($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setDummy($arr[$keys[27]]);
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
     * @return $this|\WhseTbl The current object, for fluid interface
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
        $criteria = new Criteria(WhseTblTableMap::DATABASE_NAME);

        if ($this->isColumnModified(WhseTblTableMap::COL_WHSEID)) {
            $criteria->add(WhseTblTableMap::COL_WHSEID, $this->whseid);
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSENAME)) {
            $criteria->add(WhseTblTableMap::COL_WHSENAME, $this->whsename);
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSEADR1)) {
            $criteria->add(WhseTblTableMap::COL_WHSEADR1, $this->whseadr1);
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSEADR2)) {
            $criteria->add(WhseTblTableMap::COL_WHSEADR2, $this->whseadr2);
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSECITY)) {
            $criteria->add(WhseTblTableMap::COL_WHSECITY, $this->whsecity);
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSESTAT)) {
            $criteria->add(WhseTblTableMap::COL_WHSESTAT, $this->whsestat);
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSEZIPCODE)) {
            $criteria->add(WhseTblTableMap::COL_WHSEZIPCODE, $this->whsezipcode);
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSECTRY)) {
            $criteria->add(WhseTblTableMap::COL_WHSECTRY, $this->whsectry);
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSEUSEHANDHELD)) {
            $criteria->add(WhseTblTableMap::COL_WHSEUSEHANDHELD, $this->whseusehandheld);
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSECASHCUST)) {
            $criteria->add(WhseTblTableMap::COL_WHSECASHCUST, $this->whsecashcust);
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSEPICKDTL)) {
            $criteria->add(WhseTblTableMap::COL_WHSEPICKDTL, $this->whsepickdtl);
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSEPRODBIN)) {
            $criteria->add(WhseTblTableMap::COL_WHSEPRODBIN, $this->whseprodbin);
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSEPHONE)) {
            $criteria->add(WhseTblTableMap::COL_WHSEPHONE, $this->whsephone);
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSEPHONEEXT)) {
            $criteria->add(WhseTblTableMap::COL_WHSEPHONEEXT, $this->whsephoneext);
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSEFAX)) {
            $criteria->add(WhseTblTableMap::COL_WHSEFAX, $this->whsefax);
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSEEMAILADR)) {
            $criteria->add(WhseTblTableMap::COL_WHSEEMAILADR, $this->whseemailadr);
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSEQCRGABIN)) {
            $criteria->add(WhseTblTableMap::COL_WHSEQCRGABIN, $this->whseqcrgabin);
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSERFPRINTER1)) {
            $criteria->add(WhseTblTableMap::COL_WHSERFPRINTER1, $this->whserfprinter1);
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSERFPRINTER2)) {
            $criteria->add(WhseTblTableMap::COL_WHSERFPRINTER2, $this->whserfprinter2);
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSERFPRINTER3)) {
            $criteria->add(WhseTblTableMap::COL_WHSERFPRINTER3, $this->whserfprinter3);
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSERFPRINTER4)) {
            $criteria->add(WhseTblTableMap::COL_WHSERFPRINTER4, $this->whserfprinter4);
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSERFPRINTER5)) {
            $criteria->add(WhseTblTableMap::COL_WHSERFPRINTER5, $this->whserfprinter5);
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSEPROFWHSE)) {
            $criteria->add(WhseTblTableMap::COL_WHSEPROFWHSE, $this->whseprofwhse);
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSEASETWHSE)) {
            $criteria->add(WhseTblTableMap::COL_WHSEASETWHSE, $this->whseasetwhse);
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSECONSIGNWHSE)) {
            $criteria->add(WhseTblTableMap::COL_WHSECONSIGNWHSE, $this->whseconsignwhse);
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSEBINRANGELIST)) {
            $criteria->add(WhseTblTableMap::COL_WHSEBINRANGELIST, $this->whsebinrangelist);
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_WHSESUPPLYWHSE)) {
            $criteria->add(WhseTblTableMap::COL_WHSESUPPLYWHSE, $this->whsesupplywhse);
        }
        if ($this->isColumnModified(WhseTblTableMap::COL_DUMMY)) {
            $criteria->add(WhseTblTableMap::COL_DUMMY, $this->dummy);
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
        $criteria = ChildWhseTblQuery::create();
        $criteria->add(WhseTblTableMap::COL_WHSEID, $this->whseid);

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
        $validPk = null !== $this->getWhseid();

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
        return $this->getWhseid();
    }

    /**
     * Generic method to set the primary key (whseid column).
     *
     * @param       string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setWhseid($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getWhseid();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \WhseTbl (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setWhseid($this->getWhseid());
        $copyObj->setWhsename($this->getWhsename());
        $copyObj->setWhseadr1($this->getWhseadr1());
        $copyObj->setWhseadr2($this->getWhseadr2());
        $copyObj->setWhsecity($this->getWhsecity());
        $copyObj->setWhsestat($this->getWhsestat());
        $copyObj->setWhsezipcode($this->getWhsezipcode());
        $copyObj->setWhsectry($this->getWhsectry());
        $copyObj->setWhseusehandheld($this->getWhseusehandheld());
        $copyObj->setWhsecashcust($this->getWhsecashcust());
        $copyObj->setWhsepickdtl($this->getWhsepickdtl());
        $copyObj->setWhseprodbin($this->getWhseprodbin());
        $copyObj->setWhsephone($this->getWhsephone());
        $copyObj->setWhsephoneext($this->getWhsephoneext());
        $copyObj->setWhsefax($this->getWhsefax());
        $copyObj->setWhseemailadr($this->getWhseemailadr());
        $copyObj->setWhseqcrgabin($this->getWhseqcrgabin());
        $copyObj->setWhserfprinter1($this->getWhserfprinter1());
        $copyObj->setWhserfprinter2($this->getWhserfprinter2());
        $copyObj->setWhserfprinter3($this->getWhserfprinter3());
        $copyObj->setWhserfprinter4($this->getWhserfprinter4());
        $copyObj->setWhserfprinter5($this->getWhserfprinter5());
        $copyObj->setWhseprofwhse($this->getWhseprofwhse());
        $copyObj->setWhseasetwhse($this->getWhseasetwhse());
        $copyObj->setWhseconsignwhse($this->getWhseconsignwhse());
        $copyObj->setWhsebinrangelist($this->getWhsebinrangelist());
        $copyObj->setWhsesupplywhse($this->getWhsesupplywhse());
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
     * @return \WhseTbl Clone of current object.
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
        $this->whseid = null;
        $this->whsename = null;
        $this->whseadr1 = null;
        $this->whseadr2 = null;
        $this->whsecity = null;
        $this->whsestat = null;
        $this->whsezipcode = null;
        $this->whsectry = null;
        $this->whseusehandheld = null;
        $this->whsecashcust = null;
        $this->whsepickdtl = null;
        $this->whseprodbin = null;
        $this->whsephone = null;
        $this->whsephoneext = null;
        $this->whsefax = null;
        $this->whseemailadr = null;
        $this->whseqcrgabin = null;
        $this->whserfprinter1 = null;
        $this->whserfprinter2 = null;
        $this->whserfprinter3 = null;
        $this->whserfprinter4 = null;
        $this->whserfprinter5 = null;
        $this->whseprofwhse = null;
        $this->whseasetwhse = null;
        $this->whseconsignwhse = null;
        $this->whsebinrangelist = null;
        $this->whsesupplywhse = null;
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
        return (string) $this->exportTo(WhseTblTableMap::DEFAULT_STRING_FORMAT);
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
