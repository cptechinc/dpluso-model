<?php

namespace Base;

use \OeHistQuery as ChildOeHistQuery;
use \Exception;
use \PDO;
use Map\OeHistTableMap;
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
 * Base class that represents a row from the 'oe_hist' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class OeHist implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\OeHistTableMap';


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
     * The value for the orderno field.
     *
     * @var        int
     */
    protected $orderno;

    /**
     * The value for the status field.
     *
     * @var        string
     */
    protected $status;

    /**
     * The value for the holdstatus field.
     *
     * @var        string
     */
    protected $holdstatus;

    /**
     * The value for the custid field.
     *
     * @var        string
     */
    protected $custid;

    /**
     * The value for the shiptoid field.
     *
     * @var        string
     */
    protected $shiptoid;

    /**
     * The value for the shipto_name field.
     *
     * @var        string
     */
    protected $shipto_name;

    /**
     * The value for the shipto_address1 field.
     *
     * @var        string
     */
    protected $shipto_address1;

    /**
     * The value for the shipto_address2 field.
     *
     * @var        string
     */
    protected $shipto_address2;

    /**
     * The value for the shipto_address3 field.
     *
     * @var        string
     */
    protected $shipto_address3;

    /**
     * The value for the shipto_address4 field.
     *
     * @var        string
     */
    protected $shipto_address4;

    /**
     * The value for the shipto_city field.
     *
     * @var        string
     */
    protected $shipto_city;

    /**
     * The value for the shipto_state field.
     *
     * @var        string
     */
    protected $shipto_state;

    /**
     * The value for the shipto_zip field.
     *
     * @var        string
     */
    protected $shipto_zip;

    /**
     * The value for the custpo field.
     *
     * @var        string
     */
    protected $custpo;

    /**
     * The value for the orderdate field.
     *
     * @var        int
     */
    protected $orderdate;

    /**
     * The value for the termcode field.
     *
     * @var        string
     */
    protected $termcode;

    /**
     * The value for the shipviacode field.
     *
     * @var        string
     */
    protected $shipviacode;

    /**
     * The value for the invoice_number field.
     *
     * @var        int
     */
    protected $invoice_number;

    /**
     * The value for the invoice_date field.
     *
     * @var        int
     */
    protected $invoice_date;

    /**
     * The value for the genledger_period field.
     *
     * @var        int
     */
    protected $genledger_period;

    /**
     * The value for the salesperson_1 field.
     *
     * @var        string
     */
    protected $salesperson_1;

    /**
     * The value for the salesperson_1pct field.
     *
     * @var        string
     */
    protected $salesperson_1pct;

    /**
     * The value for the salesperson_2 field.
     *
     * @var        string
     */
    protected $salesperson_2;

    /**
     * The value for the salesperson_2pct field.
     *
     * @var        string
     */
    protected $salesperson_2pct;

    /**
     * The value for the salesperson_3 field.
     *
     * @var        string
     */
    protected $salesperson_3;

    /**
     * The value for the salesperson_3pct field.
     *
     * @var        string
     */
    protected $salesperson_3pct;

    /**
     * The value for the contract_nbr field.
     *
     * @var        int
     */
    protected $contract_nbr;

    /**
     * The value for the batch_nbr field.
     *
     * @var        int
     */
    protected $batch_nbr;

    /**
     * The value for the dropreleasehold field.
     *
     * @var        string
     */
    protected $dropreleasehold;

    /**
     * The value for the subtotal_tax field.
     *
     * @var        string
     */
    protected $subtotal_tax;

    /**
     * The value for the subtotal_nontax field.
     *
     * @var        string
     */
    protected $subtotal_nontax;

    /**
     * The value for the total_tax field.
     *
     * @var        string
     */
    protected $total_tax;

    /**
     * The value for the total_freight field.
     *
     * @var        string
     */
    protected $total_freight;

    /**
     * The value for the total_misc field.
     *
     * @var        string
     */
    protected $total_misc;

    /**
     * The value for the total_order field.
     *
     * @var        string
     */
    protected $total_order;

    /**
     * The value for the total_cost field.
     *
     * @var        string
     */
    protected $total_cost;

    /**
     * The value for the lock field.
     *
     * @var        string
     */
    protected $lock;

    /**
     * The value for the taken_date field.
     *
     * @var        int
     */
    protected $taken_date;

    /**
     * The value for the taken_time field.
     *
     * @var        int
     */
    protected $taken_time;

    /**
     * The value for the pick_date field.
     *
     * @var        int
     */
    protected $pick_date;

    /**
     * The value for the pick_time field.
     *
     * @var        int
     */
    protected $pick_time;

    /**
     * The value for the pack_date field.
     *
     * @var        int
     */
    protected $pack_date;

    /**
     * The value for the pack_time field.
     *
     * @var        int
     */
    protected $pack_time;

    /**
     * The value for the verify_date field.
     *
     * @var        int
     */
    protected $verify_date;

    /**
     * The value for the verify_time field.
     *
     * @var        int
     */
    protected $verify_time;

    /**
     * The value for the creditmemo field.
     *
     * @var        string
     */
    protected $creditmemo;

    /**
     * The value for the booked field.
     *
     * @var        string
     */
    protected $booked;

    /**
     * The value for the original_whse field.
     *
     * @var        string
     */
    protected $original_whse;

    /**
     * The value for the billto_state field.
     *
     * @var        string
     */
    protected $billto_state;

    /**
     * The value for the shipcomplete field.
     *
     * @var        string
     */
    protected $shipcomplete;

    /**
     * The value for the cwo_flag field.
     *
     * @var        string
     */
    protected $cwo_flag;

    /**
     * The value for the division field.
     *
     * @var        string
     */
    protected $division;

    /**
     * The value for the taken_code field.
     *
     * @var        string
     */
    protected $taken_code;

    /**
     * The value for the pack_code field.
     *
     * @var        string
     */
    protected $pack_code;

    /**
     * The value for the pick_code field.
     *
     * @var        string
     */
    protected $pick_code;

    /**
     * The value for the verify_code field.
     *
     * @var        string
     */
    protected $verify_code;

    /**
     * The value for the total_discount field.
     *
     * @var        string
     */
    protected $total_discount;

    /**
     * The value for the edi_refererencenbr field.
     *
     * @var        string
     */
    protected $edi_refererencenbr;

    /**
     * The value for the user_code1 field.
     *
     * @var        string
     */
    protected $user_code1;

    /**
     * The value for the user_code2 field.
     *
     * @var        string
     */
    protected $user_code2;

    /**
     * The value for the user_code3 field.
     *
     * @var        string
     */
    protected $user_code3;

    /**
     * The value for the user_code4 field.
     *
     * @var        string
     */
    protected $user_code4;

    /**
     * The value for the exchange_country field.
     *
     * @var        string
     */
    protected $exchange_country;

    /**
     * The value for the exchange_rate field.
     *
     * @var        string
     */
    protected $exchange_rate;

    /**
     * The value for the weight_total field.
     *
     * @var        string
     */
    protected $weight_total;

    /**
     * The value for the weight_override field.
     *
     * @var        string
     */
    protected $weight_override;

    /**
     * The value for the box_count field.
     *
     * @var        int
     */
    protected $box_count;

    /**
     * The value for the request_date field.
     *
     * @var        int
     */
    protected $request_date;

    /**
     * The value for the cancel_date field.
     *
     * @var        int
     */
    protected $cancel_date;

    /**
     * The value for the lockedby field.
     *
     * @var        string
     */
    protected $lockedby;

    /**
     * The value for the release_number field.
     *
     * @var        string
     */
    protected $release_number;

    /**
     * The value for the whse field.
     *
     * @var        string
     */
    protected $whse;

    /**
     * The value for the backorder_date field.
     *
     * @var        int
     */
    protected $backorder_date;

    /**
     * The value for the deptcode field.
     *
     * @var        string
     */
    protected $deptcode;

    /**
     * The value for the freight_in_entered field.
     *
     * @var        string
     */
    protected $freight_in_entered;

    /**
     * The value for the dropship_entered field.
     *
     * @var        string
     */
    protected $dropship_entered;

    /**
     * The value for the er_flag field.
     *
     * @var        string
     */
    protected $er_flag;

    /**
     * The value for the freight_in field.
     *
     * @var        string
     */
    protected $freight_in;

    /**
     * The value for the dropship field.
     *
     * @var        string
     */
    protected $dropship;

    /**
     * The value for the minorder field.
     *
     * @var        string
     */
    protected $minorder;

    /**
     * The value for the contract_terms field.
     *
     * @var        string
     */
    protected $contract_terms;

    /**
     * The value for the dropship_billed field.
     *
     * @var        string
     */
    protected $dropship_billed;

    /**
     * The value for the order_type field.
     *
     * @var        string
     */
    protected $order_type;

    /**
     * The value for the tracking_edinumber field.
     *
     * @var        string
     */
    protected $tracking_edinumber;

    /**
     * The value for the source field.
     *
     * @var        string
     */
    protected $source;

    /**
     * The value for the pick_format field.
     *
     * @var        string
     */
    protected $pick_format;

    /**
     * The value for the invoice_format field.
     *
     * @var        string
     */
    protected $invoice_format;

    /**
     * The value for the cash_amount field.
     *
     * @var        string
     */
    protected $cash_amount;

    /**
     * The value for the check_amount field.
     *
     * @var        string
     */
    protected $check_amount;

    /**
     * The value for the check_number field.
     *
     * @var        string
     */
    protected $check_number;

    /**
     * The value for the deposit_amount field.
     *
     * @var        string
     */
    protected $deposit_amount;

    /**
     * The value for the deposit_number field.
     *
     * @var        string
     */
    protected $deposit_number;

    /**
     * The value for the original_subtotal_tax field.
     *
     * @var        string
     */
    protected $original_subtotal_tax;

    /**
     * The value for the original_subtotal_nontax field.
     *
     * @var        string
     */
    protected $original_subtotal_nontax;

    /**
     * The value for the original_total_tax field.
     *
     * @var        string
     */
    protected $original_total_tax;

    /**
     * The value for the original_total field.
     *
     * @var        string
     */
    protected $original_total;

    /**
     * The value for the pick_printdate field.
     *
     * @var        int
     */
    protected $pick_printdate;

    /**
     * The value for the pick_printtime field.
     *
     * @var        int
     */
    protected $pick_printtime;

    /**
     * The value for the contact field.
     *
     * @var        string
     */
    protected $contact;

    /**
     * The value for the phone_intl field.
     *
     * @var        string
     */
    protected $phone_intl;

    /**
     * The value for the phone_accesscode field.
     *
     * @var        string
     */
    protected $phone_accesscode;

    /**
     * The value for the phone_countrycode field.
     *
     * @var        string
     */
    protected $phone_countrycode;

    /**
     * The value for the phone field.
     *
     * @var        string
     */
    protected $phone;

    /**
     * The value for the phone_ext field.
     *
     * @var        string
     */
    protected $phone_ext;

    /**
     * The value for the fax_intl field.
     *
     * @var        string
     */
    protected $fax_intl;

    /**
     * The value for the fax_accesscode field.
     *
     * @var        string
     */
    protected $fax_accesscode;

    /**
     * The value for the fax_countrycode field.
     *
     * @var        string
     */
    protected $fax_countrycode;

    /**
     * The value for the fax field.
     *
     * @var        string
     */
    protected $fax;

    /**
     * The value for the ship_account field.
     *
     * @var        string
     */
    protected $ship_account;

    /**
     * The value for the change_due field.
     *
     * @var        string
     */
    protected $change_due;

    /**
     * The value for the discount_additional field.
     *
     * @var        string
     */
    protected $discount_additional;

    /**
     * The value for the all_ship field.
     *
     * @var        string
     */
    protected $all_ship;

    /**
     * The value for the credit_applied field.
     *
     * @var        string
     */
    protected $credit_applied;

    /**
     * The value for the invoice_printdate field.
     *
     * @var        int
     */
    protected $invoice_printdate;

    /**
     * The value for the invoice_printtime field.
     *
     * @var        int
     */
    protected $invoice_printtime;

    /**
     * The value for the discount_freight field.
     *
     * @var        string
     */
    protected $discount_freight;

    /**
     * The value for the ship_completeoverride field.
     *
     * @var        string
     */
    protected $ship_completeoverride;

    /**
     * The value for the contact_email field.
     *
     * @var        string
     */
    protected $contact_email;

    /**
     * The value for the manual_freight field.
     *
     * @var        string
     */
    protected $manual_freight;

    /**
     * The value for the internal_freight field.
     *
     * @var        string
     */
    protected $internal_freight;

    /**
     * The value for the cost_freight field.
     *
     * @var        string
     */
    protected $cost_freight;

    /**
     * The value for the route field.
     *
     * @var        string
     */
    protected $route;

    /**
     * The value for the route_seq field.
     *
     * @var        int
     */
    protected $route_seq;

    /**
     * The value for the edi_855sent field.
     *
     * @var        string
     */
    protected $edi_855sent;

    /**
     * The value for the freight_3rdparty field.
     *
     * @var        string
     */
    protected $freight_3rdparty;

    /**
     * The value for the fob field.
     *
     * @var        string
     */
    protected $fob;

    /**
     * The value for the confirm_image field.
     *
     * @var        string
     */
    protected $confirm_image;

    /**
     * The value for the cstk_consign field.
     *
     * @var        string
     */
    protected $cstk_consign;

    /**
     * The value for the manufacturer field.
     *
     * @var        string
     */
    protected $manufacturer;

    /**
     * The value for the pick_queue field.
     *
     * @var        string
     */
    protected $pick_queue;

    /**
     * The value for the arrive_date field.
     *
     * @var        int
     */
    protected $arrive_date;

    /**
     * The value for the surcharge_status field.
     *
     * @var        string
     */
    protected $surcharge_status;

    /**
     * The value for the freight_group field.
     *
     * @var        string
     */
    protected $freight_group;

    /**
     * The value for the comm_override field.
     *
     * @var        string
     */
    protected $comm_override;

    /**
     * The value for the charge_split field.
     *
     * @var        string
     */
    protected $charge_split;

    /**
     * The value for the creditcart_approved field.
     *
     * @var        string
     */
    protected $creditcart_approved;

    /**
     * The value for the original_ordernumber field.
     *
     * @var        string
     */
    protected $original_ordernumber;

    /**
     * The value for the has_notes field.
     *
     * @var        string
     */
    protected $has_notes;

    /**
     * The value for the has_documents field.
     *
     * @var        string
     */
    protected $has_documents;

    /**
     * The value for the has_tracking field.
     *
     * @var        string
     */
    protected $has_tracking;

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
     * Initializes internal state of Base\OeHist object.
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
     * Compares this with another <code>OeHist</code> instance.  If
     * <code>obj</code> is an instance of <code>OeHist</code>, delegates to
     * <code>equals(OeHist)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|OeHist The current object, for fluid interface
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
     * Get the [orderno] column value.
     *
     * @return int
     */
    public function getOrderno()
    {
        return $this->orderno;
    }

    /**
     * Get the [status] column value.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the [holdstatus] column value.
     *
     * @return string
     */
    public function getHoldstatus()
    {
        return $this->holdstatus;
    }

    /**
     * Get the [custid] column value.
     *
     * @return string
     */
    public function getCustid()
    {
        return $this->custid;
    }

    /**
     * Get the [shiptoid] column value.
     *
     * @return string
     */
    public function getShiptoid()
    {
        return $this->shiptoid;
    }

    /**
     * Get the [shipto_name] column value.
     *
     * @return string
     */
    public function getShiptoName()
    {
        return $this->shipto_name;
    }

    /**
     * Get the [shipto_address1] column value.
     *
     * @return string
     */
    public function getShiptoAddress1()
    {
        return $this->shipto_address1;
    }

    /**
     * Get the [shipto_address2] column value.
     *
     * @return string
     */
    public function getShiptoAddress2()
    {
        return $this->shipto_address2;
    }

    /**
     * Get the [shipto_address3] column value.
     *
     * @return string
     */
    public function getShiptoAddress3()
    {
        return $this->shipto_address3;
    }

    /**
     * Get the [shipto_address4] column value.
     *
     * @return string
     */
    public function getShiptoAddress4()
    {
        return $this->shipto_address4;
    }

    /**
     * Get the [shipto_city] column value.
     *
     * @return string
     */
    public function getShiptoCity()
    {
        return $this->shipto_city;
    }

    /**
     * Get the [shipto_state] column value.
     *
     * @return string
     */
    public function getShiptoState()
    {
        return $this->shipto_state;
    }

    /**
     * Get the [shipto_zip] column value.
     *
     * @return string
     */
    public function getShiptoZip()
    {
        return $this->shipto_zip;
    }

    /**
     * Get the [custpo] column value.
     *
     * @return string
     */
    public function getCustpo()
    {
        return $this->custpo;
    }

    /**
     * Get the [orderdate] column value.
     *
     * @return int
     */
    public function getOrderdate()
    {
        return $this->orderdate;
    }

    /**
     * Get the [termcode] column value.
     *
     * @return string
     */
    public function getTermcode()
    {
        return $this->termcode;
    }

    /**
     * Get the [shipviacode] column value.
     *
     * @return string
     */
    public function getShipviacode()
    {
        return $this->shipviacode;
    }

    /**
     * Get the [invoice_number] column value.
     *
     * @return int
     */
    public function getInvoiceNumber()
    {
        return $this->invoice_number;
    }

    /**
     * Get the [invoice_date] column value.
     *
     * @return int
     */
    public function getInvoiceDate()
    {
        return $this->invoice_date;
    }

    /**
     * Get the [genledger_period] column value.
     *
     * @return int
     */
    public function getGenledgerPeriod()
    {
        return $this->genledger_period;
    }

    /**
     * Get the [salesperson_1] column value.
     *
     * @return string
     */
    public function getSalesperson1()
    {
        return $this->salesperson_1;
    }

    /**
     * Get the [salesperson_1pct] column value.
     *
     * @return string
     */
    public function getSalesperson1pct()
    {
        return $this->salesperson_1pct;
    }

    /**
     * Get the [salesperson_2] column value.
     *
     * @return string
     */
    public function getSalesperson2()
    {
        return $this->salesperson_2;
    }

    /**
     * Get the [salesperson_2pct] column value.
     *
     * @return string
     */
    public function getSalesperson2pct()
    {
        return $this->salesperson_2pct;
    }

    /**
     * Get the [salesperson_3] column value.
     *
     * @return string
     */
    public function getSalesperson3()
    {
        return $this->salesperson_3;
    }

    /**
     * Get the [salesperson_3pct] column value.
     *
     * @return string
     */
    public function getSalesperson3pct()
    {
        return $this->salesperson_3pct;
    }

    /**
     * Get the [contract_nbr] column value.
     *
     * @return int
     */
    public function getContractNbr()
    {
        return $this->contract_nbr;
    }

    /**
     * Get the [batch_nbr] column value.
     *
     * @return int
     */
    public function getBatchNbr()
    {
        return $this->batch_nbr;
    }

    /**
     * Get the [dropreleasehold] column value.
     *
     * @return string
     */
    public function getDropreleasehold()
    {
        return $this->dropreleasehold;
    }

    /**
     * Get the [subtotal_tax] column value.
     *
     * @return string
     */
    public function getSubtotalTax()
    {
        return $this->subtotal_tax;
    }

    /**
     * Get the [subtotal_nontax] column value.
     *
     * @return string
     */
    public function getSubtotalNontax()
    {
        return $this->subtotal_nontax;
    }

    /**
     * Get the [total_tax] column value.
     *
     * @return string
     */
    public function getTotalTax()
    {
        return $this->total_tax;
    }

    /**
     * Get the [total_freight] column value.
     *
     * @return string
     */
    public function getTotalFreight()
    {
        return $this->total_freight;
    }

    /**
     * Get the [total_misc] column value.
     *
     * @return string
     */
    public function getTotalMisc()
    {
        return $this->total_misc;
    }

    /**
     * Get the [total_order] column value.
     *
     * @return string
     */
    public function getTotalOrder()
    {
        return $this->total_order;
    }

    /**
     * Get the [total_cost] column value.
     *
     * @return string
     */
    public function getTotalCost()
    {
        return $this->total_cost;
    }

    /**
     * Get the [lock] column value.
     *
     * @return string
     */
    public function getLock()
    {
        return $this->lock;
    }

    /**
     * Get the [taken_date] column value.
     *
     * @return int
     */
    public function getTakenDate()
    {
        return $this->taken_date;
    }

    /**
     * Get the [taken_time] column value.
     *
     * @return int
     */
    public function getTakenTime()
    {
        return $this->taken_time;
    }

    /**
     * Get the [pick_date] column value.
     *
     * @return int
     */
    public function getPickDate()
    {
        return $this->pick_date;
    }

    /**
     * Get the [pick_time] column value.
     *
     * @return int
     */
    public function getPickTime()
    {
        return $this->pick_time;
    }

    /**
     * Get the [pack_date] column value.
     *
     * @return int
     */
    public function getPackDate()
    {
        return $this->pack_date;
    }

    /**
     * Get the [pack_time] column value.
     *
     * @return int
     */
    public function getPackTime()
    {
        return $this->pack_time;
    }

    /**
     * Get the [verify_date] column value.
     *
     * @return int
     */
    public function getVerifyDate()
    {
        return $this->verify_date;
    }

    /**
     * Get the [verify_time] column value.
     *
     * @return int
     */
    public function getVerifyTime()
    {
        return $this->verify_time;
    }

    /**
     * Get the [creditmemo] column value.
     *
     * @return string
     */
    public function getCreditmemo()
    {
        return $this->creditmemo;
    }

    /**
     * Get the [booked] column value.
     *
     * @return string
     */
    public function getBooked()
    {
        return $this->booked;
    }

    /**
     * Get the [original_whse] column value.
     *
     * @return string
     */
    public function getOriginalWhse()
    {
        return $this->original_whse;
    }

    /**
     * Get the [billto_state] column value.
     *
     * @return string
     */
    public function getBilltoState()
    {
        return $this->billto_state;
    }

    /**
     * Get the [shipcomplete] column value.
     *
     * @return string
     */
    public function getShipcomplete()
    {
        return $this->shipcomplete;
    }

    /**
     * Get the [cwo_flag] column value.
     *
     * @return string
     */
    public function getCwoFlag()
    {
        return $this->cwo_flag;
    }

    /**
     * Get the [division] column value.
     *
     * @return string
     */
    public function getDivision()
    {
        return $this->division;
    }

    /**
     * Get the [taken_code] column value.
     *
     * @return string
     */
    public function getTakenCode()
    {
        return $this->taken_code;
    }

    /**
     * Get the [pack_code] column value.
     *
     * @return string
     */
    public function getPackCode()
    {
        return $this->pack_code;
    }

    /**
     * Get the [pick_code] column value.
     *
     * @return string
     */
    public function getPickCode()
    {
        return $this->pick_code;
    }

    /**
     * Get the [verify_code] column value.
     *
     * @return string
     */
    public function getVerifyCode()
    {
        return $this->verify_code;
    }

    /**
     * Get the [total_discount] column value.
     *
     * @return string
     */
    public function getTotalDiscount()
    {
        return $this->total_discount;
    }

    /**
     * Get the [edi_refererencenbr] column value.
     *
     * @return string
     */
    public function getEdiRefererencenbr()
    {
        return $this->edi_refererencenbr;
    }

    /**
     * Get the [user_code1] column value.
     *
     * @return string
     */
    public function getUserCode1()
    {
        return $this->user_code1;
    }

    /**
     * Get the [user_code2] column value.
     *
     * @return string
     */
    public function getUserCode2()
    {
        return $this->user_code2;
    }

    /**
     * Get the [user_code3] column value.
     *
     * @return string
     */
    public function getUserCode3()
    {
        return $this->user_code3;
    }

    /**
     * Get the [user_code4] column value.
     *
     * @return string
     */
    public function getUserCode4()
    {
        return $this->user_code4;
    }

    /**
     * Get the [exchange_country] column value.
     *
     * @return string
     */
    public function getExchangeCountry()
    {
        return $this->exchange_country;
    }

    /**
     * Get the [exchange_rate] column value.
     *
     * @return string
     */
    public function getExchangeRate()
    {
        return $this->exchange_rate;
    }

    /**
     * Get the [weight_total] column value.
     *
     * @return string
     */
    public function getWeightTotal()
    {
        return $this->weight_total;
    }

    /**
     * Get the [weight_override] column value.
     *
     * @return string
     */
    public function getWeightOverride()
    {
        return $this->weight_override;
    }

    /**
     * Get the [box_count] column value.
     *
     * @return int
     */
    public function getBoxCount()
    {
        return $this->box_count;
    }

    /**
     * Get the [request_date] column value.
     *
     * @return int
     */
    public function getRequestDate()
    {
        return $this->request_date;
    }

    /**
     * Get the [cancel_date] column value.
     *
     * @return int
     */
    public function getCancelDate()
    {
        return $this->cancel_date;
    }

    /**
     * Get the [lockedby] column value.
     *
     * @return string
     */
    public function getLockedby()
    {
        return $this->lockedby;
    }

    /**
     * Get the [release_number] column value.
     *
     * @return string
     */
    public function getReleaseNumber()
    {
        return $this->release_number;
    }

    /**
     * Get the [whse] column value.
     *
     * @return string
     */
    public function getWhse()
    {
        return $this->whse;
    }

    /**
     * Get the [backorder_date] column value.
     *
     * @return int
     */
    public function getBackorderDate()
    {
        return $this->backorder_date;
    }

    /**
     * Get the [deptcode] column value.
     *
     * @return string
     */
    public function getDeptcode()
    {
        return $this->deptcode;
    }

    /**
     * Get the [freight_in_entered] column value.
     *
     * @return string
     */
    public function getFreightInEntered()
    {
        return $this->freight_in_entered;
    }

    /**
     * Get the [dropship_entered] column value.
     *
     * @return string
     */
    public function getDropshipEntered()
    {
        return $this->dropship_entered;
    }

    /**
     * Get the [er_flag] column value.
     *
     * @return string
     */
    public function getErFlag()
    {
        return $this->er_flag;
    }

    /**
     * Get the [freight_in] column value.
     *
     * @return string
     */
    public function getFreightIn()
    {
        return $this->freight_in;
    }

    /**
     * Get the [dropship] column value.
     *
     * @return string
     */
    public function getDropship()
    {
        return $this->dropship;
    }

    /**
     * Get the [minorder] column value.
     *
     * @return string
     */
    public function getMinorder()
    {
        return $this->minorder;
    }

    /**
     * Get the [contract_terms] column value.
     *
     * @return string
     */
    public function getContractTerms()
    {
        return $this->contract_terms;
    }

    /**
     * Get the [dropship_billed] column value.
     *
     * @return string
     */
    public function getDropshipBilled()
    {
        return $this->dropship_billed;
    }

    /**
     * Get the [order_type] column value.
     *
     * @return string
     */
    public function getOrderType()
    {
        return $this->order_type;
    }

    /**
     * Get the [tracking_edinumber] column value.
     *
     * @return string
     */
    public function getTrackingEdinumber()
    {
        return $this->tracking_edinumber;
    }

    /**
     * Get the [source] column value.
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Get the [pick_format] column value.
     *
     * @return string
     */
    public function getPickFormat()
    {
        return $this->pick_format;
    }

    /**
     * Get the [invoice_format] column value.
     *
     * @return string
     */
    public function getInvoiceFormat()
    {
        return $this->invoice_format;
    }

    /**
     * Get the [cash_amount] column value.
     *
     * @return string
     */
    public function getCashAmount()
    {
        return $this->cash_amount;
    }

    /**
     * Get the [check_amount] column value.
     *
     * @return string
     */
    public function getCheckAmount()
    {
        return $this->check_amount;
    }

    /**
     * Get the [check_number] column value.
     *
     * @return string
     */
    public function getCheckNumber()
    {
        return $this->check_number;
    }

    /**
     * Get the [deposit_amount] column value.
     *
     * @return string
     */
    public function getDepositAmount()
    {
        return $this->deposit_amount;
    }

    /**
     * Get the [deposit_number] column value.
     *
     * @return string
     */
    public function getDepositNumber()
    {
        return $this->deposit_number;
    }

    /**
     * Get the [original_subtotal_tax] column value.
     *
     * @return string
     */
    public function getOriginalSubtotalTax()
    {
        return $this->original_subtotal_tax;
    }

    /**
     * Get the [original_subtotal_nontax] column value.
     *
     * @return string
     */
    public function getOriginalSubtotalNontax()
    {
        return $this->original_subtotal_nontax;
    }

    /**
     * Get the [original_total_tax] column value.
     *
     * @return string
     */
    public function getOriginalTotalTax()
    {
        return $this->original_total_tax;
    }

    /**
     * Get the [original_total] column value.
     *
     * @return string
     */
    public function getOriginalTotal()
    {
        return $this->original_total;
    }

    /**
     * Get the [pick_printdate] column value.
     *
     * @return int
     */
    public function getPickPrintdate()
    {
        return $this->pick_printdate;
    }

    /**
     * Get the [pick_printtime] column value.
     *
     * @return int
     */
    public function getPickPrinttime()
    {
        return $this->pick_printtime;
    }

    /**
     * Get the [contact] column value.
     *
     * @return string
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Get the [phone_intl] column value.
     *
     * @return string
     */
    public function getPhoneIntl()
    {
        return $this->phone_intl;
    }

    /**
     * Get the [phone_accesscode] column value.
     *
     * @return string
     */
    public function getPhoneAccesscode()
    {
        return $this->phone_accesscode;
    }

    /**
     * Get the [phone_countrycode] column value.
     *
     * @return string
     */
    public function getPhoneCountrycode()
    {
        return $this->phone_countrycode;
    }

    /**
     * Get the [phone] column value.
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Get the [phone_ext] column value.
     *
     * @return string
     */
    public function getPhoneExt()
    {
        return $this->phone_ext;
    }

    /**
     * Get the [fax_intl] column value.
     *
     * @return string
     */
    public function getFaxIntl()
    {
        return $this->fax_intl;
    }

    /**
     * Get the [fax_accesscode] column value.
     *
     * @return string
     */
    public function getFaxAccesscode()
    {
        return $this->fax_accesscode;
    }

    /**
     * Get the [fax_countrycode] column value.
     *
     * @return string
     */
    public function getFaxCountrycode()
    {
        return $this->fax_countrycode;
    }

    /**
     * Get the [fax] column value.
     *
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Get the [ship_account] column value.
     *
     * @return string
     */
    public function getShipAccount()
    {
        return $this->ship_account;
    }

    /**
     * Get the [change_due] column value.
     *
     * @return string
     */
    public function getChangeDue()
    {
        return $this->change_due;
    }

    /**
     * Get the [discount_additional] column value.
     *
     * @return string
     */
    public function getDiscountAdditional()
    {
        return $this->discount_additional;
    }

    /**
     * Get the [all_ship] column value.
     *
     * @return string
     */
    public function getAllShip()
    {
        return $this->all_ship;
    }

    /**
     * Get the [credit_applied] column value.
     *
     * @return string
     */
    public function getCreditApplied()
    {
        return $this->credit_applied;
    }

    /**
     * Get the [invoice_printdate] column value.
     *
     * @return int
     */
    public function getInvoicePrintdate()
    {
        return $this->invoice_printdate;
    }

    /**
     * Get the [invoice_printtime] column value.
     *
     * @return int
     */
    public function getInvoicePrinttime()
    {
        return $this->invoice_printtime;
    }

    /**
     * Get the [discount_freight] column value.
     *
     * @return string
     */
    public function getDiscountFreight()
    {
        return $this->discount_freight;
    }

    /**
     * Get the [ship_completeoverride] column value.
     *
     * @return string
     */
    public function getShipCompleteoverride()
    {
        return $this->ship_completeoverride;
    }

    /**
     * Get the [contact_email] column value.
     *
     * @return string
     */
    public function getContactEmail()
    {
        return $this->contact_email;
    }

    /**
     * Get the [manual_freight] column value.
     *
     * @return string
     */
    public function getManualFreight()
    {
        return $this->manual_freight;
    }

    /**
     * Get the [internal_freight] column value.
     *
     * @return string
     */
    public function getInternalFreight()
    {
        return $this->internal_freight;
    }

    /**
     * Get the [cost_freight] column value.
     *
     * @return string
     */
    public function getCostFreight()
    {
        return $this->cost_freight;
    }

    /**
     * Get the [route] column value.
     *
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * Get the [route_seq] column value.
     *
     * @return int
     */
    public function getRouteSeq()
    {
        return $this->route_seq;
    }

    /**
     * Get the [edi_855sent] column value.
     *
     * @return string
     */
    public function getEdi855sent()
    {
        return $this->edi_855sent;
    }

    /**
     * Get the [freight_3rdparty] column value.
     *
     * @return string
     */
    public function getFreight3rdparty()
    {
        return $this->freight_3rdparty;
    }

    /**
     * Get the [fob] column value.
     *
     * @return string
     */
    public function getFob()
    {
        return $this->fob;
    }

    /**
     * Get the [confirm_image] column value.
     *
     * @return string
     */
    public function getConfirmImage()
    {
        return $this->confirm_image;
    }

    /**
     * Get the [cstk_consign] column value.
     *
     * @return string
     */
    public function getCstkConsign()
    {
        return $this->cstk_consign;
    }

    /**
     * Get the [manufacturer] column value.
     *
     * @return string
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * Get the [pick_queue] column value.
     *
     * @return string
     */
    public function getPickQueue()
    {
        return $this->pick_queue;
    }

    /**
     * Get the [arrive_date] column value.
     *
     * @return int
     */
    public function getArriveDate()
    {
        return $this->arrive_date;
    }

    /**
     * Get the [surcharge_status] column value.
     *
     * @return string
     */
    public function getSurchargeStatus()
    {
        return $this->surcharge_status;
    }

    /**
     * Get the [freight_group] column value.
     *
     * @return string
     */
    public function getFreightGroup()
    {
        return $this->freight_group;
    }

    /**
     * Get the [comm_override] column value.
     *
     * @return string
     */
    public function getCommOverride()
    {
        return $this->comm_override;
    }

    /**
     * Get the [charge_split] column value.
     *
     * @return string
     */
    public function getChargeSplit()
    {
        return $this->charge_split;
    }

    /**
     * Get the [creditcart_approved] column value.
     *
     * @return string
     */
    public function getCreditcartApproved()
    {
        return $this->creditcart_approved;
    }

    /**
     * Get the [original_ordernumber] column value.
     *
     * @return string
     */
    public function getOriginalOrdernumber()
    {
        return $this->original_ordernumber;
    }

    /**
     * Get the [has_notes] column value.
     *
     * @return string
     */
    public function getHasNotes()
    {
        return $this->has_notes;
    }

    /**
     * Get the [has_documents] column value.
     *
     * @return string
     */
    public function getHasDocuments()
    {
        return $this->has_documents;
    }

    /**
     * Get the [has_tracking] column value.
     *
     * @return string
     */
    public function getHasTracking()
    {
        return $this->has_tracking;
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
     * Get the [dummy] column value.
     *
     * @return string
     */
    public function getDummy()
    {
        return $this->dummy;
    }

    /**
     * Set the value of [orderno] column.
     *
     * @param int $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setOrderno($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->orderno !== $v) {
            $this->orderno = $v;
            $this->modifiedColumns[OeHistTableMap::COL_ORDERNO] = true;
        }

        return $this;
    } // setOrderno()

    /**
     * Set the value of [status] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[OeHistTableMap::COL_STATUS] = true;
        }

        return $this;
    } // setStatus()

    /**
     * Set the value of [holdstatus] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setHoldstatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->holdstatus !== $v) {
            $this->holdstatus = $v;
            $this->modifiedColumns[OeHistTableMap::COL_HOLDSTATUS] = true;
        }

        return $this;
    } // setHoldstatus()

    /**
     * Set the value of [custid] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setCustid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->custid !== $v) {
            $this->custid = $v;
            $this->modifiedColumns[OeHistTableMap::COL_CUSTID] = true;
        }

        return $this;
    } // setCustid()

    /**
     * Set the value of [shiptoid] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setShiptoid($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shiptoid !== $v) {
            $this->shiptoid = $v;
            $this->modifiedColumns[OeHistTableMap::COL_SHIPTOID] = true;
        }

        return $this;
    } // setShiptoid()

    /**
     * Set the value of [shipto_name] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setShiptoName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipto_name !== $v) {
            $this->shipto_name = $v;
            $this->modifiedColumns[OeHistTableMap::COL_SHIPTO_NAME] = true;
        }

        return $this;
    } // setShiptoName()

    /**
     * Set the value of [shipto_address1] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setShiptoAddress1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipto_address1 !== $v) {
            $this->shipto_address1 = $v;
            $this->modifiedColumns[OeHistTableMap::COL_SHIPTO_ADDRESS1] = true;
        }

        return $this;
    } // setShiptoAddress1()

    /**
     * Set the value of [shipto_address2] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setShiptoAddress2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipto_address2 !== $v) {
            $this->shipto_address2 = $v;
            $this->modifiedColumns[OeHistTableMap::COL_SHIPTO_ADDRESS2] = true;
        }

        return $this;
    } // setShiptoAddress2()

    /**
     * Set the value of [shipto_address3] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setShiptoAddress3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipto_address3 !== $v) {
            $this->shipto_address3 = $v;
            $this->modifiedColumns[OeHistTableMap::COL_SHIPTO_ADDRESS3] = true;
        }

        return $this;
    } // setShiptoAddress3()

    /**
     * Set the value of [shipto_address4] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setShiptoAddress4($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipto_address4 !== $v) {
            $this->shipto_address4 = $v;
            $this->modifiedColumns[OeHistTableMap::COL_SHIPTO_ADDRESS4] = true;
        }

        return $this;
    } // setShiptoAddress4()

    /**
     * Set the value of [shipto_city] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setShiptoCity($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipto_city !== $v) {
            $this->shipto_city = $v;
            $this->modifiedColumns[OeHistTableMap::COL_SHIPTO_CITY] = true;
        }

        return $this;
    } // setShiptoCity()

    /**
     * Set the value of [shipto_state] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setShiptoState($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipto_state !== $v) {
            $this->shipto_state = $v;
            $this->modifiedColumns[OeHistTableMap::COL_SHIPTO_STATE] = true;
        }

        return $this;
    } // setShiptoState()

    /**
     * Set the value of [shipto_zip] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setShiptoZip($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipto_zip !== $v) {
            $this->shipto_zip = $v;
            $this->modifiedColumns[OeHistTableMap::COL_SHIPTO_ZIP] = true;
        }

        return $this;
    } // setShiptoZip()

    /**
     * Set the value of [custpo] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setCustpo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->custpo !== $v) {
            $this->custpo = $v;
            $this->modifiedColumns[OeHistTableMap::COL_CUSTPO] = true;
        }

        return $this;
    } // setCustpo()

    /**
     * Set the value of [orderdate] column.
     *
     * @param int $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setOrderdate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->orderdate !== $v) {
            $this->orderdate = $v;
            $this->modifiedColumns[OeHistTableMap::COL_ORDERDATE] = true;
        }

        return $this;
    } // setOrderdate()

    /**
     * Set the value of [termcode] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setTermcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->termcode !== $v) {
            $this->termcode = $v;
            $this->modifiedColumns[OeHistTableMap::COL_TERMCODE] = true;
        }

        return $this;
    } // setTermcode()

    /**
     * Set the value of [shipviacode] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setShipviacode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipviacode !== $v) {
            $this->shipviacode = $v;
            $this->modifiedColumns[OeHistTableMap::COL_SHIPVIACODE] = true;
        }

        return $this;
    } // setShipviacode()

    /**
     * Set the value of [invoice_number] column.
     *
     * @param int $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setInvoiceNumber($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->invoice_number !== $v) {
            $this->invoice_number = $v;
            $this->modifiedColumns[OeHistTableMap::COL_INVOICE_NUMBER] = true;
        }

        return $this;
    } // setInvoiceNumber()

    /**
     * Set the value of [invoice_date] column.
     *
     * @param int $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setInvoiceDate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->invoice_date !== $v) {
            $this->invoice_date = $v;
            $this->modifiedColumns[OeHistTableMap::COL_INVOICE_DATE] = true;
        }

        return $this;
    } // setInvoiceDate()

    /**
     * Set the value of [genledger_period] column.
     *
     * @param int $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setGenledgerPeriod($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->genledger_period !== $v) {
            $this->genledger_period = $v;
            $this->modifiedColumns[OeHistTableMap::COL_GENLEDGER_PERIOD] = true;
        }

        return $this;
    } // setGenledgerPeriod()

    /**
     * Set the value of [salesperson_1] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setSalesperson1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salesperson_1 !== $v) {
            $this->salesperson_1 = $v;
            $this->modifiedColumns[OeHistTableMap::COL_SALESPERSON_1] = true;
        }

        return $this;
    } // setSalesperson1()

    /**
     * Set the value of [salesperson_1pct] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setSalesperson1pct($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salesperson_1pct !== $v) {
            $this->salesperson_1pct = $v;
            $this->modifiedColumns[OeHistTableMap::COL_SALESPERSON_1PCT] = true;
        }

        return $this;
    } // setSalesperson1pct()

    /**
     * Set the value of [salesperson_2] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setSalesperson2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salesperson_2 !== $v) {
            $this->salesperson_2 = $v;
            $this->modifiedColumns[OeHistTableMap::COL_SALESPERSON_2] = true;
        }

        return $this;
    } // setSalesperson2()

    /**
     * Set the value of [salesperson_2pct] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setSalesperson2pct($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salesperson_2pct !== $v) {
            $this->salesperson_2pct = $v;
            $this->modifiedColumns[OeHistTableMap::COL_SALESPERSON_2PCT] = true;
        }

        return $this;
    } // setSalesperson2pct()

    /**
     * Set the value of [salesperson_3] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setSalesperson3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salesperson_3 !== $v) {
            $this->salesperson_3 = $v;
            $this->modifiedColumns[OeHistTableMap::COL_SALESPERSON_3] = true;
        }

        return $this;
    } // setSalesperson3()

    /**
     * Set the value of [salesperson_3pct] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setSalesperson3pct($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->salesperson_3pct !== $v) {
            $this->salesperson_3pct = $v;
            $this->modifiedColumns[OeHistTableMap::COL_SALESPERSON_3PCT] = true;
        }

        return $this;
    } // setSalesperson3pct()

    /**
     * Set the value of [contract_nbr] column.
     *
     * @param int $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setContractNbr($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->contract_nbr !== $v) {
            $this->contract_nbr = $v;
            $this->modifiedColumns[OeHistTableMap::COL_CONTRACT_NBR] = true;
        }

        return $this;
    } // setContractNbr()

    /**
     * Set the value of [batch_nbr] column.
     *
     * @param int $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setBatchNbr($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->batch_nbr !== $v) {
            $this->batch_nbr = $v;
            $this->modifiedColumns[OeHistTableMap::COL_BATCH_NBR] = true;
        }

        return $this;
    } // setBatchNbr()

    /**
     * Set the value of [dropreleasehold] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setDropreleasehold($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dropreleasehold !== $v) {
            $this->dropreleasehold = $v;
            $this->modifiedColumns[OeHistTableMap::COL_DROPRELEASEHOLD] = true;
        }

        return $this;
    } // setDropreleasehold()

    /**
     * Set the value of [subtotal_tax] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setSubtotalTax($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->subtotal_tax !== $v) {
            $this->subtotal_tax = $v;
            $this->modifiedColumns[OeHistTableMap::COL_SUBTOTAL_TAX] = true;
        }

        return $this;
    } // setSubtotalTax()

    /**
     * Set the value of [subtotal_nontax] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setSubtotalNontax($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->subtotal_nontax !== $v) {
            $this->subtotal_nontax = $v;
            $this->modifiedColumns[OeHistTableMap::COL_SUBTOTAL_NONTAX] = true;
        }

        return $this;
    } // setSubtotalNontax()

    /**
     * Set the value of [total_tax] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setTotalTax($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total_tax !== $v) {
            $this->total_tax = $v;
            $this->modifiedColumns[OeHistTableMap::COL_TOTAL_TAX] = true;
        }

        return $this;
    } // setTotalTax()

    /**
     * Set the value of [total_freight] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setTotalFreight($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total_freight !== $v) {
            $this->total_freight = $v;
            $this->modifiedColumns[OeHistTableMap::COL_TOTAL_FREIGHT] = true;
        }

        return $this;
    } // setTotalFreight()

    /**
     * Set the value of [total_misc] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setTotalMisc($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total_misc !== $v) {
            $this->total_misc = $v;
            $this->modifiedColumns[OeHistTableMap::COL_TOTAL_MISC] = true;
        }

        return $this;
    } // setTotalMisc()

    /**
     * Set the value of [total_order] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setTotalOrder($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total_order !== $v) {
            $this->total_order = $v;
            $this->modifiedColumns[OeHistTableMap::COL_TOTAL_ORDER] = true;
        }

        return $this;
    } // setTotalOrder()

    /**
     * Set the value of [total_cost] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setTotalCost($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total_cost !== $v) {
            $this->total_cost = $v;
            $this->modifiedColumns[OeHistTableMap::COL_TOTAL_COST] = true;
        }

        return $this;
    } // setTotalCost()

    /**
     * Set the value of [lock] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setLock($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lock !== $v) {
            $this->lock = $v;
            $this->modifiedColumns[OeHistTableMap::COL_LOCK] = true;
        }

        return $this;
    } // setLock()

    /**
     * Set the value of [taken_date] column.
     *
     * @param int $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setTakenDate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->taken_date !== $v) {
            $this->taken_date = $v;
            $this->modifiedColumns[OeHistTableMap::COL_TAKEN_DATE] = true;
        }

        return $this;
    } // setTakenDate()

    /**
     * Set the value of [taken_time] column.
     *
     * @param int $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setTakenTime($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->taken_time !== $v) {
            $this->taken_time = $v;
            $this->modifiedColumns[OeHistTableMap::COL_TAKEN_TIME] = true;
        }

        return $this;
    } // setTakenTime()

    /**
     * Set the value of [pick_date] column.
     *
     * @param int $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setPickDate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pick_date !== $v) {
            $this->pick_date = $v;
            $this->modifiedColumns[OeHistTableMap::COL_PICK_DATE] = true;
        }

        return $this;
    } // setPickDate()

    /**
     * Set the value of [pick_time] column.
     *
     * @param int $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setPickTime($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pick_time !== $v) {
            $this->pick_time = $v;
            $this->modifiedColumns[OeHistTableMap::COL_PICK_TIME] = true;
        }

        return $this;
    } // setPickTime()

    /**
     * Set the value of [pack_date] column.
     *
     * @param int $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setPackDate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pack_date !== $v) {
            $this->pack_date = $v;
            $this->modifiedColumns[OeHistTableMap::COL_PACK_DATE] = true;
        }

        return $this;
    } // setPackDate()

    /**
     * Set the value of [pack_time] column.
     *
     * @param int $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setPackTime($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pack_time !== $v) {
            $this->pack_time = $v;
            $this->modifiedColumns[OeHistTableMap::COL_PACK_TIME] = true;
        }

        return $this;
    } // setPackTime()

    /**
     * Set the value of [verify_date] column.
     *
     * @param int $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setVerifyDate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->verify_date !== $v) {
            $this->verify_date = $v;
            $this->modifiedColumns[OeHistTableMap::COL_VERIFY_DATE] = true;
        }

        return $this;
    } // setVerifyDate()

    /**
     * Set the value of [verify_time] column.
     *
     * @param int $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setVerifyTime($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->verify_time !== $v) {
            $this->verify_time = $v;
            $this->modifiedColumns[OeHistTableMap::COL_VERIFY_TIME] = true;
        }

        return $this;
    } // setVerifyTime()

    /**
     * Set the value of [creditmemo] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setCreditmemo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->creditmemo !== $v) {
            $this->creditmemo = $v;
            $this->modifiedColumns[OeHistTableMap::COL_CREDITMEMO] = true;
        }

        return $this;
    } // setCreditmemo()

    /**
     * Set the value of [booked] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setBooked($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->booked !== $v) {
            $this->booked = $v;
            $this->modifiedColumns[OeHistTableMap::COL_BOOKED] = true;
        }

        return $this;
    } // setBooked()

    /**
     * Set the value of [original_whse] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setOriginalWhse($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->original_whse !== $v) {
            $this->original_whse = $v;
            $this->modifiedColumns[OeHistTableMap::COL_ORIGINAL_WHSE] = true;
        }

        return $this;
    } // setOriginalWhse()

    /**
     * Set the value of [billto_state] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setBilltoState($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->billto_state !== $v) {
            $this->billto_state = $v;
            $this->modifiedColumns[OeHistTableMap::COL_BILLTO_STATE] = true;
        }

        return $this;
    } // setBilltoState()

    /**
     * Set the value of [shipcomplete] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setShipcomplete($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->shipcomplete !== $v) {
            $this->shipcomplete = $v;
            $this->modifiedColumns[OeHistTableMap::COL_SHIPCOMPLETE] = true;
        }

        return $this;
    } // setShipcomplete()

    /**
     * Set the value of [cwo_flag] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setCwoFlag($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cwo_flag !== $v) {
            $this->cwo_flag = $v;
            $this->modifiedColumns[OeHistTableMap::COL_CWO_FLAG] = true;
        }

        return $this;
    } // setCwoFlag()

    /**
     * Set the value of [division] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setDivision($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->division !== $v) {
            $this->division = $v;
            $this->modifiedColumns[OeHistTableMap::COL_DIVISION] = true;
        }

        return $this;
    } // setDivision()

    /**
     * Set the value of [taken_code] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setTakenCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->taken_code !== $v) {
            $this->taken_code = $v;
            $this->modifiedColumns[OeHistTableMap::COL_TAKEN_CODE] = true;
        }

        return $this;
    } // setTakenCode()

    /**
     * Set the value of [pack_code] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setPackCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pack_code !== $v) {
            $this->pack_code = $v;
            $this->modifiedColumns[OeHistTableMap::COL_PACK_CODE] = true;
        }

        return $this;
    } // setPackCode()

    /**
     * Set the value of [pick_code] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setPickCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pick_code !== $v) {
            $this->pick_code = $v;
            $this->modifiedColumns[OeHistTableMap::COL_PICK_CODE] = true;
        }

        return $this;
    } // setPickCode()

    /**
     * Set the value of [verify_code] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setVerifyCode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->verify_code !== $v) {
            $this->verify_code = $v;
            $this->modifiedColumns[OeHistTableMap::COL_VERIFY_CODE] = true;
        }

        return $this;
    } // setVerifyCode()

    /**
     * Set the value of [total_discount] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setTotalDiscount($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->total_discount !== $v) {
            $this->total_discount = $v;
            $this->modifiedColumns[OeHistTableMap::COL_TOTAL_DISCOUNT] = true;
        }

        return $this;
    } // setTotalDiscount()

    /**
     * Set the value of [edi_refererencenbr] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setEdiRefererencenbr($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->edi_refererencenbr !== $v) {
            $this->edi_refererencenbr = $v;
            $this->modifiedColumns[OeHistTableMap::COL_EDI_REFERERENCENBR] = true;
        }

        return $this;
    } // setEdiRefererencenbr()

    /**
     * Set the value of [user_code1] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setUserCode1($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->user_code1 !== $v) {
            $this->user_code1 = $v;
            $this->modifiedColumns[OeHistTableMap::COL_USER_CODE1] = true;
        }

        return $this;
    } // setUserCode1()

    /**
     * Set the value of [user_code2] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setUserCode2($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->user_code2 !== $v) {
            $this->user_code2 = $v;
            $this->modifiedColumns[OeHistTableMap::COL_USER_CODE2] = true;
        }

        return $this;
    } // setUserCode2()

    /**
     * Set the value of [user_code3] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setUserCode3($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->user_code3 !== $v) {
            $this->user_code3 = $v;
            $this->modifiedColumns[OeHistTableMap::COL_USER_CODE3] = true;
        }

        return $this;
    } // setUserCode3()

    /**
     * Set the value of [user_code4] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setUserCode4($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->user_code4 !== $v) {
            $this->user_code4 = $v;
            $this->modifiedColumns[OeHistTableMap::COL_USER_CODE4] = true;
        }

        return $this;
    } // setUserCode4()

    /**
     * Set the value of [exchange_country] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setExchangeCountry($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->exchange_country !== $v) {
            $this->exchange_country = $v;
            $this->modifiedColumns[OeHistTableMap::COL_EXCHANGE_COUNTRY] = true;
        }

        return $this;
    } // setExchangeCountry()

    /**
     * Set the value of [exchange_rate] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setExchangeRate($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->exchange_rate !== $v) {
            $this->exchange_rate = $v;
            $this->modifiedColumns[OeHistTableMap::COL_EXCHANGE_RATE] = true;
        }

        return $this;
    } // setExchangeRate()

    /**
     * Set the value of [weight_total] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setWeightTotal($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->weight_total !== $v) {
            $this->weight_total = $v;
            $this->modifiedColumns[OeHistTableMap::COL_WEIGHT_TOTAL] = true;
        }

        return $this;
    } // setWeightTotal()

    /**
     * Set the value of [weight_override] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setWeightOverride($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->weight_override !== $v) {
            $this->weight_override = $v;
            $this->modifiedColumns[OeHistTableMap::COL_WEIGHT_OVERRIDE] = true;
        }

        return $this;
    } // setWeightOverride()

    /**
     * Set the value of [box_count] column.
     *
     * @param int $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setBoxCount($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->box_count !== $v) {
            $this->box_count = $v;
            $this->modifiedColumns[OeHistTableMap::COL_BOX_COUNT] = true;
        }

        return $this;
    } // setBoxCount()

    /**
     * Set the value of [request_date] column.
     *
     * @param int $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setRequestDate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->request_date !== $v) {
            $this->request_date = $v;
            $this->modifiedColumns[OeHistTableMap::COL_REQUEST_DATE] = true;
        }

        return $this;
    } // setRequestDate()

    /**
     * Set the value of [cancel_date] column.
     *
     * @param int $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setCancelDate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->cancel_date !== $v) {
            $this->cancel_date = $v;
            $this->modifiedColumns[OeHistTableMap::COL_CANCEL_DATE] = true;
        }

        return $this;
    } // setCancelDate()

    /**
     * Set the value of [lockedby] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setLockedby($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lockedby !== $v) {
            $this->lockedby = $v;
            $this->modifiedColumns[OeHistTableMap::COL_LOCKEDBY] = true;
        }

        return $this;
    } // setLockedby()

    /**
     * Set the value of [release_number] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setReleaseNumber($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->release_number !== $v) {
            $this->release_number = $v;
            $this->modifiedColumns[OeHistTableMap::COL_RELEASE_NUMBER] = true;
        }

        return $this;
    } // setReleaseNumber()

    /**
     * Set the value of [whse] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setWhse($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->whse !== $v) {
            $this->whse = $v;
            $this->modifiedColumns[OeHistTableMap::COL_WHSE] = true;
        }

        return $this;
    } // setWhse()

    /**
     * Set the value of [backorder_date] column.
     *
     * @param int $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setBackorderDate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->backorder_date !== $v) {
            $this->backorder_date = $v;
            $this->modifiedColumns[OeHistTableMap::COL_BACKORDER_DATE] = true;
        }

        return $this;
    } // setBackorderDate()

    /**
     * Set the value of [deptcode] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setDeptcode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->deptcode !== $v) {
            $this->deptcode = $v;
            $this->modifiedColumns[OeHistTableMap::COL_DEPTCODE] = true;
        }

        return $this;
    } // setDeptcode()

    /**
     * Set the value of [freight_in_entered] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setFreightInEntered($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->freight_in_entered !== $v) {
            $this->freight_in_entered = $v;
            $this->modifiedColumns[OeHistTableMap::COL_FREIGHT_IN_ENTERED] = true;
        }

        return $this;
    } // setFreightInEntered()

    /**
     * Set the value of [dropship_entered] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setDropshipEntered($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dropship_entered !== $v) {
            $this->dropship_entered = $v;
            $this->modifiedColumns[OeHistTableMap::COL_DROPSHIP_ENTERED] = true;
        }

        return $this;
    } // setDropshipEntered()

    /**
     * Set the value of [er_flag] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setErFlag($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->er_flag !== $v) {
            $this->er_flag = $v;
            $this->modifiedColumns[OeHistTableMap::COL_ER_FLAG] = true;
        }

        return $this;
    } // setErFlag()

    /**
     * Set the value of [freight_in] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setFreightIn($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->freight_in !== $v) {
            $this->freight_in = $v;
            $this->modifiedColumns[OeHistTableMap::COL_FREIGHT_IN] = true;
        }

        return $this;
    } // setFreightIn()

    /**
     * Set the value of [dropship] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setDropship($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dropship !== $v) {
            $this->dropship = $v;
            $this->modifiedColumns[OeHistTableMap::COL_DROPSHIP] = true;
        }

        return $this;
    } // setDropship()

    /**
     * Set the value of [minorder] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setMinorder($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->minorder !== $v) {
            $this->minorder = $v;
            $this->modifiedColumns[OeHistTableMap::COL_MINORDER] = true;
        }

        return $this;
    } // setMinorder()

    /**
     * Set the value of [contract_terms] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setContractTerms($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->contract_terms !== $v) {
            $this->contract_terms = $v;
            $this->modifiedColumns[OeHistTableMap::COL_CONTRACT_TERMS] = true;
        }

        return $this;
    } // setContractTerms()

    /**
     * Set the value of [dropship_billed] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setDropshipBilled($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dropship_billed !== $v) {
            $this->dropship_billed = $v;
            $this->modifiedColumns[OeHistTableMap::COL_DROPSHIP_BILLED] = true;
        }

        return $this;
    } // setDropshipBilled()

    /**
     * Set the value of [order_type] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setOrderType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->order_type !== $v) {
            $this->order_type = $v;
            $this->modifiedColumns[OeHistTableMap::COL_ORDER_TYPE] = true;
        }

        return $this;
    } // setOrderType()

    /**
     * Set the value of [tracking_edinumber] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setTrackingEdinumber($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tracking_edinumber !== $v) {
            $this->tracking_edinumber = $v;
            $this->modifiedColumns[OeHistTableMap::COL_TRACKING_EDINUMBER] = true;
        }

        return $this;
    } // setTrackingEdinumber()

    /**
     * Set the value of [source] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setSource($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->source !== $v) {
            $this->source = $v;
            $this->modifiedColumns[OeHistTableMap::COL_SOURCE] = true;
        }

        return $this;
    } // setSource()

    /**
     * Set the value of [pick_format] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setPickFormat($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pick_format !== $v) {
            $this->pick_format = $v;
            $this->modifiedColumns[OeHistTableMap::COL_PICK_FORMAT] = true;
        }

        return $this;
    } // setPickFormat()

    /**
     * Set the value of [invoice_format] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setInvoiceFormat($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->invoice_format !== $v) {
            $this->invoice_format = $v;
            $this->modifiedColumns[OeHistTableMap::COL_INVOICE_FORMAT] = true;
        }

        return $this;
    } // setInvoiceFormat()

    /**
     * Set the value of [cash_amount] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setCashAmount($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cash_amount !== $v) {
            $this->cash_amount = $v;
            $this->modifiedColumns[OeHistTableMap::COL_CASH_AMOUNT] = true;
        }

        return $this;
    } // setCashAmount()

    /**
     * Set the value of [check_amount] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setCheckAmount($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->check_amount !== $v) {
            $this->check_amount = $v;
            $this->modifiedColumns[OeHistTableMap::COL_CHECK_AMOUNT] = true;
        }

        return $this;
    } // setCheckAmount()

    /**
     * Set the value of [check_number] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setCheckNumber($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->check_number !== $v) {
            $this->check_number = $v;
            $this->modifiedColumns[OeHistTableMap::COL_CHECK_NUMBER] = true;
        }

        return $this;
    } // setCheckNumber()

    /**
     * Set the value of [deposit_amount] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setDepositAmount($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->deposit_amount !== $v) {
            $this->deposit_amount = $v;
            $this->modifiedColumns[OeHistTableMap::COL_DEPOSIT_AMOUNT] = true;
        }

        return $this;
    } // setDepositAmount()

    /**
     * Set the value of [deposit_number] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setDepositNumber($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->deposit_number !== $v) {
            $this->deposit_number = $v;
            $this->modifiedColumns[OeHistTableMap::COL_DEPOSIT_NUMBER] = true;
        }

        return $this;
    } // setDepositNumber()

    /**
     * Set the value of [original_subtotal_tax] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setOriginalSubtotalTax($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->original_subtotal_tax !== $v) {
            $this->original_subtotal_tax = $v;
            $this->modifiedColumns[OeHistTableMap::COL_ORIGINAL_SUBTOTAL_TAX] = true;
        }

        return $this;
    } // setOriginalSubtotalTax()

    /**
     * Set the value of [original_subtotal_nontax] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setOriginalSubtotalNontax($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->original_subtotal_nontax !== $v) {
            $this->original_subtotal_nontax = $v;
            $this->modifiedColumns[OeHistTableMap::COL_ORIGINAL_SUBTOTAL_NONTAX] = true;
        }

        return $this;
    } // setOriginalSubtotalNontax()

    /**
     * Set the value of [original_total_tax] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setOriginalTotalTax($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->original_total_tax !== $v) {
            $this->original_total_tax = $v;
            $this->modifiedColumns[OeHistTableMap::COL_ORIGINAL_TOTAL_TAX] = true;
        }

        return $this;
    } // setOriginalTotalTax()

    /**
     * Set the value of [original_total] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setOriginalTotal($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->original_total !== $v) {
            $this->original_total = $v;
            $this->modifiedColumns[OeHistTableMap::COL_ORIGINAL_TOTAL] = true;
        }

        return $this;
    } // setOriginalTotal()

    /**
     * Set the value of [pick_printdate] column.
     *
     * @param int $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setPickPrintdate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pick_printdate !== $v) {
            $this->pick_printdate = $v;
            $this->modifiedColumns[OeHistTableMap::COL_PICK_PRINTDATE] = true;
        }

        return $this;
    } // setPickPrintdate()

    /**
     * Set the value of [pick_printtime] column.
     *
     * @param int $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setPickPrinttime($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->pick_printtime !== $v) {
            $this->pick_printtime = $v;
            $this->modifiedColumns[OeHistTableMap::COL_PICK_PRINTTIME] = true;
        }

        return $this;
    } // setPickPrinttime()

    /**
     * Set the value of [contact] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setContact($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->contact !== $v) {
            $this->contact = $v;
            $this->modifiedColumns[OeHistTableMap::COL_CONTACT] = true;
        }

        return $this;
    } // setContact()

    /**
     * Set the value of [phone_intl] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setPhoneIntl($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->phone_intl !== $v) {
            $this->phone_intl = $v;
            $this->modifiedColumns[OeHistTableMap::COL_PHONE_INTL] = true;
        }

        return $this;
    } // setPhoneIntl()

    /**
     * Set the value of [phone_accesscode] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setPhoneAccesscode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->phone_accesscode !== $v) {
            $this->phone_accesscode = $v;
            $this->modifiedColumns[OeHistTableMap::COL_PHONE_ACCESSCODE] = true;
        }

        return $this;
    } // setPhoneAccesscode()

    /**
     * Set the value of [phone_countrycode] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setPhoneCountrycode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->phone_countrycode !== $v) {
            $this->phone_countrycode = $v;
            $this->modifiedColumns[OeHistTableMap::COL_PHONE_COUNTRYCODE] = true;
        }

        return $this;
    } // setPhoneCountrycode()

    /**
     * Set the value of [phone] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setPhone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->phone !== $v) {
            $this->phone = $v;
            $this->modifiedColumns[OeHistTableMap::COL_PHONE] = true;
        }

        return $this;
    } // setPhone()

    /**
     * Set the value of [phone_ext] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setPhoneExt($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->phone_ext !== $v) {
            $this->phone_ext = $v;
            $this->modifiedColumns[OeHistTableMap::COL_PHONE_EXT] = true;
        }

        return $this;
    } // setPhoneExt()

    /**
     * Set the value of [fax_intl] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setFaxIntl($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->fax_intl !== $v) {
            $this->fax_intl = $v;
            $this->modifiedColumns[OeHistTableMap::COL_FAX_INTL] = true;
        }

        return $this;
    } // setFaxIntl()

    /**
     * Set the value of [fax_accesscode] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setFaxAccesscode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->fax_accesscode !== $v) {
            $this->fax_accesscode = $v;
            $this->modifiedColumns[OeHistTableMap::COL_FAX_ACCESSCODE] = true;
        }

        return $this;
    } // setFaxAccesscode()

    /**
     * Set the value of [fax_countrycode] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setFaxCountrycode($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->fax_countrycode !== $v) {
            $this->fax_countrycode = $v;
            $this->modifiedColumns[OeHistTableMap::COL_FAX_COUNTRYCODE] = true;
        }

        return $this;
    } // setFaxCountrycode()

    /**
     * Set the value of [fax] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setFax($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->fax !== $v) {
            $this->fax = $v;
            $this->modifiedColumns[OeHistTableMap::COL_FAX] = true;
        }

        return $this;
    } // setFax()

    /**
     * Set the value of [ship_account] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setShipAccount($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ship_account !== $v) {
            $this->ship_account = $v;
            $this->modifiedColumns[OeHistTableMap::COL_SHIP_ACCOUNT] = true;
        }

        return $this;
    } // setShipAccount()

    /**
     * Set the value of [change_due] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setChangeDue($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->change_due !== $v) {
            $this->change_due = $v;
            $this->modifiedColumns[OeHistTableMap::COL_CHANGE_DUE] = true;
        }

        return $this;
    } // setChangeDue()

    /**
     * Set the value of [discount_additional] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setDiscountAdditional($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->discount_additional !== $v) {
            $this->discount_additional = $v;
            $this->modifiedColumns[OeHistTableMap::COL_DISCOUNT_ADDITIONAL] = true;
        }

        return $this;
    } // setDiscountAdditional()

    /**
     * Set the value of [all_ship] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setAllShip($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->all_ship !== $v) {
            $this->all_ship = $v;
            $this->modifiedColumns[OeHistTableMap::COL_ALL_SHIP] = true;
        }

        return $this;
    } // setAllShip()

    /**
     * Set the value of [credit_applied] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setCreditApplied($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->credit_applied !== $v) {
            $this->credit_applied = $v;
            $this->modifiedColumns[OeHistTableMap::COL_CREDIT_APPLIED] = true;
        }

        return $this;
    } // setCreditApplied()

    /**
     * Set the value of [invoice_printdate] column.
     *
     * @param int $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setInvoicePrintdate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->invoice_printdate !== $v) {
            $this->invoice_printdate = $v;
            $this->modifiedColumns[OeHistTableMap::COL_INVOICE_PRINTDATE] = true;
        }

        return $this;
    } // setInvoicePrintdate()

    /**
     * Set the value of [invoice_printtime] column.
     *
     * @param int $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setInvoicePrinttime($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->invoice_printtime !== $v) {
            $this->invoice_printtime = $v;
            $this->modifiedColumns[OeHistTableMap::COL_INVOICE_PRINTTIME] = true;
        }

        return $this;
    } // setInvoicePrinttime()

    /**
     * Set the value of [discount_freight] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setDiscountFreight($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->discount_freight !== $v) {
            $this->discount_freight = $v;
            $this->modifiedColumns[OeHistTableMap::COL_DISCOUNT_FREIGHT] = true;
        }

        return $this;
    } // setDiscountFreight()

    /**
     * Set the value of [ship_completeoverride] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setShipCompleteoverride($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ship_completeoverride !== $v) {
            $this->ship_completeoverride = $v;
            $this->modifiedColumns[OeHistTableMap::COL_SHIP_COMPLETEOVERRIDE] = true;
        }

        return $this;
    } // setShipCompleteoverride()

    /**
     * Set the value of [contact_email] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setContactEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->contact_email !== $v) {
            $this->contact_email = $v;
            $this->modifiedColumns[OeHistTableMap::COL_CONTACT_EMAIL] = true;
        }

        return $this;
    } // setContactEmail()

    /**
     * Set the value of [manual_freight] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setManualFreight($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->manual_freight !== $v) {
            $this->manual_freight = $v;
            $this->modifiedColumns[OeHistTableMap::COL_MANUAL_FREIGHT] = true;
        }

        return $this;
    } // setManualFreight()

    /**
     * Set the value of [internal_freight] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setInternalFreight($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->internal_freight !== $v) {
            $this->internal_freight = $v;
            $this->modifiedColumns[OeHistTableMap::COL_INTERNAL_FREIGHT] = true;
        }

        return $this;
    } // setInternalFreight()

    /**
     * Set the value of [cost_freight] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setCostFreight($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cost_freight !== $v) {
            $this->cost_freight = $v;
            $this->modifiedColumns[OeHistTableMap::COL_COST_FREIGHT] = true;
        }

        return $this;
    } // setCostFreight()

    /**
     * Set the value of [route] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setRoute($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->route !== $v) {
            $this->route = $v;
            $this->modifiedColumns[OeHistTableMap::COL_ROUTE] = true;
        }

        return $this;
    } // setRoute()

    /**
     * Set the value of [route_seq] column.
     *
     * @param int $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setRouteSeq($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->route_seq !== $v) {
            $this->route_seq = $v;
            $this->modifiedColumns[OeHistTableMap::COL_ROUTE_SEQ] = true;
        }

        return $this;
    } // setRouteSeq()

    /**
     * Set the value of [edi_855sent] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setEdi855sent($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->edi_855sent !== $v) {
            $this->edi_855sent = $v;
            $this->modifiedColumns[OeHistTableMap::COL_EDI_855SENT] = true;
        }

        return $this;
    } // setEdi855sent()

    /**
     * Set the value of [freight_3rdparty] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setFreight3rdparty($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->freight_3rdparty !== $v) {
            $this->freight_3rdparty = $v;
            $this->modifiedColumns[OeHistTableMap::COL_FREIGHT_3RDPARTY] = true;
        }

        return $this;
    } // setFreight3rdparty()

    /**
     * Set the value of [fob] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setFob($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->fob !== $v) {
            $this->fob = $v;
            $this->modifiedColumns[OeHistTableMap::COL_FOB] = true;
        }

        return $this;
    } // setFob()

    /**
     * Set the value of [confirm_image] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setConfirmImage($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->confirm_image !== $v) {
            $this->confirm_image = $v;
            $this->modifiedColumns[OeHistTableMap::COL_CONFIRM_IMAGE] = true;
        }

        return $this;
    } // setConfirmImage()

    /**
     * Set the value of [cstk_consign] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setCstkConsign($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cstk_consign !== $v) {
            $this->cstk_consign = $v;
            $this->modifiedColumns[OeHistTableMap::COL_CSTK_CONSIGN] = true;
        }

        return $this;
    } // setCstkConsign()

    /**
     * Set the value of [manufacturer] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setManufacturer($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->manufacturer !== $v) {
            $this->manufacturer = $v;
            $this->modifiedColumns[OeHistTableMap::COL_MANUFACTURER] = true;
        }

        return $this;
    } // setManufacturer()

    /**
     * Set the value of [pick_queue] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setPickQueue($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pick_queue !== $v) {
            $this->pick_queue = $v;
            $this->modifiedColumns[OeHistTableMap::COL_PICK_QUEUE] = true;
        }

        return $this;
    } // setPickQueue()

    /**
     * Set the value of [arrive_date] column.
     *
     * @param int $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setArriveDate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->arrive_date !== $v) {
            $this->arrive_date = $v;
            $this->modifiedColumns[OeHistTableMap::COL_ARRIVE_DATE] = true;
        }

        return $this;
    } // setArriveDate()

    /**
     * Set the value of [surcharge_status] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setSurchargeStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->surcharge_status !== $v) {
            $this->surcharge_status = $v;
            $this->modifiedColumns[OeHistTableMap::COL_SURCHARGE_STATUS] = true;
        }

        return $this;
    } // setSurchargeStatus()

    /**
     * Set the value of [freight_group] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setFreightGroup($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->freight_group !== $v) {
            $this->freight_group = $v;
            $this->modifiedColumns[OeHistTableMap::COL_FREIGHT_GROUP] = true;
        }

        return $this;
    } // setFreightGroup()

    /**
     * Set the value of [comm_override] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setCommOverride($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->comm_override !== $v) {
            $this->comm_override = $v;
            $this->modifiedColumns[OeHistTableMap::COL_COMM_OVERRIDE] = true;
        }

        return $this;
    } // setCommOverride()

    /**
     * Set the value of [charge_split] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setChargeSplit($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->charge_split !== $v) {
            $this->charge_split = $v;
            $this->modifiedColumns[OeHistTableMap::COL_CHARGE_SPLIT] = true;
        }

        return $this;
    } // setChargeSplit()

    /**
     * Set the value of [creditcart_approved] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setCreditcartApproved($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->creditcart_approved !== $v) {
            $this->creditcart_approved = $v;
            $this->modifiedColumns[OeHistTableMap::COL_CREDITCART_APPROVED] = true;
        }

        return $this;
    } // setCreditcartApproved()

    /**
     * Set the value of [original_ordernumber] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setOriginalOrdernumber($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->original_ordernumber !== $v) {
            $this->original_ordernumber = $v;
            $this->modifiedColumns[OeHistTableMap::COL_ORIGINAL_ORDERNUMBER] = true;
        }

        return $this;
    } // setOriginalOrdernumber()

    /**
     * Set the value of [has_notes] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setHasNotes($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->has_notes !== $v) {
            $this->has_notes = $v;
            $this->modifiedColumns[OeHistTableMap::COL_HAS_NOTES] = true;
        }

        return $this;
    } // setHasNotes()

    /**
     * Set the value of [has_documents] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setHasDocuments($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->has_documents !== $v) {
            $this->has_documents = $v;
            $this->modifiedColumns[OeHistTableMap::COL_HAS_DOCUMENTS] = true;
        }

        return $this;
    } // setHasDocuments()

    /**
     * Set the value of [has_tracking] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setHasTracking($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->has_tracking !== $v) {
            $this->has_tracking = $v;
            $this->modifiedColumns[OeHistTableMap::COL_HAS_TRACKING] = true;
        }

        return $this;
    } // setHasTracking()

    /**
     * Set the value of [date] column.
     *
     * @param int $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setDate($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->date !== $v) {
            $this->date = $v;
            $this->modifiedColumns[OeHistTableMap::COL_DATE] = true;
        }

        return $this;
    } // setDate()

    /**
     * Set the value of [time] column.
     *
     * @param int $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setTime($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->time !== $v) {
            $this->time = $v;
            $this->modifiedColumns[OeHistTableMap::COL_TIME] = true;
        }

        return $this;
    } // setTime()

    /**
     * Set the value of [dummy] column.
     *
     * @param string $v new value
     * @return $this|\OeHist The current object (for fluent API support)
     */
    public function setDummy($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->dummy !== $v) {
            $this->dummy = $v;
            $this->modifiedColumns[OeHistTableMap::COL_DUMMY] = true;
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : OeHistTableMap::translateFieldName('Orderno', TableMap::TYPE_PHPNAME, $indexType)];
            $this->orderno = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : OeHistTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : OeHistTableMap::translateFieldName('Holdstatus', TableMap::TYPE_PHPNAME, $indexType)];
            $this->holdstatus = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : OeHistTableMap::translateFieldName('Custid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->custid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : OeHistTableMap::translateFieldName('Shiptoid', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shiptoid = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : OeHistTableMap::translateFieldName('ShiptoName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipto_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : OeHistTableMap::translateFieldName('ShiptoAddress1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipto_address1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : OeHistTableMap::translateFieldName('ShiptoAddress2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipto_address2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : OeHistTableMap::translateFieldName('ShiptoAddress3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipto_address3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : OeHistTableMap::translateFieldName('ShiptoAddress4', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipto_address4 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : OeHistTableMap::translateFieldName('ShiptoCity', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipto_city = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : OeHistTableMap::translateFieldName('ShiptoState', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipto_state = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : OeHistTableMap::translateFieldName('ShiptoZip', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipto_zip = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : OeHistTableMap::translateFieldName('Custpo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->custpo = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : OeHistTableMap::translateFieldName('Orderdate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->orderdate = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : OeHistTableMap::translateFieldName('Termcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->termcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : OeHistTableMap::translateFieldName('Shipviacode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipviacode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : OeHistTableMap::translateFieldName('InvoiceNumber', TableMap::TYPE_PHPNAME, $indexType)];
            $this->invoice_number = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : OeHistTableMap::translateFieldName('InvoiceDate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->invoice_date = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : OeHistTableMap::translateFieldName('GenledgerPeriod', TableMap::TYPE_PHPNAME, $indexType)];
            $this->genledger_period = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : OeHistTableMap::translateFieldName('Salesperson1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salesperson_1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : OeHistTableMap::translateFieldName('Salesperson1pct', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salesperson_1pct = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : OeHistTableMap::translateFieldName('Salesperson2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salesperson_2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : OeHistTableMap::translateFieldName('Salesperson2pct', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salesperson_2pct = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : OeHistTableMap::translateFieldName('Salesperson3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salesperson_3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : OeHistTableMap::translateFieldName('Salesperson3pct', TableMap::TYPE_PHPNAME, $indexType)];
            $this->salesperson_3pct = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : OeHistTableMap::translateFieldName('ContractNbr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->contract_nbr = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : OeHistTableMap::translateFieldName('BatchNbr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->batch_nbr = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 28 + $startcol : OeHistTableMap::translateFieldName('Dropreleasehold', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dropreleasehold = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 29 + $startcol : OeHistTableMap::translateFieldName('SubtotalTax', TableMap::TYPE_PHPNAME, $indexType)];
            $this->subtotal_tax = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 30 + $startcol : OeHistTableMap::translateFieldName('SubtotalNontax', TableMap::TYPE_PHPNAME, $indexType)];
            $this->subtotal_nontax = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 31 + $startcol : OeHistTableMap::translateFieldName('TotalTax', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total_tax = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 32 + $startcol : OeHistTableMap::translateFieldName('TotalFreight', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total_freight = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 33 + $startcol : OeHistTableMap::translateFieldName('TotalMisc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total_misc = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 34 + $startcol : OeHistTableMap::translateFieldName('TotalOrder', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total_order = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 35 + $startcol : OeHistTableMap::translateFieldName('TotalCost', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total_cost = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 36 + $startcol : OeHistTableMap::translateFieldName('Lock', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lock = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 37 + $startcol : OeHistTableMap::translateFieldName('TakenDate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->taken_date = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 38 + $startcol : OeHistTableMap::translateFieldName('TakenTime', TableMap::TYPE_PHPNAME, $indexType)];
            $this->taken_time = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 39 + $startcol : OeHistTableMap::translateFieldName('PickDate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pick_date = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 40 + $startcol : OeHistTableMap::translateFieldName('PickTime', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pick_time = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 41 + $startcol : OeHistTableMap::translateFieldName('PackDate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pack_date = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 42 + $startcol : OeHistTableMap::translateFieldName('PackTime', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pack_time = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 43 + $startcol : OeHistTableMap::translateFieldName('VerifyDate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->verify_date = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 44 + $startcol : OeHistTableMap::translateFieldName('VerifyTime', TableMap::TYPE_PHPNAME, $indexType)];
            $this->verify_time = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 45 + $startcol : OeHistTableMap::translateFieldName('Creditmemo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->creditmemo = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 46 + $startcol : OeHistTableMap::translateFieldName('Booked', TableMap::TYPE_PHPNAME, $indexType)];
            $this->booked = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 47 + $startcol : OeHistTableMap::translateFieldName('OriginalWhse', TableMap::TYPE_PHPNAME, $indexType)];
            $this->original_whse = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 48 + $startcol : OeHistTableMap::translateFieldName('BilltoState', TableMap::TYPE_PHPNAME, $indexType)];
            $this->billto_state = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 49 + $startcol : OeHistTableMap::translateFieldName('Shipcomplete', TableMap::TYPE_PHPNAME, $indexType)];
            $this->shipcomplete = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 50 + $startcol : OeHistTableMap::translateFieldName('CwoFlag', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cwo_flag = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 51 + $startcol : OeHistTableMap::translateFieldName('Division', TableMap::TYPE_PHPNAME, $indexType)];
            $this->division = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 52 + $startcol : OeHistTableMap::translateFieldName('TakenCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->taken_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 53 + $startcol : OeHistTableMap::translateFieldName('PackCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pack_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 54 + $startcol : OeHistTableMap::translateFieldName('PickCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pick_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 55 + $startcol : OeHistTableMap::translateFieldName('VerifyCode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->verify_code = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 56 + $startcol : OeHistTableMap::translateFieldName('TotalDiscount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total_discount = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 57 + $startcol : OeHistTableMap::translateFieldName('EdiRefererencenbr', TableMap::TYPE_PHPNAME, $indexType)];
            $this->edi_refererencenbr = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 58 + $startcol : OeHistTableMap::translateFieldName('UserCode1', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_code1 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 59 + $startcol : OeHistTableMap::translateFieldName('UserCode2', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_code2 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 60 + $startcol : OeHistTableMap::translateFieldName('UserCode3', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_code3 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 61 + $startcol : OeHistTableMap::translateFieldName('UserCode4', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_code4 = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 62 + $startcol : OeHistTableMap::translateFieldName('ExchangeCountry', TableMap::TYPE_PHPNAME, $indexType)];
            $this->exchange_country = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 63 + $startcol : OeHistTableMap::translateFieldName('ExchangeRate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->exchange_rate = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 64 + $startcol : OeHistTableMap::translateFieldName('WeightTotal', TableMap::TYPE_PHPNAME, $indexType)];
            $this->weight_total = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 65 + $startcol : OeHistTableMap::translateFieldName('WeightOverride', TableMap::TYPE_PHPNAME, $indexType)];
            $this->weight_override = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 66 + $startcol : OeHistTableMap::translateFieldName('BoxCount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->box_count = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 67 + $startcol : OeHistTableMap::translateFieldName('RequestDate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->request_date = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 68 + $startcol : OeHistTableMap::translateFieldName('CancelDate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cancel_date = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 69 + $startcol : OeHistTableMap::translateFieldName('Lockedby', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lockedby = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 70 + $startcol : OeHistTableMap::translateFieldName('ReleaseNumber', TableMap::TYPE_PHPNAME, $indexType)];
            $this->release_number = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 71 + $startcol : OeHistTableMap::translateFieldName('Whse', TableMap::TYPE_PHPNAME, $indexType)];
            $this->whse = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 72 + $startcol : OeHistTableMap::translateFieldName('BackorderDate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->backorder_date = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 73 + $startcol : OeHistTableMap::translateFieldName('Deptcode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->deptcode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 74 + $startcol : OeHistTableMap::translateFieldName('FreightInEntered', TableMap::TYPE_PHPNAME, $indexType)];
            $this->freight_in_entered = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 75 + $startcol : OeHistTableMap::translateFieldName('DropshipEntered', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dropship_entered = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 76 + $startcol : OeHistTableMap::translateFieldName('ErFlag', TableMap::TYPE_PHPNAME, $indexType)];
            $this->er_flag = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 77 + $startcol : OeHistTableMap::translateFieldName('FreightIn', TableMap::TYPE_PHPNAME, $indexType)];
            $this->freight_in = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 78 + $startcol : OeHistTableMap::translateFieldName('Dropship', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dropship = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 79 + $startcol : OeHistTableMap::translateFieldName('Minorder', TableMap::TYPE_PHPNAME, $indexType)];
            $this->minorder = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 80 + $startcol : OeHistTableMap::translateFieldName('ContractTerms', TableMap::TYPE_PHPNAME, $indexType)];
            $this->contract_terms = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 81 + $startcol : OeHistTableMap::translateFieldName('DropshipBilled', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dropship_billed = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 82 + $startcol : OeHistTableMap::translateFieldName('OrderType', TableMap::TYPE_PHPNAME, $indexType)];
            $this->order_type = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 83 + $startcol : OeHistTableMap::translateFieldName('TrackingEdinumber', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tracking_edinumber = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 84 + $startcol : OeHistTableMap::translateFieldName('Source', TableMap::TYPE_PHPNAME, $indexType)];
            $this->source = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 85 + $startcol : OeHistTableMap::translateFieldName('PickFormat', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pick_format = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 86 + $startcol : OeHistTableMap::translateFieldName('InvoiceFormat', TableMap::TYPE_PHPNAME, $indexType)];
            $this->invoice_format = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 87 + $startcol : OeHistTableMap::translateFieldName('CashAmount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cash_amount = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 88 + $startcol : OeHistTableMap::translateFieldName('CheckAmount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->check_amount = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 89 + $startcol : OeHistTableMap::translateFieldName('CheckNumber', TableMap::TYPE_PHPNAME, $indexType)];
            $this->check_number = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 90 + $startcol : OeHistTableMap::translateFieldName('DepositAmount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->deposit_amount = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 91 + $startcol : OeHistTableMap::translateFieldName('DepositNumber', TableMap::TYPE_PHPNAME, $indexType)];
            $this->deposit_number = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 92 + $startcol : OeHistTableMap::translateFieldName('OriginalSubtotalTax', TableMap::TYPE_PHPNAME, $indexType)];
            $this->original_subtotal_tax = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 93 + $startcol : OeHistTableMap::translateFieldName('OriginalSubtotalNontax', TableMap::TYPE_PHPNAME, $indexType)];
            $this->original_subtotal_nontax = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 94 + $startcol : OeHistTableMap::translateFieldName('OriginalTotalTax', TableMap::TYPE_PHPNAME, $indexType)];
            $this->original_total_tax = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 95 + $startcol : OeHistTableMap::translateFieldName('OriginalTotal', TableMap::TYPE_PHPNAME, $indexType)];
            $this->original_total = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 96 + $startcol : OeHistTableMap::translateFieldName('PickPrintdate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pick_printdate = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 97 + $startcol : OeHistTableMap::translateFieldName('PickPrinttime', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pick_printtime = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 98 + $startcol : OeHistTableMap::translateFieldName('Contact', TableMap::TYPE_PHPNAME, $indexType)];
            $this->contact = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 99 + $startcol : OeHistTableMap::translateFieldName('PhoneIntl', TableMap::TYPE_PHPNAME, $indexType)];
            $this->phone_intl = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 100 + $startcol : OeHistTableMap::translateFieldName('PhoneAccesscode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->phone_accesscode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 101 + $startcol : OeHistTableMap::translateFieldName('PhoneCountrycode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->phone_countrycode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 102 + $startcol : OeHistTableMap::translateFieldName('Phone', TableMap::TYPE_PHPNAME, $indexType)];
            $this->phone = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 103 + $startcol : OeHistTableMap::translateFieldName('PhoneExt', TableMap::TYPE_PHPNAME, $indexType)];
            $this->phone_ext = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 104 + $startcol : OeHistTableMap::translateFieldName('FaxIntl', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fax_intl = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 105 + $startcol : OeHistTableMap::translateFieldName('FaxAccesscode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fax_accesscode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 106 + $startcol : OeHistTableMap::translateFieldName('FaxCountrycode', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fax_countrycode = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 107 + $startcol : OeHistTableMap::translateFieldName('Fax', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fax = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 108 + $startcol : OeHistTableMap::translateFieldName('ShipAccount', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ship_account = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 109 + $startcol : OeHistTableMap::translateFieldName('ChangeDue', TableMap::TYPE_PHPNAME, $indexType)];
            $this->change_due = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 110 + $startcol : OeHistTableMap::translateFieldName('DiscountAdditional', TableMap::TYPE_PHPNAME, $indexType)];
            $this->discount_additional = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 111 + $startcol : OeHistTableMap::translateFieldName('AllShip', TableMap::TYPE_PHPNAME, $indexType)];
            $this->all_ship = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 112 + $startcol : OeHistTableMap::translateFieldName('CreditApplied', TableMap::TYPE_PHPNAME, $indexType)];
            $this->credit_applied = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 113 + $startcol : OeHistTableMap::translateFieldName('InvoicePrintdate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->invoice_printdate = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 114 + $startcol : OeHistTableMap::translateFieldName('InvoicePrinttime', TableMap::TYPE_PHPNAME, $indexType)];
            $this->invoice_printtime = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 115 + $startcol : OeHistTableMap::translateFieldName('DiscountFreight', TableMap::TYPE_PHPNAME, $indexType)];
            $this->discount_freight = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 116 + $startcol : OeHistTableMap::translateFieldName('ShipCompleteoverride', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ship_completeoverride = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 117 + $startcol : OeHistTableMap::translateFieldName('ContactEmail', TableMap::TYPE_PHPNAME, $indexType)];
            $this->contact_email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 118 + $startcol : OeHistTableMap::translateFieldName('ManualFreight', TableMap::TYPE_PHPNAME, $indexType)];
            $this->manual_freight = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 119 + $startcol : OeHistTableMap::translateFieldName('InternalFreight', TableMap::TYPE_PHPNAME, $indexType)];
            $this->internal_freight = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 120 + $startcol : OeHistTableMap::translateFieldName('CostFreight', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cost_freight = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 121 + $startcol : OeHistTableMap::translateFieldName('Route', TableMap::TYPE_PHPNAME, $indexType)];
            $this->route = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 122 + $startcol : OeHistTableMap::translateFieldName('RouteSeq', TableMap::TYPE_PHPNAME, $indexType)];
            $this->route_seq = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 123 + $startcol : OeHistTableMap::translateFieldName('Edi855sent', TableMap::TYPE_PHPNAME, $indexType)];
            $this->edi_855sent = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 124 + $startcol : OeHistTableMap::translateFieldName('Freight3rdparty', TableMap::TYPE_PHPNAME, $indexType)];
            $this->freight_3rdparty = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 125 + $startcol : OeHistTableMap::translateFieldName('Fob', TableMap::TYPE_PHPNAME, $indexType)];
            $this->fob = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 126 + $startcol : OeHistTableMap::translateFieldName('ConfirmImage', TableMap::TYPE_PHPNAME, $indexType)];
            $this->confirm_image = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 127 + $startcol : OeHistTableMap::translateFieldName('CstkConsign', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cstk_consign = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 128 + $startcol : OeHistTableMap::translateFieldName('Manufacturer', TableMap::TYPE_PHPNAME, $indexType)];
            $this->manufacturer = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 129 + $startcol : OeHistTableMap::translateFieldName('PickQueue', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pick_queue = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 130 + $startcol : OeHistTableMap::translateFieldName('ArriveDate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->arrive_date = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 131 + $startcol : OeHistTableMap::translateFieldName('SurchargeStatus', TableMap::TYPE_PHPNAME, $indexType)];
            $this->surcharge_status = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 132 + $startcol : OeHistTableMap::translateFieldName('FreightGroup', TableMap::TYPE_PHPNAME, $indexType)];
            $this->freight_group = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 133 + $startcol : OeHistTableMap::translateFieldName('CommOverride', TableMap::TYPE_PHPNAME, $indexType)];
            $this->comm_override = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 134 + $startcol : OeHistTableMap::translateFieldName('ChargeSplit', TableMap::TYPE_PHPNAME, $indexType)];
            $this->charge_split = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 135 + $startcol : OeHistTableMap::translateFieldName('CreditcartApproved', TableMap::TYPE_PHPNAME, $indexType)];
            $this->creditcart_approved = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 136 + $startcol : OeHistTableMap::translateFieldName('OriginalOrdernumber', TableMap::TYPE_PHPNAME, $indexType)];
            $this->original_ordernumber = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 137 + $startcol : OeHistTableMap::translateFieldName('HasNotes', TableMap::TYPE_PHPNAME, $indexType)];
            $this->has_notes = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 138 + $startcol : OeHistTableMap::translateFieldName('HasDocuments', TableMap::TYPE_PHPNAME, $indexType)];
            $this->has_documents = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 139 + $startcol : OeHistTableMap::translateFieldName('HasTracking', TableMap::TYPE_PHPNAME, $indexType)];
            $this->has_tracking = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 140 + $startcol : OeHistTableMap::translateFieldName('Date', TableMap::TYPE_PHPNAME, $indexType)];
            $this->date = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 141 + $startcol : OeHistTableMap::translateFieldName('Time', TableMap::TYPE_PHPNAME, $indexType)];
            $this->time = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 142 + $startcol : OeHistTableMap::translateFieldName('Dummy', TableMap::TYPE_PHPNAME, $indexType)];
            $this->dummy = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 143; // 143 = OeHistTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\OeHist'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(OeHistTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildOeHistQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
     * @see OeHist::setDeleted()
     * @see OeHist::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(OeHistTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildOeHistQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(OeHistTableMap::DATABASE_NAME);
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
                OeHistTableMap::addInstanceToPool($this);
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
        if ($this->isColumnModified(OeHistTableMap::COL_ORDERNO)) {
            $modifiedColumns[':p' . $index++]  = 'orderno';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'status';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_HOLDSTATUS)) {
            $modifiedColumns[':p' . $index++]  = 'holdstatus';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_CUSTID)) {
            $modifiedColumns[':p' . $index++]  = 'custid';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SHIPTOID)) {
            $modifiedColumns[':p' . $index++]  = 'shiptoid';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SHIPTO_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'shipto_name';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SHIPTO_ADDRESS1)) {
            $modifiedColumns[':p' . $index++]  = 'shipto_address1';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SHIPTO_ADDRESS2)) {
            $modifiedColumns[':p' . $index++]  = 'shipto_address2';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SHIPTO_ADDRESS3)) {
            $modifiedColumns[':p' . $index++]  = 'shipto_address3';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SHIPTO_ADDRESS4)) {
            $modifiedColumns[':p' . $index++]  = 'shipto_address4';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SHIPTO_CITY)) {
            $modifiedColumns[':p' . $index++]  = 'shipto_city';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SHIPTO_STATE)) {
            $modifiedColumns[':p' . $index++]  = 'shipto_state';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SHIPTO_ZIP)) {
            $modifiedColumns[':p' . $index++]  = 'shipto_zip';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_CUSTPO)) {
            $modifiedColumns[':p' . $index++]  = 'custpo';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_ORDERDATE)) {
            $modifiedColumns[':p' . $index++]  = 'orderdate';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_TERMCODE)) {
            $modifiedColumns[':p' . $index++]  = 'termcode';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SHIPVIACODE)) {
            $modifiedColumns[':p' . $index++]  = 'shipviacode';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_INVOICE_NUMBER)) {
            $modifiedColumns[':p' . $index++]  = 'invoice_number';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_INVOICE_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'invoice_date';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_GENLEDGER_PERIOD)) {
            $modifiedColumns[':p' . $index++]  = 'genledger_period';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SALESPERSON_1)) {
            $modifiedColumns[':p' . $index++]  = 'salesperson_1';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SALESPERSON_1PCT)) {
            $modifiedColumns[':p' . $index++]  = 'salesperson_1pct';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SALESPERSON_2)) {
            $modifiedColumns[':p' . $index++]  = 'salesperson_2';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SALESPERSON_2PCT)) {
            $modifiedColumns[':p' . $index++]  = 'salesperson_2pct';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SALESPERSON_3)) {
            $modifiedColumns[':p' . $index++]  = 'salesperson_3';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SALESPERSON_3PCT)) {
            $modifiedColumns[':p' . $index++]  = 'salesperson_3pct';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_CONTRACT_NBR)) {
            $modifiedColumns[':p' . $index++]  = 'contract_nbr';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_BATCH_NBR)) {
            $modifiedColumns[':p' . $index++]  = 'batch_nbr';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_DROPRELEASEHOLD)) {
            $modifiedColumns[':p' . $index++]  = 'dropreleasehold';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SUBTOTAL_TAX)) {
            $modifiedColumns[':p' . $index++]  = 'subtotal_tax';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SUBTOTAL_NONTAX)) {
            $modifiedColumns[':p' . $index++]  = 'subtotal_nontax';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_TOTAL_TAX)) {
            $modifiedColumns[':p' . $index++]  = 'total_tax';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_TOTAL_FREIGHT)) {
            $modifiedColumns[':p' . $index++]  = 'total_freight';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_TOTAL_MISC)) {
            $modifiedColumns[':p' . $index++]  = 'total_misc';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_TOTAL_ORDER)) {
            $modifiedColumns[':p' . $index++]  = 'total_order';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_TOTAL_COST)) {
            $modifiedColumns[':p' . $index++]  = 'total_cost';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_LOCK)) {
            $modifiedColumns[':p' . $index++]  = 'lock';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_TAKEN_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'taken_date';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_TAKEN_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'taken_time';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_PICK_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'pick_date';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_PICK_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'pick_time';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_PACK_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'pack_date';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_PACK_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'pack_time';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_VERIFY_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'verify_date';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_VERIFY_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'verify_time';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_CREDITMEMO)) {
            $modifiedColumns[':p' . $index++]  = 'creditmemo';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_BOOKED)) {
            $modifiedColumns[':p' . $index++]  = 'booked';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_ORIGINAL_WHSE)) {
            $modifiedColumns[':p' . $index++]  = 'original_whse';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_BILLTO_STATE)) {
            $modifiedColumns[':p' . $index++]  = 'billto_state';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SHIPCOMPLETE)) {
            $modifiedColumns[':p' . $index++]  = 'shipcomplete';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_CWO_FLAG)) {
            $modifiedColumns[':p' . $index++]  = 'cwo_flag';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_DIVISION)) {
            $modifiedColumns[':p' . $index++]  = 'division';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_TAKEN_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'taken_code';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_PACK_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'pack_code';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_PICK_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'pick_code';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_VERIFY_CODE)) {
            $modifiedColumns[':p' . $index++]  = 'verify_code';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_TOTAL_DISCOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'total_discount';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_EDI_REFERERENCENBR)) {
            $modifiedColumns[':p' . $index++]  = 'edi_refererencenbr';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_USER_CODE1)) {
            $modifiedColumns[':p' . $index++]  = 'user_code1';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_USER_CODE2)) {
            $modifiedColumns[':p' . $index++]  = 'user_code2';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_USER_CODE3)) {
            $modifiedColumns[':p' . $index++]  = 'user_code3';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_USER_CODE4)) {
            $modifiedColumns[':p' . $index++]  = 'user_code4';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_EXCHANGE_COUNTRY)) {
            $modifiedColumns[':p' . $index++]  = 'exchange_country';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_EXCHANGE_RATE)) {
            $modifiedColumns[':p' . $index++]  = 'exchange_rate';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_WEIGHT_TOTAL)) {
            $modifiedColumns[':p' . $index++]  = 'weight_total';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_WEIGHT_OVERRIDE)) {
            $modifiedColumns[':p' . $index++]  = 'weight_override';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_BOX_COUNT)) {
            $modifiedColumns[':p' . $index++]  = 'box_count';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_REQUEST_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'request_date';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_CANCEL_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'cancel_date';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_LOCKEDBY)) {
            $modifiedColumns[':p' . $index++]  = 'lockedby';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_RELEASE_NUMBER)) {
            $modifiedColumns[':p' . $index++]  = 'release_number';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_WHSE)) {
            $modifiedColumns[':p' . $index++]  = 'whse';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_BACKORDER_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'backorder_date';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_DEPTCODE)) {
            $modifiedColumns[':p' . $index++]  = 'deptcode';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_FREIGHT_IN_ENTERED)) {
            $modifiedColumns[':p' . $index++]  = 'freight_in_entered';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_DROPSHIP_ENTERED)) {
            $modifiedColumns[':p' . $index++]  = 'dropship_entered';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_ER_FLAG)) {
            $modifiedColumns[':p' . $index++]  = 'er_flag';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_FREIGHT_IN)) {
            $modifiedColumns[':p' . $index++]  = 'freight_in';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_DROPSHIP)) {
            $modifiedColumns[':p' . $index++]  = 'dropship';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_MINORDER)) {
            $modifiedColumns[':p' . $index++]  = 'minorder';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_CONTRACT_TERMS)) {
            $modifiedColumns[':p' . $index++]  = 'contract_terms';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_DROPSHIP_BILLED)) {
            $modifiedColumns[':p' . $index++]  = 'dropship_billed';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_ORDER_TYPE)) {
            $modifiedColumns[':p' . $index++]  = 'order_type';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_TRACKING_EDINUMBER)) {
            $modifiedColumns[':p' . $index++]  = 'tracking_edinumber';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SOURCE)) {
            $modifiedColumns[':p' . $index++]  = 'source';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_PICK_FORMAT)) {
            $modifiedColumns[':p' . $index++]  = 'pick_format';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_INVOICE_FORMAT)) {
            $modifiedColumns[':p' . $index++]  = 'invoice_format';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_CASH_AMOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'cash_amount';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_CHECK_AMOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'check_amount';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_CHECK_NUMBER)) {
            $modifiedColumns[':p' . $index++]  = 'check_number';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_DEPOSIT_AMOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'deposit_amount';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_DEPOSIT_NUMBER)) {
            $modifiedColumns[':p' . $index++]  = 'deposit_number';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_ORIGINAL_SUBTOTAL_TAX)) {
            $modifiedColumns[':p' . $index++]  = 'original_subtotal_tax';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_ORIGINAL_SUBTOTAL_NONTAX)) {
            $modifiedColumns[':p' . $index++]  = 'original_subtotal_nontax';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_ORIGINAL_TOTAL_TAX)) {
            $modifiedColumns[':p' . $index++]  = 'original_total_tax';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_ORIGINAL_TOTAL)) {
            $modifiedColumns[':p' . $index++]  = 'original_total';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_PICK_PRINTDATE)) {
            $modifiedColumns[':p' . $index++]  = 'pick_printdate';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_PICK_PRINTTIME)) {
            $modifiedColumns[':p' . $index++]  = 'pick_printtime';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_CONTACT)) {
            $modifiedColumns[':p' . $index++]  = 'contact';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_PHONE_INTL)) {
            $modifiedColumns[':p' . $index++]  = 'phone_intl';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_PHONE_ACCESSCODE)) {
            $modifiedColumns[':p' . $index++]  = 'phone_accesscode';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_PHONE_COUNTRYCODE)) {
            $modifiedColumns[':p' . $index++]  = 'phone_countrycode';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_PHONE)) {
            $modifiedColumns[':p' . $index++]  = 'phone';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_PHONE_EXT)) {
            $modifiedColumns[':p' . $index++]  = 'phone_ext';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_FAX_INTL)) {
            $modifiedColumns[':p' . $index++]  = 'fax_intl';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_FAX_ACCESSCODE)) {
            $modifiedColumns[':p' . $index++]  = 'fax_accesscode';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_FAX_COUNTRYCODE)) {
            $modifiedColumns[':p' . $index++]  = 'fax_countrycode';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_FAX)) {
            $modifiedColumns[':p' . $index++]  = 'fax';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SHIP_ACCOUNT)) {
            $modifiedColumns[':p' . $index++]  = 'ship_account';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_CHANGE_DUE)) {
            $modifiedColumns[':p' . $index++]  = 'change_due';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_DISCOUNT_ADDITIONAL)) {
            $modifiedColumns[':p' . $index++]  = 'discount_additional';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_ALL_SHIP)) {
            $modifiedColumns[':p' . $index++]  = 'all_ship';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_CREDIT_APPLIED)) {
            $modifiedColumns[':p' . $index++]  = 'credit_applied';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_INVOICE_PRINTDATE)) {
            $modifiedColumns[':p' . $index++]  = 'invoice_printdate';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_INVOICE_PRINTTIME)) {
            $modifiedColumns[':p' . $index++]  = 'invoice_printtime';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_DISCOUNT_FREIGHT)) {
            $modifiedColumns[':p' . $index++]  = 'discount_freight';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SHIP_COMPLETEOVERRIDE)) {
            $modifiedColumns[':p' . $index++]  = 'ship_completeoverride';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_CONTACT_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'contact_email';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_MANUAL_FREIGHT)) {
            $modifiedColumns[':p' . $index++]  = 'manual_freight';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_INTERNAL_FREIGHT)) {
            $modifiedColumns[':p' . $index++]  = 'internal_freight';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_COST_FREIGHT)) {
            $modifiedColumns[':p' . $index++]  = 'cost_freight';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_ROUTE)) {
            $modifiedColumns[':p' . $index++]  = 'route';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_ROUTE_SEQ)) {
            $modifiedColumns[':p' . $index++]  = 'route_seq';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_EDI_855SENT)) {
            $modifiedColumns[':p' . $index++]  = 'edi_855sent';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_FREIGHT_3RDPARTY)) {
            $modifiedColumns[':p' . $index++]  = 'freight_3rdparty';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_FOB)) {
            $modifiedColumns[':p' . $index++]  = 'fob';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_CONFIRM_IMAGE)) {
            $modifiedColumns[':p' . $index++]  = 'confirm_image';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_CSTK_CONSIGN)) {
            $modifiedColumns[':p' . $index++]  = 'cstk_consign';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_MANUFACTURER)) {
            $modifiedColumns[':p' . $index++]  = 'manufacturer';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_PICK_QUEUE)) {
            $modifiedColumns[':p' . $index++]  = 'pick_queue';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_ARRIVE_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'arrive_date';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SURCHARGE_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'surcharge_status';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_FREIGHT_GROUP)) {
            $modifiedColumns[':p' . $index++]  = 'freight_group';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_COMM_OVERRIDE)) {
            $modifiedColumns[':p' . $index++]  = 'comm_override';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_CHARGE_SPLIT)) {
            $modifiedColumns[':p' . $index++]  = 'charge_split';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_CREDITCART_APPROVED)) {
            $modifiedColumns[':p' . $index++]  = 'creditcart_approved';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_ORIGINAL_ORDERNUMBER)) {
            $modifiedColumns[':p' . $index++]  = 'original_ordernumber';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_HAS_NOTES)) {
            $modifiedColumns[':p' . $index++]  = 'has_notes';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_HAS_DOCUMENTS)) {
            $modifiedColumns[':p' . $index++]  = 'has_documents';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_HAS_TRACKING)) {
            $modifiedColumns[':p' . $index++]  = 'has_tracking';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_DATE)) {
            $modifiedColumns[':p' . $index++]  = 'date';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_TIME)) {
            $modifiedColumns[':p' . $index++]  = 'time';
        }
        if ($this->isColumnModified(OeHistTableMap::COL_DUMMY)) {
            $modifiedColumns[':p' . $index++]  = 'dummy';
        }

        $sql = sprintf(
            'INSERT INTO oe_hist (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'orderno':
                        $stmt->bindValue($identifier, $this->orderno, PDO::PARAM_INT);
                        break;
                    case 'status':
                        $stmt->bindValue($identifier, $this->status, PDO::PARAM_STR);
                        break;
                    case 'holdstatus':
                        $stmt->bindValue($identifier, $this->holdstatus, PDO::PARAM_STR);
                        break;
                    case 'custid':
                        $stmt->bindValue($identifier, $this->custid, PDO::PARAM_STR);
                        break;
                    case 'shiptoid':
                        $stmt->bindValue($identifier, $this->shiptoid, PDO::PARAM_STR);
                        break;
                    case 'shipto_name':
                        $stmt->bindValue($identifier, $this->shipto_name, PDO::PARAM_STR);
                        break;
                    case 'shipto_address1':
                        $stmt->bindValue($identifier, $this->shipto_address1, PDO::PARAM_STR);
                        break;
                    case 'shipto_address2':
                        $stmt->bindValue($identifier, $this->shipto_address2, PDO::PARAM_STR);
                        break;
                    case 'shipto_address3':
                        $stmt->bindValue($identifier, $this->shipto_address3, PDO::PARAM_STR);
                        break;
                    case 'shipto_address4':
                        $stmt->bindValue($identifier, $this->shipto_address4, PDO::PARAM_STR);
                        break;
                    case 'shipto_city':
                        $stmt->bindValue($identifier, $this->shipto_city, PDO::PARAM_STR);
                        break;
                    case 'shipto_state':
                        $stmt->bindValue($identifier, $this->shipto_state, PDO::PARAM_STR);
                        break;
                    case 'shipto_zip':
                        $stmt->bindValue($identifier, $this->shipto_zip, PDO::PARAM_STR);
                        break;
                    case 'custpo':
                        $stmt->bindValue($identifier, $this->custpo, PDO::PARAM_STR);
                        break;
                    case 'orderdate':
                        $stmt->bindValue($identifier, $this->orderdate, PDO::PARAM_INT);
                        break;
                    case 'termcode':
                        $stmt->bindValue($identifier, $this->termcode, PDO::PARAM_STR);
                        break;
                    case 'shipviacode':
                        $stmt->bindValue($identifier, $this->shipviacode, PDO::PARAM_STR);
                        break;
                    case 'invoice_number':
                        $stmt->bindValue($identifier, $this->invoice_number, PDO::PARAM_INT);
                        break;
                    case 'invoice_date':
                        $stmt->bindValue($identifier, $this->invoice_date, PDO::PARAM_INT);
                        break;
                    case 'genledger_period':
                        $stmt->bindValue($identifier, $this->genledger_period, PDO::PARAM_INT);
                        break;
                    case 'salesperson_1':
                        $stmt->bindValue($identifier, $this->salesperson_1, PDO::PARAM_STR);
                        break;
                    case 'salesperson_1pct':
                        $stmt->bindValue($identifier, $this->salesperson_1pct, PDO::PARAM_STR);
                        break;
                    case 'salesperson_2':
                        $stmt->bindValue($identifier, $this->salesperson_2, PDO::PARAM_STR);
                        break;
                    case 'salesperson_2pct':
                        $stmt->bindValue($identifier, $this->salesperson_2pct, PDO::PARAM_STR);
                        break;
                    case 'salesperson_3':
                        $stmt->bindValue($identifier, $this->salesperson_3, PDO::PARAM_STR);
                        break;
                    case 'salesperson_3pct':
                        $stmt->bindValue($identifier, $this->salesperson_3pct, PDO::PARAM_STR);
                        break;
                    case 'contract_nbr':
                        $stmt->bindValue($identifier, $this->contract_nbr, PDO::PARAM_INT);
                        break;
                    case 'batch_nbr':
                        $stmt->bindValue($identifier, $this->batch_nbr, PDO::PARAM_INT);
                        break;
                    case 'dropreleasehold':
                        $stmt->bindValue($identifier, $this->dropreleasehold, PDO::PARAM_STR);
                        break;
                    case 'subtotal_tax':
                        $stmt->bindValue($identifier, $this->subtotal_tax, PDO::PARAM_STR);
                        break;
                    case 'subtotal_nontax':
                        $stmt->bindValue($identifier, $this->subtotal_nontax, PDO::PARAM_STR);
                        break;
                    case 'total_tax':
                        $stmt->bindValue($identifier, $this->total_tax, PDO::PARAM_STR);
                        break;
                    case 'total_freight':
                        $stmt->bindValue($identifier, $this->total_freight, PDO::PARAM_STR);
                        break;
                    case 'total_misc':
                        $stmt->bindValue($identifier, $this->total_misc, PDO::PARAM_STR);
                        break;
                    case 'total_order':
                        $stmt->bindValue($identifier, $this->total_order, PDO::PARAM_STR);
                        break;
                    case 'total_cost':
                        $stmt->bindValue($identifier, $this->total_cost, PDO::PARAM_STR);
                        break;
                    case 'lock':
                        $stmt->bindValue($identifier, $this->lock, PDO::PARAM_STR);
                        break;
                    case 'taken_date':
                        $stmt->bindValue($identifier, $this->taken_date, PDO::PARAM_INT);
                        break;
                    case 'taken_time':
                        $stmt->bindValue($identifier, $this->taken_time, PDO::PARAM_INT);
                        break;
                    case 'pick_date':
                        $stmt->bindValue($identifier, $this->pick_date, PDO::PARAM_INT);
                        break;
                    case 'pick_time':
                        $stmt->bindValue($identifier, $this->pick_time, PDO::PARAM_INT);
                        break;
                    case 'pack_date':
                        $stmt->bindValue($identifier, $this->pack_date, PDO::PARAM_INT);
                        break;
                    case 'pack_time':
                        $stmt->bindValue($identifier, $this->pack_time, PDO::PARAM_INT);
                        break;
                    case 'verify_date':
                        $stmt->bindValue($identifier, $this->verify_date, PDO::PARAM_INT);
                        break;
                    case 'verify_time':
                        $stmt->bindValue($identifier, $this->verify_time, PDO::PARAM_INT);
                        break;
                    case 'creditmemo':
                        $stmt->bindValue($identifier, $this->creditmemo, PDO::PARAM_STR);
                        break;
                    case 'booked':
                        $stmt->bindValue($identifier, $this->booked, PDO::PARAM_STR);
                        break;
                    case 'original_whse':
                        $stmt->bindValue($identifier, $this->original_whse, PDO::PARAM_STR);
                        break;
                    case 'billto_state':
                        $stmt->bindValue($identifier, $this->billto_state, PDO::PARAM_STR);
                        break;
                    case 'shipcomplete':
                        $stmt->bindValue($identifier, $this->shipcomplete, PDO::PARAM_STR);
                        break;
                    case 'cwo_flag':
                        $stmt->bindValue($identifier, $this->cwo_flag, PDO::PARAM_STR);
                        break;
                    case 'division':
                        $stmt->bindValue($identifier, $this->division, PDO::PARAM_STR);
                        break;
                    case 'taken_code':
                        $stmt->bindValue($identifier, $this->taken_code, PDO::PARAM_STR);
                        break;
                    case 'pack_code':
                        $stmt->bindValue($identifier, $this->pack_code, PDO::PARAM_STR);
                        break;
                    case 'pick_code':
                        $stmt->bindValue($identifier, $this->pick_code, PDO::PARAM_STR);
                        break;
                    case 'verify_code':
                        $stmt->bindValue($identifier, $this->verify_code, PDO::PARAM_STR);
                        break;
                    case 'total_discount':
                        $stmt->bindValue($identifier, $this->total_discount, PDO::PARAM_STR);
                        break;
                    case 'edi_refererencenbr':
                        $stmt->bindValue($identifier, $this->edi_refererencenbr, PDO::PARAM_STR);
                        break;
                    case 'user_code1':
                        $stmt->bindValue($identifier, $this->user_code1, PDO::PARAM_STR);
                        break;
                    case 'user_code2':
                        $stmt->bindValue($identifier, $this->user_code2, PDO::PARAM_STR);
                        break;
                    case 'user_code3':
                        $stmt->bindValue($identifier, $this->user_code3, PDO::PARAM_STR);
                        break;
                    case 'user_code4':
                        $stmt->bindValue($identifier, $this->user_code4, PDO::PARAM_STR);
                        break;
                    case 'exchange_country':
                        $stmt->bindValue($identifier, $this->exchange_country, PDO::PARAM_STR);
                        break;
                    case 'exchange_rate':
                        $stmt->bindValue($identifier, $this->exchange_rate, PDO::PARAM_STR);
                        break;
                    case 'weight_total':
                        $stmt->bindValue($identifier, $this->weight_total, PDO::PARAM_STR);
                        break;
                    case 'weight_override':
                        $stmt->bindValue($identifier, $this->weight_override, PDO::PARAM_STR);
                        break;
                    case 'box_count':
                        $stmt->bindValue($identifier, $this->box_count, PDO::PARAM_INT);
                        break;
                    case 'request_date':
                        $stmt->bindValue($identifier, $this->request_date, PDO::PARAM_INT);
                        break;
                    case 'cancel_date':
                        $stmt->bindValue($identifier, $this->cancel_date, PDO::PARAM_INT);
                        break;
                    case 'lockedby':
                        $stmt->bindValue($identifier, $this->lockedby, PDO::PARAM_STR);
                        break;
                    case 'release_number':
                        $stmt->bindValue($identifier, $this->release_number, PDO::PARAM_STR);
                        break;
                    case 'whse':
                        $stmt->bindValue($identifier, $this->whse, PDO::PARAM_STR);
                        break;
                    case 'backorder_date':
                        $stmt->bindValue($identifier, $this->backorder_date, PDO::PARAM_INT);
                        break;
                    case 'deptcode':
                        $stmt->bindValue($identifier, $this->deptcode, PDO::PARAM_STR);
                        break;
                    case 'freight_in_entered':
                        $stmt->bindValue($identifier, $this->freight_in_entered, PDO::PARAM_STR);
                        break;
                    case 'dropship_entered':
                        $stmt->bindValue($identifier, $this->dropship_entered, PDO::PARAM_STR);
                        break;
                    case 'er_flag':
                        $stmt->bindValue($identifier, $this->er_flag, PDO::PARAM_STR);
                        break;
                    case 'freight_in':
                        $stmt->bindValue($identifier, $this->freight_in, PDO::PARAM_STR);
                        break;
                    case 'dropship':
                        $stmt->bindValue($identifier, $this->dropship, PDO::PARAM_STR);
                        break;
                    case 'minorder':
                        $stmt->bindValue($identifier, $this->minorder, PDO::PARAM_STR);
                        break;
                    case 'contract_terms':
                        $stmt->bindValue($identifier, $this->contract_terms, PDO::PARAM_STR);
                        break;
                    case 'dropship_billed':
                        $stmt->bindValue($identifier, $this->dropship_billed, PDO::PARAM_STR);
                        break;
                    case 'order_type':
                        $stmt->bindValue($identifier, $this->order_type, PDO::PARAM_STR);
                        break;
                    case 'tracking_edinumber':
                        $stmt->bindValue($identifier, $this->tracking_edinumber, PDO::PARAM_STR);
                        break;
                    case 'source':
                        $stmt->bindValue($identifier, $this->source, PDO::PARAM_STR);
                        break;
                    case 'pick_format':
                        $stmt->bindValue($identifier, $this->pick_format, PDO::PARAM_STR);
                        break;
                    case 'invoice_format':
                        $stmt->bindValue($identifier, $this->invoice_format, PDO::PARAM_STR);
                        break;
                    case 'cash_amount':
                        $stmt->bindValue($identifier, $this->cash_amount, PDO::PARAM_STR);
                        break;
                    case 'check_amount':
                        $stmt->bindValue($identifier, $this->check_amount, PDO::PARAM_STR);
                        break;
                    case 'check_number':
                        $stmt->bindValue($identifier, $this->check_number, PDO::PARAM_STR);
                        break;
                    case 'deposit_amount':
                        $stmt->bindValue($identifier, $this->deposit_amount, PDO::PARAM_STR);
                        break;
                    case 'deposit_number':
                        $stmt->bindValue($identifier, $this->deposit_number, PDO::PARAM_STR);
                        break;
                    case 'original_subtotal_tax':
                        $stmt->bindValue($identifier, $this->original_subtotal_tax, PDO::PARAM_STR);
                        break;
                    case 'original_subtotal_nontax':
                        $stmt->bindValue($identifier, $this->original_subtotal_nontax, PDO::PARAM_STR);
                        break;
                    case 'original_total_tax':
                        $stmt->bindValue($identifier, $this->original_total_tax, PDO::PARAM_STR);
                        break;
                    case 'original_total':
                        $stmt->bindValue($identifier, $this->original_total, PDO::PARAM_STR);
                        break;
                    case 'pick_printdate':
                        $stmt->bindValue($identifier, $this->pick_printdate, PDO::PARAM_INT);
                        break;
                    case 'pick_printtime':
                        $stmt->bindValue($identifier, $this->pick_printtime, PDO::PARAM_INT);
                        break;
                    case 'contact':
                        $stmt->bindValue($identifier, $this->contact, PDO::PARAM_STR);
                        break;
                    case 'phone_intl':
                        $stmt->bindValue($identifier, $this->phone_intl, PDO::PARAM_STR);
                        break;
                    case 'phone_accesscode':
                        $stmt->bindValue($identifier, $this->phone_accesscode, PDO::PARAM_STR);
                        break;
                    case 'phone_countrycode':
                        $stmt->bindValue($identifier, $this->phone_countrycode, PDO::PARAM_STR);
                        break;
                    case 'phone':
                        $stmt->bindValue($identifier, $this->phone, PDO::PARAM_STR);
                        break;
                    case 'phone_ext':
                        $stmt->bindValue($identifier, $this->phone_ext, PDO::PARAM_STR);
                        break;
                    case 'fax_intl':
                        $stmt->bindValue($identifier, $this->fax_intl, PDO::PARAM_STR);
                        break;
                    case 'fax_accesscode':
                        $stmt->bindValue($identifier, $this->fax_accesscode, PDO::PARAM_STR);
                        break;
                    case 'fax_countrycode':
                        $stmt->bindValue($identifier, $this->fax_countrycode, PDO::PARAM_STR);
                        break;
                    case 'fax':
                        $stmt->bindValue($identifier, $this->fax, PDO::PARAM_STR);
                        break;
                    case 'ship_account':
                        $stmt->bindValue($identifier, $this->ship_account, PDO::PARAM_STR);
                        break;
                    case 'change_due':
                        $stmt->bindValue($identifier, $this->change_due, PDO::PARAM_STR);
                        break;
                    case 'discount_additional':
                        $stmt->bindValue($identifier, $this->discount_additional, PDO::PARAM_STR);
                        break;
                    case 'all_ship':
                        $stmt->bindValue($identifier, $this->all_ship, PDO::PARAM_STR);
                        break;
                    case 'credit_applied':
                        $stmt->bindValue($identifier, $this->credit_applied, PDO::PARAM_STR);
                        break;
                    case 'invoice_printdate':
                        $stmt->bindValue($identifier, $this->invoice_printdate, PDO::PARAM_INT);
                        break;
                    case 'invoice_printtime':
                        $stmt->bindValue($identifier, $this->invoice_printtime, PDO::PARAM_INT);
                        break;
                    case 'discount_freight':
                        $stmt->bindValue($identifier, $this->discount_freight, PDO::PARAM_STR);
                        break;
                    case 'ship_completeoverride':
                        $stmt->bindValue($identifier, $this->ship_completeoverride, PDO::PARAM_STR);
                        break;
                    case 'contact_email':
                        $stmt->bindValue($identifier, $this->contact_email, PDO::PARAM_STR);
                        break;
                    case 'manual_freight':
                        $stmt->bindValue($identifier, $this->manual_freight, PDO::PARAM_STR);
                        break;
                    case 'internal_freight':
                        $stmt->bindValue($identifier, $this->internal_freight, PDO::PARAM_STR);
                        break;
                    case 'cost_freight':
                        $stmt->bindValue($identifier, $this->cost_freight, PDO::PARAM_STR);
                        break;
                    case 'route':
                        $stmt->bindValue($identifier, $this->route, PDO::PARAM_STR);
                        break;
                    case 'route_seq':
                        $stmt->bindValue($identifier, $this->route_seq, PDO::PARAM_INT);
                        break;
                    case 'edi_855sent':
                        $stmt->bindValue($identifier, $this->edi_855sent, PDO::PARAM_STR);
                        break;
                    case 'freight_3rdparty':
                        $stmt->bindValue($identifier, $this->freight_3rdparty, PDO::PARAM_STR);
                        break;
                    case 'fob':
                        $stmt->bindValue($identifier, $this->fob, PDO::PARAM_STR);
                        break;
                    case 'confirm_image':
                        $stmt->bindValue($identifier, $this->confirm_image, PDO::PARAM_STR);
                        break;
                    case 'cstk_consign':
                        $stmt->bindValue($identifier, $this->cstk_consign, PDO::PARAM_STR);
                        break;
                    case 'manufacturer':
                        $stmt->bindValue($identifier, $this->manufacturer, PDO::PARAM_STR);
                        break;
                    case 'pick_queue':
                        $stmt->bindValue($identifier, $this->pick_queue, PDO::PARAM_STR);
                        break;
                    case 'arrive_date':
                        $stmt->bindValue($identifier, $this->arrive_date, PDO::PARAM_INT);
                        break;
                    case 'surcharge_status':
                        $stmt->bindValue($identifier, $this->surcharge_status, PDO::PARAM_STR);
                        break;
                    case 'freight_group':
                        $stmt->bindValue($identifier, $this->freight_group, PDO::PARAM_STR);
                        break;
                    case 'comm_override':
                        $stmt->bindValue($identifier, $this->comm_override, PDO::PARAM_STR);
                        break;
                    case 'charge_split':
                        $stmt->bindValue($identifier, $this->charge_split, PDO::PARAM_STR);
                        break;
                    case 'creditcart_approved':
                        $stmt->bindValue($identifier, $this->creditcart_approved, PDO::PARAM_STR);
                        break;
                    case 'original_ordernumber':
                        $stmt->bindValue($identifier, $this->original_ordernumber, PDO::PARAM_STR);
                        break;
                    case 'has_notes':
                        $stmt->bindValue($identifier, $this->has_notes, PDO::PARAM_STR);
                        break;
                    case 'has_documents':
                        $stmt->bindValue($identifier, $this->has_documents, PDO::PARAM_STR);
                        break;
                    case 'has_tracking':
                        $stmt->bindValue($identifier, $this->has_tracking, PDO::PARAM_STR);
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
        $pos = OeHistTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getOrderno();
                break;
            case 1:
                return $this->getStatus();
                break;
            case 2:
                return $this->getHoldstatus();
                break;
            case 3:
                return $this->getCustid();
                break;
            case 4:
                return $this->getShiptoid();
                break;
            case 5:
                return $this->getShiptoName();
                break;
            case 6:
                return $this->getShiptoAddress1();
                break;
            case 7:
                return $this->getShiptoAddress2();
                break;
            case 8:
                return $this->getShiptoAddress3();
                break;
            case 9:
                return $this->getShiptoAddress4();
                break;
            case 10:
                return $this->getShiptoCity();
                break;
            case 11:
                return $this->getShiptoState();
                break;
            case 12:
                return $this->getShiptoZip();
                break;
            case 13:
                return $this->getCustpo();
                break;
            case 14:
                return $this->getOrderdate();
                break;
            case 15:
                return $this->getTermcode();
                break;
            case 16:
                return $this->getShipviacode();
                break;
            case 17:
                return $this->getInvoiceNumber();
                break;
            case 18:
                return $this->getInvoiceDate();
                break;
            case 19:
                return $this->getGenledgerPeriod();
                break;
            case 20:
                return $this->getSalesperson1();
                break;
            case 21:
                return $this->getSalesperson1pct();
                break;
            case 22:
                return $this->getSalesperson2();
                break;
            case 23:
                return $this->getSalesperson2pct();
                break;
            case 24:
                return $this->getSalesperson3();
                break;
            case 25:
                return $this->getSalesperson3pct();
                break;
            case 26:
                return $this->getContractNbr();
                break;
            case 27:
                return $this->getBatchNbr();
                break;
            case 28:
                return $this->getDropreleasehold();
                break;
            case 29:
                return $this->getSubtotalTax();
                break;
            case 30:
                return $this->getSubtotalNontax();
                break;
            case 31:
                return $this->getTotalTax();
                break;
            case 32:
                return $this->getTotalFreight();
                break;
            case 33:
                return $this->getTotalMisc();
                break;
            case 34:
                return $this->getTotalOrder();
                break;
            case 35:
                return $this->getTotalCost();
                break;
            case 36:
                return $this->getLock();
                break;
            case 37:
                return $this->getTakenDate();
                break;
            case 38:
                return $this->getTakenTime();
                break;
            case 39:
                return $this->getPickDate();
                break;
            case 40:
                return $this->getPickTime();
                break;
            case 41:
                return $this->getPackDate();
                break;
            case 42:
                return $this->getPackTime();
                break;
            case 43:
                return $this->getVerifyDate();
                break;
            case 44:
                return $this->getVerifyTime();
                break;
            case 45:
                return $this->getCreditmemo();
                break;
            case 46:
                return $this->getBooked();
                break;
            case 47:
                return $this->getOriginalWhse();
                break;
            case 48:
                return $this->getBilltoState();
                break;
            case 49:
                return $this->getShipcomplete();
                break;
            case 50:
                return $this->getCwoFlag();
                break;
            case 51:
                return $this->getDivision();
                break;
            case 52:
                return $this->getTakenCode();
                break;
            case 53:
                return $this->getPackCode();
                break;
            case 54:
                return $this->getPickCode();
                break;
            case 55:
                return $this->getVerifyCode();
                break;
            case 56:
                return $this->getTotalDiscount();
                break;
            case 57:
                return $this->getEdiRefererencenbr();
                break;
            case 58:
                return $this->getUserCode1();
                break;
            case 59:
                return $this->getUserCode2();
                break;
            case 60:
                return $this->getUserCode3();
                break;
            case 61:
                return $this->getUserCode4();
                break;
            case 62:
                return $this->getExchangeCountry();
                break;
            case 63:
                return $this->getExchangeRate();
                break;
            case 64:
                return $this->getWeightTotal();
                break;
            case 65:
                return $this->getWeightOverride();
                break;
            case 66:
                return $this->getBoxCount();
                break;
            case 67:
                return $this->getRequestDate();
                break;
            case 68:
                return $this->getCancelDate();
                break;
            case 69:
                return $this->getLockedby();
                break;
            case 70:
                return $this->getReleaseNumber();
                break;
            case 71:
                return $this->getWhse();
                break;
            case 72:
                return $this->getBackorderDate();
                break;
            case 73:
                return $this->getDeptcode();
                break;
            case 74:
                return $this->getFreightInEntered();
                break;
            case 75:
                return $this->getDropshipEntered();
                break;
            case 76:
                return $this->getErFlag();
                break;
            case 77:
                return $this->getFreightIn();
                break;
            case 78:
                return $this->getDropship();
                break;
            case 79:
                return $this->getMinorder();
                break;
            case 80:
                return $this->getContractTerms();
                break;
            case 81:
                return $this->getDropshipBilled();
                break;
            case 82:
                return $this->getOrderType();
                break;
            case 83:
                return $this->getTrackingEdinumber();
                break;
            case 84:
                return $this->getSource();
                break;
            case 85:
                return $this->getPickFormat();
                break;
            case 86:
                return $this->getInvoiceFormat();
                break;
            case 87:
                return $this->getCashAmount();
                break;
            case 88:
                return $this->getCheckAmount();
                break;
            case 89:
                return $this->getCheckNumber();
                break;
            case 90:
                return $this->getDepositAmount();
                break;
            case 91:
                return $this->getDepositNumber();
                break;
            case 92:
                return $this->getOriginalSubtotalTax();
                break;
            case 93:
                return $this->getOriginalSubtotalNontax();
                break;
            case 94:
                return $this->getOriginalTotalTax();
                break;
            case 95:
                return $this->getOriginalTotal();
                break;
            case 96:
                return $this->getPickPrintdate();
                break;
            case 97:
                return $this->getPickPrinttime();
                break;
            case 98:
                return $this->getContact();
                break;
            case 99:
                return $this->getPhoneIntl();
                break;
            case 100:
                return $this->getPhoneAccesscode();
                break;
            case 101:
                return $this->getPhoneCountrycode();
                break;
            case 102:
                return $this->getPhone();
                break;
            case 103:
                return $this->getPhoneExt();
                break;
            case 104:
                return $this->getFaxIntl();
                break;
            case 105:
                return $this->getFaxAccesscode();
                break;
            case 106:
                return $this->getFaxCountrycode();
                break;
            case 107:
                return $this->getFax();
                break;
            case 108:
                return $this->getShipAccount();
                break;
            case 109:
                return $this->getChangeDue();
                break;
            case 110:
                return $this->getDiscountAdditional();
                break;
            case 111:
                return $this->getAllShip();
                break;
            case 112:
                return $this->getCreditApplied();
                break;
            case 113:
                return $this->getInvoicePrintdate();
                break;
            case 114:
                return $this->getInvoicePrinttime();
                break;
            case 115:
                return $this->getDiscountFreight();
                break;
            case 116:
                return $this->getShipCompleteoverride();
                break;
            case 117:
                return $this->getContactEmail();
                break;
            case 118:
                return $this->getManualFreight();
                break;
            case 119:
                return $this->getInternalFreight();
                break;
            case 120:
                return $this->getCostFreight();
                break;
            case 121:
                return $this->getRoute();
                break;
            case 122:
                return $this->getRouteSeq();
                break;
            case 123:
                return $this->getEdi855sent();
                break;
            case 124:
                return $this->getFreight3rdparty();
                break;
            case 125:
                return $this->getFob();
                break;
            case 126:
                return $this->getConfirmImage();
                break;
            case 127:
                return $this->getCstkConsign();
                break;
            case 128:
                return $this->getManufacturer();
                break;
            case 129:
                return $this->getPickQueue();
                break;
            case 130:
                return $this->getArriveDate();
                break;
            case 131:
                return $this->getSurchargeStatus();
                break;
            case 132:
                return $this->getFreightGroup();
                break;
            case 133:
                return $this->getCommOverride();
                break;
            case 134:
                return $this->getChargeSplit();
                break;
            case 135:
                return $this->getCreditcartApproved();
                break;
            case 136:
                return $this->getOriginalOrdernumber();
                break;
            case 137:
                return $this->getHasNotes();
                break;
            case 138:
                return $this->getHasDocuments();
                break;
            case 139:
                return $this->getHasTracking();
                break;
            case 140:
                return $this->getDate();
                break;
            case 141:
                return $this->getTime();
                break;
            case 142:
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

        if (isset($alreadyDumpedObjects['OeHist'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['OeHist'][$this->hashCode()] = true;
        $keys = OeHistTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getOrderno(),
            $keys[1] => $this->getStatus(),
            $keys[2] => $this->getHoldstatus(),
            $keys[3] => $this->getCustid(),
            $keys[4] => $this->getShiptoid(),
            $keys[5] => $this->getShiptoName(),
            $keys[6] => $this->getShiptoAddress1(),
            $keys[7] => $this->getShiptoAddress2(),
            $keys[8] => $this->getShiptoAddress3(),
            $keys[9] => $this->getShiptoAddress4(),
            $keys[10] => $this->getShiptoCity(),
            $keys[11] => $this->getShiptoState(),
            $keys[12] => $this->getShiptoZip(),
            $keys[13] => $this->getCustpo(),
            $keys[14] => $this->getOrderdate(),
            $keys[15] => $this->getTermcode(),
            $keys[16] => $this->getShipviacode(),
            $keys[17] => $this->getInvoiceNumber(),
            $keys[18] => $this->getInvoiceDate(),
            $keys[19] => $this->getGenledgerPeriod(),
            $keys[20] => $this->getSalesperson1(),
            $keys[21] => $this->getSalesperson1pct(),
            $keys[22] => $this->getSalesperson2(),
            $keys[23] => $this->getSalesperson2pct(),
            $keys[24] => $this->getSalesperson3(),
            $keys[25] => $this->getSalesperson3pct(),
            $keys[26] => $this->getContractNbr(),
            $keys[27] => $this->getBatchNbr(),
            $keys[28] => $this->getDropreleasehold(),
            $keys[29] => $this->getSubtotalTax(),
            $keys[30] => $this->getSubtotalNontax(),
            $keys[31] => $this->getTotalTax(),
            $keys[32] => $this->getTotalFreight(),
            $keys[33] => $this->getTotalMisc(),
            $keys[34] => $this->getTotalOrder(),
            $keys[35] => $this->getTotalCost(),
            $keys[36] => $this->getLock(),
            $keys[37] => $this->getTakenDate(),
            $keys[38] => $this->getTakenTime(),
            $keys[39] => $this->getPickDate(),
            $keys[40] => $this->getPickTime(),
            $keys[41] => $this->getPackDate(),
            $keys[42] => $this->getPackTime(),
            $keys[43] => $this->getVerifyDate(),
            $keys[44] => $this->getVerifyTime(),
            $keys[45] => $this->getCreditmemo(),
            $keys[46] => $this->getBooked(),
            $keys[47] => $this->getOriginalWhse(),
            $keys[48] => $this->getBilltoState(),
            $keys[49] => $this->getShipcomplete(),
            $keys[50] => $this->getCwoFlag(),
            $keys[51] => $this->getDivision(),
            $keys[52] => $this->getTakenCode(),
            $keys[53] => $this->getPackCode(),
            $keys[54] => $this->getPickCode(),
            $keys[55] => $this->getVerifyCode(),
            $keys[56] => $this->getTotalDiscount(),
            $keys[57] => $this->getEdiRefererencenbr(),
            $keys[58] => $this->getUserCode1(),
            $keys[59] => $this->getUserCode2(),
            $keys[60] => $this->getUserCode3(),
            $keys[61] => $this->getUserCode4(),
            $keys[62] => $this->getExchangeCountry(),
            $keys[63] => $this->getExchangeRate(),
            $keys[64] => $this->getWeightTotal(),
            $keys[65] => $this->getWeightOverride(),
            $keys[66] => $this->getBoxCount(),
            $keys[67] => $this->getRequestDate(),
            $keys[68] => $this->getCancelDate(),
            $keys[69] => $this->getLockedby(),
            $keys[70] => $this->getReleaseNumber(),
            $keys[71] => $this->getWhse(),
            $keys[72] => $this->getBackorderDate(),
            $keys[73] => $this->getDeptcode(),
            $keys[74] => $this->getFreightInEntered(),
            $keys[75] => $this->getDropshipEntered(),
            $keys[76] => $this->getErFlag(),
            $keys[77] => $this->getFreightIn(),
            $keys[78] => $this->getDropship(),
            $keys[79] => $this->getMinorder(),
            $keys[80] => $this->getContractTerms(),
            $keys[81] => $this->getDropshipBilled(),
            $keys[82] => $this->getOrderType(),
            $keys[83] => $this->getTrackingEdinumber(),
            $keys[84] => $this->getSource(),
            $keys[85] => $this->getPickFormat(),
            $keys[86] => $this->getInvoiceFormat(),
            $keys[87] => $this->getCashAmount(),
            $keys[88] => $this->getCheckAmount(),
            $keys[89] => $this->getCheckNumber(),
            $keys[90] => $this->getDepositAmount(),
            $keys[91] => $this->getDepositNumber(),
            $keys[92] => $this->getOriginalSubtotalTax(),
            $keys[93] => $this->getOriginalSubtotalNontax(),
            $keys[94] => $this->getOriginalTotalTax(),
            $keys[95] => $this->getOriginalTotal(),
            $keys[96] => $this->getPickPrintdate(),
            $keys[97] => $this->getPickPrinttime(),
            $keys[98] => $this->getContact(),
            $keys[99] => $this->getPhoneIntl(),
            $keys[100] => $this->getPhoneAccesscode(),
            $keys[101] => $this->getPhoneCountrycode(),
            $keys[102] => $this->getPhone(),
            $keys[103] => $this->getPhoneExt(),
            $keys[104] => $this->getFaxIntl(),
            $keys[105] => $this->getFaxAccesscode(),
            $keys[106] => $this->getFaxCountrycode(),
            $keys[107] => $this->getFax(),
            $keys[108] => $this->getShipAccount(),
            $keys[109] => $this->getChangeDue(),
            $keys[110] => $this->getDiscountAdditional(),
            $keys[111] => $this->getAllShip(),
            $keys[112] => $this->getCreditApplied(),
            $keys[113] => $this->getInvoicePrintdate(),
            $keys[114] => $this->getInvoicePrinttime(),
            $keys[115] => $this->getDiscountFreight(),
            $keys[116] => $this->getShipCompleteoverride(),
            $keys[117] => $this->getContactEmail(),
            $keys[118] => $this->getManualFreight(),
            $keys[119] => $this->getInternalFreight(),
            $keys[120] => $this->getCostFreight(),
            $keys[121] => $this->getRoute(),
            $keys[122] => $this->getRouteSeq(),
            $keys[123] => $this->getEdi855sent(),
            $keys[124] => $this->getFreight3rdparty(),
            $keys[125] => $this->getFob(),
            $keys[126] => $this->getConfirmImage(),
            $keys[127] => $this->getCstkConsign(),
            $keys[128] => $this->getManufacturer(),
            $keys[129] => $this->getPickQueue(),
            $keys[130] => $this->getArriveDate(),
            $keys[131] => $this->getSurchargeStatus(),
            $keys[132] => $this->getFreightGroup(),
            $keys[133] => $this->getCommOverride(),
            $keys[134] => $this->getChargeSplit(),
            $keys[135] => $this->getCreditcartApproved(),
            $keys[136] => $this->getOriginalOrdernumber(),
            $keys[137] => $this->getHasNotes(),
            $keys[138] => $this->getHasDocuments(),
            $keys[139] => $this->getHasTracking(),
            $keys[140] => $this->getDate(),
            $keys[141] => $this->getTime(),
            $keys[142] => $this->getDummy(),
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
     * @return $this|\OeHist
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = OeHistTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\OeHist
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setOrderno($value);
                break;
            case 1:
                $this->setStatus($value);
                break;
            case 2:
                $this->setHoldstatus($value);
                break;
            case 3:
                $this->setCustid($value);
                break;
            case 4:
                $this->setShiptoid($value);
                break;
            case 5:
                $this->setShiptoName($value);
                break;
            case 6:
                $this->setShiptoAddress1($value);
                break;
            case 7:
                $this->setShiptoAddress2($value);
                break;
            case 8:
                $this->setShiptoAddress3($value);
                break;
            case 9:
                $this->setShiptoAddress4($value);
                break;
            case 10:
                $this->setShiptoCity($value);
                break;
            case 11:
                $this->setShiptoState($value);
                break;
            case 12:
                $this->setShiptoZip($value);
                break;
            case 13:
                $this->setCustpo($value);
                break;
            case 14:
                $this->setOrderdate($value);
                break;
            case 15:
                $this->setTermcode($value);
                break;
            case 16:
                $this->setShipviacode($value);
                break;
            case 17:
                $this->setInvoiceNumber($value);
                break;
            case 18:
                $this->setInvoiceDate($value);
                break;
            case 19:
                $this->setGenledgerPeriod($value);
                break;
            case 20:
                $this->setSalesperson1($value);
                break;
            case 21:
                $this->setSalesperson1pct($value);
                break;
            case 22:
                $this->setSalesperson2($value);
                break;
            case 23:
                $this->setSalesperson2pct($value);
                break;
            case 24:
                $this->setSalesperson3($value);
                break;
            case 25:
                $this->setSalesperson3pct($value);
                break;
            case 26:
                $this->setContractNbr($value);
                break;
            case 27:
                $this->setBatchNbr($value);
                break;
            case 28:
                $this->setDropreleasehold($value);
                break;
            case 29:
                $this->setSubtotalTax($value);
                break;
            case 30:
                $this->setSubtotalNontax($value);
                break;
            case 31:
                $this->setTotalTax($value);
                break;
            case 32:
                $this->setTotalFreight($value);
                break;
            case 33:
                $this->setTotalMisc($value);
                break;
            case 34:
                $this->setTotalOrder($value);
                break;
            case 35:
                $this->setTotalCost($value);
                break;
            case 36:
                $this->setLock($value);
                break;
            case 37:
                $this->setTakenDate($value);
                break;
            case 38:
                $this->setTakenTime($value);
                break;
            case 39:
                $this->setPickDate($value);
                break;
            case 40:
                $this->setPickTime($value);
                break;
            case 41:
                $this->setPackDate($value);
                break;
            case 42:
                $this->setPackTime($value);
                break;
            case 43:
                $this->setVerifyDate($value);
                break;
            case 44:
                $this->setVerifyTime($value);
                break;
            case 45:
                $this->setCreditmemo($value);
                break;
            case 46:
                $this->setBooked($value);
                break;
            case 47:
                $this->setOriginalWhse($value);
                break;
            case 48:
                $this->setBilltoState($value);
                break;
            case 49:
                $this->setShipcomplete($value);
                break;
            case 50:
                $this->setCwoFlag($value);
                break;
            case 51:
                $this->setDivision($value);
                break;
            case 52:
                $this->setTakenCode($value);
                break;
            case 53:
                $this->setPackCode($value);
                break;
            case 54:
                $this->setPickCode($value);
                break;
            case 55:
                $this->setVerifyCode($value);
                break;
            case 56:
                $this->setTotalDiscount($value);
                break;
            case 57:
                $this->setEdiRefererencenbr($value);
                break;
            case 58:
                $this->setUserCode1($value);
                break;
            case 59:
                $this->setUserCode2($value);
                break;
            case 60:
                $this->setUserCode3($value);
                break;
            case 61:
                $this->setUserCode4($value);
                break;
            case 62:
                $this->setExchangeCountry($value);
                break;
            case 63:
                $this->setExchangeRate($value);
                break;
            case 64:
                $this->setWeightTotal($value);
                break;
            case 65:
                $this->setWeightOverride($value);
                break;
            case 66:
                $this->setBoxCount($value);
                break;
            case 67:
                $this->setRequestDate($value);
                break;
            case 68:
                $this->setCancelDate($value);
                break;
            case 69:
                $this->setLockedby($value);
                break;
            case 70:
                $this->setReleaseNumber($value);
                break;
            case 71:
                $this->setWhse($value);
                break;
            case 72:
                $this->setBackorderDate($value);
                break;
            case 73:
                $this->setDeptcode($value);
                break;
            case 74:
                $this->setFreightInEntered($value);
                break;
            case 75:
                $this->setDropshipEntered($value);
                break;
            case 76:
                $this->setErFlag($value);
                break;
            case 77:
                $this->setFreightIn($value);
                break;
            case 78:
                $this->setDropship($value);
                break;
            case 79:
                $this->setMinorder($value);
                break;
            case 80:
                $this->setContractTerms($value);
                break;
            case 81:
                $this->setDropshipBilled($value);
                break;
            case 82:
                $this->setOrderType($value);
                break;
            case 83:
                $this->setTrackingEdinumber($value);
                break;
            case 84:
                $this->setSource($value);
                break;
            case 85:
                $this->setPickFormat($value);
                break;
            case 86:
                $this->setInvoiceFormat($value);
                break;
            case 87:
                $this->setCashAmount($value);
                break;
            case 88:
                $this->setCheckAmount($value);
                break;
            case 89:
                $this->setCheckNumber($value);
                break;
            case 90:
                $this->setDepositAmount($value);
                break;
            case 91:
                $this->setDepositNumber($value);
                break;
            case 92:
                $this->setOriginalSubtotalTax($value);
                break;
            case 93:
                $this->setOriginalSubtotalNontax($value);
                break;
            case 94:
                $this->setOriginalTotalTax($value);
                break;
            case 95:
                $this->setOriginalTotal($value);
                break;
            case 96:
                $this->setPickPrintdate($value);
                break;
            case 97:
                $this->setPickPrinttime($value);
                break;
            case 98:
                $this->setContact($value);
                break;
            case 99:
                $this->setPhoneIntl($value);
                break;
            case 100:
                $this->setPhoneAccesscode($value);
                break;
            case 101:
                $this->setPhoneCountrycode($value);
                break;
            case 102:
                $this->setPhone($value);
                break;
            case 103:
                $this->setPhoneExt($value);
                break;
            case 104:
                $this->setFaxIntl($value);
                break;
            case 105:
                $this->setFaxAccesscode($value);
                break;
            case 106:
                $this->setFaxCountrycode($value);
                break;
            case 107:
                $this->setFax($value);
                break;
            case 108:
                $this->setShipAccount($value);
                break;
            case 109:
                $this->setChangeDue($value);
                break;
            case 110:
                $this->setDiscountAdditional($value);
                break;
            case 111:
                $this->setAllShip($value);
                break;
            case 112:
                $this->setCreditApplied($value);
                break;
            case 113:
                $this->setInvoicePrintdate($value);
                break;
            case 114:
                $this->setInvoicePrinttime($value);
                break;
            case 115:
                $this->setDiscountFreight($value);
                break;
            case 116:
                $this->setShipCompleteoverride($value);
                break;
            case 117:
                $this->setContactEmail($value);
                break;
            case 118:
                $this->setManualFreight($value);
                break;
            case 119:
                $this->setInternalFreight($value);
                break;
            case 120:
                $this->setCostFreight($value);
                break;
            case 121:
                $this->setRoute($value);
                break;
            case 122:
                $this->setRouteSeq($value);
                break;
            case 123:
                $this->setEdi855sent($value);
                break;
            case 124:
                $this->setFreight3rdparty($value);
                break;
            case 125:
                $this->setFob($value);
                break;
            case 126:
                $this->setConfirmImage($value);
                break;
            case 127:
                $this->setCstkConsign($value);
                break;
            case 128:
                $this->setManufacturer($value);
                break;
            case 129:
                $this->setPickQueue($value);
                break;
            case 130:
                $this->setArriveDate($value);
                break;
            case 131:
                $this->setSurchargeStatus($value);
                break;
            case 132:
                $this->setFreightGroup($value);
                break;
            case 133:
                $this->setCommOverride($value);
                break;
            case 134:
                $this->setChargeSplit($value);
                break;
            case 135:
                $this->setCreditcartApproved($value);
                break;
            case 136:
                $this->setOriginalOrdernumber($value);
                break;
            case 137:
                $this->setHasNotes($value);
                break;
            case 138:
                $this->setHasDocuments($value);
                break;
            case 139:
                $this->setHasTracking($value);
                break;
            case 140:
                $this->setDate($value);
                break;
            case 141:
                $this->setTime($value);
                break;
            case 142:
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
        $keys = OeHistTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setOrderno($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setStatus($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setHoldstatus($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setCustid($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setShiptoid($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setShiptoName($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setShiptoAddress1($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setShiptoAddress2($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setShiptoAddress3($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setShiptoAddress4($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setShiptoCity($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setShiptoState($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setShiptoZip($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setCustpo($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setOrderdate($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setTermcode($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setShipviacode($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setInvoiceNumber($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setInvoiceDate($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setGenledgerPeriod($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setSalesperson1($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setSalesperson1pct($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setSalesperson2($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setSalesperson2pct($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setSalesperson3($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setSalesperson3pct($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setContractNbr($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setBatchNbr($arr[$keys[27]]);
        }
        if (array_key_exists($keys[28], $arr)) {
            $this->setDropreleasehold($arr[$keys[28]]);
        }
        if (array_key_exists($keys[29], $arr)) {
            $this->setSubtotalTax($arr[$keys[29]]);
        }
        if (array_key_exists($keys[30], $arr)) {
            $this->setSubtotalNontax($arr[$keys[30]]);
        }
        if (array_key_exists($keys[31], $arr)) {
            $this->setTotalTax($arr[$keys[31]]);
        }
        if (array_key_exists($keys[32], $arr)) {
            $this->setTotalFreight($arr[$keys[32]]);
        }
        if (array_key_exists($keys[33], $arr)) {
            $this->setTotalMisc($arr[$keys[33]]);
        }
        if (array_key_exists($keys[34], $arr)) {
            $this->setTotalOrder($arr[$keys[34]]);
        }
        if (array_key_exists($keys[35], $arr)) {
            $this->setTotalCost($arr[$keys[35]]);
        }
        if (array_key_exists($keys[36], $arr)) {
            $this->setLock($arr[$keys[36]]);
        }
        if (array_key_exists($keys[37], $arr)) {
            $this->setTakenDate($arr[$keys[37]]);
        }
        if (array_key_exists($keys[38], $arr)) {
            $this->setTakenTime($arr[$keys[38]]);
        }
        if (array_key_exists($keys[39], $arr)) {
            $this->setPickDate($arr[$keys[39]]);
        }
        if (array_key_exists($keys[40], $arr)) {
            $this->setPickTime($arr[$keys[40]]);
        }
        if (array_key_exists($keys[41], $arr)) {
            $this->setPackDate($arr[$keys[41]]);
        }
        if (array_key_exists($keys[42], $arr)) {
            $this->setPackTime($arr[$keys[42]]);
        }
        if (array_key_exists($keys[43], $arr)) {
            $this->setVerifyDate($arr[$keys[43]]);
        }
        if (array_key_exists($keys[44], $arr)) {
            $this->setVerifyTime($arr[$keys[44]]);
        }
        if (array_key_exists($keys[45], $arr)) {
            $this->setCreditmemo($arr[$keys[45]]);
        }
        if (array_key_exists($keys[46], $arr)) {
            $this->setBooked($arr[$keys[46]]);
        }
        if (array_key_exists($keys[47], $arr)) {
            $this->setOriginalWhse($arr[$keys[47]]);
        }
        if (array_key_exists($keys[48], $arr)) {
            $this->setBilltoState($arr[$keys[48]]);
        }
        if (array_key_exists($keys[49], $arr)) {
            $this->setShipcomplete($arr[$keys[49]]);
        }
        if (array_key_exists($keys[50], $arr)) {
            $this->setCwoFlag($arr[$keys[50]]);
        }
        if (array_key_exists($keys[51], $arr)) {
            $this->setDivision($arr[$keys[51]]);
        }
        if (array_key_exists($keys[52], $arr)) {
            $this->setTakenCode($arr[$keys[52]]);
        }
        if (array_key_exists($keys[53], $arr)) {
            $this->setPackCode($arr[$keys[53]]);
        }
        if (array_key_exists($keys[54], $arr)) {
            $this->setPickCode($arr[$keys[54]]);
        }
        if (array_key_exists($keys[55], $arr)) {
            $this->setVerifyCode($arr[$keys[55]]);
        }
        if (array_key_exists($keys[56], $arr)) {
            $this->setTotalDiscount($arr[$keys[56]]);
        }
        if (array_key_exists($keys[57], $arr)) {
            $this->setEdiRefererencenbr($arr[$keys[57]]);
        }
        if (array_key_exists($keys[58], $arr)) {
            $this->setUserCode1($arr[$keys[58]]);
        }
        if (array_key_exists($keys[59], $arr)) {
            $this->setUserCode2($arr[$keys[59]]);
        }
        if (array_key_exists($keys[60], $arr)) {
            $this->setUserCode3($arr[$keys[60]]);
        }
        if (array_key_exists($keys[61], $arr)) {
            $this->setUserCode4($arr[$keys[61]]);
        }
        if (array_key_exists($keys[62], $arr)) {
            $this->setExchangeCountry($arr[$keys[62]]);
        }
        if (array_key_exists($keys[63], $arr)) {
            $this->setExchangeRate($arr[$keys[63]]);
        }
        if (array_key_exists($keys[64], $arr)) {
            $this->setWeightTotal($arr[$keys[64]]);
        }
        if (array_key_exists($keys[65], $arr)) {
            $this->setWeightOverride($arr[$keys[65]]);
        }
        if (array_key_exists($keys[66], $arr)) {
            $this->setBoxCount($arr[$keys[66]]);
        }
        if (array_key_exists($keys[67], $arr)) {
            $this->setRequestDate($arr[$keys[67]]);
        }
        if (array_key_exists($keys[68], $arr)) {
            $this->setCancelDate($arr[$keys[68]]);
        }
        if (array_key_exists($keys[69], $arr)) {
            $this->setLockedby($arr[$keys[69]]);
        }
        if (array_key_exists($keys[70], $arr)) {
            $this->setReleaseNumber($arr[$keys[70]]);
        }
        if (array_key_exists($keys[71], $arr)) {
            $this->setWhse($arr[$keys[71]]);
        }
        if (array_key_exists($keys[72], $arr)) {
            $this->setBackorderDate($arr[$keys[72]]);
        }
        if (array_key_exists($keys[73], $arr)) {
            $this->setDeptcode($arr[$keys[73]]);
        }
        if (array_key_exists($keys[74], $arr)) {
            $this->setFreightInEntered($arr[$keys[74]]);
        }
        if (array_key_exists($keys[75], $arr)) {
            $this->setDropshipEntered($arr[$keys[75]]);
        }
        if (array_key_exists($keys[76], $arr)) {
            $this->setErFlag($arr[$keys[76]]);
        }
        if (array_key_exists($keys[77], $arr)) {
            $this->setFreightIn($arr[$keys[77]]);
        }
        if (array_key_exists($keys[78], $arr)) {
            $this->setDropship($arr[$keys[78]]);
        }
        if (array_key_exists($keys[79], $arr)) {
            $this->setMinorder($arr[$keys[79]]);
        }
        if (array_key_exists($keys[80], $arr)) {
            $this->setContractTerms($arr[$keys[80]]);
        }
        if (array_key_exists($keys[81], $arr)) {
            $this->setDropshipBilled($arr[$keys[81]]);
        }
        if (array_key_exists($keys[82], $arr)) {
            $this->setOrderType($arr[$keys[82]]);
        }
        if (array_key_exists($keys[83], $arr)) {
            $this->setTrackingEdinumber($arr[$keys[83]]);
        }
        if (array_key_exists($keys[84], $arr)) {
            $this->setSource($arr[$keys[84]]);
        }
        if (array_key_exists($keys[85], $arr)) {
            $this->setPickFormat($arr[$keys[85]]);
        }
        if (array_key_exists($keys[86], $arr)) {
            $this->setInvoiceFormat($arr[$keys[86]]);
        }
        if (array_key_exists($keys[87], $arr)) {
            $this->setCashAmount($arr[$keys[87]]);
        }
        if (array_key_exists($keys[88], $arr)) {
            $this->setCheckAmount($arr[$keys[88]]);
        }
        if (array_key_exists($keys[89], $arr)) {
            $this->setCheckNumber($arr[$keys[89]]);
        }
        if (array_key_exists($keys[90], $arr)) {
            $this->setDepositAmount($arr[$keys[90]]);
        }
        if (array_key_exists($keys[91], $arr)) {
            $this->setDepositNumber($arr[$keys[91]]);
        }
        if (array_key_exists($keys[92], $arr)) {
            $this->setOriginalSubtotalTax($arr[$keys[92]]);
        }
        if (array_key_exists($keys[93], $arr)) {
            $this->setOriginalSubtotalNontax($arr[$keys[93]]);
        }
        if (array_key_exists($keys[94], $arr)) {
            $this->setOriginalTotalTax($arr[$keys[94]]);
        }
        if (array_key_exists($keys[95], $arr)) {
            $this->setOriginalTotal($arr[$keys[95]]);
        }
        if (array_key_exists($keys[96], $arr)) {
            $this->setPickPrintdate($arr[$keys[96]]);
        }
        if (array_key_exists($keys[97], $arr)) {
            $this->setPickPrinttime($arr[$keys[97]]);
        }
        if (array_key_exists($keys[98], $arr)) {
            $this->setContact($arr[$keys[98]]);
        }
        if (array_key_exists($keys[99], $arr)) {
            $this->setPhoneIntl($arr[$keys[99]]);
        }
        if (array_key_exists($keys[100], $arr)) {
            $this->setPhoneAccesscode($arr[$keys[100]]);
        }
        if (array_key_exists($keys[101], $arr)) {
            $this->setPhoneCountrycode($arr[$keys[101]]);
        }
        if (array_key_exists($keys[102], $arr)) {
            $this->setPhone($arr[$keys[102]]);
        }
        if (array_key_exists($keys[103], $arr)) {
            $this->setPhoneExt($arr[$keys[103]]);
        }
        if (array_key_exists($keys[104], $arr)) {
            $this->setFaxIntl($arr[$keys[104]]);
        }
        if (array_key_exists($keys[105], $arr)) {
            $this->setFaxAccesscode($arr[$keys[105]]);
        }
        if (array_key_exists($keys[106], $arr)) {
            $this->setFaxCountrycode($arr[$keys[106]]);
        }
        if (array_key_exists($keys[107], $arr)) {
            $this->setFax($arr[$keys[107]]);
        }
        if (array_key_exists($keys[108], $arr)) {
            $this->setShipAccount($arr[$keys[108]]);
        }
        if (array_key_exists($keys[109], $arr)) {
            $this->setChangeDue($arr[$keys[109]]);
        }
        if (array_key_exists($keys[110], $arr)) {
            $this->setDiscountAdditional($arr[$keys[110]]);
        }
        if (array_key_exists($keys[111], $arr)) {
            $this->setAllShip($arr[$keys[111]]);
        }
        if (array_key_exists($keys[112], $arr)) {
            $this->setCreditApplied($arr[$keys[112]]);
        }
        if (array_key_exists($keys[113], $arr)) {
            $this->setInvoicePrintdate($arr[$keys[113]]);
        }
        if (array_key_exists($keys[114], $arr)) {
            $this->setInvoicePrinttime($arr[$keys[114]]);
        }
        if (array_key_exists($keys[115], $arr)) {
            $this->setDiscountFreight($arr[$keys[115]]);
        }
        if (array_key_exists($keys[116], $arr)) {
            $this->setShipCompleteoverride($arr[$keys[116]]);
        }
        if (array_key_exists($keys[117], $arr)) {
            $this->setContactEmail($arr[$keys[117]]);
        }
        if (array_key_exists($keys[118], $arr)) {
            $this->setManualFreight($arr[$keys[118]]);
        }
        if (array_key_exists($keys[119], $arr)) {
            $this->setInternalFreight($arr[$keys[119]]);
        }
        if (array_key_exists($keys[120], $arr)) {
            $this->setCostFreight($arr[$keys[120]]);
        }
        if (array_key_exists($keys[121], $arr)) {
            $this->setRoute($arr[$keys[121]]);
        }
        if (array_key_exists($keys[122], $arr)) {
            $this->setRouteSeq($arr[$keys[122]]);
        }
        if (array_key_exists($keys[123], $arr)) {
            $this->setEdi855sent($arr[$keys[123]]);
        }
        if (array_key_exists($keys[124], $arr)) {
            $this->setFreight3rdparty($arr[$keys[124]]);
        }
        if (array_key_exists($keys[125], $arr)) {
            $this->setFob($arr[$keys[125]]);
        }
        if (array_key_exists($keys[126], $arr)) {
            $this->setConfirmImage($arr[$keys[126]]);
        }
        if (array_key_exists($keys[127], $arr)) {
            $this->setCstkConsign($arr[$keys[127]]);
        }
        if (array_key_exists($keys[128], $arr)) {
            $this->setManufacturer($arr[$keys[128]]);
        }
        if (array_key_exists($keys[129], $arr)) {
            $this->setPickQueue($arr[$keys[129]]);
        }
        if (array_key_exists($keys[130], $arr)) {
            $this->setArriveDate($arr[$keys[130]]);
        }
        if (array_key_exists($keys[131], $arr)) {
            $this->setSurchargeStatus($arr[$keys[131]]);
        }
        if (array_key_exists($keys[132], $arr)) {
            $this->setFreightGroup($arr[$keys[132]]);
        }
        if (array_key_exists($keys[133], $arr)) {
            $this->setCommOverride($arr[$keys[133]]);
        }
        if (array_key_exists($keys[134], $arr)) {
            $this->setChargeSplit($arr[$keys[134]]);
        }
        if (array_key_exists($keys[135], $arr)) {
            $this->setCreditcartApproved($arr[$keys[135]]);
        }
        if (array_key_exists($keys[136], $arr)) {
            $this->setOriginalOrdernumber($arr[$keys[136]]);
        }
        if (array_key_exists($keys[137], $arr)) {
            $this->setHasNotes($arr[$keys[137]]);
        }
        if (array_key_exists($keys[138], $arr)) {
            $this->setHasDocuments($arr[$keys[138]]);
        }
        if (array_key_exists($keys[139], $arr)) {
            $this->setHasTracking($arr[$keys[139]]);
        }
        if (array_key_exists($keys[140], $arr)) {
            $this->setDate($arr[$keys[140]]);
        }
        if (array_key_exists($keys[141], $arr)) {
            $this->setTime($arr[$keys[141]]);
        }
        if (array_key_exists($keys[142], $arr)) {
            $this->setDummy($arr[$keys[142]]);
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
     * @return $this|\OeHist The current object, for fluid interface
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
        $criteria = new Criteria(OeHistTableMap::DATABASE_NAME);

        if ($this->isColumnModified(OeHistTableMap::COL_ORDERNO)) {
            $criteria->add(OeHistTableMap::COL_ORDERNO, $this->orderno);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_STATUS)) {
            $criteria->add(OeHistTableMap::COL_STATUS, $this->status);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_HOLDSTATUS)) {
            $criteria->add(OeHistTableMap::COL_HOLDSTATUS, $this->holdstatus);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_CUSTID)) {
            $criteria->add(OeHistTableMap::COL_CUSTID, $this->custid);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SHIPTOID)) {
            $criteria->add(OeHistTableMap::COL_SHIPTOID, $this->shiptoid);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SHIPTO_NAME)) {
            $criteria->add(OeHistTableMap::COL_SHIPTO_NAME, $this->shipto_name);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SHIPTO_ADDRESS1)) {
            $criteria->add(OeHistTableMap::COL_SHIPTO_ADDRESS1, $this->shipto_address1);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SHIPTO_ADDRESS2)) {
            $criteria->add(OeHistTableMap::COL_SHIPTO_ADDRESS2, $this->shipto_address2);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SHIPTO_ADDRESS3)) {
            $criteria->add(OeHistTableMap::COL_SHIPTO_ADDRESS3, $this->shipto_address3);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SHIPTO_ADDRESS4)) {
            $criteria->add(OeHistTableMap::COL_SHIPTO_ADDRESS4, $this->shipto_address4);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SHIPTO_CITY)) {
            $criteria->add(OeHistTableMap::COL_SHIPTO_CITY, $this->shipto_city);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SHIPTO_STATE)) {
            $criteria->add(OeHistTableMap::COL_SHIPTO_STATE, $this->shipto_state);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SHIPTO_ZIP)) {
            $criteria->add(OeHistTableMap::COL_SHIPTO_ZIP, $this->shipto_zip);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_CUSTPO)) {
            $criteria->add(OeHistTableMap::COL_CUSTPO, $this->custpo);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_ORDERDATE)) {
            $criteria->add(OeHistTableMap::COL_ORDERDATE, $this->orderdate);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_TERMCODE)) {
            $criteria->add(OeHistTableMap::COL_TERMCODE, $this->termcode);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SHIPVIACODE)) {
            $criteria->add(OeHistTableMap::COL_SHIPVIACODE, $this->shipviacode);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_INVOICE_NUMBER)) {
            $criteria->add(OeHistTableMap::COL_INVOICE_NUMBER, $this->invoice_number);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_INVOICE_DATE)) {
            $criteria->add(OeHistTableMap::COL_INVOICE_DATE, $this->invoice_date);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_GENLEDGER_PERIOD)) {
            $criteria->add(OeHistTableMap::COL_GENLEDGER_PERIOD, $this->genledger_period);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SALESPERSON_1)) {
            $criteria->add(OeHistTableMap::COL_SALESPERSON_1, $this->salesperson_1);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SALESPERSON_1PCT)) {
            $criteria->add(OeHistTableMap::COL_SALESPERSON_1PCT, $this->salesperson_1pct);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SALESPERSON_2)) {
            $criteria->add(OeHistTableMap::COL_SALESPERSON_2, $this->salesperson_2);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SALESPERSON_2PCT)) {
            $criteria->add(OeHistTableMap::COL_SALESPERSON_2PCT, $this->salesperson_2pct);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SALESPERSON_3)) {
            $criteria->add(OeHistTableMap::COL_SALESPERSON_3, $this->salesperson_3);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SALESPERSON_3PCT)) {
            $criteria->add(OeHistTableMap::COL_SALESPERSON_3PCT, $this->salesperson_3pct);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_CONTRACT_NBR)) {
            $criteria->add(OeHistTableMap::COL_CONTRACT_NBR, $this->contract_nbr);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_BATCH_NBR)) {
            $criteria->add(OeHistTableMap::COL_BATCH_NBR, $this->batch_nbr);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_DROPRELEASEHOLD)) {
            $criteria->add(OeHistTableMap::COL_DROPRELEASEHOLD, $this->dropreleasehold);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SUBTOTAL_TAX)) {
            $criteria->add(OeHistTableMap::COL_SUBTOTAL_TAX, $this->subtotal_tax);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SUBTOTAL_NONTAX)) {
            $criteria->add(OeHistTableMap::COL_SUBTOTAL_NONTAX, $this->subtotal_nontax);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_TOTAL_TAX)) {
            $criteria->add(OeHistTableMap::COL_TOTAL_TAX, $this->total_tax);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_TOTAL_FREIGHT)) {
            $criteria->add(OeHistTableMap::COL_TOTAL_FREIGHT, $this->total_freight);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_TOTAL_MISC)) {
            $criteria->add(OeHistTableMap::COL_TOTAL_MISC, $this->total_misc);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_TOTAL_ORDER)) {
            $criteria->add(OeHistTableMap::COL_TOTAL_ORDER, $this->total_order);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_TOTAL_COST)) {
            $criteria->add(OeHistTableMap::COL_TOTAL_COST, $this->total_cost);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_LOCK)) {
            $criteria->add(OeHistTableMap::COL_LOCK, $this->lock);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_TAKEN_DATE)) {
            $criteria->add(OeHistTableMap::COL_TAKEN_DATE, $this->taken_date);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_TAKEN_TIME)) {
            $criteria->add(OeHistTableMap::COL_TAKEN_TIME, $this->taken_time);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_PICK_DATE)) {
            $criteria->add(OeHistTableMap::COL_PICK_DATE, $this->pick_date);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_PICK_TIME)) {
            $criteria->add(OeHistTableMap::COL_PICK_TIME, $this->pick_time);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_PACK_DATE)) {
            $criteria->add(OeHistTableMap::COL_PACK_DATE, $this->pack_date);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_PACK_TIME)) {
            $criteria->add(OeHistTableMap::COL_PACK_TIME, $this->pack_time);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_VERIFY_DATE)) {
            $criteria->add(OeHistTableMap::COL_VERIFY_DATE, $this->verify_date);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_VERIFY_TIME)) {
            $criteria->add(OeHistTableMap::COL_VERIFY_TIME, $this->verify_time);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_CREDITMEMO)) {
            $criteria->add(OeHistTableMap::COL_CREDITMEMO, $this->creditmemo);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_BOOKED)) {
            $criteria->add(OeHistTableMap::COL_BOOKED, $this->booked);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_ORIGINAL_WHSE)) {
            $criteria->add(OeHistTableMap::COL_ORIGINAL_WHSE, $this->original_whse);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_BILLTO_STATE)) {
            $criteria->add(OeHistTableMap::COL_BILLTO_STATE, $this->billto_state);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SHIPCOMPLETE)) {
            $criteria->add(OeHistTableMap::COL_SHIPCOMPLETE, $this->shipcomplete);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_CWO_FLAG)) {
            $criteria->add(OeHistTableMap::COL_CWO_FLAG, $this->cwo_flag);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_DIVISION)) {
            $criteria->add(OeHistTableMap::COL_DIVISION, $this->division);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_TAKEN_CODE)) {
            $criteria->add(OeHistTableMap::COL_TAKEN_CODE, $this->taken_code);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_PACK_CODE)) {
            $criteria->add(OeHistTableMap::COL_PACK_CODE, $this->pack_code);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_PICK_CODE)) {
            $criteria->add(OeHistTableMap::COL_PICK_CODE, $this->pick_code);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_VERIFY_CODE)) {
            $criteria->add(OeHistTableMap::COL_VERIFY_CODE, $this->verify_code);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_TOTAL_DISCOUNT)) {
            $criteria->add(OeHistTableMap::COL_TOTAL_DISCOUNT, $this->total_discount);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_EDI_REFERERENCENBR)) {
            $criteria->add(OeHistTableMap::COL_EDI_REFERERENCENBR, $this->edi_refererencenbr);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_USER_CODE1)) {
            $criteria->add(OeHistTableMap::COL_USER_CODE1, $this->user_code1);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_USER_CODE2)) {
            $criteria->add(OeHistTableMap::COL_USER_CODE2, $this->user_code2);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_USER_CODE3)) {
            $criteria->add(OeHistTableMap::COL_USER_CODE3, $this->user_code3);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_USER_CODE4)) {
            $criteria->add(OeHistTableMap::COL_USER_CODE4, $this->user_code4);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_EXCHANGE_COUNTRY)) {
            $criteria->add(OeHistTableMap::COL_EXCHANGE_COUNTRY, $this->exchange_country);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_EXCHANGE_RATE)) {
            $criteria->add(OeHistTableMap::COL_EXCHANGE_RATE, $this->exchange_rate);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_WEIGHT_TOTAL)) {
            $criteria->add(OeHistTableMap::COL_WEIGHT_TOTAL, $this->weight_total);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_WEIGHT_OVERRIDE)) {
            $criteria->add(OeHistTableMap::COL_WEIGHT_OVERRIDE, $this->weight_override);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_BOX_COUNT)) {
            $criteria->add(OeHistTableMap::COL_BOX_COUNT, $this->box_count);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_REQUEST_DATE)) {
            $criteria->add(OeHistTableMap::COL_REQUEST_DATE, $this->request_date);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_CANCEL_DATE)) {
            $criteria->add(OeHistTableMap::COL_CANCEL_DATE, $this->cancel_date);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_LOCKEDBY)) {
            $criteria->add(OeHistTableMap::COL_LOCKEDBY, $this->lockedby);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_RELEASE_NUMBER)) {
            $criteria->add(OeHistTableMap::COL_RELEASE_NUMBER, $this->release_number);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_WHSE)) {
            $criteria->add(OeHistTableMap::COL_WHSE, $this->whse);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_BACKORDER_DATE)) {
            $criteria->add(OeHistTableMap::COL_BACKORDER_DATE, $this->backorder_date);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_DEPTCODE)) {
            $criteria->add(OeHistTableMap::COL_DEPTCODE, $this->deptcode);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_FREIGHT_IN_ENTERED)) {
            $criteria->add(OeHistTableMap::COL_FREIGHT_IN_ENTERED, $this->freight_in_entered);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_DROPSHIP_ENTERED)) {
            $criteria->add(OeHistTableMap::COL_DROPSHIP_ENTERED, $this->dropship_entered);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_ER_FLAG)) {
            $criteria->add(OeHistTableMap::COL_ER_FLAG, $this->er_flag);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_FREIGHT_IN)) {
            $criteria->add(OeHistTableMap::COL_FREIGHT_IN, $this->freight_in);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_DROPSHIP)) {
            $criteria->add(OeHistTableMap::COL_DROPSHIP, $this->dropship);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_MINORDER)) {
            $criteria->add(OeHistTableMap::COL_MINORDER, $this->minorder);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_CONTRACT_TERMS)) {
            $criteria->add(OeHistTableMap::COL_CONTRACT_TERMS, $this->contract_terms);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_DROPSHIP_BILLED)) {
            $criteria->add(OeHistTableMap::COL_DROPSHIP_BILLED, $this->dropship_billed);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_ORDER_TYPE)) {
            $criteria->add(OeHistTableMap::COL_ORDER_TYPE, $this->order_type);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_TRACKING_EDINUMBER)) {
            $criteria->add(OeHistTableMap::COL_TRACKING_EDINUMBER, $this->tracking_edinumber);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SOURCE)) {
            $criteria->add(OeHistTableMap::COL_SOURCE, $this->source);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_PICK_FORMAT)) {
            $criteria->add(OeHistTableMap::COL_PICK_FORMAT, $this->pick_format);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_INVOICE_FORMAT)) {
            $criteria->add(OeHistTableMap::COL_INVOICE_FORMAT, $this->invoice_format);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_CASH_AMOUNT)) {
            $criteria->add(OeHistTableMap::COL_CASH_AMOUNT, $this->cash_amount);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_CHECK_AMOUNT)) {
            $criteria->add(OeHistTableMap::COL_CHECK_AMOUNT, $this->check_amount);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_CHECK_NUMBER)) {
            $criteria->add(OeHistTableMap::COL_CHECK_NUMBER, $this->check_number);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_DEPOSIT_AMOUNT)) {
            $criteria->add(OeHistTableMap::COL_DEPOSIT_AMOUNT, $this->deposit_amount);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_DEPOSIT_NUMBER)) {
            $criteria->add(OeHistTableMap::COL_DEPOSIT_NUMBER, $this->deposit_number);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_ORIGINAL_SUBTOTAL_TAX)) {
            $criteria->add(OeHistTableMap::COL_ORIGINAL_SUBTOTAL_TAX, $this->original_subtotal_tax);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_ORIGINAL_SUBTOTAL_NONTAX)) {
            $criteria->add(OeHistTableMap::COL_ORIGINAL_SUBTOTAL_NONTAX, $this->original_subtotal_nontax);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_ORIGINAL_TOTAL_TAX)) {
            $criteria->add(OeHistTableMap::COL_ORIGINAL_TOTAL_TAX, $this->original_total_tax);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_ORIGINAL_TOTAL)) {
            $criteria->add(OeHistTableMap::COL_ORIGINAL_TOTAL, $this->original_total);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_PICK_PRINTDATE)) {
            $criteria->add(OeHistTableMap::COL_PICK_PRINTDATE, $this->pick_printdate);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_PICK_PRINTTIME)) {
            $criteria->add(OeHistTableMap::COL_PICK_PRINTTIME, $this->pick_printtime);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_CONTACT)) {
            $criteria->add(OeHistTableMap::COL_CONTACT, $this->contact);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_PHONE_INTL)) {
            $criteria->add(OeHistTableMap::COL_PHONE_INTL, $this->phone_intl);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_PHONE_ACCESSCODE)) {
            $criteria->add(OeHistTableMap::COL_PHONE_ACCESSCODE, $this->phone_accesscode);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_PHONE_COUNTRYCODE)) {
            $criteria->add(OeHistTableMap::COL_PHONE_COUNTRYCODE, $this->phone_countrycode);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_PHONE)) {
            $criteria->add(OeHistTableMap::COL_PHONE, $this->phone);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_PHONE_EXT)) {
            $criteria->add(OeHistTableMap::COL_PHONE_EXT, $this->phone_ext);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_FAX_INTL)) {
            $criteria->add(OeHistTableMap::COL_FAX_INTL, $this->fax_intl);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_FAX_ACCESSCODE)) {
            $criteria->add(OeHistTableMap::COL_FAX_ACCESSCODE, $this->fax_accesscode);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_FAX_COUNTRYCODE)) {
            $criteria->add(OeHistTableMap::COL_FAX_COUNTRYCODE, $this->fax_countrycode);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_FAX)) {
            $criteria->add(OeHistTableMap::COL_FAX, $this->fax);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SHIP_ACCOUNT)) {
            $criteria->add(OeHistTableMap::COL_SHIP_ACCOUNT, $this->ship_account);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_CHANGE_DUE)) {
            $criteria->add(OeHistTableMap::COL_CHANGE_DUE, $this->change_due);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_DISCOUNT_ADDITIONAL)) {
            $criteria->add(OeHistTableMap::COL_DISCOUNT_ADDITIONAL, $this->discount_additional);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_ALL_SHIP)) {
            $criteria->add(OeHistTableMap::COL_ALL_SHIP, $this->all_ship);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_CREDIT_APPLIED)) {
            $criteria->add(OeHistTableMap::COL_CREDIT_APPLIED, $this->credit_applied);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_INVOICE_PRINTDATE)) {
            $criteria->add(OeHistTableMap::COL_INVOICE_PRINTDATE, $this->invoice_printdate);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_INVOICE_PRINTTIME)) {
            $criteria->add(OeHistTableMap::COL_INVOICE_PRINTTIME, $this->invoice_printtime);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_DISCOUNT_FREIGHT)) {
            $criteria->add(OeHistTableMap::COL_DISCOUNT_FREIGHT, $this->discount_freight);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SHIP_COMPLETEOVERRIDE)) {
            $criteria->add(OeHistTableMap::COL_SHIP_COMPLETEOVERRIDE, $this->ship_completeoverride);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_CONTACT_EMAIL)) {
            $criteria->add(OeHistTableMap::COL_CONTACT_EMAIL, $this->contact_email);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_MANUAL_FREIGHT)) {
            $criteria->add(OeHistTableMap::COL_MANUAL_FREIGHT, $this->manual_freight);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_INTERNAL_FREIGHT)) {
            $criteria->add(OeHistTableMap::COL_INTERNAL_FREIGHT, $this->internal_freight);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_COST_FREIGHT)) {
            $criteria->add(OeHistTableMap::COL_COST_FREIGHT, $this->cost_freight);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_ROUTE)) {
            $criteria->add(OeHistTableMap::COL_ROUTE, $this->route);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_ROUTE_SEQ)) {
            $criteria->add(OeHistTableMap::COL_ROUTE_SEQ, $this->route_seq);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_EDI_855SENT)) {
            $criteria->add(OeHistTableMap::COL_EDI_855SENT, $this->edi_855sent);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_FREIGHT_3RDPARTY)) {
            $criteria->add(OeHistTableMap::COL_FREIGHT_3RDPARTY, $this->freight_3rdparty);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_FOB)) {
            $criteria->add(OeHistTableMap::COL_FOB, $this->fob);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_CONFIRM_IMAGE)) {
            $criteria->add(OeHistTableMap::COL_CONFIRM_IMAGE, $this->confirm_image);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_CSTK_CONSIGN)) {
            $criteria->add(OeHistTableMap::COL_CSTK_CONSIGN, $this->cstk_consign);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_MANUFACTURER)) {
            $criteria->add(OeHistTableMap::COL_MANUFACTURER, $this->manufacturer);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_PICK_QUEUE)) {
            $criteria->add(OeHistTableMap::COL_PICK_QUEUE, $this->pick_queue);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_ARRIVE_DATE)) {
            $criteria->add(OeHistTableMap::COL_ARRIVE_DATE, $this->arrive_date);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_SURCHARGE_STATUS)) {
            $criteria->add(OeHistTableMap::COL_SURCHARGE_STATUS, $this->surcharge_status);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_FREIGHT_GROUP)) {
            $criteria->add(OeHistTableMap::COL_FREIGHT_GROUP, $this->freight_group);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_COMM_OVERRIDE)) {
            $criteria->add(OeHistTableMap::COL_COMM_OVERRIDE, $this->comm_override);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_CHARGE_SPLIT)) {
            $criteria->add(OeHistTableMap::COL_CHARGE_SPLIT, $this->charge_split);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_CREDITCART_APPROVED)) {
            $criteria->add(OeHistTableMap::COL_CREDITCART_APPROVED, $this->creditcart_approved);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_ORIGINAL_ORDERNUMBER)) {
            $criteria->add(OeHistTableMap::COL_ORIGINAL_ORDERNUMBER, $this->original_ordernumber);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_HAS_NOTES)) {
            $criteria->add(OeHistTableMap::COL_HAS_NOTES, $this->has_notes);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_HAS_DOCUMENTS)) {
            $criteria->add(OeHistTableMap::COL_HAS_DOCUMENTS, $this->has_documents);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_HAS_TRACKING)) {
            $criteria->add(OeHistTableMap::COL_HAS_TRACKING, $this->has_tracking);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_DATE)) {
            $criteria->add(OeHistTableMap::COL_DATE, $this->date);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_TIME)) {
            $criteria->add(OeHistTableMap::COL_TIME, $this->time);
        }
        if ($this->isColumnModified(OeHistTableMap::COL_DUMMY)) {
            $criteria->add(OeHistTableMap::COL_DUMMY, $this->dummy);
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
        $criteria = ChildOeHistQuery::create();
        $criteria->add(OeHistTableMap::COL_ORDERNO, $this->orderno);

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
        $validPk = null !== $this->getOrderno();

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
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getOrderno();
    }

    /**
     * Generic method to set the primary key (orderno column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setOrderno($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getOrderno();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \OeHist (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setOrderno($this->getOrderno());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setHoldstatus($this->getHoldstatus());
        $copyObj->setCustid($this->getCustid());
        $copyObj->setShiptoid($this->getShiptoid());
        $copyObj->setShiptoName($this->getShiptoName());
        $copyObj->setShiptoAddress1($this->getShiptoAddress1());
        $copyObj->setShiptoAddress2($this->getShiptoAddress2());
        $copyObj->setShiptoAddress3($this->getShiptoAddress3());
        $copyObj->setShiptoAddress4($this->getShiptoAddress4());
        $copyObj->setShiptoCity($this->getShiptoCity());
        $copyObj->setShiptoState($this->getShiptoState());
        $copyObj->setShiptoZip($this->getShiptoZip());
        $copyObj->setCustpo($this->getCustpo());
        $copyObj->setOrderdate($this->getOrderdate());
        $copyObj->setTermcode($this->getTermcode());
        $copyObj->setShipviacode($this->getShipviacode());
        $copyObj->setInvoiceNumber($this->getInvoiceNumber());
        $copyObj->setInvoiceDate($this->getInvoiceDate());
        $copyObj->setGenledgerPeriod($this->getGenledgerPeriod());
        $copyObj->setSalesperson1($this->getSalesperson1());
        $copyObj->setSalesperson1pct($this->getSalesperson1pct());
        $copyObj->setSalesperson2($this->getSalesperson2());
        $copyObj->setSalesperson2pct($this->getSalesperson2pct());
        $copyObj->setSalesperson3($this->getSalesperson3());
        $copyObj->setSalesperson3pct($this->getSalesperson3pct());
        $copyObj->setContractNbr($this->getContractNbr());
        $copyObj->setBatchNbr($this->getBatchNbr());
        $copyObj->setDropreleasehold($this->getDropreleasehold());
        $copyObj->setSubtotalTax($this->getSubtotalTax());
        $copyObj->setSubtotalNontax($this->getSubtotalNontax());
        $copyObj->setTotalTax($this->getTotalTax());
        $copyObj->setTotalFreight($this->getTotalFreight());
        $copyObj->setTotalMisc($this->getTotalMisc());
        $copyObj->setTotalOrder($this->getTotalOrder());
        $copyObj->setTotalCost($this->getTotalCost());
        $copyObj->setLock($this->getLock());
        $copyObj->setTakenDate($this->getTakenDate());
        $copyObj->setTakenTime($this->getTakenTime());
        $copyObj->setPickDate($this->getPickDate());
        $copyObj->setPickTime($this->getPickTime());
        $copyObj->setPackDate($this->getPackDate());
        $copyObj->setPackTime($this->getPackTime());
        $copyObj->setVerifyDate($this->getVerifyDate());
        $copyObj->setVerifyTime($this->getVerifyTime());
        $copyObj->setCreditmemo($this->getCreditmemo());
        $copyObj->setBooked($this->getBooked());
        $copyObj->setOriginalWhse($this->getOriginalWhse());
        $copyObj->setBilltoState($this->getBilltoState());
        $copyObj->setShipcomplete($this->getShipcomplete());
        $copyObj->setCwoFlag($this->getCwoFlag());
        $copyObj->setDivision($this->getDivision());
        $copyObj->setTakenCode($this->getTakenCode());
        $copyObj->setPackCode($this->getPackCode());
        $copyObj->setPickCode($this->getPickCode());
        $copyObj->setVerifyCode($this->getVerifyCode());
        $copyObj->setTotalDiscount($this->getTotalDiscount());
        $copyObj->setEdiRefererencenbr($this->getEdiRefererencenbr());
        $copyObj->setUserCode1($this->getUserCode1());
        $copyObj->setUserCode2($this->getUserCode2());
        $copyObj->setUserCode3($this->getUserCode3());
        $copyObj->setUserCode4($this->getUserCode4());
        $copyObj->setExchangeCountry($this->getExchangeCountry());
        $copyObj->setExchangeRate($this->getExchangeRate());
        $copyObj->setWeightTotal($this->getWeightTotal());
        $copyObj->setWeightOverride($this->getWeightOverride());
        $copyObj->setBoxCount($this->getBoxCount());
        $copyObj->setRequestDate($this->getRequestDate());
        $copyObj->setCancelDate($this->getCancelDate());
        $copyObj->setLockedby($this->getLockedby());
        $copyObj->setReleaseNumber($this->getReleaseNumber());
        $copyObj->setWhse($this->getWhse());
        $copyObj->setBackorderDate($this->getBackorderDate());
        $copyObj->setDeptcode($this->getDeptcode());
        $copyObj->setFreightInEntered($this->getFreightInEntered());
        $copyObj->setDropshipEntered($this->getDropshipEntered());
        $copyObj->setErFlag($this->getErFlag());
        $copyObj->setFreightIn($this->getFreightIn());
        $copyObj->setDropship($this->getDropship());
        $copyObj->setMinorder($this->getMinorder());
        $copyObj->setContractTerms($this->getContractTerms());
        $copyObj->setDropshipBilled($this->getDropshipBilled());
        $copyObj->setOrderType($this->getOrderType());
        $copyObj->setTrackingEdinumber($this->getTrackingEdinumber());
        $copyObj->setSource($this->getSource());
        $copyObj->setPickFormat($this->getPickFormat());
        $copyObj->setInvoiceFormat($this->getInvoiceFormat());
        $copyObj->setCashAmount($this->getCashAmount());
        $copyObj->setCheckAmount($this->getCheckAmount());
        $copyObj->setCheckNumber($this->getCheckNumber());
        $copyObj->setDepositAmount($this->getDepositAmount());
        $copyObj->setDepositNumber($this->getDepositNumber());
        $copyObj->setOriginalSubtotalTax($this->getOriginalSubtotalTax());
        $copyObj->setOriginalSubtotalNontax($this->getOriginalSubtotalNontax());
        $copyObj->setOriginalTotalTax($this->getOriginalTotalTax());
        $copyObj->setOriginalTotal($this->getOriginalTotal());
        $copyObj->setPickPrintdate($this->getPickPrintdate());
        $copyObj->setPickPrinttime($this->getPickPrinttime());
        $copyObj->setContact($this->getContact());
        $copyObj->setPhoneIntl($this->getPhoneIntl());
        $copyObj->setPhoneAccesscode($this->getPhoneAccesscode());
        $copyObj->setPhoneCountrycode($this->getPhoneCountrycode());
        $copyObj->setPhone($this->getPhone());
        $copyObj->setPhoneExt($this->getPhoneExt());
        $copyObj->setFaxIntl($this->getFaxIntl());
        $copyObj->setFaxAccesscode($this->getFaxAccesscode());
        $copyObj->setFaxCountrycode($this->getFaxCountrycode());
        $copyObj->setFax($this->getFax());
        $copyObj->setShipAccount($this->getShipAccount());
        $copyObj->setChangeDue($this->getChangeDue());
        $copyObj->setDiscountAdditional($this->getDiscountAdditional());
        $copyObj->setAllShip($this->getAllShip());
        $copyObj->setCreditApplied($this->getCreditApplied());
        $copyObj->setInvoicePrintdate($this->getInvoicePrintdate());
        $copyObj->setInvoicePrinttime($this->getInvoicePrinttime());
        $copyObj->setDiscountFreight($this->getDiscountFreight());
        $copyObj->setShipCompleteoverride($this->getShipCompleteoverride());
        $copyObj->setContactEmail($this->getContactEmail());
        $copyObj->setManualFreight($this->getManualFreight());
        $copyObj->setInternalFreight($this->getInternalFreight());
        $copyObj->setCostFreight($this->getCostFreight());
        $copyObj->setRoute($this->getRoute());
        $copyObj->setRouteSeq($this->getRouteSeq());
        $copyObj->setEdi855sent($this->getEdi855sent());
        $copyObj->setFreight3rdparty($this->getFreight3rdparty());
        $copyObj->setFob($this->getFob());
        $copyObj->setConfirmImage($this->getConfirmImage());
        $copyObj->setCstkConsign($this->getCstkConsign());
        $copyObj->setManufacturer($this->getManufacturer());
        $copyObj->setPickQueue($this->getPickQueue());
        $copyObj->setArriveDate($this->getArriveDate());
        $copyObj->setSurchargeStatus($this->getSurchargeStatus());
        $copyObj->setFreightGroup($this->getFreightGroup());
        $copyObj->setCommOverride($this->getCommOverride());
        $copyObj->setChargeSplit($this->getChargeSplit());
        $copyObj->setCreditcartApproved($this->getCreditcartApproved());
        $copyObj->setOriginalOrdernumber($this->getOriginalOrdernumber());
        $copyObj->setHasNotes($this->getHasNotes());
        $copyObj->setHasDocuments($this->getHasDocuments());
        $copyObj->setHasTracking($this->getHasTracking());
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
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \OeHist Clone of current object.
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
        $this->orderno = null;
        $this->status = null;
        $this->holdstatus = null;
        $this->custid = null;
        $this->shiptoid = null;
        $this->shipto_name = null;
        $this->shipto_address1 = null;
        $this->shipto_address2 = null;
        $this->shipto_address3 = null;
        $this->shipto_address4 = null;
        $this->shipto_city = null;
        $this->shipto_state = null;
        $this->shipto_zip = null;
        $this->custpo = null;
        $this->orderdate = null;
        $this->termcode = null;
        $this->shipviacode = null;
        $this->invoice_number = null;
        $this->invoice_date = null;
        $this->genledger_period = null;
        $this->salesperson_1 = null;
        $this->salesperson_1pct = null;
        $this->salesperson_2 = null;
        $this->salesperson_2pct = null;
        $this->salesperson_3 = null;
        $this->salesperson_3pct = null;
        $this->contract_nbr = null;
        $this->batch_nbr = null;
        $this->dropreleasehold = null;
        $this->subtotal_tax = null;
        $this->subtotal_nontax = null;
        $this->total_tax = null;
        $this->total_freight = null;
        $this->total_misc = null;
        $this->total_order = null;
        $this->total_cost = null;
        $this->lock = null;
        $this->taken_date = null;
        $this->taken_time = null;
        $this->pick_date = null;
        $this->pick_time = null;
        $this->pack_date = null;
        $this->pack_time = null;
        $this->verify_date = null;
        $this->verify_time = null;
        $this->creditmemo = null;
        $this->booked = null;
        $this->original_whse = null;
        $this->billto_state = null;
        $this->shipcomplete = null;
        $this->cwo_flag = null;
        $this->division = null;
        $this->taken_code = null;
        $this->pack_code = null;
        $this->pick_code = null;
        $this->verify_code = null;
        $this->total_discount = null;
        $this->edi_refererencenbr = null;
        $this->user_code1 = null;
        $this->user_code2 = null;
        $this->user_code3 = null;
        $this->user_code4 = null;
        $this->exchange_country = null;
        $this->exchange_rate = null;
        $this->weight_total = null;
        $this->weight_override = null;
        $this->box_count = null;
        $this->request_date = null;
        $this->cancel_date = null;
        $this->lockedby = null;
        $this->release_number = null;
        $this->whse = null;
        $this->backorder_date = null;
        $this->deptcode = null;
        $this->freight_in_entered = null;
        $this->dropship_entered = null;
        $this->er_flag = null;
        $this->freight_in = null;
        $this->dropship = null;
        $this->minorder = null;
        $this->contract_terms = null;
        $this->dropship_billed = null;
        $this->order_type = null;
        $this->tracking_edinumber = null;
        $this->source = null;
        $this->pick_format = null;
        $this->invoice_format = null;
        $this->cash_amount = null;
        $this->check_amount = null;
        $this->check_number = null;
        $this->deposit_amount = null;
        $this->deposit_number = null;
        $this->original_subtotal_tax = null;
        $this->original_subtotal_nontax = null;
        $this->original_total_tax = null;
        $this->original_total = null;
        $this->pick_printdate = null;
        $this->pick_printtime = null;
        $this->contact = null;
        $this->phone_intl = null;
        $this->phone_accesscode = null;
        $this->phone_countrycode = null;
        $this->phone = null;
        $this->phone_ext = null;
        $this->fax_intl = null;
        $this->fax_accesscode = null;
        $this->fax_countrycode = null;
        $this->fax = null;
        $this->ship_account = null;
        $this->change_due = null;
        $this->discount_additional = null;
        $this->all_ship = null;
        $this->credit_applied = null;
        $this->invoice_printdate = null;
        $this->invoice_printtime = null;
        $this->discount_freight = null;
        $this->ship_completeoverride = null;
        $this->contact_email = null;
        $this->manual_freight = null;
        $this->internal_freight = null;
        $this->cost_freight = null;
        $this->route = null;
        $this->route_seq = null;
        $this->edi_855sent = null;
        $this->freight_3rdparty = null;
        $this->fob = null;
        $this->confirm_image = null;
        $this->cstk_consign = null;
        $this->manufacturer = null;
        $this->pick_queue = null;
        $this->arrive_date = null;
        $this->surcharge_status = null;
        $this->freight_group = null;
        $this->comm_override = null;
        $this->charge_split = null;
        $this->creditcart_approved = null;
        $this->original_ordernumber = null;
        $this->has_notes = null;
        $this->has_documents = null;
        $this->has_tracking = null;
        $this->date = null;
        $this->time = null;
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
        return (string) $this->exportTo(OeHistTableMap::DEFAULT_STRING_FORMAT);
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
