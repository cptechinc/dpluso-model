<?php

namespace Base;

use \InvWhseCodeQuery as ChildInvWhseCodeQuery;
use \Exception;
use \PDO;
use Map\InvWhseCodeTableMap;
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
 * Base class that represents a row from the 'inv_whse_code' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class InvWhseCode implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\InvWhseCodeTableMap';


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
     * The value for the intbwhse field.
     *
     * @var        string
     */
    protected $intbwhse;

    /**
     * The value for the intbwhsename field.
     *
     * @var        string
     */
    protected $intbwhsename;

    /**
     * The value for the intbwhseadr1 field.
     *
     * @var        string
     */
    protected $intbwhseadr1;

    /**
     * The value for the intbwhseadr2 field.
     *
     * @var        string
     */
    protected $intbwhseadr2;

    /**
     * The value for the intbwhsecity field.
     *
     * @var        string
     */
    protected $intbwhsecity;

    /**
     * The value for the intbwhsestat field.
     *
     * @var        string
     */
    protected $intbwhsestat;

    /**
     * The value for the intbwhsezipcode field.
     *
     * @var        string
     */
    protected $intbwhsezipcode;

    /**
     * The value for the intbwhsectry field.
     *
     * @var        string
     */
    protected $intbwhsectry;

    /**
     * The value for the intbwhseusehandheld field.
     *
     * @var        string
     */
    protected $intbwhseusehandheld;

    /**
     * The value for the intbwhsecashcust field.
     *
     * @var        string
     */
    protected $intbwhsecashcust;

    /**
     * The value for the intbwhsepickdtl field.
     *
     * @var        string
     */
    protected $intbwhsepickdtl;

    /**
     * The value for the intbwhseprodbin field.
     *
     * @var        string
     */
    protected $intbwhseprodbin;

    /**
     * The value for the intbwhsepharea field.
     *
     * @var        int
     */
    protected $intbwhsepharea;

    /**
     * The value for the intbwhsephfrst3 field.
     *
     * @var        int
     */
    protected $intbwhsephfrst3;

    /**
     * The value for the intbwhsephlast4 field.
     *
     * @var        int
     */
    protected $intbwhsephlast4;

    /**
     * The value for the intbwhsephext field.
     *
     * @var        string
     */
    protected $intbwhsephext;

    /**
     * The value for the intbwhsefaxarea field.
     *
     * @var        int
     */
    protected $intbwhsefaxarea;

    /**
     * The value for the intbwhsefaxfrst3 field.
     *
     * @var        int
     */
    protected $intbwhsefaxfrst3;

    /**
     * The value for the intbwhsefaxlast4 field.
     *
     * @var        int
     */
    protected $intbwhsefaxlast4;

    /**
     * The value for the intbwhseemailadr field.
     *
     * @var        string
     */
    protected $intbwhseemailadr;

    /**
     * The value for the intbwhseqcrgabin field.
     *
     * @var        string
     */
    protected $intbwhseqcrgabin;

    /**
     * The value for the intbwhserfprinter1 field.
     *
     * @var        string
     */
    protected $intbwhserfprinter1;

    /**
     * The value for the intbwhserfprinter2 field.
     *
     * @var        string
     */
    protected $intbwhserfprinter2;

    /**
     * The value for the intbwhserfprinter3 field.
     *
     * @var        string
     */
    protected $intbwhserfprinter3;

    /**
     * The value for the intbwhserfprinter4 field.
     *
     * @var        string
     */
    protected $intbwhserfprinter4;

    /**
     * The value for the intbwhserfprinter5 field.
     *
     * @var        string
     */
    protected $intbwhserfprinter5;

    /**
     * The value for the intbwhseprofwhse field.
     *
     * @var        string
     */
    protected $intbwhseprofwhse;

    /**
     * The value for the intbwhseasetwhse field.
     *
     * @var        string
     */
    protected $intbwhseasetwhse;

    /**
     * The value for the intbwhseconsignwhse field.
     *
     * @var        string
     */
    protected $intbwhseconsignwhse;

    /**
     * The value for the intbwhsebinrangelist field.
     *
     * @var        string
     */
    protected $intbwhsebinrangelist;

    /**
     * The value for the intbwhsesupplywhse field.
     *
     * @var        string
     */
    protected $intbwhsesupplywhse;

    /**
     * The value for the dateupdtd field.
     *
     * @var        int
     */
    protected $dateupdtd;

    /**
     * The value for the timeupdtd field.
     *
     * @var        int
     */
    protected $timeupdtd;

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
     * Initializes internal state of Base\InvWhseCode object.
     */
    public function __construct()
    {
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
     * Compares this with another <code>InvWhseCode</code> instance.  If
     * <code>obj</code> is an instance of <code>InvWhseCode</code>, delegates to
     * <code>equals(InvWhseCode)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|InvWhseCode The current object, for fluid interface
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
     * Get the [intbwhse] column value.
     *
     * @return string
     */
    public function getIntbwhse()
    {
        return $this->intbwhse;
    }

    /**
     * Get the [intbwhsename] column value.
     *
     * @return string
     */
    public function getIntbwhsename()
    {
        return $this->intbwhsename;
    }

    /**
     * Get the [intbwhseadr1] column value.
     *
     * @return string
     */
    public function getIntbwhseadr1()
    {
        return $this->intbwhseadr1;
    }

    /**
     * Get the [intbwhseadr2] column value.
     *
     * @return string
     */
    public function getIntbwhseadr2()
    {
        return $this->intbwhseadr2;
    }

    /**
     * Get the [intbwhsecity] column value.
     *
     * @return string
     */
    public function getIntbwhsecity()
    {
        return $this->intbwhsecity;
    }

    /**
     * Get the [intbwhsestat] column value.
     *
     * @return string
     */
    public function getIntbwhsestat()
    {
        return $this->intbwhsestat;
    }

    /**
     * Get the [intbwhsezipcode] column value.
     *
     * @return string
     */
    public function getIntbwhsezipcode()
    {
        return $this->intbwhsezipcode;
    }

    /**
     * Get the [intbwhsectry] column value.
     *
     * @return string
     */
    public function getIntbwhsectry()
    {
        return $this->intbwhsectry;
    }

    /**
     * Get the [intbwhseusehandheld] column value.
     *
     * @return string
     */
    public function getIntbwhseusehandheld()
    {
        return $this->intbwhseusehandheld;
    }

    /**
     * Get the [intbwhsecashcust] column value.
     *
     * @return string
     */
    public function getIntbwhsecashcust()
    {
        return $this->intbwhsecashcust;
    }

    /**
     * Get the [intbwhsepickdtl] column value.
     *
     * @return string
     */
    public function getIntbwhsepickdtl()
    {
        return $this->intbwhsepickdtl;
    }

    /**
     * Get the [intbwhseprodbin] column value.
     *
     * @return string
     */
    public function getIntbwhseprodbin()
    {
        return $this->intbwhseprodbin;
    }

    /**
     * Get the [intbwhsepharea] column value.
     *
     * @return int
     */
    public function getIntbwhsepharea()
    {
        return $this->intbwhsepharea;
    }

    /**
     * Get the [intbwhsephfrst3] column value.
     *
     * @return int
     */
    public function getIntbwhsephfrst3()
    {
        return $this->intbwhsephfrst3;
    }

    /**
     * Get the [intbwhsephlast4] column value.
     *
     * @return int
     */
    public function getIntbwhsephlast4()
    {
        return $this->intbwhsephlast4;
    }

    /**
     * Get the [intbwhsephext] column value.
     *
     * @return string
     */
    public function getIntbwhsephext()
    {
        return $this->intbwhsephext;
    }

    /**
     * Get the [intbwhsefaxarea] column value.
     *
     * @return int
     */
    public function getIntbwhsefaxarea()
    {
        return $this->intbwhsefaxarea;
    }

    /**
     * Get the [intbwhsefaxfrst3] column value.
     *
     * @return int
     */
    public function getIntbwhsefaxfrst3()
    {
        return $this->intbwhsefaxfrst3;
    }

    /**
     * Get the [intbwhsefaxlast4] column value.
     *
     * @return int
     */
    public function getIntbwhsefaxlast4()
    {
        return $this->intbwhsefaxlast4;
    }

    /**
     * Get the [intbwhseemailadr] column value.
     *
     * @return string
     */
    public function getIntbwhseemailadr()
    {
        return $this->intbwhseemailadr;
    }

    /**
     * Get the [intbwhseqcrgabin] column value.
     *
     * @return string
     */
    public function getIntbwhseqcrgabin()
    {
        return $this->intbwhseqcrgabin;
    }

    /**
     * Get the [intbwhserfprinter1] column value.
     *
     * @return string
     */
    public function getIntbwhserfprinter1()
    {
        return $this->intbwhserfprinter1;
    }

    /**
     * Get the [intbwhserfprinter2] column value.
     *
     * @return string
     */
    public function getIntbwhserfprinter2()
    {
        return $this->intbwhserfprinter2;
    }

    /**
     * Get the [intbwhserfprinter3] column value.
     *
     * @return string
     */
    public function getIntbwhserfprinter3()
    {
        return $this->intbwhserfprinter3;
    }

    /**
     * Get the [intbwhserfprinter4] column value.
     *
     * @return string
     */
    public function getIntbwhserfprinter4()
    {
        return $this->intbwhserfprinter4;
    }

    /**
     * Get the [intbwhserfprinter5] column value.
     *
     * @return string
     */
    public function getIntbwhserfprinter5()
    {
        return $this->intbwhserfprinter5;
    }

    /**
     * Get the [intbwhseprofwhse] column value.
     *
     * @return string
     */
    public function getIntbwhseprofwhse()
    {
        return $this->intbwhseprofwhse;
    }

    /**
     * Get the [intbwhseasetwhse] column value.
     *
     * @return string
     */
    public function getIntbwhseasetwhse()
    {
        return $this->intbwhseasetwhse;
    }

    /**
     * Get the [intbwhseconsignwhse] column value.
     *
     * @return string
     */
    public function getIntbwhseconsignwhse()
    {
        return $this->intbwhseconsignwhse;
    }

    /**
     * Get the [intbwhsebinrangelist] column value.
     *
     * @return string
     */
    public function getIntbwhsebinrangelist()
    {
        return $this->intbwhsebinrangelist;
    }

    /**
     * Get the [intbwhsesupplywhse] column value.
     *
     * @return string
     */
    public function getIntbwhsesupplywhse()
    {
        return $this->intbwhsesupplywhse;
    }

    /**
     * Get the [dateupdtd] column value.
     *
     * @return int
     */
    public function getDateupdtd()
    {
        return $this->dateupdtd;
    }

    /**
     * Get the [timeupdtd] column value.
     *
     * @return int
     */
    public function getTimeupdtd()
    {
        return $this->timeupdtd;
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
     * Set the value of [intbwhse] column.
     *
     * @param string $v new value
     * @return $this|\InvWhseCode The current object (for fluent API support)
     */
    public function setIntbwhse($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->intbwhse !== $v) {
            $this->intbwhse = $v;
            $this->modifiedColumns[InvWhseCodeTableMap::COL_INTBWHSE] = true;
        }

        return $this;
    } // setIntbwhse()

    /**
     * Set the value of [intbwhsename] column.
     *
     * @param string $v new value
     * @return $this|\InvWhseCode The current object (for fluent API support)
     */
    public function setIntbwhsename($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->intbwhsename !== $v) {
            $this->intbwhsename = $v;
            $this->modifiedColumns[InvWhseCodeTableMap::COL_INTBWHSENAME] = true;
        }

        return $this;
    } // setIntbwhsename()

    /**
     * Set the value of [intbwhseadr1] column.
     *
     * @param string $v new value
     * @return $this|\InvWhseCode The current object (for fluent API support)
     */
    public function setIntbwhseadr1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->intbwhseadr1 !== $v) {
            $this->intbwhseadr1 = $v;
            $this->modifiedColumns[InvWhseCodeTableMap::COL_INTBWHSEADR1] = true;
        }

        return $this;
    } // setIntbwhseadr1()

    /**
     * Set the value of [intbwhseadr2] column.
     *
     * @param string $v new value
     * @return $this|\InvWhseCode The current object (for fluent API support)
     */
    public function setIntbwhseadr2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->intbwhseadr2 !== $v) {
            $this->intbwhseadr2 = $v;
            $this->modifiedColumns[InvWhseCodeTableMap::COL_INTBWHSEADR2] = true;
        }

        return $this;
    } // setIntbwhseadr2()

    /**
     * Set the value of [intbwhsecity] column.
     *
     * @param string $v new value
     * @return $this|\InvWhseCode The current object (for fluent API support)
     */
    public function setIntbwhsecity($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->intbwhsecity !== $v) {
            $this->intbwhsecity = $v;
            $this->modifiedColumns[InvWhseCodeTableMap::COL_INTBWHSECITY] = true;
        }

        return $this;
    } // setIntbwhsecity()

    /**
     * Set the value of [intbwhsestat] column.
     *
     * @param string $v new value
     * @return $this|\InvWhseCode The current object (for fluent API support)
     */
    public function setIntbwhsestat($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->intbwhsestat !== $v) {
            $this->intbwhsestat = $v;
            $this->modifiedColumns[InvWhseCodeTableMap::COL_INTBWHSESTAT] = true;
        }

        return $this;
    } // setIntbwhsestat()

    /**
     * Set the value of [intbwhsezipcode] column.
     *
     * @param string $v new value
     * @return $this|\InvWhseCode The current object (for fluent API support)
     */
    public function setIntbwhsezipcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->intbwhsezipcode !== $v) {
            $this->intbwhsezipcode = $v;
            $this->modifiedColumns[InvWhseCodeTableMap::COL_INTBWHSEZIPCODE] = true;
        }

        return $this;
    } // setIntbwhsezipcode()

    /**
     * Set the value of [intbwhsectry] column.
     *
     * @param string $v new value
     * @return $this|\InvWhseCode The current object (for fluent API support)
     */
    public function setIntbwhsectry($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->intbwhsectry !== $v) {
            $this->intbwhsectry = $v;
            $this->modifiedColumns[InvWhseCodeTableMap::COL_INTBWHSECTRY] = true;
        }

        return $this;
    } // setIntbwhsectry()

    /**
     * Set the value of [intbwhseusehandheld] column.
     *
     * @param string $v new value
     * @return $this|\InvWhseCode The current object (for fluent API support)
     */
    public function setIntbwhseusehandheld($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->intbwhseusehandheld !== $v) {
            $this->intbwhseusehandheld = $v;
            $this->modifiedColumns[InvWhseCodeTableMap::COL_INTBWHSEUSEHANDHELD] = true;
        }

        return $this;
    } // setIntbwhseusehandheld()

    /**
     * Set the value of [intbwhsecashcust] column.
     *
     * @param string $v new value
     * @return $this|\InvWhseCode The current object (for fluent API support)
     */
    public function setIntbwhsecashcust($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->intbwhsecashcust !== $v) {
            $this->intbwhsecashcust = $v;
            $this->modifiedColumns[InvWhseCodeTableMap::COL_INTBWHSECASHCUST] = true;
        }

        return $this;
    } // setIntbwhsecashcust()

    /**
     * Set the value of [intbwhsepickdtl] column.
     *
     * @param string $v new value
     * @return $this|\InvWhseCode The current object (for fluent API support)
     */
    public function setIntbwhsepickdtl($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->intbwhsepickdtl !== $v) {
            $this->intbwhsepickdtl = $v;
            $this->modifiedColumns[InvWhseCodeTableMap::COL_INTBWHSEPICKDTL] = true;
        }

        return $this;
    } // setIntbwhsepickdtl()

    /**
     * Set the value of [intbwhseprodbin] column.
     *
     * @param string $v new value
     * @return $this|\InvWhseCode The current object (for fluent API support)
     */
    public function setIntbwhseprodbin($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->intbwhseprodbin !== $v) {
            $this->intbwhseprodbin = $v;
            $this->modifiedColumns[InvWhseCodeTableMap::COL_INTBWHSEPRODBIN] = true;
        }

        return $this;
    } // setIntbwhseprodbin()

    /**
     * Set the value of [intbwhsepharea] column.
     *
     * @param int $v new value
     * @return $this|\InvWhseCode The current object (for fluent API support)
     */
    public function setIntbwhsepharea($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->intbwhsepharea !== $v) {
            $this->intbwhsepharea = $v;
            $this->modifiedColumns[InvWhseCodeTableMap::COL_INTBWHSEPHAREA] = true;
        }

        return $this;
    } // setIntbwhsepharea()

    /**
     * Set the value of [intbwhsephfrst3] column.
     *
     * @param int $v new value
     * @return $this|\InvWhseCode The current object (for fluent API support)
     */
    public function setIntbwhsephfrst3($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->intbwhsephfrst3 !== $v) {
            $this->intbwhsephfrst3 = $v;
            $this->modifiedColumns[InvWhseCodeTableMap::COL_INTBWHSEPHFRST3] = true;
        }

        return $this;
    } // setIntbwhsephfrst3()

    /**
     * Set the value of [intbwhsephlast4] column.
     *
     * @param int $v new value
     * @return $this|\InvWhseCode The current object (for fluent API support)
     */
    public function setIntbwhsephlast4($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->intbwhsephlast4 !== $v) {
            $this->intbwhsephlast4 = $v;
            $this->modifiedColumns[InvWhseCodeTableMap::COL_INTBWHSEPHLAST4] = true;
        }

        return $this;
    } // setIntbwhsephlast4()

    /**
     * Set the value of [intbwhsephext] column.
     *
     * @param string $v new value
     * @return $this|\InvWhseCode The current object (for fluent API support)
     */
    public function setIntbwhsephext($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->intbwhsephext !== $v) {
            $this->intbwhsephext = $v;
            $this->modifiedColumns[InvWhseCodeTableMap::COL_INTBWHSEPHEXT] = true;
        }

        return $this;
    } // setIntbwhsephext()

    /**
     * Set the value of [intbwhsefaxarea] column.
     *
     * @param int $v new value
     * @return $this|\InvWhseCode The current object (for fluent API support)
     */
    public function setIntbwhsefaxarea($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->intbwhsefaxarea !== $v) {
            $this->intbwhsefaxarea = $v;
            $this->modifiedColumns[InvWhseCodeTableMap::COL_INTBWHSEFAXAREA] = true;
        }

        return $this;
    } // setIntbwhsefaxarea()

    /**
     * Set the value of [intbwhsefaxfrst3] column.
     *
     * @param int $v new value
     * @return $this|\InvWhseCode The current object (for fluent API support)
     */
    public function setIntbwhsefaxfrst3($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->intbwhsefaxfrst3 !== $v) {
            $this->intbwhsefaxfrst3 = $v;
            $this->modifiedColumns[InvWhseCodeTableMap::COL_INTBWHSEFAXFRST3] = true;
        }

        return $this;
    } // setIntbwhsefaxfrst3()

    /**
     * Set the value of [intbwhsefaxlast4] column.
     *
     * @param int $v new value
     * @return $this|\InvWhseCode The current object (for fluent API support)
     */
    public function setIntbwhsefaxlast4($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->intbwhsefaxlast4 !== $v) {
            $this->intbwhsefaxlast4 = $v;
            $this->modifiedColumns[InvWhseCodeTableMap::COL_INTBWHSEFAXLAST4] = true;
        }

        return $this;
    } // setIntbwhsefaxlast4()

    /**
     * Set the value of [intbwhseemailadr] column.
     *
     * @param string $v new value
     * @return $this|\InvWhseCode The current object (for fluent API support)
     */
    public function setIntbwhseemailadr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->intbwhseemailadr !== $v) {
            $this->intbwhseemailadr = $v;
            $this->modifiedColumns[InvWhseCodeTableMap::COL_INTBWHSEEMAILADR] = true;
        }

        return $this;
    } // setIntbwhseemailadr()

    /**
     * Set the value of [intbwhseqcrgabin] column.
     *
     * @param string $v new value
     * @return $this|\InvWhseCode The current object (for fluent API support)
     */
    public function setIntbwhseqcrgabin($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->intbwhseqcrgabin !== $v) {
            $this->intbwhseqcrgabin = $v;
            $this->modifiedColumns[InvWhseCodeTableMap::COL_INTBWHSEQCRGABIN] = true;
        }

        return $this;
    } // setIntbwhseqcrgabin()

    /**
     * Set the value of [intbwhserfprinter1] column.
     *
     * @param string $v new value
     * @return $this|\InvWhseCode The current object (for fluent API support)
     */
    public function setIntbwhserfprinter1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->intbwhserfprinter1 !== $v) {
            $this->intbwhserfprinter1 = $v;
            $this->modifiedColumns[InvWhseCodeTableMap::COL_INTBWHSERFPRINTER1] = true;
        }

        return $this;
    } // setIntbwhserfprinter1()

    /**
     * Set the value of [intbwhserfprinter2] column.
     *
     * @param string $v new value
     * @return $this|\InvWhseCode The current object (for fluent API support)
     */
    public function setIntbwhserfprinter2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->intbwhserfprinter2 !== $v) {
            $this->intbwhserfprinter2 = $v;
            $this->modifiedColumns[InvWhseCodeTableMap::COL_INTBWHSERFPRINTER2] = true;
        }

        return $this;
    } // setIntbwhserfprinter2()

    /**
     * Set the value of [intbwhserfprinter3] column.
     *
     * @param string $v new value
     * @return $this|\InvWhseCode The current object (for fluent API support)
     */
    public function setIntbwhserfprinter3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->intbwhserfprinter3 !== $v) {
            $this->intbwhserfprinter3 = $v;
            $this->modifiedColumns[InvWhseCodeTableMap::COL_INTBWHSERFPRINTER3] = true;
        }

        return $this;
    } // setIntbwhserfprinter3()

    /**
     * Set the value of [intbwhserfprinter4] column.
     *
     * @param string $v new value
     * @return $this|\InvWhseCode The current object (for fluent API support)
     */
    public function setIntbwhserfprinter4($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->intbwhserfprinter4 !== $v) {
            $this->intbwhserfprinter4 = $v;
            $this->modifiedColumns[InvWhseCodeTableMap::COL_INTBWHSERFPRINTER4] = true;
        }

        return $this;
    } // setIntbwhserfprinter4()

    /**
     * Set the value of [intbwhserfprinter5] column.
     *
     * @param string $v new value
     * @return $this|\InvWhseCode The current object (for fluent API support)
     */
    public function setIntbwhserfprinter5($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->intbwhserfprinter5 !== $v) {
            $this->intbwhserfprinter5 = $v;
            $this->modifiedColumns[InvWhseCodeTableMap::COL_INTBWHSERFPRINTER5] = true;
        }

        return $this;
    } // setIntbwhserfprinter5()

    /**
     * Set the value of [intbwhseprofwhse] column.
     *
     * @param string $v new value
     * @return $this|\InvWhseCode The current object (for fluent API support)
     */
    public function setIntbwhseprofwhse($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->intbwhseprofwhse !== $v) {
            $this->intbwhseprofwhse = $v;
            $this->modifiedColumns[InvWhseCodeTableMap::COL_INTBWHSEPROFWHSE] = true;
        }

        return $this;
    } // setIntbwhseprofwhse()

    /**
     * Set the value of [intbwhseasetwhse] column.
     *
     * @param string $v new value
     * @return $this|\InvWhseCode The current object (for fluent API support)
     */
    public function setIntbwhseasetwhse($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->intbwhseasetwhse !== $v) {
            $this->intbwhseasetwhse = $v;
            $this->modifiedColumns[InvWhseCodeTableMap::COL_INTBWHSEASETWHSE] = true;
        }

        return $this;
    } // setIntbwhseasetwhse()

    /**
     * Set the value of [intbwhseconsignwhse] column.
     *
     * @param string $v new value
     * @return $this|\InvWhseCode The current object (for fluent API support)
     */
    public function setIntbwhseconsignwhse($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->intbwhseconsignwhse !== $v) {
            $this->intbwhseconsignwhse = $v;
            $this->modifiedColumns[InvWhseCodeTableMap::COL_INTBWHSECONSIGNWHSE] = true;
        }

        return $this;
    } // setIntbwhseconsignwhse()

    /**
     * Set the value of [intbwhsebinrangelist] column.
     *
     * @param string $v new value
     * @return $this|\InvWhseCode The current object (for fluent API support)
     */
    public function setIntbwhsebinrangelist($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->intbwhsebinrangelist !== $v) {
            $this->intbwhsebinrangelist = $v;
            $this->modifiedColumns[InvWhseCodeTableMap::COL_INTBWHSEBINRANGELIST] = true;
        }

        return $this;
    } // setIntbwhsebinrangelist()

    /**
     * Set the value of [intbwhsesupplywhse] column.
     *
     * @param string $v new value
     * @return $this|\InvWhseCode The current object (for fluent API support)
     */
    public function setIntbwhsesupplywhse($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->intbwhsesupplywhse !== $v) {
            $this->intbwhsesupplywhse = $v;
            $this->modifiedColumns[InvWhseCodeTableMap::COL_INTBWHSESUPPLYWHSE] = true;
        }

        return $this;
    } // setIntbwhsesupplywhse()

    /**
     * Set the value of [dateupdtd] column.
     *
     * @param int $v new value
     * @return $this|\InvWhseCode The current object (for fluent API support)
     */
    public function setDateupdtd($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->dateupdtd !== $v) {
            $this->dateupdtd = $v;
            $this->modifiedColumns[InvWhseCodeTableMap::COL_DATEUPDTD] = true;
        }

        return $this;
    } // setDateupdtd()

    /**
     * Set the value of [timeupdtd] column.
     *
     * @param int $v new value
     * @return $this|\InvWhseCode The current object (for fluent API support)
     */
    public function setTimeupdtd($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->timeupdtd !== $v) {
            $this->timeupdtd = $v;
            $this->modifiedColumns[InvWhseCodeTableMap::COL_TIMEUPDTD] = true;
        }

        return $this;
    } // setTimeupdtd()

    /**
     * Set the value of [dummy] column.
     *
     * @param string $v new value
     * @return $this|\InvWhseCode The current object (for fluent API support)
     */
    public function setDummy($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dummy !== $v) {
            $this->dummy = $v;
            $this->modifiedColumns[InvWhseCodeTableMap::COL_DUMMY] = true;
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : InvWhseCodeTableMap::translateFieldName('Intbwhse', TableMap::TYPE_PHPNAME, $indexType)];
            $this->intbwhse = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : InvWhseCodeTableMap::translateFieldName('Intbwhsename', TableMap::TYPE_PHPNAME, $indexType)];
            $this->intbwhsename = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : InvWhseCodeTableMap::translateFieldName('Intbwhseadr1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->intbwhseadr1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : InvWhseCodeTableMap::translateFieldName('Intbwhseadr2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->intbwhseadr2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : InvWhseCodeTableMap::translateFieldName('Intbwhsecity', TableMap::TYPE_PHPNAME, $indexType)];
            $this->intbwhsecity = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : InvWhseCodeTableMap::translateFieldName('Intbwhsestat', TableMap::TYPE_PHPNAME, $indexType)];
            $this->intbwhsestat = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : InvWhseCodeTableMap::translateFieldName('Intbwhsezipcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->intbwhsezipcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : InvWhseCodeTableMap::translateFieldName('Intbwhsectry', TableMap::TYPE_PHPNAME, $indexType)];
            $this->intbwhsectry = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : InvWhseCodeTableMap::translateFieldName('Intbwhseusehandheld', TableMap::TYPE_PHPNAME, $indexType)];
            $this->intbwhseusehandheld = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : InvWhseCodeTableMap::translateFieldName('Intbwhsecashcust', TableMap::TYPE_PHPNAME, $indexType)];
            $this->intbwhsecashcust = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : InvWhseCodeTableMap::translateFieldName('Intbwhsepickdtl', TableMap::TYPE_PHPNAME, $indexType)];
            $this->intbwhsepickdtl = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : InvWhseCodeTableMap::translateFieldName('Intbwhseprodbin', TableMap::TYPE_PHPNAME, $indexType)];
            $this->intbwhseprodbin = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : InvWhseCodeTableMap::translateFieldName('Intbwhsepharea', TableMap::TYPE_PHPNAME, $indexType)];
            $this->intbwhsepharea = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : InvWhseCodeTableMap::translateFieldName('Intbwhsephfrst3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->intbwhsephfrst3 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : InvWhseCodeTableMap::translateFieldName('Intbwhsephlast4', TableMap::TYPE_PHPNAME, $indexType)];
            $this->intbwhsephlast4 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : InvWhseCodeTableMap::translateFieldName('Intbwhsephext', TableMap::TYPE_PHPNAME, $indexType)];
            $this->intbwhsephext = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : InvWhseCodeTableMap::translateFieldName('Intbwhsefaxarea', TableMap::TYPE_PHPNAME, $indexType)];
            $this->intbwhsefaxarea = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : InvWhseCodeTableMap::translateFieldName('Intbwhsefaxfrst3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->intbwhsefaxfrst3 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : InvWhseCodeTableMap::translateFieldName('Intbwhsefaxlast4', TableMap::TYPE_PHPNAME, $indexType)];
            $this->intbwhsefaxlast4 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : InvWhseCodeTableMap::translateFieldName('Intbwhseemailadr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->intbwhseemailadr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : InvWhseCodeTableMap::translateFieldName('Intbwhseqcrgabin', TableMap::TYPE_PHPNAME, $indexType)];
            $this->intbwhseqcrgabin = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : InvWhseCodeTableMap::translateFieldName('Intbwhserfprinter1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->intbwhserfprinter1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : InvWhseCodeTableMap::translateFieldName('Intbwhserfprinter2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->intbwhserfprinter2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : InvWhseCodeTableMap::translateFieldName('Intbwhserfprinter3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->intbwhserfprinter3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : InvWhseCodeTableMap::translateFieldName('Intbwhserfprinter4', TableMap::TYPE_PHPNAME, $indexType)];
            $this->intbwhserfprinter4 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : InvWhseCodeTableMap::translateFieldName('Intbwhserfprinter5', TableMap::TYPE_PHPNAME, $indexType)];
            $this->intbwhserfprinter5 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : InvWhseCodeTableMap::translateFieldName('Intbwhseprofwhse', TableMap::TYPE_PHPNAME, $indexType)];
            $this->intbwhseprofwhse = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : InvWhseCodeTableMap::translateFieldName('Intbwhseasetwhse', TableMap::TYPE_PHPNAME, $indexType)];
            $this->intbwhseasetwhse = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 28 + $startcol : InvWhseCodeTableMap::translateFieldName('Intbwhseconsignwhse', TableMap::TYPE_PHPNAME, $indexType)];
            $this->intbwhseconsignwhse = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 29 + $startcol : InvWhseCodeTableMap::translateFieldName('Intbwhsebinrangelist', TableMap::TYPE_PHPNAME, $indexType)];
            $this->intbwhsebinrangelist = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 30 + $startcol : InvWhseCodeTableMap::translateFieldName('Intbwhsesupplywhse', TableMap::TYPE_PHPNAME, $indexType)];
            $this->intbwhsesupplywhse = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 31 + $startcol : InvWhseCodeTableMap::translateFieldName('Dateupdtd', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dateupdtd = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 32 + $startcol : InvWhseCodeTableMap::translateFieldName('Timeupdtd', TableMap::TYPE_PHPNAME, $indexType)];
            $this->timeupdtd = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 33 + $startcol : InvWhseCodeTableMap::translateFieldName('Dummy', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dummy = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 34; // 34 = InvWhseCodeTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\InvWhseCode'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(InvWhseCodeTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildInvWhseCodeQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see InvWhseCode::setDeleted()
     * @see InvWhseCode::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(InvWhseCodeTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildInvWhseCodeQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(InvWhseCodeTableMap::DATABASE_NAME);
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
                InvWhseCodeTableMap::addInstanceToPool($this);
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
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSE)) {
            $modifiedColumns[':p' . $index++]  = 'IntbWhse';
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSENAME)) {
            $modifiedColumns[':p' . $index++]  = 'IntbWhseName';
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSEADR1)) {
            $modifiedColumns[':p' . $index++]  = 'IntbWhseAdr1';
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSEADR2)) {
            $modifiedColumns[':p' . $index++]  = 'IntbWhseAdr2';
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSECITY)) {
            $modifiedColumns[':p' . $index++]  = 'IntbWhseCity';
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSESTAT)) {
            $modifiedColumns[':p' . $index++]  = 'IntbWhseStat';
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSEZIPCODE)) {
            $modifiedColumns[':p' . $index++]  = 'IntbWhseZipCode';
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSECTRY)) {
            $modifiedColumns[':p' . $index++]  = 'IntbWhseCtry';
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSEUSEHANDHELD)) {
            $modifiedColumns[':p' . $index++]  = 'IntbWhseUseHandheld';
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSECASHCUST)) {
            $modifiedColumns[':p' . $index++]  = 'IntbWhseCashCust';
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSEPICKDTL)) {
            $modifiedColumns[':p' . $index++]  = 'IntbWhsePickDtl';
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSEPRODBIN)) {
            $modifiedColumns[':p' . $index++]  = 'IntbWhseProdBin';
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSEPHAREA)) {
            $modifiedColumns[':p' . $index++]  = 'IntbWhsePhArea';
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSEPHFRST3)) {
            $modifiedColumns[':p' . $index++]  = 'IntbWhsePhFrst3';
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSEPHLAST4)) {
            $modifiedColumns[':p' . $index++]  = 'IntbWhsePhLast4';
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSEPHEXT)) {
            $modifiedColumns[':p' . $index++]  = 'IntbWhsePhExt';
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSEFAXAREA)) {
            $modifiedColumns[':p' . $index++]  = 'IntbWhseFaxArea';
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSEFAXFRST3)) {
            $modifiedColumns[':p' . $index++]  = 'IntbWhseFaxFrst3';
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSEFAXLAST4)) {
            $modifiedColumns[':p' . $index++]  = 'IntbWhseFaxLast4';
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSEEMAILADR)) {
            $modifiedColumns[':p' . $index++]  = 'IntbWhseEmailAdr';
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSEQCRGABIN)) {
            $modifiedColumns[':p' . $index++]  = 'IntbWhseQcRgaBin';
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSERFPRINTER1)) {
            $modifiedColumns[':p' . $index++]  = 'IntbWhseRfPrinter1';
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSERFPRINTER2)) {
            $modifiedColumns[':p' . $index++]  = 'IntbWhseRfPrinter2';
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSERFPRINTER3)) {
            $modifiedColumns[':p' . $index++]  = 'IntbWhseRfPrinter3';
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSERFPRINTER4)) {
            $modifiedColumns[':p' . $index++]  = 'IntbWhseRfPrinter4';
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSERFPRINTER5)) {
            $modifiedColumns[':p' . $index++]  = 'IntbWhseRfPrinter5';
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSEPROFWHSE)) {
            $modifiedColumns[':p' . $index++]  = 'IntbWhseProfWhse';
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSEASETWHSE)) {
            $modifiedColumns[':p' . $index++]  = 'IntbWhseAsetWhse';
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSECONSIGNWHSE)) {
            $modifiedColumns[':p' . $index++]  = 'IntbWhseConsignWhse';
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSEBINRANGELIST)) {
            $modifiedColumns[':p' . $index++]  = 'IntbWhseBinRangeList';
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSESUPPLYWHSE)) {
            $modifiedColumns[':p' . $index++]  = 'IntbWhseSupplyWhse';
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_DATEUPDTD)) {
            $modifiedColumns[':p' . $index++]  = 'DateUpdtd';
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_TIMEUPDTD)) {
            $modifiedColumns[':p' . $index++]  = 'TimeUpdtd';
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_DUMMY)) {
            $modifiedColumns[':p' . $index++]  = 'dummy';
        }

        $sql = sprintf(
            'INSERT INTO inv_whse_code (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'IntbWhse':
                        $stmt->bindValue($identifier, $this->intbwhse, PDO::PARAM_STR);
                        break;
                    case 'IntbWhseName':
                        $stmt->bindValue($identifier, $this->intbwhsename, PDO::PARAM_STR);
                        break;
                    case 'IntbWhseAdr1':
                        $stmt->bindValue($identifier, $this->intbwhseadr1, PDO::PARAM_STR);
                        break;
                    case 'IntbWhseAdr2':
                        $stmt->bindValue($identifier, $this->intbwhseadr2, PDO::PARAM_STR);
                        break;
                    case 'IntbWhseCity':
                        $stmt->bindValue($identifier, $this->intbwhsecity, PDO::PARAM_STR);
                        break;
                    case 'IntbWhseStat':
                        $stmt->bindValue($identifier, $this->intbwhsestat, PDO::PARAM_STR);
                        break;
                    case 'IntbWhseZipCode':
                        $stmt->bindValue($identifier, $this->intbwhsezipcode, PDO::PARAM_STR);
                        break;
                    case 'IntbWhseCtry':
                        $stmt->bindValue($identifier, $this->intbwhsectry, PDO::PARAM_STR);
                        break;
                    case 'IntbWhseUseHandheld':
                        $stmt->bindValue($identifier, $this->intbwhseusehandheld, PDO::PARAM_STR);
                        break;
                    case 'IntbWhseCashCust':
                        $stmt->bindValue($identifier, $this->intbwhsecashcust, PDO::PARAM_STR);
                        break;
                    case 'IntbWhsePickDtl':
                        $stmt->bindValue($identifier, $this->intbwhsepickdtl, PDO::PARAM_STR);
                        break;
                    case 'IntbWhseProdBin':
                        $stmt->bindValue($identifier, $this->intbwhseprodbin, PDO::PARAM_STR);
                        break;
                    case 'IntbWhsePhArea':
                        $stmt->bindValue($identifier, $this->intbwhsepharea, PDO::PARAM_INT);
                        break;
                    case 'IntbWhsePhFrst3':
                        $stmt->bindValue($identifier, $this->intbwhsephfrst3, PDO::PARAM_INT);
                        break;
                    case 'IntbWhsePhLast4':
                        $stmt->bindValue($identifier, $this->intbwhsephlast4, PDO::PARAM_INT);
                        break;
                    case 'IntbWhsePhExt':
                        $stmt->bindValue($identifier, $this->intbwhsephext, PDO::PARAM_STR);
                        break;
                    case 'IntbWhseFaxArea':
                        $stmt->bindValue($identifier, $this->intbwhsefaxarea, PDO::PARAM_INT);
                        break;
                    case 'IntbWhseFaxFrst3':
                        $stmt->bindValue($identifier, $this->intbwhsefaxfrst3, PDO::PARAM_INT);
                        break;
                    case 'IntbWhseFaxLast4':
                        $stmt->bindValue($identifier, $this->intbwhsefaxlast4, PDO::PARAM_INT);
                        break;
                    case 'IntbWhseEmailAdr':
                        $stmt->bindValue($identifier, $this->intbwhseemailadr, PDO::PARAM_STR);
                        break;
                    case 'IntbWhseQcRgaBin':
                        $stmt->bindValue($identifier, $this->intbwhseqcrgabin, PDO::PARAM_STR);
                        break;
                    case 'IntbWhseRfPrinter1':
                        $stmt->bindValue($identifier, $this->intbwhserfprinter1, PDO::PARAM_STR);
                        break;
                    case 'IntbWhseRfPrinter2':
                        $stmt->bindValue($identifier, $this->intbwhserfprinter2, PDO::PARAM_STR);
                        break;
                    case 'IntbWhseRfPrinter3':
                        $stmt->bindValue($identifier, $this->intbwhserfprinter3, PDO::PARAM_STR);
                        break;
                    case 'IntbWhseRfPrinter4':
                        $stmt->bindValue($identifier, $this->intbwhserfprinter4, PDO::PARAM_STR);
                        break;
                    case 'IntbWhseRfPrinter5':
                        $stmt->bindValue($identifier, $this->intbwhserfprinter5, PDO::PARAM_STR);
                        break;
                    case 'IntbWhseProfWhse':
                        $stmt->bindValue($identifier, $this->intbwhseprofwhse, PDO::PARAM_STR);
                        break;
                    case 'IntbWhseAsetWhse':
                        $stmt->bindValue($identifier, $this->intbwhseasetwhse, PDO::PARAM_STR);
                        break;
                    case 'IntbWhseConsignWhse':
                        $stmt->bindValue($identifier, $this->intbwhseconsignwhse, PDO::PARAM_STR);
                        break;
                    case 'IntbWhseBinRangeList':
                        $stmt->bindValue($identifier, $this->intbwhsebinrangelist, PDO::PARAM_STR);
                        break;
                    case 'IntbWhseSupplyWhse':
                        $stmt->bindValue($identifier, $this->intbwhsesupplywhse, PDO::PARAM_STR);
                        break;
                    case 'DateUpdtd':
                        $stmt->bindValue($identifier, $this->dateupdtd, PDO::PARAM_INT);
                        break;
                    case 'TimeUpdtd':
                        $stmt->bindValue($identifier, $this->timeupdtd, PDO::PARAM_INT);
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
        $pos = InvWhseCodeTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getIntbwhse();
                break;
            case 1:
                return $this->getIntbwhsename();
                break;
            case 2:
                return $this->getIntbwhseadr1();
                break;
            case 3:
                return $this->getIntbwhseadr2();
                break;
            case 4:
                return $this->getIntbwhsecity();
                break;
            case 5:
                return $this->getIntbwhsestat();
                break;
            case 6:
                return $this->getIntbwhsezipcode();
                break;
            case 7:
                return $this->getIntbwhsectry();
                break;
            case 8:
                return $this->getIntbwhseusehandheld();
                break;
            case 9:
                return $this->getIntbwhsecashcust();
                break;
            case 10:
                return $this->getIntbwhsepickdtl();
                break;
            case 11:
                return $this->getIntbwhseprodbin();
                break;
            case 12:
                return $this->getIntbwhsepharea();
                break;
            case 13:
                return $this->getIntbwhsephfrst3();
                break;
            case 14:
                return $this->getIntbwhsephlast4();
                break;
            case 15:
                return $this->getIntbwhsephext();
                break;
            case 16:
                return $this->getIntbwhsefaxarea();
                break;
            case 17:
                return $this->getIntbwhsefaxfrst3();
                break;
            case 18:
                return $this->getIntbwhsefaxlast4();
                break;
            case 19:
                return $this->getIntbwhseemailadr();
                break;
            case 20:
                return $this->getIntbwhseqcrgabin();
                break;
            case 21:
                return $this->getIntbwhserfprinter1();
                break;
            case 22:
                return $this->getIntbwhserfprinter2();
                break;
            case 23:
                return $this->getIntbwhserfprinter3();
                break;
            case 24:
                return $this->getIntbwhserfprinter4();
                break;
            case 25:
                return $this->getIntbwhserfprinter5();
                break;
            case 26:
                return $this->getIntbwhseprofwhse();
                break;
            case 27:
                return $this->getIntbwhseasetwhse();
                break;
            case 28:
                return $this->getIntbwhseconsignwhse();
                break;
            case 29:
                return $this->getIntbwhsebinrangelist();
                break;
            case 30:
                return $this->getIntbwhsesupplywhse();
                break;
            case 31:
                return $this->getDateupdtd();
                break;
            case 32:
                return $this->getTimeupdtd();
                break;
            case 33:
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

        if (isset($alreadyDumpedObjects['InvWhseCode'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['InvWhseCode'][$this->hashCode()] = true;
        $keys = InvWhseCodeTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIntbwhse(),
            $keys[1] => $this->getIntbwhsename(),
            $keys[2] => $this->getIntbwhseadr1(),
            $keys[3] => $this->getIntbwhseadr2(),
            $keys[4] => $this->getIntbwhsecity(),
            $keys[5] => $this->getIntbwhsestat(),
            $keys[6] => $this->getIntbwhsezipcode(),
            $keys[7] => $this->getIntbwhsectry(),
            $keys[8] => $this->getIntbwhseusehandheld(),
            $keys[9] => $this->getIntbwhsecashcust(),
            $keys[10] => $this->getIntbwhsepickdtl(),
            $keys[11] => $this->getIntbwhseprodbin(),
            $keys[12] => $this->getIntbwhsepharea(),
            $keys[13] => $this->getIntbwhsephfrst3(),
            $keys[14] => $this->getIntbwhsephlast4(),
            $keys[15] => $this->getIntbwhsephext(),
            $keys[16] => $this->getIntbwhsefaxarea(),
            $keys[17] => $this->getIntbwhsefaxfrst3(),
            $keys[18] => $this->getIntbwhsefaxlast4(),
            $keys[19] => $this->getIntbwhseemailadr(),
            $keys[20] => $this->getIntbwhseqcrgabin(),
            $keys[21] => $this->getIntbwhserfprinter1(),
            $keys[22] => $this->getIntbwhserfprinter2(),
            $keys[23] => $this->getIntbwhserfprinter3(),
            $keys[24] => $this->getIntbwhserfprinter4(),
            $keys[25] => $this->getIntbwhserfprinter5(),
            $keys[26] => $this->getIntbwhseprofwhse(),
            $keys[27] => $this->getIntbwhseasetwhse(),
            $keys[28] => $this->getIntbwhseconsignwhse(),
            $keys[29] => $this->getIntbwhsebinrangelist(),
            $keys[30] => $this->getIntbwhsesupplywhse(),
            $keys[31] => $this->getDateupdtd(),
            $keys[32] => $this->getTimeupdtd(),
            $keys[33] => $this->getDummy(),
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
     * @return $this|\InvWhseCode
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = InvWhseCodeTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\InvWhseCode
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIntbwhse($value);
                break;
            case 1:
                $this->setIntbwhsename($value);
                break;
            case 2:
                $this->setIntbwhseadr1($value);
                break;
            case 3:
                $this->setIntbwhseadr2($value);
                break;
            case 4:
                $this->setIntbwhsecity($value);
                break;
            case 5:
                $this->setIntbwhsestat($value);
                break;
            case 6:
                $this->setIntbwhsezipcode($value);
                break;
            case 7:
                $this->setIntbwhsectry($value);
                break;
            case 8:
                $this->setIntbwhseusehandheld($value);
                break;
            case 9:
                $this->setIntbwhsecashcust($value);
                break;
            case 10:
                $this->setIntbwhsepickdtl($value);
                break;
            case 11:
                $this->setIntbwhseprodbin($value);
                break;
            case 12:
                $this->setIntbwhsepharea($value);
                break;
            case 13:
                $this->setIntbwhsephfrst3($value);
                break;
            case 14:
                $this->setIntbwhsephlast4($value);
                break;
            case 15:
                $this->setIntbwhsephext($value);
                break;
            case 16:
                $this->setIntbwhsefaxarea($value);
                break;
            case 17:
                $this->setIntbwhsefaxfrst3($value);
                break;
            case 18:
                $this->setIntbwhsefaxlast4($value);
                break;
            case 19:
                $this->setIntbwhseemailadr($value);
                break;
            case 20:
                $this->setIntbwhseqcrgabin($value);
                break;
            case 21:
                $this->setIntbwhserfprinter1($value);
                break;
            case 22:
                $this->setIntbwhserfprinter2($value);
                break;
            case 23:
                $this->setIntbwhserfprinter3($value);
                break;
            case 24:
                $this->setIntbwhserfprinter4($value);
                break;
            case 25:
                $this->setIntbwhserfprinter5($value);
                break;
            case 26:
                $this->setIntbwhseprofwhse($value);
                break;
            case 27:
                $this->setIntbwhseasetwhse($value);
                break;
            case 28:
                $this->setIntbwhseconsignwhse($value);
                break;
            case 29:
                $this->setIntbwhsebinrangelist($value);
                break;
            case 30:
                $this->setIntbwhsesupplywhse($value);
                break;
            case 31:
                $this->setDateupdtd($value);
                break;
            case 32:
                $this->setTimeupdtd($value);
                break;
            case 33:
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
        $keys = InvWhseCodeTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIntbwhse($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setIntbwhsename($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setIntbwhseadr1($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setIntbwhseadr2($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setIntbwhsecity($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setIntbwhsestat($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setIntbwhsezipcode($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setIntbwhsectry($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setIntbwhseusehandheld($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setIntbwhsecashcust($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setIntbwhsepickdtl($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setIntbwhseprodbin($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setIntbwhsepharea($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setIntbwhsephfrst3($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setIntbwhsephlast4($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setIntbwhsephext($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setIntbwhsefaxarea($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setIntbwhsefaxfrst3($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setIntbwhsefaxlast4($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setIntbwhseemailadr($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setIntbwhseqcrgabin($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setIntbwhserfprinter1($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setIntbwhserfprinter2($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setIntbwhserfprinter3($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setIntbwhserfprinter4($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setIntbwhserfprinter5($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setIntbwhseprofwhse($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setIntbwhseasetwhse($arr[$keys[27]]);
        }
        if (array_key_exists($keys[28], $arr)) {
            $this->setIntbwhseconsignwhse($arr[$keys[28]]);
        }
        if (array_key_exists($keys[29], $arr)) {
            $this->setIntbwhsebinrangelist($arr[$keys[29]]);
        }
        if (array_key_exists($keys[30], $arr)) {
            $this->setIntbwhsesupplywhse($arr[$keys[30]]);
        }
        if (array_key_exists($keys[31], $arr)) {
            $this->setDateupdtd($arr[$keys[31]]);
        }
        if (array_key_exists($keys[32], $arr)) {
            $this->setTimeupdtd($arr[$keys[32]]);
        }
        if (array_key_exists($keys[33], $arr)) {
            $this->setDummy($arr[$keys[33]]);
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
     * @return $this|\InvWhseCode The current object, for fluid interface
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
        $criteria = new Criteria(InvWhseCodeTableMap::DATABASE_NAME);

        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSE)) {
            $criteria->add(InvWhseCodeTableMap::COL_INTBWHSE, $this->intbwhse);
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSENAME)) {
            $criteria->add(InvWhseCodeTableMap::COL_INTBWHSENAME, $this->intbwhsename);
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSEADR1)) {
            $criteria->add(InvWhseCodeTableMap::COL_INTBWHSEADR1, $this->intbwhseadr1);
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSEADR2)) {
            $criteria->add(InvWhseCodeTableMap::COL_INTBWHSEADR2, $this->intbwhseadr2);
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSECITY)) {
            $criteria->add(InvWhseCodeTableMap::COL_INTBWHSECITY, $this->intbwhsecity);
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSESTAT)) {
            $criteria->add(InvWhseCodeTableMap::COL_INTBWHSESTAT, $this->intbwhsestat);
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSEZIPCODE)) {
            $criteria->add(InvWhseCodeTableMap::COL_INTBWHSEZIPCODE, $this->intbwhsezipcode);
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSECTRY)) {
            $criteria->add(InvWhseCodeTableMap::COL_INTBWHSECTRY, $this->intbwhsectry);
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSEUSEHANDHELD)) {
            $criteria->add(InvWhseCodeTableMap::COL_INTBWHSEUSEHANDHELD, $this->intbwhseusehandheld);
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSECASHCUST)) {
            $criteria->add(InvWhseCodeTableMap::COL_INTBWHSECASHCUST, $this->intbwhsecashcust);
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSEPICKDTL)) {
            $criteria->add(InvWhseCodeTableMap::COL_INTBWHSEPICKDTL, $this->intbwhsepickdtl);
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSEPRODBIN)) {
            $criteria->add(InvWhseCodeTableMap::COL_INTBWHSEPRODBIN, $this->intbwhseprodbin);
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSEPHAREA)) {
            $criteria->add(InvWhseCodeTableMap::COL_INTBWHSEPHAREA, $this->intbwhsepharea);
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSEPHFRST3)) {
            $criteria->add(InvWhseCodeTableMap::COL_INTBWHSEPHFRST3, $this->intbwhsephfrst3);
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSEPHLAST4)) {
            $criteria->add(InvWhseCodeTableMap::COL_INTBWHSEPHLAST4, $this->intbwhsephlast4);
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSEPHEXT)) {
            $criteria->add(InvWhseCodeTableMap::COL_INTBWHSEPHEXT, $this->intbwhsephext);
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSEFAXAREA)) {
            $criteria->add(InvWhseCodeTableMap::COL_INTBWHSEFAXAREA, $this->intbwhsefaxarea);
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSEFAXFRST3)) {
            $criteria->add(InvWhseCodeTableMap::COL_INTBWHSEFAXFRST3, $this->intbwhsefaxfrst3);
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSEFAXLAST4)) {
            $criteria->add(InvWhseCodeTableMap::COL_INTBWHSEFAXLAST4, $this->intbwhsefaxlast4);
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSEEMAILADR)) {
            $criteria->add(InvWhseCodeTableMap::COL_INTBWHSEEMAILADR, $this->intbwhseemailadr);
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSEQCRGABIN)) {
            $criteria->add(InvWhseCodeTableMap::COL_INTBWHSEQCRGABIN, $this->intbwhseqcrgabin);
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSERFPRINTER1)) {
            $criteria->add(InvWhseCodeTableMap::COL_INTBWHSERFPRINTER1, $this->intbwhserfprinter1);
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSERFPRINTER2)) {
            $criteria->add(InvWhseCodeTableMap::COL_INTBWHSERFPRINTER2, $this->intbwhserfprinter2);
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSERFPRINTER3)) {
            $criteria->add(InvWhseCodeTableMap::COL_INTBWHSERFPRINTER3, $this->intbwhserfprinter3);
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSERFPRINTER4)) {
            $criteria->add(InvWhseCodeTableMap::COL_INTBWHSERFPRINTER4, $this->intbwhserfprinter4);
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSERFPRINTER5)) {
            $criteria->add(InvWhseCodeTableMap::COL_INTBWHSERFPRINTER5, $this->intbwhserfprinter5);
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSEPROFWHSE)) {
            $criteria->add(InvWhseCodeTableMap::COL_INTBWHSEPROFWHSE, $this->intbwhseprofwhse);
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSEASETWHSE)) {
            $criteria->add(InvWhseCodeTableMap::COL_INTBWHSEASETWHSE, $this->intbwhseasetwhse);
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSECONSIGNWHSE)) {
            $criteria->add(InvWhseCodeTableMap::COL_INTBWHSECONSIGNWHSE, $this->intbwhseconsignwhse);
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSEBINRANGELIST)) {
            $criteria->add(InvWhseCodeTableMap::COL_INTBWHSEBINRANGELIST, $this->intbwhsebinrangelist);
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_INTBWHSESUPPLYWHSE)) {
            $criteria->add(InvWhseCodeTableMap::COL_INTBWHSESUPPLYWHSE, $this->intbwhsesupplywhse);
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_DATEUPDTD)) {
            $criteria->add(InvWhseCodeTableMap::COL_DATEUPDTD, $this->dateupdtd);
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_TIMEUPDTD)) {
            $criteria->add(InvWhseCodeTableMap::COL_TIMEUPDTD, $this->timeupdtd);
        }
        if ($this->isColumnModified(InvWhseCodeTableMap::COL_DUMMY)) {
            $criteria->add(InvWhseCodeTableMap::COL_DUMMY, $this->dummy);
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
        $criteria = ChildInvWhseCodeQuery::create();
        $criteria->add(InvWhseCodeTableMap::COL_INTBWHSE, $this->intbwhse);

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
        $validPk = null !== $this->getIntbwhse();

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
        return $this->getIntbwhse();
    }

    /**
     * Generic method to set the primary key (intbwhse column).
     *
     * @param       string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIntbwhse($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIntbwhse();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \InvWhseCode (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIntbwhse($this->getIntbwhse());
        $copyObj->setIntbwhsename($this->getIntbwhsename());
        $copyObj->setIntbwhseadr1($this->getIntbwhseadr1());
        $copyObj->setIntbwhseadr2($this->getIntbwhseadr2());
        $copyObj->setIntbwhsecity($this->getIntbwhsecity());
        $copyObj->setIntbwhsestat($this->getIntbwhsestat());
        $copyObj->setIntbwhsezipcode($this->getIntbwhsezipcode());
        $copyObj->setIntbwhsectry($this->getIntbwhsectry());
        $copyObj->setIntbwhseusehandheld($this->getIntbwhseusehandheld());
        $copyObj->setIntbwhsecashcust($this->getIntbwhsecashcust());
        $copyObj->setIntbwhsepickdtl($this->getIntbwhsepickdtl());
        $copyObj->setIntbwhseprodbin($this->getIntbwhseprodbin());
        $copyObj->setIntbwhsepharea($this->getIntbwhsepharea());
        $copyObj->setIntbwhsephfrst3($this->getIntbwhsephfrst3());
        $copyObj->setIntbwhsephlast4($this->getIntbwhsephlast4());
        $copyObj->setIntbwhsephext($this->getIntbwhsephext());
        $copyObj->setIntbwhsefaxarea($this->getIntbwhsefaxarea());
        $copyObj->setIntbwhsefaxfrst3($this->getIntbwhsefaxfrst3());
        $copyObj->setIntbwhsefaxlast4($this->getIntbwhsefaxlast4());
        $copyObj->setIntbwhseemailadr($this->getIntbwhseemailadr());
        $copyObj->setIntbwhseqcrgabin($this->getIntbwhseqcrgabin());
        $copyObj->setIntbwhserfprinter1($this->getIntbwhserfprinter1());
        $copyObj->setIntbwhserfprinter2($this->getIntbwhserfprinter2());
        $copyObj->setIntbwhserfprinter3($this->getIntbwhserfprinter3());
        $copyObj->setIntbwhserfprinter4($this->getIntbwhserfprinter4());
        $copyObj->setIntbwhserfprinter5($this->getIntbwhserfprinter5());
        $copyObj->setIntbwhseprofwhse($this->getIntbwhseprofwhse());
        $copyObj->setIntbwhseasetwhse($this->getIntbwhseasetwhse());
        $copyObj->setIntbwhseconsignwhse($this->getIntbwhseconsignwhse());
        $copyObj->setIntbwhsebinrangelist($this->getIntbwhsebinrangelist());
        $copyObj->setIntbwhsesupplywhse($this->getIntbwhsesupplywhse());
        $copyObj->setDateupdtd($this->getDateupdtd());
        $copyObj->setTimeupdtd($this->getTimeupdtd());
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
     * @return \InvWhseCode Clone of current object.
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
        $this->intbwhse = null;
        $this->intbwhsename = null;
        $this->intbwhseadr1 = null;
        $this->intbwhseadr2 = null;
        $this->intbwhsecity = null;
        $this->intbwhsestat = null;
        $this->intbwhsezipcode = null;
        $this->intbwhsectry = null;
        $this->intbwhseusehandheld = null;
        $this->intbwhsecashcust = null;
        $this->intbwhsepickdtl = null;
        $this->intbwhseprodbin = null;
        $this->intbwhsepharea = null;
        $this->intbwhsephfrst3 = null;
        $this->intbwhsephlast4 = null;
        $this->intbwhsephext = null;
        $this->intbwhsefaxarea = null;
        $this->intbwhsefaxfrst3 = null;
        $this->intbwhsefaxlast4 = null;
        $this->intbwhseemailadr = null;
        $this->intbwhseqcrgabin = null;
        $this->intbwhserfprinter1 = null;
        $this->intbwhserfprinter2 = null;
        $this->intbwhserfprinter3 = null;
        $this->intbwhserfprinter4 = null;
        $this->intbwhserfprinter5 = null;
        $this->intbwhseprofwhse = null;
        $this->intbwhseasetwhse = null;
        $this->intbwhseconsignwhse = null;
        $this->intbwhsebinrangelist = null;
        $this->intbwhsesupplywhse = null;
        $this->dateupdtd = null;
        $this->timeupdtd = null;
        $this->dummy = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
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
        return (string) $this->exportTo(InvWhseCodeTableMap::DEFAULT_STRING_FORMAT);
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
