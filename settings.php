<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * tresipuntaudio module admin settings and defaults
 *
 * @package    mod_tresipuntaudio
 * @copyright  2021 Tresipunt
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

global $ADMIN, $CFG;

if ($ADMIN->fulltree) {
    require_once("$CFG->libdir/resourcelib.php");

    $displayoptions = resourcelib_get_displayoptions(array(RESOURCELIB_DISPLAY_AUTO,
                                                           RESOURCELIB_DISPLAY_EMBED,
                                                           RESOURCELIB_DISPLAY_FRAME,
                                                           RESOURCELIB_DISPLAY_DOWNLOAD,
                                                           RESOURCELIB_DISPLAY_OPEN,
                                                           RESOURCELIB_DISPLAY_NEW,
                                                           RESOURCELIB_DISPLAY_POPUP,
                                                          ));
    $defaultdisplayoptions = array(RESOURCELIB_DISPLAY_AUTO,
                                   RESOURCELIB_DISPLAY_EMBED,
                                   RESOURCELIB_DISPLAY_DOWNLOAD,
                                   RESOURCELIB_DISPLAY_OPEN,
                                   RESOURCELIB_DISPLAY_POPUP,
                                  );

    //--- general settings -----------------------------------------------------------------------------------
    $settings->add(new admin_setting_configtext('tresipuntaudio/framesize',
        get_string('framesize', 'tresipuntaudio'),
        get_string('configframesize', 'tresipuntaudio'), 130, PARAM_INT));
    $settings->add(new admin_setting_configmultiselect('tresipuntaudio/displayoptions',
        get_string('displayoptions', 'tresipuntaudio'),
        get_string('configdisplayoptions', 'tresipuntaudio'),
        $defaultdisplayoptions, $displayoptions));

    //--- modedit defaults -----------------------------------------------------------------------------------
    $settings->add(new admin_setting_heading('tresipuntaudiomodeditdefaults',
        get_string('modeditdefaults', 'admin'),
        get_string('condifmodeditdefaults', 'admin')));

    $settings->add(new admin_setting_configcheckbox('tresipuntaudio/printintro',
        get_string('printintro', 'tresipuntaudio'),
        get_string('printintroexplain', 'tresipuntaudio'), 1));
    $settings->add(new admin_setting_configselect('tresipuntaudio/display',
        get_string('displayselect', 'tresipuntaudio'),
        get_string('displayselectexplain', 'tresipuntaudio'), RESOURCELIB_DISPLAY_AUTO,
        $displayoptions));
    $settings->add(new admin_setting_configcheckbox('tresipuntaudio/showsize',
        get_string('showsize', 'tresipuntaudio'),
        get_string('showsize_desc', 'tresipuntaudio'), 0));
    $settings->add(new admin_setting_configcheckbox('tresipuntaudio/showtype',
        get_string('showtype', 'tresipuntaudio'),
        get_string('showtype_desc', 'tresipuntaudio'), 0));
    $settings->add(new admin_setting_configcheckbox('tresipuntaudio/showdate',
        get_string('showdate', 'tresipuntaudio'),
        get_string('showdate_desc', 'tresipuntaudio'), 0));
    $settings->add(new admin_setting_configtext('tresipuntaudio/popupwidth',
        get_string('popupwidth', 'tresipuntaudio'),
        get_string('popupwidthexplain', 'tresipuntaudio'), 620, PARAM_INT, 7));
    $settings->add(new admin_setting_configtext('tresipuntaudio/popupheight',
        get_string('popupheight', 'tresipuntaudio'),
        get_string('popupheightexplain', 'tresipuntaudio'), 450, PARAM_INT, 7));
    $options = array('0' => get_string('none'), '1' =>
        get_string('allfiles'), '2' => get_string('htmlfilesonly'));
    $settings->add(new admin_setting_configselect('tresipuntaudio/filterfiles',
        get_string('filterfiles', 'tresipuntaudio'),
        get_string('filterfilesexplain', 'tresipuntaudio'), 0, $options));
}
