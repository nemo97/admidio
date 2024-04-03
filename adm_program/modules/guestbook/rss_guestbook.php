<?php
/**
 ***********************************************************************************************
 * RSS feed of guestbook. Lists the newest 10 guestbook entries.
 * Specification von RSS 2.0: http://www.feedvalidator.org/docs/rss2.html
 *
 * @copyright The Admidio Team
 * @see https://www.admidio.org/
 * @license https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2.0 only
 ***********************************************************************************************
 */
require_once(__DIR__ . '/../../system/common.php');

// Check if RSS is active...
if (!$gSettingsManager->getBool('enable_rss')) {
    $gMessage->setForwardUrl($gHomepage);
    $gMessage->show($gL10n->get('SYS_RSS_DISABLED'));
    // => EXIT
}

// check if the module is enabled and disallow access if it's disabled
if ((int) $gSettingsManager->get('enable_guestbook_module') !== 1) {
    $gMessage->show($gL10n->get('SYS_MODULE_DISABLED'));
    // => EXIT
}

// get the latest 10 guestbook entries
$sql = 'SELECT *
          FROM '.TBL_GUESTBOOK.'
         WHERE gbo_org_id = ? -- $gCurrentOrgId
           AND gbo_locked = false
      ORDER BY gbo_timestamp_create DESC
         LIMIT 10';
$statement = $gDb->queryPrepared($sql, array($gCurrentOrgId));

// create RSS feed object with channel information
$organizationName = $gCurrentOrganization->getValue('org_longname');
$rss = new RssFeed(
    $organizationName . ' - ' . $gL10n->get('GBO_GUESTBOOK'),
    $gCurrentOrganization->getValue('org_homepage'),
    $gL10n->get('GBO_LATEST_GUESTBOOK_ENTRIES_OF_ORGA', array($organizationName)),
    $organizationName
);
$guestbook = new TableGuestbook($gDb);

// add the RSS items to the RssFeed object
while ($row = $statement->fetch()) {
    $guestbook->clear();
    $guestbook->setArray($row);

    // add entry to RSS feed
    $rss->addItem(
        $guestbook->getValue('gbo_name'),
        $guestbook->getValue('gbo_text'),
        SecurityUtils::encodeUrl(ADMIDIO_URL . FOLDER_MODULES . '/guestbook/guestbook.php', array('id' => (int) $guestbook->getValue('gbo_id'))),
        $guestbook->getValue('gbo_name'),
        \DateTime::createFromFormat('Y-m-d H:i:s', $guestbook->getValue('gbo_timestamp_create', 'Y-m-d H:i:s'))->format('r')
    );
}

$rss->getRssFeed();
