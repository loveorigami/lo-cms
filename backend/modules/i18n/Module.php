<?php

namespace backend\modules\i18n;

use Yii;
use yii\i18n\MissingTranslationEvent;
use backend\modules\i18n\models\I18nSourceMessage;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'backend\modules\i18n\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
	/**
     * @param MissingTranslationEvent $event
     */
    public static function missingTranslation(MissingTranslationEvent $event)
    {
        $sourceMessage = I18nSourceMessage::find()
            ->where('category = :category and message = binary :message', [
                ':category' => $event->category,
                ':message' => $event->message
            ])
            ->with('messages')
            ->one();

        if (!$sourceMessage && $event->message) {
            $sourceMessage = new I18nSourceMessage;
            $sourceMessage->setAttributes([
                'category' => $event->category,
                'message' => $event->message
            ], false);
            $sourceMessage->save(false);
        }
        $sourceMessage->initI18nMessages();
        $sourceMessage->saveI18nMessages();
    }
}
