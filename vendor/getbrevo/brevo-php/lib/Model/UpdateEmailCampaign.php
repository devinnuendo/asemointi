<?php
/**
 * UpdateEmailCampaign
 *
 * PHP version 5
 *
 * @category Class
 * @package  Brevo\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Brevo API
 *
 * Brevo provide a RESTFul API that can be used with any languages. With this API, you will be able to :   - Manage your campaigns and get the statistics   - Manage your contacts   - Send transactional Emails and SMS   - and much more...  You can download our wrappers at https://github.com/orgs/brevo  **Possible responses**   | Code | Message |   | :-------------: | ------------- |   | 200  | OK. Successful Request  |   | 201  | OK. Successful Creation |   | 202  | OK. Request accepted |   | 204  | OK. Successful Update/Deletion  |   | 400  | Error. Bad Request  |   | 401  | Error. Authentication Needed  |   | 402  | Error. Not enough credit, plan upgrade needed  |   | 403  | Error. Permission denied  |   | 404  | Error. Object does not exist |   | 405  | Error. Method not allowed  |   | 406  | Error. Not Acceptable  |
 *
 * OpenAPI spec version: 3.0.0
 * Contact: contact@brevo.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 2.4.29
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Brevo\Client\Model;

use \ArrayAccess;
use \Brevo\Client\ObjectSerializer;

/**
 * UpdateEmailCampaign Class Doc Comment
 *
 * @category Class
 * @package  Brevo\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class UpdateEmailCampaign implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'updateEmailCampaign';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'tag' => 'string',
        'sender' => '\Brevo\Client\Model\UpdateEmailCampaignSender',
        'name' => 'string',
        'htmlContent' => 'string',
        'htmlUrl' => 'string',
        'scheduledAt' => 'string',
        'subject' => 'string',
        'previewText' => 'string',
        'replyTo' => 'string',
        'toField' => 'string',
        'recipients' => '\Brevo\Client\Model\UpdateEmailCampaignRecipients',
        'attachmentUrl' => 'string',
        'inlineImageActivation' => 'bool',
        'mirrorActive' => 'bool',
        'recurring' => 'bool',
        'footer' => 'string',
        'header' => 'string',
        'utmCampaign' => 'string',
        'params' => 'object',
        'sendAtBestTime' => 'bool',
        'abTesting' => 'bool',
        'subjectA' => 'string',
        'subjectB' => 'string',
        'splitRule' => 'int',
        'winnerCriteria' => 'string',
        'winnerDelay' => 'int',
        'ipWarmupEnable' => 'bool',
        'initialQuota' => 'int',
        'increaseRate' => 'int',
        'unsubscriptionPageId' => 'string',
        'updateFormId' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'tag' => null,
        'sender' => null,
        'name' => null,
        'htmlContent' => null,
        'htmlUrl' => 'url',
        'scheduledAt' => null,
        'subject' => null,
        'previewText' => null,
        'replyTo' => 'email',
        'toField' => null,
        'recipients' => null,
        'attachmentUrl' => 'url',
        'inlineImageActivation' => null,
        'mirrorActive' => null,
        'recurring' => null,
        'footer' => null,
        'header' => null,
        'utmCampaign' => null,
        'params' => null,
        'sendAtBestTime' => null,
        'abTesting' => null,
        'subjectA' => null,
        'subjectB' => null,
        'splitRule' => 'int64',
        'winnerCriteria' => null,
        'winnerDelay' => 'int64',
        'ipWarmupEnable' => null,
        'initialQuota' => 'int64',
        'increaseRate' => 'int64',
        'unsubscriptionPageId' => null,
        'updateFormId' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'tag' => 'tag',
        'sender' => 'sender',
        'name' => 'name',
        'htmlContent' => 'htmlContent',
        'htmlUrl' => 'htmlUrl',
        'scheduledAt' => 'scheduledAt',
        'subject' => 'subject',
        'previewText' => 'previewText',
        'replyTo' => 'replyTo',
        'toField' => 'toField',
        'recipients' => 'recipients',
        'attachmentUrl' => 'attachmentUrl',
        'inlineImageActivation' => 'inlineImageActivation',
        'mirrorActive' => 'mirrorActive',
        'recurring' => 'recurring',
        'footer' => 'footer',
        'header' => 'header',
        'utmCampaign' => 'utmCampaign',
        'params' => 'params',
        'sendAtBestTime' => 'sendAtBestTime',
        'abTesting' => 'abTesting',
        'subjectA' => 'subjectA',
        'subjectB' => 'subjectB',
        'splitRule' => 'splitRule',
        'winnerCriteria' => 'winnerCriteria',
        'winnerDelay' => 'winnerDelay',
        'ipWarmupEnable' => 'ipWarmupEnable',
        'initialQuota' => 'initialQuota',
        'increaseRate' => 'increaseRate',
        'unsubscriptionPageId' => 'unsubscriptionPageId',
        'updateFormId' => 'updateFormId'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'tag' => 'setTag',
        'sender' => 'setSender',
        'name' => 'setName',
        'htmlContent' => 'setHtmlContent',
        'htmlUrl' => 'setHtmlUrl',
        'scheduledAt' => 'setScheduledAt',
        'subject' => 'setSubject',
        'previewText' => 'setPreviewText',
        'replyTo' => 'setReplyTo',
        'toField' => 'setToField',
        'recipients' => 'setRecipients',
        'attachmentUrl' => 'setAttachmentUrl',
        'inlineImageActivation' => 'setInlineImageActivation',
        'mirrorActive' => 'setMirrorActive',
        'recurring' => 'setRecurring',
        'footer' => 'setFooter',
        'header' => 'setHeader',
        'utmCampaign' => 'setUtmCampaign',
        'params' => 'setParams',
        'sendAtBestTime' => 'setSendAtBestTime',
        'abTesting' => 'setAbTesting',
        'subjectA' => 'setSubjectA',
        'subjectB' => 'setSubjectB',
        'splitRule' => 'setSplitRule',
        'winnerCriteria' => 'setWinnerCriteria',
        'winnerDelay' => 'setWinnerDelay',
        'ipWarmupEnable' => 'setIpWarmupEnable',
        'initialQuota' => 'setInitialQuota',
        'increaseRate' => 'setIncreaseRate',
        'unsubscriptionPageId' => 'setUnsubscriptionPageId',
        'updateFormId' => 'setUpdateFormId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'tag' => 'getTag',
        'sender' => 'getSender',
        'name' => 'getName',
        'htmlContent' => 'getHtmlContent',
        'htmlUrl' => 'getHtmlUrl',
        'scheduledAt' => 'getScheduledAt',
        'subject' => 'getSubject',
        'previewText' => 'getPreviewText',
        'replyTo' => 'getReplyTo',
        'toField' => 'getToField',
        'recipients' => 'getRecipients',
        'attachmentUrl' => 'getAttachmentUrl',
        'inlineImageActivation' => 'getInlineImageActivation',
        'mirrorActive' => 'getMirrorActive',
        'recurring' => 'getRecurring',
        'footer' => 'getFooter',
        'header' => 'getHeader',
        'utmCampaign' => 'getUtmCampaign',
        'params' => 'getParams',
        'sendAtBestTime' => 'getSendAtBestTime',
        'abTesting' => 'getAbTesting',
        'subjectA' => 'getSubjectA',
        'subjectB' => 'getSubjectB',
        'splitRule' => 'getSplitRule',
        'winnerCriteria' => 'getWinnerCriteria',
        'winnerDelay' => 'getWinnerDelay',
        'ipWarmupEnable' => 'getIpWarmupEnable',
        'initialQuota' => 'getInitialQuota',
        'increaseRate' => 'getIncreaseRate',
        'unsubscriptionPageId' => 'getUnsubscriptionPageId',
        'updateFormId' => 'getUpdateFormId'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    const WINNER_CRITERIA_OPEN = 'open';
    const WINNER_CRITERIA_CLICK = 'click';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getWinnerCriteriaAllowableValues()
    {
        return [
            self::WINNER_CRITERIA_OPEN,
            self::WINNER_CRITERIA_CLICK,
        ];
    }
    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['tag'] = isset($data['tag']) ? $data['tag'] : null;
        $this->container['sender'] = isset($data['sender']) ? $data['sender'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['htmlContent'] = isset($data['htmlContent']) ? $data['htmlContent'] : null;
        $this->container['htmlUrl'] = isset($data['htmlUrl']) ? $data['htmlUrl'] : null;
        $this->container['scheduledAt'] = isset($data['scheduledAt']) ? $data['scheduledAt'] : null;
        $this->container['subject'] = isset($data['subject']) ? $data['subject'] : null;
        $this->container['previewText'] = isset($data['previewText']) ? $data['previewText'] : null;
        $this->container['replyTo'] = isset($data['replyTo']) ? $data['replyTo'] : null;
        $this->container['toField'] = isset($data['toField']) ? $data['toField'] : null;
        $this->container['recipients'] = isset($data['recipients']) ? $data['recipients'] : null;
        $this->container['attachmentUrl'] = isset($data['attachmentUrl']) ? $data['attachmentUrl'] : null;
        $this->container['inlineImageActivation'] = isset($data['inlineImageActivation']) ? $data['inlineImageActivation'] : false;
        $this->container['mirrorActive'] = isset($data['mirrorActive']) ? $data['mirrorActive'] : null;
        $this->container['recurring'] = isset($data['recurring']) ? $data['recurring'] : false;
        $this->container['footer'] = isset($data['footer']) ? $data['footer'] : null;
        $this->container['header'] = isset($data['header']) ? $data['header'] : null;
        $this->container['utmCampaign'] = isset($data['utmCampaign']) ? $data['utmCampaign'] : null;
        $this->container['params'] = isset($data['params']) ? $data['params'] : null;
        $this->container['sendAtBestTime'] = isset($data['sendAtBestTime']) ? $data['sendAtBestTime'] : null;
        $this->container['abTesting'] = isset($data['abTesting']) ? $data['abTesting'] : false;
        $this->container['subjectA'] = isset($data['subjectA']) ? $data['subjectA'] : null;
        $this->container['subjectB'] = isset($data['subjectB']) ? $data['subjectB'] : null;
        $this->container['splitRule'] = isset($data['splitRule']) ? $data['splitRule'] : null;
        $this->container['winnerCriteria'] = isset($data['winnerCriteria']) ? $data['winnerCriteria'] : null;
        $this->container['winnerDelay'] = isset($data['winnerDelay']) ? $data['winnerDelay'] : null;
        $this->container['ipWarmupEnable'] = isset($data['ipWarmupEnable']) ? $data['ipWarmupEnable'] : false;
        $this->container['initialQuota'] = isset($data['initialQuota']) ? $data['initialQuota'] : null;
        $this->container['increaseRate'] = isset($data['increaseRate']) ? $data['increaseRate'] : null;
        $this->container['unsubscriptionPageId'] = isset($data['unsubscriptionPageId']) ? $data['unsubscriptionPageId'] : null;
        $this->container['updateFormId'] = isset($data['updateFormId']) ? $data['updateFormId'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['splitRule']) && ($this->container['splitRule'] > 50)) {
            $invalidProperties[] = "invalid value for 'splitRule', must be smaller than or equal to 50.";
        }

        if (!is_null($this->container['splitRule']) && ($this->container['splitRule'] < 1)) {
            $invalidProperties[] = "invalid value for 'splitRule', must be bigger than or equal to 1.";
        }

        $allowedValues = $this->getWinnerCriteriaAllowableValues();
        if (!is_null($this->container['winnerCriteria']) && !in_array($this->container['winnerCriteria'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'winnerCriteria', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['winnerDelay']) && ($this->container['winnerDelay'] > 168)) {
            $invalidProperties[] = "invalid value for 'winnerDelay', must be smaller than or equal to 168.";
        }

        if (!is_null($this->container['winnerDelay']) && ($this->container['winnerDelay'] < 1)) {
            $invalidProperties[] = "invalid value for 'winnerDelay', must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['increaseRate']) && ($this->container['increaseRate'] > 100)) {
            $invalidProperties[] = "invalid value for 'increaseRate', must be smaller than or equal to 100.";
        }

        if (!is_null($this->container['increaseRate']) && ($this->container['increaseRate'] < 0)) {
            $invalidProperties[] = "invalid value for 'increaseRate', must be bigger than or equal to 0.";
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets tag
     *
     * @return string
     */
    public function getTag()
    {
        return $this->container['tag'];
    }

    /**
     * Sets tag
     *
     * @param string $tag Tag of the campaign
     *
     * @return $this
     */
    public function setTag($tag)
    {
        $this->container['tag'] = $tag;

        return $this;
    }

    /**
     * Gets sender
     *
     * @return \Brevo\Client\Model\UpdateEmailCampaignSender
     */
    public function getSender()
    {
        return $this->container['sender'];
    }

    /**
     * Sets sender
     *
     * @param \Brevo\Client\Model\UpdateEmailCampaignSender $sender sender
     *
     * @return $this
     */
    public function setSender($sender)
    {
        $this->container['sender'] = $sender;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name Name of the campaign
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets htmlContent
     *
     * @return string
     */
    public function getHtmlContent()
    {
        return $this->container['htmlContent'];
    }

    /**
     * Sets htmlContent
     *
     * @param string $htmlContent Body of the message (HTML version). If the campaign is designed using Drag & Drop editor via HTML content, then the design page will not have Drag & Drop editor access for that campaign. REQUIRED if htmlUrl is empty
     *
     * @return $this
     */
    public function setHtmlContent($htmlContent)
    {
        $this->container['htmlContent'] = $htmlContent;

        return $this;
    }

    /**
     * Gets htmlUrl
     *
     * @return string
     */
    public function getHtmlUrl()
    {
        return $this->container['htmlUrl'];
    }

    /**
     * Sets htmlUrl
     *
     * @param string $htmlUrl Url which contents the body of the email message. REQUIRED if htmlContent is empty
     *
     * @return $this
     */
    public function setHtmlUrl($htmlUrl)
    {
        $this->container['htmlUrl'] = $htmlUrl;

        return $this;
    }

    /**
     * Gets scheduledAt
     *
     * @return string
     */
    public function getScheduledAt()
    {
        return $this->container['scheduledAt'];
    }

    /**
     * Sets scheduledAt
     *
     * @param string $scheduledAt UTC date-time on which the campaign has to run (YYYY-MM-DDTHH:mm:ss.SSSZ). Prefer to pass your timezone in date-time format for accurate result. If sendAtBestTime is set to true, your campaign will be sent according to the date passed (ignoring the time part).
     *
     * @return $this
     */
    public function setScheduledAt($scheduledAt)
    {
        $this->container['scheduledAt'] = $scheduledAt;

        return $this;
    }

    /**
     * Gets subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->container['subject'];
    }

    /**
     * Sets subject
     *
     * @param string $subject Subject of the campaign
     *
     * @return $this
     */
    public function setSubject($subject)
    {
        $this->container['subject'] = $subject;

        return $this;
    }

    /**
     * Gets previewText
     *
     * @return string
     */
    public function getPreviewText()
    {
        return $this->container['previewText'];
    }

    /**
     * Sets previewText
     *
     * @param string $previewText Preview text or preheader of the email campaign
     *
     * @return $this
     */
    public function setPreviewText($previewText)
    {
        $this->container['previewText'] = $previewText;

        return $this;
    }

    /**
     * Gets replyTo
     *
     * @return string
     */
    public function getReplyTo()
    {
        return $this->container['replyTo'];
    }

    /**
     * Sets replyTo
     *
     * @param string $replyTo Email on which campaign recipients will be able to reply to
     *
     * @return $this
     */
    public function setReplyTo($replyTo)
    {
        $this->container['replyTo'] = $replyTo;

        return $this;
    }

    /**
     * Gets toField
     *
     * @return string
     */
    public function getToField()
    {
        return $this->container['toField'];
    }

    /**
     * Sets toField
     *
     * @param string $toField To personalize the «To» Field. If you want to include the first name and last name of your recipient, add {FNAME} {LNAME}. These contact attributes must already exist in your Brevo account. If input parameter 'params' used please use {{contact.FNAME}} {{contact.LNAME}} for personalization
     *
     * @return $this
     */
    public function setToField($toField)
    {
        $this->container['toField'] = $toField;

        return $this;
    }

    /**
     * Gets recipients
     *
     * @return \Brevo\Client\Model\UpdateEmailCampaignRecipients
     */
    public function getRecipients()
    {
        return $this->container['recipients'];
    }

    /**
     * Sets recipients
     *
     * @param \Brevo\Client\Model\UpdateEmailCampaignRecipients $recipients recipients
     *
     * @return $this
     */
    public function setRecipients($recipients)
    {
        $this->container['recipients'] = $recipients;

        return $this;
    }

    /**
     * Gets attachmentUrl
     *
     * @return string
     */
    public function getAttachmentUrl()
    {
        return $this->container['attachmentUrl'];
    }

    /**
     * Sets attachmentUrl
     *
     * @param string $attachmentUrl Absolute url of the attachment (no local file). Extension allowed: xlsx, xls, ods, docx, docm, doc, csv, pdf, txt, gif, jpg, jpeg, png, tif, tiff, rtf, bmp, cgm, css, shtml, html, htm, zip, xml, ppt, pptx, tar, ez, ics, mobi, msg, pub and eps
     *
     * @return $this
     */
    public function setAttachmentUrl($attachmentUrl)
    {
        $this->container['attachmentUrl'] = $attachmentUrl;

        return $this;
    }

    /**
     * Gets inlineImageActivation
     *
     * @return bool
     */
    public function getInlineImageActivation()
    {
        return $this->container['inlineImageActivation'];
    }

    /**
     * Sets inlineImageActivation
     *
     * @param bool $inlineImageActivation Status of inline image. inlineImageActivation = false means image can’t be embedded, & inlineImageActivation = true means image can be embedded, in the email. You cannot send a campaign of more than 4MB with images embedded in the email. Campaigns with the images embedded in the email must be sent to less than 5000 contacts.
     *
     * @return $this
     */
    public function setInlineImageActivation($inlineImageActivation)
    {
        $this->container['inlineImageActivation'] = $inlineImageActivation;

        return $this;
    }

    /**
     * Gets mirrorActive
     *
     * @return bool
     */
    public function getMirrorActive()
    {
        return $this->container['mirrorActive'];
    }

    /**
     * Sets mirrorActive
     *
     * @param bool $mirrorActive Status of mirror links in campaign. mirrorActive = false means mirror links are deactivated, & mirrorActive = true means mirror links are activated, in the campaign
     *
     * @return $this
     */
    public function setMirrorActive($mirrorActive)
    {
        $this->container['mirrorActive'] = $mirrorActive;

        return $this;
    }

    /**
     * Gets recurring
     *
     * @return bool
     */
    public function getRecurring()
    {
        return $this->container['recurring'];
    }

    /**
     * Sets recurring
     *
     * @param bool $recurring FOR TRIGGER ONLY ! Type of trigger campaign.recurring = false means contact can receive the same Trigger campaign only once, & recurring = true means contact can receive the same Trigger campaign several times
     *
     * @return $this
     */
    public function setRecurring($recurring)
    {
        $this->container['recurring'] = $recurring;

        return $this;
    }

    /**
     * Gets footer
     *
     * @return string
     */
    public function getFooter()
    {
        return $this->container['footer'];
    }

    /**
     * Sets footer
     *
     * @param string $footer Footer of the email campaign
     *
     * @return $this
     */
    public function setFooter($footer)
    {
        $this->container['footer'] = $footer;

        return $this;
    }

    /**
     * Gets header
     *
     * @return string
     */
    public function getHeader()
    {
        return $this->container['header'];
    }

    /**
     * Sets header
     *
     * @param string $header Header of the email campaign
     *
     * @return $this
     */
    public function setHeader($header)
    {
        $this->container['header'] = $header;

        return $this;
    }

    /**
     * Gets utmCampaign
     *
     * @return string
     */
    public function getUtmCampaign()
    {
        return $this->container['utmCampaign'];
    }

    /**
     * Sets utmCampaign
     *
     * @param string $utmCampaign Customize the utm_campaign value. If this field is empty, the campaign name will be used. Only alphanumeric characters and spaces are allowed
     *
     * @return $this
     */
    public function setUtmCampaign($utmCampaign)
    {
        $this->container['utmCampaign'] = $utmCampaign;

        return $this;
    }

    /**
     * Gets params
     *
     * @return object
     */
    public function getParams()
    {
        return $this->container['params'];
    }

    /**
     * Sets params
     *
     * @param object $params Pass the set of attributes to customize the type 'classic' campaign. For example, {\"FNAME\":\"Joe\", \"LNAME\":\"Doe\"}. The 'params' field will get updated, only if the campaign is in New Template Language, else ignored. The New Template Language is dependent on the values of 'subject', 'htmlContent/htmlUrl', 'sender.name' & 'toField'
     *
     * @return $this
     */
    public function setParams($params)
    {
        $this->container['params'] = $params;

        return $this;
    }

    /**
     * Gets sendAtBestTime
     *
     * @return bool
     */
    public function getSendAtBestTime()
    {
        return $this->container['sendAtBestTime'];
    }

    /**
     * Sets sendAtBestTime
     *
     * @param bool $sendAtBestTime Set this to true if you want to send your campaign at best time. Note:- if true, warmup ip will be disabled.
     *
     * @return $this
     */
    public function setSendAtBestTime($sendAtBestTime)
    {
        $this->container['sendAtBestTime'] = $sendAtBestTime;

        return $this;
    }

    /**
     * Gets abTesting
     *
     * @return bool
     */
    public function getAbTesting()
    {
        return $this->container['abTesting'];
    }

    /**
     * Sets abTesting
     *
     * @param bool $abTesting Status of A/B Test. abTesting = false means it is disabled, & abTesting = true means it is enabled. 'subjectA', 'subjectB', 'splitRule', 'winnerCriteria' & 'winnerDelay' will be considered if abTesting is set to true. 'subject' if passed is ignored.  Can be set to true only if 'sendAtBestTime' is 'false'. You will be able to set up two subject lines for your campaign and send them to a random sample of your total recipients. Half of the test group will receive version A, and the other half will receive version B
     *
     * @return $this
     */
    public function setAbTesting($abTesting)
    {
        $this->container['abTesting'] = $abTesting;

        return $this;
    }

    /**
     * Gets subjectA
     *
     * @return string
     */
    public function getSubjectA()
    {
        return $this->container['subjectA'];
    }

    /**
     * Sets subjectA
     *
     * @param string $subjectA Subject A of the campaign. Considered if abTesting = true. subjectA & subjectB should have unique value
     *
     * @return $this
     */
    public function setSubjectA($subjectA)
    {
        $this->container['subjectA'] = $subjectA;

        return $this;
    }

    /**
     * Gets subjectB
     *
     * @return string
     */
    public function getSubjectB()
    {
        return $this->container['subjectB'];
    }

    /**
     * Sets subjectB
     *
     * @param string $subjectB Subject B of the campaign. Considered if abTesting = true. subjectA & subjectB should have unique value
     *
     * @return $this
     */
    public function setSubjectB($subjectB)
    {
        $this->container['subjectB'] = $subjectB;

        return $this;
    }

    /**
     * Gets splitRule
     *
     * @return int
     */
    public function getSplitRule()
    {
        return $this->container['splitRule'];
    }

    /**
     * Sets splitRule
     *
     * @param int $splitRule Add the size of your test groups. Considered if abTesting = true. We'll send version A and B to a random sample of recipients, and then the winning version to everyone else
     *
     * @return $this
     */
    public function setSplitRule($splitRule)
    {

        if (!is_null($splitRule) && ($splitRule > 50)) {
            throw new \InvalidArgumentException('invalid value for $splitRule when calling UpdateEmailCampaign., must be smaller than or equal to 50.');
        }
        if (!is_null($splitRule) && ($splitRule < 1)) {
            throw new \InvalidArgumentException('invalid value for $splitRule when calling UpdateEmailCampaign., must be bigger than or equal to 1.');
        }

        $this->container['splitRule'] = $splitRule;

        return $this;
    }

    /**
     * Gets winnerCriteria
     *
     * @return string
     */
    public function getWinnerCriteria()
    {
        return $this->container['winnerCriteria'];
    }

    /**
     * Sets winnerCriteria
     *
     * @param string $winnerCriteria Choose the metrics that will determinate the winning version. Considered if 'splitRule' >= 1 and < 50. If splitRule = 50, 'winnerCriteria' is ignored if passed or alreday exist in record
     *
     * @return $this
     */
    public function setWinnerCriteria($winnerCriteria)
    {
        $allowedValues = $this->getWinnerCriteriaAllowableValues();
        if (!is_null($winnerCriteria) && !in_array($winnerCriteria, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'winnerCriteria', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['winnerCriteria'] = $winnerCriteria;

        return $this;
    }

    /**
     * Gets winnerDelay
     *
     * @return int
     */
    public function getWinnerDelay()
    {
        return $this->container['winnerDelay'];
    }

    /**
     * Sets winnerDelay
     *
     * @param int $winnerDelay Choose the duration of the test in hours. Maximum is 7 days, pass 24*7 = 168 hours. The winning version will be sent at the end of the test. Considered if 'splitRule' >= 1 and < 50. If splitRule = 50, 'winnerDelay' is ignored if passed or alreday exist in record
     *
     * @return $this
     */
    public function setWinnerDelay($winnerDelay)
    {

        if (!is_null($winnerDelay) && ($winnerDelay > 168)) {
            throw new \InvalidArgumentException('invalid value for $winnerDelay when calling UpdateEmailCampaign., must be smaller than or equal to 168.');
        }
        if (!is_null($winnerDelay) && ($winnerDelay < 1)) {
            throw new \InvalidArgumentException('invalid value for $winnerDelay when calling UpdateEmailCampaign., must be bigger than or equal to 1.');
        }

        $this->container['winnerDelay'] = $winnerDelay;

        return $this;
    }

    /**
     * Gets ipWarmupEnable
     *
     * @return bool
     */
    public function getIpWarmupEnable()
    {
        return $this->container['ipWarmupEnable'];
    }

    /**
     * Sets ipWarmupEnable
     *
     * @param bool $ipWarmupEnable Available for dedicated ip clients. Set this to true if you wish to warm up your ip.
     *
     * @return $this
     */
    public function setIpWarmupEnable($ipWarmupEnable)
    {
        $this->container['ipWarmupEnable'] = $ipWarmupEnable;

        return $this;
    }

    /**
     * Gets initialQuota
     *
     * @return int
     */
    public function getInitialQuota()
    {
        return $this->container['initialQuota'];
    }

    /**
     * Sets initialQuota
     *
     * @param int $initialQuota Set an initial quota greater than 1 for warming up your ip. We recommend you set a value of 3000.
     *
     * @return $this
     */
    public function setInitialQuota($initialQuota)
    {
        $this->container['initialQuota'] = $initialQuota;

        return $this;
    }

    /**
     * Gets increaseRate
     *
     * @return int
     */
    public function getIncreaseRate()
    {
        return $this->container['increaseRate'];
    }

    /**
     * Sets increaseRate
     *
     * @param int $increaseRate Set a percentage increase rate for warming up your ip. We recommend you set the increase rate to 30% per day. If you want to send the same number of emails every day, set the daily increase value to 0%.
     *
     * @return $this
     */
    public function setIncreaseRate($increaseRate)
    {

        if (!is_null($increaseRate) && ($increaseRate > 100)) {
            throw new \InvalidArgumentException('invalid value for $increaseRate when calling UpdateEmailCampaign., must be smaller than or equal to 100.');
        }
        if (!is_null($increaseRate) && ($increaseRate < 0)) {
            throw new \InvalidArgumentException('invalid value for $increaseRate when calling UpdateEmailCampaign., must be bigger than or equal to 0.');
        }

        $this->container['increaseRate'] = $increaseRate;

        return $this;
    }

    /**
     * Gets unsubscriptionPageId
     *
     * @return string
     */
    public function getUnsubscriptionPageId()
    {
        return $this->container['unsubscriptionPageId'];
    }

    /**
     * Sets unsubscriptionPageId
     *
     * @param string $unsubscriptionPageId Enter an unsubscription page id. The page id is a 24 digit alphanumeric id that can be found in the URL when editing the page.
     *
     * @return $this
     */
    public function setUnsubscriptionPageId($unsubscriptionPageId)
    {
        $this->container['unsubscriptionPageId'] = $unsubscriptionPageId;

        return $this;
    }

    /**
     * Gets updateFormId
     *
     * @return string
     */
    public function getUpdateFormId()
    {
        return $this->container['updateFormId'];
    }

    /**
     * Sets updateFormId
     *
     * @param string $updateFormId Mandatory if templateId is used containing the {{ update_profile }} tag. Enter an update profile form id. The form id is a 24 digit alphanumeric id that can be found in the URL when editing the form.
     *
     * @return $this
     */
    public function setUpdateFormId($updateFormId)
    {
        $this->container['updateFormId'] = $updateFormId;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    #[\ReturnTypeWillChange]
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


