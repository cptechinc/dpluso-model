<?php

namespace Base;

use \PickSalesOrderDetailQuery as ChildPickSalesOrderDetailQuery;
use \Exception;
use \PDO;
use Map\PickSalesOrderDetailTableMap;
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
 * Base class that represents a row from the 'wmpickdet' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class PickSalesOrderDetail implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\PickSalesOrderDetailTableMap';


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
     * The value for the sessionid field.
     *
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $sessionid;

    /**
     * The value for the recno field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $recno;

    /**
     * The value for the date field.
     *
     * @var        int
     */
    protected $date;

    /**
     * The value for the time field.
     *
     * @var        int
     */
    protected $time;

    /**
     * The value for the ordernbr field.
     *
     * @var        string
     */
    protected $ordernbr;

    /**
     * The value for the linenbr field.
     *
     * @var        int
     */
    protected $linenbr;

    /**
     * The value for the sublinenbr field.
     *
     * @var        int
     */
    protected $sublinenbr;

    /**
     * The value for the itemnbr field.
     *
     * @var        string
     */
    protected $itemnbr;

    /**
     * The value for the itemdesc1 field.
     *
     * @var        string
     */
    protected $itemdesc1;

    /**
     * The value for the itemdesc2 field.
     *
     * @var        string
     */
    protected $itemdesc2;

    /**
     * The value for the qtyordered field.
     *
     * @var        int
     */
    protected $qtyordered;

    /**
     * The value for the qtypulled field.
     *
     * @var        int
     */
    protected $qtypulled;

    /**
     * The value for the qtyremaining field.
     *
     * @var        int
     */
    protected $qtyremaining;

    /**
     * The value for the binnbr field.
     *
     * @var        string
     */
    protected $binnbr;

    /**
     * The value for the caseqty field.
     *
     * @var        int
     */
    protected $caseqty;

    /**
     * The value for the innerpack field.
     *
     * @var        int
     */
    protected $innerpack;

    /**
     * The value for the binqty field.
     *
     * @var        int
     */
    protected $binqty;

    /**
     * The value for the overbin1 field.
     *
     * @var        string
     */
    protected $overbin1;

    /**
     * The value for the overbinqty1 field.
     *
     * @var        int
     */
    protected $overbinqty1;

    /**
     * The value for the overbin2 field.
     *
     * @var        string
     */
    protected $overbin2;

    /**
     * The value for the overbinqty2 field.
     *
     * @var        int
     */
    protected $overbinqty2;

    /**
     * The value for the statusmsg field.
     *
     * @var        string
     */
    protected $statusmsg;

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
        $this->sessionid = '';
        $this->recno = 0;
    }

    /**
     * Initializes internal state of Base\PickSalesOrderDetail object.
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
     * Compares this with another <code>PickSalesOrderDetail</code> instance.  If
     * <code>obj</code> is an instance of <code>PickSalesOrderDetail</code>, delegates to
     * <code>equals(PickSalesOrderDetail)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|PickSalesOrderDetail The current object, for fluid interface
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
     * Get the [sessionid] column value.
     *
     * @return string
     */
    public function getSessionid()
    {
        return $this->sessionid;
    }

    /**
     * Get the [recno] column value.
     *
     * @return int
     */
    public function getRecno()
    {
        return $this->recno;
    }

    /**
     * Get the [date] column value.
     *
     * @return int
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Get the [time] column value.
     *
     * @return int
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Get the [ordernbr] column value.
     *
     * @return string
     */
    public function getOrdernbr()
    {
        return $this->ordernbr;
    }

    /**
     * Get the [linenbr] column value.
     *
     * @return int
     */
    public function getLinenbr()
    {
        return $this->linenbr;
    }

    /**
     * Get the [sublinenbr] column value.
     *
     * @return int
     */
    public function getSublinenbr()
    {
        return $this->sublinenbr;
    }

    /**
     * Get the [itemnbr] column value.
     *
     * @return string
     */
    public function getItemnbr()
    {
        return $this->itemnbr;
    }

    /**
     * Get the [itemdesc1] column value.
     *
     * @return string
     */
    public function getItemdesc1()
    {
        return $this->itemdesc1;
    }

    /**
     * Get the [itemdesc2] column value.
     *
     * @return string
     */
    public function getItemdesc2()
    {
        return $this->itemdesc2;
    }

    /**
     * Get the [qtyordered] column value.
     *
     * @return int
     */
    public function getQtyordered()
    {
        return $this->qtyordered;
    }

    /**
     * Get the [qtypulled] column value.
     *
     * @return int
     */
    public function getQtypulled()
    {
        return $this->qtypulled;
    }

    /**
     * Get the [qtyremaining] column value.
     *
     * @return int
     */
    public function getQtyremaining()
    {
        return $this->qtyremaining;
    }

    /**
     * Get the [binnbr] column value.
     *
     * @return string
     */
    public function getBinnbr()
    {
        return $this->binnbr;
    }

    /**
     * Get the [caseqty] column value.
     *
     * @return int
     */
    public function getCaseqty()
    {
        return $this->caseqty;
    }

    /**
     * Get the [innerpack] column value.
     *
     * @return int
     */
    public function getInnerpack()
    {
        return $this->innerpack;
    }

    /**
     * Get the [binqty] column value.
     *
     * @return int
     */
    public function getBinqty()
    {
        return $this->binqty;
    }

    /**
     * Get the [overbin1] column value.
     *
     * @return string
     */
    public function getOverbin1()
    {
        return $this->overbin1;
    }

    /**
     * Get the [overbinqty1] column value.
     *
     * @return int
     */
    public function getOverbinqty1()
    {
        return $this->overbinqty1;
    }

    /**
     * Get the [overbin2] column value.
     *
     * @return string
     */
    public function getOverbin2()
    {
        return $this->overbin2;
    }

    /**
     * Get the [overbinqty2] column value.
     *
     * @return int
     */
    public function getOverbinqty2()
    {
        return $this->overbinqty2;
    }

    /**
     * Get the [statusmsg] column value.
     *
     * @return string
     */
    public function getStatusmsg()
    {
        return $this->statusmsg;
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
     * Set the value of [sessionid] column.
     *
     * @param string $v new value
     * @return $this|\PickSalesOrderDetail The current object (for fluent API support)
     */
    public function setSessionid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->sessionid !== $v) {
            $this->sessionid = $v;
            $this->modifiedColumns[PickSalesOrderDetailTableMap::COL_SESSIONID] = true;
        }

        return $this;
    } // setSessionid()

    /**
     * Set the value of [recno] column.
     *
     * @param int $v new value
     * @return $this|\PickSalesOrderDetail The current object (for fluent API support)
     */
    public function setRecno($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->recno !== $v) {
            $this->recno = $v;
            $this->modifiedColumns[PickSalesOrderDetailTableMap::COL_RECNO] = true;
        }

        return $this;
    } // setRecno()

    /**
     * Set the value of [date] column.
     *
     * @param int $v new value
     * @return $this|\PickSalesOrderDetail The current object (for fluent API support)
     */
    public function setDate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->date !== $v) {
            $this->date = $v;
            $this->modifiedColumns[PickSalesOrderDetailTableMap::COL_DATE] = true;
        }

        return $this;
    } // setDate()

    /**
     * Set the value of [time] column.
     *
     * @param int $v new value
     * @return $this|\PickSalesOrderDetail The current object (for fluent API support)
     */
    public function setTime($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->time !== $v) {
            $this->time = $v;
            $this->modifiedColumns[PickSalesOrderDetailTableMap::COL_TIME] = true;
        }

        return $this;
    } // setTime()

    /**
     * Set the value of [ordernbr] column.
     *
     * @param string $v new value
     * @return $this|\PickSalesOrderDetail The current object (for fluent API support)
     */
    public function setOrdernbr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ordernbr !== $v) {
            $this->ordernbr = $v;
            $this->modifiedColumns[PickSalesOrderDetailTableMap::COL_ORDERNBR] = true;
        }

        return $this;
    } // setOrdernbr()

    /**
     * Set the value of [linenbr] column.
     *
     * @param int $v new value
     * @return $this|\PickSalesOrderDetail The current object (for fluent API support)
     */
    public function setLinenbr($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->linenbr !== $v) {
            $this->linenbr = $v;
            $this->modifiedColumns[PickSalesOrderDetailTableMap::COL_LINENBR] = true;
        }

        return $this;
    } // setLinenbr()

    /**
     * Set the value of [sublinenbr] column.
     *
     * @param int $v new value
     * @return $this|\PickSalesOrderDetail The current object (for fluent API support)
     */
    public function setSublinenbr($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->sublinenbr !== $v) {
            $this->sublinenbr = $v;
            $this->modifiedColumns[PickSalesOrderDetailTableMap::COL_SUBLINENBR] = true;
        }

        return $this;
    } // setSublinenbr()

    /**
     * Set the value of [itemnbr] column.
     *
     * @param string $v new value
     * @return $this|\PickSalesOrderDetail The current object (for fluent API support)
     */
    public function setItemnbr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->itemnbr !== $v) {
            $this->itemnbr = $v;
            $this->modifiedColumns[PickSalesOrderDetailTableMap::COL_ITEMNBR] = true;
        }

        return $this;
    } // setItemnbr()

    /**
     * Set the value of [itemdesc1] column.
     *
     * @param string $v new value
     * @return $this|\PickSalesOrderDetail The current object (for fluent API support)
     */
    public function setItemdesc1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->itemdesc1 !== $v) {
            $this->itemdesc1 = $v;
            $this->modifiedColumns[PickSalesOrderDetailTableMap::COL_ITEMDESC1] = true;
        }

        return $this;
    } // setItemdesc1()

    /**
     * Set the value of [itemdesc2] column.
     *
     * @param string $v new value
     * @return $this|\PickSalesOrderDetail The current object (for fluent API support)
     */
    public function setItemdesc2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->itemdesc2 !== $v) {
            $this->itemdesc2 = $v;
            $this->modifiedColumns[PickSalesOrderDetailTableMap::COL_ITEMDESC2] = true;
        }

        return $this;
    } // setItemdesc2()

    /**
     * Set the value of [qtyordered] column.
     *
     * @param int $v new value
     * @return $this|\PickSalesOrderDetail The current object (for fluent API support)
     */
    public function setQtyordered($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->qtyordered !== $v) {
            $this->qtyordered = $v;
            $this->modifiedColumns[PickSalesOrderDetailTableMap::COL_QTYORDERED] = true;
        }

        return $this;
    } // setQtyordered()

    /**
     * Set the value of [qtypulled] column.
     *
     * @param int $v new value
     * @return $this|\PickSalesOrderDetail The current object (for fluent API support)
     */
    public function setQtypulled($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->qtypulled !== $v) {
            $this->qtypulled = $v;
            $this->modifiedColumns[PickSalesOrderDetailTableMap::COL_QTYPULLED] = true;
        }

        return $this;
    } // setQtypulled()

    /**
     * Set the value of [qtyremaining] column.
     *
     * @param int $v new value
     * @return $this|\PickSalesOrderDetail The current object (for fluent API support)
     */
    public function setQtyremaining($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->qtyremaining !== $v) {
            $this->qtyremaining = $v;
            $this->modifiedColumns[PickSalesOrderDetailTableMap::COL_QTYREMAINING] = true;
        }

        return $this;
    } // setQtyremaining()

    /**
     * Set the value of [binnbr] column.
     *
     * @param string $v new value
     * @return $this|\PickSalesOrderDetail The current object (for fluent API support)
     */
    public function setBinnbr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->binnbr !== $v) {
            $this->binnbr = $v;
            $this->modifiedColumns[PickSalesOrderDetailTableMap::COL_BINNBR] = true;
        }

        return $this;
    } // setBinnbr()

    /**
     * Set the value of [caseqty] column.
     *
     * @param int $v new value
     * @return $this|\PickSalesOrderDetail The current object (for fluent API support)
     */
    public function setCaseqty($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->caseqty !== $v) {
            $this->caseqty = $v;
            $this->modifiedColumns[PickSalesOrderDetailTableMap::COL_CASEQTY] = true;
        }

        return $this;
    } // setCaseqty()

    /**
     * Set the value of [innerpack] column.
     *
     * @param int $v new value
     * @return $this|\PickSalesOrderDetail The current object (for fluent API support)
     */
    public function setInnerpack($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->innerpack !== $v) {
            $this->innerpack = $v;
            $this->modifiedColumns[PickSalesOrderDetailTableMap::COL_INNERPACK] = true;
        }

        return $this;
    } // setInnerpack()

    /**
     * Set the value of [binqty] column.
     *
     * @param int $v new value
     * @return $this|\PickSalesOrderDetail The current object (for fluent API support)
     */
    public function setBinqty($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->binqty !== $v) {
            $this->binqty = $v;
            $this->modifiedColumns[PickSalesOrderDetailTableMap::COL_BINQTY] = true;
        }

        return $this;
    } // setBinqty()

    /**
     * Set the value of [overbin1] column.
     *
     * @param string $v new value
     * @return $this|\PickSalesOrderDetail The current object (for fluent API support)
     */
    public function setOverbin1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->overbin1 !== $v) {
            $this->overbin1 = $v;
            $this->modifiedColumns[PickSalesOrderDetailTableMap::COL_OVERBIN1] = true;
        }

        return $this;
    } // setOverbin1()

    /**
     * Set the value of [overbinqty1] column.
     *
     * @param int $v new value
     * @return $this|\PickSalesOrderDetail The current object (for fluent API support)
     */
    public function setOverbinqty1($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->overbinqty1 !== $v) {
            $this->overbinqty1 = $v;
            $this->modifiedColumns[PickSalesOrderDetailTableMap::COL_OVERBINQTY1] = true;
        }

        return $this;
    } // setOverbinqty1()

    /**
     * Set the value of [overbin2] column.
     *
     * @param string $v new value
     * @return $this|\PickSalesOrderDetail The current object (for fluent API support)
     */
    public function setOverbin2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->overbin2 !== $v) {
            $this->overbin2 = $v;
            $this->modifiedColumns[PickSalesOrderDetailTableMap::COL_OVERBIN2] = true;
        }

        return $this;
    } // setOverbin2()

    /**
     * Set the value of [overbinqty2] column.
     *
     * @param int $v new value
     * @return $this|\PickSalesOrderDetail The current object (for fluent API support)
     */
    public function setOverbinqty2($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->overbinqty2 !== $v) {
            $this->overbinqty2 = $v;
            $this->modifiedColumns[PickSalesOrderDetailTableMap::COL_OVERBINQTY2] = true;
        }

        return $this;
    } // setOverbinqty2()

    /**
     * Set the value of [statusmsg] column.
     *
     * @param string $v new value
     * @return $this|\PickSalesOrderDetail The current object (for fluent API support)
     */
    public function setStatusmsg($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->statusmsg !== $v) {
            $this->statusmsg = $v;
            $this->modifiedColumns[PickSalesOrderDetailTableMap::COL_STATUSMSG] = true;
        }

        return $this;
    } // setStatusmsg()

    /**
     * Set the value of [dummy] column.
     *
     * @param string $v new value
     * @return $this|\PickSalesOrderDetail The current object (for fluent API support)
     */
    public function setDummy($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dummy !== $v) {
            $this->dummy = $v;
            $this->modifiedColumns[PickSalesOrderDetailTableMap::COL_DUMMY] = true;
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
            if ($this->sessionid !== '') {
                return false;
            }

            if ($this->recno !== 0) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : PickSalesOrderDetailTableMap::translateFieldName('Sessionid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sessionid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : PickSalesOrderDetailTableMap::translateFieldName('Recno', TableMap::TYPE_PHPNAME, $indexType)];
            $this->recno = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : PickSalesOrderDetailTableMap::translateFieldName('Date', TableMap::TYPE_PHPNAME, $indexType)];
            $this->date = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : PickSalesOrderDetailTableMap::translateFieldName('Time', TableMap::TYPE_PHPNAME, $indexType)];
            $this->time = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : PickSalesOrderDetailTableMap::translateFieldName('Ordernbr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ordernbr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : PickSalesOrderDetailTableMap::translateFieldName('Linenbr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->linenbr = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : PickSalesOrderDetailTableMap::translateFieldName('Sublinenbr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sublinenbr = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : PickSalesOrderDetailTableMap::translateFieldName('Itemnbr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->itemnbr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : PickSalesOrderDetailTableMap::translateFieldName('Itemdesc1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->itemdesc1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : PickSalesOrderDetailTableMap::translateFieldName('Itemdesc2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->itemdesc2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : PickSalesOrderDetailTableMap::translateFieldName('Qtyordered', TableMap::TYPE_PHPNAME, $indexType)];
            $this->qtyordered = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : PickSalesOrderDetailTableMap::translateFieldName('Qtypulled', TableMap::TYPE_PHPNAME, $indexType)];
            $this->qtypulled = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : PickSalesOrderDetailTableMap::translateFieldName('Qtyremaining', TableMap::TYPE_PHPNAME, $indexType)];
            $this->qtyremaining = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : PickSalesOrderDetailTableMap::translateFieldName('Binnbr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->binnbr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : PickSalesOrderDetailTableMap::translateFieldName('Caseqty', TableMap::TYPE_PHPNAME, $indexType)];
            $this->caseqty = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : PickSalesOrderDetailTableMap::translateFieldName('Innerpack', TableMap::TYPE_PHPNAME, $indexType)];
            $this->innerpack = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : PickSalesOrderDetailTableMap::translateFieldName('Binqty', TableMap::TYPE_PHPNAME, $indexType)];
            $this->binqty = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : PickSalesOrderDetailTableMap::translateFieldName('Overbin1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->overbin1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : PickSalesOrderDetailTableMap::translateFieldName('Overbinqty1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->overbinqty1 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : PickSalesOrderDetailTableMap::translateFieldName('Overbin2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->overbin2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : PickSalesOrderDetailTableMap::translateFieldName('Overbinqty2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->overbinqty2 = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : PickSalesOrderDetailTableMap::translateFieldName('Statusmsg', TableMap::TYPE_PHPNAME, $indexType)];
            $this->statusmsg = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : PickSalesOrderDetailTableMap::translateFieldName('Dummy', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dummy = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 23; // 23 = PickSalesOrderDetailTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\PickSalesOrderDetail'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(PickSalesOrderDetailTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildPickSalesOrderDetailQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see PickSalesOrderDetail::setDeleted()
     * @see PickSalesOrderDetail::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(PickSalesOrderDetailTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildPickSalesOrderDetailQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(PickSalesOrderDetailTableMap::DATABASE_NAME);
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
                PickSalesOrderDetailTableMap::addInstanceToPool($this);
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
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_SESSIONID)) {
            $modifiedColumns[':p' . $index++]  = 'sessionid';
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_RECNO)) {
            $modifiedColumns[':p' . $index++]  = 'recno';
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'date';
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'time';
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_ORDERNBR)) {
            $modifiedColumns[':p' . $index++]  = 'ordernbr';
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_LINENBR)) {
            $modifiedColumns[':p' . $index++]  = 'linenbr';
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_SUBLINENBR)) {
            $modifiedColumns[':p' . $index++]  = 'sublinenbr';
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_ITEMNBR)) {
            $modifiedColumns[':p' . $index++]  = 'itemnbr';
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_ITEMDESC1)) {
            $modifiedColumns[':p' . $index++]  = 'itemdesc1';
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_ITEMDESC2)) {
            $modifiedColumns[':p' . $index++]  = 'itemdesc2';
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_QTYORDERED)) {
            $modifiedColumns[':p' . $index++]  = 'qtyordered';
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_QTYPULLED)) {
            $modifiedColumns[':p' . $index++]  = 'qtypulled';
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_QTYREMAINING)) {
            $modifiedColumns[':p' . $index++]  = 'qtyremaining';
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_BINNBR)) {
            $modifiedColumns[':p' . $index++]  = 'binnbr';
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_CASEQTY)) {
            $modifiedColumns[':p' . $index++]  = 'caseqty';
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_INNERPACK)) {
            $modifiedColumns[':p' . $index++]  = 'innerpack';
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_BINQTY)) {
            $modifiedColumns[':p' . $index++]  = 'binqty';
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_OVERBIN1)) {
            $modifiedColumns[':p' . $index++]  = 'overbin1';
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_OVERBINQTY1)) {
            $modifiedColumns[':p' . $index++]  = 'overbinqty1';
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_OVERBIN2)) {
            $modifiedColumns[':p' . $index++]  = 'overbin2';
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_OVERBINQTY2)) {
            $modifiedColumns[':p' . $index++]  = 'overbinqty2';
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_STATUSMSG)) {
            $modifiedColumns[':p' . $index++]  = 'statusmsg';
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_DUMMY)) {
            $modifiedColumns[':p' . $index++]  = 'dummy';
        }

        $sql = sprintf(
            'INSERT INTO wmpickdet (%s) VALUES (%s)',
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
                    case 'recno':
                        $stmt->bindValue($identifier, $this->recno, PDO::PARAM_INT);
                        break;
                    case 'date':
                        $stmt->bindValue($identifier, $this->date, PDO::PARAM_INT);
                        break;
                    case 'time':
                        $stmt->bindValue($identifier, $this->time, PDO::PARAM_INT);
                        break;
                    case 'ordernbr':
                        $stmt->bindValue($identifier, $this->ordernbr, PDO::PARAM_STR);
                        break;
                    case 'linenbr':
                        $stmt->bindValue($identifier, $this->linenbr, PDO::PARAM_INT);
                        break;
                    case 'sublinenbr':
                        $stmt->bindValue($identifier, $this->sublinenbr, PDO::PARAM_INT);
                        break;
                    case 'itemnbr':
                        $stmt->bindValue($identifier, $this->itemnbr, PDO::PARAM_STR);
                        break;
                    case 'itemdesc1':
                        $stmt->bindValue($identifier, $this->itemdesc1, PDO::PARAM_STR);
                        break;
                    case 'itemdesc2':
                        $stmt->bindValue($identifier, $this->itemdesc2, PDO::PARAM_STR);
                        break;
                    case 'qtyordered':
                        $stmt->bindValue($identifier, $this->qtyordered, PDO::PARAM_INT);
                        break;
                    case 'qtypulled':
                        $stmt->bindValue($identifier, $this->qtypulled, PDO::PARAM_INT);
                        break;
                    case 'qtyremaining':
                        $stmt->bindValue($identifier, $this->qtyremaining, PDO::PARAM_INT);
                        break;
                    case 'binnbr':
                        $stmt->bindValue($identifier, $this->binnbr, PDO::PARAM_STR);
                        break;
                    case 'caseqty':
                        $stmt->bindValue($identifier, $this->caseqty, PDO::PARAM_INT);
                        break;
                    case 'innerpack':
                        $stmt->bindValue($identifier, $this->innerpack, PDO::PARAM_INT);
                        break;
                    case 'binqty':
                        $stmt->bindValue($identifier, $this->binqty, PDO::PARAM_INT);
                        break;
                    case 'overbin1':
                        $stmt->bindValue($identifier, $this->overbin1, PDO::PARAM_STR);
                        break;
                    case 'overbinqty1':
                        $stmt->bindValue($identifier, $this->overbinqty1, PDO::PARAM_INT);
                        break;
                    case 'overbin2':
                        $stmt->bindValue($identifier, $this->overbin2, PDO::PARAM_STR);
                        break;
                    case 'overbinqty2':
                        $stmt->bindValue($identifier, $this->overbinqty2, PDO::PARAM_INT);
                        break;
                    case 'statusmsg':
                        $stmt->bindValue($identifier, $this->statusmsg, PDO::PARAM_STR);
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
        $pos = PickSalesOrderDetailTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getSessionid();
                break;
            case 1:
                return $this->getRecno();
                break;
            case 2:
                return $this->getDate();
                break;
            case 3:
                return $this->getTime();
                break;
            case 4:
                return $this->getOrdernbr();
                break;
            case 5:
                return $this->getLinenbr();
                break;
            case 6:
                return $this->getSublinenbr();
                break;
            case 7:
                return $this->getItemnbr();
                break;
            case 8:
                return $this->getItemdesc1();
                break;
            case 9:
                return $this->getItemdesc2();
                break;
            case 10:
                return $this->getQtyordered();
                break;
            case 11:
                return $this->getQtypulled();
                break;
            case 12:
                return $this->getQtyremaining();
                break;
            case 13:
                return $this->getBinnbr();
                break;
            case 14:
                return $this->getCaseqty();
                break;
            case 15:
                return $this->getInnerpack();
                break;
            case 16:
                return $this->getBinqty();
                break;
            case 17:
                return $this->getOverbin1();
                break;
            case 18:
                return $this->getOverbinqty1();
                break;
            case 19:
                return $this->getOverbin2();
                break;
            case 20:
                return $this->getOverbinqty2();
                break;
            case 21:
                return $this->getStatusmsg();
                break;
            case 22:
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

        if (isset($alreadyDumpedObjects['PickSalesOrderDetail'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['PickSalesOrderDetail'][$this->hashCode()] = true;
        $keys = PickSalesOrderDetailTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getSessionid(),
            $keys[1] => $this->getRecno(),
            $keys[2] => $this->getDate(),
            $keys[3] => $this->getTime(),
            $keys[4] => $this->getOrdernbr(),
            $keys[5] => $this->getLinenbr(),
            $keys[6] => $this->getSublinenbr(),
            $keys[7] => $this->getItemnbr(),
            $keys[8] => $this->getItemdesc1(),
            $keys[9] => $this->getItemdesc2(),
            $keys[10] => $this->getQtyordered(),
            $keys[11] => $this->getQtypulled(),
            $keys[12] => $this->getQtyremaining(),
            $keys[13] => $this->getBinnbr(),
            $keys[14] => $this->getCaseqty(),
            $keys[15] => $this->getInnerpack(),
            $keys[16] => $this->getBinqty(),
            $keys[17] => $this->getOverbin1(),
            $keys[18] => $this->getOverbinqty1(),
            $keys[19] => $this->getOverbin2(),
            $keys[20] => $this->getOverbinqty2(),
            $keys[21] => $this->getStatusmsg(),
            $keys[22] => $this->getDummy(),
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
     * @return $this|\PickSalesOrderDetail
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = PickSalesOrderDetailTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\PickSalesOrderDetail
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setSessionid($value);
                break;
            case 1:
                $this->setRecno($value);
                break;
            case 2:
                $this->setDate($value);
                break;
            case 3:
                $this->setTime($value);
                break;
            case 4:
                $this->setOrdernbr($value);
                break;
            case 5:
                $this->setLinenbr($value);
                break;
            case 6:
                $this->setSublinenbr($value);
                break;
            case 7:
                $this->setItemnbr($value);
                break;
            case 8:
                $this->setItemdesc1($value);
                break;
            case 9:
                $this->setItemdesc2($value);
                break;
            case 10:
                $this->setQtyordered($value);
                break;
            case 11:
                $this->setQtypulled($value);
                break;
            case 12:
                $this->setQtyremaining($value);
                break;
            case 13:
                $this->setBinnbr($value);
                break;
            case 14:
                $this->setCaseqty($value);
                break;
            case 15:
                $this->setInnerpack($value);
                break;
            case 16:
                $this->setBinqty($value);
                break;
            case 17:
                $this->setOverbin1($value);
                break;
            case 18:
                $this->setOverbinqty1($value);
                break;
            case 19:
                $this->setOverbin2($value);
                break;
            case 20:
                $this->setOverbinqty2($value);
                break;
            case 21:
                $this->setStatusmsg($value);
                break;
            case 22:
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
        $keys = PickSalesOrderDetailTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setSessionid($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setRecno($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setDate($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setTime($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setOrdernbr($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setLinenbr($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setSublinenbr($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setItemnbr($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setItemdesc1($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setItemdesc2($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setQtyordered($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setQtypulled($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setQtyremaining($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setBinnbr($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setCaseqty($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setInnerpack($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setBinqty($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setOverbin1($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setOverbinqty1($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setOverbin2($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setOverbinqty2($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setStatusmsg($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setDummy($arr[$keys[22]]);
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
     * @return $this|\PickSalesOrderDetail The current object, for fluid interface
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
        $criteria = new Criteria(PickSalesOrderDetailTableMap::DATABASE_NAME);

        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_SESSIONID)) {
            $criteria->add(PickSalesOrderDetailTableMap::COL_SESSIONID, $this->sessionid);
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_RECNO)) {
            $criteria->add(PickSalesOrderDetailTableMap::COL_RECNO, $this->recno);
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_DATE)) {
            $criteria->add(PickSalesOrderDetailTableMap::COL_DATE, $this->date);
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_TIME)) {
            $criteria->add(PickSalesOrderDetailTableMap::COL_TIME, $this->time);
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_ORDERNBR)) {
            $criteria->add(PickSalesOrderDetailTableMap::COL_ORDERNBR, $this->ordernbr);
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_LINENBR)) {
            $criteria->add(PickSalesOrderDetailTableMap::COL_LINENBR, $this->linenbr);
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_SUBLINENBR)) {
            $criteria->add(PickSalesOrderDetailTableMap::COL_SUBLINENBR, $this->sublinenbr);
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_ITEMNBR)) {
            $criteria->add(PickSalesOrderDetailTableMap::COL_ITEMNBR, $this->itemnbr);
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_ITEMDESC1)) {
            $criteria->add(PickSalesOrderDetailTableMap::COL_ITEMDESC1, $this->itemdesc1);
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_ITEMDESC2)) {
            $criteria->add(PickSalesOrderDetailTableMap::COL_ITEMDESC2, $this->itemdesc2);
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_QTYORDERED)) {
            $criteria->add(PickSalesOrderDetailTableMap::COL_QTYORDERED, $this->qtyordered);
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_QTYPULLED)) {
            $criteria->add(PickSalesOrderDetailTableMap::COL_QTYPULLED, $this->qtypulled);
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_QTYREMAINING)) {
            $criteria->add(PickSalesOrderDetailTableMap::COL_QTYREMAINING, $this->qtyremaining);
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_BINNBR)) {
            $criteria->add(PickSalesOrderDetailTableMap::COL_BINNBR, $this->binnbr);
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_CASEQTY)) {
            $criteria->add(PickSalesOrderDetailTableMap::COL_CASEQTY, $this->caseqty);
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_INNERPACK)) {
            $criteria->add(PickSalesOrderDetailTableMap::COL_INNERPACK, $this->innerpack);
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_BINQTY)) {
            $criteria->add(PickSalesOrderDetailTableMap::COL_BINQTY, $this->binqty);
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_OVERBIN1)) {
            $criteria->add(PickSalesOrderDetailTableMap::COL_OVERBIN1, $this->overbin1);
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_OVERBINQTY1)) {
            $criteria->add(PickSalesOrderDetailTableMap::COL_OVERBINQTY1, $this->overbinqty1);
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_OVERBIN2)) {
            $criteria->add(PickSalesOrderDetailTableMap::COL_OVERBIN2, $this->overbin2);
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_OVERBINQTY2)) {
            $criteria->add(PickSalesOrderDetailTableMap::COL_OVERBINQTY2, $this->overbinqty2);
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_STATUSMSG)) {
            $criteria->add(PickSalesOrderDetailTableMap::COL_STATUSMSG, $this->statusmsg);
        }
        if ($this->isColumnModified(PickSalesOrderDetailTableMap::COL_DUMMY)) {
            $criteria->add(PickSalesOrderDetailTableMap::COL_DUMMY, $this->dummy);
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
        $criteria = ChildPickSalesOrderDetailQuery::create();
        $criteria->add(PickSalesOrderDetailTableMap::COL_SESSIONID, $this->sessionid);
        $criteria->add(PickSalesOrderDetailTableMap::COL_RECNO, $this->recno);

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
        $validPk = null !== $this->getSessionid() &&
            null !== $this->getRecno();

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
        $pks[0] = $this->getSessionid();
        $pks[1] = $this->getRecno();

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
        $this->setSessionid($keys[0]);
        $this->setRecno($keys[1]);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return (null === $this->getSessionid()) && (null === $this->getRecno());
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \PickSalesOrderDetail (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSessionid($this->getSessionid());
        $copyObj->setRecno($this->getRecno());
        $copyObj->setDate($this->getDate());
        $copyObj->setTime($this->getTime());
        $copyObj->setOrdernbr($this->getOrdernbr());
        $copyObj->setLinenbr($this->getLinenbr());
        $copyObj->setSublinenbr($this->getSublinenbr());
        $copyObj->setItemnbr($this->getItemnbr());
        $copyObj->setItemdesc1($this->getItemdesc1());
        $copyObj->setItemdesc2($this->getItemdesc2());
        $copyObj->setQtyordered($this->getQtyordered());
        $copyObj->setQtypulled($this->getQtypulled());
        $copyObj->setQtyremaining($this->getQtyremaining());
        $copyObj->setBinnbr($this->getBinnbr());
        $copyObj->setCaseqty($this->getCaseqty());
        $copyObj->setInnerpack($this->getInnerpack());
        $copyObj->setBinqty($this->getBinqty());
        $copyObj->setOverbin1($this->getOverbin1());
        $copyObj->setOverbinqty1($this->getOverbinqty1());
        $copyObj->setOverbin2($this->getOverbin2());
        $copyObj->setOverbinqty2($this->getOverbinqty2());
        $copyObj->setStatusmsg($this->getStatusmsg());
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
     * @return \PickSalesOrderDetail Clone of current object.
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
        $this->sessionid = null;
        $this->recno = null;
        $this->date = null;
        $this->time = null;
        $this->ordernbr = null;
        $this->linenbr = null;
        $this->sublinenbr = null;
        $this->itemnbr = null;
        $this->itemdesc1 = null;
        $this->itemdesc2 = null;
        $this->qtyordered = null;
        $this->qtypulled = null;
        $this->qtyremaining = null;
        $this->binnbr = null;
        $this->caseqty = null;
        $this->innerpack = null;
        $this->binqty = null;
        $this->overbin1 = null;
        $this->overbinqty1 = null;
        $this->overbin2 = null;
        $this->overbinqty2 = null;
        $this->statusmsg = null;
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
        return (string) $this->exportTo(PickSalesOrderDetailTableMap::DEFAULT_STRING_FORMAT);
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
