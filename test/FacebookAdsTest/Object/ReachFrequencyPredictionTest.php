<?php
/**
 * Copyright 2014 Facebook, Inc.
 *
 * You are hereby granted a non-exclusive, worldwide, royalty-free license to
 * use, copy, modify, and distribute this software in source code or binary
 * form for use in connection with the web services and APIs provided by
 * Facebook.
 *
 * As with any software that integrates with the Facebook platform, your use
 * of this software is subject to the Facebook Developer Principles and
 * Policies [http://developers.facebook.com/policy/]. This copyright notice
 * shall be included in all copies or substantial portions of the software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
 * THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
 * DEALINGS IN THE SOFTWARE.
 *
 */

namespace FacebookAdsTest\Object;

use Facebook\FacebookRequest;
use FacebookAds\Api;
use FacebookAds\Object\ReachFrequencyPrediction;
use FacebookAds\Object\TargetingSpecs;
use FacebookAds\Object\Fields\ReachFrequencyPredictionFields as RF;
use FacebookAds\Object\Values\AdObjectives;

class ReachFrequencyPredictionTest extends AbstractCrudObjectTestCase {

  public function testCrudAccess() {

    $prediction = new ReachFrequencyPrediction(null, $this->getActId());

    $targeting = array(
    'geo_locations' => array('countries' => array('US')),
      'age_max' => 35,
      'age_min' => 20,
      'genders' =>  array('2'),
      'page_types' => array('feed'),
    );

    $prediction->setData(array(
      RF::BUDGET => 3000000,
      RF::TARGET_SPECS => array($targeting),
      RF::START_TIME => strtotime('midnight + 2 weeks'),
      RF::END_TIME => strtotime('midnight + 3 weeks'),
      RF::FREQUENCY_CAP => 4,
      RF::DESTINATION_ID => $this->getPageId(),
      RF::PREDICTION_MODE => ReachFrequencyPrediction::PREDICTION_MODE_REACH,
      RF::OBJECTIVE => AdObjectives::POST_ENGAGEMENT,
    ));

    $this->assertCanCreate($prediction);
    $this->assertCanDelete($prediction);
  }

}
